<?php
session_start();
// Remember you need this config file everytime you want to run a query
include('config.php');
if(isset($_SESSION['user'])) {
	if($_SESSION['user']==1) {

	} else if($_SESSION['user']==0) {
		header("Location: index.php?r=faculty/");
	}
} else {
	header("location:index.php?r=site/");
}
?>


<?php
$makeupClassID = $_GET['makeupClassID'];

// Get the variables
$sql = "SELECT * FROM tbl_makeup_class WHERE MakeupClassID = ".$makeupClassID;
$result = mysqli_query($conn, $sql);

$SubjCode;
$SubjDescription;
$FCode;
$day1;
$day2;
$timeS1;
$timeS2;
$timeE1;
$timeE2;
$room1;
$room2;
$courseID;


while($row = mysqli_fetch_array($result)) {
    $SubjCode = $row['SubjCode'];
    $SubjDescription = $row['SubjDescription'];
    $FCode = $row['FCode'];
    $day1 = $row['day1'];
    $day2 = $row['day2'];
    $timeS1 = $row['timeS1'];
    $timeS2 = $row['timeS2'];
    $timeE1 = $row['timeE1'];
    $timeE2 = $row['timeE2'];
    $room1 = $row['room1'];
    $room2 = $row['room2'];
    $courseID = $row['CourseID'];
}

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
<title>Make Up Class | Edit</title>
<!-- Page icon -->
<link href='puplogo.ico' rel='shortcut icon'/>
<!-- Stylesheets -->
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
}</style>

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
<?php include("headerMenu.php");?>
<!-- End - Page title -->
<!-- Page body content -->
<section id=page-body-content>
<div id=page-body-content-inner>
<!-- Page content -->
<div id=page-content>
<!-- Video - HTML5 -->
<section>

<h2 class=underlined-header>Edit Make Up Class</h2>

<?php
	if(isset($_GET['msg'])) {
	$msg = $_GET['msg'];
		if($_GET['msgType']=="succ") {
			echo '
			<div class="box-info">
			  <div class="box-content">
				<p>' . $msg . '</p>
			  </div>
			</div>
			<hr style="margin-top:13px;"/>
			';
		} else {
			echo '
			<div class="box-error">
			  <div class="box-content">
				<p>' . $msg . '</p>
			  </div>
			</div>
			<hr style="margin-top:13px;"/>
			';
		}
	}
?>

<p>* Required fields.</p>
<hr style="margin-top: -10px;" />

<form id="annc" name="annc" action="index.php?r=faculty/ProcessUpdateMakeupClass" method="post">

    <input name="MakeupClassID" type="hidden" value="<?php echo $makeupClassID ?>"/>

    <p style="margin-bottom: 9px;">*Subject Code:
        <input name="scode" type=text style="width: 470px; margin-top: -28px; margin-left: 15%;" value="<?php echo $SubjCode; ?>" placeholder='Subject Code'/>
    </p>
    <p style="margin-bottom: 9px;">*Subject Title:
        <input name="stitle" type=text style="width: 470px; margin-top: -28px; margin-left: 15%;" value="<?php echo $SubjDescription; ?>" placeholder='Subject Title'/>
    </p>

    <p style="margin-bottom: 9px;">*Day:
    <select name="day1" style="width: 470px; margin-top: -28px; margin-left: 15%;">
    <?php
    $blank = "";
    $d1 = "M";
    $d2 = "T";
    $d3 = "W";
    $d4 = "TH";
    $d5 = "F";
    $d6 = "S";
    $d = "";
    for($day=1;$day<=6;$day++)
    {
        if($day==1){
            $d = $d1;
        }
        elseif($day==2)
        {
            $d = $d2;
        }
        elseif($day==3)
        {
            $d = $d3;
        }
        elseif($day==4)
        {
            $d = $d4;
        }
        elseif($day==5)
        {
            $d = $d5;
        }
        elseif($day==6)
        {
            $d = $d6;
        }

        if($d == $day1)
        {
            echo '<option value = "'.$day1.'" selected>'. $day1 .'</option>';
        }
        echo '<option value = "'.$d.'">'. $d .'</option>';
    }
    ?>
    </select>
    </p>

    <p style="margin-bottom: 9px;">*Time Start:
        <select name="timeS1" style="width: 470px; margin-top: -28px; margin-left: 15%;">
        <?php
            for($ctime=700;$ctime<=2200;) {
                if($ctime == $timeS1)
                {
                    echo '<option value="'. $ctime .'" selected>'. to12Hr($ctime) .'</option>';
                }
                echo '<option value="'. $ctime .'">'. to12Hr($ctime) .'</option>';

                if($ctime%100==0) {
                    $ctime = $ctime + 30;
                } else {
                    $ctime = $ctime + 70;
                }
            }
        ?>
        </select>
    </p>

    <p style="margin-bottom: 9px;">*Time End:
        <select name="timeE1" style="width: 470px; margin-top: -28px; margin-left: 15%;">
        <?php

            for($ctime=700;$ctime<=2200;) {
                if($ctime == $timeE1)
                {
                    echo '<option value="'. $ctime .'" selected>'. to12Hr($ctime) .'</option>';
                }
                echo '<option value="'. $ctime .'">'. to12Hr($ctime) .'</option>';
                if($ctime%100==0) {
                    $ctime = $ctime + 30;
                } else {
                    $ctime = $ctime + 70;
                }
            }
        ?>
        </select>
    </p>


    <p style="margin-bottom: 9px;">*Room
        <select name="room1" style="width: 470px; margin-top: -28px; margin-left: 15%;">
        <?php
            $sql="SELECT * FROM tbl_room";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result))
            {
                if($row['roomName'] == $room1)
                {
                    echo ' <option value="'. $row['roomName'] .'" selected> '. $row['roomName'] .'</option> ';
                }
                echo ' <option value="'. $row['roomName'] .'"> '. $row['roomName'] .'</option> ';
            }
        ?>
        </select>
    </p>

    <!-- check if second day is available -->
    <?php if($day2 != null) : ?>
        <h4>Second Day</h4>

        <p style="margin-bottom: 9px;">*Day:
        <select name="day2" style="width: 470px; margin-top: -28px; margin-left: 15%;">
        <?php
        $blank = "";
        $d1 = "M";
        $d2 = "T";
        $d3 = "W";
        $d4 = "TH";
        $d5 = "F";
        $d6 = "S";
        $d = "";
        for($day=1;$day<=6;$day++)
        {
            if($day==1){
                $d = $d1;
            }
            elseif($day==2)
            {
                $d = $d2;
            }
            elseif($day==3)
            {
                $d = $d3;
            }
            elseif($day==4)
            {
                $d = $d4;
            }
            elseif($day==5)
            {
                $d = $d5;
            }
            elseif($day==6)
            {
                $d = $d6;
            }

            if($d == $day2)
            {
                echo '<option value = "'.$day2.'" selected>'. $day2 .'</option>';
            }
            echo '<option value = "'.$d.'">'. $d .'</option>';
        }
        ?>
        </select>
        </p>

        <p style="margin-bottom: 9px;">*Time Start:
            <select name="timeS2" style="width: 470px; margin-top: -28px; margin-left: 15%;">
            <?php
            for($ctime=700;$ctime<=2200;) {

                if($ctime == $timeS2)
                {
                    echo '<option value="'. $ctime .'" selected>'. to12Hr($ctime) .'</option>';
                }
                echo '<option value="'. $ctime .'">'. to12Hr($ctime) .'</option>';
                if($ctime%100==0) {
                    $ctime = $ctime + 30;
                } else {
                    $ctime = $ctime + 70;
                }
            }
            ?>
            </select>
        </p>

        <p style="margin-bottom: 9px;">*Time End:
            <select name="timeE2" style="width: 470px; margin-top: -28px; margin-left: 15%;">
            <?php

                for($ctime=700;$ctime<=2200;) {

                    if($ctime == $timeE2)
                    {
                        echo '<option value="'. $ctime .'" selected>'. to12Hr($ctime) .'</option>';
                    }

                    echo '<option value="'. $ctime .'">'. to12Hr($ctime) .'</option>';
                    if($ctime%100==0) {
                        $ctime = $ctime + 30;
                    } else {
                        $ctime = $ctime + 70;
                    }
                }
            ?>
            </select>
        </p>


        <p style="margin-bottom: 9px;">*Room
            <select name="room2" style="width: 470px; margin-top: -28px; margin-left: 15%;">
            <?php
                $sql="SELECT * FROM tbl_room";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($result))
                {
                    if($row['roomName'] == $room2)
                    {
                        echo ' <option value="'. $row['roomName'] .'" selected> '. $row['roomName'] .'</option> ';
                    }
                    echo ' <option value="'. $row['roomName'] .'"> '. $row['roomName'] .'</option> ';
                }
            ?>
            </select>
        </p>
    <?php endif; ?>


    <h4>Courses</h4>

    <select id="course_selection" name="course">

        <?php
        $sql = "SELECT * FROM tbl_course WHERE Status = 'Post now'";
        $result = mysqli_query($conn, $sql);

        // loop through
        while($row = mysqli_fetch_array($result)) :
        ?>
            <?php if($row['course'] == $courseID) : ?>
                <option value="<?php echo $row['course']; ?>"><?php echo $row['course_code']; ?></option>
            <?php else : ?>
                <option value="<?php echo $row['course']; ?>"><?php echo $row['course_code']; ?></option>
            <?php endif; ?>>
        <?php endwhile; ?>
    </select>



    <center><p><input type="submit" value="Save" /> <button onclick="history.go(-1);">Cancel </button></p></center>
</form>

</section>
<!-- End - Video -HTML5 -->
<br/>

<!-- End - Showcase gallery -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->
<aside class=page-sidebar>
<section class='widget-container widget-categories'>
<h2 class=widget-heading>Subject Management</h2>
<div class=widget-content>
<ul class='widget-list categories-list'>
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
		return $strTime;
	}
?>

