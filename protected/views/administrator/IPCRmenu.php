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
  display: block;
}

.dropdown-content a:hover {background-color: none;}

.dropdown:hover .dropdown-content {display: inline-block;}

/*.dropdown:hover .dropbtn {background-color: #3e8e41;}*/
</style>

 <li>
	<a href='index.php?r=administrator/IPCRcreate' title="Create IPCR of specified month and year">Create IPCR</a>
</li>

<li>
	<a href="index.php?r=administrator/IPCRratingsremarks" title="Evaluate faculty submitted IPCR">Evaluation</a>
</li>

<li>
	<a href="index.php?r=administrator/IPCRvalidation">IPCR Validation</a>
</li>
<li>
	<a href='index.php?r=administrator/IPCRemailnotif' title="Send Individual Email For Faculty">Send IPCR Email Notification</a>
</li>

<div class="dropdown">
  <li class="dropbtn">Reports</li>
  <div class="dropdown-content">
    <a href="index.php?r=administrator/IPCRreport1" title="Generate Report (PDF)">Generate IPCR (PDF)</a>
    <a href="index.php?r=administrator/IPCRinterpolview" title="Generate Report (Excel)">Generate Interpolation (Excel)</a>
  </div>
</div>


<!-- <li>
	<a href="index.php?r=administrator/IPCRreport1" title="Generate Report (PDF)">Generate IPCR (PDF)</a>
</li>

<li>
	<a href="index.php?r=administrator/IPCRinterpolview" title="Generate Report (Excel)">Generate Interpolation (Excel)</a>
</li>  -->

 <!-- <li>
	<a href='#' title="IPCR (PDF) and Interpolation (Excel)">Generate Report</a>
</li> -->

