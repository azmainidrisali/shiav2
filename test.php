?>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Execute the SendSMS function when the form is submitted
        $StudentPhoneNumber = '8801798192491';
        $textSms = 'welcome';
        SendSMS($StudentPhoneNumber, $textSms);
    }
?>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <button type="submit">Send SMS</button>
    </form>



    if (isset($_POST['submit'])) {
                        
                    }

                        if (isset( $_POST['cpt_nonce_field'] ) && wp_verify_nonce( $_POST['cpt_nonce_field'], 'cpt_nonce_action' ) ) {

                            // create post object with the form values

                            $post_Student_purpose                               = $_POST['Purpose'];
                            $post_Student_selectCourse                          = $_POST['selectCourse'];
                            $post_Student_StudentDurationCourse                 = $_POST['StudentDurationCourse'];
                            $post_Student_course_fee                            = $_POST['courseFee'];   
                            $post_Student_admissionDate                         = $_POST['admissionDate'];   
                            $post_Student_seassionStart                         = $_POST['seassionStart'];   
                            $post_Student_seassionEnd                           = $_POST['seassionEnd'];   
                            $post_Student_batch                                 = $_POST['batch'];   
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

                            $my_cptpost_args = array(

                            'post_title'    => $_POST['STudentName'],
                            'post_author'  => get_current_user_id(),

                            'post_status'   => $_POST['submitType'],

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
                            add_post_meta( $cpt_id, 'student_batch_register', $post_Student_batch, false );
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

                            // Retrieve the form inputs
                                    $username = $_POST['STudentName'];
                                    $email = $_POST['StudentEmail'];
                                    $password = $_POST['password'];

                                    // Create the user using WordPress functions
                                    $user_id = wp_create_user($username, $password, $email);

                                    if (!is_wp_error($user_id)) {
                                        // User created successfully
                                        echo "User created successfully.";
                                    } else {
                                        // Error creating user
                                        echo "Error creating user: " . $user_id->get_error_message();
                                    };


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









                        <?php 
                
                  $contentText = get_post_meta(get_the_ID(), 'custom_roll_number', true);

                  $themeDir = get_template_directory();

                  // Include the TCPDF plugin file
                  require_once $themeDir . '/plugins/tcpdf-main/tcpdf.php';


                  
                  // Create new PDF document
                  $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

                  // Add a new page
                  $pdf->AddPage();

                  // Set margins to 0
                  $pdf->SetMargins(0, 0, 0);

                  // Disable auto page breaks
                  $pdf->SetAutoPageBreak(false, 0);

                  // Calculate image dimensions
                  $pageWidth = $pdf->getPageWidth();
                  $pageHeight = $pdf->getPageHeight();
                  $imageWidth = $pageWidth;
                  $imageHeight = $pageHeight;

                  // Get the local path to the background image
$backgroundImage = $themeDir . '/New-Project.jpg'; // Update with the correct path

// Verify if the ba ckground image file exists
if (file_exists($backgroundImage)) {
    // Merge the background image with the PDF
    $pdf->Image($backgroundImage, 0, 0, $pageWidth, $pageHeight, '', '', '', false, 300, '', false, false, 0);
}

                  

                  // Set font settings
                  $pdf->SetFont('Helvetica', 'B', 15);
                  $pdf->SetTextColor(0, 0, 0); // Black color
                  
                  // Set text position
                  $fathersNameX = 18; // X-coordinate
                  $fathersNameY = 106; // Y-coordinate
                  // Write certificate content
                  $pdf->SetXY($fathersNameX, $fathersNameY);
                  $pdf->Cell(0, 0, $contentText, 0, 1, 'C');

                  // Set text position
                  $textX = 30; // X-coordinate
                  $textY = 94; // Y-coordinate
                  $pdf->SetXY($textX, $textY);
                  $pdf->Cell(0, 0, $contentText, 0, 1, 'C');

                  // Set text position
                  $mothersNameX = 19; // X-coordinate
                  $mothersNameY = 118; // Y-coordinate
                  $pdf->SetXY($mothersNameX, $mothersNameY);
                  $pdf->Cell(0, 0, $contentText, 0, 1, 'C');

                  // Set text position
                  $courseNameX = 105; // X-coordinate
                  $courseNameY = 130; // Y-coordinate
                  $pdf->SetXY($courseNameX, $courseNameY);
                  $pdf->Cell(0, 0, $contentText, 0, 1, 'C');

                  // Set text position
                  $instituteNameX = 19; // X-coordinate
                  $instituteNameY = 142; // Y-coordinate
                  $pdf->SetXY($instituteNameX, $instituteNameY);
                  $pdf->Cell(0, 0, $contentText, 0, 1, 'C');

                  // Set text position
                  $heldFromNameX = 110; // X-coordinate
                  $heldFromNameY = 153; // Y-coordinate

                  $pdf->SetXY($heldFromNameX, $heldFromNameY);
                  $pdf->Cell(0, 0, '02/03/2023', 0, 1, 'L');

                  // Set text position
                  $heldtoNameX = 70; // X-coordinate
                  $heldtoNameY = 153; // Y-coordinate

                  $pdf->SetXY($heldtoNameX, $heldtoNameY);
                  $pdf->Cell(0, 0, '10/08/2023', 0, 1, 'C');
                  
                  // Set text position
                  $resultNameX = 250; // X-coordinate
                  $resultNameY = 153; // Y-coordinate

                  $pdf->SetXY($resultNameX, $resultNameY);
                  $pdf->Cell(0, 0, 'A+', 0, 1, 'C');  

              // Get the PDF content as a string
              $pdfData = $pdf->Output('', 'S');
                  
                ?>

<div>
    <iframe src="data:application/pdf;base64,<?php echo base64_encode($pdfData); ?>" width="100%" height="900px"></iframe>
</div>