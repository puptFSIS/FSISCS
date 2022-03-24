<?php
require('fpdf.php');
class PDF extends FPDF
{
	function Header()
	{
		$this->SetLineWidth(0.75);
		$this->SetXY(6,9);
		$this->Cell(202,303,'',1,0,'C');
		$this->AddFont('ariblk','','ariblk.php');
		$this->AddFont('ARIALN','','ARIALN.php');
		$this->AddFont('ARIALNI','','ARIALNI.php');
		$this->AddFont('ARIALNBI','','ARIALNBI.php');
		$this->SetFont('ARIALN','',7);
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
	function putCheck($x,$y) {
		$this->Image('images/check.png',$x,$y,5,7);
	}
	function personalInfo()
	{
		
		$this->Ln();	
		$this->SetXY(6,9);
		$this->SetFont('ARIBLK','',16);
		$this->Cell(202,23,'PERSONAL DATA SHEET',0,0,'C');
		$this->Ln();
		$this->SetX(6);
		$this->SetFont('ARIALN','',7);
		$this->Cell(122,4,'Print legibly. Mark appropriate boxes        with  "      "  and use separate sheet if necessary.',0,0,'L', False);
		$this->SetFillColor(151,151,151);
		$this->SetTextColor(255);
		$this->Cell(18,4,'1. CS ID NO.',1,0,'C', True);
		$this->SetTextColor(0);
		$this->Cell(62,4,'(to be filled up by CSC)',1,0,'R', False);
		$this->Ln();
		$this->SetX(6);
		$this->SetFillColor(0,0,0);
		$this->Cell(202,0.5,'',1,0,'R', True);
		$this->Ln();
		$this->SetX(6);
		$this->title();
		$this->Cell(202,4,'I. PERSONAL INFORMATION',1,0,'L', True);
		$this->Ln();
		$this->SetX(6.25);
		$this->labelF();
		$this->Cell(31,6,'2. SURNAME',"LTR",0,'L', True);
		$this->tf();
		
		include("getPersonalInformation.php");
		for($ctr=0;$ctr<32;$ctr++) {
			$clet = strtoupper(substr($surname,$ctr,1));
			if($clet=='A' or $clet=='B' or $clet=='C' or $clet=='D' or $clet=='E' or $clet=='F' or $clet=='G' or $clet=='H' or $clet=='I' or $clet=='J' or $clet=='K' or $clet=='L' or $clet=='M' or $clet=='N' or $clet=='O' or $clet=='P' or $clet=='Q' or $clet=='R' or $clet=='S' or $clet=='T' or $clet=='U' or $clet=='V' or $clet=='W' or $clet=='X' or $clet=='Y' or $clet=='Z' or $clet==' ' or $clet=='') {
				$this->Cell(5.25,6,strtoupper(substr($surname,$ctr,1)),1,0,'C',False);
			} else if($clet=='ñ'){
				$this->Cell(5.25,6,'Ñ',1,0,'C',False);
			}
		}
		$this->Cell(2.5,6,'',1,0,"LBR",'C',False);
		$this->Ln();
		
		$this->SetX(6.25);
		$this->labelF();
		$this->Cell(31,6,'    FIRST NAME',"LR",0,'L', True);
		$this->tf();
		$letters = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		for($ctr=0; $ctr<32; $ctr++) {
			$clet = strtoupper(substr($firstname,$ctr,1));
			if($clet=='A' or $clet=='B' or $clet=='C' or $clet=='D' or $clet=='E' or $clet=='F' or $clet=='G' or $clet=='H' or $clet=='I' or $clet=='J' or $clet=='K' or $clet=='L' or $clet=='M' or $clet=='N' or $clet=='O' or $clet=='P' or $clet=='Q' or $clet=='R' or $clet=='S' or $clet=='T' or $clet=='U' or $clet=='V' or $clet=='W' or $clet=='X' or $clet=='Y' or $clet=='Z' or $clet==' ' or $clet=='') {
				$this->Cell(5.25,6,strtoupper(substr($firstname,$ctr,1)),1,0,'C',False);
			} else if($clet=='ñ'){
				$this->Cell(5.25,6,'Ñ',1,0,'C',False);
			}
		}
		$this->Cell(2.5,6,'',1,0,"LBR",'C',False);
		$this->Ln();
		
		$this->SetX(6.25);
		$this->labelF();
		$this->Cell(31,6,'    MIDDLE NAME',"LBR",0,'L', True);
		$this->tf();
		for($ctr=0; $ctr<20; $ctr++) {
			$clet = strtoupper(substr($middlename,$ctr,1));
			if($clet=='A' or $clet=='B' or $clet=='C' or $clet=='D' or $clet=='E' or $clet=='F' or $clet=='G' or $clet=='H' or $clet=='I' or $clet=='J' or $clet=='K' or $clet=='L' or $clet=='M' or $clet=='N' or $clet=='O' or $clet=='P' or $clet=='Q' or $clet=='R' or $clet=='S' or $clet=='T' or $clet=='U' or $clet=='V' or $clet=='W' or $clet=='X' or $clet=='Y' or $clet=='Z' or $clet==' ' or $clet=='') {
				$this->Cell(5.25,6,strtoupper(substr($middlename,$ctr,1)),1,0,'C',False);
			} else if($clet=='ñ'){
				$this->Cell(5.25,6,'Ñ',1,0,'C',False);
			}
		}
		$this->labelF();
		$this->Cell(41,6,'3. NAME EXTENSION (e.g. Jr., Sr.)',1,0,'C',True);
		$this->tf();
		$this->Cell(24.5,6,strtoupper($nameextension),1,0,'C',False);
		$this->Ln();
		
		$this->SetX(6.25);
		$this->labelF();
		$this->Cell(58,5.5,'4. DATE OF BIRTH (mm/dd/yyyy)',1,0,'L', True);
		$this->tf();
		$this->Cell(30,5.5, $m . '   /      '. $d . '      /   ' . $y,1,0,'C',False);
		$this->labelF();
		$this->Cell(34,5.5,'16. RESIDENTIAL ADDRESS',"LTR",0,'L', True);
		$this->tf();
		if(strlen($resadd)>55)
		{
			$this->Cell(80,5.5,'  ' . strtoupper(substr($resadd,0,55)),"T",0,'L',False);
			$this->Ln();
		}
		else
		{
			$this->Cell(80,5.5,'  ' . strtoupper(substr($resadd,0,70)),"LTR",0,'L',False);
			$this->Ln();
		}
		
		$this->SetX(6.25);
		$this->labelF();
		$this->Cell(31,5.5,'5. PLACE OF BIRTH',1,0,'L', True);
		$this->tf();
		$this->Cell(57,5.5,'  ' . strtoupper($pbirth),1,0,'L',False);
		$this->labelF();
		$this->Cell(34,5.5,'',"L",0,'L', True);
		$this->tf();
		if(strlen($resadd)>55)
		{
		$this->Cell(80,5.5,'  ' . strtoupper(substr($resadd,55,55)),"L",0,'L',False);
		$this->Ln();
		}else{
		$this->Cell(80,5.5,'  ' . strtoupper(substr($resadd,70,70)),"LR",0,'L',False);
		$this->Ln();
		}
		
		$this->SetX(6.25);
		$this->labelF();
		$this->Cell(31,5.5,'6. SEX',1,0,'L', True);
		$this->tfl();
		$this->Cell(57,5.5,'       Male                 Female',1,0,'L',False);
		$this->labelF();
		$this->Cell(34,5.5,'',"L",0,'L', True);
		$this->tfl();
		$this->Cell(80,5.5,'  ' . strtoupper(substr($resadd,140,70)),"LRB",0,'C',False);
		$this->Ln();
		
		$this->SetX(6.25);
		$this->labelF();
		$this->Cell(31,5.5,'7. CIVIL STATUS',"LTR",0,'L', True);
		$this->tfl();
		$this->Cell(57,5.5,'       Single                    Widowed',"LTR",0,'L',False);
		$this->labelF();
		$this->Cell(34,5.5,'ZIP CODE',"L",0,'R', True);
		$this->tf();
		$this->Cell(80,5.5,'  ' . $zipcode,1,0,'L',False);
		$this->Ln();
		
		$this->SetX(6.25);
		$this->labelF();
		$this->Cell(31,5.5,'',"LR",0,"L",True);
		$this->tfl();
		$this->Cell(57,5.5,'       Married                  Separated',"LR",0,'L',False);
		$this->labelF();
		$this->Cell(34,5.5,'17. TELEPHONE NO.',"LBR",0,'L', True);
		$this->tf();
		$this->Cell(80,5.5,'  ' . $telno,1,0,'L',False);
		$this->Ln();
		
		$this->SetX(6.25);
		$this->labelF();
		$this->Cell(31,5.5,'',"LRB",0,'L', True);
		$this->tfl();
		$this->Cell(57,5.5,'       Annulled                Others, specify _____________',"LBR",0,'L',False);
		$this->labelF();
		$this->Cell(34,5.5,'18. PERMANENT ADDRESS',"LTR",0,'L', True);
		$this->tf();
		if(strlen($resadd)>55)
		{
		$this->Cell(80,5.5,'  ' . strtoupper(substr($resadd,0,55)),"L",0,'L',False);
		$this->Ln();
		}
		else
		{
		$this->Cell(80,5.5,'  ' . strtoupper(substr($resadd,0,70)),"LR",0,'L',False);
		$this->Ln();
		}
		
		$this->SetX(6.25);
		$this->labelF();
		$this->Cell(31,5.5,'8. CITIZENSHIP',1,0,'L', True);
		$this->tf();
		$this->Cell(57,5.5,'  ' . strtoupper($citizenship),1,0,'L',False);
		$this->labelF();
		$this->Cell(34,5.5,'',"L",0,'L', True);
		$this->tf();
		if(strlen($resadd)>55)
		{
		$this->Cell(80,5.5,'  ' . strtoupper(substr($resadd,55,55)),"L",0,'L',False);
		$this->Ln();
		}
		else
		{
		$this->Cell(80,5.5,'  ' . strtoupper(substr($resadd,70,70)),"LR",0,'L',False);
		$this->Ln();
		}
		
		$this->SetX(6.25);
		$this->labelF();
		$this->Cell(31,5.5,'9. HEIGHT (m)',1,0,'L', True);
		$this->tf();
		$this->Cell(57,5.5,'  ' . $height,1,0,'L',False);
		$this->labelF();
		$this->Cell(34,5.5,'',"L",0,'L', True);
		$this->tf();
		$this->Cell(80,5.5,strtoupper(substr($resadd,140,70)),"LRB",0,'C',False);
		$this->Ln();
		
		$this->SetX(6.25);
		$this->labelF();
		$this->Cell(31,5.5,'10. WEIGHT (kg)',1,0,'L', True);
		$this->tf();
		$this->Cell(57,5.5,'  ' . $weight,1,0,'L',False);
		$this->labelF();
		$this->Cell(34,5.5,'ZIP CODE',"L",0,'R', True);
		$this->tf();
		$this->Cell(80,5.5,'  ' . $pzipCode,1,0,'L',False);
		$this->Ln();
		
		$this->SetX(6.25);
		$this->labelF();
		$this->Cell(31,5.5,'11 BLOOD TYPE',1,0,'L', True);
		$this->tf();
		$this->Cell(57,5.5,'  ' . strtoupper($bloodType),1,0,'L',False);
		$this->labelF();
		$this->Cell(34,5.5,'19. TELEPHONE NO.',"LBR",0,'L', True);
		$this->tf();
		$this->Cell(80,5.5,'  ' . $ptelNo,1,0,'L',False);
		$this->Ln();
		
		$this->SetX(6.25);
		$this->labelF();
		$this->Cell(31,5.5,'12 GSIS ID NO.',1,0,'L', True);
		$this->tf();
		$this->Cell(57,5.5,'  ' . $gsis,1,0,'L',False);
		$this->labelF();
		$this->Cell(34,5.5,'20. EMAIL ADDRESS (if any)',1,0,'L', True);
		$this->tfemail();
		$this->Cell(80,5.5,'  ' . $email,1,0,'L',False);
		$this->Ln();
		
		$this->SetX(6.25);
		$this->labelF();
		$this->Cell(31,5.5,'13. PAG-IBIG ID NO.',1,0,'L', True);
		$this->tf();
		$this->Cell(57,5.5,'  ' . $pagibig,1,0,'L',False);
		$this->labelF();
		$this->Cell(34,5.5,'21. CELLPHONE NO. (if any)',1,0,'L', True);
		$this->tf();
		$this->Cell(80,5.5,'  ' . $cellNo,1,0,'L',False);
		$this->Ln();
		
		$this->SetX(6.25);
		$this->labelF();
		$this->Cell(31,5.5,'14. PHILHEALTH NO.',1,0,'L', True);
		$this->tf();
		$this->Cell(57,5.5,'  ' . $phealth,1,0,'L',False);
		$this->labelF();
		$this->Cell(34,5.5,'22. AGENCY EMPLOYEE NO.',1,0,'L', True);
		$this->tf();
		$this->Cell(80,5.5,'  ' . $EmpID,1,0,'L',False);
		$this->Ln();
		
		$this->SetX(6.25);
		$this->labelF();
		$this->Cell(31,5.5,'15. SSS NO.',1,0,'L', True);
		$this->tf();
		$this->Cell(57,5.5,'  ' . $sss,1,0,'L',False);
		$this->labelF();
		$this->Cell(34,5.5,'23. TIN',1,0,'L', True);
		$this->tf();
		$this->Cell(80,5.5,'  ' . $tin,1,0,'L',False);
		$this->Ln();

		if(strtoupper($sex)=="MALE") {
			$this->putCheck(37.5,68);
		} else {
			$this->putCheck(51.5,68);
		}
		
		if(strtoupper($cstatus)=="SINGLE") {
			$this->putCheck(37.5,73.25);
		} else if(strtoupper($cstatus)=="MARRIED") {
			$this->putCheck(37.5,78.75);
		} else if(strtoupper($cstatus)=="WIDOWED") {
			$this->putCheck(53.25,73.25);
		} else if(strtoupper($cstatus)=="SEPARATED") {
			$this->putCheck(53.25,78.75);
		} else if(strtoupper($cstatus)=="ANULLED") {
			$this->putCheck(37.5,84.25);
		} else if(strtoupper($cstatus)=="OTHER") {
			$this->putCheck(53.25,84);
		} else {
		
		}
	}
	function familyBckg()
	{
		include("getFamBckg.php");
		$this->SetX(6);
		$this->title();
		$this->Cell(202,5.5,'II. FAMILY BACKGROUND',1,0,'L', True);
		$this->Ln();
		
		$this->SetX(6.25);
		$this->labelF();
		$this->Cell(31,5.5,'24. SPOUSE\'S SURNAME',"LTR",0,'L', True);
		$this->tf();
		$this->Cell(76,5.5,'  ' . strtoupper($ssurname),1,0,'L', False);
		$this->labelF();
		$this->Cell(56,5.5,'25. NAME OF CHILD (Write full name and list all)',1,0,'L', True);
		$this->Cell(38.5,5.5,'DATE OF BIRTH (mm/dd/yyyy)',1,0,'C', True);
		$this->Ln();
		
		$this->SetX(6.25);
		$this->labelF();
		$this->Cell(31,5.5,'                     FIRST NAME',"LR",0,'L', True);
		$this->tf();
		$this->Cell(76,5.5,'  ' . strtoupper($sfname),1,0,'L', False);
		$this->Cell(56,5.5,'  ' . strtoupper($fullname[0]),1,0,'L',False);
		$this->Cell(38.5,5.5, $cm[0] . '   /     ' .  $cd[0] . '     /   ' . $cy[0],1,0,'C', False);
		$this->Ln();
		
		$this->SetX(6.25);
		$this->labelF();
		$this->Cell(31,5.5,'                  MIDDLE NAME',"LBR",0,'L', True);
		$this->tf();
		$this->Cell(76,5.5,'  ' . strtoupper($smname),1,0,'L', False);
		$this->Cell(56,5.5,'  ' . strtoupper($fullname[1]),1,0,'L',False);
		$this->Cell(38.5,5.5, $cm[1] . '   /     ' .  $cd[1] . '     /   ' . $cy[1],1,0,'C', False);
		$this->Ln();
		
		$this->SetX(6.25);
		$this->labelF();
		$this->Cell(31,5.5,'      OCUPATION',1,0,'L', True);
		$this->tf();
		$this->Cell(76,5.5,'  ' . strtoupper($occ),1,0,'L', False);
		$this->Cell(56,5.5,'  ' . strtoupper($fullname[2]),1,0,'L',False);
		$this->Cell(38.5,5.5, $cm[2] . '   /     ' .  $cd[2] . '     /   ' . $cy[2],1,0,'C', False);
		$this->Ln();
		
		$this->SetX(6.25);
		$this->labelF();
		$this->Cell(31,5.5,'      EMPLOYER/BUS. NAME',1,0,'L', True);
		$this->tf();
		$this->Cell(76,5.5,'  ' . strtoupper($empname),1,0,'L', False);
		$this->Cell(56,5.5,'  ' . strtoupper($fullname[3]),1,0,'L',False);
		$this->Cell(38.5,5.5, $cm[3] . '   /     ' .  $cd[3] . '     /   ' . $cy[3],1,0,'C', False);
		$this->Ln();
		
		$this->SetX(6.25);
		$this->labelF();
		$this->Cell(31,5.5,'      BUSINESS ADRESS',1,0,'L', True);//San Marcelino St. Ermita Manila
		$this->tf();
		if(strlen($busadd)>53){
		$this->SetFont('ARIALN','',6);
		$this->Cell(76,5.5,'  ' . strtoupper($busadd),1,0,'L', False);
		}else{
		$this->SetFont('ARIALN','',8);
		$this->Cell(76,5.5,'  ' . strtoupper($busadd),1,0,'L', False);
		}
		$this->Cell(56,5.5,'  ' . strtoupper($fullname[4]),1,0,'L',False);
		$this->Cell(38.5,5.5, $cm[4] . '   /     ' .  $cd[4] . '     /   ' . $cy[4],1,0,'C', False);
		$this->Ln();
		
		$this->SetX(6.25);
		$this->labelF();
		$this->Cell(31,5.5,'      TELEPHONE NO.',1,0,'L', True);
		$this->tf();
		$this->Cell(76,5.5,'  ' . strtoupper($bustelno),1,0,'L', False);
		$this->Cell(56,5.5,'  ' . strtoupper($fullname[5]),1,0,'L',False);
		$this->Cell(38.5,5.5, $cm[5] . '   /     ' .  $cd[5] . '     /   ' . $cy[5],1,0,'C', False);
		$this->Ln();

		$this->SetX(6.25);
		$this->conti();
		$this->Cell(107,5.5,'(Continue on separate sheet if necessary)',1,0,'C', True);
		$this->tf();
		$this->Cell(56,5.5,'  ' . strtoupper($fullname[6]),1,0,'L',False);
		$this->Cell(38.5,5.5, $cm[6] . '   /     ' .  $cd[6] . '     /   ' . $cy[6],1,0,'C', False);
		$this->Ln();
		
		$this->SetX(6.25);
		$this->labelF();
		$this->Cell(31,5.5,'26. FATHER\'S SURNAME',"LTR",0,'L', True);
		$this->tf();
		$this->Cell(76,5.5,'  ' . strtoupper($fsurname),1,0,'L', False);
		$this->Cell(56,5.5,'  ' . strtoupper($fullname[7]),1,0,'L',False);
		$this->Cell(38.5,5.5, $cm[7] . '   /     ' .  $cd[7] . '     /   ' . $cy[7],1,0,'C', False);
		$this->Ln();
		
		$this->SetX(6.25);
		$this->labelF();
		$this->Cell(31,5.5,'      FIRST NAME',"LR",0,'L', True);
		$this->tf();
		$this->Cell(76,5.5,'  ' . strtoupper($ffname),1,0,'L', False);
		$this->Cell(56,5.5,'  ' . strtoupper($fullname[8]),1,0,'L',False);
		$this->Cell(38.5,5.5, $cm[8] . '   /     ' .  $cd[8] . '     /   ' . $cy[8],1,0,'C', False);
		$this->Ln();
		
		$this->SetX(6.25);
		$this->labelF();
		$this->Cell(31,5.5,'      MIDDLE NAME',"LBR",0,'L', True);
		$this->tf();
		$this->Cell(76,5.5,'  ' . strtoupper($fmname),1,0,'L', False);
		$this->Cell(56,5.5,'  ' . strtoupper($fullname[9]),1,0,'L',False);
		$this->Cell(38.5,5.5, $cm[9] . '   /     ' .  $cd[9] . '     /   ' . $cy[9],1,0,'C', False);
		$this->Ln();
		
		$this->labelF();
		$this->SetX(6.25);
		$this->Cell(107,5.5,'27. MOTHER\'S MAIDEN NAME',"LTR",0,'L', True);
		$this->tf();
		$this->Cell(56,5.5,'  ' . strtoupper($fullname[10]),1,0,'L',False);
		$this->Cell(38.5,5.5, $cm[10] . '   /     ' .  $cd[10] . '     /   ' . $cy[10],1,0,'C', False);
		$this->Ln();
		
		$this->SetX(6.25);
		$this->labelF();
		$this->Cell(31,5.5,'      SURNAME',"LR",0,'L', True);
		$this->tf();
		$this->Cell(76,5.5,'  ' . strtoupper($msurname),1,0,'L', False);
		$this->Cell(56,5.5,'  ' . strtoupper($fullname[11]),1,0,'L',False);
		$this->Cell(38.5,5.5, $cm[11] . '   /     ' .  $cd[11] . '     /   ' . $cy[11],1,0,'C', False);
		$this->Ln();
		
		$this->SetX(6.25);
		$this->labelF();
		$this->Cell(31,5.5,'      FIRST NAME',"LR",0,'L', True);
		$this->tf();
		$this->Cell(76,5.5,'  ' . strtoupper($mfname),1,0,'L', False);
		$this->Cell(56,5.5,'  ' . strtoupper($fullname[12]),1,0,'L',False);
		$this->Cell(38.5,5.5, $cm[12] . '   /     ' .  $cd[12] . '     /   ' . $cy[12],1,0,'C', False);
		$this->Ln();
		
		$this->SetX(6.25);
		$this->labelF();
		$this->Cell(31,5.5,'      MIDDLE NAME',"LBR",0,'L', True);
		$this->tf();
		$this->Cell(76,5.5,'  ' . strtoupper($mmname),1,0,'L', False);
		$this->Cell(56,5.5,'  ' . strtoupper($fullname[13]),1,0,'L',False);
		$this->Cell(38.5,5.5, $cm[13] . '   /     ' .  $cd[13] . '     /   ' . $cy[13],1,0,'C', False);
		$this->Ln();
	}
	
	function educationalBckg()
	{
		$this->SetX(6);
		$this->title();
		$this->Cell(202,5.5,'III. EDUCATIONAL BACKGROUND',1,0,'L', True);
		$this->Ln();
		
		$this->SetXY(6.25,229.25);
		$this->labelF();
		$this->Cell(31,4.5,'28. ',"LTR",0,'L', True);
		$this->SetXY(6.25,233.75);
		$this->Cell(31,4,'LEVEL',"LR",0,'C', True);
		$this->SetXY(6.25,237.75);
		$this->Cell(31,4.5,'',"LBR",0,'L', True);
		
		$this->SetXY(37.25,229.25);
		$this->Cell(52,3.25,'',"LTR",0,'L', True);
		$this->SetXY(37.25,232.5);
		$this->Cell(52,3.25,'NAME OF SCHOOL',"LR",0,'C', True);
		$this->SetXY(37.25,235.75);
		$this->Cell(52,3.25,'(Write in full)',"LR",0,'C', True);
		$this->SetXY(37.25,239);
		$this->Cell(52,3.25,'',"LBR",0,'L', True);
		
		$this->SetXY(89.25,229.25);
		$this->Cell(24,3.25,'',"LTR",0,'L', True);
		$this->SetXY(89.25,232.5);
		$this->Cell(24,3.25,'DEGREE COURSE',"LR",0,'C', True);
		$this->SetXY(89.25,235.75);
		$this->Cell(24,3.25,'(Write in full)',"LR",0,'C', True);
		$this->SetXY(89.25,239);
		$this->Cell(24,3.25,'',"LBR",0,'L', True);
		
		$this->SetXY(113.25,229.25);
		$this->Cell(15,2,'',"LTR",0,'L', True);
		$this->SetXY(113.25,231.25);
		$this->Cell(15,3,'YEAR',"LR",0,'C', True);
		$this->SetXY(113.25,234.25);
		$this->Cell(15,3,'GRADUATED',"LR",0,'C', True);
		$this->SetXY(113.25,237.25);
		$this->Cell(15,3,'(if graduated)',"LR",0,'C', True);
		$this->SetXY(113.25,240.25);
		$this->Cell(15,2,'',"LBR",0,'L', True);
		
		$this->SetXY(128.25,229.25);
		$this->Cell(22,3.25,'HIGHEST GRADE/',"LTR",0,'C', True);
		$this->SetXY(128.25,232.5);
		$this->Cell(22,3.25,'LEVEL/',"LR",0,'C', True);
		$this->SetXY(128.25,235.75);
		$this->Cell(22,3.25,'UNITS EARNED',"LR",0,'C', True);
		$this->SetXY(128.25,239);
		$this->Cell(22,3.25,'(if not graduated)',"LBR",0,'C', True);
		
		$this->SetXY(150.25,229.25);
		$this->Cell(33,3.5,'INCLUSIVE DATES OF',"LTR",0,'C', True);
		$this->SetXY(150.25,232.5);
		$this->Cell(33,3.5,'ATTENDANCE',"LR",0,'C', True);
		$this->SetXY(150.25,236.25);
		$this->Cell(17,6,'From',1,0,'C', True);
		$this->SetXY(167.25,236.25);
		$this->Cell(16,6,'To',1,0,'C', True);
		
		$this->SetXY(183.25,229.25);
		$this->Cell(24.5,2,'',"LTR",0,'L', True);
		$this->SetXY(183.25,231.25);
		$this->Cell(24.5,3,'SCHOLARSHIP/',"LR",0,'C', True);
		$this->SetXY(183.25,234.25);
		$this->Cell(24.5,3,'ACADEMIC HONORS',"LR",0,'C', True);
		$this->SetXY(183.25,237.25);
		$this->Cell(24.5,3,'RECEIVED',"LR",0,'C', True);
		$this->SetXY(183.25,240.25);
		$this->Cell(24.5,2,'',"LBR",0,'L', True);
		
		$this->SetXY(6.25,242.25);
		$this->Cell(31,9,'     ELEMENTARY',"LTR",0,'L', True);
		$this->SetXY(6.25,251.25);
		$this->Cell(31,9,'     SECONDARY',"LTR",0,'L', True);
		$this->SetXY(6.25,260.25);
		$this->Cell(31,4.5,'     VOCATIONAL /',"LTR",0,'L', True);
		$this->SetXY(6.25,264.5);
		$this->Cell(31,4.5,'     TRADE COURSE',"LBR",0,'L', True);
		
		$this->SetXY(6.25,268.5);
		$this->Cell(31,5,'     COLLEGE',"LTR",0,'L', True);
		$this->SetXY(6.25,273.5);
		$this->Cell(31,5,'',"LR",0,'L', True);
		$this->SetXY(6.25,278.5);
		$this->Cell(31,8,'',"LBR",0,'L', True);
		
		$this->SetXY(6.25,286.5);
		$this->Cell(31,5,'     GRADUATE STUDIES',"LTR",0,'L', True);
		$this->SetXY(6.25,291.5);
		$this->Cell(31,5,'',"LR",0,'L', True);
		$this->SetXY(6.25,296.5);
		$this->Cell(31,8,'',"LBR",0,'L', True);
		
		include("getEducBckg.php");
		//ELEMENTARY
		$this->SetXY(37.25,242.25);
		$this->Cell(52,9,'',1,0,'L', False); // NAME OF SCHOOL
		$this->tfna();
		$this->Cell(24,9,'NOT APPLICABLE',1,0,'C', False); // DEGREE COURSE
		if(strtoupper($Eyg)=="NOT YET") {
			$this->tfna();
			$this->Cell(15,9,'- - - -',1,0,'C', False); // YEAR GRADUATED
		} else {
			$this->tf();
			$this->Cell(15,9,strtoupper($Eyg),1,0,'C', False); // YEAR GRADUATED
		}
		
		if(strtoupper($Eue)=="") {
			$this->tfna();
			$this->Cell(22,9,'- -',1,0,'C', False); // UNITS EARNED
		} else {
			$this->tf();
			$this->Cell(22,9,$Eue,1,0,'C', False); // UNITS EARNED
		}
		$this->tf();
		$this->Cell(17,9,$Efrom,1,0,'C', False); // INC DATE FROM
		$this->Cell(16,9,strtoupper($Eto),1,0,'C', False); // INC DATE TO
		// ACADEMIC HONORS
		if(strlen($Ehonor)>=0 and strlen($Ehonor)<=17) {
			$this->Cell(25,9,strtoupper($Ehonor),1,0,'C', False);
		} else if(strlen($Ehonor)>=18 and strlen($Ehonor)<=35) {
			$this->Cell(25,4.5,strtoupper(substr($Ehonor,0,17).' - '),"LTR",0,'C', False);
			$this->Ln();
			$this->SetX(183.25);
			$this->Cell(25,4.5,strtoupper(substr($Ehonor,17,17)),"LBR",0,'C', False);
		} else if(strlen($Ehonor)>=36) {
			$this->Cell(25,3,strtoupper(substr($Ehonor,0,17).' - '),"LTR",0,'C', False);
			$this->Ln();
			$this->SetX(183.25);
			$this->Cell(25,3,strtoupper(substr($Ehonor,17,17).' - '),"LR",0,'C', False);
			$this->Ln();
			$this->SetX(183.25);
			$this->Cell(25,3,strtoupper(substr($Ehonor,34,17)),"LBR",0,'C', False);
		}
		
		//SECONDARY
		$this->SetXY(37.25,251.25);
		$this->Cell(52,9,'',1,0,'L', False); // NAME OF SCHOOL
		$this->tfna();
		$this->Cell(24,9,'NOT APPLICABLE',1,0,'C', False); // DEGREE COURSE
		$this->tf();
		$this->Cell(15,9,strtoupper($Syg),1,0,'C', False); // YEAR GRADUATED
		$this->Cell(22,9,$Sue,1,0,'C', False); // UNITS EARNED
		$this->Cell(17,9,$Sfrom,1,0,'C', False); // INC DATE FROM
		$this->Cell(16,9,strtoupper($Sto),1,0,'C', False); // INC DATE TO
		// ACADEMIC HONORS
		if(strlen($Shonor)>=0 and strlen($Shonor)<=17) {
			$this->Cell(25,9,strtoupper($Shonor),1,0,'C', False);
		} else if(strlen($Shonor)>=18 and strlen($Shonor)<=35) {
			$this->Cell(25,4.5,strtoupper(substr($Shonor,0,17).' - '),"LTR",0,'C', False);
			$this->Ln();
			$this->SetX(183.25);
			$this->Cell(25,4.5,strtoupper(substr($Shonor,17,17)),"LBR",0,'C', False);
		} else if(strlen($Shonor)>=36) {
			$this->Cell(25,3,strtoupper(substr($Shonor,0,17).' - '),"LTR",0,'C', False);
			$this->Ln();
			$this->SetX(183.25);
			$this->Cell(25,3,strtoupper(substr($Shonor,17,17).' - '),"LR",0,'C', False);
			$this->Ln();
			$this->SetX(183.25);
			$this->Cell(25,3,strtoupper(substr($Shonor,34,17)),"LBR",0,'C', False);
		}

		//VOCATIONAL
		$this->SetXY(37.25,260.25);
		$this->Cell(52,8.25,'',1,0,'L', False); // NAME OF SCHOOL
		$this->Cell(24,8.25,'',1,0,'L', False); // DEGREE COURSE
		$this->Cell(15,8.25,strtoupper($Vyg),1,0,'C', False); // YEAR GRADUATED
		$this->Cell(22,8.25,$Vue,1,0,'C', False); // UNITS EARNED
		$this->Cell(17,8.25,$Vfrom,1,0,'C', False); // INC DATE FROM
		$this->Cell(16,8.25,strtoupper($Vto),1,0,'C', False); // INC DATE TO
		// ACADEMIC HONORS
		if(strlen($Vhonor)>=0 and strlen($Vhonor)<=17) {
			$this->Cell(25,8.25,strtoupper($Vhonor),1,0,'C', False);
		} else if(strlen($Vhonor)>=18 and strlen($Vhonor)<=35) {
			$this->Cell(25,4.12,strtoupper(substr($Vhonor,0,17).' - '),"LTR",0,'C', False);
			$this->Ln();
			$this->SetX(183.25);
			$this->Cell(25,4.12,strtoupper(substr($Vhonor,17,17)),"LBR",0,'C', False);
		} else if(strlen($Vhonor)>=36) {
			$this->Cell(25,3,strtoupper(substr($Vhonor,0,17).' - '),"LTR",0,'C', False);
			$this->Ln();
			$this->SetX(183.25);
			$this->Cell(25,3,strtoupper(substr($Vhonor,17,17).' - '),"LR",0,'C', False);
			$this->Ln();
			$this->SetX(183.25);
			$this->Cell(25,3,strtoupper(substr($Vhonor,34,17)),"LBR",0,'C', False);
		}
		
		//COLLEGE 1
		$this->SetXY(37.25,268.5);
		$this->Cell(52,9,'',1,0,'L', False); // NAME OF SCHOOL
		$this->Cell(24,9,'',1,0,'L', False); // DEGREE COURSE
		$this->Cell(15,9,strtoupper($Cyg[0]),1,0,'C', False); // YEAR GRADUATED
		$this->Cell(22,9,$Cue[0],1,0,'C', False); // UNITS EARNED
		$this->Cell(17,9,$Cfrom[0],1,0,'C', False); // INC DATE FROM
		$this->Cell(16,9,strtoupper($Cto[0]),1,0,'C', False); // INC DATE TO
		// ACADEMIC HONORS
		if(strlen($Chonor[0])>=0 and strlen($Chonor[0])<=17) {
			$this->Cell(25,9,strtoupper($Chonor[0]),1,0,'C', False);
		} else if(strlen($Chonor[0])>=18 and strlen($Chonor[0])<=35) {
			$this->Cell(25,4.5,strtoupper(substr($Chonor[0],0,17).' - '),1,0,'C', False);
			$this->Ln();
			$this->SetX(183.25);
			$this->Cell(25,4.5,strtoupper(substr($Chonor[0],17,17)),"LBR",0,'C', False);
		} else if(strlen($Chonor[0])>=36) {
			$this->Cell(25,3,strtoupper(substr($Chonor[0],0,17).' - '),"LTR",0,'C', False);
			$this->Ln();
			$this->SetX(183.25);
			$this->Cell(25,3,strtoupper(substr($Chonor[0],17,17).' - '),"LR",0,'C', False);
			$this->Ln();
			$this->SetX(183.25);
			$this->Cell(25,3,strtoupper(substr($Chonor[0],34,17)),"LBR",0,'C', False);
		}
		// COLLEGE 2
		$this->SetXY(37.25,277.5);
		$this->Cell(52,9,'',1,0,'L', False); // NAME OF SCHOOL
		$this->Cell(24,9,'',1,0,'L', False); // DEGREE COURSE
		$this->Cell(15,9,strtoupper($Cyg[1]),1,0,'C', False); // YEAR GRADUATED
		$this->Cell(22,9,$Cue[1],1,0,'C', False); // UNITS EARNED
		$this->Cell(17,9,$Cfrom[1],1,0,'C', False); // INC DATE FROM
		$this->Cell(16,9,strtoupper($Cto[1]),1,0,'C', False); // INC DATE TO
		if(strlen($Chonor[1])>=0 and strlen($Chonor[1])<=17) {
			$this->Cell(25,9,strtoupper($Chonor[1]),1,0,'C', False);
		} else if(strlen($Chonor[1])>=18 and strlen($Chonor[1])<=35) {
			$this->Cell(25,4.5,strtoupper(substr($Chonor[1],0,17).' - '),"LTR",0,'C', False);
			$this->Ln();
			$this->SetX(183.25);
			$this->Cell(25,4.5,strtoupper(substr($Chonor[1],17,17)),"LBR",0,'C', False);
		} else if(strlen($Chonor[1])>=36) {
			$this->Cell(25,3,strtoupper(substr($Chonor[1],0,17).' - '),"LTR",0,'C', False);
			$this->Ln();
			$this->SetX(183.25);
			$this->Cell(25,3,strtoupper(substr($Chonor[1],17,17).' - '),"LR",0,'C', False);
			$this->Ln();
			$this->SetX(183.25);
			$this->Cell(25,3,strtoupper(substr($Chonor[1],34,17)),"LBR",0,'C', False);
		}
		// GS 1
		$this->SetXY(37.25,286.5);
		$this->Cell(52,9,'',1,0,'L', False); // NAME OF SCHOOL
		$this->Cell(24,9,'',1,0,'L', False); // DEGREE COURSE
		$this->Cell(15,9,strtoupper($Gyg[0]),1,0,'C', False); // YEAR GRADUATED
		$this->Cell(22,9,$Gue[0],1,0,'C', False); // UNITS EARNED
		$this->Cell(17,9,$Gfrom[0],1,0,'C', False); // INC DATE FROM
		$this->Cell(16,9,strtoupper($Gto[0]),1,0,'C', False); // INC DATE TO
		if(strlen($Ghonor[0])>=0 and strlen($Ghonor[0])<=17) {
			$this->Cell(25,9,strtoupper($Ghonor[0]),1,0,'C', False);
		} else if(strlen($Ghonor[0])>=18 and strlen($Ghonor[0])<=35) {
			$this->Cell(25,4.5,strtoupper(substr($Ghonor[0],0,17).' - '),"LTR",0,'C', False);
			$this->Ln();
			$this->SetX(183.25);
			$this->Cell(25,4.5,strtoupper(substr($Ghonor[0],17,17)),"LBR",0,'C', False);
		} else if(strlen($Ghonor[0])>=36) {
			$this->Cell(25,3,strtoupper(substr($Ghonor[0],0,17).' - '),"LTR",0,'C', False);
			$this->Ln();
			$this->SetX(183.25);
			$this->Cell(25,3,strtoupper(substr($Ghonor[0],17,17).' - '),"LR",0,'C', False);
			$this->Ln();
			$this->SetX(183.25);
			$this->Cell(25,3,strtoupper(substr($Ghonor[0],34,17)),"LBR",0,'C', False);
		}
		
		// GS 2
		$this->SetXY(37.25,295.5);
		$this->Cell(52,10,'',1,0,'L', False); // NAME OF SCHOOL
		$this->Cell(24,9,'',1,0,'L', False); // DEGREE COURSE
		$this->Cell(15,9,strtoupper($Gyg[1]),1,0,'C', False); // YEAR GRADUATED
		$this->Cell(22,9,$Gue[1],1,0,'C', False); // UNITS EARNED
		$this->Cell(17,9,$Gfrom[1],1,0,'C', False); // INC DATE FROM
		$this->Cell(16,9,strtoupper($Gto[1]),1,0,'C', False); // INC DATE TO
		if(strlen($Ghonor[1])>=0 and strlen($Ghonor[1])<=17) {
			$this->Cell(25,9,strtoupper($Ghonor[1]),1,0,'C', False);
		} else if(strlen($Ghonor[1])>=18 and strlen($Ghonor[1])<=35) {
			$this->Cell(25,4.5,strtoupper(substr($Ghonor[1],0,17).' - '),"LTR",0,'C', False);
			$this->Ln();
			$this->SetX(183.25);
			$this->Cell(25,4.5,strtoupper(substr($Ghonor[1],17,17)),"LBR",0,'C', False);
		} else if(strlen($Ghonor[1])>=36) {
			$this->Cell(25,3,strtoupper(substr($Ghonor[1],0,17).' - '),"LTR",0,'C', False);
			$this->Ln();
			$this->SetX(183.25);
			$this->Cell(25,3,strtoupper(substr($Ghonor[1],17,17).' - '),"LR",0,'C', False);
			$this->Ln();
			$this->SetX(183.25);
			$this->Cell(25,3,strtoupper(substr($Ghonor[1],34,17)),"LBR",0,'C', False);
		}
		
		$this->Ln();
		$this->SetX(6);
		$this->conti();
		$this->SetLineWidth(0.5);
		$this->Cell(202,4,'(Continue on separate sheet if necessary)',1,0,'C', True);
		$this->Ln();
		$this->SetX(6);
		$this->tf();
		$this->SetLineWidth(0.5);
		$this->Cell(202,3,'Page 1 of 4',1,0,'R', True);
		$this->Ln();
		$this->SetX(6);
		$this->Cell(202,.5,'',1,0,'R', True);
		
		// ELEMENTARY
		$this->SetXY(37.25,243.25);
		//$this->Cell(52,4,strtoupper(substr($Ename,0,35)),0,0,'C', False);
		//$this->SetXY(37.25,246.25);
		//$this->Cell(52,4,strtoupper(substr($Ename,35,35)),0,0,'C', False);
		
		if(strlen($Ename)>=0 and strlen($Ename)<=32) {
			$this->Cell(52,4,strtoupper($Ename),0,0,'C', False);
		} else if(strlen($Ename)>=33 and strlen($Ename)<=70) {
			$this->Cell(52,4,strtoupper(substr($Ename,0,32).' - '),0,0,'C', False);
			$this->Ln();
			$this->SetXY(37.25,246.25);
			$this->Cell(52,4,strtoupper(substr($Ename,32,70)),0,0,'C', False);
			$this->Ln();
		} else if(strlen($Ename)>=31) {
			$this->Cell(52,4,strtoupper(substr($Ename,0,35).' - '),"LTR",0,'C', False);
			$this->Ln();
			$this->SetXY(37.25,246.25);
			$this->Cell(52,4,strtoupper(substr($Ename,35,70).' - '),"LR",0,'C', False);
			$this->Ln();
			$this->SetXY(37.25,250.25);
			$this->Cell(52,4,strtoupper(substr($Ename,70,105)),"LBR",0,'C', False);
		}
		
					
		// SECONDARY
		$this->SetXY(37.25,251.25);
		$this->Cell(52,4,strtoupper(substr($Sname,0,35)),0,0,'C', False);
		$this->SetXY(37.25,255.25);
		$this->Cell(52,4,strtoupper(substr($Sname,35,35)),0,0,'C', False);
		
		
		// VOCATIONAL
		$this->SetXY(37.25,260.25);
		$this->Cell(52,4,strtoupper(substr($Vname,0,35)),0,0,'C', False);
		$this->SetXY(37.25,264.25);
		$this->Cell(52,4,strtoupper(substr($Vname,35,35)),0,0,'C', False);
		
		$this->SetXY(89.25,260.25);
		$this->Cell(24,3,strtoupper(substr($Vdegree,0,15)),0,0,'C', False);
		$this->SetXY(89.25,263);
		$this->Cell(24,3,strtoupper(substr($Vdegree,15,15)),0,0,'C', False);
		$this->SetXY(89.25,265.5);
		$this->Cell(24,3,strtoupper(substr($Vdegree,30,15)),0,0,'C', False);
		
		// COLLEGE 1
		$this->SetXY(37.25,268.5);
		$this->Cell(52,4,strtoupper(substr($Cname[0],0,35)),0,0,'C', False);
		$this->SetXY(37.25,272.5);
		$this->Cell(52,4,strtoupper(substr($Cname[0],35,35)),0,0,'C', False);
		
		$this->SetXY(89.25,268.75);
		$this->Cell(24,3,strtoupper(substr($Cdegree[0],0,15).' - '),0,0,'C', False);
		$this->SetXY(89.25,271.5);
		$this->Cell(24,3,strtoupper(substr($Cdegree[0],15,15)),0,0,'C', False);
		$this->SetXY(89.25,274.5);
		$this->Cell(24,3,strtoupper(substr($Cdegree[0],30,15)),0,0,'C', False);
		
			
		// COLLEGE 2
		$this->SetXY(37.25,277.5);
		$this->Cell(52,4,strtoupper(substr($Cname[1],0,35)),0,0,'C', False);
		$this->SetXY(37.25,281.5);
		$this->Cell(52,4,strtoupper(substr($Cname[1],35,35)),0,0,'C', False);
		
		$this->SetXY(89.25,277.75);
		$this->Cell(24,3,strtoupper(substr($Cdegree[1],0,15).' - '),0,0,'C', False);
		$this->SetXY(89.25,280.5);
		$this->Cell(24,3,strtoupper(substr($Cdegree[1],15,15)),0,0,'C', False);
		$this->SetXY(89.25,283.5);
		$this->Cell(24,3,strtoupper(substr($Cdegree[1],30,15)),0,0,'C', False);
		
		// GS 1
		
		//$this->Cell(52,4,strtoupper(substr($Gname[0],0,35).' - '),0,0,'C', False);
		//$this->SetXY(37.25,290.5);
		//$this->Cell(52,4,strtoupper(substr($Gname[0],35,35)),0,0,'C', False);
		
		$this->SetXY(37.25,286.5);
		if(strlen($Gname[0])>=0 and strlen($Gname[0])<=35) {
			$this->Cell(52,4,strtoupper($Gname[0]),0,0,'C', False);
		} else if(strlen($Gname[0])>=36 and strlen($Gname[0])<=70) {
			$this->Cell(52,4,strtoupper(substr($Gname[0],0,35).' - '),"LTR",0,'C', False);
			$this->Ln();
			$this->SetXY(37.25, 290.5);
			$this->Cell(52,4,strtoupper(substr($Gname[0],35,70)),"LBR",0,'C', False);
		} else if(strlen($Gname[0])>=71) {
			$this->Cell(52,4,strtoupper(substr($Gname[0],0,35).' - '),"LTR",0,'C', False);
			$this->Ln();
			$this->SetXY(37.25,290.5);
			$this->Cell(52,4,strtoupper(substr($Gname[0],35,70).' - '),"LR",0,'C', False);
			$this->Ln();
			$this->SetXY(37.25,294.5);
			$this->Cell(52,4,strtoupper(substr($Gname[0],70,105)),"LBR",0,'C', False);
		}
		
		$this->SetXY(89.25,286.75);
		
		//$this->Cell(24,3,strtoupper(substr($Gdegree[0],0,15).' - '),0,0,'C', False);
		//$this->SetXY(89.25,289.5);
		//$this->Cell(24,3,strtoupper(substr($Gdegree[0],15,15).' - '),0,0,'C', False);
		//$this->SetXY(89.25,292.5);
		//$this->Cell(24,3,strtoupper(substr($Gdegree[0],30,15)),0,0,'C', False);
		
		if(strlen($Gdegree[0])>=0 and strlen($Gdegree[0])<=15) {
			$this->Cell(24,3,strtoupper($Gdegree[0]),0,0,'C', False);
		} else if(strlen($Gdegree[0])>=16 and strlen($Gdegree[0])<=30) {
			
			$this->Cell(24,5.6,strtoupper(substr($Gdegree[0],0,15).' - '),"LTR",0,'C', False);
			$this->Ln();
			$this->SetXY(89.25,289.5);
			$this->Cell(24,5.7,strtoupper(substr($Gdegree[0],15,30)),"LBR",0,'C', False);
			$this->Ln();
		} else if(strlen($Gdegree[0])>=31) {
			$this->Cell(24,3,strtoupper(substr($Gdegree[0],0,15).' - '),"LTR",0,'C', False);
			$this->Ln();
			$this->SetXY(89.25,289.5);
			$this->Cell(24,3,strtoupper(substr($Gdegree[0],15,30).' - '),"LR",0,'C', False);
			$this->Ln();
			$this->SetXY(89.25,292.5);
			$this->Cell(24,3,strtoupper(substr($Gdegree[0],30,45)),"LBR",0,'C', False);
		}
		
		// GS 2
		$this->SetXY(37.25,295.5);
		//$this->Cell(52,4,strtoupper(substr($Gname[1],0,35).' - '),0,0,'C', False);
		//$this->SetXY(37.25,299.5);
		//$this->Cell(52,4,strtoupper(substr($Gname[1],35,35)),0,0,'C', False);
		
		$this->SetXY(37.25,295.5);
		if(strlen($Gname[1])>=0 and strlen($Gname[1])<=35) {
			$this->Cell(52,4,strtoupper($Gname[1]),0,0,'C', False);
		} else if(strlen($Gname[1])>=36 and strlen($Gname[1])<=70) {
			$this->Cell(52,4,strtoupper(substr($Gname[1],0,35).' - '),"LTR",0,'C', False);
			$this->Ln();
			$this->SetXY(37.25,295.5);
			$this->Cell(52,4,strtoupper(substr($Gname[1],35,70)),"LBR",0,'C', False);
		} else if(strlen($Gname[1])>=71) {
			$this->Cell(52,4,strtoupper(substr($Gname[1],0,35).' - '),"LTR",0,'C', False);
			$this->Ln();
			$this->SetXY(37.25,299.5);
			$this->Cell(52,4,strtoupper(substr($Gname[1],35,70).' - '),"LR",0,'C', False);
			$this->Ln();
			$this->SetXY(37.25,303.5);
			$this->Cell(52,4,strtoupper(substr($Gname[1],70,105)),"LBR",0,'C', False);
		}
		
		$this->SetXY(89.25,295.75);
		//$this->Cell(24,3,strtoupper(substr($Gdegree[1],0,15).' - '),0,0,'C', False);
		//$this->SetXY(89.25,298.5);
		//$this->Cell(24,3,strtoupper(substr($Gdegree[1],15,15).' - '),0,0,'C', False);
		//$this->SetXY(89.25,301.5);
		//$this->Cell(24,3,strtoupper(substr($Gdegree[1],30,15)),0,0,'C', False);
		
		if(strlen($Gdegree[1])>=0 and strlen($Gdegree[1])<=15) {
			$this->Cell(24,3,strtoupper($Gdegree[1]),0,0,'C', False);
		} else if(strlen($Gdegree[1])>=16 and strlen($Gdegree[1])<=30) {
			$this->Cell(24,5.6,strtoupper(substr($Gdegree[1],0,15).' - '),"LTR",0,'C', False);
			$this->Ln();
			$this->SetXY(89.25,298.5);
			$this->Cell(24,5.7,strtoupper(substr($Gdegree[1],15,30)),"LBR",0,'C', False);
			$this->Ln();
		} else if(strlen($Gdegree[1])>=31) {
			$this->Cell(24,3,strtoupper(substr($Gdegree[1],0,15).' - '),"LTR",0,'C', False);
			$this->Ln();
			$this->SetXY(89.25,298.5);
			$this->Cell(24,3,strtoupper(substr($Gdegree[1],15,30).' - '),"LR",0,'C', False);
			$this->Ln();
			$this->SetXY(89.25,301.5);
			$this->Cell(24,3,strtoupper(substr($Gdegree[1],30,45)),"LBR",0,'C', False);
		}
		
		$this->SetLineWidth(0.25);
		$this->SetXY(40.5,32.5);
		$this->Cell(3,3,'',1,0,'C', False);
		$this->putCheck(49.25,30);
		$this->putBox(38.25,70.75);
		$this->putBox(52.25,70.75);
		
		$this->putBox(38.25,76);
		$this->putBox(38.25,81.5);
		$this->putBox(38.25,86.75);
		$this->putBox(54,76);
		$this->putBox(54,81.5);
		$this->putBox(54,86.75);
	}
	
	function putBox($x,$y)
	{
		$this->SetLineWidth(0.25);
		$this->SetXY($x,$y);
		$this->Cell(3,3,'',1,0,'C', False);
	}
	function pageOne() 
	{
		$this->personalInfo();
		$this->familyBckg();
		$this->educationalBckg();
	}
	function conti()
	{
		$this->SetLineWidth(0.25);
		$this->SetFont('ARIALNI','',7);
		$this->SetFillColor(235,235,235);
		$this->SetTextColor(237,28,36);
	}
	function title() 
	{
		$this->SetLineWidth(0.5);
		$this->SetFillColor(151,151,151);
		$this->SetTextColor(255);
		$this->SetFont('ARIALNBI','',9);
	}
	function labelF() 
	{
		$this->SetLineWidth(0.25);
		$this->SetFont('ARIALN','',7);
		$this->SetFillColor(235,235,235);
		$this->SetTextColor(0);
	}
	function tf() 
	{
		$this->SetLineWidth(0.25);
		$this->SetFont('ARIALN','',8);
		$this->SetFillColor(255,255,255);
		$this->SetTextColor(0);
	}
	function tfl() 
	{
		$this->SetLineWidth(0.25);
		$this->SetFont('ARIALN','',7);
		$this->SetFillColor(255,255,255);
		$this->SetTextColor(0);
	}
	function tfemail() 
	{
		$this->SetLineWidth(0.25);
		$this->SetFont('ARIAL','',8);
		$this->SetFillColor(255,255,255);
		$this->SetTextColor(26,62,230);
	}
	function tfna() 
	{
		$this->SetLineWidth(0.25);
		$this->SetFont('ARIALN','',6);
		$this->SetFillColor(255,255,255);
		$this->SetTextColor(127,127,127);
	}

}		
	require('makefont/makefont.php');
	//MakeFont('font/ARIALNBI.ttf','cp1252');
	$pdf = new PDF('P','mm',array(215.9, 330.2));
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('ARIALN','',7);
	$pdf->SetAutoPageBreak(false);
	$pdf->PageOne();
	$pdf->Output();
?>