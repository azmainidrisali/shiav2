<?php

function add_theme_scripts(){

    wp_enqueue_style( 'stylesheet', get_stylesheet_uri() );

    wp_enqueue_style( 'bootstrapMin', get_template_directory_uri(). '/plugins/bootstrap/css/bootstrap.min.css', array(), '1.1', 'all' );

    //colorlibLoginPage start
        wp_enqueue_style( 'Cl_bootstrapMin', get_template_directory_uri(). '/extfiles/colorlib/vendor/bootstrap/css/bootstrap.min.css', array(), '1.1', 'all' );
        wp_enqueue_style( 'Cl_font-awesome', get_template_directory_uri(). '/extfiles/colorlib/fonts/font-awesome-4.7.0/css/font-awesome.min.css', array(), '1.1', 'all' );
        wp_enqueue_style( 'Cl_icon-font', get_template_directory_uri(). '/extfiles/colorlib/fonts/Linearicons-Free-v1.0.0/icon-font.min.css', array(), '1.1', 'all' );
        wp_enqueue_style( 'Cl_animate', get_template_directory_uri(). '/extfiles/colorlib/vendor/animate/animate.css', array(), '1.1', 'all' );
        wp_enqueue_style( 'Cl_hamburgers', get_template_directory_uri(). '/extfiles/colorlib/vendor/css-hamburgers/hamburgers.min.css', array(), '1.1', 'all' );
        wp_enqueue_style( 'Cl_animsition', get_template_directory_uri(). '/extfiles/colorlib/vendor/animsition/css/animsition.min.css', array(), '1.1', 'all' );
        wp_enqueue_style( 'Cl_select2', get_template_directory_uri(). '/extfiles/colorlib/vendor/select2/select2.min.css', array(), '1.1', 'all' );
        wp_enqueue_style( 'Cl_daterangepicker', get_template_directory_uri(). '/extfiles/colorlib/vendor/daterangepicker/daterangepicker.css', array(), '1.1', 'all' );
        wp_enqueue_style( 'Cl_util', get_template_directory_uri(). '/extfiles/colorlib/css/util.css', array(), '1.1', 'all' );
        wp_enqueue_style( 'Cl_main', get_template_directory_uri(). '/extfiles/colorlib/css/main.css', array(), '1.1', 'all' );
    //colorlibLoginPage End

    

    //adminPanel start
        wp_enqueue_style( 'admin_sb-admin-2', get_template_directory_uri(). '/extfiles/admin/css/sb-admin-2.min.css', array(), '1.1', 'all' );
        wp_enqueue_style( 'admin_fontAwsome', get_template_directory_uri(). '/extfiles/admin/vendor/fontawesome-free/css/all.min.css', array(), '1.1', 'all' );
        wp_enqueue_script( 'admin_Jquery', get_template_directory_uri(). '/extfiles/admin/vendor/jquery/jquery.min.js', true );
        wp_enqueue_script( 'admin_Boottrap', get_template_directory_uri(). '/extfiles/admin/vendor/bootstrap/js/bootstrap.bundle.min.js', true );
        wp_enqueue_script( 'admin_JqueryEase', get_template_directory_uri(). '/extfiles/admin/vendor/jquery-easing/jquery.easing.min.js', true );
        wp_enqueue_script( 'admin_JsSb', get_template_directory_uri(). '/extfiles/admin/js/sb-admin-2.min.js', true );
    //admin end

    wp_enqueue_script( 'bootstrapmain', get_template_directory_uri(). '/plugins/bootstrap/js/bootstrap.min.js', true );
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );


// Handle category submission form
function handle_category_submission() {
    if (isset($_POST['action']) && $_POST['action'] === 'submit_category') {
      $category_name = sanitize_text_field($_POST['category_name']);
      $category_description = sanitize_text_field($_POST['category_description']);
  
      // Create a new category
      $category_args = array(
        'cat_name' => $category_name,
        'category_description' => $category_description,
        // Add any other desired parameters for the category
      );
      $category_id = wp_insert_category($category_args);
  
      // Optionally, you can perform additional actions after category submission
      // For example, displaying a success message or redirecting the user
      // to another page.
  
      // Redirect the user to a success page
      global $shiacomputeroption;

        if (isset($shiacomputeroption['adminBatch'])) {
            $get_adminBatchRed_id = $shiacomputeroption['adminBatch']; // Get the selected page ID

            if ($get_adminBatchRed_id) {
                $get_adminBatchRed_link = get_permalink($get_adminBatchRed_id); // Get the permalink of the selected page
            }
        }
      wp_redirect($get_adminBatchRed_link);
      exit;
    }
  }
  add_action('admin_post_nopriv_submit_category', 'handle_category_submission');
  add_action('admin_post_submit_category', 'handle_category_submission');

  // Handle category deletion
function handle_category_deletion() {
    if (isset($_POST['action']) && $_POST['action'] === 'delete_category') {
      $category_id = isset($_POST['category_id']) ? intval($_POST['category_id']) : 0;
  
      if ($category_id > 0) {
        wp_delete_category($category_id);
  
        // Optionally, you can perform additional actions after category deletion.
        // For example, displaying a success message or redirecting the user.
  
        // Redirect the user back to the same page
        global $shiacomputeroption;

        if (isset($shiacomputeroption['adminBatch'])) {
            $get_adminBatchRed_id = $shiacomputeroption['adminBatch']; // Get the selected page ID

            if ($get_adminBatchRed_id) {
                $get_adminBatchRed_link = get_permalink($get_adminBatchRed_id); // Get the permalink of the selected page
            }
        }
      wp_redirect($get_adminBatchRed_link);
      exit;;
      }
    }
  }
  add_action('admin_post_nopriv_delete_category', 'handle_category_deletion');
  add_action('admin_post_delete_category', 'handle_category_deletion');
  
  

//reduc framework connect

require_once('plugins/redux/ReduxCore/framework.php');
require_once('plugins/redux/sample/sample-config.php');
global $shiacomputeroption;



//custom wp thme settings start



function hide_admin_bar() {
    if (!current_user_can('administrator')) {
        show_admin_bar(false);
    }
}
add_action('after_setup_theme', 'hide_admin_bar');

function Chide_admin_bar() {
    if (current_user_can('administrator')) {
        show_admin_bar(false);
    }
}
add_action('after_setup_theme', 'Chide_admin_bar');



//admin login syesteam start

    //lOGIN PAGE REDIRECT disable wp-login page//


        function redirect_to_custom_dashboard($redirect_to, $request, $user) {
            if (isset($user->roles) && is_array($user->roles)) {
                $allowed_roles = array('subscriber', 'contributor', 'author'); // Replace with your desired roles
                $intersect_roles = array_intersect($user->roles, $allowed_roles);
                
                global $shiacomputeroption;

                if (isset($shiacomputeroption['adminPanelLink'])) {
                    $get_adminpanel_id = $shiacomputeroption['adminPanelLink']; // Get the selected page ID

                    if ($get_adminpanel_id) {
                        $get_adminpanel_link = get_permalink($get_adminpanel_id); // Get the permalink of the selected page
                    }
                }


                if (!empty($intersect_roles)) {
                    return $get_adminpanel_link; // Replace '/custom-dashboard' with the URL slug or path of your custom dashboard page
                }
            }
            return $redirect_to;
        }
        add_filter('login_redirect', 'redirect_to_custom_dashboard', 10, 3);
    
    
        function redirect_to_custom_logout() {

            global $shiacomputeroption;

                if (isset($shiacomputeroption['logoutPageLink'])) {
                    $get_logout_id = $shiacomputeroption['logoutPageLink']; // Get the selected page ID

                    if ($get_logout_id) {
                        $get_logout_link = get_permalink($get_logout_id); // Get the permalink of the selected page
                    }
                }

            wp_redirect($get_logout_link); // Replace 'https://example.com/custom-logout' with the URL of your custom logout page
            exit();
        }
        add_action('wp_logout', 'redirect_to_custom_logout');
        

        function goto_login_page() {
            global $page_id;
            global $shiacomputeroption;

                if (isset($shiacomputeroption['loginPageLink'])) {
                    $get_loginpage_id = $shiacomputeroption['loginPageLink']; // Get the selected page ID

                    if ($get_loginpage_id) {
                        $get_loginpage_link = get_permalink($get_loginpage_id); // Get the permalink of the selected page
                    }
                }
            $page = basename($_SERVER['REQUEST_URI']);
            
                if( $page == 'wp-login.php' && $_SERVER['REQUEST_METHOD'] == 'GET') {
                wp_redirect($get_loginpage_link);
                exit;
                }
            }
        add_action('init','goto_login_page');

        function redirect_to_custom_login($login_url, $redirect, $force_reauth) {
            global $page_id;
            global $shiacomputeroption;

                if (isset($shiacomputeroption['loginPageLink'])) {
                    $get_loginpage_id = $shiacomputeroption['loginPageLink']; // Get the selected page ID

                    if ($get_loginpage_id) {
                        $get_loginpage_link = get_permalink($get_loginpage_id); // Get the permalink of the selected page
                    }
                }
            // $custom_login_url = 'https://localhost/shiacomputer'; // Replace 'https://example.com/custom-login' with the URL of your custom login page
            return $get_loginpage_link;
        }
        add_filter('login_url', 'redirect_to_custom_login', 10, 3);
        

        function goto_login_pageWWP() {
            global $page_id;
            global $shiacomputeroption;

                if (isset($shiacomputeroption['loginPageLink'])) {
                    $get_loginpage_id = $shiacomputeroption['loginPageLink']; // Get the selected page ID

                    if ($get_loginpage_id) {
                        $get_loginpage_link = get_permalink($get_loginpage_id); // Get the permalink of the selected page
                    }
                }
            $page = basename($_SERVER['REQUEST_URI']);
            
                if( $page == 'wp-login' && $_SERVER['REQUEST_METHOD'] == 'GET') {
                wp_redirect($get_loginpage_link);
                exit;
                }
            }
        add_action('init','goto_login_pageWWP');


        function restrict_wp_admin() {
            global $shiacomputeroption;

                if (isset($shiacomputeroption['studentPanelLink'])) {
                    $get_StudentPanel_id = $shiacomputeroption['studentPanelLink']; // Get the selected page ID

                    if ($get_StudentPanel_id) {
                        $get_StudentPanel_link = get_permalink($get_StudentPanel_id); // Get the permalink of the selected page
                    }
                };
            if (is_admin() && !current_user_can('administrator') && !wp_doing_ajax()) {

                

                wp_redirect($get_StudentPanel_link); // Replace 'https://example.com/custom-page' with the URL of your custom page
                exit();
            }
        }
        add_action('admin_init', 'restrict_wp_admin');
        
        
        
    //lOGIN PAGE REDIRECT disable wp-login page//

//admin login syesteam End