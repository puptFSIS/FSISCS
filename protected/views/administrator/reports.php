<?php
if(isset($_SESSION['user'])) {
	if($_SESSION['user']==1) {

	} else if($_SESSION['user']==0) {
		header("location:index.php?r=faculty/");
	}
} else {
	header("location:index.php?r=site/");
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
<title>Reports | Home</title>
<!-- Page icon -->
<link href='puplogo.ico' rel='shortcut icon'/>
<!-- Stylesheets -->
<style media=screen type='text/css'>@import "styles/base.css";
.cssLT #ut, .cssUT #ut{filter:progid:DXImageTransform.Microsoft.DropShadow(enabled=false);}
.cssWLGradientIMG{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMGSSL{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMG
{BACKGROUND-IMAGE: url(images/hd_tm1.png);BACKGROUND-REPEAT:round;top:0;height:105px;}
    
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

.underlined
{
    background-color: lightgray;
    font-size: 18px;
    padding: 5px;
    text-align: center;
}

@media only screen and (min-width:150px) and (max-width:600px)
{
/* Title right */
    .title-right {
        float: left;
        margin: 0;
        padding: 0;
        height: 240px;
        line-height: 30px;
		width: 100%;
    }

        .title-right a {
            float: left;
            display: block;
            margin 0;
            height: 30px;
            padding: 0;
            line-height: 30px;
            text-align: center;
			width: 100%;
        }

        
	.title-right a:hover {
            background: url(../images/transparent/05_white.png);
            background-color: rgba(255,255,255,.05);
            width: 100%;
        }


	.title-right a:last-child {
            margin: 0;
        }

            .title-right a span {
                display: block;
                padding-left: 0;
                background-position: 0 50%;
                background-repeat: no-repeat;
            }

}


#page-body
{
    background-color: antiquewhite;
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
<h2 class=underlined-header>Reports Coverage</h2>
<?php
	if(isset($_GET['msg'])) {
	$msg = $_GET['msg'];
		if(isset($_GET['msgType'])) {
			if($_GET['msgType']=="err") {
				echo '
				<div class="box-error">
				  <div class="box-content">
					<p>' . $msg . '!</p>
				  </div>
				</div>
				<br />
				<hr style="margin-top:-5px;"/>
				';
			} else {
				echo '
				<div class="box-info">
				  <div class="box-content">
					<p>' . $msg . '!</p>
				  </div>
				</div>
				<br />
				<hr style="margin-top:-5px;"/>
				';
			}
		}
	} else {
	
	}
?>
<?php
	include("getReportCoverage.php");
	//<h3 class=underlined-header>Faculty Attendance in Seminar</h3>
?>
<form name="FAScov" action="index.php?r=administrator/saveCoverage" method="POST">
	<?php
		$currYear=date("Y");
	?>
	From: <select name="fromMonth" style="width: 20%">
	<?php
		$sql = "select fromMonth from tbl_reportcoverage where report = 'FAS'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		echo'<option value = "'.$row['fromMonth'].'">'. getMonth($row['fromMonth']) .'</option>';
		echo '<option value="'. 1 .'">'. "JANUARY" .'</option>';
		echo '<option value="'. 2 .'">'. "FEBRUARY" .'</option>';
		echo '<option value="'. 3 .'">'. "MARCH" .'</option>';
		echo '<option value="'. 4 .'">'. "APRIL" .'</option>';
		echo '<option value="'. 5 .'">'. "MAY" .'</option>';
		echo '<option value="'. 6 .'">'. "JUNE" .'</option>';
		echo '<option value="'. 7 .'">'. "JULY" .'</option>';
		echo '<option value="'. 8 .'">'. "AUGUST" .'</option>';
		echo '<option value="'. 9 .'">'. "SEPTEMBER" .'</option>';
		echo '<option value="'. 10 .'">'. "OCTOBER" .'</option>';
		echo '<option value="'. 11 .'">'. "NOVEMBER" .'</option>';
		echo '<option value="'. 12 .'">'. "DECEMBER" .'</option>';
	?>
	</select>
	<select name="fromFAS" style="width: 20%">
	<?php
	for($year=1950;$year<=$currYear;$year++) {
		if($year==$FASfrom) {
			echo '<option value="'. $year .'" selected="selected">'. $year .'</option>';
		} else {
			echo '<option value="'. $year .'">'. $year .'</option>';
		}
	}
	?>
	</select>
	<p style="margin-top: -93px; margin-left: 150px;">To: 
	<select name="toMonth" style="width: 27%">
	<?php
		$sql = "select toMonth from tbl_reportcoverage where report = 'FAS'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		echo'<option value = "'.$row['toMonth'].'">'. getMonth($row['toMonth']) .'</option>';
		echo '<option value="'. 1 .'">'. "JANUARY" .'</option>';
		echo '<option value="'. 2 .'">'. "FEBRUARY" .'</option>';
		echo '<option value="'. 3 .'">'. "MARCH" .'</option>';
		echo '<option value="'. 4 .'">'. "APRIL" .'</option>';
		echo '<option value="'. 5 .'">'. "MAY" .'</option>';
		echo '<option value="'. 6 .'">'. "JUNE" .'</option>';
		echo '<option value="'. 7 .'">'. "JULY" .'</option>';
		echo '<option value="'. 8 .'">'. "AUGUST" .'</option>';
		echo '<option value="'. 9 .'">'. "SEPTEMBER" .'</option>';
		echo '<option value="'. 10 .'">'. "OCTOBER" .'</option>';
		echo '<option value="'. 11 .'">'. "NOVEMBER" .'</option>';
		echo '<option value="'. 12 .'">'. "DECEMBER" .'</option>';

	?>
	</select>
	<select name="toFAS" style="width: 27%;">
	<?php
	
	for($year=1950;$year<=$currYear;$year++) {
		if($year==$FASto) {
			echo '<option value="'. $year .'" selected="selected">'. $year .'</option>';
		} else {
			echo '<option value="'. $year .'">'. $year .'</option>';
		}
	}
	?>
	</select></p>
	<input type="hidden" name="reportCat" value="FAS" />
	<input type="submit" name="submit" value="Save">
	<p />
</form>
<!--
<form name="WEcov" action="index.php?r=administrator/saveCoverage" method="POST">
<h3 class=underlined-header>Work Experience</h3>
<p>From: <select name="fromWE" style="width: 15%">
<?php
for($year=1950;$year<=$currYear;$year++) {
	if($year==$WEfrom) {
		echo '<option value="'. $year .'" selected="selected">'. $year .'</option>';
	} else {
		echo '<option value="'. $year .'">'. $year .'</option>';
	}
}
?>
</select></p>
<p style="margin-top: -77px; margin-left: 100px;">To: <select name="toWE" style="width: 15%">
<?php
for($year=1950;$year<=$currYear;$year++) {
	if($year==$WEto) {
		echo '<option value="'. $year .'" selected="selected">'. $year .'</option>';
	} else {
		echo '<option value="'. $year .'">'. $year .'</option>';
	}
}
?>
</select></p>
<input type="hidden" name="reportCat" value="WE" />
<input type="submit" name="submit" value="Save">
<p />
</form>

<form name="VWcov" action="index.php?r=administrator/saveCoverage" method="POST">
<h3 class=underlined-header>Voluntary Works</h3>
<p>From: <select name="fromVW" style="width: 15%">
<?php
for($year=1950;$year<=$currYear;$year++) {
	if($year==$VWfrom) {
		echo '<option value="'. $year .'" selected="selected">'. $year .'</option>';
	} else {
		echo '<option value="'. $year .'">'. $year .'</option>';
	}
}
?>
</select></p>
<p style="margin-top: -77px; margin-left: 100px;">To: <select name="toVW" style="width: 15%">
<?php
for($year=1950;$year<=$currYear;$year++) {
	if($year==$VWto) {
		echo '<option value="'. $year .'" selected="selected">'. $year .'</option>';
	} else {
		echo '<option value="'. $year .'">'. $year .'</option>';
	}
}
?>

<?php
	function getMonth($m){
		if($m == 1)
			return "JANUARY";
		elseif($m == 2)
			return "FEBRUARY";
		elseif($m == 3)
			return "MARCH";
		elseif($m == 4)
			return "APRIL";
		elseif($m == 5)
			return "MAY";
		elseif($m == 6)
			return "JUNE";
		elseif($m == 7)
			return "JULY";
		elseif($m == 8)
			return "AUGUST";
		elseif($m == 9)
			return "SEPTEMBER";
		elseif($m == 10)
			return "OCTOBER";
		elseif($m == 11)
			return "NOVEMBER";
		elseif($m == 12)
			return "DECEMBER";
	}
?>
</select></p>
<input type="hidden" name="reportCat" value="VW" />
<input type="submit" name="submit" value="Save">
<p />
</form>
-->
</section>
<!-- End - Showcase gallery -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->
<aside class=page-sidebar>
<section class='widget-container widget-categories'>
<h2 class=widget-heading>Faculty Reports</h2>
<div class=widget-content>
<ul class='widget-list categories-list'>

<?php include("reportsMenu.php");?>

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
� Copyright 2011 <a href="#" title="Dbooom Themes">vCore Team | PUP Taguig</a> - All Rights Reserved.
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