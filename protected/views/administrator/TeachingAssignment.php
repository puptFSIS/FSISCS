<?php
include("config.php");
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
<title>Scheduling | Teaching Assignment</title>
<!-- Page icon -->
<link href='puplogo.ico' rel='shortcut icon'/>
<!-- Stylesheets -->
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css">
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

.dataTables_filter {
   float: left !important;
}

.dataTables_filter input {
width: 300px;
} 

.modal-backdrop {
    /* bug fix - no overlay */    
    display: none;    
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

<h2 class="underlined-header">Teaching Assignment</h2>

<?php 
$sem = "";
$sy = "";
foreach ($SyAndSem as $row){
    $sy = $row['schoolYear'];
    $sem = $row['sem'];
} 
?>


<section>

<table id="ProfTable" class=round-3 style="width:100%;">
	<thead>
		<tr>
			<td style="background-color: maroon; color: white; font-weight: bold; width: 75px; text-align: center">Name</th>
			<td style="background-color: maroon; color: white; font-weight: bold; width: 75px; text-align: center">Action</th>
		</tr>
	</thead>

    <tbody>
    <?php foreach ($prof as $row): ?>
        <tr>
            <td style="text-align:center;"><?php echo $row['LName']." ".$row['FName'] ?></td>
            <td style="text-align:center;"><a href="index.php?r=administrator/ShowProfSubject&sem=<?php echo $sem?>&sy=<?php echo $sy?>&prof=<?php echo $row['FCode']?>" class = "btn btn-mini">SET</a></td>
        </tr>
    <?php endforeach ?>
	
	</tbody>
</table>

</section>
<!-- End - Page body content -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->
<aside class=page-sidebar>
<section class='widget-container widget-categories'>


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
<script src='<?php echo Yii::app()->getBaseUrl() ?>assets/jquery-3.6.0.min.js'></script>
<script src='<?php echo Yii::app()->getBaseUrl() ?>assets/sweetalert2.all.min.js'></script>
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl() ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl() ?>assets/js/datatables.min.js"></script>
<script id=js-dispatcher src='scripts/scripts.js'></script>

<script>
    var ProfTable = $("#ProfTable").DataTable({
        "scrollY":        "50vh",
        "scrollCollapse": true,
        "paging":         false,
        "lengthChange": false,
        language: { 
        search: "", 
        searchPlaceholder: "Search:" },
        columnDefs: [ {
            orderable: false,
            targets:   0,
        } ],
        

    });
</script>

</body>
</html>
