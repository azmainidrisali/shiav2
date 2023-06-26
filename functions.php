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

		
		function redirect_admin_after_login($user_login, $user) {
			// Check if the user is an administrator
			if (in_array('administrator', $user->roles)) {
				global $shiacomputeroption;

                if (isset($shiacomputeroption['adminPanelLink'])) {
                    $get_adminpanel_id = $shiacomputeroption['adminPanelLink']; // Get the selected page ID

                    if ($get_adminpanel_id) {
                        $get_adminpanel_link = get_permalink($get_adminpanel_id); // Get the permalink of the selected page
                    }
                }
				$redirect_url = $get_adminpanel_link;
				wp_redirect($redirect_url);
				exit;
			}
		}
		add_action('wp_login', 'redirect_admin_after_login', 10, 2);


        
        
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
		'taxonomy' => 'batch',
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
  


	function handle_category_deletion() {
		if (isset($_POST['action']) && $_POST['action'] === 'delete_category') {
			$category_id = isset($_POST['category_id']) ? intval($_POST['category_id']) : 0;

			if ($category_id > 0) {
				// Check if the category is part of the custom taxonomy called "batch"
				$taxonomy = 'batch';
				$term = get_term($category_id, $taxonomy);

				if ($term && !is_wp_error($term)) {
					// Delete the term
					wp_delete_term($term->term_id, $taxonomy);

					// Optionally, you can perform additional actions after category deletion.
					// For example, displaying a success message or redirecting the user.

					// Redirect the user back to the same page
					$get_adminBatchRed_link = ''; // Define the redirect URL

					$shiacomputeroption = get_option('shiacomputeroption'); // Get the option value from the database

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
		}
	}
	add_action('admin_post_nopriv_delete_category', 'handle_category_deletion');
	add_action('admin_post_delete_category', 'handle_category_deletion');



  //reduc framework connect

//Admission entry Database start


	function add_thumbnail_support() {
			add_theme_support('post-thumbnails', array('admissions'));
		}
	add_action('after_setup_theme', 'add_thumbnail_support');


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
                'supports'            => array( 'title','thumbnail', 'author'),
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
				add_meta_box("custom_student_Admission_date_fee", "Course Fee", "student_Admission_date_fee_field", "admissions", "normal", "low");
			}
			add_action("admin_init", "student_Admission_date_fee");

			function student_Admission_date_fee_field(){

				global $post;

				$data = get_post_custom($post->ID);
				$val = isset($data['student_Admission_date_fee_register']) ? esc_attr($data['student_Admission_date_fee_register'][0]) : '';

				echo '<input type="text" name="student_Admission_date_fee_register" id="student_Admission_date_fee_register" value="'.$val.'" placeholder="Course Fee"/>';
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

        //STudent Goverment ID type start
			function gov_id_type(){
				add_meta_box("custom_gov_id_type", "Gov id Type", "gov_id_type_Field", "admissions", "normal", "low");
			}
			add_action("admin_init", "gov_id_type");

			function gov_id_type_Field(){

				global $post;

				$data = get_post_custom($post->ID);
				$val = isset($data['gov_id_type_register']) ? esc_attr($data['gov_id_type_register'][0]) : '';

				echo '<input type="text" name="gov_id_type_register" id="gov_id_type_register" value="'.$val.'" placeholder="Gov id Type"/>';
			}

			function save_gov_id_type_register(){
				global $post;

				if(isset($_POST["gov_id_type_register"])):
			
					update_post_meta($post->ID, "gov_id_type_register", $_POST["gov_id_type_register"]);
				
				endif;

			}
			add_action("save_post", "save_gov_id_type_register");
		//STudent Goverment ID type end

        //STudent ID Number selected gov paper type start
			function Gov_id_num(){
				add_meta_box("custom_Gov_id_num", "Gov ID num", "Gov_id_num_Field", "admissions", "normal", "low");
			}
			add_action("admin_init", "Gov_id_num");

			function Gov_id_num_Field(){

				global $post;

				$data = get_post_custom($post->ID);
				$val = isset($data['Gov_id_num_register']) ? esc_attr($data['Gov_id_num_register'][0]) : '';

				echo '<input type="text" name="Gov_id_num_register" id="Gov_id_num_register" value="'.$val.'" placeholder="Gov ID num"/>';
			}

			function save_Gov_id_num_register(){
				global $post;

				if(isset($_POST["Gov_id_num_register"])):
			
					update_post_meta($post->ID, "Gov_id_num_register", $_POST["Gov_id_num_register"]);
				
				endif;

			}
			add_action("save_post", "save_Gov_id_num_register");
		//STudent ID Number selected gov paper type end

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
		
		//STudent Pay Amount start
			function student_pay_amount(){
				add_meta_box("custom_student_pay_amount", "Student Payed Amount", "student_pay_amount_Field", "admissions", "normal", "low");
			}
			add_action("admin_init", "student_pay_amount");

			function student_pay_amount_Field(){

				global $post;

				$data = get_post_custom($post->ID);
				$val = isset($data['student_pay_amount_register']) ? esc_attr($data['student_pay_amount_register'][0]) : '';

				echo '<input type="text" name="student_pay_amount_register" id="student_pay_amount_register" value="'.$val.'" placeholder="Student Payed Amount"/>';
			}

			function save_student_pay_amount_register(){
				global $post;

				if(isset($_POST["student_pay_amount_register"])):
			
					update_post_meta($post->ID, "student_pay_amount_register", $_POST["student_pay_amount_register"]);
				
				endif;

			}
			add_action("save_post", "save_student_pay_amount_register");
		//STudent Pay Amount field end
		
		//STudent Due Amount start
			function student_due_amount(){
				add_meta_box("custom_student_due_amount", "Student Due Amount", "student_due_amount_Field", "admissions", "normal", "low");
			}
			add_action("admin_init", "student_due_amount");

			function student_due_amount_Field(){

				global $post;

				$data = get_post_custom($post->ID);
				$val = isset($data['student_due_amount_register']) ? esc_attr($data['student_due_amount_register'][0]) : '';

				echo '<input type="text" name="student_due_amount_register" id="student_due_amount_register" value="'.$val.'" placeholder="Student Due Amount"/>';
			}

			function save_student_due_amount_register(){
				global $post;

				if(isset($_POST["student_due_amount_register"])):
			
					update_post_meta($post->ID, "student_due_amount_register", $_POST["student_due_amount_register"]);
				
				endif;

			}
			add_action("save_post", "save_student_due_amount_register");
		//STudent Due Amount field end

		//STudent Pay method start
			function student_pay_method(){
				add_meta_box("custom_student_pay_method", "Student Payment Method", "student_pay_method_Field", "admissions", "normal", "low");
			}
			add_action("admin_init", "student_pay_method");

			function student_pay_method_Field(){

				global $post;

				$data = get_post_custom($post->ID);
				$val = isset($data['student_pay_method_register']) ? esc_attr($data['student_pay_method_register'][0]) : '';

				echo '<input type="text" name="student_pay_method_register" id="student_pay_method_register" value="'.$val.'" placeholder="Student Payment Method"/>';
			}

			function save_student_pay_method_register(){
				global $post;

				if(isset($_POST["student_pay_method_register"])):
			
					update_post_meta($post->ID, "student_pay_method_register", $_POST["student_pay_method_register"]);
				
				endif;

			}
			add_action("save_post", "save_student_pay_method_register");
		//STudent Pay method end

		


		//STudent Result Selection field start
			function Stuent_result(){
				add_meta_box("custom_Stuent_result", "Student Result", "Stuent_result_Field", "admissions", "normal", "low");
			}
			add_action("admin_init", "Stuent_result");

			function Stuent_result_Field(){

				global $post;

				$data = get_post_custom($post->ID);
				$val = isset($data['Stuent_result_register']) ? esc_attr($data['Stuent_result_register'][0]) : '';

				echo '<input type="text" name="Stuent_result_register" id="Stuent_result_register" value="'.$val.'" placeholder="Result"/>';
			}

			function save_Stuent_result_register(){
				global $post;

				if(isset($_POST["Stuent_result_register"])):
			
					update_post_meta($post->ID, "Stuent_result_register", $_POST["Stuent_result_register"]);
				
				endif;

			}
			add_action("save_post", "save_Stuent_result_register");
		//STudent Result Selection field end

		//STudent Result Selection field start
			function certificate_issue(){
				add_meta_box("custom_certificate_issue", "Certificate Issue Date", "certificate_issue_Field", "admissions", "normal", "low");
			}
			add_action("admin_init", "certificate_issue");

			function certificate_issue_Field(){

				global $post;

				$data = get_post_custom($post->ID);
				$val = isset($data['certificate_issue_register']) ? esc_attr($data['certificate_issue_register'][0]) : '';

				echo '<input type="text" name="certificate_issue_register" id="certificate_issue_register" value="'.$val.'" placeholder="Certificate Issue Date"/>';
			}

			function save_certificate_issue_register(){
				global $post;

				if(isset($_POST["certificate_issue_register"])):
			
					update_post_meta($post->ID, "certificate_issue_register", $_POST["certificate_issue_register"]);
				
				endif;

			}
			add_action("save_post", "save_certificate_issue_register");
		//STudent Result Selection field end


//server information start

	function display_server_quota_html() {
		$total_space = disk_total_space('/');	
		$free_space = disk_free_space('/');
		$used_space = $total_space - $free_space;

		// Format the sizes in a human-readable format
		$total_space_formatted = format_size($total_space);
		$used_space_formatted = format_size($used_space);
		$free_space_formatted = format_size($free_space);

		// Prepare the HTML output
		$output = "<p>Total Space: $total_space_formatted</p>";
		$output .= "<p>Used Space: $used_space_formatted</p>";
		$output .= "<p>Free Space: $free_space_formatted</p>";

		return $output;
	}

	// Function to format the size in a human-readable format
	function format_size($size) {
		$units = array('B', 'KB', 'MB', 'GB', 'TB');
		$index = 0;

		while ($size >= 1024 && $index < count($units) - 1) {
			$size /= 1024;
			$index++;
		}

		return round($size, 2) . ' ' . $units[$index];
	}

	// Call the function to display the server quota
	$server_quota_html = display_server_quota_html();

//server information End


//sms function
	function SendSMS($number,$text){
		$url = "https://login.esms.com.bd/api/v3/sms/send";
		$api_token ="153|yjMC3EfXZGxu0kSiDtFZo2c4mdDg4zrFJKZf0Vkw"; //Your Api Token
		$sender_id ="8809601003609";//Sender ID/Non masking Number
		$type ="plain";

		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$headers = array(
		"Authorization: Bearer $api_token",
		"Content-Type: application/json",
		);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

		$data = array('recipient' => $number, 'message'=>$text,'sender_id'=>$sender_id,'type'=>'plain' );

		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

		//for debug only!
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		$resp = curl_exec($curl);
		curl_close($curl);
		var_dump($resp);
		
	}

	function get_admissions_count() {
		$args = array(
			'post_type'      => 'admissions',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
		);

		$query = new WP_Query($args);
		$count = $query->found_posts;

		return $count;
	}

	function display_admissions_count() {
		$count = get_admissions_count();
		echo 'Total Admissions: ' . $count;
	}

	function get_admissions_count_with_result() {
		$args = array(
			'post_type'      => 'admissions',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
			'meta_query'     => array(
				'relation' => 'AND',
				array(
					'key'     => 'Stuent_result_register',
					'value'   => '',  // Empty value to check if the meta field has any value assigned
					'compare' => '!='  // Use '!=' to compare if the meta field is not empty
				)
			)
		);

		$query = new WP_Query($args);
		$count = $query->found_posts;

		return $count;
	}

	function display_admissions_count_with_result() {
		$count = get_admissions_count_with_result();
		echo 'Total Admissions with Result: ' . $count;
	}

	function displaySMSBalance($apiToken) {
		$endpoint = 'https://login.esms.com.bd/api/v3/balance';

		$options = array(
			'http' => array(
			'header' => "Authorization: Bearer " . $apiToken . "\r\n" .
						"Accept: application/json\r\n",
			'method' => 'GET'
			)
		);

		$context = stream_context_create($options);
		$response = file_get_contents($endpoint, false, $context);

		$responseData = json_decode($response, true);

		if ($responseData['status'] === 'success') {
			$balanceData = $responseData['data'];

			if (isset($balanceData['remaining_unit'])) {
			$balance = $balanceData['remaining_unit'];
			echo 'SMS Blance: ' . $balance . ' BDT';
			} else {
			echo 'Unable to retrieve balance data.';
			}
		} else {
			echo 'Failed to retrieve balance. Please check your API token or try again later.';
		}
	}
//sms function


//registration number start
// Admission student role number
function add_custom_serial_number_meta_box() {
    add_meta_box(
        'custom_serial_number_meta_box', // Meta box ID
        'Registration Number', // Meta box title
        'generate_custom_serial_number_meta_box', // Callback function to render meta box content
        'admissions', // Replace with your custom post type slug
        'normal', // Meta box position (normal, side, advanced)
        'default' // Meta box priority (high, core, default, low)
    );
}
add_action('add_meta_boxes', 'add_custom_serial_number_meta_box');

// Callback function to render meta box content
function generate_custom_serial_number_meta_box($post) {
    $serial_number = get_post_meta($post->ID, 'custom_serial_number', true);
    ?>
    <p><strong>Registration NUMBER: </strong><?php echo $serial_number; ?></p>
    <?php
}

// Generate and save custom serial number when a new post is published
function save_custom_serial_number($new_status, $old_status, $post) {
    // Check if the post is of your custom post type and if it transitioned to "publish" status
    $post_type = $post->post_type;
    if ($post_type !== 'admissions' || $new_status !== 'publish' || $old_status === 'publish') {
        return;
    }

    // Check if the serial number has already been generated for this post
    $existing_serial_number = get_post_meta($post->ID, 'custom_serial_number', true);
    if (!empty($existing_serial_number)) {
        return; // Serial number already exists, no need to generate again
    }

    // Get the total number of published posts for your custom post type
    $args = array(
        'post_type'      => 'admissions', // Replace with your custom post type slug
        'post_status'    => 'publish',
        'posts_per_page' => -1,
    );
    $posts = get_posts($args);
    $post_count = count($posts);

    // Determine the starting serial number with leading zeros
    $starting_serial = str_pad($post_count + 110, 4, '0', STR_PAD_LEFT);

    // Generate the serial number
    $serial_number = '2022' . $starting_serial;

    // Save the serial number
    update_post_meta($post->ID, 'custom_serial_number', $serial_number);
}
add_action('transition_post_status', 'save_custom_serial_number', 10, 3);



function add_custom_roll_number_meta_box() {
    add_meta_box(
        'custom_roll_number_meta_box', // Meta box ID
        'Roll Number', // Meta box title
        'generate_custom_roll_number_meta_box', // Callback function to render meta box content
        'admissions', // Replace with your custom post type slug
        'normal', // Meta box position (normal, side, advanced)
        'default' // Meta box priority (high, core, default, low)
    );
}
add_action('add_meta_boxes', 'add_custom_roll_number_meta_box');

// Callback function to render meta box content
function generate_custom_roll_number_meta_box($post) {
    $roll_number = get_post_meta($post->ID, 'custom_roll_number', true);
    ?>
    <p><strong>Roll Number: </strong><?php echo $roll_number; ?></p>
    <?php
}

// Generate and save unique roll number combined with sequential number when a new post is published
function save_custom_roll_number($post_id) {
    // Check if the post is of your custom post type and if it is published
    $post_type = get_post_type($post_id);
    $post_status = get_post_status($post_id);
    if ($post_type !== 'admissions' || $post_status !== 'publish') {
        return;
    }

    // Check if the roll number has already been generated for this post
    $existing_roll_number = get_post_meta($post_id, 'custom_roll_number', true);
    if (!empty($existing_roll_number)) {
        return; // Roll number already exists, no need to generate again
    }

    // Get the total number of published posts for your custom post type
    $args = array(
        'post_type'      => 'admissions', // Replace with your custom post type slug
        'post_status'    => 'publish',
        'posts_per_page' => -1,
    );
    $posts = get_posts($args);
    $post_count = count($posts);

    // Determine the sequential number with leading zeros
    $sequential_number = $post_count;
    if ($sequential_number < 10) {
        $sequential_number = sprintf('%04d', $sequential_number);
    }

    // Generate the roll number with the '2022' prefix and sequential number
    $roll_number_prefix = '2022';
    $roll_number = $roll_number_prefix . $sequential_number;

    // Save the roll number and sequential number
    update_post_meta($post_id, 'custom_roll_number', $roll_number);
    update_post_meta($post_id, 'sequential_number', $sequential_number);
}
add_action('save_post', 'save_custom_roll_number');





// roll number end


//serial number
function add_student_certificate_serial_number_meta_box() {
    add_meta_box(
        'student_certificate_serial_number_meta_box', // Meta box ID
        'Certificate Serial Number', // Meta box title
        'generate_student_certificate_serial_number_meta_box', // Callback function to render meta box content
        'admissions', // Replace with your custom post type slug
        'normal', // Meta box position (normal, side, advanced)
        'default' // Meta box priority (high, core, default, low)
    );
}
add_action('add_meta_boxes', 'add_student_certificate_serial_number_meta_box');

// Callback function to render meta box content
function generate_student_certificate_serial_number_meta_box($post) {
    $serial_number = get_post_meta($post->ID, 'student_certificate_serial_number', true);
    ?>
    <p><strong>Certificate Serial Number: </strong><?php echo $serial_number; ?></p>
    <?php
}

// Generate and save unique student certificate serial number starting from 8977 when a new post is created or updated
function save_student_certificate_serial_number($post_id) {
    // Check if the post is of your custom post type
    $post_type = get_post_type($post_id);
    if ($post_type !== 'admissions') {
        return;
    }

    // Check if the post already has a certificate serial number
    $serial_number = get_post_meta($post_id, 'student_certificate_serial_number', true);
    if (!$serial_number) {
        // Get the total number of published and draft posts for your custom post type
        $args = array(
            'post_type'      => 'admissions', // Replace with your custom post type slug
            'post_status'    => array('publish', 'draft'),
            'posts_per_page' => -1,
        );
        $posts = get_posts($args);
        $post_count = count($posts);

        // Determine the starting serial number
        $starting_serial = str_pad(1330 + $post_count, 4, '0', STR_PAD_LEFT);

        // Generate the certificate serial number with the '22' prefix
        $serial_number = '22' . $starting_serial;

        // Save the certificate serial number
        update_post_meta($post_id, 'student_certificate_serial_number', $serial_number);
    }
}
add_action('save_post', 'save_student_certificate_serial_number');

//serial number

// certificate Serial Number start

function display_users_table() {
    // Get all users
    $users = get_users();

    if (!empty($users)) {
        // Start the table
        echo '<table class="table table-bordered">';
        echo '<thead><tr><th>Profile Picture</th><th>Registration Number</th><th>Syesteam ID</th><th>Username</th><th>Email</th><th>Roll number</th></tr></thead>';
        echo '<tbody>';

        // Loop through each user
        foreach ($users as $user) {
            $user_id = $user->ID;
            $username = $user->user_login;
            $email = $user->user_email;

            // Get user's first post
            $args = array(
                'author' => $user_id,
                'posts_per_page' => 1,
                'orderby' => 'date',
                'order' => 'ASC',
                'post_type' => 'admissions', // Adjust the post type if necessary
            );
            $user_posts = get_posts($args);

            $first_post_meta = '';
            $first_post_meta2 = '';
            $thumbnail_url = '';
            if (!empty($user_posts)) {
                // Get the custom meta value from the first post
                $first_post_id = $user_posts[0]->ID;
                $first_post_meta = get_post_meta($first_post_id, 'custom_roll_number', true);
                $first_post_meta2 = get_post_meta($first_post_id, 'custom_serial_number', true);
                $thumbnail_url = get_the_post_thumbnail_url($first_post_id, 'thumbnail');
            }

            // Display user data in table rows
            echo '<tr>';
            echo '<td><img width="100" src="' . $thumbnail_url . '"></td>';
            echo '<td>' . $first_post_meta2 . '</td>';
            echo '<td>' . $user_id . '</td>';
            echo '<td>' . $username . '</td>';
            echo '<td>' . $email . '</td>';
            echo '<td>' . $first_post_meta . '</td>';
            echo '</tr>';
        }

        // End the table
        echo '</tbody></table>';
    } else {
        echo 'No users found.';
    }
}

// Modify search query for custom post type "admissions"
function custom_admissions_search_query($query) {
	if (is_search() && $query->is_main_query() && isset($_GET['rollNumber'])) {
	  $rollNumber = sanitize_text_field($_GET['rollNumber']);
  
	  $metaQuery = array(
		'key' => 'custom_roll_number',
		'value' => $rollNumber,
		'compare' => '='
	  );
  
	  $query->set('post_type', 'admissions');
	  $query->set('meta_query', array($metaQuery));
	}
  }
  add_action('pre_get_posts', 'custom_admissions_search_query');
  


// Function to handle the Ajax request and check user existence
function check_user_existence() {
    // Get the name entered by the user from the Ajax request
    $user_name = $_POST['user_name'];

    // Check if the user exists based on the name
    $user = get_user_by('login', $user_name);

    if ($user) {
        // User exists
        echo 'exists';
    } else {
        // User does not exist
        echo 'not_exists';
    }

    exit; // Terminate the script after sending the response
}
add_action('wp_ajax_check_user', 'check_user_existence');
add_action('wp_ajax_nopriv_check_user', 'check_user_existence');


//custom wp-admin area post table
// Step 1: Add custom columns to the admissions post type table
function admissions_custom_columns($columns) {
	$columns['custom_roll_number'] = 'Roll Number';
	$columns['custom_serial_number'] = 'Registration Number';
	return $columns;
  }
  add_filter('manage_admissions_posts_columns', 'admissions_custom_columns');
  
  // Step 2: Display custom field values in the custom columns
  function admissions_custom_column($column, $post_id) {
	if ($column === 'custom_roll_number') {
	  $custom_roll_number = get_post_meta($post_id, 'custom_roll_number', true);
	  echo $custom_roll_number;
	}
  
	if ($column === 'custom_serial_number') {
	  $custom_serial_number = get_post_meta($post_id, 'custom_serial_number', true);
	  echo $custom_serial_number;
	}
  }
  add_action('manage_admissions_posts_custom_column', 'admissions_custom_column', 10, 2);
  
  // Step 3: Make the custom columns sortable (optional)
  function admissions_sortable_columns($columns) {
	$columns['custom_roll_number'] = 'custom_roll_number';
	$columns['custom_serial_number'] = 'custom_serial_number';
	return $columns;
  }
  add_filter('manage_edit-admissions_sortable_columns', 'admissions_sortable_columns');
  
  