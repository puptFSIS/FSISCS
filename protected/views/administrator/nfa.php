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
<title>Faculty | New Account</title>
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
<!-- Title and summary -->
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
<h2 class=underlined-header>New Faculty Member</h2>
<?php 
if (!isset($_GET['msg'])) {
	echo '<div class="box-success">';
	echo '<div class="box-content">';
	echo '<p>( * ) Required Field</p>';
	echo '</div>';
	echo '</div>';
} else {
$msg = $_GET['msg'];
	if($_GET['msgType']=="suc") {
		echo '<div class="box-info">';
		echo '<div class="box-content">';
		echo '<p>' . $msg . '</p>';
		echo '</div>';
		echo '</div>';
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

<?php if (isset($_GET['mes'])) : ?>
    <?php if ($_GET['mes']==0): ?>
    <div class="flash-data" data-flashdata="<?= $_GET['mes']?>"></div>
    <?php endif;?>

    <?php if ($_GET['mes']==1): ?>
    <div class="flash-data" data-flashdata="<?= $_GET['mes']?>"></div>
    <?php endif;?>

    <?php if ($_GET['mes']==2): ?>
    <div class="flash-data" data-flashdata="<?= $_GET['mes']?>"></div>
    <?php endif;?>
<?php endif;?>
<br />
<?php
include("GetFacultyCode.php");
?>
<form id=nfa action="index.php?r=administrator/processInsertFA" method=post>
<input type=hidden name=count value="<?php echo $count;?>"/>
<p style="margin-bottom: 9px;">* FACULTY CODE.: <input name="fcode" type=text style="width: 50%; margin-top: -28px; margin-left: 25%;" oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" value = "<?php echo $newFCode;?>"/></p>
<!--<p style="margin-bottom: 9px;">* EMPLOYEE NO.: <input id=EmpID name=EmpID type=text style="width: 50%; margin-top: -28px; margin-left: 25%;" /></p>-->
<p style="margin-bottom: 9px;">* SURNAME: <input id=sname name=sname type=text style="width: 50%; margin-top: -28px; margin-left: 25%;" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/(\..*?)\..*/g, '$1');" /></p>
<p style="margin-bottom: 9px;">* FIRST NAME: <input id=fname name=fname type=text style="width: 50%; margin-top: -28px; margin-left: 25%;" oninput="this.value = this.value.replace(/[^a-zA-Z]/g, '').replace(/(\..*?)\..*/g, '$1');"/></p>
<p style="margin-bottom: 9px;">* MIDDLE NAME: <input id=mname name=mname type=text style="width: 50%; margin-top: -28px; margin-left: 25%;" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/(\..*?)\..*/g, '$1');"/></p>
<p style="margin-bottom: 9px;">&nbsp&nbsp NAME EXTENSION: <input id=next name=next type=text style="width: 50%; margin-top: -28px; margin-left: 25%;" oninput="this.value = this.value.replace(/[^a-zA-Z]/g, '').replace(/(\..*?)\..*/g, '$1');"/></p>
<!-- <p style="margin-bottom: 9px;">* COURSE GROUP: <input name="cgroup" type=text style="width: 50%; margin-top: -28px; margin-left: 25%;" /></p> -->
<p style="margin-bottom: 9px;">* EMPLOYMENT TYPE: 
	<select name="emptype" style="width: 50%; margin-top: -28px; margin-left: 25%;">
		<option value="Permanent">Full-time</option>
		<option value="Part-time">Part-time</option>
		<option value="Temporary">Temporary</option>
	</select>
</p>
<p style="margin-bottom: 9px;">* PASSWORD: <input id=pass name=pass type=password style="width: 50%; margin-top: -28px; margin-left: 25%;" /></p>
<p style="margin-bottom: 9px;">* RE-TYPE: <input id=repass name=repass type=password style="width: 50%; margin-top: -28px; margin-left: 25%;" /></p>
<p style="margin-bottom: 9px;">* ROLE: 
	<select name="role" style="width: 50%; margin-top: -28px; margin-left: 25%;">
		<option value="Administrator">Administrator</option>
		<option value="Faculty Designee">Faculty Designee</option>
		<option value="HAP">HAP</option>
		<option value="HAP Secretary">HAP Secretary</option>
		<option value="Professor">Professor</option>
		<option value="Staff">Staff</option>
		<option value="System">System</option>
		
	</select>
</p>
<br />
<center><p>
<input type=submit value=Submit />
<input type=reset value=Reset />
</p></center>
</form>

</section>
<!-- End - Showcase gallery -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->
<aside class=page-sidebar>
<section class='widget-container widget-categories'>
<h2 class=widget-heading>Faculty and Staff Management</h2>
<div class=widget-content>
<?php include("facultyMenu.php");?>
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
<script src='assets/jquery-3.6.0.min.js'></script>
<script src='assets/sweetalert2.all.min.js'></script>
<script id=js-dispatcher src='scripts/scripts.js'></script>
<script>
	flashdata = $('.flash-data').data('flashdata')
	if(flashdata==1){
        Swal.fire({
            icon:'error',
            title:'Ooops!',
            text:'Full-time Employees are only allowed to be Faculty Designee!'
            
    })    
    }
</script>
</body>
</html>
