<?php
require('fpdf.php');
class PDF extends FPDF
{
	function Header()
	{
		$this->SetLineWidth(0.75);
		$this->SetY(15);
		$this->SetX(12);
		$this->Cell(188,297,'',1,0,'C');
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
	
	function otherInformation()
	{
		include("config.php");
		include("gqa.php");
		$path = "";
		$EmpID = $_SESSION['CEmpID'];
		
		$t = True;
		$T = True;
		$f = False;
		$F = False;
		
		$this->SetLineWidth(0.75);
		$this->SetY(15);
		$this->SetX(12.20);
		$this->Cell(187,1,'',"LTB",0,'C', $F);
		$this->SetLineWidth(0.25);
		$this->Ln();
		$this->SetX(12.20);
		$this->SetFillColor(235,235,235);
		$this->Cell(124,54,'',1,0,'C', $T);
		$this->Cell(64,54,'',1,0,'C', $F);
		$this->Ln();
		$this->SetX(12.20);
		$this->Cell(124,37,'',1,0,'C', $T);
		$this->Cell(64,37,'',1,0,'C', $F);
		$this->Ln();
		$this->SetX(12.20);
		$this->Cell(124,18,'',1,0,'C', $T);
		$this->Cell(64,18,'',1,0,'C', $F);
		$this->Ln();
		$this->SetX(12.20);
		$this->Cell(124,24,'',1,0,'C', $T);
		$this->Cell(64,24,'',1,0,'C', $F);
		$this->Ln();
		$this->SetX(12.20);
		$this->Cell(124,19,'',1,0,'C', $T);
		$this->Cell(64,19,'',1,0,'C', $F);
		$this->Ln();
		$this->SetX(12.20);
		$this->Cell(124,41,'',1,0,'C', $T);
		$this->Cell(64,41,'',1,0,'C', $F);
		
		$this->SetLineWidth(0.75);
		$this->Ln();
		$this->SetX(12);
		$this->Cell(188,6,'  42. REFERENCES',"LTB",0,'L', $T);
		

		$this->Ln();
		$this->SetX(12);
		
		$this->SetFillColor(235,235,235);
		$this->SetLineWidth(0.25);

		$this->Cell(70,6,'NAME',1,0,'C', $T);
		$this->Cell(54.20,6,'ADDRESS',1,0,'C', $T);
		$this->Cell(22,6,'TEL. NO.',1,0,'C', $T);
		
		include("getReferences.php");
		$w = array(70,54.20,22);
		$y1 = 6;
		for ($ctr=0; $ctr<4; $ctr++) {
			$this->SetX(12);
			if($ctr==2 || $ctr==3) {
				$y1 = 7;
			}
			$this->labelF();
			$this->Cell($w[0], $y1, '   ' . strtoupper($name[$ctr]), 1, 0, 'L', $f);
			$this->Cell($w[1], $y1, '   ' . strtoupper($address[$ctr]), 1, 0, 'C', $f);
			$this->Cell($w[2], $y1, '   ' . strtoupper($telno[$ctr]), 1, 0, 'C', $f);
			$this->Ln();
		}
		
		$this->SetLineWidth(0.75);
		$this->SetX(12.5);
		$this->Cell(145.5,23,'',"TR",0,'C', $T);
		
		$this->SetLineWidth(0.25);
		$this->Ln();
		$this->SetX(12);
		$this->Cell(188,38,'',1,0,'C', $F);
		
		$this->SetLineWidth(0.75);
		$this->Ln();
		$this->SetX(12);
		$this->Cell(188,4,'',1,0,'C', $F);
		$this->SetLineWidth(0.75);
		$this->Ln();
		$this->SetX(12);
		$this->Cell(188,5,'CS FORM 212 (Revised 2005), Page 4 of 4',1,0,'R', $F);
		
		$this->SetLineWidth(0.25);
		$this->SetXY(17,266);
		$this->Cell(62,5,$certno,1,0,'C', $F);
		$this->SetFillColor(235,235,235);
		$this->SetXY(17,271);
		$this->Cell(62,5,'COMMUNITY TAX CERTIFICATE NO.',1,0,'C', $T);
		
		$this->SetXY(17,278);
		$this->Cell(62,5,$iat,1,0,'C', $F);
		$this->SetFillColor(235,235,235);
		$this->SetXY(17,283);
		$this->Cell(62,5,'ISSUED AT',1,0,'C', $T);
		
		$this->SetXY(17,290);
		$this->Cell(62,5,$ionm . '  /  ' . $iond . '  /  ' . $iony,1,0,'C', $F);
		$this->SetFillColor(235,235,235);
		$this->SetXY(17,295);
		$this->Cell(62,5,'ISSUED ON (mm/dd/yyyy)',1,0,'C', $T);
		
		$this->SetXY(81,266);
		$this->Cell(77,17,'',1,0,'R', $F);
		$this->SetFillColor(235,235,235);
		$this->SetXY(81,283);
		$this->Cell(77,5,'SIGNATURE',1,0,'C', $T);
		
		$sql = "SELECT * FROM tbl_evaluationfaculty as ef JOIN tbl_personalinformation as p ON ef.EmpID = p.EmpID
			JOIN tbl_familybackground as f ON f.EmpID = ef.EmpID 
			JOIN tbl_educationalbackground as e ON e.EmpID = ef.EmpID
			JOIN tbl_profpic as pic ON pic.EmpID = ef.EmpID
			where ef.EmpID = '$EmpID' and e.level = 'COLLEGE'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		if($row['surname']=="" || $row['firstname']=="" || $row['middlename']=="" || $row['SSS_NO']=="" || $row['PAGIBIG_ID_NO']=="" || $row['residentialAddress']=="" || $row['spouseFSurname']=="" || $row['spouseFFirstname']=="" || $row['spouseFMiddlename']=="" || $row['spouseMSurname']=="" || $row['spouseMFirstname']=="" || $row['spouseMMiddlename']=="" || $row['level']=="" || $row['path']=="")
			$display = "";
		else {
			$date = mysqli_query($conn,"select DATE_FORMAT(NOW(),'%M %d, %Y') as DateNow");
			$row_date = mysqli_fetch_array($date);
			$display = $row_date['DateNow'];
		}
			
		$this->SetXY(81,290);
		$this->Cell(77,5,''.$display.'' ,1,0,'C', $F);
		$this->SetFillColor(235,235,235);
		$this->SetXY(81,295);
		$this->Cell(77,5,'DATE ACCOMPLISHED',1,0,'C', $T);
		
		$this->SetXY(159.5,266);
		$this->Cell(38,29,'',1,0,'R', $F);
		$this->SetXY(159,295);
		$this->Cell(38,5,'RIGHT THUMBMARK',0,0,'C', $F);
		
		$this->SetXY(162,216);
		$this->SetLineWidth(0.75);
		$this->Cell(34,43,'',1,0,'', $F);
		
		$this->SetXY(158,259);
		$this->SetLineWidth(0.75);
		$this->Cell(42,5,'PHOTO',"B",0,'C', $F);
		
		$this->SetXY(158,215);
		$this->SetLineWidth(0.75);
		$this->Cell(42,26,'',"L",0,'C', $F);
		
		$this->SetFont('ARIALN','',8);
		$this->SetXY(13,17);
		$this->Cell(124,3,'36. Are you related by consanguinity or affinity to any of the following :',0,0,'L', $F);
		
		$this->SetXY(13,27);
		$this->Cell(124,4,'  a. Within the third degree (for National Government Employees):',0,0,'L', $F);
		$this->SetXY(13,30.5);
		$this->Cell(124,4,'      appointing authority, recommending authority, chief of office/bureau/department or person who',0,0,'L', $F);
		$this->SetXY(13,34);
		$this->Cell(124,4,'      has immediate supervision over you in the Office, Bureau or Department where you will be',0,0,'L', $F);
		$this->SetXY(13,37.5);
		$this->Cell(124,4,'      appointed?',0,0,'L', $F);
		
		$this->SetXY(13,49);
		$this->Cell(124,4,'  b. Within the fourth degree (for Local Government Employees):',0,0,'L', $F);
		$this->SetXY(13,52.5);
		$this->Cell(124,4,'      appointing authority or recommending authority where will you be appointed?',0,0,'L', $F);
		
		$this->SetXY(13,71);
		$this->Cell(124,3,'37. a. Have you ever been formally charged?',0,0,'L', $F);
		
		$this->SetXY(13,89);
		$this->Cell(124,4,'      b. Have you ever been guilty of any administrative offense?',0,0,'L', $F);

		$this->SetXY(13,108);
		$this->Cell(124,3,'38. Have you ever been convicted of any crime or violation of any law, decree, ordinance or',0,0,'L', $F);
		$this->SetXY(13,111.5);
		$this->Cell(124,4,'      regulation by any court or tribunal?',0,0,'L', $F);
		
		$this->SetXY(13,126);
		$this->Cell(124,3,'39. Have you ever been separated from the service in any of the following modes: resignation,',0,0,'L', $F);
		$this->SetXY(13,129.5);
		$this->Cell(124,4,'      retirement, dropped from the rolls, dismissal, termination, end of term, finished contract, AWOL or',0,0,'L', $F);
		$this->SetXY(13,133);
		$this->Cell(124,4,'      phased out, in the public or private sector?',0,0,'L', $F);
		
		$this->SetXY(13,150);
		$this->Cell(124,4,'40. Have you ever been a candidate in a national or local election (except Barangay election)?',0,0,'L', $F);
		
		$this->SetXY(13,168);
		$this->Cell(124,4,'41. Pursuant to: (a) Indigenous People\'s Act (RA 8371); (b) Magna Carta for Disabled Persons (RA',0,0,'L', $F);
		$this->SetXY(13,171.5);
		$this->Cell(124,4,'      7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items.',0,0,'L', $F);
		$this->SetXY(13,180.5);
		$this->Cell(124,3,'  a. Are you a member of indigenous group?',0,0,'L', $F);
		$this->SetXY(13,189.5);
		$this->Cell(124,3,'  b. Are you differently ables??',0,0,'L', $F);
		$this->SetXY(13,198.5);
		$this->Cell(124,3,'  c. Are you a solo parent?',0,0,'L', $F);
		
		$this->SetXY(13,242);
		$this->Cell(124,3,'43. I declare under oath that this Personal Data Sheet has been accomplished by me, and is a true, correct and',0,0,'L', $F);
		$this->SetXY(13,245.5);
		$this->Cell(124,3,'      complete statement pursuant of pertinent laws, rules and regulations of the Republic of the',0,0,'L', $F);
		$this->SetXY(13,249);
		$this->Cell(124,3,'      Philippines.',0,0,'L', $F);
		$this->SetXY(13,255.5);
		$this->Cell(124,3,'      I also authorize the agency head / authorized representative to verify / validate the contents stated herein. I trust',0,0,'L', $F);
		$this->SetXY(13,259);
		$this->Cell(124,3,'      that this information shall remain confidential.',0,0,'L', $F);
		
		$this->SetLineWidth(0.25);
		$this->SetXY(140,27);
		$this->Cell(2.5,2.5,'',1,0,'L', $F);
		$this->SetXY(142,27);
		$this->Cell(5,3,'YES',0,0,'L', $F);
		$this->SetXY(151,27);
		$this->Cell(2.5,2.5,'',1,0,'L', $F);
		$this->SetXY(153,27);
		$this->Cell(5,3,'NO',0,0,'L', $F);
		$this->SetXY(139,30.5);
		$this->Cell(5,3,'If YES, give details:',0,0,'L', $F);
		$this->SetXY(140,34);
		$this->Cell(53,3,strtoupper(substr($yes[0],0,50)),"B",0,'L', $F);
		$this->SetXY(140,38);
		$this->Cell(53,3,strtoupper(substr($yes[0],50,50)),"B",0,'L', $F);
		$this->SetXY(140,42);
		$this->Cell(53,3,strtoupper(substr($yes[0],100,50)),"B",0,'L', $F);
		
		$this->SetLineWidth(0.25);
		$this->SetXY(140,49);
		$this->Cell(2.5,2.5,'',1,0,'L', $F);
		$this->SetXY(142,49);
		$this->Cell(5,3,'YES',0,0,'L', $F);
		$this->SetXY(151,49);
		$this->Cell(2.5,2.5,'',1,0,'L', $F);
		$this->SetXY(153,49);
		$this->Cell(5,3,'NO',0,0,'L', $F);
		$this->SetXY(139,52.5);
		$this->Cell(5,3,'If YES, give details:',0,0,'L', $F);
		$this->SetXY(140,56);
		$this->Cell(53,3,strtoupper(substr($yes[1],0,50)),"B",0,'L', $F);
		$this->SetXY(140,60);
		$this->Cell(53,3,strtoupper(substr($yes[1],50,50)),"B",0,'L', $F);
		$this->SetXY(140,64);
		$this->Cell(53,3,strtoupper(substr($yes[1],100,50)),"B",0,'L', $F);
		
		$this->SetLineWidth(0.25);
		$this->SetXY(140,72);
		$this->Cell(2.5,2.5,'',1,0,'L', $F);
		$this->SetXY(142,72);
		$this->Cell(5,3,'YES',0,0,'L', $F);
		$this->SetXY(151,72);
		$this->Cell(2.5,2.5,'',1,0,'L', $F);
		$this->SetXY(153,72);
		$this->Cell(5,3,'NO',0,0,'L', $F);
		$this->SetXY(139,75.5);
		$this->Cell(5,3,'If YES, give details:',0,0,'L', $F);
		$this->SetXY(140,79);
		$this->Cell(53,3,strtoupper(substr($yes[2],0,50)),"B",0,'L', $F);
		$this->SetXY(140,83);
		$this->Cell(53,3,strtoupper(substr($yes[2],50,50)),"B",0,'L', $F);
		
		$this->SetLineWidth(0.25);
		$this->SetXY(140,90);
		$this->Cell(2.5,2.5,'',1,0,'L', $F);
		$this->SetXY(142,90);
		$this->Cell(5,3,'YES',0,0,'L', $F);
		$this->SetXY(151,90);
		$this->Cell(2.5,2.5,'',1,0,'L', $F);
		$this->SetXY(153,90);
		$this->Cell(5,3,'NO',0,0,'L', $F);
		$this->SetXY(139,93.5);
		$this->Cell(5,3,'If YES, give details:',0,0,'L', $F);
		$this->SetXY(140,97);
		$this->Cell(53,3,strtoupper(substr($yes[3],0,50)),"B",0,'L', $F);
		$this->SetXY(140,101);
		$this->Cell(53,3,strtoupper(substr($yes[3],50,50)),"B",0,'L', $F);
		
		$this->SetLineWidth(0.25);
		$this->SetXY(140,109);
		$this->Cell(2.5,2.5,'',1,0,'L', $F);
		$this->SetXY(142,109);
		$this->Cell(5,3,'YES',0,0,'L', $F);
		$this->SetXY(151,109);
		$this->Cell(2.5,2.5,'',1,0,'L', $F);
		$this->SetXY(153,109);
		$this->Cell(5,3,'NO',0,0,'L', $F);
		$this->SetXY(139,112.5);
		$this->Cell(5,3,'If YES, give details:',0,0,'L', $F);
		$this->SetXY(140,116);
		$this->Cell(53,3,strtoupper(substr($yes[4],0,50)),"B",0,'L', $F);
		$this->SetXY(140,120);
		$this->Cell(53,3,strtoupper(substr($yes[4],50,50)),"B",0,'L', $F);

		$this->SetLineWidth(0.25);
		$this->SetXY(140,127);
		$this->Cell(2.5,2.5,'',1,0,'L', $F);
		$this->SetXY(142,127);
		$this->Cell(5,3,'YES',0,0,'L', $F);
		$this->SetXY(151,127);
		$this->Cell(2.5,2.5,'',1,0,'L', $F);
		$this->SetXY(153,127);
		$this->Cell(5,3,'NO',0,0,'L', $F);
		$this->SetXY(139,130.5);
		$this->Cell(5,3,'If YES, give details:',0,0,'L', $F);
		$this->SetXY(140,134);
		$this->Cell(53,3,strtoupper(substr($yes[5],0,50)),"B",0,'L', $F);
		$this->SetXY(140,138);
		$this->Cell(53,3,strtoupper(substr($yes[5],50,50)),"B",0,'L', $F);
		$this->SetXY(140,142);
		$this->Cell(53,3,strtoupper(substr($yes[5],100,50)),"B",0,'L', $F);
		
		$this->SetLineWidth(0.25);
		$this->SetXY(140,151);
		$this->Cell(2.5,2.5,'',1,0,'L', $F);
		$this->SetXY(142,151);
		$this->Cell(5,3,'YES',0,0,'L', $F);
		$this->SetXY(151,151);
		$this->Cell(2.5,2.5,'',1,0,'L', $F);
		$this->SetXY(153,151);
		$this->Cell(5,3,'NO',0,0,'L', $F);
		$this->SetXY(139,154.5);
		$this->Cell(5,3,'If YES, give details:',0,0,'L', $F);
		$this->SetXY(140,158);
		$this->Cell(53,3,strtoupper(substr($yes[6],0,50)),"B",0,'L', $F);
		$this->SetXY(140,162);
		$this->Cell(53,3,strtoupper(substr($yes[6],50,50)),"B",0,'L', $F);
		
		$this->SetLineWidth(0.25);
		$this->SetXY(140,180.5);
		$this->Cell(2.5,2.5,'',1,0,'L', $F);
		$this->SetXY(142,180.5);
		$this->Cell(5,3,'YES',0,0,'L', $F);
		$this->SetXY(151,180.5);
		$this->Cell(2.5,2.5,'',1,0,'L', $F);
		$this->SetXY(153,180.5);
		$this->Cell(5,3,'NO',0,0,'L', $F);
		$this->SetXY(139,185);
		$this->Cell(5,3,'If YES, please specify:',0,0,'L', $F);
		$this->SetXY(164,185);
		$this->Cell(32,3,strtoupper(substr($yes[7],0,25)),"B",0,'L', $F);
		
		$this->SetLineWidth(0.25);
		$this->SetXY(140,189.5);
		$this->Cell(2.5,2.5,'',1,0,'L', $F);
		$this->SetXY(142,189.5);
		$this->Cell(5,3,'YES',0,0,'L', $F);
		$this->SetXY(151,189.5);
		$this->Cell(2.5,2.5,'',1,0,'L', $F);
		$this->SetXY(153,189.5);
		$this->Cell(5,3,'NO',0,0,'L', $F);
		$this->SetXY(139,193);
		$this->Cell(5,3,'If YES, please specify:',0,0,'L', $F);
		$this->SetXY(164,193);
		$this->Cell(32,3,strtoupper(substr($yes[8],0,25)),"B",0,'L', $F);
		
		$this->SetLineWidth(0.25);
		$this->SetXY(140,198.5);
		$this->Cell(2.5,2.5,'',1,0,'L', $F);
		$this->SetXY(142,198.5);
		$this->Cell(5,3,'YES',0,0,'L', $F);
		$this->SetXY(151,198.5);
		$this->Cell(2.5,2.5,'',1,0,'L', $F);
		$this->SetXY(153,198.5);
		$this->Cell(5,3,'NO',0,0,'L', $F);
		$this->SetXY(139,202);
		$this->Cell(5,3,'If YES, please specify:',0,0,'L', $F);
		$this->SetXY(164,202);
		$this->Cell(32,3,strtoupper(substr($yes[9],0,25)),"B",0,'L', $F);
		
		$sql="SELECT * FROM tbl_profpic WHERE EmpID='$EmpID'";
		$result=mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		$path = $row['path'];
		if($path!='') {
			$this->Image($path,162.5,216.5,33,42.10);
		} else {
			
		}
		
		$yx = array('139','139','139','139','139','139','139','139','139','139');
		$nx = array('150','150','150','150','150','150','150','150','150','150');
		
		$yy = array('24','46','69','87','106','124','148','177.5','186.5','195.5');
		$ny = array('24','46','69','87','106','124','148','177.5','186.5','195.5');
		
		for($ctr=0;$ctr<=9;$ctr++) {
			if(strtoupper($a[$ctr])=="YES") {
				$this->putCheck($yx[$ctr],$yy[$ctr]);
			} else {
				$this->putCheck($nx[$ctr],$ny[$ctr]);
			}
		}
		
		//$_SESSION['CEmpID'] = $_SESSION['TEmpID'];
	}
	function putCheck($x,$y) {
		$this->Image('images/check.png',$x,$y,5,7);
	}
	function pageTwo() 
	{
		$this->OtherInformation();
	}
	function conti()
	{
		$this->SetLineWidth(0.5);
		$this->SetFont('ARIALNI','',8);
		$this->SetTextColor(237,28,36);
		$this->Cell(188, 4, '(Continue on separate sheet if necessary)', 1, 0,'C', true);
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
	//MakeFont('font/mpr.otf','cp1252');
	$pdf = new PDF('P','mm','Legal');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('ARIALN','',9);
	$pdf->SetAutoPageBreak(false);
	$pdf->PageTwo();
	$pdf->Output();
?>