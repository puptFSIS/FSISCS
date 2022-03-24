<?php
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
<title>Forms | Home</title>
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
</style>

<style type="text/css">
    .page-content{

    }
    #st-box 
    {
        padding: 1px 2px;
        display: flex;
        justify-content: center;
        float:left;
        width:150px;
        height:70px;
        border-radius: 12px;
        box-shadow: 0 5px 10px rgba(0,0,0,0.1);
        background: #fff;
        
    }
    #nd-box 
    {
        padding: 1px 2px;
        display: flex;
        justify-content: center;
        float:left;
        width:150px;
        height:70px;
        margin-left:70px;
        border-radius: 12px;
        box-shadow: 0 5px 10px rgba(0,0,0,0.1);
        background: #fff;
    }

    #rd-box 
    {
        padding: 1px 2px;
        display: flex;
        justify-content: center;
        float:right;
        width:150px;
        height:70px;
        border-radius: 12px;
        box-shadow: 0 5px 10px rgba(0,0,0,0.1);
        background: #fff;
        

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
<?php include("nav.php");?>
<div class=container-inner>
<!-- Page title -->
<!-- End - Page title -->
<!-- Page body content -->
<section id=page-body-content>
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

<div id=page-body-content-inner>

<!-- Page content -->

<div id=page-content>
<h2>Dashboard</h2>
<!-- School Year -->

<div id="st-box">
    <!-- small card -->
    <div class="small-box ">
      <div class="inner">
        <h3><?= $sy;?></h3>

        <center><p>Active School Year</p></center>
      </div>
      <a href="#" class="small-box-footer">
       
      </a>
</div>
</div>

<div id="nd-box">
    <!-- small card -->
    <div class="small-box ">
      <div class="inner">
        <?php if ($sem == 1): ?>
            <h3>1st Semester</h3>
        <?php endif ?>
        <?php if ($sem == 2): ?>
            <h3>2nd Semester</h3>
        <?php endif ?>
        <?php if ($sem == 3): ?>
            <h3>Summer</h3>
        <?php endif ?>
        

        <center><p>Active Semester</p></center>
      </div>
     
</div>
</div>

<div id="rd-box">
    <!-- small card -->
    <div class="small-box ">
      <div class="inner">
        <center><h3><?= $requests;?></h3></center>

        <center><p>Requested Changes</p></center>
      </div>
      <a href="#" class="small-box-footer">
       
      </a>
</div>
</div>

<br />
<br />
<br />

<!-- Video - HTML5 -->
<section>
<br />
<br />
<h2>How-To Video</h2>
<p>This video will teach you, administrator, on how to use the systems and all its functions for your convenience.</p>
<iframe width="600" height="375" src="//www.youtube.com/embed/GndFY0R3THQ?list=PL-E9-Z9XrAcTe-VQhI2O0fDyQRjhRM_OK" frameborder="0" allowfullscreen></iframe>

  

</section>
<!-- End - Video -HTML5 -->
<br/>

<!-- End - Showcase gallery -->
</div>
<!-- End - Page content -->
<!-- Page sidebar-->
<aside class=page-sidebar>
<section class='widget-container widget-categories'>
<div class=widget-content>
<?php include("SchedulingMenu.php");?>

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
<script src='<?php echo Yii::app()->getBaseUrl()?>assets/jquery-3.6.0.min.js'></script>
<script src='<?php echo Yii::app()->getBaseUrl()?>assets/sweetalert2.all.min.js'></script>
<script id=js-dispatcher src='scripts/scripts.js'></script>

<script>
    flashdata = $('.flash-data').data('flashdata')
    if(flashdata==0){
        Swal.fire({
            icon:'success',
            title:'Success!',
            text:'Teaching Assignment Units Updated!',
            timer: '2000'
        })
    }

    if(flashdata==1){
        Swal.fire({
            icon:'success',
            title:'Success!',
            text:'Dashboard Updated!',
            timer: '2000'
        })
    }
</script>
</body>
</html>

