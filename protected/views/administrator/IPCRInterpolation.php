<?php 

require 'phpspreadsheet/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use \PhpOffice\PhpSpreadsheet\RichText\RichText;
use \PhpOffice\PhpSpreadsheet\Style\Border;
use \PhpOffice\PhpSpreadsheet\Style\Color;



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

//Cells to use in computations
include('IPCRInterpolationcomputable.php');

//Cell na walang laman
$spreadsheet
    ->getActiveSheet()
    ->getStyle('A3')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
    ->getStyle('A10')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
    ->getStyle('B10')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
    ->getStyle('C10')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
    ->getStyle('D10')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN);

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
$cellstyle1 = $richtext1->createTextRun('JANUARY TO JUNE');
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
    ->setBorderStyle(Border::BORDER_THIN)

    ->getActiveSheet()
    ->mergeCells('E10:H10')
    ->getStyle('E10:H10')
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
	->getCell('A5')
	->setValue($richtext2)
	->getStyle('A5')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)

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




//Set title of the Worksheet
$spreadsheet
	->getActiveSheet()
	->setTitle('IPCR');

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