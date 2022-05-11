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
<title>Scheduling | Faculty Teaching Assignment</title>
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
    height: 50px;
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
<?php $profName = getProf($prof); 
	$lastName = $profName['LName'];
	$firstName = $profName['FName'];
?>
<?php 
$totUnits = 0;
foreach ($subject as $row){
	if ($row['load_type'] != NULL) {
		$totUnits += $row['units'];
	}
}
?>

<?php if ($sem == 1): ?>
	<h2 class="underlined-header"><?php echo $lastName.", ".$firstName ?> Teaching Assignment <?php echo $sem."st Semester A.Y. ".$sy ?></h2>
<?php endif ?>
<?php if ($sem == 2): ?>
	<h2 class="underlined-header"><?php echo $lastName.", ".$firstName ?> Teaching Assignment <br/><?php echo $sem."nd Semester A.Y. ".$sy ?></h2>
<?php endif ?>
<section>
<table id="ProfSubTable" class="table table-bordered table-striped table-hover" style="width:100%; ">
	<thead>
		<tr>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">CODE</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;" >TITLE</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">LEC</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">LAB</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">UNITS</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">COURSE</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 160px;text-align: center;">DAY</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">TIME</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">ROOM</th>
			
			
		</tr>
	</thead>

	<tbody>
		<?php foreach ($subject as $row): ?>
			<?php if ($row['load_type']==NULL): ?>
				<tr>
					<td style="text-align: center;"><?php echo $row['scode'] ?></td>
					<td style="text-align: left;"><?php echo $row['stitle'] ?></td>
					<td style="text-align: center;"><?php echo $row['lec'] ?></td>
					<td style="text-align: center;"><?php echo $row['lab'] ?></td>
					<td style="text-align: center;"><?php echo $row['units'] ?></td>
					<td style="text-align: center;"><?php echo getCourse($row['courseID']) ?></td>
					<td style="text-align: center;"><?php echo $row['sday'] ?></td>
					<?php if ($row['stimeS2']=="" || $row['stimeS2'] == NULL): ?>
						<td style="text-align: center;"><?php echo to12Hr($row['stimeS'])."-".to12Hr($row['stimeE']) ?></td>
						<?php else: ?>
							<td style="text-align: center;"><?php echo to12Hr($row['stimeS'])."-".to12Hr($row['stimeE'])."/".to12Hr($row['stimeS2'])."-".to12Hr($row['stimeE2']) ?></td>
					<?php endif ?>
					<td style="text-align: center;"><?php echo $row['sroom'] ?></td>
					
					
				</tr>
			<?php endif ?>
		
		<?php endforeach ?>
	</tbody>
</table>

<p><a href="index.php?r=administrator/PrintFacultyAssign&sem=<?php echo $_GET['sem']?>&sy=<?php echo $_GET['sy']?>&prof=<?php echo $_GET['prof'] ?>" class = "btn btn-primary" target ="_blank">Print</a></p>

</section>
<!-- End - Page body content -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->
<aside class=page-sidebar>
<section class='widget-container widget-categories'>
<h2>Current Total Units: <?php echo $totUnits ?> Units</h2>
<!-- Regular Load Table -->
<?php $totUnits = 0; 
	foreach ($subject as $row){
		if ($row['load_type']==1 AND $row['load_type'] != NULL){
			$totUnits += $row['units'];
		}
	}
?>

<?php if ($limit['Regular_Load'] != 0): ?>
	<?php if ($totUnits == $limit['Regular_Load'] || $totUnits > $limit['Regular_Load']): ?>
		<?php $totUnits = 0 ?>
		<h4 class="underlined-header">Regular Load <a style="color: white;"><button disabled>SET</button></a></h4>
		<table class=round-3 style="width:100%;">
			<thead>
				<tr>
					<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">CODE</th>
					<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;" >TITLE</th>
					<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">LEC</th>
					<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">LAB</th>
					<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">UNITS</th>
					<th style="background-color: maroon; color: white; font-weight: bold; width: 100px;text-align: center;">COURSE</th>
					<th style="background-color: maroon; color: white; font-weight: bold; width: 100px;text-align: center;">DAY</th>
					<th style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;">TIME</th>
					<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">ROOM</th>
					<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">ACTION</th>
					
				</tr>
			</thead>
			
			<tbody>
			<?php foreach ($subject as $row): ?>
				<?php if ($row['load_type']==1): ?>
					<tr>
					<td style="text-align: center; background-color: white;"><?php echo $row['scode'] ?></td>
					<td style="text-align: left; background-color: white;"><?php echo $row['stitle'] ?></td>
					<td style="text-align: center; background-color: white;"><?php echo $row['lec'] ?></td>
					<td style="text-align: center; background-color: white;"><?php echo $row['lab'] ?></td>
					<td style="text-align: center; background-color: white;"><?php echo $row['units'] ?></td>
					<td style="text-align: center; background-color: white;"><?php echo getCourse($row['courseID']) ?></td>
					<td style="text-align: center; background-color: white;"><?php echo $row['sday'] ?></td>
					<?php if ($row['stimeS2']=="" || $row['stimeS2'] == NULL): ?>
						<td style="text-align: center;background-color: white;"><?php echo to12Hr($row['stimeS'])."-".to12Hr($row['stimeE']) ?></td>
						<?php else: ?>
							<td style="text-align: center;background-color: white;"><?php echo to12Hr($row['stimeS'])."-".to12Hr($row['stimeE'])."/".to12Hr($row['stimeS2'])."-".to12Hr($row['stimeE2']) ?></td>
					<?php endif ?>
					<td style="text-align: center; background-color: white;"><?php echo $row['sroom'] ?></td>
					<td style="text-align: center; background-color:white;"><a href="index.php?r=administrator/SetLoadToNull&sem=<?php echo $sem ?>&sy=<?php echo $sy ?>&prof=<?php echo $prof ?>&sched_id=<?php echo $row['schedID'] ?>"><button>DELETE</button></a></td>
					
				</tr>
				<?php $totUnits += $row['units']; ?>
				<?php endif ?>
				
			<?php endforeach ?>
			</tbody>
		</table>
		<p><center><?php echo "Total Units:".$totUnits." Units"; ?></center></p>

		<br>
		<br>
	<?php else: ?>
		<?php $totUnits = 0;$totalUnits=0; ?>
		<?php foreach ($subject as $row){
				if ($row['load_type']==1 AND $row['load_type'] != NULL){
					$totalUnits += $row['lec'] + $row['lab'];
				}

				// $totalUnits = $totUnits;
				// $totUnits = 0;
			} 
		?>
		<h4 class="underlined-header">Regular Load <a href="index.php?r=administrator/SetTeachingAssignment&mode=Regular&sem=<?php echo $sem?>&sy=<?php echo $sy?>&prof=<?php echo $prof?>&totalUnits=<?php echo $totalUnits ?>" style="color: white;"><button>SET</button></a></h4>
		<table class=round-3 style="width:100%;">
			<thead>
				<tr>
					<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">CODE</th>
					<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;" >TITLE</th>
					<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">LEC</th>
					<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">LAB</th>
					<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">UNITS</th>
					<th style="background-color: maroon; color: white; font-weight: bold; width: 100px;text-align: center;">COURSE</th>
					<th style="background-color: maroon; color: white; font-weight: bold; width: 100px;text-align: center;">DAY</th>
					<th style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;">TIME</th>
					<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">ROOM</th>
					<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">ACTION</th>
					
				</tr>
			</thead>
			
			<tbody>
			<?php foreach ($subject as $row): ?>
				<?php if ($row['load_type']==1 AND $row['load_type'] != NULL): ?>
					<tr>
					<td style="text-align: center; background-color: white;"><?php echo $row['scode'] ?></td>
					<td style="text-align: left; background-color: white;"><?php echo $row['stitle'] ?></td>
					<td style="text-align: center; background-color: white;"><?php echo $row['lec'] ?></td>
					<td style="text-align: center; background-color: white;"><?php echo $row['lab'] ?></td>
					<td style="text-align: center; background-color: white;"><?php echo $row['units'] ?></td>
					<td style="text-align: center; background-color: white;"><?php echo getCourse($row['courseID']) ?></td>
					<td style="text-align: center; background-color: white;"><?php echo $row['sday'] ?></td>
					<?php if ($row['stimeS2']=="" || $row['stimeS2'] == NULL): ?>
						<td style="text-align: center;background-color: white;"><?php echo to12Hr($row['stimeS'])."-".to12Hr($row['stimeE']) ?></td>
						<?php else: ?>
							<td style="text-align: center;background-color: white;"><?php echo to12Hr($row['stimeS'])."-".to12Hr($row['stimeE'])."/".to12Hr($row['stimeS2'])."-".to12Hr($row['stimeE2']) ?></td>
					<?php endif ?>
					<td style="text-align: center; background-color: white;"><?php echo $row['sroom'] ?></td>
					<td style="text-align: center; background-color:white;"><a href="index.php?r=administrator/SetLoadToNull&sem=<?php echo $sem ?>&sy=<?php echo $sy ?>&prof=<?php echo $prof ?>&sched_id=<?php echo $row['schedID'] ?>"><button>DELETE</button></a></td>
					
				</tr>
				<?php $totUnits += $row['units']; ?>
				<?php endif ?>
				
			<?php endforeach ?>
			</tbody>
		</table>
		<p><center><?php echo "Total Units:".$totUnits." Units"; ?></center></p>

		<br>
		<br>
	<?php endif ?>
<?php endif ?>

<!-- Part Time Load Table -->
<?php $totUnits = 0; 
	foreach ($subject as $row){
		if ($row['load_type']==0 AND $row['load_type'] != NULL){
			$totUnits += $row['units'];
		}
	}
?>

<?php if ($totUnits == $limit['PartTime_Load'] || $totUnits > $limit['PartTime_Load']): ?>
	<?php $totUnits = 0 ?>
	<h4 class="underlined-header">Part Time Load <a style="color: white;"><button disabled>SET</button></a></h4>
<table class=round-3 style="width:100%;">
	<thead>
		<tr>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">CODE</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;" >TITLE</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">LEC</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">LAB</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">UNITS</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">COURSE</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 160px;text-align: center;">DAY</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;">TIME</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">ROOM</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">ACTION</th>
			
		</tr>
	</thead>
	
	<tbody>
	<?php foreach ($subject as $row): ?>
		<?php if ($row['load_type']==0 AND $row['load_type'] != NULL): ?>
			<tr>
			<td style="text-align: center; background-color: white;"><?php echo $row['scode'] ?></td>
			<td style="text-align: left; background-color: white;"><?php echo $row['stitle'] ?></td>
			<td style="text-align: center; background-color: white;"><?php echo $row['lec'] ?></td>
			<td style="text-align: center; background-color: white;"><?php echo $row['lab'] ?></td>
			<td style="text-align: center; background-color: white;"><?php echo $row['units'] ?></td>
			<td style="text-align: center; background-color: white;"><?php echo getCourse($row['courseID']) ?></td>
			<td style="text-align: center; background-color: white;"><?php echo $row['sday'] ?></td>
			<?php if ($row['stimeS2']=="" || $row['stimeS2'] == NULL): ?>
				<td style="text-align: center;background-color: white;"><?php echo to12Hr($row['stimeS'])."-".to12Hr($row['stimeE']) ?></td>
				<?php else: ?>
					<td style="text-align: center;background-color: white;"><?php echo to12Hr($row['stimeS'])."-".to12Hr($row['stimeE'])."/".to12Hr($row['stimeS2'])."-".to12Hr($row['stimeE2']) ?></td>
			<?php endif ?>
			<td style="text-align: center; background-color: white;"><?php echo $row['sroom'] ?></td>
			<td style="text-align: center; background-color:white;"><a href="index.php?r=administrator/SetLoadToNull&sem=<?php echo $sem ?>&sy=<?php echo $sy ?>&prof=<?php echo $prof ?>&sched_id=<?php echo $row['schedID'] ?>"><button>DELETE</button></a></td>
			
		</tr>
		<?php $totUnits += $row['units']; ?>
		<?php endif ?>
		
	<?php endforeach ?>
	</tbody>
</table>
<p><center><?php echo "Total Units:".$totUnits." Units"; ?></center></p>

<br>
<br>

	<?php else: ?>
	<?php $totUnits = 0; $totalUnits=0;?>
			<?php foreach ($subject as $row){
				if ($row['load_type']==0 AND $row['load_type'] != NULL){
					$totalUnits += $row['lec'] + $row['lab'];
				}

				// $totalUnits = $totUnits;
				// $totUnits = 0;
			} 
			?>
		<h4 class="underlined-header">Part Time Load <a href="index.php?r=administrator/SetTeachingAssignment&mode=PartTime&sem=<?php echo $sem?>&sy=<?php echo $sy?>&prof=<?php echo $prof?>&totalUnits=<?php echo $totalUnits ?>" style="color: white;"><button>SET</button></a></h4>
		<table class=round-3 style="width:100%;">
			<thead>
				<tr>
					<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">CODE</th>
					<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;" >TITLE</th>
					<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">LEC</th>
					<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">LAB</th>
					<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">UNITS</th>
					<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">COURSE</th>
					<th style="background-color: maroon; color: white; font-weight: bold; width: 160px;text-align: center;">DAY</th>
					<th style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;">TIME</th>
					<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">ROOM</th>
					<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">ACTION</th>
					
				</tr>
			</thead>
			
			<tbody>
			<?php foreach ($subject as $row): ?>
				<?php if ($row['load_type']==0 AND $row['load_type'] != NULL): ?>
					<tr>
					<td style="text-align: center; background-color: white;"><?php echo $row['scode'] ?></td>
					<td style="text-align: left; background-color: white;"><?php echo $row['stitle'] ?></td>
					<td style="text-align: center; background-color: white;"><?php echo $row['lec'] ?></td>
					<td style="text-align: center; background-color: white;"><?php echo $row['lab'] ?></td>
					<td style="text-align: center; background-color: white;"><?php echo $row['units'] ?></td>
					<td style="text-align: center; background-color: white;"><?php echo getCourse($row['courseID']) ?></td>
					<td style="text-align: center; background-color: white;"><?php echo $row['sday'] ?></td>
					<?php if ($row['stimeS2']=="" || $row['stimeS2'] == NULL): ?>
						<td style="text-align: center;background-color: white;"><?php echo to12Hr($row['stimeS'])."-".to12Hr($row['stimeE']) ?></td>
						<?php else: ?>
							<td style="text-align: center;background-color: white;"><?php echo to12Hr($row['stimeS'])."-".to12Hr($row['stimeE'])."/".to12Hr($row['stimeS2'])."-".to12Hr($row['stimeE2']) ?></td>
					<?php endif ?>
					<td style="text-align: center; background-color: white;"><?php echo $row['sroom'] ?></td>
					<td style="text-align: center; background-color:white;"><a href="index.php?r=administrator/SetLoadToNull&sem=<?php echo $sem ?>&sy=<?php echo $sy ?>&prof=<?php echo $prof ?>&sched_id=<?php echo $row['schedID'] ?>"><button>DELETE</button></a></td>
					
				</tr>
				<?php $totUnits += $row['units']; ?>
				<?php endif ?>
				
			<?php endforeach ?>
			</tbody>
		</table>
		<p><center><?php echo "Total Units:".$totUnits." Units"; ?></center></p>

		<br>
		<br>
<?php endif ?>

<!-- Teaching Substitution -->
<?php $totUnits = 0; 
	foreach ($subject as $row){
		if ($row['load_type']==2){
			$totUnits += $row['units'];
		}
	}
?>
<?php if ($totUnits == $limit['TeachingSub_Load'] || $totUnits > $limit['TeachingSub_Load']): ?>
	<?php $totUnits = 0; ?>
	<h4 class="underlined-header">Temporary Substitution <a style="color: white;"><button disabled>SET</button></a></h4>
	<table class=round-3 style="width:100%;">
		<thead>
			<tr>
				<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">CODE</th>
				<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;" >TITLE</th>
				<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">LEC</th>
				<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">LAB</th>
				<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">UNITS</th>
				<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">COURSE</th>
				<th style="background-color: maroon; color: white; font-weight: bold; width: 160px;text-align: center;">DAY</th>
				<th style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;">TIME</th>
				<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">ROOM</th>
				<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">ACTION</th>
				
			</tr>
		</thead>
		
		<tbody>
			<?php foreach ($subject as $row): ?>
				<?php if ($row['load_type']==2): ?>
					<tr>
						<td style="text-align: center; background-color: white;"><?php echo $row['scode'] ?></td>
						<td style="text-align: left; background-color: white;"><?php echo $row['stitle'] ?></td>
						<td style="text-align: center; background-color: white;"><?php echo $row['lec'] ?></td>
						<td style="text-align: center; background-color: white;"><?php echo $row['lab'] ?></td>
						<td style="text-align: center; background-color: white;"><?php echo $row['units'] ?></td>
						<td style="text-align: center; background-color: white;"><?php echo getCourse($row['courseID']) ?></td>
						<td style="text-align: center; background-color: white;"><?php echo $row['sday'] ?></td>
						<?php if ($row['stimeS2']=="" || $row['stimeS2'] == NULL): ?>
							<td style="text-align: center;background-color: white;"><?php echo to12Hr($row['stimeS'])."-".to12Hr($row['stimeE']) ?></td>
							<?php else: ?>
								<td style="text-align: center;background-color: white;"><?php echo to12Hr($row['stimeS'])."-".to12Hr($row['stimeE'])."/".to12Hr($row['stimeS2'])."-".to12Hr($row['stimeE2']) ?></td>
						<?php endif ?>
						<td style="text-align: center; background-color: white;"><?php echo $row['sroom'] ?></td>
						<td style="text-align: center; background-color:white;"><a href="index.php?r=administrator/SetLoadToNull&sem=<?php echo $sem ?>&sy=<?php echo $sy ?>&prof=<?php echo $prof ?>&sched_id=<?php echo $row['schedID'] ?>"><button>DELETE</button></a></td>
						
					</tr>
					<?php $totUnits += $row['units']; ?>
				<?php endif ?>
			
		<?php endforeach ?>
		</tbody>
	</table>
	<p><center><?php echo "Total Units:".$totUnits." Units"; ?></center></p>
<?php else: ?>
	<?php $totUnits = 0; $totalUnits=0;?>
	<?php foreach ($subject as $row){
				if ($row['load_type']==2 AND $row['load_type'] != NULL){
					$totalUnits += $row['lec'] + $row['lab'];

				}

				// $totalUnits = $totUnits;

				// $totUnits = 0;
			} 
			?>
	<h4 class="underlined-header">Temporary Substitution <a href="index.php?r=administrator/SetTeachingAssignment&mode=TS&sem=<?php echo $sem?>&sy=<?php echo $sy?>&prof=<?php echo $prof?>&totalUnits=<?php echo $totalUnits ?>" style="color: white;"><button>SET</button></a></h4>
	<table class=round-3 style="width:100%;">
		<thead>
			<tr>
				<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">CODE</th>
				<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;" >TITLE</th>
				<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">LEC</th>
				<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">LAB</th>
				<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">UNITS</th>
				<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">COURSE</th>
				<th style="background-color: maroon; color: white; font-weight: bold; width: 160px;text-align: center;">DAY</th>
				<th style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;">TIME</th>
				<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">ROOM</th>
				<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">ACTION</th>
				
			</tr>
		</thead>
		
		<tbody>
			<?php foreach ($subject as $row): ?>
				<?php if ($row['load_type']==2 AND $row['load_type'] != NULL): ?>
					<tr>
						<td style="text-align: center; background-color: white;"><?php echo $row['scode'] ?></td>
						<td style="text-align: left; background-color: white;"><?php echo $row['stitle'] ?></td>
						<td style="text-align: center; background-color: white;"><?php echo $row['lec'] ?></td>
						<td style="text-align: center; background-color: white;"><?php echo $row['lab'] ?></td>
						<td style="text-align: center; background-color: white;"><?php echo $row['units'] ?></td>
						<td style="text-align: center; background-color: white;"><?php echo getCourse($row['courseID']) ?></td>
						<td style="text-align: center; background-color: white;"><?php echo $row['sday'] ?></td>
						<?php if ($row['stimeS2']=="" || $row['stimeS2'] == NULL): ?>
							<td style="text-align: center;background-color: white;"><?php echo to12Hr($row['stimeS'])."-".to12Hr($row['stimeE']) ?></td>
							<?php else: ?>
								<td style="text-align: center;background-color: white;"><?php echo to12Hr($row['stimeS'])."-".to12Hr($row['stimeE'])."/".to12Hr($row['stimeS2'])."-".to12Hr($row['stimeE2']) ?></td>
						<?php endif ?>
						<td style="text-align: center; background-color: white;"><?php echo $row['sroom'] ?></td>
						<td style="text-align: center; background-color:white;"><a href="index.php?r=administrator/SetLoadToNull&sem=<?php echo $sem ?>&sy=<?php echo $sy ?>&prof=<?php echo $prof ?>&sched_id=<?php echo $row['schedID'] ?>"><button>DELETE</button></a></td>
						
					</tr>
					<?php $totUnits += $row['units']; ?>
				<?php endif ?>
			
		<?php endforeach ?>
		</tbody>
	</table>
	<p><center><?php echo "Total Units:".$totUnits." Units"; ?></center></p>


<?php endif ?>

<?php
						
	function getTitle($code,$cID) 
	{
include("config.php");
		$sql = "SELECT * FROM tbl_subjectload WHERE scode ='$code' and courseID = '$cID'"; 
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		$title = $row['stitle'];
		return $title;
	}
	
	function getLec($code,$cID) 
	{
include("config.php");
		$sql = "SELECT * FROM tbl_subjectload WHERE scode ='$code' and courseID = '$cID'"; 
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		$lec = $row['hrs_lec'];
		return $lec;
	}
	
	function getLab($code,$cID) 
	{
include("config.php");
		$sql = "SELECT * FROM tbl_subjectload WHERE scode ='$code' and courseID = '$cID'"; 
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		$lab = $row['hrs_lab'];
		return $lab;
	}
	
	function getCourse($ccode) 
	{
include("config.php");
		$sql = "SELECT * FROM tbl_course WHERE course ='$ccode'"; 
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		$code = $row['course_code'];
		return $code;
	}
	
	function gethay($scode,$currID,$cID,$sy,$sec)
	{
include("config.php");
		$sql ="SELECT * FROM tbl_schedule WHERE scode ='$scode' AND currID = '$currID' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		if($row['sday2']<>'')
		{
			$day = $row['sday'] . '/' . $row['sday2'];
		}
		else
		{
			$day = $row['sday'];
		}
		return $day;

	}
	
	function getRoom($scode,$currID,$cID,$sy,$sec)
	{
include("config.php");
		$sql ="SELECT * FROM tbl_schedule where scode ='$scode' and currID = '$currID' and schoolYear = '$sy' and courseID = '$cID' and csection = '$sec'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		if($row['sroom2']<>'')
		{
			$room = $row['sroom'] . '/' . $row['sroom2'];
		}
		else
		{
			$room = $row['sroom'];
		}
		return $room;
	}
	
	function getProf($prof)
	{
	include("config.php");
		$sql ="SELECT LName, FName FROM tbl_evaluationfaculty WHERE FCode = '".$prof."'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		return $row;
	}
	
	function getTime($scode,$currID,$cID,$sy,$sec)
	{
include("config.php");
		$sql ="SELECT * FROM tbl_schedule where scode ='$scode' and currID = '$currID' and schoolYear = '$sy' and courseID = '$cID' and csection = '$sec'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		if($row['stimeS2']<>"")
		{
			if($row['stimeS']<>0){
				$time = to12Hr($row['stimeS']) . '-' . to12Hr($row['stimeE']) . '/' . to12Hr($row['stimeS2']) . '-' . to12Hr($row['stimeE2']);
			}else{
				$time = "";
			}
		}else
		{
			if($row['stimeS']<>'')
			{
				$time = to12Hr($row['stimeS']) . '-' . to12Hr($row['stimeE']);
			}
			else
			{
				$time = "";
			}
		}
		return $time;
	}
	
	function getName($fcode)
	{
include("config.php");
		$Name = "";
		$sql = "SELECT * FROM tbl_evaluationfaculty WHERE FCode = '$fcode'";
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_array($result)){
			$Name = $row['LName'] .', '. $row['FName'];
		}
		return $Name;
	}
	
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
    var ProfSubTable = $("#ProfSubTable").DataTable({
        "scrollY":        "50vh",
        "scrollCollapse": true,
        "paging":         false,
        "lengthChange": false,
        language: { 
        search: "", 
        searchPlaceholder: "Search by Subject Code or Subject Title",
        emptyTable: "No Record.", },
        columnDefs: [ {
            orderable: false,
            targets:   0,
        } ],
        

    });

    flashdata = $('.flash-data').data('flashdata')
	if(flashdata==0){
		Swal.fire({
			icon:'success',
			title:'Success!',
			text:'Teaching Assignment is Set!'
			
		})
	}
	if(flashdata==1){
		Swal.fire({
			icon:'success',
			title:'Success!',
			text:'Teaching Assignment was Reset!'
			
		})
	}
</script>

</body>
</html>
