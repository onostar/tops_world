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
    <title>Temix Empire | About us</title>
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
    <section id="existence">
        <h2>Get to know us</h2>
        <hr>
        <h3>Our Existence</h3>
        <div class="story">
            <p>Temix Empire is a Catering Company, located in Warri, Nigeria. Founded by Omotoye Temidayo Mabel in 2015.<br>We are  specialized in Cake making for all kinds of occassions which include; Weddings, Birthdays, Anniversaries, etc, as well as planning events and decoration for your weddings, birthdays, anniversaries and more.<br>We also supply quality beddings for Hotels, Schools, Hospitals and Homes.<br><br>What makes us stand out amongst others is our creativity and commitment to quality, and exceptional customer service is at the heart of what we do. We always put our clients needs first.<br>We advice our clients on the best options for any service/product we are rendering. Our products/service are very economical.<br>All our products are made from premium quality ingredients with special touches to suite your need.<br><br>Temix Empire always serve up trusted Quality of Service. Contact us today, lets make your occassion an elegant and memorable one.<br>
                <a href="contact.php" title="contact us">Visit us today</a> or <br><a class="appointment schedule" href="javascript:void(0);" title="Book an Appointment">Schedule an Appointment</a>
            </p>
            <div class="story_img">
                <img src="images/Temix_baking.jpg" alt="Temix Empire">
            </div>
        </div>
    </section>
    <section id="hero">
        <div class="hero_image">
            <img src="images/events.jpg" alt="hero image">
        </div>
        <div class="hero_notes">
            <div class="note">
                <h3>100+</h3>
                <p>Customers</p>
            </div>
            <div class="note">
                <h3>20+</h3>
                <p>Events Covered</p>
            </div>
            <div class="note">
                <h3>10</h3>
                <p>Staffs</p>
            </div>
            <div class="note">
                <h3>5+</h3>
                <p>Years of Experience</p>
            </div>
        </div>
    </section>
    <section id="mission_vision" >
        <h2>Our purpose</h2>
        <hr>
        <div class="mission_vision">
            <div class="misvis" id="miss">
                <h3>Our mission statement</h3>
                <p>Our efforts are tailored towards making sure that our clients are satisfied, hence ending their search for satisfactio</p>
            </div>
            <hr>
            <div class="misvis" id="viss">
                <h3>Our vision</h3>
                <p>We aim To be the first choice of consumers in the southern Region of Nigeria and beyond, as well as create a benchmark in quality standards in cake making and events planning.<br>To be a leading cake maker, trainer, and event manager offering best Quality of Service/products.
                </p>
            </div>
        </div>
    </section>
        
    
    <?php include "footer.php";?>
    <script src="controller/bootstrap.min.js"></script>
    <script src="controller/jquery.js"></script>
    <script src="controller/script.js"></script>
    
</body>
</html>