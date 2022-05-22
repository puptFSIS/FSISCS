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
	/*                                         */
	/* The switch - the box around the slider */

		.switch {
		  position: relative;
		  display: inline-block;
		  width: 60px;
		  height: 34px;
		}

		/* Hide default HTML checkbox */
		.switch input {
		  opacity: 0;
		  width: 0;
		  height: 0;
		}

		/* The slider */
		.slider {
		  position: absolute;
		  cursor: pointer;
		  top: 0;
		  left: 0;
		  right: 0;
		  bottom: 0;
		  background-color: #ccc;
		  -webkit-transition: .4s;
		  transition: .4s;
		}

		.slider:before {
		  position: absolute;
		  content: "";
		  height: 26px;
		  width: 26px;
		  left: 4px;
		  bottom: 4px;
		  background-color: white;
		  -webkit-transition: .4s;
		  transition: .4s;
		}

		input:checked + .slider {
		  background-color: #2196F3;
		}

		input:focus + .slider {
		  box-shadow: 0 0 1px #2196F3;
		}

		input:checked + .slider:before {
		  -webkit-transform: translateX(26px);
		  -ms-transform: translateX(26px);
		  transform: translateX(26px);
		}

		/* Rounded sliders */
		.slider.round {
		  border-radius: 34px;
		}

		.slider.round:before {
		  border-radius: 50%;
		}
</style>


<!-- //cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css -->
<!-- <script src="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"></script> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- <h3>Validation</h3>
<label class="switch">
		<input type="checkbox">
		<span class="slider round"></span>
	</label>
<br> -->
SHOW:
<a href="index.php?r=administrator/DtrTable&sort=pending"><input type="button" value="Pending" /></a>
	<a href="index.php?r=administrator/DtrTable&sort=approved"><input type="button" value="Approved"/></a>
	<a href="index.php?r=administrator/DtrTable&sort=disapproved"><input type="button" value="Disapproved"/></a>

	<a href="index.php?r=administrator/DtrTable&sort=deleted"><input type="button" value="Deleted"/></a>
	
	


<br>
<br>
<div class="table-responsive" id="container" >
	
	<!-- <a href="index.php?r=administrator/DtrTable&sort=recent"><input type="button" value="recent"/></a> -->
	
	<div class="container2">
		
		<table id="ProfTable" class="table table-striped table-bordered">
			<thead >
				<tr>
					<th><h5><strong></strong></h5></th>
					<th style="text-align: center;"><h5><strong>ID</strong></h5></th>
					<th hidden><h5><strong>Fcode</strong></h5></th>
					<th style="text-align: center;"><h5><strong>Name</strong></h5></th>
					<th hidden style="text-align: center;"><h5><strong>First Name</strong></h5></th>
					<th hidden style="text-align: center;"><h5><strong>Middle Name</strong></h5></th>
					<th style="text-align: center;"><h5><strong>Load Type</strong></h5></th>
					<th style="text-align: center;"><h5><strong>Month</strong></h5></th>
					<th style="text-align: center;"><h5><strong>Year</strong></h5></th>
					<th style="text-align: center;"><h5><strong>Remarks</strong></h5></th>
					<th style="text-align: center;"><h5><strong>Actions</strong></h5></th>
					<!-- <th><h5><strong></strong></h5></th> -->

				</tr>
			</thead>
			<tbody>

				<?php include("dtrlist.php"); ?>
			
				<tfoot>
					<tr>
						<td style="font-size: 12px; font-style: italic;" colspan=9 ><?php echo "DTR List";?></td>
					</tr>
				</tfoot>
			</tbody>

		</table>

	</div>


	<!-- </div> -->
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
	        	"targets": [0,2,3,4,5,6,7,8,9,10],
	        	"orderable": false ///remove sorting sa lahat ng column maliban sa isa
	        }
        ],


        language: { 
        search: "", 

        searchPlaceholder: "Search:" }


    });




</script>