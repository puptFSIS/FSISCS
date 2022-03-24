<?php
require('fpdf.php');
include("config.php");

$page = 1;

class PDF extends FPDF
{

	function Header()
	{
		$this->Image('PUP Taguig.png',20,10,30);
		$this->Image('centenniallogo.gif',165,10,30);
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
		$this->Cell(0,3,'Branch Masterlist',0,0,'C');
		$this->Ln(5);
		$this->SetFont('segoeuii','',10);
		$this->Cell(0,3,'as of ' . date ('M') .' '.date('Y'),0,0,'C');
		$this->Ln(5);
		
	}
	
	function Footer()
	{
		$this->SetY(-15);
		$this->SetFont('Arial','I',8);
		$this->Cell(0,10,'Page '.$this->PageNo(),0,0,'R');
	}
	
	function table($cYear)
	{				
		$line = 0;
		$this->SetFont('seguisb','',10);
		$this->SetFillColor(210,210,210);
		$this->SetCol(20);
		$header = array('Campus Officials');
		$w = array(85,55,55);
		$this->SetFillColor(50,50,50);
		$this->SetTextColor(255,255,255);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],5,$header[$i],1,0,'C',true);
		$this->Ln();
		$fill = false;
		
		$query = "SELECT * FROM tbl_masterlist WHERE Status = 'BO' ORDER BY FName ASC";
		$result = mysqli_query($conn,$query);
		$this->SetFont('segoeui','',10);
		$this->SetFillColor(245,245,245);
		$this->SetTextColor(0);
		$i=1;
		while($row = mysqli_fetch_array($result)) 
		{ 		
			$this->SetLineWidth(0.10);
			$this->Cell($w[0],5.5, ' '.$i.'. ' . $row['FName'],1,0,'L',$fill);
			$this->Ln();
			$i++;
			$line++;
		}
		//$line = $line + $i;
		
		$this->SetFont('seguisb','',10);
		$this->SetFillColor(210,210,210);
		$this->SetCol(20);
		$header = array('Full Time Faculty');
		$w = array(85,55,55);
		$this->SetFillColor(50,50,50);
		$this->SetTextColor(255,255,255);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],5,$header[$i],1,0,'C',true);
		$this->Ln();
		$fill = false;
		
		$query = "SELECT * FROM tbl_masterlist WHERE Status = 'FT' ORDER BY FName ASC";
		$result = mysqli_query($conn, $query);
		$this->SetFont('segoeui','',10);
		$this->SetFillColor(245,245,245);
		$this->SetTextColor(0);
		$i=1;
		while($row = mysqli_fetch_array($result)) 
		{ 		
			$this->SetLineWidth(0.10);
			$this->Cell($w[0],5.5, ' '.$i.'. ' . $row['FName'],1,0,'L',$fill);
			$this->Ln();
			$i++;
			$line++;
		}
		//$line = $line + $i;
		$this->SetFont('seguisb','',10);
		$this->SetFillColor(210,210,210);
		$this->SetCol(20);
		$header = array('Part Time Faculty');
		$w = array(85,55,55);
		$this->SetFillColor(50,50,50);
		$this->SetTextColor(255,255,255);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],5,$header[$i],1,0,'C',true);
		$this->Ln();
		$fill = false;
		
		$query = "SELECT * FROM tbl_masterlist WHERE Status = 'PT' ORDER BY FName ASC";
		$result = mysqli_query($conn,$query);
		$this->SetFont('segoeui','',10);
		$this->SetFillColor(245,245,245);
		$this->SetTextColor(0);
		$i=1;
		$y = -99;
		while($row = mysqli_fetch_array($result)) 
		{ 	
			if($line > 43)
			{
				$this->SetCol(108);
				$this->SetHeight($y);
			}
			$this->SetLineWidth(0.10);
			$this->Cell($w[0],5.5, ' '.$i.'. ' . $row['FName'],1,0,'L',$fill);
			$this->Ln();
			$i++;
			$line++;
			$y = $y + 5.4;
			
		}
		//$line = $line + $i;
		//NF
		$this->SetFont('seguisb','',10);
		$this->SetFillColor(210,210,210);
		$this->SetCol(108);
		$this->SetHeight($y);
		$header = array('New Faculty Members');
		$w = array(85,55,55);
		$this->SetFillColor(50,50,50);
		$this->SetTextColor(255,255,255);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],5,$header[$i],1,0,'C',true);
		$this->Ln();
		$fill = false;
		
		$query = "SELECT * FROM tbl_masterlist WHERE Status = 'NF' ORDER BY FName ASC";
		$result = mysqli_query($conn,$query);
		$this->SetFont('segoeui','',10);
		$this->SetFillColor(245,245,245);
		$this->SetTextColor(0);
		$i=1;
		$y = $y + 5;
		while($row = mysqli_fetch_array($result)) 
		{ 		
			if($line > 43)
			{
				$this->SetCol(108);
				$this->SetHeight($y);
			}
			$this->SetLineWidth(0.10);
			$this->Cell($w[0],5.5, ' '.$i.'. ' . $row['FName'],1,0,'L',$fill);
			$this->Ln();
			$i++;
			$line++;
			$y = $y + 5.4;
		}
		$y = $y + 100;
		
		//$line = $line + $i;
		
		//Administrative
		//$line = $line + $i;

		$this->SetFont('seguisb','',10);
		$this->SetFillColor(210,210,210);
		$this->SetCol(20);
		$this->SetHeight($y);
		$header = array('Administrative Staff');
		$w = array(85,55,55);
		$this->SetFillColor(50,50,50);
		$this->SetTextColor(255,255,255);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],5,$header[$i],1,0,'C',true);
		$this->Ln();
		$fill = false;
		
		$query = "SELECT * FROM tbl_masterlist WHERE Status = 'AS' ORDER BY FName ASC";
		$result = mysqli_query($conn,$query);
		$this->SetFont('segoeui','',10);
		$this->SetFillColor(245,245,245);
		$this->SetTextColor(0);
		$i=1;
		/*$y = -93.7;*/
		while($row = mysqli_fetch_array($result)) 
		{ 		
			/*if($line > 43)
			{
				$this->SetCol(20);
				$this->SetHeight($y);
			}*/
			$this->SetLineWidth(0.10);
			$this->Cell($w[0],5.5, ' '.$i.'. ' . $row['FName'],1,0,'L',$fill);
			$this->Ln();
			$i++;
			$line++;
			$y = $y + 5.4;
		}
		//SG
		//$line = $line + $i;
		$this->SetFont('seguisb','',10);
		$this->SetFillColor(210,210,210);
		$this->SetCol(20);
		$header = array('Security Guard');
		$w = array(85,55,55);
		$this->SetFillColor(50,50,50);
		$this->SetTextColor(255,255,255);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],5,$header[$i],1,0,'C',true);
		$this->Ln();
		$fill = false;
		
		$query = "SELECT * FROM tbl_masterlist WHERE Status = 'SG' ORDER BY FName ASC";
		$result = mysqli_query($conn,$query);
		$this->SetFont('segoeui','',10);
		$this->SetFillColor(245,245,245);
		$this->SetTextColor(0);
		$i=1;
		while($row = mysqli_fetch_array($result)) 
		{ 	/*
			if($line > 43)
			{
				$this->SetCol(108);
				$this->SetHeight($y);
			}*/
			$this->SetLineWidth(0.10);
			$this->Cell($w[0],5.5, ' '.$i.'. ' . $row['FName'],1,0,'L',$fill);
			$this->Ln();
			$i++;
			$line++;
			$y = $y + 5.4;
			
		}
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