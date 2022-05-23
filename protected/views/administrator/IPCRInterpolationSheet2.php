<?php
	include('config.php');
	session_start();

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use \PhpOffice\PhpSpreadsheet\RichText\RichText;
use \PhpOffice\PhpSpreadsheet\Style\Border;
use \PhpOffice\PhpSpreadsheet\Style\Color;
use \PhpOffice\PhpSpreadsheet\Style\Fill;

$myWorkSheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'IPCR');



$spreadsheet
	->addSheet($myWorkSheet, 0);
$spreadsheet
	->setActiveSheetIndex(0);

//set default font
$spreadsheet->getDefaultStyle()
			->getFont()
			->setName('Calibri')
			->setSize(8);

$spreadsheet
	->getActiveSheet()
	->getColumnDimension('A')
	->setAutoSize(true);

$richtext = new RichText();
//ichtext->createText('Name of Individual Performer: ');
$cellStyle = $richtext->createTextRun('Name of Individual Performer: ');
$cellStyle->getFont()->setBold(true)->setSize(8);


$spreadsheet
	->getActiveSheet()
	->mergeCells('A1:C1')
	->getCell('A1')->setValue($richtext);

$richtextname = new RichText();
//ichtext->createText('Name of Individual Performer: ');
$cellStylename = $richtextname->createTextRun(''.$firstname.' '.$middlename.' '.$surname.'');
$cellStylename->getFont()->setBold(true)->setSize(8);

$spreadsheet
	->getActiveSheet()
	->setCellValue('D1',$richtextname);


$spreadsheet
	->getActiveSheet()
	->mergeCells('A2:D2');

$richtexttitle = new RichText();
//ichtext->createText('Name of Individual Performer: ');
$cellStyletitle = $richtexttitle->createTextRun('January to June IPCR');
$cellStyletitle->getFont()->setBold(true)->setSize(8);

$spreadsheet
	->getActiveSheet()
	->setCellValue('A2',$richtexttitle)
	->getStyle('A2')
    ->getAlignment()
	->setHorizontal('center');

$richtext2 = new RichText(); 
$cellstyle2 = $richtext2->createTextRun('Strategic Priority');
$cellstyle2->getFont()->setBold(true)->setSize(8);

//Place the text inside the Cell
$spreadsheet
	->getActiveSheet()
    ->mergeCells('A4:A5')
    ->getStyle('A4:A5')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getCell('A4')
	->setValue($richtext2)
	->getStyle('A4')
    ->getAlignment()
    ->setHorizontal('center')
    ->setVertical('center');

$richtext3 = new RichText(); 
$cellstyle3 = $richtext3->createTextRun('Points Earned');
$cellstyle3->getFont()->setBold(true)->setSize(8);

$spreadsheet
	->getActiveSheet()
	->mergeCells('B4:D4')
	->getStyle('B4:D4')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
    ->getCell('B4')
	->setValue($richtext3)
	->getStyle('B4')
    ->getAlignment()
    ->setHorizontal('center');

$spreadsheet
	->getActiveSheet()
	->setCellValue('B5',"Q")
	->getStyle('B5')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('B5')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('C5',"E")
	->getStyle('C5')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('C5')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('D5',"T")
	->getStyle('D5')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('D5')
    ->getAlignment()
    ->setHorizontal('center');

// $var = 1;
// $count = 10;
// for($a = 6; $a<=10; $a++)
// {
// 		$spreadsheet
// 		->getActiveSheet()
// 		->setCellValue('M'.$a.'',"asdasdas ".$var."");
// 		$var++;
// }
// $worksheet = $spreadsheet()->getActiveSheet();


// $spreadsheet = new Spreadsheet();
// $sheet = $spreadsheet -> getActiveSheet();
// foreach(range('A', 3) as $i) {
//    $sheet -> setCellValueByColumnAndRow($i, 6, 'Indicator/Output');
// }

$sql = "SELECT tbl_ipcr1.*,tbl_ipcraccomp.* FROM tbl_ipcr1 LEFT JOIN tbl_ipcraccomp ON tbl_ipcraccomp.id_ipcr1 = tbl_ipcr1.id AND tbl_ipcraccomp.FCode = '$fcode' WHERE tbl_ipcr1.part = 'sp' AND tbl_ipcr1.year = '$year' AND tbl_ipcr1.deleted_on IS NULL ORDER BY tbl_ipcr1.id, tbl_ipcraccomp.id_ipcr1 ASC";
$results = mysqli_query($conn,$sql);
$count = mysqli_num_rows($results);
while($row = mysqli_fetch_array($results))
{
	$q = $row['rating_quality'];
	$e = $row['rating_efficiency'];
	$t = $row['rating_timeliness'];
	$id = $row['id']; 

	// echo "<pre>";
	// print_r($results);
	// echo "</pre>";
	$counts = $count + 5;
	$num = 1;
	for($i = 6; $i<= $counts; $i++)
	{
	

	$spreadsheet
		->getActiveSheet()
		->setCellValue('A'.$i.'',"Indicator/Output ".$num."");
		$num++;		
		
	$spreadsheet
		->getActiveSheet()
		->setCellValue('B'.$i.'',"".$q."")
		->getStyle('B'.$i.'')
		->getBorders()
	    ->getOutline()
	    ->setBorderStyle(Border::BORDER_THIN)
	    ->getActiveSheet()
		->getStyle('B'.$i.'')
	    ->getAlignment()
	    ->setHorizontal('center')

	    ->getActiveSheet()
		->setCellValue('C'.$i.'',"".$e."")
		->getStyle('C'.$i.'')
		->getBorders()
	    ->getOutline()
	    ->setBorderStyle(Border::BORDER_THIN)
	    ->getActiveSheet()
		->getStyle('C6')
	    ->getAlignment()
	    ->setHorizontal('center')

	    ->getActiveSheet()
		->setCellValue('D'.$i.'',"".$t."")
		->getStyle('D'.$i.'')
		->getBorders()
	    ->getOutline()
	    ->setBorderStyle(Border::BORDER_THIN)
	    ->getActiveSheet()
		->getStyle('D'.$i.'')
	    ->getAlignment()
	    ->setHorizontal('center');
	   }
	   
	}


}




// $a = $i + 2;

// $richtextcf = new RichText(); 
// $cellstylecf = $richtextcf->createTextRun('Core Function');
// $cellstylecf->getFont()->setBold(true)->setSize(8);

// //Place the text inside the Cell
// $spreadsheet
// 	->getActiveSheet()
//     ->mergeCells('A'.$a.':A')
//     ->getStyle('A4:A5')
//     ->getBorders()
//     ->getOutline()
//     ->setBorderStyle(Border::BORDER_THIN)
// 	->getActiveSheet()
// 	->getCell('A4')
// 	->setValue($richtext2)
// 	->getStyle('A4')
//     ->getAlignment()
//     ->setHorizontal('center')
//     ->setVertical('center');

// $richtext3 = new RichText(); 
// $cellstyle3 = $richtext3->createTextRun('Points Earned');
// $cellstyle3->getFont()->setBold(true)->setSize(8);

// $spreadsheet
// 	->getActiveSheet()
// 	->mergeCells('B4:D4')
// 	->getStyle('B4:D4')
//     ->getBorders()
//     ->getOutline()
//     ->setBorderStyle(Border::BORDER_THIN)
//     ->getActiveSheet()
//     ->getCell('B4')
// 	->setValue($richtext3)
// 	->getStyle('B4')
//     ->getAlignment()
//     ->setHorizontal('center');

// $spreadsheet
// 	->getActiveSheet()
// 	->setCellValue('B5',"Q")
// 	->getStyle('B5')
// 	->getBorders()
//     ->getOutline()
//     ->setBorderStyle(Border::BORDER_THIN)
//     ->getActiveSheet()
// 	->getStyle('B5')
//     ->getAlignment()
//     ->setHorizontal('center')

//     ->getActiveSheet()
// 	->setCellValue('C5',"E")
// 	->getStyle('C5')
// 	->getBorders()
//     ->getOutline()
//     ->setBorderStyle(Border::BORDER_THIN)
//     ->getActiveSheet()
// 	->getStyle('C5')
//     ->getAlignment()
//     ->setHorizontal('center')

//     ->getActiveSheet()
// 	->setCellValue('D5',"T")
// 	->getStyle('D5')
// 	->getBorders()
//     ->getOutline()
//     ->setBorderStyle(Border::BORDER_THIN)
//     ->getActiveSheet()
// 	->getStyle('D5')
//     ->getAlignment()
//     ->setHorizontal('center');


/////////////////////////////////////////////////////////////////////////////
$spreadsheet
	->getActiveSheet()
	->mergeCells('F2:I2');

$richtexttitle = new RichText();
//ichtext->createText('Name of Individual Performer: ');
$cellStyletitle = $richtexttitle->createTextRun('July to December IPCR');
$cellStyletitle->getFont()->setBold(true)->setSize(8);

$spreadsheet
	->getActiveSheet()
	->setCellValue('F2',$richtexttitle)
	->getStyle('F2')
    ->getAlignment()
	->setHorizontal('center');
?>