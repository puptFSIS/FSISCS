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

<title>Faculty | Home</title>

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

</style>


<link href='styles/print.css' media=print rel=stylesheet />
<!-- Modernizr library -->
<script src='scripts/libs/modernizr/modernizr.min.js'></script>
<meta charset="UTF-8"><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body class='page-media page-sidebar-right'>
<!-- JS notice - will be displayed if javascript is disabled -->
<p id=jsnotice>Javascript is currently disabled. This site requires Javascript to function correctly. Please <a href="http://enable-javascript.com/">enable Javascript in your browser</a>!</p>

<!-- End - JS notice -->

<!-- Page header -->

<div id="GradientDiv" class="cssWLGradientCommon cssWLGradientIMG"></div>



<!-- End - Page header -->



<!-- Page subheader -->



<!-- End - Page subheader -->

<!-- Page body -->

<section class=container-block id=page-body>

<div class=container-inner>

<!-- Page title -->

<?php include("nav.php");?>

<!-- End - Page title -->

<!-- Page body content -->

<section id=page-body-content>

<div id=page-body-content-inner>

<!-- Page content -->

<div id=page-content>

<!-- Video - HTML5 -->

<section>



<h2 class=underlined-header>Getting Started with Your Account</h2>

<iframe width="600" height="315" src="//www.youtube.com/embed/__4sh3taajk?list=PL-E9-Z9XrAcTe-VQhI2O0fDyQRjhRM_OK" frameborder="0" allowfullscreen></iframe><h2 class=underlined-header></h2>

<h2 class=underlined-header></h2>

<br />

<div class=align-left>

<div class=element-holder>

<img alt='Image example' src='assets/NewPersonalInfo.jpg' width=220 />

<div class=caption>Personal Information</div>

</div>

</div>

<p><h4>Personal Information</h4>View your personal information such as Employee ID, Full Name, Citizenship, Government Card Nos, Residential and Permanent Address, and Contact Details. You can update your personal information by clicking the update button in the right sidebar or in the top of the personal information page.</p>

<hr />



<div class=align-right>

<div class=element-holder>

<img alt='Image example' src='assets/NewFamilyBackground.jpg' width=220 />

<div class=caption>Family Background</div>

</div>

</div>

<p><h4>Family Background</h4>View your mother's and father's basic information such as their full name and their siblings with its birthdate. You can update your family background by clicking the update button in the right sidebar or the update button in family background page. You can add your sibling by clicking the "Add Chil/Children".</p>

<hr />



<div class=align-left>

<div class=element-holder>

<img alt='Image example' src='assets/NewEducBackground.jpg' width=220 />

<div class=caption>Educational Background</div>

</div>

</div>

<p><h4>Educational Background</h4>View and update your educational background from elementary to college to masteral and doctorate. You can add one (1) school for elementary and high school level, and you can add all of the schools that you had been graduated in vocation, college, masteral and doctorate level. </p>

<hr />



<div class=align-right>

<div class=element-holder>

<img alt='Image example' src='assets/NewWorkExp.jpg' width=220 />

<div class=caption>Work Experience</div>

</div>

</div>

<p><h4>Work Experience</h4>You can view and update your work experience by clicking the "Work Experience" in the right sidebar. You are required to input the name of the company, your position, inclusive date/year, salary, salary grade  and step increment, status and will ask you if it is a government service.</p>

<hr />



<div class=align-left>

<div class=element-holder>

<img alt='Image example' src='assets/NewSettings.jpg' width=220 />

<div class=caption>Account Settings</div>

</div>

</div>

<p><h4>Account Settings</h4>In this setion, you can change your username, the default username is your employee ID. You can also change your password and security question. To start changing your account settings and information, click "Account Settings" in the right sidebar.</p>

<hr />



</section>

<!-- End - Video -HTML5 -->

<br/>



<!-- End - Showcase gallery -->

</div>

<!-- End - Page content -->

<!-- Page sidebar -->

<aside class=page-sidebar>

<section class='widget-container widget-categories'>

<h2 class=widget-heading>Profile</h2>

<div class=widget-content> 

  <ul class='widget-list categories-list'>

    <?php include("profileMenu.php");?>

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

Copyright 2013 DFRAG Systems Solutions | PUP Taguig - All Rights Reserved.</section>

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

