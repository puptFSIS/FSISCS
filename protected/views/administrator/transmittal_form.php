<?php 



require 'PhpWord/vendor/autoload.php';
$phpWord = new \PhpOffice\PhpWord\PhpWord();

$section = $phpWord->addSection();


$subsequent = $section->addHeader();
// $subsequent->addText(htmlspecialchars('Subsequent pages in Section 1 will Have this!'));
$subsequent->addImage('assets/puplogo.png', array('width' => 80, 'height' => 80));

//header
// $header = $section->addHeader();
// $header->firstPage();
// $table = $header->addTable();
// $table->addRow();
// $cell = $table->addCell(4500);
// $textrun = $cell->addTextRun();
// // $textrun->addText(htmlspecialchars('This is the header with '));
// // $textrun->addLink('http://google.com', htmlspecialchars('link to Google'));
// $table->addCell(4500)->addImage(
//     'assets/puplogo.png',
//     array('width' => 80, 'height' => 80, 'align' => 'left')
// );


// Adding Text element with font customized using explicitly created font style object...
$fontStyle = new \PhpOffice\PhpWord\Style\Font();
$fontStyle->setBold(false);
$fontStyle->setName('Times');
$fontStyle->setSize(10);
$myTextElement = $subsequent->addText('Republic of the Philippines', null, array('align'=>'center'));
$myTextElement1 = $subsequent->addText('POLYTECHNIC UNIVERSITY OF THE PHILIPPINES', null, array('align'=>'center'));
$myTextElement->setFontStyle($fontStyle);
$myTextElement1->setFontStyle($fontStyle);


// $section->addHeader()->addWatermark("assets/puplogo.png",
// array(
//     'width' => round(\PhpOffice\PhpWord\Shared\Converter::cmToPixel(0.5842)),
//     'height' => round(\PhpOffice\PhpWord\Shared\Converter::cmToPixel(2.1336)),
//     'positioning' => \PhpOffice\PhpWord\Style\Image::POSITION_ABSOLUTE,
//     'posHorizontal' => \PhpOffice\PhpWord\Style\Image::POSITION_ABSOLUTE,
//     'posVertical' => \PhpOffice\PhpWord\Style\Image::POSITION_ABSOLUTE,
//     'marginLeft' => round(\PhpOffice\PhpWord\Shared\Converter::cmToPixel(17)),
//     'marginTop' => round(\PhpOffice\PhpWord\Shared\Converter::cmToPixel(1.5)),
//     'wrappingStyle' => 'infront'
// ));

$section->addPageBreak();
$section->addPageBreak();












////////////////////////////////////////////////////////////////////////////////////////////
header("Content-Type: application/vnd.ms-word"); 
header("Expires: 0"); 
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("content-disposition: attachment;filename=Report.docx");


// Saving the document as OOXML file...
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
ob_clean();
$objWriter->save('php://output');
die;



 ?>