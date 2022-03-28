<!DOCTYPE html>
<!--[if IE 7 ]> <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]> <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]> <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]> <!--> <html class=no-js lang=en> <!-- <![endif]-->
<head>

<!--[if IE ]> <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> <![endif]-->
<meta content='width=device-width, initial-scale=1.0' name=viewport />
<meta content='FSIS' name=keywords />
<meta content='PUP Taguig FSIS' name=description />
<meta content='vCore Team' name=author />
<!-- Page title -->
<title>Internal Schedule Set</title>
<!-- Page icon -->
<link href='puplogo.ico' rel='shortcut icon'/>
<!-- Stylesheets -->
<style media=screen type='text/css'>@import "styles/base.css";
.cssLT #ut, .cssUT #ut{filter:progid:DXImageTransform.Microsoft.DropShadow(enabled=false);}
.cssWLGradientIMG{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMGSSL{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMG
{BACKGROUND-IMAGE: url(images/hd.jpg);BACKGROUND-REPEAT:repeat-x;top:0;height:105px;}</style>

<link href='styles/print.css' media=print rel=stylesheet />
<!-- Modernizr library -->
<script src='scripts/libs/modernizr/modernizr.min.js'></script>
<meta charset="UTF-8"></head>
<body class='page-media page-sidebar-right'>
<!-- JS notice - will be displayed if javascript is disabled -->
<p id=jsnotice>Javascript is currently disabled. This site requires Javascript to function correctly. Please <a href="http://enable-javascript.com/">enable Javascript in your browser</a>!</p>
<!-- End - JS notice -->
<!-- Page header -->
<div id="GradientDiv" class="cssWLGradientCommon cssWLGradientIMG"></div>

<!-- End - Page header -->

<!-- Page subheader -->

<!-- End - Page subheader -->
<!-- Page body -->
<section class=container-block id=page-body>
<div class=container-inner>
<!-- Page title -->
<?php include("nav.php");?>
<!-- End - Page title -->
<!-- Page body content -->
<section id=page-body-content>
<div id=page-body-content-inner>
<!-- Page content -->
<div id=page-content>
<!-- Video - HTML5 -->
<section>
<?php
session_start();
$EmpID = $_SESSION['CEmpID']; 
include("config.php");
$request_id = $_GET['request_id'];
$schedID = $_GET['schedID'];
$base = Yii::app()->getBaseUrl();

$sql1 = "SELECT * FROM tbl_requestschedule WHERE request_id= '$request_id' and schedID= '$schedID' and status='Pending'";
$result1 = mysqli_query($conn,$sql1);   
while($row = mysqli_fetch_array($result1)) 
{
    $request_id = $row['request_id'];
    $schedID = $row['schedID'];
    $currID = $row['currID'];
    $courseID = $row['courseID'];
    $csection = $row['csection'];
    $cyear = $row['cyear'];
    $scode = $row['scode'];
    $stitle = $row['stitle'];
    $units = $row['units'];
    $lec = $row['lec'];
    $lab = $row['lab'];
    $sday = $row['sday'];
    $stimeS = $row['stimeS'];
    $stimeE = $row['stimeE'];
    $sroom = $row['sroom'];
    $sprof = $row['sprof'];
    $sem = $row['sem'];
    $schoolYear = $row['schoolYear'];
    $day2 = $row['sday2'];
    $timeS2 = $row['stimeS2'];
    $timeE2 = $row['stimeE2'];
    $sroom2 = $row['sroom2'];
    $daterequested = $row['daterequested'];
}

$valid1 = checkRoomSched($sday, $stimeS, $stimeE, $sem, $schoolYear, $sroom, $schedID);
if ($valid1 <= 0) {
   // $valid2 = checkProfSched($day, $stimeS, $stimeE, $sem, $schoolYear, $profName, $schedID);
   //  if ($valid2 <= 0) {
        $valid3 = checkCourseSched($sday, $stimeS, $stimeE, $sem, $schoolYear, $courseID, $schedID);
        if ($valid3 <= 0) {
        
            $sql1 = "SELECT * FROM tbl_schedule WHERE schedID= '$schedID'";
            $result1 = mysqli_query($conn,$sql1);	
            while($row = mysqli_fetch_array($result1)) 
            {
                $load_type = $row['load_type'];
            				
                            if($result1)
                            {

                                $count=mysqli_num_rows($result1);
                                if($count>0){
                                    $sql="UPDATE tbl_requestschedule SET  status='Approved' , datemodified=NOW() where request_id='$request_id' and schedID = '$schedID'";
                                    $sql2="INSERT INTO tbl_schedule VALUES ('','$currID','$courseID','$csection','$cyear','$scode','$stitle','$units','$lec','$lab','$sday','$stimeS','$stimeE','$sroom','$sprof','$sem','$schoolYear','$day2','$timeS2','$timeE2','$sroom2','$load_type','INTERNAL')";
            					 
                                    $result=mysqli_query($conn,$sql);	
                                    $result2=mysqli_query($conn,$sql2);	
            			
                                }
                                header("Location: index.php?r=administrator/RequestsManagement&mes=0");
            					mysqli_close($conn);
            				}
            				else
                            {
                                echo"
            			<script>
            			window.location.replace('index.php?r=administrator/RequestsManagement&mes=1');
            			alert('Something went wrong');
            			</script>";
                                mysqli_close($conn);	
                            }
            }
        } else {
            echo"
                    <script src='".$base."assets/jquery-3.6.0.min.js'></script>
                    <script src='".$base."assets/sweetalert2.all.min.js'></script>
                    <script>

                        Swal.fire({
                            icon:'error',
                            title:'Ooops!',
                            text:'Conflict with the Student Course Schedule!'
                            
                        })
                    </script>";
            
                    echo'
                                            
                                <table class="table table-bordered table-hover responsive-utilities" style="margin-left:-85px">
                                  <tbody>
                                  <tr>
                                    <td class="table-narrow" colspan = "4">
                                    <h4><strong>Conflict:</strong></h4> 
                                    </td>
                                </tr>
                                    <tr>
                                        <td style="background-color: maroon; color: white; font-weight: bold; width: 160px;text-align: center;"">Course:</td>
                                        <td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Year&Section</td>
                                        <td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Subject</td>
                                        <td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Room</td>
                                        <td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Day</td>
                                        <td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Start</td>
                                        <td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">End</td>
                                        <td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Sem</td>
                                        <td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Professor</td>
                                        <td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Schedule Type</td>
                                    </tr>
                                ';
                $sql = "SELECT * FROM tbl_schedule WHERE sday = '$sday' && (stimeS BETWEEN ".$stimeS." and ".$stimeE." or stimeE BETWEEN ".$stimeS." and ".$stimeE.") && courseID = '$courseID' && schoolYear = '$schoolYear' && sem = '$sem' && (Sched_type = 'INTERNAL' or Sched_type = 'OFFICIAL')";
                
                $result = mysqli_query($conn,$sql);
                while ($row = mysqli_fetch_array($result)) {
                        echo'
                                                <tr>    
                                                    <td style="text-align: left;">'. getCourse($row['courseID']) .'</td>
                                                    <td style="text-align: center;">'. $row['cyear']. '-'.$row['csection'].'</td>           
                                                    <td style="text-align: left;">'. getSubj($row['scode']) .'</td>
                                                    <td style="text-align: left;">'. $row['sroom'].'</td>
                                                    <td style="text-align: left;">'. $row['sday'].'</td>
                                                    <td style="text-align: center;">'. to12Hr($row['stimeS']) .' </td>
                                                    <td style="text-align: center;">'. to12Hr($row['stimeE']) .' </td>
                                                    <td style="text-align: center;">'.$row['sem'] .' </td>                                          
                                                    <td style="text-align: left;">'. getName($row['sprof']) .'</td>
                                                    <td style="text-align: left;">'. $row['Sched_type'].'</td>
                                                </tr>'; 

                    }
                                        echo'
                                        
                                        </tbody>
                                        </table>
                                        <a href="index.php?r=administrator/viewrequests&CurrID='.$currID.'&schedID='.$schedID.'&sprof='.$sprof.'&daterequested='.$daterequested.'&request_id='.$request_id.'&schoolYear='.$schoolYear.'&courseID='.$courseID.'&cyear='.$cyear.'&scode='.$scode.'&sem='.$sem.'&sec='.$csection.'&stitle='.$stitle.'&units='.$units.'&lec='.$lec.'&lab='.$lab.'" class="btn btn-mini btn-primary btn-block" style="width:45px text-decoration:none; color:white; margin-left:-70px;">BACK</a>';

        }
    // } else {
    //     header("location: index.php?r=administrator/viewrequests&CurrID=$currID&schedID=$schedID&sprof=$sprof&daterequested=$daterequested&request_id=$request_id&schoolYear=$schoolYear&courseID=$courseID&cyear=$cyear&scode=$scode&sem=$sem&sec=$csection&stitle=$stitle&units=$units&lec=$lec&lab=$lab&mes=2");
    //     mysqli_close($conn);
    // }

} else {
    echo"
                <script src='".$base."assets/jquery-3.6.0.min.js'></script>
                <script src='".$base."assets/sweetalert2.all.min.js'></script>
                <script>
                
                Swal.fire({
                    icon:'error',
                    title:'Ooops!',
                    text:'Conflict with the Room Schedule!'
                    
                })
                </script>";
        
                echo'
                                        
                            <table class="table table-bordered table-hover responsive-utilities" style="margin-left:-85px">
                              <tbody>
                              <tr>
                                <td class="table-narrow" colspan = "4">
                                <h4><strong>Conflict:</strong></h4> 
                                </td>
                            </tr>
                                <tr>
                                    <td style="background-color: maroon; color: white; font-weight: bold; width: 160px;text-align: center;"">Course:</td>
                                    <td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Year&Section</td>
                                    <td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Subject</td>
                                    <td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Room</td>
                                    <td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Day</td>
                                    <td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Start</td>
                                    <td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">End</td>
                                    <td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Sem</td>
                                    <td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Professor</td>
                                    <td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Schedule Type</td>
                                </tr>
                            ';
            $sql = "SELECT * FROM tbl_schedule WHERE sday = '$sday' && (stimeS BETWEEN ".$stimeS." and ".$stimeE." or stimeE BETWEEN ".$stimeS." and ".$stimeE.") && sroom = '$roomName' && schoolYear = '$schoolYear' && sem = '$sem' && (Sched_type = 'INTERNAL' OR Sched_type = 'OFFICIAL')";
            // echo $sql;
            $result = mysqli_query($conn,$sql);
            while ($row = mysqli_fetch_array($result)) {
                    echo'
                                            <tr>    
                                                <td style="text-align: left;">'. getCourse($row['courseID']) .'</td>
                                                <td style="text-align: center;">'. $row['cyear']. '-'.$row['csection'].'</td>           
                                                <td style="text-align: left;">'. getSubj($row['scode']) .'</td>
                                                <td style="text-align: left;">'. $row['sroom'].'</td>
                                                <td style="text-align: left;">'. $row['sday'].'</td>
                                                <td style="text-align: center;">'. to12Hr($row['stimeS']) .' </td>
                                                <td style="text-align: center;">'. to12Hr($row['stimeE']) .' </td>
                                                <td style="text-align: center;">'.$row['sem'] .' </td>                                          
                                                <td style="text-align: left;">'. getName($row['sprof']) .'</td>
                                                <td style="text-align: left;">'. $row['Sched_type'].'</td>
                                            </tr>'; 

                }
                                    echo'
                                    
                                    </tbody>
                                    </table>
                                    <a href="index.php?r=administrator/viewrequests&CurrID='.$currID.'&schedID='.$schedID.'&sprof='.$sprof.'&daterequested='.$daterequested.'&request_id='.$request_id.'&schoolYear='.$schoolYear.'&courseID='.$courseID.'&cyear='.$cyear.'&scode='.$scode.'&sem='.$sem.'&sec='.$csection.'&stitle='.$stitle.'&units='.$units.'&lec='.$lec.'&lab='.$lab.'" class="btn btn-mini btn-primary btn-block" style="text-decoration:none; color:white; margin-left:-70px;">BACK</a>';
    mysqli_close($conn);
}

function getName($fcode)
    {
        include("config.php");
        $Name = "";
        $sql = "SELECT * FROM tbl_evaluationfaculty WHERE FCode = '$fcode'";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($result)){
            $Name = $row['LName'] .', '. $row['FName'];
        }
        return $Name;
    }
    function getCourse($courseID)
    {
        include("config.php");
        $course_code = "";
        $sql = "SELECT * FROM tbl_course WHERE course = '$courseID'";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($result)){
            $course_code = $row['course_code'];
        }
        return $course_code;
    }
    function getSubj($scode)
    {
        include("config.php");
        $Subject = "";
        $sql = "SELECT * FROM tbl_subjects WHERE SubjCode = '$scode'";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($result)){
            $Subject = $row['SubjDescription'];
        }
        return $Subject;
    }
    
    function to12Hr($ctime)
    {
        $strTime = "";
        if($ctime==700) {
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
	
function checkRoomSched($day, $timein, $timeout, $sem, $sy, $roomName, $schedID)
    {
        include("config.php");
        $sql = "SELECT * FROM tbl_schedule WHERE (stimeS BETWEEN ".$timein." and ".$timeout." or stimeE BETWEEN ".$timein." and ".$timeout.") and schedID != ".$schedID." and sday='".$day."' and sem=".$sem." and schoolYear='".$sy."' and sroom = '".$roomName."' and (Sched_type = 'OFFICIAL' OR Sched_type = 'INTERNAL')";
        $result = mysqli_query($conn,$sql);
        $count=mysqli_num_rows($result);

        return $count;
    }

// function checkProfSched($day, $timein, $timeout, $sem, $sy, $profName, $schedID)
// {
//     include("config.php");
//     $sql = "SELECT * FROM tbl_schedule WHERE (stimeS BETWEEN ".$timein." and ".$timeout." or stimeE BETWEEN ".$timein." and ".$timeout.") and schedID != ".$schedID." and sday='".$day."' and sem=".$sem." and schoolYear='".$sy."' and sprof = '".$profName."'and (Sched_type = 'OFFICIAL' OR Sched_type = 'INTERNAL')";
//     $result = mysqli_query($conn,$sql);
//     $count=mysqli_num_rows($result);

    
//     return $count;
// }

function checkCourseSched($day, $timein, $timeout, $sem, $sy, $courseID, $schedID){
    include("config.php");
    $sql = "SELECT * FROM tbl_schedule WHERE (stimeS BETWEEN ".$timein." and ".$timeout." or stimeE BETWEEN ".$timein." and ".$timeout.") and schedID != ".$schedID." and sday='".$day."' and sem=".$sem." and schoolYear='".$sy."' and courseID = '".$courseID."'and (Sched_type = 'OFFICIAL' OR Sched_type = 'INTERNAL')";
    $result = mysqli_query($conn,$sql);
    $count=mysqli_num_rows($result);

    
    return $count;
}
?>

</section>
<!-- End - Video -HTML5 -->
<br/>

<!-- End - Showcase gallery -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->
<aside class=page-sidebar>
<section class='widget-container2 widget-categories'>
<div class=widget-content>
<ul class='widget-list categories-list'>
<?php include("SchedulingMenu.php");?>
</ul>
</div>
</section>
</aside>
<!-- End - Page sidebar -->
</div>
</section>
<!-- End - Page body content -->
</div>
</section>
<!-- End - Page body -->

<!-- Page footer -->
<footer id=page-footer>
<div class=container-aligner>
<!-- Footer left -->
<section id=footer-left>
© Copyright 2011 <a href="#" title="Dbooom Themes">vCore Team | PUP Taguig</a> - All Rights Reserved.
</section>
<!-- End - Footer left -->
<!-- Footer right -->
<section id=footer-right>
<ul class=footer-navigation>
<li>
<a href='http://www.puptaguig.net' title=Home>Home</a>
</li>
<li>
<a href='index.php?r=site/about' title=About>About</a>
</li>
<li>
<a href='index.php?r=site/contact' title=Contacts>Contacts</a>
</li>
</ul>
</section>
<!-- End - Footer right -->
</div>
</footer>
<!-- End - Page footer -->
<!-- Theme backgrounds -->
<div id=theme-backgrounds>

<img alt='Asset 4' data-color='#D64333' src='assets/backgrounds/4.jpg.pagespeed.ce.AV4Gchw-qN.jpg' width=1600 height=1064 />

</div>
<!-- End - Theme backgrounds -->
<link href='scripts/libs/switcher/switcher.css' rel=stylesheet />

<!-- Scripts -->
<script id=js-dispatcher src='scripts/scripts.js'></script>
</body>
</html>
