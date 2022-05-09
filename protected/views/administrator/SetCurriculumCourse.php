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
<title>Scheduling | View Curriculum</title>
<!-- Page icon -->
<link href='puplogo.ico' rel='shortcut icon'/>
<!-- Stylesheets -->
<style media=screen type='text/css'>@import "styles/base.css";
.cssLT #ut, .cssUT #ut{filter:progid:DXImageTransform.Microsoft.DropShadow(enabled=false);}
.cssWLGradientIMG{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMGSSL{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMG
{BACKGROUND-IMAGE: url(images/hd.jpg);BACKGROUND-REPEAT:repeat-x;top:0;height:105px;}
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
<section id=page-body-content>
<div id=page-body-content-inner>
<!-- Page content -->
<div id=page-content>
<!-- Video - HTML5 -->
<section>

<h2 class="underlined-header"><?php echo $_GET['year']?> Course Curriculum</h2>

<h4 class="underlined-header"><?php echo $_GET['courseName'];?></h4>
<a href = "index.php?r=administrator/PrintSpecificCourseCurr&courseID=<?php echo $_GET['courseID']?>&year=<?php echo $_GET['year']?>&courseName=<?php echo $_GET['courseName']?>" class = "btn btn-r" style = "font-size:13px; font-weight:bold;" target = "blank">Print Curriculum</a> <br>

<section>
<a href="index.php?r=administrator/ViewCurriculumCourses&year=<?php echo $_GET['year']?>" style ="left: -60px;top: -110px; position:relative;"><button style="height:35px;">BACK</button></a>
<?php 
	$years = $course['NoOfYears'];
?>
<br/>
<?php for($year = 1; $year <= $years; $year++):?>
	
		<?php if($year==1) {
				$yr = "1ST";
			} else if($year==2) {
				$yr = "2ND";
			} else if($year==3) {
				$yr = "3RD";
			} else if($year==4) {
				$yr = "4TH";
			} else if($year==5) {
				$yr = "5TH";
			} 
		?>
		<details open>
		<summary class=underlined-header><?php echo $yr?> YEAR</summary>
	<?php for($sem = 1;$sem <= 3; $sem++):?>
		<?php if($sem == 1){
			$wordSem = "1ST SEMESTER";
		}else if($sem == 2){
			$wordSem = "2ND SEMESTER";
		}else if($sem == 3){
			$wordSem = "SUMMER";
		} ?>

		<?php 
			$totUnits = 0;
		?>
		<div class="details-content">
		<table>
			<thead>
				<tr>
					<td class="table-narrow" colspan="6" style="text-align: left"><a class="btn btn-mini pull-right"><?php echo $wordSem?></a><a href="index.php?r=administrator/AddCurriculumSubj&courseID=<?php echo $_GET['courseID']?>&year=<?php echo $_GET['year']?>&sem=<?php echo $sem?>&cyear=<?php echo $year?>&courseName=<?php echo $_GET['courseName']?>"class="btn btn-mini">ADD SUBJECT</a></td>
				</tr>
				<tr>
					
					<td style="text-align: center;background-color: maroon; color: white; font-weight: bold; width: 75px;">CODE</td>
					<td style="text-align: center;background-color: maroon; color: white; font-weight: bold;">TITLE</td>
					<td style="text-align: center;background-color: maroon; color: white; font-weight: bold; width: 30px;">UNITS</td>
					<td style="text-align: center;background-color: maroon; color: white; font-weight: bold; width: 50px;">LEC/LAB</td>
					
					<td style="text-align: center;background-color: maroon; color: white; font-weight: bold; width: 50px;">ACTION</td>
				
				</tr>
			</thead>

			<tbody>
				<?php foreach ($curriculum as $row): ?>
					<?php if ($row['courseID'] == $_GET['courseID'] AND $row['currID']==$_GET['year'] AND $row['sem'] == $sem AND $row['cyear'] == $year): ?>
						<?php $totUnits += $row['sunit']?>
						<tr>
							<td><?php echo $row['scode'] ?></td>
							<td><?php echo $row['stitle']?></td>
							<td><?php echo $row['sunit'] ?></td>
							<td><?php echo $row['hrs_lec'] .'/'. $row['hrs_lab']?></td>
							
							<td><a href="index.php?r=administrator/processDeleteCurriculumSubj&courseID=<?php echo $row['courseID']?>&currYear=<?php echo $row['currID']?>&sem=<?php echo $row['sem']?>&cyear=<?php echo $row['cyear']?>&courseName=<?php echo $_GET['courseName']?>&subjectCode=<?php echo $row['scode']?>"><button style="width:75px;height:40">Delete</button></a> </td>
						</tr>
					<?php endif ?>
				<?php endforeach ?>
				<?php if ($totUnits != 0): ?>
					<tr>
						<td>TOTAL UNITS:</td>
						<td></td>
						<td><?php echo $totUnits?></td>
						<td></td>
						
						<td></td>
					</tr>
				<?php endif ?>
			</tbody>
		</table>
		</div>
	<?php endfor?>
	<br>
	</details>
<?php endfor?>




</section>

</section>
<!-- End - Page body content -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->
<aside class=page-sidebar>
<section class='widget-container widget-categories'>

<div class=widget-content>
<ul class='widget-list categories-list'>
<?php include("SchedulingMenu.php");?>
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
<script src='assets/jquery-3.6.0.min.js'></script>
<script src='assets/sweetalert2.all.min.js'></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script id=js-dispatcher src='scripts/scripts.js'></script>
<script>
	flashdata = $('.flash-data').data('flashdata')
	if(flashdata==1){
		Swal.fire({
			icon:'success',
			title:'Success!',
			text:'Subject Added!'
			
		})
	}
</script>
</body>
</html>
