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
                
                $seassionStartDate = $_POST['seassion_start'];
                $seassionEndDate = $_POST['seassion_end'];
                $certificateIssueDate = $_POST['certificateIssueDate'];

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
                    }
                //redirect
            ?>


            
            
            <div class="container mt-5">
                <h2>Batch List</h2>
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
                                                            
                                                            <p class="mb-4">Total Due Aount : <?php $seassion_end2 = get_post_meta(get_the_ID(), 'student_due_amount_register', true); echo $seassion_end2 ?></p>
                                                            <form method="post">
                                                                <input type="hidden" name="post_id" required value="<?php echo get_the_ID(); ?>">
                                                                
                                                                <div>
                                                                    <label for="seassion_start">Seassion Start</label>
                                                                    <input type="date" name="seassion_start" id="seassion_start" required value="<?php echo esc_attr($seassion_start); ?>">
                                                                </div>

                                                                <div>
                                                                    <label for="seassion_end">Seassion End</label>
                                                                    <input type="date" name="seassion_end" id="seassion_end" required value="<?php echo esc_attr($seassion_end); ?>">
                                                                </div>
                                                                
                                                                <div>
                                                                    <label for="certificateIssueDate">Certificate Issue Date</label>
                                                                    <input type="date" name="certificateIssueDate" id="certificateIssueDate" required value="<?php echo esc_attr($certificate_issue_date); ?>">
                                                                </div>

                                                                <input type="submit" class="btn-primary btn-sm" name="update_custom_field" value="Add Payment">
                                                            </form>

                                                            

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
            // JavaScript to calculate Seassion End and Certificate Issue Date
            document.getElementById('seassion_start').addEventListener('change', function() {
                var startDate = new Date(this.value);
                var endDate = new Date(startDate);
                
                // Calculate the last day of the month for Seassion End
                endDate.setMonth(endDate.getMonth() + 6); // Add 6 months
                endDate.setDate(0); // Set to the last day of the month

                document.getElementById('seassion_end').valueAsDate = endDate;

                var certificateIssueDate = new Date(endDate);
                certificateIssueDate.setDate(certificateIssueDate.getDate() + 1); // Add 1 day
                document.getElementById('certificateIssueDate').valueAsDate = certificateIssueDate;
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