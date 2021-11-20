<div id="mobile_menu">
                
    <aside id="asideLeft">
        <div class="login">
            <button id="loginDiv"><i class="far fa-user"></i> <a href="registration.php">Login</a> <i class="fas fa-sign-in-alt"></i></button>
            <!-- <div class="login_option">
                <div>
                    <button id="loginBtn"><a href="registration.php">Login</a></button>
                    <h3>OR</h3>
                    <a href="registration.php" id="signupBtn">Create an account</a>
                </div>
            </div> -->
        </div>
        
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
    
</div>