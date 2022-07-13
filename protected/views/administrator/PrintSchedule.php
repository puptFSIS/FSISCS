<?php
require('fpdf.php');
include("config.php");
$cID = $_GET['hcourse'];
$sem = $_GET['hsem'];
$sy = $_GET['hsy'];

class PDF extends FPDF
{
	function Header()
	{
		$sy = $_GET['hsy'];
		$sem = $_GET['hsem'];
		if($sem==1){
			$sem = "First Semester";
		}
		if($sem==2){
			$sem = "Second Semester";
		}
		if($sem==3){
			$sem = "Summer";
		}
		$this->Image('PUP Taguig.png',75,10,25);
		$this->Image('centenniallogo.gif',230,10,25);
		$this->AddFont('segoeui','','segoeui.php');
		$this->AddFont('segoeuib','','segoeuib.php');
		$this->AddFont('segoeuil','','segoeuil.php');
		$this->AddFont('segoeuiz','','segoeuiz.php');
		$this->AddFont('segoeuii','','segoeuii.php');
		$this->AddFont('seguisb','','seguisb.php');
		$this->SetFont('segoeui','',11);
		$this->SetTextColor(0);
		$this->Cell(0,10,'Republic of the Philippines',0,0,'C');
		$this->Ln(5);
		$this->SetFont('segoeuib','',12);
		$this->Cell(0,10,'POLYTECHNIC UNIVERSITY OF THE PHILIPPINES',0,0,'C');
		$this->Ln(5);
		$this->SetFont('segoeui','',10);
		$this->Cell(0,10,'TAGUIG  BRANCH',0,0,'C');
		$this->Ln(5);
		$this->SetFont('segoeuii','',10);
		$this->Cell(0,10,'Gen. Santos Ave. Upper Bicutan, Taguig City',0,0,'C');
		$this->Ln(1);
		$this->Ln();
		$this->SetFont('segoeuib','',15);
		$this->Cell(0,5,''.$sem,0,0,'C');
		$this->Ln(6);
		$this->SetFont('segoeuii','',10);
		$this->Cell(0,5,'SY'.$sy,0,0,'C');
		$this->Ln(10);
		$cID = $_GET['hcourse'];
		$sem = $_GET['hsem'];
		$sy = $_GET['hsy'];
		
	}
	function Footer()
	{
		
	}
	
	function table($cYear)
	{
		include("config.php");
		$cID = $_GET['hcourse'];
		$sem = $_GET['hsem'];
		$sy = $_GET['hsy'];
		$sec = $_GET['sec'];
		
		
		$this->SetFont('segoeuib','',16);
		$this->SetTextColor(0,0,0);
		
		$sql = "SELECT course_desc FROM tbl_course WHERE course='$cID'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		$ccode = $row['course_desc'];
		
		$this->setX(3);
		$this->Cell(300,15,$ccode,0,0,'L');
		$this->Cell(0,15,$cYear . '-' . $sec,0,0,'L');
		$this->Ln();
		
		$this->SetFont('seguisb','',11);
		$this->SetFillColor(210,210,210);
		$header = array('CODE', 'SUBJECT TITLE', 'UNITS','LEC','LAB', 'DAY', 'TIME', 'ROOM', 'PROFESSOR');
		$w = array(25, 111, 13,13,13, 13, 40, 20, 61);
		$this->SetFillColor(50,50,50);
		$this->SetTextColor(255,255,255);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],10,$header[$i],1,0,'C',true);
		$this->Ln();
		$fill = false;
		
		$currID = checkCurrRef($cID,$cYear,$sy); 
		
		$sql = "SELECT * FROM tbl_subjectload WHERE currID = '$currID' AND sem='$sem' AND cyear='$cYear' AND courseID='$cID'";
		$result = mysqli_query($conn,$sql);
		$count=mysqli_num_rows($result);
		$this->SetFont('segoeui','',10);
		$this->SetFillColor(245,245,245);
		$this->SetTextColor(0);
	
		while($row = mysqli_fetch_array($result)) 
		{
			$oras = getTime2($row['scode'],$currID,$cID,$sy,$sec);
			
			if($oras==" ")
			{
				$lec = "-";
				$lab = "-";
				$day = getDay($row['scode'],$currID,$cID,$sy,$sec);	
				$time = getTime($row['scode'],$currID,$cID,$sy,$sec);
				$room = getRoom($row['scode'],$currID,$cID,$sy,$sec);
				$prof = getProf($row['scode'],$currID,$cID,$sy,$sec);
				$this->SetLineWidth(0.10);
				$this->Cell($w[0],10, '' . $row['scode'],1,0,'C',$fill);
				$this->Cell($w[1],10, ' ' . $row['stitle'],1,0,'L',$fill);
				$this->Cell($w[2],10, '' . $row['sunit'],1,0,'C',$fill);
				if($row['hrs_lec']<>0.00){
					$lec = floor($row['hrs_lec']);
				}
				if($row['hrs_lab']<>0.00){
					$lab = floor($row['hrs_lab']);
				}
				$this->Cell($w[3],10, ' ' . $lec,1,0,'C',$fill);
				$this->Cell($w[4],10, ' ' . $lab,1,0,'C',$fill);
				$this->Cell($w[5],10, '' . $day,1,0,'C',$fill);
				$this->Cell($w[6],10, '' . $time,1,0,'C',$fill);
				$this->Cell($w[7],10, ' ' . $room,1,0,'C',$fill);
				$this->Cell($w[8],10, ' ' . $prof,1,0,'L',$fill);
				$this->Ln();
			}
			else
			{
				$lec = "-";
				$lab = "-";
				$day = getDay($row['scode'],$currID,$cID,$sy,$sec);
				$time = getTime($row['scode'],$currID,$cID,$sy,$sec);
				$room = getRoom($row['scode'],$currID,$cID,$sy,$sec);
				$day2 = getDay2($row['scode'],$currID,$cID,$sy,$sec);
				$time2 = getTime2($row['scode'],$currID,$cID,$sy,$sec);
				$room2 = getRoom2($row['scode'],$currID,$cID,$sy,$sec);
				$prof = getProf($row['scode'],$currID,$cID,$sy,$sec);
				$this->SetLineWidth(0.10);
				$this->Cell($w[0],20, '' . $row['scode'],1,0,'C',$fill);
				$this->Cell($w[1],20, ' ' . $row['stitle'],1,0,'L',$fill);
				$this->Cell($w[2],20, '' . $row['sunit'],1,0,'C',$fill);
				if($row['hrs_lec']<>0.00){
					$lec = floor($row['hrs_lec']);
				}
				if($row['hrs_lab']<>0.00){
					$lab = floor($row['hrs_lab']);
				}
				$this->Cell($w[3],20, ' ' . $lec,1,0,'C',$fill);
				$this->Cell($w[4],20, ' ' . $lab,1,0,'C',$fill);
				$x=$this->GetX();
				$y=$this->GetY();
				$this->MultiCell($w[5],10, "$day\n$day2",1,'C',$fill);
				$this->setXY($x+13,$y);
				$x=$this->GetX();
				$y=$this->GetY();
				$this->MultiCell($w[6],10,"$time\n$time2",1,'C',$fill);
				$this->setXY($x+40,$y);
				$x=$this->GetX();
				$y=$this->GetY();
				$this->MultiCell($w[7],10,"$room\n$room2",1,'C',$fill);
				$this->setXY($x+20,$y);
				$this->Cell($w[8],20, ' ' . $prof,1,0,'L',$fill);
				$this->Ln();
			}
		}
		
		$this->SetFont('segoeuiz','',10);
		$this->SetTextColor(100,100,100);
		$this->SetFillColor(210,210,210);
		$this->Ln();
	}

}

	function getDay($scode,$currID,$cID,$sy,$sec)
	{
		include("config.php");
		$sql ="SELECT * FROM tbl_schedule WHERE scode ='$scode' AND currID = '$currID' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec' and Sched_type = 'OFFICIAL'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		$day = $row['sday'];
		return $day;
	}
	
	function getDay2($scode,$currID,$cID,$sy,$sec)
	{
		include("config.php");
		$sql ="SELECT * FROM tbl_schedule WHERE scode ='$scode' AND currID = '$currID' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec' and Sched_type = 'OFFICIAL'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		$day = $row['sday2'];
		return $day;
	}
	
	function getRoom($scode,$currID,$cID,$sy,$sec)
	{
		include("config.php");
		$sql ="SELECT * FROM tbl_schedule where scode ='$scode' and currID = '$currID' and schoolYear = '$sy' and courseID = '$cID' and csection = '$sec' and Sched_type = 'OFFICIAL'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		if($row['sroom']<>'')
		{
			$room = $row['sroom'];
		}
		else
		{
			$room = " ";
		}
		return $room;
	}
	
	function getRoom2($scode,$currID,$cID,$sy,$sec)
	{
		include("config.php");
		$sql ="SELECT * FROM tbl_schedule where scode ='$scode' and currID = '$currID' and schoolYear = '$sy' and courseID = '$cID' and csection = '$sec' and Sched_type = 'OFFICIAL'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		if($row['sroom2']<>'')
		{
			$room = $row['sroom2'];
		}
		else
		{
			$room = " ";
		}
		return $room;
	}
	
	function getProf($scode,$currID,$cID,$sy,$sec)
	{
		include("config.php");
		$sql ="SELECT * FROM tbl_schedule where scode ='$scode' and currID = '$currID' and schoolYear = '$sy' and courseID = '$cID' and csection = '$sec' and Sched_type = 'OFFICIAL'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		$prof = getName($row['sprof']);
		return $prof;
	}
	
	function getTime($scode,$currID,$cID,$sy,$sec)
	{
		include("config.php");
		$sql ="SELECT * FROM tbl_schedule where scode ='$scode' and currID = '$currID' and schoolYear = '$sy' and courseID = '$cID' and csection = '$sec' and Sched_type = 'OFFICIAL'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		if($row['stimeS']<>0){
			$time = to12Hr($row['stimeS']) . '-' . to12Hr($row['stimeE']);
		}else{
			$time = " ";
		}
		return $time;
	}
	
	function getTime2($scode,$currID,$cID,$sy,$sec)
	{
		include("config.php");
		$sql ="SELECT * FROM tbl_schedule where scode ='$scode' and currID = '$currID' and schoolYear = '$sy' and courseID = '$cID' and csection = '$sec' and Sched_type = 'OFFICIAL'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		if($row['stimeS2']<>0){
			$time = to12Hr($row['stimeS2']) . '-' . to12Hr($row['stimeE2']);
		}else{
			$time = " ";
		}
		return $time;
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
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf = new PDF('P','mm',array(215,330));
	$pdf->SetFont('Arial','',10);
	
	$courseCode = 0;
	$courseDesc = 0;
	$courseYear = 0;
	
	$sql = "SELECT * FROM tbl_course WHERE course='$cID'";
	$result = mysqli_query($conn,$sql);
	
	while($row = mysqli_fetch_array($result)) {
		$courseCode = $row['course_code'];
		$courseDesc = $row['course_desc'];
		$courseYear = $row['NoOfYears'];
	}
	for($i=1;$i<=$courseYear;$i++) {
		$pdf->AddPage('L');
		$pdf->table($i);
	}
	
	$pdf->Output();
?>