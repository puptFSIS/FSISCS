<?php
//include library
include('tcpdf_library/tcpdf.php');

//create pdf object
$pdf = new TCPDF('L','mm',array(325,210));

//disable header and footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

//get data which will be use on pdf
if(isset($_GET['fname'],$_GET['mname'],$_GET['sname'],$_GET['ye'])) {
	$firstname = $_GET['fname'];
	$middlename = $_GET['mname'];
	$surname = $_GET['sname'];
	$ye = $_GET['ye'];
}
//add fonts
// convert TTF font to TCPDF format and store it on the fonts folder


//addpage
$pdf->AddPage();


		//add contents
		$pdf->Image('accpictures/logo.png',10,6,20);
		$pdf->SetFont('Times','',10);
		// Title
		$pdf->SetX(40);
		$pdf->Cell(30,6,'Republic of the Philippines',0,0,'C');
		$pdf->SetFont('Times','',12);
		$pdf->SetXY(71.5,9.8);
		$pdf->Cell(64,14,'POLYTECHNIC UNIVERSITY OF THE PHILIPPINES - TAGUIG BRANCH',0,0,'C');
		$pdf->SetFont('Times','',10.8);
		$pdf->SetY(18);
		$pdf->SetX(10.5);
		$pdf->Cell(120,-40,'Gen. Santos Ave. Upper Bicutan, Taguig City',0,0,'C');
		$pdf->Ln(20);

		$pdf->SetY(10);
		$pdf->SetFont('Times','B',12);
		$pdf->Cell(300,40,'INDIVIDUAL PERFORMANCE COMMITMENT AND REVIEW (IPCR)',0,1,'C');

		//table par



		//Intro part
		$pdf->SetY(30);
		$pdf->SetFont('Times','',10.5);
		$pdf->Cell(310,10,'I, '.$firstname." ".$middlename." ".$surname.' of the PUP TAGUIG CITY BRANCH commit to deliver and agree to be rated on the attainment of the following targets in accordance with the indicated ',0,1,'C');
		$pdf->SetY(37);
		$pdf->Cell(120,-2,'measures for the period -JANUARY to JUNE, '.$ye.'.',0,0,'C');
		$pdf->Ln(25);

	//review by signature
		$pdf->SetFont('Times','B');
		$pdf->SetX(40);
		$pdf->SetFillColor(211,211,211);
		$pdf->Cell(245,5,'',1,0,'L',1); //Small Gray Long bar
		$pdf->SetXY(40,67);
		$pdf->Cell(245,22.5,'',1,0,'C'); //Big White Long bar
		$pdf->SetXY(40,62);
		//Left Side
		$pdf->Cell(90,27.5,'',1,0,'C');
		$pdf->SetXY(40,62);
		$pdf->SetFont('Times','B',8);
		$pdf->Cell(90,5,'Reviewed by:',1,0,'L');
		$pdf->SetXY(40,84.5);
		$pdf->SetFont('Times','B',8);
		$pdf->Cell(90,5,'Immediate Supervisor',1,0,'C');
		$pdf->SetXY(130,62);
		$pdf->Cell(32,5,'Date',1,0,'C');
		$pdf->SetXY(162,62);
		// Right Side
		$pdf->Cell(90,27.5,'',1,0,'C');
		$pdf->SetXY(162,62);
		$pdf->Cell(90,5,'Approved by:',1,0,'L');
		$pdf->SetXY(162,84.5);
		$pdf->Cell(90,5,'Head of Office',1,0,'C');
		$pdf->SetXY(252,62);
		$pdf->Cell(33,5,'Date',1,1,'C');
		$pdf->Ln(30);


		//Tables
		$pdf->SetX(11);
		//$pdf->Cell(1);
		$pdf->SetFont('Times','B',8);
		$pdf->SetFillColor(211,211,211);
		$pdf->Cell(60,8,'Output',1,0,'C',1);
		$pdf->Cell(70,8,'Success Indicators',1,0,'C',1);
		$pdf->Cell(70,8,'Actual Accomplishments',1,0,'C',1);
		$pdf->Cell(50,4,'Ratings',1,0,'C',1);
		$pdf->Cell(55,8,'Remarks',1,0,'C',1);
		$pdf->Cell(0,4,'',0,1);
		$pdf->Cell(200,4,'',0,0);
		$pdf->SetX(211);
		$pdf->Cell(12.4,4,'Q1',1,0,'C',1);
		$pdf->Cell(12.4,4,'E2',1,0,'C',1);
		$pdf->Cell(12.4,4,'T3',1,0,'C',1);
		$pdf->Cell(12.6,4,'A4',1,1,'C',1);
		//Strategic priority
		//$pdf->Cell(1);
		$pdf->SetFillColor(83, 207, 214);
		//$pdf->Rect(0, 0, 210, 297, 'F');
		$pdf->SetX(11);
		$pdf->Cell(305,6,'Strategic Priority:',1,1,'L',1);
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
			$pdf->writeHTMLCell(305,0,'','',$html_table,0,1,0,false);	
		}
		$pdf->Ln(4);

		$pdf->SetX(11);
		$pdf->SetFont('Times','B',8);
		$pdf->SetFillColor(211,211,211);
		$pdf->Cell(60,8,'Output',1,0,'C',1);
		$pdf->Cell(70,8,'Success Indicators',1,0,'C',1);
		$pdf->Cell(70,8,'Actual Accomplishments',1,0,'C',1);
		$pdf->Cell(50,4,'Ratings',1,0,'C',1);
		$pdf->Cell(55,8,'Remarks',1,0,'C',1);
		$pdf->Cell(0,4,'',0,1);
		$pdf->Cell(200,4,'',0,0);
		$pdf->SetX(211);
		$pdf->Cell(12.4,4,'Q1',1,0,'C',1);
		$pdf->Cell(12.4,4,'E2',1,0,'C',1);
		$pdf->Cell(12.4,4,'T3',1,0,'C',1);
		$pdf->Cell(12.6,4,'A4',1,1,'C',1);
		//Strategic priority
		//$pdf->Cell(1);
		$pdf->SetFillColor(83, 207, 214);
		//$pdf->Rect(0, 0, 210, 297, 'F');
		$pdf->SetX(11);
		$pdf->Cell(305,6,'Core Function:',1,1,'L',1);
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
			$pdf->writeHTMLCell(305,0,'','',$html_table_cf,0,1,0,false);	
		}
		$pdf->Ln(4);

		$pdf->SetX(11);
		$pdf->SetFont('Times','B',8);
		$pdf->SetFillColor(211,211,211);
		$pdf->Cell(60,8,'Output',1,0,'C',1);
		$pdf->Cell(70,8,'Success Indicators',1,0,'C',1);
		$pdf->Cell(70,8,'Actual Accomplishments',1,0,'C',1);
		$pdf->Cell(50,4,'Ratings',1,0,'C',1);
		$pdf->Cell(55,8,'Remarks',1,0,'C',1);
		$pdf->Cell(0,4,'',0,1);
		$pdf->Cell(200,4,'',0,0);
		$pdf->SetX(211);
		$pdf->Cell(12.4,4,'Q1',1,0,'C',1);
		$pdf->Cell(12.4,4,'E2',1,0,'C',1);
		$pdf->Cell(12.4,4,'T3',1,0,'C',1);
		$pdf->Cell(12.6,4,'A4',1,1,'C',1);
		//Strategic priority
		//$pdf->Cell(1);
		$pdf->SetFillColor(83, 207, 214);
		//$pdf->Rect(0, 0, 210, 297, 'F');
		$pdf->SetX(11);
		$pdf->Cell(305,6,'Support Function:',1,1,'L',1);
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
			$pdf->writeHTMLCell(305,0,'','',$html_table_sf,0,1,0,false);
		}
		$pdf->Ln(4);

		//Last part, (signature part)
		$pdf->SetX(40);
		$pdf->SetFillColor(211,211,211);
		$pdf->Cell(245,30,"",0,0,'L');
		$pdf->SetXY($pdf->GetX() - 570, $pdf->GetY() - 0);
		$pdf->Cell(245,5,'',1,0,'L',1); //Small box Gray

		$pdf->SetX(40);
		$pdf->Cell(245,30,"",0,0,'L');
		$pdf->SetXY($pdf->GetX() - 570, $pdf->GetY() - 0);
		$pdf->Cell(245,30,'',1,0,'C'); //Main Box

		$pdf->SetX(40);
		$pdf->Cell(245,30,"",0,0,'L');
		$pdf->SetXY($pdf->GetX() - 570,$pdf->GetY()- 0);
		$pdf->Cell(55,30,'',1,0,'C');

		$pdf->SetX(40);
		$pdf->Cell(245,30,"",0,0,'L');
		$pdf->SetXY($pdf->GetX() - 570, $pdf->GetY() - 0);
		$pdf->Cell(55,5,'Discussed With',1,0,'C');

		$pdf->SetX(40);
		$pdf->Cell(245,30,"",0,0,'L');
		$pdf->SetXY($pdf->GetX() - 570, $pdf->GetY() - -25);
		$pdf->Cell(55,5,'Faculty Member',1,0,'C');
		$pdf->Ln(-25);

		$pdf->SetX(40);
		$pdf->Cell(245,30,"",1,0,'L');
		$pdf->SetXY($pdf->GetX() - 515, $pdf->GetY() - 0);
		$pdf->Cell(28,5,'Date',1,0,'C');

		$pdf->SetX(40);
		$pdf->Cell(245,30,"",1,0,'L');
		$pdf->SetXY($pdf->GetX() - 487, $pdf->GetY() - 0);
		$pdf->Cell(55,30,'',1,0,'C');

		$pdf->SetX(40);
		$pdf->Cell(245,30,"",1,0,'L');
		$pdf->SetXY($pdf->GetX() - 487, $pdf->GetY() - 0);
		$pdf->Cell(55,5,'Assessed by',1,0,'C');

		$pdf->SetX(40);
		$pdf->Cell(245,30,"",0,0,'L');
		$pdf->SetXY($pdf->GetX() - 487, $pdf->GetY() - -25);
		$pdf->Cell(55,5,'Supervisor',1,0,'C');
		$pdf->Ln(-25);

		$pdf->SetX(40);
		$pdf->Cell(245,30,"",1,0,'L');
		$pdf->SetXY($pdf->GetX() - 432, $pdf->GetY() - 0);
		$pdf->Cell(28,5,'Date',1,0,'C');

		$pdf->SetX(40);
		$pdf->Cell(245,30,"",0,0,'L');
		$pdf->SetXY($pdf->GetX() - 404, $pdf->GetY() - 0);
		$pdf->Cell(55,30,'',1,0,'C');

		$pdf->SetX(40);
		$pdf->Cell(245,30,"",1,0,'L');
		$pdf->SetXY($pdf->GetX() - 404, $pdf->GetY() - 0);
		$pdf->Cell(55,5,'Final Rating by',1,0,'C');

		$pdf->SetX(40);
		$pdf->Cell(245,30,"",0,0,'L');
		$pdf->SetXY($pdf->GetX() - 404, $pdf->GetY() - -25);
		$pdf->Cell(55,5,'Head of Office',1,0,'C');
		$pdf->Ln(-25);

		$pdf->SetX(40);
		$pdf->Cell(245,30,"",1,0,'L');
		$pdf->SetXY($pdf->GetX() - 349, $pdf->GetY() - 0);
		$pdf->Cell(24,5,'Date',1,0,'C');





// $pdf->getAliasNumPage();

//output
$pdf->Output();
?>