<?php
    session_start();
    require "controller/server.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Temix Empire is a Catering Company, we are Specialized in Cakes of all kinds Like Wedding cakes, Birthday cakes, Anniversary cakes, chcocolate cakes, Coconut Cakes, Banana cakes and many others. We also provide Make-up service for weddings, Party, Birthdays and Photo Shoot, we supply quality beddings for Hotels, Schools, Hospitals and Homes. We also specialize in Event Planning, Decorations for all Occations, Fashionable Beads, and Graphic Designs. Temix Empire always serve up Quality of Service you can trust">
    <meta name="keywords" content="cakes, beddings, wedding cakes, birthday cakes, decorations, weddings, makeup, make-up, make-up artiste, event planning, events, chcocolate cakes, icing">
    <title>Temix Empire | Login/Register</title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
    <link rel="icon" type="image/png" href="images/temix_empire_logo1.jpg" size="32X32">
    <link rel="stylesheet" href="controller/style.css">
    
</head>
<body>
    <?php include "header.php";?>

    
    <section id="bannerContents">
        
        <?php include "mobile_menu.php";?>
        
        
    </section>
    <main>
        <div class="success">
            <?php
                if(isset($_SESSION['success'])){
                    echo "<p>" .$_SESSION['success']. "</p>";
                    unset($_SESSION['success']);
                }
            ?>
        </div>
        <section id="login_reg">
            <div class="login_details">
                <div class="error">
                    <?php
                        if(isset($_SESSION['error'])){
                            echo "<p>". $_SESSION['error']. "</p>";
                            unset($_SESSION['error']);
                        }
                    ?>
                </div>
                <h2>Enter login details</h2>
                <form action="controller/login.php" method="post">
                    <label for="login">Email</label><br>
                    <input type="email" name="email" id="login" placeholder="Enter your email" required><br><br>
                    <label for="password">Password</label><br>
                    <input type="password" name="user_password" id="password" placeholder="Enter password" required><br>
                    <button type="submit" name="submit_login">Login</button>
                </form>
            </div>
                
            <div class="reg_details">
                <h2>Register for a new account</h2>
                <div class="error">
                    <?php
                        if(isset($_SESSION['error'])){
                            echo "<p>". $_SESSION['error']. "</p>";
                            unset($_SESSION['error']);
                        }
                    ?>
                </div>
                <form action="controller/register.php" method="POST">
                    <div class="details">
                        <input type="text" name="first_name" placeholder="First Name">
                        <input type="text" name="last_name" placeholder="Last Name">
                    </div>
                    <div class="details">
                        <input type="email" name="email" placeholder="Email">
                        <input type="tel" name="phone_number" placeholder="Phone Number">
                    </div>
                    <div class="details">
                        <input type="password" name="user_password" placeholder="enter password">
                        <input type="password" name="confirm_password" placeholder="Confirm password">
                    </div>
                    <button type="submit" name="submit_reg">Register</button>
                </form>
            </div>
        </section>
        <div class="appointment_page">
        <div class="result"></div>

            <div id="appointment_page">
                <div id="close">
                    <a href="javascript:void(0)" title="Close"><i class="fas fa-window-close"></i></a>
                </div>
                <h2>Appointment Booking form</h2>
                <form method="POST" action="controller/appointment.php">
                    <div class="inputs">
                        <div class="data">
                            <label for="customer_name">Full Name</label><br>
                            <input type="text" id="customer_name" name="customer_name" placeholder="James Awolowo" required>
                        </div>
                        <div class="data">
                            <label for="customer_phone">Phone Number</label><br>
                            <input type="tel" id="customer_phone" name="customer_phone" placeholder="+237012345678" required>
                        </div>
                    </div>
                    <div class="inputs">
                        <div class="data">
                            <label for="customer_email">Email address</label><br>
                            <input type="email" id="customer_mail" name="customer_mail" placeholder="mail@example.com" required>
                        </div>
                        <div class="data">
                            <label for="service">Type of service</label><br>
                            <select name="service" id="service" required>
                                <option value="" selected>Select Service type</option>
                                <option value="Event (Decoration)">Events (Decoration)</option>
                                <option value="Event (Cake design)">Events (Cake Design)</option>
                                <option value="General Appontment" >General Appointment</option>
                            </select>
                        </div>
                    </div>
                    <div class="inputs">
                        <div class="data">
                            <label for="appointment_date">Appointment date</label><br>
                            <input type="date" id="appointment_date" name="appointment_date" required>
                        </div>
                        <div class="data">
                            <label for="appointment_addresss">Event/Booking Address</label><br>
                            <input type="text" id="appointment_address" name="appointment_address" required>
                        </div>
                    </div>
                    <div class="inputs">
                        <div class="data" id="textarea">
                            <textarea name="notes" id="notes" rows="5" placeholder="Add more information/description of your Event"></textarea>
                        </div>
                        <div class="data">
                            <button type="submit" id="book" name="book">Book Appointment <i class="fas fa-paper-plane"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    
    <script src="controller/bootstrap.min.js"></script>
    <script src="controller/jquery.js"></script>
    <script src="controller/script.js"></script>
</body>
</html>