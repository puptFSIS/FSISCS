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
<title>Faculty | List</title>
<!-- Page icon -->
<link href='puplogo.ico' rel='shortcut icon'/>
<!-- Stylesheets -->
<link href='puplogo.ico' rel='shortcut icon'/>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl() ?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl() ?>assets/css/datatables.min.css">
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
    
</style>

<link href='styles/print.css' media=print rel=stylesheet />
<!-- Modernizr library -->
<script src='scripts/libs/modernizr/modernizr.min.js'></script>
<meta charset="UTF-8"></head>
<body class='page-media'>
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
<h2 class=underlined-header>Showing All Active and Inactive Faculty & Staff of PUP Taguig</h2>
<ul class=tags-floated-list>
<li>
<a href="index.php?r=administrator/nfa" style="margin-top:-50px; margin-left:805px;">New Faculty Account</a>
</li>
</ul>

<!-- <form name="searchby" id="searchby" action="index.php?r=administrator/lfa" method="post">
<select name="acc" id="acc" style="width: 15%;">
    <option value="sname">Surname</option>
    <option value="fname">First Name</option>
</select>
<input name="stbox" id="stbox" style="margin-top: -36px; margin-left: 160px; width: 350px;" type="text" placeholder="Search..." />
<input type="submit" value="Search"/> -->
<hr>

<section>
    <table id="FacultyTable" class="table table-bordered table-striped table-hover" style="width: 100%" >
        <thead>
            <tr>
                <th style="background-color: maroon; color: white; font-weight: bold; text-align: center;">Code</th>
                <th style="background-color: maroon; color: white; font-weight: bold; text-align: center;">Emp.No.</th>
                <th style="background-color: maroon; color: white; font-weight: bold; text-align: center;">Last Name</th>
                <th style="background-color: maroon; color: white; font-weight: bold; text-align: center;">First Name</th>
                <th style="background-color: maroon; color: white; font-weight: bold; text-align: center;">Middle Initial</th>
                <th style="background-color: maroon; color: white; font-weight: bold; text-align: center;">Role</th>
                <th style="background-color: maroon; color: white; font-weight: bold; text-align: center;">Type</th>
                <th style="background-color: maroon; color: white; font-weight: bold; text-align: center;">Status</th>
                <th style="background-color: maroon; color: white; font-weight: bold; text-align: center;">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($FacultyList as $row): ?>
            <?php 
            if ($row['EmpID']==null or $row['EmpID']==""){
                $EID = "not set";
            } else {
                $EID = $row['EmpID'];
            }

            if($row['status']=="Inactive") {
                // $title = "Click to deactivate.";
                $link = "index.php?r=administrator/afa&EmpID=";
            } else {
                // $title = "Click to activate.";
                $link = "index.php?r=administrator/dfa&EmpID=";
            }
        ?>
            <tr>
                <td style="text-align: center;"><?php echo $row['FCode'] ?></td>
                <td style="text-align: center;"><?php echo $EID ?></td>
                <td style="text-align: center;"><?php echo $row['LName'] ?></td>
                <td style="text-align: center;"><?php echo $row['FName'] ?></td>
                <td style="text-align: center;"><?php echo $row['MName'] ?></td>
                <td style="text-align: center;"><?php echo $row['evalRoles']?></td>
                <td style="text-align: center;"><?php echo $row['enu_employmentStat']?></td>
                <td style="text-align: center;"><?php echo ucfirst($row['status'])?></a></td>
                <td><center><a class="btn-s" style="width: 30px; height: 20px;" href="index.php?r=administrator/view&EmpID=<?php echo $EID ?>&FCode=<?php echo $row['FCode'] ?>"> <img src="images/icons/info-white.png"></a><br><a class="btn-s" style="width: 30px; height: 20px;" href="<?php echo $link."".$EID ?>"><img src="images/icons/x-white.png"></a></center> </td>
            </tr>
        
        <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan=9><?php echo count($FacultyList) . " Faculty Members";?></td>
            </tr>
        </tfoot>
    </table>
</section>
</section>
<!-- End - Showcase gallery -->
</div>

<!-- End - Page content -->
<!-- Page sidebar -->
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
� Copyright 2011 <a href="#" title="Dbooom Themes">vCore Team | PUP Taguig</a> - All Rights Reserved.
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
        "scrollY":        "60vh",
      "scrollCollapse": true,
      "paging":         false,
        "lengthChange": false,
        
        language: { 
        search: "", 
        searchPlaceholder: "Search:",
        emptyTable: "No Record" },
        columnDefs: [ {
            orderable: false
            
        } ],
       

    });

    $('.dataTables_filter').addClass('pull-left');

    $("#sub").on('click', function(e){
        SubjTable.destroy();
    });


</script>
</body>
</html>
