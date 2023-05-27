<?php 
/* Template Name: Admin Student Admission */
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
            


            
            <div class="row align-items-center justify-content-center">
                <div class="col-md-10 py-5">
                    <h3>Student Admission</h3>
                    <p class="mb-4">Student Admission Information</p>
                    <form action="#" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="fname">Purpose</label>
                                        <select name="SSC_board" id="SSC_board" class="form-control" required>
                                            <option value="">Select</option>
                                            <option value="Barisal">Barisal</option>
                                            <option value="Chittagong">Chittagong</option>
                                            <option value="Cumilla">Cumilla</option>
                                        </select>
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="lname">Select Course</label>
                                    <select name="SSC_board" id="SSC_board" class="form-control" required>
                                        <option value="">Select</option>
                                        <option value="Barisal">Barisal</option>
                                        <option value="Chittagong">Chittagong</option>
                                        <option value="Cumilla">Cumilla</option>
                                    </select>
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="lname">Duration Of Course</label>
                                    <select name="SSC_board" id="SSC_board" class="form-control" required>
                                        <option value="">Select</option>
                                        <option value="Barisal">Barisal</option>
                                        <option value="Chittagong">Chittagong</option>
                                        <option value="Cumilla">Cumilla</option>
                                    </select>
                                </div>    
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group first">
                                    <label for="fname">Course Fee</label>
                                    <input type="text" class="form-control" placeholder="Fee" id="lname">
                                </div>    
                            </div>
                            <div class="col-md-6">
                                <div class="form-group first">
                                    <label for="lname">Admission Date</label>
                                    <input type="date" class="form-control" placeholder="e.g. Smith" id="lname">
                                </div>    
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="fname">Seassion Start</label>
                                    <input type="date" class="form-control" placeholder="Fee" id="lname">
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="lname">Seassion End</label>
                                    <input type="date" class="form-control" placeholder="e.g. Smith" id="lname">
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="lname">Batch</label>
                                    <input type="date" class="form-control" placeholder="e.g. Smith" id="lname">
                                </div>    
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group first">
                                    <label for="fname">Student Name</label>
                                    <input type="text" class="form-control" placeholder="Fee" id="lname">
                                </div>    
                            </div>
                            <div class="col-md-6">
                                <div class="form-group first">
                                    <label for="lname">Email</label>
                                    <input type="email" class="form-control" placeholder="e.g. Smith" id="lname">
                                </div>    
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="fname">Fathers Name</label>
                                    <input type="text" class="form-control" placeholder="Fee" id="lname">
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="lname">Mothers Name</label>
                                    <input type="email" class="form-control" placeholder="e.g. Smith" id="lname">
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="lname">Guardian Contact</label>
                                    <input type="email" class="form-control" placeholder="e.g. Smith" id="lname">
                                </div>    
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="fname">Date Of Birth</label>
                                    <input type="date" class="form-control" placeholder="Fee" id="lname">
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="lname">Present Address</label>
                                    <input type="text" class="form-control" placeholder="e.g. Smith" id="lname">
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="lname">Permanent Address</label>
                                    <input type="text" class="form-control" placeholder="e.g. Smith" id="lname">
                                </div>    
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="fname">Contact Number</label>
                                    <input type="number" class="form-control" placeholder="Fee" id="lname">
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="lname">Password</label>
                                    <input type="password" class="form-control" placeholder="e.g. Smith" id="lname">
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="lname">Confirm Pasword</label>
                                    <input type="password" class="form-control" placeholder="e.g. Smith" id="lname">
                                </div>    
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-3">
                                <label>SSC BOARD</label>
                                <select name="SSC_board" class="form-control" id="SSC_board" required>
                                    <option value="">Select</option>
                                    <option value="Barisal">Barisal</option>
                                    <option value="Chittagong">Chittagong</option>
                                    <option value="Cumilla">Cumilla</option>
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Dinajpur">Dinajpur</option>
                                    <option value="Jessore">Jessore</option>
                                    <option value="Mymensingh">Mymensingh</option>
                                    <option value="Rajshahi">Rajshahi</option>
                                    <option value="Sylhet">Sylhet</option>
                                    <option value="Madrasah Education Board">Madrasah Education Board</option>
                                    <option value="Technical Education Board">Technical Education Board</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>SSC ROLL</label>
                                <input type='number' name='SSC_Roll' class="form-control" id='SSC_Roll' value="" placeholder='SSC ROLL Number' required/>
                            </div>
                            <div class="col-md-3">
                            <label>SSC REGISTRATION</label>
                                <input type='number' name='SSC_Registration' class="form-control" id='SSC_Registration' value="" placeholder='SSC Registration Number' required/>
                            </div>
                            <div class="col-md-3">
                                <label>SSC PASSING YEAR</label>
                                <select name='SSC_Passing_year' id='SSC_Passing_year' class="form-control" required>
                                    <!-- Loop through years from 1971 to current year -->
                                    <?php
                                        $currentYear = date("Y"); // Get current year
                                            for ($year = $currentYear; $year >= 1971; $year--) {
                                            echo '<option value="' . $year . '">' . $year . '</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-3">
                                <label>LAST EXAM BOARD</label>
                                <select name="Last_Exam_board" class="form-control" id="Last_Exam_board"  required>
                                    <option value="">Select</option>
                                    <option value="Barisal">Barisal</option>
                                    <option value="Chittagong">Chittagong</option>
                                    <option value="Cumilla">Cumilla</option>
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Dinajpur">Dinajpur</option>
                                    <option value="Jessore">Jessore</option>
                                    <option value="Mymensingh">Mymensingh</option>
                                    <option value="Rajshahi">Rajshahi</option>
                                    <option value="Sylhet">Sylhet</option>
                                    <option value="Madrasah Education Board">Madrasah Education Board</option>
                                    <option value="Technical Education Board">Technical Education Board</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                            <label>LAST EXAM ROLL</label>
                                <input type='number' name='Last_Exam_Roll' class="form-control" id='Last_Exam_Roll' value="" placeholder='Last Exam ROLL Number' required/>
                            </div>
                            <div class="col-md-3">
                                <label>LAST EXAM NAME</label>
                                <input type='text' name='Last_Exam_Registration' class="form-control" id='Last_Exam_Registration' value="" placeholder='Last Exam Name' required/>
                            </div>
                            <div class="col-md-3">
                                <label>LAST EXAM YEAR</label>
                                <select name='Last_Exam_Passing_year' class="form-control" id='Last_Exam_Passing_year' required>
                                    <!-- Loop through years from 1971 to current year -->
                                    <?php
                                        $currentYear = date("Y"); // Get current year
                                            for ($year = $currentYear; $year >= 1971; $year--) {
                                            echo '<option value="' . $year . '">' . $year . '</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="fname">Pay Amount</label>
                                    <input type="number" class="form-control" placeholder="Fee" id="lname">
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="lname">Due Amount</label>
                                    <input type="number" class="form-control" placeholder="e.g. Smith" id="lname">
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="lname">Payment Method</label>
                                    <select name="SSC_board" id="SSC_board" class="form-control" required>
                                        <option value="">Select</option>
                                        <option value="Barisal">Barisal</option>
                                        <option value="Chittagong">Chittagong</option>
                                        <option value="Cumilla">Cumilla</option>
                                    </select>
                                </div>    
                            </div>
                        </div>
                        
                        <div class="d-flex mb-5 mt-4 align-items-center">
                            <div class="d-flex align-items-center">
                            <div class="control__indicator"></div>
                            </label>
                        </div>
                        </div>

                        <input type="submit" value="Register" class="btn px-5 btn-primary">
                        <input type="submit" value="Save Draft" class="btn px-5 btn-secondary">

                    </form>
                </div>
            </div>



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