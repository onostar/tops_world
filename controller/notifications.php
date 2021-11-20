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
            echo $view->first_name . " " . $view->last_name. " - Notification centre";
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
    <section id="notification">
            <h2>Notifications and Messages</h2>
            <hr>
            
            <div class="notifications">
                <?php
                    $select_not = $connectdb->prepare("SELECT SUBSTRING_INDEX (details, ' ', 7) AS details, notification_id, status, notification_date, subject, customer_email FROM notifications WHERE customer_email = :customer_email ORDER BY notification_date DESC");
                    $select_not->bindvalue('customer_email', $user);
                    $select_not->execute();

                    $rows = $select_not->fetchAll();
                    foreach($rows as $row):
                ?>

                <div class="notify">
                    <?php if($row->status == 0){?>
                    <a href="javascript:void(0)" onclick="viewNotification('<?php echo $row->notification_id?>')">
                        <div class="not_sum">
                            <i class="fas fa-bell"></i>
                            <div class="not_details">
                                <h3 style="font-weight:bolder"><?php echo $row->subject?></h3>
                                <p style="font-weight:bolder"><?php echo $row->details?><span>......More</span></p>
                                
                            </div>
                           
                        </div>
                        <p class="notify_date"><?php echo date("jS M, Y", strtotime($row->notification_date));?></p>
                            <div class="clear"></div>
                    </a>
                    <?php }else{?>
                        <a href="javascript:void(0)" onclick="viewNotification('<?php echo $row->notification_id?>')">
                        <div class="not_sum">
                            <i class="fas fa-bell"></i>
                            <div class="not_details">
                                <h3 style="font-weight:normal"><?php echo $row->subject?></h3>
                                <p><?php echo $row->details?><span>......More</span></p>
                                
                            </div>
                        </div>
                        <p class="notify_date"><?php echo date("jS M, Y", strtotime($row->notification_date));?></p>
                        <!-- <div class="clear"></div>s -->
                    </a>
                    <?php }?>
                </div>
                <?php
                    endforeach;
                    
                    if(!$select_not->rowCount()){
                        echo "<p style='font-weight:bold; color:chocolate; text-transform:capitalize; font-size:1.3rem; text-align:center; margin-top:10px;'>No record found!</p>";
                    }
                ?>
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
        header("Location: ../registration.php");
    }
?> 