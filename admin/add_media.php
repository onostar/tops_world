<?php
    include "server.php";
    session_start();

    function validate($field){
        if(!isset($_POST[$field])){
            return false;
        }else{
            return htmlspecialchars(stripcslashes($_POST[$field]));
        }
    }
    
    $_SESSION['success'] = "";
    $_SESSION['error'] = "";
    if(isset($_POST['add_photo'])){
        $media_type = ucwords(validate('media_type'));
        $description = ucwords(validate('description'));
        $photo = $_FILES['media_photo']['name'];
        $logo = "../media/".$photo;

        
            if(move_uploaded_file($_FILES['media_photo']['tmp_name'], $logo)){
                $add_photo = $connectdb->prepare("INSERT INTO media (foto, description, media_type) VALUES (:foto, :description, :media_type)");
                $add_photo->bindvalue('foto', $photo);
                $add_photo->bindvalue('description', $description);
                $add_photo->bindvalue('media_type', $media_type);
                
                $add_photo->execute();

                if($add_photo){
                    $_SESSION['success'] = "$description addedd Successfully!";
                    header("Location: admin.php");
                    /* echo "<p><span>" . $restaurant . "</span> created successfully!"; */
                }else{
                    $_SESSION['error'] = "$description not Uploaded!";
                    header("Location: admin.php");
                    /* echo "<p>restaurant not created!</p>"; */

                }
            }else{
                /* echo "<p class='exist'>failed to upload logo!</p>"; */
                $_SESSION['error'] = "Photo upload failed!";
                    header("Location: admin.php");
            }
            
        
    }
?>