<?php 

// echo "<pre>";
// print_r($subjects);
// echo "</pre>";

include('pdf_mc_table.php');
$pdf = new PDF_MC_Table('P', 'mm',array(300,230));
$pdf->AddPage();
$pdf->header();

$fcode = $profInfo['FCode'];
$firstname = $profInfo['FName'];
$mname = $profInfo['MName'];
$lastname = $profInfo['LName'];
$stats = $profInfo['enu_employmentStat'];


$pdf->AddFont('segoeui','','segoeui.php');
$pdf->AddFont('segoeuib','','segoeuib.php');
$pdf->SetFont('segoeuib','',15);
$pdf->Cell(0,5,'TEACHING LOAD',0,0,'C');
$pdf->Ln();
$pdf->SetFont('segoeui','',11);
if ($sem == 1) {
	$pdf->Cell(0,5,'FIRST SEMESTER, SY:'.$sy,0,0,'C');
} else if($sem == 2){
	$pdf->Cell(0,5,'SECOND SEMESTER, SY:'.$sy,0,0,'C');
}

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('segoeui','',12);
$pdf->Cell(52,5,'EMP NO',1,0,'L');
$pdf->Cell(60,5,$fcode,1,0,'C');
$pdf->Cell(35,5,'COLLEGE',1,0,'L');
$pdf->Cell(60,5,'TAGUIG CAMPUS',1,0,'C');
$pdf->Ln();
$pdf->Cell(52,5,'EMP NAME',1,0,'L');
$pdf->Cell(60,5,$lastname.", ".$firstname." ".$mname."",1,0,'C');
$pdf->Cell(35,5,'DEPT CODE',1,0,'L');
$pdf->Cell(60,5,' ',1,0,'C');
$pdf->Ln();
$pdf->Cell(52,5,'EMP STATUS',1,0,'L');
$pdf->Cell(60,5,$stats,1,0,'C');
$pdf->Cell(35,5,'DEPARTMENT',1,0,'L');
$pdf->Cell(60,5,'TAGUIG CAMPUS',1,0,'C');
$pdf->Ln();
$pdf->Ln();

//Regular Table
$pdf->SetFont('segoeuib','',15);
$pdf->Cell(0,5,'REGULAR LOAD',0,0,'L');
$pdf->Ln();
$pdf->SetFont('segoeui','',12);
$RegularHeader = array("SUBJECT CODE", "SUBJECT DESCRIPTION", "UNITS", "YEAR & SECTION", "TIME", "DAY/S", "ROOM");
$pdf->SetAligns(array('C','C','C','C','C','C','C'));
$pdf->SetWidths(array(28,50,20,35,40,17,17,22));
$pdf->SetLineHeight(6);

$pdf->Row(array($RegularHeader[0], $RegularHeader[1], $RegularHeader[2], $RegularHeader[3], $RegularHeader[4], $RegularHeader[5], $RegularHeader[6]));
$pdf->SetFont('segoeui','',11);
$pdf->SetWidths(array(28,50,20,35,40,17,17,22));
$pdf->SetLineHeight(5);
$load = 0;
$count = 0;

foreach($TeachingLoad as $row){
	if($row['load_type'] == 1 && $row['load_type'] != NULL){
		$course = FindCourse($row['courseID'], $courses);
		$ys = $course." ".$row['cyear']."-".$row['csection'];

		if(!empty($row['stimeS2']) && !empty($row['stimeE2'])){
			$timeStart1 = to12Hr($row['stimeS']);
			$timeEnd1 = to12Hr($row['stimeE']);
			$timeStart2 = to12Hr($row['stimeS2']);
			$timeEnd2 = to12Hr($row['stimeE2']);

		$time = $timeStart1."/".$timeEnd1." ".$timeStart2."/".$timeEnd2;
		} else {
			$timeStart1 = to12Hr($row['stimeS']);
			$timeEnd1 = to12Hr($row['stimeE']);

			$time = $timeStart1."/".$timeEnd1;
		}

		if(!empty($row['sday2'])){
		$days = $row['sday']."\n".$row['sday2'];
		} else {
			$days = $row['sday'];
		}

		// $year = explode("-", $row['schoolYear']);
		// $EffYear = $year[1];

		$pdf->Row(array($row['scode'],$row['stitle'],$row['units'],$ys,$time,$days,$row['sroom']));
		$load += $row['units'];
		$count++;
	}
}
if ($count == 0) {
	for ($i=0; $i < 9; $i++) { 
	$pdf->Row(array(" "," "," "," "," "," "," "));
	}
	$load = 0;
} else if($count < 10){
	for ($i=0; $i < 4; $i++) { 
		$pdf->Row(array(" "," "," "," "," "," "," "));
	}
}

$pdf->Cell(0,5,'Total Regular Load: '.$load." Units",0,0,'L');
$pdf->Ln();
$pdf->Ln();

//Part Time Table
$pdf->SetFont('segoeuib','',15);
$pdf->Cell(0,5,'PART-TIME LOAD',0,0,'L');
$pdf->Ln();
$pdf->SetFont('segoeui','',12);
$RegularHeader = array("SUBJECT CODE", "SUBJECT DESCRIPTION", "UNITS", "YEAR & SECTION", "TIME", "DAY/S", "ROOM");
$pdf->SetAligns(array('C','C','C','C','C','C','C'));
$pdf->SetWidths(array(28,50,20,35,40,17,17,22));
$pdf->SetLineHeight(6);

$pdf->Row(array($RegularHeader[0], $RegularHeader[1], $RegularHeader[2], $RegularHeader[3], $RegularHeader[4], $RegularHeader[5], $RegularHeader[6]));
$pdf->SetFont('segoeui','',11);
$pdf->SetWidths(array(28,50,20,35,40,17,17,22));
$pdf->SetLineHeight(5);
$load = 0;
$count = 0;

foreach($TeachingLoad as $row){
	if($row['load_type'] == 0 && $row['load_type'] != NULL){
		$course = FindCourse($row['courseID'], $courses);
		$ys = $course." ".$row['cyear']."-".$row['csection'];

		if(!empty($row['stimeS2']) && !empty($row['stimeE2'])){
			$timeStart1 = to12Hr($row['stimeS']);
			$timeEnd1 = to12Hr($row['stimeE']);
			$timeStart2 = to12Hr($row['stimeS2']);
			$timeEnd2 = to12Hr($row['stimeE2']);

		$time = $timeStart1."/".$timeEnd1." ".$timeStart2."/".$timeEnd2;
		} else {
			$timeStart1 = to12Hr($row['stimeS']);
			$timeEnd1 = to12Hr($row['stimeE']);

			$time = $timeStart1."/".$timeEnd1;
		}

		if(!empty($row['sday2'])){
		$days = $row['sday']."\n".$row['sday2'];
		} else {
			$days = $row['sday'];
		}

		// $year = explode("-", $row['schoolYear']);
		// $EffYear = $year[1];

		$pdf->Row(array($row['scode'],$row['stitle'],$row['units'],$ys,$time,$days,$row['sroom']));
		$load += $row['units'];
		$count++;
	}
}
if ($count == 0) {
	for ($i=0; $i < 9; $i++) { 
		$pdf->Row(array(" "," "," "," "," "," "," "));
	}
	$load = 0;
} else if($count < 10){
	for ($i=0; $i < 4; $i++) { 
		$pdf->Row(array(" "," "," "," "," "," "," "));
	}
}
$pdf->Cell(0,5,'Total Part-Time Load: '.$load." Units",0,0,'L');
$pdf->Ln();
$pdf->Ln();


//Teaching Substitution
$pdf->SetFont('segoeuib','',15);
$pdf->Cell(0,5,'TEMPORARY SUBSTITUTION',0,0,'L');
$pdf->Ln();
$pdf->SetFont('segoeui','',12);
$RegularHeader = array("SUBJECT CODE", "SUBJECT DESCRIPTION", "UNITS", "YEAR & SECTION", "TIME", "DAY/S", "ROOM");
$pdf->SetAligns(array('C','C','C','C','C','C','C'));
$pdf->SetWidths(array(28,50,20,35,40,17,17,22));
$pdf->SetLineHeight(6);

$pdf->Row(array($RegularHeader[0], $RegularHeader[1], $RegularHeader[2], $RegularHeader[3], $RegularHeader[4], $RegularHeader[5], $RegularHeader[6]));
$pdf->SetFont('segoeui','',11);
$pdf->SetWidths(array(28,50,20,35,40,17,17,22));
$pdf->SetLineHeight(5);
$load = 0;
$count = 0;

foreach($TeachingLoad as $row){
	if($row['load_type'] == 2 && $row['load_type'] != NULL){
		$course = FindCourse($row['courseID'], $courses);
		$ys = $course." ".$row['cyear']."-".$row['csection'];

		if(!empty($row['stimeS2']) && !empty($row['stimeE2'])){
			$timeStart1 = to12Hr($row['stimeS']);
			$timeEnd1 = to12Hr($row['stimeE']);
			$timeStart2 = to12Hr($row['stimeS2']);
			$timeEnd2 = to12Hr($row['stimeE2']);

		$time = $timeStart1."/".$timeEnd1." ".$timeStart2."/".$timeEnd2;
		} else {
			$timeStart1 = to12Hr($row['stimeS']);
			$timeEnd1 = to12Hr($row['stimeE']);

			$time = $timeStart1."/".$timeEnd1;
		}

		if(!empty($row['sday2'])){
		$days = $row['sday']."\n".$row['sday2'];
		} else {
			$days = $row['sday'];
		}

		// $year = explode("-", $row['schoolYear']);
		// $EffYear = $year[1];

		$pdf->Row(array($row['scode'],$row['stitle'],$row['units'],$ys,$time,$days,$row['sroom']));
		$load += $row['units'];
		$count++;
	}
}
if ($count == 0) {
	for ($i=0; $i < 9; $i++) { 
		$pdf->Row(array(" "," "," "," "," "," "," "));
	}
	$load = 0;
} else if($count < 10){
	for ($i=0; $i < 4; $i++) { 
		$pdf->Row(array(" "," "," "," "," "," "," "));
	}
}
$pdf->Cell(0,5,'Total Temporary Substitution: '.$load." Units",0,0,'L');
$pdf->Ln();

$pdf->Output();


function FindCourse($id,$data){
	foreach($data as $row){
		if($id == $row['course']){
			$course = $row['course_code'];
		}
	}

	if(empty($course)){
		$course = " ";
	}
	return $course;
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
?>