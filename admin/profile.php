        <h3>Update Password</h3>
        <hr>
        <!-- change password -->
        <div class="change_password">
            <div class="info" id="info"></div>
            <form method="POST">
                <h3>Change your password</h3>
                <input type="hidden" name="admin_email" id="admin_email" value="<?php $get_user = $connectdb->prepare("SELECT * FROM users WHERE email = :email");
                $get_user->bindvalue('email', $user);
                $get_user->execute();
                $gets = $get_user->fetchAll();
                foreach($gets as $get){
                    echo $get->email;
                }
                ?>">
                <label for="currPwd">Current password</label><br>
                <input type="password" name="current_password" id="current_password" required><br>
                <label for="newPwd">New Password</label><br>
                <input type="password" name="new_password" id="new_password" required><br>
                <label for="rePwd">Retype Password</label><br>
                <input type="password" name="retype_password" id="retype_password" required><br>
                <button type="submit" name="change_passwords" id="change_passwords">Update</button>
            </form>
        </div>
 