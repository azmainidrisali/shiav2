<?php
            // Suppress any output
                                                            
if (isset($_POST['generateAdmitCard_pdf'])) {
    
    

    $themeDir = get_template_directory();
    
    // Include the TCPDF plugin file
    require_once $themeDir . '/plugins/tcpdf-main/tcpdf.php';

    function generateAdmitCardePDF($backgroundImage,$IssueDate,$SerialNumber, $CertificateHolderName, $FathersName, $MothersName, $CourseName, $Institutename, $heldForm, $HeldformTo, $Grade, $RollNumber, $RegistrationNumber, $filename, $profileImage) {
        // Create new TCPDF instance
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

        //  $themeDir = get_template_directory();
        //  $path = $themeDir . '/plugins/tcpdf-main/fonts/Poppins-Light.ttf';
        //      $StrBNFont = TCPDF_FONTS::addTTFfont($path, 'TrueTypeUnicode', '', 32);

        //      if($StrBNFont){
        //          echo 'good';
        //      }else{
        //          echo 'Bad';
        //      }
        //  exit;

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

        // Set the background image
        $pdf->Image($backgroundImage, 0, 0, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, true);

        // Set font settings
        
        $pdf->SetTextColor(0, 0, 0);

        // Set text position
        $IssueDateX = 38; // X-coordinate
        $IssueDateY = 42; // Y-coordinate
        $pdf->SetXY($IssueDateX, $IssueDateY);
        $pdf->Cell(0, 0, $SerialNumber, 0, 1, 'L');
        
        // Set text position
        $textX = 15; // X-coordinate
        $textY = 52; // Y-coordinate
        $pdf->SetXY($textX, $textY);
        // $pdf->SetFont('e111psto', 'B', 18);
        $pdf->SetFont('times', '', 20);
        $pdf->Cell(0, 0, 'Name of Examinee: '.$CertificateHolderName, 0, 1, 'L');

        // Set text position
        $textDOtX = 73; // X-coordinate
        $textDOtY = 54; // Y-coordinate
        $pdf->SetXY($textDOtX, $textDOtY);
        // $pdf->SetFont('e111psto', 'B', 18);
        $pdf->SetFont('times', '', 20);
        $pdf->Cell(0, 0, '..................................................................', 0, 1, 'L');

        // Set text position
        $fathersNameX = 15; // X-coordinate
        $fathersNameY = 62; // Y-coordinate
        // Write certificate content
        $pdf->SetXY($fathersNameX, $fathersNameY);
        $pdf->Cell(0, 0, "Father's Name: ".$FathersName, 0, 1, 'L');

        // Set text position
        $fathersNameDOtX = 58; // X-coordinate
        $fathersNameDOtY = 64; // Y-coordinate
        // Write certificate content
        $pdf->SetXY($fathersNameDOtX, $fathersNameDOtY);
        $pdf->Cell(0, 0, '...........................................................................', 0, 1, 'L');

        // Set text position
        $mothersNameX = 15; // X-coordinate
        $mothersNameY = 72; // Y-coordinate
        $pdf->SetXY($mothersNameX, $mothersNameY);
        $pdf->Cell(0, 0, "Mother's Name: ".$MothersName, 0, 1, 'L');

        // Set text position
        $mothersNameDOTX = 62; // X-coordinate
        $mothersNameDOTY = 74; // Y-coordinate
        $pdf->SetXY($mothersNameDOTX, $mothersNameDOTY);
        $pdf->Cell(0, 0, '.........................................................................', 0, 1, 'L');

        // Set text position
        $courseNameX = 15; // X-coordinate
        $courseNameY = 81; // Y-coordinate
        $pdf->SetXY($courseNameX, $courseNameY);
        $pdf->Cell(0, 0, "Name Of course: ".$CourseName, 0, 1, 'L');

        // Set text position
        $courseNameDOTX = 64; // X-coordinate
        $courseNameDOTY = 84; // Y-coordinate
        $pdf->SetXY($courseNameDOTX, $courseNameDOTY);
        $pdf->Cell(0, 0, '.........................................................................', 0, 1, 'L');

        $pdf->SetFont('times', '', 16);
        // Set text position
        $rollNumberX = 15; // X-coordinate
        $rollNumberY = 91; // Y-coordinate
        $pdf->SetXY($rollNumberX, $rollNumberY);
        $pdf->Cell(0, 0, "Reg No:  ".$RegistrationNumber."   Roll No:   ".$RollNumber."  Roll No:  ".$heldForm." to ".$HeldformTo, 0, 1, 'L');

        
        // Set text position
        $rollNumberDotX = 36; // X-coordinate
        $rollNumberDotY = 94; // Y-coordinate
        $pdf->SetXY($rollNumberDotX, $rollNumberDotY);
        $pdf->Cell(0, 0, '.................', 0, 1, 'L');
        // Set text position
        $rollNumberDot1X = 85; // X-coordinate
        $rollNumberDot1Y = 94; // Y-coordinate
        $pdf->SetXY($rollNumberDot1X, $rollNumberDot1Y);
        $pdf->Cell(0, 0, '....................', 0, 1, 'L');
        // Set text position
        $rollNumberDot1X = 134; // X-coordinate
        $rollNumberDot1Y = 94; // Y-coordinate
        $pdf->SetXY($rollNumberDot1X, $rollNumberDot1Y);
        $pdf->Cell(0, 0, '............................................', 0, 1, 'L');

        $pdf->SetFont('times', '', 19);
        // Set text position
        $DateEndX = 28; // X-coordinate
        $DateEndY = 104; // Y-coordinate
        $pdf->SetXY($DateEndX, $DateEndY);
        $pdf->Cell(0, 0, $HeldformTo, 0, 1, 'L');


        
        $pdf->Image($profileImage, $x = 170, $y = 12, $w = 28, $h = 29, $type = 'JPEG', $link = '', $align = '', $resize = false, $dpi = 300, $palign = '', $ismask = false, $imgmask = false, $border = 0, $fitbox = false, $hidden = false, $fitonpage = false);

        // $img = "https://localhost/shiacomputer/wp-content/uploads/2023/07/hq2.jpg";

        // // Set QR code position
        // $qrCodeX = 15; // X-coordinate
        // $qrCodeY = 90; // Y-coordinate
        // $pdf->Image($img, $qrCodeX, $qrCodeY, 25, 25, '', '', '', false, 300, '', false, false, 0, true);

        // Clear output buffer
        ob_end_clean();

        // Output the PDF as a download
        $pdf->Output($filename, 'I');

        // Terminate the script
        exit;
    }

    
    $backgroundImage = 'http://localhost/shiacomputer/wp-content/uploads/2023/07/Admit-Card-blank.jpg';
    $CertificateHolderName = $_POST['CertificateHolderName'];
    $FathersName = $_POST['FathersName'];
    $MothersName = $_POST['MothersName'];
    $CourseName = $_POST['CourseName'];
    $Institutename = $_POST['Institutename'];
    $heldForm = $_POST['heldForm'];
    $HeldformTo = $_POST['HeldformTo'];
    $Grade = $_POST['Grade'];
    $RollNumber = $_POST['RollNumber'];
    $RegistrationNumber = $_POST['RegistrationNumber'];
    $SerialNumber = $_POST['SerialNumber'];
    $IssueDate = $_POST['IssueDate'];
    $profileImage = $_POST['image'];
    $filename = 'SCTC-ADMIT-'.$RollNumber.'.pdf';
    generateAdmitCardePDF($backgroundImage,$IssueDate,$SerialNumber, $CertificateHolderName, $FathersName, $MothersName, $CourseName, $Institutename, $heldForm, $HeldformTo, $Grade, $RollNumber, $RegistrationNumber, $filename, $profileImage);
}
?>