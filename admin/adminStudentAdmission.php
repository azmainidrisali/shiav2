<?php 
/* Template Name: Admin Student Admission */
require_once(get_template_directory(). '/admin/header.php');
global $wp_error, $current_user, $wp_roles, $post_id;
?>
<style>
  .required-label::after {
    content: "*";
    color: red;
  }
</style>
<?php
// Check if the current user is an administrator
if (is_user_logged_in() && current_user_can('administrator')) {
    
    require_once(get_template_directory(). '/admin/dashboardheader.php');
    require_once(get_template_directory(). '/admin/check_user.php');?>

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
                            $post_Student_StudentDurationCourse                 = $_POST['StudentDurationCourse'];
                            $post_Student_course_fee                            = $_POST['courseFee'];   
                            $post_Student_admissionDate                         = $_POST['admissionDate'];   
                            // $post_Student_seassionStart                         = $_POST['seassionStart'];   
                            // $post_Student_seassionEnd                           = $_POST['seassionEnd'];   
                            $post_Student_seassionStart                         = $_POST['batch_session_start'];   
                            $post_Student_seassionEnd                           = $_POST['batch_session_end'];   
                            // $post_Student_batch                                 = $_POST['batch'];   
                            $post_Student_STudentName                           = $_POST['STudentName'];
                            $post_Student_submitType                            = $_POST['govsubmitType'];
                            $post_Student_StudentGovID                          = $_POST['StudentGovID'];
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

                            $post_Student_PayAmount                             = $_POST['PayAmount'];
                            $post_Student_DueAmount                             = $_POST['DueAmount'];
                            $post_Student_paymentMethod                         = $_POST['paymentMethod'];

                            // Retrieve the form inputs
                            $username = $_POST['ContactNumber'];
                            $email = $_POST['ContactNumber'].'@shia.com';
                            $password = $_POST['password'];

                            // Get user ID by username
                            $user = get_user_by('login', $username);

                            if ($user) {
                                // User already exists, use the existing user ID
                                $user_id = $user->ID;
                            } else {
                                // User doesn't exist, create a new user
                                $user_id = wp_create_user($username, $password, $email);
                            }

                            $my_cptpost_args = array(

                            'post_title'    => $_POST['STudentName'],
                            'post_author'  => get_current_user_id(),
                            'post_status'   => $_POST['submitType'],
                            'post_author' => $user_id,

                            'post_type' => 'admissions',

                            );

                            $cpt_id = wp_insert_post( $my_cptpost_args, $wp_error);

                            add_post_meta( $cpt_id, 'student_purpose_register', $post_Student_purpose, false );
                            add_post_meta( $cpt_id, 'student_select_course_register', $post_Student_selectCourse, false );
                            add_post_meta( $cpt_id, 'student_duration_of_course_register', $post_Student_StudentDurationCourse, false );
                            add_post_meta( $cpt_id, 'student_Admission_date_fee_register', $post_Student_course_fee, false );
                            add_post_meta( $cpt_id, 'student_Admission_date_register', $post_Student_admissionDate, false );
                            add_post_meta( $cpt_id, 'student_seassion_start_register', $post_Student_seassionStart, false );
                            add_post_meta( $cpt_id, 'student_seassion_End_register', $post_Student_seassionEnd, false );
                            // add_post_meta( $cpt_id, 'student_batch_register', $post_Student_batch, false );
                            add_post_meta( $cpt_id, 'student_Name_register', $post_Student_STudentName, false );
                            add_post_meta( $cpt_id, 'gov_id_type_register', $post_Student_submitType, false );
                            add_post_meta( $cpt_id, 'Gov_id_num_register', $post_Student_StudentGovID, false );
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

                            add_post_meta( $cpt_id, 'student_pay_amount_register', $post_Student_PayAmount, false );
                            add_post_meta( $cpt_id, 'student_due_amount_register', $post_Student_DueAmount, false );
                            add_post_meta( $cpt_id, 'student_pay_method_register', $post_Student_paymentMethod, false );

                            $attachment_id = media_handle_upload( 'user-image-featured', $cpt_id);
                            set_post_thumbnail( $cpt_id, $attachment_id );
                            // $location = home_url().'/'.$bangladeshbdooption['donar_Profile_dashboard'];

                            $selectedOption = $_POST['submitType'];

                            if ($selectedOption === 'publish') {
                                $StudentPhoneNumber = '88'.$post_Student_ContactNumber ;
                                $studentPass = $post_Student_password ;
                                $userNameEmail = $post_Student_ContactNumber;
                                $courseName = $post_Student_selectCourse;
                                $studentName = $post_Student_STudentName;
                                $message = "Congratulations! $studentName Your admission to $courseName is successful.\nUser Name: $userNameEmail\nPassWord: $studentPass\n login Link: https://app.shiacomputer.com";
                                SendSMS($StudentPhoneNumber, $message);
                            }

                            $accountInfo = $_POST['submitType'];

                            if ($accountInfo === 'publish' || $accountInfo === 'draft') {
                                $studentnameS = $post_Student_STudentName;
                                $payedSAmount = $post_Student_PayAmount;
                                $Information  = $post_Student_selectCourse;
                                server_income($studentnameS, $payedSAmount, $Information);
                            }
                            


                            if (isset($shiacomputeroption['adminStudentAdmission'])) {
                                $get_adminStudentAdmission_id = $shiacomputeroption['adminStudentAdmission']; // Get the selected page ID
        
                                if ($get_adminStudentAdmission_id) {
                                    $get_adminStudentAdmission_link = get_permalink($get_adminStudentAdmission_id); // Get the permalink of the selected page
                                }
                            }
                            $location = $get_adminStudentAdmission_link; 

                            echo "<meta http-equiv='refresh' content='0;url=$location' />";
                            exit;

                        }
                    
                ?>



            <div class="row align-items-center justify-content-center">
                <div class="col-md-10 py-5">
                    <h3>Student Admission</h3>
                    <p class="mb-4">Student Admission form</p>
                    <form method="post" enctype="multipart/form-data" id="myForm">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="fname">Applaction Status</label>
                                    <select name="submitType" class="form-control" required>
                                        <option value="draft">Draft Admission</option>
                                        <option value="publish">Publish Registration</option>
                                    </select>
                                </div>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="fname" class="required-label">Purpose </label>
                                        <select name="Purpose" id="SSC_board" class="form-control" required>
                                            <option value="">--Select Purpose--</option>
                                            <option value="6 M Regi">6 M Regi </option>
                                            <option value="1 M Regi">1 M Regi</option>
                                            <option value="2 Year Regi">2 Year Regi</option>
                                            <option value="3 Year Regi">3 Year Regi</option>
                                        </select>
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="lname" class="required-label">Select Course </label>
                                    <select name="selectCourse" id="SSC_board" class="form-control" required>
                                        <option value="">--Select Course--</option>
                                        <option value="Basic Graphic Design">Basic Graphic Design</option>
                                        <option value="Advanced Excel">Advanced Excel</option>
                                        <option value="Diploma in Computer Science">Diploma in Computer Science</option>
                                        <option value="Basic Application (MS Office)">Basic Application (MS Office)</option>
                                        <option value="Advanced Excel">Advanced Excel</option>
                                    </select>
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="lname" class="required-label">Duration Of Course </label>
                                    <select name="StudentDurationCourse" id="SSC_board" class="form-control" required>
                                        <option value="">Select</option>
                                        <option value="60 hour">60 hour</option>
                                    </select>
                                </div>    
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group first">
                                    <label for="fname" class="required-label">Course Fee </label>
                                    <input type="text" name="courseFee" class="form-control" placeholder="Course Fee" id="courseFee" required>
                                </div>    
                            </div>
                            <div class="col-md-6">
                                <div class="form-group first">
                                    <label for="lname" class="required-label">Admission Date </label>
                                    <input type="text" id="datepick" name="admissionDate" class="form-control" placeholder="dd/mm/yyyy" required>
                                </div>    
                            </div>
                        </div>

                        <?php
                            // Define the custom post type name
                            $custom_post_type = 'batch';

                            // Check if the custom post type exists
                            if (post_type_exists($custom_post_type)) {
                                // Retrieve all posts of the custom post type
                                $batch_posts = get_posts(array(
                                    'post_type' => $custom_post_type,
                                    'posts_per_page' => -1, // Retrieve all posts
                                ));

                                
                                echo '<div class="row">';

                                // Column 1
                                echo '<div class="col-md-4">';
                                echo '<div class="form-group">';
                                echo '<label for="batch_session_start">Batch Session Start:</label>';
                                echo '<input type="text" class="form-control" id="batch_session_start" name="batch_session_start" placeholder="Seassion Start" value="" required readonly>';
                                echo '</div>';
                                echo '</div>';

                                // Column 2
                                echo '<div class="col-md-4">';
                                echo '<div class="form-group">';
                                echo '<label for="batch_session_end">Batch Session End:</label>';
                                echo '<input type="text" class="form-control" id="batch_session_end" name="batch_session_end" placeholder="Seassion Start" value="" required readonly>';
                                echo '</div>';
                                echo '</div>';

                                // Column 3
                                echo '<div class="col-md-4">';
                                echo '<div class="form-group">';
                                echo '<label for="batch_select">Select a Batch:</label>';
                                echo '<select class="form-control" id="batch_select" name="batch_select">';
                                echo '<option value="">Select a Batch</option>';

                                foreach ($batch_posts as $batch_post) {
                                    $batch_id = $batch_post->ID;
                                    $batch_title = get_the_title($batch_id);
                                    $sessionStart = esc_attr(get_post_meta($batch_id, 'batch_session_start', true));
                                    $sessionEnd = esc_attr(get_post_meta($batch_id, 'batch_session_end', true));
                                    echo '<option value="' . $batch_id . '" data-start="' . $sessionStart . '" data-end="' . $sessionEnd . '">' . $batch_title . '</option>';
                                }

                                echo '</select>';
                                echo '</div>';
                                echo '</div>';

                                echo '</div>'; // Close the row
                                

                                // JavaScript to handle the select change event using AJAX
                                echo '<script>
                                    jQuery(document).ready(function($) {
                                        $("#batch_select").change(function() {
                                            var selectedOption = $(this).find("option:selected");
                                            var sessionStart = selectedOption.data("start");
                                            var sessionEnd = selectedOption.data("end");
                                            
                                            $("#batch_session_start").val(sessionStart);
                                            $("#batch_session_end").val(sessionEnd);
                                            $("#batch_session_start").attr("value", sessionStart);
                                            $("#batch_session_end").attr("value", sessionEnd);
                                        });
                                    });
                                </script>';
                            } else {
                                echo 'Custom post type "batch" does not exist.';
                            }
                        ?>

                        <!-- <div class="row">
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="fname" class="required-label">Seassion Start </label>
                                    <input type="text" id="datepick2" name="seassionStart" class="form-control" placeholder="Seassion Start" required>
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="lname" class="required-label">Seassion End </label>
                                    <input type="text" id="datepick3" name="seassionEnd" class="form-control" placeholder="Seassion End" required>
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="lname" class="required-label">Batch </label>

                                    <//?php
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
                                            $select_html = '<select name="batch" class="form-control" id="batch-select">';
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
                        </div> -->

                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group first">
                                    <label for="fname" class="required-label">Student Name </label>
                                    <input type="text" name="STudentName" class="form-control" placeholder="Student Name" id="lname" oninput="formatText(this)" required>
                                </div>    
                            </div>
                            <div class="col-md-6">
                                <div class="form-group first">
                                    <label for="lname">Email</label>
                                    <input type="email" name="StudentEmail" class="form-control" placeholder="contact@shiacomputer.com" id="lname">
                                </div>    
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group first">
                                    <label for="fname">Verification ID Type</label>
                                        <select name="govsubmitType" id="SSC_board" class="form-control">
                                            <option value="">Select</option>
                                            <option value="NID">GOV NID</option>
                                            <option value="BIRTH CERTIFICATE">BIRTH CERTIFICATE</option>
                                            <option value="Other">Other</option>
                                        </select>
                                </div>    
                            </div>
                            <div class="col-md-6">
                                <div class="form-group first">
                                    <label for="lname">ID Number </label>
                                    <input type="text" name="StudentGovID" class="form-control" placeholder="ID Number" id="lname">
                                </div>    
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="fname" class="required-label">Fathers Name </label>
                                    <input type="text" name="StudentFathername" class="form-control" placeholder="Fathers Name" id="lname" oninput="formatText(this)" required>
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="lname" class="required-label">Mothers Name </label>
                                    <input type="text" name="stuentsMotherName" class="form-control" placeholder="Mothers Name" id="lname" oninput="formatText(this)" required>
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="lname">Guardian Contact </label>
                                    <input type="number" name="StuentGurdainContact" class="form-control" placeholder="01723456789" id="lname">
                                </div>    
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="fname" class="required-label">Date Of Birth </label>
                                    <input type="text" id="datepick4" name="StudentDOB" class="form-control" placeholder="Date Of Birth" required>
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="lname" class="required-label">Present Address </label>
                                    <input type="text" id="input1" name=PresentAddress class="form-control" placeholder="Present Address" id="lname" required>
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="lname" class="required-label">Permanent Address <input id="checkbox" type="checkbox"> same as present address</label>
                                    <input type="text" id="input2" name="PermanentAddress" class="form-control" placeholder="Permanent Address" id="lname" required>
                                    
                                </div>    
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="fname" class="required-label">Contact Number </label>
                                    <input type="text" name="ContactNumber" minlength="11" maxlength="11" class="form-control" placeholder="mobile number" id="user_name" required>
                                    <div id="result"></div>
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="lname" class="required-label">Password </label>
                                    <input type="checkbox" id="showPassword">
                                    <label for="showPassword">Show Password</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="*********" id="lname" required>
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="lname" class="required-label">Confirm Pasword </label>
                                    <span id="passwordMatchMessage"></span>
                                    <input type="password" id="confirmPassword" class="form-control" placeholder="**********" id="lname">
                                </div>    
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-3">
                                <label>SSC BOARD </label>
                                <select name="SSC_board" class="form-control" id="SSC_board">
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
                                <input type='number' name='SSC_Roll' class="form-control" id='SSC_Roll' value="" placeholder='SSC ROLL Number'/>
                            </div>
                            <div class="col-md-3">
                            <label>SSC REGISTRATION</label>
                                <input type='number' name='SSC_Registration' class="form-control" id='SSC_Registration' value="" placeholder='SSC Registration Number'/>
                            </div>
                            <div class="col-md-3">
                                <label>SSC PASSING YEAR</label>
                                <select name='SSC_Passing_year' id='SSC_Passing_year' class="form-control">
                                    <!-- Loop through years from 1971 to current year -->
                                    <option value="">Select</option>
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
                                <select name="Last_Exam_board" class="form-control" id="Last_Exam_board">
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
                                <input type='number' name='Last_Exam_Roll' class="form-control" id='Last_Exam_Roll' value="" placeholder='Last Exam ROLL Number'/>
                            </div>
                            <div class="col-md-3">
                                <label>LAST EXAM NAME</label>
                                <input type='text' name='Last_Exam_Registration' class="form-control" id='Last_Exam_Registration' value="" placeholder='Last Exam Name'/>
                            </div>
                            <div class="col-md-3">
                                <label>LAST EXAM YEAR</label>
                                <select name='Last_Exam_Passing_year' class="form-control" id='Last_Exam_Passing_year'>
                                    <!-- Loop through years from 1971 to current year -->
                                    <option value="">Select</option>
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
                                    <input type="number" name="PayAmount" class="form-control" placeholder="Pay Amount" id="PayAmount" required>
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group first">
                                    <label for="lname">Due Amount</label>
                                    <input type="number" name="DueAmount" class="form-control" placeholder="Due Amount" id="DueAmount" readonly>
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
                                    <label for="lname"  class="required-label">Passport Size Image </label>
                                    <input type="file" name="user-image-featured" id="user-image-featured" class="form-control-file" required>
                                    <div id="image-preview"></div>
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

                        <input type="submit" value="SAVE DRAFT" id='submit' class="btn px-5 btn-primary">

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




<style>
    #divstyle {
    background-color: cadetblue;
    width: 400px;
    height: 300px;
    margin-left: 100px;
    padding-top: 30px;
    padding-left: 30px;
    }
</style>
<script>

function formatText(inputField) {
      var input = inputField.value;
      var words = input.toLowerCase().split(" ");
      for (var i = 0; i < words.length; i++) {
        words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
      }
      inputField.value = words.join(" ");
    }

var passwordField = document.getElementById("password");
  var confirmPasswordField = document.getElementById("confirmPassword");
  var showPasswordCheckbox = document.getElementById("showPassword");
  var passwordMatchMessage = document.getElementById("passwordMatchMessage");

  passwordField.addEventListener("input", validatePasswords);
  confirmPasswordField.addEventListener("input", validatePasswords);
  showPasswordCheckbox.addEventListener("change", togglePasswordVisibility);

  function validatePasswords() {
    var passwordsMatch = passwordField.value === confirmPasswordField.value;

    if (passwordsMatch) {
      passwordField.style.borderColor = "green";
      confirmPasswordField.style.borderColor = "green";
      passwordMatchMessage.textContent = "Password matched";
      passwordMatchMessage.style.color = "green";
    } else {
      passwordField.style.borderColor = "red";
      confirmPasswordField.style.borderColor = "red";
      passwordMatchMessage.textContent = "Password doesn't match";
      passwordMatchMessage.style.color = "red";
    }
  }

  function togglePasswordVisibility() {
    var passwordFieldType = showPasswordCheckbox.checked ? "text" : "password";
    passwordField.type = passwordFieldType;
    confirmPasswordField.type = passwordFieldType;
  }


var form = document.getElementById("myForm");
  var submitButton = document.getElementById("submit");

  form.addEventListener("input", function() {
    validateFields();
  });

  form.addEventListener("blur", function() {
    validateFields();
  });

  function validateFields() {
    var requiredFields = form.querySelectorAll("[required]");
    var emptyFields = [];

    requiredFields.forEach(function(field) {
      if (!field.value) {
        emptyFields.push(field);
      }
    });

    requiredFields.forEach(function(field) {
      field.style.borderColor = "";
    });

    if (emptyFields.length === 0) {
      submitButton.style.display = "block";
    } else {
      submitButton.style.display = "none";
      emptyFields.forEach(function(field) {
        field.style.borderColor = "red";
      });
    }
  }

    $(document).ready(function(){

        $("#datepick").datepicker({
            dateFormat: "dd-mm-yy",
        });
        $("#datepick2").datepicker({
            dateFormat: "dd-mm-yy",
        });
        $("#datepick3").datepicker({
            dateFormat: "dd-mm-yy",
        });
        $("#datepick4").datepicker({
            dateFormat: "dd-mm-yy",
        });
            $('#courseFee, #PayAmount').keyup(function(){
                var num1 = parseFloat($('#courseFee').val()) || 0;
                var num2 = parseFloat($('#PayAmount').val()) || 0;
                var sum = num1 - num2;

                $('#DueAmount').val(sum.toFixed(2));
            });
            $('#user_name').on('input', function() {
                var user_name = $(this).val();
                
                // Send an Ajax request to check user existence
                $.ajax({
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    method: 'POST',
                    data: {
                        action: 'check_user',
                        user_name: user_name
                    },
                    success: function(response) {
                        if (response === 'exists') {
                            $('#result').html('<span style="color: red;">Warning: SAME MOBILE NUMBER FOUND!</span>');
                            $('input[type="submit"]').prop('disabled', true);
                        } else {
                            $('#result').html('<span style="color: green;">No match found!</span>');
                            $('input[type="submit"]').prop('disabled', false);
                        }
                    }
                });
            });
        });

    // Get the file input element
    var fileInput = document.getElementById('user-image-featured');

    // Add an event listener for when a file is selected
    fileInput.addEventListener('change', function(event) {
    // Get the selected file
    var file = event.target.files[0];

    // Create a FileReader object
    var reader = new FileReader();

    // Set up the FileReader onload function
    reader.onload = function(e) {
        // Get the image preview element
        var imagePreview = document.getElementById('image-preview');

        // Create a new image element
        var image = document.createElement('img');

        // Set the image source to the uploaded file data
        image.src = e.target.result;

        // Set any desired styling for the image preview
        image.style.maxWidth = '100%';
        image.style.maxHeight = '200px';

        // Clear the existing image preview
        imagePreview.innerHTML = '';

        // Append the new image to the preview element
        imagePreview.appendChild(image);
    };

    // Read the uploaded file as a data URL
    reader.readAsDataURL(file);
    });

    const checkbox = document.getElementById('checkbox');
  const input1 = document.getElementById('input1');
  const input2 = document.getElementById('input2');

  checkbox.addEventListener('change', function() {
    if (checkbox.checked) {
      input2.value = input1.value;
    } else {
      input2.value = '';
    }
  });   

</script>

<?php
require_once(get_template_directory(). '/admin/footer.php');