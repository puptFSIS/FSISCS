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

<li>
	<a href='index.php?r=faculty/IPCRcreatefaculty' title="Edit your copy of Available IPCR">Edit IPCR</a>
</li>

<li>
	<a href="index.php?r=faculty/IPCRevaluationfaculty" title="See Evaluated IPCR">Evaluated IPCR</a>
</li>

<!-- <li>
	<a href="index.php?r=faculty/IPCRreport" title="Generate your Approved IPCR">Generate IPCR (PDF)</a>
</li>
 -->

 <div class="dropdown">
  <li class="dropbtn">Reports</li>
  <div class="dropdown-content">
    <a href="index.php?r=faculty/IPCRreport" title="Generate Report (PDF)">Generate your IPCR (PDF)</a>
    <a href="index.php?r=faculty/IPCRinterpolview" title="Generate Report (Excel)">Generate your Interpolation (Excel)</a>
  </div>
</div>