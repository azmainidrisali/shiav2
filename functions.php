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




function hide_admin_bar() {
    if (current_user_can('administrator')) {
        show_admin_bar(false);
    }
}
add_action('after_setup_theme', 'hide_admin_bar');



//admin login syesteam start

    //lOGIN PAGE REDIRECT//
        function goto_login_page() {
            global $page_id;
        $login_page = home_url();
            $page = basename($_SERVER['REQUEST_URI']);
            
                if( $page == 'wp-login.php' && $_SERVER['REQUEST_METHOD'] == 'GET') {
                wp_redirect($login_page);
                exit;
                }
            }
        add_action('init','goto_login_page');

        function goto_login_pageWWP() {
            global $page_id;
        $login_page = home_url();
            $page = basename($_SERVER['REQUEST_URI']);
            
                if( $page == 'wp-login' && $_SERVER['REQUEST_METHOD'] == 'GET') {
                wp_redirect($login_page);
                exit;
                }
            }
        add_action('init','goto_login_pageWWP');
    //lOGIN PAGE REDIRECT//

//admin login syesteam End