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
<title>Faculty | Report</title>
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

select {
  margin: 50px;
  width: 300px;
  padding: 5px 35px 5px 5px;
  font-size: 16px;
  border: 1px solid #CCC;
  height: 34px;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  
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

<!-- Header Menu -->
<?php include("headerMenu.php");?>
<!-- End - Page title -->
<!-- Page body content -->
<section id=page-body-content>
<div id=page-body-content-inner>
<!-- Page content -->
<div id=page-content>
<!-- Video - HTML5 -->
<section>
 
<h2 class=underlined-header><center>Individual Performance Commitment and Review</center></h2>
<br>
<?php 
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
<h2 class="underlined"><strong>Generate your Report</strong> <small>(Choose Month and Year)</small></h2>
<!---->
<?php  
    
    
    // if submit button is pressed
    
         
?> 
<form action="index.php?r=faculty/IPCRreportprocess" method="post">
<?php
    include('getPersonalInformation.php');
    $fcode = $EmpID;
 
    echo '<textarea style="display: none; border: none; background-color: transparent; resize: none; outline: none;" type="hidden" name="fcode">' .$fcode. '</textarea>';
?>
    <div style="display:flex; flex-direction: row; justify-content: center; align-items: center">
        <select name="Month" style="outline: 50px; height: 50px; margin-right: 20px;" required>
            <option value="" disabled selected>----Choose Month----</option>
            <option value="JJ">January - June</option>
            <option value="JD">July - December</option>
        </select>
        
        <select name="Year" id="ddlYears" style="outline: 50px; height: 50px;" required>
            <option value="" disabled selected>----Choose Year----</option>
        </select>
    </div>
    <center><button type="submit" name="submit" style="width: 100px;">Generate</button>
</form>
</section>
            
        <?php if(isset($_GET['mess'])) : ?> 
            <?php if($_GET['mess'] == 1) : ?> 
                <div class="flash-data" data-flashdata="<?= $_GET['mess']; ?>"></div>
            <?php endif; ?>

            <?php if($_GET['mess'] == 2) : ?>
                <div class="flash-data" data-flashdata="<?= $_GET['mess']; ?>"></div>
            <?php endif; ?>

            <?php if($_GET['mess'] == 3) : ?>
                <div class="flash-data" data-flashdata="<?= $_GET['mess']; ?>"></div>
            <?php endif; ?>
        <?php endif; ?>

            <script>
                window.onload = function () 
                {
                    //Reference the DropDownList.
                    var ddlYears = document.getElementById("ddlYears");
 
                    //Determine the Current Year.
                    var currentYear = (new Date()).getFullYear();
 
                    //Loop and add the Year values to DropDownList.
                    for (var i = currentYear; i >= 2019; i--) {
                        var option = document.createElement("OPTION");
                        option.innerHTML = i;
                        option.value = i;
                        ddlYears.appendChild(option);
                    }
                };

            </script>
            <script>
                flashdata = $('.flash-data').data('flashdata')
                    if (flashdata == 1) {
                        Swal.fire(
                            'IPCR not Approved',
                            'Press OK to continue',
                            'warning'
                        )
                    }  

                    if (flashdata == 2) {
                        Swal.fire(
                            'IPCR not available to Generate',
                            "You can't download a copy at the moment",
                            'warning'
                        )
                    }

                    if (flashdata == 3) {
                        Swal.fire(
                            'No IPCR existing',
                            'Press OK to Continue',
                            'warning'
                        )
                    }

                    

                // const flashdatanotsub = $('.flash-data-notsub').data('flashdatanotsub')
                //     if (flashdatanotsub) {
                //         Swal.fire(
                //             'IPCR not submitted',
                //             "You can't download a copy at the moment",
                //             'warning'
                //         )
                //     }  

                
                    

                // const flashdatamake = $('.flash-data-make').data('flashdatamake')
                //     if (flashdatamake) {
                //         Swal.fire(
                //             'Please make your IPCR first',
                //             "You can't downlaod a copy at the moment",
                //             'warning'
                //         )
                //     }  

                // const flashdatamessage = $('.flash-data-message').data('flashdatamessage')
                //     if (flashdatamessage) {
                //         Swal.fire(
                //             'Some of IPCR content are not Reviewed',
                //             "You can't downlaod a copy at the moment",
                //             'warning'
                //         )
                //     }


               
            </script>
<!-- End - Video -HTML5 -->
<br/>

<!-- End - Showcase gallery -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->
<aside class=page-sidebar>
<!--<section class='widget-container widget-categories'>-->
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

