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
							$dn = "";

							if (strlen($ctime) == 4) {
								$hour = substr($ctime, 0, 2);
								$min = substr($ctime, 2, 3);



								if ($hour > 12) {
									$dn = "PM";
									if ($hour == 13) {
										$hour = "01";
									} else if ($hour == 14) {
										$hour = "02";
									} else if ($hour == 15) {
										$hour = "03";
									} else if ($hour == 16) {
										$hour = "04";
									} else if ($hour == 17) {
										$hour = "05";
									} else if ($hour == 18) {
										$hour = "06";
									} else if ($hour == 19) {
										$hour = "07";
									} else if ($hour == 20) {
										$hour = "08";
									} else if ($hour == 21) {
										$hour = "09";
									} else if ($hour == 22) {
										$hour = "10";
									}
								} else {
									$dn = "AM";
								}

								$strTime = $hour.":".$min." ".$dn;
							 } else {
							 	$hour = substr($ctime, 0, 1);
								$min = substr($ctime, 1, 2);

								if ($hour > 12) {
									$dn = "PM";
									if ($hour == 13) {
										$hour = "01";
									} else if ($hour == 14) {
										$hour = "02";
									} else if ($hour == 15) {
										$hour = "03";
									} else if ($hour == 16) {
										$hour = "04";
									} else if ($hour == 17) {
										$hour = "05";
									} else if ($hour == 18) {
										$hour = "06";
									} else if ($hour == 19) {
										$hour = "07";
									} else if ($hour == 20) {
										$hour = "08";
									} else if ($hour == 21) {
										$hour = "09";
									} else if ($hour == 22) {
										$hour = "10";
									}
								} else {
									$dn = "AM";
								}

								$strTime = $hour.":".$min." ".$dn;
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