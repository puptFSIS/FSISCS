<!DOCTYPE html>
<html>
	<div>
	<!-- Page content -->
		<div>
			

			<table>
				<thead>
					<tr>
						<th><h5><strong>First Name</strong></h5></th>
						<th><h5><strong>Middle Name</strong></h5></th>
						<th><h5><strong>Last Name</strong></h5></th>
						<th><h5><strong>Load Type</strong></h5></th>
						<th><h5><strong>Month</strong></h5></th>
						<th><h5><strong>Year</strong></h5></th>
					</tr>
				</thead>

				<tbody>

					<?php 
						include("HAP_Secretary_list.php");
					 ?>
					 <tfoot>
						<tr>
							<td style="font-size: 12px; font-style: italic;" colspan=9><?php echo " List of Approved DTR's";?></td>
						</tr>
					</tfoot>
				</tbody>
			</table>
		</div>
		
	</div>
</html>