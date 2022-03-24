<?php
session_start();
if(isset($_SESSION['user'])) {
	if($_SESSION['user']==1) {

	} else if($_SESSION['user']==0) {
		header("location:index.php?r=faculty/");
	}
} else {
	header("location:index.php?r=site/");
}
$res=0;
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
<title>Faculty | Deactivate Account</title>
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
<h2 class=underlined-header>Activate Faculty Account</h2>
<?php
if (!isset($_GET['msg'])) {

} else {
$msg = $_GET['msg'];
	if($_GET['msgType']=="suc") {
		echo '<div class="box-error">';
		echo '<div class="box-content">';
		echo '<p>' . $msg . '</p>';
		echo '</div>';
		echo '</div>';
		$EmpID=$_GET['EmpID'];
		echo '<br /><center><p>
		<a href="index.php?r=administrator/func_dfm&EmpID=' . $EmpID .' "><input type=submit value=Deactivate /></a>
		<a href="index.php?r=administrator/deactivateFM"><input type=reset value=Cancel /></a>
		</p></center>';
		$res=1;
	}
	else if($_GET['msgType']=="err") {
		echo '<div class="box-error">';
		echo '<div class="box-content">';
		echo '<p>' . $msg . '</p>';
		echo '</div>';
		echo '</div>';

	}

}
?>
<?php
	$EmpID = $_GET['EmpID'];
	include("getPItodeactivateandactivate.php");
	$FullName = $firstname . " " . $middlename . " " . $surname; 
?>
<!-- End - Item description -->
<ul class="list-info">
	<li>Are you sure you want to activate the account of <?php echo '<strong>'.$FullName.'<strong>';?> </i></li>
</ul><br />
<form id="" action="index.php?r=administrator/processActivateFA" method=POST>
<p style="margin-bottom: 9px;">EMPLOYEE NO.: <input id=EmpID name="EmpID" type=text style="width: 50%; margin-top: -28px; margin-left: 25%;" value="<?php echo $EmpID; ?>" /></p>
<br />
<input type="hidden" name="Fcode" value="<?php echo $Fcode; ?>">
<input type="hidden" name="Empstat" value="<?php echo $empstat; ?>">
<input type="hidden" name="Evalroles" value="<?php echo $evlrls; ?>">
<p style="margin-top:-65px; margin-left: 367px;">
<input type=submit value=Activate />
</p></form>
<hr /> 
<?php
if ($res==1) {
		$EmpID = $_GET['EmpID'];
		$FullName = $_GET['FullName'];
		echo '
		<section class=\'widget-container widget-recent-posts\'>
		<h3 class=underlined-header style="margin-top:-20px;">Search Result</h3>
		<div>
		<ul class=\'widget-list recent-posts-list\'>
		<!-- Post item -->
		<li>
		<a class=\'element-holder media-link\' href=blog-post.html title=\'Proceed to post\'>
		<img alt=\'Proceed to article\' src=\'./assets/mini-1.jpg.pagespeed.ce.KJ7LLF9TLt.jpg\' width=60 height=60 />
		</a>
		<a class=post-link href=blog-post.html title=\'View Profile\'>
		<strong>' . $EmpID . '</strong>
		</a>
		<p style="margin-top: 0px; margin-left: 200px; width:100%;">
		' . $FullName . '
		</p><br />
		<span class=widget-hint style="margin-top:0px; margin-right:23px;">
		<a href=\'index.php?r=administrator/confirmUFM&empID=0001\'>Update</a>
		</span>
		</li>
		<!-- End - Post item -->
		</ul>
		</div>
		</section>'; 
}
?>
</section>
<!-- End - Showcase gallery -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->
<aside class=page-sidebar>
<section class='widget-container widget-categories'>
<h2 class=widget-heading>Faculty Management</h2>
<div class=widget-content>
<ul class='widget-list categories-list'>
<li>
<a href='index.php?r=administrator/lfa' >List of Faculty Accounts</a>
</li>

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
