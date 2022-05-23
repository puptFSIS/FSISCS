<!-- <!DOCTYPE html>
<html> -->
<!-- <div> -->


<style>


	
	 #container
	{
		/* max-width: 650px; */
		width: 1000px;
		margin-top: 50px;
		/*background-color: #f7f7f7;*/
		background-color: ghostwhite;
		border: 2px solid;
		padding: 10px;
		/* overflow: hidden; */
	}
	
	.container
	{
		width: 100%;
		margin-top: 50px;
		background-color: #f7f7f7;
	}


</style>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- <div>  -->
<!-- Video - HTML5 -->
<!-- <p style="font-style: italic;"> -->
<!-- On the action column, you must click 2 pdf buttons in order to print it as pdf -->
<!-- </p> -->
<!-- <p> -->
SHOW: 
<a href="index.php?r=administrator/HAPDtrTable&sort=pending"><input class="show_pending" id="pending_click" type="button" value="Pending" onclick="changecolor(1)" /></a>
	<a href="index.php?r=administrator/HAPDtrTable&sort=approved"><input class="show_approved"  id="approved_click"  type="button" value="Approved" /></a>
	<a href="index.php?r=administrator/HAPDtrTable&sort=disapproved"><input class="show_disapproved" id="disapproved_click"   type="button" value="Disapproved" /></a>


<br>
<br>
<div class="table-responsive" id="container" >

	

	<!-- </p> -->

	
	<div class="container2">
		
	<table id="ProfTable" class="table table-striped table-bordered" >
	<thead>
	   
	<tr>
					<!-- <th><h5><strong></strong></h5></th> -->

	<th style="text-align: center;"><h5><strong>ID</strong></h5></th>
	<th hidden><h5><strong>Fcode</strong></h5></th>
	<th style="text-align: center;"><h5><strong>Name</strong></h5></th>
	<th hidden><h5><strong>First Name</strong></h5></th>
	<th hidden><h5><strong>Middle Name</strong></h5></th>
	<th style="text-align: center;"><h5><strong>Load Type</strong></h5></th>
	<th style="text-align: center;"><h5><strong>Month</strong></h5></th>
	<th style="text-align: center;"><h5><strong>Year</strong></h5></th>
	<th style="text-align: center;"><h5><strong></strong></h5></th>
	<th style="text-align: center;"><h5><strong></strong></h5></th>
	<th style="text-align: center;"><h5><strong>Actions</strong></h5></th>
	<th style="text-align: center;"><h5><strong></strong></h5></th>
	<th style="text-align: center;"><h5><strong></strong></h5></th>





	<!-- <th><h5><strong>Action2</strong></h5></th> -->
	</tr>
	</thead>

		<tbody>

			<?php 
				include("HAP_dtrlist.php");
			?>
			<tfoot>
				<tr>
					<td style="font-size: 12px; font-style: italic; font-weight:bold;" colspan=12><?php echo "DTR List";?></td>
				</tr>
			</tfoot>
		</tbody>
	</table>
</div>
</div>

<script src='<?php echo Yii::app()->getBaseUrl() ?>assets/jquery-3.6.0.min.js'></script>
<script src='<?php echo Yii::app()->getBaseUrl() ?>assets/sweetalert2.all.min.js'></script>
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl() ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl() ?>assets/js/datatables.min.js"></script>
<script id=js-dispatcher src='scripts/scripts.js'></script>
<script>
	var ProfTable = $("#ProfTable").DataTable({
        "scrollY":        false,
        "scrollCollapse": false,
        "paging":         true,
        "lengthChange": true,
        "pagingType": "full_numbers",
        "ordering": true, /// allow sorting sa buong table
        "aaSorting": [],   /// remove sorting sa unang column  - 0
        "columnDefs": [
	        {
	        	"targets": [1,2,3,4,5,6,7,8,9,10,11,12],
	        	"orderable": false ///remove sorting sa lahat ng column maliban sa isa
	        }
        ],
        

    	
		

		
        language: { 
        search: "", 
		


        searchPlaceholder: "Search:" }
        
 





    });
//     $("#reporProfTabletgrid").dataTable({"order": [],
//     "aoColumns": [
//     { "bSortable": false },
//     { "bSortable": false },
//     { "bSortable": false },
//     { "bSortable": false },
//     { "bSortable": false },
//     { "bSortable": false }
// ],
// "sDom": '<"top">rt<"bottom"lp><"clear">'});

</script>
