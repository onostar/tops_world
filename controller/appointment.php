<?php
    include "server.php";
    session_start();

    if(isset($_POST["book"])){
        $customer_name = ucwords(htmlspecialchars(stripslashes($_POST['customer_name'])));
        $customer_phone = htmlspecialchars(stripslashes($_POST['customer_phone']));
        $customer_email = htmlspecialchars(stripslashes($_POST['customer_mail']));
        $service = htmlspecialchars(stripslashes($_POST['service']));
        $appointment_date = htmlspecialchars(stripslashes($_POST['appointment_date']));
        $appointment_address = htmlspecialchars(stripslashes($_POST['appointment_address']));
        $notes = htmlspecialchars(stripslashes($_POST['notes']));

        $bookings = $connectdb->prepare("INSERT INTO appointments (customer_name, customer_mail, customer_phone, service, appointment_date, appointment_address, notes) VALUES (:customer_name, :customer_mail, :customer_phone, :service, :appointment_date, :appointment_address, :notes)");

        $bookings->bindvalue("customer_name", $customer_name);
        $bookings->bindvalue("customer_mail", $customer_email);
        $bookings->bindvalue("customer_phone", $customer_phone);
        $bookings->bindvalue("appointment_date", $appointment_date);
        $bookings->bindvalue("appointment_address", $appointment_address);
        $bookings->bindvalue("service", $service);
        $bookings->bindvalue("notes", $notes);
        $bookings->execute();

        if($bookings){
            /* send admin mail */
            $subject = "Temix Empire - New Appointment";
            $message = "You have a new Appointment Booking from $customer_name. \n <a href='https://temixempire.com/admin/admin..php'>Click here to view</a>";
            $header = "From: admin@temixempire.com";
            mail("temidayomabel@gmail.com", $subject, $message, $header) or die("Error!");

            echo "<script>
                alert('You have booked your Appointment. We will Get back to you Shortly');
                window.open('main.php', '_parent');</script>";
            // header("Location: main.php");

        }else{
            echo "<p class='exist'>Failed to book appointment</p>";
        }
    }