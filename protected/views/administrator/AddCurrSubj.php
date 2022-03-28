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
<title>New Room</title>
<!-- Page icon -->
<link href='puplogo.ico' rel='shortcut icon'/>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/dataTables.checkboxes.css">
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
    <header id=page-title>
<?php include("headerMenu.php");?>
    </header>
<!-- End - Page title -->
<!-- Page body content -->
<section id=page-body-content>
<div id=page-body-content-inner>
<!-- Page content -->
<div id=page-content>
<!-- Video - HTML5 -->

<section>
<h2 class=underlined-header>Add Subject to <?php echo $course; $year=$_GET['year']; echo $year.'-1';?></h2>
<form name="frmcurr" method = "post" action = "index.php?r=administrator/processAddCurrSubj">
<table id = "SubjTable" class="table table-bordered table-striped table-hover" style="width:100%;">
	<thead>
			<tr>
				<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"> </td>
				<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">CODE</td>
				<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">TITLE</td>
				<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">LEC</td>
				<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">LAB</td>
				<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">UNITS</td>
			</tr>
		</thead>
	<tbody>
		<?php foreach ($subjects as $row): ?>
			<tr>
				<td style="text-align: center;"><input  style = "width: 17px; height: 17px;" type="checkbox" id = "checks" name="subjID1[]" value = "<?php echo $row['SubjCode']?>"></td>
				<td style="text-align: center;"><input type="hidden" name="subjID2[]" value = "<?php echo $row['SubjCode']?>"><?php echo $row['SubjCode']?></td>
				<td style="text-align: left;"><input type="hidden" name="subjTitle[]" value = "<?php echo $row['SubjDescription']?>"><?php echo $row['SubjDescription']?></td>
				<td style="text-align: center;"><input type="hidden" name="subjLec[]" value = "<?php echo $row['HoursLab']?>"><?php echo $row['HoursLab']?></td>
				<td style="text-align: center;"><input type="hidden" name="subjLab[]" value = "<?php echo $row['HoursLec']?>"><?php echo $row['HoursLec']?></td>
				<td style="text-align: center;"><input type="hidden" name="subjUnit[]" value = "<?php echo $row['Units']?>"><?php echo $row['Units']?></td>	
			</tr>
		<?php endforeach; ?>				
			
	</tbody>
</table>
<br>
<center><input id = "sub" type="submit" name="Submit" disabled></center>
<p id="result" style="position: absolute; top: 130px; left: 950px">Subject/s Selected: </p>

	<input type="hidden" name="sem" value="<?php echo $_GET['sem'];?>" />
	<input type="hidden" name="courseID" value="<?php echo $_GET['courseID']; ?>" />
	<input type="hidden" name="year" value="<?php echo $_GET['sy']; ?>" />
	<input type="hidden" name="cyear" value="<?php echo $_GET['year']; ?>" />
	<input type="hidden" name="currID" value="<?php echo $_GET['currID']; ?>" />
	<input type="hidden" name="currYear" value="<?php echo $_GET['currYear']; ?>" />
	
		
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
<div class=widget-content>
<ul class='widget-list categories-list'>
<?php include("SchedulingMenu.php");?>
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
<script type="text/javascript" src="assets/js/dataTables.checkboxes.min.js"></script>
<script id=js-dispatcher src='scripts/scripts.js'></script>
<script>
	showChecked();
	$('input:checkbox').click(function () {
		if ($(this).is(':checked')) {
			$("#sub").attr("disabled", false);
			
		} else {
			 $("#sub").attr("disabled", true);
		}
	});

	var SubjTable = $("#SubjTable").DataTable({
		"scrollY":        "50vh",
        "scrollCollapse": true,
        "paging":         false,
		"lengthChange": false,
		language: { 
		search: "", 
		searchPlaceholder: "Search by Subject Code or Subject Title",
		emptyTable: "Subject/s are not available in this Curriculum.", },
		columnDefs: [ {
            orderable: false,
            targets:   0,
        } ],
        

	});

	function showChecked(){
		document.getElementById("result").textContent = "Subject/s Selected: " + document.querySelectorAll("input:checked").length;
	}

	document.querySelectorAll("input[id=checks]").forEach(i=>{
		i.onclick = function(){
			showChecked();
		}
	});

	$('.dataTables_filter').addClass('pull-left');

	$("#sub").on('click', function(e){
		SubjTable.destroy();
	});

	flashdata = $('.flash-data').data('flashdata')
	if(flashdata==1){
		Swal.fire({
			icon:'success',
			title:'Success!',
			text:'Preferred Subject Added'
			
		})
	}

	if(flashdata==2){
		Swal.fire({
			icon:'error',
			title:'Ooops!',
			text:'Please Select a Subject!',
			
		})
	}
</script>
</body>
</html>

