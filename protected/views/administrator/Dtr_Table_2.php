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
<!-- SHOW: -->
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
					<th class="thead"><h5><strong></strong></h5></th>
					<th class="thead" style="text-align: center;"><h5><strong>ID</strong></h5></th>
					<th class="thead" hidden><h5><strong>Fcode</strong></h5></th>
					<th class="thead" style="text-align: center;"><h5><strong>Name</strong></h5></th>
					<th class="thead" hidden style="text-align: center;"><h5><strong>First Name</strong></h5></th>
					<th class="thead" hidden style="text-align: center;"><h5><strong>Middle Name</strong></h5></th>
					<th class="thead" style="text-align: center;"><h5><strong>Load Type</strong></h5></th>
					<th class="thead" style="text-align: center;"><h5><strong>Month</strong></h5></th>
					<th class="thead" style="text-align: center;"><h5><strong>Year</strong></h5></th>
					<th class="thead" style="text-align: center;"><h5><strong>Remarks</strong></h5></th>
					<th class="thead" style="text-align: center;"><h5><strong>Actions</strong></h5></th>
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