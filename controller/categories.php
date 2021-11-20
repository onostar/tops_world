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
            echo $view->first_name . " " . $view->last_name. " - Search Results";
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
        <section id="searchResults">
            <?php
                if(isset($_POST['check_category'])){
                    $item_search = ucwords(htmlspecialchars(stripslashes($_POST['item_cat'])));

                    $search_query = $connectdb->prepare("SELECT * FROM menu WHERE item_name LIKE '%$item_search%' OR item_category LIKE '%$item_search%' ORDER BY item_name");
                    $search_query->execute();
                    
                }

            ?>
            <h2>Showing results for "<strong><?php echo $item_search?></strong>"</h2>
            <hr>
            <div class="results">
                
                <?php 
                    if(!$search_query->rowCount()){
                        echo "<p class='no_result'>'No result found!'</p>";
                    }
                    $shows = $search_query->fetchAll();
                    foreach($shows as $show):
                ?>
                <figure>
                    <a href="javascript:void(0);" onclick="showItems('<?php echo $show->item_id?>')">
                        <img src="<?php echo '../items/'.$show->item_foto;?>" alt="featured item">
                    </a>
                    <form action="cart.php" method="POST">
                        <input type="hidden" name="cart_item_name" id="cart_item_name" value="<?php echo $show->item_name?>">
                        <input type="hidden" name="cart_item_price" id="cart_item_price" value="<?php echo $show->item_prize?>">
                        <input type="hidden" name="customer_email" id="customer_email" value="<?php echo $user?>">
                        <input type="hidden" id="quantity" name="quantity" value="1">
                        <figcaption>
                            <div class="todo">
                                <p class="first"><?php echo $show->item_name?></p>
                                <p><i class="fas fa-layer-group"></i> <?php echo $show->item_category?></p>
                                <span>₦ <?php echo number_format($show->item_prize)?></span>
                            </div>
                            <button type="submit" name="add_to_cart" id="add_to_cart" title="add to cart" class="add_cart"><i class="fas fa-shopping-cart"></i></button>
                        </figcaption>
                    </form>
                </figure>
                
                <?php endforeach ?>
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
        header("Location: ../index.php");
    }
?> 