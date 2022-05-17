<?php
session_start();
if($_SESSION['user']==1) {

} else if($_SESSION['user']==0) {
	header("location:index.php?r=faculty/");
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
<title>Faculty | View Profile</title>
<!-- Page icon -->
<link href='puplogo.ico' rel='shortcut icon'/>
<!-- Stylesheets -->
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
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
    height: 50px;
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

.modal-backdrop {
    /* bug fix - no overlay */    
    display: none;    
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
<?php endif;?>
<section id=page-body-content>
<div id=page-body-content-inner>
<!-- Page content -->
<div id=page-content>
<!-- Video - HTML5 -->
<section>
<h2 class=underlined-header>PERSONAL DATA SHEET</h2>
<ul class=tags-floated-list>
<li>
<a style="margin-top:-50px; margin-left:477px;">Employee ID:
<?php if(isset($_GET['EmpID'])) { echo $_GET['EmpID'];} else { echo "n/a";}?></a>
</li>
</ul>
<div class=align-left>
<div class=element-holder>
<img style="margin-top:25px;" alt='Image example' src='assets/pdficon.png' width=128 />
</div>
</div>
<?php
	if(isset($_GET['EmpID'])) {
		$_SESSION['FCEMPID'] = $_GET['EmpID'];
		$_SESSION['TEmpID'] = $_SESSION['CEmpID'];
		$_SESSION['CEmpID'] = $_SESSION['FCEMPID'];
		
		include("getPersonalInformation.php");
		$FullName = $firstname . " " . $middlename . " " . $surname;
		$_SESSION['FullName'] = $FullName;  
		echo '<p>
		<h3>'. strtoupper($FullName) .'</h3>
		<p style="margin-top: -8px;"><i>Personal Data Sheet</i></p>
		<ul class=list-arrow-right style="margin-left: 140px; margin-top: -12px;">
		<a href="index.php?r=administrator/MyPDS1" target="_blank"><li>Page 1 of 4</li></a>
		<a href="index.php?r=administrator/MyPDS2" target="_blank"><li>Page 2 of 4</li></a>
		<a href="index.php?r=administrator/MyPDS3" target="_blank"><li>Page 3 of 4</li></a>
		<a href="index.php?r=administrator/MyPDS4" target="_blank"><li>Page 4 of 4</li></a>
		</ul>
		</p>';
		//$_SESSION['CEmpID'] = $_SESSION['TEmpID'];
	}
?>

<button  data-toggle="modal" data-target="#myModal" style="height: 40px; width:100px; text-align: center;">Edit Faculty Information</button>


</section>
<section>
    <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form id="annc" name="annc" action="index.php?r=administrator/EditFacultyInfo" method="post">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color:black;">&times;</span>
            </button>
          <h4 class="modal-title" style="position: absolute; left: 5px;top: 5px;"><?php echo $FullName ?></h4>
        </div>
        <div class="modal-body">
            <!-- Account info -->
            <h3>Account Information</h3>
                <p style="margin-bottom: 9px;">Faculty Code:<input name="FCode" type=text style="width: 600px; margin-top: -28px; margin-left: 15%;"  placeholder='Faculty Code' value="<?php echo $row['FCode']?>"/></p>

                <p style="margin-bottom: 9px;">Password:<input name="pass" type=text style="width: 600px; margin-top: -28px; margin-left: 15%;"  placeholder='New Password'/></p>

                <p style="margin-bottom: 9px;">Employment Status:
                <select style="width: 600px; margin-top: -28px; margin-left: 15%;" name = "Employment" onclick="change(this)">
                    <option><?php echo $stats ?></option>
                    <?php foreach ($EmploymentStats as $emp): ?>
                        <?php if ($emp != $stats): ?>
                            <option><?php echo $emp ?></option>
                        <?php endif ?>
                    <?php endforeach ?>
                </select></p>

                <p style="margin-bottom: 9px;">Role: 
                    <select name="role" style="width: 600px; margin-top: -28px; margin-left: 15%;">
                        <option id="roles" value="<?php echo $roles ?>"><?php echo $roles ?></option>

                        <?php foreach ($rolesSelect as $rol): ?>
                            <?php if ($roles != $rol): ?>
                                <option id="roles" value="<?php echo $rol ?>"><?php echo $rol ?></option>
                            <?php endif ?>
                           
                        <?php endforeach ?>
                    </select>
                </p>
            <!-- End of Account Info -->

            <!-- Personal Information -->
            <h3>Personal Information</h3>
            <p style="margin-bottom: 9px;">*Civil Status:
                <select name="CivilStatus" type=text style="width: 600px; margin-top: -28px; margin-left: 15%;" onchange="yesnoCheck(this);">
                
                    <option value="<?php echo $row['civilStatus'] ?>"><?php echo $row['civilStatus'] ?></option>

                    <?php if ($row['civilStatus']=="Single"): ?>
                        <option value = "Married">Married</option>
                        <option value = "Annulled">Annulled</option>
                        <option value = "Widowed">Widowed</option>
                        <option value = "Separated">Separated</option>
                        <option value = "Others">Others</option>
                    <?php endif ?>
                    <?php if ($row['civilStatus']=="Married"): ?>
                        <option value = "Single">Single</option>
                        <option value = "Annulled">Annulled</option>
                        <option value = "Widowed">Widowed</option>
                        <option value = "Separated">Separated</option>
                        <option value = "Others">Others</option>
                    <?php endif ?>
                    <?php if ($row['civilStatus']=="Annulled"): ?>
                        <option value = "Single">Single</option>
                        <option value = "Married">Married</option>
                        <option value = "Widowed">Widowed</option>
                        <option value = "Separated">Separated</option>
                        <option value = "Others">Others</option>
                    <?php endif ?>
                    <?php if ($row['civilStatus']=="Widowed"): ?>
                        <option value = "Single">Single</option>
                        <option value = "Married">Married</option>
                        <option value = "Annulled">Annulled</option>
                        <option value = "Separated">Separated</option>
                        <option value = "Others">Others</option>
                    <?php endif ?>
                    <?php if ($row['civilStatus']=="Separated"): ?>
                        <option value = "Single">Single</option>
                        <option value = "Married">Married</option>
                        <option value = "Annulled">Annulled</option>
                        <option value = "Widowed">Widowed</option>
                        <option value = "Others">Others</option>
                    <?php endif ?>
                
                    
                    
                </select>
            </p>


            
            <div id="ifYes" style="display: none;">
                <p style="margin-bottom: 9px;">*Specify: <input style="width: 600px; margin-top: -28px; margin-left: 15%;" type="text" id="other" name="other" /></p><br />
            </div>
            
            
                <p style="margin-bottom: 9px;">*Citizenship:<input name="Citizenship" type=text style="width: 600px; margin-top: -28px; margin-left: 15%;"  placeholder='Citizenship' value="<?php echo $row['citizenship'] ?>"/></p>

                <p style="margin-bottom: 9px;">*Height (m):<input name="Height" type=text oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" style="width: 600px; margin-top: -28px; margin-left: 15%;"  placeholder='Height' value="<?php echo $row['height'] ?>"/></p>

                <p style="margin-bottom: 9px;">*Weight (kg):<input name="Weight" type=text oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" style="width: 600px; margin-top: -28px; margin-left: 15%;"  placeholder='Weight' value="<?php echo $row['weight'] ?>"/></p>
                <!-- End of Personal Information -->


                <!-- Contacts -->
                <h3>Contacts</h3>
                <p style="margin-bottom: 9px;">*Email Address:<input name="email" type=text style="width: 600px; margin-top: -28px; margin-left: 15%;"  placeholder='Email Address' value="<?php echo $row['email'] ?>"/></p>

                <p style="margin-bottom: 9px;">*Cellphone No.:<input type="text" name="CellNum" style="width: 600px; margin-top: -28px; margin-left: 15%;"  placeholder='Example: 09123456789' oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="11" value="<?php echo $row['cellNo'] ?>"></p>

                <p style="margin-bottom: 9px;">*Telephone No.:<input type="text" name="TeleNum" style="width: 600px; margin-top: -28px; margin-left: 15%;"  placeholder='Telephone Number' oninput="this.value = this.value.replace(/[^0-9.-]/g, '').replace(/(\..*?)\..*/g, '$1');" value="<?php echo $row['telNo'] ?>"></p>
                <!-- End of Contacts -->

                <!-- Address -->
                <h3>Address</h3>
                <p style="margin-bottom: 9px;">*Residential Address:<textarea name="Address" type=text style="width: 600px; margin-top: -28px; margin-left: 15%;"><?php echo $row['residentialAddress'] ?></textarea></p>

                <p style="margin-bottom: 9px;">*Zip Code:<input type="text" name="Zip" style="width: 600px; margin-top: -28px; margin-left: 15%;"  placeholder='Zip Code' oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="4" value="<?php echo $row['pzipCode'] ?>"></p>
                <!-- End of Address -->

            
            <input type="hidden" name="EmpID" value="<?php echo $_GET['EmpID']; ?>">
            <input type="hidden" name="ID" value="<?php echo $row['id']; ?>">
        </div>

        <div class="modal-footer">
          <input type="submit" name="Submit">
          </form>
        </div>
      </div>
      
    </div>
  </div>
  <!-- End Modal Section -->
</section>
<!-- End - Showcase gallery -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->
<aside class=page-sidebar>
<section class='widget-container widget-categories'>
<h2 class=widget-heading>Faculty Management</h2>
<div class=widget-content>
<?php include("facultyMenu.php");?>
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
© Copyright 2011 <a href="#" title="Dbooom Themes">vCore Team | PUP Taguig</a> - All Rights Reserved.
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
<script src='assets/jquery-3.6.0.min.js'></script>
<script src='assets/sweetalert2.all.min.js'></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script id=js-dispatcher src='scripts/scripts.js'></script>
<script>
    // var roles1 = <?php //echo json_encode($rolesSelect) ?>;
    // var roles2 = <?php //echo json_encode($roles2) ?>;
    // var roles = <?php //echo $roles; ?>

    // function change(that){

    //     if(that.value != "Full-time"){
    //         for (var i = 0; i < roles2.length; i++) {
    //             document.getElementById("roles").innerHTML = roles2[i];
    //         }
    //     } else {
    //         for (var i = 0; i < roles1.length; i++) {
    //             document.getElementById("roles").innerHTML = roles1[i];
    //         }
    //     }
    // }

    function yesnoCheck(that) {
        if (that.value == "Others") {
      // alert("check");
            document.getElementById("ifYes").style.display = "block";
        } else {
            document.getElementById("ifYes").style.display = "none";
        }
    }

    flashdata = $('.flash-data').data('flashdata')
    if(flashdata==0){
        Swal.fire({
            icon:'success',
            title:'Success!',
            text:'Faculty Information Edited!'
            
    })
    }
    
    if(flashdata==1){
        Swal.fire({
            icon:'error',
            title:'Ooops!',
            text:'Full-time Employees are only allowed to be Faculty Designee!'
            
    })    
    }
</script>
</body>
</html>
