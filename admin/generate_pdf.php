<?php

require_once(get_template_directory_uri(). '/plugins/tcpdf-main/tcpdf.php');
//localhost/shiacomputer/wp-content/themes/shiav2/plugins/tcpdf-main/tcpdf.php

// Retrieve form input
$name = $_POST['name'];
$email = $_POST['email'];

// Create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Form Input to PDF');
$pdf->SetSubject('Form Input Data');
$pdf->SetKeywords('Form, Input, PDF');

// Add a page
$pdf->AddPage();

// Set the font and font size
$pdf->SetFont('helvetica', 'B', 16);

// Output the form input in the PDF
$pdf->Cell(0, 10, "Name: $name", 0, 1);
$pdf->Cell(0, 10, "Email: $email", 0, 1);

// Output the PDF as a download
$pdf->Output('form_input.pdf', 'D');
?>