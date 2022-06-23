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
}</style>

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

<h2 class="underlined-header">Subject Load Management</h2>
<br />
<?php if (isset($_GET['mes'])) : ?>
	<?php if ($_GET['mes']==0): ?>
	<div class="flash-data" data-flashdata="<?= $_GET['mes']?>"></div>
	<?php endif;?>
<?php endif;?>

<?php
	$currYear=date("Y");
	$prevYear=date("Y")-1;
	$yearString = "".$prevYear."-".$currYear."";

	$futureYear = $currYear+1;
	$futYearString = $currYear."-".$futureYear;
?>

<form name="frmcurr" method = "post" action = "index.php?r=administrator/CurriculumManagement">
		<h4>Course</h4>
		<select name = "course" style="width: 100%;">
			<?php			
				if(isset($_POST['course']))
					{
						$cc = $_POST['course'];
						$sql1= "SELECT * FROM tbl_course WHERE course = '$cc'";
						$result1 = mysqli_query($conn,$sql1);
						while($row1 = mysqli_fetch_array($result1)){
							echo'<option value="'.$cc.'">'.$row1['course_code'].' ( '. $row1['course_desc'] .')</option>';
						}
					}
				$sql = "SELECT * FROM tbl_course";
				$result = mysqli_query($conn,$sql);
				while($row = mysqli_fetch_array($result)) 
				{
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
			
			// echo'<option value="'.$yearString.'">'.$yearString.'</option>';
		
			$sql = "SELECT DISTINCT schoolYear FROM tbl_subjectload ORDER BY schoolYear DESC";
			$result = mysqli_query($conn,$sql);

			// echo'<option value="'. $yearString .'">'. $yearString .'</option>';

			while($row = mysqli_fetch_array($result)) {
				
				echo'
					<option value="'. $row['schoolYear'] .'">'. $row['schoolYear'] .'</option>';
				
			}
		?>
		</select>
        <br/>
        <br/>
		<input type="submit" name="btnSubmit" value="Go" />
</form>

	<?php
	
		if(isset($_POST['course'])) {
			if(isset($_POST['sy'])){
			$sy = $_POST['sy'];
			}
			$cID = $_POST['course'];
			$NoOfYears = getCourseYears($cID);
			$ccode = getCourseCode($cID);
			$yr = "";
		?>
	
			<?php
			echo '
				
				<table>
					<tbody>
						<tr>
							<td style="background-color: maroon; color: white; font-weight: bold; width: 75px;">COURSE</td>
							<td style="background-color: maroon; color: white; font-weight: bold;">YEAR &amp SECTION</td>
							<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;">CURRICULUM</td>
						</tr>
			';
			
			for($cYear=1;$cYear<=$NoOfYears;$cYear++) {
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
				
				$currID = getCurrID($cID,$cYear,$sy);
				$c = checkCurrRef($cID,$cYear,$sy);
				$cDesc = getCurrDesc($cID,$cYear,$currID,$sy);
				$curriculumYear = getCurriculumYear($currID, $cID);
				if($c!=0){
					echo '
						<tr>
							<td>'. $ccode .'</td>
							<td>'. $yr .' ('. $cDesc .')</td>
							<td><a href="index.php?r=administrator/Viewcurriculum&courseID='.$cID.'&year='.$cYear.'&currID='.$currID.'&sy='.$sy.'&currYear='.$curriculumYear.'"><button style="width: 50%;">VIEW</button></a><a href="index.php?r=administrator/EditCurriculum&courseID='.$cID.'&year='.$cYear.'&currID='.$currID.'&sy='.$sy.'&currYear='.$curriculumYear.'"><button style="width: 50%;">EDIT</button></td>
						</tr>
					';
				}else{
					echo '
							<tr>
								<td>'. $ccode .'</td>
								<td>'. $yr .' ('. $cDesc .')</td>
								<td><a href="index.php?r=administrator/setCurriculum&courseID='.$cID.'&year='.$cYear.'&sy='.$sy.'"><button style="width: 100%;">SET</button></a></td>
							</tr>
						';
				}
				
			}
			echo '
					</tbody>
				</table>
			';
		}
?>
<?php
	
		if(isset($_GET['courseID'])) {
			if(isset($_GET['sy'])){
			$sy = $_GET['sy'];
			}
			$cID = $_GET['courseID'];
			$NoOfYears = getCourseYears($cID);
			$ccode = getCourseCode($cID);
			$yr = "";
		?>
	
			<?php
			echo '
				
				<table>
					<tbody>
						<tr>
							<td style="background-color: maroon; color: white; font-weight: bold; width: 75px;">COURSE</td>
							<td style="background-color: maroon; color: white; font-weight: bold;">YEAR &amp SECTION</td>
							<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;">CURRICULUM</td>
						</tr>
			';
			
			for($cYear=1;$cYear<=$NoOfYears;$cYear++) {
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
				
				$currID = getCurrID($cID,$cYear,$sy);
				$c = checkCurrRef($cID,$cYear,$sy);
				$cDesc = getCurrDesc($cID,$cYear,$currID,$sy);
				$curriculumYear = getCurriculumYear($currID, $cID);
				if($c!=0){
					echo '
						<tr>
							<td>'. $ccode .'</td>
							<td>'. $yr .' ('. $cDesc .')</td>
							<td><a href="index.php?r=administrator/Viewcurriculum&courseID='.$cID.'&year='.$cYear.'&currID='.$currID.'&sy='.$sy.'&currYear='.$curriculumYear.'"><button style="width: 50%;">VIEW</button></a><a href="index.php?r=administrator/EditCurriculum&courseID='.$cID.'&year='.$cYear.'&currID='.$currID.'&sy='.$sy.'&currYear='.$curriculumYear.'"><button style="width: 50%;">EDIT</button></td>
						</tr>
					';
				}else{
					echo '
							<tr>
								<td>'. $ccode .'</td>
								<td>'. $yr .' ('. $cDesc .')</td>
								<td><a href="index.php?r=administrator/setCurriculum&courseID='.$cID.'&year='.$cYear.'&sy='.$sy.'"><button style="width: 100%;">SET</button></a></td>
							</tr>
						';
				}
				
			}
			echo '
					</tbody>
				</table>
			';
		}

		function getCurrDesc($cID, $yr, $currID, $sy){
			include("config.php");
			$desc = "-not set-";
			$sql = "SELECT * FROM tbl_subjectloadref WHERE courseID ='$cID' and cyear = '$yr' and currID = '$currID' and schoolYear = '$sy'";
			$result = mysqli_query($conn,$sql);
			if($row=mysqli_fetch_array($result)){
				$currIDRef = $row['currID'];
				$sql2 = "SELECT currDesc from tbl_subjectloadlist where currID = '$currIDRef'";
				$result2 = mysqli_query($conn,$sql2);
				if($row2=mysqli_fetch_array($result2)){
					$desc = $row2['currDesc'];
					return $desc;
				}else
					return "nest2";
			}else{
				return $desc;
			}
		}
		
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
	
	function getCurrID($cID,$yr,$sy) {
		include("config.php");
		$sql = "SELECT * FROM tbl_subjectloadref WHERE courseID='$cID' AND cyear='$yr' and schoolYear = '$sy'";
		$result = mysqli_query($conn,$sql);
		$currID = 0;
		while($row=mysqli_fetch_array($result)) {
			$currID = $row['currID'];
		}
		return $currID;
	}
	
	function checkCurrRef($cID,$yr,$sy) {
		include("config.php");
		$count=0;
		$sql = "SELECT * FROM tbl_subjectloadref WHERE courseID='$cID' AND cyear='$yr' AND schoolYear = '$sy'";
		$result = mysqli_query($conn,$sql);
		$count=mysqli_num_rows($result);
		return $count;
	}
	
	function getMaxSem($cID,$cYear){
		include("config.php");
		$sql = "SELECT * FROM tbl_subjectload WHERE courseID='$cID' AND cyear = '$cYear' ORDER by sem ASC";
		$result = mysqli_query($conn,$sql);
		$Msem = 0;
		while($row=mysqli_fetch_array($result)) {
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

	function getCurriculumYear($id,$cID){
		$year = "";
		include("config.php");
		$sql = "SELECT DISTINCT currYear FROM tbl_subjectload WHERE currID = '".$id."' AND courseID = '".$cID."'";
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_array($result)) {
			$year = $row['currYear'];
		}
		return $year;
	}
	?>

</section>
<!-- End - Page body content -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->
<aside class=page-sidebar style="display: inline-block;">
<section class='widget-container widget-categories'>
<div class=widget-content>
<?php include("SchedulingMenu.php");?>

</div>
</section>
</aside>

<aside class="page-sidebar" style="display: inline-block;position: absolute;">
<section class='widget-container widget-categories'>
<div class=widget-content>

<?php include("SchedulingMenu2.php");?>

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
<script src='<?php echo Yii::app()->getBaseUrl()?>assets/jquery-3.6.0.min.js'></script>
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl() ?>assets/js/bootstrap.min.js"></script>
<script id=js-dispatcher src='scripts/scripts.js'></script>

<script src='<?php echo Yii::app()->getBaseUrl()?>assets/sweetalert2.all.min.js'></script>
<script>
	flashdata = $('.flash-data').data('flashdata');
	if(flashdata==0){
		Swal.fire({
			icon:'error',
			title:'Subject Load Empty',
			text:'Set a Curriculum for this School Year'
		})
	}
</script>
</body>
</html>
