


<style>
	
	.outer_container
	{
		width: 1000px;
		margin-top: 50px;
		background-color: ghostwhite;
		border: 2px solid;
		padding: 10px;
	}

	.inner_container
	{
		width: 100%;
		margin-top: 50px;
		background-color: #f7f7f7;
	}

</style>


<a href="index.php?r=administrator/ListOfFac&sort=all"><input type="button" value="View All" /></a>
<a href="index.php?r=administrator/ListOfFac&sort=passed"><input type="button" value="Already Passed"/></a>
<a href="index.php?r=administrator/ListOfFac&sort=notyet"><input type="button" value="Not Passing Yet"/></a>


<div  class="outer_container">
	
	<div id="list_of_faculty_div" class="inner_container" >
	
	<!-- <h1>
		<strong>
			FACULTY MEMBERS WITH SCHEDULE
		</strong>
	</h1> -->


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
	        	"targets": [0,1,2],
	        	"orderable": false ///remove sorting sa lahat ng column maliban sa isa
	        }
        ],



        language: { 
        search: "", 

        searchPlaceholder: "Search:" }


    });



</script>