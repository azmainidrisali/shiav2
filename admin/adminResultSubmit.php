<?php 
/* Template Name: Admin Result Submit */
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
                <h1 class="h3 mb-0 text-gray-800">Result</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>

            <!-- Content Row -->
            
            <?php
// Initialize the success message variable
$success_message = '';

// Initialize the array to store updated post titles
$updated_post_titles = array();

// Handle the bulk update
if (isset($_POST['update_posts'])) {
    $selected_posts = isset($_POST['selected_posts']) ? $_POST['selected_posts'] : array();

    foreach ($selected_posts as $post_id) {
        // Perform the necessary updates for each selected post
        // Replace the placeholders below with your actual update logic

        $new_title = isset($_POST['title_' . $post_id]) ? $_POST['title_' . $post_id] : '';

        if (!empty($new_title)) {
            wp_update_post(array(
                'ID'         => $post_id,
                'post_title' => $new_title,
            ));

            // Add the updated post title to the array
            $updated_post_titles[] = $new_title;
        }

        // Update the custom field "student_purpose_register"
        $new_purpose = isset($_POST['purpose_' . $post_id]) ? $_POST['purpose_' . $post_id] : '';
        update_post_meta($post_id, 'Stuent_result_register', $new_purpose);
    }

    // Set the success message
    $success_message = 'Bulk update completed successfully.';
}
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <form method="post" action="">
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" class="form-control" id="filter-keyword" placeholder="Enter keyword to filter">
                        <div class="input-group-append">
                            <button type="button" id="filter-posts-btn" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <button type="button" id="select-all-btn" class="btn btn-primary">Select All</button>
                    <input type="submit" name="update_posts" class="btn btn-primary" value="Update Selected Posts">
                </div>
            </div>

            <?php
            $args = array(
                'post_type'      => 'admissions',
                'posts_per_page' => -1, // Retrieve all admissions posts
            );

            $admissions_query = new WP_Query($args);

            if ($admissions_query->have_posts()) {
                echo '<table class="table">';
                echo '<thead class="thead-light">';
                echo '<tr><th scope="col"><input type="checkbox" id="select-all-checkbox"></th><th scope="col">Student Name</th><th scope="col">Batch Number</th><th scope="col">Content</th><th scope="col">Results</th></tr>';
                echo '</thead>';
                echo '<tbody>';

                while ($admissions_query->have_posts()) {
                    $admissions_query->the_post();
                    $post_id = get_the_ID();
                    $post_title = get_the_title();
                    $post_content = get_the_content();
                    $purpose_value = get_post_meta($post_id, 'Stuent_result_register', true);
                    $batch_value = get_post_meta($post_id, 'student_batch_register', true);

                    echo '<tr>';
                    echo '<td><input type="checkbox" class="bulk-update-checkbox" name="selected_posts[]" value="' . $post_id . '"></td>';
                    echo '<td><input type="text" class="form-control" name="title_' . $post_id . '" value="' . $post_title . '"></td>';
                    echo '<td><input type="text" data-purpose="'. $batch_value .'" class="form-control" name="student_batch_register" value="' . $batch_value . '" redonly></td>';
                    echo '<td>' . $post_content . '</td>';
                    echo '<td><select class="form-control" name="purpose_' . $post_id . '">';
                    echo '<option value="">Select Result</option>';
                    echo '<option value="A+" ' . selected($purpose_value, 'A+', false) . '>A+</option>';
                    echo '<option value="A" ' . selected($purpose_value, 'A', false) . '>A</option>';
                    echo '<option value="A-" ' . selected($purpose_value, 'A-', false) . '>A-</option>';
                    echo '</select></td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<p>No admissions posts found.</p>';
            }

            wp_reset_postdata();
            ?>
        </form>

        <!-- Bootstrap Modal for Success Message -->
        <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Success</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php
                        if (!empty($updated_post_titles)) {
                            echo '<p>Updated Post Titles:</p>';
                            echo '<ul>';
                            foreach ($updated_post_titles as $title) {
                                echo '<li>' . $title . '</li>';
                            }
                            echo '</ul>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </main><!-- #main -->
</div><!-- #primary -->      


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
<script>
    // Select All button functionality
    var selectAllBtn = document.getElementById('select-all-btn');
    var selectAllCheckbox = document.getElementById('select-all-checkbox');
    var bulkUpdateCheckboxes = document.getElementsByClassName('bulk-update-checkbox');

    selectAllBtn.addEventListener('click', function () {
        var isChecked = selectAllCheckbox.checked;
        for (var i = 0; i < bulkUpdateCheckboxes.length; i++) {
            bulkUpdateCheckboxes[i].checked = isChecked;
        }
    });

    // Filter button functionality
var filterPostsBtn = document.getElementById('filter-posts-btn');
var filterKeywordInput = document.getElementById('filter-keyword');
var filterPurposeInput = document.getElementById('filter-purpose');
var tableRows = document.querySelectorAll('.table tbody tr');

filterPostsBtn.addEventListener('click', function () {
    var keyword = filterKeywordInput.value.toLowerCase();
    var purpose = filterPurposeInput.value.toLowerCase();

    for (var i = 0; i < tableRows.length; i++) {
        var row = tableRows[i];
        var titleCell = row.cells[1];
        var contentCell = row.cells[2];
        var purposeCell = row.cells[3];
        var title = titleCell.textContent.toLowerCase();
        var content = contentCell.textContent.toLowerCase();
        var rowPurpose = purposeCell.getAttribute('data-purpose').toLowerCase();

        var showRow = true;

        if (keyword.trim() !== '') {
            if (!(title.includes(keyword) || content.includes(keyword))) {
                showRow = false;
            }
        }

        if (purpose.trim() !== '' && purpose !== rowPurpose) {
            showRow = false;
        }

        if (showRow) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    }
});

    // Show the success modal if the success message is not empty
    var successMessage = "<?php echo $success_message; ?>";
    if (successMessage !== '') {
        jQuery('#successModal').modal('show');
    }
</script>
<?php
require_once(get_template_directory(). '/admin/footer.php');