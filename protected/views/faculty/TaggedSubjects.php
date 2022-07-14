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
<title>Preferences | Tagged Subjects </title>
<!-- Page icon -->
<link href='puplogo.ico' rel='shortcut icon'/>
<!-- Stylesheets -->
<?php include("stylesheet.php");?>
<link href='styles/print.css' media=print rel=stylesheet />
<style type="text/css" media = "screen">
#page-title
{
    background-color: black;
    padding: 5px 5px 5px;
    height: 41px;
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
<section id=page-body-content>
<div id=page-body-content-inner>
<!-- Page content -->

<div id=page-content>
<!-- Video - HTML5 -->
<section>
<?php
	function to12Hr($ctime) {
		$strTime = "";
		$dn = "";

		if (strlen($ctime) == 4) {
			$hour = substr($ctime, 0, 2);
			$min = substr($ctime, 2, 3);



			if ($hour > 12) {
				$dn = "PM";
				if ($hour == 13) {
					$hour = "01";
				} else if ($hour == 14) {
					$hour = "02";
				} else if ($hour == 15) {
					$hour = "03";
				} else if ($hour == 16) {
					$hour = "04";
				} else if ($hour == 17) {
					$hour = "05";
				} else if ($hour == 18) {
					$hour = "06";
				} else if ($hour == 19) {
					$hour = "07";
				} else if ($hour == 20) {
					$hour = "08";
				} else if ($hour == 21) {
					$hour = "09";
				} else if ($hour == 22) {
					$hour = "10";
				}
			} else {
				$dn = "AM";
			}

			$strTime = $hour.":".$min." ".$dn;
		 } else {
		 	$hour = substr($ctime, 0, 1);
			$min = substr($ctime, 1, 2);

			if ($hour > 12) {
				$dn = "PM";
				if ($hour == 13) {
					$hour = "01";
				} else if ($hour == 14) {
					$hour = "02";
				} else if ($hour == 15) {
					$hour = "03";
				} else if ($hour == 16) {
					$hour = "04";
				} else if ($hour == 17) {
					$hour = "05";
				} else if ($hour == 18) {
					$hour = "06";
				} else if ($hour == 19) {
					$hour = "07";
				} else if ($hour == 20) {
					$hour = "08";
				} else if ($hour == 21) {
					$hour = "09";
				} else if ($hour == 22) {
					$hour = "10";
				}
			} else {
				$dn = "AM";
			}

			$strTime = $hour.":".$min." ".$dn;
		 }
		return $strTime;
	}

	function to24Hr($ctime) {
		$strTime = "";
		if($ctime=="07:00 AM") {
			$strTime = 700;
		} else if($ctime=="07:30 AM") {
			$strTime = 730;
		} else if($ctime=="08:00 AM") {
			$strTime = 800;
		} else if($ctime=="08:30 AM") {
			$strTime = 830;
		} else if($ctime=="09:00 AM") {
			$strTime = 900;
		} else if($ctime=="09:30 AM") {
			$strTime = 930;
		} else if($ctime=="10:00 AM") {
			$strTime = 1000;
		} else if($ctime=="10:30 AM") {
			$strTime = 1030;
		} else if($ctime=="11:00 AM") {
			$strTime = 1100;
		} else if($ctime=="11:30 AM") {
			$strTime = 1130;
		} else if($ctime=="12:00 NN") {
			$strTime = 1200;
		} else if($ctime=="12:30 NN") {
			$strTime = 1230;
		} else if($ctime=="01:00 PM") {
			$strTime = 1300;
		} else if($ctime=="01:30 PM") {
			$strTime = 1330;
		} else if($ctime=="02:00 PM") {
			$strTime = 1400;
		} else if($ctime=="02:30 PM") {
			$strTime = 1430;
		} else if($ctime=="03:00 PM") {
			$strTime = 1500;
		} else if($ctime=="03:30 PM") {
			$strTime = 1530;
		} else if($ctime=="04:00 PM") {
			$strTime = 1600;
		} else if($ctime=="04:30 PM") {
			$strTime = 1630;
		} else if($ctime=="05:00 PM") {
			$strTime = 1700;
		} else if($ctime=="05:30 PM") {
			$strTime = 1730;
		} else if($ctime=="06:00 PM") {
			$strTime = 1800;
		} else if($ctime=="06:30 PM") {
			$strTime = 1830;
		} else if($ctime=="07:00 PM") {
			$strTime = 1900;
		} else if($ctime=="07:30 PM") {
			$strTime = 1930;
		} else if($ctime=="08:00 PM") {
			$strTime = 2000;
		} else if($ctime=="08:30 PM") {
			$strTime = 2030;
		} else if($ctime=="09:00 PM") {
			$strTime = 2100;
		} else if($ctime=="09:30 PM") {
			$strTime = 2130;
		} else if($ctime=="10:00 PM") {
			$strTime = 2200;
		} else if($ctime=="10:30 PM") {
			$strTime = 2230;
		}
		return $strTime;
	}
?>

<h2 class="underlined-header">Tagged Subjects</h2>

<a href="index.php?r=faculty/tagSubjects" class="btn btn-minisel">Add Prefered Subjects</a>
<br />


</section>
<section>
	<table class=round-5 style="width:100%; ">
		<thead>
			<tr>
				<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">CODE</td>
				<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">TITLE</td>
				<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">LEC</td>
				<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">LAB</td>
				<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">UNITS</td>
				<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;">ACTION</td>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($SubPref as $row): ?>
				<tr>
					<td style="text-align: left;"><?php echo $row['scode'] ?></td>
					<td style="text-align: left;"><?php echo $row['stitle'] ?></td>
					<td style="text-align: left;"><?php echo $row['lec'] ?></td>
					<td style="text-align: left;"><?php echo $row['lab'] ?></td>
					<td style="text-align: center;"><?php echo $row['units'] ?></td>

					<td style="text-align: center;">									
					<a href="index.php?r=faculty/DeleteTagged&schedID=<?php echo $row['schedID'] ?>&sem=<?php echo $sem ?>&sy=<?php $sy ?>" class="btn btn-primary" style="width:45px">DELETE</a>									
					</td>
														
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
<?php if (isset($_GET['mes'])) : ?>
	<?php if ($_GET['mes']==1): ?>
	<div class="flash-data" data-flashdata="<?= $_GET['mes']?>"></div>
	<?php endif;?>
<?php endif;?>
</section>
<!-- End - Page body content -->
</div>
<!-- End - Page content -->
<!-- Page sidebar-->
<aside class=page-sidebar>
<section class='widget-container widget-categories'>
<div class=widget-content>
<ul class='widget-list categories-list'>
<?php include("SubjectMenu.php");?>
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
	$('.btn-primary').on('click', function(e) {
		e.preventDefault();
		const href = $(this).attr('href');

		Swal.fire({
			title: 'Are you sure?',
			text: 'Confirm Untagging this Subject?',
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
	if(flashdata==1){
		Swal.fire({
			icon:'success',
			title:'Success!',
			text:'Subject Untagged!',
			timer: '2000'
		})
	}
</script>
</body>
</html>

