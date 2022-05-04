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
//ini_set('session.cache_limiter','public');
//session_cache_limiter(false);
//header("Cache-Control: max-age=300, must-revalidate");
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
<title>Scheduling | Schedule Management </title>
<!-- Page icon -->
<link href='puplogo.ico' rel='shortcut icon'/>
<!-- Stylesheets -->
<script type="text/javascript" id="cool_find_script" src="scripts/find6.js"></script>
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
aside.page-sidebar{
display:none;
}

.page-sidebar-right #page-content{
	width:100%;
}
body.page-media.page-sidebar-right{
	width:100%;
}

.dataTables_filter {
   float: left !important;
}

.dataTables_filter input {
width: 300px;
}

.page-sidebar-right #page-body-content {
background:url(../../../../FSISCS/images/page-body-bg-white.png);
background-repeat:repeat;
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

<?php if ($load_type=="Regular"): ?>
	<h2 class="underlined-header">Select Subjects for Regular Load</h2>
	<span id="storage" data-variable-one="<?php echo $load_type; ?>"></span>
<?php endif ?>

<?php if ($load_type=="PartTime"): ?>
	<h2 class="underlined-header">Select Subjects for Part Time Load</h2>
	<span id="storage" data-variable-one="<?php echo $load_type; ?>"></span>
<?php endif ?>

<?php if ($load_type=="TS"): ?>
	<h2 class="underlined-header">Select Subjects for Temporary Substitution</h2>
	<span id="storage" data-variable-one="<?php echo $load_type; ?>"></span>
<?php endif ?>

<br>
<p id="result" style="position: absolute; top: 160px; left: 1240px">Total Units Selected: 0</p>
<?php if ($load_type == "Regular"): ?>
	<p style="position: absolute; top: 160px; left: 940px">Maximum Units Allowed: <?php echo $Regular?></p>
<?php endif ?>

<?php if ($load_type == "PartTime"): ?>
	<p style="position: absolute; top: 160px; left: 940px">Maximum Units Allowed: <?php echo $PartTime?></p>
<?php endif ?>

<?php if ($load_type == "TS"): ?>
	<p style="position: absolute; top: 160px; left: 940px">Maximum Units Allowed: <?php echo $TS?></p>
<?php endif ?>
<form action="index.php?r=administrator/ProcessSetTeachingAssignment" method="POST">
<table id="SubjTable" class="table table-bordered table-striped table-hover" style="width:100%; ">
	<thead>
		<tr>
			<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"></td>
			<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">CODE</td>
			<td style="background-color: maroon; color: white; font-weight: bold; width: 160px; text-align: center;" >TITLE</td>
			<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">LEC</td>
			<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">LAB</td>
			<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">UNITS</td>
			<td style="background-color: maroon; color: white; font-weight: bold; width: 100px;text-align: center;">COURSE</td>
			<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">DAY</td>
			<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;">TIME</td>
			<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">ROOM</td>
			<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">ACTION</td>
			
		</tr>
	</thead>
	<tbody>
		
			<?php $id = 0; ?>
			<?php foreach ($subject as $row): ?>
				<?php if ($row['load_type']==NULL): ?>
					<tr>
						<td style="text-align: center;"><input style = "width: 17px; height: 17px;" type="checkbox" id = "<?php echo $id?>" name="subjID1[]" value = "<?php echo $row['scode']?>"></td>
						<td style="text-align: center;"><?php echo $row['scode'] ?><input type="hidden" name="subjID2[]" value="<?php echo $row['scode'] ?>"></td>
						<td style="text-align: left;"><?php echo $row['stitle'] ?></td>
						<td style="text-align: center;"><?php echo $row['lec'] ?></td>
						<td style="text-align: center;"><?php echo $row['lab'] ?></td>
						<td style="text-align: center;"><?php echo $row['units'] ?></td>
						<td style="text-align: center;"><?php echo getCourse($row['courseID']) ?></td>
						<td style="text-align: center;"><?php echo $row['sday'] ?></td>
						<td style="text-align: center;"><?php echo $row['stimeS'] ?></td>
						<td style="text-align: center;"><?php echo $row['sroom'] ?></td>
						<input type="hidden" name="sched_id[]" value="<?php echo $row['schedID'] ?>">
						<input type="hidden" name="load_type" value="<?php echo $load_type ?>">
						<input type="hidden" name="sem" value="<?php echo $sem?>">
			            <input type="hidden" name="sy" value="<?php echo $sy?>">
			            <input type="hidden" name="prof" value="<?php echo $prof?>">			      
						<td style="text-align: center;">
							
							<a data-target='#myModal<?php echo $id?>' data-toggle='modal' href='#myModal<?php echo $id?>'><button>EDIT</button></a>
						</td>
					</tr>
				<?php endif ?>
				<?php $id++; ?>
			<?php endforeach ?>
	</tbody>
</table>

<center><!-- <input id = "sub" type="submit" name="Submit" > -->
	<!-- <button onclick="check_submit()" style="height: 30px; width:60px; text-align: center;">Submit</button> -->
	<!-- <input type="submit" name="Submit"> -->
	<button id="sub" type="submit">Submit</button>
</center>
</form>

<!-- Modal Section -->
<?php $id = 0; ?>
<?php foreach ($subject as $row): ?>
	<?php if ($row['load_type']==NULL): ?>
  <div class="modal fade" id="myModal<?php echo $id?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form action="index.php?r=administrator/EditLoadSubject" id="submit_form" method="post">
        <div class="modal-header">		
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color:black;">&times;</span></button> 
             
          <h4 class="modal-title" style="position: absolute; left: 5px;top: 5px;">Edit Subject</h4>
        </div>
        <div class="modal-body">
            

            <p style="margin-bottom: 9px;">Subject Code:<input readonly name="scode" type=text style="width: 600px; margin-top: -28px; margin-left: 15%;"  placeholder='Subject Code' value = "<?php echo $row['scode'] ?>"></p>

            <p style="margin-bottom: 9px;">Subject Title:<input readonly name="stitle" type=text style="width: 600px; margin-top: -28px; margin-left: 15%;"  placeholder='Subject Title' value = "<?php echo $row['stitle'] ?>"></p>

            <p style="margin-bottom: 9px;">*Units:<input type="text" name="units" style="width: 600px; margin-top: -28px; margin-left: 15%;"  placeholder='Units' oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="2" value = "<?php echo $row['units'] ?>"></p>

            <p style="margin-bottom: 9px;">*Hours(Lec):<input name="lec" type=text style="width: 600px; margin-top: -28px; margin-left: 15%;"  placeholder='Hours(Lecture)' value = "<?php echo $row['lec'] ?>"></p>

            <p style="margin-bottom: 9px;">*Hours(Lab):<input name="lab" type=text style="width: 600px; margin-top: -27px; margin-left: 15%;"  placeholder='Hours(Laboratory)' value = "<?php echo $row['lab'] ?>"></p>
            <input type="hidden" name="sem" value="<?php echo $sem?>">
            <input type="hidden" name="sy" value="<?php echo $sy?>">
            <input type="hidden" name="prof" value="<?php echo $prof?>">
            <input type="hidden" name="sched_id" value="<?php echo $row['schedID']?>">
            <input type="hidden" name="load_type" value="<?php echo $load_type ?>">

        </div>

        <div class="modal-footer">
	        <button onclick="form_submit()" style="height: 30px; width:60px; text-align: center;">Submit</button>
	        </form>
        </div>

        </div>
      </div>
      
    </div>

 <?php endif ?>
	<?php $id++; ?>
<?php endforeach ?> 

<!-- End of Modal Section -->


</section>


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
<!-- End - Page body content -->
</div>
<!-- End - Page content -->
<!-- Page sidebar-->
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
<script src='assets/jquery-3.6.0.min.js'></script>
<script src='assets/sweetalert2.all.min.js'></script>
<script id=js-dispatcher src='scripts/scripts.js'></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/datatables.min.js"></script>
<script id=js-dispatcher src='scripts/scripts.js'></script>

<script>
	var total = 0;
 	var limit;
 	var condLimit;
 	var cond;
 	var loadType;

 	window.onload = function(){
    loadType = document.getElementById("storage").getAttribute("data-variable-one");
    // alert(loadType);

    	if (loadType == 'Regular') {
	 		limit = <?php echo $Regular?>;
		 	condLimit = parseInt(limit);
		 	cond = limit + 1;
	 	}

	    if (loadType == 'PartTime') {
	 		limit = <?php echo $PartTime?>;
		 	condLimit = parseInt(limit);
		 	cond = limit + 1;
	 	}

	 	if (loadType == 'TS'){
	 		limit = <?php echo $TS?>;
	 		condLimit = parseInt(limit);
	 		cond = limit + 1;
	 	}
	}

	var SubjTable = $("#SubjTable").DataTable({
		"scrollY":        "50vh",
      "scrollCollapse": true,
      "paging":         false,
		"lengthChange": false,
		
		language: { 
		search: "", 
		searchPlaceholder: "Search by Subject Code or Subject Title" },
		columnDefs: [ {
            orderable: false,
            targets:   0,
        } ],
       

	});

	$('.dataTables_filter').addClass('pull-left');

	$("#sub").on('click', function(e){
		SubjTable.destroy();
	});

	/*Solution 3*/
	$('#SubjTable tbody').on('click', 'input[type="checkbox"]', function(e){
      var $row = $(this).closest('tr');

      // // Get row data
      var data = SubjTable.row($row).data();

      // // Get row ID
      var rowId = data[0];

      var id = $(rowId).attr("id");

      // var units = data[5];
      var lec = data[3];
      var lab = data[4];


      // let unit = parseInt(units.charAt(0));
      let lecs = parseInt(lec);
      let labs = parseInt(lab);

      if (this.checked) {
	    	total = total + lecs + labs;                 
	   } else {
	    	total = total - (lecs+labs);                
	   }

	   

	   if (total >= cond) {
	    	total = total - (lecs+labs);
	   	document.getElementById(id).checked=false;
	   	Swal.fire({
		   	icon:'error',
				title:'Ooops!',
				text:'Number of Units Exceeded!'
	   	});
	   }

	   var checkboxes = SubjTable.column(0).nodes(); // Cells from 1st column

		for (var i = 0; i < checkboxes.length; i += 1) {
			if (total >= limit) {
				if(!checkboxes[i].querySelector("input[type='checkbox']").checked){
					checkboxes[i].querySelector("input[type='checkbox']").disabled = true;
				}
			} else {
				if(!checkboxes[i].querySelector("input[type='checkbox']").checked){
					checkboxes[i].querySelector("input[type='checkbox']").disabled = false;
				}
			}
        
    	}
    	// alert(cond);
	 	$('#result').html( 'Total Units: ' + total + '');
		
	  
  	});

  	function form_submit() {
    document.getElementById("submit_form").submit();
    
   }

   function check_submit(){
   	document.getElementById("check_form").submit();
   }

	flashdata = $('.flash-data').data('flashdata')
	if(flashdata==1){
		Swal.fire({
			icon:'success',
			title:'Success!',
			text:'Subject Info Updated!'
			
		})
	}

	if(flashdata==2){
		Swal.fire({
			icon:'error',
			title:'Ooops!',
			text:'Choose a Subject!',
			
		})
	}

</script>
</body>
</html>

