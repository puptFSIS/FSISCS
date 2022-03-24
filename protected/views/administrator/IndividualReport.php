<?php
require('fpdf.php');
include("config.php");

$page = 1;

class PDF extends FPDF
{
	function Header()
	{
		$this->Image('PUP Taguig.png',12,10,30);
		$this->Image('centenniallogo.gif',290,10,30);
		$this->AddFont('segoeui','','segoeui.php');
		$this->AddFont('segoeuib','','segoeuib.php');
		$this->AddFont('segoeuil','','segoeuil.php');
		$this->AddFont('segoeuiz','','segoeuiz.php');
		$this->AddFont('segoeuii','','segoeuii.php');
		$this->AddFont('seguisb','','seguisb.php');
		$this->SetFont('segoeui','',11);
		$this->SetTextColor(0);
		$this->SetFont('segoeuii','',10);
		$this->Cell(0,3,'Republic of the Philippines',0,0,'C');
		$this->Ln(4);
		$this->SetFont('segoeuib','',13);
		$this->Cell(0,5,'POLYTECHNIC UNIVERSITY OF THE PHILIPPINES',0,0,'C');
		$this->Ln(5);
		$this->SetFont('segoeui','',10);
		$this->Cell(0,3,'TAGUIG  BRANCH',0,0,'C');
		$this->Ln(4);
		$this->SetFont('segoeuii','',10);
		$this->Cell(0,3,'Gen. Santos Ave. Upper Bicutan, Taguig City',0,0,'C');
		$this->Ln(4);
		$this->SetFont('segoeuii','',10);
		$this->Cell(0,3,'Tel Nos:837-5858 to 60; Telefax:8375859',0,0,'C');
		$this->Ln(10);
	}
	
	function Footer()
	{
		$this->SetY(-50);
		$this->SetFont('Arial','I',8);
		$this->Cell(0,3,'___________________________',0,0,'R');
		$this->Ln(5);
		$this->Cell(0,3,'Signature over printed name    ',0,0,'R');
		$this->Ln(35);
		$this->Cell(0,10,'Page '.$this->PageNo(),0,0,'R');
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
		$FacCode = $_GET['fcode'];
		$csem = 2;
		$sy = "2013-2014";
		$p = $FacCode;
		$this->SetFont('segoeuib','',18);
		$this->Cell(0,3,'Individual Report',0,0,'C');
		$this->Ln();
		$this->Ln();
		$this->SetFont('segoeuii','',12);
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
		//Subject load		
		$this->SetFont('segoeuib','',12);
		$this->Ln(5); 
		$this->Cell(0,3,'' . getname($p),0,0,'L');
		$this->Ln();
		$this->Ln();
		$this->setX(10);
		$this->SetFont('seguisb','',10);
		$this->SetFillColor(210,210,210);
		$header = array('CODE', 'SUBJECT TITLE','LEC','LAB','COURSE','DAY', 'TIME', 'ROOM');
		$w = array(40, 129, 10,10,45, 10, 35, 32);
		$this->SetFillColor(50,50,50);
		$this->SetTextColor(255,255,255);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],6,$header[$i],1,0,'C',true);
		$this->Ln();
		$fill = false;
		$this->SetTextColor(0);
		$this->SetFont('seguisb','',9);
		$sql1 = "SELECT * FROM tbl_schedule WHERE sem = '$csem' and schoolYear = '$sy' and sprof = '$p'";
		$query1 = mysqli_query($conn,$sql1);
		while($row1 = mysqli_fetch_array($query1))
		{
			if($row1['sday2']=='')
			{
				$code = $row1['scode'];
				$stitle = $row1['stitle'];
				$lec = $row1['lec'];
				$lab = $row1['lab'];
				$currID = $row1['currID'];
				$cID = $row1['courseID'];
				$sec = $row1['csection'];
				$yrlvl = $row1['cyear'];
				$course = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];
				$day = getDay($code,$currID,$cID,$sy,$sec,$yrlvl,$csem);
				$time = getTime($code,$currID,$cID,$sy,$sec,$yrlvl,$csem);
				$room = getRoom($code,$currID,$cID,$sy,$sec,$yrlvl,$csem);
				$this->SetLineWidth(0.10);
				$this->Cell($w[0],6, '' . $code,1,0,'C',$fill);
				$this->Cell($w[1],6, ' ' . $stitle,1,0,'L',$fill);
				$this->Cell($w[2],6, '' . $lec,1,0,'C',$fill);
				$this->Cell($w[3],6, '' . $lab,1,0,'C',$fill);
				$this->Cell($w[4],6, '' . $course,1,0,'C',$fill);
				$this->Cell($w[5],6, '' . $day,1,0,'C',$fill);
				$this->Cell($w[6],6, '' . $time,1,0,'C',$fill);
				$this->Cell($w[7],6, '' . $room,1,0,'C',$fill);
				$this->Ln();
			}
			else
			{
				$code = $row1['scode'];
				$stitle = $row1['stitle'];
				$lec = $row1['lec'];
				$lab = $row1['lab'];
				$currID = $row1['currID'];
				$cID = $row1['courseID'];
				$sec = $row1['csection'];
				$yrlvl = $row1['cyear'];
				$course = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];
				$day = getDay($code,$currID,$cID,$sy,$sec,$yrlvl,$csem);
				$day2 = getDay2($code,$currID,$cID,$sy,$sec,$yrlvl,$csem);
				$time = getTime($code,$currID,$cID,$sy,$sec,$yrlvl,$csem);
				$time2 = getTime2($code,$currID,$cID,$sy,$sec,$yrlvl,$csem);
				$room = getRoom($code,$currID,$cID,$sy,$sec,$yrlvl,$csem);
				$room2 = getRoom2($code,$currID,$cID,$sy,$sec,$yrlvl,$csem);
				$this->SetLineWidth(0.10);
				$this->Cell($w[0],12, '' . $code,1,0,'C',$fill);
				$this->Cell($w[1],12, ' ' . $stitle,1,0,'L',$fill);
				$this->Cell($w[2],12, '' . $lec,1,0,'C',$fill);
				$this->Cell($w[3],12, '' . $lab,1,0,'C',$fill);
				$this->Cell($w[4],12, '' . $course,1,0,'C',$fill);
				$x=$this->GetX();
				$y=$this->GetY();
				$this->MultiCell($w[5],6, "$day\n$day2",1,'C',$fill);
				$this->setXY($x+10,$y);
				$x=$this->GetX();
				$y=$this->GetY();
				$this->MultiCell($w[6],6, "$time\n$time2",1,'C',$fill);
				$this->setXY($x+35,$y);
				$x=$this->GetX();
				$y=$this->GetY();
				$this->MultiCell($w[7],6, "$room\n$room2",1,'C',$fill);
				$y=$this->setY($y+6);
				$this->Ln();
			}
		}
		$this->Ln();
		
		//Attendance report
		$this->SetFont('segoeuib','',12);
		$this->Cell(0,3,'Weekly Report',0,0,'L');
		$this->Ln();
		$this->Ln();
		$this->setX(10);
		$this->SetFont('seguisb','',10);
		$this->SetFillColor(210,210,210);
		$header = array('Faculty ID', 'Surname','First Name','Middle Name','Present','Late', 'Absent', 'Total Days');
		$w = array(61, 50, 50,50,25, 25, 25, 25);
		$this->SetFillColor(50,50,50);
		$this->SetTextColor(255,255,255);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],6,$header[$i],1,0,'C',true);
		$this->Ln();
		$fill = false;
		$this->SetTextColor(0);
		$sqlApt = "SELECT ef.FCode, ef.LName, ef.FName, ef.MName, a.status FROM aptendance as a JOIN tbl_evaluationfaculty as ef ON a.FCode = ef.FCode where a.FCode = '$FacCode'";
		$queryApt = mysqli_query($conn,$sqlApt);
		$late = 0;
		$absent = 0;
		$present = 0;
		$totaldays = 0;
		$lname = "";
		$fname = "";
		$mname = "";
		while($rowApt = mysqli_fetch_array($queryApt))
		{
			$totaldays+=1;
			if($rowApt['status'] == "LATE")
				$late+=1; 
			else if($rowApt['status'] == "ABSENT")
				$absent+=1;
			else
				$present+=1;
			$lname = $rowApt['LName'];
			$fname = $rowApt['FName'];
			$mname = $rowApt['MName'];
		}
		$this->Cell($w[0],6, '' . $FacCode,1,0,'C',$fill);
		$this->Cell($w[1],6, ' ' . $lname,1,0,'L',$fill);
		$this->Cell($w[2],6, '' . $fname,1,0,'C',$fill);
		$this->Cell($w[3],6, '' . $mname,1,0,'C',$fill);
		$this->Cell($w[4],6, '' . $present,1,0,'C',$fill);
		$this->Cell($w[5],6, '' . $late,1,0,'C',$fill);
		$this->Cell($w[6],6, '' . $absent,1,0,'C',$fill);
		$this->Cell($w[7],6, '' . $totaldays,1,0,'C',$fill);
		$this->Ln();
		
		//Monthly report
		$this->SetFont('segoeuib','',12);
		$this->Cell(0,3,'Monthly Report',0,0,'L');
		$this->Ln();
		$this->Ln();
		$this->setX(10);
		$this->SetFont('seguisb','',10);
		$this->SetFillColor(210,210,210);
		$header = array('Faculty ID', 'Surname','First Name','Middle Name','Present','Late', 'Absent', 'Total Days');
		$w = array(61, 50, 50,50,25, 25, 25, 25);
		$this->SetFillColor(50,50,50);
		$this->SetTextColor(255,255,255);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],6,$header[$i],1,0,'C',true);
		$this->Ln();
		$fill = false;
		$this->SetTextColor(0);
		
		//Query pra kunin lhat ng active sa current sem ska tga taguig
		$sqlAll = "SELECT * from tbl_evaluationfaculty where status = 'Active' and int_courseGroup = 24 order by LName ASC";
		$queryAll = mysqli_query($conn,$sqlAll);
		while($rowAll = mysqli_fetch_array($queryAll))
		{
			$FacultyCode = $rowAll['FCode'];
			$lname = $rowAll['LName'];
			$fname = $rowAll['FName'];
			$mname = $rowAll['MName'];
			$sqlApt = "SELECT ef.FCode, ef.LName, ef.FName, ef.MName, a.status FROM aptendance as a JOIN tbl_evaluationfaculty as ef ON a.FCode = ef.FCode where ef.FCode = '$FacultyCode'";
			$queryApt = mysqli_query($conn,$sqlApt);
			$late = 0;
			$absent = 0;
			$present = 0;
			$totaldays = 0;
			
			//Kunin ung data galing sa aptendance table where FCode = kung sino ung napili sa taas
			while($rowApt = mysqli_fetch_array($queryApt))
			{
				$totaldays+=1;
				if($rowApt['status'] == "LATE")
					$late+=1; 
				else if($rowApt['status'] == "ABSENT")
					$absent+=1;
				else
					$present+=1;
			}
			$this->Ln(3);
			$this->Cell($w[0],6, '' . $FacultyCode,1,0,'C',$fill);
			$this->Cell($w[1],6, ' ' . $lname,1,0,'L',$fill);
			$this->Cell($w[2],6, '' . $fname,1,0,'C',$fill);
			$this->Cell($w[3],6, '' . $mname,1,0,'C',$fill);
			$this->Cell($w[4],6, '' . $present,1,0,'C',$fill);
			$this->Cell($w[5],6, '' . $late,1,0,'C',$fill);
			$this->Cell($w[6],6, '' . $absent,1,0,'C',$fill);
			$this->Cell($w[7],6, '' . $totaldays,1,0,'C',$fill);
			$this->Ln(3);
		}
		//End monthly
	}
}	

	function getName($fcode)
	{
		$Name = "";
		$sql = "SELECT * FROM tbl_evaluationfaculty WHERE FCode = '$fcode'";
		$result = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_array($result)){
			$Name = $row['LName'] .', '. $row['FName'];
		}
		return $Name;
	}
	
	function getCourse($ccode) 
	{
		$sql = "SELECT * FROM tbl_course WHERE course ='$ccode'"; 
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		$code = $row['course_code'];
		return $code;
	}
	
	function getDay($scode,$currID,$cID,$sy,$sec,$yrlvl,$sem)
	{
		$sql ="SELECT * FROM tbl_schedule WHERE scode ='$scode' AND currID = '$currID' AND cyear = '$yrlvl' AND sem = '$sem' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		$day = $row['sday'];
		return $day;
	}
	
	function getDay2($scode,$currID,$cID,$sy,$sec,$yrlvl,$sem)
	{
		$sql ="SELECT * FROM tbl_schedule WHERE scode ='$scode' AND currID = '$currID' AND cyear = '$yrlvl' AND sem = '$sem' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		$day = $row['sday2'];
		return $day;
	}
	
	function getRoom($scode,$currID,$cID,$sy,$sec,$yrlvl,$sem)
	{
		$sql ="SELECT * FROM tbl_schedule WHERE scode ='$scode' AND currID = '$currID' AND cyear = '$yrlvl' AND sem = '$sem' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec'";
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
	
	function getRoom2($scode,$currID,$cID,$sy,$sec,$yrlvl,$sem)
	{
		$sql ="SELECT * FROM tbl_schedule WHERE scode ='$scode' AND currID = '$currID' AND cyear = '$yrlvl' AND sem = '$sem' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec'";
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
	
	function getTime($scode,$currID,$cID,$sy,$sec,$yrlvl,$sem)
	{
		$sql ="SELECT * FROM tbl_schedule WHERE scode ='$scode' AND currID = '$currID' AND cyear = '$yrlvl' AND sem = '$sem' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		if($row['stimeS']<>0)
		{
			$time = to12Hr($row['stimeS']) . '-' . to12Hr($row['stimeE']);
		}
		else
		{
			$time = " ";
		}
		return $time;
	}
	
	function getTime2($scode,$currID,$cID,$sy,$sec,$yrlvl,$sem)
	{
		$sql ="SELECT * FROM tbl_schedule WHERE scode ='$scode' AND currID = '$currID' AND cyear = '$yrlvl' AND sem = '$sem' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		if($row['stimeS2']<>0)
		{
			$time = to12Hr($row['stimeS2']) . '-' . to12Hr($row['stimeE2']);
		}
		else
		{
			$time = " ";
		}
		return $time;
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
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf = new PDF('P','mm',array(215,330));
	$pdf->SetFont('Arial','',10);
	$pdf->AddPage('L');
	$page++;
	$i = 1;
	$pdf->table($i);
	$pdf->Output();
?>