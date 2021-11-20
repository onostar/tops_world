<?php

    include "server.php";
    session_start();

    if(isset($_SESSION['my_restaurant'])){
        $my_restaurant = $_SESSION['my_restaurant'];
    }
    $from_date = $_POST['uHighest_from_date'];
    $to_date = $_POST['uHighest_to_date'];

    $select_items = $connectdb->prepare("SELECT item_name, item_price, restaurant, delivery_date, SUM(quantity) AS total_quantity, SUM(item_price) AS total_amount FROM orders WHERE order_status = 1 AND delivery_date BETWEEN '$from_date' AND '$to_date' AND restaurant = :restaurant GROUP BY item_name ORDER BY total_quantity DESC");
    $select_items->bindvalue('restaurant', $my_restaurant);
    $select_items->execute();

    
    
?>  
    <?php echo "<h3>Highest Selling Items between '" . $from_date . "' and '" . $to_date ."'</h3>;"?>
    <hr>

    <div class="search">
        <input type="search" id="searchHighestItems" placeholder="Enter keyword">
    </div>
    <table id="highestItemsTable">
    
        <thead>
            <tr>
                <td>S/N</td>
                <td>item</td>
                <td>Qty</td>
                <td>Unit Price</td>
                <td>Total Amount</td>
                <td>Date</td>
            </tr>
        </thead>
    <?php
        $n = 1;
        if($select_items){
            $rows = $select_items->fetchAll();
            foreach($rows as $row):
    ?>
    <tbody>
        <tr>
            <td style="text-align:center;"><?php echo $n?></td>
            <td><?php echo $row->item_name?></td>
            <td style="text-align:center;"><?php echo $row->total_quantity?></td>
            <td>₦ <?php echo number_format($row->item_price, 2)?></td>
            <td>₦ <?php echo number_format($row->total_amount, 2)?></td>
            <td><?php echo $row->delivery_date?></td>
            
        </tr>
        
    </tbody>
    <?php $n++; endforeach;?>
    
</table>
        
        
        <?php 
            $check_order = $select_items->rowCount();
            if(!$check_order){
            echo "<p style='font-weight:bold; color:chocolate; text-transform:capitalize; font-size:1.3rem; text-align:center; margin-top:10px;'>No record found!</p>";
            }
        
        }
        ?>

    