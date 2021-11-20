<div id="mobile_menu">
    <aside id="asideLeft">
        <div class="login">
            <button id="loginDiv" title="View profile"><i class="far fa-user"></i> 
            <?php 
                $statement = $connectdb->prepare("SELECT * FROM users WHERE email = :email");
                $statement->bindvalue('email', $user);
                $statement->execute();
                $infos = $statement->fetchAll();
                foreach($infos as $info){
                    echo "Hello $info->first_name";
                }
                
            ?> 
            <!-- <i class="fas fa-chevron-down"></i> -->
            </button>
            <!-- <div class="login_option" id="account">
                <div>
                    <a href="account.php" class="signupBtn">My Account</a>
                    <a href="order_history.php" class="signupBtn">My orders</a>
                    <button id="logoutBtn"><a href="logout.php">Logout</a></button>
                
                </div>

            </div> -->
                <a href="shopping_cart.php" title="view cart" class="mobile_cart"><i class="fas fa-shopping-cart"></i><span id="cart_value">
                    <?php
                        $cart_num = $connectdb->prepare("SELECT * FROM cart WHERE customer_email = :customer_email");
                        $cart_num->bindvalue('customer_email', $user);
                        $cart_num->execute();

                        if($cart_num->rowCount() > 0){
                            echo $cart_num->rowCount();
                        }else{
                            echo "0";
                        }
                    ?>
                </span></a>
                <a class="logout" title="Logout" href="logout.php"><i class="fas fa-sign-in-alt"></i></a>
        </div>
        <nav>
            <ul>
                <li><a href="account.php"title="View profile"><i class="fas fa-user"></i>Profile</a></li>
                <li><a href="order_history.php"title="Order history"><i class="fas fa-shopping-cart"></i>My Orders</a></li>
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
</div>