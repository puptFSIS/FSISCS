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
<title>Scheduling | View Subject Load</title>
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

	<?php if ($_GET['mes']==3): ?>
	<div class="flash-data" data-flashdata="<?= $_GET['mes']?>"></div>
	<?php endif;?>
<?php endif;?>
<h2 class="underlined-header">View Subject Load</h2>
<a href="index.php?r=administrator/CurriculumManagement&courseID=<?php echo $_GET['courseID']?>&sy=<?php echo $_GET['sy']?>" style ="left: 35em;top: 140px; position:absolute;"><button style="height:35px;">BACK</button></a>
<?php
	$currYear=date("Y")+1;
	$prevYear=date("Y");
	$yearString = "(".$prevYear."-".$currYear.")";
	
	?>
<br />
<h4 class="underlined-header"><?php $cID=$_GET['courseID']; echo getCourseCode($cID); ?></h4>
<h4 class="underlined-header"><?php $sy=$_GET['sy']; echo 'SY '.$sy;?></h4>	
<a href = "index.php?r=administrator/PrintCurriculum&hcourse=<?php { echo $_GET['courseID']; }?>&hyear=<?php { echo $_GET['year']; }?>&hcurrID=<?php { echo $_GET['currID']; }?>&hsy=<?php { echo $_GET['sy']; }?>" class = "btn btn-r" style = "font-size:13px; font-weight:bold;" target = "blank">Print Curriculum</a>

<section>

<?php
	$sy="";
	if(isset($_GET['courseID'])) 
	{
	if(isset($_GET['sy']))
	{
		$sy = $_GET['sy'];
	}
	$cID = $_GET['courseID'];
	$cYear = $_GET['year'];
	$currID = $_GET['currID'];
	$currYear = $_GET['currYear'];
	$NoOfYears = getCourseYears($cID);
	$TSem = 3;
	$yr = "";
	$strSem = "";
	for($i=1;$i<2;$i++) {
		// DISPLAY COURSE YEAR and SECTION and SEMESTER
		for($cSem=1;$cSem<=$TSem;$cSem++) {
			// DISPLAY TABLE HEADER and FOOTER
			if($cYear==1) {
				$yr = "1ST";
			} else if($cYear==2) {
				$yr = "2ND";
			} else if($cYear==3) {
				$yr = "3RD";
			} else if($cYear==4) {
				$yr = "4TH";
			} else if($cYear==5) {
				$yr = "5TH";
			}
			
			if($cSem==1) {
				$strSem = "FIRST SEMESTER";
			} else if($cSem==2) {
				$strSem = "SECOND SEMESTER";
			} else if($cSem==3){
				$strSem = "SUMMER";
			}
			
			echo '
				<table>
					<tbody>
						<tr>
							<td class="table-narrow" colspan="6" style="text-align: left"><a class="btn btn-mini">'. $yr .' YEAR</a><a class="btn btn-mini pull-right">'. $strSem .'</a><a href="index.php?r=administrator/AddCurrSubj&courseID='.$cID.'&year='.$cYear.'&currID='.$currID.'&sem='.$cSem.'&sy='.$sy.'&currYear='.$currYear.'"class="btn btn-mini">ADD SUBJECT</a></td>
						</tr>
						<tr>
							<td style="background-color: maroon; color: white; font-weight: bold; width: 75px;">CODE</td>
							<td style="background-color: maroon; color: white; font-weight: bold;">TITLE</td>
							<td style="background-color: maroon; color: white; font-weight: bold; width: 30px;">UNITS</td>
							<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;">LEC/LAB</td>
							<td style="background-color: maroon; color: white; font-weight: bold; width: 70px;">Pre-requisite</td>
							<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;">ACTION</td>
						</tr>
			';
	
			$query = "SELECT * FROM tbl_subjectload WHERE courseID='$cID' AND cyear='$cYear' AND sem='$cSem' AND currID='$currID'";
			$result = mysqli_query($conn,$query);
			$totunits = 0;
			$totlec = 0;
			$totlab = 0;
			$tothrs = 0;
			while($row=mysqli_fetch_array($result)) {
				$totunits = $totunits + $row['sunit']; 
				$totlec = $totlec + $row['hrs_lec']; 
				$totlab = $totlab + $row['hrs_lab']; 
				$tothrs = $totlec + $totlab;
				$lec = round($row['hrs_lec'],1);
				$lab = round($row['hrs_lab'],1);
				
				echo '
					<tr>
						<td>'. $row['scode'] .'</td>
						<td>'. $row['stitle'] .'</td>
						<td>'. $row['sunit'] .'</td>
						<td>'. $lec .'/'. $lab .'</td>
						<td>'. $row['prereq'] .'</td>
						<td><a href="index.php?r=administrator/processDeleteCurrSubj&currID='.$currID.'&courseID='.$cID.'&scode='.$row['scode'].'&year='.$cYear.'&sy='.$sy.'&currYear='.$currYear.'"><button style="width:75px;height:40">Delete</button></a> <a href="index.php?r=administrator/AddPrereq&currID='.$currID.'&courseID='.$cID.'&scode='.$row['scode'].'&year='.$cYear.'&sy='.$sy.'&currYear='.$currYear.'"><button style="width:75px">Add Pre-req</button></a></td>
					</tr>
				';
			}
				if($totunits<>0)
				{
				echo '
					<tr>
						<td>TOTAL</td>
						<td></td>
						<td>'.$totunits.'</td>
						<td>'.$tothrs.'</td>
						<td></td>
						<td></td>
					</tr>
					</tbody>
				</table>';		
				
				}elseif($totunits==0)
				{
					echo '
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					</tbody>
				</table>';	
				}
		}
	}
	}
	
	$query2 = "SELECT * FROM tbl_curriculum WHERE cyear = '$cYear' AND courseID='$cID' AND currID='$currID'";
	$result2 = mysqli_query($conn,$query2);
	$unts = 0;
	while($row2=mysqli_fetch_array($result2)) {
		$unts = $unts + $row2['sunit']; 
	}
	echo'
			<table>
						<tbody>
							<tr>
								<td class="table-narrow" colspan="6" style="text-align: left; font-weight: bold">GRAND TOTAL</td>
								<td><td/>
								<td></td>
								<td></td>
								<td></td>
								<td style = "font-weight: bold">'.$unts.' UNITS</td>
							</tr>
						</tbody>
			</table>
			';

	function getSY(){
			if(isset($_POST['sy'])){
				$sy = $_POST['sy'];
			}
		}
	
	function getCourseYears($cID) {
		include("config.php");
		$sql = "SELECT * FROM tbl_course WHERE course='$cID' ORDER by NoOfYears ASC";
		$result = mysqli_query($conn,$sql);
		$NoOfYears = 0;
		while($row=mysqli_fetch_array($result)) {
			$NoOfYears = $row['NoOfYears'];
		}
		return $NoOfYears;
	}
	
	function getMaxSem($cID){
		include("config.php");
		$sql = "SELECT * FROM tbl_curriculum WHERE courseID='$cID' ORDER by sem ASC";
		$result = mysqli_query($conn,$sql);
		$Msem = 0;
		while($row=mysql_fetch_array($result)) {
			$Msem = $row['sem'];
		}
		return $Msem;
	}
	
	function getCourseCode($cID){
		include("config.php");
		$sql = "SELECT * FROM tbl_course WHERE course='$cID'";
		$result = mysqli_query($conn,$sql);
		$ccode = "";
		while($row=mysqli_fetch_array($result)) {
			$ccode = $row['course_code'] . ' - ' .$row['course_desc'];
		}
		return $ccode;
	}
	
?>



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
<script src='<?php echo Yii::app()->getBaseUrl() ?>assets/jquery-3.6.0.min.js'></script>
<script src='<?php echo Yii::app()->getBaseUrl() ?>assets/sweetalert2.all.min.js'></script>
<script id=js-dispatcher src='scripts/scripts.js'></script>

<script>
	$('.btn-primarydel').on('click', function(e) {
		e.preventDefault();
		const href = $(this).attr('href');

		Swal.fire({
			title: 'Are you sure?',
			text: 'Confirm Undo this Schedule?',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Confirm',

		}).then((result) => {
			if(result.value){
				document.location.href = href;
			}
		})
	})

	flashdata = $('.flash-data').data('flashdata')
	if(flashdata==0){
		Swal.fire({
			icon:'success',
			title:'Success!',
			text:'Subject Added!',
			timer: '2000'
		})
	}

	if(flashdata==1){
		Swal.fire({
			icon:'success',
			title:'Success!',
			text:'Subject Deleted!',
			timer: '2000'
		})
	}

	if(flashdata==3){
		Swal.fire({
			icon:'success',
			title:'Success!',
			text:'Schedule has been Reset!',
			timer: '2000'
		})
	}
</script>
</body>
</html>
