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
<title>Scheduling | Subject Load Management</title>
<!-- Page icon -->
<link href='puplogo.ico' rel='shortcut icon'/>
<!-- Stylesheets -->
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
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

	<?php if ($_GET['mes']==3): ?>
	<div class="flash-data" data-flashdata="<?= $_GET['mes']?>"></div>
	<?php endif;?>
<?php endif;?>


<h2 class="underlined-header">Subject Loading Management</h2>
<br />
<?php
	$currYear=date("Y");
	$prevYear=date("Y")-1;
	$yearString = $prevYear."-".$currYear;

	$futureYear = $currYear+1;
	$futYearString = $currYear."-".$futureYear;
?>
<form name="frmcurr" method = "post" action = "index.php?r=administrator/CurriculumManagement">
		<h4>Course</h4>
		<select name = "course" style="width: 100%;">
			<?php
				$sql = "SELECT * FROM tbl_course";
				$result = mysqli_query($conn,$sql);
				while($row = mysqli_fetch_array($result)) {
					echo '
						<option value="'. $row['course'] .'">'. $row['course_code'] .' ('. $row['course_desc'] .')</option>
					';
				}
			?>
		</select>
		<br />
		<h4>School Year</h4>
		<select name = "sy" style="width: 100%;">
			<?php
				//echo'<option>'.$yearString.'</option>';
				if(isset($_GET['sy'])){
						$sh = $_GET['sy'];
						$sql1= "SELECT DISTINCT schoolYear FROM tbl_subjectload WHERE schoolYear= '$sh'";
						$result1 = mysqli_query($conn,$sql1);
						while($row1 = mysqli_fetch_array($result1)){
							echo'<option value="'.$sh.'">'.$row1['schoolYear'].'</option>';
						}
				}
				else if(isset($_POST['sy']))
				{
					$sh = $_POST['sy'];
					$sql1= "SELECT DISTINCT schoolYear FROM tbl_subjectload WHERE schoolYear= '$sh'";
					$result1 = mysqli_query($conn,$sql1);
					while($row1 = mysqli_fetch_array($result1)){
						echo'<option value="'.$sh.'">'.$row1['schoolYear'].'</option>';
					}
				}
				$sql = "SELECT DISTINCT schoolYear FROM tbl_subjectload ORDER BY schoolYear DESC";
				$result = mysqli_query($conn,$sql);
				while($row = mysqli_fetch_array($result)) {
					echo '
						<option value="'. $row['schoolYear'] .'">'. $row['schoolYear'] .'</option>
					';
				}
			?>
		</select>
        <br/>
        <br/>
		<input type="submit" name="btnSubmit" value="Generate" />
		
		
</form>

<h4 class="underlined-header">Academical Year List</h4>
<button class="btn btn-mini" data-toggle="modal" data-target="#myModal" style="height: 45px; width:45px">ADD</button>
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      	<form action = "index.php?r=administrator/Choosecurriculum" method = "post">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	 			<span aria-hidden="true" style="color:black;">&times;</span>
	 		</button>
          <h4 class="modal-title" style="position: absolute; left: 5px;top: 5px;">Subject Load Management</h4>
        </div>
        <div class="modal-body">
			<label>Year Effectivity:
				<select name = "year" style="width:130px;left: 100px;top: 10px;position: absolute;">
					<option value="<?php echo $futureYear?>"><?php echo $futYearString?></option>
					<option value="<?php echo $currYear?>"><?php echo $yearString?></option>
				</select>
			</label>
        </div>

        <div class="modal-footer">
          <input type="submit" name="Submit">
          </form>
        </div>
      </div>
      
    </div>
  </div>



			<?php
				echo 
				'
					<table>
						<tbody>
							<tr>
								<td style="background-color: maroon; color: white; font-weight: bold; width: 75px;">ID</td>
								<td style="background-color: maroon; color: white; font-weight: bold;">YEAR</td>
								<td style="background-color: maroon; color: white; font-weight: bold; width: 250px;">COURSE</td>
								<td style="background-color: maroon; color: white; font-weight: bold; width: 100px;">ACTION</td>
							</tr>	
				';
				$sql="SELECT * FROM tbl_subjectloadlist ORDER BY currDesc DESC";
				$result=mysqli_query($conn,$sql);
				while($row = mysqli_fetch_array($result)) 
				{
					$currID = $row['currID'];
					$sy = $row['currDesc'];
					$course = $row['courseDesc'];
					echo'
						<tr>
							<td>'. $row['currID'] .'</td>
							<td>'. $row['currDesc'] .'</td>
							<td>'. $row['courseDesc'] .'</td>
							<td><a href="index.php?r=administrator/EditCurriculumList&currID='.$currID.'&sy='.$sy.'&course='.$course.'" class="btn btn-mini"><button style="width:60px">DELETE</button></a></td>
						</tr>
					'; 
				}
				echo'
					</tbody>
						</table>
				';
		
	
		function getSY(){
			if(isset($_POST['sy'])){
				$sy = $_POST['sy'];
			}
		}
		
		function getCourseYears($cID) {
		$sql = "SELECT * FROM tbl_course WHERE course='$cID' ORDER by NoOfYears ASC";
		$result = mysqli_query($conn,$sql);
		$NoOfYears = 0;
		while($row=mysqli_fetch_array($result)) {
			$NoOfYears = $row['NoOfYears'];
		}
		return $NoOfYears;
	}
	
	function getCurrID($cID,$yr) {
		$sql = "SELECT * FROM tbl_subjectloadref WHERE courseID='$cID' AND cyear='$yr'";
		$result = mysqli_query($conn,$sql);
		$currID = 0;
		while($row=mysqli_fetch_array($result)) {
			$currID = $row['currID'];
		}
		return $currID;
	}
	
	function checkCurrRef($cID,$yr) {
		$count=0;
		$sql = "SELECT * FROM tbl_subjectloadref WHERE courseID='$cID' AND cyear='$yr'";
		$result = mysqli_query($conn,$sql);
		$count=mysqli_num_rows($result);
		return $count;
	}
	
	function getMaxSem($cID,$cYear){
		$sql = "SELECT * FROM tbl_subjectload WHERE courseID='$cID' AND cyear = '$cYear' ORDER by sem ASC";
		$result = mysqli_query($conn,$sql);
		$Msem = 0;
		while($row=mysqli_fetch_array($result)) {
			$Msem = $row['sem'];
		}
		return $Msem;
	}
	
	function getCourseCode($cID){
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
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl() ?>assets/js/bootstrap.min.js"></script>
<script id=js-dispatcher src='scripts/scripts.js'></script>

<script src='assets/sweetalert2.all.min.js'></script>
<script>
	flashdata = $('.flash-data').data('flashdata');
	if(flashdata==0){
		Swal.fire({
			icon:'success',
			title:'Success!',
			text:'New Curriculum is Created!'
		})
	}

	if(flashdata==1){
		Swal.fire({
			icon:'error',
			title:'Subject Load Empty',
			text:'Set a Curriculum for this School Year'
		})
	}

	if(flashdata==2){
		Swal.fire({
			icon:'error',
			title:'Error',
			text:'Existing School Year'
		})
	}

	if(flashdata==3){
		Swal.fire({
			icon:'success',
			title:'Success!',
			text:'Curriculum ID was Deleted!'
		})
	}
</script>
</body>
</html>
