<?php
    include "server.php";
    session_start();

    if(isset($_GET['remove'])){
        $id = $_GET['remove'];
        $delete_deal = $connectdb->prepare("UPDATE menu SET daily_deal = 0 WHERE item_id = :item_id");
        $delete_deal->bindvalue('item_id', $id);
        $delete_deal->execute();

        if($delete_deal){
            $_SESSION['success'] = "item Removed from daily deals";
            header("Location: admin.php");
        }else{
            $_SESSION['error'] = "failed to remove";
            header("Location: admin.php");
        }
    }