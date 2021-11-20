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
    <title>Temix - Search Results</title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
    <link rel="icon" type="image/png" href="images/temix_empire_logo1.jpg" size="32X32">
    <link rel="stylesheet" href="controller/style.css">
    
</head>
<body>
    <?php include "header.php";?>

    
    <?php include "mobile_menu.php";?>

    <main>
        <section id="searchResults">
            <?php
                if(isset($_POST['search'])){
                    $item_search = ucwords(htmlspecialchars(stripslashes($_POST['search_items'])));

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
                        <img src="<?php echo 'items/'.$show->item_foto;?>" alt="featured item">
                    </a>
                        <figcaption>
                            <div class="todo">
                                <p class="first"><?php echo $show->item_name?></p>
                                
                                <p><i class="fas fa-layer-group"></i> <?php echo $show->item_category?></p>
                                <span>₦ <?php echo number_format($show->item_prize)?></span>
                            </div>
                            
                        </figcaption>
                    
                </figure>
                
                <?php endforeach ?>
            </div>
        </section>

        
    </main>
    <?php include "footer.php"; ?>

    <!-- <script src="controller/bootstrap.min.js"></script> -->
    <script src="controller/jquery.js"></script>
    <script src="controller/script.js"></script>
    
</body>
</html>

