<?php
    include "server.php";
    session_start();

    if(isset($_GET['event'])){
        $booking_id = $_GET['event'];
        $confirm = $connectdb->prepare("UPDATE appointments SET status = 1 WHERE booking_id = :booking_id");
        $confirm->bindvalue('booking_id', $booking_id);
        $confirm->execute();

        if($confirm){
            /* echo "<script>alert('Item dispensed!');
            window.open('admin.php', '_parent');</script>"; */
            $_SESSION['success'] = "Appointment Done";
            header("Location: admin.php");
        }else{
            $_SESSION['error'] = "failed to meet Appointment";
            header("Location: admin.php");
        }
    }