<?php
            // Suppress any output
                                                            
if (isset($_POST['generate_pdf'])) {
    

    $themeDir = get_template_directory();

    // Include the TCPDF plugin file
    require_once $themeDir . '/plugins/tcpdf-main/tcpdf.php';

    function generateCertificatePDF($backgroundImage, $contentText, $filename,) {
        // Create new TCPDF instance
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

        // Set the background image
        $pdf->Image($backgroundImage, 0, 0, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, true);

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
    $backgroundImage = 'http://localhost/shiacomputer/wp-content/uploads/2023/06/New-Project.jpg';
    $contentText = $_POST['contentText'];
    $filename = 'certificate-3344.pdf';

    generateCertificatePDF($backgroundImage, $contentText, $filename);
}
?>