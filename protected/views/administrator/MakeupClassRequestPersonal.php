<?php
session_start();
include("config.php");
if(isset($_SESSION['user'])) {
	if($_SESSION['user']==1) {

	} else if($_SESSION['user']==0) {

	}
} else {
	header("location:index.php?r=site/");
}
//ini_set('session.cache_limiter','public');
//session_cache_limiter(false);
//header("Cache-Control: max-age=300, must-revalidate");
?>

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
<title>Make Up Classes Request | Schedule Management </title>
<!-- Page icon -->
<link href='puplogo.ico' rel='shortcut icon'/>
<!-- Stylesheets -->
<script type="text/javascript" id="cool_find_script" src="scripts/find6.js"></script>
<style media=screen type='text/css'>@import "styles/base.css";
.cssLT #ut, .cssUT #ut{filter:progid:DXImageTransform.Microsoft.DropShadow(enabled=false);}
.cssWLGradientIMG{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMGSSL{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMG
{BACKGROUND-IMAGE: url(images/hd_tm1.jpg);BACKGROUND-REPEAT:repeat-x;top:0;height:105px;}

#page-title
{
    background-color: black;
    padding: 5px 5px 5px;
    height: 41px;
}

#menu_strip
{
    margin-top: 10px;
}

#menu_strip a
{
    color: white;
    padding: 10px 10px 10px;
    border-radius: 5px;
}

#menu_strip a:hover
{
    background-color: lightgray;
    color: white;
    padding: 10px 10px 10px;
    border-radius: 5px;
}

#menu_title
{
    margin-left: 30px;
    background-color: lightgray;
    color: black;
    text-align: center;
    font-family: "Helvetica";
    padding: 5px 5px 5px;
    font-size: 16px;
    width: 100%;
}

#options_menu_title
{
    margin-left: 30px;
    background-color: lightgray;
    color: black;
    text-align: center;
    font-family: "Helvetica";
    padding: 5px 5px 5px;
    width: 100%;
}
aside.page-sidebar{
display:none;
}

.page-sidebar-right #page-content{
	width:100%;
}
body.page-media.page-sidebar-right{
	width:100%;
}

.page-sidebar-right #page-body-content {
background:url(../../../../FSISCS/images/page-body-bg-white.png);
background-repeat:repeat;
}
</style>

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
<!--
<?php
	if(isset($_GET['mode'])) {
		if($_GET['mode']==1) {

		} else {
			include("Gwe.php");
		}
	}
?>-->
    <h2 class="underlined-header">List of Make Up Classes</h2>

    <a class="btn btn-primary" href="index.php?r=administrator/AddMakeupClass">Request Make Up Class</a>


</section>
<section>
<table class=round-5 style="width:100%; ">
<tbody>

    <!-- the table for the bridge schedule -->
    <table class="table table-bordered table-hover responsive-utilities">
        <h2>Request Make Up Classes</h2>
        <thead>
            <tr>
                <th>Requested By</th>
                <th>Course</th>
                <th>Subject Code</th>
                <th>Subject Description</th>
                <th>Room</th>
                <th>Day</th>
                <th>Time</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            <?php
            // Get your requests
            $requestedBy = $_SESSION['FCode'];
            $sql = "SELECT * FROM tbl_makeup_class WHERE FCode='$requestedBy' ORDER BY isApproved ASC";
            $result = mysqli_query($conn,$sql);
            ?>


            <?php if(mysqli_num_rows($result) > 0) : ?>
                <?php while($row = mysqli_fetch_array($result)): ?>
                    <tr>
                        <td><?php getProfessorFullName($row['FCode']); ?> </td>
                        <td><?php getSpecificCourseName($row['CourseID']);?></td>
                        <td><?php echo $row['SubjCode']; ?></td>
                        <td><?php echo $row['SubjDescription']; ?></td>
                        <td>
                        <?php
                            echo $row['room1'];
                            if(!empty($row['day2']))
                            {
                                echo "/";
                                echo $row['room2'];
                            }
                        ?>
                        </td>
                        <td>
                        <?php
                            echo $row['day1'];
                            if(!empty($row['day2']))
                            {
                                echo "/";
                                echo $row['day2'];
                            }

                        ?>
                        </td>
                        <td>
                        <?php
                            to12Hr($row['timeS1']);
                            echo "-";
                            to12Hr($row['timeE1']);
                            if(!empty($row['day2']))
                            {
                                echo "/";
                                to12Hr($row['timeS2']);
                                echo "-";
                                to12Hr($row['timeE2']);
                            }

                        ?>
                        </td>

                        <td>
                            <?php if(is_null($row['isApproved'])) : ?>
                                Pending
                            <?php else : ?>
                                Approved
                            <?php endif; ?>
                        </td>
                        <td>
                            <a class="btn btn-primary"
                               href="<?php echo "index.php?r=administrator/UpdateMakeupClass&makeupClassID=".$row['MakeupClassID']; ?>">Update</a>
                            <a class="btn btn-primary"
                               href="<?php echo "index.php?r=administrator/ProcessDeleteMakeupClass&makeupClassID=".$row['MakeupClassID']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php endif; ?>

        </tbody>
    </table>



    <?php

    function checkCurrRef($cID,$yr,$sy)
    {
include('config.php');
        $sql = "SELECT * FROM tbl_curriculumref WHERE courseID='$cID' AND cyear='$yr' AND schoolYear = '$sy'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        $ID = $row['currID'];
        return $ID;
    }

    function getDay($scode,$currID,$cID,$sy,$sec)
    {
include('config.php');
        $sql ="SELECT * FROM tbl_internaschedule WHERE scode ='$scode' AND currID = '$currID' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        if($row['sday2']<>'')
        {
            $day = $row['sday'] . '/' . $row['sday2'];
        }
        else
        {
            $day = $row['sday'];
        }
        return $day;
    }

    function getRoom($scode,$currID,$cID,$sy,$sec)
    {
include('config.php');
        $sql ="SELECT * FROM tbl_internaschedule where scode ='$scode' and currID = '$currID' and schoolYear = '$sy' and courseID = '$cID' and csection = '$sec'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        if($row['sroom2']<>'')
        {
            $room = $row['sroom'] . '/' . $row['sroom2'];
        }
        else
        {
            $room = $row['sroom'];
        }
        return $room;
    }

    function getProf($scode,$currID,$cID,$sy,$sec)
    {
include('config.php');
        $sql ="SELECT * FROM tbl_internaschedule where scode ='$scode' and currID = '$currID' and schoolYear = '$sy' and courseID = '$cID' and csection = '$sec'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        if ($row > 1)
        {
            $prof = getName($row['sprof']);
            return $prof;
        }
    }

    function getTime($scode,$currID,$cID,$sy,$sec)
    {
include('config.php');
        $sql ="SELECT * FROM tbl_internaschedule where scode ='$scode' and currID = '$currID' and schoolYear = '$sy' and courseID = '$cID' and csection = '$sec'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        if($row['stimeS2']<>"")
        {
            if($row['stimeS']<>0){
                $time = to12Hr($row['stimeS']) . '-' . to12Hr($row['stimeE']) . '/' . to12Hr($row['stimeS2']) . '-' . to12Hr($row['stimeE2']);
            }else{
                $time = "";
            }
        }else
        {
            if($row['stimeS']<>'')
            {
                $time = to12Hr($row['stimeS']) . '-' . to12Hr($row['stimeE']);
            }
            else
            {
                $time = "";
            }
        }
        return $time;
    }

    /*
       function getSchedule($currID, $scode, $arg)
       {
       $csem = 1;
       $stimeS = "";
       $stimeE = "";
       $sday = "";
       $sprof = "";
       $sroom = "";

       $sql = "SELECT * FROM tbl_schedule WHERE currID='$currID' AND scode='$scode'";
       $query = mysqli_query($conn,$sql);
       while($row = mysqli_fetch_array($query)) {
       $stimeS = $row['stimeS'];
       $stimeE = $row['stimeE'];
       $sday = $row['sday'];
       $sprof = $row['sprof'];
       $sroom = $row['sroom'];
       }

       if($arg=="PROF") {
       $sprof = getName($sprof);
       return '<td>'. $sprof .'</td>';
       } else if($arg=="TIME") {
       if($stimeS!="") {
       return $sday . ' ' . to12Hr($stimeS) . '-' . to12Hr($stimeE) .' ' .$sroom;
       } else {
       return "";
       }
       }
       }*/

    function getName($fcode)
    {
include('config.php');
        $Name = "";
        $sql = "SELECT * FROM tbl_evaluationfaculty WHERE FCode = '$fcode'";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($result)){
            $Name = $row['LName'] .', '. $row['FName'];
        }
        return $Name;
    }

    function to12Hr($ctime) {
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
        echo $strTime;
    }

    function to24Hr($ctime) {
        $strTime = "";
        if($ctime=="07:00 AM") {
            $strTime = 700;
        } else if($ctime=="07:30 AM") {
            $strTime = 730;
        } else if($ctime=="08:00 AM") {
            $strTime = 800;
        } else if($ctime=="08:30 AM") {
            $strTime = 830;
        } else if($ctime=="09:00 AM") {
            $strTime = 900;
        } else if($ctime=="09:30 AM") {
            $strTime = 930;
        } else if($ctime=="10:00 AM") {
            $strTime = 1000;
        } else if($ctime=="10:30 AM") {
            $strTime = 1030;
        } else if($ctime=="11:00 AM") {
            $strTime = 1100;
        } else if($ctime=="11:30 AM") {
            $strTime = 1130;
        } else if($ctime=="12:00 NN") {
            $strTime = 1200;
        } else if($ctime=="12:30 NN") {
            $strTime = 1230;
        } else if($ctime=="01:00 PM") {
            $strTime = 1300;
        } else if($ctime=="01:30 PM") {
            $strTime = 1330;
        } else if($ctime=="02:00 PM") {
            $strTime = 1400;
        } else if($ctime=="02:30 PM") {
            $strTime = 1430;
        } else if($ctime=="03:00 PM") {
            $strTime = 1500;
        } else if($ctime=="03:30 PM") {
            $strTime = 1530;
        } else if($ctime=="04:00 PM") {
            $strTime = 1600;
        } else if($ctime=="04:30 PM") {
            $strTime = 1630;
        } else if($ctime=="05:00 PM") {
            $strTime = 1700;
        } else if($ctime=="05:30 PM") {
            $strTime = 1730;
        } else if($ctime=="06:00 PM") {
            $strTime = 1800;
        } else if($ctime=="06:30 PM") {
            $strTime = 1830;
        } else if($ctime=="07:00 PM") {
            $strTime = 1900;
        } else if($ctime=="07:30 PM") {
            $strTime = 1930;
        } else if($ctime=="08:00 PM") {
            $strTime = 2000;
        } else if($ctime=="08:30 PM") {
            $strTime = 2030;
        } else if($ctime=="09:00 PM") {
            $strTime = 2100;
        } else if($ctime=="09:30 PM") {
            $strTime = 2130;
        } else if($ctime=="10:00 PM") {
            $strTime = 2200;
        } else if($ctime=="10:30 PM") {
            $strTime = 2230;
        }
        return $strTime;
    }
    ?>
</tbody>
</table>

</section>
<!-- End - Page body content -->
</div>
<!-- End - Page content -->
<!-- Page sidebar-->
<aside class=page-sidebar>
<section class='widget-container widget-categories'>
<div class=widget-content>
<ul class='widget-list categories-list'>
</ul>
</div>


</section>
</aside>
<!-- End - Page sidebar -->
</div>

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
<a href='http://www.puptaguig.org' title=Home>Home</a>
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


<?php
    function getProfessorFullName($FCode)
    {
include('config.php');
        $sql = "SELECT * FROM tbl_evaluationfaculty WHERE FCode = '$FCode'";
        $result = mysqli_query($conn,$sql);
        $LName = "";
        $FName = "";

        while($row = mysqli_fetch_array($result))
        {
            $LName = $row["LName"];
            $FName = $row["FName"];
        }
        echo $LName." ".$FName;
    }


    function getSpecificCourseName($CourseID)
    {
include('config.php');

        $sql = "SELECT * FROM tbl_course WHERE course =".$CourseID;
        $result = mysqli_query($conn,$sql);


        while($row = mysqli_fetch_array($result))
        {
            echo $row['course_code'];
        }
    }
?>

