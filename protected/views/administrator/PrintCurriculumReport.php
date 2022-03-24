<?php 

include('pdf_mc_table.php');
$pdf = new PDF_MC_Table('P', 'mm',array(365,230));
$pdf->AddPage();
$pdf->header(); 
// $course_code = $course['course'];
// $course_desc = $course['course_desc'];
// $Years = $course['NoOfYears'];

foreach ($course as $row) {
	$pdf->Image('PUP Taguig.png',25,10,18);
	$pdf->Image('centenniallogo.gif',190,10,18);
	$pdf->AddFont('segoeui','','segoeui.php');
	$pdf->AddFont('segoeuib','','segoeuib.php');
	$pdf->AddFont('segoeuil','','segoeuil.php');
	$pdf->AddFont('segoeuiz','','segoeuiz.php');
	$pdf->AddFont('segoeuii','','segoeuii.php');
	$pdf->AddFont('seguisb','','seguisb.php');
	$pdf->SetFont('segoeui','',11);
	$pdf->SetTextColor(0);
	$pdf->SetFont('segoeui','',10);
	$pdf->Cell(0,5,'POLYTECHNIC UNIVERSITY OF THE PHILIPPINES',0,0,'C');
	$pdf->Ln(5);
	$pdf->SetFont('segoeui','',10);
	$pdf->Cell(0,3,'TAGUIG  BRANCH',0,0,'C');
	$pdf->Ln(4);
	$pdf->SetFont('segoeuii','',10);
	$pdf->Cell(0,3,'Gen. Santos Ave. Upper Bicutan, Taguig City',0,0,'C');
	$pdf->Ln(7);
	$pdf->Ln(6);
	$pdf->SetFont("segoeuib","",13); 
	$pdf->Cell(0,1,$row['course_desc'],0,0,'C');
	$pdf->Ln(6);
	$pdf->SetFont('segoeui','',13);
	$pdf->Cell(0,3,$_GET['year']." Curriculum",0,0,'C');
	$pdf->Ln(7);

	$header = array("SUBJECT CODE", "SUBJECT TITLE", "UNITS", "LEC", "LAB");
	$pdf->SetFont('seguisb','',11);
	$pdf->SetAligns(array('C','C','C','C','C'));
	$pdf->SetWidths(array(35,90,28,28,28));
	$pdf->SetLineHeight(9);
	$pdf->Row(array($header[0], $header[1], $header[2], $header[3], $header[4]));

	foreach ($curriculum as $curr) {
		if($row['course']==$curr['courseID']){
			$pdf->SetFont('segoeui','',10);
			$pdf->SetAligns(array('C','L','C','C','C'));
			$pdf->SetWidths(array(35,90,28,28,28));
			$pdf->SetLineHeight(8);

			$pdf->Row(array($curr['scode'], $curr['stitle'], $curr['sunit'], $curr['hrs_lec'], $curr['hrs_lab']));
		}
	}
	$pdf->AddPage('P');
}

$pdf->Output();
?>