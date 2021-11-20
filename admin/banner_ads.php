<div id="addBanner" class="sections displays">
    <h2>Banners & Adverts</h2>
    <hr>
    <div class="bannerBtns">
        <button id="banner1btn"><i class="fas fa-photo-video"></i> Upload Banner 1</button>
        <button id="banner2btn"><i class="fas fa-photo-video"></i> Upload Banner 2</button>
        <button id="banner3btn"><i class="fas fa-photo-video"></i> Upload Banner 3</button>
        <button id="banner4btn"><i class="fas fa-photo-video"></i> Upload Banner 4</button>
        <button id="adBtn"><i class="fas fa-photo-video"></i> Upload Adverts</button>
    </div>
    <div class="add_user_form upload_banner_form" id="uploadBanner1">
        <h3>Upload Banner 1 <button class="close_upload"><i class="fas fa-window-close"></i></button></h3>
            
        <form method="POST" action="add_banner.php" enctype="multipart/form-data">
            <div class="inputs">
                <input type="hidden" name="banner_id" value="1">
                <div class="data">
                    <label for="title">Title</label>
                    <input type="text" name="title" placeholder="Add title" required>
                </div>
                <div class="data">
                    <label for="banner">Select Image</label><br>
                    <input type="file" name="banner">
                </div>
                
            </div>
            <div class="inputs">
                <div class="data">
                    <label for="description">Description</label>
                    <textarea name="banner_desc" cols="70" rows="5"></textarea>
                </div>
                <div class="data">
                    <button type="submit" name="add_banner">Upload <i class="fas fa-photo-video"></i></button>
                </div>
                
            </div>
            
            
        </form>
    </div>
    <div class="add_user_form upload_banner_form" id="uploadBanner2">
        <h3>Upload Banner 2 <button class="close_upload"><i class="fas fa-window-close"></i></button></h3>
            
        <form method="POST" action="add_banner.php" enctype="multipart/form-data">
            <div class="inputs">
                <input type="hidden" name="banner_id" value="2">
                <div class="data">
                    <label for="title">Title</label>
                    <input type="text" name="title" placeholder="Add title" required>
                </div>
                <div class="data">
                    <label for="banner">Select Image</label><br>
                    <input type="file" name="banner">
                </div>
                
            </div>
            <div class="inputs">
                <div class="data">
                    <label for="description">Description</label>
                    <textarea name="banner_desc" cols="70" rows="5"></textarea>
                </div>
                <div class="data">
                    <button type="submit" name="add_banner">Upload <i class="fas fa-photo-video"></i></button>
                </div>
                
            </div>
            
            
        </form>
    </div>
    <div class="add_user_form upload_banner_form" id="uploadBanner3">
        <h3>Upload Banner 3 <button class="close_upload"><i class="fas fa-window-close"></i></button></h3>
            
        <form method="POST" action="add_banner.php" enctype="multipart/form-data">
            <div class="inputs">
                <input type="hidden" name="banner_id" value="3">
                <div class="data">
                    <label for="title">Title</label>
                    <input type="text" name="title" placeholder="Add title" required>
                </div>
                <div class="data">
                    <label for="banner">Select Image</label><br>
                    <input type="file" name="banner">
                </div>
                
            </div>
            <div class="inputs">
                <div class="data">
                    <label for="description">Description</label>
                    <textarea name="banner_desc" cols="70" rows="5"></textarea>
                </div>
                <div class="data">
                    <button type="submit" name="add_banner">Upload <i class="fas fa-photo-video"></i></button>
                </div>
                
            </div>
            
            
        </form>
    </div>
    <div class="add_user_form upload_banner_form" id="uploadBanner4">
        <h3>Upload Banner 4 <button class="close_upload"><i class="fas fa-window-close"></i></button></h3>
            
        <form method="POST" action="add_banner.php" enctype="multipart/form-data">
            <div class="inputs">
                <input type="hidden" name="banner_id" value="4">
                <div class="data">
                    <label for="title">Title</label>
                    <input type="text" name="title" placeholder="Add title" required>
                </div>
                <div class="data">
                    <label for="banner">Select Image</label><br>
                    <input type="file" name="banner">
                </div>
                
            </div>
            <div class="inputs">
                <div class="data">
                    <label for="description">Description</label>
                    <textarea name="banner_desc" cols="70" rows="5"></textarea>
                </div>
                <div class="data">
                    <button type="submit" name="add_banner">Upload <i class="fas fa-photo-video"></i></button>
                </div>
                
            </div>
            
            
        </form>
    </div>
    <div class="add_user_form upload_banner_form" id="uploadAds">
        <h3>Upload Side Adverts <button class="close_upload"><i class="fas fa-window-close"></i></button></h3>
            
        <form method="POST" action="upload_ads.php" enctype="multipart/form-data">
            <div class="inputs">
                <input type="hidden" name="banner_id" value="5">
                <div class="data">
                    <label for="banner">Select Image</label><br>
                    <input type="file" name="banner">
                </div>
                <div class="data">
                    <button type="submit" name="add_ads">Upload Ad <i class="fas fa-photo-video"></i></button>
                </div>
            </div>
            
        </form>
    </div>
</div>