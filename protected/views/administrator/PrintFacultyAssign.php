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
?>