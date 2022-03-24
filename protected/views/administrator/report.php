<?php
require('fpdf.php');
session_start();



class PDF extends FPDF
{
	var $widths;
	var $aligns;

	function Header()
	{
		$content = isset($_GET['content']) ? $_GET['content'] : 'FAS';
		$smonth = $emonth = date('n');

		if(isset($_SESSION['fmonth']) && isset($_SESSION['tmonth'])) {
			$smonth = $_SESSION['fmonth'];
			$emonth = $_SESSION['tmonth'];
		} else {
			include("config.php");
			$sqlCoverage = "select * from tbl_reportcoverage where report = '$content'";
			$resultCoverage=mysqli_query($conn,$sqlCoverage);
			$rowCoverage = mysqli_fetch_array($resultCoverage);
			$smonth = $rowCoverage['fromMonth'];
			$emonth = $rowCoverage['toMonth'];
		}
		
		$FromMonthName = date('F', mktime(0, 0, 0, $smonth, 10));
		$ToMonthName = date('F', mktime(0, 0, 0, $emonth, 10));
		$this->Image('PUP Taguig.png',75,10,25);
		$this->AddFont('segoeui','','segoeui.php');
		$this->AddFont('segoeuib','','segoeuib.php');
		$this->AddFont('segoeuil','','segoeuil.php');
		$this->AddFont('segoeuiz','','segoeuiz.php');
		$this->AddFont('segoeuii','','segoeuii.php');
		$this->AddFont('seguisb','','seguisb.php');
		$this->SetFont('segoeui','',11);
		$this->SetTextColor(0);
		$this->Cell(0,10,'Republic of the Philippines',0,0,'C');
		$this->Ln(5);
		$this->SetFont('segoeuib','',12);
		$this->Cell(0,10,'POLYTECHNIC UNIVERSITY OF THE PHILIPPINES',0,0,'C');
		$this->Ln(5);
		$this->SetFont('segoeui','',10);
		$this->Cell(0,10,'TAGUIG  BRANCH',0,0,'C');
		$this->Ln(5);
		$this->SetFont('segoeuii','',10);
		$this->Cell(0,10,'Gen. Santos Ave. Upper Bicutan, Taguig City',0,0,'C');
		$this->Ln(15);
		
		switch($content) {
			case "FCI": {
				$this->SetFont('seguisb','',10);
				$this->SetFillColor(210,210,210);
				$this->Cell(0,8,strtoupper('Faculty and Staff Contact Information'),1,0,'C', true);
				$this->SetFont('seguisb','',11);
				$this->Ln();
				$header = array('LAST NAME', 'FIRST NAME', 'MIDDLE NAME', 'CONTACT NO.', 'E-MAIL ADDRESS');
				$w = array(45, 45, 40, 100, 80);
				$this->SetFillColor(142,26,26);
				$this->SetTextColor(255,255,255);
				for($i=0;$i<count($header);$i++)
					$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
				break;
			}
			case "FAS": {
				$this->SetFont('seguisb','',10);
				$this->SetFillColor(210,210,210);
				include("config.php");
				$sqlC="SELECT * FROM tbl_reportcoverage WHERE report='FAS'";
				$resultC=mysqli_query($conn,$sqlC);
				$rowC = mysqli_fetch_array($resultC);
				$cfrom = $rowC['yfrom'];
				$cto = $rowC['yto'];
				$this->Cell(0,8,strtoupper('Faculty and Staff Seminars Attended ('.$FromMonthName.' ') . $cfrom . ' - '. strtoupper($ToMonthName).' ' . $cto . ')',1,0,'C', true);
				$this->SetFont('seguisb','',11);
				$this->Ln();
				break;
			}
			case "FASQ": {
				$this->SetFont('seguisb','',10);
				$this->SetFillColor(210,210,210);
				include("config.php");
				$sqlC="SELECT * FROM tbl_reportcoverage WHERE report='FAS'";
				$resultC=mysqli_query($conn,$sqlC);
				$rowC = mysqli_fetch_array($resultC);
				$quarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
				$yearCov = isset($_POST['yearCov']) ? $_POST['yearCov'] : date("Y");
				$cfrom = $cto = $yearCov;

				if($quarter == 1) {
					$FromMonthName = 'January';
					$ToMonthName = 'March';
				} else if($quarter == 2) {
					$FromMonthName = 'April';
					$ToMonthName = 'June';
				} else if($quarter == 3) {
					$FromMonthName = 'July';
					$ToMonthName = 'September';
				} else if($quarter == 4) {
					$FromMonthName = 'October';
					$ToMonthName = 'December';
				} 

				$this->Cell(0,8,strtoupper('Attendance in Relevant/Job-related Trainings, Seminars, Conferences, Workshops, Conventions, etc ('. $FromMonthName . ' - '. $ToMonthName . ' ' . $cto . ')'),1,0,'C', true);
				$this->SetFont('seguisb','',11);
				$this->Ln();
				if($this->PageNo() > 1) {
					$this->SetLineWidth(0.5);
			        $this->Line(10, 55.5, 320, 55.5);
				} 
				break;
			}
			case "FEGS": {
				$this->SetFont('seguisb','',10);
				$this->SetFillColor(210,210,210);
				$this->Cell(0,8,strtoupper('Faculty and Staff Enrolled in Graduate Studies'),1,0,'C', true);
				$this->SetFont('seguisb','',11);
				$this->Ln();
				break;
			}
			case "FOMPO": {
				$this->SetFont('seguisb','',10);
				$this->SetFillColor(210,210,210);
				$this->Cell(0,8,strtoupper('Faculty Officership/Membership in Professional Organization'),1,0,'C', true);
				$this->SetFont('seguisb','',11);
				$this->Ln();
				break;
			}
			case "FS": {
				$this->SetFont('seguisb','',10);
				$this->SetFillColor(210,210,210);
				$this->Cell(0,8,strtoupper('Faculty Scholarships'),1,0,'C', true);
				$this->SetFont('seguisb','',11);
				$this->Ln();
				break;
			}
			case "FRP": {
				$this->SetFont('seguisb','',10);
				$this->SetFillColor(210,210,210);
				$this->Cell(0,8,strtoupper('Faculty Refereed Publication'),1,0,'C', true);
				$this->SetFont('seguisb','',11);
				$this->Ln();
				break;
			}
			case "FTS": {
				$this->SetFont('seguisb','',10);
				$this->SetFillColor(210,210,210);
				$this->Cell(0,8,strtoupper('Faculty with Temporary Substitution'),1,0,'C', true);
				$this->SetFont('seguisb','',11);
				$this->Ln();
				break;
			}
			case "GEP": {
				$this->SetFont('seguisb','',10);
				$this->SetFillColor(210,210,210);
				$this->Cell(0,8,strtoupper('Government Examination Passed'),1,0,'C', true);
				$this->SetFont('seguisb','',11);
				$this->Ln();
				break;
			}
			case "CSE": {
				$this->SetFont('seguisb','',10);
				$this->SetFillColor(210,210,210);
				$this->Cell(0,8,strtoupper('Community Service Extension'),1,0,'C', true);
				$this->SetFont('seguisb','',11);
				$this->Ln();
				break;
			}
			case "FWE": {
				$this->SetFont('seguisb','',10);
				$this->SetFillColor(210,210,210);
				$this->Cell(0,8,strtoupper('Work Experience'),1,0,'C', true);
				$this->SetFont('seguisb','',11);
				$this->Ln();
				break;
			}
			default : {
			
			}
		}
		$this->Ln();
	}
	function Footer()
	{
		date_default_timezone_set('Asia/Hong_Kong');
		$today = date("l, F j, Y");
		$ctime = date('h:i:s a', time());
		$this->SetY(-15);
		$this->SetFont('Arial','',9);
		$this->Cell(0,10,$today . ' | ' . $ctime,0,0,'L');
		$this->Cell(0,10,'Page '.$this->PageNo().' of {nb}' . $this->AliasNbPages(),0,0,'R');
		
	}

	function table($content)
	{
		switch($content) {
			case "FCI": {
				$w = array(45, 45, 40, 100, 80);
				$fill = false;
				include("config.php");
				$sql="SELECT * FROM tbl_personalinformation ORDER BY surname";
				$result=mysqli_query($conn, $sql);
				$count=mysqli_num_rows($result);
				$this->SetFont('segoeui','',10);
				$this->SetFillColor(245,245,245);
				$this->SetTextColor(0);

				while($row = mysqli_fetch_array($result)) { 
					$this->SetLineWidth(0.10);
					$this->Cell($w[0],5, ' ' . strtoupper($row['surname']),1,0,'L',$fill);
					$this->Cell($w[1],5, ' ' . strtoupper($row['firstname']),1,0,'L',$fill);
					$this->Cell($w[2],5, ' ' . strtoupper($row['middlename']),1,0,'L',$fill);
					if($row['telNo']=="" or $row['ptelNo']=="" or $row['cellNo']=="") {
						$this->Cell($w[3],5, '',1,0,'L',$fill);
					} else {
						$this->Cell($w[3],5, ' ' . $row['telNo'] . ' / '.$row['ptelNo'].' / '.$row['cellNo'],1,0,'L',$fill);
					}
					$this->Cell($w[4],5, ' ' . $row['email'],1,0,'L',$fill);
					
					$this->Ln();
					$fill = !$fill;	

				}
				$this->SetFont('segoeuiz','',10);
				$this->SetTextColor(100,100,100);
				$this->SetFillColor(210,210,210);
				$this->Cell(0,8,strtoupper('Total No. of Faculty Members & Staff: ') . $count,1,0,'C', true);
				$this->Ln();
				break;
			}
			case "FAS": {
			
				$w = array(35, 35, 30, 100, 20, 20, 10, 60);
				$CEMPID = '';
				$fill = false;
				include("config.php");
				$sqlC="SELECT * FROM tbl_reportcoverage WHERE report ='FAS'";
				$resultC=mysqli_query($conn,$sqlC);
				$rowC = mysqli_fetch_array($resultC);
				$cfrom = $rowC['yfrom'];
				$cto = $rowC['yto'];
				$mfrom = $rowC['fromMonth'];
				$mto = $rowC['toMonth'];
				$sql = "SELECT tbl1.EmpID, tbl1.title, tbl1.fromm, tbl1.fromd, tbl1.fromy, tbl1.tom, tbl1.tod, tbl1.toy, tbl1.hours, tbl1.conby, 
							tbl2.surname, tbl2.firstname, tbl2.middlename, tbl2.nameExtension, tbl2.EmpID 
						FROM tbl_tprograms AS tbl1 INNER JOIN tbl_personalinformation AS tbl2 
						ON tbl1.EmpID = tbl2.EmpID 
						WHERE tbl1.EmpID = tbl2.EmpID AND tbl1.fromy >= '$cfrom' AND tbl1.toy <= '$cto' AND tbl1.EmpID <> '' AND tbl2.EmpID <> ''
						ORDER BY tbl2.surname, FIELD(tbl1.fromm, 'January','February','March', 'April', 'May', 'June', 'July', 'September', 'October', 'November','December') ASC, 
							FIELD(tbl1.fromd, '1','2','3', '4', '5', '6', '7', '8', '9', '10','11', '12','13', '14', '15', '16', '17', '18', '19', '20','21', '22','23', '24', '25', '26', '27', '28', '29', '30','31') ASC, tbl1.fromy";
				$result=mysqli_query($conn, $sql);
				$count=mysqli_num_rows($result);
				
				while($row = mysqli_fetch_array($result)) {
					$yfrom = $row['fromy'];
					$ytoy = $row['toy'];
					$fullname = $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['surname'] . ' ' . $row['nameExtension'];
					if($CEMPID=='' and ((getMonth($row['fromm']) >= $mfrom and $yfrom >= $cfrom) or (getMonth($row['fromm']) < $mfrom and $yfrom > $cfrom))){
						if((getMonth($row['tom']) <= $mto and $ytoy <= $cto) or (getMonth($row['tom']) > $mto and $ytoy < $cto)){
							$CEMPID = $row['EmpID'];
							$this->SetFont('seguisb','',10);
							$this->SetFillColor(225,225,225);
							$this->SetTextColor(0);
							$this->Cell(100,6, $row['EmpID'] . ' - ' . strtoupper($row['surname']) . ', ' . strtoupper($row['firstname']) . ' ' . strtoupper($row['middlename']),1,0,'L',true);
							$this->Ln();
							$header = array('TITLE', 'FROM', 'TO', 'HRS', 'CONDUCTED BY');
							$w = array(150, 20, 20, 15, 105);
							$this->SetFillColor(142,26,26);
							$this->SetTextColor(255,255,255);
							for($i=0;$i<count($header);$i++)
								$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
							$this->Ln();
							
							$this->SetFont('segoeui','',9);
							$this->SetFillColor(245,245,245);
							$this->SetTextColor(0);
							$this->SetLineWidth(0.10);
							$fromi = "00";
							if($row['fromm']=="January") {
								$fromi = "01";
							} else if($row['fromm']=="February") {
								$fromi = "02";
							} else if($row['fromm']=="March") {
								$fromi = "03";
							} else if($row['fromm']=="April") {
								$fromi = "04";
							} else if($row['fromm']=="May") {
								$fromi = "05";
							} else if($row['fromm']=="June") {
								$fromi = "06";
							} else if($row['fromm']=="July") {
								$fromi = "07";
							} else if($row['fromm']=="August") {
								$fromi = "08";
							} else if($row['fromm']=="September") {
								$fromi = "09";
							} else if($row['fromm']=="October") {
								$fromi = "10";
							} else if($row['fromm']=="November") {
								$fromi = "11";
							} else if($row['fromm']=="December") {
								$fromi = "12";
							}
							
							$toi = "00";
							if($row['tom']=="January") {
								$toi = "01";
							} else if($row['tom']=="February") {
								$toi = "02";
							} else if($row['tom']=="March") {
								$toi = "03";
							} else if($row['tom']=="April") {
								$toi = "04";
							} else if($row['tom']=="May") {
								$toi = "05";
							} else if($row['tom']=="June") {
								$toi = "06";
							} else if($row['tom']=="July") {
								$toi = "07";
							} else if($row['tom']=="August") {
								$toi = "08";
							} else if($row['tom']=="September") {
								$toi = "09";
							} else if($row['tom']=="October") {
								$toi = "10";
							} else if($row['tom']=="November") {
								$toi = "11";
							} else if($row['tom']=="December") {
								$toi = "12";
							}
							$this->Cell($w[0],5,strtoupper($row['title']),1,0,'L',$fill);
							$this->Cell($w[1],5, getMonth($row['fromm']) . '/' . $row['fromd'] . '/' . $row['fromy'],1,0,'L',$fill);
							$this->Cell($w[2],5, getMonth($row['tom']) . '/' . $row['tod'] . '/' . $row['toy'],1,0,'L',$fill);
							$this->Cell($w[3],5,strtoupper($row['hours']),1,0,'C',$fill);
							if(strlen(strtoupper($row['conby']))>=55){
								$this->Cell($w[4],5,substr(strtoupper($row['conby']) . '...', 0, 55),1,0,'L',$fill);
							} else {
								$this->Cell($w[4],5,strtoupper($row['conby']),1,0,'L',$fill);
								$this->Ln();
								$fill = !$fill;	
							}
							$CEMPID = $row['EmpID'];
						}
					} else {
						if($CEMPID==$row['EmpID'] and ((getMonth($row['fromm']) >= $mfrom and $yfrom >= $cfrom) or (getMonth($row['fromm']) < $mfrom and $yfrom > $cfrom))){
							if((getMonth($row['tom']) <= $mto and $ytoy <= $cto) or (getMonth($row['tom']) > $mto and $ytoy < $cto)){
								$this->SetFont('segoeui','',9);
								$this->SetFillColor(245,245,245);
								$this->SetTextColor(0);
								$this->SetLineWidth(0.10);
								
								$this->Cell($w[0],5,strtoupper($row['title']),1,0,'L',$fill);
								$this->Cell($w[1],5, getMonth($row['fromm']) . '/' . $row['fromd'] . '/' . $row['fromy'],1,0,'L',$fill);
								$this->Cell($w[2],5, getMonth($row['tom']) . '/' . $row['tod'] . '/' . $row['toy'],1,0,'L',$fill);
								$this->Cell($w[3],5,strtoupper($row['hours']),1,0,'C',$fill);
								if(strlen(strtoupper($row['conby']))>=55){
									$this->Cell($w[4],5,substr(strtoupper($row['conby']) . '...', 0, 55),1,0,'L',$fill);
									$this->Ln();
								} else {
									$this->Cell($w[4],5,strtoupper($row['conby']),1,0,'L',$fill);
									$this->Ln();
									$fill = !$fill;	
								}
							}
						} else {
							 if((getMonth($row['fromm']) >= $mfrom and $yfrom >= $cfrom) or (getMonth($row['fromm']) < $mfrom and $yfrom > $cfrom)){
								if((getMonth($row['tom']) <= $mto and $ytoy <= $cto) or (getMonth($row['tom']) > $mto and $ytoy < $cto)){
									$this->Ln();
									$this->SetFont('seguisb','',10);
									$this->SetFillColor(225,225,225);
									$this->SetTextColor(0);
									$this->Cell(100,6, $row['EmpID'] . ' - ' . strtoupper($row['surname']) . ', ' . strtoupper($row['firstname']) . ' ' . strtoupper($row['middlename']),1,0,'L',true);
									$this->Ln();
									$header = array('TITLE', 'FROM', 'TO', 'HRS', 'CONDUCTED BY');
									$w = array(150, 20, 20, 15, 105);
									$this->SetFillColor(142,26,26);
									$this->SetTextColor(255,255,255);
									for($i=0;$i<count($header);$i++)
										$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
									$this->Ln();
									
									$this->SetFont('segoeui','',9);
									$this->SetFillColor(245,245,245);
									$this->SetTextColor(0);
									$this->SetLineWidth(0.10);
									
									$this->Cell($w[0],5,strtoupper($row['title']),1,0,'L',$fill);
									$this->Cell($w[1],5, getMonth($row['fromm']) . '/' . $row['fromd'] . '/' . $row['fromy'],1,0,'L',$fill);
									$this->Cell($w[2],5, getMonth($row['tom']) . '/' . $row['tod'] . '/' . $row['toy'],1,0,'L',$fill);
									$this->Cell($w[3],5,strtoupper($row['hours']),1,0,'C',$fill);
									if(strlen(strtoupper($row['conby']))>=55){
										$this->Cell($w[4],5,substr(strtoupper($row['conby']) . '...', 0, 55),1,0,'L',$fill);
									} else {
										$this->Cell($w[4],5,strtoupper($row['conby']),1,0,'L',$fill);
										$this->Ln();
										$fill = !$fill;	
									}
									$CEMPID = $row['EmpID'];
								}
							}
						}
					}
				}
				$this->Cell(array_sum($w),0,'','T');
				break;
			}
			case "FASQ": {

				$this->SetWidths(array(45, 50, 20, 20, 60, 10, 10, 10, 10, 40, 35));
				$this->SetAligns(array('C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C'));

				$CEMPID = '';
				$fill = false;
				$ctr = 0;
				include("config.php");
				$sqlC="SELECT * FROM tbl_reportcoverage WHERE report ='FAS'";
				$resultC=mysqli_query($conn,$sqlC);
				$rowC = mysqli_fetch_array($resultC);
				$quarter = isset($_POST['quarter']) ? $_POST['quarter'] : 1;
				$yearCov = isset($_POST['yearCov']) ? $_POST['yearCov'] : date("Y");
				$cfrom = $cto = $yearCov;

				if($quarter == 1) {
					$mfrom = 1;
					$mto = 3;
				} else if($quarter == 2) {
					$mfrom = 4;
					$mto = 6;
				} else if($quarter == 3) {
					$mfrom = 7;
					$mto = 9;
				} else if($quarter == 4) {
					$mfrom = 10;
					$mto = 12;
				} else {
					$mfrom = $rowC['fromMonth'];
					$mto = $rowC['toMonth'];
				}

				$sql = "SELECT tbl1.EmpID, tbl1.title, tbl1.type, tbl1.fromm, tbl1.fromd, tbl1.fromy, tbl1.tom, tbl1.tod, tbl1.toy, tbl1.hours, tbl1.conby, tbl1.level, tbl1.venue,
							tbl2.surname, tbl2.firstname, tbl2.middlename, tbl2.nameExtension, tbl2.EmpID 
						FROM tbl_tprograms AS tbl1 INNER JOIN tbl_personalinformation AS tbl2 
						ON tbl1.EmpID = tbl2.EmpID 
						WHERE tbl1.EmpID = tbl2.EmpID AND tbl1.fromy >= '$cfrom' AND tbl1.toy <= '$cto' AND tbl1.EmpID <> '' AND tbl2.EmpID <> ''
						ORDER BY tbl2.surname, FIELD(tbl1.fromm, 'January','February','March', 'April', 'May', 'June', 'July', 'September', 'October', 'November','December') ASC, 
							FIELD(tbl1.fromd, '1','2','3', '4', '5', '6', '7', '8', '9', '10','11', '12','13', '14', '15', '16', '17', '18', '19', '20','21', '22','23', '24', '25', '26', '27', '28', '29', '30','31') ASC, tbl1.fromy";
				$result=mysqli_query($conn, $sql);
				if($result) {
					$count=mysqli_num_rows($result);

					$this->SetFont('seguisb', '', 10);

					$header = array('Name of Faculty Member', 'Title/Theme/Topic', 'Type', 'Sponsor of Training, Seminar/s, etc.', 'Level', 'Venue', 'Inclusive Date');
					$w = array(45, 50, 40, 60, 40, 40, 35);
					$h = array(14, 14, 7, 14, 7, 14, 14);
					$this->SetFillColor(255,255,255);
					$this->SetTextColor(0);
					for($i=0;$i<count($header);$i++)
						$this->Cell($w[$i],$h[$i],$header[$i],1,0,'C',true);
					$this->Ln();

					$this->SetFont('segoeui', '', 9);

					$fill = false;
					$this->Cell($w[0], 7, '', 0, 0, 'C', $fill);
					$this->Cell($w[1], 7, '', 0, 0, 'C', $fill);

					$this->Cell($w[2]/2, -7, 'Training', 1, 0, 'C', $fill);
					$this->Cell($w[2]/2, -7, 'Seminar/etc.', 1, 0, 'C', $fill);

					$this->Cell($w[3], 5, '', 0, 0, 'C', $fill);

					$this->Cell($w[4]/4, -7, 'INTL', 1, 0, 'C', $fill);
					$this->Cell($w[4]/4, -7, 'NTL', 1, 0, 'C', $fill);
					$this->Cell($w[4]/4, -7, 'RGNL', 1, 0, 'C', $fill);
					$this->Cell($w[4]/4, -7, 'LCL', 1, 0, 'C', $fill);

					$this->Cell($w[5], 7, '', 0, 0, 'C', $fill);
					$this->Cell($w[6], 7, '', 0, 0, 'C', $fill);

					$this->Ln(0.1);

					while($row = mysqli_fetch_array($result)) {
						$type = array('', '');
						$level = array('', '', '', '');

						if($row['type'] == 'Training') {
							$type = array('/', '');
						} else {
							$type = array('', '/');
						}

						if($row['level'] == 'International') {
							$level = array('/', '', '', '');
						} else if($row['level'] == 'National') {
							$level = array('', '/', '', '');
						} else if($row['level'] == 'Regional') {
							$level = array('', '', '/', '');
						} else if($row['level'] == 'Local') {
							$level = array('', '', '', '/');
						}

						$yfrom = $row['fromy'];
						$ytoy = $row['toy'];

						$inclusive_date = '';

						$datefrom = $row['fromm'] . ' ' . $row['fromd'] . ', ' . $row['fromy'];
						$dateto = $row['tom'] . ' ' . $row['tod'] . ', ' . $row['toy'];

						if($datefrom == $dateto) {
							$inclusive_date = $datefrom;
						} else if($row['fromm'] == $row['tom'] && $row['fromy'] == $row['toy']) {
							$inclusive_date = $row['fromm'] . ' ' . $row['fromd'] . '-' . $row['tod'] . ', ' . $row['fromy'];
						} else {
							$inclusive_date = $datefrom . ' - ' . $dateto;
						}

						$name_extension = !empty($row['nameExtension']) ? ucfirst($row['nameExtension']) : '';
						$middle_initial = !empty($row['middlename']) ? substr(ucfirst($row['middlename']), 0, 1) . '.' : '';
						$name_of_faculty = ucfirst($row['surname']) . $name_extension . ', ' . ucfirst($row['firstname']) . ' ' . $middle_initial;

						if($CEMPID=='' and ((getMonth($row['fromm']) >= $mfrom and $yfrom >= $cfrom) or (getMonth($row['fromm']) < $mfrom and $yfrom > $cfrom))){
							if((getMonth($row['tom']) <= $mto and $ytoy <= $cto) or (getMonth($row['tom']) > $mto and $ytoy < $cto)){
								$CEMPID = $row['EmpID'];
								$fromi = "00";
								if($row['fromm']=="January") {
									$fromi = "01";
								} else if($row['fromm']=="February") {
									$fromi = "02";
								} else if($row['fromm']=="March") {
									$fromi = "03";
								} else if($row['fromm']=="April") {
									$fromi = "04";
								} else if($row['fromm']=="May") {
									$fromi = "05";
								} else if($row['fromm']=="June") {
									$fromi = "06";
								} else if($row['fromm']=="July") {
									$fromi = "07";
								} else if($row['fromm']=="August") {
									$fromi = "08";
								} else if($row['fromm']=="September") {
									$fromi = "09";
								} else if($row['fromm']=="October") {
									$fromi = "10";
								} else if($row['fromm']=="November") {
									$fromi = "11";
								} else if($row['fromm']=="December") {
									$fromi = "12";
								}
								
								$toi = "00";
								if($row['tom']=="January") {
									$toi = "01";
								} else if($row['tom']=="February") {
									$toi = "02";
								} else if($row['tom']=="March") {
									$toi = "03";
								} else if($row['tom']=="April") {
									$toi = "04";
								} else if($row['tom']=="May") {
									$toi = "05";
								} else if($row['tom']=="June") {
									$toi = "06";
								} else if($row['tom']=="July") {
									$toi = "07";
								} else if($row['tom']=="August") {
									$toi = "08";
								} else if($row['tom']=="September") {
									$toi = "09";
								} else if($row['tom']=="October") {
									$toi = "10";
								} else if($row['tom']=="November") {
									$toi = "11";
								} else if($row['tom']=="December") {
									$toi = "12";
								}
								$this->Row(array($name_of_faculty, trim($row['title']), $type[0], $type[1], $row['conby'], $level[0], $level[1], $level[2], $level[3], $row['venue'], $inclusive_date), ++$ctr == 1 ? false : true);

								$CEMPID = $row['EmpID'];
							}
						} else {
							if($CEMPID==$row['EmpID'] and ((getMonth($row['fromm']) >= $mfrom and $yfrom >= $cfrom) or (getMonth($row['fromm']) < $mfrom and $yfrom > $cfrom))){
								if((getMonth($row['tom']) <= $mto and $ytoy <= $cto) or (getMonth($row['tom']) > $mto and $ytoy < $cto)){
									$this->Row(array('', trim($row['title']), $type[0], $type[1], $row['conby'], $level[0], $level[1], $level[2], $level[3], $row['venue'], $inclusive_date), true);
								}
							} else {
								 if((getMonth($row['fromm']) >= $mfrom and $yfrom >= $cfrom) or (getMonth($row['fromm']) < $mfrom and $yfrom > $cfrom)){
									if((getMonth($row['tom']) <= $mto and $ytoy <= $cto) or (getMonth($row['tom']) > $mto and $ytoy < $cto)){
										$this->Row(array($name_of_faculty, trim($row['title']), $type[0], $type[1], $row['conby'], $level[0], $level[1], $level[2], $level[3], $row['venue'], $inclusive_date), false);
										$CEMPID = $row['EmpID'];
									}
								}
							}
						}
					}
				    $this->Cell(array_sum($w),0,'','T');
			    }
				break;
			}
			case "FEGS": {
				$header = array('SCHOOL/COLLEGE/UNIVERSITY', 'YR. GRAD.', 'DEGREE COURSE', 'UNITS', 'FROM', 'TO', 'HONORS RECV.');
				$w = array(110, 20, 90, 12, 19, 19, 40);
				$CEMPID = '';
				$fill = false;
				include("config.php");
				$sql="SELECT * FROM tbl_educationalbackground WHERE level='Doctorate' or level='Masteral' ORDER BY EmpID";
				$result=mysqli_query($conn, $sql);
				$count=mysqli_num_rows($result);
				
				
				while($row = mysqli_fetch_array($result)) {
					if($CEMPID=='') {
					
						$CEMPID = $row['EmpID'];
						$this->SetFont('seguisb','',10);
						$this->SetFillColor(225,225,225);
						$this->SetTextColor(0);
						$this->Cell(100,6, $row['EmpID'] . ' - ' . strtoupper(getLName($row['EmpID'])) . ', ' . strtoupper(getFName($row['EmpID'])) . ' ' . strtoupper(getMName($row['EmpID'])),1,0,'L',true);
						$this->Ln();
						$header = array('SCHOOL/COLLEGE/UNIVERSITY', 'YR. GRAD.', 'DEGREE COURSE', 'UNITS', 'FROM', 'TO', 'HONORS RECV.');
						$this->SetFillColor(142,26,26);
						$this->SetTextColor(255,255,255);
						for($i=0;$i<count($header);$i++)
							$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
						$this->Ln();
						
						$this->SetFont('segoeui','',9);
							$this->SetFillColor(245,245,245);
							$this->SetTextColor(0);
							$this->SetLineWidth(0.10);
							$this->Cell($w[0],5,strtoupper($row['schoolName']),1,0,'L',$fill);
							$this->Cell($w[1],5,strtoupper($row['yearGraduated']),1,0,'C',$fill);
							$this->Cell($w[2],5,strtoupper($row['degreeCourse']),1,0,'L',$fill);
							$this->Cell($w[3],5,substr(strtoupper($row['highestLevel']),0,3),1,0,'C',$fill);
							$this->Cell($w[4],5,strtoupper($row['incDateFrom']),1,0,'C',$fill);
							$this->Cell($w[5],5,strtoupper($row['incDateTo']),1,0,'C',$fill);
							$this->Cell($w[6],5,strtoupper($row['honorsReceived']),1,0,'C',$fill);
							$this->Ln();
							$CEMPID = $row['EmpID'];
					} else {
						if($CEMPID==$row['EmpID']) {
							$this->SetFont('segoeui','',9);
							$this->SetFillColor(245,245,245);
							$this->SetTextColor(0);
							$this->SetLineWidth(0.10);
							$this->Cell($w[0],5,strtoupper($row['schoolName']),1,0,'L',$fill);
							$this->Cell($w[1],5,strtoupper($row['yearGraduated']),1,0,'C',$fill);
							$this->Cell($w[2],5,strtoupper($row['degreeCourse']),1,0,'L',$fill);
							$this->Cell($w[3],5,substr(strtoupper($row['highestLevel']),0,3),1,0,'C',$fill);
							$this->Cell($w[4],5,strtoupper($row['incDateFrom']),1,0,'C',$fill);
							$this->Cell($w[5],5,strtoupper($row['incDateTo']),1,0,'C',$fill);
							$this->Cell($w[6],5,strtoupper($row['honorsReceived']),1,0,'C',$fill);
							
							$this->Ln();

						} else {
							$this->Ln();
							
							$this->SetFont('seguisb','',10);
							$this->SetFillColor(225,225,225);
							$this->SetTextColor(0);
							$this->Cell(100,6, $row['EmpID'] . ' - ' . strtoupper(getLName($row['EmpID'])) . ', ' . strtoupper(getFName($row['EmpID'])) . ' ' . strtoupper(getMName($row['EmpID'])),1,0,'L',true);
							$this->Ln();
							$header = array('SCHOOL/COLLEGE/UNIVERSITY', 'YR. GRAD.', 'DEGREE COURSE', 'UNITS', 'FROM', 'TO', 'HONORS RECV.');
							$this->SetFillColor(142,26,26);
							$this->SetTextColor(255,255,255);
							for($i=0;$i<count($header);$i++)
								$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
							$this->Ln();
							
							$this->SetFont('segoeui','',9);
							$this->SetFillColor(245,245,245);
							$this->SetTextColor(0);
							$this->SetLineWidth(0.10);
							
							$this->Cell($w[0],5,strtoupper($row['schoolName']),1,0,'L',$fill);
							$this->Cell($w[1],5,strtoupper($row['yearGraduated']),1,0,'C',$fill);
							$this->Cell($w[2],5,strtoupper($row['degreeCourse']),1,0,'L',$fill);
							$this->Cell($w[3],5,substr(strtoupper($row['highestLevel']),0,3),1,0,'C',$fill);
							$this->Cell($w[4],5,strtoupper($row['incDateFrom']),1,0,'C',$fill);
							$this->Cell($w[5],5,strtoupper($row['incDateTo']),1,0,'C',$fill);
							$this->Cell($w[6],5,strtoupper($row['honorsReceived']),1,0,'C',$fill);
							$this->Ln();
							$CEMPID = $row['EmpID'];
						}
					}
				}
				$this->Cell(array_sum($w),0,'','T');
				break;
			}
			case "FOMPO": {
				$w = array(180, 40, 40, 50);
				$CEMPID = '';
				$fill = false;
				include("config.php");
				$sql="SELECT * FROM tbl_miao ORDER BY EmpID";
				$result=mysqli_query($conn, $sql);
				$count=mysqli_num_rows($result);
				
				
				while($row = mysqli_fetch_array($result)) {
					if($CEMPID=='') {
					
						$CEMPID = $row['EmpID'];
						$this->SetFont('seguisb','',10);
						$this->SetFillColor(225,225,225);
						$this->SetTextColor(0);
						$this->Cell(100,6, $row['EmpID'] . ' - ' . strtoupper(getLName($row['EmpID'])) . ', ' . strtoupper(getFName($row['EmpID'])) . ' ' . strtoupper(getMName($row['EmpID'])),1,0,'L',true);
						$this->Ln();
						$header = array('ORGANIZATION', 'POSITION', 'LEVEL', 'DATE');
						$this->SetFillColor(142,26,26);
						$this->SetTextColor(255,255,255);
						for($i=0;$i<count($header);$i++)
							$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
						$this->Ln();
						
						$this->SetFont('segoeui','',9);
							$this->SetFillColor(245,245,245);
							$this->SetTextColor(0);
							$this->SetLineWidth(0.10);
							
							$this->Cell($w[0],5,strtoupper($row['miao']),1,0,'L',$fill);
							$this->Cell($w[1],5,strtoupper($row['EmpID']),1,0,'L',$fill);
							$this->Cell($w[2],5,strtoupper($row['EmpID']),1,0,'L',$fill);
							$this->Cell($w[3],5,strtoupper($row['EmpID']),1,0,'C',$fill);
							$this->Ln();
							$CEMPID = $row['EmpID'];
					} else {
						if($CEMPID==$row['EmpID']) {
							$this->SetFont('segoeui','',9);
							$this->SetFillColor(245,245,245);
							$this->SetTextColor(0);
							$this->SetLineWidth(0.10);
							
							$this->Cell($w[0],5,strtoupper($row['miao']),1,0,'L',$fill);
							$this->Cell($w[1],5,strtoupper($row['EmpID']),1,0,'L',$fill);
							$this->Cell($w[2],5,strtoupper($row['EmpID']),1,0,'L',$fill);
							$this->Cell($w[3],5,strtoupper($row['EmpID']),1,0,'C',$fill);
							$this->Ln();

						} else {
							$this->Ln();
							
							$this->SetFont('seguisb','',10);
							$this->SetFillColor(225,225,225);
							$this->SetTextColor(0);
							$this->Cell(100,6, $row['EmpID'] . ' - ' . strtoupper(getLName($row['EmpID'])) . ', ' . strtoupper(getFName($row['EmpID'])) . ' ' . strtoupper(getMName($row['EmpID'])),1,0,'L',true);
							$this->Ln();
							$this->SetFillColor(142,26,26);
							$this->SetTextColor(255,255,255);
							for($i=0;$i<count($header);$i++)
								$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
							$this->Ln();
							
							$this->SetFont('segoeui','',9);
							$this->SetFillColor(245,245,245);
							$this->SetTextColor(0);
							$this->SetLineWidth(0.10);
							
							$this->Cell($w[0],5,strtoupper($row['miao']),1,0,'L',$fill);
							$this->Cell($w[1],5,strtoupper($row['EmpID']),1,0,'L',$fill);
							$this->Cell($w[2],5,strtoupper($row['EmpID']),1,0,'L',$fill);
							$this->Cell($w[3],5,strtoupper($row['EmpID']),1,0,'C',$fill);
							$this->Ln();
							$CEMPID = $row['EmpID'];
						}
					}
				}
				$this->Cell(array_sum($w),0,'','T');
				break;
			}
			case "FS": {
				$header = array('GRANT\'S FULL NAME', 'SCHOOL', 'DEGREE', 'FUNDING', 'DURATION');
				$w = array(70, 100, 90, 20, 30);
				$CEMPID = '';
				$fill = false;
				include("config.php");
				$sql="SELECT * FROM tbl_scholar ORDER BY EmpID";
				$result=mysqli_query($conn, $sql);
				$count=mysqli_num_rows($result);
				
				while($row = mysqli_fetch_array($result)) {
					if($CEMPID=='') {
						$CEMPID = $row['EmpID'];
						$this->SetFont('seguisb','',10);
						$this->SetFillColor(225,225,225);
						$this->SetTextColor(0);
						$this->Cell(100,6, $row['EmpID'] . ' - ' . strtoupper(getLName($row['EmpID'])) . ', ' . strtoupper(getFName($row['EmpID'])) . ' ' . strtoupper(getMName($row['EmpID'])),1,0,'L',true);
						$this->Ln();
						
						$this->SetFillColor(142,26,26);
						$this->SetTextColor(255,255,255);
						for($i=0;$i<count($header);$i++)
							$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
						$this->Ln();
						
						$this->SetFont('segoeui','',9);
						$this->SetFillColor(245,245,245);
						$this->SetTextColor(0);
						$this->SetLineWidth(0.10);
						$this->Cell($w[0],5,strtoupper($row['Name']),1,0,'L',$fill);
						$this->Cell($w[1],5,strtoupper($row['School']),1,0,'L',$fill);
						$this->Cell($w[2],5,strtoupper($row['Degree']),1,0,'L',$fill);
						$this->Cell($w[3],5, 'PHP ' . strtoupper($row['Funding']),1,0,'C',$fill);
						$this->Cell($w[4],5,strtoupper($row['sMonth']) . '/' . strtoupper($row['sDay']) . '/' . strtoupper($row['sYear']),1,0,'C',$fill);
						$this->Ln();
						$CEMPID = $row['EmpID'];
					} else {
						if($CEMPID==$row['EmpID']) {
							$this->SetFont('segoeui','',9);
							$this->SetFillColor(245,245,245);
							$this->SetTextColor(0);
							$this->SetLineWidth(0.10);
							
							$this->Cell($w[0],5,strtoupper($row['Name']),1,0,'L',$fill);
							$this->Cell($w[1],5,strtoupper($row['School']),1,0,'L',$fill);
							$this->Cell($w[2],5,strtoupper($row['Degree']),1,0,'L',$fill);
							$this->Cell($w[3],5, 'PHP ' . strtoupper($row['Funding']),1,0,'C',$fill);
							$this->Cell($w[4],5,strtoupper($row['sMonth']) . '/' . strtoupper($row['sDay']) . '/' . strtoupper($row['sYear']),1,0,'C',$fill);
							$this->Ln();

						} else {
							$this->Ln();
							
							$this->SetFont('seguisb','',10);
							$this->SetFillColor(225,225,225);
							$this->SetTextColor(0);
							$this->Cell(100,6, $row['EmpID'] . ' - ' . strtoupper(getLName($row['EmpID'])) . ', ' . strtoupper(getFName($row['EmpID'])) . ' ' . strtoupper(getMName($row['EmpID'])),1,0,'L',true);
							$this->Ln();
							$this->SetFillColor(142,26,26);
							$this->SetTextColor(255,255,255);
							for($i=0;$i<count($header);$i++)
								$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
							$this->Ln();
							
							$this->SetFont('segoeui','',9);
							$this->SetFillColor(245,245,245);
							$this->SetTextColor(0);
							$this->SetLineWidth(0.10);
							
							$this->Cell($w[0],5,strtoupper($row['Name']),1,0,'L',$fill);
							$this->Cell($w[1],5,strtoupper($row['School']),1,0,'L',$fill);
							$this->Cell($w[2],5,strtoupper($row['Degree']),1,0,'L',$fill);
							$this->Cell($w[3],5, 'PHP ' . strtoupper($row['Funding']),1,0,'C',$fill);
							$this->Cell($w[4],5,strtoupper($row['sMonth']) . '/' . strtoupper($row['sDay']) . '/' . strtoupper($row['sYear']),1,0,'C',$fill);
							$this->Ln();
							$CEMPID = $row['EmpID'];
						}
					}
				}
				$this->Cell(array_sum($w),0,'','T');
				break;
			}
			case "FRP": {
				$header = array('TITLE', 'AUTHOR(S)', 'JOURNAL', 'EDITOR(S)', 'VOLUME', 'PUB. LEVEL');
				$w = array(75,75,35,75,20,30);
				$CEMPID = '';
				$fill = false;
				include("config.php");
				$sql="SELECT * FROM tbl_referred ORDER BY EmpID";
				$result=mysqli_query($conn, $sql);
				$count=mysqli_num_rows($result);
				
				while($row = mysqli_fetch_array($result)) {
					if($CEMPID=='') {
						$CEMPID = $row['EmpID'];
						$this->SetFont('seguisb','',10);
						$this->SetFillColor(225,225,225);
						$this->SetTextColor(0);
						$this->Cell(100,6, $row['EmpID'] . ' - ' . strtoupper(getLName($row['EmpID'])) . ', ' . strtoupper(getFName($row['EmpID'])) . ' ' . strtoupper(getMName($row['EmpID'])),1,0,'L',true);
						$this->Ln();
						
						$this->SetFillColor(142,26,26);
						$this->SetTextColor(255,255,255);
						for($i=0;$i<count($header);$i++)
							$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
						$this->Ln();
						
						$this->SetFont('segoeui','',9);
						$this->SetFillColor(245,245,245);
						$this->SetTextColor(0);
						$this->SetLineWidth(0.10);
						$this->Cell($w[0],5,strtoupper($row['Title']),1,0,'L',$fill);
						$this->Cell($w[1],5,strtoupper($row['Authors']),1,0,'L',$fill);
						$this->Cell($w[2],5,strtoupper($row['Journal']),1,0,'L',$fill);
						$this->Cell($w[3],5,strtoupper($row['Editors']),1,0,'L',$fill);
						$this->Cell($w[4],5,strtoupper($row['Volume']),1,0,'C',$fill);
						$this->Cell($w[5],5,strtoupper($row['Level']),1,0,'L',$fill);
						$this->Ln();
						$CEMPID = $row['EmpID'];
					} else {
						if($CEMPID==$row['EmpID']) {
							$this->SetFont('segoeui','',9);
							$this->SetFillColor(245,245,245);
							$this->SetTextColor(0);
							$this->SetLineWidth(0.10);
							
							$this->Cell($w[0],5,strtoupper($row['Title']),1,0,'L',$fill);
							$this->Cell($w[1],5,strtoupper($row['Authors']),1,0,'L',$fill);
							$this->Cell($w[2],5,strtoupper($row['Journal']),1,0,'L',$fill);
							$this->Cell($w[3],5,strtoupper($row['Editors']),1,0,'L',$fill);
							$this->Cell($w[4],5,strtoupper($row['Volume']),1,0,'C',$fill);
							$this->Cell($w[5],5,strtoupper($row['Level']),1,0,'L',$fill);
							$this->Ln();

						} else {
							$this->Ln();
							
							$this->SetFont('seguisb','',10);
							$this->SetFillColor(225,225,225);
							$this->SetTextColor(0);
							$this->Cell(100,6, $row['EmpID'] . ' - ' . strtoupper(getLName($row['EmpID'])) . ', ' . strtoupper(getFName($row['EmpID'])) . ' ' . strtoupper(getMName($row['EmpID'])),1,0,'L',true);
							$this->Ln();
							$this->SetFillColor(142,26,26);
							$this->SetTextColor(255,255,255);
							for($i=0;$i<count($header);$i++)
								$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
							$this->Ln();
							
							$this->SetFont('segoeui','',9);
							$this->SetFillColor(245,245,245);
							$this->SetTextColor(0);
							$this->SetLineWidth(0.10);
							
							$this->Cell($w[0],5,strtoupper($row['Title']),1,0,'L',$fill);
							$this->Cell($w[1],5,strtoupper($row['Authors']),1,0,'L',$fill);
							$this->Cell($w[2],5,strtoupper($row['Journal']),1,0,'L',$fill);
							$this->Cell($w[3],5,strtoupper($row['Editors']),1,0,'L',$fill);
							$this->Cell($w[4],5,strtoupper($row['Volume']),1,0,'C',$fill);
							$this->Cell($w[5],5,strtoupper($row['Level']),1,0,'L',$fill);
							$this->Ln();
							$CEMPID = $row['EmpID'];
						}
					}
				}
				$this->Cell(array_sum($w),0,'','T');
				break;
			}
			case "FTS": {
				$header = array('SUBJECT', 'LECTURE (HRS)', 'LAB (HRS)', 'UNITS', 'SCHOOL YEAR', 'SEMESTER');
				$w = array(155,30,30,15,40,40);
				$CEMPID = '';
				$fill = false;
				include("config.php");
				$sql="SELECT * FROM tbl_fts ORDER BY EmpID";
				$result=mysqli_query($conn, $sql);
				$count=mysqli_num_rows($result);
				
				while($row = mysqli_fetch_array($result)) {
					if($CEMPID=='') {
						$CEMPID = $row['EmpID'];
						$this->SetFont('seguisb','',10);
						$this->SetFillColor(225,225,225);
						$this->SetTextColor(0);
						$this->Cell(100,6, $row['EmpID'] . ' - ' . strtoupper(getLName($row['EmpID'])) . ', ' . strtoupper(getFName($row['EmpID'])) . ' ' . strtoupper(getMName($row['EmpID'])),1,0,'L',true);
						$this->Ln();
						
						$this->SetFillColor(142,26,26);
						$this->SetTextColor(255,255,255);
						for($i=0;$i<count($header);$i++)
							$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
						$this->Ln();
						
						$this->SetFont('segoeui','',9);
						$this->SetFillColor(245,245,245);
						$this->SetTextColor(0);
						$this->SetLineWidth(0.10);
						$this->Cell($w[0],5,strtoupper($row['subject']),1,0,'L',$fill);
						$this->Cell($w[1],5,strtoupper($row['lec']),1,0,'C',$fill);
						$this->Cell($w[2],5,strtoupper($row['lab']),1,0,'C',$fill);
						$this->Cell($w[3],5,strtoupper($row['unit']),1,0,'C',$fill);
						$this->Cell($w[4],5,strtoupper($row['sy']),1,0,'C',$fill);
						if($row['sem']==1) {
							$this->Cell($w[5],5,strtoupper($row['sem']) . 'st Semester',1,0,'C',$fill);
						} else if ($row['sem']==2) {
							$this->Cell($w[5],5,strtoupper($row['sem']) . 'nd Semester',1,0,'C',$fill);
						} else {
							$this->Cell($w[5],5,'SUMMER',1,0,'C',$fill);
						}
						$this->Ln();
						$CEMPID = $row['EmpID'];
					} else {
						if($CEMPID==$row['EmpID']) {
							$this->SetFont('segoeui','',9);
							$this->SetFillColor(245,245,245);
							$this->SetTextColor(0);
							$this->SetLineWidth(0.10);
							
							$this->Cell($w[0],5,strtoupper($row['subject']),1,0,'L',$fill);
							$this->Cell($w[1],5,strtoupper($row['lec']),1,0,'L',$fill);
							$this->Cell($w[2],5,strtoupper($row['lab']),1,0,'L',$fill);
							$this->Cell($w[3],5,strtoupper($row['unit']),1,0,'L',$fill);
							$this->Cell($w[4],5,strtoupper($row['sy']),1,0,'C',$fill);
							$this->Cell($w[5],5,strtoupper($row['sem']),1,0,'L',$fill);
							$this->Ln();

						} else {
							$this->Ln();
							
							$this->SetFont('seguisb','',10);
							$this->SetFillColor(225,225,225);
							$this->SetTextColor(0);
							$this->Cell(100,6, $row['EmpID'] . ' - ' . strtoupper(getLName($row['EmpID'])) . ', ' . strtoupper(getFName($row['EmpID'])) . ' ' . strtoupper(getMName($row['EmpID'])),1,0,'L',true);
							$this->Ln();
							$this->SetFillColor(142,26,26);
							$this->SetTextColor(255,255,255);
							for($i=0;$i<count($header);$i++)
								$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
							$this->Ln();
							
							$this->SetFont('segoeui','',9);
							$this->SetFillColor(245,245,245);
							$this->SetTextColor(0);
							$this->SetLineWidth(0.10);
							
							$this->Cell($w[0],5,strtoupper($row['subject']),1,0,'L',$fill);
							$this->Cell($w[1],5,strtoupper($row['lec']),1,0,'L',$fill);
							$this->Cell($w[2],5,strtoupper($row['lab']),1,0,'L',$fill);
							$this->Cell($w[3],5,strtoupper($row['unit']),1,0,'L',$fill);
							$this->Cell($w[4],5,strtoupper($row['sy']),1,0,'C',$fill);
							$this->Cell($w[5],5,strtoupper($row['sem']),1,0,'L',$fill);
							$this->Ln();
							$CEMPID = $row['EmpID'];
						}
					}
				}
				$this->Cell(array_sum($w),0,'','T');
				break;
			}
			case "GEP": {
				$header = array('EXAMINATION', 'RATING', 'PLACE', 'DATE', 'LICENSE NO.', 'LICENSE DATE RELEASE');
				$w = array(135,15,60,30,30,40);
				$CEMPID = '';
				$fill = false;
				include("config.php");
				$sql="SELECT * FROM tbl_cse ORDER BY EmpID";
				$result=mysqli_query($conn, $sql);
				$count=mysqli_num_rows($result);
				$fm = "";
				while($row = mysqli_fetch_array($result)) {
					if($row['fromm']=="January") 
						$fm = "01";
					else if($row['fromm']=="February")
						$fm = "02";
					else if($row['fromm']=="March")
						$fm = "03";
					else if($row['fromm']=="April")
						$fm = "04";
					else if($row['fromm']=="May")
						$fm = "05";
					else if($row['fromm']=="June")
						$fm = "06";
					else if($row['fromm']=="July")
						$fm = "07";
					else if($row['fromm']=="August")
						$fm = "08";
					else if($row['fromm']=="September")
						$fm = "09";
					else if($row['fromm']=="October")
						$fm = "10";
					else if($row['fromm']=="November")
						$fm = "11";
					else if($row['fromm']=="December")
						$fm = "12";
					else
						$fm = "00";
						
					if($row['tom']=="January") 
						$tm = "01";
					else if($row['tom']=="February")
						$tm = "02";
					else if($row['tom']=="March")
						$tm = "03";
					else if($row['tom']=="April")
						$tm = "04";
					else if($row['tom']=="May")
						$tm = "05";
					else if($row['tom']=="June")
						$tm = "06";
					else if($row['tom']=="July")
						$tm = "07";
					else if($row['tom']=="August")
						$tm = "08";
					else if($row['tom']=="September")
						$tm = "09";
					else if($row['tom']=="October")
						$tm = "10";
					else if($row['tom']=="November")
						$tm = "11";
					else if($row['tom']=="December")
						$tm = "12";
					else
						$tm = "00";
						
					if($CEMPID=='') {
						$CEMPID = $row['EmpID'];
						$this->SetFont('seguisb','',10);
						$this->SetFillColor(225,225,225);
						$this->SetTextColor(0);
						$this->Cell(100,6, $row['EmpID'] . ' - ' . strtoupper(getLName($row['EmpID'])) . ', ' . strtoupper(getFName($row['EmpID'])) . ' ' . strtoupper(getMName($row['EmpID'])),1,0,'L',true);
						$this->Ln();
						
						$this->SetFillColor(142,26,26);
						$this->SetTextColor(255,255,255);
						for($i=0;$i<count($header);$i++)
							$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
						$this->Ln();
						
						$this->SetFont('segoeui','',9);
						$this->SetFillColor(245,245,245);
						$this->SetTextColor(0);
						$this->SetLineWidth(0.10);
						$this->Cell($w[0],5,strtoupper($row['type']),1,0,'L',$fill);
						$this->Cell($w[1],5,strtoupper($row['rating']),1,0,'C',$fill);
						$this->Cell($w[2],5,strtoupper($row['placeOfExam']),1,0,'L',$fill);
						$this->Cell($w[3],5,$fm . '/'. $row['fromd'] . '/' . $row['fromy'],1,0,'C',$fill);
						$this->Cell($w[4],5,strtoupper($row['licenseNumber']),1,0,'C',$fill);
						$this->Cell($w[5],5,$tm . '/'. $row['tod'] . '/' . $row['toy'],1,0,'C',$fill);
						$this->Ln();
						$CEMPID = $row['EmpID'];
					} else {
						if($CEMPID==$row['EmpID']) {
							$this->SetFont('segoeui','',9);
							$this->SetFillColor(245,245,245);
							$this->SetTextColor(0);
							$this->SetLineWidth(0.10);
							
							$this->Cell($w[0],5,strtoupper($row['type']),1,0,'L',$fill);
							$this->Cell($w[1],5,strtoupper($row['rating']),1,0,'C',$fill);
							$this->Cell($w[2],5,strtoupper($row['placeOfExam']),1,0,'L',$fill);
							$this->Cell($w[3],5,$fm . '/'. $row['fromd'] . '/' . $row['fromy'],1,0,'C',$fill);
							$this->Cell($w[4],5,strtoupper($row['licenseNumber']),1,0,'C',$fill);
							$this->Cell($w[5],5,$tm . '/'. $row['tod'] . '/' . $row['toy'],1,0,'C',$fill);
							$this->Ln();

						} else {
							$this->Ln();
							
							$this->SetFont('seguisb','',10);
							$this->SetFillColor(225,225,225);
							$this->SetTextColor(0);
							$this->Cell(100,6, $row['EmpID'] . ' - ' . strtoupper(getLName($row['EmpID'])) . ', ' . strtoupper(getFName($row['EmpID'])) . ' ' . strtoupper(getMName($row['EmpID'])),1,0,'L',true);
							$this->Ln();
							$this->SetFillColor(142,26,26);
							$this->SetTextColor(255,255,255);
							for($i=0;$i<count($header);$i++)
								$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
							$this->Ln();
							
							$this->SetFont('segoeui','',9);
							$this->SetFillColor(245,245,245);
							$this->SetTextColor(0);
							$this->SetLineWidth(0.10);
							
							$this->Cell($w[0],5,strtoupper($row['type']),1,0,'L',$fill);
							$this->Cell($w[1],5,strtoupper($row['rating']),1,0,'C',$fill);
							$this->Cell($w[2],5,strtoupper($row['placeOfExam']),1,0,'L',$fill);
							$this->Cell($w[3],5,$fm . '/'. $row['fromd'] . '/' . $row['fromy'],1,0,'C',$fill);
							$this->Cell($w[4],5,strtoupper($row['licenseNumber']),1,0,'C',$fill);
							$this->Cell($w[5],5,$tm . '/'. $row['tod'] . '/' . $row['toy'],1,0,'C',$fill);
							$this->Ln();
							$CEMPID = $row['EmpID'];
						}
					}
				}
				$this->Cell(array_sum($w),0,'','T');
				break;
			}
			case "GEP": {
				$header = array('EXAMINATION', 'RATING', 'PLACE', 'DATE', 'LICENSE NO.', 'LICENSE DATE RELEASE');
				$w = array(135,15,60,30,30,40);
				$CEMPID = '';
				$fill = false;
				include("config.php");
				$sql="SELECT * FROM tbl_cse ORDER BY EmpID";
				$result=mysqli_query($conn, $sql);
				$count=mysqli_num_rows($result);
				$fm = "";
				while($row = mysqli_fetch_array($result)) {
					if($row['fromm']=="January") 
						$fm = "01";
					else if($row['fromm']=="February")
						$fm = "02";
					else if($row['fromm']=="March")
						$fm = "03";
					else if($row['fromm']=="April")
						$fm = "04";
					else if($row['fromm']=="May")
						$fm = "05";
					else if($row['fromm']=="June")
						$fm = "06";
					else if($row['fromm']=="July")
						$fm = "07";
					else if($row['fromm']=="August")
						$fm = "08";
					else if($row['fromm']=="September")
						$fm = "09";
					else if($row['fromm']=="October")
						$fm = "10";
					else if($row['fromm']=="November")
						$fm = "11";
					else if($row['fromm']=="December")
						$fm = "12";
					else
						$fm = "00";
						
					if($row['tom']=="January") 
						$tm = "01";
					else if($row['tom']=="February")
						$tm = "02";
					else if($row['tom']=="March")
						$tm = "03";
					else if($row['tom']=="April")
						$tm = "04";
					else if($row['tom']=="May")
						$tm = "05";
					else if($row['tom']=="June")
						$tm = "06";
					else if($row['tom']=="July")
						$tm = "07";
					else if($row['tom']=="August")
						$tm = "08";
					else if($row['tom']=="September")
						$tm = "09";
					else if($row['tom']=="October")
						$tm = "10";
					else if($row['tom']=="November")
						$tm = "11";
					else if($row['tom']=="December")
						$tm = "12";
					else
						$tm = "00";
						
					if($CEMPID=='') {
						$CEMPID = $row['EmpID'];
						$this->SetFont('seguisb','',10);
						$this->SetFillColor(225,225,225);
						$this->SetTextColor(0);
						$this->Cell(100,6, $row['EmpID'] . ' - ' . strtoupper(getLName($row['EmpID'])) . ', ' . strtoupper(getFName($row['EmpID'])) . ' ' . strtoupper(getMName($row['EmpID'])),1,0,'L',true);
						$this->Ln();
						
						$this->SetFillColor(142,26,26);
						$this->SetTextColor(255,255,255);
						for($i=0;$i<count($header);$i++)
							$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
						$this->Ln();
						
						$this->SetFont('segoeui','',9);
						$this->SetFillColor(245,245,245);
						$this->SetTextColor(0);
						$this->SetLineWidth(0.10);
						$this->Cell($w[0],5,strtoupper($row['type']),1,0,'L',$fill);
						$this->Cell($w[1],5,strtoupper($row['rating']),1,0,'C',$fill);
						$this->Cell($w[2],5,strtoupper($row['placeOfExam']),1,0,'L',$fill);
						$this->Cell($w[3],5,$fm . '/'. $row['fromd'] . '/' . $row['fromy'],1,0,'C',$fill);
						$this->Cell($w[4],5,strtoupper($row['licenseNumber']),1,0,'C',$fill);
						$this->Cell($w[5],5,$tm . '/'. $row['tod'] . '/' . $row['toy'],1,0,'C',$fill);
						$this->Ln();
						$CEMPID = $row['EmpID'];
					} else {
						if($CEMPID==$row['EmpID']) {
							$this->SetFont('segoeui','',9);
							$this->SetFillColor(245,245,245);
							$this->SetTextColor(0);
							$this->SetLineWidth(0.10);
							
							$this->Cell($w[0],5,strtoupper($row['type']),1,0,'L',$fill);
							$this->Cell($w[1],5,strtoupper($row['rating']),1,0,'C',$fill);
							$this->Cell($w[2],5,strtoupper($row['placeOfExam']),1,0,'L',$fill);
							$this->Cell($w[3],5,$fm . '/'. $row['fromd'] . '/' . $row['fromy'],1,0,'C',$fill);
							$this->Cell($w[4],5,strtoupper($row['licenseNumber']),1,0,'C',$fill);
							$this->Cell($w[5],5,$tm . '/'. $row['tod'] . '/' . $row['toy'],1,0,'C',$fill);
							$this->Ln();

						} else {
							$this->Ln();
							
							$this->SetFont('seguisb','',10);
							$this->SetFillColor(225,225,225);
							$this->SetTextColor(0);
							$this->Cell(100,6, $row['EmpID'] . ' - ' . strtoupper(getLName($row['EmpID'])) . ', ' . strtoupper(getFName($row['EmpID'])) . ' ' . strtoupper(getMName($row['EmpID'])),1,0,'L',true);
							$this->Ln();
							$this->SetFillColor(142,26,26);
							$this->SetTextColor(255,255,255);
							for($i=0;$i<count($header);$i++)
								$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
							$this->Ln();
							
							$this->SetFont('segoeui','',9);
							$this->SetFillColor(245,245,245);
							$this->SetTextColor(0);
							$this->SetLineWidth(0.10);
							
							$this->Cell($w[0],5,strtoupper($row['type']),1,0,'L',$fill);
							$this->Cell($w[1],5,strtoupper($row['rating']),1,0,'C',$fill);
							$this->Cell($w[2],5,strtoupper($row['placeOfExam']),1,0,'L',$fill);
							$this->Cell($w[3],5,$fm . '/'. $row['fromd'] . '/' . $row['fromy'],1,0,'C',$fill);
							$this->Cell($w[4],5,strtoupper($row['licenseNumber']),1,0,'C',$fill);
							$this->Cell($w[5],5,$tm . '/'. $row['tod'] . '/' . $row['toy'],1,0,'C',$fill);
							$this->Ln();
							$CEMPID = $row['EmpID'];
						}
					}
				}
				$this->Cell(array_sum($w),0,'','T');
				break;
			}
		}
	}
	
	function SetWidths($w)
	{
	    //Set the array of column widths
	    $this->widths=$w;
	}

	function SetAligns($a)
	{
	    //Set the array of column alignments
	    $this->aligns=$a;
	}

	function Row($data, $draw_line)
	{
	    //Calculate the height of the row
	    $nb=0;
	    for($i=0;$i<count($data);$i++)
	        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	    $h=5*$nb;
	    //Issue a page break first if needed
	    $this->CheckPageBreak($h);
	    //Draw the cells of the row
	    for($i=0;$i<count($data);$i++)
	    {
	        $w=$this->widths[$i];
	        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
	        //Save the current position
	        $x=$this->GetX();
	        $y=$this->GetY();
	        //Draw the border
	        $this->Rect($x,$y,$w,$h);

	        if($draw_line) {
        		$this->SetDrawColor(255, 255, 255);
		        $this->SetLineWidth(0.9);
		        $this->Line($x+0.625,$y,$x+$w-0.625,$y);
		        $this->SetDrawColor(0, 0);
		        $this->SetLineWidth(0.2);
	        }
	        
	        //Print the text
	        $this->MultiCell($w,5,$data[$i],0,$a);
	        //Put the position to the right of the cell
	        $this->SetXY($x+$w,$y);
	    }
	    //Go to the next line
	    $this->Ln($h);
	}

	function CheckPageBreak($h)
	{
	    //If the height h would cause an overflow, add a new page immediately
	    if($this->GetY()+$h>$this->PageBreakTrigger)
	        $this->AddPage($this->CurOrientation);
	}

	function NbLines($w,$txt)
	{
	    //Computes the number of lines a MultiCell of width w will take
	    $cw=&$this->CurrentFont['cw'];
	    if($w==0)
	        $w=$this->w-$this->rMargin-$this->x;
	    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	    $s=str_replace("\r",'',$txt);
	    $nb=strlen($s);
	    if($nb>0 and $s[$nb-1]=="\n")
	        $nb--;
	    $sep=-1;
	    $i=0;
	    $j=0;
	    $l=0;
	    $nl=1;
	    while($i<$nb)
	    {
	        $c=$s[$i];
	        if($c=="\n")
	        {
	            $i++;
	            $sep=-1;
	            $j=$i;
	            $l=0;
	            $nl++;
	            continue;
	        }
	        if($c==' ')
	            $sep=$i;
	        $l+=$cw[$c];
	        if($l>$wmax)
	        {
	            if($sep==-1)
	            {
	                if($i==$j)
	                    $i++;
	            }
	            else
	                $i=$sep+1;
	            $sep=-1;
	            $j=$i;
	            $l=0;
	            $nl++;
	        }
	        else
	            $i++;
	    }
	    return $nl;
	}
}
    function getFullName($empid) {
		include("config.php");
		$sql="SELECT * FROM tbl_personalinformation WHERE EmpID='$empid'";
		$result=mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		$fullname = $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['surname'] . ' ' . $row['nameExtension'];
		return $fullname;
	}
	function getLName($empid) {
		include("config.php");
		$sql="SELECT * FROM tbl_personalinformation WHERE EmpID='$empid'";
		$result=mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		$fullname = $row['surname'];
		return $fullname;
	}
	function getFName($empid) {
		include("config.php");
		$sql="SELECT * FROM tbl_personalinformation WHERE EmpID='$empid'";
		$result=mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		$fullname = $row['firstname'];
		return $fullname;
	}
	function getMName($empid) {
		include("config.php");
		$sql="SELECT * FROM tbl_personalinformation WHERE EmpID='$empid'";
		$result=mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		$fullname = $row['middlename'];
		return $fullname;
	}
	function getEName($empid) {
		include("config.php");
		$sql="SELECT * FROM tbl_personalinformation WHERE EmpID='$empid'";
		$result=mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		$fullname = $row['nameExtension'];
		return $fullname;
	}
	function getMonth($m){
		if($m == "January")
			return 1;
		elseif($m == "February")
			return 2;
		elseif($m == "March")
			return 3;
		elseif($m == "April")
			return 4;
		elseif($m == "May")
			return 5;
		elseif($m == "June")
			return 6;
		elseif($m == "July")
			return 7;
		elseif($m == "August")
			return 8;
		elseif($m == "September")
			return 9;
		elseif($m == "October")
			return 10;
		elseif($m == "November")
			return 11;
		elseif($m == "December")
			return 12;
	}
	
	require('makefont/makefont.php');
	//MakeFont('font/seguisb.ttf','cp1252');
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf = new PDF('P','mm',array(215,330));
	$pdf->AddPage('L');
	$pdf->SetFont('Arial','',10);
	$pdf->table($_GET['content']);
	$pdf->Output();
?>