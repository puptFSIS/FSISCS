<?php
require('fpdf.php');
include("config.php");

class PDF extends FPDF
{
    var $widths;
    var $aligns;

    function SetWidths($w)
    {
        //Set the array of column widths
        $this->widths=$w;
    }

    function SetAligns($a)
    {
        //Set the array of column alignments
        $this->aligns=$a;
    }

    function Row($data)
    {
        //Calculate the height of the row
        $nb=0;
        for($i=0;$i<count($data);$i++)
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=5*$nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
            //Draw the border
            $this->Rect($x,$y,$w,$h);
            //Print the text
            $this->MultiCell($w,5,$data[$i],0,$a);
            //Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h)
    {
        //If the height h would cause an overflow, add a new page immediately
        if($this->GetY()+$h>$this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w,$txt)
    {
        //Computes the number of lines a MultiCell of width w will take
        $cw=&$this->CurrentFont['cw'];
        if($w==0)
            $w=$this->w-$this->rMargin-$this->x;
        $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
        $s=str_replace("\r",'',$txt);
        $nb=strlen($s);
        if($nb>0 and $s[$nb-1]=="\n")
            $nb--;
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $nl=1;
        while($i<$nb)
        {
            $c=$s[$i];
            if($c=="\n")
            {
                $i++;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
                continue;
            }
            if($c==' ')
                $sep=$i;
            $l+=$cw[$c];
            if($l>$wmax)
            {
                if($sep==-1)
                {
                    if($i==$j)
                        $i++;
                }
                else
                    $i=$sep+1;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }

    function Header()
    {
        $this->AddFont('segoeui','','segoeui.php');
        $this->AddFont('segoeuib','','segoeuib.php');
        $this->AddFont('segoeuil','','segoeuil.php');
        $this->AddFont('segoeuiz','','segoeuiz.php');
        $this->AddFont('segoeuii','','segoeuii.php');
        $this->AddFont('seguisb','','seguisb.php');

        $this->Image('PUP Taguig.png',75,10,25);
        $this->Image('centenniallogo.gif',230,10,25);
        $this->SetFont('segoeui','',11);
        $this->SetTextColor(0);
        $this->Cell(0,10,'Republic of the Philippines',0,0,'C');
        $this->Ln(5);
        $this->SetFont('segoeuib','',12);
        $this->Cell(0,10,'POLYTECHNIC UNIVERSITY OF THE PHILIPPINES',0,0,'C');
        $this->Ln(5);
        $this->SetFont('segoeui','',10);
        $this->Cell(0,10,'TAGUIG  BRANCH',0,0,'C');
        $this->Ln(5);
        $this->SetFont('segoeuii','',10);
        $this->Cell(0,10,'Gen. Santos Ave. Upper Bicutan, Taguig City',0,0,'C');
        $this->Ln(1);
        $this->Ln();

        $this->SetFont('segoeuib','',12);
        $this->Cell(0,10,'Bridge Subject Schedules',0,0,'C');
        $this->Ln();

        // Let's create the table header first
        $header = array("PROGRAMS", "CODE", "DESCRIPTION", "DAY", "TIME", "ROOM", "PROFESSOR");
        $w = array(46,46,46,46,46,46,35);
        $this->SetFillColor(50,50,50);
        $this->SetTextColor(255,255,255);
        // Loop through header items
        for($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i],10,$header[$i],1,0,'C',true);

        $this->Ln();
    }
}



function getCourseNames($BridgeSubjectID)
{
include("config.php");
    $programs = "";
    $sqlCourse = "SELECT * FROM tbl_bridge_subject_course WHERE BridgeSubjectID = ".$BridgeSubjectID;
    $resultCourse = mysqli_query($conn,$sqlCourse);

    while($row = mysqli_fetch_array($resultCourse))
    {
        $programs = $programs." ".getCourseName($row['CourseID'])."\n";
    }

    return $programs;
}

function getCourseName($CourseID)
{
include("config.php");
    $sql = "SELECT * FROM tbl_course WHERE course = ".$CourseID;
    $result = mysqli_query($conn,$sql);
    $course = mysqli_fetch_assoc($result);

    return $course['course_code'];
}


function getProfessorFullName($FCode)
{
include("config.php");
    $sql = "SELECT * FROM tbl_evaluationfaculty WHERE FCode = '$FCode'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    

    return $row["LName"].", ".$row["FName"];
}

function to12Hr($ctime) 
{
    $strTime = "";
    if($ctime==700) 
    {
        $strTime = "07:00 AM";
    } else if($ctime==730) {
        $strTime = "07:30 AM";
    } else if($ctime==800) {
        $strTime = "08:00 AM";
    } else if($ctime==830) {
        $strTime = "08:30 AM";
    } else if($ctime==900) {
        $strTime = "09:00 AM";
    } else if($ctime==930) {
        $strTime = "09:30 AM";
    } else if($ctime==1000) {
        $strTime = "10:00 AM";
    } else if($ctime==1030) {
        $strTime = "10:30 AM";
    } else if($ctime==1100) {
        $strTime = "11:00 AM";
    } else if($ctime==1130) {
        $strTime = "11:30 AM";
    } else if($ctime==1200) {
        $strTime = "12:00 NN";
    } else if($ctime==1230) {
        $strTime = "12:30 NN";
    } else if($ctime==1300) {
        $strTime = "01:00 PM";
    } else if($ctime==1330) {
        $strTime = "01:30 PM";
    } else if($ctime==1400) {
        $strTime = "02:00 PM";
    } else if($ctime==1430) {
        $strTime = "02:30 PM";
    } else if($ctime==1500) {
        $strTime = "03:00 PM";
    } else if($ctime==1530) {
        $strTime = "03:30 PM";
    } else if($ctime==1600) {
        $strTime = "04:00 PM";
    } else if($ctime==1630) {
        $strTime = "04:30 PM";
    } else if($ctime==1700) {
        $strTime = "05:00 PM";
    } else if($ctime==1730) {
        $strTime = "05:30 PM";
    } else if($ctime==1800) {
        $strTime = "06:00 PM";
    } else if($ctime==1830) {
        $strTime = "06:30 PM";
    } else if($ctime==1900) {
        $strTime = "07:00 PM";
    } else if($ctime==1930) {
        $strTime = "07:30 PM";
    } else if($ctime==2000) {
        $strTime = "08:00 PM";
    } else if($ctime==2030) {
        $strTime = "08:30 PM";
    } else if($ctime==2100) {
        $strTime = "09:00 PM";
    } else if($ctime==2130) {
        $strTime = "09:30 PM";
    } else if($ctime==2200) {
        $strTime = "10:00 PM";
    } else if($ctime==2230) {
        $strTime = "10:30 PM";
    }
    return $strTime;
}

require('makefont/makefont.php');
//MakeFont('font/seguisb.ttf','cp1252');
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf = new PDF('L', 'mm', array(215, 330));
// Add the stupid page
$pdf->AddPage();
// Set the stupid font
$pdf->SetFont('Arial','',10);
// Set widths for each row
$pdf->SetWidths(array(46,46,46,46,46,46,35));


// Get the results for the tbl_bridge_subjects
$sql = "SELECT * FROM tbl_bridge_subject"; 
$result = mysqli_query($conn,$sql);


// Loop through the rows
while($row = mysqli_fetch_array($result))
{
    $programs = getCourseNames($row["BridgeSubjectID"]);
    $timeS = to12Hr($row["timeS1"]);
    $timeE = to12Hr($row["timeE1"]);
    $professor = getProfessorFullName($row["FCode"]);

    $pdf->Row(array($programs, $row["SubjCode"], $row["SubjDescription"], $row["day1"], $timeS.'-'.$timeE, $row["room1"], $professor));
}


$pdf->Output();
?>
