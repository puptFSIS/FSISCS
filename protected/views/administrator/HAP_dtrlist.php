
<style>


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

	.viewbtn-s{
	-webkit-appearance: button;
	   -moz-appearance: button;
	   appearance: button;

	   text-decoration: none;
	   font: bold 11px Arial;
	  text-decoration: none;
	  background-color: black;
	  color: #333333;
	  padding: 2px 6px 2px 6px;
	  border-top: 1px solid #CCCCCC;
	  border-right: 1px solid #333333;
	  border-bottom: 1px solid #333333;
	  border-left: 1px solid #CCCCCC;
	}

	.hap_approval_status_approved
	{
		font-size: 21.5px;
		margin-top: 25px;
		text-align: center;	
		color:black;
		background: green;
		border-radius: 50px;
		width: auto;
		bottom:30.5px;
		padding-left: 30px;
		font-weight: bold;
	}

	.hap_approval_status_pending
	{
		font-size: 21.5px;
		margin-top: 25px;
		text-align: center;	
		color:black;
		background: #fc6a03;
		border-radius: 50px;
		width: auto;
		bottom:30.5px;
		padding-left: 30px;
		font-weight: bold;
	}

	.hap_approval_status_disapproved
	{
		font-size: 21.5px;
		margin-top: 25px;
		text-align: center;	
		color:black;
		background: #b90e0a;
		border-radius: 50px;
		width: auto;
		bottom:30.5px;
		padding-left: 30px;
		font-weight: bold;
	}

	.checkboxes
	{

		display : inline-flex;
  		/*flex-direction: row;*/
  			/*justify-content: center;*/
	}
	.print_remove
	{
		  display : block;

	}
	.hap_comment_class
	{
		/*display: inherit;
		width: 100px;
		height: 500px;*/
		font-weight: bold;
		font-family: "Arial", Helvetica, sans-serif;
		color: #b90e0a;
		text-align: left;
		box-sizing: content-box;
		border: 1.5px solid black;
	}

	.input_comments
	{
		margin-top: 45px;	
		margin-bottom: 10px;
	 	font-weight: bold;
		font-family: "Arial", Helvetica, sans-serif;
		color: #b90e0a;
		text-align: left;
		box-sizing: border-box;
		width: 250px;
		height: 20%;
		border: 1.5px solid black;
	}

	.actions_class
	{
		/*margin-bottom: 10px;*/
		text-align: right;
		/*padding-left: none;*/
		padding-right: 0px;

	}
	.tr_class:hover
	{
		font-weight: bold;
		cursor: pointer;
	}


	/*--------------------for tooltip----------------------*/
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

	/*.tooltip:hover .tooltiptext {
	  visibility: visible;
	}*/


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
		height: 400px;
		width: 450px;
		/*sa unahan ng menu list ng dtr_menu*/z-index: 3; 


		/*color and bg*/
		background-color: #dff7f4;
		border-color: #801818;
		border-radius: 10px;
		border-style:solid;
		padding: 12px;

		/*overflow: scroll;*/

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
		margin-top: -41px;
		margin-left: -305px;
	 	color: black;
	 	/*float: left;*/
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
		border-radius: 50px;
		width: auto;
		bottom:30.5px;
		padding-top: 4px;
		font-weight: bold;
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
	}

	.fcode_p_tag
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
		font-size: 15px;
		font-weight: bold;
		text-align: left;
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


</style>
<script src='assets/jquery-3.6.0.min.js'></script>
<script src='assets/sweetalert2.all.min.js'></script>
<?php
// include("config.php");



require_once('config.php');

$counter = 1;
$status = "p
ending";
$generate ="generate";
if(isset($_GET['sort']))
{
	if($_GET['sort']=="id")
	{
		$sql="SELECT * FROM tbl_dtr where status != 1";
		$result=mysqli_query($conn,$sql);
		$status = "pending";
		
	}
	if($_GET['sort']=="loadtype")
	{
		$sql="SELECT * FROM tbl_dtr where status != 1 ORDER BY regpartime";
		$result=mysqli_query($conn,$sql);
		$status = "pending";
	}
	if($_GET['sort']=="month")
	{
		$sql="SELECT * FROM tbl_dtr where status != 1 ORDER BY FIELD(month,'January','February','March','April','May','June','July','August','September','October','November','December')";
		$result=mysqli_query($conn,$sql);
		$status = "pending";
	}
	if($_GET['sort']=="year")
	{
		$sql="SELECT * FROM tbl_dtr where status != 1 ORDER BY year";
		$result=mysqli_query($conn,$sql);
		$status = "pending";
	}
	if($_GET['sort']=="pending")
	{
		$sql="SELECT * FROM tbl_dtr where hap_approval_status = 0";
		$result=mysqli_query($conn,$sql);
		$status = "pending";
	}
	if($_GET['sort']=="approved")
	{
		$sql="SELECT * FROM tbl_dtr where hap_approval_status = 1";
		$result=mysqli_query($conn,$sql);
		$status = "approved";

	}
	if($_GET['sort']=="disapproved")
	{
		$sql="SELECT * FROM tbl_dtr WHERE hap_approval_status = 2";
		$result=mysqli_query($conn,$sql);
		$status = "disapproved";
		
	}

}


else
{
	// $sql="SELECT * FROM tbl_dtr WHERE FCode='$fcode'";
	$sql="SELECT * FROM tbl_dtr WHERE status != 1 and hap_approval_status = 0";
	$result=mysqli_query($conn,$sql);
	$status = "pending";
}










////////////////---------------PENDING--------///////////////
if($status == "pending")
{
	$hap_approval_status = "PENDING";
	foreach($result as $newresult)
	{
		
		echo'
			
			<tr id="tr_id_'.$counter.'" ">

				<td id="faculty_id'.$counter.'" class="tr_class" style="font-weight:bold;" onclick="call_print(\'' .$counter. '\')"">' . $newresult['id']  . '</td>
				<td id="fcode_id'.$counter.'" hidden>' . $newresult['FCode'] . '</td>
				<td id="surname_id'.$counter.'"" style="font-weight:bold;">' . $newresult['surname'] . ',' . $newresult['firstname'] . ' ' . $newresult['middlename'] . '</td>
				<td id="firstname_id'.$counter.'"" style="font-weight:bold;" hidden>' . $newresult['firstname'] . '</td>
				<td id="middlename_id'.$counter.'"" style="font-weight:bold;" hidden>' . $newresult['middlename'] . '</td>
				<td id="regpartime_id'.$counter.'"" style="font-weight:bold;">' . $newresult['regpartime'] . '</td>
				<td id="month_id'.$counter.'"" style="font-weight:bold;">' . $newresult['month'] . '</td>
				<td id="year_id'.$counter.'"" style="font-weight:bold;">' . $newresult['year'] . '</td>


				<td>
					<center>
						<input type="checkbox" class"radio'.$counter.'" style="cursor: pointer" id="approve_box_id'.$counter.'" name="approval'.$counter.'"  value="1">
									<label for="approve" class="approve" style="color: green; font-weight:bold;">APPROVE</label>
					</center>
				</td>

				<td>
					<center>
						<input type="checkbox" class"radio'.$counter.'" style="cursor: pointer" id="disapprove_box_id'.$counter.'" name="approval'.$counter.'" value="2">
									<label for="disapprove" class="disapprove" style="color: red;  font-weight:bold;">DISAPPROVE</label>
					</center>
				</td>

				<td>
					<center>
						<textarea placeholder="Type your comment here" class="input_comments" name="comments" id="comments'.$counter.'"></textarea>
					</center>
				</td>

				<td class=""">
					<center>
						<input type="submit" class="" value="VIEW PDF" onclick="call_print(\'' .$counter. '\')">
					</center>
				</td>

				<td>
					<center>
						<input id="input_id'.$counter.'" type="submit" id="submitbtn"  onclick="post_approval('.$counter.')" class="" name="hap_submit_name" value="SUBMIT" id="hap_submit_id'.$counter.'" >
					</center>
				</td>
				
			</tr>
			

		';
		$counter++;


	}
	echo "<h3 style='border: 2px solid black; background-color: orange; text-align: center; color: black'; class='status_tab_apr'>$status</h3>";
}


//////////////////////////---------APPROVED -------------------////////////////////////////

else if($status == "approved")
{
	$hap_approval_status = "APPROVED";
	foreach($result as $newresult)
	{
		
		echo'
			
			<tr id="tr_id_'.$counter.'" ">
				<td id="faculty_id'.$counter.'" class="tr_class" style="font-weight:bold;" onclick="call_print(\'' .$counter. '\')"">' . $newresult['id']  . '</td>
				<td id="fcode_id'.$counter.'"" hidden>' . $newresult['FCode'] . '</td>
				<td id="surname_id'.$counter.'"" style="font-weight:bold;">' . $newresult['surname'] . ',' . $newresult['firstname'] . ', ' . $newresult['middlename'] . '</td>
				<td id="firstname_id'.$counter.'"" style="font-weight:bold;" hidden>' . $newresult['firstname'] . '</td>
				<td id="middlename_id'.$counter.'"" hidden>' . $newresult['middlename'] . '</td>
				<td id="regpartime_id'.$counter.'"" style="font-weight:bold;">' . $newresult['regpartime'] . '</td>
				<td id="month_id'.$counter.'"" style="font-weight:bold;">' . $newresult['month'] . '</td>
				<td id="year_id'.$counter.'"" style="font-weight:bold;">' . $newresult['year'] . '</td>
				<td class="actions_class"">

	
					<center>
						<input type="checkbox" class"radio'.$counter.'" style="cursor: pointer" id="disapprove_box_id'.$counter.'" name="approval'.$counter.'" value="2">
								<label for="disapprove" class="disapprove" style="color: red;  font-weight:bold;">DISAPPROVE</label>
					</center>
				</td>
				<td>
					<center>
						<input type="hidden" class"radio'.$counter.'" style="cursor: pointer" id="approve_box_id'.$counter.'" name="approval'.$counter.'"  value="1">
									<label for="approve" class="approve" style="color: green; font-weight:bold;" hidden>APPROVE</label>
					</center>
				</td>
			<td>
				<center>
					<textarea placeholder="Type your comment here" class="input_comments" name="comments" id="comments'.$counter.'"></textarea>
				</center>
			</td>
			<td class=""">
				<center>
					<input type="submit" class="" value="VIEW PDF" onclick="call_print(\'' .$counter. '\')">
				</center>
			</td>
			<td>
				<center>
					<input id="input_id'.$counter.'" type="submit" id="submitbtn"  onclick="post_approval('.$counter.')" class="" name="hap_submit_name" value="SUBMIT" id="hap_submit_id'.$counter.'" >
				</center>

				</td>

				
				</tr>
				

		';
		$counter++;

	}
	echo "<h3 style='border: 2px solid black; background-color: green; text-align: center; color: black'; class='status_tab_apr'>$status</h3>";
}




//////////////////////////---------DISAPPROVED -------------------////////////////////////////


else if($status == "disapproved")
{
	$hap_approval_status = "DISAPPROVED";
	foreach($result as $newresult)
	{
		
		echo'

			<tr id="tr_id_'.$counter.'" ">
				<td id="faculty_id'.$counter.'" class="tr_class"  style="font-weight:bold;" onclick="call_print(\'' .$counter. '\')"	>' . $newresult['id']  . '</td>
				<td id="fcode_id'.$counter.'"" hidden>' . $newresult['FCode'] . '</td>
				<td id="surname_id'.$counter.'"" style="font-weight:bold;">' . $newresult['surname'] . ', ' . $newresult['firstname'] . ', ' . $newresult['middlename'] . '</td>
				<td id="firstname_id'.$counter.'"" hidden>' . $newresult['firstname'] . '</td>
				<td id="middlename_id'.$counter.'"" hidden>' . $newresult['middlename'] . '</td>
				<td id="regpartime_id'.$counter.'"" style="font-weight:bold;">' . $newresult['regpartime'] . '</td>
				<td id="month_id'.$counter.'"" style="font-weight:bold;">' . $newresult['month'] . '</td>
				<td id="year_id'.$counter.'"" style="font-weight:bold;">' . $newresult['year'] . '</td>
				<td class="actions_class"">

					<center>
						<input type="checkbox" class"radio'.$counter.'" style="cursor: pointer" id="approve_box_id'.$counter.'" name="approval'.$counter.'"  value="1">
								<label for="approve" class="approve" style="color: green; font-weight:bold;">APPROVE</label>
					</center>
				</td>
				<td>
					<center>
						<input type="hidden" class"radio'.$counter.'" style="cursor: pointer" id="disapprove_box_id'.$counter.'" name="approval'.$counter.'" value="2" >
									<label for="disapprove" class="disapprove" style="color: red;  font-weight:bold;" hidden>DISAPPROVE</label>
					</center>
				</td>
		
				<td>
					<center>
						<textarea placeholder="Type your comment here" class="input_comments" name="comments" id="comments'.$counter.'"></textarea>
					</center>
				</td>
				<td class=""">
					<center>
						<input type="submit" class="" value="VIEW PDF" onclick="call_print(\'' .$counter. '\')">
					</center>
				</td>
				<td>
					<center>
						<input id="input_id'.$counter.'" type="submit" id="submitbtn"  onclick="post_approval('.$counter.')" class="" name="hap_submit_name" value="SUBMIT" id="hap_submit_id'.$counter.'" >
					</center>
				</td>
						
							
					</tr>
					
					

		';
		$counter++;

	}
	echo "<h3 style='border: 2px solid black; background-color: red; text-align: center; color: black'; class='status_tab_apr'>$status</h3>";
}




//////////////////--------JAVASRIPT PART ------------------///////////////
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>



//////////////////////////////////////////
///// SWEET ALERT/////
// $('#submitbtn2').on('click',function()
// 	    {
// 	    	Swal.fire({
// 			  title: 'Are you sure?',
// 			  text: "Create this DTR now?",
// 			  icon: 'warning',
// 			  showCancelButton: true,
// 			  confirmButtonColor: '#3085d6',
// 			  cancelButtonColor: '#d33',
// 			  confirmButtonText: 'Yes!'
// 			}).then((result) => {
// 			  if (result.isConfirmed) {
// 			    Swal.fire(
// 			      'SUCCESS!',
// 			      'Your DTR has been generated',
// 			      'success'
// 			    )
// 			  }
// 			})
// 	    });







////////////////////
	
var count = 0;
var id = [];
var reg = [];
var mon = [];
var year = [];
var fcode = [];
var surname = [];
var firstname = [];
var middlename = [];


$(document).on('click', 'input[type="checkbox"]', function() {      
    $('input[type="checkbox"]').not(this).prop('checked', false);      
});
function check_dtr(counter)
{
	var tr_row = $("#tr_id_"+counter).html();


	console.log(tr_row);

}


function post_approval(counter)
{
	var id = $("#faculty_id"+counter).html();
	var approval = 0;
	var appro = document.getElementById("approve_box_id"+counter).checked;
	var disappro = document.getElementById("disapprove_box_id"+counter).checked;





	if (appro == false && disappro == false) {

		// approval = appro.value;


		Swal.fire({
		  icon: 'error',
		  title: 'Oops...',
		  text: 'check a box to proceed',
		  footer: '<a href="">Your approval is required</a>'
		}).then((result) => {
		  // Reload the Page
		  location.reload();
		});
		console.log(approval);

	}
	else if(appro == true)
	{

		approval = 1;
		var comments = document.getElementById("comments"+counter).value;
		ajax_sender(id,approval,comments,counter);
		// window.location.reload();
		console.log(approval);
	}

	else if(disappro == true)
	{
		approval = 2;
		var comments = document.getElementById("comments"+counter).value;
		ajax_sender(id,approval,comments,counter);
		// window.location.reload();
		console.log(approval);

	}


	
	


}

function ajax_sender(id,approval,comments,counter)
{
	  	Swal.fire({
			  title: 'Are you sure?',
			  text: "Submit this DTR now?",
			  icon: 'info',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes!'
			}).then((result) => {
			  if (result.isConfirmed) {
				//////////////////
				//ajax part

				console.log(id,approval,comments);
					$.ajax({
						      type: "POST",
						      url:    "<?php echo Yii::app()->createUrl('administrator/Hap_post'); ?>",
						      data:  {val1:id,val2:approval,val3:comments},
						      dataType:"JSON",
						      success:function(data){
						      	// alert("records updated successfully");
						      },
						      error:function(data)
						      {
						      	alert(JSON.stringify(data));

						      }
						  });
					
			    	// window.location.reload();
			    


				////////////////
			    Swal.fire({
				  // position: 'top-end',
				  icon: 'success',
				  title: 'DTR Validation success'
				  // showConfirmButton: false,
				  // timer: 1500
				}).then((result) => {
				  // Reload the Page
				  location.reload();
				});
						      	
			  }
			  
			  // window.location.reload();
			})

	
}




function call_print(counter)
{

		id1 = $("#faculty_id"+counter).html();
		fcode1 = $("#fcode_id"+counter).html();
		surname1 = $("#surname_id"+counter).html();
		firstname1= $("#firstname_id"+counter).html();
		middlename1= $("#middlename_id"+counter).html();
		reg1= $("#regpartime_id"+counter).html();
		mon1= $("#month_id"+counter).html();
		year1= $("#year_id"+counter).html();
	

			
	window.open("index.php?r=/administrator/Hap_checkDtr&val1="+id1+"&val2="+reg1+"&val3="+mon1+"&val4="+year1+"&val5="+fcode1+"&val6="+surname1+"&val7="+firstname1+"&val8="+middlename1);
				     
				
}

const counter_temp = [];
var string_counter_temp;
var int_counter_temp

function open_dtr_modal(counter)
{

	var modal_div = [];

	//from
	var faculty_id = [];
	var fcode_id = [];
	var firstname_id = [];	
	var middlename_id = [];	
	var lastname_id = [];	
	var regpartime_id = [];	
	var month_id = [];	
	var year_id = [];
	faculty_id[counter] = document.getElementById("faculty_id"+counter).innerText;
	fcode_id[counter] = document.getElementById("fcode_id"+counter).innerText;
	firstname_id[counter] = document.getElementById("firstname_id"+counter).innerText;
	middlename_id[counter] = document.getElementById("middlename_id"+counter).innerText;
	lastname_id[counter] = document.getElementById("surname_id"+counter).innerText;
	regpartime_id[counter] = document.getElementById("regpartime_id"+counter).innerText;
	month_id[counter] = document.getElementById("month_id"+counter).innerText;
	year_id[counter] = document.getElementById("year_id"+counter).innerText;




	//to
	var modal_id_var = document.getElementById("modal_id_id"+counter);
	var modal_date_id_var = document.getElementById("modal_date_id"+counter);
	var modal_fullname_id_var = document.getElementById("modal_name_id"+counter);
	var modal_regpartime_id_var = document.getElementById("modal_regpartime_id"+counter);
	var modal_month_id_var = document.getElementById("modal_month_id"+counter);
	// var modal_date_id_var = document.getElementById("modal_date_id"+counter);


	// modal_div declaration
	modal_div[counter] = document.getElementById("modal_for_check_id"+counter);
	
	//unchecking checkboxes
	$("#approve_box_id"+counter).prop('checked', false);


	if (modal_div[counter].style.display === "none") 
	{ 

			let first = firstname_id[counter];
			let mid = middlename_id[counter];
			let last = lastname_id[counter];
			let month = month_id[counter];
			let year = year_id[counter];
			let loadtype = regpartime_id[counter];
			
			let fullname = first.concat(" ",mid," ",last);
			let loadtype_month_year = loadtype.concat(" - ",month," ",year);

			let month_year = month.concat(" ",year);

		    modal_div[counter].style.display = "block";
			modal_id_var.innerText = faculty_id[counter];
			modal_date_id_var.innerText = loadtype_month_year;
			modal_fullname_id_var.innerText = fullname;
			// modal_regpartime_id_var.innerText = loadtype;
			

			counter_temp.push(counter);
			
			console.log(counter_temp);

			// close_dtr_modal(counter);
			// document.getElementById("modal_for_check_id"+counter_temp[0]).style.display = "none";
			
	} 
	


	else if(modal_div[counter].style.display !== "none")
	{
			 modal_div[counter].style.display = "none";
			counter_temp.shift();
			console.log(counter_temp);
			

	}


	
}




function close_dtr_modal(counter)
{
	document.getElementById("modal_for_check_id"+counter).style.display = "none";
}






</script>	