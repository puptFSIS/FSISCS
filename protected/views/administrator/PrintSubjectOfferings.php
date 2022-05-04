<?php

include('pdf_mc_table.php');
$pdf = new PDF_MC_Table();
$pdf->AddPage('L');
$pdf->header();
		
$sem = "";
$sy = "";

// table

for($turn=0;$turn<count($courses);$turn++){
	$courseName = $courses[$turn]['course_code'];
	$courseNumber = $courses[$turn]['course'];
	//if the course is bsme or bsece this is the for loop they should use
	if($courseNumber == 4 OR $courseNumber == 9){
		//for loop for course year
		for($year=1; $year<=5; $year++){
			$pdf->Image('PUP Taguig.png',25,10,18);
			$pdf->Image('centenniallogo.gif',250,10,18);
			$pdf->AddFont('segoeui','','segoeui.php');
			$pdf->AddFont('segoeuib','','segoeuib.php');
			$pdf->AddFont('segoeuil','','segoeuil.php');
			$pdf->AddFont('segoeuiz','','segoeuiz.php');
			$pdf->AddFont('segoeuii','','segoeuii.php');
			$pdf->AddFont('seguisb','','seguisb.php');
			$pdf->SetFont('segoeui','',11);
			$pdf->SetTextColor(0);
			$pdf->SetFont('segoeui','',10);
			$pdf->Cell(0,5,'POLYTECHNIC UNIVERSITY OF THE PHILIPPINES',0,0,'C');
			$pdf->Ln(5);
			$pdf->SetFont('segoeui','',10);
			$pdf->Cell(0,3,'TAGUIG  BRANCH',0,0,'C');
			$pdf->Ln(4);
			$pdf->SetFont('segoeuii','',10);
			$pdf->Cell(0,3,'Gen. Santos Ave. Upper Bicutan, Taguig City',0,0,'C');
			$pdf->Ln(7);

			$pdf->Ln(5);

			$pdf->SetFont("segoeuib","",24); 
			$pdf->Cell(0,1,'Subject Offerings ',0,0,'C');
			$pdf->Ln(7);

			foreach($data as $row){
			$sy = $row['schoolYear'];
			$sem = $row['sem'];
			}

			$pdf->SetFont("segoeuib","",12);
			if($sem == 1){
				$pdf->Cell(0,1,"For ".$sem."st Semester ".$sy,0,0,'C');
			} else {
				$pdf->Cell(0,1,"For ".$sem."nd Semester ".$sy,0,0,'C');
			}
			$pdf->SetFont("segoeuib","",20);
			$pdf->SetXY(10,45);
			$pdf->Cell(300,15,$courseName,0,0,'L');
			$pdf->SetXY(230,45);

			$pdf->Cell(0,15,$year."-1",0,0,'R');
			$pdf->Ln();

			$load = 0;
			$pdf->SetFont("segoeuib","",12);
			$pdf->SetFillColor(210,210,210);
			$header = array('Code','Subject Title','Professor','Day','Units','Time', 'Room');
			$w = array(30, 95, 61,13,13, 43, 20);
			//for loop for header
				for($i=0;$i<count($header);$i++){
					$pdf->Cell($w[$i],10,$header[$i],1,0,'C');
				}
			$pdf->Ln();

			$pdf->SetFont("segoeui","",12);
			$pdf->SetAligns(array('C','L','L','C','C','C','C'));
			$pdf->SetWidths(array(30,95,61,13,13,43,20));
			$pdf->SetLineHeight(7);
			foreach($data as $row){
				if($row['cyear']==$year && $courseNumber==$row['courseID']){
					$ProfName = Professor($row['sprof'],$prof);
					if(!empty($row['sday2'])){
						$days = $row['sday']."\n".$row['sday2'];
					} else {
						$days = $row['sday'];
					}
					$timeStart1 = to12Hr($row['stimeS']);
					$timeEnd1 = to12Hr($row['stimeE']);
					$timeStart2 = to12Hr($row['stimeS2']);
					$timeEnd2 = to12Hr($row['stimeE2']);
					if (!empty($row['stimeS2']) && !empty($row['stimeE2'])) {
						$timeFull = $timeStart1."/".$timeEnd1." ".$timeStart2."/".$timeEnd2;
					} else {
						$timeFull = $timeStart1."/".$timeEnd1;
					}

					$pdf->Row(array(
						$row['scode'],
						$row['stitle'],
						$ProfName,
						$days,
						$row['units'],
						$timeFull,
						$row['sroom']
					));
					$load += $row['units'];
				}


			}
			$pdf->Ln();
			$pdf->SetFont('segoeuib','',11);
			$pdf->Cell(30,5,'Total Units: '.$load, 0, 0, 'C');
			$pdf->AddPage('L');	
		}

	} else {
		for($year=1; $year<=4; $year++){
			$pdf->Image('PUP Taguig.png',25,10,18);
			$pdf->Image('centenniallogo.gif',250,10,18);
			$pdf->AddFont('segoeui','','segoeui.php');
			$pdf->AddFont('segoeuib','','segoeuib.php');
			$pdf->AddFont('segoeuil','','segoeuil.php');
			$pdf->AddFont('segoeuiz','','segoeuiz.php');
			$pdf->AddFont('segoeuii','','segoeuii.php');
			$pdf->AddFont('seguisb','','seguisb.php');
			$pdf->SetFont('segoeui','',11);
			$pdf->SetTextColor(0);
			$pdf->SetFont('segoeui','',10);
			$pdf->Cell(0,5,'POLYTECHNIC UNIVERSITY OF THE PHILIPPINES',0,0,'C');
			$pdf->Ln(5);
			$pdf->SetFont('segoeui','',10);
			$pdf->Cell(0,3,'TAGUIG  BRANCH',0,0,'C');
			$pdf->Ln(4);
			$pdf->SetFont('segoeuii','',10);
			$pdf->Cell(0,3,'Gen. Santos Ave. Upper Bicutan, Taguig City',0,0,'C');
			$pdf->Ln(7);

			$pdf->Ln(5);

			$pdf->SetFont("segoeuib","",24); 
			$pdf->Cell(0,1,'Subject Offerings ',0,0,'C');
			$pdf->Ln(7);

			foreach($data as $row){
			$sy = $row['schoolYear'];
			$sem = $row['sem'];
			}

			$pdf->SetFont("segoeuib","",12);
			if($sem == 1){
				$pdf->Cell(0,1,"For ".$sem."st Semester ".$sy,0,0,'C');
			} else {
				$pdf->Cell(0,1,"For ".$sem."nd Semester ".$sy,0,0,'C');
			}
			$pdf->SetFont("segoeuib","",20);
			$pdf->SetXY(10,45);
			$pdf->Cell(300,15,$courseName,0,0,'L');
			$pdf->SetXY(230,45);

			$pdf->Cell(0,15,$year."-1",0,0,'R');
			$pdf->Ln();


			$pdf->SetFont("segoeuib","",12);
			$pdf->SetFillColor(210,210,210);
			$header = array('Code','Subject Title','Professor','Day','Units','Time', 'Room');
			$w = array(30, 95, 61,13,13, 43, 20);
			//for loop for header
			for($i=0;$i<count($header);$i++){
				$pdf->Cell($w[$i],10,$header[$i],1,0,'C');
			}
			$pdf->Ln();
			$load = 0;
			$pdf->SetFont("segoeui","",12);
			$pdf->SetAligns(array('C','L','L','C','C','C','C'));
			$pdf->SetWidths(array(30,95,61,13,13,43,20));
			$pdf->SetLineHeight(7);
			foreach($data as $row){
				if($row['cyear']==$year && $courseNumber==$row['courseID']){
					$ProfName = Professor($row['sprof'],$prof);
					if(!empty($row['sday2'])){
						$days = $row['sday']."\n".$row['sday2'];
					} else {
						$days = $row['sday'];
					}
					$timeStart1 = to12Hr($row['stimeS']);
					$timeEnd1 = to12Hr($row['stimeE']);
					$timeStart2 = to12Hr($row['stimeS2']);
					$timeEnd2 = to12Hr($row['stimeE2']);
					if (!empty($row['stimeS2']) && !empty($row['stimeE2'])) {
						$timeFull = $timeStart1."/".$timeEnd1." ".$timeStart2."/".$timeEnd2;
					} else {
						$timeFull = $timeStart1."/".$timeEnd1;
					}


					$pdf->Row(array(
						$row['scode'],
						$row['stitle'],
						$ProfName,
						$days,
						$row['units'],
						$timeFull,
						$row['sroom']
					));
					$load += $row['units'];
				}
			}
			$pdf->Ln();
			$pdf->SetFont('segoeuib','',11);
			$pdf->Cell(30,5,'Total Units: '.$load, 0, 0, 'C');
			
			$pdf->AddPage('L');	
		}
	}
	
}

	
$pdf->Output();

function Professor($fcode,$data){
	$FullName = "";

	foreach($data as $row){
		if($fcode == $row['FCODE']){
			$FullName = $row['FName']." ".$row['MName']." ".$row['LName'];
		}
	}
	return $FullName;
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