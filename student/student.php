<?php 
/* Template Name: StudentPage */
require_once(get_template_directory(). '/admin/header.php');
?>

<?php
// Check if the current user is an administrator
if (is_user_logged_in()) {
    ?>
        
    <?php
} else {
        ?>

        <div class="limiter">
            <div class="container-login100" style="background-image: url('http://localhost/shiacomputer/wp-content/uploads/2023/05/bg-01.jpg');">
                <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
                
                    <div class="alert alert-primary" role="alert">
                            <span class="login100-form-title p-b-53">
                                Please Login
                            </span>
                    </div>
            
                </div>            
            </div>            
        </div>            



    <?php
};

?>

<?php
require_once(get_template_directory(). '/admin/footer.php');