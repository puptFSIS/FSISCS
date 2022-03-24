<?php
    require 'database.php';
    $rows = array();

      
            $p =$_POST['username'];
              $datetoday = date('D');
                 $yeartoday = date('Y');
                if($datetoday =="Mon")
                {
                $datetoday="M";
                }
                else if($datetoday =="Tue")
                {
                $datetoday="T";
                } 
                else if($datetoday =="Wed")
                {
                $datetoday="W";
                } 
                else if($datetoday =="Thu")
                {
                $datetoday="TH";
                } 
                 else if($datetoday =="Fri")
                {
                $datetoday="F";
                } 
                 else if($datetoday =="Sat")
                {
                $datetoday="S";
                } 
                else if($datetoday =="Sun")
                {
                 $datetoday="Sun";
                }  

                   $monthtoday = date('m');
                 if($monthtoday <= 03)
                    $sem = 2;
                  elseif($monthtoday == 4)
                    $sem = 3;
                   elseif($monthtoday == 5)
                    $sem = 3;
                elseif($monthtoday > 10)
                    $sem = 2;
                else
                    $sem = 1;
             
           // $p = "FA0013TG2009";
            //User Permissions
             $result = mysqli_query($conn, "SELECT * FROM `tbl_schedule` as ti LEFT JOIN tbl_course as tc ON tc.course = ti.courseID WHERE sprof= '".$p."' and schoolYear = ".$yeartoday." and sem=".$sem." and (sday = '".$datetoday."' or sday2 = '".$datetoday."') ORDER BY stimeS ASC , stimeS2 ASC " );

            if (mysqli_num_rows($result) > 0) {
                $rows['status'] = "success";

                while($row = mysqli_fetch_array($result, MYSQL_NUM)) {   
                    $rows['data']['mysched'][] = array(
                          'csection' => $row[3],
                        'cyear' => $row[4],
                        'stitle' => $row[6],
                      'sday' => $row[10],
                      'stimeS' => $row[11],
                      'stimeE' => $row[12],
                      'sroom' => $row[13],
                      'sprof' => $row[14],
                      'sday2' => $row[17],
                      'stimeS2' => $row[18],
                      'stimeE2' => $row[19],
                      'sroom2' => $row[20],
                      'course_code' => $row[22]
                     
                    );
                }
                    echo json_encode($rows);
            } else {
                $rows['status'] = "failed";
                $rows['error'] = "No Schedule for Today";
                echo json_encode($rows);
            }                           
            mysqli_query($conn, $sql);
            mysqli_close($conn);
     
   

    mysqli_close($conn);
?>