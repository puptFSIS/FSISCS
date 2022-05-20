<?php 
	//include('pdf_mc_table.php');
	session_start();
	include('config.php');
	require('fpdf184/fpdf.php');
 

class PDF extends FPDF
{
	function header()
	{
		$this->Image('accpictures/logo.png',10,6,20);
		$this->SetFont('Arial','',10);
    	// Title
    	$this->SetX(40);
    	$this->Cell(30,6,'Republic of the Philippines',0,0,'C');
    	$this->SetFont('Times','',12);
    	$this->SetXY(70,9.8);
    	$this->Cell(64,14,'POLYTECHNIC UNIVERSITY OF THE PHILIPPINES - TAGUIG BRANCH',0,0,'C');
    	$this->SetFont('Times','',10.8);
    	$this->SetXY(114,10);
    	$this->Cell(-90,22,'Gen. Santos Ave. Upper Bicutan, Taguig City',0,0,'C');
    	$this->Ln(20);
	}

	function footer()
	{
		$this->SetY(-15);
		$this->Cell(0,10,'Page '.$this->PageNo().' of {nb}' . $this->AliasNbPages(),0,0,'R');
		$this->Ln();
	}

	function title()
	{
		if(isset($_GET['ye'])) {
			$ye = $_GET['ye'];
		}
		include('getPersonalInformation.php');
		$this->SetY(10);
		$this->SetFont('Arial','B',12);
		$this->Cell(300,40,'INDIVIDUAL PERFORMANCE COMMITMENT AND REVIEW (IPCR)',0,1,'C');
		//Intro
		//include('getPersonalInformation.php');
		$this->SetY(30);
		$this->SetFont('Arial','',10.5);
		$this->Cell(310,10,'I, '.$firstname." ".$middlename." ".$surname.' of the PUP TAGUIG CITY BRANCH commit to deliver and agree to be rated on the attainment of the following targets in accordance with the indicated ',0,1,'C');
		$this->Cell(120,-2,'measures for the period - JULY TO DECEMBER, '.$ye.'.',0,0,'C');
		$this->Ln(20);
	}

	// function namesignature()
	// {
	// 	$this->SetXY(20,-350);
	// 	$this->Cell(20,0,'',1,1,'L',1);
	// 	$this->Ln();
	// }

	function reviewbypart()
	{
		$this->SetFont('Arial','B');
		$this->SetX(40);
		$this->SetFillColor(211,211,211);
		$this->Cell(245,5,'',1,1,'L',1); //Small Gray Long bar
		$this->SetX(40);
		$this->Cell(245,22.5,'',1,1,'C'); //Big White Long bar
		$this->SetXY(40,60);
		//Left Side
		$this->Cell(90,27.5,'',1,1,'C');
		$this->SetXY(40,60);
		$this->SetFont('Arial','B',8);
		$this->Cell(90,5,'Reviewed by:',1,1,'L');
		$this->SetXY(40,82.5);
		$this->SetFont('Arial','B',8);
		$this->Cell(90,5,'Immediate Supervisor',1,1,'C');
		$this->SetXY(130,60);
		$this->Cell(32,5,'Date',1,1,'C');
		$this->SetXY(162,60);
		// Right Side
		$this->Cell(90,27.5,'',1,1,'C');
		$this->SetXY(162,60);
		$this->SetFont('Arial','B',8);
		$this->Cell(90,5,'Approved by:',1,1,'L');
		$this->SetXY(162,82.5);
		$this->SetFont('Arial','B',8);
		$this->Cell(90,5,'Head of Office',1,1,'C');
		$this->SetXY(252,60);
		$this->SetFont('Arial','B',8);
		$this->Cell(33,5,'Date',1,1,'C');
		$this->Ln(4);
	}

	

	function tables($infosp,$infocf,$infosf)
	{

		$this->SetY(90);
		//$pdf->Cell(1);
		$this->SetFont('Arial','B',8);
		$this->SetFillColor(211,211,211);
		$this->Cell(60,8,'Output',1,0,'C',1);
		$this->Cell(70,8,'Success Indicators',1,0,'C',1);
		$this->Cell(70,8,'Actual Accomplishments',1,0,'C',1);
		$this->Cell(50,4,'Ratings',1,0,'C',1);
		$this->Cell(55,8,'Remarks',1,0,'C',1);
		$this->Cell(0,4,'',0,1);
		$this->Cell(200,4,'',0,0);
		$this->Cell(12.4,4,'Q1',1,0,'C',1);
		$this->Cell(12.4,4,'E2',1,0,'C',1);
		$this->Cell(12.4,4,'T3',1,0,'C',1);
		$this->Cell(12.6,4,'A4',1,1,'C',1);
		//Strategic priority
		//$pdf->Cell(1);
		$this->SetFillColor(83, 207, 214);
		//$pdf->Rect(0, 0, 210, 297, 'F');
		$this->Cell(305,6,'Strategic Priority:',1,0,'L',1);
		$this->Ln(6);
		//$this->Cell(0,6,'',0,1,'');
		$this->SetFont('Arial','',8);
		$this->SetWidths(array(60,70,70,12.4,12.4,12.4,12.6,55));
		$this->SetLineHeight(7);
		
		foreach($infosp as $item) {
			$this->Row(array(
				$item['output'],
				$item['indicators'],
				$item['accomplishment'],
				$item['rating_quality'],
				$item['rating_efficiency'],
				$item['rating_timeliness'],
				$item['rating_average'],
				$item['remarks'],
			));
		}
		$this->Ln(5);
		$this->SetFont('Arial','B',8);
		$this->SetFillColor(211,211,211);
		$this->Cell(60,8,'Output',1,0,'C',1);
		$this->Cell(70,8,'Success Indicators',1,0,'C',1);
		$this->Cell(70,8,'Actual Accomplishments',1,0,'C',1);
		$this->Cell(50,4,'Ratings',1,0,'C',1);
		$this->Cell(55,8,'Remarks',1,0,'C',1);
		$this->Cell(0,4,'',0,1);
		$this->Cell(200,4,'',0,0);
		$this->Cell(12.4,4,'Q1',1,0,'C',1);
		$this->Cell(12.4,4,'E2',1,0,'C',1);
		$this->Cell(12.4,4,'T3',1,0,'C',1);
		$this->Cell(12.6,4,'A4',1,1,'C',1);
		//Strategic priority
		//$pdf->Cell(1);
		$this->SetFillColor(83, 207, 214);
		//$pdf->Rect(0, 0, 210, 297, 'F');
		$this->Cell(305,6,'Core Function:',1,0,'L',1);
		//$this->Cell(0,6,'',0,1,'L');
		$this->Ln(6);
		$this->SetFont('Arial','',8);
		$this->SetWidths(array(60,70,70,12.4,12.4,12.4,12.6,55));
		$this->SetLineHeight(7);
		foreach($infocf as $itemcf) {
			$this->Row(array(
				$itemcf['output'],
				$itemcf['indicators'],
				$itemcf['accomplishment'],
				$itemcf['rating_quality'],
				$itemcf['rating_efficiency'],
				$itemcf['rating_timeliness'],
				$itemcf['rating_average'],
				$itemcf['remarks'],
			));
		}
		$this->Ln(5);

		$this->SetFont('Arial','B',8);
		$this->SetFillColor(211,211,211);
		$this->Cell(60,8,'Output',1,0,'C',1);
		$this->Cell(70,8,'Success Indicators',1,0,'C',1);
		$this->Cell(70,8,'Actual Accomplishments',1,0,'C',1);
		$this->Cell(50,4,'Ratings',1,0,'C',1);
		$this->Cell(55,8,'Remarks',1,0,'C',1);
		$this->Cell(0,4,'',0,1);
		$this->Cell(200,4,'',0,0);
		$this->Cell(12.4,4,'Q1',1,0,'C',1);
		$this->Cell(12.4,4,'E2',1,0,'C',1);
		$this->Cell(12.4,4,'T3',1,0,'C',1);
		$this->Cell(12.6,4,'A4',1,1,'C',1);
		//Strategic priority
		//$pdf->Cell(1);
		$this->SetFillColor(83, 207, 214);
		//$pdf->Rect(0, 0, 210, 297, 'F');
		$this->Cell(305,6,'Support Function:',1,0,'L',1);
		//$this->Cell(0,6,'',0,1,'L');
		$this->Ln(6);
		$this->SetFont('Arial','',8);
		$this->SetWidths(array(60,70,70,12.4,12.4,12.4,12.6,55));
		$this->SetLineHeight(7);
		foreach($infosf as $itemsf) {
			// $WriteHTML = $pdf->WriteHTML()
			$this->Row(array(
				$itemsf['output'],
				$itemsf['indicators'],
				$itemsf['accomplishment'],
				$itemsf['rating_quality'],
				$itemsf['rating_efficiency'],
				$itemsf['rating_timeliness'],
				$itemsf['rating_average'],
				$itemsf['remarks'],
			));
		}
		$this->Ln(0);
	}

	function FinalRatingAverage()
	{
		$this->SetWidths(array(60,70,70,12.4,12.4,12.4,12.6,55));
		$this->SetFont('Arial','B',8);
		$this->Row(array('Final Average Rating','','','','','','',''));
		// $this->SetLineWidth(0);
		$this->Ln(4);
	}

	function comments()
	{
		$this->SetFont('Arial','B');
		$this->SetFillColor(211,211,211);
		$this->Cell(305,5,'Comments and Recommendations for Development Purposes',1,1,'L',1);
		$this->Cell(305,15,'',1,1,'C');
		$this->Ln(4);
	}

	function sign()
	{
		$this->SetX(40);
		$this->Cell(245,30,"",0,0,'L');
		$this->SetXY($this->GetX() - 570, $this->GetY() - 0);
		$this->Cell(245,5,'',1,0,'L',1); //Small box Gray

		$this->SetX(40);
		$this->Cell(245,30,"",0,0,'L');
		$this->SetXY($this->GetX() - 570, $this->GetY() - 0);
		$this->Cell(245,30,'',1,0,'C'); //Main Box

		$this->SetX(40);
		$this->Cell(245,30,"",0,0,'L');
		$this->SetXY($this->GetX() - 570,$this->GetY()- 0);
		$this->Cell(55,30,'',1,0,'C');

		$this->SetX(40);
		$this->Cell(245,30,"",0,0,'L');
		$this->SetXY($this->GetX() - 570, $this->GetY() - 0);
		$this->Cell(55,5,'Discussed With',1,0,'C');

		$this->SetX(40);
		$this->Cell(245,30,"",0,0,'L');
		$this->SetXY($this->GetX() - 570, $this->GetY() - -25);
		$this->Cell(55,5,'Faculty Member',1,0,'C');
		$this->Ln(-25);

		$this->SetX(40);
		$this->Cell(245,30,"",1,0,'L');
		$this->SetXY($this->GetX() - 515, $this->GetY() - 0);
		$this->Cell(28,5,'Date',1,0,'C');

		$this->SetX(40);
		$this->Cell(245,30,"",1,0,'L');
		$this->SetXY($this->GetX() - 487, $this->GetY() - 0);
		$this->Cell(55,30,'',1,0,'C');

		$this->SetX(40);
		$this->Cell(245,30,"",1,0,'L');
		$this->SetXY($this->GetX() - 487, $this->GetY() - 0);
		$this->Cell(55,5,'Assessed by',1,0,'C');

		$this->SetX(40);
		$this->Cell(245,30,"",0,0,'L');
		$this->SetXY($this->GetX() - 487, $this->GetY() - -25);
		$this->Cell(55,5,'Supervisor',1,0,'C');
		$this->Ln(-25);

		$this->SetX(40);
		$this->Cell(245,30,"",1,0,'L');
		$this->SetXY($this->GetX() - 432, $this->GetY() - 0);
		$this->Cell(28,5,'Date',1,0,'C');

		$this->SetX(40);
		$this->Cell(245,30,"",0,0,'L');
		$this->SetXY($this->GetX() - 404, $this->GetY() - 0);
		$this->Cell(55,30,'',1,0,'C');

		$this->SetX(40);
		$this->Cell(245,30,"",1,0,'L');
		$this->SetXY($this->GetX() - 404, $this->GetY() - 0);
		$this->Cell(55,5,'Final Rating by',1,0,'C');

		$this->SetX(40);
		$this->Cell(245,30,"",0,0,'L');
		$this->SetXY($this->GetX() - 404, $this->GetY() - -25);
		$this->Cell(55,5,'Head of Office',1,0,'C');
		$this->Ln(-25);

		$this->SetX(40);
		$this->Cell(245,30,"",1,0,'L');
		$this->SetXY($this->GetX() - 349, $this->GetY() - 0);
		$this->Cell(24,5,'Date',1,0,'C');
	}
	
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf = new PDF('L','mm',array(325,210));
$pdf->AddPage();
$pdf->title();
$pdf->reviewbypart();

$pdf->tables($infosp,$infocf,$infosf);
$pdf->FinalRatingAverage();
$pdf->comments();
$pdf->sign();

//$pdf->namesignature();
if(isset($_GET['fname'],$_GET['mname'],$_GET['sname'],$_GET['ye'])) {
			$firstname = $_GET['fname'];
			$middlename = $_GET['mname'];
			$surname = $_GET['sname'];
			$ye = $_GET['ye'];
		}
$pdf->Output('I');
?>