<?php

if(isset($_SESSION['user'])) {
	if($_SESSION['CEmpID']==null) {
		header("location: index.php?r=site/SetEmpID");
	} else {
		if($_SESSION['user']==1) {
		
		} else if($_SESSION['user']==0) {
		header("location:index.php?r=faculty/");
	}
	}
} else {
	header("location:index.php?r=site/login");
}
?>
<!DOCTYPE html>
<!--[if IE 7 ]> <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]> <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]> <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]> <!--> <html class=no-js lang=en> <!-- <![endif]-->
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<!--[if IE ]> <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> <![endif]-->
<meta content='width=device-width, initial-scale=1.0' name=viewport />
<meta content='FSIS' name=keywords />
<meta content='PUP Taguig FSIS' name=description />
<meta content='vCore Team' name=author />
<!-- Page title -->
<title>Administrator | Home</title>
<!-- Page icon -->
<link href='puplogo.ico' rel='shortcut icon'/>
<!-- Stylesheets -->
<style media=screen type='text/css'>@import "styles/base.css";
.cssLT #ut, .cssUT #ut{filter:progid:DXImageTransform.Microsoft.DropShadow(enabled=false);}
.cssWLGradientIMG{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMGSSL{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMG{BACKGROUND-IMAGE: url(images/hd_tm1.png);BACKGROUND-REPEAT:round;top:0;height:105px;}
   
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
    width: 900px;
}

@media only screen and (min-width:150px) and (max-width:600px)
{
 Title right 
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
    background-color: white;
}

.videowrapper 
{
	position: relative;
	padding-left: 100px;
	padding-bottom: 55%;
	padding-top: 25px;
	height: 0px;
}

.videowrapper iframe
{
	position: absolute;
	left: 0px;
	top: 0px;
	right: 0px;
	bottom: 0px;
	height: 100%;
	width: 100%;
}

.wrapper
{
	margin: 0 auto;
	width: 1000px;
}

.inner
{
	padding-top: 50px;
	padding-left: 10px;
}

.content
{
	text-align: center;
}
.gallerry-fading
{
	align-content: center;
}

table,tr, td {
  border:10px solid black;
  margin-right: 1px;
  padding-right: 10px;
}

</style>

<link href='styles/print.css' media=print rel=stylesheet />
<!-- Modernizr library -->
<script src='scripts/libs/modernizr/modernizr.min.js'></script>
</head>
<body >
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
<?php include("headerMenu.php");?>
<!-- End - Page title -->
<!-- Page body content -->
<section id=page-body-content class="content">
<!--<table style="width: 100%">
	<tr>
	<td class="pers">
	
	<div id=page-content>
	
	<section>

	<div class="wrapper">
		<div class="gallery-fading">
	<ul>

	<li>
	<a class='element-holder media-img' data-rel=prettyPhoto href='assets/fferrer.jpg'>
	<img alt='Dr. Marissa B. Ferrer - Branch Director and OU Center Coordinator' src='assets/fferrer.jpg' width=600 height=250 />
	</a>
	<div class=slide-caption-right>
	<h3>Dr. Marissa B. Ferrer</h3>
	Branch Director and OU Center Coordinator
	</div>
	</li>

	<li>
	<a class='element-holder media-img' data-rel=prettyPhoto href='assets/frabe.jpg'>
	<img alt='Ms. Yolanda F. Rabe - Head of Academic Programs and Research Coordinator' src='assets/frabe.jpg' width=600 height=250 />
	</a>
	<div class=slide-caption-left>
	<h3>Ms. Yolanda F. Rabe</h3>
	Head of Academic Programs and Research Coordinator
	</div>
	</li>

	<li>
	<a class='element-holder media-img' data-rel=prettyPhoto href='assets/fzarco.jpg'>
	<img alt='Engr. Michael Zarco - Administrative Officer and Property Custodian' src='assets/fzarco.jpg' width=600 height=250 />
	</a>
	<div class=slide-caption-right>
	<h3>Engr. Michael Zarco</h3>
	Administrative Officer and Property Custodian
	</div>
	</li>

	<li>
	<a class='element-holder media-img' data-rel=prettyPhoto href='assets/fsevilla.jpg'>
	<img alt='Prof. Margarita T. Sevilla, Student Services' src='assets/fsevilla.jpg' width=600 height=250 />
	</a>
	<div class=slide-caption-left>
	<h3>Prof. Margarita T. Sevilla</h3>
	Head, Student Services
	</div>
	</li>

	<li>
	<a class='element-holder media-img' data-rel=prettyPhoto href='assets/fcanlas.jpg'>
	<img alt='Prof. Bernadette I. Canlas - Head of Admission and Registration Office' src='assets/fcanlas.jpg' width=600 height=250 />
	</a>
	<div class=slide-caption-right>
	<h3>Prof. Bernadette I. Canlas</h3>
	Head of Admission and Registration Office
	</div>
	</li>

	<li>
	<a class='element-holder media-img' data-rel=prettyPhoto href='assets/farada.jpg'>
	<img alt='Prof. Marian Arada - Collecting and Disbursing Officer' src='assets/farada.jpg' width=600 height=250 />
	</a>
	<div class=slide-caption-left>
	<h3>Prof. Marian Arada</h3>
	Collecting and Disbursing Officer
	</div>
	</li>

	<li>
	<a class='element-holder media-img' data-rel=prettyPhoto href='assets/fmaliksi.jpg'>
	<img alt='Ms. Liwanag L. Maliksi - Guidance Counselor' src='assets/fmaliksi.jpg' width=600 height=250 />
	</a>
	<div class=slide-caption-right>
	<h3>Liwanag L. Maliksi</h3>
	Guidance Counselor III
	</div>
	</li>
	</td>
	<td>
	</div>
		<div class="videowrapper"> 
			<iframe src="https://www.youtube.com/embed/KIcbabmyK0E" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
	</div>
	</td>-->
	</tr>
</table>
	<div id=page-body-content-inner class="inner" align="center">

	<h2 class=underlined>Getting Started with Your Account</h2>

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
	<p><h4>Family Background</h4>View your mother's and father's basic information such as their full name and their siblings with its birthdate. You can update your family background by clicking the update button in the right sidebar or the update button in family background page. You can add your sibling by clicking the "Add Child/Children".</p>
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
	<!--End - Video -HTML5 -->
	</section>
<br/>

<!-- End - Showcase gallery -->
<!--</div>-->
<!-- End - Page content -->
<!-- Page sidebar -->
<aside class=page-sidebar>

<!-- End - Page body content -->
</div> 
</section>
<!-- End - Page body -->

<!-- Page footer -->
<footer id=page-footer>
<div class=container-aligner>
<!-- Footer left -->
<section id=footer-left>
© Copyright 2011 <a href="#" title="Dbooom Themes">vCore Team | PUP Taguig</a> - All Rights Reserved.
</section>
<!-- End - Footer left -->
<!-- Footer right -->
<!--<section id=footer-right>
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
</section>-->
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
