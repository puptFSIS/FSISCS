<?php
require('fpdf.php');
require('config.php');
// require('fpdm');



class PDF extends FPDF
{

    // Page header
    function Header()
    {
        // Logo
        $pup_logo = "assets/logo_1inch.PNG";
        $this->Image($pup_logo,10,6,30);
        // Times bold 15

        $rotp = "Republic of the Philippines";
        $this->SetFont('Times','',10);
        $this->SetXY(44, 6);
        $this->Cell($this->GetStringWidth($rotp),10,$rotp,0,0,'C');
        $this->Ln(20);

        $puotp = "POLYTECHNIC UNIVERSITY OF THE PHILIPPINES";
        $this->SetFont('Times','b',11);
        $this->SetXY(44, 12.5);
        $this->Cell($this->GetStringWidth($puotp),10,$puotp,0,0,'C');
        $this->Ln(20);

        $office = 'Office of the Vice President for Branches and Satellite Campuses';
        $this->SetFont('Times','b',13);
        $this->SetXY(44, 19);
        $this->Cell($this->GetStringWidth($office),10,$office,0,0,'C');
        $this->Ln(20);

        $taguigb = 'TAGUIG BRANCH';
        $this->SetFont('Times','b',14);
        $this->SetXY(44, 26);
        $this->Cell($this->GetStringWidth($taguigb),10,$taguigb,0,0,'C');
        $this->Ln(20);

        $cts = 'CTS No.';
        $this->SetFont('Times','',14);
        $this->SetXY(141, 25);
        $this->Cell($this->GetStringWidth($cts),34, $cts,0,0,'C');
        $this->Ln(20);

        $line = '_______________________________________________________________________________';
        $this->SetFont('Times','',14);
        $this->SetXY(100, 37);
        $this->Cell($this->GetStringWidth($cts),10,$line,0,0,'C');
        $this->Ln(20);

    }

    function date()
    {
        $month = date("F");
        $day = date("d");
        $year = date("Y");
        $current_date = $month ." ".$day.","." ". $year;
        $this->SetFont('Times','',10);
        $this->SetXY(22, 70);
        $this->Cell(20,10,$current_date,0,0,'C');
        $this->Ln(20);
    }

    function texts( $text1, $text2)
    {
        $this->SetFont('Times','',11);
        $this->SetXY(20, 110);
        $this->Cell($this->GetStringWidth($text1),8,$text1,0,0,'C');
        $this->SetXY(20, 116);
        $this->Cell($this->GetStringWidth($text2),8,$text2,0,0,'C');
    }

    function afterlist()
    {
        $thankyou = "Thank you very much.";
        $after_ty = "Sincerely yours, ";
        $branch_director_name = "MARISSA B. FERRER";
        $branch_d_creds = ", DEM, RPsy";
        $branch_director_text = "Branch Director";

        $this->SetFont('Times','',11);
        $this->SetXY(20, 200);
        $this->Cell($this->GetStringWidth($thankyou),8,$thankyou,0,0,'C');

        $this->SetXY(20, 210);
        $this->Cell($this->GetStringWidth($after_ty),8,$after_ty,0,0,'C');

        $this->SetXY(20, 240);
        $this->Cell($this->GetStringWidth($branch_director_name),8,$branch_director_name,0,0,'C');
        $this->SetXY($this->GetStringWidth($branch_director_name)+20, 240);
        $this->Cell($this->GetStringWidth($branch_d_creds),8,$branch_d_creds,0,0,'C');
        $this->SetXY(20, 248);
        $this->Cell($this->GetStringWidth($branch_director_text),8,$branch_director_text,0,0,'C');


    }

    function directorHR($loadtype)
    {
        $hr_name = "Atty. MICHELLE KRISTINE D. SARAUM";
        $short_hr_name = "Atty. Saraum";
        $this->SetFont('Times','B',10);
        $this->SetXY(30, 80);
        $this->Cell(45,10,$hr_name,0,0,'C');
        $this->Ln(20);

        // $credentials = "Director Human Resources Management Department "

        $this->SetFont('Times','',10);
        $this->SetXY(20, 85);
        $this->Cell(12,8,"Director",0,0,'C');
        $this->SetXY(20, 88);
        $this->Cell(70,8,"Human Resources Management Department",0,0,'C');
        $this->Ln(20);


        $this->SetXY(20, 100);
        $this->Cell(29,8,"Dear ".$short_hr_name.":",0,0,'C');

        
        $this->SetFont('Times','b',10);
        $bold_loadtype = $loadtype;

        $month = date("F");
        $day = date("d");
        $year = date("Y");  


        // TIME!!!
        $january = 'January';
        $regular_date = $january." to ".$month." ".$year;
        $parttime_date = $january." to ".$month." ".$year;
        $ts_date = $january." to ".$month." ".$year;
        $ot_date = $january." to ".$month." ".$year;





       //  TEXTS !!!
        // for regular
        $regular_text1 = "This is to endorse the Daily Time Record ".$bold_loadtype." of the following FACULTY MEMBERS of";
        $regular_text2 = "PUP TAGUIG for the month of ".$regular_date.":";

        // for parttime
        $pt_text1 = "This is to endorse the Daily Time Record ".$bold_loadtype." of the following FACULTY MEMBERS of";
        $pt_text2 = "PUP TAGUIG for the month of ".$parttime_date.":";

        // for TS
        $ts_text1 = "This is to endorse the Daily Time Record ".$bold_loadtype." of the following FACULTY MEMBERS of PUP";
        $ts_text2 = " TAGUIG for the month of ".$ts_date.":";

        //for OT
        $ot_text1 = "This is to endorse the Daily Time Record ".$bold_loadtype." of the following ADMINISTRATIVE PERSONNEL ";
        $ot_text2 = "of PUP TAGUIG for the month of ".$ot_date.":";



        if($loadtype == "REGULAR")
        {
            $this->texts($regular_text1,$regular_text2);
        }
        if($loadtype == "PART-TIME")
        {
            $this->texts($pt_text1,$pt_text2);

        }
        if($loadtype == "TS")
        {
            $this->texts($ts_text1,$ts_text2);

        }
        if($loadtype == "OT")
        {
            $this->texts($ot_text1,$ot_text2);

        }

        $this->afterlist();

        





    }

   function loadtype_knower()
   {
    
    require('config.php');

        $counterforitems = 0;
        $counter = 0;
        $newresult_array  = [];  
        $temporary_list = ["REGULAR","PART-TIME","TS","OT"];
        $sql="SELECT * FROM tbl_dtr where status != 1 and hap_approval_status = 1";
        $result=mysqli_query($conn,$sql);

        
        
        
        foreach($result as $newresult)
        {
            $newresult_array[$counter] = $newresult['regpartime'];
            $counter++;
        }

        $count = count($temporary_list);
        
        for($q = 0; $q<$count;$q++)
        {
            $monthcounter = 0;
            $this->AddPage();
            $this->date();
            $this->directorHR($temporary_list[$q]);
            
            // for($i = 0; $i<$month_date;$i++)
            // {
                $this->list_based_on_loadtype($temporary_list[$q],$monthcounter);
                $monthcounter++;
            // }
        }
   }

    function list_based_on_loadtype($loadtype,$monthcounter)
    {
    
    $month_date = date("m");
    $year_date = date("Y");

    require('config.php');


    $month_array = ['January','February','March','April','May','June','July','August','September','October','November','December'];
    $id=[];
    $counterforitems = 0;
    // $sql="SELECT * FROM tbl_dtr where status != 1 and hap_approval_status = 1 and regpartime ='".$loadtype."'";
    for($mon = 0;$mon<$month_date;$mon++)
    {
    $newmonth = $month_array[$mon];
    $sql="SELECT * FROM tbl_dtr where status != 1  and hap_approval_status = 1 and `regpartime` ='".$loadtype."' and `month` ='$newmonth' and `year` = '$year_date'";
    $result=mysqli_query($conn,$sql);

        foreach($result as $newresult)
        {
                $id[] = $newresult['id'];
                $sn[] = $newresult['surname'];
                $fn[] = $newresult['firstname'];
                $mn[] = $newresult['middlename'];
                $regpartime[] = $newresult['regpartime'];
                $month[] = $newresult['month'];
                $year[] = $newresult['year'];
                $counterforitems++;
        }
    }

    $y = 5;
    $number_of_items = $counterforitems;

    for ($x = 0; $x <= $number_of_items; $x++)
    {
            
            if ($x >= 1 && $x <= $number_of_items)
            {
                $y = $y + 5;
            }
            
            if(array_key_exists($x,$id))
            {
            $new_x = $x+1;
            $x_dot = $new_x." ".".";
            $name = $sn[$x].', '.$fn[$x].' '.$mn[$x];
            $date = $month[$x].' '.$year[$x];
           
            $this->SetFont('Times','','8.6');
            $this->SetXY(20, 130 + $y);
            $this->Cell($this->GetStringWidth($x_dot)+15,5,$x_dot,0,0,'C');
            //name

            $this->SetFont('Times','B','10');
            $this->SetXY($this->GetStringWidth($x_dot)+32, 130 + $y);
            $this->Cell($this->GetStringWidth($name),5,$name,0,0,'C');
            
            $this->SetFont('Times','B','10');
            $this->SetXY($this->GetStringWidth($x_dot)+$this->GetStringWidth($name)+34, 130 + $y);
            $this->Cell($this->GetStringWidth($date),5,$date,0,0,'C');
            }
     }
    

    }



// Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-60);
        $this->SetFont('Times','',8);
        $this->Cell(0,10,'Gen. Santos Ave. Lower Bicutan, Taguig City 1772; (Direct Line) 837-5858 to 60; (Telefax) 837-5859;',0,0,'C');
        $this->Ln(5);
        $this->Cell(0,10,'website: www.pup.edu.ph     e-mail: taguig@pup.edu.ph',0,0,'C');

        $this->Ln(5);
        $this->SetFont('Times','',14);
        $this->Cell(0,10,'THE COUNTRY’S 1st POLYTECHNICU',0,0,'C');



    }

}

$pdf = new PDF('P','mm','legal');
$pdf->SetFont('Times','B','10');
$pdf->header();
$pdf->loadtype_knower();
$pdf->Output();
?>