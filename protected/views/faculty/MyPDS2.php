<?php
require('fpdf.php');
class PDF extends FPDF
{
	function Header()
	{
		$this->SetLineWidth(0.75);
		$this->SetY(15);
		$this->SetX(12);
		$this->Cell(190,295,'',1,0,'C');
		$this->AddFont('ariblk','','ariblk.php');
		$this->AddFont('ARIALN','','ARIALN.php');
		$this->AddFont('ARIALNI','','ARIALNI.php');
		$this->AddFont('ARIALNBI','','ARIALNBI.php');
		$this->SetFont('ARIALN','',7.5);
		session_start();
		$EmpID= "";
		if(isset($_SESSION['CEmpID'])) {
			$EmpID = $_SESSION['CEmpID'];
		} else {
			die(header("Location: index.php?r=site/index"));
		}
	}
	function Footer()
	{
		
	}
	
	function CSE()
	{
		$t = true;
		$T = true;
		$f = false;
		$F = false;
		
		$this->SetY(16);
		$this->SetX(12);
		$this->title();
		$this->Cell(190,6,'IV. CIVIL SERVICE ELIGIBILITY',1,0,'L', $t);
		
		$this->SetY(102);
		$this->SetX(12);
		$this->title();
		$this->Cell(190,6,'V. WORK EXPERIENCE (Include private employment. Start from your current work)',1,0,'L', $t);
		
		// CAREER SERVICE/ (RA1080 BOARD/ BAR)/ UNDER SPECIAL LAW/ CES/ CSEE
		$this->labelF();
		$this->SetY(22.20);
		$this->SetX(12.25);
		$this->Cell(58,3.75,'29.',"LTR",0,'L', $t);
		$this->labelF();
		$this->SetY(25.95);
		$this->SetX(12.25);
		$this->Cell(58,3,'CAREER SERVICE/ RA 1080 (BOARD/ BAR)',"LR",0,'C', $t);
		$this->labelF();
		$this->SetY(28.95);
		$this->SetX(12.25);
		$this->Cell(58,3,'UNDER SPECIAL LAWS/ CES/ CSEE',"LR",0,'C', $t);
		$this->labelF();
		$this->SetY(31.95);
		$this->SetX(12.25);
		$this->Cell(58,3.25,'',"LBR",0,'L', $t);
		
		// RATING
		$this->labelF();
		$this->SetY(22.20);
		$this->SetX(70.25);
		$this->Cell(18,13,'RATING',1,0,'C', $t);

		// DATE OF EXAMINATION CONFERMENT
		$this->labelF();
		$this->SetY(22.20);
		$this->SetX(88.25);
		$this->Cell(18,2,'',"LTR",0,'C', $t);
		$this->labelF();
		$this->SetY(24.20);
		$this->SetX(88.25);
		$this->Cell(18,3,'DATE OF',"LR",0,'C', $t);
		$this->labelF();
		$this->SetY(27.20);
		$this->SetX(88.25);
		$this->Cell(18,3,'EXAMINATION',"LR",0,'C', $t);
		$this->labelF();
		$this->SetY(30.20);
		$this->SetX(88.25);
		$this->Cell(18,3,'CONFERMENT',"LR",0,'C', $t);
		$this->labelF();
		$this->SetY(33.20);
		$this->SetX(88.25);
		$this->Cell(18,2,'',"LBR",0,'C', $t);
		
		// PLACE OF EXAMINATION / CONFERMENT
		$this->labelF();
		$this->SetY(22.20);
		$this->SetX(106.25);
		$this->Cell(63,13,'PLACE OF EXAMINATION / CONFERMENT',1,0,'C', $t);
		
		// PLACE OF EXAMINATION / CONFERMENT
		$this->labelF();
		$this->SetY(22.20);
		$this->SetX(169.25);
		$this->Cell(32.5,5,'LICENSE (if applicable)',1,0,'C', $t);
		$this->labelF();
		$this->SetY(27.20);
		$this->SetX(169.25);
		$this->Cell(17.5,8,'NUMBER',1,0,'C', $t);
		$this->labelF();
		$this->SetY(27.20);
		$this->SetX(186.75);
		$this->Cell(15,5,'DATE OF',"LTR",0,'C', $t);
		$this->labelF();
		$this->SetY(31.20);
		$this->SetX(186.75);
		$this->Cell(15,3,'RELEASE',"LR",0,'C', $t);
		$this->labelF();
		$this->SetY(34.20);
		$this->SetX(186.75);
		$this->Cell(15,1,'',"LBR",0,'C', $t);
		
		$this->SetY(35.20);
		$this->SetX(12);
		// CIVIL SERVICE EXAMINATION DATA
		include("getCSE.php");
		$w = array(58.25,18,18,63,17.5,15);
		for ($ctr=0; $ctr<7; $ctr++) {
			$this->labelF();
			$this->Cell($w[0], 9, '  ' . strtoupper($cse[$ctr]), 1, 0, 'L', $f);
			$this->Cell($w[1], 9, $rating[$ctr], 1, 0, 'C', $f);
			if($fm[$ctr]=="  " or $fm=="") {
				$this->Cell($w[2], 9,'', 1, 0, 'C', $f);
			} else {
				$this->Cell($w[2], 9, $fm[$ctr] . "/" . $fd[$ctr] . "/" . $fy[$ctr], 1, 0, 'C', $f);
			}
			$this->Cell($w[3], 9, '  ' . $pexam[$ctr], 1, 0, 'L', $f);
			if($lno[$ctr]=="N/A" or $lno[$ctr]=="n/a") {
				$this->Cell($w[4], 9, '', 1, 0, 'C', $f);
			} else {
				$this->Cell($w[4], 9, strtoupper($lno[$ctr]), 1, 0, 'C', $f);
			}
			
			if($fm[$ctr]=="  " or $fm=="") {
				$this->Cell($w[5], 9,'', 1, 0, 'C', $f);
			} else {
				if($lno[$ctr]=="N/A" or $lno[$ctr]=="n/a") {
					$this->Cell($w[5], 9,'', 1, 0, 'C', $f);
				} else {
					$this->Cell($w[5], 9, $tom[$ctr] . "/" . $td[$ctr] . "/" . $fy[$ctr], 1, 0, 'C', $f);
				}
			}
			
			$this->Ln();
			$this->SetX(12);
		}
		
		//CONTINUE
		$this->conti();
	}
	function WorkExperience()
	{
		$t = true;
		$T = true;
		$f = false;
		$F = false;
		
		// INCLUSIVE DATES 
		$this->labelF();
		$this->SetY(108.20);
		$this->SetX(12.25);
		$this->Cell(35,2,'',"LTR",0,'L', $t);
		$this->labelF();
		$this->SetY(110.20);
		$this->SetX(12.25);
		$this->Cell(35,3,'30.          INCLUSIVE DATES',"LR",0,'L', $t);
		$this->labelF();
		$this->SetY(113.20);
		$this->SetX(12.25);
		$this->Cell(35,3,'                    (mm/dd/yyyy)',"LR",0,'L', $t);
		$this->labelF();
		$this->SetY(116.20);
		$this->SetX(12.25);
		$this->Cell(35,2,'',"LBR",0,'L', $t);	
		$this->labelF();
		$this->SetY(118.20);
		$this->SetX(12.25);
		$this->Cell(17.5,5,'From',1,0,'C', $t);
		$this->labelF();
		$this->SetY(118.20);
		$this->SetX(29.75);
		$this->Cell(17.5,5,'To',1,0,'C', $t);
		
		// POSITION TITLE
		$this->labelF();
		$this->SetY(108.20);
		$this->SetX(47.25);
		$this->Cell(42,4.5,'',"LTR",0,'C', $t);
		$this->labelF();
		$this->SetY(112.70);
		$this->SetX(47.25);
		$this->Cell(42,3,'POSITION TITLE',"LR",0,'C', $t);
		$this->labelF();
		$this->SetY(115.70);
		$this->SetX(47.25);
		$this->Cell(42,3,'(Write in full)',"LR",0,'C', $t);
		$this->labelF();
		$this->SetY(118.70);
		$this->SetX(47.25);
		$this->Cell(42,4.5,'',"LBR",0,'C', $t);
		
		// DEPARTMENT / AGENCY / OFFICE / COMPANY
		$this->labelF();
		$this->SetY(108.20);
		$this->SetX(89.25);
		$this->Cell(51,4.5,'',"LTR",0,'C', $t);
		$this->labelF();
		$this->SetY(112.70);
		$this->SetX(89.25);
		$this->Cell(51,3,'DEPARTMENT / AGENCY / OFFICE / COMPANY',"LR",0,'C', $t);
		$this->labelF();
		$this->SetY(115.70);
		$this->SetX(89.25);
		$this->Cell(51,3,'(Write in full)',"LR",0,'C', $t);
		$this->labelF();
		$this->SetY(118.70);
		$this->SetX(89.25);
		$this->Cell(51,4.5,'',"LBR",0,'C', $t);
		
		// MONTHLY SALARY
		$this->labelF();
		$this->SetY(108.20);
		$this->SetX(140.25);
		$this->Cell(16,4.5,'',"LTR",0,'C', $t);
		$this->labelF();
		$this->SetY(112.70);
		$this->SetX(140.25);
		$this->Cell(16,3,'MONTHLY',"LR",0,'C', $t);
		$this->labelF();
		$this->SetY(115.70);
		$this->SetX(140.25);
		$this->Cell(16,3,'SALARY',"LR",0,'C', $t);
		$this->labelF();
		$this->SetY(118.70);
		$this->SetX(140.25);
		$this->Cell(16,4.5,'',"LBR",0,'C', $t);
		
		// SALARY GRADE
		$this->labelF();
		$this->SetFont('ARIALNI','',6);
		$this->SetY(108.20);
		$this->SetX(156.25);
		$this->Cell(14,2.5,'',"LTR",0,'C', $t);
		$this->labelF();
		$this->SetFont('ARIALN','',5);
		$this->SetY(110.70);
		$this->SetX(156.25);
		$this->Cell(14,2.5,'SALARY GRADE',"LR",0,'C', $t);
		$this->labelF();
		$this->SetFont('ARIALN','',5);
		$this->SetY(113.20);
		$this->SetX(156.25);
		$this->Cell(14,2.5,'& STEP',"LR",0,'C', $t);
		$this->labelF();
		$this->SetFont('ARIALN','',5);
		$this->SetY(115.70);
		$this->SetX(156.25);
		$this->Cell(14,2.5,'INCREMENT',"LR",0,'C', $t);
		$this->labelF();
		$this->SetFont('ARIALN','',5);
		$this->SetY(118.20);
		$this->SetX(156.25);
		$this->Cell(14,2.5,'(Format *00-0*)',"LR",0,'C', $t);
		$this->labelF();
		$this->SetFont('ARIALN','',5);
		$this->SetY(120.20);
		$this->SetX(156.25);
		$this->Cell(14,3,'',"LBR",0,'C', $t);
		
		// STATUS OF APPOINTMENT
		$this->labelF();
		$this->SetY(108.20);
		$this->SetX(170.25);
		$this->Cell(17,4.5,'',"LTR",0,'C', $t);
		$this->labelF();
		$this->SetY(112.70);
		$this->SetX(170.25);
		$this->SetFont('ARIALN','',7);
		$this->Cell(17,3,'STATUS OF',"LR",0,'C', $t);
		$this->labelF();
		$this->SetY(115.70);
		$this->SetX(170.25);
		$this->SetFont('ARIALN','',7);
		$this->Cell(17,3,'APPOINTMENT',"LR",0,'C', $t);
		$this->labelF();
		$this->SetY(118.70);
		$this->SetX(170.25);
		$this->Cell(17,4.5,'',"LBR",0,'C', $t);
		
		// GOV'T SERVICE (Yes / No)
		$this->labelF();
		$this->SetY(108.20);
		$this->SetX(187.25);
		$this->Cell(14.5,3,'',"LTR",0,'C', $t);
		$this->labelF();
		$this->SetY(111.20);
		$this->SetX(187.25);
		$this->Cell(14.5,3,'GOV\'T',"LR",0,'C', $t);
		$this->labelF();
		$this->SetY(114.20);
		$this->SetX(187.25);
		$this->Cell(14.5,3,'SERVICE',"LR",0,'C', $t);
		$this->labelF();
		$this->SetY(117.20);
		$this->SetX(187.25);
		$this->Cell(14.5,3,'(Yes / No)',"LR",0,'C', $t);
		$this->labelF();
		$this->SetY(120.20);
		$this->SetX(187.25);
		$this->Cell(14.5,3,'',"LBR",0,'C', $t);
		
		$this->labelF();
		$this->SetY(123.20);
		include("getWorkExp.php");
		$w = array(17.5,17.5,42,51,16,14,17,15);
		for($ctr=0; $ctr<21; $ctr++) {
			$this->SetX(12.25);
			$this->Cell($w[0],8.5,'',1,0,'C',$f);
			$this->Cell($w[0],8.5,'',1,0,'C',$f);
			$this->Cell($w[2],8.5,'',1,0,'C',$f);
			$this->Cell($w[3],8.5,'',1,0,'C',$f);
			$this->Cell($w[4],8.5,'',1,0,'C',$f);
			$this->Cell($w[5],8.5,'',1,0,'C',$f);
			$this->Cell($w[6],8.5,'',1,0,'C',$f);
			$this->Cell($w[7],8.5,'',1,0,'C',$f);
			$this->Ln();
		}
		
		$this->SetY(123.20);
		include("getWorkExp.php");
		$w = array(17.5,17.5,42,51,16,14,17,15);
		for($ctr=0; $ctr<21; $ctr++) {
			$this->SetX(12.25);

			if($fm[$ctr]=="  " or $fm[$ctr]=="" or $fm[$ctr]=="00") {
				$this->Cell($w[0],8.5,'  /         /  ',1,0,'C',$f);
			} else {
				$this->Cell($w[0],8.5,$fm[$ctr] . '/' . $fd[$ctr] . '/' . $fy[$ctr],1,0,'C',$f);
			}
			if($tom[$ctr]=="  " or $tom[$ctr]=="" or $tom[$ctr]=="00") {
				$this->Cell($w[0],8.5,'  /         /  ',1,0,'C',$f);
			} else if($ty[$ctr]=="Present") {
				$this->Cell($w[0],8.5,'PRESENT',1,0,'C',$f);
			} else {
				$this->Cell($w[0],8.5,$tom[$ctr] . '/' . $td[$ctr] . '/' . $ty[$ctr],1,0,'C',$f);
			}
			$this->Cell($w[2],8.5,$title[$ctr],0,0,'C',$f);
			if(strlen($company[$ctr])<=50){
			$this->SetFont('ARIALN','',7.5);
			$this->Cell($w[3],8.5,$company[$ctr],1,0,'C',$f);
			}else if(strlen($company[$ctr])>50 and strlen($company[$ctr])<=60){
			$this->SetFont('ARIALN','',6.5);
			$this->Cell($w[3],8.5,$company[$ctr],1,0,'C',$f);
			}else{
			$this->SetFont('ARIALN','',6);
			$this->Cell($w[3],8.5,$company[$ctr],1,0,'C',$f);
			}
			$this->Cell($w[4],8.5,$msalary[$ctr],1,0,'C',$f);
			$this->Cell($w[5],8.5,$sgsi[$ctr],1,0,'C',$f);
			$this->Cell($w[6],8.5,$apstat[$ctr],1,0,'C',$f);
			$this->Cell($w[7],8.5,$govtsvce[$ctr],1,0,'C',$f);
			$this->Ln();
		}
		
		$this->SetX(12.0);
		$this->conti();
		$this->Ln();
		$this->SetLineWidth(0.5);
		$this->SetFont('ARIALN','',7.5);
		$this->SetX(12.0);
		$this->SetTextColor(0);
		$this->Cell(190, 4, 'CS FORM 212 (Revised 2005), Page 2 of 4', 1, 0,'R', false);
	}
	function pageTwo() 
	{
		$this->CSE();
		$this->WorkExperience();
	}
	function conti()
	{
		$this->SetLineWidth(0.5);
		$this->SetFont('ARIALNI','',8);
		$this->SetTextColor(237,28,36);
		$this->Cell(190, 4, '(Continue on separate sheet if necessary)', 1, 0,'C', true);
	}
	function title() 
	{
		$this->SetLineWidth(0.5);
		$this->SetFillColor(151,151,151);
		$this->SetTextColor(255);
		$this->SetFont('ARIALNBI','',10.5);
	}
	
	function labelF() 
	{
		$this->SetLineWidth(0.25);
		$this->SetFont('ARIALN','',7.5);
		$this->SetFillColor(235,235,235);
		$this->SetTextColor(0);
	}

}		
	require('makefont/makefont.php');
	//MakeFont('font/ARIALNBI.ttf','cp1252');
	$pdf = new PDF('P','mm','Legal');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('ARIALN','',9);
	$pdf->SetAutoPageBreak(false);
	$pdf->PageTwo();
	$pdf->Output();
?>