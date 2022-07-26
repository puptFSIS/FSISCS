<?php
session_start();
include("config.php");
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
<title>Colleges | View Faculty</title>
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

.dataTables_filter {
   float: left !important;
}

.dataTables_filter input {
width: 300px;
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
<section id=page-body-content>
<div id=page-body-content-inner>
<!-- Page content -->
<div id=page-content>
<!-- Video - HTML5 -->
<section>

<?php if (isset($_GET['mes'])) : ?>
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
<?php endif;?>

<h2 class="underlined-header">Faculty Members on <?php echo $CollegeName ?></h2>
<button data-toggle="modal" data-target="#myModal1" style="height: 30px; width:100px; text-align: center;">Add Faculty</button>
<br />
<br />

<section>

<table id="FacultyTable" class=round-3 style="width:100%; ">
    <thead>
        <tr>
            <th style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"><h5>Faculty</h5></th>
            <th style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"><h5>Action</h5></th>
        </tr>
    </thead>


    <tbody>
        <?php foreach ($facWithColleges as $row): ?>
            <tr>
                <td style="text-align: center; text-transform: uppercase;"><?php echo $row['LName'].", ".$row['FName']?></td>
                <td><center><a href="index.php?r=administrator/DeleteFacultyCollege&fcode=<?php echo $row['FCode'] ?>&college=<?php echo $id ?>&collegeName=<?php echo $CollegeName ?>" class="btn btn-mini">Delete</a></center></td>
            </tr>
        <?php endforeach ?>
            
        
    </tbody>
</table>

</section>

<!-- Modal 1 -->
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form id="annc" name="annc" action="index.php?r=administrator/processAddFacultyToColleges" method="post">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color:black;">&times;</span>
            </button>
          <h4 class="modal-title" style="position: absolute; left: 5px;top: 5px;">Add Faculty to <?php echo $CollegeName ?></h4>
        </div>
        <div class="modal-body">
            <p id="result" style="position: absolute; top: 30px; left: 650px">Receipient/s Selected: 0</p>
            <table id = "ProfTable" class="table table-bordered table-striped table-hover" style="width:100%;">
                <thead style="display:none;">
                        <tr>
                            <td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"> </td>
                            <td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">NAME</td>
                        </tr>
                </thead>
                <tbody>
                    <?php foreach ($facNoColleges as $row): ?>
                        <?php if ($row['FCode'] != "" || !empty($row['FCode'])): ?>
                        <tr>
                            <td style="text-align: center;width: 50px;"><input style = "width: 17px; height: 17px;" type="checkbox" id = "checks" name="fcode1[]" value = "<?php echo $row['FCode']?>"></td>
                            <td style="text-align: center; text-transform: uppercase;"><input type="hidden" name="fcode2[]" value = "<?php echo $row['FCode']?>"><?php echo $row['LName'].", ".$row['FName']?></td>
                            <input type="hidden" name="college" value="<?php echo $id ?>">
                            <input type="hidden" name="collegeName" value="<?php echo $CollegeName ?>">
                        </tr>
                        <?php endif ?>
                        
                    <?php endforeach; ?>                
                        
                </tbody>
            </table>
        </div>

        <div class="modal-footer">
          <input id="sub" type="submit" name="Submit">
          </form>
        </div>
      </div>
    </div>
</div>
    <!-- Modal 1 -->


</section>
<!-- End - Page body content -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->
<aside class=page-sidebar style="display: inline-block;">
<section class='widget-container widget-categories'>
<div class=widget-content>
<?php include("SchedulingMenu.php");?>

</div>
</section>
</aside>

<aside class="page-sidebar" style="display: inline-block;position: absolute;">
<section class='widget-container widget-categories'>
<div class=widget-content>

<?php include("SchedulingMenu2.php");?>

</div>


</section>
</aside>
<!-- End - Page sidebar -->
</div>
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
<script type="text/javascript" src="assets/js/datatables.min.js"></script>
<script id=js-dispatcher src='scripts/scripts.js'></script>
<script>
    var FacultyTable = $("#FacultyTable").DataTable({
        "scrollY":        "50vh",
        "scrollCollapse": true,
        "paging":         false,
        "lengthChange": false,
        language: { 
        search: "", 
        searchPlaceholder: "Search:",
        emptyTable: "No Colleges Available.", },
        columnDefs: [ {
            orderable: false,
            targets:   0,
        } ],
        

    });

    var table = $("#ProfTable").DataTable({
        "scrollY":        "50vh",
        "scrollCollapse": true,
        "paging":         false,
        "lengthChange": false,
        language: { 
        search: "", 
        searchPlaceholder: "Name:",
        emptyTable: "Subject/s are not available in this Curriculum.", },
        columnDefs: [ {
            orderable: false,
            targets:   0,
        } ],

    });

    $("#sub").on('click', function(e){
        table.destroy();
    });

    var increment2=0; 
    $('input:checkbox').click(function () { 
        if (this.checked) {
            increment2++;                 
        } else {
            increment2--;
        }
        $('#result').html( 'Receipient/s Selected: ' + increment2 + '');             
    })

    flashdata = $('.flash-data').data('flashdata')
    if(flashdata==1){
        Swal.fire({
            icon:'success',
            title:'Success!',
            text:'Faculty Added'
            
        })
    }

    if(flashdata==2){
        Swal.fire({
            icon:'success',
            title:'Success!',
            text:'Faculty Deleted'
            
        })
    }
</script>
</body>
</html>
