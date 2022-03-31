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
<title>Profile | Family Background</title>
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

.box-info{
clear:both;
margin-left:0;
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
<?php include("headerMenu.php");?>
<!-- End - Page title -->
<!-- Page body content -->
<section id=page-body-content>
<div id=page-body-content-inner>
<!-- Page content -->
<div id=page-content>
<!-- Video - HTML5 -->
<section>

<?php include("Gfb.php");?>
<h2 class=underlined-header>Family Background</h2>
<?php
	if(isset($_GET['msg'])) {
	$msg = $_GET['msg'];
		echo '
		<div class="box-info">
		  <div class="box-content">
			<p>' . $msg . '</p>
		  </div>
		</div>
		<br />
		';
	} else {
	
	}
?>
<div class="underlined-header"><center><strong class="other">Spouse</strong></center></div>
<p style="margin-bottom: 9px;">SPOUSE'S SURNAME:<input id=dummy0 name=dummy0 type=text disabled="disabled" value='<?php echo $spouseSurname;?>'/></p>
<p style="margin-bottom: 9px;">FIRST NAME:<input id=dummy0 name=dummy0 type=text disabled="disabled" value='<?php echo $spouseFirstname;?>'/></p>
<p style="margin-bottom: 9px;">MIDDLE NAME:<input id=dummy0 name=dummy0 type=text disabled="disabled" value='<?php echo $spouseMiddlename;?>'/></p>
<hr />
<p style="margin-bottom: 9px;">OCCUPATION:<input id=dummy0 name=dummy0 type=text disabled="disabled" value='<?php echo $spouseOccupation;?>'/></p>
<p style="margin-bottom: 9px;">EMP/BUS. NAME:<input id=dummy0 name=dummy0 type=text disabled="disabled" value='<?php echo $spouseEmployerName;?>'/></p>
<p style="margin-bottom: 9px;">BUS. ADDRESS:<input id=dummy0 name=dummy0 type=text disabled="disabled" value='<?php echo $spouseBusinessAddress;?>'/></p>
<p style="margin-bottom: 9px;">TELEPHONE NO.:<input id=dummy0 name=dummy0 type=text disabled="disabled" value='<?php echo $spouseBusinessTelNo;?>'/></p>
<hr style="margin-bottom:5px;"/>
<div class="underlined-header" ><center><strong class="other">Parents</strong></center></div>
<p style="margin-bottom: 9px;">FATHER'S SURNAME:<input id=dummy0 name=dummy0 type=text disabled="disabled" value='<?php echo $spouseFSurname;?>'/></p>
<p style="margin-bottom: 9px;">FIRST NAME:<input id=dummy0 name=dummy0 type=text disabled="disabled" value='<?php echo $spouseFFirstname;?>'/></p>
<p style="margin-bottom: 9px;">MIDDLE NAME:<input id=dummy0 name=dummy0 type=text disabled="disabled" value='<?php echo $spouseFMiddlename;?>'/></p>
<div class="underlined-header"></div>
<div class="underlined-header" ><center><strong class="other">Mother's Maiden Name</strong></center></div>
<p style="margin-bottom: 9px;">SURNAME:<input id=dummy0 name=dummy0 type=text disabled="disabled" value='<?php echo $spouseMSurname;?>'/></p>
<p style="margin-bottom: 9px;">FIRST NAME:<input id=dummy0 name=dummy0 type=text disabled="disabled" value='<?php echo $spouseMFirstname;?>'/></p>
<p style="margin-bottom: 9px;">MIDDLE NAME:<input id=dummy0 name=dummy0 type=text disabled="disabled" value='<?php echo $spouseMMiddlename;?>'/></p>
<hr style="margin-bottom:5px;"/>
<section>
<div class="underlined-header" ><strong class="children">Child/Children</strong></div>
<table class=round-5>
<thead>
<tr>
<th><h5><strong>Full name</strong></h5></th>
<th><h5><strong>Date of Birth</strong></h5></th>
<th><h5><strong>Action</strong></h5></th>
</tr>
</thead>
<tfoot>
<tr>
<td colspan=3><a href="index.php?r=faculty/ac">Add Child/Children</a></td>
</tr>
</tfoot>
<tbody>
<?php include("children.php");?>
</tbody>
</table>
</section>

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
