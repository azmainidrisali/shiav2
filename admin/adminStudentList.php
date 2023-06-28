<?php 
/* Template Name: Admin Student List */
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
            
            <?php
            
            if (isset($shiacomputeroption['certificate_image'])) {
                $get_adminCertificate_certificate_id = $shiacomputeroption['certificate_image']; // Get the selected page ID
        
                if ($get_adminCertificate_certificate_id) {
                    $get_adminCertificate_link = get_permalink($get_adminCertificate_certificate_id); // Get the permalink of the selected page
                }
            }
            echo '<img src="' . $get_adminCertificate_link . '" alt="Uploaded Image">';
            
            ?>
            

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
                            <div class="form-group">
                                <label for="searchInput">Search:</label>
                                <input type="text" class="form-control" id="searchInput" placeholder="Enter Roll number, registration number or name or subject">
                            </div>
                            <div class="form-group">
                            <label for="rowsPerPageSelect">Rows per page:</label>
                                <select id="rowsPerPageSelect" class="form-control" onchange="changeRowsPerPage(this.value)">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="30">1000</option>
                                </select>
                            </div>
                                <table id="myTable" class="table table-responsive-xl">
                                    <thead>
                                        <tr>
                                            <th>Serial Number</th>
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
                                            'post_status'   => 'publish',
                                        );

                                        $custom_query = new WP_Query($args);

                                        if ($custom_query->have_posts()) {
                                            while ($custom_query->have_posts()) {
                                                $custom_query->the_post();
                                                // Display the content or any other desired information of each post
                                                ?>
                                                <tr class="alert" role="alert">
                                                    <td><?php

                                                        $certificateSerialNumber = get_post_meta(get_the_ID(), 'student_certificate_serial_number', true);

                                                        // Display the custom serial number if it exists
                                                        if ($certificateSerialNumber) {
                                                            echo $certificateSerialNumber;
                                                        }
                                                    ?>
                                                    </td>
                                                    <td><?php

                                                        $custom_serial_number = get_post_meta(get_the_ID(), 'custom_serial_number', true);

                                                        // Display the custom serial number if it exists
                                                        if ($custom_serial_number) {
                                                            echo $custom_serial_number;
                                                        }
                                                    ?>
                                                    </td>
                                                    <td><?php
                                                        $roll_number = get_post_meta(get_the_ID(), 'custom_roll_number', true);
                                                        if (!empty($roll_number)) {
                                                            echo $roll_number;
                                                        }
                                                        ?>
                                                    </td>
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
                                                        class="fa-solid fa-check text-white-50"></i> Approved</a></td>
                                                    <td>
                                                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                                        class="fas fa-download fa-sm text-white-50"></i> Admit Card</a>
                                                        <a href="https://app.shiacomputer.com/wp-admin/post.php?post=<?php echo get_the_ID() ?>&action=edit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                                        class="fas fa-download fa-sm text-white-50"></i> Super Access</a>
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
                                <nav aria-label="Table pagination">
                                    <ul class="pagination px-4" id="pagination-links">
                                        <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        </li>
                                        <li class="page-item active">
                                        <a class="page-link" href="javascript:void(0)">1</a>
                                        </li>
                                        <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)">2</a>
                                        </li>
                                        <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)">3</a>
                                        </li>
                                        <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                        </li>
                                    </ul>
                                </nav>



                                <script>
                                    var table = document.getElementById("myTable");
                                    var rows = table.getElementsByTagName("tr");
                                    var rowsPerPage = 10;
                                    var currentPage = 1;
                                    var totalPages = Math.ceil(rows.length / rowsPerPage);

                                    // Show initial rows based on the current page
                                    showRows();

                                    // Function to show rows based on the current page
                                    function showRows() {
                                    var startIndex = (currentPage - 1) * rowsPerPage;
                                    var endIndex = startIndex + rowsPerPage;

                                    for (var i = 0; i < rows.length; i++) {
                                        if (rowsPerPage === "all" || (i >= startIndex && i < endIndex)) {
                                        rows[i].style.display = "";
                                        } else {
                                        rows[i].style.display = "none";
                                        }
                                    }

                                    renderPagination();
                                    }

                                    // Function to render pagination links
                                    function renderPagination() {
                                    var paginationLinks = document.getElementById("pagination-links");
                                    paginationLinks.innerHTML = "";

                                    // Add previous page link
                                    if (currentPage > 1) {
                                        var prevLink = createPaginationLink(currentPage - 1, "Previous");
                                        paginationLinks.appendChild(prevLink);
                                    }

                                    // Add page links
                                    for (var i = 1; i <= totalPages; i++) {
                                        var pageLink = createPaginationLink(i, i);
                                        paginationLinks.appendChild(pageLink);
                                    }

                                    // Add next page link
                                    if (currentPage < totalPages) {
                                        var nextLink = createPaginationLink(currentPage + 1, "Next");
                                        paginationLinks.appendChild(nextLink);
                                    }
                                    }

                                    // Function to create pagination link
                                    function createPaginationLink(pageNum, label) {
                                    var pageLink = document.createElement("a");
                                    pageLink.href = "javascript:void(0)";
                                    pageLink.textContent = label;

                                    if (pageNum === currentPage) {
                                        pageLink.classList.add("active");
                                    }

                                    pageLink.addEventListener("click", function () {
                                        currentPage = pageNum;
                                        showRows();
                                    });

                                    return pageLink;
                                    }

                                    // Function to change the number of rows per page
                                    function changeRowsPerPage(value) {
                                    rowsPerPage = value;
                                    currentPage = 1;
                                    totalPages = Math.ceil(rows.length / rowsPerPage);
                                    showRows();
                                    }

                                    // Get the search input element
                                    var searchInput = document.getElementById("searchInput");

                                    // Add an event listener for input changes
                                    searchInput.addEventListener("input", function() {
                                    // Get the filter value
                                    var filterValue = searchInput.value.toLowerCase();

                                    // Loop through all table rows and hide/show based on the filter value
                                    for (var i = 0; i < rows.length; i++) {
                                        var cells = rows[i].getElementsByTagName("td");
                                        var foundMatch = false;

                                        for (var j = 0; j < cells.length; j++) {
                                        var cell = cells[j];
                                        if (cell.textContent.toLowerCase().indexOf(filterValue) > -1) {
                                            foundMatch = true;
                                            break;
                                        }
                                        }

                                        if (foundMatch) {
                                        rows[i].style.display = "";
                                        } else {
                                        rows[i].style.display = "none";
                                        }
                                    }

                                    // Reset pagination to the first page
                                    currentPage = 1;
                                    renderPagination();
                                    });

                                    // Get the rows per page select element
                                    var rowsPerPageSelect = document.getElementById("rowsPerPageSelect");

                                    // Add an event listener for rows per page changes
                                    rowsPerPageSelect.addEventListener("change", function() {
                                    var selectedValue = rowsPerPageSelect.value;
                                    changeRowsPerPage(selectedValue);
                                    });
                                </script>
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