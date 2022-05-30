<div id="list_of_faculty_div" class="">
	
	<h1>
		<strong>
			list of faculty members	
		</strong>
	</h1>


	<table  id="ProfTable" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>name</th>
				<th>Status</th>

			</tr>
		</thead>

		<?php include("faculty_list.php"); ?>


		<tfoot>
			<tr>
				<td style="font-size: 12px; font-style: italic;" colspan=3 ><?php echo "Faculty List";?></td>
			</tr>
		</tfoot>

	</table>

</div>






<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src='<?php echo Yii::app()->getBaseUrl() ?>assets/jquery-3.6.0.min.js'></script>
<script src='<?php echo Yii::app()->getBaseUrl() ?>assets/sweetalert2.all.min.js'></script>
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl() ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl() ?>assets/js/datatables.min.js"></script>
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
	        	"targets": [1,2,3,4,5,6,7,8,9,10],
	        	"orderable": false ///remove sorting sa lahat ng column maliban sa isa
	        }
        ],



        language: { 
        search: "", 

        searchPlaceholder: "Search:" }


    });



</script>