<?php
    require "server.php";
    session_start();
    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
   
        if(isset($_GET['event'])){
        $booking_id = $_GET['event'];

        $select_event = $connectdb->prepare("SELECT * FROM appointments WHERE booking_id = :booking_id");
        $select_event->bindvalue("booking_id", $booking_id);
        $select_event->execute();

        $views = $select_event->fetchAll();
        foreach($views as $view):
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Temix Empire is a Catering Company, we are Specialized in Cakes of all kinds Like Wedding cakes, Birthday cakes, Anniversary cakes, chcocolate cakes, Coconut Cakes, Banana cakes and many others. We also provide Make-up service for weddings, Party, Birthdays and Photo Shoot, we supply quality beddings for Hotels, Schools, Hospitals and Homes. We also specialize in Event Planning, Decorations for all Occations, Fashionable Beads, and Graphic Designs. Temix Empire always serve up Quality of Service you can trust">
    <meta name="keywords" content="cakes, beddings, wedding cakes, birthday cakes, decorations, weddings, makeup, make-up, make-up artiste, event planning, events, chcocolate cakes, icing">
    <title>Temix Empire Administrator</title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
    <link rel="icon" type="image/png" href="images/temix_empire_logo1.jpg" size="32X32">
    <link rel="stylesheet" href="style.css">
    
</head>
<body id="mainBody">
    <header class="admin_header">
        <h1 class="logo">
            <a href="admin.php" title="home">
                <img src="images/temix_empire_logo2.png" alt="Temix empire" class="img-fluid">
            </a>
        </h1>
        <div class="rms">
            <h2>Admin Control Panel</h2>
            
        </div>
        <div class="login">
            <button id="loginDiv"><i class="far fa-user"></i> 
                <?php 
                    /* $statement = $connectdb->prepare("SELECT * FROM users WHERE email = :email");
                    $statement->bindvalue('email', $user);
                    $statement->execute();
                    $infos = $statement->fetchAll();
                    foreach($infos as $info){
                        echo "Hello $info->first_name";
                    }
                       */
                ?> Hello Admin
                <i class="fas fa-chevron-down"></i></button>
            <div class="login_option" id="account">
                <div>
                    <a href="javascript:void(0);" class="signupBtn">Change Password</a>
                    <!-- <a href="javascript:void(0);" class="signupBtn">My orders</a> -->
                    <button id="logoutBtn"><a href="logout.php">Logout</a></button>
                    
                </div>
            </div>
        </div>
        <div class="menu_icon">
            <a href="javascript:void(0)"><i class="fas fa-bars"></i></a>
        </div>
    </header>
    <main class="admin_main">
        <?php include "navigation.php";?>

        
        
        <section id="contents">
            <div class="success_message">
                <p>
                    <?php
                        if(isset($_SESSION['success'])){
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                        }
                    ?>
                </p>
            </div>
            <div class="error_message">
                <p>
                    <?php
                        if(isset($_SESSION['error'])){
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                    ?>
                </p>
            </div>
            
            <!-- Events info -->
            <div class="management" id="events_info">
                
                <h3><?php echo $view->service;?></h3>
                <hr>
                <div class="events">
                    <div class="appointments">
                        <div class="event_info">
                            <p style="text-transform:uppercase;"><strong></strong><?php echo $view->customer_name;?></p>
                            <p><?php echo $view->customer_phone;?></p>

                        </div>
                        <div class="event_date">
                            <p><strong>Address: </strong><?php echo $view->appointment_address;?></p>
                            <p><strong>Date: </strong><?php echo $view->appointment_date;?></p>
                        </div>
                    </div>
                    <div class="event_descriptions">
                        <h4>Description</h4>
                        <hr>
                        <p><?php echo $view->notes;?></p>
                    </div>
                    
                    <div class="status">
                        <?php
                            $event_status = $view->status;
                            if($event_status == 1){
                                echo "<p class='stat' id='complete'><i class='fas fa-flag'></i> Completed</p>";
                            }elseif($event_status == -1){
                                echo "<p class='stat cancelled'><i class='fas fa-flag'></i> Cancelled </p>";
                            }else{
                        ?>
                        <button id="eventDone" onclick="eventDone('<?php echo $view->booking_id;?>')">Done <i class="fas fa-thumbs-up"></i></button>
                        <button id="eventCancelled" onclick="eventCancelled('<?php echo $view->booking_id;?>')">Cancel <i class="fas fa-trash"></i></button>
                    </div>
                    <div class="clear"></div>
                </div>

                <?php }; endforeach; }?>            
            </div>
            <!-- Upload Videos -->
            <div id="createUser">    
                <div class="info"></div>
                <div class="add_user_form">
                    <h3>Upload Videos to Gallery</h3>
                    <form method="POST" action="add_media.php" enctype="multipart/form-data">
                        <div class="inputs">
                            <input type="hidden" name="media_type" value="video">
                            <div class="data">
                                <label for="description">Title</label>
                                <input type="text" name="description" placeholder="Video Description" required>
                            </div>
                            <div class="data">
                                <label for="Videos">Select Videos</label><br>
                                <input type="file" name="media_photo" id="mediaPhoto">
                            </div>
                            
                        </div>
                        <button type="submit" name="add_photo" id="add_photo">Add Video <i class="fas fa-video"></i></button>
                        
                    </form>
                </div>
            </div>
            <!-- Upload Photo -->
            <div id="addRestaurant">
                <div class="info"></div>
                <div class="add_user_form">
                    <h3>Upload Photos to Gallery</h3>
                    <form method="POST" action="add_media.php" enctype="multipart/form-data">
                        <div class="inputs">
                            <input type="hidden" name="media_type" value="photo">
                            <div class="data">
                                <label for="description">Title</label>
                                <input type="text" name="description" placeholder="Photo description" required>
                            </div>
                            <div class="data">
                                <label for="restaurantLogo">Select Image</label><br>
                                <input type="file" name="media_photo" id="mediaPhoto">
                            </div>
                            
                        </div>
                        <button type="submit" name="add_photo" id="add_photo">Add Photo <i class="fas fa-photo-video"></i></button>
                        
                    </form>
                </div>
            </div>
            <!-- Upload Banner and Adverts -->
            <?php include "banner_ads.php";?>
            <!-- add categories -->
            <div id="addCategories">
                <div class="info"></div>
                <div class="add_user_form">
                    <h3>Add Item Category</h3>
                    <form method="POST"  id="addCatForm">
                        <div class="inputs">
                            <div class="data">
                                <input type="text" name="category" id="category" placeholder="Enter item category" required>
                            </div>
                            <button type="submit" id="add_categories" name="add_categories">Add Category <i class="fas fa-sink"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- add items -->
            <div id="addItems">
                <div class="info"></div>
                <div class="add_user_form">
                    <h3>Add items to Store</h3>
                    <form method="POST" id="addItemForm" action="add_items.php" enctype="multipart/form-data">
                        <div class="inputs">
                            
                            <div class="data">
                                <label for="menu_category">Category</label><br>
                                <select name="item_category" id="item_category" required>
                                    <option value="" selected>Select Item Categroy</option>
                                    <?php
                                        $select_category = $connectdb->prepare("SELECT category from categories ORDER BY category");
                                        $select_category->execute();
                                        $rows = $select_category->fetchAll();
                                        foreach($rows as $row):
                                    ?>
                                    <option value="<?php echo $row->category;?>"><?php echo $row->category;?></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                            <div class="data">
                                <label for="item_name">Item Name</label>
                                <input type="text" name="menu_item" id="menu_item" placeholder="Enter item Name" required>
                            </div>
                        </div>
                        <div class="inputs">
                            
                            <div class="data">
                                <label for="item_prize">Item Prize</label>
                                <input type="number" name="menu_prize" id="menu_prize" placeholder="Item prize" required>
                            </div>
                            <div class="data">
                                <label for="item_foto">Upload Item Photo</label>
                                <input type="file" name="item_foto" id="item_foto" placeholder="Enter item Name" required>
                            </div>   
                        </div>
                        <div class="inputs">
                            
                            <div class="data">
                                <textarea name="item_description" id="item_description" placeholder="Item Description and notes"></textarea>
                            </div>
                            <div class="data">
                                <button type="submit" id="add_items" name="add_items">Add item <i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
            
            <!-- delete items -->
            <div id="deleteItems">
                <div class="info"></div>
                <div class="add_user_form">
                    <h3>Delete Item from Inventory</h3>
                    <form method="POST" id="deleteItemForm">
                        <div class="inputs">
                            <div class="data">
                                <label for="itemName">Slect item</label><br>
                                <select name="itemToDelete" id="itemToDelete" required>
                                    <option value="" selected>Select item</option>
                                    <?php
                                    $select_item = $connectdb->prepare("SELECT item_name from menu ORDER BY item_name ASC");
                                    $select_item->execute();
                                    $rows = $select_item->fetchAll();
                                    foreach($rows as $row):
                                    ?>
                                    <option value="<?php echo $row->item_name;?>"><?php echo $row->item_name;?></option>
                                
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" id="delete_item" name="delete_item">Delete <i class="fas fa-trash"></i></button>
                    </form>
                </div>
            </div>
            
            <!-- menu items -->
            <div id="menuList" class="management">
                <h3>Item List with Price</h3>
                <hr>
                <div class="search">
                    <input type="search" id="searchMenus" placeholder="Enter keyword">
                </div>
                <table id="menuTable">
                    <thead>
                        <tr>
                            <td>S/N</td>
                            <!-- <td>Restaurant Name</td> -->
                            <td>Name of Item</td>
                            <td>Category</td>
                            <td>Selling Price</td>
                        </tr>
                    </thead>

                    <?php
                        $n = 1;
                        $select_menu = $connectdb->prepare("SELECT * FROM menu ORDER BY item_name");

                        $select_menu->execute();
                        
                        $rows = $select_menu->fetchAll();
                        foreach($rows as $row):
                    ?>
                    <tbody>
                        <tr>
                            <td style="text-align:Center;"><?php echo $n?></td>
                            
                            <td><?php echo $row->item_name?></td>
                            <td><?php echo $row->item_category?></td>
                            <td>₦ <?php echo number_format($row->item_prize)?></td>
                        </tr>
                    </tbody>

                    <?php $n++; endforeach;?>
                </table>
            </div>
            <!-- modify price list -->
            <div id="priceList" class="management">
                <h3>Modify Item Price</h3>
                <hr>
                <div class="info"></div>
                <div class="search">
                    <input type="search" id="searchPrice" placeholder="Enter keyword">
                </div>
                <table id="priceTable">
                    <thead>
                        <tr>
                            <td>S/N</td>
                            <!-- <td>Restaurant Name</td> -->
                            <td>menu</td>
                            <td>Modify Price</td>
                        </tr>
                    </thead>

                    <?php
                        $n = 1;
                        $select_itemss = $connectdb->prepare("SELECT * FROM menu ORDER BY item_name");

                        $select_itemss->execute();
                        
                        $rows = $select_itemss->fetchAll();
                        foreach($rows as $row):
                    ?>
                    <tbody>
                        <tr>
                            <td style="text-align:center;"><?php echo $n?></td>
                            
                            <td><?php echo $row->item_name?></td>
                            <td class="prices">
                                <form method="POST" action="change_price.php">
                                    <input type="hidden" name="item_id" id="item_id" value="<?php echo $row->item_id?>">
                                    <input type="text" name="item_prize" id="item_prize" title="Click to edit price" value="<?php echo $row->item_prize;?>"><button type="submit" name="change_prize" id="changePrize"><i class="fas fa-thumbs-up"></i></button>
                                </form>
                            </td>
                        </tr>
                    </tbody>

                    <?php $n++; endforeach;?>
                </table>
            </div>
            
            <!-- featured items -->
            <div id="featuredItems" class="management">
                <div class="info"></div>
                <div class="add_user_form" id="addFeatured">
                    <h3 style="color:#fff;">Add featured items</h3>
                    <form method="POST"  id="deleteItemForm">
                        <div class="inputs">
                            
                            <div class="data">
                                <label for="itemName">Select Item</label><br>
                                <select name="featuredItem" id="featuredItem" required>
                                    
                                    <option value="" selected>Select item</option>
                                    <?php
                                        $get_featured = $connectdb->prepare("SELECT * FROM menu ORDER BY item_name");
                                        $get_featured->execute();
                                        $items = $get_featured->fetchAll();
                                        foreach($items as $item):
                                    ?>
                                    <option value="<?php echo $item->item_id;?>"><?php echo $item->item_name;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" id="add_feat" name="add_feat">Add item <i class="fas fa-plus"></i></button>
                    </form>
                </div>
                <h3>Temix Featured Items</h3>
                <hr>
                <!-- <div class="search">
                    <input type="search" id="searchUsers" placeholder="Enter keyword">
                </div> -->
                <div class="newTable">
                    <table id="featuredTable">
                    
                        <thead>
                            <tr>
                                <td>S/N</td>
                                
                                <td>Item name</td>
                                <td>Item price</td>
                                <td>Action</td>
                            </tr>
                        </thead>

                        <?php
                            $n = 1;
                            $select_user = $connectdb->prepare("SELECT * FROM menu WHERE featured_item = 1 ORDER BY item_name");

                            $select_user->execute();
                            
                            $rows = $select_user->fetchAll();
                            foreach($rows as $row):
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $n?></td>
                                
                                <td><?php echo $row->item_name?></td>
                                <td><?php echo number_format($row->item_prize);?></td>
                                <td><button style="background:transparent; border:none; width:80%; margin:0 auto;" title="remove from featured" onclick="removeFeatured('<?php echo $row->item_id?>')"><i class="fas fa-trash" style="color:red; font-size:1.3rem; text-align:center;" ></i></button></td>
                            </tr>
                            
                        </tbody>
                        <?php $n++; endforeach;?>
                        
                    </table>
                </div>
            </div>
            <!-- cutomer list -->
            <div id="customers" class="management">
                <h3>List of Customers</h3>
                <hr>
                <div class="search">
                    <input type="search" id="searchCustomers" placeholder="Enter keyword">
                </div>
                <table id="customerTable">
                    <thead>
                        <tr>
                            <td>S/N</td>
                            <td>Customer Name</td>
                            <td>Email Address</td>
                            <td>Phone Number</td>
                            <td>Residential Address</td>
                            
                        </tr>
                    </thead>

                    <?php
                        $n = 1;
                        $select_customer = $connectdb->prepare("SELECT * FROM users WHERE email != 'admin@temixempire.com' ORDER BY first_name");

                        $select_customer->execute();
                        
                        $rows = $select_customer->fetchAll();
                        foreach($rows as $row):
                    ?>
                    <tbody>
                        <tr>
                            <td style="text-align:center;"><?php echo $n?></td>
                            <td><?php echo $row->first_name . " " .$row->last_name?></td>
                            <td><?php echo $row->email?></td>
                            <td><?php echo $row->phone_number?></td>
                            <td><?php echo $row->address?></td>
                        </tr>
                    </tbody>

                    <?php $n++; endforeach;?>
                    
                </table>
            </div>
            <!-- manage orders -->
            <div id="orderList" class="management">
                <h3>Manage pending order</h3>
                <hr>
                <div class="search">
                    <input type="search" id="searchOrder" placeholder="Enter keyword">
                </div>
                <table id="orderTable">
                
                    <thead>
                        <tr>
                            <td>S/N</td>
                            <td>Customer</td>
                            <td>item</td>
                            <td>Qty</td>
                            <td>Amount</td>
                            <td>Date</td>
                            <td>Action</td>
                        </tr>
                    </thead>

                    <?php
                        $n = 1;
                        $select_order = $connectdb->prepare("SELECT users.first_name, users.last_name, users.email, orders.order_id, orders.customer_email, orders.item_name, orders.quantity, orders.item_price, orders.order_date, orders.order_time FROM users, orders WHERE users.email = orders.customer_email AND orders.order_status = 0 ORDER BY orders.order_time DESC");

                        $select_order->execute();
                
                        $rows = $select_order->fetchAll();
                        foreach($rows as $row):
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $n?></td>
                            <td><?php echo $row->first_name . " " . $row->last_name?></td>
                            <td><?php echo $row->item_name?></td>
                            <td><?php echo $row->quantity?></td>
                            <td>₦ <?php echo number_format($row->item_price)?></td>
                             <!-- <td><?php echo $row->restaurant?></td> -->
                            <td><?php echo $row->order_date?></td>
                            <td><button style="background:transparent; border:none; margin:0 auto;" title="Dispense Item" onclick="dispenseItem('<?php echo $row->order_id?>')"><i class="fas fa-truck" style="color:green; font-size:1.2rem;" ></i></button><button style="background:transparent; border:none; margin:0 auto;" title="Cancel Order" onclick="cancelOrder('<?php echo $row->order_id?>')"><i class="fas fa-plane-slash" style="color:red; font-size:1.2rem;" ></i></button></td>
                        </tr>
                        
                    </tbody>
                    <?php $n++; endforeach;?>
                    
                </table>
               <?php 
                    $check_order = $select_order->rowCount();
                    if(!$check_order){
                    echo "<p style='font-weight:bold; color:chocolate; text-transform:capitalize; font-size:1.3rem; text-align:center; margin-top:10px;'>No record found!</p>";
                }
            ?>
            </div>
            <!-- Events List-->
            <div id="userList" class="management">
                <h3>Events & Appointments</h3>
                <hr>
                <div class="search">
                    <input type="search" id="searchUsers" placeholder="Enter keyword">
                </div>
                <table id="userTable" class="sum_table">
                    <thead>
                        <tr>
                            <td>S/N</td>
                            <td>Customer Name</td>
                            <td>Event Title</td>
                            <td>Event Date</td>
                            <td>Status</td>
                        </tr>
                    </thead>

                    <?php
                        $n = 1;
                        $select_event = $connectdb->prepare("SELECT * FROM appointments ORDER BY request_date DESC");

                        $select_event->execute();
                        
                        $rows = $select_event->fetchAll();
                        foreach($rows as $row):
                    ?>
                    <tbody>
                        <tr>
                            <td style="text-align:center;"><button style="padding:5px 10px; background:var(--secondaryColor);" title="Click to View Event" onclick="displayEvent('<?php echo $row->booking_id;?>');"><?php echo $n?></button></td>
                            <td><?php echo $row->customer_name?></td>
                            <td><?php echo $row->service?></td>
                            <td><?php echo $row->appointment_date?></td>
                            <td style="text-align:Center;">
                                <?php $order_status = $row->status;
                                if($order_status == 1){
                                    echo "<p style='background:green; padding:4px; color:#fff;'>Done <i class='fas fa-check'></i></p>";
                                }elseif($order_status == -1){
                                    echo "<p style='background:red; padding:4px; color:#fff;'>Cancelled <i class='fas fa-window-close'></i></p>";
                                }else{
                                    echo "<p style='background:rgb(167, 199, 50); padding:4px; color:#fff;'>In Review <i class='fas fa-paper-plane'></i></p>";
                                }
                                ?>
                            </td>
                        </tr>
                    </tbody>

                    <?php $n++; endforeach;?>
                </table>
            </div>
            <!-- Events Information -->
            

            <!-- successful deliveries list -->
             <div id="deliveryList" class="management">
                <div class="select_date">
                    <form action="search_date_admin.php" method="POST">
                        <div class="from_to_date">
                            <label>Select From Date</label><br>
                            <input type="date" name="from_date" id="from_date"><br>
                        </div>
                        <div class="from_to_date">
                            <label>Select to Date</label><br>
                            <input type="date" name="to_date" id="to_date"><br>
                        </div>
                        <button type="submit" name="search_date_admin" id="search_date_admin">Search</button>
                    </form>
                </div>
                <div class="new_data">
                    <h3>Successful Deliveries for today</h3>
                    <hr>
                
                    <div class="search">
                        <input type="search" id="searchDeliveries" placeholder="Enter keyword">
                    </div>
                    <table id="deliveriesTable">
                    
                        <thead>
                            <tr>
                                <td>S/N</td>
                                <td>Customer</td>
                                <td>item</td>
                                <td>Qty</td>
                                <td>Amount</td>
                                <td>Date</td>
                            </tr>
                        </thead>

                        <?php
                            $n = 1;
                            $todays_date = date("Y-m-d");
                            $select_deliveries = $connectdb->prepare("SELECT users.first_name, users.last_name, users.email, orders.order_id, orders.customer_email, orders.item_name, orders.quantity, orders.item_price, orders.order_date, orders.delivery_date FROM users, orders WHERE users.email = orders.customer_email AND orders.order_status = 1 AND orders.delivery_date = CURDATE() ORDER BY orders.delivery_date DESC");
                            /* $select_deliveries->bindvalue('orders.order_date', $order_date); */
                            $select_deliveries->execute();
                    
                            $rows = $select_deliveries->fetchAll();
                            foreach($rows as $row):
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $n?></td>
                                <td><?php echo $row->first_name . " " . $row->last_name?></td>
                                <td><?php echo $row->item_name?></td>
                                <td><?php echo $row->quantity?></td>
                                <td>₦ <?php echo $row->item_price?></td>
                                
                                <td><?php echo $row->delivery_date?></td>
                                
                            </tr>
                            
                        </tbody>
                        <?php $n++; endforeach;?>
                        
                    </table>
                    
                    
                    <?php 
                        $check_order = $select_deliveries->rowCount();
                        if(!$check_order){
                        echo "<p style='font-weight:bold; color:chocolate; text-transform:capitalize; font-size:1.3rem; text-align:center; margin-top:10px;'>No record found!</p>";
                    }
                    if($select_deliveries){
                            $totalAmount = $connectdb->prepare("SELECT SUM(item_price) AS total_price FROM orders WHERE order_status = 1 AND delivery_date = CURDATE()");
                            $totalAmount->execute();

                            $amounts = $totalAmount->fetchAll();
                            foreach($amounts as $amount){
                                echo "<p style='color:green; font-size:1.3rem; text-align:right; text-decoration:underline; font-weight:bold; margin-top:30px;'>Total = ₦ ". number_format($amount->total_price, 2) . "</p>";
                            }
                        }
                    
                    ?>
                </div>
            </div>
            <!-- cancelled deliveries list -->
            <div id="cancelledDeliveries" class="management">
                <div class="select_date">
                    <form action="search_cancelled_date.php" method="POST">
                        <div class="from_to_date">
                            <label>Select From Date</label><br>
                            <input type="date" name="from_cancel" id="from_cancel"><br>
                        </div>
                        <div class="from_to_date">
                            <label>Select to Date</label><br>
                            <input type="date" name="to_cancel" id="to_cancel"><br>
                        </div>
                        <button type="submit" name="search_cancel_admin" id="search_cancel_admin">Search</button>
                    </form>
                </div>
                <div class="cancelled_data">
                    <h3>Cancelled Deliveries</h3>
                    <hr>
                    <div class="search">
                        <input type="search" id="searchCancelled" placeholder="Enter keyword">
                    </div>
                    <table id="cancelledTable">
                    
                        <thead>
                            <tr>
                                <td>S/N</td>
                                <td>Customer</td>
                                <td>item</td>
                                <td>Qty</td>
                                <!-- <td>Amount</td> -->
                               
                                <td>Date</td>
                            </tr>
                        </thead>

                        <?php
                            $n = 1;
                            
                            $select_cancel = $connectdb->prepare("SELECT users.first_name, users.last_name, users.email, orders.order_id, orders.customer_email, orders.item_name, orders.quantity, orders.item_price, orders.order_date, orders.delivery_date FROM users, orders WHERE users.email = orders.customer_email AND orders.order_status = -1 AND orders.delivery_date = CURDATE() ORDER BY orders.order_date DESC");
                            /* $select_deliveries->bindvalue('orders.order_date', $order_date); */
                            $select_cancel->execute();
                    
                            $rows = $select_cancel->fetchAll();
                            foreach($rows as $row):
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $n?></td>
                                <td><?php echo $row->first_name . " " . $row->last_name?></td>
                                <td><?php echo $row->item_name?></td>
                                <td><?php echo $row->quantity?></td>
                                
                                
                                <td><?php echo $row->delivery_date?></td>
                                
                            </tr>
                            
                        </tbody>
                        <?php $n++; endforeach;?>
                        
                    </table>
                    <?php
                        $check_order = $select_cancel->rowCount();
                        if(!$check_order){
                        echo "<p style='font-weight:bold; color:chocolate; text-transform:capitalize; font-size:1.3rem; text-align:center; margin-top:10px;'>No record found!</p>";
                    }
                        
                        if($select_cancel){
                            $totalAmount = $connectdb->prepare("SELECT SUM(item_price) AS total_price FROM orders WHERE order_status = -1 AND delivery_date = CURDATE()");
                            $totalAmount->execute();

                            $amounts = $totalAmount->fetchAll();
                            foreach($amounts as $amount){
                                echo "<p style='color:green; font-size:1.3rem; text-align:right; text-decoration:underline; font-weight:bold; margin-top:30px;'>Total = ₦ ". number_format($amount->total_price, 2) . "</p>";
                            }
                        }
                    
                    ?>
                    
                </div>
            </div>
            <!-- Subscriber list -->
            <div id="subscribers" class="management">
                <h3>List of Subscribers</h3>
                <hr>
                <div class="search">
                    <input type="search" id="searchSubscribers" placeholder="Enter keyword">
                </div>
                <table id="subscriberTable">
                    <thead>
                        <tr>
                            <td>S/N</td>
                            <td>Customer Name</td>
                            <td>Customer Email</td>
                            
                            
                        </tr>
                    </thead>

                    <?php
                        $n = 1;
                        $select_subscriber = $connectdb->prepare("SELECT * FROM users WHERE subscriber = 1 ORDER BY first_name");

                        $select_subscriber->execute();
                        
                        $rows = $select_subscriber->fetchAll();
                        foreach($rows as $row):
                    ?>
                    <tbody>
                        <tr>
                            <td style="text-align:center;"><?php echo $n?></td>
                            <td><?php echo $row->first_name . " " .$row->last_name?></td>
                            <td><?php echo $row->email?></td>
                            
                        </tr>
                    </tbody>

                    <?php $n++; endforeach;?>
                    
                </table>
            </div>
            <!-- Highest/Lowest Selling items list -->
            <div id="highestSellingItems" class="management">
                <div class="select_date">
                    <form action="search_highest.php" method="POST">
                        <div class="from_to_date">
                            <label>Select From Date</label><br>
                            <input type="date" name="highest_from_date" id="highest_from_date"><br>
                        </div>
                        <div class="from_to_date">
                            <label>Select to Date</label><br>
                            <input type="date" name="highest_to_date" id="highest_to_date"><br>
                        </div>
                        <button type="submit" name="search_highest" id="search_highest">Search</button>
                    </form>
                </div>
                <div class="new_highest_data">
                    <h3>Todays' Top selling Items</h3>
                    <hr>
                
                    <div class="search">
                        <input type="search" id="searchHighestItems" placeholder="Enter keyword">
                    </div>
                    <table id="highestItemsTable">
                    
                        <thead>
                            <tr>
                                <td>S/N</td>
                                <td>item</td>
                                <td>Qty</td>
                                <td>Unit Price</td>
                                <td>Total Amount</td>
                               
                                <td>Date</td>
                            </tr>
                        </thead>

                        <?php
                            $n = 1;
                            $todays_date = date("Y-m-d");
                            $select_items = $connectdb->prepare("SELECT item_name, item_price, delivery_date, SUM(quantity) AS total_quantity, SUM(item_price) AS total_amount FROM orders WHERE order_status = 1 AND delivery_date = CURDATE() GROUP BY item_name ORDER BY total_quantity DESC");
                            /* $select_deliveries->bindvalue('orders.order_date', $order_date); */
                            $select_items->execute();
                    
                            $rows = $select_items->fetchAll();
                            foreach($rows as $row):
                        ?>
                        <tbody>
                            <tr>
                                <td style="text-align:center;"><?php echo $n?></td>
                                <td><?php echo $row->item_name?></td>
                                <td style="text-align:center;"><?php echo $row->total_quantity?></td>
                                <td>₦ <?php echo number_format($row->item_price, 2)?></td>
                                <td>₦ <?php echo number_format($row->total_amount, 2)?></td>
                                <td><?php echo $row->delivery_date?></td>
                                
                            </tr>
                            
                        </tbody>
                        <?php $n++; endforeach;?>
                        
                    </table>
                    
                    
                    <?php 
                        $check_order = $select_items->rowCount();
                        if(!$check_order){
                        echo "<p style='font-weight:bold; color:chocolate; text-transform:capitalize; font-size:1.3rem; text-align:center; margin-top:10px;'>No record found!</p>";
                    }
                    /* if($select_items){
                            $totalAmount = $connectdb->prepare("SELECT SUM(item_price) AS total_price FROM orders WHERE order_status = 1 AND delivery_date = CURDATE()");
                            $totalAmount->execute();

                            $amounts = $totalAmount->fetchAll();
                            foreach($amounts as $amount){
                                echo "<p style='color:green; font-size:1.3rem; text-align:right; text-decoration:underline; font-weight:bold; margin-top:30px;'>Total = ₦ ". number_format($amount->total_price, 2) . "</p>";
                            }
                        } */
                    
                    ?>
                </div>
            </div>
            <div id="account" class="management">
                <?php include "profile.php";?>
            </div>
        </section>
    </main>
    

    <script src="jquery.js"></script>
    <script src="script.js"></script>

</body>
</html>

<?php
    }else{
        header("Location: ../registration.php");
    }
?> 