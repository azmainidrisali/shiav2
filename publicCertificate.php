<?php
            // Suppress any output
                                                            
if (isset($_POST['pub_generate_pdf'])) {
    
    

    $themeDir = get_template_directory();
    
    // Include the TCPDF plugin file
    require_once $themeDir . '/plugins/tcpdf-main/tcpdf.php';

    function pub_generateCertificatePDF($backgroundImage,$IssueDate,$SerialNumber, $CertificateHolderName, $FathersName, $MothersName, $CourseName, $Institutename, $heldForm, $HeldformTo, $Grade, $RollNumber, $RegistrationNumber, $filename) {
        // Create new TCPDF instance
        $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

        //$themeDir = get_template_directory();
            //$path = $themeDir . '/plugins/tcpdf-main/fonts/e111psto.ttf';
            // $StrBNFont = TCPDF_FONTS::addTTFfont($path, 'TrueTypeUnicode', '', 32);

            // if($StrBNFont){
            //     echo 'good';
            // }else{
            //     echo 'Bad';
            // }
        // exit;

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
        
        $pdf->SetTextColor(0, 0, 0); // Black color

        // Set text position
        $SerialNumberX = 110; // X-coordinate
        $SerialNumberY = 63; // Y-coordinate
        $pdf->SetXY($SerialNumberX, $SerialNumberY);
        $pdf->Cell(0, 0, $IssueDate, 0, 1, 'L');

        // Set text position
        $IssueDateX = 111; // X-coordinate
        $IssueDateY = 55; // Y-coordinate
        $pdf->SetXY($IssueDateX, $IssueDateY);
        $pdf->Cell(0, 0, $SerialNumber, 0, 1, 'L');

        // Set text position
        $RegistrationNumberX = 225; // X-coordinate
        $RegistrationNumberY = 53.5; // Y-coordinate
        $pdf->SetXY($RegistrationNumberX, $RegistrationNumberY);
        $pdf->Cell(0, 0, $RollNumber, 0, 1, 'C');

        // Set text position
        $rollNumberX = 225; // X-coordinate
        $rollNumberY = 61; // Y-coordinate
        $pdf->SetXY($rollNumberX, $rollNumberY);
        $pdf->Cell(0, 0, $RegistrationNumber, 0, 1, 'C');
        
        // Set text position
        $textX = 135; // X-coordinate
        $textY = 91; // Y-coordinate
        $pdf->SetXY($textX, $textY);
        $pdf->SetFont('e111psto', 'B', 21);
        $pdf->Cell(0, 0, $CertificateHolderName, 0, 1, 'L');

        // Set text position
        $fathersNameX = 135; // X-coordinate
        $fathersNameY = 102; // Y-coordinate
        // Write certificate content
        $pdf->SetXY($fathersNameX, $fathersNameY);
        $pdf->Cell(0, 0, $FathersName, 0, 1, 'L');

        // Set text position
        $mothersNameX = 135; // X-coordinate
        $mothersNameY = 113; // Y-coordinate
        $pdf->SetXY($mothersNameX, $mothersNameY);
        $pdf->Cell(0, 0, $MothersName, 0, 1, 'L');

        // Set text position
        $courseNameX = 123; // X-coordinate
        $courseNameY = 124; // Y-coordinate
        $pdf->SetXY($courseNameX, $courseNameY);
        $pdf->Cell(0, 0, $CourseName, 0, 1, 'C');

        // Set text position
        $instituteNameX = 49; // X-coordinate
        $instituteNameY = 134.5; // Y-coordinate
        $pdf->SetXY($instituteNameX, $instituteNameY);
        $pdf->Cell(0, 0, $Institutename, 0, 1, 'C');

        // Set text position
        $heldFromNameX = 110; // X-coordinate
        $heldFromNameY = 146; // Y-coordinate

        $pdf->SetXY($heldFromNameX, $heldFromNameY);
        $pdf->Cell(0, 0, $heldForm, 0, 1, 'L');

        // Set text position
        $heldtoNameX = 70; // X-coordinate
        $heldtoNameY = 146; // Y-coordinate

        $pdf->SetXY($heldtoNameX, $heldtoNameY);
        $pdf->Cell(0, 0, $HeldformTo, 0, 1, 'C');
        
        // Set text position
        $resultNameX = 230; // X-coordinate
        $resultNameY = 146; // Y-coordinate

        $pdf->SetXY($resultNameX, $resultNameY);
        $pdf->Cell(0, 0, $Grade, 0, 1, 'C');
        
        

        $qrCodeURL = 'https://app.shiacomputer.com/result-search/?rollNumber='.$RollNumber;
        $qrCodeImage = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . urlencode($qrCodeURL);

        // Set QR code position
        $qrCodeX = 176; // X-coordinate
        $qrCodeY = 168; // Y-coordinate
        $pdf->Image($qrCodeImage, $qrCodeX, $qrCodeY, 25, 25, '', '', '', false, 300, '', false, false, 0, true);

        // Clear output buffer
        ob_end_clean();

        // Output the PDF as a download
        $pdf->Output($filename, 'I');

        // Terminate the script
        exit;
    }

    // Example usage within the WordPress post loop
    if (isset($shiacomputeroption['certificate_image'])) {
        $get_adminCertificate_id = $shiacomputeroption['adminCertificate']; // Get the selected page ID

        if ($get_adminCertificate_id) {
            $get_adminCertificate_link = get_permalink($get_adminCertificate_id); // Get the permalink of the selected page
        }
    }
    $backgroundImage = 'https://app.shiacomputer.com/wp-content/uploads/2023/07/Certificatggge-shia-scaled.jpg';
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
    $filename = 'SCTC-'.$RollNumber.'.pdf';

    pub_generateCertificatePDF($backgroundImage,$IssueDate,$SerialNumber, $CertificateHolderName, $FathersName, $MothersName, $CourseName, $Institutename, $heldForm, $HeldformTo, $Grade, $RollNumber, $RegistrationNumber, $filename);
}
?>