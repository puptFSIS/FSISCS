<?php
include('pdf_mc_table.php');
$pdf = new PDF_MC_Table('P', 'mm',array(365,230));

$course_code = $course['course'];
$course_desc = $course['course_desc'];
$Years = $course['NoOfYears'];

$pdf->AddPage('P');

for ($years=1; $years <= $Years; $years++) {
	

	$pdf->Image('PUP Taguig.png',25,10,18);
	$pdf->Image('centenniallogo.gif',165,10,18);
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
	$pdf->SetFont("segoeuib","",13); 
	$pdf->Cell(0,1,$course_desc,0,0,'C');
	$pdf->Ln(6);
	$pdf->SetFont('segoeui','',13);
	$pdf->Cell(0,3,$_GET['year']." Curriculum",0,0,'C');
	$pdf->Ln(7);
	if($years==1) {
		$yr = "First Year";
	} else if($years==2) {
		$yr = "Second Year";
	} else if($years==3) {
		$yr = "Third Year";
	} else if($years==4) {
		$yr = "Fourth Year";
	} else if($years==5) {
		$yr = "Fifth Year";
	}
	$pdf->SetFont('segoeui','',13);
	$pdf->Cell(0,3,$yr,0,0,'L');
	$pdf->Ln(10);
	 
	for ($sem=1; $sem <= 3; $sem++) { 
		$totUnits = 0;
		if($sem == 1){
			$wordSem = "1ST SEMESTER";
		}else if($sem == 2){
			$wordSem = "2ND SEMESTER";
		}else if($sem == 3){
			$wordSem = "SUMMER";
		}
		$pdf->SetFont('segoeui','',10);
		$pdf->Cell(0,3,$wordSem,0,0,'L');
		$pdf->Ln(5);
		//table header
		$header = array('CODE', 'SUBJECT TITLE', 'UNITS', 'LEC', 'LAB');
		$w = array(35, 115, 18, 18, 18);
		$pdf->SetFillColor(50,50,50);
		$pdf->SetTextColor(255,255,255);
		for($i=0;$i<count($header);$i++){
			$pdf->Cell($w[$i],5,$header[$i],1,0,'C',true);
		}
		$pdf->Ln();

		//table body
		$pdf->SetFont("segoeui","",10);
		$pdf->SetTextColor(50,50,50);
		$pdf->SetAligns(array('C','L','C','C','C'));
		$pdf->SetWidths(array(35, 115, 18, 18, 18));
		$pdf->SetLineHeight(7);
		foreach ($curriculum as $row) {
			if ($row['sem'] == $sem AND $row['cyear'] == $years) {
				$pdf->Row(array($row['scode'], $row['stitle'], $row['sunit'], $row['hrs_lec'], $row['hrs_lab']));
				$totUnits += $row['sunit'];
			}
		}
		$pdf->SetFont('segoeui','',10);
		$pdf->Cell(0,5,'Total Units: '.$totUnits,0,0,'L');
		$pdf->Ln(10);

	}
	$pdf->SetTextColor(50,50,50);
	$pdf->Ln(7);
	if ($years != $Years) {
		$pdf->AddPage('P');
	}
	
}

$pdf->Output();
?>