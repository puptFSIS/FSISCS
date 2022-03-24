<?php
require('fpdf.php');
require('fpdi/fpdi.php');
include("config.php");


// initiate FPDI
$pdf = new FPDI();
// add a page
$pdf->AddPage();
// set the source file
$pdf->setSourceFile("FORMS/form48.pdf");
// import page 1
$tplIdx = $pdf->importPage(1);
// use the imported page and place it at point 10,10 with a width of 100 mm
$pdf->useTemplate($tplIdx, 5, 5, 200);

// name
$pdf->SetFont('Helvetica','','12');
$pdf->SetTextColor(255, 0, 0);
$query = "SELECT * FROM tbl_masterlist WHERE Status = 'BO' ORDER BY FName ASC";
$result = "Perri Gago"; /*mysql_query($query);*/
$pdf->SetXY(27, 27);
$pdf->Write(0, $result);

//month
$pdf->SetFont('Helvetica','','8');
$pdf->SetTextColor(255, 0, 0);
$query = "SELECT * FROM tbl_masterlist WHERE Status = 'BO' ORDER BY FName ASC";
$result = "Perri Gago"; /*mysql_query($query);*/
$pdf->SetXY(37, 39);
$pdf->Write(0, $result);

// year
$pdf->SetFont('Helvetica','','8');
$pdf->SetTextColor(255, 0, 0);
$query = "SELECT * FROM tbl_masterlist WHERE Status = 'BO' ORDER BY FName ASC";
$result = "Perri Idol daw ni boy ingay"; /*mysql_query($query);*/
$pdf->SetXY(59,39);
$pdf->Write(0, $result);

// reg days
$pdf->SetFont('Helvetica','','8');
$pdf->SetTextColor(255, 0, 0);
$query = "SELECT * FROM tbl_masterlist WHERE Status = 'BO' ORDER BY FName ASC";
$result = "Sample Reg Days"; /*mysql_query($query);*/
$pdf->SetXY(32, 45);
$pdf->Write(0, $result);

//kalokohan
$pdf->SetFont('Helvetica','','8');
$pdf->SetTextColor(255, 0, 0);
$query = "SELECT * FROM tbl_masterlist WHERE Status = 'BO' ORDER BY FName ASC";
$result = "GAGO"; /*mysql_query($query);*/
$pdf->SetXY(83, 112);
$pdf->Write(0, $result);

$pdf->Output();
?>