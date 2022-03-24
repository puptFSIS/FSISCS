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
						include("connect.php");
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
							$query = mysqli_query($conn,$sql);
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
							$query = mysqli_query($conn,$sql);
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
	<!-- Modals -->
	<!-- Photo -->
	<div id="modPHOTO" class="modal hide fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modPHOTOLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times </button>
			<h4 id="modPHOTOLabel">Photo</h4>
		</div>
		<div class="modal-body">
			<p><small>ID picture taken within the last 6 months. 3.5 cm. &times 4.5 cm. (passport size)</small></p>
			<img data-src="holder.js/140x140" class="img-polaroid" width="350" height="450">
		</div>
		<div class="modal-footer">
			<button class=" btn btn-small" data-dismiss="modal" aria-hidden="true">Cancel</button>
			<button class="btn btn-primary btn btn-small">Save changes</button>
		</div>
	</div>
	
	<!-- Add Child -->
	<div id="modCHILD" class="modal hide fade" tabindex="-1"  data-backdrop="static" role="dialog" aria-labelledby="modCHILDLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times </button>
			<h4 id="modCHILDLabel">Add Child</h4>
		</div>
		<div class="modal-body">
			<table class="table table-bordered table-hover responsive-utilities">
				<tbody>
					<tr>
						<td colspan="2" class="is-visible"></td>
					</tr>
					<tr>
						<td style="width: 30%; text-align: right;">Name: </td>
						<td style="width: 70%; text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" placeholder="Full name" /></td>
					</tr>
					<tr>
						<td style="text-align: right;">Date of Birth:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" placeholder="mm/dd/yyyy"/></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
			<button class="btn btn-primary">Save</button>
		</div>
	</div>
	
	<!-- Edit Child -->
	<div id="modEDITCHILD" class="modal hide fade" tabindex="-1"  data-backdrop="static" role="dialog" aria-labelledby="modEDITCHILDLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times </button>
			<h4 id="modEDITCHILDLabel">Edit</h4>
		</div>
		<div class="modal-body">
			<table class="table table-bordered table-hover responsive-utilities">
				<tbody>
					<tr>
						<td colspan="2" class="is-visible"></td>
					</tr>
					<tr>
						<td style="width: 30%; text-align: right;">Name: </td>
						<td style="width: 70%; text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" placeholder="Full name" value="Raffy C. Cortez"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Date of Birth:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" placeholder="mm/dd/yyyy" value="03/25/1993"/></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
			<button class="btn btn-primary"><i class="icon-ok icon-white"></i> Save Changes</button>
		</div>
	</div>
	
	<!-- Delete Child -->
	<div id="modDELCHILD" class="modal hide fade" tabindex="-1"  data-backdrop="static" role="dialog" aria-labelledby="modDELCHILDLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times </button>
			<h4 id="modDELCHILDLabel">Remove</h4>
		</div>
		<div class="modal-body">
			<p><small>Do you really want to remove <strong>Raffy C. Cortez</strong> to your list of child?</small></p>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
			<button class="btn btn-danger"><i class="icon-trash icon-white"></i> Remove</button>
		</div>
	</div>
	
	<!-- New Educational Attainment -->
	<div id="modNEWEA" class="modal hide fade" tabindex="-1"  data-backdrop="static" role="dialog" aria-labelledby="modNEWEALabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times </button>
			<h4 id="modNEWEALabel"><i class="icon-plus" style="margin-top: 3px;"></i> Add Educational Attainment</h4>
		</div>
		<div class="modal-body">
			<form name="ea" action="#" method="post">
			<table class="table table-bordered table-hover responsive-utilities">
				<tbody>
					<tr>
						<td colspan="2" class="is-visible"></td>
					</tr>
					<tr>
						<td style="width: 30%; text-align: right;">Educational Level: </td>
						<td style="width: 70%; text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" placeholder=""/></td>
					</tr>
					<tr>
						<td style="text-align: right;">School Name:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Degree:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Major:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Minor:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Year Graduated:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Units Earned:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Inclusive Year:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" placeholder="From" style="width: 40%;"/>&nbsp &nbsp - &nbsp &nbsp <input type="text" class="input-small table-text" placeholder="To" style="width: 40%;"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Honors:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" placeholder="(i.e., Valedictorian, Cum Laude, etc..)"/></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
			<button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Save</button>
			</form>
		</div>
	</div>
	
	<!-- Edit Educational Attainment -->
	<div id="modEDITEA" class="modal hide fade" tabindex="-1"  data-backdrop="static" role="dialog" aria-labelledby="modEDITEALabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times </button>
			<h4 id="modEDITEALabel">Edit Educational Attainment</h4>
		</div>
		<div class="modal-body">
			<table class="table table-bordered table-hover responsive-utilities">
				<tbody>
					<tr>
						<td colspan="2" class="is-visible"></td>
					</tr>
					<tr>
						<td style="width: 30%; text-align: right;">Educational Level: </td>
						<td style="width: 70%; text-align: left; padding-top: 3px;"><input type="text" name="eLevel" class="input-small table-text" value=""/></td>
					</tr>
					<tr>
						<td style="text-align: right;">School Name:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" value="Ricardo P. Cruz Sr. Elementary School"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Degree:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" value="--"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Major:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" value="--"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Minor:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" value="--"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Year Graduated:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" value="2005"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Units Earned:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" value="--"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Inclusive Year:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" placeholder="From"  value="1999" style="width: 40%;"/>&nbsp &nbsp - &nbsp &nbsp <input type="text"  value="2005" class="input-small table-text" placeholder="To" style="width: 40%;"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Honors:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" placeholder="(i.e., Valedictorian, Cum Laude, etc..)" value=""/></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
			<button class="btn btn-primary"><i class="icon-ok icon-white"></i> Save</button>
		</div>
	</div>
	
	<!-- Delete Educational Attainment -->
	<div id="modDELEA" class="modal hide fade" tabindex="-1"  data-backdrop="static" role="dialog" aria-labelledby="modDELEALabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times </button>
			<h4 id="modDELEALabel">Remove</h4>
		</div>
		<div class="modal-body">
			<p><small>Do you really want to remove <strong>(Elementary) Ricardo P. Cruz Sr. Elementary School</strong> to your educational attainment?</small></p>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
			<button class="btn btn-danger"><i class="icon-trash icon-white"></i> Remove</button>
		</div>
	</div>
	
	<!-- New CSE -->
	<div id="modNEWCSE" class="modal hide fade" tabindex="-1"  data-backdrop="static" role="dialog" aria-labelledby="modNEWCSELabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times </button>
			<h4 id="modNEWCSELabel"><i class="icon-plus" style="margin-top: 3px;"></i> Add Career Service Eligibility (CSE)</h4>
		</div>
		<div class="modal-body">
			<form name="ea" action="#" method="post">
			<table class="table table-bordered table-hover responsive-utilities">
				<tbody>
					<tr>
						<td colspan="2" class="is-visible"></td>
					</tr>
					<tr>
						<td style="width: 30%; text-align: right;">Career Service: </td>
						<td style="width: 70%; text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" placeholder=""/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Rating:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Date:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Place:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
					<tr>
						<td colspan="2" class="is-hidden"><small>if applicable</small></td>
					</tr>
					<tr>
						<td style="text-align: right;">License No.:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Release Date:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
			<button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Save</button>
			</form>
		</div>
	</div>
	
	<!-- Edit CSE -->
	<div id="modEDITCSE" class="modal hide fade" tabindex="-1"  data-backdrop="static" role="dialog" aria-labelledby="modEDITCSELabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times </button>
			<h4 id="modEDITCSELabel"><i class="icon-pencil" style="margin-top: 3px;"></i> Edit Career Service Eligibility (CSE)</h4>
		</div>
		<div class="modal-body">
			<form name="ea" action="#" method="post">
			<table class="table table-bordered table-hover responsive-utilities">
				<tbody>
					<tr>
						<td colspan="2" class="is-visible"></td>
					</tr>
					<tr>
						<td style="width: 30%; text-align: right;">Career Service: </td>
						<td style="width: 70%; text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" placeholder="" value="CAREER SERVICE PROFESSIONAL" /></td>
					</tr>
					<tr>
						<td style="text-align: right;">Rating:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" value="82.5 %"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Date:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" value="03/25/2013"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Place:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" value="TAGUIG CITY"/></td>
					</tr>
					<tr>
						<td colspan="2" class="is-hidden"><small>if applicable</small></td>
					</tr>
					<tr>
						<td style="text-align: right;">License No.:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" value="09890098678"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Release Date:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" value="PASIG CITY"/></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
			<button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Save</button>
			</form>
		</div>
	</div>
	
	<!-- Delete Child -->
	<div id="modDELCSE" class="modal hide fade" tabindex="-1"  data-backdrop="static" role="dialog" aria-labelledby="modDELCSELabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times </button>
			<h4 id="modDELCSELabel">Remove</h4>
		</div>
		<div class="modal-body">
			<p><small>Do you really want to remove <strong>Career Service Professional</strong> to your civil service eligibility?</small></p>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
			<button class="btn btn-danger"><i class="icon-trash icon-white"></i> Remove</button>
		</div>
	</div>
	
	<!-- New Work Experience -->
	<div id="modNEWWE" class="modal hide fade" tabindex="-1"  data-backdrop="static" role="dialog" aria-labelledby="modNEWWELabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times </button>
			<h4 id="modNEWWELabel"><i class="icon-plus" style="margin-top: 3px;"></i> Add Work Experience</h4>
		</div>
		<div class="modal-body">
			<form name="ea" action="#" method="post">
			<table class="table table-bordered table-hover responsive-utilities">
				<tbody>
					<tr>
						<td colspan="2" class="is-visible"></td>
					</tr>
					<tr>
						<td style="text-align: right;">Inclusive Date:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" placeholder="From"  value="1999" style="width: 25%;"/>&nbsp &nbsp - &nbsp &nbsp <input type="text"  value="2005" class="input-small table-text" placeholder="To" style="width: 25%;"/></td>
					</tr>
					<tr>
						<td style="width: 30%; text-align: right;">Position: </td>
						<td style="width: 70%; text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" placeholder=""/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Department/Company:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Monthly Salary:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">SG-SI:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Status of Appointment:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Gov't Service:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
			<button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Save</button>
			</form>
		</div>
	</div>
	
	<!-- Edit Work Experience -->
	<div id="modEDITWE" class="modal hide fade" tabindex="-1"  data-backdrop="static" role="dialog" aria-labelledby="modEDITWELabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times </button>
			<h4 id="modEDITWELabel"><i class="icon-pencil" style="margin-top: 3px;"></i> Edit Work Experience</h4>
		</div>
		<div class="modal-body">
			<form name="ea" action="#" method="post">
			<table class="table table-bordered table-hover responsive-utilities">
				<tbody>
					<tr>
						<td colspan="2" class="is-visible"></td>
					</tr>
					<tr>
						<td style="text-align: right;">Inclusive Date:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" placeholder="From"  value="1999" style="width: 25%;"/>&nbsp &nbsp - &nbsp &nbsp <input type="text"  value="2005" class="input-small table-text" placeholder="To" style="width: 25%;"/></td>
					</tr>
					<tr>
						<td style="width: 30%; text-align: right;">Position: </td>
						<td style="width: 70%; text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" placeholder=""/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Department/Company:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Monthly Salary:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">SG-SI:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Status of Appointment:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Gov't Service:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
			<button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Save</button>
			</form>
		</div>
	</div>
	
	<!-- Delete Work Experience -->
	<div id="modDELWE" class="modal hide fade" tabindex="-1"  data-backdrop="static" role="dialog" aria-labelledby="modDELWELabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times </button>
			<h4 id="modDELWELabel">Remove</h4>
		</div>
		<div class="modal-body">
			<p><small>Do you really want to remove <strong>SENIOR SCIENCE RESEARCH SPECIALIST (BUREAU OF AGRICULTURE AND FISHERIES PRODUCT STANDARDS)</strong> to your work experience?</small></p>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
			<button class="btn btn-danger"><i class="icon-trash icon-white"></i> Remove</button>
		</div>
	</div>
	
	<!-- New Voluntary Work -->
	<div id="modNEWVW" class="modal hide fade" tabindex="-1"  data-backdrop="static" role="dialog" aria-labelledby="modNEWVWLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times </button>
			<h4 id="modNEWVWLabel"><i class="icon-plus" style="margin-top: 3px;"></i> Add Voluntary Work</h4>
		</div>
		<div class="modal-body">
			<form name="ea" action="#" method="post">
			<table class="table table-bordered table-hover responsive-utilities">
				<tbody>
					<tr>
						<td colspan="2" class="is-visible"></td>
					</tr>
					<tr>
						<td style="width: 30%; text-align: right;">Name of Organization: </td>
						<td style="width: 70%; text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" placeholder=""/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Address of Organization:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Inclusive Date:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" placeholder="From"  value="1999" style="width: 25%;"/>&nbsp &nbsp - &nbsp &nbsp <input type="text"  value="2005" class="input-small table-text" placeholder="To" style="width: 25%;"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">SG-SI:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">No. of Hours:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Position/Nature of Work:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
			<button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Save</button>
			</form>
		</div>
	</div>
	
	<!-- Edit Voluntary Work -->
	<div id="modEDITVW" class="modal hide fade" tabindex="-1"  data-backdrop="static" role="dialog" aria-labelledby="modEDITVWLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times </button>
			<h4 id="modEDITVWLabel"><i class="icon-pencil" style="margin-top: 3px;"></i> Edit Voluntary Work</h4>
		</div>
		<div class="modal-body">
			<form name="ea" action="#" method="post">
			<table class="table table-bordered table-hover responsive-utilities">
				<tbody>
					<tr>
						<td colspan="2" class="is-visible"></td>
					</tr>
					<tr>
						<td style="width: 30%; text-align: right;">Name of Organization: </td>
						<td style="width: 70%; text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" placeholder=""/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Address of Organization:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Inclusive Date:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" placeholder="From"  value="1999" style="width: 25%;"/>&nbsp &nbsp - &nbsp &nbsp <input type="text"  value="2005" class="input-small table-text" placeholder="To" style="width: 25%;"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">SG-SI:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">No. of Hours:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Position/Nature of Work:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
			<button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Save</button>
			</form>
		</div>
	</div>
	
	<!-- Delete Voluntary Work -->
	<div id="modDELVW" class="modal hide fade" tabindex="-1"  data-backdrop="static" role="dialog" aria-labelledby="modDELVWLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times </button>
			<h4 id="modDELVWLabel"><i class="icon-trash" style="margin-top: 5px;"></i> Remove</h4>
		</div>
		<div class="modal-body">
			<p><small>Do you really want to remove <strong>SENIOR SCIENCE RESEARCH SPECIALIST</strong> to your voluntary work?</small></p>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
			<button class="btn btn-danger"><i class="icon-trash icon-white"></i> Remove</button>
		</div>
	</div>
	
	<!-- New Seminar -->
	<div id="modNEWSEM" class="modal hide fade" tabindex="-1"  data-backdrop="static" role="dialog" aria-labelledby="modNEWSEMLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times </button>
			<h4 id="modNEWSEMLabel"><i class="icon-plus" style="margin-top: 3px;"></i> Seminar Attended</h4>
		</div>
		<div class="modal-body">
			<form name="ea" action="#" method="post">
			<table class="table table-bordered table-hover responsive-utilities">
				<tbody>
					<tr>
						<td colspan="2" class="is-visible"></td>
					</tr>
					<tr>
						<td style="width: 30%; text-align: right;">Title of Seminar: </td>
						<td style="width: 70%; text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" placeholder=""/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Inclusive Date:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" placeholder="From"  value="1999" style="width: 25%;"/>&nbsp &nbsp - &nbsp &nbsp <input type="text"  value="2005" class="input-small table-text" placeholder="To" style="width: 25%;"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">No. of Hours:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Conducted/Sponsored:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
			<button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Save</button>
			</form>
		</div>
	</div>
	
	<!-- Edit Seminar -->
	<div id="modEDITSEM" class="modal hide fade" tabindex="-1"  data-backdrop="static" role="dialog" aria-labelledby="modEDITSEMLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times </button>
			<h4 id="modEDITSEMLabel"><i class="icon-pencil" style="margin-top: 3px;"></i> Seminar Attended</h4>
		</div>
		<div class="modal-body">
			<form name="ea" action="#" method="post">
			<table class="table table-bordered table-hover responsive-utilities">
				<tbody>
					<tr>
						<td colspan="2" class="is-visible"></td>
					</tr>
					<tr>
						<td style="width: 30%; text-align: right;">Title of Seminar: </td>
						<td style="width: 70%; text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" placeholder=""/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Inclusive Date:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" placeholder="From"  value="1999" style="width: 25%;"/>&nbsp &nbsp - &nbsp &nbsp <input type="text"  value="2005" class="input-small table-text" placeholder="To" style="width: 25%;"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">No. of Hours:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Conducted/Sponsored:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
			<button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Save</button>
			</form>
		</div>
	</div>
	
	<!-- Delete Seminar -->
	<div id="modDELSEM" class="modal hide fade" tabindex="-1"  data-backdrop="static" role="dialog" aria-labelledby="modDELSEMLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times </button>
			<h4 id="modDELSEMLabel"><i class="icon-trash" style="margin-top: 5px;"></i> Remove</h4>
		</div>
		<div class="modal-body">
			<p><small>Do you really want to remove <strong>WTO-SPS SEMINAR WORKSHOP FOR REGULATORY SERVICES</strong> to your seminars attended?</small></p>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
			<button class="btn btn-danger"><i class="icon-trash icon-white"></i> Remove</button>
		</div>
	</div>
	
	<!-- New Schedule -->
	<div id="SetSchedule" class="modal hide fade" tabindex="-1"  data-backdrop="static" role="dialog" aria-labelledby="SetScheduleLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times </button>
			<h4 id="SetScheduleLabel"><i style="margin-top: 3px;"></i> Set Schedule</h4>
		</div>
		<div class="modal-body">
			<form name="ea" action="#" method="post">
			<table class="table table-bordered table-hover responsive-utilities">
				<tbody>
					<tr>
						<td colspan="2" class="is-visible"></td>
					</tr>
					<tr>
						<td style="width: 30%; text-align: right;">Day: </td>
						<td style="width: 70%; text-align: left; padding-top: 3px;"><input id="sday" type="text" class="input-small table-text" placeholder=""/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Time:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Room:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Professor:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
			<button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Save</button>
			
			</form>
		</div>
	</div>
	
	<!-- Edit References -->
	<div id="modEDITREF" class="modal hide fade" tabindex="-1"  data-backdrop="static" role="dialog" aria-labelledby="modEDITREFLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times </button>
			<h4 id="modEDITREFLabel"><i class="icon-pencil" style="margin-top: 3px;"></i> Reference</h4>
		</div>
		<div class="modal-body">
			<form name="ea" action="#" method="post">
			<table class="table table-bordered table-hover responsive-utilities">
				<tbody>
					<tr>
						<td colspan="2" class="is-visible"></td>
					</tr>
					<tr>
						<td style="width: 30%; text-align: right;">Name: </td>
						<td style="width: 70%; text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text" placeholder=""/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Address:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
					<tr>
						<td style="text-align: right;">Telephone No.:</td>
						<td style="text-align: left; padding-top: 3px;"><input type="text" class="input-small table-text"/></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
			<button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Save</button>
			</form>
		</div>
	</div>
	
	<!-- Delete References -->
	<div id="modDELREF" class="modal hide fade" tabindex="-1"  data-backdrop="static" role="dialog" aria-labelledby="modDELREFLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times </button>
			<h4 id="modDELREFLabel"><i class="icon-trash" style="margin-top: 5px;"></i> Remove</h4>
		</div>
		<div class="modal-body">
			<p><small>Do you really want to remove <strong>DIR. CLARITO BARRON</strong> to your references?</small></p>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
			<button class="btn btn-danger"><i class="icon-trash icon-white"></i> Remove</button>
		</div>
	</div>
	
	<!-- End of Modals -->
    <!-- Footer
    ================================================== -->
    <footer class="footer">
      <div class="container">
        2013 &copy. All Rights Reserved. Copyright.<ul class="footer-links">
          <li><a href="#">About</a></li>
          <li class="muted">&middot;</li>
          <li><a href="#">Contact</a></li>
          <li class="muted">&middot;</li>
          <li><a href="#">Developers</a></li>
        </ul>
      </div>
    </footer>

    <!-- Le javascript
    ================================================== -->
	<?php include("javascript.php");?>

  </body>
</html>
