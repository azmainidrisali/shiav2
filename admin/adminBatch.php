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

            <!-- Content Row -->
            <div class="row">
                <div class="col-md-6">
                    <div id="primary" class="content-area">
                        <div class="category-form">
                            <h2>Submit a Category</h2>
                            <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="needs-validation" novalidate>
                                <input type="hidden" name="action" value="submit_category">
                                
                                <div class="form-group">
                                <label for="category_name">Category Name:</label>
                                <input type="text" name="category_name" class="form-control" required>
                                <div class="invalid-feedback">Please provide a category name.</div>
                                </div>
                                
                                <div class="form-group">
                                <label for="category_description">Category Description:</label>
                                <textarea name="category_description" class="form-control" required></textarea>
                                <div class="invalid-feedback">Please provide a category description.</div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                <div class="category-list">
                <h2>Category List</h2>
                    <?php
                        $args = array(
                        'taxonomy' => 'category',
                        'hide_empty' => false
                        );
                        $categories = get_categories($args);

                        if (!empty($categories)) {
                        foreach ($categories as $category) {
                            echo '<div class="category-item d-flex justify-content-between p-3">';
                            echo '<span class="category-name">' . esc_html($category->name) . '</span>';
                            echo '<button type="button" class="btn btn-danger delete-category" data-category-id="' . esc_attr($category->term_id) . '">Delete</button>';
                            echo '</div>';
                            echo '<div class="loading-spinner d-none">';
                            echo '<div class="spinner-border text-primary" role="status">';
                            echo '<span class="visually-hidden">Loading...</span>';
                            echo '</div>';
                            echo '</div>';
                        }
                        } else {
                        echo '<p>No categories found.</p>';
                        }
                    ?>
                    </div>
                </div>   
            </div>

            <!-- Bootstrap Loading Spinner -->
            <div class="loading-spinner d-none">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">.</span>
                </div>
            </div>

            <script>
            // AJAX request to delete category
            var deleteButtons = document.querySelectorAll('.delete-category');
            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                var categoryId = this.getAttribute('data-category-id');
                var data = new FormData();
                data.append('action', 'delete_category');
                data.append('category_id', categoryId);

                var xhr = new XMLHttpRequest();
                xhr.open('POST', '<?php echo esc_url(admin_url('admin-post.php')); ?>', true);
                
                // Show loading spinner
                var loadingSpinner = document.querySelector('.loading-spinner');
                loadingSpinner.classList.remove('d-none');

                xhr.onload = function() {
                    if (xhr.status === 200) {
                    // Category deleted successfully, remove it from the list
                    var categoryItem = button.closest('.category-item');
                    categoryItem.parentNode.removeChild(categoryItem);
                    }
                    
                    // Hide loading spinner
                    loadingSpinner.classList.add('d-none');
                };
                
                xhr.send(data);
                });
            });
            </script>
            
            


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