<!-- Style for report dropdown  -->
 <style>
.dropbtn {
  /*background-color: #04AA6;*/
  color: black;
  padding: 16px;
  font-size: 12px;
  border: none;
}


.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  /*box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);*/
  z-index: 1;
}
 
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  background-color: ghostwhite;
  display: block;
}

.dropdown-content a:hover {background-color: none;}

.dropdown:hover .dropdown-content {display: inline-block;}

/*.dropdown:hover .dropbtn {background-color: #3e8e41;}*/
</style>

<!-- Get montha nd year passed on page -->
<?php 
  $m = $_GET['m'];
  $y = $_GET['y'];
?>
<li>
	<a href='index.php?r=administrator/IPCRcreatejantojune<?php echo'&m='.$m.'&y='.$y.''?>' title="Create IPCR of specified month and year">Create IPCR</a>
</li>

<li>
	<a href="index.php?r=administrator/IPCRlist<?php echo'&m='.$m.'&y='.$y.''?>" title="Evaluate faculty submitted IPCR">Evaluation</a>
</li>

<li>
  <a href="index.php?r=administrator/IPCRdeadlineExtend2<?php echo'&m='.$m.'&y='.$y.''?>" title="Extend IPCR deadline of faculty">Deadline Extension</a>
</li>

<!-- <li>
	<a href='index.php?r=administrator/IPCRemailnotif' title="Send Individual Email For Faculty">Send IPCR Email Notification</a>
</li> -->

<div class="dropdown">
  <li class="dropbtn">Reports</li>
  <div class="dropdown-content">
    <a href="index.php?r=administrator/IPCRreport3<?php echo'&m='.$m.'&y='.$y.''?>" title="Generate Report (PDF)">Generate IPCR (PDF)</a>
    <a href="index.php?r=administrator/IPCRinterpolview2<?php echo'&m='.$m.'&y='.$y.''?>" title="Generate Report (Excel)">Generate Interpolation (Excel)</a>
  </div>
</div>