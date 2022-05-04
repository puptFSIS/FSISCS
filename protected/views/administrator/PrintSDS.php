<?php
require('fpdf.php');
include("config.php");

$page = 1;
$cID = $_GET['course'];

class PDF extends FPDF
{
	function Header()
	{
		//$this->Image('PUP Taguig.png',20,10,30);
		//$this->Image('centenniallogo.gif',165,10,30);
		$this->AddFont('segoeui','','segoeui.php');
		$this->AddFont('segoeuib','','segoeuib.php');
		$this->AddFont('segoeuil','','segoeuil.php');
		$this->AddFont('segoeuiz','','segoeuiz.php');
		$this->AddFont('segoeuii','','segoeuii.php');
		$this->AddFont('seguisb','','seguisb.php');
		$this->SetFont('segoeui','',11);
		$this->SetTextColor(0);
		$csem = $_GET['sem'];
		$sy = $_GET['sy'];
		$cors = $_GET['course'];
		$this->SetFont('segoeuib','',18);
		$this->Cell(0,3,'Student Daily Schedule',0,0,'C');
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
	}
	
	/*
	function Footer()
	{
		$this->SetY(-15);
		$this->SetFont('Arial','I',8);
		$this->Cell(0,10,'Page '.$this->PageNo(),0,0,'R');
	}
	*/
	
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
			include("config.php");
			$csem = $_GET['sem'];
			$sy = $_GET['sy'];
			$cors = $_GET['course'];
			$this->Ln(5);
			$this->SetFont('segoeuib','',15);
			$this->Cell(0,3,'' .getCourse($cors).'  '.$cYear.'-1',0,0,'L');
			$this->Ln(7);
			$this->setX(10);
			$this->SetFont('seguisb','',10);
			$this->SetFillColor(210,210,210);
			$header = array('TIME', 'MONDAY','TUESDAY','WEDNESDAY','THURSDAY','FRIDAY','SATURDAY');
			$w = array(40, 45, 45, 45, 45, 45, 45);
			$this->SetFillColor(50,50,50);
			$this->SetTextColor(255,255,255);
			for($i=0;$i<count($header);$i++)
				$this->Cell($w[$i],6,$header[$i],1,0,'C',true);
			$this->Ln();
			$fill = false;
			$this->SetTextColor(0);
			
			/**
			*eto ung mga variable para sa display, 2 yan kasi up to 2 lng ung maximum na display ng schedule kada box.
			*/
			$codeM = $codeT = $codeW = $codeTH = $codeF = $codeS = "";
			$secM =  $secT = $secW = $secTH = $secF = $secS = "";
			$yrlvlM = $yrlvlT = $yrlvlW = $yrlvlTH = $yrlvlF = $yrlvlS = ""; 
			$courseM = $courseT = $courseW =  $courseTH = $courseF = $courseS = "";
			$timeM = $timeT = $timeW = $timeTH = $timeF = $timeS = "";
			$roomM = $roomT = $roomW = $roomTH = $roomF = $roomS = "";
			$profM = $profT = $profW = $profTH = $profF = $profS = "";
			$startM = $startT = $startW = $startTH = $startF = $startS = 0;
			
			$codeM2 = $codeT2 = $codeW2 = $codeTH2 = $codeF2 = $codeS2 = "";
			$secM2 = $secT2 = $secW2 = $secTH2 = $secF2 = $secS2 = "";
			$yrlvlM2 = $yrlvlT2 = $yrlvlW2 = $yrlvlTH2 = $yrlvlF2 = $yrlvlS2 = ""; 
			$courseM2 = $courseT2 = $courseW2 = $courseTH2 = $courseF2 = $courseS2 = "";
			$timeM2 = $timeT2 = $timeW2 = $timeTH2 = $timeF2 = $timeS2 = "";
			$roomM2 = $roomT2 = $roomW2 = $roomTH2 = $roomF2 = $roomS2 = "";
			$profM2 = $profT2 = $profW2 = $profTH2 = $profF2 = $profS2 = "";
			$startM2 = $startT2 = $startW2 = $startTH2 = $startF2 = $startS2 = 0;
			
			/**
			*eto ung count kung may laman na ung isang box, kung meron na laman sa pangalawang variable ng time nya na ilalagay ung display ng time ska room.
			*/
			$cM = $cT = $cW = $cTH = $cF = $cS = 0;

			$currID = checkCurrRef($cors,$cYear,$sy);
			
			$sql1 = "SELECT * FROM tbl_schedule WHERE sem = '$csem' and schoolYear = '$sy' and courseID = '$cors' and currID = '$currID' and cyear = '$cYear' and stimeS < 1030";
			$query1 = mysqli_query($conn,$sql1);
			while($row1 = mysqli_fetch_array($query1))
			{
				$currID = $row1['currID'];
				$cID = $row1['courseID'];
				//$day = getDay($row1['scode'],$row1['currID'],$row1['courseID'],$sy,$row1['csection'],$row1['cyear'],$csem);
				if($row1['sday']=='M' and $row1['stimeS']<1030)
				{
					if($cM == 0)
					{
						$startM = $row1['stimeS'];
						$codeM = $row1['scode'];									
						$secM = $row1['csection'];
						$yrlvlM = $row1['cyear'];
						$profM = getProf($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
						if($row1['stimeS']<>730 or $row1['stimeE']<>1030)
						{
							$timeM = getTime($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
						}
						else
						{
							$timeM = "";
						}
						$roomM = getRoom($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
						$cM = $cM + 1;
					}else if($cM > 0)
					{
						$startM2 = $row1['stimeS'];
						$codeM2 = $row1['scode'];									
						$secM2 = $row1['csection'];
						$yrlvlM2 = $row1['cyear'];
						$profM2 = getProf($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
						if($row1['stimeS']<>730 or $row1['stimeE'] <> 1030)
						{
							$timeM2 = getTime($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
						}
						else
						{
							$timeM2 = "";
						}
						$roomM2 = getRoom($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
					}
				}
				else if($row1['sday']=='T' and $row1['stimeS']<1030)
				{
					if($cT == 0)
					{
						$startT = $row1['stimeS'];
						$codeT = $row1['scode'];									
						$secT = $row1['csection'];
						$yrlvlT = $row1['cyear'];
						$profT = getProf($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);										
						if($row1['stimeS']<>730 or $row1['stimeE'] <> 1030)
						{
							$timeT = getTime($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);
						}
						else
						{
							$timeT = "";
						}	
						$roomT = getRoom($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);
						$cT = $cT + 1;
					}elseif ($cT > 0)
					{
						$startT2 = $row1['stimeS'];
						$codeT2 = $row1['scode'];									
						$secT2 = $row1['csection'];
						$yrlvlT2 = $row1['cyear'];
						$profT2 = getProf($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);										
						if($row1['stimeS']<>730 or $row1['stimeE'] <> 1030)
						{
							$timeT2 = getTime($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);
						}
						else
						{
							$timeT2 = "";
						}	
						$roomT2 = getRoom($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);
					}
				}
				else if($row1['sday']=='W' and $row1['stimeS']<1030)
				{
					if($cW == 0)
					{	
						$startW = $row1['stimeS'];
						$codeW = $row1['scode'];									
						$secW = $row1['csection'];
						$yrlvlW = $row1['cyear'];
						$profW = getProf($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);										
						if($row1['stimeS']<>730 or $row1['stimeE'] <> 1030)
						{
							$timeW = getTime($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);
						}
						else
						{
							$timeW = "";
						}		
						$roomW = getRoom($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);
						$cW = $cW + 1;
					}elseif ($cW > 0)
					{
						$startW2 = $row1['stimeS'];
						$codeW2 = $row1['scode'];									
						$secW2 = $row1['csection'];
						$yrlvlW2 = $row1['cyear'];
						$profW2 = getProf($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);									
						if($row1['stimeS']<>730 or $row1['stimeE'] <> 1030)
						{
							$timeW2 = getTime($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);
						}
						else
						{
							$timeW2 = "";
						}		
						$roomW2 = getRoom($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);
					}	
				}
				else if($row1['sday']=='TH' and $row1['stimeS']<1030)
				{
					if($cTH == 0)
					{
						$startTH = $row1['stimeS'];
						$codeTH = $row1['scode'];									
						$secTH = $row1['csection'];
						$yrlvlTH = $row1['cyear'];
						$profTH = getProf($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);											
						if($row1['stimeS']<>730 or $row1['stimeE'] <> 1030)
						{
							$timeTH = getTime($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);
						}
						else
						{
							$timeTH = "";
						}	
						$roomTH = getRoom($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);
						$cTH = $cTH + 1;
					}elseif($cTH > 0)
					{
						$startTH2 = $row1['stimeS'];
						$codeTH2 = $row1['scode'];									
						$secTH2 = $row1['csection'];
						$yrlvlTH2 = $row1['cyear'];
						$profTH2 = getProf($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);								
						if($row1['stimeS']<>730 or $row1['stimeE'] <> 1030)
						{
							$timeTH2 = getTime($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);
						}
						else
						{
							$timeTH2 = "";
						}	
						$roomTH2 = getRoom($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);
					}
				}
				else if($row1['sday']=='F' and $row1['stimeS']<1030)
				{
					if($cF == 0)
					{
						$startF = $row1['stimeS'];
						$codeF = $row1['scode'];									
						$secF = $row1['csection'];
						$yrlvlF = $row1['cyear'];
						$profF = getProf($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);										
						if($row1['stimeS']<>730 or $row1['stimeE'] <> 1030)
						{
							$timeF = getTime($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);
						}
						else
						{
							$timeF = "";
						}	
						$roomF = getRoom($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);
						$cF = $cF + 1;
					}elseif($cF > 0)
					{
						$startF2 = $row1['stimeS'];
						$codeF2 = $row1['scode'];									
						$secF2 = $row1['csection'];
						$yrlvlF2 = $row1['cyear'];
						$profF2 = getProf($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);										
						if($row1['stimeS']<>730 or $row1['stimeE'] <> 1030)
						{
							$timeF2 = getTime($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);
						}
						else
						{
							$timeF2 = "";
						}	
						$roomF2 = getRoom($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);
					}
				}
				else if($row1['sday']=='S' and $row1['stimeS']<1030)
				{
					if($cS == 0)
					{
						$startS = $row1['stimeS'];
						$codeS = $row1['scode'];									
						$secS = $row1['csection'];
						$yrlvlS = $row1['cyear'];
						$profS = getProf($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
						if($row1['stimeS']<>730 or $row1['stimeE'] <> 1030)
						{
							$timeS = getTime($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
						}
						else
						{
							$timeS = "";
						}
						$roomS = getRoom($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
						$cS = $cS + 1;
					}else if($cS > 0)
					{
						$startS2 = $row1['stimeS'];
						$codeS2 = $row1['scode'];									
						$secS2 = $row1['csection'];
						$yrlvlS2 = $row1['cyear'];
						$profS2 = getProf($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
						if($row1['stimeS']<>730 or $row1['stimeE'] <> 1030)
						{
							$timeS2 = getTime($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
						}
						else
						{
							$timeS2 = "";
						}
						$roomS2 = getRoom($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
					}
				}
			}	
			
			$sql1 = "SELECT * FROM tbl_schedule WHERE sem = '$csem' and schoolYear = '$sy' and courseID = '$cors' and currID = '$currID' and cyear = '$cYear' and stimeS2 < 1030";
			$query1 = mysqli_query($conn,$sql1);
			while($row1 = mysqli_fetch_array($query1))
			{
				$currID = $row1['currID'];
				$cID = $row1['courseID'];
				
				if($row1['sday2']=='M' and $row1['stimeS2']<1030)
				{
					if($cM == 0)
					{
						$startM = $row1['stimeS2'];
						$codeM = $row1['scode'];									
						$secM = $row1['csection'];
						$yrlvlM = $row1['cyear'];
						$profM = getProf($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
						if($row1['stimeS2']<>730 or $row1['stimeE2'] <> 1030)
						{
							$timeM = getTime2($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
						}
						else
						{
							$timeM = "";
						}
						$roomM = getRoom2($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
						$cM = $cM + 1;
					}else if($cM > 0)
					{
						$startM2 = $row1['stimeS2'];
						$codeM2 = $row1['scode'];									
						$secM2 = $row1['csection'];
						$yrlvlM2 = $row1['cyear'];
						$profM2 = getProf($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
						if($row1['stimeS2']<>730 or $row1['stimeE2'] <> 1030)
						{
							$timeM2 = getTime2($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
						}
						else
						{
							$timeM2 = "";
						}
						$roomM2 = getRoom2($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
					}		
				}
				else if($row1['sday2']=='T' and $row1['stimeS2']<1030)
				{
					if($cT == 0)
					{
						$startT = $row1['stimeS2'];
						$codeT = $row1['scode'];									
						$secT = $row1['csection'];
						$yrlvlT = $row1['cyear'];
						$profT = getProf($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);							
						if($row1['stimeS2']<>730 or $row1['stimeE2'] <> 1030)
						{
							$timeT = getTime2($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);
						}
						else
						{
							$timeT = "";
						}	
						$roomT = getRoom2($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);
						$cT = $cT + 1;
					}elseif ($cT > 0)
					{
						$startT2 = $row1['stimeS2'];
						$codeT2 = $row1['scode'];									
						$secT2 = $row1['csection'];
						$yrlvlT2 = $row1['cyear'];
						$profT2 = getProf($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);								
						if($row1['stimeS2']<>730 or $row1['stimeE2'] <> 1030)
						{
							$timeT2 = getTime2($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);
						}
						else
						{
							$timeT2 = "";
						}	
						$roomT2 = getRoom2($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);
					}
				}
				else if($row1['sday2']=='W' and $row1['stimeS2']<1030)
				{
					if($cW == 0)
					{
						$startW = $row1['stimeS2'];
						$codeW = $row1['scode'];									
						$secW = $row1['csection'];
						$yrlvlW = $row1['cyear'];
						$profW = getProf($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);									
						if($row1['stimeS2']<>730 or $row1['stimeE2'] <> 1030)
						{
							$timeW = getTime2($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);
						}
						else
						{
							$timeW = "";
						}		
						$roomW = getRoom2($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);
						$cW = $cW + 1;
					}elseif ($cW > 0)
					{
						$startW2 = $row1['stimeS2'];
						$codeW2 = $row1['scode'];									
						$secW2 = $row1['csection'];
						$yrlvlW2 = $row1['cyear'];
						$profW2 = getProf($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);										
						if($row1['stimeS2']<>730 or $row1['stimeE2'] <> 1030)
						{
							$timeW2 = getTime2($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);
						}
						else
						{
							$timeW2 = "";
						}		
						$roomW2 = getRoom2($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);
					}
				}
				else if($row1['sday2']=='TH' and $row1['stimeS2']<1030)
				{
					if($cTH == 0)
					{
						$startTH = $row1['stimeS2'];
						$codeTH = $row1['scode'];									
						$secTH = $row1['csection'];
						$yrlvlTH = $row1['cyear'];
						$profTH = getProf($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);										
						if($row1['stimeS2']<>730 or $row1['stimeE2'] <> 1030)
						{
							$timeTH = getTime2($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);
						}
						else
						{
							$timeTH = "";
						}	
						$roomTH = getRoom2($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);
						$cTH = $cTH + 1;
					}elseif($cTH > 0)
					{
						$startTH2 = $row1['stimeS2'];
						$codeTH2 = $row1['scode'];									
						$secTH2 = $row1['csection'];
						$yrlvlTH2 = $row1['cyear'];
						$profTH2 = getProf($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);										
						if($row1['stimeS2']<>730 or $row1['stimeE2'] <> 1030)
						{
							$timeTH2 = getTime2($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);
						}
						else
						{
							$timeTH2 = "";
						}	
						$roomTH2 = getRoom2($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);
					}
				}
				else if($row1['sday2']=='F' and $row1['stimeS2']<1030)
				{
					if($cF == 0)
					{
						$startF = $row1['stimeS2'];
						$codeF = $row1['scode'];									
						$secF = $row1['csection'];
						$yrlvlF = $row1['cyear'];
						$profF = getProf($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);											
						if($row1['stimeS2']<>730 or $row1['stimeE2'] <> 1030)
						{
							$timeF = getTime2($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);
						}
						else
						{
							$timeF = "";
						}	
						$roomF = getRoom2($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);
						$cF = $cF + 1;
					}elseif($cF > 0)
					{
						$startF2 = $row1['stimeS2'];
						$codeF2 = $row1['scode'];									
						$secF2 = $row1['csection'];
						$yrlvlF2 = $row1['cyear'];
						$profF2 = getProf($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);											
						if($row1['stimeS2']<>730 or $row1['stimeE2'] <> 1030)
						{
							$timeF2 = getTime2($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);
						}
						else
						{
							$timeF2 = "";
						}	
						$roomF2 = getRoom2($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);
					}	
				}
				else if($row1['sday2']=='S' and $row1['stimeS2']<1030)
				{
					if($cS == 0)
					{
						$startS = $row1['stimeS2'];
						$codeS = $row1['scode'];									
						$secS = $row1['csection'];
						$yrlvlS = $row1['cyear'];
						$profS = getProf($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
						if($row1['stimeS2']<>730 or $row1['stimeE2'] <> 1030)
						{
							$timeS = getTime2($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
						}
						else
						{
							$timeS = "";
						}
						$roomS = getRoom2($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
						$cS = $cS + 1;
					}else if($cS > 0)
					{
						$startS2 = $row1['stimeS2'];
						$codeS2 = $row1['scode'];									
						$secS2 = $row1['csection'];
						$yrlvlS2 = $row1['cyear'];
						$profS2 = getProf($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
						if($row1['stimeS2']<>730 or $row1['stimeE2'] <> 1030)
						{
							$timeS2 = getTime2($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
						}
						else
						{
							$timeS2 = "";
						}
						$roomS2 = getRoom2($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
					}
				}
			}
			
			$timeframe = "7:30 - 10:30 AM";
			
			$this->SetFont('seguisb','',12);
			$this->SetLineWidth(0.10);
			$this->Cell($w[0],32, '' . $timeframe,1,0,'C',$fill);
			$this->SetFont('seguisb','',9);
			if($cM == 0 or ($cM > 0 and $codeM2 == ""))
			{
				if($timeM<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[1],8, "$codeM\n$timeM\n$roomM\n$profM",1,'C',$fill);
					$this->setXY($x+$x-5,$y);
				}
				else if($codeM<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[1],10.66, "$codeM\n$roomM\n$profM",1,'C',$fill);
					$this->setXY($x+$x-5,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[1],16, "$courseM\n$codeM\n$roomM",1,'C',$fill);
					$this->setXY($x+$x-5,$y);
				}
			}
			elseif($cM > 0)
			{
				if($startM<$startM2)
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[1],4, "$codeM\n$timeM\n$roomM\n$profM\n/ $codeM2\n$timeM2\n$roomM2\n$profM2",1,'C',$fill);
					$this->setXY($x+$x-5,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[1],4, "$codeM2\n$timeM2\n$roomM2\n$profM2\n/ $codeM\n$timeM\n$roomM\n$profM",1,'C',$fill);
					$this->setXY($x+$x-5,$y);
				}
			}
			if($cT == 0 or ($cT > 0 and $codeT2 == ""))
			{
				if($timeT<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[2],8, "$codeT\n$timeT\n$roomT\n$profT",1,'C',$fill);
					$this->setXY($x+$x-50,$y);
				}
				else if($codeT<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[2],10.66, "$codeT\n$roomT\n$profT",1,'C',$fill);
					$this->setXY($x+$x-50,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[2],16, "$courseT\n$codeT\n$roomT",1,'C',$fill);
					$this->setXY($x+$x-50,$y);
				}
			}
			elseif($cT > 0)
			{
				if($startT<$startT2)
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[2],4, "$codeT\n$timeT\n$roomT\n$profT\n/ $codeT2\n$timeT2\n$roomT2\n$profT2",1,'C',$fill);
					$this->setXY($x+$x-50,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[2],4, "$codeT2\n$timeT2\n$roomT2\n$profT2\n/ $codeT\n$timeT\n$roomT\n$profT",1,'C',$fill);
					$this->setXY($x+$x-50,$y);
				}
			}
			if($cW == 0 or ($cW > 0 and $codeW2 == ""))
			{
				if($timeW<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[3],8, "$codeW\n$timeW\n$roomW\n$profW",1,'C',$fill);
					$this->setXY($x+$x-95,$y);
				}
				else if($codeW<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[3],10.66, "$codeW\n$roomW\n$profW",1,'C',$fill);
					$this->setXY($x+$x-95,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[3],16, "$courseW\n$codeW\n$roomW",1,'C',$fill);
					$this->setXY($x+$x-95,$y);
				}
			}
			elseif($cW > 0)
			{
				if($startW<$startW2)
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[3],4, "$codeW\n$timeW\n$roomW\n$profW\n/ $codeW2\n$timeW2\n$roomW2\n$profW2",1,'C',$fill);
					$this->setXY($x+$x-95,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[3],4, "$codeW2\n$timeW2\n$roomW2\n$profW2\n/ $codeW\n$timeW\n$roomW\n$profW",1,'C',$fill);
					$this->setXY($x+$x-95,$y);
				}
			}
			if($cTH == 0 or ($cTH > 0 and $codeTH2 == ""))
			{
				if($timeTH<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[4],8, "$codeTH\n$timeTH\n$roomTH\n$profTH",1,'C',$fill);
					$this->setXY($x+$x-140,$y);
				}
				else if($codeTH<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[4],10.66, "$codeTH\n$roomTH\n$profTH",1,'C',$fill);
					$this->setXY($x+$x-140,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[4],16, "$courseTH\n$codeTH\n$roomTH",1,'C',$fill);
					$this->setXY($x+$x-140,$y);
				}
			}
			elseif($cTH > 0)
			{
				if($startTH<$startTH2)
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[4],4, "$codeTH\n$timeTH\n$roomTH\n$profTH\n/ $codeTH2\n$timeTH2\n$roomTH2\n$profTH2",1,'C',$fill);
					$this->setXY($x+$x-140,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[4],4, "$codeTH2\n$timeTH2\n$roomTH2\n$profTH2\n/ $codeTH\n$timeTH\n$roomTH\n$profTH",1,'C',$fill);
					$this->setXY($x+$x-140,$y);
				}
			}
			if($cF == 0 or ($cF > 0 and $codeF2 == ""))
			{
				if($timeF<>"")
				
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[5],8, "$codeF\n$timeF\n$roomF\n$profF",1,'C',$fill);
					$this->setXY($x+$x-185,$y);
				}
				else if($codeF<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[5],10.66, "$codeF\n$roomF\n$profF",1,'C',$fill);
					$this->setXY($x+$x-185,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[5],16, "$courseF\n$codeF\n$roomF",1,'C',$fill);
					$this->setXY($x+$x-185,$y);
				}
			}
			elseif($cF > 0)
			{
				if($startF<$startF2)
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[5],4, "$codeF\n$timeF\n$roomF\n$profF\n/ $codeF2\n$timeF2\n$roomF2\n$profF2",1,'C',$fill);
					$this->setXY($x+$x-185,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[5],4, "$codeF2\n$timeF2\n$roomF2\n$profF2\n/ $codeF\n$timeF\n$roomF\n$profF",1,'C',$fill);
					$this->setXY($x+$x-185,$y);
				}
			}
			if($cS == 0 or ($cS > 0 and $codeS2 == ""))
			{
				if($timeS<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[6],8, "$codeS\n$timeS\n$roomS\n$profS",1,'C',$fill);
					$this->setXY($x,$y+24);
				}
				else if($codeS<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[6],10.66, "$codeS\n$roomS\n$profS",1,'C',$fill);
					$this->setXY($x,$y+21.3);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[6],16, "$courseS\n$codeS\n$roomS",1,'C',$fill);
					$this->setXY($x,$y+16);
				}
			}
			elseif($cS > 0)
			{
				if($startS<$startS2)
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[6],4, "$codeS\n$timeS\n$roomS\n$profS\n/ $codeS2\n$timeS2\n$roomS2\n$profS2",1,'C',$fill);
					$this->setXY($x,$y+28);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[6],4, "$codeS2\n$timeS2\n$roomS2\n$profS2\n/ $codeS\n$timeS\n$roomS\n$profS",1,'C',$fill);
					$this->setXY($x,$y+28);
				}
			}
			
			$this->Ln();

			/////////////////////////////////////////10:30 - 1:30 PM Timeframe //////////////////////////////////////
			/**
			*eto ung mga variable para sa display, 2 yan kasi up to 2 lng ung maximum na display ng schedule kada box.
			*/
			$codeM = $codeT = $codeW = $codeTH = $codeF = $codeS = "";
			$secM =  $secT = $secW = $secTH = $secF = $secS = "";
			$yrlvlM = $yrlvlT = $yrlvlW = $yrlvlTH = $yrlvlF = $yrlvlS = ""; 
			$courseM = $courseT = $courseW =  $courseTH = $courseF = $courseS = "";
			$timeM = $timeT = $timeW = $timeTH = $timeF = $timeS = "";
			$roomM = $roomT = $roomW = $roomTH = $roomF = $roomS = "";
			$profM = $profT = $profW = $profTH = $profF = $profS = "";
			$startM = $startT = $startW = $startTH = $startF = $startS = 0;
			
			$codeM2 = $codeT2 = $codeW2 = $codeTH2 = $codeF2 = $codeS2 = "";
			$secM2 = $secT2 = $secW2 = $secTH2 = $secF2 = $secS2 = "";
			$yrlvlM2 = $yrlvlT2 = $yrlvlW2 = $yrlvlTH2 = $yrlvlF2 = $yrlvlS2 = ""; 
			$courseM2 = $courseT2 = $courseW2 = $courseTH2 = $courseF2 = $courseS2 = "";
			$timeM2 = $timeT2 = $timeW2 = $timeTH2 = $timeF2 = $timeS2 = "";
			$roomM2 = $roomT2 = $roomW2 = $roomTH2 = $roomF2 = $roomS2 = "";
			$profM2 = $profT2 = $profW2 = $profTH2 = $profF2 = $profS2 = "";
			$startM2 = $startT2 = $startW2 = $startTH2 = $startF2 = $startS2 = 0;
			
			/**
			*eto ung count kung may laman na ung isang box, kung meron na laman sa pangalawang variable ng time nya na ilalagay ung display ng time ska room.
			*/
			$cM = $cT = $cW = $cTH = $cF = $cS = 0;
			
			$sql1 = "SELECT * FROM tbl_schedule WHERE (sem = '$csem' and schoolYear = '$sy' and courseID = '$cors' and currID = '$currID' and cyear = '$cYear' and stimeS >= 1030 and stimeS < 1330) or (sem = '$csem' and schoolYear = '$sy' and courseID = '$cors' and currID = '$currID' and cyear = '$cYear' and stimeS < 1030 and stimeE > 1030)";
			$query1 = mysqli_query($conn,$sql1);
			while($row1 = mysqli_fetch_array($query1))
			{
				$currID = $row1['currID'];
				$cID = $row1['courseID'];
				//$day = getDay($row1['scode'],$row1['currID'],$row1['courseID'],$sy,$row1['csection'],$row1['cyear'],$csem);
				if(($row1['sday']=='M' and $row1['stimeS'] >= 1030 and $row1['stimeS'] <1330) or ($row1['sday']=='M' and $row1['stimeS'] < 1030 and $row1['stimeE'] > 1030))
				{
					if($cM == 0)
					{
						$startM = $row1['stimeS'];
						$codeM = $row1['scode'];									
						$secM = $row1['csection'];
						$yrlvlM = $row1['cyear'];
						$profM = getProf($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
						if($row1['stimeS']<>1030 or $row1['stimeE'] <> 1330)
						{
							$timeM = getTime($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
						}
						else
						{
							$timeM = "";
						}
						$roomM = getRoom($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
						$cM = $cM + 1;
					}else if($cM > 0)
					{
						$startM2 = $row1['stimeS'];
						$codeM2 = $row1['scode'];									
						$secM2 = $row1['csection'];
						$yrlvlM2 = $row1['cyear'];
						$profM2 = getProf($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
						if($row1['stimeS']<>1030 or $row1['stimeE'] <> 1330)
						{
							$timeM2 = getTime($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
						}
						else
						{
							$timeM2 = "";
						}
						$roomM2 = getRoom($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
					}
				}
				else if(($row1['sday']=='T' and $row1['stimeS']>= 1030 and $row1['stimeS'] <1330) or ($row1['sday']=='T' and $row1['stimeS'] < 1030 and $row1['stimeE'] > 1030))
				{
					if($cT == 0)
					{
						$startT = $row1['stimeS'];
						$codeT = $row1['scode'];									
						$secT = $row1['csection'];
						$yrlvlT = $row1['cyear'];
						$profT = getProf($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);										
						if($row1['stimeS']<>1030 or $row1['stimeE'] <> 1330)
						{
							$timeT = getTime($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);
						}
						else
						{
							$timeT = "";
						}	
						$roomT = getRoom($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);
						$cT = $cT + 1;
					}elseif ($cT > 0)
					{
						$startT2 = $row1['stimeS'];
						$codeT2 = $row1['scode'];									
						$secT2 = $row1['csection'];
						$yrlvlT2 = $row1['cyear'];
						$profT2 = getProf($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);										
						if($row1['stimeS']<>1030 or $row1['stimeE'] <> 1330)
						{
							$timeT2 = getTime($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);
						}
						else
						{
							$timeT2 = "";
						}	
						$roomT2 = getRoom($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);
					}
				}
				else if(($row1['sday'] == 'W' and $row1['stimeS'] >= 1030 and $row1['stimeS'] <1330) or ($row1['sday'] == 'W' and $row1['stimeS'] < 1030 and $row1['stimeE'] > 1030))
				{
					if($cW == 0)
					{
						$startW = $row1['stimeS'];
						$codeW = $row1['scode'];									
						$secW = $row1['csection'];
						$yrlvlW = $row1['cyear'];
						$profW = getProf($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);										
						if($row1['stimeS']<>1030 or $row1['stimeE'] <> 1330)
						{
							$timeW = getTime($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);
						}
						else
						{
							$timeW = "";
						}		
						$roomW = getRoom($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);
						$cW = $cW + 1;
					}elseif ($cW > 0)
					{
						$startW2 = $row1['stimeS'];
						$codeW2 = $row1['scode'];									
						$secW2 = $row1['csection'];
						$yrlvlW2 = $row1['cyear'];
						$profW2 = getProf($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);									
						if($row1['stimeS']<>1030 or $row1['stimeE'] <> 1330)
						{
							$timeW2 = getTime($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);
						}
						else
						{
							$timeW2 = "";
						}		
						$roomW2 = getRoom($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);
					}	
				}
				else if(($row1['sday'] == 'TH' and $row1['stimeS'] >= 1030 and $row1['stimeS'] <1330) or ($row1['sday'] == 'TH' and $row1['stimeS'] < 1030 and $row1['stimeE'] > 1030))
				{
					if($cTH == 0)
					{
						$startTH = $row1['stimeS'];
						$codeTH = $row1['scode'];									
						$secTH = $row1['csection'];
						$yrlvlTH = $row1['cyear'];
						$profTH = getProf($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);											
						if($row1['stimeS']<>1030 or $row1['stimeE'] <> 1330)
						{
							$timeTH = getTime($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);
						}
						else
						{
							$timeTH = "";
						}	
						$roomTH = getRoom($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);
						$cTH = $cTH + 1;
					}elseif($cTH > 0)
					{
						$startTH2 = $row1['stimeS'];
						$codeTH2 = $row1['scode'];									
						$secTH2 = $row1['csection'];
						$yrlvlTH2 = $row1['cyear'];
						$profTH2 = getProf($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);								
						if($row1['stimeS']<>1030 or $row1['stimeE'] <> 1330)
						{
							$timeTH2 = getTime($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);
						}
						else
						{
							$timeTH2 = "";
						}	
						$roomTH2 = getRoom($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);
					}
				}
				else if(($row1['sday'] == 'F' and $row1['stimeS'] >= 1030 and $row1['stimeS'] <1330) or ($row1['sday'] == 'F' and $row1['stimeS'] < 1030 and $row1['stimeE'] > 1030))
				{
					if($cF == 0)
					{
						$startF = $row1['stimeS'];
						$codeF = $row1['scode'];									
						$secF = $row1['csection'];
						$yrlvlF = $row1['cyear'];
						$profF = getProf($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);										
						if($row1['stimeS']<>1030 or $row1['stimeE'] <> 1330)
						{
							$timeF = getTime($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);
						}
						else
						{
							$timeF = "";
						}	
						$roomF = getRoom($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);
						$cF = $cF + 1;
					}elseif($cF > 0)
					{
						$startF2 = $row1['stimeS'];
						$codeF2 = $row1['scode'];									
						$secF2 = $row1['csection'];
						$yrlvlF2 = $row1['cyear'];
						$profF2 = getProf($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);										
						if($row1['stimeS']<>1030 or $row1['stimeE'] <> 1330)
						{
							$timeF2 = getTime($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);
						}
						else
						{
							$timeF2 = "";
						}	
						$roomF2 = getRoom($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);
					}
				}
				else if(($row1['sday'] == 'S' and $row1['stimeS'] >= 1030 and $row1['stimeS'] <1330) or ($row1['sday'] == 'S' and $row1['stimeS'] < 1030 and $row1['stimeE'] > 1030))
				{
					if($cS == 0)
					{
						$startS = $row1['stimeS'];
						$codeS = $row1['scode'];									
						$secS = $row1['csection'];
						$yrlvlS = $row1['cyear'];
						$profS = getProf($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
						if($row1['stimeS']<>1030 or $row1['stimeE'] <> 1330)
						{
							$timeS = getTime($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
						}
						else
						{
							$timeS = "";
						}
						$roomS = getRoom($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
						$cS = $cS + 1;
					}else if($cS > 0)
					{
						$startS2 = $row1['stimeS'];
						$codeS2 = $row1['scode'];									
						$secS2 = $row1['csection'];
						$yrlvlS2 = $row1['cyear'];
						$profS2 = getProf($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
						if($row1['stimeS']<>1030 or $row1['stimeE'] <> 1330)
						{
							$timeS2 = getTime($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
						}
						else
						{
							$timeS2 = "";
						}
						$roomS2 = getRoom($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
					}
				}
			}	
			
			$sql1 = "SELECT * FROM tbl_schedule WHERE (sem = '$csem' and schoolYear = '$sy' and courseID = '$cors' and currID = '$currID' and cyear = '$cYear' and stimeS2 >= 1030 and stimeS2 < 1330) or (sem = '$csem' and schoolYear = '$sy' and courseID = '$cors' and currID = '$currID' and cyear = '$cYear' and stimeS2 < 1030 and stimeE2 > 1030)";
			$query1 = mysqli_query($conn,$sql1);
			while($row1 = mysqli_fetch_array($query1))
			{
				$currID = $row1['currID'];
				$cID = $row1['courseID'];
				
				if(($row1['sday2']=='M' and $row1['stimeS2'] >= 1030 and $row1['stimeS2'] <1330) or ($row1['sday2']=='M' and $row1['stimeS2'] < 1030 and $row1['stimeE2'] > 1030))
				{
					if($cM == 0)
					{
						$startM = $row1['stimeS2'];
						$codeM = $row1['scode'];									
						$secM = $row1['csection'];
						$yrlvlM = $row1['cyear'];
						$profM = getProf($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
						if($row1['stimeS2']<>1030 or $row1['stimeE2'] <> 1330)
						{
							$timeM = getTime2($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
						}
						else
						{
							$timeM = "";
						}
						$roomM = getRoom2($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
						$cM = $cM + 1;
					}else if($cM > 0)
					{
						$startM2 = $row1['stimeS2'];
						$codeM2 = $row1['scode'];									
						$secM2 = $row1['csection'];
						$yrlvlM2 = $row1['cyear'];
						$profM2 = getProf($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
						if($row1['stimeS2']<>1030 or $row1['stimeE2'] <> 1330)
						{
							$timeM2 = getTime2($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
						}
						else
						{
							$timeM2 = "";
						}
						$roomM2 = getRoom2($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
					}		
				}
				else if(($row1['sday2']=='T' and $row1['stimeS2']>= 1030 and $row1['stimeS2'] <1330) or ($row1['sday2']=='T' and $row1['stimeS2'] < 1030 and $row1['stimeE2'] > 1030))
				{
					if($cT == 0)
					{
						$startT = $row1['stimeS2'];
						$codeT = $row1['scode'];									
						$secT = $row1['csection'];
						$yrlvlT = $row1['cyear'];
						$profT = getProf($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);							
						if($row1['stimeS2']<>1030 or $row1['stimeE2'] <> 1330)
						{
							$timeT = getTime2($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);
						}
						else
						{
							$timeT = "";
						}	
						$roomT = getRoom2($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);
						$cT = $cT + 1;
					}elseif ($cT > 0)
					{
						$startT2 = $row1['stimeS2'];
						$codeT2 = $row1['scode'];									
						$secT2 = $row1['csection'];
						$yrlvlT2 = $row1['cyear'];
						$profT2 = getProf($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);								
						if($row1['stimeS2']<>1030 or $row1['stimeE2'] <> 1330)
						{
							$timeT2 = getTime2($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);
						}
						else
						{
							$timeT2 = "";
						}	
						$roomT2 = getRoom2($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);
					}
				}
				else if(($row1['sday2'] == 'W' and $row1['stimeS2'] >= 1030 and $row1['stimeS2'] <1330) or ($row1['sday2'] == 'W' and $row1['stimeS2'] < 1030 and $row1['stimeE2'] > 1030))
				{
					if($cW == 0)
					{
						$startW = $row1['stimeS2'];
						$codeW = $row1['scode'];									
						$secW = $row1['csection'];
						$yrlvlW = $row1['cyear'];
						$profW = getProf($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);									
						if($row1['stimeS2']<>1030 or $row1['stimeE2'] <> 1330)
						{
							$timeW = getTime2($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);
						}
						else
						{
							$timeW = "";
						}		
						$roomW = getRoom2($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);
						$cW = $cW + 1;
					}elseif ($cW > 0)
					{
						$startW2 = $row1['stimeS2'];
						$codeW2 = $row1['scode'];									
						$secW2 = $row1['csection'];
						$yrlvlW2 = $row1['cyear'];
						$profW2 = getProf($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);										
						if($row1['stimeS2']<>1030 or $row1['stimeE2'] <> 1330)
						{
							$timeW2 = getTime2($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);
						}
						else
						{
							$timeW2 = "";
						}		
						$roomW2 = getRoom2($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);
					}
				}
				else if(($row1['sday2'] == 'TH' and $row1['stimeS2'] >= 1030 and $row1['stimeS2'] <1330) or ($row1['sday2'] == 'TH' and $row1['stimeS2'] < 1030 and $row1['stimeE2'] > 1030))
				{
					if($cTH == 0)
					{
						$startTH = $row1['stimeS2'];
						$codeTH = $row1['scode'];									
						$secTH = $row1['csection'];
						$yrlvlTH = $row1['cyear'];
						$profTH = getProf($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);										
						if($row1['stimeS2']<>1030 or $row1['stimeE2'] <> 1330)
						{
							$timeTH = getTime2($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);
						}
						else
						{
							$timeTH = "";
						}	
						$roomTH = getRoom2($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);
						$cTH = $cTH + 1;
					}elseif($cTH > 0)
					{
						$startTH2 = $row1['stimeS2'];
						$codeTH2 = $row1['scode'];									
						$secTH2 = $row1['csection'];
						$yrlvlTH2 = $row1['cyear'];
						$profTH2 = getProf($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);										
						if($row1['stimeS2']<>1030 or $row1['stimeE2'] <> 1330)
						{
							$timeTH2 = getTime2($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);
						}
						else
						{
							$timeTH2 = "";
						}	
						$roomTH2 = getRoom2($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);
					}
				}
				else if(($row1['sday2'] == 'F' and $row1['stimeS2'] >= 1030 and $row1['stimeS2'] <1330) or ($row1['sday2'] == 'F' and $row1['stimeS2'] < 1030 and $row1['stimeE2'] > 1030))
				{
					if($cF == 0)
					{
						$startF = $row1['stimeS2'];
						$codeF = $row1['scode'];									
						$secF = $row1['csection'];
						$yrlvlF = $row1['cyear'];
						$profF = getProf($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);											
						if($row1['stimeS2']<>1030 or $row1['stimeE2'] <> 1330)
						{
							$timeF = getTime2($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);
						}
						else
						{
							$timeF = "";
						}	
						$roomF = getRoom2($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);
						$cF = $cF + 1;
					}elseif($cF > 0)
					{
						$startF2 = $row1['stimeS2'];
						$codeF2 = $row1['scode'];									
						$secF2 = $row1['csection'];
						$yrlvlF2 = $row1['cyear'];
						$profF2 = getProf($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);											
						if($row1['stimeS2']<>1030 or $row1['stimeE2'] <> 1330)
						{
							$timeF2 = getTime2($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);
						}
						else
						{
							$timeF2 = "";
						}	
						$roomF2 = getRoom2($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);
					}	
				}
				else if(($row1['sday2'] == 'S' and $row1['stimeS2'] >= 1030 and $row1['stimeS2'] <1330) or ($row1['sday2'] == 'S' and $row1['stimeS2'] < 1030 and $row1['stimeE2'] > 1030))
				{
					if($cS == 0)
					{
						$startS = $row1['stimeS2'];
						$codeS = $row1['scode'];									
						$secS = $row1['csection'];
						$yrlvlS = $row1['cyear'];
						$profS = getProf($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
						if($row1['stimeS2']<>1030 or $row1['stimeE2'] <> 1330)
						{
							$timeS = getTime2($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
						}
						else
						{
							$timeS = "";
						}
						$roomS = getRoom2($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
						$cS = $cS + 1;
					}else if($cS > 0)
					{
						$startS2 = $row1['stimeS2'];
						$codeS2 = $row1['scode'];									
						$secS2 = $row1['csection'];
						$yrlvlS2 = $row1['cyear'];
						$profS2 = getProf($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
						if($row1['stimeS2']<>1030 or $row1['stimeE2'] <> 1330)
						{
							$timeS2 = getTime2($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
						}
						else
						{
							$timeS2 = "";
						}
						$roomS2 = getRoom2($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
					}
				}
			}
			
			$timeframe = "10:30 - 1:30 PM";
			
			$this->SetFont('seguisb','',12);
			$this->SetLineWidth(0.10);
			$this->Cell($w[0],32, '' . $timeframe,1,0,'C',$fill);
			$this->SetFont('seguisb','',9);
			if($cM == 0 or ($cM > 0 and $codeM2 == ""))
			{
				if($timeM<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[1],8, "$codeM\n$timeM\n$roomM\n$profM",1,'C',$fill);
					$this->setXY($x+$x-5,$y);
				}
				else if($codeM<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[1],10.66, "$codeM\n$roomM\n$profM",1,'C',$fill);
					$this->setXY($x+$x-5,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[1],16, "$courseM\n$codeM\n$roomM",1,'C',$fill);
					$this->setXY($x+$x-5,$y);
				}
			}
			elseif($cM > 0)
			{
				if($startM<$startM2)
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[1],4, "$codeM\n$timeM\n$roomM\n$profM\n/ $codeM2\n$timeM2\n$roomM2\n$profM2",1,'C',$fill);
					$this->setXY($x+$x-5,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[1],4, "$codeM2\n$timeM2\n$roomM2\n$profM2\n/ $codeM\n$timeM\n$roomM\n$profM",1,'C',$fill);
					$this->setXY($x+$x-5,$y);
				}
			}
			if($cT == 0 or ($cT > 0 and $codeT2 == ""))
			{
				if($timeT<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[2],8, "$codeT\n$timeT\n$roomT\n$profT",1,'C',$fill);
					$this->setXY($x+$x-50,$y);
				}
				else if($codeT<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[2],10.66, "$codeT\n$roomT\n$profT",1,'C',$fill);
					$this->setXY($x+$x-50,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[2],16, "$courseT\n$codeT\n$roomT",1,'C',$fill);
					$this->setXY($x+$x-50,$y);
				}
			}
			elseif($cT > 0)
			{
				if($startT<$startT2)
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[2],4, "$codeT\n$timeT\n$roomT\n$profT\n/ $codeT2\n$timeT2\n$roomT2\n$profT2",1,'C',$fill);
					$this->setXY($x+$x-50,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[2],4, "$codeT2\n$timeT2\n$roomT2\n$profT2\n/ $codeT\n$timeT\n$roomT\n$profT",1,'C',$fill);
					$this->setXY($x+$x-50,$y);
				}
			}
			if($cW == 0 or ($cW > 0 and $codeW2 == ""))
			{
				if($timeW<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[3],8, "$codeW\n$timeW\n$roomW\n$profW",1,'C',$fill);
					$this->setXY($x+$x-95,$y);
				}
				else if($codeW<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[3],10.66, "$codeW\n$roomW\n$profW",1,'C',$fill);
					$this->setXY($x+$x-95,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[3],16, "$courseW\n$codeW\n$roomW",1,'C',$fill);
					$this->setXY($x+$x-95,$y);
				}
			}
			elseif($cW > 0)
			{
				if($startW<$startW2)
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[3],4, "$codeW\n$timeW\n$roomW\n$profW\n/ $codeW2\n$timeW2\n$roomW2\n$profW2",1,'C',$fill);
					$this->setXY($x+$x-95,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[3],4, "$codeW2\n$timeW2\n$roomW2\n$profW2\n/ $codeW\n$timeW\n$roomW\n$profW",1,'C',$fill);
					$this->setXY($x+$x-95,$y);
				}
			}
			if($cTH == 0 or ($cTH > 0 and $codeTH2 == ""))
			{
				if($timeTH<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[4],8, "$codeTH\n$timeTH\n$roomTH\n$profTH",1,'C',$fill);
					$this->setXY($x+$x-140,$y);
				}
				else if($codeTH<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[4],10.66, "$codeTH\n$roomTH\n$profTH",1,'C',$fill);
					$this->setXY($x+$x-140,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[4],16, "$courseTH\n$codeTH\n$roomTH",1,'C',$fill);
					$this->setXY($x+$x-140,$y);
				}
			}
			elseif($cTH > 0)
			{
				if($startTH<$startTH2)
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[4],4, "$codeTH\n$timeTH\n$roomTH\n$profTH\n/ $codeTH2\n$timeTH2\n$roomTH2\n$profTH2",1,'C',$fill);
					$this->setXY($x+$x-140,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[4],4, "$codeTH2\n$timeTH2\n$roomTH2\n$profTH2\n/ $codeTH\n$timeTH\n$roomTH\n$profTH",1,'C',$fill);
					$this->setXY($x+$x-140,$y);
				}
			}
			if($cF == 0 or ($cF > 0 and $codeF2 == ""))
			{
				if($timeF<>"")
				
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[5],8, "$codeF\n$timeF\n$roomF\n$profF",1,'C',$fill);
					$this->setXY($x+$x-185,$y);
				}
				else if($codeF<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[5],10.66, "$codeF\n$roomF\n$profF",1,'C',$fill);
					$this->setXY($x+$x-185,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[5],16, "$courseF\n$codeF\n$roomF",1,'C',$fill);
					$this->setXY($x+$x-185,$y);
				}
			}
			elseif($cF > 0)
			{
				if($startF<$startF2)
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[5],4, "$codeF\n$timeF\n$roomF\n$profF\n/ $codeF2\n$timeF2\n$roomF2\n$profF2",1,'C',$fill);
					$this->setXY($x+$x-185,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[5],4, "$codeF2\n$timeF2\n$roomF2\n$profF2\n/ $codeF\n$timeF\n$roomF\n$profF",1,'C',$fill);
					$this->setXY($x+$x-185,$y);
				}
			}
			if($cS == 0 or ($cS > 0 and $codeS2 == ""))
			{
				if($timeS<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[6],8, "$codeS\n$timeS\n$roomS\n$profS",1,'C',$fill);
					$this->setXY($x,$y+24);
				}
				else if($codeS<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[6],10.66, "$codeS\n$roomS\n$profS",1,'C',$fill);
					$this->setXY($x,$y+21.3);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[6],16, "$courseS\n$codeS\n$roomS",1,'C',$fill);
					$this->setXY($x,$y+16);
				}
			}
			elseif($cS > 0)
			{
				if($startS<$startS2)
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[6],4, "$codeS\n$timeS\n$roomS\n$profS\n/ $codeS2\n$timeS2\n$roomS2\n$profS2",1,'C',$fill);
					$this->setXY($x,$y+28);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[6],4, "$codeS2\n$timeS2\n$roomS2\n$profS2\n/ $codeS\n$timeS\n$roomS\n$profS",1,'C',$fill);
					$this->setXY($x,$y+28);
				}
			}
			
			$this->Ln();
			
			//////////////////////////////////////////////////////////1:30 - 4:30 Timeframe////////////////////////////////////////////////////////////
									
			/**
			*eto ung mga variable para sa display, 2 yan kasi up to 2 lng ung maximum na display ng schedule kada box.
			*/
			$codeM = $codeT = $codeW = $codeTH = $codeF = $codeS = "";
			$secM =  $secT = $secW = $secTH = $secF = $secS = "";
			$yrlvlM = $yrlvlT = $yrlvlW = $yrlvlTH = $yrlvlF = $yrlvlS = ""; 
			$courseM = $courseT = $courseW =  $courseTH = $courseF = $courseS = "";
			$timeM = $timeT = $timeW = $timeTH = $timeF = $timeS = "";
			$roomM = $roomT = $roomW = $roomTH = $roomF = $roomS = "";
			$profM = $profT = $profW = $profTH = $profF = $profS = "";
			$startM = $startT = $startW = $startTH = $startF = $startS = 0;
			
			$codeM2 = $codeT2 = $codeW2 = $codeTH2 = $codeF2 = $codeS2 = "";
			$secM2 = $secT2 = $secW2 = $secTH2 = $secF2 = $secS2 = "";
			$yrlvlM2 = $yrlvlT2 = $yrlvlW2 = $yrlvlTH2 = $yrlvlF2 = $yrlvlS2 = ""; 
			$courseM2 = $courseT2 = $courseW2 = $courseTH2 = $courseF2 = $courseS2 = "";
			$timeM2 = $timeT2 = $timeW2 = $timeTH2 = $timeF2 = $timeS2 = "";
			$roomM2 = $roomT2 = $roomW2 = $roomTH2 = $roomF2 = $roomS2 = "";
			$profM2 = $profT2 = $profW2 = $profTH2 = $profF2 = $profS2 = "";
			$startM2 = $startT2 = $startW2 = $startTH2 = $startF2 = $startS2 = 0;
			
			/**
			*eto ung count kung may laman na ung isang box, kung meron na laman sa pangalawang variable ng time nya na ilalagay ung display ng time ska room.
			*/
			$cM = $cT = $cW = $cTH = $cF = $cS = 0;
			
			$sql1 = "SELECT * FROM tbl_schedule WHERE (sem = '$csem' and schoolYear = '$sy' and courseID = '$cors' and currID = '$currID' and cyear = '$cYear' and stimeS >=1330 and stimeS <1630) or (sem = '$csem' and schoolYear = '$sy' and courseID = '$cors' and currID = '$currID' and cyear = '$cYear' and stimeS < 1330 and stimeE > 1330)";
			$query1 = mysqli_query($conn,$sql1);
			while($row1 = mysqli_fetch_array($query1))
			{
				$currID = $row1['currID'];
				$cID = $row1['courseID'];
				//$day = getDay($row1['scode'],$row1['currID'],$row1['courseID'],$sy,$row1['csection'],$row1['cyear'],$csem);
				if(($row1['sday']=='M' and $row1['stimeS'] >= 1330 and $row1['stimeS'] <1630) or ($row1['sday']=='M' and $row1['stimeS'] < 1330 and $row1['stimeE'] > 1330))
				{
					if($cM == 0)
					{
						$startM = $row1['stimeS'];
						$codeM = $row1['scode'];									
						$secM = $row1['csection'];
						$yrlvlM = $row1['cyear'];
						$profM = getProf($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
						if($row1['stimeS']<>1330 or $row1['stimeE'] <> 1630)
						{
							$timeM = getTime($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
						}
						else
						{
							$timeM = "";
						}
						$roomM = getRoom($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
						$cM = $cM + 1;
					}else if($cM > 0)
					{
						$startM2 = $row1['stimeS'];
						$codeM2 = $row1['scode'];									
						$secM2 = $row1['csection'];
						$yrlvlM2 = $row1['cyear'];
						$profM2 = getProf($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
						if($row1['stimeS']<>1330 or $row1['stimeE'] <> 1630)
						{
							$timeM2 = getTime($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
						}
						else
						{
							$timeM2 = "";
						}
						$roomM2 = getRoom($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
					}
				}
				else if(($row1['sday']=='T' and $row1['stimeS']>= 1330 and $row1['stimeS'] <1630) or ($row1['sday']=='T' and $row1['stimeS'] < 1330 and $row1['stimeE'] > 1330))
				{
					if($cT == 0)
					{
						$startT = $row1['stimeS'];
						$codeT = $row1['scode'];									
						$secT = $row1['csection'];
						$yrlvlT = $row1['cyear'];
						$profT = getProf($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);										
						if($row1['stimeS']<>1330 or $row1['stimeE'] <> 1630)
						{
							$timeT = getTime($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);
						}
						else
						{
							$timeT = "";
						}	
						$roomT = getRoom($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);
						$cT = $cT + 1;
					}elseif ($cT > 0)
					{
						$startT2 = $row1['stimeS'];
						$codeT2 = $row1['scode'];									
						$secT2 = $row1['csection'];
						$yrlvlT2 = $row1['cyear'];
						$profT2 = getProf($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);										
						if($row1['stimeS']<>1330 or $row1['stimeE'] <> 1630)
						{
							$timeT2 = getTime($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);
						}
						else
						{
							$timeT2 = "";
						}	
						$roomT2 = getRoom($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);
					}
				}
				else if(($row1['sday'] == 'W' and $row1['stimeS']>= 1330 and $row1['stimeS'] <1630) or ($row1['sday'] == 'W' and $row1['stimeS'] < 1330 and $row1['stimeE'] > 1330))
				{
					if($cW == 0)
					{
						$startW = $row1['stimeS'];
						$codeW = $row1['scode'];									
						$secW = $row1['csection'];
						$yrlvlW = $row1['cyear'];
						$profW = getProf($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);										
						if($row1['stimeS']<>1330 or $row1['stimeE'] <> 1630)
						{
							$timeW = getTime($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);
						}
						else
						{
							$timeW = "";
						}		
						$roomW = getRoom($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);
						$cW = $cW + 1;
					}elseif ($cW > 0)
					{
						$startW2 = $row1['stimeS'];
						$codeW2 = $row1['scode'];									
						$secW2 = $row1['csection'];
						$yrlvlW2 = $row1['cyear'];
						$profW2 = getProf($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);									
						if($row1['stimeS']<>1330 or $row1['stimeE'] <> 1630)
						{
							$timeW2 = getTime($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);
						}
						else
						{
							$timeW2 = "";
						}		
						$roomW2 = getRoom($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);
					}	
				}
				else if(($row1['sday'] == 'TH' and $row1['stimeS']>= 1330 and $row1['stimeS'] <1630) or ($row1['sday'] == 'TH' and $row1['stimeS'] < 1330 and $row1['stimeE'] > 1330))
				{
					if($cTH == 0)
					{
						$startTH = $row1['stimeS'];
						$codeTH = $row1['scode'];									
						$secTH = $row1['csection'];
						$yrlvlTH = $row1['cyear'];
						$profTH = getProf($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);											
						if($row1['stimeS']<>1330 or $row1['stimeE'] <> 1630)
						{
							$timeTH = getTime($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);
						}
						else
						{
							$timeTH = "";
						}	
						$roomTH = getRoom($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);
						$cTH = $cTH + 1;
					}elseif($cTH > 0)
					{
						$startTH2 = $row1['stimeS'];
						$codeTH2 = $row1['scode'];									
						$secTH2 = $row1['csection'];
						$yrlvlTH2 = $row1['cyear'];
						$profTH2 = getProf($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);								
						if($row1['stimeS']<>1330 or $row1['stimeE'] <> 1630)
						{
							$timeTH2 = getTime($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);
						}
						else
						{
							$timeTH2 = "";
						}	
						$roomTH2 = getRoom($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);
					}
				}
				else if(($row1['sday'] == 'F' and $row1['stimeS']>= 1330 and $row1['stimeS'] <1630) or ($row1['sday'] == 'F' and $row1['stimeS'] < 1330 and $row1['stimeE'] > 1330))
				{
					if($cF == 0)
					{
						$startF = $row1['stimeS'];
						$codeF = $row1['scode'];									
						$secF = $row1['csection'];
						$yrlvlF = $row1['cyear'];
						$profF = getProf($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);										
						if($row1['stimeS']<>1330 or $row1['stimeE'] <> 1630)
						{
							$timeF = getTime($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);
						}
						else
						{
							$timeF = "";
						}	
						$roomF = getRoom($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);
						$cF = $cF + 1;
					}elseif($cF > 0)
					{
						$startF2 = $row1['stimeS'];
						$codeF2 = $row1['scode'];									
						$secF2 = $row1['csection'];
						$yrlvlF2 = $row1['cyear'];
						$profF2 = getProf($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);										
						if($row1['stimeS']<>1330 or $row1['stimeE'] <> 1630)
						{
							$timeF2 = getTime($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);
						}
						else
						{
							$timeF2 = "";
						}	
						$roomF2 = getRoom($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);
					}
				}
				else if(($row1['sday'] == 'S' and $row1['stimeS']>= 1330 and $row1['stimeS'] <1630) or ($row1['sday'] == 'S' and $row1['stimeS'] < 1330 and $row1['stimeE'] > 1330))
				{
					if($cS == 0)
					{
						$startS = $row1['stimeS'];
						$codeS = $row1['scode'];									
						$secS = $row1['csection'];
						$yrlvlS = $row1['cyear'];
						$profS = getProf($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
						if($row1['stimeS']<>1330 or $row1['stimeE'] <> 1630)
						{
							$timeS = getTime($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
						}
						else
						{
							$timeS = "";
						}
						$roomS = getRoom($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
						$cS = $cS + 1;
					}else if($cS > 0)
					{
						$startS2 = $row1['stimeS'];
						$codeS2 = $row1['scode'];									
						$secS2 = $row1['csection'];
						$yrlvlS2 = $row1['cyear'];
						$profS2 = getProf($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
						if($row1['stimeS']<>1330 or $row1['stimeE'] <> 1630)
						{
							$timeS2 = getTime($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
						}
						else
						{
							$timeS2 = "";
						}
						$roomS2 = getRoom($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
					}
				}
			}	
			
			$sql1 = "SELECT * FROM tbl_schedule WHERE (sem = '$csem' and schoolYear = '$sy' and courseID = '$cors' and currID = '$currID' and cyear = '$cYear' and stimeS2 >=1330 and stimeS2 <1630) or (sem = '$csem' and schoolYear = '$sy' and courseID = '$cors' and currID = '$currID' and cyear = '$cYear' and stimeS2 < 1330 and stimeE2 > 1330)";
			$query1 = mysqli_query($conn,$sql1);
			while($row1 = mysqli_fetch_array($query1))
			{
				$currID = $row1['currID'];
				$cID = $row1['courseID'];
				
				if(($row1['sday2']=='M' and $row1['stimeS2'] >= 1330 and $row1['stimeS2'] <1630) or ($row1['sday2']=='M' and $row1['stimeS2'] < 1330 and $row1['stimeE2'] > 1330))
				{
					if($cM == 0)
					{
						$startM = $row1['stimeS2'];
						$codeM = $row1['scode'];									
						$secM = $row1['csection'];
						$yrlvlM = $row1['cyear'];
						$profM = getProf($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
						if($row1['stimeS2']<>1330 or $row1['stimeE2'] <> 1630)
						{
							$timeM = getTime2($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
						}
						else
						{
							$timeM = "";
						}
						$roomM = getRoom2($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
						$cM = $cM + 1;
					}else if($cM > 0)
					{
						$startM2 = $row1['stimeS2'];
						$codeM2 = $row1['scode'];									
						$secM2 = $row1['csection'];
						$yrlvlM2 = $row1['cyear'];
						$profM2 = getProf($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
						if($row1['stimeS2']<>1330 or $row1['stimeE2'] <> 1630)
						{
							$timeM2 = getTime2($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
						}
						else
						{
							$timeM2 = "";
						}
						$roomM2 = getRoom2($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
					}		
				}
				else if(($row1['sday2']=='T' and $row1['stimeS2']>= 1330 and $row1['stimeS2'] <1630) or ($row1['sday2']=='T' and $row1['stimeS2'] < 1330 and $row1['stimeE2'] > 1330))
				{
					if($cT == 0)
					{
						$startT = $row1['stimeS2'];
						$codeT = $row1['scode'];									
						$secT = $row1['csection'];
						$yrlvlT = $row1['cyear'];
						$profT = getProf($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);							
						if($row1['stimeS2']<>1330 or $row1['stimeE2'] <> 1630)
						{
							$timeT = getTime2($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);
						}
						else
						{
							$timeT = "";
						}	
						$roomT = getRoom2($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);
						$cT = $cT + 1;
					}elseif ($cT > 0)
					{
						$startT2 = $row1['stimeS2'];
						$codeT2 = $row1['scode'];									
						$secT2 = $row1['csection'];
						$yrlvlT2 = $row1['cyear'];
						$profT2 = getProf($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);								
						if($row1['stimeS2']<>1330 or $row1['stimeE2'] <> 1630)
						{
							$timeT2 = getTime2($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);
						}
						else
						{
							$timeT2 = "";
						}	
						$roomT2 = getRoom2($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);
					}
				}
				else if(($row1['sday2'] == 'W' and $row1['stimeS2']>= 1330 and $row1['stimeS2'] <1630) or ($row1['sday2'] == 'W' and $row1['stimeS2'] < 1330 and $row1['stimeE2'] > 1330))
				{
					if($cW == 0)
					{
						$startW = $row1['stimeS2'];
						$codeW = $row1['scode'];									
						$secW = $row1['csection'];
						$yrlvlW = $row1['cyear'];
						$profW = getProf($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);									
						if($row1['stimeS2']<>1330 or $row1['stimeE2'] <> 1630)
						{
							$timeW = getTime2($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);
						}
						else
						{
							$timeW = "";
						}		
						$roomW = getRoom2($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);
						$cW = $cW + 1;
					}elseif ($cW > 0)
					{
						$startW2 = $row1['stimeS2'];
						$codeW2 = $row1['scode'];									
						$secW2 = $row1['csection'];
						$yrlvlW2 = $row1['cyear'];
						$profW2 = getProf($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);										
						if($row1['stimeS2']<>1330 or $row1['stimeE2'] <> 1630)
						{
							$timeW2 = getTime2($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);
						}
						else
						{
							$timeW2 = "";
						}		
						$roomW2 = getRoom2($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);
					}
				}
				else if(($row1['sday2'] == 'TH' and $row1['stimeS2']>= 1330 and $row1['stimeS2'] <1630) or ($row1['sday2'] == 'TH' and $row1['stimeS2'] < 1330 and $row1['stimeE2'] > 1330))
				{
					if($cTH == 0)
					{
						$startTH = $row1['stimeS2'];
						$codeTH = $row1['scode'];									
						$secTH = $row1['csection'];
						$yrlvlTH = $row1['cyear'];
						$profTH = getProf($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);										
						if($row1['stimeS2']<>1330 or $row1['stimeE2'] <> 1630)
						{
							$timeTH = getTime2($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);
						}
						else
						{
							$timeTH = "";
						}	
						$roomTH = getRoom2($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);
						$cTH = $cTH + 1;
					}elseif($cTH > 0)
					{
						$startTH2 = $row1['stimeS2'];
						$codeTH2 = $row1['scode'];									
						$secTH2 = $row1['csection'];
						$yrlvlTH2 = $row1['cyear'];
						$profTH2 = getProf($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);										
						if($row1['stimeS2']<>1330 or $row1['stimeE2'] <> 1630)
						{
							$timeTH2 = getTime2($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);
						}
						else
						{
							$timeTH2 = "";
						}	
						$roomTH2 = getRoom2($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);
					}
				}
				else if(($row1['sday2'] == 'F' and $row1['stimeS2']>= 1330 and $row1['stimeS2'] <1630) or ($row1['sday2'] == 'F' and $row1['stimeS2'] < 1330 and $row1['stimeE2'] > 1330))
				{
					if($cF == 0)
					{
						$startF = $row1['stimeS2'];
						$codeF = $row1['scode'];									
						$secF = $row1['csection'];
						$yrlvlF = $row1['cyear'];
						$profF = getProf($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);											
						if($row1['stimeS2']<>1330 or $row1['stimeE2'] <> 1630)
						{
							$timeF = getTime2($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);
						}
						else
						{
							$timeF = "";
						}	
						$roomF = getRoom2($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);
						$cF = $cF + 1;
					}elseif($cF > 0)
					{
						$startF2 = $row1['stimeS2'];
						$codeF2 = $row1['scode'];									
						$secF2 = $row1['csection'];
						$yrlvlF2 = $row1['cyear'];
						$profF2 = getProf($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);											
						if($row1['stimeS2']<>1330 or $row1['stimeE2'] <> 1630)
						{
							$timeF2 = getTime2($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);
						}
						else
						{
							$timeF2 = "";
						}	
						$roomF2 = getRoom2($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);
					}	
				}
				else if(($row1['sday2'] == 'S' and $row1['stimeS2']>= 1330 and $row1['stimeS2'] <1630) or ($row1['sday2'] == 'S' and $row1['stimeS2'] < 1330 and $row1['stimeE2'] > 1330))
				{
					if($cS == 0)
					{
						$startS = $row1['stimeS2'];
						$codeS = $row1['scode'];									
						$secS = $row1['csection'];
						$yrlvlS = $row1['cyear'];
						$profS = getProf($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
						if($row1['stimeS2']<>1330 or $row1['stimeE2'] <> 1630)
						{
							$timeS = getTime2($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
						}
						else
						{
							$timeS = "";
						}
						$roomS = getRoom2($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
						$cS = $cS + 1;
					}else if($cS > 0)
					{
						$startS2 = $row1['stimeS2'];
						$codeS2 = $row1['scode'];									
						$secS2 = $row1['csection'];
						$yrlvlS2 = $row1['cyear'];
						$profS2 = getProf($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
						if($row1['stimeS2']<>1330 or $row1['stimeE2'] <> 1630)
						{
							$timeS2 = getTime2($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
						}
						else
						{
							$timeS2 = "";
						}
						$roomS2 = getRoom2($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
					}
				}
			}
			
			$timeframe = "1:30 - 4:30 PM";
			
			$this->SetFont('seguisb','',12);
			$this->SetLineWidth(0.10);
			$this->Cell($w[0],32, '' . $timeframe,1,0,'C',$fill);
			$this->SetFont('seguisb','',9);
			if($cM == 0 or ($cM > 0 and $codeM2 == ""))
			{
				if($timeM<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[1],8, "$codeM\n$timeM\n$roomM\n$profM",1,'C',$fill);
					$this->setXY($x+$x-5,$y);
				}
				else if($codeM<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[1],10.66, "$codeM\n$roomM\n$profM",1,'C',$fill);
					$this->setXY($x+$x-5,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[1],16, "$courseM\n$codeM\n$roomM",1,'C',$fill);
					$this->setXY($x+$x-5,$y);
				}
			}
			elseif($cM > 0)
			{
				if($startM<$startM2)
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[1],4, "$codeM\n$timeM\n$roomM\n$profM\n/ $codeM2\n$timeM2\n$roomM2\n$profM2",1,'C',$fill);
					$this->setXY($x+$x-5,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[1],4, "$codeM2\n$timeM2\n$roomM2\n$profM2\n/ $codeM\n$timeM\n$roomM\n$profM",1,'C',$fill);
					$this->setXY($x+$x-5,$y);
				}
			}
			if($cT == 0 or ($cT > 0 and $codeT2 == ""))
			{
				if($timeT<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[2],8, "$codeT\n$timeT\n$roomT\n$profT",1,'C',$fill);
					$this->setXY($x+$x-50,$y);
				}
				else if($codeT<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[2],10.66, "$codeT\n$roomT\n$profT",1,'C',$fill);
					$this->setXY($x+$x-50,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[2],16, "$courseT\n$codeT\n$roomT",1,'C',$fill);
					$this->setXY($x+$x-50,$y);
				}
			}
			elseif($cT > 0)
			{
				if($startT<$startT2)
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[2],4, "$codeT\n$timeT\n$roomT\n$profT\n/ $codeT2\n$timeT2\n$roomT2\n$profT2",1,'C',$fill);
					$this->setXY($x+$x-50,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[2],4, "$codeT2\n$timeT2\n$roomT2\n$profT2\n/ $codeT\n$timeT\n$roomT\n$profT",1,'C',$fill);
					$this->setXY($x+$x-50,$y);
				}
			}
			if($cW == 0 or ($cW > 0 and $codeW2 == ""))
			{
				if($timeW<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[3],8, "$codeW\n$timeW\n$roomW\n$profW",1,'C',$fill);
					$this->setXY($x+$x-95,$y);
				}
				else if($codeW<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[3],10.66, "$codeW\n$roomW\n$profW",1,'C',$fill);
					$this->setXY($x+$x-95,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[3],16, "$courseW\n$codeW\n$roomW",1,'C',$fill);
					$this->setXY($x+$x-95,$y);
				}
			}
			elseif($cW > 0)
			{
				if($startW<$startW2)
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[3],4, "$codeW\n$timeW\n$roomW\n$profW\n/ $codeW2\n$timeW2\n$roomW2\n$profW2",1,'C',$fill);
					$this->setXY($x+$x-95,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[3],4, "$codeW2\n$timeW2\n$roomW2\n$profW2\n/ $codeW\n$timeW\n$roomW\n$profW",1,'C',$fill);
					$this->setXY($x+$x-95,$y);
				}
			}
			if($cTH == 0 or ($cTH > 0 and $codeTH2 == ""))
			{
				if($timeTH<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[4],8, "$codeTH\n$timeTH\n$roomTH\n$profTH",1,'C',$fill);
					$this->setXY($x+$x-140,$y);
				}
				else if($codeTH<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[4],10.66, "$codeTH\n$roomTH\n$profTH",1,'C',$fill);
					$this->setXY($x+$x-140,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[4],16, "$courseTH\n$codeTH\n$roomTH",1,'C',$fill);
					$this->setXY($x+$x-140,$y);
				}
			}
			elseif($cTH > 0)
			{
				if($startTH<$startTH2)
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[4],4, "$codeTH\n$timeTH\n$roomTH\n$profTH\n/ $codeTH2\n$timeTH2\n$roomTH2\n$profTH2",1,'C',$fill);
					$this->setXY($x+$x-140,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[4],4, "$codeTH2\n$timeTH2\n$roomTH2\n$profTH2\n/ $codeTH\n$timeTH\n$roomTH\n$profTH",1,'C',$fill);
					$this->setXY($x+$x-140,$y);
				}
			}
			if($cF == 0 or ($cF > 0 and $codeF2 == ""))
			{
				if($timeF<>"")
				
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[5],8, "$codeF\n$timeF\n$roomF\n$profF",1,'C',$fill);
					$this->setXY($x+$x-185,$y);
				}
				else if($codeF<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[5],10.66, "$codeF\n$roomF\n$profF",1,'C',$fill);
					$this->setXY($x+$x-185,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[5],16, "$courseF\n$codeF\n$roomF",1,'C',$fill);
					$this->setXY($x+$x-185,$y);
				}
			}
			elseif($cF > 0)
			{
				if($startF<$startF2)
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[5],4, "$codeF\n$timeF\n$roomF\n$profF\n/ $codeF2\n$timeF2\n$roomF2\n$profF2",1,'C',$fill);
					$this->setXY($x+$x-185,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[5],4, "$codeF2\n$timeF2\n$roomF2\n$profF2\n/ $codeF\n$timeF\n$roomF\n$profF",1,'C',$fill);
					$this->setXY($x+$x-185,$y);
				}
			}
			if($cS == 0 or ($cS > 0 and $codeS2 == ""))
			{
				if($timeS<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[6],8, "$codeS\n$timeS\n$roomS\n$profS",1,'C',$fill);
					$this->setXY($x,$y+24);
				}
				else if($codeS<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[6],10.66, "$codeS\n$roomS\n$profS",1,'C',$fill);
					$this->setXY($x,$y+21.3);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[6],16, "$courseS\n$codeS\n$roomS",1,'C',$fill);
					$this->setXY($x,$y+16);
				}
			}
			elseif($cS > 0)
			{
				if($startS<$startS2)
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[6],4, "$codeS\n$timeS\n$roomS\n$profS\n/ $codeS2\n$timeS2\n$roomS2\n$profS2",1,'C',$fill);
					$this->setXY($x,$y+28);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[6],4, "$codeS2\n$timeS2\n$roomS2\n$profS2\n/ $codeS\n$timeS\n$roomS\n$profS",1,'C',$fill);
					$this->setXY($x,$y+28);
				}
			}
			
			$this->Ln();
			
			//////////////////////////////////////////////////////////4:30 - 7:30 Timeframe////////////////////////////////////////////////////////////
									
			/**
			*eto ung mga variable para sa display, 2 yan kasi up to 2 lng ung maximum na display ng schedule kada box.
			*/
			$codeM = $codeT = $codeW = $codeTH = $codeF = $codeS = "";
			$secM =  $secT = $secW = $secTH = $secF = $secS = "";
			$yrlvlM = $yrlvlT = $yrlvlW = $yrlvlTH = $yrlvlF = $yrlvlS = ""; 
			$courseM = $courseT = $courseW =  $courseTH = $courseF = $courseS = "";
			$timeM = $timeT = $timeW = $timeTH = $timeF = $timeS = "";
			$roomM = $roomT = $roomW = $roomTH = $roomF = $roomS = "";
			$profM = $profT = $profW = $profTH = $profF = $profS = "";
			$startM = $startT = $startW = $startTH = $startF = $startS = 0;
			
			$codeM2 = $codeT2 = $codeW2 = $codeTH2 = $codeF2 = $codeS2 = "";
			$secM2 = $secT2 = $secW2 = $secTH2 = $secF2 = $secS2 = "";
			$yrlvlM2 = $yrlvlT2 = $yrlvlW2 = $yrlvlTH2 = $yrlvlF2 = $yrlvlS2 = ""; 
			$courseM2 = $courseT2 = $courseW2 = $courseTH2 = $courseF2 = $courseS2 = "";
			$timeM2 = $timeT2 = $timeW2 = $timeTH2 = $timeF2 = $timeS2 = "";
			$roomM2 = $roomT2 = $roomW2 = $roomTH2 = $roomF2 = $roomS2 = "";
			$profM2 = $profT2 = $profW2 = $profTH2 = $profF2 = $profS2 = "";
			$startM2 = $startT2 = $startW2 = $startTH2 = $startF2 = $startS2 = 0;
			
			/**
			*eto ung count kung may laman na ung isang box, kung meron na laman sa pangalawang variable ng time nya na ilalagay ung display ng time ska room.
			*/
			$cM = $cT = $cW = $cTH = $cF = $cS = 0;
			
			$sql1 = "SELECT * FROM tbl_schedule WHERE (sem = '$csem' and schoolYear = '$sy' and courseID = '$cors' and currID = '$currID' and cyear = '$cYear' and stimeS >= 1630) or (sem = '$csem' and schoolYear = '$sy' and courseID = '$cors' and currID = '$currID' and cyear = '$cYear' and stimeS < 1630 and stimeE > 1630)";
			$query1 = mysqli_query($conn,$sql1);
			while($row1 = mysqli_fetch_array($query1))
			{
				$currID = $row1['currID'];
				$cID = $row1['courseID'];
				//$day = getDay($row1['scode'],$row1['currID'],$row1['courseID'],$sy,$row1['csection'],$row1['cyear'],$csem);
				if(($row1['sday']=='M' and $row1['stimeS'] >= 1630) or ($row1['sday']=='M' and $row1['stimeS'] < 1630 and $row1['stimeE'] > 1630))
				{
					if($cM == 0)
					{
						$startM = $row1['stimeS'];
						$codeM = $row1['scode'];									
						$secM = $row1['csection'];
						$yrlvlM = $row1['cyear'];
						$profM = getProf($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
						if($row1['stimeS']<>1630 or $row1['stimeE'] <> 1930)
						{
							$timeM = getTime($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
						}
						else
						{
							$timeM = "";
						}
						$roomM = getRoom($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
						$cM = $cM + 1;
					}else if($cM > 0)
					{
						$startM2 = $row1['stimeS'];
						$codeM2 = $row1['scode'];									
						$secM2 = $row1['csection'];
						$yrlvlM2 = $row1['cyear'];
						$profM2 = getProf($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
						if($row1['stimeS']<>1630 or $row1['stimeE'] <> 1930)
						{
							$timeM2 = getTime($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
						}
						else
						{
							$timeM2 = "";
						}
						$roomM2 = getRoom($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
					}
				}
				else if(($row1['sday']=='T' and $row1['stimeS']>= 1630) or ($row1['sday']=='T' and $row1['stimeS'] < 1630 and $row1['stimeE'] > 1630))
				{
					if($cT == 0)
					{
						$startT = $row1['stimeS'];
						$codeT = $row1['scode'];									
						$secT = $row1['csection'];
						$yrlvlT = $row1['cyear'];
						$profT = getProf($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);										
						if($row1['stimeS']<>1630 or $row1['stimeE'] <> 1930)
						{
							$timeT = getTime($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);
						}
						else
						{
							$timeT = "";
						}	
						$roomT = getRoom($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);
						$cT = $cT + 1;
					}elseif ($cT > 0)
					{
						$startT2 = $row1['stimeS'];
						$codeT2 = $row1['scode'];									
						$secT2 = $row1['csection'];
						$yrlvlT2 = $row1['cyear'];
						$profT2 = getProf($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);										
						if($row1['stimeS']<>1630 or $row1['stimeE'] <> 1930)
						{
							$timeT2 = getTime($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);
						}
						else
						{
							$timeT2 = "";
						}	
						$roomT2 = getRoom($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);
					}
				}
				else if(($row1['sday'] == 'W' and $row1['stimeS']>= 1630) or ($row1['sday'] == 'W' and $row1['stimeS'] < 1630 and $row1['stimeE'] > 1630))
				{
					if($cW == 0)
					{
						$startW = $row1['stimeS'];
						$codeW = $row1['scode'];									
						$secW = $row1['csection'];
						$yrlvlW = $row1['cyear'];
						$profW = getProf($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);										
						if($row1['stimeS']<>1630 or $row1['stimeE'] <> 1930)
						{
							$timeW = getTime($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);
						}
						else
						{
							$timeW = "";
						}		
						$roomW = getRoom($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);
						$cW = $cW + 1;
					}elseif ($cW > 0)
					{
						$startW2 = $row1['stimeS'];
						$codeW2 = $row1['scode'];									
						$secW2 = $row1['csection'];
						$yrlvlW2 = $row1['cyear'];
						$profW2 = getProf($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);									
						if($row1['stimeS']<>1630 or $row1['stimeE'] <> 1930)
						{
							$timeW2 = getTime($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);
						}
						else
						{
							$timeW2 = "";
						}		
						$roomW2 = getRoom($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);
					}	
				}
				else if(($row1['sday'] == 'TH' and $row1['stimeS']>= 1630) or ($row1['sday'] == 'TH' and $row1['stimeS'] < 1630 and $row1['stimeE'] > 1630))
				{
					if($cTH == 0)
					{
						$startTH = $row1['stimeS'];
						$codeTH = $row1['scode'];									
						$secTH = $row1['csection'];
						$yrlvlTH = $row1['cyear'];
						$profTH = getProf($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);											
						if($row1['stimeS']<>1630 or $row1['stimeE'] <> 1930)
						{
							$timeTH = getTime($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);
						}
						else
						{
							$timeTH = "";
						}	
						$roomTH = getRoom($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);
						$cTH = $cTH + 1;
					}elseif($cTH > 0)
					{
						$startTH2 = $row1['stimeS'];
						$codeTH2 = $row1['scode'];									
						$secTH2 = $row1['csection'];
						$yrlvlTH2 = $row1['cyear'];
						$profTH2 = getProf($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);								
						if($row1['stimeS']<>1630 or $row1['stimeE'] <> 1930)
						{
							$timeTH2 = getTime($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);
						}
						else
						{
							$timeTH2 = "";
						}	
						$roomTH2 = getRoom($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);
					}
				}
				else if(($row1['sday'] == 'F' and $row1['stimeS']>= 1630) or ($row1['sday'] == 'F' and $row1['stimeS'] < 1630 and $row1['stimeE'] > 1630))
				{
					if($cF == 0)
					{
						$startF = $row1['stimeS'];
						$codeF = $row1['scode'];									
						$secF = $row1['csection'];
						$yrlvlF = $row1['cyear'];
						$profF = getProf($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);										
						if($row1['stimeS']<>1630 or $row1['stimeE'] <> 1930)
						{
							$timeF = getTime($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);
						}
						else
						{
							$timeF = "";
						}	
						$roomF = getRoom($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);
						$cF = $cF + 1;
					}elseif($cF > 0)
					{
						$startF2 = $row1['stimeS'];
						$codeF2 = $row1['scode'];									
						$secF2 = $row1['csection'];
						$yrlvlF2 = $row1['cyear'];
						$profF2 = getProf($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);										
						if($row1['stimeS']<>1630 or $row1['stimeE'] <> 1930)
						{
							$timeF2 = getTime($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);
						}
						else
						{
							$timeF2 = "";
						}	
						$roomF2 = getRoom($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);
					}
				}
				else if(($row1['sday'] == 'S' and $row1['stimeS']>= 1630) or ($row1['sday'] == 'S' and $row1['stimeS'] < 1630 and $row1['stimeE'] > 1630))
				{
					if($cS == 0)
					{
						$startS = $row1['stimeS'];
						$codeS = $row1['scode'];									
						$secS = $row1['csection'];
						$yrlvlS = $row1['cyear'];
						$profS = getProf($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
						if($row1['stimeS']<>1630 or $row1['stimeE'] <> 1930)
						{
							$timeS = getTime($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
						}
						else
						{
							$timeS = "";
						}
						$roomS = getRoom($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
						$cS = $cS + 1;
					}else if($cS > 0)
					{
						$startS2 = $row1['stimeS'];
						$codeS2 = $row1['scode'];									
						$secS2 = $row1['csection'];
						$yrlvlS2 = $row1['cyear'];
						$profS2 = getProf($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
						if($row1['stimeS']<>1630 or $row1['stimeE'] <> 1930)
						{
							$timeS2 = getTime($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
						}
						else
						{
							$timeS2 = "";
						}
						$roomS2 = getRoom($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
					}
				}
			}	
			
			$sql1 = "SELECT * FROM tbl_schedule WHERE (sem = '$csem' and schoolYear = '$sy' and courseID = '$cors' and currID = '$currID' and cyear = '$cYear' and stimeS2 >= 1630) or (sem = '$csem' and schoolYear = '$sy' and courseID = '$cors' and currID = '$currID' and cyear = '$cYear' and stimeS2 < 1630 and stimeE2 > 1630)";
			$query1 = mysqli_query($conn,$sql1);
			while($row1 = mysqli_fetch_array($query1))
			{
				$currID = $row1['currID'];
				$cID = $row1['courseID'];
				
				if(($row1['sday2']=='M' and $row1['stimeS2'] >= 1630) or ($row1['sday2']=='M' and $row1['stimeS2'] < 1630 and $row1['stimeE2'] > 1630))
				{
					if($cM == 0)
					{
						$startM = $row1['stimeS2'];
						$codeM = $row1['scode'];									
						$secM = $row1['csection'];
						$yrlvlM = $row1['cyear'];
						$profM = getProf($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
						if($row1['stimeS2']<>1630 or $row1['stimeE2'] <> 1930)
						{
							$timeM = getTime2($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
						}
						else
						{
							$timeM = "";
						}
						$roomM = getRoom2($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
						$cM = $cM + 1;
					}else if($cM > 0)
					{	
						$startM2 = $row1['stimeS2'];
						$codeM2 = $row1['scode'];									
						$secM2 = $row1['csection'];
						$yrlvlM2 = $row1['cyear'];
						$profM2 = getProf($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
						if($row1['stimeS2']<>1630 or $row1['stimeE2'] <> 1930)
						{
							$timeM2 = getTime2($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
						}
						else
						{
							$timeM2 = "";
						}
						$roomM2 = getRoom2($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
					}		
				}
				else if(($row1['sday2']=='T' and $row1['stimeS2']>= 1630) or ($row1['sday2']=='T' and $row1['stimeS2'] < 1630 and $row1['stimeE2'] > 1630))
				{
					if($cT == 0)
					{
						$startT = $row1['stimeS2'];
						$codeT = $row1['scode'];									
						$secT = $row1['csection'];
						$yrlvlT = $row1['cyear'];
						$profT = getProf($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);							
						if($row1['stimeS2']<>1630 or $row1['stimeE2'] <> 1930)
						{
							$timeT = getTime2($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);
						}
						else
						{
							$timeT = "";
						}	
						$roomT = getRoom2($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);
						$cT = $cT + 1;
					}elseif ($cT > 0)
					{
						$startT2 = $row1['stimeS2'];
						$codeT2 = $row1['scode'];									
						$secT2 = $row1['csection'];
						$yrlvlT2 = $row1['cyear'];
						$profT2 = getProf($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);								
						if($row1['stimeS2']<>1630 or $row1['stimeE2'] <> 1930)
						{
							$timeT2 = getTime2($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);
						}
						else
						{
							$timeT2 = "";
						}	
						$roomT2 = getRoom2($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);
					}
				}
				else if(($row1['sday2'] == 'W' and $row1['stimeS2']>= 1630) or ($row1['sday2'] == 'W' and $row1['stimeS2'] < 1630 and $row1['stimeE2'] > 1630))
				{
					if($cW == 0)
					{
						$startW = $row1['stimeS2'];
						$codeW = $row1['scode'];									
						$secW = $row1['csection'];
						$yrlvlW = $row1['cyear'];
						$profW = getProf($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);									
						if($row1['stimeS2']<>1630 or $row1['stimeE2'] <> 1930)
						{
							$timeW = getTime2($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);
						}
						else
						{
							$timeW = "";
						}		
						$roomW = getRoom2($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);
						$cW = $cW + 1;
					}elseif ($cW > 0)
					{
						$startW2 = $row1['stimeS2'];
						$codeW2 = $row1['scode'];									
						$secW2 = $row1['csection'];
						$yrlvlW2 = $row1['cyear'];
						$profW2 = getProf($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);										
						if($row1['stimeS2']<>1630 or $row1['stimeE2'] <> 1930)
						{
							$timeW2 = getTime2($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);
						}
						else
						{
							$timeW2 = "";
						}		
						$roomW2 = getRoom2($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);
					}
				}
				else if(($row1['sday2'] == 'TH' and $row1['stimeS2']>= 1630) or ($row1['sday2'] == 'TH' and $row1['stimeS2'] < 1630 and $row1['stimeE2'] > 1630))
				{
					if($cTH == 0)
					{
						$startTH = $row1['stimeS2'];
						$codeTH = $row1['scode'];									
						$secTH = $row1['csection'];
						$yrlvlTH = $row1['cyear'];
						$profTH = getProf($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);										
						if($row1['stimeS2']<>1630 or $row1['stimeE2'] <> 1930)
						{
							$timeTH = getTime2($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);
						}
						else
						{
							$timeTH = "";
						}	
						$roomTH = getRoom2($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);
						$cTH = $cTH + 1;
					}elseif($cTH > 0)
					{
						$startTH2 = $row1['stimeS2'];
						$codeTH2 = $row1['scode'];									
						$secTH2 = $row1['csection'];
						$yrlvlTH2 = $row1['cyear'];
						$profTH2 = getProf($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);										
						if($row1['stimeS2']<>1630 or $row1['stimeE2'] <> 1930)
						{
							$timeTH2 = getTime2($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);
						}
						else
						{
							$timeTH2 = "";
						}	
						$roomTH2 = getRoom2($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);
					}
				}
				else if(($row1['sday2'] == 'F' and $row1['stimeS2']>= 1630) or ($row1['sday2'] == 'F' and $row1['stimeS2'] < 1630 and $row1['stimeE2'] > 1630))
				{
					if($cF == 0)
					{
						$startF = $row1['stimeS2'];
						$codeF = $row1['scode'];									
						$secF = $row1['csection'];
						$yrlvlF = $row1['cyear'];
						$profF = getProf($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);											
						if($row1['stimeS2']<>1630 or $row1['stimeE2'] <> 1930)
						{
							$timeF = getTime2($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);
						}
						else
						{
							$timeF = "";
						}	
						$roomF = getRoom2($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);
						$cF = $cF + 1;
					}elseif($cF > 0)
					{
						$startF2 = $row1['stimeS2'];
						$codeF2 = $row1['scode'];									
						$secF2 = $row1['csection'];
						$yrlvlF2 = $row1['cyear'];
						$profF2 = getProf($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);											
						if($row1['stimeS2']<>1630 or $row1['stimeE2'] <> 1930)
						{
							$timeF2 = getTime2($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);
						}
						else
						{
							$timeF2 = "";
						}	
						$roomF2 = getRoom2($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);
					}	
				}
				else if(($row1['sday2'] == 'S' and $row1['stimeS2']>= 1630) or ($row1['sday2'] == 'S' and $row1['stimeS2'] < 1630 and $row1['stimeE2'] > 1630))
				{
					if($cS == 0)
					{
						$startS = $row1['stimeS2'];
						$codeS = $row1['scode'];									
						$secS = $row1['csection'];
						$yrlvlS = $row1['cyear'];
						$profS = getProf($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
						if($row1['stimeS2']<>1630 or $row1['stimeE2'] <> 1930)
						{
							$timeS = getTime2($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
						}
						else
						{
							$timeS = "";
						}
						$roomS = getRoom2($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
						$cS = $cS + 1;
					}else if($cS > 0)
					{
						$startS2 = $row1['stimeS2'];
						$codeS2 = $row1['scode'];									
						$secS2 = $row1['csection'];
						$yrlvlS2 = $row1['cyear'];
						$profS2 = getProf($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
						if($row1['stimeS2']<>1630 or $row1['stimeE2'] <> 1930)
						{
							$timeS2 = getTime2($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
						}
						else
						{
							$timeS2 = "";
						}
						$roomS2 = getRoom2($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
					}
				}
			}	
				
			$timeframe = "4:30 - 7:30 PM";
			
			$this->SetFont('seguisb','',12);
			$this->SetLineWidth(0.10);
			$this->Cell($w[0],32, '' . $timeframe,1,0,'C',$fill);
			$this->SetFont('seguisb','',9);
			if($cM == 0 or ($cM > 0 and $codeM2 == ""))
			{
				if($timeM<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[1],8, "$codeM\n$timeM\n$roomM\n$profM",1,'C',$fill);
					$this->setXY($x+$x-5,$y);
				}
				else if($codeM<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[1],10.66, "$codeM\n$roomM\n$profM",1,'C',$fill);
					$this->setXY($x+$x-5,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[1],16, "$courseM\n$codeM\n$roomM",1,'C',$fill);
					$this->setXY($x+$x-5,$y);
				}
			}
			elseif($cM > 0)
			{
				if($startM<$startM2)
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[1],4, "$codeM\n$timeM\n$roomM\n$profM\n/ $codeM2\n$timeM2\n$roomM2\n$profM2",1,'C',$fill);
					$this->setXY($x+$x-5,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[1],4, "$codeM2\n$timeM2\n$roomM2\n$profM2\n/ $codeM\n$timeM\n$roomM\n$profM",1,'C',$fill);
					$this->setXY($x+$x-5,$y);
				}
			}
			if($cT == 0 or ($cT > 0 and $codeT2 == ""))
			{
				if($timeT<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[2],8, "$codeT\n$timeT\n$roomT\n$profT",1,'C',$fill);
					$this->setXY($x+$x-50,$y);
				}
				else if($codeT<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[2],10.66, "$codeT\n$roomT\n$profT",1,'C',$fill);
					$this->setXY($x+$x-50,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[2],16, "$courseT\n$codeT\n$roomT",1,'C',$fill);
					$this->setXY($x+$x-50,$y);
				}
			}
			elseif($cT > 0)
			{
				if($startT<$startT2)
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[2],4, "$codeT\n$timeT\n$roomT\n$profT\n/ $codeT2\n$timeT2\n$roomT2\n$profT2",1,'C',$fill);
					$this->setXY($x+$x-50,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[2],4, "$codeT2\n$timeT2\n$roomT2\n$profT2\n/ $codeT\n$timeT\n$roomT\n$profT",1,'C',$fill);
					$this->setXY($x+$x-50,$y);
				}
			}
			if($cW == 0 or ($cW > 0 and $codeW2 == ""))
			{
				if($timeW<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[3],8, "$codeW\n$timeW\n$roomW\n$profW",1,'C',$fill);
					$this->setXY($x+$x-95,$y);
				}
				else if($codeW<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[3],10.66, "$codeW\n$roomW\n$profW",1,'C',$fill);
					$this->setXY($x+$x-95,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[3],16, "$courseW\n$codeW\n$roomW",1,'C',$fill);
					$this->setXY($x+$x-95,$y);
				}
			}
			elseif($cW > 0)
			{
				if($startW<$startW2)
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[3],4, "$codeW\n$timeW\n$roomW\n$profW\n/ $codeW2\n$timeW2\n$roomW2\n$profW2",1,'C',$fill);
					$this->setXY($x+$x-95,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[3],4, "$codeW2\n$timeW2\n$roomW2\n$profW2\n/ $codeW\n$timeW\n$roomW\n$profW",1,'C',$fill);
					$this->setXY($x+$x-95,$y);
				}
			}
			if($cTH == 0 or ($cTH > 0 and $codeTH2 == ""))
			{
				if($timeTH<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[4],8, "$codeTH\n$timeTH\n$roomTH\n$profTH",1,'C',$fill);
					$this->setXY($x+$x-140,$y);
				}
				else if($codeTH<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[4],10.66, "$codeTH\n$roomTH\n$profTH",1,'C',$fill);
					$this->setXY($x+$x-140,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[4],16, "$courseTH\n$codeTH\n$roomTH",1,'C',$fill);
					$this->setXY($x+$x-140,$y);
				}
			}
			elseif($cTH > 0)
			{
				if($startTH<$startTH2)
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[4],4, "$codeTH\n$timeTH\n$roomTH\n$profTH\n/ $codeTH2\n$timeTH2\n$roomTH2\n$profTH2",1,'C',$fill);
					$this->setXY($x+$x-140,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[4],4, "$codeTH2\n$timeTH2\n$roomTH2\n$profTH2\n/ $codeTH\n$timeTH\n$roomTH\n$profTH",1,'C',$fill);
					$this->setXY($x+$x-140,$y);
				}
			}
			if($cF == 0 or ($cF > 0 and $codeF2 == ""))
			{
				if($timeF<>"")
				
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[5],8, "$codeF\n$timeF\n$roomF\n$profF",1,'C',$fill);
					$this->setXY($x+$x-185,$y);
				}
				else if($codeF<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[5],10.66, "$codeF\n$roomF\n$profF",1,'C',$fill);
					$this->setXY($x+$x-185,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[5],16, "$courseF\n$codeF\n$roomF",1,'C',$fill);
					$this->setXY($x+$x-185,$y);
				}
			}
			elseif($cF > 0)
			{
				if($startF<$startF2)
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[5],4, "$codeF\n$timeF\n$roomF\n$profF\n/ $codeF2\n$timeF2\n$roomF2\n$profF2",1,'C',$fill);
					$this->setXY($x+$x-185,$y);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[5],4, "$codeF2\n$timeF2\n$roomF2\n$profF2\n/ $codeF\n$timeF\n$roomF\n$profF",1,'C',$fill);
					$this->setXY($x+$x-185,$y);
				}
			}
			if($cS == 0 or ($cS > 0 and $codeS2 == ""))
			{
				if($timeS<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[6],8, "$codeS\n$timeS\n$roomS\n$profS",1,'C',$fill);
					$this->setXY($x,$y+24);
				}
				else if($codeS<>"")
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[6],10.66, "$codeS\n$roomS\n$profS",1,'C',$fill);
					$this->setXY($x,$y+21.3);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[6],16, "$courseS\n$codeS\n$roomS",1,'C',$fill);
					$this->setXY($x,$y+16);
				}
			}
			elseif($cS > 0)
			{
				if($startS<$startS2)
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[6],4, "$codeS\n$timeS\n$roomS\n$profS\n/ $codeS2\n$timeS2\n$roomS2\n$profS2",1,'C',$fill);
					$this->setXY($x,$y+28);
				}
				else
				{
					$x=$this->GetX();
					$y=$this->GetY();
					$this->SetFillColor(260,260,260);
					$this->MultiCell($w[6],4, "$codeS2\n$timeS2\n$roomS2\n$profS2\n/ $codeS\n$timeS\n$roomS\n$profS",1,'C',$fill);
					$this->setXY($x,$y+28);
				}
			}
			
			$this->Ln();
	}
}	

	function getProf($scode,$currID,$cID,$sy,$sec,$yrlvl,$sem)
	{
		include("config.php");
		$sql ="SELECT * FROM tbl_schedule WHERE scode ='$scode' AND currID = '$currID' AND cyear = '$yrlvl' AND sem = '$sem' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		$prof = getName($row['sprof']);
		return $prof;
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
	
	function getCourse($ccode) 
	{
		include("config.php");
		$sql = "SELECT * FROM tbl_course WHERE course ='$ccode'"; 
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		$code = $row['course_code'];
		return $code;
	}
	
	function getDay($scode,$currID,$cID,$sy,$sec,$yrlvl,$sem)
	{
		include("config.php");
		$sql ="SELECT * FROM tbl_schedule WHERE scode ='$scode' AND currID = '$currID' AND cyear = '$yrlvl' AND sem = '$sem' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		$day = $row['sday'];
		return $day;
	}
	
	function getRoom($scode,$currID,$cID,$sy,$sec,$yrlvl,$sem)
	{
		include("config.php");
		$sql ="SELECT * FROM tbl_schedule WHERE scode ='$scode' AND currID = '$currID' AND cyear = '$yrlvl' AND sem = '$sem' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		$room = $row['sroom'];
		return $room;
	}
	
	function getRoom2($scode,$currID,$cID,$sy,$sec,$yrlvl,$sem)
	{
		include("config.php");
		$sql ="SELECT * FROM tbl_schedule WHERE scode ='$scode' AND currID = '$currID' AND cyear = '$yrlvl' AND sem = '$sem' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		$room = $row['sroom2'];
		return $room;
	}
	
	function getTime($scode,$currID,$cID,$sy,$sec,$yrlvl,$sem)
	{
		include("config.php");
		$sql ="SELECT * FROM tbl_schedule WHERE scode ='$scode' AND currID = '$currID' AND cyear = '$yrlvl' AND sem = '$sem' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		if($row['stimeS']<>0){
			$time = to12Hr($row['stimeS']) . '-' . to12Hr($row['stimeE']);
		}else{
			$time = "";
		}
		return $time;
	}
	
	function getTime2($scode,$currID,$cID,$sy,$sec,$yrlvl,$sem)
	{
		include("config.php");
		$sql ="SELECT * FROM tbl_schedule WHERE scode ='$scode' AND currID = '$currID' AND cyear = '$yrlvl' AND sem = '$sem' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		if($row['stimeS2']<>0){
			$time = to12Hr($row['stimeS2']) . '-' . to12Hr($row['stimeE2']);
		}else{
			$time = "";
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
	/*$pdf->AddPage('L');
	$page++;
	$i = 1;
	$pdf->table($i);
	*/
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