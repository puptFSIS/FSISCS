
<!-- //cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css -->
<!-- <script src="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"></script> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>




<div class="table-responsive">
	<a href="index.php?r=administrator/DtrTable&sort=pending"><input type="button" value="pending" /></a>
	<a href="index.php?r=administrator/DtrTable&sort=approved"><input type="button" value="approved"/></a>
	<a href="index.php?r=administrator/DtrTable&sort=disapproved"><input type="button" value="disapproved"/></a>

	<a href="index.php?r=administrator/DtrTable&sort=deleted"><input type="button" value="deleted"/></a>
	<!-- <a href="index.php?r=administrator/DtrTable&sort=recent"><input type="button" value="recent"/></a> -->
	</p>
	<table id="ProfTable" class="table table-striped table-bordered">
		<thead >
			<tr>
				<th><h5><strong></strong></h5></th>
				<th><h5><strong>ID</strong></h5></th>
				<th hidden><h5><strong>Fcode</strong></h5></th>
				<th><h5><strong>Last Name</strong></h5></th>
				<th><h5><strong>First Name</strong></h5></th>
				<th><h5><strong>Middle Name</strong></h5></th>
				<th><h5><strong>Load Type</strong></h5></th>
				<th><h5><strong>Month</strong></h5></th>
				<th><h5><strong>Year</strong></h5></th>
				<th><h5><strong>Actions</strong></h5></th>
				<!-- <th><h5><strong></strong></h5></th> -->

			</tr>
		</thead>
		<tbody>

			<?php include("dtrlist.php"); ?>
		
			<tfoot>
				<tr>
					<td style="font-size: 12px; font-style: italic;" colspan=9><?php echo "DTR List";?></td>
				</tr>
			</tfoot>
		</tbody>

	</table>




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


        language: { 
        search: "", 

        searchPlaceholder: "Search:" },
        columnDefs: [ {
            orderable: false,
            targets:   0,
        } ],


    });


    $(document).ready(function() {
    $('#ProfTable').DataTable( {
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return 'Details for '+data[0]+' '+data[1];
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table'
                } )
            }
        }
    } );
} );

</script>