<?php 
require('fpdf.php');
include('config.php');
$image = "assets/Instructions.PNG";
$image2 = "assets/Instructions2.PNG";
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B','10');
$pdf->header();

$first_dtr= "SELECT * from `tbl_dtr` WHERE `FCode`='$firstfcode' AND `regpartime`='$firstreg' AND `month`='$firstmon' AND `year`='$firstyear'";
$first_resultdtr = mysqli_query($conn, $first_dtr)or die( mysqli_error($conn));

$first_dtr_timesheet = "SELECT * from `tbl_dtr_timesheet` WHERE `FCode`='$firstfcode' AND `month`='$firstmon' AND `year`='$firstyear'";
$first_resultdtrtimesheet = mysqli_query($conn, $first_dtr_timesheet)or die( mysqli_error($conn));

$second_dtr= "SELECT * from `tbl_dtr` WHERE `FCode`='$secondfcode' AND `regpartime`='$secondreg' AND `month`='$secondmon' AND `year`='$secondyear'";
$second_resultdtr = mysqli_query($conn, $second_dtr)or die( mysqli_error($conn));

$second_dtr_timesheet = "SELECT * from `tbl_dtr_timesheet` WHERE `FCode`='$secondfcode'  AND `month`='$secondmon' AND `year`='$secondyear'";
$second_resultdtrtimesheet = mysqli_query($conn, $second_dtr_timesheet)or die( mysqli_error($conn));


foreach($first_resultdtr as $newfirst_resultdtr)
{
	$sn = $newfirst_resultdtr['surname'];
	$fn = $newfirst_resultdtr['firstname'];
    $mn = $newfirst_resultdtr['middlename'];
    $regpartime = $newfirst_resultdtr['regpartime'];
    $month = $newfirst_resultdtr['month'];
    $year = $newfirst_resultdtr['year'];
    $reg_days_hrs = $newfirst_resultdtr['reg_days_hrs'];
    $saturdays = $newfirst_resultdtr['saturdays'];
    $ntd_by_offhour = $newfirst_resultdtr['ntd_by_offhour'];
    $in_charge = $newfirst_resultdtr['in_charge'];
    $new_count = $newfirst_resultdtr['days_count'];
    $fcode = $newfirst_resultdtr['FCode'];
}


foreach($first_resultdtrtimesheet as $newfirst_resultdtrtimesheet)
{
	$day_date[]= $newfirst_resultdtrtimesheet['day_date'];
   $am_arrival[]=$newfirst_resultdtrtimesheet['am_arrival'];
   $am_departure[]=$newfirst_resultdtrtimesheet['am_departure'];
   $pm_arrival[]=$newfirst_resultdtrtimesheet['pm_arrival'];
   $pm_departure[]=$newfirst_resultdtrtimesheet['pm_departure'];
   $under_hours[]=$newfirst_resultdtrtimesheet['under_hours'];
   $under_minute[]=$newfirst_resultdtrtimesheet['under_minute'];
}

foreach($second_resultdtr as $newsecond_resultdtr)
{
	$sn2 = $newsecond_resultdtr['surname'];
	$fn2 = $newsecond_resultdtr['firstname'];
    $mn2 = $newsecond_resultdtr['middlename'];
    $regpartime2 = $newsecond_resultdtr['regpartime'];
    $month2 = $newsecond_resultdtr['month'];
    $year2 = $newsecond_resultdtr['year'];
    $reg_days_hrs2 = $newsecond_resultdtr['reg_days_hrs'];
    $saturdays2 = $newsecond_resultdtr['saturdays'];
    $ntd_by_offhour2 = $newsecond_resultdtr['ntd_by_offhour'];
    $in_charge2 = $newsecond_resultdtr['in_charge'];
    $new_count2 = $newsecond_resultdtr['days_count'];
    $fcode2 = $newsecond_resultdtr['FCode'];
}

foreach($second_resultdtrtimesheet as $newsecond_resultdtrtimesheet)
{
	$day_date2[]= $newsecond_resultdtrtimesheet['day_date'];
   $am_arrival2[]=$newsecond_resultdtrtimesheet['am_arrival'];
   $am_departure2[]=$newsecond_resultdtrtimesheet['am_departure'];
   $pm_arrival2[]=$newsecond_resultdtrtimesheet['pm_arrival'];
   $pm_departure2[]=$newsecond_resultdtrtimesheet['pm_departure'];
   $under_hours2[]=$newsecond_resultdtrtimesheet['under_hours'];
   $under_minute2[]=$newsecond_resultdtrtimesheet['under_minute'];
}




$pdf->SetXY(75, 10);
$pdf->SetFont('Arial','B','8');
$pdf->Write(0,$regpartime);

$pdf->SetXY(10, 13);
$pdf->SetFont('Arial','','6');
$pdf->Write(0,'Civil Service Form No. 48');


$pdf->SetXY(25, 18);
$pdf->SetFont('Arial','B','14');
$pdf->Write(0,'DAILY TIME RECORD');


$pdf->SetXY(38.5, 22);
$pdf->SetFont('Arial','B','8');
$pdf->Write(0,'----------o0o----------');

$pdf->SetXY(32, 26);
$pdf->SetFont('Arial','B','12');
// $pdf->Write(1,'GECILIE C. ALMIRANEZ');
// $pdf->Write(1,'(FACULTY NAME)');
$pdf->Write(1,$fn." ".$mn." ".$sn);


$pdf->SetXY(15, 28);
$pdf->SetFont('Arial','B','5');
$pdf->Write(1,'________________________________________________________________________');

$pdf->SetXY(44, 31);
$pdf->SetFont('Arial','','8');
$pdf->Write(1,'(Name)');

$pdf->SetXY(60, 35);
$pdf->SetFont('Arial','BI','9');
$pdf->Write(1,$month." ".$year);

$pdf->SetXY(16, 36);
$pdf->SetFont('Arial','I','8.5');
$pdf->Write(1,'For the month of          _______________________');

$pdf->SetXY(18, 41);
$pdf->SetFont('Arial','I','8.5');
$pdf->Write(1,'Official hours for          Regular days     _________');

$pdf->SetXY(16, 45);
$pdf->SetFont('Arial','I','8.5');
$pdf->Write(1,'arrival and departure            Saturday     _________');

$pdf->SetXY(75, 41);
$pdf->SetFont('Arial','BI','9');
$pdf->Write(1,$reg_days_hrs);

$pdf->SetXY(75, 45);
$pdf->SetFont('Arial','BI','9');
$pdf->Write(1,$saturdays);

//------------------------------------------------------------------------------------------------//
$pdf->SetFont('Arial','','7');
$pdf->SetXY(17, 51);
$pdf->Cell(6.8,11,'DAY',1,0,'C');

$pdf->SetFont('Arial','B','10');
$pdf->SetXY(24, 51);
$pdf->Cell(22,4,'A.M.',1,0,'C');

$pdf->SetFont('Arial','B','7');
$pdf->SetXY(24, 55);
$pdf->Cell(11,7,'Arrival',1,0,'C');

$pdf->SetFont('Arial','B','6');
$pdf->SetXY(35, 55);
$pdf->Cell(11,7,'Departure',1,0,'C');

$pdf->SetFont('Arial','B','10');
$pdf->SetXY(46, 51);
$pdf->Cell(22,4,'P.M.',1,0,'C');

$pdf->SetFont('Arial','B','7');
$pdf->SetXY(46, 55);
$pdf->Cell(11,7,'Arrival',1,0,'C');

$pdf->SetFont('Arial','B','6');
$pdf->SetXY(57, 55);
$pdf->Cell(11,7,'Departure',1,0,'C');

$pdf->SetFont('Arial','B','10');
$pdf->SetXY(68, 51);
$pdf->Cell(22,4,'Undertime',1,0,'C');
	
$pdf->SetFont('Arial','B','7');
$pdf->SetXY(68, 55);
$pdf->Cell(11,7,'Hours',1,0,'C');

$pdf->SetFont('Arial','B','6.5');
$pdf->SetXY(79, 55);
$pdf->Cell(11,7,'Minutes',1,0,'C');

$y = 5;

for ($x = 1; $x <= 31; $x++)
{
	if ($x >= 2 && $x <= 31)
		{
			$y = $y + 5;
		}
	if(array_key_exists($x-1,$day_date)){
		$pdf->SetFont('Arial','','8.6');
		$pdf->SetXY(17, 57 + $y);
		$pdf->Cell(6.8,5,$x,1,0,'C');

		$pdf->SetFont('Arial','B','9');
		$pdf->SetXY(24, 57 + $y);
		$pdf->Cell(11,5,$am_arrival[$x-1],1,0,'C');

		$pdf->SetFont('Arial','B','9');
		$pdf->SetXY(35, 57 + $y);
		$pdf->Cell(11,5,$am_departure[$x-1],1,0,'C');

		$pdf->SetFont('Arial','B','9');
		$pdf->SetXY(46, 57 + $y);
		$pdf->Cell(11,5,$pm_arrival[$x-1],1,0,'C');

		$pdf->SetFont('Arial','B','9');
		$pdf->SetXY(57, 57 + $y);
		$pdf->Cell(11,5,$pm_departure[$x-1],1,0,'C');

		$pdf->SetFont('Arial','B','9');
		$pdf->SetXY(68, 57 + $y);
		$pdf->Cell(11,5,$under_hours[$x-1],1,0,'C');

		$pdf->SetFont('Arial','B','9');
		$pdf->SetXY(79, 57 + $y);
		$pdf->Cell(11,5,$under_minute[$x-1],1,0,'C');

	}
	else {
	$pdf->SetFont('Arial','','8.6');
	$pdf->SetXY(17, 57 + $y);
	$pdf->Cell(6.8,5,$x,1,0,'C');

	$pdf->SetFont('Arial','B','10');
	$pdf->SetXY(24, 57 + $y);
	$pdf->Cell(11,5,'',1,0,'C');

	$pdf->SetFont('Arial','B','10');
	$pdf->SetXY(35, 57 + $y);
	$pdf->Cell(11,5,'',1,0,'C');

	$pdf->SetFont('Arial','B','10');
	$pdf->SetXY(46, 57 + $y);
	$pdf->Cell(11,5,'',1,0,'C');

	$pdf->SetFont('Arial','B','10');
	$pdf->SetXY(57, 57 + $y);
	$pdf->Cell(11,5,'',1,0,'C');

	$pdf->SetFont('Arial','B','10');
	$pdf->SetXY(68, 57 + $y);
	$pdf->Cell(11,5,'',1,0,'C');

	$pdf->SetFont('Arial','B','10');
	$pdf->SetXY(79, 57 + $y);
	$pdf->Cell(11,5,'',1,0,'C');
}
    
} 

$pdf->SetFont('Arial','B','11');
$pdf->SetXY(17, 62+$y);
$pdf->Cell(51,5,'Total',1,0,'R');

$pdf->SetFont('Arial','B','13');
$pdf->SetXY(68, 62+$y);
$pdf->Cell(11,5,'',1,0,'C');

$pdf->SetFont('Arial','B','13');
$pdf->SetXY(79, 62+$y);
$pdf->Cell(11,5,'',1,0,'C');

$pdf->SetXY(16, 225);
$pdf->SetFont('Arial','I','8');
$pdf->Write(1,'I certify on my honor that the above is a true and correct');
 		 

$pdf->SetXY(16, 228);
$pdf->SetFont('Arial','I','8');
$pdf->Write(1,'report of the hours of work performed, record of which was');

$pdf->SetXY(16, 231);
$pdf->SetFont('Arial','I','8');
$pdf->Write(1,'made daily at the time of arrival and departure from office.');

$pdf->SetXY(25, 240);
$pdf->SetFont('Arial','B','15');
$pdf->Write(1,$ntd_by_offhour);
// $pdf->Write(1,'(GECILIE C. ALMIRANEZ)');

$pdf->SetXY(17, 243);
$pdf->SetFont('Arial','B','5');
$pdf->Write(1,'________________________________________________________________________');

$pdf->SetXY(23, 247);
$pdf->SetFont('Arial','I','9');
$pdf->Write(1,'Noted by as to the prescribed office hours');

$pdf->SetXY(25, 261);
$pdf->SetFont('Arial','B','15');
$pdf->Write(1,$in_charge);
// $pdf->Write(1,'GARY ANTONIO C. LIRIO');


$pdf->SetXY(17, 264);
$pdf->SetFont('Arial','B','5');
$pdf->Write(1,'__________________________________________________________________________');

$pdf->SetXY(46, 267);
$pdf->SetFont('Arial','I','9');
$pdf->Write(1,'In Charge');




//------------------------------- RIGHT SIDE DTR -------------------------------------------

$pdf->SetXY(180, 10);
$pdf->SetFont('Arial','B','8');
$pdf->Write(0,$regpartime2);

$pdf->SetXY(115, 13);
$pdf->SetFont('Arial','','6');
$pdf->Write(0,'Civil Service Form No. 48');


$pdf->SetXY(130, 18);
$pdf->SetFont('Arial','B','14');
$pdf->Write(0,'DAILY TIME RECORD');


$pdf->SetXY(143.5, 22);
$pdf->SetFont('Arial','B','8');
$pdf->Write(0,'----------o0o----------');

$pdf->SetXY(137, 26);
$pdf->SetFont('Arial','B','12');
$pdf->Write(1,$fn2." ".$mn2." ".$sn2);


$pdf->SetXY(120, 28);
$pdf->SetFont('Arial','B','5');
$pdf->Write(1,'________________________________________________________________________');

$pdf->SetXY(149, 31);
$pdf->SetFont('Arial','','8');
$pdf->Write(1,'(Name)');

$pdf->SetXY(165, 35);
$pdf->SetFont('Arial','BI','9');
$pdf->Write(1,$month2." ".$year2);

$pdf->SetXY(121, 36);
$pdf->SetFont('Arial','I','8.5');
$pdf->Write(1,'For the month of          _______________________');

$pdf->SetXY(123, 41);
$pdf->SetFont('Arial','I','8.5');
$pdf->Write(1,'Official hours for          Regular days     _________');

$pdf->SetXY(121, 45);
$pdf->SetFont('Arial','I','8.5');
$pdf->Write(1,'arrival and departure            Saturday     _________');

$pdf->SetXY(180, 41);
$pdf->SetFont('Arial','BI','9');
$pdf->Write(1,$reg_days_hrs2);

$pdf->SetXY(180, 45);
$pdf->SetFont('Arial','BI','9');
$pdf->Write(1,$saturdays2);

//------------------------------------------------------------------------------------------------//
$pdf->SetFont('Arial','','7');
$pdf->SetXY(122, 51);
$pdf->Cell(6.8,11,'DAY',1,0,'C');

$pdf->SetFont('Arial','B','11.5');
$pdf->SetXY(129, 51);
$pdf->Cell(22,4,'A.M.',1,0,'C');

$pdf->SetFont('Arial','B','7');
$pdf->SetXY(129, 55);
$pdf->Cell(11,7,'Arrival',1,0,'C');

$pdf->SetFont('Arial','B','6');
$pdf->SetXY(140, 55);
$pdf->Cell(11,7,'Departure',1,0,'C');

$pdf->SetFont('Arial','B','11.5');
$pdf->SetXY(151, 51);
$pdf->Cell(22,4,'P.M.',1,0,'C');

$pdf->SetFont('Arial','B','7');
$pdf->SetXY(151, 55);
$pdf->Cell(11,7,'Arrival',1,0,'C');

$pdf->SetFont('Arial','B','6');
$pdf->SetXY(162, 55);
$pdf->Cell(11,7,'Departure',1,0,'C');

$pdf->SetFont('Arial','B','11');
$pdf->SetXY(173, 51);
$pdf->Cell(22,4,'Undertime',1,0,'C');
	
$pdf->SetFont('Arial','B','7');
$pdf->SetXY(173, 55);
$pdf->Cell(11,7,'Hours',1,0,'C');

$pdf->SetFont('Arial','B','6.5');
$pdf->SetXY(184, 55);
$pdf->Cell(11,7,'Minutes',1,0,'C');

$y = 5;
for ($x = 1; $x <= 31; $x++)
{
if ($x >= 2 && $x <= 31)
{
	$y = $y + 5;
}
if(array_key_exists($x-1,$day_date2))
{
		$pdf->SetFont('Arial','','8.6');
		$pdf->SetXY(122, 57 + $y);
		$pdf->Cell(6.8,5,$x,1,0,'C');

		$pdf->SetFont('Arial','B','9');
		$pdf->SetXY(129, 57 + $y);
		$pdf->Cell(11,5,$am_arrival2[$x-1],1,0,'C');

		$pdf->SetFont('Arial','B','9');
		$pdf->SetXY(140, 57 + $y);
		$pdf->Cell(11,5,$am_departure2[$x-1],1,0,'C');

		$pdf->SetFont('Arial','B','9');
		$pdf->SetXY(151, 57 + $y);
		$pdf->Cell(11,5,$pm_arrival2[$x-1],1,0,'C');

		$pdf->SetFont('Arial','B','9');
		$pdf->SetXY(162, 57 + $y);
		$pdf->Cell(11,5,$pm_departure2[$x-1],1,0,'C');

		$pdf->SetFont('Arial','B','9');
		$pdf->SetXY(173, 57 + $y);
		$pdf->Cell(11,5,$under_hours2[$x-1],1,0,'C');

		$pdf->SetFont('Arial','B','9');
		$pdf->SetXY(184, 57 + $y);
		$pdf->Cell(11,5,$under_minute2[$x-1],1,0,'C');

	}
 else {
 	$pdf->SetFont('Arial','','10');
		$pdf->SetXY(122, 57 + $y);
		$pdf->Cell(6.8,5,$x,1,0,'C');

		$pdf->SetFont('Arial','B','13');
		$pdf->SetXY(129, 57 + $y);
		$pdf->Cell(11,5,'',1,0,'C');

		$pdf->SetFont('Arial','B','13');
		$pdf->SetXY(140, 57 + $y);
		$pdf->Cell(11,5,'',1,0,'C');

		$pdf->SetFont('Arial','B','13');
		$pdf->SetXY(151, 57 + $y);
		$pdf->Cell(11,5,'',1,0,'C');

		$pdf->SetFont('Arial','B','13');
		$pdf->SetXY(162, 57 + $y);
		$pdf->Cell(11,5,'',1,0,'C');

		$pdf->SetFont('Arial','B','13');
		$pdf->SetXY(173, 57 + $y);
		$pdf->Cell(11,5,'',1,0,'C');

		$pdf->SetFont('Arial','B','13');
		$pdf->SetXY(184, 57 + $y);
		$pdf->Cell(11,5,'',1,0,'C');
 }

}

$pdf->SetFont('Arial','B','13');
$pdf->SetXY(122, 62+$y);
$pdf->Cell(51,5,'Total',1,0,'R');

$pdf->SetFont('Arial','B','13');
$pdf->SetXY(173, 62+$y);
$pdf->Cell(11,5,'',1,0,'C');

$pdf->SetFont('Arial','B','13');
$pdf->SetXY(184, 62+$y);
$pdf->Cell(11,5,'',1,0,'C');

$pdf->SetXY(121, 225);
$pdf->SetFont('Arial','I','8');
$pdf->Write(1,'I certify on my honor that the above is a true and correct');
 		 

$pdf->SetXY(121, 228);
$pdf->SetFont('Arial','I','8');
$pdf->Write(1,'report of the hours of work performed, record of which was');

$pdf->SetXY(121, 231);
$pdf->SetFont('Arial','I','8');
$pdf->Write(1,'made daily at the time of arrival and departure from office.');

$pdf->SetXY(119.5, 240);
$pdf->SetFont('Arial','B','15');
$pdf->Write(1,$ntd_by_offhour2);
// $pdf->Write(1,'(GECILIE C. ALMIRANEZ)');



$pdf->SetXY(122, 243);
$pdf->SetFont('Arial','B','5');
$pdf->Write(1,'________________________________________________________________________');

$pdf->SetXY(127, 247);
$pdf->SetFont('Arial','I','9');
$pdf->Write(1,'Noted by as to the prescribed office hours:');

$pdf->SetXY(119, 261);
$pdf->SetFont('Arial','B','15');
$pdf->Write(1,$in_charge2);
// $pdf->Write(1,'GARY ANTONIO C. LIRIO');


$pdf->SetXY(122, 264);
$pdf->SetFont('Arial','B','5');
$pdf->Write(1,'__________________________________________________________________________');

$pdf->SetXY(151, 267);
$pdf->SetFont('Arial','I','9');
$pdf->Write(1,'In Charge');


// -------------------------------------SECOND PAGE LEFT SIDE------------------------------------- //
$pdf->AddPage();
$pdf->Cell( 60, 40, $pdf->Image($image, $pdf->GetX(), $pdf->GetY(), 85,150), 0, 0, 'L', false );
$pdf->Cell( 60, 45, $pdf->Image($image2, $pdf->GetX()-60, $pdf->GetY()+150.2, 85,108), 0, 0, 'L', false );

// -------------------------------------SECOND PAGE RIGHT SIDE------------------------------------- //
$pdf->Cell( 60, 40, $pdf->Image($image, $pdf->GetX()-15, $pdf->GetY(), 85,150), 0, 0, 'L', false );
$pdf->Cell( 60, 45, $pdf->Image($image2, $pdf->GetX()-75, $pdf->GetY()+150.2, 85,108), 0, 0, 'L', false );

$pdf->Output();

 ?>