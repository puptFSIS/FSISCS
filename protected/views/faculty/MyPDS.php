<?php
require('fpdf.php');
class PDF extends FPDF
{
	function Header()
	{
		$this->SetLineWidth(1);
		$this->SetY(4);
		$this->SetX(3);
		$this->Cell(210,317,'',1,0,'C');
		$this->AddFont('ariblk','','ariblk.php');
		$this->AddFont('ARIALN','','ARIALN.php');
		$this->AddFont('ARIALNI','','ARIALNI.php');
		$this->SetFont('ARIALN','',7.5);
	}
	function Footer()
	{
		
	}
	function PageOne()
	{
		
		$this->SetY(0.5);
		$this->SetX(3);
		$this->SetFont('ARIALN','',7);
		$this->Cell(0,20,'CS FORM 212 (Revised 2005)',0,0,'L');
		$this->Ln(10);
		$this->SetFont('ariblk','',18);
		$this->Cell(0,25,'PERSONAL DATA SHEET',0,0,'C');
		$this->Ln(5);
		
		session_start();
		include("getPersonalInformation.php");
		$f = false;
		$t = True;
		$w = array(127, 17, 66);
		$this->SetFont('ARIALN','',7.5);
		$this->Ln(17);
		
		$this->SetX(3);
		$this->Cell($w[0],5,'Print legibly. Mark appropriate boxes with [   ] and * / * use separate sheet if necessary.',0,0,'L',$f);
		$this->labelF();
		$this->Cell($w[1],5,'1. CS ID No.',1,0,'C', $t);
		$this->SetTextColor(0);
		$this->Cell($w[2],5,'(to be filled by CSC)',1,0,'R');
		$this->Ln(5);
		
		$this->SetFont('ARIALNI','',10);
		$this->title();
		$this->SetX(3);

		$this->Cell(210,5,'I. PERSONAL INFORMATION',1,0,'L',$t);
		$this->Ln(5.5);
		
		$this->labelF();
		$this->SetX(3.5);
		$this->Cell(32,6,'2. SURNAME',"R",0,'L',$t);
		$this->Cell(177,6,'',"B",0,'L',$f);

		$this->labelF();
		$this->SetY(43.5);
		$this->SetX(35);
		for($i=0;$i<29;$i++)
		$this->Cell(6,4,strtoupper(substr($surname,$i,1)),"R",0,'C',$f);
		$this->Ln(5);

		$this->labelF();
		$this->SetX(3.5);
		$this->Cell(32,6,'    FIRST NAME',"R",0,'L',$t);
		$this->Cell(177,6,'',"B",0,'L',$f);
		$this->labelF();
		$this->SetY(49.5);
		$this->SetX(35);
		for($i=0;$i<29;$i++)
		$this->Cell(6,4,strtoupper(substr($firstname,$i,1)),"R",0,'C',$f);
		$this->Ln(5);
		
		$this->labelF();
		$this->SetX(3.5);
		$this->Cell(32,6,'    MIDDLE NAME',"RB",0,'L',$t);
		$this->Cell(177,6,'',"B",0,'L',$f);
		$this->labelF();
		$this->SetY(55.5);
		$this->SetX(35);
		for($i=0;$i<17;$i++)
		$this->Cell(6,4,strtoupper(substr($middlename,$i,1)),"R",0,'C',$f);
		
		$this->labelF();
		$this->SetY(54.5);
		$this->SetX(143);
		$this->Cell(45,6,'3. NAME EXTENSION(e.g. Jr., Sr.)',1,0,'L',$t);
		$this->Cell(24,6,$nameextension,0,0,'L',$f);
		$this->Ln(5);
		
		$this->labelF();
		$this->SetY(60.5);
		$this->SetX(3.5);
		$this->Cell(58,6,'4. DATE OF BIRTH (mm/dd/yyyy)',"TRB",0,'L',$t);
		$this->labelF();
		$this->SetY(60.5);
		$this->SetX(61.5);
		$this->Cell(30,6,$m .' / ' . $d .' / ' . $y,"BR",0,'C',$f);
		
		$this->labelF();
		$this->SetY(60.5);
		$this->SetX(91.5);
		$this->Cell(37,6,'16. RESIDENTIAL ADDRESS',"LTR",0,'L',$t);
		$this->labelF();
		$this->SetY(60.5);
		$this->SetX(128.5);
		$this->Cell(78,6,$resadd,0,1,'L',$f);
		$this->Ln(5);
		
		$this->labelF();
		$this->SetY(66.5);
		$this->SetX(3.5);
		$this->Cell(32,6,'5. PLACE OF BIRTH',"TRB",0,'L',$t);
		$this->labelF();
		$this->SetY(66.5);
		$this->SetX(35.5);
		$this->Cell(56,6,$pbirth,1,1,'C',$f);
		
		$this->labelF();
		$this->SetY(66.5);
		$this->SetX(91.5);
		$this->Cell(37,6,'',"LR",0,'L',$t);
		$this->labelF();
		$this->SetY(66.5);
		$this->SetX(128.5);
		$this->Cell(78,6,'',0,1,'L',$f);
		$this->Ln(5);
		
		$this->labelF();
		$this->SetY(72.5);
		$this->SetX(3.5);
		$this->Cell(32,6,'6. SEX',"TRB",0,'L',$t);
		$this->labelF();
		$this->SetY(72.5);
		$this->SetX(35.5);
		if($sex=="Male")
		$this->Cell(56,6,'  [ / ] Male          [   ] Female',1,1,'L',$f);
		else
		$this->Cell(56,6,'  [   ] Male          [ / ] Female',1,1,'L',$f);
		
		$this->labelF();
		$this->SetY(72.5);
		$this->SetX(91.5);
		$this->Cell(37,6,'',"LR",0,'L',$t);
		$this->labelF();
		$this->SetY(72.5);
		$this->SetX(128.5);
		$this->Cell(78,6,'',0,1,'L',$f);
		$this->Ln(5);
		
		$this->labelF();
		$this->SetY(78.5);
		$this->SetX(3.5);
		$this->Cell(32,6,'7. CIVIL STATUS',"TR",0,'L',$t);
		$this->labelF();
		$this->SetY(78.5);
		$this->SetX(35.5);
		if($cstatus=="Single")
		$this->Cell(56,6,'  [ / ] Single        [   ] Widowed',0,1,'L',$f);
		elseif($cstatus=="Widowed")
		$this->Cell(56,6,'  [   ] Single        [ / ] Widowed',0,1,'L',$f);
		else
		$this->Cell(56,6,'  [   ] Single        [   ] Widowed',0,1,'L',$f);
		
		$this->labelF();
		$this->SetY(78.5);
		$this->SetX(91.5);
		$this->Cell(37,6,'ZIP CODE',"LR",0,'R',$t);
		$this->labelF();
		$this->SetY(78.5);
		$this->SetX(128.5);
		$this->Cell(78,6,$zipcode,"T",1,'L',$f);
		$this->Ln(5);
		
		$this->labelF();
		$this->SetY(84.5);
		$this->SetX(3.5);
		$this->Cell(32,6,'',"R",0,'L',$t);
		$this->labelF();
		$this->SetY(84.5);
		$this->SetX(35.5);
		if($cstatus=="Married")
		$this->Cell(56,6,'  [ / ] Married      [   ] Separated',0,1,'L',$f);
		elseif($cstatus=="Separated")
		$this->Cell(56,6,'  [   ] Married      [ / ] Separated',0,1,'L',$f);
		else
		$this->Cell(56,6,'  [   ] Married      [   ] Separated',0,1,'L',$f);
		
		$this->labelF();
		$this->SetY(84.5);
		$this->SetX(91.5);
		$this->Cell(37,6,'17. TELEPHONE NO.',"LR",0,'L',$t);
		$this->labelF();
		$this->SetY(84.5);
		$this->SetX(128.5);
		$this->Cell(78.5,6,$telno,1,1,'L',$f);
		$this->Ln(5);
		
		$this->labelF();
		$this->SetY(90.5);
		$this->SetX(3.5);
		$this->Cell(32,6,'',"R",0,'L',$t);
		$this->labelF();
		$this->SetY(90.5);
		$this->SetX(35.5);
		if($cstatus=="Annulled")
		$this->Cell(56,6,'  [ / ] Annulled    [   ] Others, specify ____________',0,1,'L',$f);
		elseif($cstatus=="Other")
		$this->Cell(56,6,'  [   ] Annulled    [ / ] Others, specify ____________',0,1,'L',$f);
		else
		$this->Cell(56,6,'  [   ] Annulled    [   ] Others, specify ____________',0,1,'L',$f);
		
		$this->labelF();
		$this->SetY(90.5);
		$this->SetX(91.5);
		$this->Cell(37,6,'18. PERMANENT ADDRESS',"LRT",0,'L',$t);
		$this->labelF();
		$this->SetY(90.5);
		$this->SetX(128.5);
		$this->Cell(78.5,6,$peradd,"LTR",1,'L',$f);
		$this->Ln(5);
		
		$this->labelF();
		$this->SetY(96.5);
		$this->SetX(3.5);
		$this->Cell(32,6,'8. CITIZENSHIP',"TRB",0,'L',$t);
		$this->labelF();
		$this->SetY(96.5);
		$this->SetX(35.5);
		$this->Cell(56,6,$citizenship,1,1,'L',$f);
		
		$this->labelF();
		$this->SetY(96.5);
		$this->SetX(91.5);
		$this->Cell(37,6,'',"LR",0,'L',$t);
		$this->labelF();
		$this->SetY(96.5);
		$this->SetX(128.5);
		$this->Cell(78,6,'',0,1,'L',$f);
		$this->Ln(5);
		
		$this->labelF();
		$this->SetY(102.5);
		$this->SetX(3.5);
		$this->Cell(32,6,'9. HEIGHT (m)',"TRB",0,'L',$t);
		$this->labelF();
		$this->SetY(102.5);
		$this->SetX(35.5);
		$this->Cell(56,6,$height . ' meters',1,1,'L',$f);
		
		$this->labelF();
		$this->SetY(102.5);
		$this->SetX(91.5);
		$this->Cell(37,6,'',"LR",0,'L',$t);
		$this->labelF();
		$this->SetY(102.5);
		$this->SetX(128.5);
		$this->Cell(78,6,'',0,1,'L',$f);
		$this->Ln(5);
		
		$this->labelF();
		$this->SetY(108.5);
		$this->SetX(3.5);
		$this->Cell(32,6,'10. WEIGHT (kg)',"TRB",0,'L',$t);
		$this->labelF();
		$this->SetY(108.5);
		$this->SetX(35.5);
		$this->Cell(56,6,$weight . ' kilograms',1,1,'L',$f);
		
		$this->labelF();
		$this->SetY(108.5);
		$this->SetX(91.5);
		$this->Cell(37,6,'ZIP CODE',"LR",0,'R',$t);
		$this->labelF();
		$this->SetY(108.5);
		$this->SetX(128.5);
		$this->Cell(78,6,$pzipCode,1,1,'L',$f);
		$this->Ln(5);
		
		$this->labelF();
		$this->SetY(114.5);
		$this->SetX(3.5);
		$this->Cell(32,6,'11. BLOOD TYPE',"TRB",0,'L',$t);
		$this->labelF();
		$this->SetY(114.5);
		$this->SetX(35.5);
		$this->Cell(56,6,$bloodType,1,1,'L',$f);
		
		$this->labelF();
		$this->SetY(114.5);
		$this->SetX(91.5);
		$this->Cell(37,6,'19. TELEPHONE NO.',"LRB",0,'L',$t);
		$this->labelF();
		$this->SetY(114.5);
		$this->SetX(128.5);
		$this->Cell(78.5,6,$ptelNo,1,1,'L',$f);
		$this->Ln(5);
		
		$this->labelF();
		$this->SetY(120.5);
		$this->SetX(3.5);
		$this->Cell(32,6,'12. GSIS ID NO.',"TRB",0,'L',$t);
		$this->labelF();
		$this->SetY(120.5);
		$this->SetX(35.5);
		$this->Cell(56,6,$gsis,1,1,'L',$f);
		
		$this->labelF();
		$this->SetY(120.5);
		$this->SetX(91.5);
		$this->Cell(37,6,'20. E-MAIL ADDRESS (if any).',1,0,'L',$t);
		$this->labelF();
		$this->SetY(120.5);
		$this->SetX(128.5);
		$this->Cell(78.5,6,$email,1,1,'L',$f);
		$this->Ln(5);
		
		$this->labelF();
		$this->SetY(126.5);
		$this->SetX(3.5);
		$this->Cell(32,6,'13. PAG-IBIG ID NO.',"TRB",0,'L',$t);
		$this->labelF();
		$this->SetY(126.5);
		$this->SetX(35.5);
		$this->Cell(56,6,$pagibig,1,1,'L',$f);
		
		$this->labelF();
		$this->SetY(126.5);
		$this->SetX(91.5);
		$this->Cell(37,6,'21. CELLPHONE NO. (if any).',1,0,'L',$t);
		$this->labelF();
		$this->SetY(126.5);
		$this->SetX(128.5);
		$this->Cell(78.5,6,$cellNo,1,1,'L',$f);
		$this->Ln(5);
		
		$this->labelF();
		$this->SetY(132.5);
		$this->SetX(3.5);
		$this->Cell(32,6,'14. PHILHEALTH NO.',"TRB",0,'L',$t);
		$this->labelF();
		$this->SetY(132.5);
		$this->SetX(35.5);
		$this->Cell(56,6,$phealth,1,1,'L',$f);
		
		$this->labelF();
		$this->SetY(132.5);
		$this->SetX(91.5);
		$this->Cell(37,6,'22. AGENCY EMPLOYEE NO.',1,0,'L',$t);
		$this->labelF();
		$this->SetY(132.5);
		$this->SetX(128.5);
		$this->Cell(78.5,6,$EmpID,1,1,'L',$f);
		$this->Ln(5);
		
		$this->labelF();
		$this->SetY(138.5);
		$this->SetX(3.5);
		$this->Cell(32,6,'15. SSS NO.',"TRB",0,'L',$t);
		$this->labelF();
		$this->SetY(138.5);
		$this->SetX(35.5);
		$this->Cell(56,6,$sss,1,1,'L',$f);
		
		$this->labelF();
		$this->SetY(138.5);
		$this->SetX(91.5);
		$this->Cell(37,6,'23. TIN',1,0,'L',$t);
		$this->labelF();
		$this->SetY(138.5);
		$this->SetX(128.5);
		$this->Cell(78.5,6,$tin,1,1,'L',$f);
		
		$this->SetFont('ARIALNI','',10);
		$this->title();
		$this->SetX(3);

		$this->Cell(204,5,'II. FAMILY BACKGROUND',1,0,'L',$t);
		$this->Ln(5.5);
		
		$this->labelF();
		$this->SetY(150);
		$this->SetX(3.5);
		$this->Cell(32,6,'24. SPOUSE\'S SURNAME',0,0,'L',$t);
		$this->labelF();
		$this->SetY(150);
		$this->SetX(35.5);
		$this->Cell(76,6,'',1,1,'L',$f);
		
		$this->labelF();
		$this->SetY(150);
		$this->SetX(111.5);
		$this->Cell(60,6,'25. NAME OF CHILD (Write full name and list all)',1,0,'L',$t);
		$this->labelF();
		$this->SetY(150);
		$this->SetX(170.5);
		$this->Cell(36,6,'DATE OF BIRTH (mm/dd/yyyyy)',"LTB",1,'C',$t);
		
		$this->labelF();
		$this->SetY(156);
		$this->SetX(3.5);
		$this->Cell(32,6,'                     FIRST NAME',0,0,'L',$t);
		$this->labelF();
		$this->SetY(156);
		$this->SetX(35.5);
		$this->Cell(76,6,'',1,1,'L',$f);
		
		$this->labelF();
		$this->SetY(156);
		$this->SetX(111.5);
		$this->Cell(59,6,'',1,0,'L',$f);
		$this->labelF();
		$this->SetY(156);
		$this->SetX(170.5);
		$this->Cell(36,6,'               /               /               ',"LTB",1,'C',$f);
		
		$this->labelF();
		$this->SetY(162);
		$this->SetX(3.5);
		$this->Cell(32,6,'                  MIDDLE NAME',"RB",0,'L',$t);
		$this->labelF();
		$this->SetY(162);
		$this->SetX(35.5);
		$this->Cell(76,6,'',1,1,'L',$f);
		
		$this->labelF();
		$this->SetY(162);
		$this->SetX(111.5);
		$this->Cell(59,6,'',1,0,'L',$f);
		$this->labelF();
		$this->SetY(162);
		$this->SetX(170.5);
		$this->Cell(36,6,'               /               /               ',"LTB",1,'C',$f);
		
		$this->labelF();
		$this->SetY(168);
		$this->SetX(3.5);
		$this->Cell(32,6,'      OCCUPATION',"TRB",0,'L',$t);
		$this->labelF();
		$this->SetY(168);
		$this->SetX(35.5);
		$this->Cell(76,6,'',1,1,'L',$f);
		
		$this->labelF();
		$this->SetY(168);
		$this->SetX(111.5);
		$this->Cell(59,6,'',1,0,'L',$f);
		$this->labelF();
		$this->SetY(168);
		$this->SetX(170.5);
		$this->Cell(36,6,'               /               /               ',"LTB",1,'C',$f);
		
		$this->labelF();
		$this->SetY(174);
		$this->SetX(3.5);
		$this->Cell(32,6,'      EMPLOYER/BUS. NAME',"TRB",0,'L',$t);
		$this->labelF();
		$this->SetY(174);
		$this->SetX(35.5);
		$this->Cell(76,6,'',1,1,'L',$f);
		
		$this->labelF();
		$this->SetY(174);
		$this->SetX(111.5);
		$this->Cell(59,6,'',1,0,'L',$f);
		$this->labelF();
		$this->SetY(174);
		$this->SetX(170.5);
		$this->Cell(36,6,'               /               /               ',"LTB",1,'C',$f);
		
		$this->labelF();
		$this->SetY(180);
		$this->SetX(3.5);
		$this->Cell(32,6,'      BUSINESS ADDRESS',"TRB",0,'L',$t);
		$this->labelF();
		$this->SetY(180);
		$this->SetX(35.5);
		$this->Cell(76,6,'',1,1,'L',$f);
		
		$this->labelF();
		$this->SetY(180);
		$this->SetX(111.5);
		$this->Cell(59,6,'',1,0,'L',$f);
		$this->labelF();
		$this->SetY(180);
		$this->SetX(170.5);
		$this->Cell(36,6,'               /               /               ',"LTB",1,'C',$f);
		
		$this->labelF();
		$this->SetY(186);
		$this->SetX(3.5);
		$this->Cell(32,6,'      TELEPHONE NO.',"TRB",0,'L',$t);
		$this->labelF();
		$this->SetY(186);
		$this->SetX(35.5);
		$this->Cell(76,6,'',1,1,'L',$f);
		
		$this->labelF();
		$this->SetY(186);
		$this->SetX(111.5);
		$this->Cell(59,6,'',1,0,'L',$f);
		$this->labelF();
		$this->SetY(186);
		$this->SetX(170.5);
		$this->Cell(36,6,'               /               /               ',"LTB",1,'C',$f);
		
		$this->labelF();
		$this->SetY(192);
		$this->SetX(3.5);
		$this->SetFont('ARIALNI','',7.5);
		$this->SetTextColor(237,28,36);
		$this->Cell(108,6,'(Continue on separate sheet if necessary)',"TB",0,'C',$f);
		
		$this->labelF();
		$this->SetY(192);
		$this->SetX(111.5);
		$this->Cell(59,6,'',1,0,'L',$f);
		$this->labelF();
		$this->SetY(192);
		$this->SetX(170.5);
		$this->Cell(36,6,'               /               /               ',"LTB",1,'C',$f);
		
		$this->labelF();
		$this->SetY(198);
		$this->SetX(3.5);
		$this->Cell(35,6,'26. FATHER\'S SURNAME',"T",0,'L',$t);
		$this->labelF();
		$this->SetY(198);
		$this->SetX(38.5);
		$this->Cell(73,6,'',1,1,'L',$f);
		
		$this->labelF();
		$this->SetY(198);
		$this->SetX(111.5);
		$this->Cell(59,6,'',1,0,'L',$f);
		$this->labelF();
		$this->SetY(198);
		$this->SetX(170.5);
		$this->Cell(36,6,'               /               /               ',"LTB",1,'C',$f);
		
		$this->labelF();
		$this->SetY(204);
		$this->SetX(3.5);
		$this->Cell(35,6,'      FIRST NAME',0,0,'L',$t);
		$this->labelF();
		$this->SetY(204);
		$this->SetX(38.5);
		$this->Cell(73,6,'',1,1,'L',$f);
		
		$this->labelF();
		$this->SetY(204);
		$this->SetX(111.5);
		$this->Cell(59,6,'',1,0,'L',$f);
		$this->labelF();
		$this->SetY(204);
		$this->SetX(170.5);
		$this->Cell(36,6,'               /               /               ',"LTB",1,'C',$f);
		
		$this->labelF();
		$this->SetY(210);
		$this->SetX(3.5);
		$this->Cell(35,6,'      MIDDLE NAME',"RB",0,'L',$t);
		$this->labelF();
		$this->SetY(210);
		$this->SetX(38.5);
		$this->Cell(73,6,'',1,1,'L',$f);
		
		$this->labelF();
		$this->SetY(210);
		$this->SetX(111.5);
		$this->Cell(59,6,'',1,0,'L',$f);
		$this->labelF();
		$this->SetY(210);
		$this->SetX(170.5);
		$this->Cell(36,6,'               /               /               ',"LTB",1,'C',$f);
		
		$this->labelF();
		$this->SetY(216);
		$this->SetX(3.5);
		$this->Cell(105,6,'27. MOTHER\'S MAIDEN NAME',"TB",0,'L',$f);
		
		$this->labelF();
		$this->SetY(216);
		$this->SetX(111.5);
		$this->Cell(59,6,'',1,0,'L',$f);
		$this->labelF();
		$this->SetY(216);
		$this->SetX(170.5);
		$this->Cell(33,6,'               /               /               ',"LTB",1,'C',$f);
		
		$this->labelF();
		$this->SetY(222);
		$this->SetX(3.5);
		$this->Cell(35,6,'      SURNAME',"T",0,'L',$t);
		$this->labelF();
		$this->SetY(222);
		$this->SetX(38.5);
		$this->Cell(73,6,'',1,1,'L',$f);
		
		$this->labelF();
		$this->SetY(222);
		$this->SetX(111.5);
		$this->Cell(59,6,'',1,0,'L',$f);
		$this->labelF();
		$this->SetY(222);
		$this->SetX(170.5);
		$this->Cell(36,6,'               /               /               ',"LTB",1,'C',$f);
		
		$this->labelF();
		$this->SetY(228);
		$this->SetX(3.5);
		$this->Cell(35,6,'      FIRST NAME',0,0,'L',$t);
		$this->labelF();
		$this->SetY(228);
		$this->SetX(38.5);
		$this->Cell(73,6,'',1,1,'L',$f);
		
		$this->labelF();
		$this->SetY(228);
		$this->SetX(111.5);
		$this->Cell(59,6,'',1,0,'L',$f);
		$this->labelF();
		$this->SetY(228);
		$this->SetX(170.5);
		$this->Cell(36,6,'               /               /               ',"LTB",1,'C',$f);
		
		$this->labelF();
		$this->SetY(234);
		$this->SetX(3.5);
		$this->Cell(35,6,'      MIDDLE NAME',"RB",0,'L',$t);
		$this->labelF();
		$this->SetY(234);
		$this->SetX(38.5);
		$this->Cell(73,6,'',1,1,'L',$f);
		
		$this->labelF();
		$this->SetY(234);
		$this->SetX(111.5);
		$this->SetFont('ARIALNI','',7.5);
		$this->SetTextColor(237,28,36);
		$this->Cell(101,6,'(Continue on separate sheet if necessary)',1,0,'C',$f);
	
		$this->SetFont('ARIALNI','',10);
		$this->title();
		$this->SetY(240.5);
		$this->SetX(3);
		
		$this->Cell(210,5,'III. EDUCATIONAL BACKGROUND',1,0,'L',$t);
		$this->Ln(5.5);
		
		$this->labelF();
		$this->SetY(246);
		$this->SetX(3.5);
		$this->Cell(32,5,'28. ',"TR",0,'L',$t);
		$this->labelF();
		$this->SetY(251);
		$this->SetX(3.5);
		$this->Cell(32,5,'LEVEL',"R",0,'C',$t);
		$this->labelF();
		$this->SetY(256);
		$this->SetX(3.5);
		$this->Cell(32,5,'',"RB",0,'L',$t);
		
		$this->labelF();
		$this->SetY(246);
		$this->SetX(35.5);
		$this->Cell(53,3.75,'',"LT",0,'L',$t);
		$this->labelF();
		$this->SetY(249.75);
		$this->SetX(35.5);
		$this->Cell(53,3.75,'NAME OF SCHOOL',"L",0,'C',$t);
		$this->labelF();
		$this->SetY(253.5);
		$this->SetX(35.5);
		$this->Cell(53,3.75,'(Write in full)',"L",0,'C',$t);
		$this->labelF();
		$this->SetY(257.25);
		$this->SetX(35.5);
		$this->Cell(53,3.75,'',"LB",0,'L',$t);
		
		$this->labelF();
		$this->SetY(246);
		$this->SetX(88.5);
		$this->Cell(23.5,3.75,'',"LT",0,'L',$t);
		$this->labelF();
		$this->SetY(249.75);
		$this->SetX(88.5);
		$this->Cell(23.5,3.75,'DEGREE COURSE',"L",0,'C',$t);
		$this->labelF();
		$this->SetY(253.5);
		$this->SetX(88.5);
		$this->Cell(23.5,3.75,'(Write in full)',"L",0,'C',$t);
		$this->labelF();
		$this->SetY(257.25);
		$this->SetX(88.5);
		$this->Cell(23.5,3.75,'',"L",0,'L',$t);
		
		$this->labelF();
		$this->SetY(246);
		$this->SetX(112);
		$this->Cell(15,8,'YEAR',"LT",0,'C',$t);
		$this->labelF();
		$this->SetY(251);
		$this->SetX(112);
		$this->Cell(15,5,'GRADUATED',"L",0,'C',$t);
		$this->labelF();
		$this->SetY(255.5);
		$this->SetX(112);
		$this->Cell(15,5.5,'(if graduated)',"LB",0,'C',$t);
		
		$this->labelF();
		$this->SetY(246);
		$this->SetX(127);
		$this->Cell(22,3.75,'HIGHEST GRADE/',"LT",0,'C',$t);
		$this->labelF();
		$this->SetY(249.75);
		$this->SetX(127);
		$this->Cell(22,3.75,'LEVEL/',"L",0,'C',$t);
		$this->labelF();
		$this->SetY(253.5);
		$this->SetX(127);
		$this->Cell(22,3.75,'UNITS EARNED',"L",0,'C',$t);
		$this->labelF();
		$this->SetY(257.25);
		$this->SetX(127);
		$this->Cell(22,3.75,'(if not graduated)',"LB",0,'C',$t);
		
		$this->labelF();
		$this->SetY(246);
		$this->SetX(149);
		$this->Cell(38,4,'INCLUSIVE DATES OF',"LT",0,'C',$t);
		$this->labelF();
		$this->SetY(250);
		$this->SetX(149);
		$this->Cell(38,4,'ATTENDANCE',"L",0,'C',$t);
		$this->labelF();
		$this->SetY(254);
		$this->SetX(149);
		$this->Cell(19,7,'FROM',1,0,'C',$t);
		$this->labelF();
		$this->SetY(254);
		$this->SetX(168);
		$this->Cell(19,7,'TO',1,0,'C',$t);
		
		$this->labelF();
		$this->SetY(246);
		$this->SetX(187);
		$this->Cell(25.5,8,'SCHOLARSHIP/',"LT",0,'C',$t);
		$this->labelF();
		$this->SetY(251);
		$this->SetX(187);
		$this->Cell(25.5,5,'ACADEMIC HONORS',"L",0,'C',$t);
		$this->labelF();
		$this->SetY(254.5);
		$this->SetX(187);
		$this->Cell(25.5,5,'RECEIVED',"L",0,'C',$t);
		$this->labelF();
		$this->SetY(259);
		$this->SetX(187);
		$this->Cell(25.5,2,'',"LB",0,'C',$t);
		
		$this->labelF();
		$this->SetY(261);
		$this->SetX(3.5);
		$this->Cell(32,7.57,'     ELEMENTARY',1,0,'L',$t);
		
		$this->labelF();
		$this->SetY(268.57);
		$this->SetX(3.5);
		$this->Cell(32,7.57,'     SECONDARY',1,0,'L',$t);
		
		$this->labelF();
		$this->SetY(276.14);
		$this->SetX(3.5);
		$this->Cell(32,3.78,'     VOCATIONAL /',"LTR",0,'L',$t);
		$this->labelF();
		$this->SetY(279.92);
		$this->SetX(3.5);
		$this->Cell(32,3.78,'     TRADE COURSES',"LBR",0,'L',$t);
		
		$this->labelF();
		$this->SetY(283.7);
		$this->SetX(3.5);
		$this->Cell(32,3.78,'     COLLEGE',"LTR",0,'L',$t);
		$this->labelF();
		$this->SetY(287.48);
		$this->SetX(3.5);
		$this->Cell(32,3.78,'',"LR",0,'L',$t);
		$this->labelF();
		$this->SetY(291.26);
		$this->SetX(3.5);
		$this->Cell(32,3.78,'',"LR",0,'L',$t);
		$this->labelF();
		$this->SetY(295.04);
		$this->SetX(3.5);
		$this->Cell(32,3.78,'',"LBR",0,'L',$t);
		
		$this->labelF();
		$this->SetY(313.97);
		$this->SetX(3.5);
		$this->Cell(32,3.78,'     GRADUATE STUDIES',"LTR",0,'L',$t);
		$this->labelF();
		$this->SetY(319);
		$this->SetX(3.5);
		$this->Cell(32,3.78,'',"LR",0,'L',$t);
		$this->labelF();
		$this->SetY(324);
		$this->SetX(3.5);
		$this->Cell(32,3.78,'',"LR",0,'L',$t);
		$this->labelF();
		$this->SetY(329);
		$this->SetX(3.5);
		$this->Cell(32,3.78,'',"LBR",0,'L',$t);
		
		// NAME OF SCHOOL
		$this->labelF();
		$this->SetY(261);
		$this->SetX(35.5);
		$this->Cell(53,9.5,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(272);
		$this->SetX(35.5);
		$this->Cell(53,11,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(283);
		$this->SetX(35.5);
		$this->Cell(53,11,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(294);
		$this->SetX(35.5);
		$this->Cell(53,10,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(304);
		$this->SetX(35.5);
		$this->Cell(53,10,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(314);
		$this->SetX(35.5);
		$this->Cell(53,10,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(324);
		$this->SetX(35.5);
		$this->Cell(53,10,'',1,0,'L',$f);
		
		// DEGREE COURSE
		$this->labelF();
		$this->SetY(261);
		$this->SetX(88.5);
		$this->Cell(23.5,11,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(272);
		$this->SetX(88.5);
		$this->Cell(23.5,11,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(283);
		$this->SetX(88.5);
		$this->Cell(23.5,11,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(294);
		$this->SetX(88.5);
		$this->Cell(23.5,10,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(304);
		$this->SetX(88.5);
		$this->Cell(23.5,10,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(314);
		$this->SetX(88.5);
		$this->Cell(23.5,10,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(324);
		$this->SetX(88.5);
		$this->Cell(23.5,10,'',1,0,'L',$f);

		// YEAR GRADUATED
		$this->labelF();
		$this->SetY(261);
		$this->SetX(112);
		$this->Cell(15,11,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(272);
		$this->SetX(112);
		$this->Cell(15,11,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(283);
		$this->SetX(112);
		$this->Cell(15,11,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(294);
		$this->SetX(112);
		$this->Cell(15,10,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(304);
		$this->SetX(112);
		$this->Cell(15,10,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(314);
		$this->SetX(112);
		$this->Cell(15,10,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(324);
		$this->SetX(112);
		$this->Cell(15,10,'',1,0,'L',$f);
		
		// HIGHEST GRADE/LEVEL/UNITS EARNED
		$this->labelF();
		$this->SetY(261);
		$this->SetX(127);
		$this->Cell(22,11,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(272);
		$this->SetX(127);
		$this->Cell(22,11,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(283);
		$this->SetX(127);
		$this->Cell(22,11,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(294);
		$this->SetX(127);
		$this->Cell(22,10,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(304);
		$this->SetX(127);
		$this->Cell(22,10,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(314);
		$this->SetX(127);
		$this->Cell(22,10,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(324);
		$this->SetX(127);
		$this->Cell(22,10,'',1,0,'L',$f);
		
		// INCLUSIVE DATE OF ATTENDANCE FROM
		$this->labelF();
		$this->SetY(261);
		$this->SetX(149);
		$this->Cell(19,11,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(272);
		$this->SetX(149);
		$this->Cell(19,11,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(283);
		$this->SetX(149);
		$this->Cell(19,11,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(294);
		$this->SetX(149);
		$this->Cell(19,10,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(304);
		$this->SetX(149);
		$this->Cell(19,10,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(314);
		$this->SetX(149);
		$this->Cell(19,10,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(324);
		$this->SetX(149);
		$this->Cell(19,10,'',1,0,'L',$f);
		
		// INCLUSIVE DATE OF ATTENDANCE TO
		$this->labelF();
		$this->SetY(261);
		$this->SetX(168);
		$this->Cell(19,11,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(272);
		$this->SetX(168);
		$this->Cell(19,11,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(283);
		$this->SetX(168);
		$this->Cell(19,11,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(294);
		$this->SetX(168);
		$this->Cell(19,10,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(304);
		$this->SetX(168);
		$this->Cell(19,10,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(314);
		$this->SetX(168);
		$this->Cell(19,10,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(324);
		$this->SetX(168);
		$this->Cell(19,10,'',1,0,'L',$f);
		
		// SCHOLARSHIP/ACADEMIC HONORS RECEIVED
		$this->labelF();
		$this->SetY(261);
		$this->SetX(187);
		$this->Cell(26,11,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(272);
		$this->SetX(187);
		$this->Cell(26,11,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(283);
		$this->SetX(187);
		$this->Cell(26,11,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(294);
		$this->SetX(187);
		$this->Cell(26,10,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(304);
		$this->SetX(187);
		$this->Cell(26,10,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(314);
		$this->SetX(187);
		$this->Cell(26,10,'',1,0,'L',$f);
		
		$this->labelF();
		$this->SetY(324);
		$this->SetX(187);
		$this->Cell(26,10,'',1,0,'L',$f);
		
		$this->SetY(317);
		$this->SetX(3);
		$this->labelF();
		$this->SetLineWidth(1);
		$this->SetFont('ARIALNI','',7.5);
		$this->SetTextColor(237,28,36);
		$this->Cell(210,4.5,'(Continue on separate sheet if necessary)',1,0,'C',true);
		
		$this->SetY(321.5);
		$this->SetX(3);
		$this->labelF();
		$this->SetLineWidth(1);
		$this->SetFont('ARIALN','',7.5);
		$this->Cell(210,4.5,'Page '.$this->PageNo().' of {nb}',1,0,'R');
	}
	
	function pageTwo() 
	{
		
	}
	function title() 
	{
		$this->SetLineWidth(1);
		$this->SetFillColor(151,151,151);
		$this->SetTextColor(255);
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
	//MakeFont('font/ARIALNI.ttf','cp1252');
	$pdf = new PDF('P','mm',array(216,360));
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('ARIALN','',9);
	$pdf->PageOne();
	$pdf->AddPage();
	$pdf->SetFont('ARIALN','',9);
	$pdf->PageTwo();
	$pdf->Output();
?>