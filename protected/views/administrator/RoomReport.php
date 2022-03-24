<?php
require('fpdf.php');
include("config.php");

class PDF extends FPDF
{
	function Header()
	{
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
		$this->Ln(10);
		$this->Ln();
	}
	function Footer()
	{
		date_default_timezone_set('Asia/Hong_Kong');
		$today = date("l, F j, Y");
		$ctime = date('h:i:s a', time());
		$this->SetY(-15);
		$this->Cell(0,10,'Page '.$this->PageNo().' of {nb}' . $this->AliasNbPages(),0,0,'R');
	}
	
	function table($cYear)
	{
		include("config.php");
		$this->SetFont('segoeuib','',16);
		$this->SetTextColor(0,0,0);
	
		$this->SetFont('seguisb','',11);
		$this->SetFillColor(210,210,210);
		$header = array('ROOM NAME', 'ROOM DESCRIPTION');
		$w = array(50, 260);
		$this->SetFillColor(50,50,50);
		$this->SetTextColor(255,255,255);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],10,$header[$i],1,0,'C',true);
		$this->Ln();
		$fill = false;
		
		$sql="SELECT * FROM tbl_room";
		$result=mysqli_query($conn, $sql);
		$count=mysqli_num_rows($result);
		$this->SetFont('segoeui','',12);
		$this->SetFillColor(245,245,245);
		$this->SetTextColor(0);
		
		while($row = mysqli_fetch_array($result)) 
		{ 
			$this->SetLineWidth(0.10);
			$this->Cell($w[0],10, '  ' . $row['roomName'],1,0,'L',$fill);
			$this->Cell($w[1],10, '' . $row['roomDesc'],1,0,'L',$fill);
			$this->Ln();

		}
		$this->SetFont('segoeuiz','',10);
		$this->SetTextColor(100,100,100);
		$this->SetFillColor(210,210,210);
		$this->Ln();
	}

}
	
	require('makefont/makefont.php');
	//MakeFont('font/seguisb.ttf','cp1252');
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf = new PDF('P','mm',array(215,330));
	$pdf->SetFont('Arial','',10);
	
	$courseCode = 0;
	$courseDesc = 0;
	$courseYear = 0;
		
		$pdf->AddPage('L');
		$pdf->table(1);

	$pdf->Output();
?>