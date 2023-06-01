<?php 
/* Template Name: Admin Student Draft List */
require_once(get_template_directory(). '/admin/header.php');
?>

<?php
// Check if the current user is an administrator
if (is_user_logged_in() && current_user_can('administrator')) {
    
    require_once(get_template_directory(). '/admin/dashboardheader.php');?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Draft List</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>

            <!-- Content Row -->
            

            <section class="ftco-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center mb-5">
                            <h2 class="heading-section">Student List</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-wrap">
                                <table class="table table-responsive-xl">
                                    <thead>
                                        <tr>
                                            <th>REG No.</th>
                                            <th>Roll No.</th>
                                            <th>Batch</th>
                                            <th>Photo</th>
                                            <th>Student Name</th>
                                            <th>Fathers Name</th>
                                            <th>Course Name</th>
                                            <th>Contact</th>
                                            <th>Admission Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $args = array(
                                            'post_type' => 'admissions', // Replace 'your_custom_post_type' with the name of your custom post type
                                            'posts_per_page' => -1, // Retrieves all posts of the custom post type
                                            'post_status'   => 'draft',
                                        );

                                        $custom_query = new WP_Query($args);

                                        if ($custom_query->have_posts()) {
                                            while ($custom_query->have_posts()) {
                                                $custom_query->the_post();
                                                // Display the content or any other desired information of each post
                                                ?>
                                                <tr class="alert" role="alert">
                                                <td><?php

                                                    $serial_number = get_post_meta(get_the_ID(), 'custom_serial_number', true);

                                                    if ($serial_number) {
                                                    echo 'Serial Number: ' . $serial_number;
                                                    }
                                                    ?>
                                                    </td>
                                                    <td><?php $custom_meta_serial_number_meta_box = get_post_meta(get_the_ID(), 'custom_serial_number', true); echo $custom_meta_serial_number_meta_box; ?></td>
                                                    <td><?php $custom_student_purpose_register = get_post_meta(get_the_ID(), 'student_batch_register', true); echo $custom_student_purpose_register; ?></td>
                                                    <td class="d-flex align-items-center">
                                                        <div class="img">
                                                            <?php $thumbnail_url = get_the_post_thumbnail_url();?>
                                                            <img width="50" src="<?php echo $thumbnail_url ?>">
                                                        </div>
                                                    </td>
                                                    <td><?php $custom_student_select_course = get_post_meta(get_the_ID(), 'student_Name_register', true); echo $custom_student_select_course; ?></td>
                                                    <td><?php $custom_student_Name = get_post_meta(get_the_ID(), 'student_Fathers_name_register', true); echo $custom_student_Name; ?></td>
                                                    <td><?php $custom_student_select_course = get_post_meta(get_the_ID(), 'student_select_course_register', true); echo $custom_student_select_course; ?></td>
                                                    <td><?php $custom_student_contact_number = get_post_meta(get_the_ID(), 'student_contact_number_register', true); echo $custom_student_contact_number; ?></td>
                                                    <td><?php $custom_student_Admission_date = get_post_meta(get_the_ID(), 'student_Admission_date_register', true); echo $custom_student_Admission_date; ?></td>
                                                    <td class="status"><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                                        class="fa-solid fa-check text-white-50"></i> Draft</a></td>
                                                    <td>
                                                    <?php
                                                        if (isset($_POST['publish_button'])) {
                                                            $post_id = $_POST['post_id']; // Assuming you have the post ID available
                                                            $post_data = array(
                                                                'ID' => $post_id,
                                                                'post_status' => 'publish',
                                                            );

                                                            wp_update_post($post_data);
                                                            echo "<meta http-equiv='refresh' content='0;url=$location' />";
                                                            exit;
                                                        };
                                                        if (isset($_POST['delete_post_id'])) {
                                                            $post_id = $_POST['delete_post_id'];
                                                        
                                                            // Verify the nonce for security
                                                            if (wp_verify_nonce($_POST['delete_post_nonce'], 'delete_post_' . $post_id) && current_user_can('delete_post', $post_id)) {
                                                                // Delete the post
                                                                wp_delete_post($post_id, true);
                                                        
                                                                // Redirect to a desired page after deleting the post
                                                                if (isset($shiacomputeroption['adminStudentDraft'])) {
                                                                    $get_admsinStudentDraftLink_id = $shiacomputeroption['adminStudentDraft']; // Get the selected page ID
                                    
                                                                    if ($get_admsinStudentDraftLink_id) {
                                                                        $get_admsinStudentLink_link = get_permalink($get_admsinStudentDraftLink_id); // Get the permalink of the selected page
                                                                    }
                                                                }
                                                                $location = $get_admsinStudentLink_link; 

                                                                echo "<meta http-equiv='refresh' content='0;url=$location' />";
                                                                exit;
                                                            } else {
                                                                // Display an error message or handle invalid request
                                                                echo 'Invalid delete request.';
                                                            }
                                                        }
                                                    ?>
                                                        <form method="post" action="">
                                                            <input type="hidden" name="delete_post_id" value="<?php echo esc_attr(get_the_ID()); ?>">
                                                            <?php wp_nonce_field('delete_post_' . get_the_ID(), 'delete_post_nonce'); ?>
                                                            <button type="submit" class="delete-post-button">Delete Post</button>
                                                        
                                                            <input class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="hidden" name="post_id" value="<?php echo get_the_ID() ?>"> <!-- Replace 123 with the actual post ID -->
                                                            <input type="submit" name="publish_button" value="Approve Admission">
                                                        </form>
                                                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                                        class="fas fa-download fa-sm text-white-50"></i> View Admission</a>
                                                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                                        class="fas fa-download fa-sm text-white-50"></i> Registration Card</a>
                                                    </button>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            // No posts found
                                        }
                                        wp_reset_postdata(); // Reset the query
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!-- Content Row End -->

        </div>
        <!-- /.container-fluid -->

    <?php require_once(get_template_directory(). '/admin/dashboardfooter.php');

    
} else {
        ?>

        <div class="limiter">
            <div class="container-login100" style="background-image: url('http://localhost/shiacomputer/wp-content/uploads/2023/05/bg-01.jpg');">
                <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
                
                <div class="alert alert-primary" role="alert">
                        <span class="login100-form-title p-b-53">
                            Your are Not Allowed to visit this page
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