<?php 
require 'phpspreadsheet/vendor/autoload.php';
use \PhpOffice\PhpSpreadsheet\Style\Border;
// use \PhpOffice\PhpSpreadsheet\Style\Fill;

//January to June
//Strategic Priority
$spreadsheet
	->getActiveSheet()
	->setCellValue('B6',"")
	->getStyle('B6')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('B6')
    ->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('C6',"")
	->getStyle('C6')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('C6')
    ->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('D6',"")
	->getStyle('D6')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('D6')
    ->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('E6',"=SUM(B6:D6)")
	->getStyle('E6')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('E6')
    ->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('F6',"")
	->getStyle('F6')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('E6')
    ->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('G6',"")
	->getStyle('G6')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('G6')
    ->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('H6',"")
	->getStyle('H6')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('H6')
    ->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('I6',"")
	->getStyle('I6')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('I6')
    ->getAlignment()
	->setHorizontal('center');

//Core Funcction
$spreadsheet
	->getActiveSheet()
	->setCellValue('B7',"")
	->getStyle('B7')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('B7')
    ->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('C7',"")
	->getStyle('C7')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('C7')
    ->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('D7',"")
	->getStyle('D7')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('D7')
    ->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('E7',"=SUM(B7:D7)")
	->getStyle('E7')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('E7')
    ->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('F7',"")
	->getStyle('F7')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('F7')
    ->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('G7',"")
	->getStyle('G7')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('G7')
    ->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('H7',"")
	->getStyle('H7')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('H7')
    ->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('I7',"")
	->getStyle('I7')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('I7')
    ->getAlignment()
	->setHorizontal('center');

//SP+Core
$spreadsheet
	->getActiveSheet()
	->setCellValue('B8',"=SUM(B6:B7)")
	->getStyle('B8')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('B8')
    ->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('C8',"=SUM(C6:C7)")
	->getStyle('C8')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('C8')
    ->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('D8',"=SUM(D6:D7)")
	->getStyle('D8')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('D8')
    ->getAlignment()
	->setHorizontal('center')


	->getActiveSheet()
	->setCellValue('E8',"=SUM(E6:E7)")
	->getStyle('E8')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('E8')
    ->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('F8',"=SUM(F6:F7)")
	->getStyle('F8')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('F8')
    ->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('G8',"=E8/F8")
	->getStyle('G8')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('G8')
    ->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('H8',"80%")
	->getStyle('H8')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('H8')
    ->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('I8',"=G8*H8")
	->getStyle('I8')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('I8')
    ->getAlignment()
	->setHorizontal('center');

//Support Function
$spreadsheet
	->getActiveSheet()
	->setCellValue('B9',"")
	->getStyle('B9')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('B9')
    ->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('C9',"")
	->getStyle('C9')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('C9')
    ->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('D9',"")
	->getStyle('D9')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('D9')
    ->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('E9',"=SUM(B9:D9)")
	->getStyle('E9')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('E9')
    ->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('F9',"")
	->getStyle('F9')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('F9')
    ->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('G9',"=E9/F9")
	->getStyle('G9')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('G9')
    ->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('H9',"20%")
	->getStyle('H9')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('H9')
    ->getAlignment()
	->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('I9',"=G9*H9")
	->getStyle('I9')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('I9')
    ->getAlignment()
	->setHorizontal('center')

	//Final Rating Jan-Jun
	->getActiveSheet()
	->setCellValue('I10',"=SUM(I8:I9)")
	->getStyle('I10')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getStyle('I10')
    ->getAlignment()
	->setHorizontal('center');

/////////////////////////////////////////////////////////////////////////////////
/*	
	->getActiveSheet()
	->getStyle('I10')
    ->getAlignment()
	->setHorizontal('center')
*/

//July to december
$spreadsheet
	->getActiveSheet()
	->setCellValue('B15',"")
	->getStyle('B15')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('C15',"")
	->getStyle('C15')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('D15',"")
	->getStyle('D15')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('E15',"=SUM(B15:D15)")
	->getStyle('E15')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('F15',"")
	->getStyle('F15')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('G15',"")
	->getStyle('G15')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('H15',"")
	->getStyle('H15')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('I15',"")
	->getStyle('I15')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN);

//Core Funcction
$spreadsheet
	->getActiveSheet()
	->setCellValue('B16',"")
	->getStyle('B16')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('C16',"")
	->getStyle('C16')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('D16',"")
	->getStyle('D16')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('E16',"=SUM(B16:D16)")
	->getStyle('E16')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('F16',"")
	->getStyle('F16')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('G16',"")
	->getStyle('G16')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('H16',"")
	->getStyle('H16')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('I16',"")
	->getStyle('I16')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN);

//SP+Core
$spreadsheet
	->getActiveSheet()
	->setCellValue('B17',"=SUM(B15:B16)")
	->getStyle('B17')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('C17',"=SUM(C15:C16)")
	->getStyle('C17')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('D17',"=SUM(D15:D16)")
	->getStyle('D17')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('E17',"=SUM(E15:E16)")
	->getStyle('E17')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('F17',"=SUM(F15:F16)")
	->getStyle('F17')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('G17',"=E17/F17")
	->getStyle('G17')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('H17',"80%")
	->getStyle('H17')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('I17',"=G17*H17")
	->getStyle('I17')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN);

//Support Function
$spreadsheet
	->getActiveSheet()
	->setCellValue('B18',"")
	->getStyle('B18')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('C18',"")
	->getStyle('C18')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('D18',"")
	->getStyle('D18')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('E18',"=SUM(B18:D18)")
	->getStyle('E18')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('F18',"")
	->getStyle('F18')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('G18',"=E18/F18")
	->getStyle('G18')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('H18',"20%")
	->getStyle('H18')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('I18',"=G18*H18")
	->getStyle('I18')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	//Final Rating July to December
	->getActiveSheet()
	->setCellValue('I19',"=SUM(I17:I18)")
	->getStyle('I19')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN);

/////////////////////////////////////////////////////////////////////////////////////////////////

//JANUARY TO DECEMBER
$spreadsheet
	->getActiveSheet()
	->setCellValue('B27',"=SUM(B6,B15)")
	->getStyle('B27')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('C27',"=SUM(C6,C15)")
	->getStyle('C27')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('D27',"=SUM(D6,D15)")
	->getStyle('D27')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('E27',"=E6+E15")
	->getStyle('E27')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('F27',"=F6+F15")
	->getStyle('F27')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('G27',"")
	->getStyle('G27')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('H27',"")
	->getStyle('H27')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('I27',"")
	->getStyle('I27')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN);

//Core Funcction
$spreadsheet
	->getActiveSheet()
	->setCellValue('B28',"=SUM(B7,B16)")
	->getStyle('B28')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('C28',"=SUM(C7,C16)")
	->getStyle('C28')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('D28',"=SUM(D7,D16)")
	->getStyle('D28')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('E28',"=SUM(E7,E16)")
	->getStyle('E28')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('F28',"=F7+F16")
	->getStyle('F28')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('G28',"")
	->getStyle('G28')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('H28',"")
	->getStyle('H28')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('I28',"")
	->getStyle('I28')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN);

//SP+Core
$spreadsheet
	->getActiveSheet()
	->setCellValue('B29',"=SUM(B27:B28)")
	->getStyle('B29')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('C29',"=SUM(C27:C28)")
	->getStyle('C29')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('D29',"=SUM(D27:D28)")
	->getStyle('D29')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('E29',"=SUM(E27:E28)")
	->getStyle('E29')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('F29',"=SUM(F27:F28)")
	->getStyle('F29')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('G29',"=E29/F29")
	->getStyle('G29')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('H29',"80%")
	->getStyle('H29')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('I29',"=G29*H29")
	->getStyle('I29')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN);

//Support Function
$spreadsheet
	->getActiveSheet()
	->setCellValue('B30',"=SUM(B9,B18)")
	->getStyle('B30')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('C30',"=SUM(C9,C18)")
	->getStyle('C30')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('D30',"=SUM(D9,D18)")
	->getStyle('D30')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('E30',"=SUM(E9,E18)")
	->getStyle('E30')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('F30',"=SUM(F9,F18)")
	->getStyle('F30')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('G30',"=E30/F30")
	->getStyle('G30')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('H30',"20%")
	->getStyle('H30')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('I30',"=G30*H30")
	->getStyle('I30')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	//Final Rating January to December
	->getActiveSheet()
	->setCellValue('I31',"=SUM(I29:I30)")
	->getStyle('I31')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('I32',"")
	->getStyle('I32')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('I33',"")
	->getStyle('I33')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN);

?>