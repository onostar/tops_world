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
            echo $view->first_name . " " . $view->last_name. " - Shopping Cart";
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
    <section id="shoppingCart">
            <h2>My shopping cart</h2>
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
            <div class="shop_cart">
                
                <div class="cart_items">
                    <?php
                        $cart_items = $connectdb->prepare("SELECT menu.item_foto, menu.item_name, cart.cart_id, cart.item_name, cart.customer_email, menu.item_prize, cart.item_price, cart.quantity FROM menu, cart WHERE menu.item_name = cart.item_name AND cart.customer_email = :customer_email");
                        $cart_items->bindvalue('customer_email', $user);
                        $cart_items->execute();

                        if($cart_items->rowCount() > 0){
                            $views = $cart_items->fetchAll();
                            foreach($views as $view):
                        

                        
                    ?>
                    <figure>
                        <img src="<?php echo '../items/'.$view->item_foto?>" alt="<?php echo $view->item_name?>">
                        <figcaption>
                            <p><strong><?php echo $view->item_name?></strong></p>
                            <p>Qty: <span id="prizing"><?php echo $view->quantity?></span></p>
                            <p>Amount: ₦<span id="totalprice" class="totalprice"><?php echo number_format($view->item_price)?></span></p>
                            <div class="action">
                                <form action="update_quantity.php" method="POST">
                                    <input type="number" name="quantity" id="quantity" value="<?php echo $view->quantity?>">
                                    <input type="hidden" name="customer_email" value="<?php echo $user?>">
                                    <input type="hidden" name="item" value="<?php echo $view->item_name?>">
                                    <input type="hidden" name="item_prize" value="<?php echo $view->item_prize?>">
                                    <button type="submit" name="update_qty" title="update Quantity" id="update_qty">Update</button>
                                </form>
                                
                                <a onclick="removeCartItem('<?php echo $view->cart_id?>')" href="javascript:void(0);" title="Remove item" id="remove_item"><i class="fas fa-trash"></i></a>
                            </div>
                        </figcapiton>
                    </figure>
                    <?php
                        endforeach;
                        }else{
                            echo "<p class='empty'>Your cart is empty!</p>";
                        }    
                    ?>
                    
                </div>
                <!-- GETTING TOTAL -->
                <div class="total">
                    <?php
                        if($cart_items->rowCount() > 0):
                    ?>
                    <h3>Amount Due</h3>
                    <hr>
                    <p class="total_per_item">Total: <span class="itemsTotal" id="itemTotals">₦ <span id="itemTotal"><?php
                        $get_total = $connectdb->prepare("SELECT SUM(item_price) AS total_prize FROM cart WHERE customer_email = :customer_email");
                        $get_total->bindvalue('customer_email', $user);
                        $get_total->execute();

                        $totals = $get_total->fetchAll();
                        foreach($totals as $total){
                    echo $total->total_prize;}?>.00</span></span></p>
                   
                    <p class="total_per_item">Delivery fee: <span>₦ <span id="delivery">1000.00</span></span></p>
                    <p class="total_per_item">Discount: <span> ₦ <span id="discount">0.00</span></span></p>
                    <hr>
                    <p class="total_per_item" style="font-weight:bold;">Grand Total:<span id="item_grand_total">₦<span id="grandTotal"></span></span></p>
                    <hr>
                    <div class="order_or_clear">
                        <form action="order.php" method="POST" class="order_form">
                            <input type="hidden" name="customer" value="<?php echo $user?>">
                            <button type="submit" name="order" id="order"><i class="fas fa-wallet"></i> Confirm</button>
                        </form>
                        <form action="clear_cart.php" method="POST" class="clear_cart_form">
                            <input type="hidden" name="customer_email" value="<?php echo $user;?>">
                            <button type="submit" name="clear_cart" id="clear_cart"><i class="fas fa-trash"></i> Clear Cart</button>
                        </form>
                    </div>
                </div>
                <?php endif;?>
            </div>
            
        </section>
        <!-- <section id="featured">
            
            <h2>Featured cuisines</h2>
            <div class="featured">
                <?php
                    /* $select_featured = $connectdb->prepare("SELECT * FROM menu WHERE featured_item = 1");
                    $select_featured->execute();
                    $rows = $select_featured->fetchAll();
                    foreach($rows as $row): */
                ?>
                <figure>
                    <a href="javascript:void(0);" onclick="showItems('<?php echo $row->item_id?>')">
                        <img src="<?php echo 'items/'.$row->item_foto;?>" alt="featured item">
                        <figcaption>
                            <p><?php echo $row->item_name?></p>
                            <span>₦ <?php echo $row->item_prize?></span>
                        </figcaption>
                    </a>
                </figure>
                
                <?php //endforeach ?>
            </div>
            <button id="view_more">View more</button>
            <button id="show_less">Show less</button>
        </section>
        <section id="shop" class="row">
            
        </section> -->
        
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
        header("Location: ../index.php");
    }
?> 