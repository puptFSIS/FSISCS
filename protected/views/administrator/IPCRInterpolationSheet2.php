<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;

$myWorkSheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'IPCR');



$spreadsheet
	->addSheet($myWorkSheet, 0);
$spreadsheet
	->setActiveSheetIndex(0);

$spreadsheet
	->getActiveSheet()
	->setCellValue('A1',''.$firstname.' '.$middlename.' '.$surname.'')
	->setCellValue('A2',"HELLO");


?>