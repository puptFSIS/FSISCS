 <?php
require('fpdf.php');
class PDF extends FPDF
{
	function Header()
	{
		$this->SetLineWidth(0.75);
		$this->SetY(15);
		$this->SetX(12);
		$this->Cell(190,298,'',1,0,'C');
		$this->AddFont('ariblk','','ariblk.php');
		$this->AddFont('ARIALN','','ARIALN.php');
		$this->AddFont('ARIALNI','','ARIALNI.php');
		$this->AddFont('ARIALNBI','','ARIALNBI.php');
		$this->SetFont('ARIALN','',7.5);
		session_start();
		$EmpID= "";
		if(isset($_SESSION['CEmpID'])) {
			$EmpID = $_SESSION['CEmpID'];
		} else {
			die(header("Location: index.php?r=site/index"));
		}
	}
	function Footer()
	{
		
	}
	
	function VWork()
	{
		$t = true;
		$T = true;
		$f = false;
		$F = false;
		
		$this->SetY(16);
		$this->SetX(12);
		$this->title();
		$this->Cell(190,6,'VI. VOLUNTARY WORK OR INVOLVEMENT IN CIVIC/ NON-GOVERNMENT / PEOPLE / VOLUNTARY ORGANIZATION/S',1,0,'L', $t);
		
		$this->SetY(85);
		$this->SetX(12);
		$this->title();
		$this->Cell(190,6,'VII. TRAINING PROGRAMS (Start from the most recent training.)',1,0,'L', $t);
		
		$this->SetY(244.35);
		$this->SetX(12);
		$this->title();
		$this->Cell(190,6,'VIII. OTHER INFORMATION.)',1,0,'L', $t);
		
		// NAME AND ADDRESS OF ORGANIZATION
		$this->labelF();
		$this->SetY(22.20);
		$this->SetX(12.25);
		$this->Cell(83,4,'',"LTR",0,'L', $t);
		$this->labelF();
		$this->SetY(25.95);
		$this->SetX(12.25);
		$this->Cell(83,3,'NAME & ADDRESS OF ORGANIZATION',"LR",0,'C', $t);
		$this->labelF();
		$this->SetY(28.95);
		$this->SetX(12.25);
		$this->Cell(83,3,'(Write in full)',"LR",0,'C', $t);
		$this->labelF();
		$this->SetY(31.95);
		$this->SetX(12.25);
		$this->Cell(83,4,'',"LBR",0,'L', $t);
		$this->labelF();
		$this->SetY(25.95);
		$this->SetX(12.25);
		$this->Cell(5,3,'  31. ',"L",0,'L', $t);
	
		// INCLUSIVE DATES 
		$this->labelF();
		$this->SetY(22.20);
		$this->SetX(95.25);
		$this->Cell(42,1.5,'',"LTR",0,'L', $t);
		$this->labelF();
		$this->SetY(23.70);
		$this->SetX(95.25);
		$this->Cell(42,3,'INCLUSIVE DATES',"LR",0,'C', $t);
		$this->labelF();
		$this->SetY(26.70);
		$this->SetX(95.25);
		$this->Cell(42,3,'(mm/dd/yyyy)',"LR",0,'C', $t);
		$this->labelF();
		$this->SetY(29.70);
		$this->SetX(95.25);
		$this->Cell(42,1.5,'',"LBR",0,'L', $t);	
		$this->labelF();
		$this->SetY(31.20);
		$this->SetX(95.25);
		$this->Cell(21,4.7,'From',1,0,'C', $t);
		$this->labelF();
		$this->SetY(31.20);
		$this->SetX(116.25);
		$this->Cell(21,4.7,'To',1,0,'C', $t);
		
		// NUMBER OF HOURS
		$this->labelF();
		$this->SetY(22.20);
		$this->SetX(137.25);
		$this->Cell(16,4,'',"LTR",0,'L', $t);
		$this->labelF();
		$this->SetY(25.95);
		$this->SetX(137.25);
		$this->Cell(16,3,'NUMBER OF',"LR",0,'C', $t);
		$this->labelF();
		$this->SetY(28.95);
		$this->SetX(137.25);
		$this->Cell(16,3,'HOURS',"LR",0,'C', $t);
		$this->labelF();
		$this->SetY(31.95);
		$this->SetX(137.25);
		$this->Cell(16,4,'',"LBR",0,'L', $t);
		
		// POSITION /NATURE OF WORK
		$this->labelF();
		$this->SetY(22.20);
		$this->SetX(153.25);
		$this->Cell(48.5,5,'',"LTR",0,'L', $t);
		$this->labelF();
		$this->SetY(27.20);
		$this->SetX(153.25);
		$this->Cell(48.5,4,'POSITION / NATURE OF WORK',"LR",0,'C', $t);
		$this->labelF();
		$this->SetY(31.20);
		$this->SetX(153.25);
		$this->Cell(48.5,4.75,'',"LBR",0,'C', $t);
		
		// _SESSION & INCLUDE
		include("getVWork.php");
		$this->SetY(36);
		$this->SetX(12);
		
		// CIVIL SERVICE EXAMINATION DATA
		$w = array(83.25,21,21,16,48.5);
		for ($ctr=0; $ctr<5; $ctr++) {
			$this->labelF();
			$this->Cell($w[0], 9, '', 1, 0, 'C', $f);
			if($orgname[$ctr]!="  ") {
				$this->Cell($w[1], 9, $fm[$ctr] . '/' . $fd[$ctr] . '/' . $fy[$ctr], 1, 0, 'C', $f);
				if(strtoupper($ty[$ctr]=="PRESENT")) {
					$this->Cell($w[2], 9,'PRESENT', 1, 0, 'C', $f);
				} else {
					$this->Cell($w[2], 9, $tom[$ctr] . '/' . $td[$ctr]  . '/' . $ty[$ctr], 1, 0, 'C', $f);
				}
				
			} else {
				$this->Cell($w[1], 9, '', 1, 0, 'C', $f);
				$this->Cell($w[2], 9, '', 1, 0, 'C', $f);
			}
			$this->Cell($w[3], 9, $hours[$ctr], 1, 0, 'C', $f);
			$this->Cell($w[4], 9, '', 1, 0, 'C', $f);
			$this->Ln();
			$this->SetX(12);
		}
		
		//CONTINUE
		$this->conti();
		
		// ORG NAME AND ORG ADDRESS
		$this->SetY(36);
		$this->SetX(12);
		$w = array(83.25);
		for ($ctr=0; $ctr<5; $ctr++) {
			if(strlen($orgname[$ctr])>=0 and strlen($orgname[$ctr])<=52) {
				$this->labelF();
				$this->Cell($w[0], 9,'   ' . strtoupper($orgname[$ctr]), 0, 0, 'L', $f);
				$this->Ln();
				$this->SetX(12);
			} else if(strlen($orgname[$ctr])>=53 and strlen($orgname[$ctr])<=103) {
				$this->labelF();
				$this->Cell($w[0], 4.5,'   ' . substr(strtoupper($orgname[$ctr]), 0,52), 0, 0, 'L', $f);
				$this->Ln();
				$this->SetX(12);
				$this->Cell($w[0], 4.5,'   ' . substr(strtoupper($orgname[$ctr]), 52,52), 0, 0, 'L', $f);
				$this->Ln();
				$this->SetX(12);
			} else if(strlen($orgname[$ctr])>=104 and strlen($orgname[$ctr])<=156) {
				$this->labelF();
				$this->Cell($w[0], 3,'   ' . substr(strtoupper($orgname[$ctr]), 0,52), 0, 0, 'L', $f);
				$this->Ln();
				$this->SetX(12);
				$this->Cell($w[0], 3,'   ' . substr(strtoupper($orgname[$ctr]), 52,52), 0, 0, 'L', $f);
				$this->Ln();
				$this->SetX(12);
				$this->Cell($w[0], 3,'   ' . substr(strtoupper($orgname[$ctr]), 104,52), 0, 0, 'L', $f);
				$this->Ln();
				$this->SetX(12);
			} 
		}
		
		// POSITION / NATURE OF WORK
		$this->SetY(36);
		$this->SetX(153.25);
		$w = array(48.5);
		for ($ctr=0; $ctr<5; $ctr++) {
			if(strlen($pos[$ctr])>=0 and strlen($pos[$ctr])<=31) {
				$this->labelF();
				$this->Cell($w[0], 9, strtoupper($pos[$ctr]), 0, 0, 'C', $f);
				$this->Ln();
				$this->SetX(153.25);
			} else if(strlen($pos[$ctr])>=32 and strlen($pos[$ctr])<=74) {
				$this->labelF();
				$this->Cell($w[0], 4.5, strtoupper(substr($pos[$ctr],0,30)), 0, 0, 'C', $f);
				$this->Ln();
				$this->SetX(153.25);
				$this->Cell($w[0], 4.5, strtoupper(substr($pos[$ctr],30,30)), 0, 0, 'C', $f);
				$this->Ln();
				$this->SetX(153.25);
			} else {
				$this->labelF();
				$this->Cell($w[0], 3, substr(strtoupper($pos[$ctr]),0,31), 0, 0, 'C', $f);
				$this->Ln();
				$this->SetX(153.25);
				$this->Cell($w[0], 3, substr(strtoupper($pos[$ctr]),31,31), 0, 0, 'C', $f);
				$this->Ln();
				$this->SetX(153.25);
				$this->Cell($w[0], 3, substr(strtoupper($pos[$ctr]),72,31), 0, 0, 'C', $f);
				$this->Ln();
				$this->SetX(153.25);
			}
		}
	}
	function TrainingPrograms()
	{
		$t = true;
		$T = true;
		$f = false;
		$F = false;
		
		// NAME AND ADDRESS OF ORGANIZATION
		$this->labelF();
		$this->SetY(91.20);
		$this->SetX(12.25);
		$this->Cell(83,4,'',"LTR",0,'L', $t);
		$this->labelF();
		$this->SetY(95.20);
		$this->SetX(12.25);
		$this->Cell(83,3,'TITLE OF SEMINAR/CONFERENCE/WORKSHOP/SHORT COURSES',"LR",0,'C', $t);
		$this->labelF();
		$this->SetY(98.20);
		$this->SetX(12.25);
		$this->Cell(83,3,'(Write in full)',"LR",0,'C', $t);
		$this->labelF();
		$this->SetY(101.20);
		$this->SetX(12.25);
		$this->Cell(83,4,'',"LBR",0,'L', $t);
		$this->labelF();
		$this->SetY(95.20);
		$this->SetX(12.25);
		$this->Cell(5,3,'  31. ',"L",0,'L', $t);
	
		// INCLUSIVE DATES 
		$this->labelF();
		$this->SetY(91.20);
		$this->SetX(95.25);
		$this->Cell(42,1.5,'',"LTR",0,'L', $t);
		$this->labelF();
		$this->SetY(92.70);
		$this->SetX(95.25);
		$this->Cell(42,3,'INCLUSIVE DATES',"LR",0,'C', $t);
		$this->labelF();
		$this->SetY(95.70);
		$this->SetX(95.25);
		$this->Cell(42,3,'(mm/dd/yyyy)',"LR",0,'C', $t);
		$this->labelF();
		$this->SetY(98.70);
		$this->SetX(95.25);
		$this->Cell(42,1.5,'',"LBR",0,'L', $t);	
		$this->labelF();
		$this->SetY(100.20);
		$this->SetX(95.25);
		$this->Cell(21,5,'From',1,0,'C', $t);
		$this->labelF();
		$this->SetY(100.20);
		$this->SetX(116.25);
		$this->Cell(21,5,'To',1,0,'C', $t);
		
		// NUMBER OF HOURS
		$this->labelF();
		$this->SetY(91.20);
		$this->SetX(137.25);
		$this->Cell(16,4,'',"LTR",0,'L', $t);
		$this->labelF();
		$this->SetY(95.20);
		$this->SetX(137.25);
		$this->Cell(16,3,'NUMBER OF',"LR",0,'C', $t);
		$this->labelF();
		$this->SetY(98.20);
		$this->SetX(137.25);
		$this->Cell(16,3,'HOURS',"LR",0,'C', $t);
		$this->labelF();
		$this->SetY(101.25);
		$this->SetX(137.25);
		$this->Cell(16,4,'',"LBR",0,'L', $t);
		
		// POSITION /NATURE OF WORK
		$this->labelF();
		$this->SetY(91.20);
		$this->SetX(153.25);
		$this->Cell(48.5,5,'',"LTR",0,'L', $t);
		$this->labelF();
		$this->SetY(96.20);
		$this->SetX(153.25);
		$this->Cell(48.5,4,'POSITION / NATURE OF WORK',"LR",0,'C', $t);
		$this->labelF();
		$this->SetY(100.20);
		$this->SetX(153.25);
		$this->Cell(48.5,5,'',"LBR",0,'C', $t);
		
		// _SESSION & INCLUDE
		include("getTPrograms.php");
		$this->SetY(105.20);
		$this->SetX(12);
		// CIVIL SERVICE EXAMINATION DATA
		$w = array(83.25,21,21,16,48.5);
		for ($ctr=0; $ctr<15; $ctr++) {
			$this->labelF();
			$this->Cell($w[0], 9, '', 1, 0, 'C', $f);
			$this->Cell($w[1], 9, $fm[$ctr] . '/' . $fd[$ctr] . '/' . $fy[$ctr], 1, 0, 'C', $f);
			if(strtoupper($ty[$ctr]=="PRESENT")) {
					$this->Cell($w[2], 9,'PRESENT', 1, 0, 'C', $f);
				} else {
					$this->Cell($w[2], 9, $tom[$ctr] . '/' . $td[$ctr]  . '/' . $ty[$ctr], 1, 0, 'C', $f);
				}
			$this->Cell($w[3], 9, $hours[$ctr], 1, 0, 'C', $f);
			$this->Cell($w[4], 9, '', 1, 0, 'C', $f);
			$this->Ln();
			$this->SetX(12);
		}
		
		//CONTINUE
		$this->conti();
		
		$this->SetY(105.20);
		$this->SetX(12);
		
		$w = array(83.25);
		for ($ctr=0; $ctr<15; $ctr++) {
			if(strlen($title[$ctr]>=51)) {
				$this->labelF();
				$this->Cell($w[0], 4.5, strtoupper(substr($title[$ctr],0,50)), 0, 0, 'L', $f);
				$this->Ln();
				$this->SetX(12);
				$this->Cell($w[0], 4.5, strtoupper(substr($title[$ctr],50,50)), 0, 0, 'L', $f);
				$this->Ln();
				$this->SetX(12);
			} else {
				$this->labelF();
				$this->Cell($w[0], 9, strtoupper($title[$ctr]), 0, 0, 'L', $f);
				$this->Ln();
				$this->SetX(12);
			}
		}
		
		$this->SetY(105.20);
		$this->SetX(153.25);
		
		$w = array(48.5);
		for ($ctr=0; $ctr<15; $ctr++) {
			if(strlen($conby[$ctr]>=35)) {
				$this->labelF();
				$this->Cell($w[0], 4.5,' ' . strtoupper(substr($conby[$ctr],0,35)), 0, 0, 'L', $f);
				$this->Ln();
				$this->SetX(153.25);
				$this->Cell($w[0], 4.5,' ' . strtoupper(substr($conby[$ctr],35,35)), 0, 0, 'L', $f);
				$this->Ln();
				$this->SetX(153.25);
			} else {
				$this->labelF();
				$this->Cell($w[0], 9,' ' . strtoupper($conby[$ctr]), 0, 0, 'L', $f);
				$this->Ln();
				$this->SetX(153.25);
			}
		}
	}
	function otherInformation()
	{
		$t = True;
		$T = True;
		$f = False;
		$F = False;
		
		// SPECIAL SKILLS / HOBBIES
		$this->labelF();
		$this->SetY(250.5);
		$this->SetX(12.20);
		$this->Cell(64,9,'SPECIAL SKILLS / HOBBIES:',1,0,'C', $t);
		$this->labelF();
		$this->SetY(250.5);
		$this->SetX(13);
		$this->Cell(3,9,' 33. ',"TB",0,'L', $t);
		
		// NON-ACADEMIC DISTINCTIONS / RECOGNITION
		$this->labelF();
		$this->SetY(250.5);
		$this->SetX(76.20);
		$this->Cell(77,1.5,'',"LRT",0,'C', $t);
		$this->SetY(252);
		$this->SetX(76.20);
		$this->Cell(77,3,'NON-ACADEMIC DISTINCTIONS / RECOGNITION:',"LR",0,'C', $t);
		$this->SetY(255);
		$this->SetX(76.20);
		$this->Cell(77,3,'(Write in full)',"LR",0,'C', $t);
		$this->SetY(258);
		$this->SetX(76.20);
		$this->Cell(77,1.5,'',"LRB",0,'C', $t);
		$this->labelF();
		$this->SetY(250.5);
		$this->SetX(77);
		$this->Cell(3,9,' 34. ',"TB",0,'L', $t);
		
		//MEMBERSHIP
		$this->labelF();
		$this->SetY(250.5);
		$this->SetX(153.20);
		$this->Cell(48.6,3,'MEMBERSHIP IN',"LRT",0,'C', $t);
		$this->labelF();
		$this->SetY(253.5);
		$this->SetX(153.20);
		$this->Cell(48.6,3,'ASSOCIATION/ORGANIZATION',"LR",0,'C', $t);
		$this->labelF();
		$this->SetY(256.5);
		$this->SetX(153.20);
		$this->Cell(48.6,3,'(Write in full)',"LRB",0,'C', $t);
		$this->labelF();
		$this->SetY(250.5);
		$this->SetX(154);
		$this->Cell(3,9,' 35. ',"TB",0,'L', $t);
		
		include("getSKH.php");
		include("getNADR.php");
		include("getMIAO.php");
		$this->SetY(259.50);
		$this->SetX(12);
		// OTHER INFORMATION DATA
		$w = array(64.25,77,49);
		for ($ctr=0; $ctr<5; $ctr++) {
			$this->labelF();
			$this->Cell($w[0], 9, $skh[$ctr], 1, 0, 'C', $f);
			$this->Cell($w[1], 9, $nadr[$ctr], 1, 0, 'C', $f);
			$this->Cell($w[2], 9, $miao[$ctr], 1, 0, 'C', $f);

			$this->Ln();
			$this->SetX(12);
		}
		$this->conti();
		$this->Ln();
		$this->SetLineWidth(0.5);
		$this->SetFont('ARIALN','',7.5);
		$this->SetX(12.0);
		$this->SetTextColor(0);
		$this->Cell(190, 4, 'CS FORM 212 (Revised 2005), Page 3 of 4', 1, 0,'R', false);
		
		//$_SESSION['CEmpID'] = $_SESSION['TEmpID'];
	}
	function pageTwo() 
	{
		$this->VWork();
		$this->TrainingPrograms();
		$this->OtherInformation();
	}
	function conti()
	{
		$this->SetLineWidth(0.5);
		$this->SetFont('ARIALNI','',8);
		$this->SetTextColor(237,28,36);
		$this->Cell(190, 4, '(Continue on separate sheet if necessary)', 1, 0,'C', true);
	}
	function title() 
	{
		$this->SetLineWidth(0.5);
		$this->SetFillColor(151,151,151);
		$this->SetTextColor(255);
		$this->SetFont('ARIALNBI','',10.5);
	}
	function labelF() 
	{
		$this->SetLineWidth(0.25);
		$this->SetFont('ARIALN','',7.5);
		$this->SetFillColor(235,235,235);
		$this->SetTextColor(0);
	}

}		
	require('makefont/makefont.php');
	//MakeFont('font/ARIALNBI.ttf','cp1252');
	$pdf = new PDF('P','mm','Legal');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('ARIALN','',9);
	$pdf->SetAutoPageBreak(false);
	$pdf->PageTwo();
	$pdf->Output();
?>