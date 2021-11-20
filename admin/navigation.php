<aside class="main_menu" id="desktop_menu">
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
    <nav>
        <h3><a href="admin.php" title="Home"><i class="fas fa-home"></i> Dashboard</a></h3>
        <ul>
            <li><a href="javascript:void(0);" id="nav1" data-menu="nav1Menu" class="menus">Admin <i class="fas fa-chevron-down"></i></a>
                <ul id="nav1Menu" class="navs">
                    
                    <li><a href="javascript:void(0);" id="addCat" title="Add item categories" class="page_navs" data-page="addCategories">Add Category</a></li>
                    <li><a href="javascript:void(0);" id="addMenu" title="Add restaurant menu" class="page_navs" data-page="addItems">Add Item</a></li>
                    <li><a href="javascript:void(0);" id="deleteItem" title="Delete restaurant Items" class="page_navs" data-page="deleteItems">Delete Item</a></li>
                    <li><a href="javascript:void(0);" id="addStore" class="page_navs" data-page="addRestaurant">Upload Photo</a></li>
                    <li><a href="javascript:void(0);" id="addUser" class="page_navs" data-page="createUser">Upload Video</a></li>
                    <li><a href="javascript:void(0);" id="viewMedia" class="page_navs" data-page="galleryItems">Photos and Videos</a></li>
                    <li><a id="customerList"  href="javascript:void(0);" data-page="customers" class="page_navs">Customer List</a></li>
                    <li><a href="javascript:void(0);" id="uploadBanner" class="page_navs" data-page="addBanner">Upload Banners & Ads</a></li>
                    <li><a href="javascript:void(0);" id="sendBroadcast" class="page_navs" data-page="broadcasts">Broadcast Message</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" id="nav2" data-menu="nav2Menu" class="menus">Manage Items <i class="fas fa-chevron-down"></i></a>
                <ul id="nav2Menu" class="navs">
                    <!-- <li><a id="showRestaurants"  href="javascript:void(0);">Restaurant List</a></li> -->
                    <li><a id="showMenus" href="javascript:void(0);" class="page_navs" data-page="menuList">Item List</a></li>
                    <li><a id="modifyPrice" href="javascript:void(0);" class="page_navs" data-page="priceList">Modify Item Price</a></li>
                    <li><a id="featured" href="javascript:void(0);" class="page_navs" data-page="featuredItems">Featured items</a></li>
                    <li><a id="dailyDeals" href="javascript:void(0);" class="page_navs" data-page="dailyDealsItems">Daily deals</a></li>
                    <li><a id="orders"  href="javascript:void(0);" class="page_navs" data-page="orderList">Pending Orders</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" id="nav3" data-menu="nav3Menu" class="menus">Events & Appointments <i class="fas fa-chevron-down"></i></a>
                <ul id="nav3Menu" class="navs">
                    <li><a id="showUsers" class="page_navs" href="javascript:void(0);" data-page="userList">Manage Events/Appointments</a></li>
                    
                    <!-- <li><a id="orders"  href="javascript:void(0);">Pending Orders</a></li> -->
                    
                </ul>
            </li>
            <li><a href="javascript:void(0);" id="nav4" data-menu="nav4Menu" class="menus">Reports <i class="fas fa-chevron-down"></i></a>
                <ul id="nav4Menu" class="navs">
                    <li><a id="deliveries"  href="javascript:void(0);" class="page_navs" data-page="deliveryList">Successful Deliveries</a></li>
                    <li><a id="cancelled"  href="javascript:void(0);" class="page_navs" data-page="cancelledDeliveries">Cancelled orders</a></li>
                    <li><a id="subscriberList"  href="javascript:void(0);" class="page_navs" data-page="subscribers">Subscribers</a></li>
                    <li><a id="highestItems"  href="javascript:void(0);" class="page_navs" data-page="highestSellingItems">Highest/Lowest Selling Items</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>

<!-- mobile menu -->
