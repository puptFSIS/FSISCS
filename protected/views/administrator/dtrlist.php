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
</style>
<?php
require_once('config.php');
$counter = 1;
$generate ="generate";
$status = "pending";
if(isset($_GET['sort']))
{
	if($_GET['sort']=="id")
	{
		$sql="SELECT * FROM tbl_dtr WHERE FCode='$fcode' and status != 1 ";
		$result=mysqli_query($conn,$sql);
		if(empty($result))
		
		{
			$status = "empty";
			
		}
		else
		{
			$status = "pending";

		}

	}
	if($_GET['sort']=="loadtype")
	{
		$sql="SELECT * FROM tbl_dtr WHERE FCode='$fcode' and status != 1 ORDER BY regpartime";
		$result=mysqli_query($conn,$sql);
		if(empty($result))
		
		{
			$status = "empty";
			
		}
		else
		{
			$status = "pending";
		}

	}
	if($_GET['sort']=="month")
	{
		$sql="SELECT * FROM tbl_dtr WHERE FCode='$fcode' and status != 1 ORDER BY FIELD(month,'January','February','March','April','May','June','July','August','September','October','November','December')";
		$result=mysqli_query($conn,$sql);
		if(empty($result))
		
		{
			$status = "empty";
			
		}
		else
		{
			$status = "pending";

		}

	}
	if($_GET['sort']=="year")
	{
		$sql="SELECT * FROM tbl_dtr WHERE FCode='$fcode' and status != 1 ORDER BY year";
		$result=mysqli_query($conn,$sql);
		if(empty($result))
		{
			$status = "empty";
			
		}
		else
		{
			$status = "disapproved";

		}

	}
	if($_GET['sort']=="pending")
	{
		$sql="SELECT * FROM tbl_dtr WHERE FCode='$fcode' and status != 1 and hap_approval_status = 0";
		$result=mysqli_query($conn,$sql);
		if(empty($result))
		{
			$status = "empty";
		}
		else
		{
			$status = "pending";

		}
		

	}
	if($_GET['sort']=="disapproved")
	{
		$sql="SELECT * FROM tbl_dtr WHERE FCode='$fcode' and status != 1 and hap_approval_status = 2";
		$result=mysqli_query($conn,$sql);
		if(empty($result))
		{
			$status = "empty";
			
		}
		else
		{
			$status = "disapproved";

		}

	}
	if($_GET['sort']=="approved")
	{
		$sql="SELECT * FROM tbl_dtr WHERE FCode='$fcode' and status != 1 and hap_approval_status = 1";
		$result=mysqli_query($conn,$sql);
		if(empty($result))
		{
			$status = "empty";
		}
		else
		{
			$status = "approved";

		} 

	}
	if($_GET['sort']=="deleted")
	{
		$sql="SELECT * FROM tbl_dtr WHERE FCode='$fcode' and status = 1";
		$result=mysqli_query($conn,$sql);
		if(empty($result))
		{
			$status = "empty";
		}
		else
		{
			$status = "deleted";

		}

	}
	if($_GET['sort']=="recent")
	{
		$sql="SELECT * FROM tbl_dtr WHERE FCode='$fcode' and status != 1 ORDER BY modified_date DESC";
		$result=mysqli_query($conn,$sql);
		if(empty($result))
		{
			$status = "empty";
		}
		else
		{
			$status = "deleted";

		}

	}

}

else if(isset($_POST['dtrsearch'])) {
		$dtrsearch = $_POST['dtrsearch'];
		$dtrsearchinput = $_POST['dtrsearchinput'];
		if($dtrsearch=="month") {
			$sql="SELECT * FROM tbl_dtr WHERE month LIKE '%$dtrsearchinput%'";
			$result=mysqli_query($conn,$sql);
		}
		else if($dtrsearch == "year"){
			$sql="SELECT * FROM tbl_dtr WHERE year LIKE '%$dtrsearchinput%'";
			$result=mysqli_query($conn,$sql);
		}
		else {
			$sql="SELECT * FROM tbl_dtr WHERE regpartime LIKE '%$dtrsearchinput%'";
			$result=mysqli_query($conn,$sql);
		}
}

else
{
	$sql="SELECT * FROM tbl_dtr WHERE FCode='$fcode' and status != 1 and hap_approval_status = 1";
	$result=mysqli_query($conn,$sql);
	$status = "approved";
}







/////////////////////// DISPLAAAAAYYYY //////////////////////

if($status == "empty")
{
	echo'
		 no records found
		
	';
	
}


///////////////////////// APPROVED ///////////////
else if ($status == "approved")
{
	$hap_approval_status = "APPROVED";

	foreach($result as $newresult)
	{
	echo'
		
		<tr id="tr_id_'.$counter.'">
		<td>
			<center>
				<a id="getbtn" class="newbtn-s" title="PRINT PDF" style="width: 12px; height: 20px;" onclick="change_color(this,'.$counter.','.$newresult['hap_approval_status'].','.$newresult['status'].')">select</a> 
				
			</center>
		</td>
		<td id="faculty_id'.$counter.'">' . $newresult['id']  .'</td>
		<td id="fcode_id'.$counter.'"" hidden>' . $newresult['FCode'] . '</td>
		<td id="surname_id'.$counter.'"">' . $newresult['surname'] . '</td>
		<td id="firstname_id'.$counter.'"">' . $newresult['firstname'] . '</td>
		<td id="middlename_id'.$counter.'"">' . $newresult['middlename'] . '</td>
		<td id="regpartime_id'.$counter.'"">' . $newresult['regpartime'] . '</td>
		<td id="month_id'.$counter.'"">' . $newresult['month'] . '</td>
		<td id="year_id'.$counter.'"">' . $newresult['year'] . '</td>

		<td><center><input type="submit" class="" value="VIEW" onclick="call_print(\'' .$counter. '\')">
			


			<div class="modal_for_check" id="modal_for_check_id'.$counter.'" style="display:none;">
						<span id="close_id'.$counter.'" onclick="close_dtr_modal('.$counter.')" class="close">&times;</span>
						<div id="modal_for_check_contents_id'.$counter.'" class="modal_for_check_contents">
				

							<p id="idleft">ID:</p>
							<h4 id="modal_id_id'.$counter.'" class="id_p_tag"></h4>
							<h5 class="hap_approval_status_approved">'.$hap_approval_status.'</h5>
							<h5 id="modal_name_id'.$counter.'" class="name_p_tag space_around"></h5> 
							<p id="modal_loadtype_id'.$counter.'" class="loadtype_p_Tag"></p>
							<p id="modal_comment_id'.$counter.'" class="comment_p_Tag"  >'.$newresult['hap_comments'].'</p>

						</div>
						

						
						<p class="hap_comment_class" id="comments'.$counter.'"></p>
								
						
						

					</div>

					






		</center></td>
		
		</tr>
	';
	$counter++;
	}
	if(empty($newresult))
		{
			echo "no records found";
			
		}
		else
		{
			echo '
			<input onclick="change_color(this,\'' .$generate. '\','.$newresult['hap_approval_status'].','.$newresult['status'].')" style="display: none;" id="submitbtn" type="submit" name="submit" value="Generate pdf">

			<input style="display: none;" id="deletebtn" type="submit" name="delete" value="delete">

			'
			;

		}
	
}


///////////////// PENDING /////////////////////////
else if ($status == "pending")
{	
	$hap_approval_status = "PENDING";

	foreach($result as $newresult)
	{
	echo'

		<tr id="tr_id_'.$counter.'">
		<td>
			<center>
				<a id="getbtn" class="newbtn-s" title="PRINT PDF" style="width: 12px; height: 20px;" onclick="change_color(this,'.$counter.','.$newresult['hap_approval_status'].','.$newresult['status'].')">select</a> 
				
			</center>
		</td>
		<td id="faculty_id'.$counter.'">' . $newresult['id']  .'</td>
		<td id="fcode_id'.$counter.'"" hidden>' . $newresult['FCode'] . '</td>
		<td id="surname_id'.$counter.'"">' . $newresult['surname'] . '</td>
		<td id="firstname_id'.$counter.'"">' . $newresult['firstname'] . '</td>
		<td id="middlename_id'.$counter.'"">' . $newresult['middlename'] . '</td>
		<td id="regpartime_id'.$counter.'"">' . $newresult['regpartime'] . '</td>
		<td id="month_id'.$counter.'"">' . $newresult['month'] . '</td>
		<td id="year_id'.$counter.'"">' . $newresult['year'] . '</td>

		<td><center><input type="submit" class="" value="VIEW" onclick="call_print(\'' .$counter. '\')">
			


			<div class="modal_for_check" id="modal_for_check_id'.$counter.'" style="display:none;">
						<span id="close_id'.$counter.'" onclick="close_dtr_modal('.$counter.')" class="close">&times;</span>
						<div id="modal_for_check_contents_id'.$counter.'" class="modal_for_check_contents">
				

							<p id="idleft">ID:</p>
							<h4 id="modal_id_id'.$counter.'" class="id_p_tag"></h4>
							<h5 class="hap_approval_status_approved">'.$hap_approval_status.'</h5>
							<h5 id="modal_name_id'.$counter.'" class="name_p_tag space_around"></h5> 
							<p id="modal_loadtype_id'.$counter.'" class="loadtype_p_Tag"></p>
							<p id="modal_comment_id'.$counter.'" class="comment_p_Tag"  >'.$newresult['hap_comments'].'</p>

						</div>
						

						
						<p class="hap_comment_class" id="comments'.$counter.'"></p>
								
						
						

					</div>

					






		</center></td>
		
		</tr>
	';
	$counter++;
	}
	if(empty($newresult))
		{
			echo "no records found";
			
		}
		else
		{

			echo '
			<input onclick="change_color(this,\'' .$generate. '\','.$newresult['hap_approval_status'].','.$newresult['status'].')" style="display: none;" id="submitbtn" type="submit" name="submit" value="Generate pdf">

			<input style="display: none;" id="deletebtn" type="submit" name="delete" value="delete">

			'
			;
		}
	
}


//////////////////// DISAPPROVED ///////////////////

else if($status == "disapproved")
{
		$hap_approval_status = "DISAPPROVED";
		
		foreach($result as $newresult)
		{
		echo'
			<tr id="tr_id_'.$counter.'">
		<td>
			<center>
				<a id="getbtn" class="newbtn-s" title="PRINT PDF" style="width: 12px; height: 20px;" onclick="change_color(this,'.$counter.','.$newresult['hap_approval_status'].','.$newresult['status'].')">select</a> 
				
			</center>
		</td>
		<td id="faculty_id'.$counter.'">' . $newresult['id']  .'</td>
		<td id="fcode_id'.$counter.'"" hidden>' . $newresult['FCode'] . '</td>
		<td id="surname_id'.$counter.'"">' . $newresult['surname'] . '</td>
		<td id="firstname_id'.$counter.'"">' . $newresult['firstname'] . '</td>
		<td id="middlename_id'.$counter.'"">' . $newresult['middlename'] . '</td>
		<td id="regpartime_id'.$counter.'"">' . $newresult['regpartime'] . '</td>
		<td id="month_id'.$counter.'"">' . $newresult['month'] . '</td>
		<td id="year_id'.$counter.'"">' . $newresult['year'] . '</td>

		<td><center><input type="submit" class="" value="VIEW" onclick="call_print(\'' .$counter. '\')">
			


			<div class="modal_for_check" id="modal_for_check_id'.$counter.'" style="display:none;">
						<span id="close_id'.$counter.'" onclick="close_dtr_modal('.$counter.')" class="close">&times;</span>
						<div id="modal_for_check_contents_id'.$counter.'" class="modal_for_check_contents">
				

							<p id="idleft">ID:</p>
							<h4 id="modal_id_id'.$counter.'" class="id_p_tag"></h4>
							<h5 class="hap_approval_status_approved">'.$hap_approval_status.'</h5>
							<h5 id="modal_name_id'.$counter.'" class="name_p_tag space_around"></h5> 
							<p id="modal_loadtype_id'.$counter.'" class="loadtype_p_Tag"></p>
							<p id="modal_comment_id'.$counter.'" class="comment_p_Tag"  >'.$newresult['hap_comments'].'</p>

						</div>
						

						
						<p class="hap_comment_class" id="comments'.$counter.'"></p>
								
						
						

					</div>

					






		</center></td>
		
		</tr>
		';
		$counter++;
		}
		if(empty($newresult))
		{
			echo "no records found";
		}
		else
		{
			echo' 
			<input style="display: none;" id="resubmitbtn" type="submit" name="resubmit" value="resubmit">
			<input style="display: none;" id="deletebtn" type="submit" name="delete" value="delete">';
		}
		
	
	
	
	
}

/////////////////// DELETED //////////////////////

else if($status == "deleted")
{
	$hap_approval_status = "DELETED";
		foreach($result as $newresult)
		{
		echo'
			<tr id="tr_id_'.$counter.'">
		<td>
			<center>
				<a id="getbtn" class="newbtn-s" title="PRINT PDF" style="width: 12px; height: 20px;" onclick="change_color(this,'.$counter.','.$newresult['hap_approval_status'].','.$newresult['status'].')">select</a> 
				
			</center>
		</td>
		<td id="faculty_id'.$counter.'">' . $newresult['id']  .'</td>
		<td id="fcode_id'.$counter.'"" hidden>' . $newresult['FCode'] . '</td>
		<td id="surname_id'.$counter.'"">' . $newresult['surname'] . '</td>
		<td id="firstname_id'.$counter.'"">' . $newresult['firstname'] . '</td>
		<td id="middlename_id'.$counter.'"">' . $newresult['middlename'] . '</td>
		<td id="regpartime_id'.$counter.'"">' . $newresult['regpartime'] . '</td>
		<td id="month_id'.$counter.'"">' . $newresult['month'] . '</td>
		<td id="year_id'.$counter.'"">' . $newresult['year'] . '</td>

		<td><center><input type="submit" class="" value="VIEW" onclick="call_print(\'' .$counter. '\')">
			


			<div class="modal_for_check" id="modal_for_check_id'.$counter.'" style="display:none;">
						<span id="close_id'.$counter.'" onclick="close_dtr_modal('.$counter.')" class="close">&times;</span>
						<div id="modal_for_check_contents_id'.$counter.'" class="modal_for_check_contents">
				

							<p id="idleft">ID:</p>
							<h4 id="modal_id_id'.$counter.'" class="id_p_tag"></h4>
							<h5 class="hap_approval_status_approved">'.$hap_approval_status.'</h5>
							<h5 id="modal_name_id'.$counter.'" class="name_p_tag space_around"></h5> 
							<p id="modal_loadtype_id'.$counter.'" class="loadtype_p_Tag"></p>
							<p id="modal_comment_id'.$counter.'" class="comment_p_Tag"  >'.$newresult['hap_comments'].'</p>

						</div>
						

						
						<p class="hap_comment_class" id="comments'.$counter.'"></p>
								
						
						

					</div>

					






		</center></td>
		
		</tr>
		';
		$counter++;
		}
		if(empty($newresult))
		{
			echo "no records found";
		}
		else
		{
			echo '
			
			<input style="display: none;" id="restorebtn" type="submit" name="restorebtn" value="restore">';
		}
		
	
	
	
	
}



//<a href="index.php?r=administrator/Regular_DTR&var='.$newresult['FCode'].'&var2='.$newresult['month'].'&var3='.$newresult['year'].'&var4='.$newresult['regpartime'].'" class="btn-s" title="PRINT PDF" style="width: 12px; height: 20px; background-color:white;"><img src="images/icons/post-dark.png"></a> <a class="btn-s" title="DELETE" style="width: 12px; height: 20px;"><img src="images/icons/x-white.png"></a>
?>
<script src='assets/jquery-3.6.0.min.js'></script>
	<script src='assets/sweetalert2.all.min.js'></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>
var count = 0;
var id = [];
var reg = [];
var mon = [];
var year = [];
var fcode = [];


const checked = [];	

var submitbtn = document.getElementById("submitbtn");
var resubmitbtn = document.getElementById("resubmitbtn");
var deletebtn = document.getElementById("deletebtn");
var restorebtn = document.getElementById("restorebtn"); 


function change_color(_this,counter,status,existence)
{


		var counter = counter;
		var status = status;
		var existence = existence;



	if(_this.style.backgroundColor != "green" && counter != 'generate')
	{
		_this.style.backgroundColor = "green";
		count++;
		 id[counter] = $("#faculty_id"+counter).html();
		 reg[counter] = $("#regpartime_id"+counter).html();
		 mon[counter] = $("#month_id"+counter).html();
		 year[counter] = $("#year_id"+counter).html();
		 fcode[counter] = $("#fcode_id" +counter).html();
		 checked.push(id[counter]);
		 console.log(checked);
 
	}
	else
	{
		if(counter !='generate')
		{
		count--;
		}
		checked.push(checked.splice(checked.indexOf(id[counter]), 1).pop());
		checked.pop();
		console.log(checked); 


		_this.style.backgroundColor = "white";
		id[counter] = null;
		reg[counter] =null;
		mon[counter] = null;
		year[counter] =null;
		fcode[counter] = null;
			
	}


	if(existence == 1)
		{
			// status = 0;
			if(count > 0)
			{
				restorebtn.style.display="block";
				// submitbtn.style.display="block";
			}
			else
			{
				restorebtn.style.display="none";
				// submitbtn.style.display="none";

			}
		}
	else
	{
		deletebtn.style.display="block";
		if(count==0)
		{
			deletebtn.style.display="none";
			resubmitbtn.style.display="none";

		}
	}

	if(status == 1)
	{

		if(count == 1)
		{
			

			deletebtn.style.display="block";
			submitbtn.style.display="none";

		}
		else if(count == 2)
		{
			submitbtn.style.display="block";
			deletebtn.style.display="block";
		}
		else if(count >= 3)
		{
			submitbtn.style.display="none";
			deletebtn.style.display="block";
			if(count < 2)
			{
			submitbtn.style.display="none";
				
			}
		}
		
		else
		{
			submitbtn.style.display="none";
			deletebtn.style.display="none";
		}
		
	}
	if(status==2)
	{

		if(count > 0)
		{
			resubmitbtn.style.display="block";
			deletebtn.style.display="block";
		

		}
		else
		{
			resubmitbtn.style.display="none";
			deletebtn.style.display="none";

		}

	}

	
		
	


	else{
	
		deletebtn.style.display="block";
		if(count==0)
		{
			deletebtn.style.display="none";
			resubmitbtn.style.display="none";

		}
		
	}

	

if(counter=='generate')
	{
	 printfpdf(id,reg,mon,year);
	}
	
}



deletebtn.onclick = function() 
{
	$.ajax({
		      type: "POST",
		      url:    "<?php echo Yii::app()->createUrl('administrator/Delete_dtr'); ?>",
		      data:  {val2:checked},
		      dataType:"JSON",
		      success:function(data){
		      	alert("dtr deleted successfully");
		      	window.location.reload();
		      },
		      error:function(data)
		      {
		      	alert(JSON.stringify(data));

		      }
		  });
}

resubmitbtn.onclick = function() 
{
	$.ajax({
		      type: "POST",
		      url:    "<?php echo Yii::app()->createUrl('administrator/Resubmit'); ?>",
		      data:  {val1:checked},
		      dataType:"JSON",
		      success:function(data){
		      	alert("dtr resubmitted successfully");
		      	window.location.reload();
		      },
		      error:function(data)
		      {
		      	alert(JSON.stringify(data));

		      }
		  });

}

restorebtn.onclick = function() 
{
	

	console.log("checked");

}





function printfpdf(id,reg,mon,year)
{
	var newlength=0;
	var newid = [];
	var newreg = [];
	var newmon = [];
	var newyear = [];
	var newfcode = [];

	for (i=0; i<id.length; i++)
	{
		if(id[i] != null || id[i] != undefined)
		{
			newid[newlength]=id[i];
			newreg[newlength]=reg[i];
			newmon[newlength]=mon[i];
			newyear[newlength]=year[i];
			newfcode[newlength] =fcode[i]; 
			newlength++;
		}
	}

	firstid= newid[0];
	firstreg = newreg[0];
	firstmon = newmon[0];
	firstyear = newyear[0];
	firstfcode = newfcode[0];
	secondid = newid[1];
	secondreg = newreg[1];
	secondmon = newmon[1];
	secondyear = newyear[1];
	secondfcode = newfcode[1];

			
	window.open("index.php?r=/administrator/Regular_DTRgoto&val1="+firstid+"&val2="+firstreg+"&val3="+firstmon+"&val4="+firstyear+"&val5="+firstfcode+"&val6="+secondid+"&val7="+secondreg+"&val8="+secondmon+"&val9="+secondyear+"&val10="+secondfcode);
				     
	console.log(firstreg);
	console.log(secondreg);
	console.log(firstfcode,secondfcode);



			
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


var counter_temp = [];
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
	var hidden_comment_id = [];

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
	var modal_fcode_id_var = document.getElementById("modal_fcode_id"+counter);
	var modal_fullname_id_var = document.getElementById("modal_name_id"+counter);
	var modal_regpartime_id_var = document.getElementById("modal_loadtype_id"+counter);
	var modal_month_id_var = document.getElementById("modal_month_id"+counter);
	var modal_date_id_var = document.getElementById("modal_date_id"+counter);
	var modal_comment_id_var = document.getElementById("modal_comment_id"+counter);




	// modal_div declaration
	modal_div[counter] = document.getElementById("modal_for_check_id"+counter);
	
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
			let comment = hidden_comment_id[counter];

		    modal_div[counter].style.display = "block";
			modal_id_var.innerText = faculty_id[counter];
			// modal_fcode_id_var.innerText = fcode_id[counter];
			modal_fullname_id_var.innerText = fullname;
			modal_regpartime_id_var.innerText = loadtype_month_year;
			// modal_date_id_var.innerText = month_year;
			
			

			counter_temp.push(counter);
			string_counter_temp = counter_temp.toString();
			int_counter_temp = parseInt(string_counter_temp,10);
		  
	} 
	

	else
	{
			modal_div[counter].style.display = "none";
		    	counter_temp = [];

	}

	    console.log(counter,counter_temp,string_counter_temp,int_counter_temp);

}

function close_dtr_modal(counter)
{
	document.getElementById("modal_for_check_id"+counter).style.display = "none";
}



// function myOverFunction(counter)
// {
// 	document.getElementById("tooltiptext_id"+counter).style.visibility = visible;
// }

</script>