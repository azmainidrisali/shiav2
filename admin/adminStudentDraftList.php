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
                                        <tr class="alert" role="alert">
                                            <td>8108743</td>
                                            <td>8032743</td>
                                            <td>Day</td>
                                            <td class="d-flex align-items-center">
                                                <div class="img">
                                                    <img width="50" src="https://worlditfoundation.org/images/admission/64363c756c125.JPG">
                                                </div>
                                            </td>
                                            <td>MD. ABU RAIHAN</td>
                                            <td>MD. AIZUL HAQUE</td>
                                            <td>Diploma in Computer Science</td>
                                            <td>01775176748</td>
                                            <td>16 Apr 23</td>
                                            <td class="status"><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                                class="fa-solid fa-check text-white-50"></i> Compleate</a></td>
                                            <td>
                                                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                                class="fas fa-download fa-sm text-white-50"></i> View Admission</a>
                                                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                                class="fas fa-download fa-sm text-white-50"></i> Admit Card</a>
                                                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                                class="fas fa-download fa-sm text-white-50"></i> Registration Card</a>
                                            </button>
                                            </td>
                                        </tr>
                                        <tr class="alert" role="alert">
                                            <td>8108743</td>
                                            <td>8032743</td>
                                            <td>Day</td>
                                            <td class="d-flex align-items-center">
                                                <div class="img">
                                                    <img width="50" src="https://worlditfoundation.org/images/admission/64363c756c125.JPG">
                                                </div>
                                            </td>
                                            <td>MD. ABU RAIHAN</td>
                                            <td>MD. AIZUL HAQUE</td>
                                            <td>Diploma in Computer Science</td>
                                            <td>01775176748</td>
                                            <td>16 Apr 23</td>
                                            <td class="status"><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                                class="fa-solid fa-check text-white-50"></i> Compleate</a></td>
                                            <td>
                                                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                                class="fas fa-download fa-sm text-white-50"></i> View Admission</a>
                                                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                                class="fas fa-download fa-sm text-white-50"></i> Admit Card</a>
                                                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                                class="fas fa-download fa-sm text-white-50"></i> Registration Card</a>
                                            </button>
                                            </td>
                                        </tr>
                                        <tr class="alert" role="alert">
                                            <td>8108743</td>
                                            <td>8032743</td>
                                            <td>Day</td>
                                            <td class="d-flex align-items-center">
                                                <div class="img">
                                                    <img width="50" src="https://worlditfoundation.org/images/admission/64363c756c125.JPG">
                                                </div>
                                            </td>
                                            <td>MD. ABU RAIHAN</td>
                                            <td>MD. AIZUL HAQUE</td>
                                            <td>Diploma in Computer Science</td>
                                            <td>01775176748</td>
                                            <td>16 Apr 23</td>
                                            <td class="status"><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                                class="fa-solid fa-check text-white-50"></i> Compleate</a></td>
                                            <td>
                                                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                                class="fas fa-download fa-sm text-white-50"></i> View Admission</a>
                                                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                                class="fas fa-download fa-sm text-white-50"></i> Admit Card</a>
                                                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                                class="fas fa-download fa-sm text-white-50"></i> Registration Card</a>
                                            </button>
                                            </td>
                                        </tr>
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