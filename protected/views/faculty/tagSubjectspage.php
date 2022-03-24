<?php
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
<title>Scheduling | Tag Subjects </title>
<!-- Page icon -->
<!-- Stylesheets -->
<link href='puplogo.ico' rel='shortcut icon'/>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/dataTables.checkboxes.css">
<style media=screen type='text/css'>@import "styles/base.css";
.cssLT #ut, .cssUT #ut{filter:progid:DXImageTransform.Microsoft.DropShadow(enabled=false);}
.cssWLGradientIMG{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMGSSL{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMG
{BACKGROUND-IMAGE: url(images/hd.jpg);BACKGROUND-REPEAT:repeat-x;top:0;height:105px;}
aside.page-sidebar{
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
<?php include("nav.php");?>
<!-- End - Page title -->
<!-- Page body content -->
<section id=page-body-content>
<div id=page-body-content-inner>
<!-- Page content -->

<div id=page-content>
<!-- Video - HTML5 -->
<?php if ($_GET['sem']==1): ?>
	<h2 class="underlined-header">Tag Subjects for A.Y. <?php echo $_GET['sy']?> 1st Semester</h2>
<?php endif ?>

<?php if ($_GET['sem']==2): ?>
	<h2 class="underlined-header">Tag Subjects for A.Y. <?php echo $_GET['sy']?> 2nd Semester</h2>
<?php endif ?>

<section>
<form id="SubjForm" method="post" action="index.php?r=faculty/TagSubjectADD">
<?php if (isset($_GET['sem'])): ?>
	<input type="hidden" name="sem" value="<?php echo $_GET['sem']?>">
<?php endif ?>
<?php if (isset($_GET['sy'])): ?>
	<input type="hidden" name="sy" value="<?php echo $_GET['sy']?>">
<?php endif ?>
<?php if (isset($_POST['sem'])): ?>
	<input type="hidden" name="sem" value="<?php echo $_POST['sem']?>">
<?php endif ?>
<?php if (isset($_POST['sy'])): ?>
	<input type="hidden" name="sy" value="<?php echo $_POST['sy']?>">
<?php endif ?>

<?php if ($totUnits == $currentTotalUnits): ?>
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
		<?php $id = 0; ?>
		<?php foreach ($subjects as $row): ?>
			<tr>
				<td style="text-align: center;"><input style = "width: 17px; height: 17px;" type="checkbox" id = "<?php echo $id?>" name="subjID1[]" value = "<?php echo $row['scode']?>" disabled></td>
				<td style="text-align: center;"><input type="hidden" name="subjID2[]" value = "<?php echo $row['scode']?>"><?php echo $row['scode']?></td>
				<td style="text-align: left;"><input type="hidden" name="subjTitle[]" value = "<?php echo $row['stitle']?>"><?php echo $row['stitle']?></td>
				<td style="text-align: center;"><input type="hidden" name="subjLec[]" value = "<?php echo $row['hrs_lab']?>"><?php echo $row['hrs_lec']?></td>
				<td style="text-align: center;"><input type="hidden" name="subjLab[]" value = "<?php echo $row['hrs_lec']?>"><?php echo $row['hrs_lab']?></td>
				<td style="text-align: center;"><?php echo $row['sunit']?><input type="hidden" name="subjUnit[]" value = "<?php echo $row['sunit']?>"></td>	
			</tr>
			<?php $id++; ?>
		<?php endforeach; ?>				
			
	</tbody>
</table>
<?php else: ?>
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
		<?php $id = 0; ?>
		<?php foreach ($subjects as $row): ?>
			<tr>
				<td style="text-align: center;"><input style = "width: 17px; height: 17px;" type="checkbox" id = "<?php echo $id?>" name="subjID1[]" value = "<?php echo $row['scode']?>"></td>
				<td style="text-align: center;"><input type="hidden" name="subjID2[]" value = "<?php echo $row['scode']?>"><?php echo $row['scode']?></td>
				<td style="text-align: left;"><input type="hidden" name="subjTitle[]" value = "<?php echo $row['stitle']?>"><?php echo $row['stitle']?></td>
				<td style="text-align: center;"><input type="hidden" name="subjLec[]" value = "<?php echo $row['hrs_lab']?>"><?php echo $row['hrs_lec']?></td>
				<td style="text-align: center;"><input type="hidden" name="subjLab[]" value = "<?php echo $row['hrs_lec']?>"><?php echo $row['hrs_lab']?></td>
				<td style="text-align: center;"><?php echo $row['sunit']?><input type="hidden" name="subjUnit[]" value = "<?php echo $row['sunit']?>"></td>	
			</tr>
			<?php $id++; ?>
		<?php endforeach; ?>				
			
	</tbody>
</table>
<?php endif ?>

<center><input id = "sub" type="submit" name="Submit"></center>
<p style="position: absolute; top: 175px; left: 1000px">Maximum Units Allowed: <?php echo $totUnits?></p>
<p id="result" style="position: absolute; top: 175px; left: 1240px">Total Units Selected: <?php echo $currentTotalUnits?></p>
</form>
<?php if (isset($_GET['mes'])) : ?>
	<?php if ($_GET['mes']==1): ?>
	<div class="flash-data" data-flashdata="<?= $_GET['mes']?>"></div>
	<?php endif;?>

	<?php if ($_GET['mes']==2): ?>
	<div class="flash-data" data-flashdata="<?= $_GET['mes']?>"></div>
	<?php endif;?>
<?php endif;?>

</section>
<!-- End - Page body content -->
</div>
<!-- End - Page content -->
<!-- Page sidebar-->
<aside class=page-sidebar>
<section class='widget-container widget-categories'>
<div class=widget-content>
<ul class='widget-list categories-list'>
<?php include("SubjectMenu.php");?>
</ul>
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
<script type="text/javascript" src="assets/js/dataTables.checkboxes.min.js"></script>
<script id=js-dispatcher src='scripts/scripts.js'></script>
<script>
	var total = 0;
	var limit = <?php echo $totUnits?>;
 	var condLimit = parseInt(limit);
 	var cond = condLimit + 1;

	// $('input:checkbox').click(function () {
	// 	if ($(this).is(':checked')) {
	// 		$("#sub").attr("disabled", false);
			
	// 	} else {
	// 		 $("#sub").attr("disabled", true);
	// 	}
	// });
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

	

	$('.dataTables_filter').addClass('pull-left');

	$("#sub").on('click', function(e){
		SubjTable.destroy();
	});
	
	/*Solution 3*/
	$('#SubjTable tbody').on('click', 'input[type="checkbox"]', function(e){
      var $row = $(this).closest('tr');

      // // Get row data
      var data = SubjTable.row($row).data();

      // // Get row ID
      var rowId = data[0];

      var id = $(rowId).attr("id");
      

      var units = data[5]


      let unit = parseInt(units.charAt(0));

      if (this.checked) {
	      total += unit;                 
	   } else {
	      total -= unit;                
	   }

	   

	   if (total >= cond) {
	    	total -= unit;
	   	document.getElementById(id).checked=false;
	   	Swal.fire({
		   	icon:'error',
				title:'Ooops!',
				text:'Number of Units Exceeded!'
	   	});
	   }

	   var checkboxes = SubjTable.column(0).nodes(); // Cells from 1st column

		for (var i = 0; i < checkboxes.length; i += 1) {
			if (total >= limit) {
				if(!checkboxes[i].querySelector("input[type='checkbox']").checked){
					checkboxes[i].querySelector("input[type='checkbox']").disabled = true;
				}
			} else {
				if(!checkboxes[i].querySelector("input[type='checkbox']").checked){
					checkboxes[i].querySelector("input[type='checkbox']").disabled = false;
				}
			}
        
    	}

	 	$('#result').html( 'Total Units: ' + total + '');
		
	  
  	});
	

	flashdata = $('.flash-data').data('flashdata');
	if(flashdata==1){
		Swal.fire({
			icon:'success',
			title:'Success!',
			text:'Subject Succesfully Tagged!',
			timer: '2000'
		})
	}

	if(flashdata==2){
		Swal.fire({
			icon:'error',
			title:'Ooops!',
			text:'Choose a Subject!',
		})
	}
</script>	
</body>
</html>

