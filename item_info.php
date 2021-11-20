<?php
    require "controller/server.php";
    session_start();
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Temix Empire is a Catering Company, we are Specialized in Cakes of all kinds Like Wedding cakes, Birthday cakes, Anniversary cakes, chcocolate cakes, Coconut Cakes, Banana cakes and many others. We also provide Make-up service for weddings, Party, Birthdays and Photo Shoot, we supply quality beddings for Hotels, Schools, Hospitals and Homes. We also specialize in Event Planning, Decorations for all Occations, Fashionable Beads, and Graphic Designs. Temix Empire always serve up Quality of Service you can trust">
    <meta name="keywords" content="cakes, beddings, wedding cakes, birthday cakes, decorations, weddings, makeup, make-up, make-up artiste, event planning, events, chcocolate cakes, icing">
    <title>Temix Empire - Item info</title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
    <link rel="icon" type="image/png" href="../images/temix_empire_logo1.jpg" size="32X32">
    <link rel="stylesheet" href="controller/style.css">
    
</head>
<body>
    <?php include "header.php";?>

    
    <section id="bannerContents">
        
        <?php include "mobile_menu.php";?>

        
    </section>
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
                        $category = $item->item_category;
                        $name = $item->item_name;
                
            ?>
            <figure class="item_details"> 
                
                    <img src="<?php echo "items/".$item->item_foto?>" alt="item">
                <form>
                    <input type="hidden" name="cart_item_name" id="cart_item_name" value="<?php echo $item->item_name?>">
                    <input type="hidden" name="cart_item_price" id="cart_item_price" value="<?php echo $item->item_prize?>">
                    
                    <input type="hidden" name="customer_email" id="customer_email" value="<?php echo $user?>">
                    <figcaption>
                        <div class="menu_logo">
                            <img src="images/temix_empire_logo2.png" alt="Temix Empire">
                        </div>
                        <div class="clear"></div>
                        <p><span>Name:</span> <?php echo $item->item_name?></p>
                        <p><span>Category:</span> <?php echo $item->item_category?></p>
                        <p><span>Amount:</span> ₦<?php echo number_format($item->item_prize)?></p>
                        
                        <input type="number" id="quantity" name="quantity" required placeholder="Select Quantity">
                        <button type="submit" name="add_to_cart" id="add_to_cart" title="add to cart" class="add_cart" onclick="loginFirst()">Add to Cart <i class="fas fa-shopping-cart"></i></button>
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
    
    
    <?php
        include "footer.php";
    ?>
    
    <script src="controller/bootstrap.min.js"></script>
    <script src="controller/jquery.js"></script>
    <script src="controller/script.js"></script>
    
</body>
</html>

