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
<title>IPCR | Add Accomplishment</title>

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
}
#save
{
    width: 100px;
}

#head 
{
    font-size: 20px;
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
if(isset($_GET['m'],$_GET['y']))
    {
        $fcode = $_GET['fcode'];
        $m = $_GET['m'];
        $y = $_GET['y'];  
    }
?>
<h2 class=underlined-header><strong><center>INDIVIDUAL PERFORMANCE, COMMITMENT AND REVIEW</center></strong></h2>

<?php
    if(isset($_GET['msg'])) {
    $msg = $_GET['msg'];
        if($_GET['msgType']=="succ") {
            echo '
            <div class="box-info">
              <div class="box-content">
                <p>' . $msg . '</p>
              </div>
            </div>
            <hr style="margin-top:13px;"/>
            ';
        } else {
            echo '
            <div class="box-error">
              <div class="box-content">
                <p>' . $msg . '</p>
              </div>
            </div>
            <hr style="margin-top:13px;"/>
            ';
        }
    } 
?>
<?php
    $outputs = "";
    $indi = "";
    //$accomp="";
    if(isset($_GET['output'],$_GET['indicators']))
    {
        $outputs = $_GET['output'];
        $indi = $_GET['indicators'];
        //$accomp = $_GET['accomplishment'];
    }  
    $id=$_GET['id'];
if($m == "JJ")
{
    
    $sql="SELECT * FROM tbl_ipcr1 WHERE id='$id'";
    $result= mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result))
    {
        $id = $row['id'];
        $outputs=$row['output'];
        $indi=$row['indicators'];
        $part = $row['part'];
        //$accomp=$row['accomplishment'];
    }   
 } else if($m == "JD")
 {
    $sql1="SELECT * FROM tbl_ipcr2 WHERE id='$id'";
    $result1= mysqli_query($conn,$sql1);
    while($row = mysqli_fetch_array($result1))
    {
        $id = $row['id'];
        $outputs=$row['output'];
        $indi=$row['indicators'];
        $part = $row['part'];
        //$accomp=$row['accomplishment'];
    }   
 }
 ?>
<p style="font-size: 17px;"><strong>Add Accomplishment Information</strong></p>
<hr style="margin-top: -10px;" />


<form action="index.php?r=faculty/processIPCRaddaccomp<?php echo'&m='.$m.'&y='.$y.'&part='.$part.''?>" method="post">
<textarea style="display: none; border: none; background-color: transparent; resize: none; outline: none;" type="hidden" name="id" ><?php echo $id;?></textarea>
<textarea style="display: none; border: none; background-color: transparent; resize: none; outline: none;" type="hidden" name="EmpID" ><?php echo $fcode;?></textarea>

<h4 class="underlined-header" id="head"><strong>OUTPUT:</strong><textarea readonly name="output" type=text><?php echo $outputs; ?></textarea></h4>
<br>
<h4 class="underlined-header" id="head"><strong>SUCCESS INDICATORS:</strong><textarea readonly name="indicators" type=text><?php echo $indi; ?></textarea></h4>
<br>
<h4 class="underlined-header" id="head"><strong>ACTUAL ACCOMPLISHMENT/S:</strong><textarea name="accomplishment" type=text></textarea></h4>
 
<script src="ckeditor4/ckeditor.js"></script>
<script>
    CKEDITOR.replace('output');
    CKEDITOR.replace('indicators');
    CKEDITOR.replace('accomplishment');
</script>

<center><button id="save" type="submit" name="submit">Save</button></center>
</form>


</section>

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
© Copyright 2021 <a href="https://sites.google.com/view/puptfsis/ipcr/fsis2-team-members?authuser=0" title="Dbooom Themes">Apex Dev Team | PUP Taguig</a> - All Rights Reserved.
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