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

<!--Script of Sweet alert-->
<script src='<?php echo Yii::app()->getBaseUrl() ?>assets/jquery-3.6.0.min.js'></script>
<script src='<?php echo Yii::app()->getBaseUrl() ?>assets/sweetalert2.all.min.js'></script>

<!-- Modal Scripts -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<!-- For Alerts -->
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

<!-- Page icon -->
<link href='puplogo.ico' rel='shortcut icon'/>
<!-- Stylesheets -->
<style media=screen type='text/css'> @import "styles/base.css";
/*.cssLT #ut, .cssUT #ut
{
    filter:progid:DXImageTransform.Microsoft.DropShadow(enabled=true);
}
.cssWLGradientIMG
{
    BACKGROUND-IMAGE: none;
    top:0;height:103px;
    background-color:#ffffff;
}
.cssWLGradientIMGSSL
{
    BACKGROUND-IMAGE: none;
    top:0;height:103px;
    background-color:#ffffff;
} */
.cssWLGradientIMG
{
    BACKGROUND-IMAGE: url(images/hd_tm1.jpg);
    BACKGROUND-REPEAT:repeat-x;
    top:0;
    height:105px;
}
    
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
    padding: 0px 10px 10px;
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

/*Style for alert*/
.alert{
  background: lightgreen;
  padding: 20px 40px;
  min-width: 420px;
  position: absolute;
  right: 0;
  top: 10px;
  border-radius: 4px;
  border-left: 8px solid green;
  overflow: hidden;
  opacity: 0;
  pointer-events: none;
}
.alert.showAlert{
  opacity: 1;
  pointer-events: auto;
}
.alert.show{
  animation: show_slide 1s ease forwards;
}
@keyframes show_slide {
  0%{
    transform: translateX(100%);
  }
  40%{
    transform: translateX(-10%);
  }
  80%{
    transform: translateX(0%);
  }
  100%{
    transform: translateX(-10px);
  }
}
.alert.hide{
  animation: hide_slide 1s ease forwards;
}
@keyframes hide_slide {
  0%{
    transform: translateX(-10px);
  }
  40%{
    transform: translateX(0%);
  }
  80%{
    transform: translateX(-10%);
  }
  100%{
    transform: translateX(100%);
  }
}
.alert .fa-check-circle{
  position: absolute;
  left: 20px;
  top: 50%;
  transform: translateY(-50%);
  color: green;
  font-size: 30px;
}
.alert .msg{
  padding: 0 20px;
  font-size: 18px;
  color: black;
}
.alert .close-btn{
  position: absolute;
  right: 0px;
  top: 50%;
  transform: translateY(-50%);
  background: #43d955;
  padding: 20px 18px;
  cursor: pointer;
}
.alert .close-btn:hover{
  background: #0bb820;
}
.alert .close-btn .fas{
  color: green;
  font-size: 22px;
  line-height: 40px;
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

<a href="index.php?r=administrator/IPCRmarkform<?php echo'&fcode='.$fcode.'&m='.$m.'&y='.$y.'&mark=Pending';?>">
            <button class="Pending" style="float: right; margin-left: 10px; margin-right: -15%; background-color: blue;">Mark as Pending</button>
        </a>
<a class="Approved" href="index.php?r=administrator/IPCRmarkform<?php echo'&fcode='.$fcode.'&m='.$m.'&y='.$y.'&mark=Approved';?>">
            <button style="float: right; margin-right: -20px; background-color: green;">Mark as Approved</button>
        </a>


<!-- Alert for Pending and Approve -->
<div class="alert hide">
         <span class="fas fa-check-circle"></span>
         <span class="msg">Success! You Approved the IPCR!</span>
         <div class="close-btn">
            <span class="fas fa-times"></span>
         </div>
</div>
<!-- window.location.href = targetLink; -->
    <script>
         $('.Approved').click(function(e){
            e.preventDefault();
            var targetLink = $(this).attr('href');
            $('.alert').addClass("show");
            $('.alert').removeClass("hide");
            $('.alert').addClass("showAlert");
                setTimeout(function(){
                    $('.alert').removeClass("show");
                    $('.alert').addClass("hide");
                    window.location.href = targetLink;
                },2000 );
        });
        $('.close-btn').click(function(){
            $('.alert').removeClass("show");
            $('.alert').addClass("hide");
        });
    </script>
<!-- end of alert -->
<!-- end of alert -->
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

                                <a value="Disapprove" data-toggle="modal" data-target="#exampleModalCenter<?php echo $id?>"><p style=" color: red;"><?= $rows['adminApproval']; ?></p></a>
                                
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
                                    $idaccomp = $row['idaccomp'];
                                    $query = "SELECT * FROM tbl_ipcraccomp WHERE idaccomp = '$idaccomp'";
                                    $query_result = mysqli_query($conn,$query);
                                ?>
                                <?php while($row = mysqli_fetch_array($query_result)): ?>
                                    <?php $feed = $row['adminFeedback']; ?>
                                    <?php $id = $row['idaccomp'];?> 

                                <a value="Disapprove" data-toggle="modal" data-target="#exampleModalCenter<?php echo $id?>"><p style=" color: red;"><?= $row['adminApproval']; ?></p></a>
                                
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
                                    $idaccomp = $row['idaccomp'];
                                    $query = "SELECT * FROM tbl_ipcraccomp WHERE idaccomp = '$idaccomp'";
                                    $query_result = mysqli_query($conn,$query);
                                ?>
                                <?php while($row = mysqli_fetch_array($query_result)): ?>
                                    <?php $feed = $row['adminFeedback']; ?>
                                    <?php $id = $row['idaccomp'];?> 

                                <a value="Disapprove" data-toggle="modal" data-target="#exampleModalCenter<?php echo $id?>"><p style=" color: red;"><?php echo $approval; ?></p></a>
                                
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
            <script src="js/preventresize.js"></script>


            <!-- Sweet Alert -->
            <!-- For Approve -->
            <?php if(isset($_GET['a'])) : ?>
                <div class="flash-data" data-flashdata="<?= $_GET['a']; ?>"></div>
            <?php endif; ?>

            <!-- For Disapprove -->
            <?php if(isset($_GET['b'])) : ?>
                <div class="flash-data-disapprove" data-flashdata1="<?= $_GET['b']; ?>"></div>
            <?php endif; ?>

            <?php if(isset($_GET['c'])) : ?>
                <div class="flash-data-markApproved" data-flashdata2="<?= $_GET['c']; ?>"></div>
            <?php endif; ?>

            <?php if(isset($_GET['d'])) : ?>
                <div class="flash-data-markPending" data-flashdata3="<?= $_GET['d']; ?>"></div>
            <?php endif; ?>

            <script>
            // Sweet Alert For Approve
            const flashdata = $('.flash-data').data('flashdata')
                    if (flashdata) {
                        Swal.fire(
                            'Approved!',
                            '',
                            'success'
                        )
                    }

            //Sweet alert for Disapprove
            const flashdata1 = $('.flash-data-disapprove').data('flashdata1')
                    if (flashdata1) {
                        Swal.fire(
                            'Disapproved!',
                            '',
                            'error'
                        )
                    }

            //Sweet alert for Disapprove
            const flashdata2 = $('.flash-data-markApproved').data('flashdata2')
                    if (flashdata2) {
                        Swal.fire({
                          position: 'center',
                          icon: 'success',
                          title: 'IPCR marked Approved.',
                          showConfirmButton: false,
                          timer: 2000
                        })
                    }

            const flashdata3 = $('.flash-data-markPending').data('flashdata3')
                    if (flashdata3) {
                        Swal.fire({
                          position: 'center',
                          icon: 'info',
                          title: 'IPCR marked Pending.',
                          showConfirmButton: false,
                          timer: 2000
                        })
                    }


            </script>    
            <!--  -->

</section>
</section>

<footer id=page-footer>
<div class=container-aligner>
<!-- Footer left -->
<section id=footer-left>
© Copyright 2021 <a href="https://sites.google.com/view/puptfsis/fsis-team-2/fsis2-team-members?authuser=0" title="Dbooom Themes">Apex Dev Team | PUP Taguig</a> - All Rights Reserved.
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
