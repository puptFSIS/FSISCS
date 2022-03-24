<?php
session_start(); /*
if(isset($_SESSION['user'])) {
	if($_SESSION['user']==1) {

	} else if($_SESSION['user']==0) {
		header("location:index.php?r=faculty/");
	}
} else {
	header("location:index.php?r=site/");
} */
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
<title>Update | Family Background</title>
<!-- Page icon -->
<link href='puplogo.ico' rel='shortcut icon'/>
<!-- Stylesheets -->
<style media=screen type='text/css'>@import "styles/base.css";
.cssLT #ut, .cssUT #ut{filter:progid:DXImageTransform.Microsoft.DropShadow(enabled=false);}
.cssWLGradientIMG{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMGSSL{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMG
{BACKGROUND-IMAGE: url(images/hd.jpg);BACKGROUND-REPEAT:repeat-x;top:0;height:105px;}

#page-content section input[type="text"]{
	width: 303px; 
	margin-top: -28px; 
	margin-left: 35%;

}

@media only screen and (min-width: 150px) and (max-width: 600px)
{
	/* Title right */
       .title-right {
        float: left;
        margin: 0;
        padding: 0;
        line-height: 0;
		width:100%;
    }

        .title-right a {
            float: left;
            display: block;
            margin-right: 0;
            height: 30;
            padding: 0;
            line-height: 30px;
            text-align: center;
			width: 100%;
        }
		
		a.home{
display:none;
}
	
	aside.page-sidebar, .children, .round-5{
display:none;
}

.page-sidebar-right #page-content{
	width:100%;
}
body.page-media.page-sidebar-right{
	width:100%;
}

.page-sidebar-right #page-body-content {
background:url(../../../../FSISCS/images/page-body-bg-white.png);
background-repeat:repeat;
}
.underlined-header{
font-size:18px;
margin-top: 5px; 
float:left;
clear:both;
}

.other{
font-size:85%;
float:left;
font-style:normal;
}

#page-content section input[type="text"]{
		width:94%; 
		margin-top: 0; 
		margin-left: 3%;
		margin-right:3%;  

}

p{
	display:block;
	clear:both;
}

}
</style>

<link href='styles/print.css' media=print rel=stylesheet />
<!-- Modernizr library -->
<script src='scripts/libs/modernizr/modernizr.min.js'></script>
<meta charset="UTF-8"></head>
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
<?php include("Gfb.php");?>
<h2 class=underlined-header>Family Background Update</h2>
<form id=db action='index.php?r=faculty/processUpdateFB' method=POST>
<div class="underlined-header"><center><strong>SPOUSE</strong></center></div>
<p style="margin-bottom: 9px;">SPOUSE'S SURNAME:<input id=dummy0 name=s1 type=text value='<?php echo $spouseSurname;?>'/></p>
<p style="margin-bottom: 9px;">FIRST NAME:<input id=dummy0 name=s2 type=text value='<?php echo $spouseFirstname;?>'/></p>
<p style="margin-bottom: 9px;">MIDDLE NAME:<input id=dummy0 name=s3 type=text value='<?php echo $spouseMiddlename;?>'/></p>
<hr />
<p style="margin-bottom: 9px;">OCCUPATION:<input id=dummy0 name=s4 type=text value='<?php echo $spouseOccupation;?>'/></p>
<p style="margin-bottom: 9px;">EMP/BUS. NAME:<input id=dummy0 name=s5 type=text value='<?php echo $spouseEmployerName;?>'/></p>
<p style="margin-bottom: 9px;">BUS. ADDRESS:<input id=dummy0 name=s6  type=text value='<?php echo $spouseBusinessAddress;?>'/></p>
<p style="margin-bottom: 9px;">TELEPHONE NO.:<input id=dummy0 name=s7 type=text value='<?php echo $spouseBusinessTelNo;?>'/></p>
<hr style="margin-bottom:5px;"/>
<div class="underlined-header" ><center><strong>PARENTS</strong></center></div>
<p style="margin-bottom: 9px;">FATHER'S SURNAME:<input id=dummy0 name=s8 type=text value='<?php echo $spouseFSurname;?>'/></p>
<p style="margin-bottom: 9px;">FIRST NAME:<input id=dummy0 name=s9 type=text value='<?php echo $spouseFFirstname;?>'/></p>
<p style="margin-bottom: 9px;">MIDDLE NAME:<input id=dummy0 name=s10 type=text value='<?php echo $spouseFMiddlename;?>'/></p>
<div class="underlined-header"></div>
<div class="underlined-header" ><center><strong>MOTHER'S MAIDEN NAME</strong></center></div>
<p style="margin-bottom: 9px;">SURNAME NAME:<input id=dummy0 name=s12 type=text value='<?php echo $spouseMSurname;?>'/></p>
<p style="margin-bottom: 9px;">FIRST NAME:<input id=dummy0 name=s13 type=text value='<?php echo $spouseMFirstname;?>'/></p>
<p style="margin-bottom: 9px;">MIDDLE NAME:<input id=dummy0 name=s14 type=text value='<?php echo $spouseMMiddlename;?>'/></p>
<hr style="margin-bottom:5px;"/>
<!-- ><section>
<div class="underlined-header" ><center><strong>Child/Children</strong></center></div>
<table class=round-5>
<thead>
<tr>
<th>Full name</th>
<th>Date of Birth</th>
</tr>
</thead>
<tfoot>
<tr>
<td colspan=2>Total no. of child/children.</td>
</tr>
</tfoot>
<tbody>
<?php //include("children.php");?>
</tbody>
</table>
</section> <-->
<p><center>
<input type=submit value='Save Changes' /></center>
</p>
</form>
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
Copyright 2013 <a href="#" title="Dbooom Themes">DFRAG Systems Solutions | PUP Taguig</a> - All Rights Reserved.
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
