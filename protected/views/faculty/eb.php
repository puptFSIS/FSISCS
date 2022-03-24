<?php 
session_start(); /*
if(isset($_SESSION['user'])) {
	if($_SESSION['user']==1) {

	} else if($_SESSION['user']==0) {
		header("location:index.php?r=faculty/");
	}
} else {
	header("location:index.php?r=site/"); 
} */
?>
<!DOCTYPE html>
<!--[if IE 7 ]> <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]> <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]> <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]> <!--> <html class=no-js lang=en> <!-- <![endif]-->
<head>

<!--[if IE ]> <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> <![endif]-->
<meta content='width=device-width, initial-scale=1.0' name=eviewport />
<meta content='FSIS' name=ekeywords />
<meta content='PUP Taguig FSIS' name=edescription />
<meta content='vCore Team' name=eauthor />
<!-- Page title -->
<title>Profile | Educational Background</title>
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
}ul.tags-floated-list li.u1,
ul.tags-floated-list li.u2,
ul.tags-floated-list li.u3,
ul.tags-floated-list li.u4,
ul.tags-floated-list li.u5,
ul.tags-floated-list li.u6{
	margin-left:542px; 
	margin-top: -208px;
}

ul.tags-floated-list li.add1{
	margin-top:-55px; 
	margin-left:467px;
}
ul.tags-floated-list li.add2{
	margin-top:-55px; 
	margin-left:482px;
}
ul.tags-floated-list li.add3{	
	margin-top:-55px; 
	margin-left:478px;
}
ul.tags-floated-list li.add4{	
	margin-top:-55px; 
	margin-left:472px;
}



div#page-content section p textarea#ns1,
div#page-content section p textarea#ns2,
div#page-content section p textarea#ns3,
div#page-content section p textarea#ns4,
div#page-content section p textarea#ns5,
div#page-content section p textarea#ns6{
		width: 320px; 
		margin-top: -28px; 
		margin-left: 35%;
}
div#page-content section p input#dc1,
div#page-content section p input#dc2,
div#page-content section p input#dc3,
div#page-content section p input#dc4,
div#page-content section p input#dc5,
div#page-content section p input#dc6{
	width: 320px; 
	margin-top: -28px; 
	margin-left: 35%;
}
div#page-content section p select#yg1,
div#page-content section p select#yg2,
div#page-content section p select#yg3,
div#page-content section p select#yg4,
div#page-content section p select#yg5,
div#page-content section p select#yg6{
	width: 90px; 
	margin-top: -28px; 
	margin-left: 35%;
}
div#page-content section p input#ue1,
div#page-content section p input#ue2,
div#page-content section p input#ue3,
div#page-content section p input#ue4,
div#page-content section p input#ue5,
div#page-content section p input#ue6{
	width: 100px; 
	margin-top: -28px;
	margin-left: 40%;
}
div#page-content section p.ue1,
div#page-content section p.ue2,
div#page-content section p.ue3,
div#page-content section p.ue4,
div#page-content section p.ue5,
div#page-content section p.ue6{
	margin-top: -37px; 
	margin-left:53%;
}
div#page-content section p input#att1,
div#page-content section p input#att2,
div#page-content section p input#att3,
div#page-content section p input#att4,
div#page-content section p input#att5,
div#page-content section p input#att6{
	width: 230px; 
	margin-top: -28px; 
	margin-left: 50%;
}
div#page-content section p input#hon1,
div#page-content section p input#hon2,
div#page-content section p input#hon3,
div#page-content section p input#hon4,
div#page-content section p input#hon5,
div#page-content section p input#hon6{
	width: 230px;
	margin-top: -28px; 
	margin-left: 50%;
}


@media only screen and (min-width: 150px) and (max-width: 600px)
{
	/* Title right */
      .title-right {
        float: left;
        margin: 0;
        padding: 0;
        line-height: 0;
		width:100%;
    }

        .title-right a {
            float: left;
            display: block;
            margin-right: 0;
            height: 30;
            padding: 0;
            line-height: 30px;
            text-align: center;
			width: 100%;
        }
		
		a.home{
display:none;
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


.underlined-header{
font-size:18px;
margin-top: 5px; 
float:left;
clear:both;
}

.other{
font-size:85%;
float:left;
font-style:normal;
}

.page-sidebar-right #page-body-content {
background:url(../../../../FSISCS/images/page-body-bg-white.png);
background-repeat:repeat;
}

div#page-content section p input#dummy0{
		clear:both;
		display:block;
		
		
		}
p{
	display:block;
	clear:both;
}


ul.tags-floated-list li.u1,
ul.tags-floated-list li.u2,
ul.tags-floated-list li.u3,
ul.tags-floated-list li.u4,
ul.tags-floated-list li.u5,
ul.tags-floated-list li.u6{
 	margin:8% 20% 0 20%;
	width:100px;
	min-width:60%;
}


ul.tags-floated-list li.add1,
ul.tags-floated-list li.add2,
ul.tags-floated-list li.add3,
ul.tags-floated-list li.add4{
	margin:8% 10% 8% 10%;
	width:100px;
	min-width:80%;
}




div#page-content section p textarea#ns1,
div#page-content section p textarea#ns2,
div#page-content section p textarea#ns3,
div#page-content section p textarea#ns4,
div#page-content section p textarea#ns5,
div#page-content section p textarea#ns6,
div#page-content section p input#dc1,
div#page-content section p input#dc2,
div#page-content section p input#dc3,
div#page-content section p input#dc4,
div#page-content section p input#dc5,
div#page-content section p input#dc6,
div#page-content section p select#yg1,
div#page-content section p select#yg2,
div#page-content section p select#yg3,
div#page-content section p select#yg4,
div#page-content section p select#yg5,
div#page-content section p select#yg6,
div#page-content section p input#ue1,
div#page-content section p input#ue2,
div#page-content section p input#ue3,
div#page-content section p input#ue4,
div#page-content section p input#ue5,
div#page-content section p input#ue6,
div#page-content section p input#att1,
div#page-content section p input#att2,
div#page-content section p input#att3,
div#page-content section p input#att4,
div#page-content section p input#att5,
div#page-content section p input#att6,
div#page-content section p input#hon1,
div#page-content section p input#hon2,
div#page-content section p input#hon3,
div#page-content section p input#hon4,
div#page-content section p input#hon5,
div#page-content section p input#hon6{
		width:94%; 
		margin-top: 0; 
		margin-left: 3%;
		margin-right:3%;
}

div#page-content section p.ue1,
div#page-content section p.ue2,
div#page-content section p.ue3,
div#page-content section p.ue4,
div#page-content section p.ue5,
div#page-content section p.ue6{
	margin-top: 0; 
	margin-left:0;
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
<?php include("nav.php");?>
<!-- End - Page title -->
<!-- Page body content -->
<section id=page-body-content>
<div id=page-body-content-inner>
<!-- Page content -->
<div id=page-content>
<!-- Video - HTML5 -->
<section>
<h2 class=underlined-header>Educational Background</h2>
<?php
	if(isset($_GET['msg'])) {
	$msg = $_GET['msg'];
		if(isset($_GET['msgType'])) {
			$msgType = $_GET['msgType'];
			if($msgType=='succ') {
			echo '
				<div class="box-info">
				  <div class="box-content">
					<p>' . $msg . '</p>
				  </div>
				</div>
				<br />
				<hr style="margin-top: -5px;" />
				';
			} else {
				echo'
				<div class="box-error">
				  <div class="box-content">
					<p>' . $msg . '</p>
				  </div>
				</div>
				<br />
				<hr style="margin-top: -5px;" />
				';
			}
		}
	} else {
	
	}
?>
<h4 class=underlined-header style="margin-top: 20px;">Elementary</h4>
<?php include("Gebel.php"); ?>

<h4 class=underlined-header style="margin-top: 20px;">Secondary</h4>
<?php include("Gebsl.php"); ?>

<h4 class=underlined-header style="margin-top: 20px;">Vocational</h4>
<ul class=tags-floated-list>
<li class=add1>
<a href="index.php?r=faculty/aebl&level=Vocational">Add Vocational Level</a>
</li>
</ul>
<?php include("Gebvl.php"); ?>

<h4 class=underlined-header style="margin-top: 20px;">College</h4>
<ul class=tags-floated-list>
<li class="add2">
<a href="index.php?r=faculty/aebl&level=College">Add College Level</a>
</li>
</ul>
<?php include("Gebcl.php"); ?>

<h4 class=underlined-header style="margin-top: 20px;">Masteral</h4>
<ul class=tags-floated-list>
<li class="add3">
<a href="index.php?r=faculty/aebl&level=Masteral">Add Masteral Level</a>
</li>
</ul>
<?php include("Gebml.php"); ?>

<h4 class=underlined-header style="margin-top: 20px;">Doctorate</h4>
<ul class=tags-floated-list>
<li class="add4">
<a href="index.php?r=faculty/aebl&level=Doctorate">Add Doctorate Level</a>
</li>
</ul>
<?php include("Gebdl.php"); ?>
<!-- End - Item description -->

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
Copyright 2013 <a href="#" title="Dbooom Themes">DFRAG Systems Solutions | PUP Taguig</a> - All Rights Reserved.
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

<img alt='Asset 4' data-color='#D64333' src='assets/backgrounds/4.jpg.pagespeed.ce.AV4Gchw-qN.jpg' width=1500 height=1064 />

</div>
<!-- End - Theme backgrounds -->
<link href='scripts/libs/switcher/switcher.css' rel=stylesheet />

<!-- Scripts -->
<script id=js-dispatcher src='scripts/scripts.js'></script>
</body>
</html>
