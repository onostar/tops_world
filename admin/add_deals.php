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
    /* if(isset($_POST['add_feat'])){ */
       
        $deal = ucwords(htmlspecialchars(stripslashes($_POST['dealItem'])));

        /* check max deals */
        $check_deals = $connectdb->prepare("SELECT * FROM menu WHERE daily_deal = 1");
        $check_deals->execute();
        if($check_deals->rowCount() == 4){
            echo "<p class='exist' style='text-decoration:underline; color:red; font-size:1.2rem; font-weight:bold; text-align:center;'>You have reached max deals!<br> <a href='admin.php'>Ok</a></p>";
        }else{
        /* check user availability */
        $check_user = $connectdb->prepare("SELECT * FROM menu WHERE item_id = :item_id AND daily_deal = 1");
        /* $items = $check_user->fetchAll();
        foreach($items as $item){
            $itemName = $item->item_name;
        } */
        $check_user->bindvalue('item_id', $deal);
        $check_user->execute();

        if($check_user->rowCount() > 0){
            echo "<p class='exist' style='text-decoration:underline; color:red; font-size:1.2rem; font-weight:bold; text-align:center;'>This is already a deal of the day!</p>";
            /* $_SESSION['success'] = "$featured from $restaurant is already a featrued item!";
            header("Location: admin.php"); */

        }else{
            $add_deal = $connectdb->prepare("UPDATE menu SET daily_deal = 1 WHERE item_id = :item_id");
            $add_deal->bindvalue('item_id', $deal);
            $add_deal->execute();

            if($add_deal):
                /* echo "<p><span>".$featured."</span> from " . $restaurant . " added to featured items!</p>"; */
?>            
            <table id="featuredTable">
                <thead>
                    <tr>
                        <td>S/N</td>
                        
                        <td>Item name</td>
                        <td>Item price</td>
                        <td>Action</td>
                    </tr>
                </thead>

                    <?php
                        $n = 1;
                        $select_user = $connectdb->prepare("SELECT * FROM menu WHERE daily_deal = 1 ORDER BY item_name");

                        $select_user->execute();
                        
                        $rows = $select_user->fetchAll();
                        foreach($rows as $row):
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $n?></td>
                            
                            <td><?php echo $row->item_name?></td>
                            <td><?php echo number_format($row->item_prize);?></td>
                            <td><button style="background:transparent; border:none; width:80%; margin:0 auto;" title="remove from featured" onclick="removeDeals('<?php echo number_format($row->item_id);?>')"><i class="fas fa-trash" style="color:red; font-size:1.3rem; text-align:center;"></i></button></td>
                        </tr>
                        
                    </tbody>
                    
                    <?php $n++; endforeach; endif; ?>
                 </table>
    <?php } }?>                                                                          
  