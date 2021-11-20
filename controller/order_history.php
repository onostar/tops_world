<?php
    require "server.php";
    session_start();
    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Temix Empire is a Catering Company, we are Specialized in Cakes of all kinds Like Wedding cakes, Birthday cakes, Anniversary cakes, chcocolate cakes, Coconut Cakes, Banana cakes and many others. We also provide Make-up service for weddings, Party, Birthdays and Photo Shoot, we supply quality beddings for Hotels, Schools, Hospitals and Homes. We also specialize in Event Planning, Decorations for all Occations, Fashionable Beads, and Graphic Designs. Temix Empire always serve up Quality of Service you can trust">
    <meta name="keywords" content="cakes, beddings, wedding cakes, birthday cakes, decorations, weddings, makeup, make-up, make-up artiste, event planning, events, chcocolate cakes, icing">
    <title>
        <?php
            $user_info = $connectdb->prepare("SELECT * FROM users WHERE email = :email");
            $user_info->bindvalue('email', $user);
            $user_info->execute();
            $view = $user_info->fetch();
            echo $view->first_name . " " . $view->last_name. " - Order History";
        ?>
    </title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../fontawesome-free-5.15.1-web/css/all.css">
    <link rel="icon" type="image/png" href="../images/temix_empire_logo1.jpg" size="32X32">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <?php include "header.php";?>
 
    <?php include "mobile_menu.php";?>

    <main>
    <section id="history">
            <h2>My Order history</h2>
            <hr>
            <p class="successful">
                <?php
                    if(isset($_SESSION['success'])){
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    }
                ?>
                <?php
                    if(isset($_SESSION['error'])){
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                ?>
            </p>
            <div class="order_history">
                <?php
                    $select_orders = $connectdb->prepare("SELECT orders.customer_email, orders.item_name, orders.quantity, orders.item_price, orders.order_date, orders.order_number, orders.order_status, orders.delivery_date, menu.item_name, menu.item_foto FROM orders, menu WHERE orders.item_name = menu.item_name AND orders.customer_email = :customer_email ORDER BY orders.order_time DESC");
                    $select_orders->bindvalue('customer_email', $user);
                    $select_orders->execute();

                    $rows = $select_orders->fetchAll();
                    foreach($rows as $row):
                ?>

                <figure>
                    <img src="<?php echo '../items/'. $row->item_foto;?>" alt="my order">
                    <figcaption>
                        <div class="order_details">
                            <h4>Order#: <?php echo $row->order_number;?></h4>
                            <p><?php echo $row->item_name;?></p>
                            
                            <p>Qty: <?php echo $row->quantity;?></p>
                            <p>Amount: ₦<?php echo number_format($row->item_price);?></p>
                            <p>Date: <?php echo date("jS F, Y", strtotime($row->order_date));?></p>
                        </div>
                        <div class="status_order"> 
                            <?php 
                                $order_status = 
                                $row->order_status;
                                if($order_status == 1){
                                    echo "<p style='background:green; padding:4px;
                                    border-radius:5px;'>Delivered <i class='fas fa-truck'></i></p>";
                                }elseif($order_status == -1){
                                    echo "<p style='background:red; padding:4px;
                                    border-radius:5px;'>Cancelled <i class='fas fa-plane-slash'></i></p>";
                                }else{
                                    echo "<p style='background:rgb(188, 201, 68); padding:4px;
                                    border-radius:5px;'>In Progress <i class='fas fa-plane'></i></p>";
                                }
                            ?>
                        </div>
                    </figcaption>
                </figure>
                <?php
                    endforeach;
                    
                    if(!$select_orders->rowCount()){
                        echo "<p style='font-weight:bold; color:chocolate; text-transform:capitalize; font-size:1.3rem; text-align:center; margin-top:10px;'>No record found!</p>";
                    }
                ?>
            </div>
            
        </section>
        
        
    </main>

    <footer>
        <?php include "footer.php"; ?>
    </footer>
    
    <script src="bootstrap.min.js"></script>
    <script src="jquery.js"></script>
    <script src="script.js"></script>
    
</body>
</html>

<?php
    }else{
        header("Location: index.php");
    }
?> 