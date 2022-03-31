<?php
session_start();
if(isset($_SESSION['user'])) {
	if($_SESSION['user']==1) {

	} else if($_SESSION['user']==0) {

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
<title>Yes/No Questions</title>
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
}

.underlined
{
    background-color: lightgray;
    font-size: 18px;
    padding: 5px;
    text-align: center;
}@media only screen and (min-width:150px) and (max-width:600px)
{
/* Title right */
    .title-right {
        float: left;
        margin: 0;
        padding: 0;
        height: 90px;
        line-height: 40px;
		width:100%;
    }

        .title-right a {
            float: left;
            display: block;
            margin-right: 0;
            height: 30px;
            padding: 0;
            line-height: 30px;
            text-align: center;
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
<?php include("headerMenu.php");?>
<!-- End - Page title -->
<!-- Page body content -->
<section id=page-body-content>
<div id=page-body-content-inner>
<!-- Page content -->
<div id=page-content>
<!-- Video - HTML5 -->
<section>
<?php
	if(isset($_GET['orgname']) && isset($_GET['orgadd']) && isset($_GET['fromm']) && isset($_GET['fromd']) && isset($_GET['fromy']) && isset($_GET['tom']) && isset($_GET['tod']) && isset($_GET['toy']) && isset($_GET['hours']) && isset($_GET['pos']) ) {
	
	} else {
		
	} 
?>
<h2 class=underlined-header>Questions</h2>
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
	include("gqa.php");
?>
<center><p><strong>Answer the following questions by 'Yes' or 'No'.</strong></p></center>
<hr style="margin-top: -12px;" />
<form id="questionFrm" name="questionFrm" action="index.php?r=faculty/processSaveAnswers" method=post>
<div class='box-1 round-5' style="width: 96%;">
	<p><strong>36.</strong> Are you related by consanguinity or affinity to any of the following :</p>
	<p><strong>a.</strong> Within the third degree (for National Government Employees): 
	appointing authority, recommending authority, chief of office/bureau/department or person who
	has immediate supervision over you in the Office, Bureau or Department where you will be
	appointed?</p>
	<p>
		<?php
			if($a[0]=="No") {
				echo '
				<input style="margin-left: 50px;" type="radio" name="36a" value="Yes"> Yes</input>
				<input style="margin-left: 220px;" type="radio" name="36a" value="No" checked="checked"> No</input>
				<input style="width: 200px; margin-top:-28px; margin-left: 95px;" type="text" name="36ayes" placeholder="Please specify..." value=""/>
				';
			}
			else if($a[0]=="Yes") {
				echo '
				<input style="margin-left: 50px;" type="radio" name="36a" value="Yes" checked="checked"> Yes</input>
				<input style="margin-left: 220px;" type="radio" name="36a" value="No"> No</input>
				<input style="width: 200px; margin-top:-28px; margin-left: 95px;" type="text" name="36ayes" placeholder="Please specify..." value="'. $yes[0] . '"/>
				';
			} else {
				echo '
				<input style="margin-left: 50px;" type="radio" name="36a" value="Yes"> Yes</input>
				<input style="margin-left: 220px;" type="radio" name="36a" value="No" checked="checked"> No</input>
				<input style="width: 200px; margin-top:-28px; margin-left: 95px;" type="text" name="36ayes" placeholder="Please specify..." value=""/>
				';
			}
		?>
	</p>
	<p><strong>b.</strong> Within the fourth degree (for Local Government Employees):
      appointing authority or recommending authority where will you be appointed?</p>
	<p>
		<?php
			if($a[1]=="No") {
				echo '
				<input style="margin-left: 50px;" type="radio" name="36b" value="Yes"> Yes</input>
				<input style="margin-left: 220px;" type="radio" name="36b" value="No" checked="checked"> No</input>
				<input style="width: 200px; margin-top:-28px; margin-left: 95px;" type="text" name="36byes" placeholder="Please specify..." value=""/>
				';
			}
			else if($a[1]=="Yes") {
				echo '
				<input style="margin-left: 50px;" type="radio" name="36b" value="Yes" checked="checked"> Yes</input>
				<input style="margin-left: 220px;" type="radio" name="36b" value="No"> No</input>
				<input style="width: 200px; margin-top:-28px; margin-left: 95px;" type="text" name="36byes" placeholder="Please specify..." value="'. $yes[1] . '"/>
				';
			} else {
				echo '
				<input style="margin-left: 50px;" type="radio" name="36b" value="Yes"> Yes</input>
				<input style="margin-left: 220px;" type="radio" name="36b" value="No" checked="checked"> No</input>
				<input style="width: 200px; margin-top:-28px; margin-left: 95px;" type="text" name="36byes" placeholder="Please specify..." value=""/>
				';
			}
		?>
	</p>
</div>

<div class='box-1 round-5' style="width: 96%;">
	<p><strong>37. a.</strong> Have you ever been formally charged?</p>
	<p>
		<?php
			if($a[2]=="No") {
				echo '
				<input style="margin-left: 50px;" type="radio" name="37a" value="Yes"> Yes</input>
				<input style="margin-left: 220px;" type="radio" name="37a" value="No" checked="checked"> No</input>
				<input style="width: 200px; margin-top:-28px; margin-left: 95px;" type="text" name="37ayes" placeholder="Please specify..." value=""/>
				';
			}
			else if($a[2]=="Yes") {
				echo '
				<input style="margin-left: 50px;" type="radio" name="37a" value="Yes" checked="checked"> Yes</input>
				<input style="margin-left: 220px;" type="radio" name="37a" value="No"> No</input>
				<input style="width: 200px; margin-top:-28px; margin-left: 95px;" type="text" name="37ayes" placeholder="Please specify..." value="'. $yes[2] . '"/>
				';
			} else {
				echo '
				<input style="margin-left: 50px;" type="radio" name="37a" value="Yes"> Yes</input>
				<input style="margin-left: 220px;" type="radio" name="37a" value="No" checked="checked"> No</input>
				<input style="width: 200px; margin-top:-28px; margin-left: 95px;" type="text" name="37ayes" placeholder="Please specify..." value=""/>
				';
			}
		?>
	</p>
	<p><strong>b.</strong> Have you ever been guilty of any administrative offense?</p>
	<p>
		<?php
			if($a[3]=="No") {
				echo '
				<input style="margin-left: 50px;" type="radio" name="37b" value="Yes"> Yes</input>
				<input style="margin-left: 220px;" type="radio" name="37b" value="No" checked="checked"> No</input>
				<input style="width: 200px; margin-top:-28px; margin-left: 95px;" type="text" name="37byes" placeholder="Please specify..." value=""/>
				';
			}
			else if($a[3]=="Yes") {
				echo '
				<input style="margin-left: 50px;" type="radio" name="37b" value="Yes" checked="checked"> Yes</input>
				<input style="margin-left: 220px;" type="radio" name="37b" value="No"> No</input>
				<input style="width: 200px; margin-top:-28px; margin-left: 95px;" type="text" name="37byes" placeholder="Please specify..." value="'. $yes[3] . '"/>
				';
			} else {
				echo '
				<input style="margin-left: 50px;" type="radio" name="37b" value="Yes"> Yes</input>
				<input style="margin-left: 220px;" type="radio" name="37b" value="No" checked="checked"> No</input>
				<input style="width: 200px; margin-top:-28px; margin-left: 95px;" type="text" name="37byes" placeholder="Please specify..." value=""/>
				';
			}
		?>
	</p>
</div>

<div class='box-1 round-5' style="width: 96%;">
	<p><strong>38.</strong> Have you ever been convicted of any crime or violation of any law, decree, ordinance or
      regulation by any court or tribunal?</p>
	<p>
		<?php
			if($a[4]=="No") {
				echo '
				<input style="margin-left: 50px;" type="radio" name="38" value="Yes"> Yes</input>
				<input style="margin-left: 220px;" type="radio" name="38" value="No" checked="checked"> No</input>
				<input style="width: 200px; margin-top:-28px; margin-left: 95px;" type="text" name="38yes" placeholder="Please specify..." value=""/>
				';
			}
			else if($a[4]=="Yes") {
				echo '
				<input style="margin-left: 50px;" type="radio" name="38" value="Yes" checked="checked"> Yes</input>
				<input style="margin-left: 220px;" type="radio" name="38" value="No"> No</input>
				<input style="width: 200px; margin-top:-28px; margin-left: 95px;" type="text" name="38yes" placeholder="Please specify..." value="'. $yes[4] . '"/>
				';
			} else {
				echo '
				<input style="margin-left: 50px;" type="radio" name="38" value="Yes"> Yes</input>
				<input style="margin-left: 220px;" type="radio" name="38" value="No" checked="checked"> No</input>
				<input style="width: 200px; margin-top:-28px; margin-left: 95px;" type="text" name="38yes" placeholder="Please specify..." value=""/>
				';
			}
		?>
	</p>
</div>

<div class='box-1 round-5' style="width: 96%;">
	<p><strong>39.</strong> Have you ever been separated from the service in any of the following modes: resignation,
      retirement, dropped from the rolls, dismissal, termination, end of term, finished contract, AWOL or
      phased out, in the public or private sector?</p>
	<p>
		<?php
			if($a[5]=="No") {
				echo '
				<input style="margin-left: 50px;" type="radio" name="39" value="Yes"> Yes</input>
				<input style="margin-left: 220px;" type="radio" name="39" value="No" checked="checked"> No</input>
				<input style="width: 200px; margin-top:-28px; margin-left: 95px;" type="text" name="39yes" placeholder="Please specify..." value=""/>
				';
			}
			else if($a[5]=="Yes") {
				echo '
				<input style="margin-left: 50px;" type="radio" name="39" value="Yes" checked="checked"> Yes</input>
				<input style="margin-left: 220px;" type="radio" name="39" value="No"> No</input>
				<input style="width: 200px; margin-top:-28px; margin-left: 95px;" type="text" name="39yes" placeholder="Please specify..." value="'. $yes[5] . '"/>
				';
			} else {
				echo '
				<input style="margin-left: 50px;" type="radio" name="39" value="Yes"> Yes</input>
				<input style="margin-left: 220px;" type="radio" name="39" value="No" checked="checked"> No</input>
				<input style="width: 200px; margin-top:-28px; margin-left: 95px;" type="text" name="39yes" placeholder="Please specify..." value=""/>
				';
			}
		?>
	</p>
</div>

<div class='box-1 round-5' style="width: 96%;">
	<p><strong>40.</strong> Have you ever been a candidate in a national or local election (except Barangay election)?</p>
	<p>
		<?php
			if($a[6]=="No") {
				echo '
				<input style="margin-left: 50px;" type="radio" name="40" value="Yes"> Yes</input>
				<input style="margin-left: 220px;" type="radio" name="40" value="No" checked="checked"> No</input>
				<input style="width: 200px; margin-top:-28px; margin-left: 95px;" type="text" name="40yes" placeholder="Please specify..." value=""/>
				';
			}
			else if($a[6]=="Yes") {
				echo '
				<input style="margin-left: 50px;" type="radio" name="40" value="Yes" checked="checked"> Yes</input>
				<input style="margin-left: 220px;" type="radio" name="40" value="No"> No</input>
				<input style="width: 200px; margin-top:-28px; margin-left: 95px;" type="text" name="40yes" placeholder="Please specify..." value="'. $yes[6] . '"/>
				';
			} else {
				echo '
				<input style="margin-left: 50px;" type="radio" name="40" value="Yes"> Yes</input>
				<input style="margin-left: 220px;" type="radio" name="40" value="No" checked="checked"> No</input>
				<input style="width: 200px; margin-top:-28px; margin-left: 95px;" type="text" name="40yes" placeholder="Please specify..." value=""/>
				';
			}
		?>
	</p>
</div>

<div class='box-1 round-5' style="width: 96%;">
	<p><strong>41.</strong> Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA
      7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items.</p>
	  <p> a. Are you a member of indigenous group?</p>
	<p>
		<?php
			if($a[7]=="No") {
				echo '
				<input style="margin-left: 50px;" type="radio" name="41a" value="Yes"> Yes</input>
				<input style="margin-left: 220px;" type="radio" name="41a" value="No" checked="checked"> No</input>
				<input style="width: 200px; margin-top:-28px; margin-left: 95px;" type="text" name="41ayes" placeholder="Please specify..." value=""/>
				';
			}
			else if($a[7]=="Yes") {
				echo '
				<input style="margin-left: 50px;" type="radio" name="41a" value="Yes" checked="checked"> Yes</input>
				<input style="margin-left: 220px;" type="radio" name="41a" value="No"> No</input>
				<input style="width: 200px; margin-top:-28px; margin-left: 95px;" type="text" name="41ayes" placeholder="Please specify..." value="'. $yes[7] . '"/>
				';
			} else {
				echo '
				<input style="margin-left: 50px;" type="radio" name="41a" value="Yes"> Yes</input>
				<input style="margin-left: 220px;" type="radio" name="41a" value="No" checked="checked"> No</input>
				<input style="width: 200px; margin-top:-28px; margin-left: 95px;" type="text" name="41ayes" placeholder="Please specify..." value=""/>
				';
			}
		?>
	</p>
	<p> b. Are you differently ables??</p>
	<p>
		<?php
			if($a[8]=="No") {
				echo '
				<input style="margin-left: 50px;" type="radio" name="41b" value="Yes"> Yes</input>
				<input style="margin-left: 220px;" type="radio" name="41b" value="No" checked="checked"> No</input>
				<input style="width: 200px; margin-top:-28px; margin-left: 95px;" type="text" name="41byes" placeholder="Please specify..." value=""/>
				';
			}
			else if($a[8]=="Yes") {
				echo '
				<input style="margin-left: 50px;" type="radio" name="41b" value="Yes" checked="checked"> Yes</input>
				<input style="margin-left: 220px;" type="radio" name="41b" value="No"> No</input>
				<input style="width: 200px; margin-top:-28px; margin-left: 95px;" type="text" name="41byes" placeholder="Please specify..." value="'. $yes[8] . '"/>
				';
			} else {
				echo '
				<input style="margin-left: 50px;" type="radio" name="41b" value="Yes"> Yes</input>
				<input style="margin-left: 220px;" type="radio" name="41b" value="No" checked="checked"> No</input>
				<input style="width: 200px; margin-top:-28px; margin-left: 95px;" type="text" name="41byes" placeholder="Please specify..." value=""/>
				';
			}
		?>
	</p>
	<p> c. Are you a solo parent?</p>
	<p>
		<?php
			if($a[9]=="No") {
				echo '
				<input style="margin-left: 50px;" type="radio" name="41c" value="Yes"> Yes</input>
				<input style="margin-left: 220px;" type="radio" name="41c" value="No" checked="checked"> No</input>
				<input style="width: 200px; margin-top:-28px; margin-left: 95px;" type="text" name="41cyes" placeholder="Please specify..." value=""/>
				';
			}
			else if($a[9]=="Yes") {
				echo '
				<input style="margin-left: 50px;" type="radio" name="41c" value="Yes" checked="checked"> Yes</input>
				<input style="margin-left: 220px;" type="radio" name="41c" value="No"> No</input>
				<input style="width: 200px; margin-top:-28px; margin-left: 95px;" type="text" name="41cyes" placeholder="Please specify..." value="'. $yes[9] . '"/>
				';
			} else {
				echo '
				<input style="margin-left: 50px;" type="radio" name="41c" value="Yes"> Yes</input>
				<input style="margin-left: 220px;" type="radio" name="41c" value="No" checked="checked"> No</input>
				<input style="width: 200px; margin-top:-28px; margin-left: 95px;" type="text" name="41cyes" placeholder="Please specify..." value=""/>
				';
			}
		?>
	</p>
</div>

<p><center><input type=submit value='Save Answers'/><a href="index.php?r=faculty/communitySE"> <input type=button value='Cancel'/></a></center></p>
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
<h2 class=widget-heading>Profile</h2>
<div class=widget-content>
<ul class='widget-list categories-list'>
<?php include("profileMenu.php");?>
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
