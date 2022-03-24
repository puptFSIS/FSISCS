<?php 

// echo "<pre>";
// print_r($subjects);
// echo "</pre>";

include('pdf_mc_table.php');
$pdf = new PDF_MC_Table('P', 'mm',array(365,230));
$pdf->AddPage();
$pdf->header();

$fcode = $data['FCODE'];
$firstname = $data['FName'];
$mname = $data['MName'];
$lastname = $data['LName'];
$stats = $data['enu_employmentStat'];


$pdf->AddFont('segoeui','','segoeui.php');
$pdf->AddFont('segoeuib','','segoeuib.php');
$pdf->SetFont('segoeuib','',15);
$pdf->Cell(0,5,'FACULTY ASSIGNMENT',0,0,'C');
$pdf->Ln();
$pdf->SetFont('segoeui','',11);
$pdf->Cell(0,5,'FIRST SEMESTER, SY 2020-2021',0,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('segoeui','',12);
$pdf->Cell(52,5,'EMP NO',1,0,'L');
$pdf->Cell(60,5,$fcode,1,0,'C');
$pdf->Cell(35,5,'COLLEGE',1,0,'L');
$pdf->Cell(60,5,'TAGUIG CAMPUS',1,0,'C');
$pdf->Ln();
$pdf->Cell(52,5,'EMP NAME',1,0,'L');
$pdf->Cell(60,5,$lastname.", ".$firstname." ".$mname.".",1,0,'C');
$pdf->Cell(35,5,'DEPT CODE',1,0,'L');
$pdf->Cell(60,5,' ',1,0,'C');
$pdf->Ln();
$pdf->Cell(52,5,'EMP STATUS',1,0,'L');
$pdf->Cell(60,5,$stats,1,0,'C');
$pdf->Cell(35,5,'DEPARTMENT',1,0,'L');
$pdf->Cell(60,5,'TAGUIG CAMPUS',1,0,'C');
$pdf->Ln();
$pdf->Ln();

//Regular Load table
$pdf->SetFont('segoeui','',15);
$pdf->Cell(0,5,'REGULAR LOAD',0,0,'L');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('segoeui','',9);
$FHeader = array('SUBJECT CODE','SUBJECT DESCRIPTION','UNITS','YEAR & SECTION','SUBJ. REF.','TIME','TIME CODE','DAY/S','ROOM','EFFTVTY');
$pdf->SetAligns(array('C','C','C','C','C','C','C','C','C','C'));
$pdf->SetWidths(array(20,28,12,23,13,40,17,17,17,22));
$pdf->SetLineHeight(6);
$pdf->Row(array($FHeader[0],$FHeader[1],$FHeader[2],$FHeader[3],$FHeader[4],$FHeader[5],$FHeader[6],$FHeader[7],$FHeader[8],$FHeader[9]));
$pdf->SetFont('segoeui','',11);
$pdf->SetAligns(array('C','C','C','C','C','C','C','C','C','C'));
$pdf->SetWidths(array(20,28,12,23,13,40,17,17,17,22));
$pdf->SetLineHeight(5);

$RegularLoad = array();
$load = 0;
for ($i=0; $load < 15; $i++) {
	$course = FindCourse($subjects[$i]['courseID'],$courses);
	$ys = $course." ".$subjects[$i]['cyear']."-".$subjects[$i]['csection'];

	if(!empty($subjects[$i]['stimeS2']) && !empty($subjects[$i]['stimeE2'])){
		$timeStart1 = to12Hr($subjects[$i]['stimeS']);
		$timeEnd1 = to12Hr($subjects[$i]['stimeE']);
		$timeStart2 = to12Hr($subjects[$i]['stimeS2']);
		$timeEnd2 = to12Hr($subjects[$i]['stimeE2']);

		$time = $timeStart1."/".$timeEnd1." ".$timeStart2."/".$timeEnd2;
	} else {
		$timeStart1 = to12Hr($subjects[$i]['stimeS']);
		$timeEnd1 = to12Hr($subjects[$i]['stimeE']);

		$time = $timeStart1."/".$timeEnd1;
	}

	if(!empty($subjects[$i]['sday2'])){
		$days = $subjects[$i]['sday']."\n".$subjects[$i]['sday2'];
	} else {
		$days = $subjects[$i]['sday'];
	}

	$pdf->Row(array($subjects[$i]['scode'],$subjects[$i]['stitle'],$subjects[$i]['units'],$ys," ",$time,"234",$days,$subjects[$i]['sroom'],"10/05/2021"));
	$RegularLoad[$i] = $subjects[$i];
	$load += $subjects[$i]['units'];
}

$pdf->SetFont('segoeui','',9);
$pdf->Cell(0,5,'Total REGULAR LOAD: '.$load.' Units',0,0,'L');
$pdf->Ln();


//Part time table
$pdf->SetFont('segoeui','',15);
$pdf->Cell(0,5,'PART-TIME LOAD',0,0,'L');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('segoeui','',9);
$FHeader = array('SUBJECT CODE','SUBJECT DESCRIPTION','UNITS','YEAR & SECTION','SUBJ. REF.','TIME','TIME CODE','DAY/S','ROOM','EFFTVTY');
$pdf->SetAligns(array('C','C','C','C','C','C','C','C','C','C'));
$pdf->SetWidths(array(20,28,12,23,13,40,17,17,17,22));
$pdf->SetLineHeight(6);
$pdf->Row(array($FHeader[0],$FHeader[1],$FHeader[2],$FHeader[3],$FHeader[4],$FHeader[5],$FHeader[6],$FHeader[7],$FHeader[8],$FHeader[9]));
$pdf->SetFont('segoeui','',11);
$pdf->SetAligns(array('C','C','C','C','C','C','C','C','C','C'));
$pdf->SetWidths(array(20,28,12,23,13,40,17,17,17,22));
$pdf->SetLineHeight(5);

$load = 0;
$incrementor = $i;
$PartTime = array();
for($i = $i; $i < count($subjects); $i++){
	$load += $subjects[$i]['units'];

	$course = FindCourse($subjects[$i]['courseID'],$courses);
	$ys = $course." ".$subjects[$i]['cyear']."-".$subjects[$i]['csection'];

	if(!empty($subjects[$i]['stimeS2']) && !empty($subjects[$i]['stimeE2'])){
		$timeStart1 = to12Hr($subjects[$i]['stimeS']);
		$timeEnd1 = to12Hr($subjects[$i]['stimeE']);
		$timeStart2 = to12Hr($subjects[$i]['stimeS2']);
		$timeEnd2 = to12Hr($subjects[$i]['stimeE2']);

		$time = $timeStart1."/".$timeEnd1." ".$timeStart2."/".$timeEnd2;
	} else {
		$timeStart1 = to12Hr($subjects[$i]['stimeS']);
		$timeEnd1 = to12Hr($subjects[$i]['stimeE']);

		$time = $timeStart1."/".$timeEnd1;
	}

	if(!empty($subjects[$i]['sday2'])){
		$days = $subjects[$i]['sday']."\n".$subjects[$i]['sday2'];
	} else {
		$days = $subjects[$i]['sday'];
	}

	$pdf->Row(array($subjects[$i]['scode'],$subjects[$i]['stitle'],$subjects[$i]['units'],$ys," ",$time,"234",$days,$subjects[$i]['sroom'],"10/05/2021"));
	$PartTime[$i-$incrementor] = $subjects[$i];
	
}

$pdf->SetFont('segoeui','',9);
$pdf->Cell(0,5,'Total PART-TIME LOAD: '.$load.' Units',0,0,'L');


//teaching load per day table
$pdf->Ln();
$pdf->SetFont('segoeui','',12);
$pdf->Cell(0,5,'TEACHING LOAD PER DAY (HOURS)',0,0,'C');
$pdf->Ln();
$tlpd = array('','MON','TUE','WED','THU','FRI','SAT','SUN');
$pdf->SetAligns(array('C','C','C','C','C','C','C','C'));
$pdf->SetWidths(array(26,26,26,26,26,26,26,26,26,26));
$pdf->SetLineHeight(6);
$pdf->Row(array($tlpd[0],$tlpd[1],$tlpd[2],$tlpd[3],$tlpd[4],$tlpd[5],$tlpd[6],$tlpd[7],));

$reg = Regular($RegularLoad);
$part = Parts($PartTime);
$all = Alls($reg,$part);

// echo "<pre>";
// print_r($all);
// echo "</pre>";

$pdf->Row($reg);
$pdf->Row($part);
$pdf->Row($all);

//Official time/advising time table
$pdf->SetFont('segoeui','',12);
$pdf->Cell(0,5,'OFFICIAL TIME/ADVISING TIME',0,0,'C');
$tlpd = array('','MON','TUE','WED','THU','FRI','SAT','SUN');
$pdf->Ln();
$pdf->SetAligns(array('C','C','C','C','C','C','C','C'));
$pdf->SetWidths(array(26,26,26,26,26,26,26,26,26,26));
$pdf->SetLineHeight(6);
$pdf->Row(array($tlpd[0],$tlpd[1],$tlpd[2],$tlpd[3],$tlpd[4],$tlpd[5],$tlpd[6],$tlpd[7],));
$pdf->SetLineHeight(9);

$pdf->Row(array('OFFICIAL TIME',' ',' ',' ',' ',' ',' ',' '));
$pdf->Row(array('ADVISING TIME',' ',' ',' ',' ',' ',' ',' '));

$pdf->Ln();

//footer
$pdf->SetFont('segoeuib','',12);
$pdf->Cell(0,5,'SUBJECT REFERRENCE LEGEND:',0,0,'L');
$pdf->Ln();
$pdf->SetFont('segoeui','',9);
$pdf->Cell(0,5,'(C) - College, (OU) Open University, (GS) - Graduate School, (PB) - Post Bac, (L) - Law, (T) iTech',0,0,'L');
$pdf->Ln();
$pdf->SetFont('segoeui','',12);
$pdf->Cell(0,5,'________________________',0,0,'R');
$pdf->Ln();
$pdf->Cell(0,5,'DR. MANUEL M. MUHI',0,0,'R');
$pdf->Output();


function Regular($Reg){
	$RegRow = array();
	$DaysName = array(' ','M','T','W','TH','F','S','SUN');
	for($c = 0; $c < 8; $c++){
		if($c == 0){
			$RegRow[$c] = "REGULAR";
		} else {
			for($d = 0; $d < count($Reg); $d++){
				if($DaysName[$c] == $Reg[$d]['sday']){
					if(!empty($RegRow[$c])){
						$RegRow[$c] += $Reg[$d]['units'];
					} else {
						$RegRow[$c] = $Reg[$d]['units'];
					}
				}
			}
		}
		if(empty($RegRow[$c])){
			$RegRow[$c] = " ";
		}
		
	}
	return $RegRow;
}

function Parts($Part){
	$PartRow = array();
	$DaysName = array(' ','M','T','W','TH','F','S','SUN');
	for($c = 0; $c < 8; $c++){
		if($c == 0){
			$PartRow[$c] = "PART-TIME";
		} else {
			for($d = 0; $d < count($Part); $d++){
				if($DaysName[$c] == $Part[$d]['sday']){
					if(!empty($PartRow[$c])){
						$PartRow[$c] += $Part[$d]['units'];
					} else {
						$PartRow[$c] = $Part[$d]['units'];
					}
				}

			}
		}
		if(empty($PartRow[$c])){
			$PartRow[$c] = " ";
		}
		
	}
	return $PartRow;
}

function Alls($reg,$part){
	$total = array();
	for($i = 0; $i < 8; $i++){
		if($i == 0){
			$total[$i] = "TOTAL";
		} else {
			if($reg[$i] == " " && !empty($part[$i])){
				$total[$i] = $part[$i];
			} elseif(!empty($reg[$i]) && $part[$i] == " "){
				$total[$i] = $reg[$i];
			} elseif($reg[$i] == " " && $part[$i] == " "){
				$total[$i] = " ";
			} else {
				$total[$i] = " ";
			}
		}
		
	}
	return $total;
}


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