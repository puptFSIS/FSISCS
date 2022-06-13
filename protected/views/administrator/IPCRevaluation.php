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
<title>IPCR | Evaluation</title>

<!--Script of Sweet alert-->
<script src='<?php echo Yii::app()->getBaseUrl() ?>assets/jquery-3.6.0.min.js'></script>
<script src='<?php echo Yii::app()->getBaseUrl() ?>assets/sweetalert2.all.min.js'></script>

<!-- Script for Modal -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>


<!-- Page icon -->
<link href='puplogo.ico' rel='shortcut icon'/>

<!-- For Container -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">



<!-- Stylesheets -->
<style media="screen" type='text/css'> @import "styles/base.css";
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
/* style on Proof */
.upload
{
    text-align: center; 
}
.img img
{
    width: 300px;
    height: 300px;
    overflow: hidden;
    margin: 0 auto;  
}
.img 
{
    display: flex;
    align-items: center;
 
}
.img-holder
{
    width: 100%;
    max-height:250px;
    transition: 0.5s all ease-in-out;
    margin-bottom: 20px;
}
.img-info
{
    text-align: center;
}

.img-holder:hover
{
    transform: scale(1.8);
}
img
{
    width:  450px;
    height: 300px; 
}
input
{
    display: inline;
}
#shadow 
{
    box-shadow: -31px 25px 9px -8px rgba(0,0,0,0.1);
}

.inp {
    width: 300px;
    font-size: 18px;
}

#error1, #error2, #error3, #error4 {
    position: absolute;
}

#1{
    background-color: blue;
}

footer {
    position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: black;
   color: white;
   text-align: center;
}
</style>

<link href='styles/print.css' media=print rel=stylesheet />

<!-- Modernizr library -->
<script src='scripts/libs/modernizr/modernizr.min.js'></script>

<meta charset="UTF-8"></head>
<body class='page-media page-sidebar-right' style="background-color:blue">
<!-- JS notice - will be displayed if javascript is disabled -->
<p id=jsnotice>Javascript is currently disabled. This site requires Javascript to function correctly. Please <a href="http://enable-javascript.com/">enable Javascript in your browser</a>!</p>
<!-- End - JS notice -->
<!-- Page header -->
<div id="GradientDiv" class="cssWLGradientCommon cssWLGradientIMG"></div>


<?php include("headerMenu.php");?>
<br>
<br>
<!-- End - Page title -->
<!-- Page body content -->
<!-- <section id=page-body-content> -->
<div id=page-body-content-inner>
<!-- Page content -->
<div id=page-content>
<!-- Video - HTML5 -->
<section>


<h2 class="underlined-header">
    <strong><center>INDIVIDUAL PERFORMANCE, COMMITMENT AND REVIEW</strong></center>
</h2>

<?php
    
    $m=$_GET['m'];
    $y=$_GET['y'];
    $id=$_GET['id'];
    $idaccomp=$_GET['idaccomp'];
    $fcode = $_GET['fcode'];
    $accomp = $_GET['accomp'];
    $sql= "SELECT tbl_ipcr1.*,tbl_ipcraccomp.* FROM tbl_ipcr1 LEFT JOIN tbl_ipcraccomp ON tbl_ipcraccomp.id_ipcr1 = tbl_ipcr1.id WHERE tbl_ipcr1.id='$id' AND tbl_ipcraccomp.FCode='$fcode'";
    $result= mysqli_query($conn,$sql);
     while($row = mysqli_fetch_array($result))
    {

        $id = $row['id'];
        $accomp = $row['accomplishment'];  
    }

 ?>
<a href="index.php?r=administrator/IPCRview<?php echo'&m='.$m.'&y='.$y.'&fcode='.$fcode.''?>"><button>&laquo; Previous</button></a>
<br>
<br>
<hr style="margin-top: 0px; margin-bottom: 5px;" >
<p style="font-size: 15px;"><strong>VIEW ACCOMPLISHMENT AND PROOF(S)</strong></p>

<!-- Hidden Containers to store id and fcode which will be use -->
<input type="hidden" name="id" value="<?php echo $id;?>"> 
<input type="hidden" name="EmpID" value="<?php echo $fcode; ?>">

<h4 class="underlined-header" id="shadow">
    <strong>ACTUAL ACCOMPLISHMENT/S</strong>
    <textarea readonly name="accomplishment" type=text style="width: 400px; height: 150px; margin-top: -28px; margin-left: 33%;"><?php echo $accomp; ?></textarea>
</h4>
<br>

<h4 class="underlined-header"><strong>UPLOADED PROOF(S)</strong></h4>
<table id="myTable">
    <thead>
        <tr>              
            <th width="33%"><h5 align="Center">Proof Name</th></h5>
            <th width="33%"><h5 align="center">Detail/s</th></h5>
            <th width="33%"><h5 align="center">Action</th></h5> 
        </tr>
    </thead>

<?php //Getting the Uploaded Proofs from Database 
// Get images from the database
$query = "SELECT * FROM tbl_proof WHERE id_ipcraccomp = '$id' AND deleted_on IS NULL ORDER BY uploaded_on DESC";
$result = mysqli_query($conn,$query);
?>
    <?php if($result->num_rows > 0): ?>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <?php $imageURL = $row['file_name']; ?>
            <?php $upload_date = $row["uploaded_on"]; ?>
            <?php $proofid = $row['id']; ?>
            <tr>
            <div>
                <td>
                    <div>
                        <center><p><?php echo $imageURL;?></p></center>
                    </div>
                </td>
                <td>
                    <div>
                        <center>
                            <strong><p class="upload"><?php echo 'Uploaded on: '.$upload_date;?></p></strong>
                        </center>
                    </div>
                </td>
                <td>
                    
                    <center><button data-toggle="modal" data-target="#ModalCenterimage<?php echo $proofid; ?>" style="width:90px">Preview</button></center>
                    <!-- Modal for Proof Preview -->
                    <div class="modal fade" id="ModalCenterimage<?php echo $proofid; ?>">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"><strong><?php echo $imageURL;?></strong></h5>
                          </div>
                          <div class="modal-body">
                            <div class="img-holder">
                                <center><img src="<?php echo 'IPCRuploads/'.$imageURL;?>"></center>
                            </div>
                          </div>
                          <br>
                          <br>
                          <div class="modal-footer">
                            <button id="btn-modal" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End of Modal -->
                </td>
            </div>
        </tr>
        <?php endwhile; ?>
    <?php else: ?> 
        <tfoot>
            <tr>
                <td colspan=3><p>No proof(s) uploaded by Faculty...</p></td>
            </tr>
        </tfoot>
    <?php endif; ?>
</table>

</section>
<!-- End - Showcase gallery -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->
<aside class="page-sidebar">
<section class='widget-container widget-categories'>
<div class='widget-content'>
<ul class='widget-list categories-list'>
<h4 class="underlined-header"><strong><center>IPCR CONTENT EVALUATION</center></strong></h4>

<div class="w3-code notranslate cssHigh">
    <h4><strong><center>RATING</center></strong></h4>
    <p>Rate the content of IPCR</p>
    <button data-toggle="modal" data-target="#ModalCenterRating" style="width: 100px; margin-left: 80px;">Add Rating</button>
</div>
    
    <!-- Modal for Rating -->
        <div class="modal fade" id="ModalCenterRating">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="index.php?r=administrator/processRating" method="post">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="hidden" name="m" value="<?php echo $m; ?>">
                <input type="hidden" name="y" value="<?php echo $y; ?>">
                <input type="hidden" name="accomp" value="<?php echo $accomp; ?>">
                <input type="hidden" name="fcode" value="<?php echo $fcode; ?>">
                <input type="hidden" name="idaccomp" value="<?php echo $idaccomp; ?>">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><strong>ADD RATINGS</strong></h5>
              </div>
              <div class="modal-body">
                <p style="font-size: 15px;"><strong>Note: 1 - lowest & 5 - Highest</strong></p>
                <hr style="margin-top: 15px;">
                <div class="col-md-0"></div>
                    <div class="col-md-12 well">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Quality (Q1)</label>
                                <input class="inp" type="text" name="quality" min="1" max="5" id="Quality"  onmousewheel="return false" onkeyup="getAverage();" class="form-control" maxlength="1">
                                <div id="error1" style="color:red;" onkeyup="getAverage();"><small></small></div>
                                <br>
                            </div>
                            <div class="form-group">
                                <label>Efficiency (E2)</label>
                                <input class="inp" type="text" name="efficiency" min="1" max="5" id="Efficiency" onmousewheel="return false" onkeyup="getAverage();" class="form-control" maxlength="1" />
                                <div id="error2" style="color:red;" onkeyup="getAverage();"><small></small></div>
                                <br>
                            </div>
                            <div class="form-group">
                                <label>Timeliness (T3)</label>
                                <input class="inp" type="text" name="timeliness" min="1" max="5" id="Timeliness" onmousewheel="return false" onkeyup="getAverage();" class="form-control" maxlength="1"/>
                                <div id="error3" style="color:red;" onkeyup="getAverage();"><small></small></div>
                                <br>
                            </div>
                            <div class="form-group">
                                <label>Average (A4)</label>
                                <input class="inp" type="text" name="average" class="form-control" id="Average" readonly="readonly"/>
                                <div id="error4" style="color:red;"><small></small></div>
                                <br>
                            </div>
                        </div>
                    </div>
              </div>
              <div class="modal-footer">
                <button id="btn-modal" data-dismiss="modal">Close</button>
                <button id="btn-modal" name="submit" type="submit">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>

<div class="w3-code notranslate cssHigh">
 
    <h4><strong><center>REMARKS</center></strong></h4>
    <p>Add Remarks to the content of IPCR</p>
    <button data-toggle="modal" data-target="#ModalCenter" style="width: 100px; margin-left: 80px;">Add Remarks</button>
</div>
        <!-- Modal for remarks -->
        <div class="modal fade" id="ModalCenter">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <form action="index.php?r=administrator/processAddRemarks" method="post">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="hidden" name="m" value="<?php echo $m; ?>">
                <input type="hidden" name="y" value="<?php echo $y; ?>">
                <input type="hidden" name="accomp" value="<?php echo $accomp; ?>">
                <input type="hidden" name="fcode" value="<?php echo $fcode; ?>">
                <input type="hidden" name="idaccomp" value="<?php echo $idaccomp; ?>">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><strong>ADD REMARKS</strong></h5>
              </div>
              <div class="modal-body">
                <textarea name="remarks"><?php //echo $remarks; ?></textarea>
              </div>
              <div class="modal-footer">
                <button id="btn-modal" data-dismiss="modal">Close</button>
                <button  id="btn-modal" name="submit" type="submit">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>

<?php 
    include('IPCRapproval.php');
?>
        <?php if(isset($_GET['mess'])) : ?>

            <?php if($_GET['mess'] == 1) : ?>
                <div class="flash-data" data-flashdata="<?= $_GET['mess']; ?>"></div>
            <?php endif; ?>

            <?php if($_GET['mess'] == 2) : ?>
                <div class="flash-data" data-flashdata="<?= $_GET['mess']; ?>"></div>
            <?php endif; ?>

        <?php endif; ?>

        <script src="js/ratingcomputation.js"></script>
        <!-- <script src="js/preventresize.js"></script> -->
        <script src="ckeditor4/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('remarks');
            CKEDITOR.replace('accomplishment');
            CKEDITOR.replace('feedback');
        </script>
        <script>
            flashdata = $('.flash-data').data('flashdata')
                    if (flashdata == 1) {
                        Swal.fire(
                            'One of the fields is Not a number',
                            'Please revise',
                            'warning'
                        )
                    } 

                    if (flashdata == 2) {
                        Swal.fire(
                            'Succesfully Added Rating',
                            'Press ok to continue',
                            'success'
                        )
                    } 

                    if (flashdata == 3) {
                        Swal.fire(
                            'Fields are empty',
                            'saving unsuccessfully',
                            'info'
                        )
                    } 
        </script>

</ul>



<!--  -->
</div>
</section>
</section>
</aside>
<!-- End - Page sidebar -->
</div>
</section>
<!-- End - Page body content -->
</div>
</section>
<!-- End - Page body -->

<!-- Page footer -->
<footer id=page-footer>
<div class=container-aligner>
<!-- Footer left -->
<section id=footer-left>
© Copyright 2021 <a href="https://sites.google.com/view/puptfsis/ipcr/fsis2-team-members?authuser=0" title="Dbooom Themes">Team Apex | PUP Taguig</a> - All Rights Reserved.
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
<script id=js-dispatcher src='scripts/scripts.js'></script>
</body>
</html>