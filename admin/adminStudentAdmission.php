<?php 
/* Template Name: Admin Student Admission */
require_once(get_template_directory(). '/admin/header.php');
global $wp_error, $current_user, $wp_roles, $post_id;
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
             require_once( ABSPATH . 'wp-admin/includes/image.php' );
             require_once( ABSPATH . 'wp-admin/includes/file.php' );
             require_once( ABSPATH . 'wp-admin/includes/media.php' );

                    if (isset($_POST['submit'])) {
                        
                    }

                        if (isset( $_POST['cpt_nonce_field'] ) && wp_verify_nonce( $_POST['cpt_nonce_field'], 'cpt_nonce_action' ) ) {

                            // create post object with the form values

                            $post_Student_purpose                               = $_POST['Purpose'];
                            $post_Student_selectCourse                          = $_POST['selectCourse'];
                            $post_Student_course_fee                            = $_POST['courseFee'];   
                            $post_Student_admissionDate                         = $_POST['admissionDate'];   
                            $post_Student_seassionStart                         = $_POST['seassionStart'];   
                            $post_Student_seassionEnd                           = $_POST['seassionEnd'];   
                            $post_Student_batch                                 = $_POST['batch'];   
                            $post_Student_STudentName                           = $_POST['STudentName'];
                            $post_Student_StudentEmail                          = $_POST['StudentEmail'];
                            $post_Student_StudentFathername                     = $_POST['StudentFathername'];
                            $post_Student_stuentsMotherName                     = $_POST['stuentsMotherName'];
                            $post_Student_StuentGurdainContact                  = $_POST['StuentGurdainContact'];
                            $post_Student_StudentDOB                            = $_POST['StudentDOB'];
                            $post_Student_PresentAddress                        = $_POST['PresentAddress'];
                            $post_Student_PermanentAddress                      = $_POST['PermanentAddress'];
                            $post_Student_ContactNumber                         = $_POST['ContactNumber'];
                            $post_Student_password                              = $_POST['password'];

                            $post_Student_PayAmount                             = $_POST['PayAmount'];
                            $post_Student_paymentMethod                         = $_POST['paymentMethod'];

                            $post_Student_SSC_board_register                    = $_POST['SSC_board'];
                            $post_Student_SSC_Roll_register                     = $_POST['SSC_Roll'];
                            $post_Student_SSC_Registration_register             = $_POST['SSC_Registration'];
                            $post_Student_SSC_Passing_year_register             = $_POST['SSC_Passing_year'];

                            $post_Student_Last_Exam_board_register              = $_POST['Last_Exam_board'];
                            $post_Student_Last_Exam_Roll_register               = $_POST['Last_Exam_Roll'];
                            $post_Student_Last_Exam_Registration_register       = $_POST['Last_Exam_Registration'];
                            $post_Student_Last_Exam_Passing_year_register       = $_POST['Last_Exam_Passing_year'];

                            $my_cptpost_args = array(

                            'post_title'    => $_POST['STudentName'],
                            'post_author'  => get_current_user_id(),

                            'post_status'   => $_POST['submitType'],

                            'post_type' => 'admissions',

                            );

                            $cpt_id = wp_insert_post( $my_cptpost_args, $wp_error);

                            add_post_meta( $cpt_id, 'student_purpose_register', $post_Student_purpose, false );
                            add_post_meta( $cpt_id, 'student_select_course_register', $post_Student_selectCourse, false );
                            add_post_meta( $cpt_id, 'student_Admission_date_fee_register', $post_Student_course_fee, false );
                            add_post_meta( $cpt_id, 'student_Admission_date_register', $post_Student_admissionDate, false );
                            add_post_meta( $cpt_id, 'student_seassion_start_register', $post_Student_seassionStart, false );
                            add_post_meta( $cpt_id, 'student_seassion_End_register', $post_Student_seassionEnd, false );
                            add_post_meta( $cpt_id, 'student_batch_register', $post_Student_batch, false );
                            add_post_meta( $cpt_id, 'student_Name_register', $post_Student_STudentName, false );
                            add_post_meta( $cpt_id, 'student_Email_register', $post_Student_StudentEmail, false );
                            add_post_meta( $cpt_id, 'student_Fathers_name_register', $post_Student_StudentFathername, false );
                            add_post_meta( $cpt_id, 'student_mothers_name_register', $post_Student_stuentsMotherName, false );
                            add_post_meta( $cpt_id, 'student_gurdain_contact_register', $post_Student_StuentGurdainContact, false );
                            add_post_meta( $cpt_id, 'student_Date_of_Birth_register', $post_Student_StudentDOB, false );
                            add_post_meta( $cpt_id, 'student_present_address_register', $post_Student_PresentAddress, false );
                            add_post_meta( $cpt_id, 'student_permanent_address_register', $post_Student_PermanentAddress, false );
                            add_post_meta( $cpt_id, 'student_contact_number_register', $post_Student_ContactNumber, false );
                            add_post_meta( $cpt_id, 'student_password_register', $post_Student_password, false );

                            // add_post_meta( $cpt_id, 'student_purpose_register', $post_Student_PayAmount, false );
                            // add_post_meta( $cpt_id, 'student_purpose_register', $post_Student_paymentMethod, false );

                            add_post_meta( $cpt_id, 'Student_SSC_board_register', $post_Student_SSC_board_register, false );
                            add_post_meta( $cpt_id, 'Student_SSC_Roll_register', $post_Student_SSC_Roll_register, false );
                            add_post_meta( $cpt_id, 'Student_SSC_Registration_register', $post_Student_SSC_Registration_register, false );
                            add_post_meta( $cpt_id, 'Student_SSC_Passing_year_register', $post_Student_SSC_Passing_year_register, false );
                            
                            add_post_meta( $cpt_id, 'Student_Last_Exam_board_register', $post_Student_Last_Exam_board_register, false );
                            add_post_meta( $cpt_id, 'Student_Last_Exam_Roll_register', $post_Student_Last_Exam_Roll_register, false );
                            add_post_meta( $cpt_id, 'Student_Last_Exam_Registration_register', $post_Student_Last_Exam_Registration_register, false );
                            add_post_meta( $cpt_id, 'Student_Last_Exam_Passing_year_register', $post_Student_Last_Exam_Passing_year_register, false );

                            $attachment_id = media_handle_upload( 'user-image-featured', $cpt_id);
                            set_post_thumbnail( $cpt_id, $attachment_id );
                            // $location = home_url().'/'.$bangladeshbdooption['donar_Profile_dashboard'];

                            if (isset($shiacomputeroption['adminStudentList'])) {
                                $get_admsinStudentLink_id = $shiacomputeroption['adminStudentList']; // Get the selected page ID

                                if ($get_admsinStudentLink_id) {
                                    $get_admsinStudentLink_link = get_permalink($get_admsinStudentLink_id); // Get the permalink of the selected page
                                }
                            }
                            $location = $get_admsinStudentLink_link; 

                            echo "<meta http-equiv='refresh' content='0;url=$location' />";
                            exit;

                        }



                    ?>

            <div class="row align-items-center justify-content-center">
                <div class="col-md-10 py-5">
                    <h3>Student Admission</h3>
                    <p class="mb-4">Student Admission Information</p>
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="fname">Applaction Status</label>
                                        <select name="submitType" id="SSC_board" class="form-control" required>
                                            <option value="draft">Draft Admission</option>
                                            <option value="publish">Publishe Registration</option>
                                        </select>
                                </div>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="fname">Purpose</label>
                                        <select name="Purpose" id="SSC_board" class="form-control" required>
                                            <option value="">--Select Purpose--</option>
                                            <option value="6 M Regi">6 M Regi</option>
                                            <option value="1 Year Regi">1 Year Regi</option>
                                            <option value="2 Year Regi">2 Year Regi</option>
                                            <option value="6 M Regi (600tk)">6 M Regi (600tk)</option>
                                            <option value="3 M Regi (600tk)">3 M Regi (600tk)</option>
                                            <option value="6 M Regi (500tk)">6 M Regi (500tk)</option>
                                            <option value="3 M Regi (500tk)">3 M Regi (500tk)</option>
                                            <option value="6 M Regi (1000 tk)">6 M Regi (1000 tk)</option>
                                            <option value="6 M Regi Freelancing">6 M Regi Freelancing</option>
                                            <option value="6 M Regi  2000 Taka (Freelancing & Outsourcing)">6 M Regi  2000 Taka (Freelancing &amp; Outsourcing)</option>
                                            <option value="combo:  6 M Regi (3000 taka)">combo:  6 M Regi (3000 taka)</option>
                                        </select>
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="lname">Select Course</label>
                                    <select name="selectCourse" id="SSC_board" class="form-control" required>
                                        <option value="">--Select Course--</option>
                                        <option value="Basic Graphic Design">Basic Graphic Design</option>
                                        <option value="Advanced Excel">Advanced Excel</option>
                                        <option value="Basic Hardware Maintenance">Basic Hardware Maintenance</option>
                                        <option value="Certificate in Computer Science & Application">Certificate in Computer Science &amp; Application</option>
                                        <option value="Basic Application (MS Office)">Basic Application (MS Office)</option>
                                        <option value="Advanced Excel">Advanced Excel</option>
                                        <option value="Rapid Skill Development ( Typing + E-fielding)">Rapid Skill Development ( Typing + E-fielding)</option>
                                        <option value="STAAD Pro">STAAD Pro</option>
                                        <option value="C Programming for Beginners">C Programming for Beginners</option>
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
                                    <input type="text" name="courseFee" class="form-control" placeholder="Fee" id="lname">
                                </div>    
                            </div>
                            <div class="col-md-6">
                                <div class="form-group first">
                                    <label for="lname">Admission Date</label>
                                    <input type="date" name="admissionDate" class="form-control" placeholder="e.g. Smith" id="lname">
                                </div>    
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="fname">Seassion Start</label>
                                    <input type="date" name="seassionStart" class="form-control" placeholder="Fee" id="lname">
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="lname">Seassion End</label>
                                    <input type="date" name="seassionEnd" class="form-control" placeholder="e.g. Smith" id="lname">
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="lname">Batch</label>

                                    <?php
                                        // Get all the batch terms
                                        $batch_terms = get_terms(array(
                                            'taxonomy' => 'batch',
                                            'hide_empty' => false,
                                        ));

                                        // Check if there are any terms
                                        if (!empty($batch_terms)) {
                                            // Prepare an array to store batch names
                                            $batch_names = array();

                                            // Loop through each batch term and extract the name
                                            foreach ($batch_terms as $batch_term) {
                                                $batch_names[] = $batch_term->name;
                                            }

                                            // Generate the HTML select element
                                            $select_html = '<select name="batch" id="batch-select">';
                                            $select_html .= '<option value="">Select Batch</option>';

                                            foreach ($batch_names as $batch_name) {
                                                $select_html .= '<option value="' . esc_attr($batch_name) . '">' . esc_html($batch_name) . '</option>';
                                            }

                                            $select_html .= '</select>';

                                            // Output the HTML select element
                                            echo $select_html;
                                        } else {
                                            echo 'No batch terms found.';
                                        }
                                        ?>
                                </div>    
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group first">
                                    <label for="fname">Student Name</label>
                                    <input type="test" name="STudentName" class="form-control" placeholder="Fee" id="lname">
                                </div>    
                            </div>
                            <div class="col-md-6">
                                <div class="form-group first">
                                    <label for="lname">Email</label>
                                    <input type="email" name="StudentEmail" class="form-control" placeholder="e.g. Smith" id="lname">
                                </div>    
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="fname">Fathers Name</label>
                                    <input type="text" name="StudentFathername" class="form-control" placeholder="Fee" id="lname">
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="lname">Mothers Name</label>
                                    <input type="text" name="stuentsMotherName" class="form-control" placeholder="e.g. Smith" id="lname">
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="lname">Guardian Contact</label>
                                    <input type="number" name="StuentGurdainContact" class="form-control" placeholder="e.g. Smith" id="lname">
                                </div>    
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="fname">Date Of Birth</label>
                                    <input type="date" name="StudentDOB" class="form-control" placeholder="Fee" id="lname">
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="lname">Present Address</label>
                                    <input type="text" name=PresentAddress class="form-control" placeholder="e.g. Smith" id="lname">
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="lname">Permanent Address</label>
                                    <input type="text" name="PermanentAddress" class="form-control" placeholder="e.g. Smith" id="lname">
                                </div>    
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="fname">Contact Number</label>
                                    <input type="number" name="ContactNumber" class="form-control" placeholder="Fee" id="lname">
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="lname">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="e.g. Smith" id="lname">
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
                                    <input type="number" name="PayAmount" class="form-control" placeholder="Fee" id="lname">
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
                                    <select name="paymentMethod" id="SSC_board" class="form-control" required>
                                        <option value="">Select</option>
                                        <option value="Bkash">Bkash</option>
                                        <option value="Nagad">Nagad</option>
                                        <option value="Cash">Cash</option>
                                    </select>
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="file" name="user-image-featured" id="user-image-featured" class="form-control-file" >
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-5 mt-4 align-items-center">
                            <div class="d-flex align-items-center">
                            <div class="control__indicator"></div>
                            </label>
                        </div>
                        </div>

                        <input type='hidden' name='post_type' id='post_type' value='my_custom_post_type' />

                        <?php wp_nonce_field( 'cpt_nonce_action', 'cpt_nonce_field' ); ?>

                        <input type="submit" value="Register" class="btn px-5 btn-primary">

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

<script>


function previewThumbnail(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var preview = document.getElementById('thumbnail-preview');
        preview.src = reader.result;
        preview.style.display = 'block';
    }
    reader.readAsDataURL(event.target.files[0]);
}
var thumbnailInput = document.getElementById('thumbnail');
thumbnailInput.addEventListener('change', previewThumbnail);
</script>

<?php
require_once(get_template_directory(). '/admin/footer.php');