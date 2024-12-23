<?php 
/* Template Name: Admin Batch */
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
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>

            <?php
                if (isset($_POST['update_custom_field'])) {
                    // Get the post ID from the form
                    $post_id = intval($_POST['post_id']);

                    
                    $newPostTitle = $_POST['Seassion_name'];
                    $seassionStartDate = $_POST['seassion_start'];
                    $seassionEndDate = $_POST['seassion_end'];
                    $certificateIssueDate = $_POST['certificateIssueDate'];

                    $post_data = array(
                        'ID' => $post_id,
                        'post_title' => $newPostTitle,
                    );
                    wp_update_post($post_data);
                    
                    

                    // Update the custom field
                    update_post_meta($post_id, 'batch_session_start', $seassionStartDate);
                    update_post_meta($post_id, 'batch_session_end', $seassionEndDate);
                    update_post_meta($post_id, 'batch_certificate_issue_date', $certificateIssueDate);
                    
                    //redirect
                        if (isset($shiacomputeroption['adminBatch'])) {
                            $get_adminBatch_id = $shiacomputeroption['adminBatch']; // Get the selected page ID

                            if ($get_adminBatch_id) {
                                $get_adminBatch_link = get_permalink($get_adminBatch_id); // Get the permalink of the selected page
                            }
                        }
                        $location = $get_adminBatch_link; 

                        echo "<meta http-equiv='refresh' content='0;url=$location' />";
                        exit;
                };
                //redirect
            
            ?>

            <?php
            
                if (isset($_POST['create_batch'])) {
                    // Define the new post title
                    $newPostTitle = sanitize_text_field($_POST['session_name']); // Replace with your desired title
                    
                    // Define the custom field values
                    $sessionStartDate = sanitize_text_field($_POST['seassion_start']);
                    $sessionEndDate = sanitize_text_field($_POST['seassion_end']);
                    $certificateIssueDate = sanitize_text_field($_POST['certificateIssueDate']);
                    
                    // Create the new batch post
                    $newBatch = array(
                        'post_title' => $newPostTitle,
                        'post_type' => 'batch', // Custom post type name
                        'post_status' => 'publish', // Publish the post
                    );
                
                    $newBatchID = wp_insert_post($newBatch); // Insert the post and get the post ID
                    
                    // Check if the post was successfully created
                    if ($newBatchID) {
                        // Update the custom fields for the new batch
                        update_post_meta($newBatchID, 'batch_session_start', $sessionStartDate);
                        update_post_meta($newBatchID, 'batch_session_end', $sessionEndDate);
                        update_post_meta($newBatchID, 'batch_certificate_issue_date', $certificateIssueDate);
                
                        // Redirect to the newly created batch
                        // $newBatchLink = get_permalink($newBatchID);
                        //redirect
                            if (isset($shiacomputeroption['adminBatch'])) {
                                $get_adminBatch_id = $shiacomputeroption['adminBatch']; // Get the selected page ID

                                if ($get_adminBatch_id) {
                                    $get_adminBatch_link = get_permalink($get_adminBatch_id); // Get the permalink of the selected page
                                }
                            }
                            $location = $get_adminBatch_link; 

                            echo "<meta http-equiv='refresh' content='0;url=$location' />";
                            exit;
                        //redirect
                    } else {
                        echo 'Error: Failed to create the batch.';
                    };
                }
            
            ?>


            
            
            <div class="container mt-5">
                <h2>Batch List</h2>
                <button type="button" class="btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenterrr">Add new Batch</button>

                    <div class="modal fade" id="exampleModalCenterrr" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content rounded-0">
                                <div class="modal-body p-4 px-5">
                                    
                                    <div class="main-content text-center">
                                    <form method="post">
                                        <div class="form-group">
                                            <label for="session_name">Session Name</label>
                                            <input type="text" class="form-control" name="session_name" id="session_name" placeholder="Session Name" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="seassion_start">Session Start</label>
                                            <input type="text" class="form-control" name="seassion_start" id="seassion_start2" placeholder="Session Start" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="seassion_end">Session End</label>
                                            <input type="text" class="form-control" name="seassion_end" id="seassion_end2" placeholder="Session End" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="certificateIssueDate">Certificate Issue Date</label>
                                            <input type="text" class="form-control" name="certificateIssueDate" id="certificateIssueDate2" placeholder="Certificate Issue Date" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary" name="create_batch">Create New Batch</button>
                                    </form>


                                        

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Batch ID</th>
                            <th>BATCH</th> <!-- Add this column for post title -->
                            <th>Session Start</th>
                            <th>Session End</th>
                            <th>Certificate Issue Date</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $args = array(
                            'post_type' => 'batch', // Replace with your custom post type name
                            'posts_per_page' => -1,
                        );

                        $batch_query = new WP_Query($args);

                        if ($batch_query->have_posts()) :
                            while ($batch_query->have_posts()) : $batch_query->the_post();
                                $batch_id = get_the_ID();
                                $session_start = get_post_meta($batch_id, 'batch_session_start', true);
                                $session_end = get_post_meta($batch_id, 'batch_session_end', true);
                                $certificate_issue_date = get_post_meta($batch_id, 'batch_certificate_issue_date', true);
                                $post_title = get_the_title(); // Get the post title
                                ?>

                                <tr>
                                    <td><?php echo $batch_id; ?></td>
                                    <td><?php echo esc_html($post_title); ?></td> <!-- Display the post title -->
                                    <td><?php echo esc_html($session_start); ?></td>
                                    <td><?php echo esc_html($session_end); ?></td>
                                    <td><?php echo esc_html($certificate_issue_date); ?></td>
                                    <td>
                                        <button type="button" class="btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter<?php echo get_the_ID() ?>">Edit</button>

                                        <div class="modal fade" id="exampleModalCenter<?php echo get_the_ID() ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content rounded-0">
                                                    <div class="modal-body p-4 px-5">

                                                        
                                                        <div class="main-content text-center">
                                                            <form method="post">
                                                                <input type="hidden" name="post_id" required value="<?php echo get_the_ID(); ?>">

                                                                <div>
                                                                    <label for="seassion_start">Seassion Name</label>
                                                                    <input type="text" class="form-control" name="Seassion_name" required value="<?php echo esc_html($post_title); ?>">
                                                                </div>

                                                                <div>
                                                                    <label for="seassion_start">Seassion Start</label>
                                                                    <input type="text" class="form-control" name="seassion_start" id="seassion_start" required value="<?php echo esc_attr($session_start); ?>">
                                                                </div>

                                                                <div>
                                                                    <label for="seassion_end">Seassion End</label>
                                                                    <input type="text" class="form-control" name="seassion_end" id="seassion_end" required value="<?php echo esc_attr($session_end); ?>">
                                                                </div>
                                                                
                                                                <div>
                                                                    <label for="certificateIssueDate">Certificate Issue Date</label>
                                                                    <input type="text" class="form-control" name="certificateIssueDate" id="certificateIssueDate" required value="<?php echo esc_attr($certificate_issue_date); ?>">
                                                                </div>

                                                                <input type="submit" class="btn-primary btn-sm" name="update_custom_field" value="Add Payment">
                                                            </form>

                                                            

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                        
                                        if (isset($_POST['delete_post_id'])) {
                                            $post_id = $_POST['delete_post_id'];
                                        
                                            // Verify the nonce for security
                                            if (wp_verify_nonce($_POST['delete_post_nonce'], 'delete_post_' . $post_id) && current_user_can('delete_post', $post_id)) {
                                                // Delete the post
                                                wp_delete_post($post_id, true);
                                        
                                                // Redirect to a desired page after deleting the post
                                                if (isset($shiacomputeroption['adminBatch'])) {
                                                    $get_adminBatch_id = $shiacomputeroption['adminBatch']; // Get the selected page ID
                    
                                                    if ($get_adminBatch_id) {
                                                        $get_adminBatch_link = get_permalink($get_adminBatch_id); // Get the permalink of the selected page
                                                    }
                                                }
                                                $location = $get_adminBatch_link; 
                    
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
                                            <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>

                            <?php endwhile;
                        else :
                            ?>
                            <tr>
                                <td colspan="5">No batches found.</td>
                            </tr>
                        <?php
                        endif;
                        wp_reset_postdata();
                        ?>
                    </tbody>
                </table>
            </div>


            <!-- Content Row End -->

        </div>
        <!-- /.container-fluid -->

        <script>
            

            $(document).ready(function(){
                $("#seassion_start").datepicker({
                    dateFormat: "dd-mm-yy",
                });
                $("#seassion_end").datepicker({
                    dateFormat: "dd-mm-yy",
                });
                $("#certificateIssueDate").datepicker({
                    dateFormat: "dd-mm-yy",
                });
                $("#seassion_start2").datepicker({
                    dateFormat: "dd-mm-yy",
                });
                $("#seassion_end2").datepicker({
                    dateFormat: "dd-mm-yy",
                });
                $("#certificateIssueDate2").datepicker({
                    dateFormat: "dd-mm-yy",
                });
            });

        </script>


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