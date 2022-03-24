<?php
include('pdf_mc_table.php');
$pdf = new PDF_MC_Table();
$pdf->AddPage('P');
$pdf->header();

// echo "<pre>";
// print_r($schedules);
// echo "</pre>";

// foreach ($schedules as $row) {
// 	echo $row['timeID']."<br>";
// 	echo $row['sday']."<br>";
// 	echo $row['stimeS']."<br>";
// 	echo $row['stimeE']."<br>";
// 	echo $row['sprof']."<br>";
// 	echo $row['sem']."<br>";
// 	echo $row['schoolYear']."<br>";
// }

//header
	$pdf->Image('PUP Taguig.png',25,10,25);
	$pdf->Image('centenniallogo.gif',160,10,25);
	$pdf->AddFont('segoeui','','segoeui.php');
	$pdf->AddFont('segoeuib','','segoeuib.php');
	$pdf->AddFont('segoeuil','','segoeuil.php');
	$pdf->AddFont('segoeuiz','','segoeuiz.php');
	$pdf->AddFont('segoeuii','','segoeuii.php');
	$pdf->AddFont('seguisb','','seguisb.php');
	$pdf->SetFont('segoeui','',11);
	$pdf->SetTextColor(0);
	$pdf->Cell(0,10,'Republic of the Philippines',0,0,'C');
	$pdf->Ln(5);
	$pdf->SetFont('segoeuib','',12);
	$pdf->Cell(0,10,'POLYTECHNIC UNIVERSITY OF THE PHILIPPINES',0,0,'C');
	$pdf->Ln(5);
	$pdf->SetFont('segoeui','',10);
	$pdf->Cell(0,10,'TAGUIG  BRANCH',0,0,'C');
	$pdf->Ln(5);
	$pdf->SetFont('segoeuii','',10);
	$pdf->Cell(0,10,'Gen. Santos Ave. Upper Bicutan, Taguig City',0,0,'C');
	// $pdf->Ln(1);
	$pdf->Ln();
	$pdf->SetFont('segoeuib','',15);
	$pdf->Cell(0,10,'Faculty Preferred Subjects and Schedules',0,0,'C');
	// $pdf->Ln(1);
	$pdf->Ln();
	$pdf->SetFont('segoeuib','',12);
	if ($sem == 1) {
		$pdf->Cell(0,5,$sem.'st Semester',0,0,'C');
	} else if($sem == 2){
		$pdf->Cell(0,5,$sem.'nd Semester',0,0,'C');
	}
	$pdf->Ln(6);
	$pdf->SetFont('segoeuii','',12);
	$pdf->Cell(0,5,'SY: '.$sy,0,0,'C');
	$pdf->Ln(10);

// table
	//table header
	$pdf->SetFont('segoeuib','',11);
	$header = array('Name of Faculty', 'Subject/s', 'Preferred Day & Time');
	$width = array(50,70,63);
	for ($i=0; $i < 3; $i++) { 
		$pdf->Cell($width[$i],10,$header[$i],1,0,'C');
	}
	$pdf->Ln();
	//End table header

	//table body
	$pdf->SetFont('segoeui','',10);
	$pdf->SetAligns(array('C','L','C'));
	$pdf->SetWidths(array(50,70,63));
	$pdf->SetLineHeight(5);

	foreach ($prof as $row) {
		$currFCode = $row['sprof'];
		$subjectPref = array();
		$timePref = array();
		for ($i=0; $i < count($subjects); $i++) { 
			if ($subjects[$i]['sprof'] == $currFCode) {
				$subjectPref[$i] = $subjects[$i]['scode']." - ".$subjects[$i]['stitle'];
			}
		}
		for ($i=0; $i < count($schedules); $i++) { 
			if ($schedules[$i]['sprof'] == $currFCode) {
				if ($schedules[$i]['stimeS']==0 and $schedules[$i]['stimeE']==0) {
					$timePref[$i] = toDay($schedules[$i]['sday'])." - "."WHOLE DAY";
				} else {
					$timePref[$i] = toDay($schedules[$i]['sday'])." - ".to12Hr($schedules[$i]['stimeS'])." : ".to12Hr($schedules[$i]['stimeE']);
				}
				
			}
		}
		$finSubjectPref = implode("\n", $subjectPref);
		$finTimePref = implode("\n", $timePref);
			$pdf->Row(array(
				getName($currFCode, $profAll),
				$finSubjectPref,
				$finTimePref
			));
	}

	$pdf->Output();

	function getName($prof, $profdata){
		$profName = "";
		foreach ($profdata as $row) {
			if ($prof == $row['FCODE']) {
				$profName = $row['LName'].", ".$row['FName'];
			}
		}
		return $profName;
	}

	function toDay($day){
		$finDay = "";
		if($day == 'M'){
			$finDay = "Monday";
		} else if($day == 'T'){
			$finDay = "Tuesday";
		} else if($day == 'W'){
			$finDay = "Wednesday";
		} else if($day == 'TH'){
			$finDay = "Thursday";
		} else if ($day == 'F'){
			$finDay = "Friday";
		} else if($day == 'S'){
			$finDay = "Saturday";
		}

		return $finDay;
	}

	function to12Hr($ctime) {

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
?>