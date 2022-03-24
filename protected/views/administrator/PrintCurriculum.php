<?php
require('fpdf.php');
include("config.php");
$cID = $_GET['hcourse'];
$year = $_GET['hyear'];
$currID = $_GET['hcurrID'];
$sy = $_GET['hsy'];

class PDF extends FPDF
{
	function Header()
	{
include("config.php");
		$cID = $_GET['hcourse'];
		$year = $_GET['hyear'];
		$currID = $_GET['hcurrID'];
		$sy = $_GET['hsy'];
		$this->Image('PUP Taguig.png',25,10,18);
		$this->Image('centenniallogo.gif',175,10,18);
		$this->AddFont('segoeui','','segoeui.php');
		$this->AddFont('segoeuib','','segoeuib.php');
		$this->AddFont('segoeuil','','segoeuil.php');
		$this->AddFont('segoeuiz','','segoeuiz.php');
		$this->AddFont('segoeuii','','segoeuii.php');
		$this->AddFont('seguisb','','seguisb.php');
		$this->SetFont('segoeui','',11);
		$this->SetTextColor(0);
		$this->SetFont('segoeui','',10);
		$this->Cell(0,5,'POLYTECHNIC UNIVERSITY OF THE PHILIPPINES',0,0,'C');
		$this->Ln(5);
		$this->SetFont('segoeui','',10);
		$this->Cell(0,3,'TAGUIG  BRANCH',0,0,'C');
		$this->Ln(4);
		$this->SetFont('segoeuii','',10);
		$this->Cell(0,3,'Gen. Santos Ave. Upper Bicutan, Taguig City',0,0,'C');
		$this->Ln(7);
	
		$sql = "SELECT * FROM tbl_course WHERE course='$cID'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		$cdesc = $row['course_desc'];
		$ccode = $row['course_code'];
		
		$this->SetFont('segoeuib','',10);
		$this->Cell(0,3,$cdesc.'('.$ccode.')',0,0,'C');
		$this->Ln(5);
		
		$currID = checkCurrRef($cID,$year,$sy); 
		$sql = "SELECT currDesc FROM tbl_subjectloadlist WHERE currID='$currID'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		$currDesc = $row['currDesc'];
		
		$this->SetFont('segoeui','',10);
		$this->Cell(0,1,'Subject Load '.$currDesc,0,0,'C');
		$this->Ln(2);
	
		$this->Ln();
	}
	function Footer()
	{
include("config.php");
		$this->SetY(-15);
		$this->SetFont('Arial','I',8);
		$this->Cell(0,10,'Page '.$this->PageNo(),0,0,'R');
	}
	
	function table($cYear)
	{
		include("config.php");
		$courseYear = 0;
		$cID = $_GET['hcourse'];
		$year = $_GET['hyear'];
		$currID = $_GET['hcurrID'];
		$sy = $_GET['hsy'];
		$NoOfYears = getCourseYears($cID);
		$TSem = getMaxSem($cID);
		$yr = "";
		$strSem = "";
		$currID = checkCurrRef($cID,$year,$sy);
		
			for($cSem=1;$cSem<=$TSem;$cSem++)
			{
				$sql = "SELECT * FROM tbl_subjectload WHERE courseID = '$cID' AND sem = '$cSem' AND schoolYear = '$sy' AND currID = '$currID' AND cyear = '$cYear'";
				$result = mysqli_query($conn,$sql);
				$s = mysqli_num_rows($result);
				if($s<>0)
				{
					if($cYear==1) 
					{
						$yr = "FIRST YEAR";
					} else if($cYear==2) {
						$yr = "SECOND YEAR";
					} else if($cYear==3) {
						$yr = "THIRD YEAR";
					} else if($cYear==4) {
						$yr = "FOURTH YEAR";
					} else if($cYear==5) {
						$yr = "FIFTH YEAR";
					}
					
					if($cSem==1) 
					{
						$strSem = "FIRST SEMESTER";
					} else if($cSem==2) {
						$strSem = "SECOND SEMESTER";
					} else if($cSem==3){
						$strSem = "SUMMER";
					}
					
					$this->SetFont('segoeuib','',7);
					$this->SetTextColor(0,0,0);
					
					
					$this->SetFont('Arial','U',10);
					$this->setX(3);
					$this->Cell(7,15,'',0,0,'L');
					$this->Cell(0,7,$yr ,0,0,'C');
					$this->Ln();
					
					$this->SetFont('Arial','',10);
					$this->setX(3);
					$this->Cell(20,15,'',0,0,'L');
					$this->Cell(0,6,$strSem ,0,0,'L');
					$this->Ln();
					
					$this->SetFont('seguisb','',10);
					$this->SetFillColor(210,210,210);
					$this->SetCol(15);
					$header = array('CODE', 'SUBJECT TITLE', 'UNITS', 'LEC', 'LAB', 'PRE-REQ');
					$w = array(22, 95, 13, 13, 13, 22);
					$this->SetFillColor(50,50,50);
					$this->SetTextColor(255,255,255);
					for($i=0;$i<count($header);$i++)
						$this->Cell($w[$i],5,$header[$i],1,0,'C',true);
					$this->Ln();
					$fill = false;
			
					$totunits = 0;
					$totlec = 0;
					$totlab = 0;
					$tothrs = 0;
					
					$query = "SELECT * FROM tbl_subjectload WHERE courseID='$cID' AND cyear='$cYear' AND sem = '$cSem' AND currID='$currID' AND schoolYear='$sy'";
					$result = mysqli_query($conn,$query);
					$count=mysqli_num_rows($result);
					$this->SetFont('segoeui','',10);
					$this->SetFillColor(245,245,245);
					$this->SetTextColor(0);
					
					while($row = mysqli_fetch_array($result)) 
					{ 	
						$lec = round($row['hrs_lec']);
						$lab = round($row['hrs_lab']);

						$totunits = $totunits + $row['sunit']; 
						$totlec = $totlec + $row['hrs_lec']; 
						$totlab = $totlab + $row['hrs_lab']; 
						$tothrs = $totlec + $totlab;
						if($lec == 0){
							$lec = "";
						}
						if($lab ==0){
							$lab = "";
						}
						//$pdf->MultiCell($height,$width,"Line1 \nLine2 \nLine3",1,'C',1);
						$this->SetLineWidth(0.10);
						if(strlen($row['scode'])>10)
						{
							$len = strlen($row['scode']);
							$fontsize = 10;
							while($len>10)
							{
								$fontsize = $fontsize - .6;
								$len--;
							}
							$this->SetFont('segoeui','',$fontsize);
							$this->Cell($w[0],5, '' . $row['scode'],1,0,'C',$fill);
							$this->SetFont('segoeui','',10);
						}else
						{
							$this->SetFont('segoeui','',10);
							$this->Cell($w[0],5, '' . $row['scode'],1,0,'C',$fill);
						}
							$this->Cell($w[1],5, ' ' . $row['stitle'],1,0,'L',$fill);
							$this->Cell($w[2],5, '' . $row['sunit'] . '',1,0,'C',$fill);
							$this->Cell($w[3],5, '' . $lec,1,0,'C',$fill);
							$this->Cell($w[4],5, '' . $lab,1,0,'C',$fill);
						if(strlen($row['prereq'])>10)
						{
							$this->SetFont('segoeui','',6);	
							$this->Cell($w[5],5, '' . strtoupper($row['prereq']),1,0,'C',$fill);
							$this->SetFont('segoeui','',10);
							
						}else
						{
							$this->SetFont('segoeui','',10);
							$this->Cell($w[5],5, '' . strtoupper($row['prereq']),1,0,'C',$fill);
						}
						$this->Ln();
					}
					
					if($totunits<>0)
					{
						$this->Cell($w[0],5, 'TOTAL' ,1,0,'C',$fill);
						$this->Cell($w[1],5, '' ,1,0,'L',$fill);
						$this->Cell($w[2],5, ''.$totunits ,1,0,'C',$fill);
						$this->Cell($w[3]+$w[4],5, ''.$tothrs,1,0,'C',$fill);
						$this->Cell($w[5],5, '',1,0,'C',$fill);
						$this->Ln(5);
					}
					
					$totyear = getCourseYears($cID);
					if($cYear == $totyear AND $cSem==2)
					{
						
						$query2 = "SELECT * FROM tbl_subjectload WHERE courseID='$cID' AND currID='$currID' AND schoolYear='$sy'";
						$result2 = mysqli_query($conn,$query2);
						$unts = 0;
						while($row2=mysqli_fetch_array($result2)) {
							$unts = $unts + $row2['sunit']; 
						}
						$this->SetFont('segoeuiz','',10);
						$this->Ln(5);
						$this->Cell($w[0]+$w[1],6, 'Grand Total' ,1,0,'C',$fill);
						//$this->Cell($w[2],7, ''.$unts,1,0,'C',$fill);
						$this->Cell($w[2]+$w[3]+$w[4]+$w[5],6, $unts.' Units' ,1,0,'C',$fill);
					}
					/*$this->SetFont('segoeuiz','',5);
					$this->SetTextColor(100,100,100);
					$this->SetFillColor(210,210,210);
					$this->Ln();*/
				}
			}
	}
	
	function SetCol($col)
	{
		// Set position at a given column
		$this->col = $col;
		$x = 4+$col;
		$this->SetLeftMargin($x);
		$this->SetX($x);
	}
		
}	
	
	function getCourseYears($cID) {
include("config.php");
		$sql = "SELECT * FROM tbl_course WHERE course='$cID' ORDER by NoOfYears ASC";
		$result = mysqli_query($conn,$sql);
		$NoOfYears = 0;
		while($row=mysqli_fetch_array($result)) {
			$NoOfYears = $row['NoOfYears'];
		}
		return $NoOfYears;
	}
	
	function getMaxSem($cID)
	{
		include("config.php");
		$sql = "SELECT * FROM tbl_subjectload WHERE courseID='$cID' ORDER by sem ASC";
		$result = mysqli_query($conn,$sql);
		$Msem = 0;
		while($row=mysqli_fetch_array($result)) 
		{
			$Msem = $row['sem'];
		}
		return $Msem;
	}

	function checkCurrRef($cID,$yr,$sy) 
	{
		include("config.php");
		$sql = "SELECT * FROM tbl_subjectloadref WHERE courseID='$cID' AND cyear='$yr' AND schoolYear = '$sy'"; 
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		$ID = $row['currID'];
		return $ID;
	}
	
	function getName($fcode)
	{
		include("config.php");
		$Name = "";
		$sql = "SELECT * FROM tbl_evaluationfaculty WHERE FCode = '$fcode'";
		$result = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_array($result))
		{
			$Name = $row['LName'] .', '. $row['FName'];
		}
		return $Name;
	}
	
    function to12Hr($ctime) 
	{
		$strTime = "";
		if($ctime==700) 
		{
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
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf = new PDF('P','mm',array(215,330));
	$pdf->SetFont('Arial','',10);
	
	$courseCode = 0;
	$courseDesc = 0;
	$courseYear = 0;
	$TSem = getMaxSem($cID);
	
	$sql = "SELECT * FROM tbl_course WHERE course='$cID'";
	$result = mysqli_query($conn,$sql);
	
	while($row = mysqli_fetch_array($result)) 
	{
		$courseCode = $row['course_code'];
		$courseDesc = $row['course_desc'];
		$courseYear = $row['NoOfYears'];
	}
	$pdf->AddPage('P');
	
	for($i=1;$i<=$courseYear;$i++) 
	{
		//if($i==3)
			//$pdf->AddPage('P');
		$pdf->table($i);
	}
	
	$pdf->Output();
?>