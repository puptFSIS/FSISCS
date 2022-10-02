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
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
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

.required-field::before {
    content: "*";
    color: red;
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

footer {
    position: absolute;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: black;
   color: white;
   text-align: center;
}
</style>





<link href='styles/print.css' media=print rel=stylesheet />
<!-- Modernizr library -->
<script src='scripts/libs/modernizr/modernizr.min.js'></script>
</head>
<body class='page-media page-sidebar-right' style="background-color: ghostwhite;" >
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

<?php if (isset($_GET['mes'])) : ?>
	<?php if ($_GET['mes']==0): ?>
	<div class="flash-data" data-flashdata="<?= $_GET['mes']?>"></div>
	<?php endif;?>

	<?php if ($_GET['mes']==1): ?>
	<div class="flash-data" data-flashdata="<?= $_GET['mes']?>"></div>
	<?php endif;?>

	<?php if ($_GET['mes']==2): ?>
	<div class="flash-data" data-flashdata="<?= $_GET['mes']?>"></div>
	<?php endif;?>

	<?php if ($_GET['mes']==3): ?>
	<div class="flash-data" data-flashdata="<?= $_GET['mes']?>"></div>
	<?php endif;?>

	<?php if ($_GET['mes']==4): ?>
	<div class="flash-data" data-flashdata="<?= $_GET['mes']?>"></div>
	<?php endif;?>

	<?php if ($_GET['mes']==5): ?>
	<div class="flash-data" data-flashdata="<?= $_GET['mes']?>"></div>
	<?php endif;?>
<?php endif;?>


<!-- Video - HTML5 -->
<section>
	<form action="index.php?r=login/ChangePass" id=dummy method=POST>

		<h4 class="underlined-header">Change Password</h4>
    
		<p style="margin-left: 83px;margin-bottom: 20px;" class="required-field">
				Password: <input style="display: inline-block;width: 250px;" id="password" type="password" name="password" required>
		</p>

		<p style="margin-left: 39px;margin-bottom: 20px;" class="required-field">
			Confirm Password: <input style="display: inline-block;width: 250px;" id="confirm_password" type="password" name="confirm_password" required>
			&nbsp;<span id='message'></span>
		</p>

		<input type="hidden" name="fcode" value = "<?php echo $fcode ?>">

		<p><center><input id="ChangeBut" type="submit" name="Submit"></center></p>
    
</form>
</section>
<!-- End - Video -HTML5 -->
<br/>

<!-- End - Showcase gallery -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->
<!-- End - Page sidebar -->
</div>
</section>
<!-- End - Page body content -->
<!-- </div>
</section> -->
<!-- End - Page body -->

<!-- Page footer -->
<footer id=page-footer>
    <div class=container-aligner>
        <section id=footer-left>
            © Copyright 2021 <a href="#">FSIS | PUP Taguig</a> - All Rights Reserved.
        </section>
    </div>
</footer>
<!-- End - Page footer -->
<script src='assets/jquery-3.6.0.min.js'></script>
<script src='<?php echo Yii::app()->getBaseUrl() ?>assets/sweetalert2.all.min.js'></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

<script>

	$('#password, #confirm_password').on('keyup', function () {
		if ($('#password').val() != '') {
			if ($('#password').val() == $('#confirm_password').val()) {
				$('#message').html('Matching').css('color', 'green');
				document.getElementById("ChangeBut").disabled = false;
			} else {
				$('#message').html('Not Matching').css('color', 'red');
				document.getElementById("ChangeBut").disabled = true;
			}
		} else {
			$('#message').html('')
			document.getElementById("ChangeBut").disabled = true;
		}		
	});

	flashdata = $('.flash-data').data('flashdata')
	if(flashdata==0){
		Swal.fire({
			icon:'success',
			title:'Success!',
			text:'Thanks for signing up. An email from the PUPT-FSIS will be sent to you after the Admin approves your request. Also, check your Spam/Junk email from time to time'
			
		})
	}

	

</script>
</body>
</html>
