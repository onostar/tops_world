<?php
    include "server.php";
    session_start();

    
    if(isset($_POST['order'])){
        $customer = htmlspecialchars(stripslashes($_POST['customer']));
        $today_date = date("Y-m-d");
        $order_time = date("Y-m-d h:i:s");
        $status = 0;
        $ran_number = rand(1, 1000);
        $order_dt = date("Ymdhis");
        $order_num = $ran_number . $order_dt;
        $confirm_order = $connectdb->prepare("INSERT INTO orders (customer_email, item_name, quantity, item_price) SELECT customer_email, item_name, quantity, item_price FROM cart WHERE customer_email = :customer_email");
        $confirm_order->bindvalue('customer_email', $customer);
        $confirm_order->execute();

        if($confirm_order){
            /* insert transaction date and number */
            $insert_date = $connectdb->prepare("UPDATE  orders SET order_number = :order_number WHERE customer_email = :customer_email AND order_time = CURTIME()");
            // $insert_date->bindvalue('order_date', $today_date);
            $insert_date->bindvalue('order_number', $order_num);
            $insert_date->bindvalue('customer_email', $customer);
            // $insert_date->bindvalue('order_time', $order_time);
            
            $insert_date->execute();

            /* delete from cart */
            $delete_cart = $connectdb->prepare("DELETE FROM cart WHERE customer_email = :customer_email");
            $delete_cart->bindvalue('customer_email', $customer);
            $delete_cart->execute();

            /* get customer details */
            $get_customer = $connectdb->prepare("SELECT first_name, last_name FROM users WHERE email = :email");
            $get_customer->bindvalue('email', $customer);
            $get_customer->execute();
            $details = $get_customer->fetchAll();
            foreach($details as $detail){
                $customer_name = $detail->first_name . ' ' . $detail->last_name;
            }
            // echo $customer_name;
            /* get admin */
            /* $get_admin = $connectdb->prepare("SELECT email FROM users WHERE email = 'admin@temixempire.com'");
            $get_admin->execute();
            $row = $get_admin->fetch();
            $admin_mail = $row->email;
 */
            /* get restaurant */
            /* $get_restaurant = $connectdb->prepare("SELECT administrators.restaurant_email, administrators.restaurant_name, orders.restaurant, orders.customer_email FROM administrators, orders WHERE orders.customer_email = :customer_email AND administrators.restaurant_name = orders.restaurant");
            $get_restaurant->bindvalue('customer_email', $customer);
            $get_restaurant->execute();
            $shows = $get_restaurant->fetchAll();
            foreach($shows as $show){
                $restaurant_mail = $show->restaurant_email;
                $restaurant = $show->restaurant_name;
            } */

            /* Send mail to Admin */
            $subject = "Temix Empire - New Order";
            $message = "You have a new order from $customer_name \n Click the Link below to view details \n https://temixempire.com/admin/admin.php";
            $mailHeader = "From: admin@temixempire.com";
            mail("temidayomabel@gmail.com, onostarmedia@gmail.com", $subject, $message, $mailHeader) or die("Error!");

            /* Send mail to Restaurant */
           /*  $subject2 = "Foodies - New Order";
            $message2 = "You have a new order from $customer_name to $restaurant n/ Click the Link below to view details n/ https://admin.foodiez.com";
            $header2 = "FROM: Foodies";
            mail($restaurant_mail, $subject2, $message2, $header2) or die("Error!"); */

            /* success message */
            $_SESSION['success'] = "You have placed your order. Thank You!";

            header("Location: shopping_cart.php");
        }else{
            $_SESSION['error'] = "Failed to place order!";
            header("Location: shopping_cart.php");
        }
    }
?>