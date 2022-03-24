<?php 
session_start(); /*
if(isset($_SESSION['user'])) {
	if($_SESSION['user']==1) {
		
	} else if($_SESSION['user']==0) {
		
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
<title>Profile | Personal Information</title>
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
}div#page-content section p input#gender{
width: 15%;
margin-top: -28px;
margin-left: 20%;	
}
div#page-content section p input#mname{
	width: 22%; 
	margin-top: -28px; 
	margin-left: 20%;
}
div#page-content section p input#ne{
	width: 30%; 
	margin-top: -30px; 
	margin-left: 36%;
}
div#page-content section p.nep{
	margin-top: -34px; 
	margin-left:280px;
}
div#page-content section p select#month{
	width:20%; 
	margin-top:-30px; 
	margin-left:175px; 
}
div#page-content section p select#day{
	width:10%; 
	margin-top:-37px; 
	margin-left:303px; 
}
div#page-content section p select#year{
	width:15%; 
	margin-top:-37px; 
	margin-left:370px;
}
div#page-content section p input#cs{
	width: 156px; 
	margin-top: -28px; 
	margin-left: 26%;
}
div#page-content section p.cs{
	margin-bottom: 9px; 
	margin-top:-36px; 
	margin-left:240px;
}
div#page-content section p input#height{
	width: 80px; 
	margin-top: -28px; 
	margin-left: 20%;
}
div#page-content section p input#weight{
	width: 80px;; 
	margin-top: -28px; 
	margin-left: 18%;
}
div#page-content section p.weight{
	margin-bottom: 9px; 
	margin-top:-36px; 
	margin-left:210px;
}
div#page-content section p input#bt{
	width: 40px; 
	margin-top: -28px; 
	margin-left: 35%;
}
div#page-content section p.bt{
	margin-bottom: 9px; 
	margin-top:-36px; 
	margin-left:370px;
}
div#page-content section p input#gsis,div#page-content section p input#ph{
	width: 140px; 
	margin-top: -28px; 
	margin-left: 20%;
}
div#page-content section p input#ibig,div#page-content section p input#sss{
	width: 140px; 
	margin-top: -28px; 
	margin-left: 25%;
}
div#page-content section p.ibig{
	margin-bottom: 9px; 
	margin-top:-36px;
	margin-left:270px;
}
div#page-content section p.sss{
	margin-bottom: 9px; 
	margin-top:-36px;
	margin-left:270px;
}
div#page-content section p textarea#add1,div#page-content section p textarea#add2{
	width: 370px; 
	margin-top: -28px; 
	margin-left: 20%;
}
div#page-content section p input#zip1,div#page-content section p input#zip2{
	width: 100px; 
	margin-top: -28px; 
	margin-left: 20%;
}
div#page-content section p input#tel1,div#page-content section p input#tel2{
	width: 159px; 
	margin-top: -28px; 
	margin-left: 27.5%;
}
div#page-content section p.tel1,div#page-content section p.tel2{
	margin-bottom: 9px; 
	margin-top:-36px; 
	margin-left:230px;
}


#page-content section input[type="text"]{
	width: 62%; 
	margin-top: -28px; 
	margin-left: 20%;
}


@media only screen and (min-width:150px) and (max-width:600px)
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
		
		aside.page-sidebar{
		display:none;
}

.page-sidebar-right #page-content{
	width:100%;
}
body.page-media.page-sidebar-right{
	width:100%;
}
.underlined-header{
font-size:18px;
margin-top: 5px; 
float:left;
}

.other{
font-size:85%;
float:left;
font-style:normal;
}

.page-sidebar-right #page-body-content {
background:url(../../../../FSISCS/images/page-body-bg-white.png);
background-repeat:repeat;
}

.page-sidebar-right #page-content {
min-width:50%;
width:100%;
}

div#page-content section p input#dummy0{
		clear:both;
		display:block;
		
		
		}
p{
	display:block;
	clear:both;
}

#page-content section input[type="text"],
div#page-content section p input#gender,
div#page-content section p input#mname,
div#page-content section p input#ne,
div#page-content section p select#month,
div#page-content section p select#day,
div#page-content section p select#year,
div#page-content section p input#cs,
div#page-content section p input#height,
div#page-content section p input#weight,
div#page-content section p input#bt,
div#page-content section p input#gsis,
div#page-content section p input#ibig,
div#page-content section p input#ph,
div#page-content section p input#sss,
div#page-content section p input#zip1,
div#page-content section p input#zip2,
div#page-content section p input#tel1,
div#page-content section p input#tel2{
		width:94%; 
		margin-top: 0; 
		margin-left: 3%;
		margin-right:3%; 
}

div#page-content section p.nep,
div#page-content section p.sss,
div#page-content section p.ibig,
div#page-content section p.bt,
div#page-content section p.weight,
div#page-content section p.cs,
div#page-content section p.tel1,
div#page-content section p.tel2{
	margin-top: 0; 
	margin-left:0;
}
div#page-content section p textarea#add1,div#page-content section p textarea#add2{
		width:94%; 
		margin-top: 0; 
		margin-left: 3%;
		margin-right:3%; 
}
.box-info{
clear:both;
margin-left:0;
}
}
<!-- end ng media  query --!>



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

<hr><div class="underlined-header"><center><strong class="other">Personal Information</strong></center></div>
<?php
	if(isset($_GET['msg'])) {
	$msg = $_GET['msg'];
		if(isset($_GET['type'])) {
			if($_GET['type']=="succ") {
				echo '
				<div class="box-info">
				  <div class="box-content">
					<p>' . $msg . '!</p>
				  </div>
				</div>
				<br />
				<hr style="margin-top:-5px;"/>
				';
			} else {
				echo '
				<div class="box-error">
				  <div class="box-content">
					<p>' . $msg . '!</p>
				  </div>
				</div>
				<br />
				<hr style="margin-top:-5px;"/>
				';
			}
		}
		
	} else {
	
	}
?>

<?php include("Gpi.php");?>

<p style="margin-bottom: 9px;">EMPLOYEE NO.:<input id=dummy0 name=dummy0 type=text disabled="disabled" 
value='<?php echo $agencyempno;?>'/></p>


<p style="margin-bottom: 9px;">SURNAME: <input id=dummy0 name=dummy0 type=text disabled="disabled" 
value='<?php echo $surname;?>'/></p>

<p style="margin-bottom: 9px;">FIRST NAME:<input id=dummy0 name=dummy0 type=text disabled="disabled" value='<?php echo $firstname;?>'/></p>

<p style="margin-bottom: 9px;">MIDDLE NAME: <input id=mname name=dummy0 type=text disabled="disabled" value='<?php echo $middlename;?>'/></p>
<p class="nep">NAME EXTENSION: <input id=ne name=dummy0 type=text placeholder="n/a" disabled="disabled" value='<?php echo $nameextension;?>'/></p>
<hr>
<!-- End - Post item -->
<p style="margin-bottom: 9px;">DATE OF BIRTH (mm/dd/yy): 
<select id=month name=dummy5 disabled="disabled">
<option><?php echo $month;?></option>
</select>
<select id=day name=dummy5 disabled="disabled">
<option><?php echo $day;?></option>
</select>
<select id=year name=dummy5 disabled="disabled">
<option><?php echo $year;?></option>
</select>
</p>
<p style="margin-bottom: 9px;">BIRTH PLACE:<input id=dummy0 name=dummy0 type=text disabled="disabled" value='<?php echo $birthplace;?>'/></p>


<p style = "margin-bottom: 9px;">GENDER:<input id=gender name=dummy0 type=text disabled="disabled" value='<?php echo $gender;?>'/></p>
<p class="cs">CIVIL STATUS:<input id=cs name=dummy0 type=text disabled="disabled" value='<?php echo $civilstatus;?>'/></p>
<p style="margin-bottom: 9px;">CITIZENSHIP:<input id=dummy0 name=dummy0 type=text disabled="disabled" value='<?php echo $citizenship;?>'/></p>
<p style="margin-bottom: 9px;">HEIGHT:<input id=height name=dummy0 type=text placeholder="meters" disabled="disabled" value='<?php echo $height;?>'/></p>
<p class="weight">WEIGHT:<input id=weight name=dummy0 type=text placeholder="kg" disabled="disabled" value='<?php echo $weight;?>'/></p>
<p class="bt">BLOOD TYPE:<input id=bt name=dummy0 type=text disabled="disabled" value='<?php echo $bloodtype;?>'/></p>
<hr><p style="margin-bottom: 9px;">GSIS ID NO.:<input id=gsis name=dummy0 type=text disabled="disabled" placeholder="00-0000000-0" value='<?php echo $gsis;?>'/></p>
<p class="ibig">PAG-IBIG NO.:<input id=ibig name=dummy0 type=text disabled="disabled" placeholder="0000-0000-0000" value='<?php echo $pagibig;?>'/></p>
<p style="margin-bottom: 9px;">PHILHEALTH:<input id=ph name=dummy0 type=text disabled="disabled" placeholder="00-000000000-0" value='<?php echo $philhealth;?>'/></p>
<p class="sss">SSS NO.:<input id=sss name=dummy0 type=text disabled="disabled" placeholder="00-0000000-0" value='<?php echo $sss;?>'/></p>
<hr><div class="underlined-header"><center><strong class="other">Residential Address</strong></center></div>
<p style="margin-bottom: 9px;">ADDRESS:<textarea id=add1 name=dummy0 disabled="disabled"><?php echo $residentialAdd;?></textarea></p>
<p style="margin-bottom: 9px;">ZIP CODE:<input id=zip1 name=dummy0 disabled="disabled" value='<?php echo $residentialZip;?>'></input></p>
<p class="tel1">TELEPHONE NO.:<input id=tel1 name=dummy0 disabled="disabled" value='<?php echo $residentialTel;?>'></input></p>

<hr><div class="underlined-header"><center><strong class="other">Permanent Address</strong></center></div>
<p style="margin-bottom: 9px;">ADDRESS:<textarea id=add2 name=dummy0 disabled="disabled"><?php echo $permanentAdd;?></textarea></p>
<p style="margin-bottom: 9px;">ZIP CODE:<input id=zip2 name=dummy0 disabled="disabled" value='<?php echo $permanentZip;?>'></input></p>
<p class="tel2">TELEPHONE NO.:<input id=tel2 name=dummy0 disabled="disabled" value='<?php echo $permanentTel;?>'></input></p>

<hr><div class="underlined-header"><center><strong class="other">Contact Information</strong></center></div>
<p style="margin-bottom: 9px;">E-MAIL ADDRESS:<input id=dummy0 name=dummy0 type=text disabled="disabled" value='<?php echo $email;?>'/></p>
<p style="margin-bottom: 9px;">MOBILE NO.:<input id=dummy0 name=dummy0 type=text disabled="disabled" value='<?php echo $cel;?>'/></p>
<p style="margin-bottom: 9px;">TIN:<input id=dummy0 name=dummy0 type=text disabled="disabled" value='<?php echo $tin;?>'/></p>


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
