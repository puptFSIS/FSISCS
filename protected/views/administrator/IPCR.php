<?php
session_start();
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
    color: black;
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


footer {
    position: relative;
}

#page-body
{
    background-color: antiquewhite;
}

.header1 {
        /*float: left;*/
        margin:-10px 6.5px 0px 0px;
    }
    .c {
        float: right;
        margin-top: -32px;
        margin-right: 20px;
    }

.glyphicon-bell {
    color: lightblue;
}
.dropdown-menu {
    position: absolute;
    margin-right: 20px;
    height: 480px;
    overflow: auto;
    width: 375px;
    border-radius: 5px;
    list-style-type: none;
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
#slideshow_header
{
    background-color: #722c2c;
    color: #f2d179;
    padding: 4px;
    text-align: center;
}
.dash:hover {
    text-decoration: none;
}
.title 
{
    margin-left: -25%;
    font-size: px;
    font-weight: bold;
}
</style>
<link href='styles/print.css' media=print rel=stylesheet />
<!-- Modernizr library -->
<script src='scripts/libs/modernizr/modernizr.min.js'></script>


<meta charset="UTF-8"></head>
<body class='page-media page-sidebar-right' style="background-color: ghostwhite;">
<!-- JS notice - will be displayed if javascript is disabled -->
<!--<p id=jsnotice>Javascript is currently disabled. This site requires Javascript to function correctly. Please <a href="http://enable-javascript.com/">enable Javascript in your browser</a>!</p>
 End - JS notice -->
<!-- Page header -->
<div id="GradientDiv" class="cssWLGradientCommon cssWLGradientIMG"></div>

<!-- Page title -->
<header id=page-title>



<section id='menu_strip'>
<a class="header1" data-category=all href='index.php?r=administrator'>Home</a>
<a class="header1" data-category=design href="index.php?r=administrator/profile">Profile</a>
<a class="header1" data-category=design href="index.php?r=administrator/faculty">Faculty</a>
<a class="header1" data-category=design href="index.php?r=administrator/SchedulingSystem">Scheduling</a>
<a class="header1" data-category=design href="index.php?r=administrator/IPCRmain">IPCR</a>
<a class="header1" data-category=design href="index.php?r=administrator/daily_time_record">DTR</a>
<a class="header1" data-category=design href="index.php?r=administrator/SubjPrefer">Subject Preferences</a>
<a class="header1" data-category=design href="index.php?r=administrator/TeachingAssignment">Teaching Assignment</a>
<a class="header1" data-category=design href="index.php?r=administrator/other">Other</a>
<a class="header1" data-category=design href="index.php?r=administrator/logout">Log out</a>

<!-- <a class="header1 c" data-category=design href="#">Notification</a> -->
<div>
<ul class="nav navbar-nav navbar-right"> 
      <li class="dropdown" >
        <a class="dropdown-toggle header1 c" data-toggle="dropdown" data-category=design ><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
       <ul class="dropdown-menu">
           <!-- <p><center>See All Notification</center></p> -->
           
       </ul>
      </li>
     </ul>
</div>
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

<?php 
    $m = $_GET['m'];
    $y = $_GET['y']; 
    if($m == "JJ") {
        echo '<h4 style="margin-left: -150px;"> January - June, '.$y.'</h4>';    
    } elseif($m == "JD") {
        echo '<h4 style="margin-left: -150px;"> July - December, '.$y.'</h4>';
    } 
?>
<?php include('getPersonalInformation.php'); ?>
<?php include('getRole.php'); ?>
<h2 style="margin-left: -150px;"><strong><?php echo $firstname." ".$surname." (".$role.")";?></strong></h2>
<hr style="background-color:black; width: 123%; margin-left: -150px; margin-top: 10px;">

    <div style="margin-bottom:45%;">
        <div>
            <div style="margin-left: -150px; width: 40%; float: left;">
                <div style="background-color: #820001; padding: 13px; height: 90px; border-radius:5px; ">
                    <div>
                        <?php 
                            $m = $_GET['m'];
                            $y = $_GET['y'];
                            $sql = "SELECT * FROM tbl_ipcrstatus WHERE month = '$m' AND year = '$y' AND status = 'Submitted'"; 
                            $res = mysqli_query($conn,$sql);
                            $count = mysqli_num_rows($res);
                        ?>
                        <p style="float: left; display: inline-block; color: whitesmoke; font-weight:bold; font-size: 3em; margin-right: 20px; margin-left: 15px;"><?php echo $count; ?></p>
                        <a href="#" class="db-text" style="font-size: 1.25em; color: whitesmoke;">FACULTY SUBMITTED IPCR</a>
                        <br/>
                        <!-- <small style=" color: whitesmoke;">Month of: </small> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="box-3">
            <div style="margin-left: 10px; width: 40%; float: left; display: inline-block;">
                <div style="background-color: green; padding: 13px; height: 90px; border-radius:5px; ">
                    <div>
                        <?php 
                            $m = $_GET['m'];
                            $y = $_GET['y'];
                            $sql = "SELECT * FROM tbl_ipcrstatus WHERE month = '$m' AND year = '$y' AND status = 'Approved'"; 
                            $res = mysqli_query($conn,$sql);
                            $count = mysqli_num_rows($res);
                        ?>
                        <p style="float: left; display: inline-block; color: whitesmoke; font-weight:bold; font-size: 3em; margin-right: 20px; margin-left: 15px;"><?php echo $count; ?></p>
                        <a href="#" class="db-text" style="font-size: 1.25em; color: whitesmoke;">FACULTY APPROVED IPCR </a>
                        <br/>
                        <!-- <small style="color: whitesmoke;">Month of: </small> -->
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div style="margin-left: 10px; width: 40%; float: left; display: inline-block;">
                <div style="background-color: blue; padding: 13px; height: 90px; border-radius:5px; ">
                    <div>
                        <?php 
                            $m = $_GET['m'];
                            $y = $_GET['y'];
                            $sql = "SELECT * FROM tbl_ipcrstatus WHERE month = '$m' AND year = '$y' AND status = 'Pending'"; 
                            $res = mysqli_query($conn,$sql);
                            $count = mysqli_num_rows($res);
                        ?>
                        <p style="float: left; display: inline-block; color: whitesmoke; font-weight:bold; font-size: 3em; margin-right: 20px; margin-left: 15px;"><?php echo $count; ?></p>
                        <a href="#" style=""><p class="db-text" style="font-size: 1.25em; color: whitesmoke; margin: 0 30px;">PENDING / ON REVIEW IPCR</p></a>
                        <!-- <small style="color: whitesmoke;">Month of: </small> -->
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div style="margin-left: -150px; width: 40%; float: left; display: inline-block; margin-top: 10px;">
                <div style="background-color: #d19c15; padding: 13px; height: 90px; border-radius:5px; ">
                    <div>
                        <?php 
                            $m = $_GET['m'];
                            $y = $_GET['y'];
                            $sql = "SELECT * FROM tbl_ipcrstatus WHERE month = '$m' AND year = '$y' AND status IS NULL"; 
                            $res = mysqli_query($conn,$sql);
                            $count = mysqli_num_rows($res);
                        ?>
                        <p style="float: left; display: inline-block; color: whitesmoke; font-weight:bold; font-size: 3em; margin-right: 20px; margin-left: 15px;"><?php echo $count; ?></p>
                        <a href="#" class="db-text" style="font-size: 1.25em; color: whitesmoke;">FACULTY UNSUBMITTED IPCR</a>
                        
                        <!-- <small style="color: whitesmoke;">Month of: </small> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<h2 class="title">HOW TO VIDEO</h2>
<hr style="background-color:black; width: 123%; margin-left: -150px; margin-top: 10px; margin-bottom: -15px;">
<!--
<h2 id="slideshow_header">Getting started with <b>Individual Performance Commitment and Review</b></h2>-->
<br/>
<br/>
<iframe style="margin-left: -150px; border-radius: 5px;" width="740" height="375" src="https://www.youtube.com/embed/GzgxEyQeTDk" frameborder="0" allowfullscreen></iframe>
</section> 
<!-- Scripts -->
 <!-- prevent Screen Resize -->
<script src="js/notification.js"></script> <!-- For notification -->

</div>
<!-- End - Page content -->
<!-- Page sidebar -->
<aside class=page-sidebar>
<!--<section class='widget-container widget-categories'>-->
<h2 class=widget-heading>IPCR</h2>
<div class=widget-content>
<ul class='widget-list categories-list'>
<?php include("IPCRmenu.php");?>
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
        <section id=footer-left>
            © Copyright 2021 <a href="https://sites.google.com/view/puptfsis/ipcr/fsis2-team-members?authuser=0" title="Dbooom Themes">Team Apex | PUP Taguig</a> - All Rights Reserved.
        </section>
    </div>
</footer>
</body>
</html>

