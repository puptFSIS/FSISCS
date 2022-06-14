<?php
//include library
include('tcpdf_library/tcpdf.php');

class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        $this->Image('accpictures/logo.png',10,6,20);
		$this->SetFont('Times','',10);
		// Title
		$this->SetX(40);
		$this->Cell(30,26,'Republic of the Philippines',0,0,'C');
		$this->SetFont('Times','',12);
		$this->SetXY(71.5,9.8);
		$this->Cell(64,14,'POLYTECHNIC UNIVERSITY OF THE PHILIPPINES - TAGUIG BRANCH',0,0,'C');
		$this->SetFont('Times','',10.8);
		$this->SetY(18);
		$this->SetX(10.5);
		$this->Cell(120,-40,'Gen. Santos Ave. Upper Bicutan, Taguig City',0,1,'C');
		$this->Ln(20);


		// $this->Ln(20);
    }

    // Page footer
    public function Footer() {
        $this->SetY(-15);
		$this->Cell(0,10,'Page '.$this->PageNo().' of ' . $this->getAliasNbPages(),0,0,'R');
		// $this->Ln();
    }

    public function intro() {
    	//get data which will be use on pdf
		if(isset($_GET['fname'],$_GET['mname'],$_GET['sname'],$_GET['ye'])) {
			$firstname = $_GET['fname'];
			$middlename = $_GET['mname'];
			$surname = $_GET['sname'];
			$ye = $_GET['ye'];
		}
		$this->SetY(10);
		$this->SetFont('Times','B',12);
		$this->Cell(300,40,'INDIVIDUAL PERFORMANCE COMMITMENT AND REVIEW (IPCR)',0,1,'C');
		$this->SetY(30);
		$this->SetFont('Times','',10.5);
		$this->Cell(310,10,'I, '.$firstname." ".$middlename." ".$surname.' of the PUP TAGUIG CITY BRANCH commit to deliver and agree to be rated on the attainment of the following targets in accordance with the indicated ',0,1,'C');
		$this->SetY(37);
		$this->Cell(120,-2,'measures for the period -JANUARY to JUNE, '.$ye.'.',0,0,'C');
		$this->Ln(25);
    }

    public function reviewbysign() {
    	$this->SetFont('Times','B');
		$this->SetX(40);
		$this->SetFillColor(211,211,211);
		$this->Cell(245,5,'',1,0,'L',1); //Small Gray Long bar
		$this->SetXY(40,67);
		$this->Cell(245,22.5,'',1,0,'C'); //Big White Long bar
		$this->SetXY(40,62);
		//Left Side
		$this->Cell(90,27.5,'',1,0,'C');
		$this->SetXY(40,62);
		$this->SetFont('Times','B',8);
		$this->Cell(90,5,'Reviewed by:',1,0,'L');
		$this->SetXY(40,84.5);
		$this->SetFont('Times','B',8);
		$this->Cell(90,5,'Immediate Supervisor',1,0,'C');
		$this->SetXY(130,62);
		$this->Cell(32,5,'Date',1,0,'C');
		$this->SetXY(162,62);
		// Right Side
		$this->Cell(90,27.5,'',1,0,'C');
		$this->SetXY(162,62);
		$this->Cell(90,5,'Approved by:',1,0,'L');
		$this->SetXY(162,84.5);
		$this->Cell(90,5,'Head of Office',1,0,'C');
		$this->SetXY(252,62);
		$this->Cell(33,5,'Date',1,1,'C');
		$this->Ln(30);
    }

    public function table($infosp,$infocf,$infosf) {
    	$this->SetX(11);
		//$pdf->Cell(1);
		$this->SetFont('Times','B',8);
		$this->SetFillColor(211,211,211);
		$this->Cell(60,8,'Output',1,0,'C',1);
		$this->Cell(70,8,'Success Indicators',1,0,'C',1);
		$this->Cell(70,8,'Actual Accomplishments',1,0,'C',1);
		$this->Cell(50,4,'Ratings',1,0,'C',1);
		$this->Cell(55,8,'Remarks',1,0,'C',1);
		$this->Cell(0,4,'',0,1);
		$this->Cell(200,4,'',0,0);
		$this->SetX(211);
		$this->Cell(12.4,4,'Q1',1,0,'C',1);
		$this->Cell(12.4,4,'E2',1,0,'C',1);
		$this->Cell(12.4,4,'T3',1,0,'C',1);
		$this->Cell(12.6,4,'A4',1,1,'C',1);
		//Strategic priority
		//$pdf->Cell(1);
		$this->SetFillColor(83, 207, 214);
		//$pdf->Rect(0, 0, 210, 297, 'F');
		$this->SetX(11);
		$this->Cell(305,6,'Strategic Priority:',1,1,'L',1);
		foreach($infosp as $item) {
			$html_table = '
			<style>
			td {
				border: 1px solid black;
	  			border-collapse: collapse;
	  		}
	  		table {
	  			margin-left: 10px;
	  		}
			</style>
			<table>
				<thead>
				  <tr>
				    <td style="width: 168px; font-size: 9px; height: 30px;">'.$item['output'].'</td>
				    <td style="width: 198px; font-size: 9px;">'.$item['indicators'].'</td>
				    <td style="width: 198px; font-size: 9px;">'.$item['accomplishment'].'</td>
				    <td style="width: 35.4px; text-align:center; font-size: 10px; height: 30px;">'.$item['rating_quality'].'</td>
				    <td style="width: 35.4px; text-align:center; font-size: 10px; height: 30px;">'.$item['rating_efficiency'].'</td>
				    <td style="width: 35.4px; text-align:center; font-size: 10px; height: 30px;">'.$item['rating_timeliness'].'</td>
				    <td style="width: 35.4px; text-align:center; font-size: 10px; height: 30px;">'.$item['rating_average'].'</td>
				    <td style="width: 158.5px; text-align:center; font-size: 10px; height: 30px;">'.$item['remarks'].'</td>
				  </tr>
				</thead>
			</table>
			';
			$this->writeHTMLCell(305,0,'','',$html_table,0,1,0,false);	
		}
		$this->Ln(4);

		$this->SetX(11);
		$this->SetFont('Times','B',8);
		$this->SetFillColor(211,211,211);
		$this->Cell(60,8,'Output',1,0,'C',1);
		$this->Cell(70,8,'Success Indicators',1,0,'C',1);
		$this->Cell(70,8,'Actual Accomplishments',1,0,'C',1);
		$this->Cell(50,4,'Ratings',1,0,'C',1);
		$this->Cell(55,8,'Remarks',1,0,'C',1);
		$this->Cell(0,4,'',0,1);
		$this->Cell(200,4,'',0,0);
		$this->SetX(211);
		$this->Cell(12.4,4,'Q1',1,0,'C',1);
		$this->Cell(12.4,4,'E2',1,0,'C',1);
		$this->Cell(12.4,4,'T3',1,0,'C',1);
		$this->Cell(12.6,4,'A4',1,1,'C',1);
		//Strategic priority
		//$pdf->Cell(1);
		$this->SetFillColor(83, 207, 214);
		//$pdf->Rect(0, 0, 210, 297, 'F');
		$this->SetX(11);
		$this->Cell(305,6,'Core Function:',1,1,'L',1);
		foreach($infocf as $itemcf) {
		$html_table_cf = '
			<style>
			td {
				border: 1px solid black;
	  			border-collapse: collapse;
	  		}
	  		table {
	  			margin-left: 10px;
	  		}
			</style>
			<table>
				<thead>
				  <tr>
				    <td style="width: 168px; font-size: 9px; height: 30px;">'.$itemcf['output'].'</td>
				    <td style="width: 198px; font-size: 9px;">'.$itemcf['indicators'].'</td>
				    <td style="width: 198px; font-size: 9px;">'.$itemcf['accomplishment'].'</td>
				    <td style="width: 35.4px; text-align:center; font-size: 10px;">'.$itemcf['rating_quality'].'</td>
				    <td style="width: 35.4px; text-align:center; font-size: 10px;">'.$itemcf['rating_efficiency'].'</td>
				    <td style="width: 35.4px; text-align:center; font-size: 10px;">'.$itemcf['rating_timeliness'].'</td>
				    <td style="width: 35.4px; text-align:center; font-size: 10px;">'.$itemcf['rating_average'].'</td>
				    <td style="width: 158.5px; text-align:center; font-size: 10px;">'.$itemcf['remarks'].'</td>
				  </tr>
				</thead>
			</table>
			';
			$this->writeHTMLCell(305,0,'','',$html_table_cf,0,1,0,false);	
		}
		$this->Ln(4);

		$this->SetX(11);
		$this->SetFont('Times','B',8);
		$this->SetFillColor(211,211,211);
		$this->Cell(60,8,'Output',1,0,'C',1);
		$this->Cell(70,8,'Success Indicators',1,0,'C',1);
		$this->Cell(70,8,'Actual Accomplishments',1,0,'C',1);
		$this->Cell(50,4,'Ratings',1,0,'C',1);
		$this->Cell(55,8,'Remarks',1,0,'C',1);
		$this->Cell(0,4,'',0,1);
		$this->Cell(200,4,'',0,0);
		$this->SetX(211);
		$this->Cell(12.4,4,'Q1',1,0,'C',1);
		$this->Cell(12.4,4,'E2',1,0,'C',1);
		$this->Cell(12.4,4,'T3',1,0,'C',1);
		$this->Cell(12.6,4,'A4',1,1,'C',1);
		//Strategic priority
		//$pdf->Cell(1);
		$this->SetFillColor(83, 207, 214);
		//$pdf->Rect(0, 0, 210, 297, 'F');
		$this->SetX(11);
		$this->Cell(305,6,'Support Function:',1,1,'L',1);
		foreach($infosf as $itemsf) {
			$html_table_sf = '
			<style>
			td {
				border: 1px solid black;
	  			border-collapse: collapse;
	  		}
	  		table {
	  			margin-left: 10px;
	  		}
			</style>
			<table>
				<thead>
				  <tr>
				    <td style="width: 168px; font-size: 9px; height: 30px;">'.$itemsf['output'].'</td>
				    <td style="width: 198px; font-size: 9px;">'.$itemsf['indicators'].'</td>
				    <td style="width: 198px; font-size: 9px;">'.$itemsf['accomplishment'].'</td>
				    <td style="width: 35.4px; text-align:center; font-size: 10px;">'.$itemsf['rating_quality'].'</td>
				    <td style="width: 35.4px; text-align:center; font-size: 10px;">'.$itemsf['rating_efficiency'].'</td>
				    <td style="width: 35.4px; text-align:center; font-size: 10px;">'.$itemsf['rating_timeliness'].'</td>
				    <td style="width: 35.4px; text-align:center; font-size: 10px;">'.$itemsf['rating_average'].'</td>
				    <td style="width: 158.5px; text-align:center; font-size: 10px;">'.$itemsf['remarks'].'</td>
				  </tr>
				</thead>
			</table>
			';
			$this->writeHTMLCell(305,0,'','',$html_table_sf,0,1,0,false);
		}
		$this->Ln(4);		
    }

    public function signature() {
    	$this->SetX(40);
		$this->SetFillColor(211,211,211);
		$this->Cell(245,30,"",0,0,'L');
		$this->SetXY($this->GetX() - 570, $this->GetY() - 0);
		$this->Cell(245,5,'',1,0,'L',1); //Small box Gray

		$this->SetX(40);
		$this->Cell(245,30,"",0,0,'L');
		$this->SetXY($this->GetX() - 570, $this->GetY() - 0);
		$this->Cell(245,30,'',1,0,'C'); //Main Box

		$this->SetX(40);
		$this->Cell(245,30,"",0,0,'L');
		$this->SetXY($this->GetX() - 570,$this->GetY()- 0);
		$this->Cell(55,30,'',1,0,'C');

		$this->SetX(40);
		$this->Cell(245,30,"",0,0,'L');
		$this->SetXY($this->GetX() - 570, $this->GetY() - 0);
		$this->Cell(55,5,'Discussed With',1,0,'C');

		$this->SetX(40);
		$this->Cell(245,30,"",0,0,'L');
		$this->SetXY($this->GetX() - 570, $this->GetY() - -25);
		$this->Cell(55,5,'Faculty Member',1,0,'C');
		$this->Ln(-25);

		$this->SetX(40);
		$this->Cell(245,30,"",1,0,'L');
		$this->SetXY($this->GetX() - 515, $this->GetY() - 0);
		$this->Cell(28,5,'Date',1,0,'C');

		$this->SetX(40);
		$this->Cell(245,30,"",1,0,'L');
		$this->SetXY($this->GetX() - 487, $this->GetY() - 0);
		$this->Cell(55,30,'',1,0,'C');

		$this->SetX(40);
		$this->Cell(245,30,"",1,0,'L');
		$this->SetXY($this->GetX() - 487, $this->GetY() - 0);
		$this->Cell(55,5,'Assessed by',1,0,'C');

		$this->SetX(40);
		$this->Cell(245,30,"",0,0,'L');
		$this->SetXY($this->GetX() - 487, $this->GetY() - -25);
		$this->Cell(55,5,'Supervisor',1,0,'C');
		$this->Ln(-25);

		$this->SetX(40);
		$this->Cell(245,30,"",1,0,'L');
		$this->SetXY($this->GetX() - 432, $this->GetY() - 0);
		$this->Cell(28,5,'Date',1,0,'C');

		$this->SetX(40);
		$this->Cell(245,30,"",0,0,'L');
		$this->SetXY($this->GetX() - 404, $this->GetY() - 0);
		$this->Cell(55,30,'',1,0,'C');

		$this->SetX(40);
		$this->Cell(245,30,"",1,0,'L');
		$this->SetXY($this->GetX() - 404, $this->GetY() - 0);
		$this->Cell(55,5,'Final Rating by',1,0,'C');

		$this->SetX(40);
		$this->Cell(245,30,"",0,0,'L');
		$this->SetXY($this->GetX() - 404, $this->GetY() - -25);
		$this->Cell(55,5,'Head of Office',1,0,'C');
		$this->Ln(-25);

		$this->SetX(40);
		$this->Cell(245,30,"",1,0,'L');
		$this->SetXY($this->GetX() - 349, $this->GetY() - 0);
		$this->Cell(24,5,'Date',1,0,'C');
    }
}

if($m == "JJ") {
	$mon = 'January to June';
} else {
	$mon = 'July to December';
}


$pdf = new MYPDF('L','mm',array(325,210));
$PDF_MARGIN_LEFT = 10;
$PDF_MARGIN_TOP = 30;
$pdf->SetMargins($PDF_MARGIN_LEFT, $PDF_MARGIN_TOP);
$pdf->setPrintHeader(true);
$pdf->AddPage();
$pdf->intro();
$pdf->reviewbysign();
$pdf->table($infosp,$infocf,$infosf);
$pdf->signature();
$pdf->setPrintFooter(true);
$pdf->Output('IPCR_'.$mon.'_'.$ye.').pdf', 'I');
?>