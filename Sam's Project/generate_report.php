<?php
// Connect to database
$connection = mysqli_connect("localhost", "root", "", "policedb");

// Retrieve PDF files between selected dates
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$query = "SELECT * FROM device_type WHERE date BETWEEN '$start_date' AND '$end_date'";
$result = mysqli_query($connection, $query);

// Store PDF files in an array
$pdf_files = array();
while ($row = mysqli_fetch_assoc($result)) {
    $pdf_files[] = $row['file_path'];
}
require_once('tcpdf/tcpdf.php');

$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator('Your Name');
$pdf->SetTitle('PDF Report');
$pdf->SetHeaderData('', '', 'PDF Report', '', array(0, 0, 0), array(255, 255, 255));
$pdf->setHeaderFont(Array('helvetica', '', 14));
$pdf->setFooterFont(Array('helvetica', '', 10));
$pdf->SetDefaultMonospacedFont('courier');
$pdf->SetMargins(10, 10, 10);
$pdf->SetAutoPageBreak(TRUE, 10);
$pdf->SetFont('helvetica', '', 11);
$pdf->AddPage();

foreach ($pdf_files as $pdf_file) {
    // Get the contents of the PDF file
    $pdf_contents = file_get_contents($pdf_file);
    
    // Add the PDF file to the report
    $pdf->AddPage();
    $pdf->Image('@'.$pdf_contents);
}
$pdf->Output('PDF Report.pdf', 'I');

?>