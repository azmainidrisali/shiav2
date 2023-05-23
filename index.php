<?php
get_header();
?> 


        <?php
            // Place this code at the top of your index.php file or any PHP file where you want to implement this behavior

            if (is_user_logged_in()) {
                ?>

                        <div class="limiter">
                            <div class="container-login100" style="background-image: url('http://localhost/shiacomputer/wp-content/uploads/2023/05/bg-01.jpg');">
                                <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
                                
                                <div class="alert alert-primary" role="alert">
                                        <span class="login100-form-title p-b-53">
                                            Your are Already Logged in
                                        </span>
                                </div>
                            
                                </div>            
                            </div>            
                        </div>            
                


                <?php
            } else {
                ?>

                    <!--login area main design start-->

                        <div class="limiter">
                            <div class="container-login100" style="background-image: url('http://localhost/shiacomputer/wp-content/uploads/2023/05/bg-01.jpg');">
                                <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
                                        
                                        <?php             
                                            // Check if the user just requested a new password 
                                            $attributes['lost_password_sent'] = isset( $_REQUEST['checkemail'] ) && $_REQUEST['checkemail'] == 'confirm';

                                            if ( $attributes['lost_password_sent'] ) : ?>
                                                <p class="login-info">
                                                    <?php _e( 'Check your email for a link to reset your password.', 'personalize-login' ); ?>
                                                </p>
                                            <?php endif;

                                            // Check if user just updated password
                                            $attributes['password_updated'] = isset( $_REQUEST['password'] ) && $_REQUEST['password'] == 'changed';
                                            
                                            if ( $attributes['password_updated'] ) : ?>
                                                <p class="login-info">
                                                    <?php _e( 'Your password has been changed. You can sign in now.', 'personalize-login' ); ?>
                                                </p>
                                            <?php endif;

                                        ?>

                                    <form method="post" action="<?php bloginfo('url') ?>/wp-login.php" class="login100-form validate-form flex-sb flex-w">
                                        <span class="login100-form-title p-b-53">
                                            Welcome back sign in
                                        </span>

                                        <a href="#" class="btn-face m-b-20">
                                            <i class="fa fa-facebook-official"></i>
                                            Facebook
                                        </a>

                                        <a href="#" class="btn-google m-b-20">
                                            <img src="http://localhost/shiacomputer/wp-content/uploads/2023/05/icon-google.png" alt="GOOGLE">
                                            Google
                                        </a>
                                        
                                        <div class="p-t-31 p-b-9">
                                            <span class="txt1">
                                                Username
                                            </span>
                                        </div>
                                        <div class="wrap-input100 validate-input" data-validate = "Username is required">
                                            <input class="input100" type="text" id="user_login" name="log" value="<?php echo esc_attr(stripslashes($user_login)); ?>">
                                            <span class="focus-input100"></span>
                                        </div>
                                        
                                        <div class="p-t-13 p-b-9">
                                            <span class="txt1">
                                                Password
                                            </span>

                                            <a href="#" class="txt2 bo1 m-l-5">
                                                Forgot?
                                            </a>
                                        </div>
                                        <div class="wrap-input100 validate-input" data-validate = "Password is required">
                                            <input class="input100" id="user_pass" type="password" name="pwd" value="">
                                            <span class="focus-input100"></span>
                                        </div>

                                        <div class="container-login100-form-btn m-t-17">
                                                <?php do_action('login_form'); ?>
                                                <input class='customLoginButton' type="submit" name="user-submit" value="<?php _e('Login'); ?>" tabindex="14" class="user-submit" />
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <div id="dropDownSelect1"></div>

                    <!--login area main design End-->

                <?php
            }
        ?>

    

<?php
get_footer();