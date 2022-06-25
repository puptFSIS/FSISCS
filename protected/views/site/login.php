<?php
session_start();
include("config.php");
if(isset($_SESSION['user'])) 
{
	if($_SESSION['CEmpID']==null) 
	{
		header("location: index.php?r=site/SetEmpID");
	} 
	else 
	{
		if($_SESSION['user']==1) 
		{
			header("location:index.php?r=administrator/");
		} 
		else if($_SESSION['user']==0) 
		{
		header("location:index.php?r=faculty/");
		}
	}
} else {

}
?>
<!DOCTYPE html>
<!--[if IE 7 ]> <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]> <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]> <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]> <!--> <html class=no-js lang=en> <!-- <![endif]-->
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">

<!--[if IE ]> <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> <![endif]-->
<meta content='width=device-width, initial-scale=1.0' name=viewport />
<meta content='FSIS' name=keywords />
<meta content='PUP Taguig FSIS' name=description />
<meta content='vCore Team' name=author />
<!-- Page title -->
<title>FSIS | Log in</title>
<!-- Page icon -->
<link href='puplogo.ico' rel='shortcut icon'/>
<!-- Stylesheets -->
<style media=screen type='text/css'>@import "styles/base.css";
.cssLT #ut, .cssUT #ut{filter:progid:DXImageTransform.Microsoft.DropShadow(enabled=false);}
.cssWLGradientIMG{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMGSSL{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMG
{BACKGROUND-IMAGE: url(images/hd_tm1.png);BACKGROUND-REPEAT:repeat-x;top:0;height:105px;}

div.login p
{
	margin-left:25px;
}
.underlined-header
{
	margin-left: 25px;	
}

#page-body-content
{
    margin-top: -50px;
}
    
#presentation_link
{
    color: orangered;
}
    
#presentation_link:hover
{
    color: purple;
}

#page-body
{
    background-color: antiquewhite;
}
    
#page-title
{
    background-color: black;
    height: 41px;
}
    
#home-btn
{
    float: left;
    background-color: black;
    color: white;
    padding: 10px 10px 10px;
    margin-left: 10px;
    font-size: 1.0em;
}
    
#home-btn:hover
{
    float: left;
    //font-size: 1.1em;
    //background-color: lightgray;
    padding: 10px 10px 10px;
    margin-right: 10px;
}
    
#user:hover, #pass:hover
{
    background-color: #f4e8e8;
}
 
#slideshow_header
{
    background-color: #722c2c;
    color: #f2d179;
    padding: 4px;
    text-align: center;
}
    
#login-btn
{
    background-color: black;
}

.underlined
{
    background-color: lightgray;
    padding: 4px;
    font-size: 19px;
    margin-left: 10px;
}

@media only screen and (min-width:150px) and (max-width:600px)
{
	.cssWLGradientIMG{
		display:none;
		}
	.title-right return-homepage a{
		display:none;
	}
	.page-sidebar-right .page-sidebar{
			margin-left:0;
		}
	.page-sidebar-right #page-content {
			width:940px;
		}
	#page-body-content-inner{
			width:auto;
		}
	.container-aligner{
		width:100%;
	}
	div#page-content{
		display:none;
	}
	h2.underlined-header{
		background:none;
        float: inherit;
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
    
    div.login p
    {
	   margin-left:10px;
    }
    .underlined-header
    {
        margin-left:75px;
    }
}
</style>

<link href='styles/print.css' media=print rel=stylesheet />
<!-- Modernizr library -->
<script src='scripts/libs/modernizr/modernizr.min.js'></script>
</head>
<body class='page-media page-sidebar-right' >
<!-- JS notice - will be displayed if javascript is disabled -->
<p id=jsnotice>Javascript is currently disabled. This site requires Javascript to function correctly. Please <a href="http://enable-javascript.com/">enable Javascript in your browser</a>!</p>
<!-- End - JS notice -->
<!-- Page header -->
<div id="GradientDiv" class="cssWLGradientCommon cssWLGradientIMG"></div>

<!-- End - Page header -->

<!-- Page subheader -->

<!-- End - Page subheader -->
<!-- Page body -->
<!-- <section class=container-block id=page-body>
<div class=container-inner> -->
<!-- Page title -->
<header id=page-title>
<!-- Title and summary -->

<!-- End - Title and summary -->
<!-- Title right side -->
<a href='#' title='Return to Home' id="home-btn">PUP Taguig Website</a>

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
<h2 id="slideshow_header">PUP Taguig Branch Officials</h2>
<?php 
$sql = "SELECT * FROM tbl_masterlist";
$query = mysqli_query($conn, $sql);
?>

<?php while($row = mysqli_fetch_array($query)): ?>
	<div class=gallery-fading>
		<ul>
			<li>
				<a class='element-holder media-img' data-rel=prettyPhoto href='assets/fferrer.jpg'>
				<img alt='<?php echo $row['FName'] ?> - <?php echo $row['Position'] ?>' src='<?php echo $row['image_file'] ?>' width=600 height=250 />
				</a>
				<div class=slide-caption-right>
				<h3><?php echo $row['FName'] ?></h3>
				<?php echo $row['Position'] ?>
				</div>
			</li>
		</ul>
	</div>	
<?php endwhile ?>


<!-- <li>
<a class='element-holder media-img' data-rel=prettyPhoto href='assets/fferrer.jpg'>
<img alt='Dr. Marissa B. Ferrer - Branch Director and OU Center Coordinator' src='assets/fferrer.jpg' width=600 height=250 />
</a>
<div class=slide-caption-right>
<h3>Dr. Marissa B. Ferrer</h3>
Branch Director and OU Center Coordinator
</div>
</li> -->

<!-- <li>
<a class='element-holder media-img' data-rel=prettyPhoto href='assets/frabe.jpg'>
<img alt='Ms. Yolanda F. Rabe - Head of Academic Programs and Research Coordinator' src='assets/frabe.jpg' width=600 height=250 />
</a>
<div class=slide-caption-left>
<h3>Ms. Yolanda F. Rabe</h3>
Head of Academic Programs and Research Coordinator
</div>
</li> -->

<!-- <li>
<a class='element-holder media-img' data-rel=prettyPhoto href='assets/fzarco.jpg'>
<img alt='Engr. Michael Zarco - Administrative Officer and Property Custodian' src='assets/fzarco.jpg' width=600 height=250 />
</a>
<div class=slide-caption-right>
<h3>Engr. Michael Zarco</h3>
Administrative Officer and Property Custodian
</div>
</li> -->

<!-- <li>
<a class='element-holder media-img' data-rel=prettyPhoto href='assets/fsevilla.jpg'>
<img alt='Prof. Margarita T. Sevilla, Student Services' src='assets/fsevilla.jpg' width=600 height=250 />
</a>
<div class=slide-caption-left>
<h3>Prof. Margarita T. Sevilla</h3>
Head, Student Services
</div>
</li> -->

<!-- <li>
<a class='element-holder media-img' data-rel=prettyPhoto href='assets/fcanlas.jpg'>
<img alt='Prof. Bernadette I. Canlas - Head of Admission and Registration Office' src='assets/fcanlas.jpg' width=600 height=250 />
</a>
<div class=slide-caption-right>
<h3>Prof. Bernadette I. Canlas</h3>
Head of Admission and Registration Office
</div>
</li> -->

<!-- <li>
<a class='element-holder media-img' data-rel=prettyPhoto href='assets/farada.jpg'>
<img alt='Prof. Marian Arada - Collecting and Disbursing Officer' src='assets/farada.jpg' width=600 height=250 />
</a>
<div class=slide-caption-left>
<h3>Prof. Marian Arada</h3>
Collecting and Disbursing Officer
</div>
</li> -->

<!-- <li>
<a class='element-holder media-img' data-rel=prettyPhoto href='assets/fmaliksi.jpg'>
<img alt='Ms. Liwanag L. Maliksi - Guidance Counselor' src='assets/fmaliksi.jpg' width=600 height=250 />
</a>
<div class=slide-caption-right>
<h3>Liwanag L. Maliksi</h3>
Guidance Counselor III
</div>
</li> -->

<!-- <li> -->
<!-- Item image -->
<!-- <a class='element-holder media-video' data-rel=prettyPhoto href='https://www.youtube.com/watch?v=DL9uOlxrGlE'>
<img alt='An overview of the system:' src='assets/last.jpg' width=600 height=250 />

</a> -->
<!-- End - Item image -->
<!-- </li> -->
<!-- End - Gallery item -->


<!-- <div class="layout-1-3">
	<div class="toggle-block">
		<div class="toggle-trigger">
			<a href="#">FAQs</a>
		</div>
		<div class="toggle-content" style="width: 88.5%;">
			Click here to go to FAQs page.
		</div>
	</div>
</div>

<div class="layout-1-3">
	<div class="toggle-block">
		<div class="toggle-trigger">
		<a href="#">Suggestions</a>
		</div>

		<div class="toggle-content" style="width: 88.5%;">
			<form action="" id="dummy" method="post">
				<fieldset>
					<p>
						<label for="dummy0">E-mail</label>
						<input id="dummy0" name="dummy0" type="text" style="width: 100%;" />
					</p>
					<p>
						<label for="dummy2">Suggestions</label>
						<textarea cols="20" id="dummy2" name="dummy2" rows="5" style="width: 100%;"></textarea>
					</p>
					<p>
						<center><input type="submit" value="Suggest" /></center>
					</p>
				</fieldset>
			</form>
		</div>
	</div>
</div>

<div class="layout-1-3 layout-last">
	<div class="toggle-block">
		<div class="toggle-trigger">
			<a href="#">Comments</a>
		</div>

		<div class="toggle-content" style="width: 88.5%;">
			<form action="" id="dummy" method="post">
				<fieldset>
					<p>
						<label for="dummy0">E-mail</label>
						<input id="dummy0" name="dummy0" type="text" style="width: 100%;" />
					</p>
					<p>
						<label for="dummy2">Comments</label>
						<textarea cols="20" id="dummy2" name="dummy2" rows="5" style="width: 100%;"></textarea>
					</p>
					<p>
						<center><input type="submit" value="Comment" /></center>
					</p>
				</fieldset>
			</form>
		</div>
	</div>
</div> -->

<h5>Presentation: <a href="http://www.youtube.com/watch?v=KIcbabmyK0E" target="_blank" id="presentation_link">Click Me!</a></h5>
<font color="black">

</section>
<!-- End - Video -HTML5 -->
<br/>

<!-- End - Showcase gallery -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->
<aside class=page-sidebar>
<!-- Widget categories -->
<section class='widget-container widget-categories'>
<h2 class=underlined>Log In</h2>
<?php
	if(isset($_GET['msg'])) {
		echo '
		<div class="box-error" style="margin-left: 5px;">
		  <div class="box-content">
			<p>You are not a valid faculty member of Polytechnic University of the Philippines Taguig Campus</p>
		  </div>
		</div>
		';
	}

?>
<form action="index.php?r=login/login" id=dummy method=POST>
    <div class="login">
		<p>
		<label for=dummy0>Username:</label>
		<input id=user name=user type=text style="width: 100%;" />
		</p>
        <p>
		<label for=dummy2>Password:</label>
		<input id=pass name=pass type=password style="width: 100%;" />
		</p>
		<p class="click">
		<center><input type=submit style="width:90px;" value='Log In' id="login-btn" /></center>
		</p>
    </div>
</form>


</section>

<!-- /Widget categories -->

<!-- Widget categories -->
<!-- <section class='widget-container widget-categories'>
	<h2 class=underlined>Mobile Applications</h2>
	<div class=widget-content>
		<ul class='widget-list categories-list'>
			<li>
				<a>FSIS Mobile Application</a>
				<span class=widget-hint><a href='http://puptaguig.org/FSISCS/mobileapps/PUPTFSISMobileApp.apk' download>Download</a></span>
			</li>
			<li>
				<a>FLS Mobile Application</a>
				<span class=widget-hint><a href='http://puptaguig.org/FSISCS/mobileapps/Faculty-Loading-and-Scheduling.apk' download>Download</a></span>
			</li>
		</ul>
	</div>
</section> -->
<!-- /Widget categories -->

</aside>
<!-- End - Page sidebar -->
</div>
</section>
<!-- End - Page body content -->
<!-- </div>
</section> -->
<!-- End - Page body -->

<!-- Page footer -->
<footer id=page-footer >
<div class=container-aligner>
<!-- Footer left -->
<section id=footer-left>
Copyright 2015 <a href="#">Korra Development Team | PUP Taguig</a> - All Rights Reserved.
</section>
<!-- End - Footer left -->
<!-- Footer right -->
<section id=footer-right>
<ul class=footer-navigation>
<li>
<a href='../index.html' title=Home>Home</a>
</li>
<li>
<a href='../about.html' title=About>About</a>
</li>
<li>
<a href='../contacts.html' title=Contacts>Contacts</a>
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
