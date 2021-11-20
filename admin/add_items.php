<?php
    include "server.php";
    session_start();

    /* function validate($field){
        if(!isset($_POST[$field])){
            return false;
        }else{
            return htmlspecialchars(stripcslashes($_POST[$field]));
        }
    } */
    
    $_SESSION['success'] = "";
    $_SESSION['error'] = "";
    if(isset($_POST['add_items'])){
        
        $item_category = ucwords(htmlspecialchars(stripslashes($_POST['item_category'])));
        $item_name = ucwords(htmlspecialchars(stripslashes($_POST['menu_item'])));
        $item_prize = htmlspecialchars(stripslashes($_POST['menu_prize']));
        $item_description = htmlspecialchars(stripslashes($_POST['item_description']));
        $item_foto = $_FILES['item_foto']['name'];
        $items = "../items/".$item_foto;
        $featured = 0;

        /* check user availability */
        $check_user = $connectdb->prepare("SELECT * FROM menu WHERE item_name = :item_name");
        
        $check_user->bindvalue('item_name', $item_name);
        
        $check_user->execute();

        if($check_user->rowCount() > 0){
            $_SESSION['error'] = "<strong>'$item_name'</strong> already Exists!";
            header("Location: admin.php");
            // echo "<p class='exist'><span>" . $item_name . "</span> already Exists!</p>";

        }else{
            if(move_uploaded_file($_FILES['item_foto']['tmp_name'], $items)){
                $add_item = $connectdb->prepare("INSERT INTO menu (item_category, item_name, item_prize, item_foto, item_description, featured_item) VALUES (:item_category, :item_name, :item_prize, :item_foto, :item_description, :featured_item)");
                $add_item->bindvalue('item_category', $item_category);
                $add_item->bindvalue('item_name', $item_name);
                $add_item->bindvalue('item_prize', $item_prize);
                $add_item->bindvalue('item_foto', $item_foto);
                $add_item->bindvalue('item_description', $item_description);
                $add_item->bindvalue('featured_item', $featured);
                $add_item->execute();

                if($add_item){
                    $_SESSION['success'] = "$item_name added Successfully! $subscribers";
                    header("Location: admin.php");
                    /* echo "<p><span>" . $item_name . "</span> added successfully!</p>"; */

                    /* Send subscribers mail */
                    $subject = "New item added from Foodies";
                    $message = "$item_name from $restaurant_name has just been added to the menu. /n Be the first to place your order, while Stocks last. /n <a href='https://foodies.com' title='Order now'>Click to Order Now</a>";
                    $mailheader = "From: admin@foodies.com";
                    $get_subscribers = $connectdb->prepare("SELECT email FROM users WHERE subscriber = 1");
                    $get_subscribers->execute();
                    $subscribers = $get_subscribers->fetchAll();
                    foreach($subscribers as $subscriber){
                        mail($subscriber->email, $subject, $message, $mailHeader) or die("Error!");
                    }
                }else{
                    $_SESSION['error'] = "$item_name not added!";
                    header("Location: admin.php");
                    /* echo "<p><span>" . $item_name . "</span> not added!</p>"; */

                }
            }else{
                /* echo "<p>Photo upload failure</p>"; */
                $_SESSION['error'] = "Photo upload failure!";
                header("Location: admin.php");
            }
            
        }
    }
?>

