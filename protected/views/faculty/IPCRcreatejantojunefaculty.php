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
<title>Faculty | IPCR</title>

<!--Script of Sweet alert-->
<script src='<?php echo Yii::app()->getBaseUrl() ?>assets/jquery-3.6.0.min.js'></script>
<script src='<?php echo Yii::app()->getBaseUrl() ?>assets/sweetalert2.all.min.js'></script>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Page icon -->
<link href='puplogo.ico' rel='shortcut icon'/>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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
.underlined-header1 {
    background-color: Lightblue;
    font-size: 22px;
    
}

#title {
    width:132%; 
    margin-left: -15%;
}

#header {
  width:132%; 
  margin-left: -15%;  
}

#asterisk
{
    font-size: 20px;
    color: red;
}

#category
{
    display: inline;
}

#shadow 
{
    box-shadow: -31px 25px 9px -8px rgba(0,0,0,0.1);
}

#feedback 
{
    width: 100%;
    resize: none;
}
.w3-code {
    width: 70%; 
    margin-left: -15%;
    height: 135px;
}
.disabled{
  pointer-events: none;
  cursor: not-allowed;
  opacity: 0.65;
  filter: alpha(opacity=65);
  -webkit-box-shadow: none;
  box-shadow: none;
}
</style>

<link href='styles/print.css' media=print rel=stylesheet />

<!-- Modernizr library -->
<script src='scripts/libs/modernizr/modernizr.min.js'></script>
<meta charset="UTF-8"></head>
<body style="background-color: Black;">
<!-- JS notice - will be displayed if javascript is disabled -->
<p id=jsnotice>Javascript is currently disabled. This site requires Javascript to function correctly. Please <a href="http://enable-javascript.com/">enable Javascript in your browser</a>!</p>
<!-- End - JS notice -->
<!-- Page header -->
<div id="GradientDiv" class="cssWLGradientCommon cssWLGradientIMG"></div>

<!-- End - Page header -->

<!-- Page subheader -->

<!-- End - Page subheader -->
<!-- Page body -->
<!--<section class=container-block id=page-body>-->
<!--<div class=container-inner>-->
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
<?php 
    
    $sql = "SELECT * FROM tbl_ipcrvisible WHERE month = '$m' AND year = '$y'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $dline = $row['dline_date'];
    
 ?>

<h2 class="underlined-header" id="title" >Create IPCR: <strong>JANUARY TO JUNE <?php echo '('.$y.')';?></strong></h2>

<!-- Deadline -->
<h2 class="underlined-header" style="width:25%; color: Red; margin-left: -15%;"><strong> Deadline: <input style="display: inline;" placeholder="Not Set" value="<?php echo $dline; ?>" readonly></strong></h2>

<a href="index.php?r=faculty/IPCRcreatefaculty"><button style="width: 100px; margin-left: -15%;">&laquo; Select IPCR</button></a>
<section>
<div class="w3-code notranslate cssHigh">
    <small><strong><u>REMINDERS</u></strong></small>
    <br>
    <small><strong><b id="asterisk">*</b> - Required Fields.</strong></small>
    <br>
    <small><strong><li>All REQUIRED FIELDS is used on Approval so checked before you submit.</li></strong></small>
    <small><strong><li>After Review, If you got "Disapproved" on Approval part, you can click it to view the reason/feedback.</li></strong></small>

</div>
<table class=round-3 style="width:132%; margin-left: -15%;" id="shadow">
<thead>
    <tr align="center">
        <h2 class="underlined-header1" id="header"><center><p style="color: black;" id="category">S T R A T E G I C</p><p style="color: gray;" id="category"> P R I O R I T Y</p></center></h2>
        <th width="5%" rowspan="2"><h5 align="center"></h5></th>
        <th width="20%" rowspan="2"><h5>Output</h5></th>
        <th width="20%" rowspan="2"><h5>Success Indicators</h5></th>
        <th width="20%" rowspan="2"><h5>Actual Accomplishments</h5></th>
        <th width="30%" colspan="4"><h5>Ratings</h5></th>
        <th width="30%" rowspan="2"><h5>Remarks</h5></th>
        <th width="20%" rowspan="2"><h5>Approval</h5></th>
        <th width="20%" rowspan="2"><h5>Action</h5></th>
    </tr>
    <tr align="center">
        <th>Q1</th>
        <th>E2</th>
        <th>T3</th>
        <th>A4</th>
    </tr>
</thead>
<tfoot>
<tr>
<td colspan="11" style="font-size: 12px">End of Strategic Priority</td>
</tr>
</tfoot>
<tbody >

            <?php foreach($infosp as $rowsp): ?>
                <tr>
                    <td name="required" style="text-align: left;">
                    <strong>
                        <center>
                        <?php 
                            // if 'required' display asterisk
                            
                            if($rowsp['if_required'] == "Required") 
                            { 
                                echo '<p id="asterisk">*</p>';  
                            } else { 
                                ""; 
                            } 
                            // echo "<pre>";
                            // print_r($row);
                            // echo "</pre>";
                        ?> 
                        </center>
                    </strong> 
                    </td>
                    
                    <td style="white-space:pre-line;" name="outputs" style="text-align: left;"><?= $rowsp['output'] ?></td>
                    <td name="indi" style="text-align: left;"><?= $rowsp['indicators'] ?></td>
                    <td id="accomp" name="accomp" style="text-align: left;"><?= $rowsp['accomplishment'] ?></td>
                    <td id="quality" name="quality" style="text-align: center;"><?= $rowsp['rating_quality']?></td>
                    <td id="efficiency" name="efficiency" style="text-align: center;"><?= $rowsp['rating_efficiency']?></td>
                    <td id="timeliness" name="timeliness" style="text-align: center;"><?= $rowsp['rating_timeliness']?></td>
                    <td id="average" name="average" style="text-align: center;"><?= $rowsp['rating_average']?></td>
                    <td id="remarks" name="remarks" style="text-align: left;"><?= $rowsp['remarks'] ?></td>
        
                    <td id="approval" name="approval" style="text-align: center;">
                        <strong>
                        <?php if($rowsp['adminApproval'] == "Approved") : ?>
                                <p style=" color: Green;"><?= $rowsp['adminApproval'] ?> </p>
                        <?php elseif($rowsp['adminApproval'] == "Disapproved") : ?>

                            <!-- Modal of Disapprove to view Feedback -->
                                

                                <!-- Fetch the feedback to the db to view on the Modal -->
                                <?php  
                                    $idaccomp = $rowsp['idaccomp']; 
                                    $query = "SELECT * FROM tbl_ipcraccomp WHERE idaccomp = '$idaccomp'";
                                    $query_result = mysqli_query($conn,$query);
                                ?>
                                <?php while($row = mysqli_fetch_array($query_result)): ?>
                                    <?php $feed = $row['adminFeedback']; ?>
                                    <?php $idaccomp = $row['idaccomp'];?> 

                                <a value="Disapprove" data-toggle="modal" data-target="#exampleModalCenter<?php echo $idaccomp?>"><p style=" color: red;"><?= $rowsp['adminApproval']; ?></p></a>
                                
                                <div class="modal fade" id="exampleModalCenter<?php echo $idaccomp?>">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLongTitle"><strong>WHY DISAPPROVE?</strong></h4>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <textarea id="feedback" rows="15" readonly><?php echo strip_tags($feed); ?></textarea>
                                            </div> 
                                            <div class="modal-footer">
                                                <button id="btn-modal" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                                <!-- End of Modal -->
                        <?php else : ?>
                                <p style=" color: black;"><?= $rowsp['adminApproval']; ?></p>
                        <?php endif; ?>  
                        </strong>

                    </td>

                <td style="text-align: center;">
                    <?php if($rowsp['adminApproval'] == "Approved"): ?>
                            <button class="disabled" style="width:95px">Add Proof</button>
                        <?php if ($rowsp['idaccomp'] == "" || $rowsp['idaccomp'] == NULL): ?>
                            <button class="disabled" style="width:95px">Add Accomp.</button>
                        <?php else: ?>
                            <button class="disabled" style="width:95px">Edit Accomp.</button>
                        <?php endif; ?>
                    <?php elseif($rowsp['adminApproval'] == "Disapproved" || $rowsp['adminApproval'] == NULL): ?>
                            <a href="index.php?r=faculty/IPCRaddproof<?php echo'&accomp='.$rowsp['accomplishment'].'&fcode='.$fcode.'&id='.$rowsp['id'].'&m='.$m.'&y='.$y.'';?>"><button style="width:95px">Add Proof</button></a>
                        <?php if ($rowsp['idaccomp'] == "" || $rowsp['idaccomp'] == NULL): ?>
                            <a href="index.php?r=faculty/IPCRaddaccomp<?php echo'&fcode='.$fcode.'&outputs='.$rowsp['output'].'&indi='.$rowsp['indicators'].'&id='.$rowsp['id'].'&m='.$m.'&y='.$y.'';?>"><button style="width:95px">Add Accomp.</button></a>
                        <?php else: ?>
                            <a href="index.php?r=faculty/EditIPCRrowfaculty<?php echo'&fcode='.$fcode.'&outputs='.$rowsp['output'].'&idaccomp='.$rowsp['idaccomp'].'&indi='.$rowsp['indicators'].'&accomp='.$rowsp['accomplishment'].'&y='.$y.'&m='.$m.'';?>"><button style="width:95px">Edit Accomp.</button></a>
                        <?php endif ?>
                    <?php endif; ?> 
                    </td> 
                </td>
            </tr>
        <?php endforeach ?>     

</tbody>
</table>
<br>
<br>
<!-- CORE FUNCTION -->
<table class=round-3 style="width:132%; margin-left: -15%;" id="shadow">
<thead>
    <tr align="center">
        <br>
        <h2 class="underlined-header1" id="header"><center><p style="color: black;" id="category">C O R E</p><p style="color: gray;" id="category"> F U N C T I O N</p></center></h2>
        <th width="5%" rowspan="2"><h5 align="center"></h5></th>
        <th width="20%" rowspan="2"><h5>Output</h5></th>
        <th width="20%" rowspan="2"><h5>Success Indicators</h5></th>
        <th width="20%" rowspan="2"><h5>Actual Accomplishments</h5></th>
        <th width="30%" colspan="4"><h5>Ratings</h5></th>
        <th width="30%" rowspan="2"><h5>Remarks</h5></th>
        <th width="20%" rowspan="2"><h5>Approval</h5></th>
        <th width="20%" rowspan="2"><h5>Action</h5></th>
    </tr>
    <tr align="center">
        <th>Q1</th>
        <th>E2</th>
        <th>T3</th>
        <th>A4</th>
    </tr>
</thread>
<tfoot>
<tr>
<td colspan="11" style="font-size: 12px">End of Core Function</td>
</tr>
</tfoot>
<tbody> 
            <?php foreach($infocf as $rowcf): ?>
                <tr>
                    <td name="required" style="text-align: left;">
                    <strong>
                        <center>
                        <?php 
                            // if 'required' display asterisk
                            
                            if($rowcf['if_required'] == "Required") 
                            { 
                                echo '<p id="asterisk">*</p>';  
                            } else { 
                                ""; 
                            } 
                        ?> 
                        </center>
                    </strong>
                    </td>
                    
                    <td style="white-space:pre-line;" name="outputs" style="text-align: left;"><?= $rowcf['output'] ?></td>
                    <td name="indi" style="text-align: left;"><?= $rowcf['indicators'] ?></td>
                    <td id="accomp" name="accomp" style="text-align: left;"><?= $rowcf['accomplishment'] ?></td>
                    <td id="quality" name="quality" style="text-align: center;"><?= $rowcf['rating_quality']?></td>
                    <td id="efficiency" name="efficiency" style="text-align: center;"><?= $rowcf['rating_efficiency']?></td>
                    <td id="timeliness" name="timeliness" style="text-align: center;"><?= $rowcf['rating_timeliness']?></td>
                    <td id="average" name="average" style="text-align: center;"><?= $rowcf['rating_average']?></td>
                    <td id="remarks" name="remarks" style="text-align: left;"><?= $rowcf['remarks'] ?></td>
        
                    <td id="approval" name="approval" style="text-align: center;">
                        <strong>
                        <?php if($rowcf['adminApproval'] == "Approved") : ?>
                                <p style=" color: Green;"><?= $rowcf['adminApproval'] ?> </p>
                        <?php elseif($rowcf['adminApproval'] == "Disapproved") : ?>

                            <!-- Modal of Disapprove to view Feedback -->
                                

                                <!-- Fetch the feedback to the db to view on the Modal -->
                                <?php   
                                    $idaccomp = $rowcf['idaccomp'];
                                    $query = "SELECT * FROM tbl_ipcraccomp WHERE idaccomp = '$idaccomp'";
                                    $query_result = mysqli_query($conn,$query);
                                ?>
                                <?php while($row = mysqli_fetch_array($query_result)): ?>
                                    <?php $feed = $row['adminFeedback']; ?>
                                    <?php $idaccomp = $row['idaccomp'];?> 

                                <a value="Disapprove" data-toggle="modal" data-target="#exampleModalCenter<?php echo $idaccomp?>"><p style=" color: red;"><?= $row['adminApproval']; ?></p></a>
                                
                                <div class="modal fade" id="exampleModalCenter<?php echo $idaccomp?>">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLongTitle"><strong>WHY DISAPPROVE?</strong></h4>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <textarea id="feedback" rows="15" readonly><?php echo strip_tags($feed); ?></textarea>
                                            </div> 
                                            <div class="modal-footer">
                                                <button id="btn-modal" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                                <!-- End of Modal -->
                        <?php else : ?>
                                <p style=" color: black;"><?= $rowcf['adminApproval']; ?></p>
                        <?php endif; ?>  
                        </strong>

                    </td>
                    <td style="text-align: center;">
                       <?php if($rowcf['adminApproval'] == "Approved"): ?>
                            <button class="disabled" style="width:95px">Add Proof</button>
                        <?php if ($rowcf['idaccomp'] == "" || $rowcf['idaccomp'] == NULL): ?>
                            <button class="disabled" style="width:95px">Add Accomp.</button>
                        <?php else: ?>
                            <button class="disabled" style="width:95px">Edit Accomp.</button>
                        <?php endif; ?>
                    <?php elseif($rowcf['adminApproval'] == "Disapproved" || $rowcf['adminApproval'] == NULL): ?>
                            <a href="index.php?r=faculty/IPCRaddproof<?php echo'&accomp='.$rowcf['accomplishment'].'&fcode='.$fcode.'&id='.$rowcf['id'].'&m='.$m.'&y='.$y.'';?>"><button style="width:95px">Add Proof</button></a>
                        <?php if ($rowcf['idaccomp'] == "" || $rowcf['idaccomp'] == NULL): ?>
                            <a href="index.php?r=faculty/IPCRaddaccomp<?php echo'&fcode='.$fcode.'&outputs='.$rowcf['output'].'&indi='.$rowcf['indicators'].'&id='.$rowcf['id'].'&m='.$m.'&y='.$y.'';?>"><button style="width:95px">Add Accomp.</button></a>
                        <?php else: ?>
                            <a href="index.php?r=faculty/EditIPCRrowfaculty<?php echo'&fcode='.$fcode.'&outputs='.$rowcf['output'].'&idaccomp='.$rowcf['idaccomp'].'&indi='.$rowcf['indicators'].'&accomp='.$rowcf['accomplishment'].'&y='.$y.'&m='.$m.'';?>"><button style="width:95px">Edit Accomp.</button></a>
                        <?php endif ?>
                    <?php endif; ?> 
                    </td>  
                </tr>
        <?php endforeach; ?>
</tbody>
</table>
<br>
<br>
<table class=round-3 style="width:132%; margin-left: -15%;" id="shadow">
<thead>
    <tr align="center">
        <br>
        <h2 class="underlined-header1" id="header"><center><p style="color: black;" id="category">S U P P O R T</p><p style="color: gray;" id="category"> F U N C T I O N</p></center></h2>
        <th width="5%" rowspan="2"><h5 align="center"></h5></th>
        <th width="20%" rowspan="2"><h5>Output</h5></th>
        <th width="20%" rowspan="2"><h5>Success Indicators</h5></th>
        <th width="20%" rowspan="2"><h5>Actual Accomplishments</h5></th>
        <th width="30%" colspan="4"><h5>Ratings</h5></th>
        <th width="30%" rowspan="2"><h5>Remarks</h5></th>
        <th width="20%" rowspan="2"><h5>Approval</h5></th>
        <th width="20%" rowspan="2"><h5>Action</h5></th>
    </tr>
    <tr align="center">
        <th>Q1</th>
        <th>E2</th>
        <th>T3</th>
        <th>A4</th>
    </tr>
</thread>
<tfoot>
<tr>
<td colspan="11" style="font-size: 12px">End of Support Function</td>
</tr>
</tfoot>
<tbody>
            <?php foreach($infosf as $rowsf): ?>

            <tr>
                <td name="required" style="text-align: left;">
                    <strong>
                        <center><?php if($rowsf['if_required'] == "Required") { echo '<p id="asterisk">*</p>';  } else { ""; } ?></center>
                    </strong>
                </td>
                <td style="white-space:pre-line;" name="outputs" style="text-align: left;"><?= $rowsf['output'] ?></td>
                    <td name="indi" style="text-align: left;"><?= $rowsf['indicators'] ?></td>
                    <td id="accomp" name="accomp" style="text-align: left;"><?= $rowsf['accomplishment'] ?></td>
                    <td id="quality" name="quality" style="text-align: center;"><?= $rowsf['rating_quality']?></td>
                    <td id="efficiency" name="efficiency" style="text-align: center;"><?= $rowsf['rating_efficiency']?></td>
                    <td id="timeliness" name="timeliness" style="text-align: center;"><?= $rowsf['rating_timeliness']?></td>
                    <td id="average" name="average" style="text-align: center;"><?= $rowsf['rating_average']?></td>
                    <td id="remarks" name="remarks" style="text-align: left;"><?= $rowsf['remarks'] ?></td>
        
                    <td id="approval" name="approval" style="text-align: center;">
                        <strong>
                        <?php if($rowsf['adminApproval'] == "Approved") : ?>
                                <p style=" color: Green;"><?= $rowsf['adminApproval']; ?> </p>
                        <?php elseif($rowsf['adminApproval'] == "Disapproved") : ?>

                            
                                <!-- Fetch the feedback to the db to view on the Modal -->
                                <?php
                                    $idaccomp = $rowsf['idaccomp'];
                                    $query = "SELECT * FROM tbl_ipcraccomp WHERE idaccomp = '$idaccomp'";
                                    $query_result = mysqli_query($conn,$query);
                                ?>
                                <?php while($row = mysqli_fetch_array($query_result)): ?>
                                    <?php $feed = $row['adminFeedback']; ?>
                                    <?php $id = $row['idaccomp'];?> 

                                <a data-toggle="modal" data-target="#exampleModalCenter<?php echo $id?>"><p style=" color: red;"><?= $rowsf['adminApproval']; ?></p></a>
                                
                               

                                <!-- Modal of Disapprove to view Feedback -->
                                <div class="modal fade" id="exampleModalCenter<?php echo $id;?>">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLongTitle"><strong>WHY DISAPPROVE?</strong></h4>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <textarea id="feedback" rows="15" readonly><?php echo strip_tags($feed); ?></textarea>
                                            </div> 
                                            <div class="modal-footer">
                                                <button id="btn-modal" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                                <!-- End of Modal -->
                        <?php else : ?>
                                <p style=" color: black;"><?= $rowsf['adminApproval']; ?></p>
                        <?php endif; ?>  
                        </strong>

                    </td>
                
                    <td style="text-align: center;">
                    <?php if($rowsf['adminApproval'] == "Approved"): ?>
                            <button class="disabled" style="width:95px">Add Proof</button>
                        <?php if ($rowsf['idaccomp'] == "" || $rowsf['idaccomp'] == NULL): ?>
                            <button class="disabled" style="width:95px">Add Accomp.</button>
                        <?php else: ?>
                            <button class="disabled" style="width:95px">Edit Accomp.</button>
                        <?php endif; ?>
                    <?php elseif($rowsf['adminApproval'] == "Disapproved" || $rowsf['adminApproval'] == NULL): ?>
                            <a href="index.php?r=faculty/IPCRaddproof<?php echo'&accomp='.$rowsf['accomplishment'].'&fcode='.$fcode.'&id='.$rowsf['id'].'&m='.$m.'&y='.$y.'';?>"><button style="width:95px">Add Proof</button></a>
                        <?php if ($rowsf['idaccomp'] == "" || $rowsf['idaccomp'] == NULL): ?>
                            <a href="index.php?r=faculty/IPCRaddaccomp<?php echo'&fcode='.$fcode.'&outputs='.$rowsf['output'].'&indi='.$rowsf['indicators'].'&id='.$rowsf['id'].'&m='.$m.'&y='.$y.'';?>"><button style="width:95px">Add Accomp.</button></a>
                        <?php else: ?>
                            <a href="index.php?r=faculty/EditIPCRrowfaculty<?php echo'&fcode='.$fcode.'&outputs='.$rowsf['output'].'&idaccomp='.$rowsf['idaccomp'].'&indi='.$rowsf['indicators'].'&accomp='.$rowsf['accomplishment'].'&y='.$y.'&m='.$m.'';?>"><button style="width:95px">Edit Accomp.</button></a>
                        <?php endif ?>
                    <?php endif; ?> 
                    </td> 
            </tr>
        <?php endforeach ?>
</tbody>
</table>
    <h5>
        <strong>
            <center>NOTE: DOUBLE CHECK. IF YOU'RE DONE ON YOUR IPCR, PLEASE PRESS THIS BUTTON TO SUBMIT</center>
        </strong>
    </h5>             
    <center>
        <a href="index.php?r=faculty/IPCRtagcomplete<?php echo'&fcode='.$fcode.'&m='.$m.'&y='.$y.'';?>" class="btn-del">
            <button style="width:120px">Submit IPCR</button>
        </a>
    </center>
</div>
</section>
            <!--Sweet alert REquired field-->
            <?php if(isset($_GET['a'])) : ?>
                <div class="flash-data" data-flashdata="<?= $_GET['a']; ?>"></div>
            <?php endif; ?>
            <script>
                $('.btn-del').on('click', function(e){
                        e.preventDefault()
                        const href = $(this).attr('href')

                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this action.",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: 'green',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, Submit'
                        }).then((result) => {
                            if (result.value) {
                                document.location.href = href;
                            } 
                        })
                    })

                const flashdata = $('.flash-data').data('flashdata')
                    if (flashdata) {
                        Swal.fire(
                            'Please fill up Required fields',
                            'Press OK to continue',
                            'warning'
                        )
                    }
            </script>    
</section>

<footer id=page-footer>
<div class=container-aligner>
<!-- Footer left -->
<section id=footer-left>
© Copyright 2021 <a href="https://sites.google.com/view/puptfsis/ipcr/fsis2-team-members?authuser=0" title="Dbooom Themes">Apex Dev Team | PUP Taguig</a> - All Rights Reserved.
</section>
<!-- End - Footer left -->
<!-- Footer right -->
<section id=footer-right>
<ul class=footer-navigation>
<li>
<a href='http://www.pup-taguig.net' title=Home>Home</a>
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
<script id=js-dispatcher src='scripts/scripts.js'></script>
</body>
</html>