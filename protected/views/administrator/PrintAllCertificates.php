<?php
include("config.php");
session_start();

require('fpdf.php');

$fpdf = new FPDF();

$empid = $_SESSION['CEmpID'];

$sql="SELECT * FROM tbl_tprograms WHERE EmpID='$empid'";
$result=mysqli_query($conn,$sql);

$ctr = 0;

if(!empty($result)) {
	while($row = mysqli_fetch_array($result)) {
		if(file_exists($row['path']) && @is_array(getimagesize($row['path']))) {
			$fpdf->AddPage("L");
			$fpdf->Image($row['path'], 0, 0, $fpdf->w, $fpdf->h);
			$ctr++;	
		}
	}

	if($ctr == 0) {
		$fpdf->AddPage("L");
		$fpdf->SetFont('Arial','B',16);
		$fpdf->Cell(40,10,'No Certificate Images Found');
	}
} else {
	$fpdf->AddPage("L");
	$fpdf->SetFont('Arial','B',16);
	$fpdf->Cell(40,10,'No Certificate Images Found');
}

$fpdf->Output();

?>