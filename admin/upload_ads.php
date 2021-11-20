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
    if(isset($_POST['add_ads'])){
        $id= ucwords(validate('banner_id'));
        $photo = $_FILES['banner']['name'];
        $logo = "../media/".$photo;

        
            if(move_uploaded_file($_FILES['banner']['tmp_name'], $logo)){
                $add_photo = $connectdb->prepare("UPDATE banner_ads SET photo = :photo WHERE banner_id = :banner_id");
                $add_photo->bindvalue('photo', $photo);
                $add_photo->bindvalue('banner_id', $id);
                
                $add_photo->execute();

                if($add_photo){
                    $_SESSION['success'] = "Advert Updated Successfully!";
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