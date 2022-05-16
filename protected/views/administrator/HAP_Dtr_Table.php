<!DOCTYPE html>
<html>
<div>


<style>


	
	 .table-container
	{
		/*max-width: 100%;*/
	} 
	.table-width
	{
		/*width: 105%;*/
	}


</style>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<div> 
<!-- Video - HTML5 -->
<p style="font-style: italic;">
<!-- On the action column, you must click 2 pdf buttons in order to print it as pdf -->
</p>
<p>
SHOW: 
<!-- <a href="index.php?r=administrator/HAPDtrTable&sort=id"><input type="button" value="ID" /></a>
<a href="index.php?r=administrator/HAPDtrTable&sort=loadtype"><input type="button" value="Load Type" /></a>
<a href="index.php?r=administrator/HAPDtrTable&sort=month"><input type="button" value="Month" /></a>
<a href="index.php?r=administrator/HAPDtrTable&sort=year"><input type="button" value="Year" /></a> -->
   <a href="index.php?r=administrator/HAPDtrTable&sort=pending"><input class="show_pending" id="pending_click" type="button" value="Pending" onclick="changecolor(1)" /></a>
<a href="index.php?r=administrator/HAPDtrTable&sort=approved"><input class="show_approved"  id="approved_click"  type="button" value="Approved" /></a>
<a href="index.php?r=administrator/HAPDtrTable&sort=disapproved"><input class="show_disapproved" id="disapproved_click"   type="button" value="Disapproved" /></a>

</p>

<table id="ProfTable" class="table table-striped table-bordered" style="margin-left: -80px; margin-">
<thead>
   
<tr>
<th><h5><strong>ID</strong></h5></th>
<th hidden><h5><strong>Fcode</strong></h5></th>
<th><h5><strong>Last Name</strong></h5></th>
<th><h5><strong>First Name</strong></h5></th>
<th><h5><strong>Middle Name</strong></h5></th>
<th><h5><strong>Load Type</strong></h5></th>
<th><h5><strong>Month</strong></h5></th>
<th><h5><strong>Year</strong></h5></th>
<th><h5><strong></strong></h5></th>
<th><h5><strong></strong></h5></th>
<th><h5><strong>Actions</strong></h5></th>
<th><h5><strong></strong></h5></th>



<!-- <th><h5><strong>Action2</strong></h5></th> -->
</tr>
</thead>

	<tbody>

		<?php 
			include("HAP_dtrlist.php");
		?>
		<tfoot>
			<tr>
				<td style="font-size: 12px; font-style: italic;" colspan=9><?php echo "DTR List";?></td>
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
        "scrollY":        "",
        "scrollCollapse": false,
        "paging":         true,
        "lengthChange": true,
        "pagingType": "full_numbers",
		// "scrollX": true,


        language: { 
        search: "", 

        searchPlaceholder: "Search:" },
        columnDefs: [ {
            orderable: false,
            targets:   0,
        } ],


    });

</script>
</html>