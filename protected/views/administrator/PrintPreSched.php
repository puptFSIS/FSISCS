<?php
require('fpdf.php');
include("config.php");

$page = 1;

class PDF extends FPDF
{	
	function Header()
	{
		$this->AddFont('segoeui','','segoeui.php');
		$this->AddFont('segoeuib','','segoeuib.php');
		$this->AddFont('segoeuil','','segoeuil.php');
		$this->AddFont('segoeuiz','','segoeuiz.php');
		$this->AddFont('segoeuii','','segoeuii.php');
		$this->AddFont('seguisb','','seguisb.php');
		$this->SetFont('segoeui','',11);
		$this->SetTextColor(0);
	}
	
	function Footer()
	{
		$this->SetY(-15);
		$this->SetFont('Arial','I',8);
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
		$csem = $_GET['sem'];
		$sy = $_GET['sy'];
		$cat = $_GET['cat'];
		$all = "ALL";
		$this->SetFont('segoeuib','',18);
		$this->Cell(0,3,'Categorized Subjects',0,0,'C');
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
		
		if($cat == $all)
		{
			$sqlcat = "SELECT * FROM tbl_categories";
			$querycat = mysqli_query($conn,$sqlcat);
			while($rowcat = mysqli_fetch_array($querycat))
			{
				$type = $rowcat['category'];
				$this->Ln(7);                                                                                                            
				$this->SetFont('segoeuib','',15);
				$this->Cell(0,3,'' . $type,'B',0,'L');
				$this->Ln(6);
				$this->setX(10);
				$this->SetFont('seguisb','',10);
				$this->SetFillColor(210,210,210);
				$header = array('CODE', 'SUBJECT TITLE','LEC','LAB','COURSE','PROFESSOR','DAY', 'TIME', 'ROOM');
				$w = array(38, 109, 7,7,35,51, 7, 32, 24);
				$this->SetFillColor(50,50,50);
				$this->SetTextColor(255,255,255);
				for($i=0;$i<count($header);$i++)
					$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
				$this->Ln();
				$fill = false;
				$this->SetTextColor(0);
				$this->SetFont('seguisb','',9);
				
				$sqlcat1 = "SELECT * FROM tbl_subjects WHERE Category = '$type' order by Category";
				$querycat1 = mysqli_query($conn,$sqlcat1);
				while($rowcat1 = mysqli_fetch_array($querycat1))
				{
					$code = $rowcat1['SubjCode'];
					$sql = "SELECT * FROM tbl_subjectload WHERE scode = '$code' and sem = '$csem'";
					$query = mysqli_query($conn,$sql);
					while($row = mysqli_fetch_array($query))
					{
						$cuID = $row['currID'];
						$cID = $row['courseID'];
						$yrlvl = $row['cyear'];
						$spacer = "";
						$currID = checkCurrRef($cID,$yrlvl,$sy);	
						if($cuID == $currID)
						{
							$sqls = "SELECT * FROM tbl_subjectload WHERE currID = '$currID' AND scode='$code' AND cyear='$yrlvl' AND courseID='$cID' AND sem = '$csem'";
							$querys = mysqli_query($conn,$sqls);
							while($rows = mysqli_fetch_array($querys))
							{
								if(($rows['courseID'] == 1234 and $rows['cyear'] <> 1) or ($rows['courseID'] == 1232 and $rows['cyear'] <> 1) or ($rows['courseID'] == 16 and $rows['cyear'] <> 1))
								{
									$spacer = 1;	
								}
								else
								{
									$stitle = $rows['stitle'];
									$lec = $rows['hrs_lec'];
									$lab = $rows['hrs_lab'];
									$course = getCourse($rows['courseID'])." ".$rows['cyear']."-".$rows['csection'];
									$sec = $rows['csection'];
									$prof = getProf($code,$currID,$cID,$sy,$sec,$yrlvl,$csem);
									$day = getDay($code,$currID,$cID,$sy,$sec,$yrlvl,$csem);
									$time = getTime($code,$currID,$cID,$sy,$sec,$yrlvl,$csem);
									$room = getRoom($code,$currID,$cID,$sy,$sec,$yrlvl,$csem);
									
									$this->SetLineWidth(0.10);
									$this->Cell($w[0],6, '' . $code,1,0,'C',$fill);
									$this->Cell($w[1],6, ' ' . $stitle,1,0,'L',$fill);
									$this->Cell($w[2],6, '' . round(($lec),1),1,0,'C',$fill);
									$this->Cell($w[3],6, '' . round(($lab),1),1,0,'C',$fill);
									$this->Cell($w[4],6, '' . $course,1,0,'C',$fill);
									$this->Cell($w[5],6, '' . $prof,1,0,'L',$fill);
									$this->Cell($w[6],6, '' . $day,1,0,'C',$fill);
									$this->Cell($w[7],6, '' . $time,1,0,'C',$fill);
									$this->Cell($w[8],6, '' . $room,1,0,'C',$fill);
									$this->Ln();
								}
							}
						}
					}	
				}	
			}
		}
	}
}

	function getCourse($ccode) 
	{
		include("config.php");
		$sql = "SELECT * FROM tbl_course WHERE course ='$ccode'"; 
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		$code = $row['course_code'];
		return $code;
	}
	
	function getDay($scode,$currID,$cID,$sy,$sec)
	{
		include("config.php");
		$sql ="SELECT * FROM tbl_schedule WHERE scode ='$scode' AND currID = '$currID' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		$day = $row['sday'];
		return $day;
	}
	
	function getRoom($scode,$currID,$cID,$sy,$sec)
	{
		include("config.php");
		$sql ="SELECT * FROM tbl_schedule where scode ='$scode' and currID = '$currID' and schoolYear = '$sy' and courseID = '$cID' and csection = '$sec'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		$room = $row['sroom'];
		return $room;
	}
	
	function getProf($scode,$currID,$cID,$sy,$sec)
	{
		include("config.php");
		$sql ="SELECT * FROM tbl_schedule where scode ='$scode' and currID = '$currID' and schoolYear = '$sy' and courseID = '$cID' and csection = '$sec'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		$prof = getName($row['sprof']);
		return $prof;
	}
	
	function getTime($scode,$currID,$cID,$sy,$sec)
	{
		include("config.php");
		$sql ="SELECT * FROM tbl_schedule where scode ='$scode' and currID = '$currID' and schoolYear = '$sy' and courseID = '$cID' and csection = '$sec'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		if($row['stimeS']<>0){
			$time = to12Hr($row['stimeS']) . '-' . to12Hr($row['stimeE']);
		}else{
			$time = "";
		}
		return $time;
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
	
	function checkCurrRef($cID,$yr,$sy) 
	{
		include("config.php");
		$sql = "SELECT * FROM tbl_subjectloadref WHERE courseID='$cID' AND cyear='$yr' AND schoolYear = '$sy'"; 
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		$ID = $row['currID'];
		return $ID;
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
	$pdf->AddPage('L');
	$page++;
	$i = 1;
	$pdf->table($i);
	$pdf->Output();
?>