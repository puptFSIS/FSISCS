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
<h2 id="slideshow_header">PUP Taguig Branch Officials</h2>

		<div class="card mb-3" id="unews-card">
              <div class="row no-gutters">
                  <div class="col-md-4">
                      <img src="<?php echo Yii::app()->getBaseUrl() ?>bopics/marissa_b._ferrer(1).jpg" class="img-fluid img-thumbnail mt org-image"alt="...">
                  </div>
                  <div class="col-md-8">
                      <div class="card-body">
                          <h5 class="card-title news-title">Dr. Marissa B. Ferrer </h5>
                          <p>Branch Director</p>
                      </div>
                  </div>
              </div>
          </div>
                            <div class="card mb-3" id="unews-card">
              <div class="row no-gutters">
                  <div class="col-md-4">
                      <img src="<?php echo Yii::app()->getBaseUrl() ?>bopics/nopic.png" class="img-fluid img-thumbnail mt org-image"alt="...">
                  </div>
                  <div class="col-md-8">
                      <div class="card-body">
                          <h5 class="card-title news-title">Dr. Cecilia R. Alagon</h5>
                          <p>Head Of Academic Programs</p>
                      </div>
                  </div>
              </div>
          </div>
                            <div class="card mb-3" id="unews-card">
              <div class="row no-gutters">
                  <div class="col-md-4">
                      <img src="<?php echo Yii::app()->getBaseUrl() ?>bopics/bernadette_i._canlas,_instructor_iii.jpg" class="img-fluid img-thumbnail mt org-image"alt="...">
                  </div>
                  <div class="col-md-8">
                      <div class="card-body">
                          <h5 class="card-title news-title">Prof. Bernadette I. Canlas</h5>
                          <p>Head Of The Student Services</p>
                      </div>
                  </div>
              </div>
          </div>
                            <div class="card mb-3" id="unews-card">
              <div class="row no-gutters">
                  <div class="col-md-4">
                      <img src="<?php echo Yii::app()->getBaseUrl() ?>bopics/mhel_p._garcia,_instructor_i.jpg" class="img-fluid img-thumbnail mt org-image"alt="...">
                  </div>
                  <div class="col-md-8">
                      <div class="card-body">
                          <h5 class="card-title news-title">Prof. Mhel P. Garcia</h5>
                          <p>Head Of Admission And Registration</p>
                      </div>
                  </div>
              </div>
          </div>
                            <div class="card mb-3" id="unews-card">
              <div class="row no-gutters">
                  <div class="col-md-4">
                      <img src="<?php echo Yii::app()->getBaseUrl() ?>bopics/engr._michael_l._zarco,_instructor_i..jpg" class="img-fluid img-thumbnail mt org-image"alt="...">
                  </div>
                  <div class="col-md-8">
                      <div class="card-body">
                          <h5 class="card-title news-title">Engr. Michael Zarco</h5>
                          <p>Administrative Officer</p>
                      </div>
                  </div>
              </div>
          </div>
                            <div class="card mb-3" id="unews-card">
              <div class="row no-gutters">
                  <div class="col-md-4">
                      <img src="<?php echo Yii::app()->getBaseUrl() ?>bopics/liwanag_l._maliksi,_guidance_counselor.jpg" class="img-fluid img-thumbnail mt org-image"alt="...">
                  </div>
                  <div class="col-md-8">
                      <div class="card-body">
                          <h5 class="card-title news-title">Prof. Liwanag I. Maliksi</h5>
                          <p>Guidance Councilor</p>
                      </div>
                  </div>
              </div>
          </div>
                            <div class="card mb-3" id="unews-card">
              <div class="row no-gutters">
                  <div class="col-md-4">
                      <img src="<?php echo Yii::app()->getBaseUrl() ?>bopics/gina_a._dela_cruz,_instructor_i.jpg" class="img-fluid img-thumbnail mt org-image"alt="...">
                  </div>
                  <div class="col-md-8">
                      <div class="card-body">
                          <h5 class="card-title news-title">Prof. Gina A. Dela Cruz</h5>
                          <p>Quality Assurance Coordinator</p>
                      </div>
                  </div>
              </div>
          </div>
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
		<label for=dummy0>Faculty Code:</label>
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


<p style="text-align: center;">New Faculty Member? <a data-target='#signUp' data-toggle='modal' href='#signUp' style="color: #FA4202;">Create an account.</a></p>

<p style="text-align: center;"><a data-target='#forgot' data-toggle='modal' href='#forgot' style="color: #FA4202;">Forgot Password?</a></p>


</section>

<!-- Modal 1 -->
  <div class="modal fade" id="signUp" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form id="annc" name="annc" action="index.php?r=login/SignUp" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color:black;">&times;</span>
            </button>
          <h4 class="modal-title" style="position: absolute; left: 5px;top: 5px;">Sign up</h4>
        </div>
        <div class="modal-body">
        	<p style="margin-bottom: 9px;">
        		<h4 class=underlined-header>Personal Information</h4>

        		<center>
				<label class="required-field" style="display: inline-block;">First Name: <input style="display: inline-block; width: 150px;" type="text" name="firstName" oninput="this.value = this.value.replace(/[^a-zA-Z]/g, '').replace(/(\..*?)\..*/g, '$1');" required></label>

				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label style="margin-top: 20px;">Middle Initial: <input style="display: inline-block; width: 50px;" type="text" name="MI" maxlength="2" oninput="this.value = this.value.replace(/[^a-zA-Z.]/g, '').replace(/(\..*?)\..*/g, '$1');"></label>

				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label style="margin-top: 20px;" class="required-field" style="display: inline-block;">Last Name: <input  style="display:inline-block; width:150px;" type="text" name="lastName" oninput="this.value = this.value.replace(/[^a-zA-Z]/g, '').replace(/(\..*?)\..*/g, '$1');" required></label>
			</center>
			</p>
			<hr>

			<h4 style="margin-bottom:30px" class=underlined-header>Employment Information</h4>
			<p style="margin-left: 65px; margin-bottom: 20px;" class="required-field">
				
				Faculty Code: <input style="display: inline-block;width: 250px;" type="text" name="fcode" maxlength="12" oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
			</p>

			<p style="margin-left: 40px; margin-bottom: 20px;" class="required-field">
				Employment Type: <select name="emptype" style="display: inline-block;width: 250px;">
					<option value="Permanent">Full-time</option>
					<option value="Part-time">Part-time</option>
					<option value="Temporary">Temporary</option>
				</select>
			</p>

			<p style="margin-left: 92px; margin-bottom: 20px;" class="required-field">
				Position: <select name="position" style="display: inline-block;width: 250px;">
					<option value="Faculty Designee">Faculty Designee</option>
					<option value="Professor">Professor</option>
				</select>
			</p>
			<hr>

			<h4 style="margin-bottom:30px" class=underlined-header>Account Information</h4>
			<p style="margin-left: 106px; margin-bottom: 20px;" class="required-field">
				Email: <input style="display: inline-block;width: 250px;" type="email" name="email" required>
			</p>

			<p style="margin-left: 83px;margin-bottom: 20px;" class="required-field">
				Password: <input style="display: inline-block;width: 250px;" id="password" type="password" name="password" required>
			</p>

			<p style="margin-left: 39px;margin-bottom: 20px;" class="required-field">
				Confirm Password: <input style="display: inline-block;width: 250px;" id="confirm_password" type="password" name="confirm_password" required>
				&nbsp;<span id='message'></span>
			</p>

            <p style="margin-left: 58px;margin-bottom: 9px;" class="required-field">
                PUP ID Picture: <input style="display: inline-block;" id="IDPic" type="file" name="id_pic" accept="image/png, image/gif, image/jpeg" required>
                &nbsp; <span id="warning"></span>
            </p>
        </div>

        <div class="modal-footer">
          <input id="signUpBut" type="submit" name="Submit">
          </form>
          <div></div>
        </div>
      </div>
      
    </div>

  </div>


  <div class="modal fade" id="forgot" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form id="annc" name="annc" action="index.php?r=login/Forgot" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color:black;">&times;</span>
            </button>
          <h4 class="modal-title" style="position: absolute; left: 5px;top: 5px;">Find your Account</h4>
        </div>
        <div class="modal-body">
			<p style="margin-left: 65px; margin-bottom: 20px;">
				
				<center><b>Please enter your Faculty Code to verify if you are a Faculty Member of PUP-Taguig Branch </b></center>
				<center><input style="width: 250px;" type="text" name="fcode" maxlength="12" oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" required></center>
			</p>


			
        </div>

        <div class="modal-footer">
          <input id="ForgotBut" type="submit" name="Submit">
          </form>
          <div></div>
        </div>
      </div>
      
    </div>

  </div>

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
<footer id=page-footer>
    <div class=container-aligner>
        <section id=footer-left>
            © Copyright 2022 <a href="#">FSIS | PUP Taguig</a> - All Rights Reserved.
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
				document.getElementById("signUpBut").disabled = false;
			} else {
				$('#message').html('Not Matching').css('color', 'red');
				document.getElementById("signUpBut").disabled = true;
			}
		} else {
			$('#message').html('')
			document.getElementById("signUpBut").disabled = true;
		}		
	});

	let input = document.getElementById('IDPic');

	input.addEventListener('change', () => {
		let files = input.files;

		if (files.length > 0) {
			if(files[0].size > 4097152){
				$('#warning').html('Image Size Exceeds 4MB').css('color', 'red');
				document.getElementById("signUpBut").disabled = true;
			} else {
				$('#warning').html('');
				document.getElementById("signUpBut").disabled = false;
			}
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

	if(flashdata==1){
		Swal.fire({
			icon:'error',
			title:'Ooops!',
			text:'Please fill out the given fields!'
			
		})
	}

	if(flashdata==2){
		Swal.fire({
			icon:'error',
			title:'Ooops!',
			text:'There is an error while uploading. Please try it again after a while.'
			
		})
	}

	if(flashdata==3){
		Swal.fire({
			icon:'error',
			title:'Ooops!',
			text:'Only .jpg, .jpeg, .gif, .png formats are allowed'
			
		})
	}

	if(flashdata==4){
		Swal.fire({
			icon:'error',
			title:'Ooops!',
			text:'Employee ID does not exist!'
			
		})
	}

	if(flashdata==5){
		Swal.fire({
			icon:'success',
			title:'Success!',
			text:'Password Changed!'
			
		})
	}

</script>
</body>
</html>
