<?php
require('fpdf.php');
include("config.php");

$page = 1;

class PDF extends FPDF
{

	function Header()
	{
		$this->Image('PUP Taguig.png',20,10,20);
		$this->Image('centenniallogo.gif',175,10,20);
		$this->AddFont('segoeui','','segoeui.php');
		$this->AddFont('segoeuib','','segoeuib.php');
		$this->AddFont('segoeuil','','segoeuil.php');
		$this->AddFont('segoeuiz','','segoeuiz.php');
		$this->AddFont('segoeuii','','segoeuii.php');
		$this->AddFont('seguisb','','seguisb.php');
		$this->SetFont('segoeui','',11);
		$this->SetTextColor(0);
		$this->SetFont('segoeui','',10);
		$this->Cell(0,5,'POLYTECHNIC UNIVERSITY OF THE PHILIPPINES',0,0,'C');
		$this->Ln(5);
		$this->SetFont('segoeui','',8);
		$this->Cell(0,3,'TAGUIG  BRANCH',0,0,'C');
		$this->Ln(4);
		$this->SetFont('segoeuii','',8);
		$this->Cell(0,3,'Gen. Santos Ave. Upper Bicutan, Taguig City',0,0,'C');
		$this->Ln(8);
		$this->SetFont('segoeuib','',11);
		$this->Cell(0,3,'Faculty List and Faculty Code Report',0,0,'C');
		$this->Ln(5);
		$this->SetFont('segoeuii','',8);
		$this->Cell(0,3,'as of ' . date ('M') .' '.date('Y'),0,0,'C');
		$this->Ln(8);
		
	}
	
	function Footer()
	{
		$this->SetY(-15);
		$this->SetFont('Arial','I',8);
		$this->Cell(0,10,'Page '.$this->PageNo(),0,0,'R');
	}
	
	function table($cYear)
	{				
		$this->SetFont('seguisb','',10);
		$this->SetFillColor(210,210,210);
		$this->SetCol(20);
		$header = array('Name', 'Faculty Code');
		$w = array(87,87);
		$this->SetFillColor(255,255,255);
		$this->SetTextColor(0);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],5,$header[$i],1,0,'C',true);
		$this->Ln();
		$fill = false;

		$sqlCoverage = "SELECT * FROM tbl_reportcoverage WHERE report = 'FAS'";
		$resultCoverage=mysqli_query($conn,$sqlCoverage);
		$rowCoverage = mysqli_fetch_array($resultCoverage);
		$schoolYear = $rowCoverage['yfrom'] . '-';
		
		$query = "SELECT * FROM tbl_masterlist WHERE schoolYear LIKE '$schoolYear%' ORDER BY FName ASC";
		$result = mysql_query($conn,$query);
		$this->SetFont('segoeui','',10);
		$this->SetFillColor(87,87);
		$this->SetTextColor(0);
		$i=1;
		while($row = mysqli_fetch_array($result)) 
		{ 		
			$this->SetLineWidth(0.10);
			$this->Cell($w[0],5.5, ' '.$i.'. ' . $row['FName'],1,0,'L',$fill);
			$this->Cell($w[1],5.5, ' ' . $row['FCode'],1,0,'C',$fill);
			$this->Ln();
			$i++;
		}
		/*
		$this->SetFont('seguisb','',10);
		$this->SetFillColor(210,210,210);
		$this->SetCol(20);
		$header = array('Full Time Faculty', '', '');
		$w = array(65,55,55);
		$this->SetFillColor(50,50,50);
		$this->SetTextColor(255,255,255);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],5,$header[$i],1,0,'C',true);
		$this->Ln();
		$fill = false;
		
		$query = "SELECT * FROM tbl_masterlist WHERE Status = 'FT' AND schoolYear LIKE '$schoolYear%' ORDER BY FName ASC";
		$result = mysqli_query($conn,$query);
		$this->SetFont('segoeui','',10);
		$this->SetFillColor(245,245,245);
		$this->SetTextColor(0);
		$i=1;
		while($row = mysqli_fetch_array($result)) 
		{ 		
			$this->SetLineWidth(0.10);
			$this->Cell($w[0],5.5, ' '.$i.'. ' . $row['FName'],1,0,'L',$fill);
			$this->Cell($w[1],5.5, ' ' . $row['FCode'],1,0,'C',$fill);
		
		}
		
		$this->SetFont('seguisb','',10);
		$this->SetFillColor(210,210,210);
		$this->SetCol(20);
		$header = array('Part Time Faculty', '', '');
		$w = array(65,55,55);
		$this->SetFillColor(50,50,50);
		$this->SetTextColor(255,255,255);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],5,$header[$i],1,0,'C',true);
		$this->Ln();
		$fill = false;
		
		$query = "SELECT * FROM tbl_masterlist WHERE Status = 'PT' AND schoolYear LIKE '$schoolYear%' ORDER BY FName ASC";
		$result = mysqli_query($conn,$query);
		$this->SetFont('segoeui','',10);
		$this->SetFillColor(245,245,245);
		$this->SetTextColor(0);
		$i=1;
		while($row = mysqli_fetch_array($result)) 
		{ 		
			$this->SetLineWidth(0.10);
			$this->Cell($w[0],5.5, ' '.$i.'. ' . $row['FName'],1,0,'L',$fill);
			$this->Cell($w[1],5.5, ' ' . $row['FCode'],1,0,'C',$fill);
			
		}
		$this->SetFont('seguisb','',10);
		$this->SetFillColor(210,210,210);
		$this->SetCol(20);
		$header = array('New Faculty Members', '', '');
		$w = array(65,55,55);
		$this->SetFillColor(50,50,50);
		$this->SetTextColor(255,255,255);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],5,$header[$i],1,0,'C',true);
		$this->Ln();
		$fill = false;
		
		$query = "SELECT * FROM tbl_masterlist WHERE Status = 'NF' AND schoolYear LIKE '$schoolYear%' ORDER BY FName ASC";
		$result = mysqli_query($conn,$query);
		$this->SetFont('segoeui','',10);
		$this->SetFillColor(245,245,245);
		$this->SetTextColor(0);
		$i=1;
		while($row = mysqli_fetch_array($result)) 
		{ 		
			$this->SetLineWidth(0.10);
			$this->Cell($w[0],5.5, ' '.$i.'. ' . $row['FName'],1,0,'L',$fill);
			$this->Cell($w[1],5.5, ' ' . $row['FCode'],1,0,'C',$fill);
			
		}
		
		$this->SetFont('seguisb','',10);
		$this->SetFillColor(210,210,210);
		$this->SetCol(20);
		$header = array('Administrative Staff', '', '');
		$w = array(65,55,55);
		$this->SetFillColor(50,50,50);
		$this->SetTextColor(255,255,255);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],5,$header[$i],1,0,'C',true);
		$this->Ln();
		$fill = false;
		
		$query = "SELECT * FROM tbl_masterlist WHERE Status = 'AS' AND schoolYear LIKE '$schoolYear%' ORDER BY FName ASC";
		$result = mysqli_query($conn,$query);
		$this->SetFont('segoeui','',10);
		$this->SetFillColor(245,245,245);
		$this->SetTextColor(0);
		$i=1;
		while($row = mysqli_fetch_array($result)) 
		{ 		
			$this->SetLineWidth(0.10);
			$this->Cell($w[0],5.5, ' '.$i.'. ' . $row['FName'],1,0,'L',$fill);
			$this->Cell($w[1],5.5, ' ' . $row['FCode'],1,0,'C',$fill);
			
		}
		
		$this->SetFont('seguisb','',10);
		$this->SetFillColor(210,210,210);
		$this->SetCol(20);
		$header = array('Security Guards', '', '');
		$w = array(65,55,55);
		$this->SetFillColor(50,50,50);
		$this->SetTextColor(255,255,255);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],5,$header[$i],1,0,'C',true);
		$this->Ln();
		$fill = false;
		
		$query = "SELECT * FROM tbl_masterlist WHERE Status = 'SG' AND schoolYear LIKE '$schoolYear%' ORDER BY FName ASC";
		$result = mysqli_query($conn,$query);
		$this->SetFont('segoeui','',10);
		$this->SetFillColor(245,245,245);
		$this->SetTextColor(0);
		$i=1;
		while($row = mysqli_fetch_array($result)) 
		{ 		
			$this->SetLineWidth(0.10);
			$this->Cell($w[0],5.5, ' '.$i.'. ' . $row['FName'],1,0,'L',$fill);
			$this->Cell($w[1],5.5, ' ' . $row['FCode'],1,0,'C',$fill);
			
		} */
	}
	
	function SetCol($col)
	{
		// Set position at a given column
		$this->col = $col;
		$x = $col;
		$this->SetLeftMargin($x);
		$this->SetX($x);
	}	
}	
	
	require('makefont/makefont.php');
	//MakeFont('font/seguisb.ttf','cp1252');
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf = new PDF('P','mm',array(215,330));
	$pdf->SetFont('Arial','',10);
	
	$pdf->AddPage('P');
	$page++;
	$i = 1;
	$pdf->table($i);
	$pdf->Output();
?>