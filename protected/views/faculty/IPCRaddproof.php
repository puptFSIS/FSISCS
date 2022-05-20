<?php
session_start();
include("config.php");
if(isset($_SESSION['user'])) {
	
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
<title>IPCR | Add Proof</title>
<!-- Script for Modal -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
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
</style>

<link href='styles/print.css' media=print rel=stylesheet />
<!-- Modernizr library -->
<script src='scripts/libs/modernizr/modernizr.min.js'></script>

<meta charset="UTF-8"></head>
<body class='page-media page-sidebar-right' style="background-color: Black;">
<!-- JS notice - will be displayed if javascript is disabled -->
<p id=jsnotice>Javascript is currently disabled. This site requires Javascript to function correctly. Please <a href="http://enable-javascript.com/">enable Javascript in your browser</a>!</p>
<!-- End - JS notice -->
<!-- Page header -->
<div id="GradientDiv" class="cssWLGradientCommon cssWLGradientIMG"></div>


<header id=page-title>
<section id=menu_strip>
<a data-category=all href='http://www.puptaguig.org'>Home</a>
<a data-category=design href="index.php?r=faculty/">Profile</a>
<a data-category=design href="index.php?r=faculty/ServiceCredit">Service Credit</a>
<a data-category=design href="index.php?r=faculty/TeachingLoad">Schedule</a>
<a data-category=design href="index.php?r=faculty/SubjPrefer">Subject Preferences</a>
<a data-category=design href="index.php?r=faculty/logout">Log out</a>
</section>
    </header>
<!-- End - Page title -->
<!-- Page body content -->
<section id=page-body-content>
<div id=page-body-content-inner>
<!-- Page content -->
<div id=page-content>
<!-- Video - HTML5 -->
<section>

 
<h2 class=underlined-header><strong><center>INDIVIDUAL PERFORMANCE, COMMITMENT AND REVIEW</center></strong></h2>

<?php
    $y = $_GET['y'];
    $m = $_GET['m'];
    $id = $_GET['id'];
    $fcode = $_GET['fcode'];
    $accomp = $_GET['accomp'];
    $sql= "SELECT tbl_ipcr1.*,tbl_ipcraccomp.* FROM tbl_ipcr1 LEFT JOIN tbl_ipcraccomp ON tbl_ipcraccomp.id_ipcr1 = tbl_ipcr1.id WHERE tbl_ipcr1.id='$id' AND tbl_ipcraccomp.FCode='$fcode'";
    $result= mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result))
    {
        $id = $row['id'];
        $accomp=$row['accomplishment'];
    } 

     //include('getPersonalInformation.php');
 ?>
<?php if($m == "JJ"): ?>
    <a href="index.php?r=faculty/IPCRcreatejantojunefaculty<?php echo'&m='.$m.'&y='.$y.'&fcode='.$fcode.''?>"><button>&laquo; Previous</button></a>
<?php elseif($m =="JD") : ?>
    <a href="index.php?r=faculty/IPCRcreatejultodecfaculty<?php echo'&m='.$m.'&y='.$y.'&fcode='.$fcode.''?>"><button>&laquo; Previous</button></a>
<?php endif; ?>
<br>
<br>
<hr style="margin-top: 0px; margin-bottom: 5px;" >
<p style="font-size: 15px;"><strong>ADD PROOF(S) FOR ACCOMPLISHMENT</strong></p>

<textarea style="display: none; border: none; background-color: transparent; resize: none; outline: none;" type="hidden" name="id" ><?php echo $id;?></textarea>
<textarea style="display: none; border: none; background-color: transparent; resize: none; outline: none;" type="hidden" name="EmpID" ><?php echo $fcode;?></textarea>


<h4 class="underlined-header" id="shadow">
    <strong>ACTUAL ACCOMPLISHMENT:</strong>
    <textarea readonly name="accomplishment" type=text style="width: 400px; height: 150px; margin-top: -28px; margin-left: 33%;"><?php echo $accomp; ?>
    </textarea>
</h4>

<script src="ckeditor4/ckeditor.js"></script>
<script>
    CKEDITOR.replace('accomplishment');
</script>
<br> 
<?php //Notification
if (isset($_GET['msg'])) {
$msg = $_GET['msg'];
    if($_GET['msgType']=="succ") {
        echo '<div class="box-info">
              <div class="box-content">
              <p>' . $msg . '</p>
              </div>
              </div>';
    }
    else  {
        echo '<div class="box-error">
              <div class="box-content">
              <p>' . $msg . '</p>
              </div>
              </div>';
    }
}
?>
<br>


<form action='index.php?r=faculty/processProofupload<?php echo'&accomp='.$accomp.'&id='.$id.'&fcode='.$fcode.'&y='.$y.'&m='.$m.''?>' method="post" enctype="multipart/form-data">

    <h4 class="underlined-header"><strong>UPLOAD PROOF:</strong>
    <span><input type="file" name="file">
    <input type="submit" name="submit" value="Upload"></span></h4>
</form>
<table id="myTable">
    <thead>
        <tr>              
            <th width="33%"><h5 align="Center">Proof Name</th></h5>
            <th width="33%"><h5 align="center">Detail/s</th></h5>
            <th width="33%"><h5 align="center">Action</th></h5> 
        </tr>
    </thead>

 <!-- Get images from the database -->
<?php
$query = "SELECT * FROM tbl_proof WHERE id_ipcraccomp = '$id' AND deleted_on IS NULL ORDER BY uploaded_on DESC";
$result = mysqli_query($conn,$query);
?>
<?php if($result->num_rows > 0): ?>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
        <?php $imageURL = $row["file_name"]; ?>
        <?php $upload_date = $row["uploaded_on"]; ?>
        <?php $proofid = $row['id']; ?>
        <tr>
            <div>
                <td>
                    <div>
                        <center><p><?php echo $imageURL; ?></p></center>
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
                    
                    <center>
                        <button data-toggle="modal" data-target="#ModalCenterimage<?php echo $proofid; ?>">Preview</button>  
                        <a onclick='return confirm(\"Are you sure you want to delete?\")' href="index.php?r=faculty/processDeleteproof<?php echo'&accomp='.$accomp.'&id='.$proofid.'&fcode='.$fcode.''?>"><button>Delete</button></a>
                    </center>

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
            <td colspan=3><p>No proof(s) uploaded yet...</p></td>
        </tr>
    </tfoot>
<?php endif; ?>
</table>

</section>
        <script src="js/preventresize.js"></script>
<br/>

<!-- End - Showcase gallery -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->
<aside class=page-sidebar>
<section class='widget-container widget-categories'>
<h2 class=widget-heading>IPCR</h2>
<div class=widget-content>
<ul class='widget-list categories-list'>
<?php include("IPCRmenufaculty.php");?>
</ul>
</div>
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