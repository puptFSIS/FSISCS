<?php 



require 'PhpWord/vendor/autoload.php';
$phpWord = new \PhpOffice\PhpWord\PhpWord();




// $subsequent = $section->addHeader();
// // $subsequent->addText(htmlspecialchars('Subsequent pages in Section 1 will Have this!'));
// $subsequent->addImage('assets/puplogo.png', array('width' => 80, 'height' => 80));



// New portrait section
$section = $phpWord->addSection(array('borderColor' => '00FF00', 'borderSize' => 12));
$section->addText('I am placed on a default section.');

// New landscape section
$section = $phpWord->addSection(array('orientation' => 'landscape'));
$section->addText('I am placed on a landscape section. Every page starting from this section will be landscape style.');
$section->addPageBreak();
$section->addPageBreak();

// New portrait section
$section = $phpWord->addSection(
    array('paperSize' => 'Folio', 'marginLeft' => 600, 'marginRight' => 600, 'marginTop' => 600, 'marginBottom' => 600)
);
$section->addText('This section uses other margins with folio papersize.');

// The text of this section is vertically centered
$section = $phpWord->addSection(
    array('vAlign' => VerticalJc::CENTER)
);
$section->addText('This section is vertically centered.');

// New portrait section with Header & Footer
$section = $phpWord->addSection(
    array(
        'marginLeft'   => 200,
        'marginRight'  => 200,
        'marginTop'    => 200,
        'marginBottom' => 200,
        'headerHeight' => 50,
        'footerHeight' => 50,
    )
);
$section->addText('This section and we play with header/footer height.');
$section->addHeader()->addText('Header');
$section->addFooter()->addText('Footer');












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