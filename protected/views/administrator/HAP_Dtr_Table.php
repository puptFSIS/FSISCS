<!DOCTYPE html>
<html>


<style>


	
	/* .table-container
	{
		max-width: 105%;
	} */
	.table-width
	{
		width: 105%;
	}


</style>


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
<a href="index.php?r=administrator/HAPDtrTable&sort=disapproved"><input class="show_disaapproved" id="disapproved_click"   type="button" value="Disapproved" /></a>

</p>

<table class="table-width">
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
<th><h5><strong>Action</strong></h5></th>
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

<script>

	function changecolor(count)
		{
			if(count == 1)
			{
				var pending = document.getElementById('pending_click');
				pending.style.backgroundColor="green";
         }
		}
	

</script>
</html>