<?php
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
$cellStyletitle = $richtexttitle->createTextRun('January to June, '.$year.' IPCR');
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

$sql = "SELECT tbl_ipcr1.*,tbl_ipcraccomp.* FROM tbl_ipcr1 LEFT JOIN tbl_ipcraccomp ON tbl_ipcraccomp.id_ipcr1 = tbl_ipcr1.id AND tbl_ipcraccomp.FCode = '$fcode' WHERE tbl_ipcr1.part = 'sp' AND tbl_ipcr1.if_required = 'Required' AND tbl_ipcr1.year = '$year' AND tbl_ipcr1.deleted_on IS NULL ORDER BY tbl_ipcr1.id, tbl_ipcraccomp.id_ipcr1 ASC";
$results = mysqli_query($conn,$sql);
$count = mysqli_num_rows($results);

	$counts = $count + 5; //add 5 to the total number of count to align on proper cell

	$num = 1; //counter inside the loop
	for($i = 6; $i<= $counts; $i++)
	{
		$spreadsheet
			->getActiveSheet()
			->setCellValue('A'.$i.'',"Indicator/Output ".$num."")
			->getStyle('A'.$i.'')
			->getBorders()
			->getOutline()
		    ->setBorderStyle(Border::BORDER_THIN);
			$num++;		
	}
	// echo $i;
		$a = 6;	
		$query = "SELECT tbl_ipcr1.*,tbl_ipcraccomp.* FROM tbl_ipcr1 LEFT JOIN tbl_ipcraccomp ON tbl_ipcraccomp.id_ipcr1 = tbl_ipcr1.id AND tbl_ipcraccomp.FCode = '$fcode' WHERE tbl_ipcr1.part = 'sp' AND tbl_ipcr1.if_required = 'Required' AND tbl_ipcr1.year = '$year' AND tbl_ipcr1.deleted_on IS NULL ORDER BY tbl_ipcr1.id, tbl_ipcraccomp.id_ipcr1 ASC";
		$query_result = mysqli_query($conn,$query);
			
		while($row = mysqli_fetch_assoc($query_result))
		{
			$q = $row['rating_quality'];
			$e = $row['rating_efficiency'];
			$t = $row['rating_timeliness'];
			
			$spreadsheet
				->getActiveSheet()
				->setCellValue('B'.$a.'',"".$q."")
				->getStyle('B'.$a.'')
				->getBorders()
			    ->getOutline()
			    ->setBorderStyle(Border::BORDER_THIN)
			    ->getActiveSheet()
				->getStyle('B'.$a.'')
			    ->getAlignment()
			    ->setHorizontal('center')

			    ->getActiveSheet()
				->setCellValue('C'.$a.'',"".$e."")
				->getStyle('C'.$a.'')
				->getBorders()
			    ->getOutline()
			    ->setBorderStyle(Border::BORDER_THIN)
			    ->getActiveSheet()
				->getStyle('C'.$a.'')
			    ->getAlignment()
			    ->setHorizontal('center')

			    ->getActiveSheet()
				->setCellValue('D'.$a.'',"".$t."")
				->getStyle('D'.$a.'')
				->getBorders()
			    ->getOutline()
			    ->setBorderStyle(Border::BORDER_THIN)
			    ->getActiveSheet()
				->getStyle('D'.$a.'')
			    ->getAlignment()
			    ->setHorizontal('center');
			    $a++;
		}
		$col = $i - 1; //Get the latest value of i and deminish by 1 to get the sum of 

$spreadsheet
	->getActiveSheet()
	->setCellValue('A'.$a.'',"Total Points")
	->getStyle('A'.$a.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('A'.$a.'')
    ->getAlignment()
    ->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('B'.$a.'',"=SUM(B6:B".$col.")")
	->getStyle('B'.$a.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('B'.$a.'')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('C'.$a.'',"=SUM(C6:C".$col.")")
	->getStyle('C'.$a.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('C'.$a.'')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('D'.$a.'',"=SUM(D6:D".$col.")")
	->getStyle('D'.$a.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('D'.$a.'')
    ->getAlignment()
    ->setHorizontal('center');

$b = $a + 1; //cell column

$cols = $a - 1; //cell column for range computation	

$spreadsheet
	->getActiveSheet()
	->setCellValue('A'.$b.'',"No. of Item Ratings")
	->getStyle('A'.$b.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('A'.$b.'')
    ->getAlignment()
    ->setHorizontal('center');


	$spreadsheet
	->getActiveSheet()
	->setCellValue('B'.$b.'',"=COUNTA(B6:B".$cols.")")
	->getStyle('B'.$b.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('B'.$b.'')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('C'.$b.'',"=COUNTA(C6:C".$cols.")")
	->getStyle('C'.$b.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('C'.$b.'')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('D'.$b.'',"=COUNTA(D6:D".$cols.")")
	->getStyle('D'.$b.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('D'.$b.'')
    ->getAlignment()
    ->setHorizontal('center');
	

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //CORE FUNCTION
$c = $b + 2; //get the latest cell column add by 2


$merge = $c + 1; //use to merge on Cell A4:A5
$richtextcf = new RichText(); 
$cellstylecf = $richtextcf->createTextRun('Core Function');
$cellstylecf->getFont()->setBold(true)->setSize(8);

//Place the text inside the Cell
$spreadsheet
	->getActiveSheet()
    ->mergeCells('A'.$c.':A'.$merge.'')
    ->getStyle('A'.$c.':A'.$merge.'')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getCell('A'.$c.'')
	->setValue($richtextcf)
	->getStyle('A'.$c.'')
    ->getAlignment()
    ->setHorizontal('center')
    ->setVertical('center');



$richtextcf1 = new RichText(); 
$cellstylecf1 = $richtextcf1->createTextRun('Points Earned');
$cellstylecf1->getFont()->setBold(true)->setSize(8);

$spreadsheet
	->getActiveSheet()
	->mergeCells('B'.$c.':D'.$c.'')
	->getStyle('B'.$c.':D'.$c.'')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
    ->getCell('B'.$c.'')
	->setValue($richtextcf1)
	->getStyle('B'.$c.'')
    ->getAlignment()
    ->setHorizontal('center');

$d = $c + 1;
$spreadsheet
	->getActiveSheet()
	->setCellValue('B'.$d.'',"Q")
	->getStyle('B'.$d.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('B'.$d.'')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('C'.$d.'',"E")
	->getStyle('C'.$d.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('C'.$d.'')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('D'.$d.'',"T")
	->getStyle('D'.$d.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('D'.$d.'')
    ->getAlignment()
    ->setHorizontal('center');

    $sqlcf = "SELECT tbl_ipcr1.*,tbl_ipcraccomp.* FROM tbl_ipcr1 LEFT JOIN tbl_ipcraccomp ON tbl_ipcraccomp.id_ipcr1 = tbl_ipcr1.id AND tbl_ipcraccomp.FCode = '$fcode' WHERE tbl_ipcr1.part = 'cf' AND tbl_ipcr1.if_required = 'Required' AND tbl_ipcr1.year = '$year' AND tbl_ipcr1.deleted_on IS NULL ORDER BY tbl_ipcr1.id, tbl_ipcraccomp.id_ipcr1 ASC";
	$resultscf = mysqli_query($conn,$sqlcf);
	$countcf = mysqli_num_rows($resultscf); //4
	
	$cellcf = $i + 5; //get the $i which is the previous variable for column and add 5 column to align.

	$numcf = 1; // counter for Indicator/output
	for($j = $cellcf ; $j < $countcf + $cellcf; $j++)
	{
		
		$spreadsheet
			->getActiveSheet()
			->setCellValue('A'.$j.'',"Indicator/Output ".$numcf."")
			->getStyle('A'.$j.'')
			->getBorders()
			->getOutline()
		    ->setBorderStyle(Border::BORDER_THIN);
		    $numcf++;
					
	}
		$cell_loop = $cellcf;
		$querycf = "SELECT tbl_ipcr1.*,tbl_ipcraccomp.* FROM tbl_ipcr1 LEFT JOIN tbl_ipcraccomp ON tbl_ipcraccomp.id_ipcr1 = tbl_ipcr1.id AND tbl_ipcraccomp.FCode = '$fcode' WHERE tbl_ipcr1.part = 'cf' AND tbl_ipcr1.if_required = 'Required' AND tbl_ipcr1.year = '$year' AND tbl_ipcr1.deleted_on IS NULL ORDER BY tbl_ipcr1.id, tbl_ipcraccomp.id_ipcr1 ASC";
		$query_resultcf = mysqli_query($conn,$querycf);
		
		while($row = mysqli_fetch_assoc($query_resultcf))
		{
			
			$q = $row['rating_quality'];
			$e = $row['rating_efficiency'];
			$t = $row['rating_timeliness'];
			
			$spreadsheet
				->getActiveSheet()
				->setCellValue('B'.$cell_loop.'',"".$q."")
				->getStyle('B'.$cell_loop.'')
				->getBorders()
			    ->getOutline()
			    ->setBorderStyle(Border::BORDER_THIN)
			    ->getActiveSheet()
				->getStyle('B'.$cell_loop.'')
			    ->getAlignment()
			    ->setHorizontal('center')

			    ->getActiveSheet()
				->setCellValue('C'.$cell_loop.'',"".$e."")
				->getStyle('C'.$cell_loop.'')
				->getBorders()
			    ->getOutline()
			    ->setBorderStyle(Border::BORDER_THIN)
			    ->getActiveSheet()
				->getStyle('C'.$cell_loop.'')
			    ->getAlignment()
			    ->setHorizontal('center')

			    ->getActiveSheet()
				->setCellValue('D'.$cell_loop.'',"".$t."")
				->getStyle('D'.$cell_loop.'')
				->getBorders()
			    ->getOutline()
			    ->setBorderStyle(Border::BORDER_THIN)
			    ->getActiveSheet()
				->getStyle('D'.$cell_loop.'')
			    ->getAlignment()
			    ->setHorizontal('center');
			    $cell_loop++;
		}
	
$cell_loop_new = $cell_loop - 1;
$spreadsheet
	->getActiveSheet()
	->setCellValue('A'.$j.'',"Total Points")
	->getStyle('A'.$j.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('A'.$j.'')
    ->getAlignment()
    ->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('B'.$j.'',"=SUM(B".$cellcf.":B".$cell_loop_new.")")
	->getStyle('B'.$j.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('B'.$j.'')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('C'.$j.'',"=SUM(C".$cellcf.":C".$cell_loop_new.")")
	->getStyle('C'.$j.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('C'.$j.'')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('D'.$j.'',"=SUM(D".$cellcf.":D".$cell_loop_new.")")
	->getStyle('D'.$j.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('D'.$j.'')
    ->getAlignment()
    ->setHorizontal('center');


$j2 = $j + 1; //Add +1 column to the latest column 


$spreadsheet
	->getActiveSheet()
	->setCellValue('A'.$j2.'',"No. of Item Ratings")
	->getStyle('A'.$j2.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('A'.$j2.'')
    ->getAlignment()
    ->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('B'.$j2.'',"=COUNTA(B".$cellcf.":B".$cell_loop_new.")")
	->getStyle('B'.$j2.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('B'.$j2.'')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('C'.$j2.'',"=COUNTA(C".$cellcf.":C".$cell_loop_new.")")
	->getStyle('C'.$j2.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('C'.$j2.'')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('D'.$j2.'',"=COUNTA(D".$cellcf.":D".$cell_loop_new.")")
	->getStyle('D'.$j2.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('D'.$j2.'')
    ->getAlignment()
    ->setHorizontal('center');

 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //SUPPORT FUNCION
// echo $j2;
// die;

$d = $j2 + 2; //get the latest cell column add by 2


$mergecell = $d + 1; //use to merge on Cell A4:A5
$richtextsf = new RichText(); 
$cellstylesf = $richtextsf->createTextRun('Support Function');
$cellstylesf->getFont()->setBold(true)->setSize(8);

//Place the text inside the Cell
$spreadsheet
	->getActiveSheet()
    ->mergeCells('A'.$d.':A'.$mergecell.'')
    ->getStyle('A'.$d.':A'.$mergecell.'')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getCell('A'.$d.'')
	->setValue($richtextsf)
	->getStyle('A'.$d.'')
    ->getAlignment()
    ->setHorizontal('center')
    ->setVertical('center');



$richtextsf1 = new RichText(); 
$cellstylesf1 = $richtextsf1->createTextRun('Points Earned');
$cellstylesf1->getFont()->setBold(true)->setSize(8);

$spreadsheet
	->getActiveSheet()
	->mergeCells('B'.$d.':D'.$d.'')
	->getStyle('B'.$d.':D'.$d.'')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
    ->getCell('B'.$d.'')
	->setValue($richtextsf1)
	->getStyle('B'.$d.'')
    ->getAlignment()
    ->setHorizontal('center');

$e = $d + 1;
$spreadsheet
	->getActiveSheet()
	->setCellValue('B'.$e.'',"Q")
	->getStyle('B'.$e.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('B'.$e.'')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('C'.$e.'',"E")
	->getStyle('C'.$e.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('C'.$e.'')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('D'.$e.'',"T")
	->getStyle('D'.$e.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('D'.$e.'')
    ->getAlignment()
    ->setHorizontal('center');

    $sqlsf = "SELECT tbl_ipcr1.*,tbl_ipcraccomp.* FROM tbl_ipcr1 LEFT JOIN tbl_ipcraccomp ON tbl_ipcraccomp.id_ipcr1 = tbl_ipcr1.id AND tbl_ipcraccomp.FCode = '$fcode' WHERE tbl_ipcr1.part = 'sf' AND tbl_ipcr1.if_required = 'Required' AND tbl_ipcr1.year = '$year' AND tbl_ipcr1.deleted_on IS NULL ORDER BY tbl_ipcr1.id, tbl_ipcraccomp.id_ipcr1 ASC";
	$resultssf = mysqli_query($conn,$sqlsf);
	$countsf = mysqli_num_rows($resultssf); //4
	
	$cellsf = $j + 5; //get the $i which is the previous variable for column and add 5 column to align.
	// echo $cellsf;
	// die;
	$numsf = 1; // counter for Indicator/output
	for($k = $cellsf ; $k < $countsf + $cellsf; $k++)
	{
		
		$spreadsheet
			->getActiveSheet()
			->setCellValue('A'.$k.'',"Indicator/Output ".$numsf."")
			->getStyle('A'.$k.'')
			->getBorders()
			->getOutline()
		    ->setBorderStyle(Border::BORDER_THIN);
		    $numsf++;
					
	}
// 	// echo $countscftable;
// 	// echo $j;
// 	// echo $cell;
// 	  // die;
// 	// 	$new = $j;
// 	// 	echo $new;
		$cell_loop_sf = $cellsf;
		$querysf = "SELECT tbl_ipcr1.*,tbl_ipcraccomp.* FROM tbl_ipcr1 LEFT JOIN tbl_ipcraccomp ON tbl_ipcraccomp.id_ipcr1 = tbl_ipcr1.id AND tbl_ipcraccomp.FCode = '$fcode' WHERE tbl_ipcr1.part = 'sf' AND tbl_ipcr1.if_required = 'Required' AND tbl_ipcr1.year = '$year' AND tbl_ipcr1.deleted_on IS NULL ORDER BY tbl_ipcr1.id, tbl_ipcraccomp.id_ipcr1 ASC";
		$query_resultsf = mysqli_query($conn,$querysf);
		
		while($row = mysqli_fetch_assoc($query_resultsf))
		{
			
			$q = $row['rating_quality'];
			$e = $row['rating_efficiency'];
			$t = $row['rating_timeliness'];
			
			$spreadsheet
				->getActiveSheet()
				->setCellValue('B'.$cell_loop_sf.'',"".$q."")
				->getStyle('B'.$cell_loop_sf.'')
				->getBorders()
			    ->getOutline()
			    ->setBorderStyle(Border::BORDER_THIN)
			    ->getActiveSheet()
				->getStyle('B'.$cell_loop_sf.'')
			    ->getAlignment()
			    ->setHorizontal('center')

			    ->getActiveSheet()
				->setCellValue('C'.$cell_loop_sf.'',"".$e."")
				->getStyle('C'.$cell_loop_sf.'')
				->getBorders()
			    ->getOutline()
			    ->setBorderStyle(Border::BORDER_THIN)
			    ->getActiveSheet()
				->getStyle('C'.$cell_loop_sf.'')
			    ->getAlignment()
			    ->setHorizontal('center')

			    ->getActiveSheet()
				->setCellValue('D'.$cell_loop_sf.'',"".$t."")
				->getStyle('D'.$cell_loop_sf.'')
				->getBorders()
			    ->getOutline()
			    ->setBorderStyle(Border::BORDER_THIN)
			    ->getActiveSheet()
				->getStyle('D'.$cell_loop_sf.'')
			    ->getAlignment()
			    ->setHorizontal('center');
			    $cell_loop_sf++;
		}

$cell_loop_sf_new = $cell_loop_sf - 1;
$spreadsheet
	->getActiveSheet()
	->setCellValue('A'.$k.'',"Total Points")
	->getStyle('A'.$k.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('A'.$k.'')
    ->getAlignment()
    ->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('B'.$k.'',"=SUM(B".$cellsf.":B".$cell_loop_sf_new.")")
	->getStyle('B'.$k.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('B'.$k.'')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('C'.$k.'',"=SUM(C".$cellsf.":C".$cell_loop_sf_new.")")
	->getStyle('C'.$k.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('C'.$k.'')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('D'.$k.'',"=SUM(D".$cellsf.":D".$cell_loop_sf_new.")")
	->getStyle('D'.$k.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('D'.$k.'')
    ->getAlignment()
    ->setHorizontal('center');


$cell_itemRating = $k + 1; //Add +1 column to the latest column 

// $cell_loop_new = $cell_loop - 1;
$spreadsheet
	->getActiveSheet()
	->setCellValue('A'.$cell_itemRating.'',"No. of Item Ratings")
	->getStyle('A'.$cell_itemRating.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('A'.$cell_itemRating.'')
    ->getAlignment()
    ->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('B'.$cell_itemRating.'',"=COUNTA(B".$cellsf.":B".$cell_loop_sf_new.")")
	->getStyle('B'.$cell_itemRating.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('B'.$cell_itemRating.'')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('C'.$cell_itemRating.'',"=COUNTA(C".$cellsf.":C".$cell_loop_sf_new.")")
	->getStyle('C'.$cell_itemRating.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('C'.$cell_itemRating.'')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('D'.$cell_itemRating.'',"=COUNTA(D".$cellsf.":D".$cell_loop_sf_new.")")
	->getStyle('D'.$cell_itemRating.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('D'.$cell_itemRating.'')
    ->getAlignment()
    ->setHorizontal('center');




/////////////////////////////////////////////////////////////////////////////
$spreadsheet
	->getActiveSheet()
	->mergeCells('F2:I2');

$richtexttitle = new RichText();
//ichtext->createText('Name of Individual Performer: ');
$cellStyletitle = $richtexttitle->createTextRun('July to December, '.$year.' IPCR');
$cellStyletitle->getFont()->setBold(true)->setSize(8);

$spreadsheet
	->getActiveSheet()
	->setCellValue('F2',$richtexttitle)
	->getStyle('F2')
    ->getAlignment()
	->setHorizontal('center');

include('IPCRInterpolationSheet2JD.php');

?>