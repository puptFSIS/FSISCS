<style>
	.thead
	{
		/*background-color: gray;*/
	}

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


		/* -------------------------------------------- */
		/* dropdown */

		/*the container must be positioned relative:*/
		.custom-select {
		  position: relative;
		  font-family: Arial;
		}

		.custom-select select {
		  display: none; /*hide original SELECT element:*/
		}

		.select-selected {
		  background-color: DodgerBlue;
		}

		/*style the arrow inside the select element:*/
		.select-selected:after {
		  position: absolute;
		  content: "";
		  top: 14px;
		  right: 10px;
		  width: 0;
		  height: 0;
		  border: 6px solid transparent;
		  border-color: #fff transparent transparent transparent;
		}

		/*point the arrow upwards when the select box is open (active):*/
		.select-selected.select-arrow-active:after {
		  border-color: transparent transparent #fff transparent;
		  top: 7px;
		}

		/*style the items (options), including the selected item:*/
		.select-items div,.select-selected {
		  color: #ffffff;
		  padding: 8px 16px;
		  border: 1px solid transparent;
		  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
		  cursor: pointer;
		  user-select: none;
		}

		/*style items (options):*/
		.select-items {
		  position: absolute;
		  background-color: DodgerBlue;
		  top: 100%;
		  left: 0;
		  right: 0;
		  z-index: 99;
		}

		/*hide the items when the select box is closed:*/
		.select-hide {
		  display: none;
		}

		.select-items div:hover, .same-as-selected {
		  background-color: rgba(0, 0, 0, 0.1);
		}







		/*????????????????????????????????*/


		/*   STYLES FOR DTRLIST2.PHP    */
		.newbtn-s{
	-webkit-appearance: button;
	   -moz-appearance: button;
	   appearance: button; 

	   text-decoration: none;
	   font: bold 11px Arial;
	  text-decoration: none;
	  background-color: #EEEEEE;
	  color: #333333;
	  padding: 2px 6px 2px 6px;
	  border-top: 1px solid #CCCCCC;
	  border-right: 1px solid #333333;
	  border-bottom: 1px solid #333333;
	  border-left: 1px solid #CCCCCC;
	}

.tooltip {
	  position: relative;
	  /*display: inline-block;
	  border-bottom: 1px dotted black;*/
	  
	}

	.tooltip .tooltiptext {
	  visibility: hidden;
	  width: 120px;
	  background-color: black;
	  color: #fff;
	  text-align: center;
	  border-radius: 6px;
	  padding: 5px 0;

	  /* Position the tooltip */
	  position: absolute;
	  z-index: 1;
	  top: 5px;
  	right: 145%;
	}

	.tooltip:hover .tooltiptext {
	  visibility: visible;
	}




/*-----------------------for modal------------------*/
	.hap_btn_class
	{
		display: none;
	}

	.modal_for_check
	{

		/*display*/
		display: block;

		/*position and size*/
		position: absolute;
		right: 10px;
		top: 80px;
		

		/*position: fixed;
  		top: 50%;
  		left: 50%;
  		transform: translate(-50%, -50%);*/
		height: 350px;
		width: 460px;
		
		/*sa unahan ng menu list ng dtr_menu*/z-index: 3; 


		/*color and bg*/
		background-color: #dff7f4;
		border-color: #801818;
		border-radius: 10px;
		border-style:solid;
		padding: 12px;


	}

	.modal_for_check_contents
	{
		/*display: inline-flex;*/
		padding: 10px;
	}

	/*.p_tags_of_modal
	{
		position:relative;
		right: 10px;
	}*/

	.action_check
	{
		color:black;
	}


/*MODAL CONTENTS!*/
	.id_p_tag
	{
		margin-top: -44px;
		margin-left: -345px;
	 	color: black;
	 	font-size: 20px;
	 	font-weight: bold;

	}

	.space_around
	{
		padding: 5px;
	}

	.hap_approval_status_approved
	{
		font-size: 21.5px;
		margin-top: 25px;
		text-indent: -1.2em;
		color:black;
		background: green;
		position: center;
		border-radius: 50px;
		width: auto;
		bottom:30.5px;
		padding-top: 4px;
		font-weight: bold;
		text-align: center;
	}

	.hap_approval_status_pending
	{
		font-size: 21.5px;
		margin-top: 25px;	
		text-indent: -1em;
		color:black;
		background: #fc6a03;
		border-radius: 50px;
		width: auto;
		bottom:30.5px;
		padding-top: 4px;
		font-weight: bold;
		text-align: center;
		position: center;
	}

	.hap_approval_status_disapproved
	{
		font-size: 21.5px;
		margin-top: 25px;
		text-indent: -1em;
		color:black;
		background: #d41b0c;
		border-radius: 50px;
		width: auto;
		bottom:30.5px;
		padding-top: 4px;
		font-weight: bold;
		text-align: center;
		position: center;
	}

	.loadtype_p_tag
	{
		text-align: center;
		font-weight: bold;
		font-style: italic;
		font-size: 17.5px;
	}
	.comment_p_tag
	{
		text-align: center;
		font-weight: bold;
		font-style: italic;
		font-size: 17.5px;
	}

	.name_p_tag
	{
		text-align: center;
		font-weight: bold;
		font-style: italic;
		font-size: 17.5px;
	}

	.type_p_Tag
	{
		text-align: center;
		font-weight: bold;
		font-style: italic;
		font-size: 17.5px;
	}

	.year_p_Tag
	{
		text-align: center;
		font-weight: bold;
		font-style: italic;
		font-size: 17.5px;
	}	

	#idleft
	{
		font-size: 18px;
		font-weight: bold;
		text-align: left;
		/* padding-right: 50px; */
	}

	/*-----------------------for fonts------------------*/
	.disapprove
	{
		font-weight: bold;
		font-style: italic;
		font-size: 12px;
		color: #e3242b;
	}

	.approve
	{
		font-weight: bold;
		font-style: italic;
		font-size: 12px;
		color: green;
	}

	/*-----------------------for inside modal buttons------------------*/
	/*.submitbtn
	{
		margin-bottom: 100px;
		position: left;
	}
*/
	.close {
	  color: #aaa;
	  float: right;
	  font-size: 28px;
	  font-weight: bold;
	}



		/*//////////////////////////////*/


</style>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

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
<!-- SHOW: -->
	<a href="index.php?r=administrator/DtrTable&sort=pending"><input type="button" value="Pending" /></a>
	<a href="index.php?r=administrator/DtrTable&sort=approved"><input type="button" value="Approved"/></a>
	<a href="index.php?r=administrator/DtrTable&sort=disapproved"><input type="button" value="Disapproved"/></a>
	<a href="index.php?r=administrator/DtrTable&sort=deleted"><input type="button" value="Deleted"/></a>

 
	



	
	


<br>
<br>

<div class="warpper">
	 <input class="radio" id="one" name="group" type="radio" checked style="display: none;">
	 <input class="radio" id="two" name="group" type="radio" style="display: none;">
	 <input class="radio" id="three" name="group" type="radio" style="display: none;">
	<div class="tabs">
	      <label class="tab1" id="one-tab" for="one">PENDING</label>
	      <label class="tab2" id="two-tab" for="two">SUBMITTED DTR</label>
	      <label class="tab3" id="three-tab" for="three">DID NOT SUBMITTED DTR YET</label>
	</div>
		<div class="panels">
            <div class="panel" id="one-panel">
				<div  class="outer_container">
					
					<div id="list_of_faculty_div" class="inner_container" >
					
					
					<?php 

					$sql="SELECT * FROM tbl_dtr WHERE FCode='$fcode' and hap_approval_status = 0";
					$result=mysqli_query($conn,$sql);
					 
					 ?>

						<table  id="ProfTable1" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th class="thead" style="text-align: center;"><strong>ID</strong></th>
									<th class="thead" style="text-align: center;"><strong>name</strong></th>
									


								</tr>
							</thead>

							<?php 

							foreach($result as $newresult)
							{
								echo '
							 	<tr>
							 		<td>
							 			'.$newresult['FCode'].'
							 		</td>
							 		<td>
							 			'.$newresult['FName'].' '.$newresult['MName'].' '.$newresult['LName'].'
							 		</td>
							 		
							 	</tr>

							 	';

							}

							

							echo "<h3 style='border: 2px solid black; background-color: gold; text-align: center; color: black'; class='status_tab_apr'>ALL MEMBERS WITH SCHEDULE</h3>";
							// include("faculty_list.php");

							 ?>


							<tfoot>
								<tr>
									<td style="font-size: 12px; font-style: italic;" colspan=2 ><?php echo "Faculty List";?></td>
								</tr>
							</tfoot>

						</table>	

					</div>


				</div>
			</div>




			<!-- panel 2 -->
			<div class="panel" id="two-panel">
				<div  class="outer_container">
					
					<div id="list_of_faculty_div" class="inner_container" >
					
					<!-- <h1>
						<strong>
							FACULTY MEMBERS WITH SCHEDULE
						</strong>
					</h1> -->

					<?php 

					$sql = "SELECT DISTINCT tbl_evaluationfaculty.`FCode`, tbl_evaluationfaculty.`FName`, tbl_evaluationfaculty.`LName`, tbl_evaluationfaculty.`MName`
					FROM tbl_evaluationfaculty
					INNER JOIN tbl_schedule
					ON tbl_evaluationfaculty.`FCode` = tbl_schedule.`sprof`
					INNER JOIN tbl_dtr 
					ON tbl_dtr.`FCode` = tbl_schedule.`sprof`
					WHERE tbl_schedule.`sem` = 2 and tbl_schedule.`schoolYear` = '2021-2022'";
					 $result=mysqli_query($conn,$sql);

					 ?>

						<table  id="ProfTable2" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th class="thead" style="text-align: center;"><strong>ID</strong></th>
									<th class="thead" style="text-align: center;"><strong>name</strong></th>


									<!-- <th class="thead" style="text-align: center;"><strong>Status</strong></th> -->
									<!-- <th class="thead" style="text-align: center;"><strong>Actions</strong></th> -->


								</tr>
							</thead>

							
							

							<tfoot>
								<tr>
									<td style="font-size: 12px; font-style: italic;" colspan="3" ><?php echo "Faculty List";?></td>
								</tr>
							</tfoot>

						</table>	

					</div>


				</div>
			</div>




			<!-- panel 3 -->
			<div class="panel" id="three-panel">
				<div  class="outer_container">
					
					<div id="list_of_faculty_div" class="inner_container" >
					
					<!-- <h1>
						<strong>
							FACULTY MEMBERS WITH SCHEDULE
						</strong>
					</h1> -->


					<?php 

						$sql = "SELECT DISTINCT tbl_evaluationfaculty.`FCode`, tbl_evaluationfaculty.`FName`, tbl_evaluationfaculty.`LName`, tbl_evaluationfaculty.`MName`,tbl_evaluationfaculty.`Email`
						FROM tbl_evaluationfaculty
						INNER JOIN tbl_schedule
						ON tbl_evaluationfaculty.`FCode` = tbl_schedule.`sprof`
						LEFT JOIN tbl_dtr 
						ON tbl_dtr.`FCode` = tbl_schedule.`sprof`
						WHERE tbl_schedule.`sem` = 2 and tbl_schedule.`schoolYear` = '2021-2022' and tbl_dtr.`ntd_by_offhour` IS NULL;";
						 $result=mysqli_query($conn,$sql);

						 // $status = "Not Yet";
					 ?>

						<table  id="ProfTable3" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th class="thead" style="text-align: center;"><strong>ID</strong></th>
									<th class="thead" style="text-align: center;"><strong>name</strong></th>
									<th class="thead" style="text-align: center;"><strong>name</strong></th>

								</tr>
							</thead>

							


							<tfoot>
								<tr>
									<td style="font-size: 12px; font-style: italic;" colspan="4" ><?php echo "Faculty List";?></td>
								</tr>
							</tfoot>

						</table>	

					</div>


				</div>
			</div>


		</div>


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



    // ///////////////////////////////////////////
    // for drop down

	    var x, i, j, l, ll, selElmnt, a, b, c;
	/*look for any elements with the class "custom-select":*/
	x = document.getElementsByClassName("custom-select");
	l = x.length;
	for (i = 0; i < l; i++) {
	  selElmnt = x[i].getElementsByTagName("select")[0];
	  ll = selElmnt.length;
	  /*for each element, create a new DIV that will act as the selected item:*/
	  a = document.createElement("DIV");
	  a.setAttribute("class", "select-selected");
	  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
	  x[i].appendChild(a);
	  /*for each element, create a new DIV that will contain the option list:*/
	  b = document.createElement("DIV");
	  b.setAttribute("class", "select-items select-hide");
	  for (j = 1; j < ll; j++) {
	    /*for each option in the original select element,
	    create a new DIV that will act as an option item:*/
	    c = document.createElement("DIV");
	    c.innerHTML = selElmnt.options[j].innerHTML;
	    c.addEventListener("click", function(e) {
	        /*when an item is clicked, update the original select box,
	        and the selected item:*/
	        var y, i, k, s, h, sl, yl;
	        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
	        sl = s.length;
	        h = this.parentNode.previousSibling;
	        for (i = 0; i < sl; i++) {
	          if (s.options[i].innerHTML == this.innerHTML) {
	            s.selectedIndex = i;
	            h.innerHTML = this.innerHTML;
	            y = this.parentNode.getElementsByClassName("same-as-selected");
	            yl = y.length;
	            for (k = 0; k < yl; k++) {
	              y[k].removeAttribute("class");
	            }
	            this.setAttribute("class", "same-as-selected");
	            break;
	          }
	        }
	        h.click();
	    });
	    b.appendChild(c);
	  }
	  x[i].appendChild(b);
	  a.addEventListener("click", function(e) {
	      /*when the select box is clicked, close any other select boxes,
	      and open/close the current select box:*/
	      e.stopPropagation();
	      closeAllSelect(this);
	      this.nextSibling.classList.toggle("select-hide");
	      this.classList.toggle("select-arrow-active");
	    });
	}
	function closeAllSelect(elmnt) {
	  /*a function that will close all select boxes in the document,
	  except the current select box:*/
	  var x, y, i, xl, yl, arrNo = [];
	  x = document.getElementsByClassName("select-items");
	  y = document.getElementsByClassName("select-selected");
	  xl = x.length;
	  yl = y.length;
	  for (i = 0; i < yl; i++) {
	    if (elmnt == y[i]) {
	      arrNo.push(i)
	    } else {
	      y[i].classList.remove("select-arrow-active");
	    }
	  }
	  for (i = 0; i < xl; i++) {
	    if (arrNo.indexOf(i)) {
	      x[i].classList.add("select-hide");
	    }
	  }
	}
	/*if the user clicks anywhere outside the select box,
	then close all select boxes:*/
	document.addEventListener("click", closeAllSelect);




</script>