<footer>
        <div id="main_footer">
        <div class="section" id="contactSection">
            <div class="fone">
                <div class="icons">
                    <img src="images/temix_empire_logo2.png">

                </div>
                <div class="lines">
                    <h3>Opening Hours</h3>
                    <p>We are open 24/7 (Mondays to Sundays) to take your orders and make your deliveries
                    </p>
                </div>
            </div>
            <div class="fone">
                <div class="icons">
                    <i class="fas fa-tty"></i>
                </div>
                <div class="lines">
                    <h3>Temix Help lines:</h3>
                    <p>07041350926<br>08157985866
                    </p>
                </div>
            </div>
            <div class="fone">
                <div class="icons">
                    <i class="fas fa-envelope-open-text"></i>
                </div>
                <div class="lines">
                    <h3>Emails:</h3>
                    <p>sales@temixempire.com, <br> info@temixempire.com
                    </p>
                </div>
            </div>
        </div>
        <div class="section" id="subscribeCats">
            
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.041266498623!2d5.7716401140915945!3d5.560902335148102!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1041ada98d240e83%3A0x9ab4294f602cd26d!2sTemix%20Empire!5e0!3m2!1sen!2sng!4v1627394709247!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <hr>
            <h3>Be the first to get latest updates</h3>
            <form action="controller/subscribe.php" method="POST" id="subscriptions">
                <input type="email" id="subscribe_email" name="subscribe_email" placeholder="Enter email">
                <button type="submit" id="subscribe" name="subscribe">Subscribe <i class="fas fa-paper-plane"></i></button>
            </form>
        
            
        </div>
        <div class="section" id="socialMedia">
            <h3>Follow us On Social Media</h3>
            <div class="social">
                <a target="_blank" href="https://facebook.com/temixempire" title="Temix empire on facebook"><img src="images/facebook_icon.png"></a>
                <a target="_blank" href="https://youtube.com/TemixEmpire" title="Temix empire on twitter"><img src="images/youtube_icon.png"></a>
                <a target="_blank" href="https://instagram.com/Temix_empire" title="Temix empire on instagram"><img src="images/instagram_icon.png"></a>
                <a target="_blank" href="https://linkedin.com/TemixEmpire" title="Connect with Temix empire on Linkedin"><img src="images/linkedin_icon.png"></a>
                <a target="_blank" href="https://wa.me/2348157985866" title="Chat on whatsapp"><img src="images/whatsapp_icon.png"></a>
                
            </div>
            <hr>
            <h3>Categories</h3>
            <ul id="footCat">
                <li><a href="javascript:void(0);"><i class="fas fa-ice-cream"></i>Ice cream</a> </li>
                <li><a href="javascript:void(0);"><i class="fas fa-hamburger"></i>Snacks</a> </li>
                <li><a href="javascript:void(0);"><i class="fas fa-bed"></i>Beddings</a> </li>
                <li><a href="javascript:void(0);"><i class="fas fa-cheese"></i>Small Chops</a></li>
                <li><a href="javascript:void(0);"><i class="fas fa-birthday-cake"></i>Cakes</a></li>
                <li><a href="#"><i class="fas fa-pizza-slice"></i>Other Categories</a></li>
                <a class="appointment" href="javascript:void(0);"><i class="fas fa-calendar-alt"></i> Book an Event</a>
                <li><a href="gallery.php"><i class="fas fa-photo-video"></i>Videos</a></li>
                <li><a href="contact.php"><i class="fas fa-address-book"></i>Contact us</a></li>
            </ul>
        </div>
    </div>
    <div id="secondary_footer">
        <p>All Rights Reserved. &copy; Temix <?php echo date("Y"); ?>. Powered by <a href="https://onostar.github.io/onostar-media" title="Onostar media" target="_blank">Onostar Media</a></p>
    </div>
    <div class="toTop">
        <a href="#topHeader"><i class="fas fa-chevron-up"></i></a>
    </div>
    <!-- Book appointment form -->
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
                        
                    </div>
                    <button type="submit" id="book" name="book">Book Appointment <i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
        </div>
    </footer>
    <div id="loginPrompt">
        <p>Kindly Login to View Item!</p>
        <div class="log">
            <a href="registration.php" title="Login here">Login <i class="fas fa-sign-in-alt"></i></a>
            <a href="javascript:void();" id="closeBox" title="Close box">Close <i class="fas fa-window-close"></i></a>
        </div>
    </div>
    