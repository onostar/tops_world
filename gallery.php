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
    <title>Temix Empire | Gallery</title>
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
    <main>
        <div id="events_media">
            <h3>Our Media Gallery</h3>
            <hr>
            <p>Take a peek at our world</p>
            <div class="mediaBtns">
                <button id="photoBtn" data-media="photos">Photos</button>
                <button id="videoBtn" data-media="video">Videos</button>
            </div>
            <div class="gallery" id="photos">
                <?php
                    $get_media = $connectdb->prepare("SELECT * FROM media WHERE media_type = 'photo' ORDER BY upload_date DESC");
                    $get_media->execute();

                    $photos = $get_media->fetchAll();
                    foreach($photos as $photo):
                ?>
                <figure>
                    <img src="<?php echo "media/". $photo->foto;?>" alt="Temix Media">
                    <figcaption>
                        <p><?php echo $photo->description;?></p>
                    </figcaption>
                </figure>
                <?php endforeach;?>
            </div>
            <div class="gallery" id="video">
                <?php
                    $get_media = $connectdb->prepare("SELECT * FROM media WHERE media_type = 'video' ORDER BY upload_date DESC");
                    $get_media->execute();

                    $photos = $get_media->fetchAll();
                    foreach($photos as $photo):
                ?>
                <figure>
                    <video controls src="<?php echo "media/". $photo->foto;?>" alt="Temix Media"></video>
                    <figcaption>
                        <p><?php echo $photo->description;?></p>
                    </figcaption>
                </figure>
                <?php endforeach;?>
            </div>
        </div>
    </main>
    
    <?php include "footer.php";?>
    <script src="controller/bootstrap.min.js"></script>
    <script src="controller/jquery.js"></script>
    <script src="controller/script.js"></script>
    
</body>
</html>