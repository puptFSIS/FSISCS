<?php
require('fpdf.php');
include("config.php");

$page = 1;

class PDF extends FPDF
{
	function Header()
	{
		$this->Image('PUP Taguig.png',20,10,30);
		$this->Image('centenniallogo.gif',285,10,30);
		$this->AddFont('segoeui','','segoeui.php');
		$this->AddFont('segoeuib','','segoeuib.php');
		$this->AddFont('segoeuil','','segoeuil.php');
		$this->AddFont('segoeuiz','','segoeuiz.php');
		$this->AddFont('segoeuii','','segoeuii.php');
		$this->AddFont('seguisb','','seguisb.php');
		$this->SetFont('segoeui','',11);
		$this->SetTextColor(0);
		$this->SetFont('segoeuii','',10);
		$this->Cell(0,3,'Republic of the Philippines',0,0,'C');
		$this->Ln(4);
		$this->SetFont('segoeuib','',13);
		$this->Cell(0,5,'POLYTECHNIC UNIVERSITY OF THE PHILIPPINES',0,0,'C');
		$this->Ln(5);
		$this->SetFont('segoeui','',10);
		$this->Cell(0,3,'TAGUIG  BRANCH',0,0,'C');
		$this->Ln(4);
		$this->SetFont('segoeuii','',10);
		$this->Cell(0,3,'Gen. Santos Ave. Upper Bicutan, Taguig City',0,0,'C');
		$this->Ln(4);
		$this->SetFont('segoeuii','',10);
		$this->Cell(0,3,'Tel Nos:837-5858 to 60; Telefax:8375859',0,0,'C');
		$this->Ln(10);
		$this->SetFont('segoeuib','',16);
		$this->Cell(0,3,'Report on Service Credits',0,0,'C');
		$this->Ln(5);
		$this->SetFont('segoeuii','',10);
		$this->Cell(0,3,'as of ' . date ('F') .' '. date('d') .', '.date('Y'),0,0,'C');
		$this->Ln(10);
		
		
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
		$p = $_GET['prof'];
		$this->Ln(9);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  include("config.php");                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
		$this->SetFont('segoeuib','',12);
		$this->Cell(0,3,'' . getName($p),0,0,'L');
		$this->Ln();
		$this->Ln();
		$this->setX(10);
		
		$this->SetFont('seguisb','',12);
		$this->SetFillColor(210,210,210);
		$header = array('SO #', 'DESCRIPTION','DATE','NO. OF DAYS CREDITED');
		$w = array(70, 130,55, 55);
		$this->SetFillColor(50,50,50);
		$this->SetTextColor(255,255,255);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],6,$header[$i],1,0,'C',true);
		$this->Ln();
		$fill = false;
		$this->SetTextColor(0);
		$this->SetFont('seguisb','',10);
		$sql1 = "SELECT * FROM tbl_servicecredit WHERE FCode = '$p' order by year,month,day ASC";
		$query1 = mysqli_query($conn,$sql1);
		while($row1 = mysqli_fetch_array($query1))
		{
			$sonum = $row1['soNum'];
			$desc = $row1['SOdesc'];
			$month = $row1['month'];
			$day = $row1['day'];
			$year = $row1['year'];
			$date = $month."/".$day."/".$year;
			$hrs = $row1['hrs'];
			$this->SetLineWidth(0.10);
			$this->Cell($w[0],6, '' . $sonum,1,0,'R',$fill);
			$this->Cell($w[1],6, ' ' . $desc,1,0,'L',$fill);
			$this->Cell($w[2],6, '' . $date,1,0,'L',$fill);
			$this->Cell($w[3],6, '' . $hrs,1,0,'R',$fill);
			$this->Ln();
		}			
		$sql2 = "SELECT * FROM tbl_servicecredit WHERE FCode = '$p'";
		$result2 = mysqli_query($conn,$sql2);
		$unts = 0;
		while($row2=mysqli_fetch_array($result2)) {
			$unts = $unts + $row2['hrs']; 
		}
		if($unts<=0){}
		else{
			$this->SetLineWidth(0.10);
			$this->Cell($w[0]+$w[1]+$w[2],6, '' . "TOTAL DAYS CREDITED                 ",1,0,'R',$fill);
			//$this->Cell($w[2],6, '' ,1,0,'R',$fill);
			$this->Cell($w[3],6, '' . round($unts/24, 1),1,0,'R',$fill);
		
		}
		$this->Ln();
	}
}	

	function getName($fcode)
	{
		include("config.php");
		$Name = "";
		$sql = "SELECT * FROM tbl_evaluationfaculty WHERE FCode = '$fcode'";
		$result = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_array($result)){
			$Name = strtoupper($row['LName']) .', '. strtoupper($row['FName']);
		}
		return $Name;
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