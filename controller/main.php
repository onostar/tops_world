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
            echo $view->first_name . " " . $view->last_name. " - Temix Empire";
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
    <section id="bannerContents">
        <aside id="asideLeft" class="main_cat">
            <nav>
                <ul>
                    <li>
                        <form action="categories.php" method="POST">
                            <input type="hidden" name="item_cat" value="Men Wears">
                            <i class="fas fa-tshirt"></i> <input type="submit" value="Men's Clothing" name="check_category">
                        </form> 
                    </li>
                    <li>
                        <form action="categories.php" method="POST">
                            <input type="hidden" name="item_cat" value="Women Wears">
                            <i class="fas fa-female"></i> <input type="submit" value="Women's Clothing" name="check_category">
                        </form> 
                    </li>
                    <li>
                        <form action="categories.php" method="POST">
                            <input type="hidden" name="item_cat" value="Children">
                            <i class="fas fa-baby"></i> <input type="submit" value="Children" name="check_category">
                        </form>
                    </li>
                    <li>
                        <form action="categories.php" method="POST">
                            <input type="hidden" name="item_cat" value="Shoes">
                            <i class="fas fa-shoe-prints"></i> <input type="submit" value="Shoes" name="check_category">
                        </form>
                    </li>
                    
                    <li>
                        <form action="categories.php" method="POST">
                            <input type="hidden" name="item_cat" value="Glasses">
                            <i class="fas fa-glasses"></i> <input type="submit" value="Glasses" name="check_category">
                        </form>
                    </li>
                    
                    <li>
                        <form action="categories.php" method="POST">
                            <input type="hidden" name="item_cat" value="others">
                            <i class="fas fa-pizza-slice"></i> <input type="submit" value="Other categories" name="check_category">
                        </form>
                    </li>
                    
                    <li><a href="contact.php"title="Who we are"><i class="fas fa-users"></i><span>About us</span></a></li>
                    <li><a href="contact.php"title="Get in touch with us"><i class="far fa-address-book"></i><span>Contact us</span></a></li>
                    
                </ul>
            </nav>
        </aside>
        <?php include "mobile_menu.php";?>
        <section id="banner">
            <div class="slide">
                <div class="slides">
                    <?php
                        $get_banner1 = $connectdb->prepare("SELECT * FROM banner_ads WHERE banner_id = 1");
                        $get_banner1->execute();
                        $banners = $get_banner1->fetchAll();
                        foreach($banners as $banner):
                    ?>
                    <div class="slide_img">
                        <img src="<?php echo "../media/".$banner->photo;?>" alt="Temix Empire Banner">
                    </div>
                    <div class="description">
                        <h2><?php echo $banner->title;?></h2>
                        <p><?php echo $banner->banner_description;?></p>
                        <div class="links">
                            <a href="all_items.php"><i class="fas fa-shopping-cart"></i> Shop Now</a>
                        </div>
                        
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="slides">
                    <?php
                        $get_banner2 = $connectdb->prepare("SELECT * FROM banner_ads WHERE banner_id = 2");
                        $get_banner2->execute();
                        $banners = $get_banner2->fetchAll();
                        foreach($banners as $banner):
                    ?>
                    <div class="slide_img">
                        <img src="<?php echo "../media/".$banner->photo;?>" alt="Temix Empire Banner">
                    </div>
                    <div class="description">
                        <h2><?php echo $banner->title;?></h2>
                        <p><?php echo $banner->banner_description;?></p>
                        <div class="links">
                        <a href="all_items.php"><i class="fas fa-shopping-cart"></i> View Collections</a>
                        </div>
                        
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="slides">
                    <?php
                        $get_banner3 = $connectdb->prepare("SELECT * FROM banner_ads WHERE banner_id = 3");
                        $get_banner3->execute();
                        $banners = $get_banner3->fetchAll();
                        foreach($banners as $banner):
                    ?>
                    <div class="slide_img">
                        <img src="<?php echo "../media/".$banner->photo;?>" alt="Temix Empire Banner">
                    </div>
                    <div class="description">
                        <h2><?php echo $banner->title;?></h2>
                        <p><?php echo $banner->banner_description;?></p>
                        <div class="links">
                            <a href="all_items.php"><i class="fas fa-shopping-cart"></i> Shop Now</a>
                            
                        </div>
                        
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="slides">
                    <?php
                        $get_banner4 = $connectdb->prepare("SELECT * FROM banner_ads WHERE banner_id = 4");
                        $get_banner4->execute();
                        $banners = $get_banner4->fetchAll();
                        foreach($banners as $banner):
                    ?>
                    <div class="slide_img">
                        <img src="<?php echo "../media/".$banner->photo;?>" alt="Temix Empire Banner">
                    </div>
                    <div class="description">
                        <h2><?php echo $banner->title;?></h2>
                        <p><?php echo $banner->banner_description;?></p>
                        <div class="links">
                            <a href="all_items.php"><i class="fas fa-shopping-cart"></i> Shop Now</a>
                            <!-- <a href="gallery.php"><i class="fas fa-photo-video"></i> View Gallery</a> -->
                        </div>
                        
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </section>
        <!-- <aside id="asideRight">
            <nav id="help">
                <ul>
                    <li>
                        <a href="contact.php">
                            <i class="far fa-question-circle"></i>
                            <div class="note">
                                <h3>Help center</h3>
                                <p>Ask Temix</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="about.php">
                            <i class="fas fa-street-view"></i>
                            <div class="note">
                                <h3>About us</h3>
                                <p>Who we are</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="fas fa-hand-holding-usd"></i>
                            <div class="note">
                                <h3>Refunds</h3>
                                <p>Money back guarantee</p>
                            </div>
                        </a>
                    </li>                          
                </ul>
            </nav>
            <div id="adds">
                <?php
                    $get_ad = $connectdb->prepare("SELECT * FROM banner_ads WHERE banner_id = 5");
                    $get_ad->execute();
                    $ads = $get_ad->fetchAll();
                    foreach($ads as $ad):
                ?>
                <img src="<?php echo "../media/".$ad->photo;?>" alt="Temix ads">
                <?php endforeach;?>
            </div>
        </aside> -->
    </section>
    <section id="links">
        <div class="link_tags">
            <a href="javscript:void(0);">
                <i class="fas fa-headset"></i>
                <p>24/7 Online Support</p>
            </a>
        </div>
        <div class="link_tags">
            <a href="javascript:void(0)">
                <i class="fas fa-hand-holding-usd"></i>
                <p>Money back guarantee</p>
            </a>
        </div>
        <div class="link_tags">
            <a href="javascript:void(0)">
                <i class="fas fa-bus"></i>
                <p>Fast Delivery Service</p>
            </a>
        </div>
        <div class="link_tags">
            <a href="javascript:void(0)">    
                <i class="fas fa-users"></i>
                <p>Best Partners</p>
            </a>
        </div>
    </section>
    <main>
        <section id="featured">
            
            <h2>Featured Items</h2>
            <div class="featured">
                <?php
                    $select_featured = $connectdb->prepare("SELECT * FROM menu WHERE featured_item = 1 ORDER BY time_created DESC LIMIT 6");
                    $select_featured->execute();
                    $rows = $select_featured->fetchAll();
                    foreach($rows as $row):
                ?>
                <figure>
                    <form method="POST" action="cart.php">
                        <a href="javascript:void(0);" onclick="showItems('<?php echo $row->item_id?>')">
                        <img src="<?php echo '../items/'.$row->item_foto;?>" alt="featured item" title="click to view details">
                        </a>
                        <input type="hidden" name="cart_item_name" id="cart_item_name" value="<?php echo $row->item_name?>">
                        <input type="hidden" name="cart_item_price" id="cart_item_price" value="<?php echo $row->item_prize?>">
                        
                        <input type="hidden" name="customer_email" id="customer_email" value="<?php echo $user?>">
                        <input type="hidden" id="quantity" name="quantity" value="1">
                        <figcaption>
                            <div class="todo">
                                <p><?php echo $row->item_name?></p>
                                <p><i class="fas fa-layer-group"></i> <?php echo $row->item_category?></p>
                                <span>₦ <?php echo number_format($row->item_prize)?></span>
                            </div>
                            <!-- <button type="submit" name="add_to_cart" id="add_to_cart" title="add to cart" class="add_cart"><i class="fas fa-shopping-cart"></i></button> -->
                        </figcaption>
                    </form>
                </figure>
                
                <?php endforeach ?>
            </div>
            <!-- <button id="view_more">View more</button>
            <button id="show_less">Show less</button> -->
        </section>
        <section id="popular">
            <h2>Today's Popular Items <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></h2>
            <div class="all_items popular_items">
                <?php
                     $select_all = $connectdb->prepare("SELECT * FROM menu RIGHT JOIN orders USING (item_name) WHERE orders.order_date = CURDATE() GROUP BY orders.item_name HAVING SUM(orders.quantity) >= 3 ORDER BY orders.delivery_date LIMIT 6");
                     
                     $select_all->execute();
                     $rows = $select_all->fetchAll();
                     foreach($rows as $row):
                ?>
                <figure>
                    <form action="cart.php" method="POST">
                        <a href="javascript:void(0);" onclick="showItems('<?php echo $row->item_id?>')">
                            <img src="<?php echo '../items/'.$row->item_foto;?>" alt="featured item" title="click to view details">
                        </a>
                        <input type="hidden" name="cart_item_name" id="cart_item_name" value="<?php echo $row->item_name?>">
                        <input type="hidden" name="cart_item_price" id="cart_item_price" value="<?php echo $row->item_prize?>">
                        
                        <input type="hidden" name="customer_email" id="customer_email" value="<?php echo $user?>">
                        <input type="hidden" id="quantity" name="quantity" value="1">
                        <figcaption>
                            <div class="todo">
                                <p><?php echo $row->item_name?></p>
                                <p><i class="fas fa-layer-group"></i> <?php echo $row->item_category?></p>
                                <span>₦ <?php echo number_format($row->item_prize)?></span>
                            </div>
                            <button type="submit" name="add_to_cart" id="add_to_cart" title="add to cart" class="add_cart"><i class="fas fa-shopping-cart"></i></button>
                        </figcaption>
                    </form>
                </figure>
                
                <?php endforeach ?>
                
            </div>
            <!-- <button id="more_popular">View more</button>
            <button id="less_popular">Show less</button> -->
        </section>
        <!-- daily deals -->
        <section id="daily_deals">
            <h2>Don't miss out on these deals!</h2>
            <div class="deals">
                <?php
                    $get_deals = $connectdb->prepare("SELECT * FROM menu WHERE daily_deal = 1 ORDER BY time_created DESC");
                    $get_deals->execute();
                    $deals = $get_deals->fetchAll();
                    foreach($deals as $deal):
                ?>
                <figure>
                    <a href="javascript:void(0);" onclick="showItems('<?php echo $deal->item_id?>')">
                        <div class="deals_img">
                            <img src="<?php echo "../items/" . $deal->item_foto?>" alt="<?php echo $deal->item_name;?>">
                        </div>
                        <figcaption>
                            <div class="restaurant_logo">
                                <img src="../images/temix_empire_logo2.png" alt="Temix empire">
                            </div>
                            <p><?php echo $deal->item_name?></p>
                            <p class="item_price">₦ <?php echo number_format($deal->item_prize)?></p>
                            <p class="previous_price">₦ <?php echo number_format($deal->previous_price)?></p>
                        </figcaption>
                    </a>
                </figure>
                <?php endforeach?>
            </div>
        </section>
        <section class="featured_category">
            
            <h2>Classic Beddings</h2>
            <div class="featured">
                <?php
                    $select_featured = $connectdb->prepare("SELECT * FROM menu WHERE item_category = 'bed sheets' ORDER BY time_created DESC LIMIT 6");
                    $select_featured->execute();
                    $rows = $select_featured->fetchAll();
                    foreach($rows as $row):
                ?>
                <figure>
                    <form method="POST" action="cart.php">
                        <a href="javascript:void(0);" onclick="showItems('<?php echo $row->item_id?>')">
                        <img src="<?php echo '../items/'.$row->item_foto;?>" alt="featured item" title="click to view details">
                        </a>
                        <input type="hidden" name="cart_item_name" id="cart_item_name" value="<?php echo $row->item_name?>">
                        <input type="hidden" name="cart_item_price" id="cart_item_price" value="<?php echo $row->item_prize?>">
                        
                        <input type="hidden" name="customer_email" id="customer_email" value="<?php echo $user?>">
                        <input type="hidden" id="quantity" name="quantity" value="1">
                        <figcaption>
                            <div class="todo">
                                <p><?php echo $row->item_name?></p>
                                <p><i class="fas fa-layer-group"></i> <?php echo $row->item_category?></p>
                                <span>₦ <?php echo number_format($row->item_prize)?></span>
                            </div>
                            <!-- <button type="submit" name="add_to_cart" id="add_to_cart" title="add to cart" class="add_cart"><i class="fas fa-shopping-cart"></i></button> -->
                        </figcaption>
                    </form>
                </figure>
                
                <?php endforeach ?>
            </div>
            <form action="categories.php" method="POST">
                <input type="hidden" name="item_cat" value="bed sheets">
                <button id="more" type="submit" name="check_category">View more <i class="fas fa-angle-double-right"></i></button>
            </form>
        </section>
        <section id="all_items">
        <h2>Check out more collections</h2>
            <div class="all_items">
                <?php
                    $select_all = $connectdb->prepare("SELECT * FROM menu ORDER BY time_created DESC LIMIT 6");
                    $select_all->execute();
                    $rows = $select_all->fetchAll();
                    foreach($rows as $row):
                ?>
                <figure>
                    <form action="cart.php" method="POST">
                        <a href="javascript:void(0);" onclick="showItems('<?php echo $row->item_id?>')">
                            <img src="<?php echo '../items/'.$row->item_foto;?>" alt="featured item" title="click to view details">
                        </a>
                        <input type="hidden" name="cart_item_name" id="cart_item_name" value="<?php echo $row->item_name?>">
                        <input type="hidden" name="cart_item_price" id="cart_item_price" value="<?php echo $row->item_prize?>">
                        
                        <input type="hidden" name="customer_email" id="customer_email" value="<?php echo $user?>">
                        <input type="hidden" id="quantity" name="quantity" value="1">
                        <figcaption>
                            <div class="todo">
                                <p><?php echo $row->item_name?></p>
                                <p><i class="fas fa-layer-group"></i> <?php echo $row->item_category?></p>
                                <span>₦ <?php echo number_format($row->item_prize)?></span>
                            </div>
                            <button type="submit" name="add_to_cart" id="add_to_cart" title="add to cart" class="add_cart"><i class="fas fa-shopping-cart"></i></button>
                        </figcaption>
                    </form>
                </figure>
                
                <?php endforeach ?>
                
            </div>
            <button id="more"><a href="all_items.php">View more <i class="fas fa-angle-double-right"></i></a></button>
            <!-- <button id="less">Show less</button> -->
        </section>
        <section id="recommendedItems">
        <h2>Recommended for you</h2>
            <div class="all_items">
                <?php
                    $select_all = $connectdb->prepare("SELECT orders.customer_email, orders.item_name, menu.item_id, menu.item_category, menu.item_name, menu.item_prize, menu.item_foto, menu.item_description FROM orders, menu WHERE orders.customer_email = :customer_email AND menu.item_name = orders.item_name GROUP BY orders.item_name LIMIT 6");
                    $select_all->bindvalue('customer_email', $user);
                    $select_all->execute();
                    $rows = $select_all->fetchAll();
                    foreach($rows as $row):
                ?>
                <figure>
                    <form action="cart.php" method="POST">
                        <a href="javascript:void(0);" onclick="showItems('<?php echo $row->item_id?>')">
                            <img src="<?php echo '../items/'.$row->item_foto;?>" alt="featured item" title="click to view details">
                        </a>
                        <input type="hidden" name="cart_item_name" id="cart_item_name" value="<?php echo $row->item_name?>">
                        <input type="hidden" name="cart_item_price" id="cart_item_price" value="<?php echo $row->item_prize?>">
                        
                        <input type="hidden" name="customer_email" id="customer_email" value="<?php echo $user?>">
                        <input type="hidden" id="quantity" name="quantity" value="1">
                        <figcaption>
                            <div class="todo">
                            <p><i class="fas fa-layer-group"></i> <?php echo $row->item_category?></p>
                                <span>₦ <?php echo number_format($row->item_prize)?></span>
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
    <?php
        /* if(isset($_SESSION['error_box'])){
            echo "<div class='error_box'><p>" . $_SESSION['error_box'] . "</p>
            <a id='close_error'>Ok</button></a>";
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
        header("Location: ../index.php");
    }
?> 