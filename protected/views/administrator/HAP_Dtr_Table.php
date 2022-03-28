<!DOCTYPE html>
<html>


<style>
	
	.show_pending
	{
		color: blue;
		display: none;
	}

</style>

<div>
<!-- Page content -->
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
<a href="index.php?r=administrator/HAPDtrTable&sort=pending"><input class="show_pending" type="button" value="pending" /></a>
<a href="index.php?r=administrator/HAPDtrTable&sort=approved"><input class="show_approved" type="button" value="approved" /></a>
<a href="index.php?r=administrator/HAPDtrTable&sort=disapproved"><input class="show_disaapproved" type="button" value="disapproved" /></a>

</p>

<table>
<thead>
<tr>
<th><h5><strong>ID</strong></h5></th>
<th><h5><strong>Fcode</strong></h5></th>
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
</html>