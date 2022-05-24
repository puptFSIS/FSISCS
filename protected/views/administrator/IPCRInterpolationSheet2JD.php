<?php 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use \PhpOffice\PhpSpreadsheet\RichText\RichText;
use \PhpOffice\PhpSpreadsheet\Style\Border;
use \PhpOffice\PhpSpreadsheet\Style\Color;
use \PhpOffice\PhpSpreadsheet\Style\Fill;

	$richtext2 = new RichText(); 
	$cellstyle2 = $richtext2->createTextRun('Strategic Priority');
	$cellstyle2->getFont()->setBold(true)->setSize(8);

$spreadsheet
	->getActiveSheet()
	->getColumnDimension('F')
	->setAutoSize(true);

//Place the text inside the Cell
$spreadsheet
	->getActiveSheet()
   ->mergeCells('F4:F5')
   ->getStyle('F4:F5')
   ->getBorders()
   ->getOutline()
   ->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getCell('F4')
	->setValue($richtext2)
	->getStyle('F4')
   ->getAlignment()
   ->setHorizontal('center')
   ->setVertical('center');

$richtext3 = new RichText(); 
$cellstyle3 = $richtext3->createTextRun('Points Earned');
$cellstyle3->getFont()->setBold(true)->setSize(8);

$spreadsheet
	->getActiveSheet()
	->mergeCells('G4:I4')
	->getStyle('G4:I4')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
    ->getCell('G4')
	->setValue($richtext3)
	->getStyle('G4')
    ->getAlignment()
    ->setHorizontal('center');

$spreadsheet
	->getActiveSheet()
	->setCellValue('G5',"Q")
	->getStyle('G5')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('G5')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('H5',"E")
	->getStyle('H5')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('H5')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('I5',"T")
	->getStyle('I5')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('I5')
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
// foreach(range('F', 3) as $i) {
//    $sheet -> setCellValueByColumnAndRow($i, 6, 'Indicator/Output');
// }

$sql = "SELECT tbl_ipcr2.*,tbl_ipcraccomp.* FROM tbl_ipcr2 LEFT JOIN tbl_ipcraccomp ON tbl_ipcraccomp.id_ipcr2 = tbl_ipcr2.id AND tbl_ipcraccomp.FCode = '$fcode' WHERE tbl_ipcr2.part = 'sp' AND tbl_ipcr2.if_required = 'Required' AND tbl_ipcr2.month = 'JD' AND tbl_ipcr2.year = '$year' AND tbl_ipcr2.deleted_on IS NULL ORDER BY tbl_ipcr2.id, tbl_ipcraccomp.id_ipcr2 ASC";
$results = mysqli_query($conn,$sql);
$countJD = mysqli_num_rows($results);

	$counts = $countJD + 5;
	
	$num = 1; //counter inside for loop
	for($i = 6; $i<= $counts; $i++)
	{
		$spreadsheet
			->getActiveSheet()
			->setCellValue('F'.$i.'',"Indicator/Output ".$num."")
			->getStyle('F'.$i.'')
			->getBorders()
			->getOutline()
		    ->setBorderStyle(Border::BORDER_THIN);
			$num++;		
	}
	
	// echo $i;
		$a = 6;	
		$query = "SELECT tbl_ipcr2.*,tbl_ipcraccomp.* FROM tbl_ipcr2 LEFT JOIN tbl_ipcraccomp ON tbl_ipcraccomp.id_ipcr2 = tbl_ipcr2.id AND tbl_ipcraccomp.FCode = '$fcode' WHERE tbl_ipcr2.part = 'sp' AND tbl_ipcr2.if_required = 'Required' AND tbl_ipcr2.month = 'JD' AND tbl_ipcr2.year = '$year' AND tbl_ipcr2.deleted_on IS NULL ORDER BY tbl_ipcr2.id, tbl_ipcraccomp.id_ipcr2 ASC";
		$query_result = mysqli_query($conn,$query);
			
		while($row = mysqli_fetch_assoc($query_result))
		{
			$q = $row['rating_quality'];
			$e = $row['rating_efficiency'];
			$t = $row['rating_timeliness'];
			
			$spreadsheet
				->getActiveSheet()
				->setCellValue('G'.$a.'',"".$q."")
				->getStyle('G'.$a.'')
				->getBorders()
			    ->getOutline()
			    ->setBorderStyle(Border::BORDER_THIN)
			    ->getActiveSheet()
				->getStyle('G'.$a.'')
			    ->getAlignment()
			    ->setHorizontal('center')

			    ->getActiveSheet()
				->setCellValue('H'.$a.'',"".$e."")
				->getStyle('H'.$a.'')
				->getBorders()
			    ->getOutline()
			    ->setBorderStyle(Border::BORDER_THIN)
			    ->getActiveSheet()
				->getStyle('H'.$a.'')
			    ->getAlignment()
			    ->setHorizontal('center')

			    ->getActiveSheet()
				->setCellValue('I'.$a.'',"".$t."")
				->getStyle('I'.$a.'')
				->getBorders()
			    ->getOutline()
			    ->setBorderStyle(Border::BORDER_THIN)
			    ->getActiveSheet()
				->getStyle('I'.$a.'')
			    ->getAlignment()
			    ->setHorizontal('center');
			    $a++;
		}
		
		// echo $a;
		// die;
		$col = $i - 1;
// echo $col; 
// echo $i; 
// 		die;
$spreadsheet
	->getActiveSheet()
	->setCellValue('F'.$a.'',"Total Points")
	->getStyle('F'.$a.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('F'.$a.'')
    ->getAlignment()
    ->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('G'.$a.'',"=SUM(G6:G".$col.")")
	->getStyle('G'.$a.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('G'.$a.'')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('H'.$a.'',"=SUM(H6:H".$col.")")
	->getStyle('H'.$a.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('H'.$a.'')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('I'.$a.'',"=SUM(I6:I".$col.")")
	->getStyle('I'.$a.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('I'.$a.'')
    ->getAlignment()
    ->setHorizontal('center');


$b = $a + 1; //cell column
$cols = $a - 1; //cell column for range computation
$spreadsheet
	->getActiveSheet()
	->setCellValue('F'.$b.'',"No. of Item Ratings")
	->getStyle('F'.$b.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('F'.$b.'')
    ->getAlignment()
    ->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('G'.$b.'',"=COUNTA(G6:G".$col.")")
	->getStyle('G'.$b.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('G'.$b.'')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('H'.$b.'',"=COUNTA(H6:H".$col.")")
	->getStyle('H'.$b.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('H'.$b.'')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('I'.$b.'',"=COUNTA(I6:I".$col.")")
	->getStyle('I'.$b.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('I'.$b.'')
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
    ->mergeCells('F'.$c.':F'.$merge.'')
    ->getStyle('F'.$c.':F'.$merge.'')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getCell('F'.$c.'')
	->setValue($richtextcf)
	->getStyle('F'.$c.'')
    ->getAlignment()
    ->setHorizontal('center')
    ->setVertical('center');



$richtextcf1 = new RichText(); 
$cellstylecf1 = $richtextcf1->createTextRun('Points Earned');
$cellstylecf1->getFont()->setBold(true)->setSize(8);

$spreadsheet
	->getActiveSheet()
	->mergeCells('G'.$c.':I'.$c.'')
	->getStyle('G'.$c.':I'.$c.'')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
    ->getCell('G'.$c.'')
	->setValue($richtextcf1)
	->getStyle('G'.$c.'')
    ->getAlignment()
    ->setHorizontal('center');

$d = $c + 1;
$spreadsheet
	->getActiveSheet()
	->setCellValue('G'.$d.'',"Q")
	->getStyle('G'.$d.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('G'.$d.'')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('H'.$d.'',"E")
	->getStyle('H'.$d.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('H'.$d.'')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('I'.$d.'',"T")
	->getStyle('I'.$d.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('I'.$d.'')
    ->getAlignment()
    ->setHorizontal('center');

    $sqlcf = "SELECT tbl_ipcr2.*,tbl_ipcraccomp.* FROM tbl_ipcr2 LEFT JOIN tbl_ipcraccomp ON tbl_ipcraccomp.id_ipcr2 = tbl_ipcr2.id AND tbl_ipcraccomp.FCode = '$fcode' WHERE tbl_ipcr2.part = 'cf' AND tbl_ipcr2.if_required = 'Required' AND tbl_ipcr2.month = 'JD' AND tbl_ipcr2.year = '$year' AND tbl_ipcr2.deleted_on IS NULL ORDER BY tbl_ipcr2.id, tbl_ipcraccomp.id_ipcr2 ASC";
	$resultscf = mysqli_query($conn,$sqlcf);
	$countcf = mysqli_num_rows($resultscf); //4
	
	$cellcf = $i + 5; //get the $i which is the previous variable for column and add 5 column to align.

	$numcf = 1; // counter for Indicator/output
	for($j = $cellcf ; $j < $countcf + $cellcf; $j++)
	{
		
		$spreadsheet
			->getActiveSheet()
			->setCellValue('F'.$j.'',"Indicator/Output ".$numcf."")
			->getStyle('F'.$j.'')
			->getBorders()
			->getOutline()
		    ->setBorderStyle(Border::BORDER_THIN);
		    $numcf++;
					
	}
	// echo $countscftable;
	// echo $j;
	// echo $cell;
	  // die;
	// 	$new = $j;
	// 	echo $new;
		$cell_loop = $cellcf;
		$querycf = "SELECT tbl_ipcr2.*,tbl_ipcraccomp.* FROM tbl_ipcr2 LEFT JOIN tbl_ipcraccomp ON tbl_ipcraccomp.id_ipcr2 = tbl_ipcr2.id AND tbl_ipcraccomp.FCode = '$fcode' WHERE tbl_ipcr2.part = 'cf' AND tbl_ipcr2.if_required = 'Required' AND tbl_ipcr2.month = 'JD' AND tbl_ipcr2.year = '$year' AND tbl_ipcr2.deleted_on IS NULL ORDER BY tbl_ipcr2.id, tbl_ipcraccomp.id_ipcr2 ASC";
		$query_resultcf = mysqli_query($conn,$querycf);
		
		while($row = mysqli_fetch_assoc($query_resultcf))
		{
			
			$q = $row['rating_quality'];
			$e = $row['rating_efficiency'];
			$t = $row['rating_timeliness'];
			
			$spreadsheet
				->getActiveSheet()
				->setCellValue('G'.$cell_loop.'',"".$q."")
				->getStyle('G'.$cell_loop.'')
				->getBorders()
			    ->getOutline()
			    ->setBorderStyle(Border::BORDER_THIN)
			    ->getActiveSheet()
				->getStyle('G'.$cell_loop.'')
			    ->getAlignment()
			    ->setHorizontal('center')

			    ->getActiveSheet()
				->setCellValue('H'.$cell_loop.'',"".$e."")
				->getStyle('H'.$cell_loop.'')
				->getBorders()
			    ->getOutline()
			    ->setBorderStyle(Border::BORDER_THIN)
			    ->getActiveSheet()
				->getStyle('H'.$cell_loop.'')
			    ->getAlignment()
			    ->setHorizontal('center')

			    ->getActiveSheet()
				->setCellValue('I'.$cell_loop.'',"".$t."")
				->getStyle('I'.$cell_loop.'')
				->getBorders()
			    ->getOutline()
			    ->setBorderStyle(Border::BORDER_THIN)
			    ->getActiveSheet()
				->getStyle('I'.$cell_loop.'')
			    ->getAlignment()
			    ->setHorizontal('center');
			    $cell_loop++;
		}
	
$cell_loop_new = $cell_loop - 1;
$spreadsheet
	->getActiveSheet()
	->setCellValue('F'.$j.'',"Total Points")
	->getStyle('F'.$j.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('F'.$j.'')
    ->getAlignment()
    ->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('G'.$j.'',"=SUM(G".$cellcf.":G".$cell_loop_new.")")
	->getStyle('G'.$j.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('G'.$j.'')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('H'.$j.'',"=SUM(H".$cellcf.":H".$cell_loop_new.")")
	->getStyle('H'.$j.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('H'.$j.'')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('I'.$j.'',"=SUM(I".$cellcf.":I".$cell_loop_new.")")
	->getStyle('I'.$j.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('I'.$j.'')
    ->getAlignment()
    ->setHorizontal('center');


$j2 = $j + 1; //Add +1 column to the latest column 


$spreadsheet
	->getActiveSheet()
	->setCellValue('F'.$j2.'',"No. of Item Ratings")
	->getStyle('F'.$j2.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('F'.$j2.'')
    ->getAlignment()
    ->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('G'.$j2.'',"=COUNTA(G".$cellcf.":G".$cell_loop_new.")")
	->getStyle('G'.$j2.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('G'.$j2.'')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('H'.$j2.'',"=COUNTA(H".$cellcf.":H".$cell_loop_new.")")
	->getStyle('H'.$j2.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('H'.$j2.'')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('I'.$j2.'',"=COUNTA(I".$cellcf.":I".$cell_loop_new.")")
	->getStyle('I'.$j2.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('I'.$j2.'')
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
    ->mergeCells('F'.$d.':F'.$mergecell.'')
    ->getStyle('F'.$d.':F'.$mergecell.'')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
	->getActiveSheet()
	->getCell('F'.$d.'')
	->setValue($richtextsf)
	->getStyle('F'.$d.'')
    ->getAlignment()
    ->setHorizontal('center')
    ->setVertical('center');



$richtextsf1 = new RichText(); 
$cellstylesf1 = $richtextsf1->createTextRun('Points Earned');
$cellstylesf1->getFont()->setBold(true)->setSize(8);

$spreadsheet
	->getActiveSheet()
	->mergeCells('G'.$d.':I'.$d.'')
	->getStyle('G'.$d.':I'.$d.'')
    ->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
    ->getCell('G'.$d.'')
	->setValue($richtextsf1)
	->getStyle('G'.$d.'')
    ->getAlignment()
    ->setHorizontal('center');

$e = $d + 1;
$spreadsheet
	->getActiveSheet()
	->setCellValue('G'.$e.'',"Q")
	->getStyle('G'.$e.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('G'.$e.'')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('H'.$e.'',"E")
	->getStyle('H'.$e.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('H'.$e.'')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('I'.$e.'',"T")
	->getStyle('I'.$e.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('I'.$e.'')
    ->getAlignment()
    ->setHorizontal('center');

    $sqlsf = "SELECT tbl_ipcr2.*,tbl_ipcraccomp.* FROM tbl_ipcr2 LEFT JOIN tbl_ipcraccomp ON tbl_ipcraccomp.id_ipcr2 = tbl_ipcr2.id AND tbl_ipcraccomp.FCode = '$fcode' WHERE tbl_ipcr2.part = 'sf' AND tbl_ipcr2.if_required = 'Required' AND tbl_ipcr2.month = 'JD' AND tbl_ipcr2.year = '$year' AND tbl_ipcr2.deleted_on IS NULL ORDER BY tbl_ipcr2.id, tbl_ipcraccomp.id_ipcr2 ASC";
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
			->setCellValue('F'.$k.'',"Indicator/Output ".$numsf."")
			->getStyle('F'.$k.'')
			->getBorders()
			->getOutline()
		    ->setBorderStyle(Border::BORDER_THIN);
		    $numsf++;
					
	}

		$cell_loop_sf = $cellsf;
		$querysf = "SELECT tbl_ipcr2.*,tbl_ipcraccomp.* FROM tbl_ipcr2 LEFT JOIN tbl_ipcraccomp ON tbl_ipcraccomp.id_ipcr2 = tbl_ipcr2.id AND tbl_ipcraccomp.FCode = '$fcode' WHERE tbl_ipcr2.part = 'sf' AND tbl_ipcr2.if_required = 'Required' AND tbl_ipcr2.month = 'JD' AND tbl_ipcr2.year = '$year' AND tbl_ipcr2.deleted_on IS NULL ORDER BY tbl_ipcr2.id, tbl_ipcraccomp.id_ipcr2 ASC";
		$query_resultsf = mysqli_query($conn,$querysf);
		
		while($row = mysqli_fetch_assoc($query_resultsf))
		{
			
			$q = $row['rating_quality'];
			$e = $row['rating_efficiency'];
			$t = $row['rating_timeliness'];
			
			$spreadsheet
				->getActiveSheet()
				->setCellValue('G'.$cell_loop_sf.'',"".$q."")
				->getStyle('G'.$cell_loop_sf.'')
				->getBorders()
			    ->getOutline()
			    ->setBorderStyle(Border::BORDER_THIN)
			    ->getActiveSheet()
				->getStyle('G'.$cell_loop_sf.'')
			    ->getAlignment()
			    ->setHorizontal('center')

			    ->getActiveSheet()
				->setCellValue('H'.$cell_loop_sf.'',"".$e."")
				->getStyle('H'.$cell_loop_sf.'')
				->getBorders()
			    ->getOutline()
			    ->setBorderStyle(Border::BORDER_THIN)
			    ->getActiveSheet()
				->getStyle('H'.$cell_loop_sf.'')
			    ->getAlignment()
			    ->setHorizontal('center')

			    ->getActiveSheet()
				->setCellValue('I'.$cell_loop_sf.'',"".$t."")
				->getStyle('I'.$cell_loop_sf.'')
				->getBorders()
			    ->getOutline()
			    ->setBorderStyle(Border::BORDER_THIN)
			    ->getActiveSheet()
				->getStyle('I'.$cell_loop_sf.'')
			    ->getAlignment()
			    ->setHorizontal('center');
			    $cell_loop_sf++;
		}

$cell_loop_sf_new = $cell_loop_sf - 1;
$spreadsheet
	->getActiveSheet()
	->setCellValue('F'.$k.'',"Total Points")
	->getStyle('F'.$k.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('F'.$k.'')
    ->getAlignment()
    ->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('G'.$k.'',"=SUM(G".$cellsf.":G".$cell_loop_sf_new.")")
	->getStyle('G'.$k.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('G'.$k.'')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('H'.$k.'',"=SUM(H".$cellsf.":H".$cell_loop_sf_new.")")
	->getStyle('H'.$k.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('H'.$k.'')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('I'.$k.'',"=SUM(I".$cellsf.":I".$cell_loop_sf_new.")")
	->getStyle('I'.$k.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('I'.$k.'')
    ->getAlignment()
    ->setHorizontal('center');


$cell_itemRating = $k + 1; //Add +1 column to the latest column 

// $cell_loop_new = $cell_loop - 1;
$spreadsheet
	->getActiveSheet()
	->setCellValue('F'.$cell_itemRating.'',"No. of Item Ratings")
	->getStyle('F'.$cell_itemRating.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('F'.$cell_itemRating.'')
    ->getAlignment()
    ->setHorizontal('center')

	->getActiveSheet()
	->setCellValue('G'.$cell_itemRating.'',"=COUNTA(G".$cellsf.":G".$cell_loop_sf_new.")")
	->getStyle('G'.$cell_itemRating.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('G'.$cell_itemRating.'')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('H'.$cell_itemRating.'',"=COUNTA(H".$cellsf.":H".$cell_loop_sf_new.")")
	->getStyle('H'.$cell_itemRating.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('H'.$cell_itemRating.'')
    ->getAlignment()
    ->setHorizontal('center')

    ->getActiveSheet()
	->setCellValue('I'.$cell_itemRating.'',"=COUNTA(I".$cellsf.":I".$cell_loop_sf_new.")")
	->getStyle('I'.$cell_itemRating.'')
	->getBorders()
    ->getOutline()
    ->setBorderStyle(Border::BORDER_THIN)
    ->getActiveSheet()
	->getStyle('I'.$cell_itemRating.'')
    ->getAlignment()
    ->setHorizontal('center');
    
?>