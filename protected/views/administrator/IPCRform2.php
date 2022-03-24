<?php

require('fpdf.php');
//sample

//$pdf->SetFont('Times','B',12);
//$pdf->Cell(90,10,'This is PDF Demo By Joshua',1);


class myPDF extends FPDF
{
	function header()
	{
		//Logo
		$this->Image('accpictures/logo.png',10,6,20);
		$this->SetFont('Arial','',10);
    	// Move to the right
    	$this->Cell(30);
    	// Title
    	$this->Cell(30,6,'Republic of the Philippines',0,0,'C');
    	$this->SetFont('Times','',12);
    	$this->Cell(26,15,'POLYTECHNIC UNIVERSITY OF THE PHILIPPINES',0,0,'C');
    	$this->SetFont('Times','',10.8);
    	$this->Cell(-54,22,'Gen. Santos Ave. Upper Bicutan, Taguig City',0,0,'C');
    // Line break
    	$this->Ln(0);
	}
	function footer()
	{
		$this->SetY(-15);
		$this->SetFont('Arial','',8);
		$this->Cell(1,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
	function Title()
	{
		$this->SetFont('Arial','B',12);
		$this->Cell(315,40,'INDIVIDUAL PERFORMANCE COMMITMENT AND REVIEW (IPCR)',0,1,'C');
	}
	function intro()
	{
		session_start();
		include('getPersonalInformation.php');
		$this->SetY(30);
		$this->SetFont('Arial','',10.5);
		$this->Cell(325,10,'I, '.$firstname." ".$middlename." ".$surname.' of the PUP TAGUIG CITY BRANCH commit to deliver and agree to be rated on the attainment of the following targets in accordance with the indicated ',0,1,'C');
		$this->Cell(120,-2,'measures for the period JULY to DECEMBER, 2021.',0,0,'C');
		$this->Ln(0);
	}

	function approval()
	{
		//$this->
	}

	function Table()
	{
		//Normal Row
		$this->SetY(70);
		$this->Cell(1);
		$this->SetFont('Arial','B',8);
		$this->SetFillColor(212,214,254);
		$this->Cell(60,8,'Output',1,0,'C');
		$this->Cell(70,8,'Success Indicators',1,0,'C');
		$this->Cell(70,8,'Actual Accomplishments',1,0,'C');
		$this->Cell(50,4,'Ratings',1,0,'C');
		$this->Cell(55,8,'Remarks',1,0,'C');
		$this->Cell(0,4,'',0,1);
		
		//Second Line Row
		$this->Cell(201,4,'',0,0);
		$this->Cell(12.4,4,'Q1',1,0,'C');
		$this->Cell(12.4,4,'E2',1,0,'C');
		$this->Cell(12.4,4,'T3',1,0,'C');
		$this->Cell(12.6,4,'A4',1,1,'C');

		//Strategic priority
		$this->Cell(1);
		$this->SetFillColor(211,211,211);
		$this->Cell(305,6,'Strategic Priority:',1,0,'L');
		$this->Cell(0,5,'',0,1,'L');

		//improve....
		$this->Cell(1);
		$this->SetY(84.2);
		$this->SetX(11);
		$this->SetFont('Arial','',7);
		$this->Cell(305,4,'Improved quality of services of the sector through:',1,0,'L');
		$this->Cell(0,5,'',0,1,'L');
/*
		$this->SetY(88.3);
		$this->Cell(1);
		$this->Cell(60,8,'',1,0,'C');
		$this->Cell(70,8,'',1,0,'C');
		$this->Cell(70,8,'',1,0,'C');
		$this->Cell(12.4,8,'',1,0,'C');
		$this->Cell(12.4,8,'',1,0,'C');
		$this->Cell(12.4,8,'',1,0,'C');
		$this->Cell(12.6,8,'',1,0,'C');
		$this->Cell(55,8,'',1,0,'C');
		$this->Cell(0,4,'',0,1);
		$this->SetY(96.3);
		$this->Cell(1);
		$this->Cell(60,8,'Output',1,0,'C');
		$this->Cell(70,8,'Success Indicators',1,0,'C');
		$this->Cell(70,8,'Actual Accomplishments',1,0,'C');
		$this->Cell(50,4,'Ratings',1,0,'C');
		$this->Cell(55,8,'Remarks',1,0,'C');
		$this->Cell(0,4,'',0,0);
		$this->Cell(60,8,'Output',1,0,'C');
		$this->Cell(70,8,'Success Indicators',1,0,'C');
		$this->Cell(70,8,'Actual Accomplishments',1,0,'C');
		$this->Cell(50,4,'Ratings',1,0,'C');
		$this->Cell(55,8,'Remarks',1,0,'C');
		$this->Cell(0,4,'',0,0);
		$this->Cell(60,8,'Output',1,0,'C');
		$this->Cell(70,8,'Success Indicators',1,0,'C');
		$this->Cell(70,8,'Actual Accomplishments',1,0,'C');
		$this->Cell(50,4,'Ratings',1,0,'C');
		$this->Cell(55,8,'Remarks',1,0,'C');
		$this->Cell(0,4,'',0,0);
		$this->Cell(60,8,'Output',1,0,'C');
		$this->Cell(70,8,'Success Indicators',1,0,'C');
		$this->Cell(70,8,'Actual Accomplishments',1,0,'C');
		$this->Cell(50,4,'Ratings',1,0,'C');
		$this->Cell(55,8,'Remarks',1,0,'C');
		$this->Cell(0,4,'',0,0);
		$this->Cell(60,8,'Output',1,0,'C');
		$this->Cell(70,8,'Success Indicators',1,0,'C');
		$this->Cell(70,8,'Actual Accomplishments',1,0,'C');
		$this->Cell(50,4,'Ratings',1,0,'C');
		$this->Cell(55,8,'Remarks',1,0,'C');
		$this->Cell(0,4,'',0,0);
		$this->Cell(60,8,'Output',1,0,'C');
		$this->Cell(70,8,'Success Indicators',1,0,'C');
		$this->Cell(70,8,'Actual Accomplishments',1,0,'C');
		$this->Cell(50,4,'Ratings',1,0,'C');
		$this->Cell(55,8,'Remarks',1,0,'C');
		$this->Cell(0,4,'',0,1); */
	}
	
	
}

$pdf=new myPDF('L','mm',array(330,210));
$pdf->Addpage();

$pdf->AliasNbPages();
$pdf->Title();
$pdf->intro();
$pdf->Table();
$pdf->SetAutoPageBreak(false);
$pdf->Output();
?>