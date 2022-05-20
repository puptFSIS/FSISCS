<?php 
	include('pdf_mc_table.php');

if(isset($_GET['fname'],$_GET['mname'],$_GET['sname'])) {
	$firstname = $_GET['fname'];
	$middlename = $_GET['mname'];
	$surname = $_GET['sname'];
}

$pdf = new PDF_MC_Table('L','mm',array(325,210));
//$pdf->Cell(1,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
$pdf->AddPage();
		$pdf->Image('accpictures/logo.png',10,6,20);
		$pdf->SetFont('Arial','',10);
    	// Move to the right
    	$pdf->Cell(30); 
    	// Title
    	$pdf->Cell(30,6,'Republic of the Philippines',0,0,'C');
    	$pdf->SetFont('Times','',12);
    	$pdf->Cell(26,15,'POLYTECHNIC UNIVERSITY OF THE PHILIPPINES',0,0,'C');
    	$pdf->SetFont('Times','',10.8);
    	$pdf->Cell(-54,22,'Gen. Santos Ave. Upper Bicutan, Taguig City',0,0,'C');
    	//Title
    	$pdf->SetFont('Arial','B',12);
		$pdf->Cell(250,40,'INDIVIDUAL PERFORMANCE COMMITMENT AND REVIEW (IPCR)',0,1,'C');
		//Intro
		session_start();
		//include('getPersonalInformation.php');
		$pdf->SetY(30);
		$pdf->SetFont('Arial','',10.5);
		$pdf->Cell(325,10,'I, '.$firstname." ".$middlename." ".$surname.' of the PUP TAGUIG CITY BRANCH commit to deliver and agree to be rated on the attainment of the following targets in accordance with the indicated ',0,1,'C');
		$pdf->Cell(120,-2,'measures for the period -JANUARY to JUNE, '.$ye.'.',0,0,'C');
		$pdf->Ln(0);
		//header
		$pdf->SetY(70);
		//$pdf->Cell(1);
		$pdf->SetFont('Arial','B',8);
		$pdf->SetFillColor(211,211,211);
		$pdf->Cell(60,8,'Output',1,0,'C',1);
		$pdf->Cell(70,8,'Success Indicators',1,0,'C',1);
		$pdf->Cell(70,8,'Actual Accomplishments',1,0,'C',1);
		$pdf->Cell(50,4,'Ratings',1,0,'C',1);
		$pdf->Cell(55,8,'Remarks',1,0,'C',1);
		$pdf->Cell(0,4,'',0,1);
		$pdf->Cell(200,4,'',0,0);
		$pdf->Cell(12.4,4,'Q1',1,0,'C',1);
		$pdf->Cell(12.4,4,'E2',1,0,'C',1);
		$pdf->Cell(12.4,4,'T3',1,0,'C',1);
		$pdf->Cell(12.6,4,'A4',1,1,'C',1);
		//Strategic priority
		//$pdf->Cell(1);
		$pdf->SetFillColor(83, 207, 214);
		//$pdf->Rect(0, 0, 210, 297, 'F');
		$pdf->Cell(305,6,'Strategic Priority:',1,0,'L',1);
		$pdf->Cell(0,6,'',0,1,'L');
		$pdf->SetFont('Arial','',8);
		$pdf->SetWidths(array(60,70,70,12.4,12.4,12.4,12.6,55));
		$pdf->SetLineHeight(7);
		foreach($infosp as $item) {
			$pdf->Row(array(
				strip_tags($item['output']),
				strip_tags($item['indicators']),
				strip_tags($item['accomplishment']),
				$item['rating_quality'],
				$item['rating_efficiency'],
				$item['rating_timeliness'],
				$item['rating_average'],
				strip_tags($item['remarks']),
			));
		}
		$pdf->Ln(5);
		$pdf->SetFont('Arial','B',8);
		$pdf->SetFillColor(211,211,211);
		$pdf->Cell(60,8,'Output',1,0,'C',1);
		$pdf->Cell(70,8,'Success Indicators',1,0,'C',1);
		$pdf->Cell(70,8,'Actual Accomplishments',1,0,'C',1);
		$pdf->Cell(50,4,'Ratings',1,0,'C',1);
		$pdf->Cell(55,8,'Remarks',1,0,'C',1);
		$pdf->Cell(0,4,'',0,1);
		$pdf->Cell(200,4,'',0,0);
		$pdf->Cell(12.4,4,'Q1',1,0,'C',1);
		$pdf->Cell(12.4,4,'E2',1,0,'C',1);
		$pdf->Cell(12.4,4,'T3',1,0,'C',1);
		$pdf->Cell(12.6,4,'A4',1,1,'C',1);
		//Strategic priority
		//$pdf->Cell(1);
		$pdf->SetFillColor(83, 207, 214);
		//$pdf->Rect(0, 0, 210, 297, 'F');
		$pdf->Cell(305,6,'Core Function:',1,0,'L',1);
		$pdf->Cell(0,6,'',0,1,'L');
		$pdf->SetFont('Arial','',8);
		$pdf->SetWidths(array(60,70,70,12.4,12.4,12.4,12.6,55));
		$pdf->SetLineHeight(7);
		foreach($infocf as $itemcf) {
			$pdf->Row(array(
				strip_tags($itemcf['output']),
				strip_tags($itemcf['indicators']),
				strip_tags($itemcf['accomplishment']),
				$itemcf['rating_quality'],
				$itemcf['rating_efficiency'],
				$itemcf['rating_timeliness'],
				$itemcf['rating_average'],
				strip_tags($itemcf['remarks']),
			));
		}
		$pdf->Ln(5);

		$pdf->SetFont('Arial','B',8);
		$pdf->SetFillColor(211,211,211);
		$pdf->Cell(60,8,'Output',1,0,'C',1);
		$pdf->Cell(70,8,'Success Indicators',1,0,'C',1);
		$pdf->Cell(70,8,'Actual Accomplishments',1,0,'C',1);
		$pdf->Cell(50,4,'Ratings',1,0,'C',1);
		$pdf->Cell(55,8,'Remarks',1,0,'C',1);
		$pdf->Cell(0,4,'',0,1);
		$pdf->Cell(200,4,'',0,0);
		$pdf->Cell(12.4,4,'Q1',1,0,'C',1);
		$pdf->Cell(12.4,4,'E2',1,0,'C',1);
		$pdf->Cell(12.4,4,'T3',1,0,'C',1);
		$pdf->Cell(12.6,4,'A4',1,1,'C',1);
		//Strategic priority
		//$pdf->Cell(1);
		$pdf->SetFillColor(83, 207, 214);
		//$pdf->Rect(0, 0, 210, 297, 'F');
		$pdf->Cell(305,6,'Support Function:',1,0,'L',1);
		$pdf->Cell(0,6,'',0,1,'L');
		$pdf->SetFont('Arial','',8);
		$pdf->SetWidths(array(60,70,70,12.4,12.4,12.4,12.6,55));
		$pdf->SetLineHeight(7);
		foreach($infosf as $itemsf) {
			$pdf->Row(array(
				strip_tags($itemsf['output']),
				strip_tags($itemsf['indicators']),
				strip_tags($itemsf['accomplishment']),
				$itemsf['rating_quality'],
				$itemsf['rating_efficiency'],
				$itemsf['rating_timeliness'],
				$itemsf['rating_average'],
				strip_tags($itemsf['remarks']),
			));
		}
		$pdf->Ln(0);


//$pdf->AliasNbPages();
$pdf->Output();
?>