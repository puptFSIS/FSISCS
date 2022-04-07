<!DOCTYPE html> 
<html>
<div>
<!-- Page content -->
<style>

.text_format
{
	font-weight: bold;
	font-size: 18px;
}

#note
{
	font-weight: bold;
	font-style: italic;
	color: red;
}
</style>




<div> 
<!-- Video - HTML5 -->
<p style="font-style: italic;">
<!-- On the action column, you must click 2 pdf buttons in order to print it as pdf -->
</p>
<p>
SHOW: 
<!-- <a href="index.php?r=administrator/DtrTable&sort=id"><input type="button" value="ID" /></a>
<a href="index.php?r=administrator/DtrTable&sort=loadtype"><input type="button" value="Load Type" /></a>
<a href="index.php?r=administrator/DtrTable&sort=month"><input type="button" value="Month" /></a>
<a href="index.php?r=administrator/DtrTable&sort=year"><input type="button" value="Year" /></a> -->
<a href="index.php?r=administrator/DtrTable&sort=pending"><input type="button" value="pending" /></a>
<a href="index.php?r=administrator/DtrTable&sort=disapproved"><input type="button" value="disapproved"/></a>
<a href="index.php?r=administrator/DtrTable&sort=approved"><input type="button" value="approved"/></a>
<a href="index.php?r=administrator/DtrTable&sort=deleted"><input type="button" value="deleted"/></a>
<a href="index.php?r=administrator/DtrTable&sort=recent"><input type="button" value="recent"/></a>
</p>

<form name="searchby" id="searchby" action="index.php?r=administrator/DtrTable" method="post">
<select name="dtrsearch" id="dtrsearch" style="width: 15%;">
	<option disabled selected value> -- Select an option -- </option>
	<option value="month">Month</option>
	<option value="year">Year</option>
	<option value="regpart">Load Type</option>
</select>
<input name="dtrsearchinput" id="dtrsearchinput" style="margin-top: -36px; margin-left: 160px; width: 350px;" type="text" placeholder="Search..." />
<input type="submit" value="Search"/>
</form>


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
</tr>
</thead>

<tbody>

<?php 
include("dtrlist.php"); 


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