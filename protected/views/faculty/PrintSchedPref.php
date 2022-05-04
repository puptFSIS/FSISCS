<?php
require('fpdf.php');
include("config.php");
$sy = $_GET['sy'];
$sem = $_GET['sem'];
$FCode = $_GET['FCode'];

class PDF extends FPDF
{
	function Header()
	{
		$sy = $_GET['sy'];
		$sem = $_GET['sem'];
		$FCode = $_GET['FCode'];
		if($sem==1){
		$sem = "First Semester";
		}
		if($sem==2){
			$sem = "Second Semester";
		}
		if($sem==3){
			$sem = "Summer";
		}
		$this->Image('PUP Taguig.png',25,10,22);
		$this->Image('centenniallogo.gif',170,10,22);
		$this->AddFont('segoeui','','segoeui.php');
		$this->AddFont('segoeuib','','segoeuib.php');
		$this->AddFont('segoeuil','','segoeuil.php');
		$this->AddFont('segoeuiz','','segoeuiz.php');
		$this->AddFont('segoeuii','','segoeuii.php');
		$this->AddFont('seguisb','','seguisb.php');
		$this->SetFont('segoeui','',11);
		$this->SetTextColor(0);
		$this->SetFont('segoeui','',9);
		$this->Cell(0,3,'POLYTECHNIC UNIVERSITY OF THE PHILIPPINES',0,0,'C');
		$this->Ln(4);
		$this->SetFont('segoeui','',9);
		$this->Cell(0,3,'TAGUIG  BRANCH',0,0,'C');
		$this->Ln(4);
		$this->SetFont('segoeuii','',9);
		$this->Cell(0,3,'Gen. Santos Ave. Upper Bicutan, Taguig City',0,0,'C');
		$this->Ln(7);
		$this->SetFont('segoeuib','',14);
		$this->Cell(0,5,'Schedule Preference',0,0,'C');
		$this->Ln(7);
		$this->SetFont('segoeuib','',12);
		$this->Cell(0,5,''.$sem,0,0,'C');
		$this->Ln(6);
		$this->SetFont('segoeuii','',10);
		$this->Cell(0,5,'SY('.$sy.')',0,0,'C');
		$this->Ln(7);
		$profName = getName($FCode);
		$this->SetFont('segoeuii','',10);
		$this->Cell(0,5,'Professor: '.$profName,0,0,'L');
		$this->Ln(7);
	
	}
	function Footer()
	{
		
	}
	
	function table($i)
	{	
		$sy = $_GET['sy'];
		$sem = $_GET['sem'];
		$FCode = $_GET['FCode'];
		$m = "";
		$t = "";
		$wed = "";
		$th = "";
		$f = "";
		$s = "";
		
		$this->SetFont('segoeuib','',16);
		$this->SetTextColor(0,0,0);
		$this->SetCol(3);
		$this->SetFont('seguisb','',10);
		$this->SetFillColor(210,210,210);
		$header = array('TIME', 'MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY');
		$w = array(50, 25, 25, 25, 25, 25, 25);
		$this->SetFillColor(50,50,50);
		$this->SetTextColor(255,255,255);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],10,$header[$i],1,0,'C',true);
		$this->Ln();
		$fill = false;
		
		$sql = "SELECT DISTINCT bracket FROM tbl_schedPref WHERE FCode = '$FCode' ORDER BY timein ASC";
		$result = mysqli_query($conn, $sql);
		while($row=mysqli_fetch_array($result))
		{
			$time = $row['bracket'];
			$sql2="SELECT * FROM tbl_schedPref WHERE FCode = '$FCode' AND bracket = '$time' AND sy = '$sy' AND sem='$sem'";
			$result2=mysqli_query($conn, $sql2);
			$this->SetCol(3);
			$this->SetFont('segoeui','',9);
			$this->SetFillColor(245,245,245);
			$this->SetTextColor(0);
			
			while($row2 = mysqli_fetch_array($result2)) 
			{ 
				if($row2['day']=="M") 
				{
					$m = $row2['scode'];
				}
				if($row2['day']=="T") 
				{
					$t = $row2['scode'];
				}
				if($row2['day']=="W") 
				{
					$wed = $row2['scode'];
				}
				if($row2['day']=="TH") 
				{
					$th = $row2['scode'];
				}
				if($row2['day']=="F") 
				{
					$f = $row2['scode'];
				}
				if($row2['day']=="S") 
				{
					$s = $row2['scode'];
				}
			}
			
			$this->SetLineWidth(0.10);
			$this->Cell($w[0],10, '' . $time,1,0,'C',$fill);
			$this->Cell($w[1],10, '' . $m,1,0,'C',$fill);
			$this->Cell($w[2],10, '' . $t,1,0,'C',$fill);
			$this->Cell($w[3],10, '' . $wed,1,0,'C',$fill);
			$this->Cell($w[4],10, '' . $th,1,0,'C',$fill);
			$this->Cell($w[5],10, '' . $f,1,0,'C',$fill);
			$this->Cell($w[6],10, '' . $s,1,0,'C',$fill);
			$this->Ln();
			$m = "";
			$t = "";
			$wed = "";
			$th = "";
			$f = "";
			$s = "";
		}
		
		$this->SetFont('segoeuiz','',10);
		$this->SetTextColor(100,100,100);
		$this->SetFillColor(210,210,210);
		$this->Ln();
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

	function getName($fcode)
	{
		$Name = "";
		$sql = "SELECT * FROM tbl_evaluationfaculty WHERE FCode = '$fcode'";
		$result = mysqli_query($conn, $sql);
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
	$pdf->AddPage('P');
	$i=1;
	$pdf->table($i);
	$pdf->Output();
?>