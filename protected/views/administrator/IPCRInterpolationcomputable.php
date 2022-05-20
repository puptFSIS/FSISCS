<?php 
use \PhpOffice\PhpSpreadsheet\Style\Border;
//Strategic Priority
$spreadsheet
	->getActiveSheet()
	->setCellValue('B6',"")
	->getStyle('B6')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('C6',"")
	->getStyle('C6')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('D6',"")
	->getStyle('D6')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('E6',"=SUM(B6:D6)")
	->getStyle('E6')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('F6',"")
	->getStyle('F6')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('G6',"")
	->getStyle('G6')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('H6',"")
	->getStyle('H6')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('I6',"")
	->getStyle('I6')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN);

//Core Funcction
$spreadsheet
	->getActiveSheet()
	->setCellValue('B7',"")
	->getStyle('B7')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('C7',"")
	->getStyle('C7')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('D7',"")
	->getStyle('D7')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('E7',"=SUM(B7:D7)")
	->getStyle('E7')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('F7',"")
	->getStyle('F7')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('G7',"")
	->getStyle('G7')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('H7',"")
	->getStyle('H7')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('I7',"")
	->getStyle('I7')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN);

//SP+Core
$spreadsheet
	->getActiveSheet()
	->setCellValue('B8',"=SUM(B6:B7)")
	->getStyle('B8')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('C8',"=SUM(C6:C7)")
	->getStyle('C8')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('D8',"=SUM(D6:D7)")
	->getStyle('D8')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('E8',"=SUM(E6:E7)")
	->getStyle('E8')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('F8',"")
	->getStyle('F8')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('G8',"=E8/F8")
	->getStyle('G8')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('H8',"80%")
	->getStyle('H8')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('I8',"=G8*H8")
	->getStyle('I8')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN);

//Support Function
$spreadsheet
	->getActiveSheet()
	->setCellValue('B9',"")
	->getStyle('B9')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('C9',"")
	->getStyle('C9')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('D9',"")
	->getStyle('D9')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('E9',"=SUM(B9:D9)")
	->getStyle('E9')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('F9',"")
	->getStyle('F9')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('G9',"=E9/F9")
	->getStyle('G9')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('H9',"20%")
	->getStyle('H9')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	->getActiveSheet()
	->setCellValue('I9',"=G9*H9")
	->getStyle('I9')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN)

	//Final Rating Jan-Jun
	->getActiveSheet()
	->setCellValue('I10',"=SUM(I8:I9)")
	->getStyle('I10')
	->getBorders()
	->getOutline()
	->setBorderStyle(Border::BORDER_THIN);
?>