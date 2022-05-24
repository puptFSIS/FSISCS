<?php 
include('config.php');
	session_start();
require 'phpspreadsheet/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use \PhpOffice\PhpSpreadsheet\RichText\RichText;
use \PhpOffice\PhpSpreadsheet\Style\Border;
use \PhpOffice\PhpSpreadsheet\Style\Color;
use \PhpOffice\PhpSpreadsheet\Style\Fill;



//make a new spreadsheet object
$spreadsheet = new Spreadsheet();
//get current active sheet (first sheet)
$sheet = $spreadsheet->getActiveSheet();


//set default font
$spreadsheet->getDefaultStyle()
			->getFont()
			->setName('Calibri')
			->setSize(8);



$richtext = new RichText();
//ichtext->createText('Name of Individual Performer: ');
$cellStyle = $richtext->createTextRun('Name of Individual Performer: ');
$cellStyle->getFont()->setBold(true);


$spreadsheet
	->getActiveSheet()
	->mergeCells('A1:C1')
	->getCell('A1')->setValue($richtext);

if(isset($_GET['fname'],$_GET['mname'],$_GET['sname'],$_GET['y'],$_GET['m'],$_GET['fcode'])) {
	$firstname = $_GET['fname'];
	$middlename = $_GET['mname'];
	$surname = $_GET['sname'];
	$year = $_GET['y'];
	$month = $_GET['m'];
	$fcode = $_GET['fcode'];
}

$richtextname = new RichText();
//ichtext->createText('Name of Individual Performer: ');
$cellStylename = $richtextname->createTextRun(''.$firstname.' '.$middlename.' '.$surname.'');
$cellStylename->getFont()->setBold(true);

$spreadsheet
	->getActiveSheet()
	->setCellValue('D1',$richtextname);


//Merge Cell for 'January to June text
$spreadsheet
	->getActiveSheet()
	->mergeCells('B3:I3')
	->getStyle('B3:I3')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN);

//Set the text Bold
$richtext1 = new RichText(); 
$cellstyle1 = $richtext1->createTextRun('JANUARY TO JUNE, '.$year.'');
$cellstyle1->getFont()->setBold(true)->setSize(10);

//Place the text inside the Cell
$spreadsheet
	->getActiveSheet()
	->getCell('B3')
	->setValue($richtext1)
	->getStyle('B3')
    ->getAlignment()
	->setHorizontal('center');

//Merge the cell ranging B4 to E4
$spreadsheet
	->getActiveSheet()
	->mergeCells('B4:E4')
	->getStyle('B4:E4')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN);

//Place text inside Cell B4
$spreadsheet
	->getActiveSheet()
	->getCell('B4')
	->setValue('Total Points Earned')
	->getStyle('B4')
    ->getAlignment()
	->setHorizontal('center');

//Merge Cells
$spreadsheet
	->getActiveSheet()
	->mergeCells('F4:F5')
	->getStyle('F4:F5')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)

    ->getActiveSheet()
    ->mergeCells('G4:G5')
    ->getStyle('G4:G5')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)

    ->getActiveSheet()
    ->mergeCells('H4:H5')
    ->getStyle('H4:H5')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)

    ->getActiveSheet()
    ->mergeCells('I4:I5')
    ->getStyle('I4:I5')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN);

   

//Set the text Bold
$richtext3 = new RichText(); 
$cellstyle3 = $richtext3->createTextRun('Final Rating for JAN - JUN Rating Period');
$cellstyle3->getFont()->setBold(true)->setSize(8);

//Get the Value of Cell E10
$spreadsheet
	->getActiveSheet()
    ->mergeCells('E10:H10')
    ->getStyle('E10:H10')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getCell('E10')
	->setValue($richtext3)
	->getStyle('E10')
	->getAlignment()
	->setHorizontal('right');


$spreadsheet
	->getActiveSheet()
	->getCell('F4')
	->setValue('No. of Item Ratings')
	->getStyle('F4')
    ->getAlignment()
	->setHorizontal('center')
	->setWrapText(true)

	->getActiveSheet()
	->getCell('G4')
	->setValue('Average')
	->getStyle('G4')
    ->getAlignment()
	->setHorizontal('center')
	->setWrapText(true)

	->getActiveSheet()
	->getCell('H4')
	->setValue('Weight')
	->getStyle('H4')
    ->getAlignment()
	->setHorizontal('center')
	->setWrapText(true)

	->getActiveSheet()
	->getCell('I4')
	->setValue('Weighted Average')
	->getStyle('I4')
    ->getAlignment()
	->setHorizontal('center')
	->setWrapText(true);

//Set the text Bold
$richtext2 = new RichText(); 
$cellstyle2 = $richtext2->createTextRun('Office Final Output');
$cellstyle2->getFont()->setBold(true)->setSize(8);

//Place the text inside the Cell
$spreadsheet
	->getActiveSheet()
    ->mergeCells('A3:A5')
    ->getStyle('A3:A5')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getCell('A3')
	->setValue($richtext2)
	->getStyle('A3')
    ->getAlignment()
    ->setHorizontal('center')
    ->setVertical('center')

    ->getActiveSheet()
    ->setCellValue('A6',"Strategic Priority")
    ->getStyle('A6')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)

    ->getActiveSheet()
    ->setCellValue('A7',"Core Functions")
    ->getStyle('A7')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)

    ->getActiveSheet()
    ->setCellValue('A8',"SP+Core")
    ->getStyle('A8')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)

    ->getActiveSheet()
    ->setCellValue('A9',"Support Function")
    ->getStyle('A9')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN);

$spreadsheet
	->getActiveSheet()
	->getColumnDimension('A')
	->setAutoSize(true);

$spreadsheet
	->getActiveSheet()
	->setCellValue('B5',"Quality")
	->getStyle('B5')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('B5')
	->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('C5',"Efficiency")
	->getStyle('C5')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('C5')
	->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('D5',"Timeliness")
	->getStyle('D5')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('D5')
	->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('E5',"Total")
	->getStyle('E5')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('E5')
	->getAlignment()
	->setHorizontal('center');

//////////////////////////////////////////////////////////////////////////////////////////////////////
// JULY TO DECEMBER PART

$spreadsheet
	->getActiveSheet()
	->mergeCells('B12:I12')
	->getStyle('B12:I12')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN);

$richtexts = new RichText(); 
$cellstyles = $richtexts->createTextRun('JULY TO DECEMBER, '.$year.'');
$cellstyles->getFont()->setBold(true)->setSize(10);

$spreadsheet
	->getActiveSheet()
	->getCell('B12')
	->setValue($richtexts)
	->getStyle('B12')
    ->getAlignment()
	->setHorizontal('center');


//Total points earned
$spreadsheet
	->getActiveSheet()
	->mergeCells('B13:E13')
	->getStyle('B13:E13')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN);

//Place text inside Cell B4
$spreadsheet
	->getActiveSheet()
	->getCell('B13')
	->setValue('Total Points Earned')
	->getStyle('B13')
    ->getAlignment()
	->setHorizontal('center');

$spreadsheet
	->getActiveSheet()
	->setCellValue('B14',"Quality")
	->getStyle('B14')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('B14')
	->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('C14',"Efficiency")
	->getStyle('C14')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('C14')
	->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('D14',"Timeliness")
	->getStyle('D14')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('D14')
	->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('E14',"Total")
	->getStyle('E14')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('E14')
	->getAlignment()
	->setHorizontal('center');

//Merge Cell
$spreadsheet
	->getActiveSheet()
	->mergeCells('F13:F14')
	->getStyle('F13:F14')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)

    ->getActiveSheet()
    ->mergeCells('G13:G14')
    ->getStyle('G13:G14')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)

    ->getActiveSheet()
    ->mergeCells('H13:H14')
    ->getStyle('H13:H14')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)

    ->getActiveSheet()
    ->mergeCells('I13:I14')
    ->getStyle('I13:I14')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN);

//Text in cell
$spreadsheet
	->getActiveSheet()
	->getCell('F13')
	->setValue('No. of Item Ratings')
	->getStyle('F13')
    ->getAlignment()
	->setHorizontal('center')
	->setWrapText(true)

	->getActiveSheet()
	->getCell('G13')
	->setValue('Average')
	->getStyle('G13')
    ->getAlignment()
	->setHorizontal('center')
	->setWrapText(true)

	->getActiveSheet()
	->getCell('H13')
	->setValue('Weight')
	->getStyle('H13')
    ->getAlignment()
	->setHorizontal('center')
	->setWrapText(true)

	->getActiveSheet()
	->getCell('I13')
	->setValue('Weighted Average')
	->getStyle('I13')
    ->getAlignment()
	->setHorizontal('center')
	->setWrapText(true);

//final output
//Set the text Bold
$richtexts2 = new RichText(); 
$cellstyles2 = $richtexts2->createTextRun('Office Final Output');
$cellstyles2->getFont()->setBold(true)->setSize(8);

//Place the text inside the Cell
$spreadsheet
	->getActiveSheet()
    ->mergeCells('A12:A14')
    ->getStyle('A12:A14')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getCell('A12')
	->setValue($richtexts2)
	->getStyle('A12')
    ->getAlignment()
    ->setHorizontal('center')
    ->setVertical('center');

//Set the text Bold
$richtexts3 = new RichText(); 
$cellstyles3 = $richtexts3->createTextRun('Final Rating for JUL - DEC Rating Period');
$cellstyles3->getFont()->setBold(true)->setSize(8);

//Get the Value of Cell E10
$spreadsheet
	->getActiveSheet()
    ->mergeCells('E19:H19')
    ->getStyle('E19:H19')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getCell('E19')
	->setValue($richtexts3)
	->getStyle('E19')
	->getAlignment()
	->setHorizontal('right');

$spreadsheet
	->getActiveSheet()
    ->setCellValue('A15',"Strategic Priority")
    ->getStyle('A15')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)

    ->getActiveSheet()
    ->setCellValue('A16',"Core Functions")
    ->getStyle('A16')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)

    ->getActiveSheet()
    ->setCellValue('A17',"SP+Core")
    ->getStyle('A17')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)

    ->getActiveSheet()
    ->setCellValue('A18',"Support Function")
    ->getStyle('A18')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN);
//////////////////////////////////////////////////////////////////////////////////////////////////////

//FINAL OUTPUT JAN TO DEC

$spreadsheet
	->getActiveSheet()
	->mergeCells('B24:I24')
	->getStyle('B24:I24')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN);

$richtextfinal = new RichText(); 
$cellstylefinal = $richtextfinal->createTextRun('JANUARY - DECEMBER, '.$year.'');
$cellstylefinal->getFont()->setBold(true)->setSize(10);

$spreadsheet
	->getActiveSheet()
	->getCell('B24')
	->setValue($richtextfinal)
	->getStyle('B24')
    ->getAlignment()
	->setHorizontal('center');


//Total points earned
$spreadsheet
	->getActiveSheet()
	->mergeCells('B25:E25')
	->getStyle('B25:E25')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN);

//Place text inside Cell B4
$spreadsheet
	->getActiveSheet()
	->getCell('B25')
	->setValue('Total Points Earned')
	->getStyle('B25')
    ->getAlignment()
	->setHorizontal('center');

$spreadsheet
	->getActiveSheet()
	->setCellValue('B26',"Quality")
	->getStyle('B26')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('B26')
	->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('C26',"Efficiency")
	->getStyle('C26')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('C26')
	->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('D26',"Timeliness")
	->getStyle('D26')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('D26')
	->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('E26',"Total")
	->getStyle('E26')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('E14')
	->getAlignment()
	->setHorizontal('center');

//Merge Cell
$spreadsheet
	->getActiveSheet()
	->mergeCells('F25:F26')
	->getStyle('F25:F26')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)

    ->getActiveSheet()
    ->mergeCells('G25:G26')
    ->getStyle('G25:G26')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)

    ->getActiveSheet()
    ->mergeCells('H25:H26')
    ->getStyle('H25:H26')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)

    ->getActiveSheet()
    ->mergeCells('I25:I26')
    ->getStyle('I25:I26')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN);

//Text in cell
$spreadsheet
	->getActiveSheet()
	->getCell('F25')
	->setValue('No. of Item Ratings')
	->getStyle('F25')
    ->getAlignment()
	->setHorizontal('center')
	->setWrapText(true)

	->getActiveSheet()
	->getCell('G25')
	->setValue('Average')
	->getStyle('G25')
    ->getAlignment()
	->setHorizontal('center')
	->setWrapText(true)

	->getActiveSheet()
	->getCell('H25')
	->setValue('Weight')
	->getStyle('H25')
    ->getAlignment()
	->setHorizontal('center')
	->setWrapText(true)

	->getActiveSheet()
	->getCell('I25')
	->setValue('Weighted Average')
	->getStyle('I25')
    ->getAlignment()
	->setHorizontal('center')
	->setWrapText(true);

//final output
//Set the text Bold
$richtextfinal2 = new RichText(); 
$cellstylesfinal2 = $richtextfinal2->createTextRun('Office Final Output');
$cellstylesfinal2->getFont()->setBold(true)->setSize(8);

//Place the text inside the Cell
$spreadsheet
	->getActiveSheet()
    ->mergeCells('A24:A26')
    ->getStyle('A24:A26')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getCell('A24')
	->setValue($richtextfinal2)
	->getStyle('A24')
    ->getAlignment()
    ->setHorizontal('center')
    ->setVertical('center');

//Set the text Bold
$richtextfinal3 = new RichText(); 
$cellstylefinal3 = $richtextfinal3->createTextRun('Computed Rating for JAN - DEC Rating Period');
$cellstylefinal3->getFont()->setBold(true)->setSize(8);

//Get the Value of Cell E10
$spreadsheet
	->getActiveSheet()
    ->mergeCells('E31:H31')
    ->getStyle('E31:H31')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getCell('E31')
	->setValue($richtextfinal3)
	->getStyle('E31')
	->getAlignment()
	->setHorizontal('center');

$richtextfinal4 = new RichText(); 
$cellstylefinal4 = $richtextfinal4->createTextRun('Final Rating for JAN - DEC Rating Period');
$cellstylefinal4->getFont()->setBold(true)->setSize(8);

$spreadsheet
	->getActiveSheet()
	->mergeCells('E32:H32')
	->getStyle('E32:H32')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getCell('E32')
	->setValue($richtextfinal4)
	->getStyle('E32')
	->getAlignment()
	->setHorizontal('center');

$richtextfinal5 = new RichText(); 
$cellstylefinal5 = $richtextfinal5->createTextRun('Qualitative Rating');
$cellstylefinal5->getFont()->setBold(true)->setSize(8);

$spreadsheet
	->getActiveSheet()
	->mergeCells('E33:H33')
	->getStyle('E33:H33')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getCell('E33')
	->setValue($richtextfinal5)
	->getStyle('E33')
	->getAlignment()
	->setHorizontal('center');

$spreadsheet
	->getActiveSheet()
    ->setCellValue('A27',"Strategic Priority")
    ->getStyle('A27')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)

    ->getActiveSheet()
    ->setCellValue('A28',"Core Functions")
    ->getStyle('A28')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)

    ->getActiveSheet()
    ->setCellValue('A29',"SP+Core")
    ->getStyle('A29')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)

    ->getActiveSheet()
    ->setCellValue('A30',"Support Function")
    ->getStyle('A30')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN);






//Set title of the Worksheet
$spreadsheet
	->getActiveSheet()
	->setTitle('Computation table for IPCR');

// $spreadsheet
// 	->getActiveSheet()
// 	->setCellValue('A1',"HELLO");

//Cells to use in computations
include('IPCRInterpolationcomputable.php');

//Sheet 2
include('IPCRInterpolationSheet2.php');




//set the header first, so the result will be treated as an xlsx file.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachment so we can define filename
header('Content-Disposition: attachment;filename="Interpolation.xlsx"');

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//save into php output
$writer->save('php://output');
die;
?>