<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>PUPT Faculty and Staff Information System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->
	<?php include("styles.php");?>
	<style media="screen" type="text/css">
	.table td {
		padding: 3px;
		line-height: 15px;
		text-align: center;
		vertical-align: center;
		border-top: 1px solid #dddddd;
		font-size: 11px;
		font-family: 'Tahoma';
	}
	</style>
	
  </head>

  <body>

    <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-fixed-top navbar-inverse">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  <div class="nav-collapse collapse">
            <ul class="nav">
				<li><a href='http://www.puptaguig.net'><i class="icon-white icon-home"></i> POLYTECHNIC UNIVERSITY OF THE PHILIPPINES - TAGUIG BRANCH</a></li>
				</ul>
			<ul class="nav pull-right">
				<li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon-white icon-user"></i> RAFFY C. CORTEZ (2009-00507-TG-0) <b class="caret"></b></a>
					<ul class="dropdown-menu dropdown-border">
						<li><a href="a"><i class="icon-user"></i> Profile</a></li>
						<li><a href="a"><i class="icon-time"></i> Schedules</a></li>
						<li><a href="#"><i class="icon-download-alt"></i> Download PDS</a></li>
						<li class="divider"></li>
						<li><a href="a"><i class="icon-locka"></i> Log Out</a></li>
					</ul>
				</li>
			</ul>
			</div>
        </div>
      </div>
    </div>

<!-- Subhead
================================================== -->
<header class="jumbotron subhead" id="overview">
  <div class="container-fluid">
 
  </div>
</header>


  <div class="container-fluid">

    <!-- Docs nav
    ================================================== -->
	
	<div class="row-fluid">
      <div class="span12">
	  <p></p>
	  <div class="tabbable tabs-left">
        <ul class="nav nav-tabs" style="font-size: 13px;">
          <li class="active"><a href="#PersonalInformation" data-toggle="tab">Current Schedules</a></li>
					<li><a href="#FamilyBackground" data-toggle="tab">Previous Schedules</a></li>
        </ul>
		<div class="tab-content">
			<div class="tab-pane fade in active" id="PersonalInformation">
				<div class="page-header">
				<h5>Schedules <small class="pull-right">Last update: 03/29/2013, 10:38 PM</small><div class="btn-group pull-right"></div></h5>
				</div>
				<select style="width: 50%;">
					<option>BSIT-TG (BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY)</option>
					<option>BSME-TG (BACHELOR OF SCIENCE IN MECHANICAL ENGINEERING)</option>
					<option>BSECE-TG (BACHELOR OF SCIENCE IN ELECTRONICS COMMUNICTION ENGINEERING)</option>
				</select>
				
					<?php
						include("config.php");
						$csem = 1;
						$ayear = 1;
						$years = 2;
						$stime = "";
						$sday = "";
						$sprof = "";
						$sroom = "";
						$yr = ""; 
						
						
						while($ayear<=$years) {
							if($ayear==1) {
								$yr = "1ST";
							} else if($ayear==2) {
								$yr = "2ND";
							} else if($ayear==3) {
								$yr = "3RD";
							} else if($ayear==4) {
								$yr = "4TH";
							} else if($ayear==5) {
								$yr = "5TH";
							}
							
							if($csem==1) {
								$strSem = "FIRST SEMESTER";
							} else if($csem==2) {
								$strSem = "SECOND SEMESTER";
							}
							echo '
								<table class="table table-bordered table-hover responsive-utilities">
								  <tbody>
									<tr>
										<td class="table-narrow" colspan="7" style="text-align: left"><a class="btn btn-mini">'. $yr .' YEAR</a><a class="btn btn-mini pull-right">'. $strSem .'</a></td>
									</tr>
									<tr>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 75px;">CODE</td>
										<td style="background-color: maroon; color: white; font-weight: bold;">TITLE</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;">UNITS</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 160px;">SCHEDULE</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 100px;">PROFESSOR</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 120px;"></td>
									</tr>
								';
							$sql = "SELECT * FROM tbl_subjectload WHERE sem='$csem' AND cyear='$ayear'";
							$query = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_array($query)) {
								$currID = $row['currID'];
								$courseID = $row['courseID'];
								$csection = $row['csection'];
								$cyear = $row['cyear'];
								$scode = $row['scode'];
								$stitle = $row['stitle'];
								$sunit = $row['sunit'];
								
								echo '
									<tr>
										<td style="text-align: left;">'. $scode .'</td>
										<td style="text-align: left;">'. $stitle .'</td>
										<td>'. $sunit .'</td>';
										$stime = getSchedule($currID, $scode, 'TIME');
										if($stime=="") {
											echo '<td><a href="index.php?r=site/new_sched&CurrID='. $currID .'&courseID='. $courseID .'&csection='. $csection .'&cyear='. $cyear .'&scode='. $scode .'" class="btn btn-mini btn-primary btn-block">SET SCHEDULE</a></td>';
											$enable = "disabled";
										} else {
											echo '<td><a class="btn btn-mini btn-block disabled">'. $sday . ' '. $stime .'</a></td>';
											$enable = "";
										}
										echo getSchedule($currID, $scode, 'PROF');
								echo '
										
										<td><a class="btn btn-mini '. $enable .'">EDIT</a> <a class="btn btn-mini btn-danger '. $enable .'">RESET</a></td>
									</tr>
								';
							}
							echo '
									</tbody>
								</table>
								';
							$ayear = $ayear + 1;
						}
						
						function getSchedule($currID, $scode, $arg) 
						{
							$csem = 1;
							$stime = "";
							$sday = "";
							$sprof = "";
							$sroom = "";
							
							$sql = "SELECT * FROM tbl_schedule WHERE currID='$currID' AND scode='$scode'";
							$query = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_array($query)) {
								$stime = $row['stime'];
								$sday = $row['sday'];
								$sprof = $row['sprof'];
								$sroom = $row['sroom'];
							}
							if($arg=="PROF") {
								return '<td>'. $sprof .'</td>';
							} else if($arg=="TIME") {
								if($stime!="") {
									return $sday . ' ' . $stime . ' ' .$sroom;
								} else {
									return "";
								}
							}
						}
					?>
				  
			</div>
		</div>
			
		</div>
		</div>
      </div>

  </div>
  </body>
</html>
