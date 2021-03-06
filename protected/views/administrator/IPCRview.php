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
<title>Administrator | IPCR</title>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!--Script of Sweet alert-->
<script src='<?php echo Yii::app()->getBaseUrl() ?>assets/jquery-3.6.0.min.js'></script>
<script src='<?php echo Yii::app()->getBaseUrl() ?>assets/sweetalert2.all.min.js'></script>

<!-- Modal Scripts -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

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
    width: 100%;


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

.underlined
{
    background-color: lightgray;
    font-size: 18px;
    padding: 5px;
    text-align: center;
}

@media only screen and (min-width:150px) and (max-width:600px)
{
/* Title right */
    .title-right {
        float: left;
        margin: 0;
        padding: 0;
        height: 240px;
        line-height: 30px;
        width: 100%;
    }

        .title-right a {
            float: left;
            display: block;
            margin 0;
            height: 30px;
            padding: 0;
            line-height: 30px;
            text-align: center;
            width: 100%;
        }

        
    .title-right a:hover {
            background: url(../images/transparent/05_white.png);
            background-color: rgba(255,255,255,.05);
            width: 100%;
        }


    .title-right a:last-child {
            margin: 0;
        }

            .title-right a span {
                display: block;
                padding-left: 0;
                background-position: 0 50%;
                background-repeat: no-repeat;
            }

}


#page-body
{
    background-color: antiquewhite;
}

.underlined-header1 {
    background-color: Lightblue;
    font-size: 22px;
}

#btn-act
{
    width: 90px;
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
    box-shadow: -31px 30px 5px -8px rgba(0,0,0,0.1);
}

#feedback 
{
    width: 100%;
    resize: none;
}

.content 
{
    display: none;
}

.button-content 
{
   display: none;  
}

.loader 
{
    height: 100vh;
    width: 100vw;
    overflow: hidden;
    background-color: #16191e;
    position: absolute;
}

.loader>div
{
    height: 100px;
    width: 100px;
    border: 15px solid #45474b;
    border-top-color: #2a88e6;
    position: absolute;
    margin: auto;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    border-radius: 50%;
    animation: spin 1.5s infinite linear;
}

@keyframes spin
{
    100%{
        transform: rotate(360deg);
    }
    
}

.Pending 
{
    float: right; 
    margin-left: 10px; 
    margin-right: -15%; 
    background: blue;
    cursor: pointer;
}

.Approved 
{
    float: right; 
    margin-right: -20px; 
    background: green;
    display: grid;
    place-content: center;
}

footer {
    position: absolute;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: black;
   color: white;
   text-align: center;
}

#page-body-content {
    position: inherit;
}
</style>
<link href='styles/print.css' media=print rel=stylesheet />
<!-- Modernizr library -->
<script src='scripts/libs/modernizr/modernizr.min.js'></script>


<meta charset="UTF-8"></head>
<body style="background-color: ghostwhite;">
<!-- <div class="loader">
    <div></div>
</div>
<div class="content"> -->
        <!-- JS notice - will be displayed if javascript is disabled -->
        <!--<p id=jsnotice>Javascript is currently disabled. This site requires Javascript to function correctly. Please <a href="http://enable-javascript.com/">enable Javascript in your browser</a>!</p>
         End - JS notice -->
        <!-- Page header -->
        <div id="GradientDiv" class="cssWLGradientCommon cssWLGradientIMG"></div>

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
            
            
        ?>

        <?php
            $query = "SELECT * FROM tbl_personalinformation WHERE EmpID = '$fcode'";
            $res = mysqli_query($conn,$query);

            while($rows = mysqli_fetch_array($res))
            {
                $fname = $rows['firstname'];
                $mname = $rows['middlename'];
                $sname = $rows['surname'];

                $sql = "SELECT * FROM tbl_ipcrstatus WHERE fcode = '$fcode' AND month = '$m' AND year = '$y'";
                $result = mysqli_query($conn,$sql);
                while($rows = mysqli_fetch_assoc($result))
                {
                    if($m == "JJ")
                    {
                        echo '<h2 class="underlined-header" style="width:132%; margin-left: -15%;"><strong>IPCR OF: '.$sname.", ".$fname." ".$mname.' (JANUARY TO JUNE - '.$y.')</strong></h2>';
                    } else if($m == "JD"){
                        echo '<h2 class="underlined-header" style="width:132%; margin-left: -15%;"><strong>IPCR OF: '.$sname.", ".$fname." ".$mname.' (JULY TO DECEMBER - '.$y.')</strong></h2>';
                    }
                }
            }
        ?>
        
        <section>
        <a href="index.php?r=administrator/IPCRlist<?php echo'&m='.$m.'&y='.$y.'';?>"><button style="width: 80px; margin-left: -15%;">&laquo; Previous</button></a>

        <?php 
            
            $sql = "SELECT * FROM tbl_ipcrstatus WHERE fcode = '$fcode' AND month = '$m' AND year = '$y'"; 
            $res = mysqli_query($conn,$sql);

            while($rows = mysqli_fetch_array($res))
            {
                $status = $rows['status'];
            }
            if($status == "Submitted" || $status == "Pending")
            {
                echo ' 
                        <a href="index.php?r=administrator/IPCRmarkform&fcode='.$fcode.'&m='.$m.'&y='.$y.'&mark=Pending">
                            <button class="Pending">Mark as Pending</button>
                        </a>
                        <a href="index.php?r=administrator/IPCRmarkform&fcode='.$fcode.'&m='.$m.'&y='.$y.'&mark=Approved">
                            <button class="Approved">Mark as Approved</button> 
                        </a>
                              
                ';
            }
        ?>
        <br>
        <table class=round-3 style="width:132%; margin-left: -15%;" id="shadow">
        <thead>
            <tr align="center">
                <br>
                <h2 class="underlined-header1" id="header"><center><p style="color: black;" id="category">S T R A T E G I C</p><p style="color: gray;" id="category"> P R I O R I T Y</p></center></h2>
                <th width="5%" rowspan="2"><h5 align="center"></h5></th>
                <th width= "20%" rowspan="2"><h5>Output</h5></th>
                <th width= "20%" rowspan="2"><h5>Success Indicators</h5></th>
                <th width= "20%" rowspan="2"><h5>Actual Accomplishments</h5></th>
                <th width= "30%" colspan="4"><h5>Ratings</h5></th>
                <th width= "30%" rowspan="2"><h5>Remarks</h5></th>
                <th width= "20%" rowspan="2"><h5>Approval</h5></th>
                <th width= "20%" rowspan="2"><h5>Action</h5></th>

            </tr>
            <tr align="center">
                <th>Q1</th>
                <th>E2</th>
                <th>T3</th>
                <th>A4</th>
            </tr>
            <tr></tr>
        </thead>
        <tfoot>
        <tr>
        <td colspan=11 style="font-size: 12px;">End of Strategic Priority</td>
        </tr>
        </tfoot>
        <tbody >
                    <?php 
                        if($m == "JJ") {
                            $data = $variablesp;
                        } else if($m == "JD") {
                            $data = $variable2sp;
                        }
                    ?>

                    <?php foreach($data as $rows): ?>
                   
                
                        <tr>
                            <td name="required" style="text-align: left;">
                            <strong>
                                <center>
                                <?php 
                                    // if 'required' display asterisk
                                    
                                    if($rows['if_required'] == "Required") 
                                    { 
                                        echo '<p id="asterisk">*</p>';  
                                    } else { 
                                        ""; 
                                    } 
                                ?> 
                                </center>
                            </strong>
                            </td>
                            
                            <td style="white-space:pre-line;" name="outputs" style="text-align: left;"><?= $rows['output'] ?></td>
                            <td name="indi" style="text-align: left;"><?= $rows['indicators'] ?></td>
                            <td id="accomp" name="accomp" style="text-align: left;"><?= $rows['accomplishment'] ?></td>
                            <td id="quality" name="quality" style="text-align: center;"><?= $rows['rating_quality']?></td>
                            <td id="efficiency" name="efficiency" style="text-align: center;"><?= $rows['rating_efficiency']?></td>
                            <td id="timeliness" name="timeliness" style="text-align: center;"><?= $rows['rating_timeliness']?></td>
                            <td id="average" name="average" style="text-align: center;"><?= $rows['rating_average']?></td>
                            <td id="remarks" name="remarks" style="text-align: left;"><?= $rows['remarks'] ?></td>
                
                            <td id="approval" name="approval" style="text-align: center;">
                                <strong>
                                <?php if($rows['adminApproval'] == "Approved") : ?>
                                        <p style=" color: Green;"><?= $rows['adminApproval'] ?> </p>
                                <?php elseif($rows['adminApproval'] == "Disapproved") : ?>

                                    <!-- Modal of Disapprove to view Feedback -->
                                        

                                        <!-- Fetch the feedback to the db to view on the Modal -->
                                        <?php
                                            $idaccomp = $rows['idaccomp'];
                                            $query = "SELECT * FROM tbl_ipcraccomp WHERE idaccomp = '$idaccomp'";
                                            $query_result = mysqli_query($conn,$query);
                                        ?>
                                        <?php while($row = mysqli_fetch_array($query_result)): ?>
                                            <?php $feed = $row['adminFeedback']; ?>
                                            <?php $id = $row['idaccomp'];?> 

                                        <a data-toggle="modal" data-target="#exampleModalCenter<?php echo $id?>"><p style=" color: red;"><?= $rows['adminApproval']; ?></p></a>
                                        
                                        <div class="modal fade" id="exampleModalCenter<?php echo $id?>">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLongTitle"><strong>WHY DISAPPROVE?</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        
                                                        <textarea id="feedback" rows="10" style="font-size: 20px;" readonly><?php echo strip_tags($feed); ?></textarea>
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
                                        <p style=" color: black;"><?= $rows['adminApproval']; ?></p>
                                <?php endif; ?>  
                                </strong>

                            </td>
                
                
                            <td style="text-align: center;">

                            <a href="index.php?r=administrator/IPCRevaluation<?php echo'&accomp='.$rows['accomplishment'].'&fcode='.$fcode.'&idaccomp='.$rows['idaccomp'].'&id='.$rows['id'].'&m='.$m.'&y='.$y.''?>"><button id="btn-act">Evaluate</button></a>
                            </td>
                        </tr>           
                      <?php endforeach; ?>

        </tbody>
        </table>
        <br>
        <br>
        <table class=round-3 style="width:132%; margin-left: -15%; " id="shadow">
        <thead>
            <tr align="center">
                <br>
                <h2 class="underlined-header1" id="header"><center><p style="color: black;" id="category">C O R E</p><p style="color: gray;" id="category"> F U N C T I O N</p></center></h2>
                <th width="5%" rowspan="2"><h5 align="center"></h5></th>
                <th width= "20%" rowspan="2"><h5>Output</h5></th>
                <th width= "20%" rowspan="2"><h5>Success Indicators</h5></th>
                <th width= "20%" rowspan="2"><h5>Actual Accomplishments</h5></th>
                <th width= "30%" colspan="4"><h5>Ratings</h5></th>
                <th width= "30%" rowspan="2"><h5>Remarks</h5></th>
                <th width= "20%" rowspan="2"><h5>Approval</h5></th>
                <th width= "20%" rowspan="2"><h5>Action</h5></th>
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
        <td colspan=11 style="font-size: 12px;">End of Core Function</td>
        </tr>
        </tfoot>
        <tbody >
                        <?php 
                            if($m == "JJ")
                            {
                                $data = $variablecf;
                            } else if ($m == "JD") {
                                $data = $variable2cf;
                            }
                        ?>
                        <?php foreach($data as $rowcf): ?>
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
                                            <?php $id = $row['idaccomp'];?> 

                                        <a data-toggle="modal" data-target="#exampleModalCenter<?php echo $id?>"><p style=" color: red;"><?= $rowcf['adminApproval']; ?></p></a>
                                        
                                        <div class="modal fade" id="exampleModalCenter<?php echo $id?>">
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
                                        <p style=" color: black;"><?= $rowcf['adminApproval'] ?></p>
                                <?php endif; ?>  
                                </strong>

                            </td>
                
                
                            <td style="text-align: center;">

                            <a href="index.php?r=administrator/IPCRevaluation<?php echo'&accomp='.$rowcf['accomplishment'].'&fcode='.$fcode.'&idaccomp='.$rowcf['idaccomp'].'&id='.$rowcf['id'].'&m='.$m.'&y='.$y.''?>"><button id="btn-act">Evaluate</button></a>
                            </td>
                        </tr>            
                    <?php endforeach ?>
        </tbody>
        </table>
        <br>
        <br>
        <table class=round-3 style="width:132%; margin-left: -15%; " id="shadow">
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
        </thead>
        <tfoot>
        <tr>
        <td colspan=11 style="font-size: 12px;">End of Support Function</td>
        </tr>
        </tfoot>
        <tbody >
                    <?php 
                        if($m == "JJ") {
                            $data = $variablesf;
                        } else if ($m == "JD") {
                            $data = $variable2sf;
                        }
                    ?>
                    <?php foreach($data as $rowsf): ?>
                        <tr>
                            <td name="required" style="text-align: left;">
                            <strong>
                                <center>
                                <?php 
                                    // if 'required' display asterisk
                                    
                                    if($rowsf['if_required'] == "Required") 
                                    { 
                                        echo '<p id="asterisk">*</p>';  
                                    } else { 
                                        ""; 
                                    } 
                                ?> 
                                </center>
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
                                        <p style=" color: Green;"><?= $rowsf['adminApproval'] ?> </p>
                                <?php elseif($rowsf['adminApproval'] == "Disapproved") : ?>

                                    <!-- Modal of Disapprove to view Feedback -->
                                        

                                        <!-- Fetch the feedback to the db to view on the Modal -->
                                        <?php
                                            $idaccomp = $rowsf['idaccomp'];
                                            $query = "SELECT * FROM tbl_ipcraccomp WHERE idaccomp = '$idaccomp'";
                                            $query_result = mysqli_query($conn,$query);
                                        ?>
                                        <?php while($row = mysqli_fetch_array($query_result)): ?>
                                            <?php $feed = $row['adminFeedback']; ?>
                                            <?php $id = $row['idaccomp'];?> 

                                        <a value="Disapprove" data-toggle="modal" data-target="#exampleModalCenter<?php echo $id?>"><p style=" color: red;"><?= $rowsf['adminApproval']; ?></p></a>
                                        
                                        <div class="modal fade" id="exampleModalCenter<?php echo $id?>">
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
                                        <p style=" color: black;"><?= $rowsf['adminApproval'] ?></p>
                                <?php endif; ?>  
                                </strong>

                            </td>
                
                
                            <td style="text-align: center;">

                            <a href="index.php?r=administrator/IPCRevaluation<?php echo'&accomp='.$rowsf['accomplishment'].'&fcode='.$fcode.'&idaccomp='.$rowsf['idaccomp'].'&id='.$rowsf['id'].'&m='.$m.'&y='.$y.''?>"><button id="btn-act">Evaluate</button></a>
                            </td>
                        </tr>      
                        <?php endforeach ?>  

        </tbody>
        </table>

                  
          
               
         
        </div>
        </div>
                    <!-- prevent page resize -->
                    <!-- <script src="js/preventresize.js"></script> -->


                    <!-- Sweet Alert -->
                    <!-- For Approve -->
                <?php if(isset($_GET['mess'])):  ?>

                    <?php if($_GET['mess'] ==1) : ?>
                        <div class="flash-data" data-flashdata="<?= $_GET['mess']; ?>"></div>
                    <?php endif; ?>

                    <!-- For Disapprove -->
                    <?php if($_GET['mess'] ==2) : ?>
                        <div class="flash-data" data-flashdata="<?= $_GET['mess']; ?>"></div>
                    <?php endif; ?>

                    <?php if($_GET['mess'] ==3) : ?>
                        <div class="flash-data" data-flashdata="<?= $_GET['mess']; ?>"></div>
                    <?php endif; ?>

                    <?php if($_GET['mess'] ==4) : ?>
                        <div class="flash-data" data-flashdata="<?= $_GET['mess']; ?>"></div>
                    <?php endif; ?>

                    <?php if($_GET['mess'] ==5) : ?>
                        <div class="flash-data" data-flashdata="<?= $_GET['mess']; ?>"></div>
                    <?php endif; ?>

                <?php endif; ?>
                    <script>
                    // Sweet Alert For Approve
                    flashdata = $('.flash-data').data('flashdata')
                            if (flashdata==1) {
                                Swal.fire(
                                    'Approved!',
                                    '',
                                    'success'
                                )
                            }

                    //Sweet alert for Disapprove
                    
                            if (flashdata==2) {
                                Swal.fire(
                                    'Disapproved!',
                                    '',
                                    'error'
                                )
                            }

                    //Sweet alert for Disapprove
                            if (flashdata==3) {
                                Swal.fire({
                                  position: 'center',
                                  icon: 'success',
                                  title: 'IPCR marked Approved.',
                                  showConfirmButton: false,
                                  timer: 2000
                                })
                            }

                            if (flashdata==4) {
                                Swal.fire({
                                  position: 'center',
                                  icon: 'success',
                                  title: 'IPCR marked Pending.',
                                  showConfirmButton: false,
                                  timer: 2000
                                })
                            }

                            if (flashdata==5) {
                                Swal.fire({
                                  position: 'center',
                                  icon: 'error',
                                  title: 'Email not sent.',
                                  showConfirmButton: false,
                                  timer: 2000
                                })
                            }
                    </script>    

                    <!--  -->

        <!-- </section> -->
<footer id=page-footer>
    <div class=container-aligner>
        <section id=footer-left>
            ?? Copyright 2021 <a href="https://sites.google.com/view/puptfsis/ipcr/fsis2-team-members?authuser=0">Team Apex | PUP Taguig</a> - All Rights Reserved.
        </section>
    </div>
</footer>
</body>
</html>

