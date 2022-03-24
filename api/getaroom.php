<?php
    require 'database.php';
    $rows = array();

             $day = $_POST['day'];
             $tS = $_POST['timestart'];
             $tE = $_POST['timeend'];




    if($tS=="7:00 AM") {
      $tS = 700;
    } else if($tS=="7:30 AM") {
      $tS = 730;
    } else if($tS=="8:00 AM") {
      $tS = 800;
    } else if($tS=="8:30 AM") {
      $tS = 830;
    } else if($tS=="9:00 AM") {
      $tS = 900;
    } else if($tS=="9:30 AM") {
      $tS = 930;
    } else if($tS=="10:00 AM") {
      $tS = 1000;
    } else if($tS=="10:30 AM") {
      $tS = 1030;
    } else if($tS=="11:00 AM") {
      $tS = 1100;
    } else if($tS=="11:30 AM") {
      $tS = 1130;
    } else if($tS=="12:00 NN") {
      $tS = 1200;
    } else if($tS=="12:30 NN") {
      $tS = 1230;
    } else if($tS=="1:00 PM") {
      $tS = 1300;
    } else if($tS=="1:30 PM") {
      $tS = 1330;
    } else if($tS=="2:00 PM") {
      $tS = 1400;
    } else if($tS=="2:30 PM") {
      $tS = 1430;
    } else if($tS=="3:00 PM") {
      $tS = 1500;
    } else if($tS=="3:30 PM") {
      $tS = 1530;
    } else if($tS=="4:00 PM") {
      $tS = 1600;
    } else if($tS=="4:30 PM") {
      $tS = 1630;
    } else if($tS=="5:00 PM") {
      $tS = 1700;
    } else if($tS=="5:30 PM") {
      $tS = 1730;
    } else if($tS=="6:00 PM") {
      $tS = 1800;
    } else if($tS=="6:30 PM") {
      $tS = 1830;
    } else if($tS=="7:00 PM") {
      $tS = 1900;
    } else if($tS=="7:30 PM") {
      $tS = 1930;
    } else if($tS=="8:00 PM") {
      $tS = 2000;
    } else if($tS=="8:30 PM") {
      $tS = 2030;
    } else if($tS=="9:00 PM") {
      $tS = 2100;
    } else if($tS=="9:30 PM") {
      $tS = 2130;
    } else if($tS=="10:00 PM") {
      $tS = 2200;
    } else if($tS=="10:30 PM") {
      $tS = 2230;
    }



          if($tE=="7:00 AM") {
      $tE = 700;
    } else if($tE=="7:30 AM") {
      $tE = 730;
    } else if($tE=="8:00 AM") {
      $tE = 800;
    } else if($tE=="8:30 AM") {
      $tE = 830;
    } else if($tE=="9:00 AM") {
      $tE = 900;
    } else if($tE=="9:30 AM") {
      $tE = 930;
    } else if($tE=="10:00 AM") {
      $tE = 1000;
    } else if($tE=="10:30 AM") {
      $tE = 1030;
    } else if($tE=="11:00 AM") {
      $tE = 1100;
    } else if($tE=="11:30 AM") {
      $tE = 1130;
    } else if($tE=="12:00 NN") {
      $tE = 1200;
    } else if($tE=="12:30 NN") {
      $tE = 1230;
    } else if($tE=="1:00 PM") {
      $tE = 1300;
    } else if($tE=="1:30 PM") {
      $tE = 1330;
    } else if($tE=="2:00 PM") {
      $tE = 1400;
    } else if($tE=="2:30 PM") {
      $tE = 1430;
    } else if($tE=="3:00 PM") {
      $tE = 1500;
    } else if($tE=="3:30 PM") {
      $tE = 1530;
    } else if($tE=="4:00 PM") {
      $tE = 1600;
    } else if($tE=="4:30 PM") {
      $tE = 1630;
    } else if($tE=="5:00 PM") {
      $tE = 1700;
    } else if($tE=="5:30 PM") {
      $tE = 1730;
    } else if($tE=="6:00 PM") {
      $tE = 1800;
    } else if($tE=="6:30 PM") {
      $tE = 1830;
    } else if($tE=="7:00 PM") {
      $tE = 1900;
    } else if($tE=="7:30 PM") {
      $tE = 1930;
    } else if($tE=="8:00 PM") {
      $tE = 2000;
    } else if($tE=="8:30 PM") {
      $tE = 2030;
    } else if($tE=="9:00 PM") {
      $tE = 2100;
    } else if($tE=="9:30 PM") {
      $tE = 2130;
    } else if($tE=="10:00 PM") {
      $tE = 2200;
    } else if($tE=="10:30 PM") {
      $tE = 2230;
    }




                 if($day =="Monday")
                {
                $day="M";
                }
                else if($day =="Tuesday")
                {
                $day="T";
                } 
                else if($day =="Wednesday")
                {
                $day="W";
                } 
                else if($day =="Thursday")
                {
                $day="TH";
                } 
                 else if($day =="Friday")
                {
                $day="F";
                } 
                 else if($day =="Saturday")
                {
                $day="S";
                } 
                else
                {
                 $day="Sun";
                }  
            $monthtoday = date('m');
                 if($monthtoday <= 03)
                    $sem = 2;
                  elseif($monthtoday == 4)
                    $sem = 3;
                   elseif($monthtoday == 5)
                    $sem - 3;
                elseif($monthtoday > 10)
                    $sem = 2;
                else
                    $sem = 1;


         $yeartoday = date('Y');


           // $p = "FA0013TG2009";
            //User Permissions
// $rows['querystatus'] = "success";
             $result = mysqli_query($conn, "SELECT * FROM tbl_room AS r WHERE roomName != 'TGA310' AND roomName != 'TGTBA' AND roomName != 'NOT SPECIFIED' and roomName != 'TGTBA2' and roomName != 'CONSULTATION' AND roomName NOT IN (SELECT sroom FROM tbl_internaschedule WHERE (sday ='".$day."' OR sday2='".$day."') AND ((stimeS >=  ".$tS."  and StimeS < ".$tE." ) OR (stimeE >  ".$tS."  and stimeE < ".$tE.") OR ((stimeS2 >=  ".$tS."  and StimeS2 < ".$tE." ) OR (stimeE2 > ".$tS." and stimeE2 < ".$tE.")) ) AND schoolYear = ".$yeartoday." and sem = ".$sem." )" );

            if (mysqli_num_rows($result) > 0) {
                $rows['querystatus'] = "success";

                while($row = mysqli_fetch_array($result, MYSQL_NUM)) {   
                    $rows['data']['room'][] = array(
                
                       'roomName' => $row[0]
                     
                    );
                }
                    echo json_encode($rows);
            } else {
                $rows['querystatus'] = "failed";
                $rows['error'] = "No Available Rooms";
                echo json_encode($rows);
            }                           
            mysqli_query($conn, $sql);
            mysqli_close($conn);
     
   

    mysqli_close($conn);
?>