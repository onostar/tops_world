<?php 
    include "server.php";
    session_start();

    $subject = htmlspecialchars(stripslashes($_POST['subject']));
    $message = htmlspecialchars(stripslashes($_POST['broadcast_message']));
    $mailHeader = "From: Admin";

    //get receipients and send message
    $get_recipient = $connectdb->prepare("SELECT email FROM users WHERE email != 'admin@temixempire.com'");
    $get_recipient->execute();
    $views = $get_recipient->fetchAll();
    foreach($views as $view){
        $send_message = $connectdb->prepare("INSERT INTO notifications (subject, details, customer_email) VALUES(:subject, :details, :customer_email)");
        $send_message->bindvalue("subject", $subject);
        $send_message->bindvalue("details", $message);
        $send_message->bindvalue("customer_email", $view->email);
        $send_message->execute();
        //send mail
        // mail("$view->email", $subject, $message, $mailHeader) or die("Error!");

        
    }
    

    if($send_message){
        echo"<p><span>Message sent Successfully!</p>";
    }else{
        echo "Big error!";
    }  
    
?>