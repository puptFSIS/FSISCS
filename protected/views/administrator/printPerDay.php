<?php
require('fpdf.php');
include("config.php");

$page = 1;

class PDF extends FPDF
{
	function Header()
	{
		//$this->Image('PUP Taguig.png',20,10,30);
		//$this->Image('centenniallogo.gif',165,10,30);
		$this->AddFont('segoeui','','segoeui.php');
		$this->AddFont('segoeuib','','segoeuib.php');
		$this->AddFont('segoeuil','','segoeuil.php');
		$this->AddFont('segoeuiz','','segoeuiz.php');
		$this->AddFont('segoeuii','','segoeuii.php');
		$this->AddFont('seguisb','','seguisb.php');
		$this->SetFont('segoeui','',11);
		$this->SetTextColor(0);

	}
	
	
	function Footer()
	{
    // Go to 1.5 cm from bottom
    $this->SetY(-15);
    // Select Arial italic 8
    $this->SetFont('seguisb','',8);
    // Print centered page number
    $this->Cell(0,10,'Prepared by:',0,0,'R');
	$this->SetFont('Arial','B',8);
	$this->Cell(0,10,'Dr. Yolanda F. Rabe',0,0,'R');
	$this->Ln(3);
	
	$this->SetFont('Arial','I',8);
	$this->Cell(0,10,'*For any concerns regarding with this schedule, please refer to the HAP Office.',0,0,'L');
	$this->SetFont('seguisb','',8);
	$this->Cell(0,10,'Head of Academic Programs',0,0,'R');
	
	
	$this->SetY(-10);
	$this->SetFont('Arial','I',8);
	$this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');

	}
	
	
	function SetCol($col)
	{
		// Set position at a given column
		$this->col = $col;
		$x = $col;
		$this->SetLeftMargin($x);
		$this->SetX($x);
	}

	function SetHeight($col)
	{
		// Set position at a given height
		$this->col = $col;
		$y = $col;
		//$this->SetTopMargin($y);
		$this->SetY($y);
	}	
	
	function table($cYear)
	{
		include("config.php");
		$csem = $_GET['sem'];
		$sy = $_GET['sy'];
		$sday = $_GET['sday'];
		
		$print_day = $sday;
		if($sday == 'M'){
		    $print_day = 'MONDAY';
		}
		else if($sday == 'T'){
		    $print_day = 'TUESDAY';
		}
		else if($sday == 'W'){
		    $print_day = 'WEDNESDAY';
		}
		else if($sday == 'TH'){
		    $print_day = 'THURSDAY';
		}
		else if($sday == 'F'){
		    $print_day = 'FRIDAY';
		}
		else if($sday == 'S'){
		    $print_day = 'SATURDAY';
		}
		
		$currentdate = date("m-d-Y");
        $this->Cell(0,0,'Printed on: '.$currentdate,0,0,'L');
        $this->Ln();
		$this->SetFont('segoeuib','',18);
		$this->Cell(0,3,'Subject Daily Schedule',0,0,'C');
		$this->Ln();
		$this->Ln();
		$this->SetFont('segoeuii','',11);
		if($csem == 1)
		{
			$this->Cell(0,3,'First Semester '. '(SY ' .$sy.')',0,0,'C');
		}else if($csem == 2)
		{
			$this->Cell(0,3,'Second Semester '. '(SY ' .$sy.')',0,0,'C');
		}else
		{
			$this->Cell(0,3,'Summer '. '(SY ' .$sy.')',0,0,'C');
		}
		$this->Ln(9);
		$this->SetFont('segoeuib','',9);
		$this->Ln(5);
		
		$this->Ln(5);
		$this->setX(10);
		$this->SetFont('seguisb','',9);
		$this->SetFillColor(210,210,210);
		$this->Cell(0,3,$print_day,0,0);
		$this->Ln(5);
		
        
		$this->SetFillColor(50,50,50);
		$this->SetTextColor(255,255,255);

        $this->Cell(37,8,'TIME',1,0,'',true);
    	$this->Cell(32,8,'COURSE',1,0,'',true);
	    $this->Cell(110,8,'SUBJECT',1,0,'',true);
	    $this->Cell(50,8,'PROFESSOR',1,0,'',true);
	    $this->Cell(22,8,'ROOM',1,0,'',true);
		$this->SetTextColor(1);
	    $this->Ln(7);
	    $sql1 = "SELECT * FROM tbl_internaschedule WHERE sprof!='ccis_admin'AND sem = '$csem' and schoolYear = '$sy' and (sday = '$sday' OR sday2 = '$sday') ORDER BY stimeS, stimeS2 ASC";
	    //WHERE sem = '$csem' and schoolYear = '$sy' and (sday = '$sday' OR sday2 = '$sday')
		$query1 = mysqli_query($conn,$sql1);

	    while($data = mysqli_fetch_array($query1))
	    {
	        $this->Cell(37,8,to12Hr($data['stimeS']).'-'.to12Hr($data['stimeE']),1,0);
	        $this->Cell(32,8,getCourse($data['courseID']).' '.$data['cyear'].'-'.$data['csection'],1,0);
	        $this->Cell(110,8,$data['stitle'],1,0);
	        $this->Cell(50,8,getName($data['sprof']),1,0);
	        $this->Cell(22,8,$data['sroom'],1,0);
	        $this->Ln(7);
	        
	    }
	}
}

	function getCourse($ccode) 
	{
		include("config.php");
		$sql = "SELECT * FROM tbl_course WHERE course ='$ccode'"; 
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		$code = $row['course_code'];
		return $code;
	}

	function getName($fcode)
	{
		include("config.php");
		$Name = "";
		$sql = "SELECT * FROM tbl_evaluationfaculty WHERE FCode = '$fcode'";
		$result = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_array($result)){
			$Name = $row['LName'] .', '. $row['FName'];
		}
		return $Name;
	}

	function to12Hr($ctime) 
	{
	$strTime = "";
	if($ctime==700) {
		$strTime = "07:00 AM";
	} else if($ctime==730) {
		$strTime = "07:30 AM";
	} else if($ctime==800) {
		$strTime = "08:00 AM";
	} else if($ctime==830) {
		$strTime = "08:30 AM";
	} else if($ctime==900) {
		$strTime = "09:00 AM";
	} else if($ctime==930) {
		$strTime = "09:30 AM";
	} else if($ctime==1000) {
		$strTime = "10:00 AM";
	} else if($ctime==1030) {
		$strTime = "10:30 AM";
	} else if($ctime==1100) {
		$strTime = "11:00 AM";
	} else if($ctime==1130) {
		$strTime = "11:30 AM";
	} else if($ctime==1200) {
		$strTime = "12:00 NN";
	} else if($ctime==1230) {
		$strTime = "12:30 NN";
	} else if($ctime==1300) {
		$strTime = "01:00 PM";
	} else if($ctime==1330) {
		$strTime = "01:30 PM";
	} else if($ctime==1400) {
		$strTime = "02:00 PM";
	} else if($ctime==1430) {
		$strTime = "02:30 PM";
	} else if($ctime==1500) {
		$strTime = "03:00 PM";
	} else if($ctime==1530) {
		$strTime = "03:30 PM";
	} else if($ctime==1600) {
		$strTime = "04:00 PM";
	} else if($ctime==1630) {
		$strTime = "04:30 PM";
	} else if($ctime==1700) {
		$strTime = "05:00 PM";
	} else if($ctime==1730) {
		$strTime = "05:30 PM";
	} else if($ctime==1800) {
		$strTime = "06:00 PM";
	} else if($ctime==1830) {
		$strTime = "06:30 PM";
	} else if($ctime==1900) {
		$strTime = "07:00 PM";
	} else if($ctime==1930) {
		$strTime = "07:30 PM";
	} else if($ctime==2000) {
		$strTime = "08:00 PM";
	} else if($ctime==2030) {
		$strTime = "08:30 PM";
	} else if($ctime==2100) {
		$strTime = "09:00 PM";
	} else if($ctime==2130) {
		$strTime = "09:30 PM";
	} else if($ctime==2200) {
		$strTime = "10:00 PM";
	} else if($ctime==2230) {
		$strTime = "10:30 PM";
	}
	return $strTime;
}
	require('makefont/makefont.php');
	//MakeFont('font/seguisb.ttf','cp1252');
	//$pdf = new PDF();
	$pdf = new PDF('P','mm','Letter');
	$pdf->AliasNbPages();
	
	$pdf->AddPage('L');
	$pdf->SetFont('Arial','',10);

	$page++;
	$i = 1;
	$pdf->table($i);
	$pdf->Output();
	
?>