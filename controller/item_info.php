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
            echo $view->first_name . " " . $view->last_name. " - Item Info";
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
        <section id="itemContent">
            
            <div class="itemInfo">
                <?php
                    if(isset($_GET['item'])){
                        $item_id = $_GET['item'];
                    

                        $view_item = $connectdb->prepare("SELECT* FROM menu WHERE item_id = :item_id");
                        $view_item->bindvalue('item_id', $item_id);
                        $view_item->execute();

                        $items = $view_item->fetchAll();
                        foreach($items as $item):
                    
                        
                ?>
                <?php 
                    $category = $item->item_category;
                    $name = $item->item_name;
                ?>
                <figure class="item_details"> 
                    
                        <img src="<?php echo "../items/".$item->item_foto?>" alt="item">
                    <form action="cart.php" method="POST">
                        <input type="hidden" name="cart_item_name" id="cart_item_name" value="<?php echo $item->item_name?>">
                        <input type="hidden" name="cart_item_price" id="cart_item_price" value="<?php echo $item->item_prize?>">
                        
                        <input type="hidden" name="customer_email" id="customer_email" value="<?php echo $user?>">
                        <figcaption>
                            <div class="menu_logo">
                                <img src="../images/temix_empire_logo2.png" alt="Temix Empire">
                            </div>
                            <div class="clear"></div>
                            <p><span>Name:</span> <?php echo $item->item_name?></p>
                            <p><span>Category:</span> <?php echo $item->item_category?></p>
                            <p><span>Amount:</span> ₦<?php echo number_format($item->item_prize)?></p>
                            
                            <input type="number" id="quantity" name="quantity" required placeholder="Select Quantity">
                            <button type="submit" name="add_to_cart" id="add_to_cart" title="add to cart" class="add_cart">Add to Cart <i class="fas fa-shopping-cart"></i></button>
                        </figcaption>
                    </form>
                </figure>
                <div class="item_descriptions">
                    <hr>
                    <h3>Item Descriptions</h3>
                    <p><?php echo $item->item_description;?></p>
                </div>
                <?php endforeach; }?>
            </div>
        </section>
        <section id="featured">
            
            <h2>Related items</h2>
            <div class="featured">
                <?php
                    $select_featured = $connectdb->prepare("SELECT * FROM menu WHERE item_name != :item_name AND item_category LIKE '%$category%' LIMIT 6");
                    $select_featured->bindvalue("item_name", $name);
                    $select_featured->execute();
                    $rows = $select_featured->fetchAll();
                    foreach($rows as $row):
                ?>
                <figure>
                    <a href="javascript:void(0);" onclick="showItems('<?php echo $row->item_id?>')">
                        <img src="<?php echo '../items/'.$row->item_foto;?>" alt="featured item">
                        <figcaption>
                            <div class="todo">
                            <p><?php echo $row->item_name?></p>
                            <p><i class="fas fa-layer-group"></i> <?php echo $row->item_category?></p>
                            <span>₦ <?php echo $row->item_prize?></spa>
                            </div>
                            
                        </figcaption>
                    </a>
                </figure>
                
                <?php endforeach ?>
            </div>
            <!-- <button id="view_more">View more</button>
            <button id="show_less">Show less</button> -->
        </section>
        <!--<section id="shop" class="row">
            
        </section> -->
        
    </main>
    <footer>
        <?php include"footer.php";?>
    </footer>
    <?php
        /* if(isset($_SESSION['error_box'])){
            echo "<div class='error_box'><p>" . $_SESSION['error_box'] . "</p>
            <button id='close_error'>Ok</button></div>";
            unset($_SESSION['error_box']);
        } */
    ?>
    
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