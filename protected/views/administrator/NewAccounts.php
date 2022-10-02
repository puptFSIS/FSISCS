<?php

if(isset($_SESSION['user'])) {
	if($_SESSION['user']==1) {

	} else if($_SESSION['user']==0) {
		header("location:index.php?r=faculty/");
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
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css">
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
    height: 51px;
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

<!-- Page title -->
<?php include("headerMenu.php");?>
<!-- End - Page title -->
<!-- Page body content -->
<section id=page-body-content>
<div id=page-body-content-inner>
<!-- Page content -->
<div id=page-content>
<!-- Video - HTML5 -->

<?php if (isset($_GET['mes'])) : ?>
    <?php if ($_GET['mes']==0): ?>
    <div class="flash-data" data-flashdata="<?= $_GET['mes']?>"></div>
    <?php endif;?>

    <?php if ($_GET['mes']==1): ?>
    <div class="flash-data" data-flashdata="<?= $_GET['mes']?>"></div>
    <?php endif;?>
<?php endif;?>

<section>
<h2 class=underlined-header>List of Applying Accounts</h2>

    <table id = "ProfTable" class="table table-bordered table-striped table-hover" style="width:100%;">
        <thead>
                <tr>
                    <td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;">Faculty Code</td>
                    <td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;">Full Name</td>
                    <td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;">Actions</td>
                </tr>
            </thead>
        <tbody>
            <?php $id = 0 ?>
            <?php foreach ($List as $row): ?>
                <tr>
                    <td style="text-align: center;"><?php echo $row['FCode'] ?></td>
                    <td style="text-align: center;"><?php echo $row['FName']." ".$row['MidInit'].". ".$row['LName'] ?></td>
                    <td style="text-align: center;"><a data-target='#ViewDetails<?php echo $id ?>' data-toggle='modal' href='#ViewDetails<?php echo $id ?>' class="btn btn-primary" style="width:60px">View</a> | <a href="index.php?r=administrator/RejectFaculty&id=<?php echo $row['id'] ?>" class="btn btn-primarydel"style="width:60px">Reject</a></td>
                </tr>
                <?php $id++; ?>
            <?php endforeach ?>                
                               
                
        </tbody>
    </table>

<!-- Modal 1 -->
<?php $id = 0 ?>
<?php foreach ($List as $row): ?>
    <div class="modal fade" id="ViewDetails<?php echo $id ?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form id="annc" name="annc" action="index.php?r=administrator/AcceptFaculty" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color:black;">&times;</span>
            </button>
          <h4 class="modal-title" style="position: absolute; left: 5px;top: 5px;"><?php echo $row['FName']." ".$row['MidInit'].". ".$row['LName'] ?></h4>
        </div>
        <div class="modal-body">
            <p style="margin-bottom: 9px;">
                <label><b>Faculty Code: </b></label> <?php echo $row['FCode'] ?>
            </p>

            <p style="margin-bottom: 9px;">
                <label><b>Employment Type: </b></label> <?php echo $row['Employment_type'] ?>
            </p>

            <p style="margin-bottom: 9px;">
                <label><b>Position: </b></label> <?php echo $row['Position'] ?>
            </p>

            <p style="margin-bottom: 9px;">
                <label><b>Email: </b></label> <?php echo $row['Email'] ?>
            </p>

            <p style="margin-bottom: 9px;">
                <label><b>PUP ID Picture: </b></label>
                <img src="<?php echo Yii::app()->getBaseUrl()."/".$row['id_pic'] ?>">
            </p>

            <input type="hidden" name="user_id" value = "<?php echo $row['id'] ?>">

            
        </div>

        <div class="modal-footer">
          <input id="Accept" type="submit" name="Submit" value="Accept">
          </form>
          <div></div>
        </div>
      </div>
      
    </div>

  </div>
  <?php $id++; ?>
<?php endforeach ?>
  
<!-- End of Modal -->

</section>
<!-- End - Showcase gallery -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->
<aside class=page-sidebar>
<section class='widget-container widget-categories'>
<h2 class=widget-heading>Faculty and Staff Management</h2>
<div class=widget-content>
<?php include("facultyMenu.php");?>
</div>
</section>
</aside>
<!-- End - Page sidebar -->
</div>
</section>
<!-- End - Page body content -->

<!-- End - Page body -->

<!-- Page footer -->
<footer id=page-footer>
<div class=container-aligner>
<!-- Footer left -->
<section id=footer-left>
© Copyright 2022 <a href="#" title="Dbooom Themes">FSIS DEVELOPMENT TEAM | PUP Taguig</a> - All Rights Reserved.
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
<script src='<?php echo Yii::app()->getBaseUrl() ?>assets/jquery-3.6.0.min.js'></script>
<script src='<?php echo Yii::app()->getBaseUrl() ?>assets/sweetalert2.all.min.js'></script>
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl() ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl() ?>assets/js/datatables.min.js"></script>
<script id=js-dispatcher src='scripts/scripts.js'></script>

<script>
    
    var ProfTable = $("#ProfTable").DataTable({
        "scrollY":        "50vh",
      "scrollCollapse": true,
      "paging":         false,
        "lengthChange": false,
        "searching": false,
    
        columnDefs: [ {
            orderable: false,
            targets:   0
        } ]
       

    });

    flashdata = $('.flash-data').data('flashdata')
    if(flashdata==0){
        Swal.fire({
            icon:'success',
            title:'Success!',
            text:'Faculty Accepted'
            
        })
    }
    if(flashdata==1){
        Swal.fire({
            icon:'info',
            title:'Success!',
            text:'Faculty Rejected'
            
        })
    }

    $('.btn-primarydel').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Are you sure?',
            text: 'You want to delete this permanently?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dd2a38',
            cancelButtonColor: '#637d97',
            confirmButtonText: 'Confirm',

        }).then((result) => {
            if(result.value){
                document.location.href = href;
            }
        });
    })

    
</script>
</body>
</html>
