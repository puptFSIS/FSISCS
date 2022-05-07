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
<!-- Page icon -->
<link href='puplogo.ico' rel='shortcut icon'/>
<!-- Stylesheets -->
<style media=screen type='text/css'>@import "styles/base.css";
.cssLT #ut, .cssUT #ut{filter:progid:DXImageTransform.Microsoft.DropShadow(enabled=false);}
.cssWLGradientIMG{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMGSSL{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMG
{BACKGROUND-IMAGE: url(images/hd_tm1.png);BACKGROUND-REPEAT:round;top:0;height:105px;}
    
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

.underlined
{
    background-color: lightgray;
    font-size: 18px;
    padding: 5px;
    text-align: left;
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
 
#button-clear
{   
    width: 50%;
    float: right;
    margin-top: -48.5px;
}

#button-set
{
    width: 50%;
    /*float: left;*/
    margin: 0 auto;
}

#divdate
{
    display:flex; 
    flex-direction: row;
    justify-content: center; 
    align-items: center
}

#date
{
    outline: 50px; 
    height: 50px; 
    margin-right: 20px;
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

<!-- End - Page header -->

<!-- Page subheader -->

<!-- End - Page subheader -->
<!-- Page body -->

<!-- Page title -->
<header id=page-title>
<!-- Title and summary -->
<!-- End - Title and summary -->
<!-- Title right side -->
<section id="menu_strip">
<a data-category=all href='index.php?r=administrator'>Home</a>
<a data-category=design href="index.php?r=administrator/profile">Profile</a>
<a data-category=design href="index.php?r=administrator/faculty">Faculty</a>
<a data-category=design href="index.php?r=administrator/reports">Reports</a>
<a data-category=design href="index.php?r=administrator/forms">Forms</a>
<a data-category=design href="index.php?r=administrator/ServiceCreditMenu">Service Credit</a>
<a data-category=design href="index.php?r=administrator/SchedulingSystem">Scheduling</a>
<a data-category=design href="index.php?r=administrator/SubjPrefer">Subject Preferences</a>
<a data-category=design href="index.php?r=administrator/other">Other</a>
<a data-category=design href="index.php?r=administrator/logout">Log out</a>
</section>
<!-- End - Title right side -->
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
    if(isset($_GET['m'],$_GET['y']))
    {
        $m = $_GET['m'];
        $y = $_GET['y'];
    }
?> 
<h2 class=underlined-header>Individual Performance Commitment and Review</h2>
<br>
<br>
<h2 class="underlined">Set IPCR Deadline (Date & Time)</h2>
<br>
<?php 
    $sql = "SELECT * FROM tbl_ipcrvisible WHERE month = '$m' AND year = '$y'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $dline = $row['dline_date']; 
?>

    
    <form action="index.php?r=administrator/processSetdeadline<?php echo'&m='.$m.'&y='.$y.'';?>" method="post">
        <p style="font-size: 15px;"><strong>Note: If the date exceed on the deadline set, the IPCR will become unavailable to the faculty.</strong></p>
        <p><h5><strong>PREVIOUS DEADLINE: <u><?php echo $dline; ?></u></strong></h5></p>
        <div id="divdate">
            <input id="date" type="date" name="dlinedatetime" required>
        <!-- <input type="time" name="dlinetime" style="outline: 50px; height: 50px;" required> -->
        </div>
        <br>
        <br>
        
        <div id="button-set">
                <button type="submit" name="submit" style="width: 110px">Set Deadline</button>
        </div>
    </form>
        
    <form action="index.php?r=administrator/processCleardeadline<?php echo'&m='.$m.'&y='.$y.'';?>" method="post">
        <div id="button-clear">
                <!-- <button type="submit" name="submit" >Set Deadline</button> -->
            <button type="submit" name="submit" style="width: 110px">Clear Deadline</button>
        </div>
    </form>
            <!-- <a href="index.php?r=administrator/processSetdeadline2<?php echo'&m='.$m.'&y='.$y.'';?>"><button style="width: 110px;">Clear Deadline</button></a> -->
        
    
 
</section>
<!-- End - Video -HTML5 -->
<br/>

<!-- End - Showcase gallery -->
</div>
<!-- End - Page content -->
</div>
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