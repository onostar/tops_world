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
            echo $view->first_name . " " . $view->last_name. " - Contact Us";
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
        <section id="contactUs">
            <h2>Get in touch</h2>
            <hr>
            <div class="contact">
                <div class="contact_us">
                    <p>We are here to serve you</p>
                    <p><i class="fas fa-home"></i> For more information, pick ups of your items or to get a physical feel of our work, Kindly visit us at at our head office:<br>
                    Temix Empire, 124 Jakpa Road by Oru Standard Junction<br>Warri, Delta State</p><br>
                    <p><i class="fas fa-envelope-open-text"></i> You can also send a mail to: <br>info@temixempire.com<br>sales@temixempire.com</p><br>
                    <p><i class="fas fa-tty"></i> 07041350926<br>08157985866</p><br><br>
                    <p>You can also <a class="appointment" href="javascript:void(0);" title="Schedule an appointment">Book an Appointment</a> With us.
                    
                </div>
                <div class="contact_img">
                    <img src="../images/temix-empire-contact.jpg" alt="Temix Empire contact">
                </div>
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