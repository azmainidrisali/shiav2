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

//Admission entry Database start


    // Add custom post type for Institute Admissions
        function create_admissions_post_type() {
            $labels = array(
                'name'               => 'Admissions',
                'singular_name'      => 'Admission',
                'add_new'            => 'New Admission',
                'add_new_item'       => 'Add New Admission',
                'edit_item'          => 'Edit Admission',
                'new_item'           => 'New Admission',
                'view_item'          => 'View Admission',
                'search_items'       => 'Search Admissions',
                'not_found'          => 'No admissions found',
                'not_found_in_trash' => 'No admissions found in trash',
                'parent_item_colon'  => 'Parent Admission:',
                'menu_name'          => 'Admissions'
            );

            $args = array(
                'labels'              => $labels,
                'hierarchical'        => false,
                'description'         => 'Custom post type for Institute Admissions',
                'supports'            => array( 'title','thumbnail'),
                'public'              => true,
                'menu_position'       => 5,
                'menu_icon'           => 'dashicons-clipboard',
                'has_archive'         => true,
                'rewrite'             => array( 'slug' => 'admissions' ),
            );

            register_post_type( 'admissions', $args );
        }
        add_action( 'init', 'create_admissions_post_type' );
    // Add custom post type for Institute Admissions

    // Add custom taxonomy for Admissions batch
        function create_batch_taxonomy() {
            $labels = array(
                'name'              => 'Batches',
                'singular_name'     => 'Batch',
                'search_items'      => 'Search Batches',
                'all_items'         => 'All Batches',
                'parent_item'       => 'Parent Batch',
                'parent_item_colon' => 'Parent Batch:',
                'edit_item'         => 'Edit Batch',
                'update_item'       => 'Update Batch',
                'add_new_item'      => 'Add New Batch',
                'new_item_name'     => 'New Batch Name',
                'menu_name'         => 'Batch',
            );

            $args = array(
                'labels'            => $labels,
                'hierarchical'      => true,
                'public'            => true,
                'show_ui'           => true,
                'show_admin_column' => true,
                'show_in_nav_menus' => true,
                'rewrite'           => array( 'slug' => 'batch' ),
            );

            register_taxonomy( 'batch', 'admissions', $args );
        }
        add_action( 'init', 'create_batch_taxonomy' );
    // Add custom taxonomy for Admissions batch

    // Modify "No categories found" message for the Batch taxonomy
        function change_batch_taxonomy_messages( $messages ) {
            $taxonomy = get_taxonomy( 'batch' );

            $messages['category'] = array(
                0 => '', // Unused. Messages start at index 1.
                1 => 'Batch added.',
                2 => 'Batch deleted.',
                3 => 'Batch updated.',
                4 => 'Batch not added.',
                5 => 'Batch not updated.',
                6 => 'Batches deleted.',
            );

            $messages[ $taxonomy->name ] = array(
                0 => '', // Unused. Messages start at index 1.
                1 => 'Batch added.',
                2 => 'Batch deleted.',
                3 => 'Batch updated.',
                4 => 'Batch not added.',
                5 => 'Batch not updated.',
                6 => 'Batches deleted.',
            );

            $messages['term'] = array(
                0 => '', // Unused. Messages start at index 1.
                1 => 'Batch added.',
                2 => 'Batch deleted.',
                3 => 'Batch updated.',
                4 => 'Batch not added.',
                5 => 'Batch not updated.',
                6 => 'Batches deleted.',
            );

            return $messages;
        }
        add_filter( 'taxonomy_messages_batch', 'change_batch_taxonomy_messages' );
    // Modify "No categories found" message for the Batch taxonomy


    //custom field type for instite

        //STudent Purpose Selection field start
            function student_purpose(){
                add_meta_box("custom_field_student_purpose", "Purpose", "student_purpose_Field", "admissions", "normal", "low");
            }
            add_action("admin_init", "student_purpose");

            function student_purpose_Field(){

                global $post;

                $data = get_post_custom($post->ID);
                $val = isset($data['student_purpose_register']) ? esc_attr($data['student_purpose_register'][0]) : '';

                echo '<input type="text" name="student_purpose_register" id="student_purpose_register" value="'.$val.'" placeholder="Purpose"/>';
            }

            function save_student_purpose_register(){
                global $post;

                if(isset($_POST["student_purpose_register"])):
            
                    update_post_meta($post->ID, "student_purpose_register", $_POST["student_purpose_register"]);
                
                endif;

            }
            add_action("save_post", "save_student_purpose_register");
        //STudent Purpose Selection field end

        //STudent Course Selection field start
			function student_select_course(){
				add_meta_box("custom_student_select_course", "Select Course", "student_select_course_Field", "admissions", "normal", "low");
			}
			add_action("admin_init", "student_select_course");

			function student_select_course_Field(){

				global $post;

				$data = get_post_custom($post->ID);
				$val = isset($data['student_select_course_register']) ? esc_attr($data['student_select_course_register'][0]) : '';

				echo '<input type="text" name="student_select_course_register" id="student_select_course_register" value="'.$val.'" placeholder="Slect Course"/>';
			}

			function save_student_select_course_register(){
				global $post;

				if(isset($_POST["student_select_course_register"])):
			
					update_post_meta($post->ID, "student_select_course_register", $_POST["student_select_course_register"]);
				
				endif;

			}
			add_action("save_post", "save_student_select_course_register");
		//STudent Course Selection field end

        //STudent Duration of course field start
			function student_duration_of_course(){
				add_meta_box("custom_duration_of_course", "Duration of course", "student_duration_of_course_field", "admissions", "normal", "low");
			}
			add_action("admin_init", "student_duration_of_course");

			function student_duration_of_course_field(){

				global $post;

				$data = get_post_custom($post->ID);
				$val = isset($data['student_duration_of_course_register']) ? esc_attr($data['student_duration_of_course_register'][0]) : '';

				echo '<input type="text" name="student_duration_of_course_register" id="student_duration_of_course_register" value="'.$val.'" placeholder="Duration of course"/>';
			}

			function save_student_duration_of_course_register(){
				global $post;

				if(isset($_POST["student_duration_of_course_register"])):
			
					update_post_meta($post->ID, "student_duration_of_course_register", $_POST["student_duration_of_course_register"]);
				
				endif;

			}
			add_action("save_post", "save_student_duration_of_course_register");
		//STudent Duration of course field end

        //STudent student course fee field start
			function student_Admission_date_fee(){
				add_meta_box("custom_student_Admission_date_fee", "Select Your Course", "student_Admission_date_fee_field", "admissions", "normal", "low");
			}
			add_action("admin_init", "student_Admission_date_fee");

			function student_Admission_date_fee_field(){

				global $post;

				$data = get_post_custom($post->ID);
				$val = isset($data['student_Admission_date_fee_register']) ? esc_attr($data['student_Admission_date_fee_register'][0]) : '';

				echo '<input type="text" name="student_Admission_date_fee_register" id="student_Admission_date_fee_register" value="'.$val.'" placeholder="Select Your Course"/>';
			}

			function save_student_Admission_date_fee_register(){
				global $post;

				if(isset($_POST["student_Admission_date_fee_register"])):
			
					update_post_meta($post->ID, "student_Admission_date_fee_register", $_POST["student_Admission_date_fee_register"]);
				
				endif;

			}
			add_action("save_post", "save_student_Admission_date_fee_register");
		//STudent student course fee field end

        //STudent student Admission date field start
			function student_Admission_date(){
				add_meta_box("custom_student_Admission_date", "Admissions date", "student_Admission_date_field", "admissions", "normal", "low");
			}
			add_action("admin_init", "student_Admission_date");

			function student_Admission_date_field(){

				global $post;

				$data = get_post_custom($post->ID);
				$val = isset($data['student_Admission_date_register']) ? esc_attr($data['student_Admission_date_register'][0]) : '';

				echo '<input type="text" name="student_Admission_date_register" id="student_Admission_date_register" value="'.$val.'" placeholder="Student Admission Date"/>';
			}

			function save_student_Admission_date_register(){
				global $post;

				if(isset($_POST["student_Admission_date_register"])):
			
					update_post_meta($post->ID, "student_Admission_date_register", $_POST["student_Admission_date_register"]);
				
				endif;

			}
			add_action("save_post", "save_student_Admission_date_register");
		//STudent student Admission date field end
        
        //STudent student seassion start field start
			function student_seassion_start(){
				add_meta_box("custom_student_seassion_start", "Seassions Start", "student_seassion_start_field", "admissions", "normal", "low");
			}
			add_action("admin_init", "student_seassion_start");

			function student_seassion_start_field(){

				global $post;

				$data = get_post_custom($post->ID);
				$val = isset($data['student_seassion_start_register']) ? esc_attr($data['student_seassion_start_register'][0]) : '';

				echo '<input type="text" name="student_seassion_start_register" id="student_seassion_start_register" value="'.$val.'" placeholder="Seassion Start"/>';
			}

			function save_student_seassion_start_register(){
				global $post;

				if(isset($_POST["student_seassion_start_register"])):
			
					update_post_meta($post->ID, "student_seassion_start_register", $_POST["student_seassion_start_register"]);
				
				endif;

			}
			add_action("save_post", "save_student_seassion_start_register");
		//STudent student seassion start field end

        //STudent student seassion End field start
			function student_seassion_End(){
				add_meta_box("custom_student_seassion_End", "seassions Ends", "student_seassion_End_field", "admissions", "normal", "low");
			}
			add_action("admin_init", "student_seassion_End");

			function student_seassion_End_field(){

				global $post;

				$data = get_post_custom($post->ID);
				$val = isset($data['student_seassion_End_register']) ? esc_attr($data['student_seassion_End_register'][0]) : '';

				echo '<input type="text" name="student_seassion_End_register" id="student_seassion_End_register" value="'.$val.'" placeholder="Season Ends"/>';
			}

			function save_student_seassion_End_register(){
				global $post;

				if(isset($_POST["student_seassion_End_register"])):
			
					update_post_meta($post->ID, "student_seassion_End_register", $_POST["student_seassion_End_register"]);
				
				endif;

			}
			add_action("save_post", "save_student_seassion_End_register");
		//STudent student seassion end field end

        //STudent Batch field start
			function student_batch(){
				add_meta_box("custom_student_batch", "Batch", "student_batch_field", "admissions", "normal", "low");
			}
			add_action("admin_init", "student_batch");

			function student_batch_field(){

				global $post;

				$data = get_post_custom($post->ID);
				$val = isset($data['student_batch_register']) ? esc_attr($data['student_batch_register'][0]) : '';

				echo '<input type="text" name="student_batch_register" id="student_batch_register" value="'.$val.'" placeholder="Batch"/>';
			}

			function save_student_batch_register(){
				global $post;

				if(isset($_POST["student_batch_register"])):
			
					update_post_meta($post->ID, "student_batch_register", $_POST["student_batch_register"]);
				
				endif;

			}
			add_action("save_post", "save_student_batch_register");
		//STudent Batch field end

        //STudent NAme field start
			function student_Name(){
				add_meta_box("custom_student_Name", "Student Name", "student_Name_Field", "admissions", "normal", "low");
			}
			add_action("admin_init", "student_Name");

			function student_Name_Field(){

				global $post;

				$data = get_post_custom($post->ID);
				$val = isset($data['student_Name_register']) ? esc_attr($data['student_Name_register'][0]) : '';

				echo '<input type="text" name="student_Name_register" id="student_Name_register" value="'.$val.'" placeholder="Student Name"/>';
			}

			function save_student_Name_register(){
				global $post;

				if(isset($_POST["student_Name_register"])):
			
					update_post_meta($post->ID, "student_Name_register", $_POST["student_Name_register"]);
				
				endif;

			}
			add_action("save_post", "save_student_Name_register");
		//STudent NAme field end

        //STudent Email field start
			function student_Email(){
				add_meta_box("custom_student_Email", "STudent Email", "student_Email_Field", "admissions", "normal", "low");
			}
			add_action("admin_init", "student_Email");

			function student_Email_Field(){

				global $post;

				$data = get_post_custom($post->ID);
				$val = isset($data['student_Email_register']) ? esc_attr($data['student_Email_register'][0]) : '';

				echo '<input type="text" name="student_Email_register" id="student_Email_register" value="'.$val.'" placeholder="Email"/>';
			}

			function save_student_Email_register(){
				global $post;

				if(isset($_POST["student_Email_register"])):
			
					update_post_meta($post->ID, "student_Email_register", $_POST["student_Email_register"]);
				
				endif;

			}
			add_action("save_post", "save_student_Email_register");
		//STudent Email field end

        //STudent Fathers NAme field start
			function student_Fathers_name(){
				add_meta_box("custom_student_Fathers_name", "Fathers Name", "student_Fathers_name_Field", "admissions", "normal", "low");
			}
			add_action("admin_init", "student_Fathers_name");

			function student_Fathers_name_Field(){

				global $post;

				$data = get_post_custom($post->ID);
				$val = isset($data['student_Fathers_name_register']) ? esc_attr($data['student_Fathers_name_register'][0]) : '';

				echo '<input type="text" name="student_Fathers_name_register" id="student_Fathers_name_register" value="'.$val.'" placeholder="Fathers Name"/>';
			}

			function save_student_Fathers_name_register(){
				global $post;

				if(isset($_POST["student_Fathers_name_register"])):
			
					update_post_meta($post->ID, "student_Fathers_name_register", $_POST["student_Fathers_name_register"]);
				
				endif;

			}
			add_action("save_post", "save_student_Fathers_name_register");
		//STudent Fathers NAme field end

        //STudent Mothers Name field start
			function student_mothers_name(){
				add_meta_box("custom_student_mothers_name", "Mothers Name", "student_mothers_name_field", "admissions", "normal", "low");
			}
			add_action("admin_init", "student_mothers_name");

			function student_mothers_name_field(){

				global $post;

				$data = get_post_custom($post->ID);
				$val = isset($data['student_mothers_name_register']) ? esc_attr($data['student_mothers_name_register'][0]) : '';

				echo '<input type="text" name="student_mothers_name_register" id="student_mothers_name_register" value="'.$val.'" placeholder="Mothers Name"/>';
			}

			function save_student_mothers_name_register(){
				global $post;

				if(isset($_POST["student_mothers_name_register"])):
			
					update_post_meta($post->ID, "student_mothers_name_register", $_POST["student_mothers_name_register"]);
				
				endif;

			}
			add_action("save_post", "save_student_mothers_name_register");
		//STudent Mothers Name field end

        //STudent Gurdain Contact field start
			function student_gurdain_contact(){
				add_meta_box("custom_student_gurdain_contact", "Gurdain Contact", "student_gurdain_contact_gurdain_field", "admissions", "normal", "low");
			}
			add_action("admin_init", "student_gurdain_contact");

			function student_gurdain_contact_gurdain_field(){

				global $post;

				$data = get_post_custom($post->ID);
				$val = isset($data['student_gurdain_contact_register']) ? esc_attr($data['student_gurdain_contact_register'][0]) : '';

				echo '<input type="text" name="student_gurdain_contact_register" id="student_gurdain_contact_register" value="'.$val.'" placeholder="Gurdain Contact"/>';
			}

			function save_student_gurdain_contact_register(){
				global $post;

				if(isset($_POST["student_gurdain_contact_register"])):
			
					update_post_meta($post->ID, "student_gurdain_contact_register", $_POST["student_gurdain_contact_register"]);
				
				endif;

			}
			add_action("save_post", "save_student_gurdain_contact_register");
		//STudent Gurdain Contact field end

        //STudent Date of birth field start
			function student_Date_of_Birth(){
				add_meta_box("custom_student_Date_of_Birth", "Date of Birth", "student_Date_of_Birth_field", "admissions", "normal", "low");
			}
			add_action("admin_init", "student_Date_of_Birth");

			function student_Date_of_Birth_field(){

				global $post;

				$data = get_post_custom($post->ID);
				$val = isset($data['student_Date_of_Birth_register']) ? esc_attr($data['student_Date_of_Birth_register'][0]) : '';

				echo '<input type="text" name="student_Date_of_Birth_register" id="student_Date_of_Birth_register" value="'.$val.'" placeholder="Date Of Birth"/>';
			}

			function save_student_Date_of_Birth_register(){
				global $post;

				if(isset($_POST["student_Date_of_Birth_register"])):
			
					update_post_meta($post->ID, "student_Date_of_Birth_register", $_POST["student_Date_of_Birth_register"]);
				
				endif;

			}
			add_action("save_post", "save_student_Date_of_Birth_register");
		//STudent Date of birth field end

        //STudent Present Address field start
			function student_present_address(){
				add_meta_box("custom_student_present_address", "Present Address", "student_present_address_field", "admissions", "normal", "low");
			}
			add_action("admin_init", "student_present_address");

			function student_present_address_field(){

				global $post;

				$data = get_post_custom($post->ID);
				$val = isset($data['student_present_address_register']) ? esc_attr($data['student_present_address_register'][0]) : '';

				echo '<input type="text" name="student_present_address_register" id="student_present_address_register" value="'.$val.'" placeholder="Present Address"/>';
			}

			function save_student_present_address_register(){
				global $post;

				if(isset($_POST["student_present_address_register"])):
			
					update_post_meta($post->ID, "student_present_address_register", $_POST["student_present_address_register"]);
				
				endif;

			}
			add_action("save_post", "save_student_present_address_register");
		//STudent Present Address field end

        //STudent Permanent field start
			function student_permanent_address(){
				add_meta_box("custom_student_permanent_address", "Permanent Address", "student_permanent_address_field", "admissions", "normal", "low");
			}
			add_action("admin_init", "student_permanent_address");

			function student_permanent_address_field(){

				global $post;

				$data = get_post_custom($post->ID);
				$val = isset($data['student_permanent_address_register']) ? esc_attr($data['student_permanent_address_register'][0]) : '';

				echo '<input type="text" name="student_permanent_address_register" id="student_permanent_address_register" value="'.$val.'" placeholder="permaneent Address"/>';
			}

			function save_student_permanent_address_register(){
				global $post;

				if(isset($_POST["student_permanent_address_register"])):
			
					update_post_meta($post->ID, "student_permanent_address_register", $_POST["student_permanent_address_register"]);
				
				endif;

			}
			add_action("save_post", "save_student_permanent_address_register");
		//STudent Permanent field end

        //STudent contact number field start
			function student_contact_number(){
				add_meta_box("custom_student_contact_number", "Contact Number", "student_contact_number_field", "admissions", "normal", "low");
			}
			add_action("admin_init", "student_contact_number");

			function student_contact_number_field(){

				global $post;

				$data = get_post_custom($post->ID);
				$val = isset($data['student_contact_number_register']) ? esc_attr($data['student_contact_number_register'][0]) : '';

				echo '<input type="text" name="student_contact_number_register" id="student_contact_number_register" value="'.$val.'" placeholder="Contact Number"/>';
			}

			function save_student_contact_number_register(){
				global $post;

				if(isset($_POST["student_contact_number_register"])):
			
					update_post_meta($post->ID, "student_contact_number_register", $_POST["student_contact_number_register"]);
				
				endif;

			}
			add_action("save_post", "save_student_contact_number_register");
		//STudent contact number field end

        //STudent Password field start
			function student_password(){
				add_meta_box("custom_student_password", "Password", "student_password_field", "admissions", "normal", "low");
			}
			add_action("admin_init", "student_password");

			function student_password_field(){

				global $post;

				$data = get_post_custom($post->ID);
				$val = isset($data['student_password_register']) ? esc_attr($data['student_password_register'][0]) : '';

				echo '<input type="text" name="student_password_register" id="student_password_register" value="'.$val.'" placeholder="Password"/>';
			}

			function save_student_password_register(){
				global $post;

				if(isset($_POST["student_password_register"])):
			
					update_post_meta($post->ID, "student_password_register", $_POST["student_password_register"]);
				
				endif;

			}
			add_action("save_post", "save_student_password_register");
		//STudent Password field end

        //STudent Confirm Password field start
			function student_Confirm_password(){
				add_meta_box("custom_student_Confirm_password", "Confirm Password", "student_Confirm_password_Field", "admissions", "normal", "low");
			}
			add_action("admin_init", "student_Confirm_password");

			function student_Confirm_password_Field(){

				global $post;

				$data = get_post_custom($post->ID);
				$val = isset($data['student_Confirm_password_register']) ? esc_attr($data['student_Confirm_password_register'][0]) : '';

				echo '<input type="text" name="student_Confirm_password_register" id="student_Confirm_password_register" value="'.$val.'" placeholder="Confirm password"/>';
			}

			function save_student_Confirm_password_register(){
				global $post;

				if(isset($_POST["student_Confirm_password_register"])):
			
					update_post_meta($post->ID, "student_Confirm_password_register", $_POST["student_Confirm_password_register"]);
				
				endif;

			}
			add_action("save_post", "save_student_Confirm_password_register");
		//STudent Confirm Passwordss field end

        //SSC BOARD field start
				function student_SSC_board(){
					add_meta_box("custom_student_SSC_board", "SSC Board", "SSC_board", "admissions", "normal", "low");
				}
				add_action("admin_init", "student_SSC_board");

				function SSC_board(){

					global $post;

					$data = get_post_custom($post->ID);
					$val = isset($data['Student_SSC_board_register']) ? esc_attr($data['Student_SSC_board_register'][0]) : '';

					echo '<input type="text" name="Student_SSC_board_register" id="Student_SSC_board_register" value="'.$val.'" placeholder="SSC BOARD"/>';
				}

				function save_Student_SSC_board_register(){
					global $post;

					if(isset($_POST["Student_SSC_board_register"])):
				
						update_post_meta($post->ID, "Student_SSC_board_register", $_POST["Student_SSC_board_register"]);
					
					endif;

				}
				add_action("save_post", "save_Student_SSC_board_register");
			//SSC BOARD field end
			
			//SSC Roll field start
				function student_SSC_Roll(){
					add_meta_box("custom_student_SSC_Roll", "SSC Roll", "SSC_Roll", "admissions", "normal", "low");
				}
				add_action("admin_init", "student_SSC_Roll");

				function SSC_Roll(){

					global $post;

					$data = get_post_custom($post->ID);
					$val = isset($data['Student_SSC_Roll_register']) ? esc_attr($data['Student_SSC_Roll_register'][0]) : '';

					echo '<input type="text" name="Student_SSC_Roll_register" id="Student_SSC_Roll_register" value="'.$val.'" placeholder="SSC Roll"/>';
				}

				function save_Student_SSC_Roll_register(){
					global $post;

					if(isset($_POST["Student_SSC_Roll_register"])):
				
						update_post_meta($post->ID, "Student_SSC_Roll_register", $_POST["Student_SSC_Roll_register"]);
					
					endif;

				}
				add_action("save_post", "save_Student_SSC_Roll_register");
			//SSC Roll field end
			
			//SSC Registration field start
				function student_SSC_Registration(){
					add_meta_box("custom_student_SSC_Registration", "SSC Registration", "SSC_Registration", "admissions", "normal", "low");
				}
				add_action("admin_init", "student_SSC_Registration");

				function SSC_Registration(){

					global $post;

					$data = get_post_custom($post->ID);
					$val = isset($data['Student_SSC_Registration_register']) ? esc_attr($data['Student_SSC_Registration_register'][0]) : '';

					echo '<input type="text" name="Student_SSC_Registration_register" id="Student_SSC_Registration_register" value="'.$val.'" placeholder="SSC Registration"/>';
				}

				function save_Student_SSC_Registration_register(){
					global $post;

					if(isset($_POST["Student_SSC_Registration_register"])):
				
						update_post_meta($post->ID, "Student_SSC_Registration_register", $_POST["Student_SSC_Registration_register"]);
					
					endif;

				}
				add_action("save_post", "save_Student_SSC_Registration_register");
			//SSC Registration field end
			
			//SSC Passing Year field start
				function student_SSC_Passing_year(){
					add_meta_box("custom_student_SSC_Passing_year", "SSC Passing Year", "SSC_Passing_year", "admissions", "normal", "low");
				}
				add_action("admin_init", "student_SSC_Passing_year");

				function SSC_Passing_year(){

					global $post;

					$data = get_post_custom($post->ID);
					$val = isset($data['Student_SSC_Passing_year_register']) ? esc_attr($data['Student_SSC_Passing_year_register'][0]) : '';

					echo '<input type="text" name="Student_SSC_Passing_year_register" id="Student_SSC_Passing_year_register" value="'.$val.'" placeholder="SSC Passing Year"/>';
				}

				function save_Student_SSC_Passing_year_register(){
					global $post;

					if(isset($_POST["Student_SSC_Passing_year_register"])):
				
						update_post_meta($post->ID, "Student_SSC_Passing_year_register", $_POST["Student_SSC_Passing_year_register"]);
					
					endif;

				}
				add_action("save_post", "save_Student_SSC_Passing_year_register");
			//SSC Passing Year field end


            //Last_Exam BOARD field start
				function student_Last_Exam_board(){
					add_meta_box("custom_student_Last_Exam_board", "Last_Exam Board", "Last_Exam_board", "admissions", "normal", "low");
				}
				add_action("admin_init", "student_Last_Exam_board");

				function Last_Exam_board(){

					global $post;

					$data = get_post_custom($post->ID);
					$val = isset($data['Student_Last_Exam_board_register']) ? esc_attr($data['Student_Last_Exam_board_register'][0]) : '';

					echo '<input type="text" name="Student_Last_Exam_board_register" id="Student_Last_Exam_board_register" value="'.$val.'" placeholder="Last_Exam BOARD"/>';
				}

				function save_Student_Last_Exam_board_register(){
					global $post;

					if(isset($_POST["Student_Last_Exam_board_register"])):
				
						update_post_meta($post->ID, "Student_Last_Exam_board_register", $_POST["Student_Last_Exam_board_register"]);
					
					endif;

				}
				add_action("save_post", "save_Student_Last_Exam_board_register");
			//Last_Exam BOARD field end
		
			//Last_Exam Roll field start
				function student_Last_Exam_Roll(){
					add_meta_box("custom_student_Last_Exam_Roll", "Last Exam Roll", "Last_Exam_Roll", "admissions", "normal", "low");
				}
				add_action("admin_init", "student_Last_Exam_Roll");

				function Last_Exam_Roll(){

					global $post;

					$data = get_post_custom($post->ID);
					$val = isset($data['Student_Last_Exam_Roll_register']) ? esc_attr($data['Student_Last_Exam_Roll_register'][0]) : '';

					echo '<input type="text" name="Student_Last_Exam_Roll_register" id="Student_Last_Exam_Roll_register" value="'.$val.'" placeholder="Last_Exam Roll"/>';
				}

				function save_Student_Last_Exam_Roll_register(){
					global $post;

					if(isset($_POST["Student_Last_Exam_Roll_register"])):
				
						update_post_meta($post->ID, "Student_Last_Exam_Roll_register", $_POST["Student_Last_Exam_Roll_register"]);
					
					endif;

				}
				add_action("save_post", "save_Student_Last_Exam_Roll_register");
			//Last_Exam Roll field end
			
			//Last_Exam Registration field start
				function student_Last_Exam_Registration(){
					add_meta_box("custom_student_Last_Exam_Registration", "Last_Exam Registration", "Last_Exam_Registration", "admissions", "normal", "low");
				}
				add_action("admin_init", "student_Last_Exam_Registration");

				function Last_Exam_Registration(){

					global $post;

					$data = get_post_custom($post->ID);
					$val = isset($data['Student_Last_Exam_Registration_register']) ? esc_attr($data['Student_Last_Exam_Registration_register'][0]) : '';

					echo '<input type="text" name="Student_Last_Exam_Registration_register" id="Student_Last_Exam_Registration_register" value="'.$val.'" placeholder="Last_Exam Registration"/>';
				}

				function save_Student_Last_Exam_Registration_register(){
					global $post;

					if(isset($_POST["Student_Last_Exam_Registration_register"])):
				
						update_post_meta($post->ID, "Student_Last_Exam_Registration_register", $_POST["Student_Last_Exam_Registration_register"]);
					
					endif;

				}
				add_action("save_post", "save_Student_Last_Exam_Registration_register");
			//Last_Exam Registration field end
			
			//Last_Exam Passing Year field start
				function student_Last_Exam_Passing_year(){
					add_meta_box("custom_student_Last_Exam_Passing_year", "Last_Exam Passing Year", "Last_Exam_Passing_year", "admissions", "normal", "low");
				}
				add_action("admin_init", "student_Last_Exam_Passing_year");

				function Last_Exam_Passing_year(){

					global $post;

					$data = get_post_custom($post->ID);
					$val = isset($data['Student_Last_Exam_Passing_year_register']) ? esc_attr($data['Student_Last_Exam_Passing_year_register'][0]) : '';

					echo '<input type="text" name="Student_Last_Exam_Passing_year_register" id="Student_Last_Exam_Passing_year_register" value="'.$val.'" placeholder="Last_Exam Passing Year"/>';
				}

				function save_Student_Last_Exam_Passing_year_register(){
					global $post;

					if(isset($_POST["Student_Last_Exam_Passing_year_register"])):
				
						update_post_meta($post->ID, "Student_Last_Exam_Passing_year_register", $_POST["Student_Last_Exam_Passing_year_register"]);
					
					endif;

				}
				add_action("save_post", "save_Student_Last_Exam_Passing_year_register");
			//Last_Exam Passing Year field end

    //custom field type for instite

//Admission entry Database End