<?php 

require_once('config.php');
$counter = 1;
$generate ="generate";
$status = "approved";
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

		foreach($result as $newresult)
		{
		echo'
			<tr id="tr_id_'.$counter.'">
			<td id="faculty_id'.$counter.'">' . $newresult['id']  .'
			<td id="fcode_id'.$counter.'"" hidden>' . $newresult['FCode'] . '</td>
			<td id="surname_id'.$counter.'"">' . $newresult['surname'] . '</td>
			<td id="firstname_id'.$counter.'"">' . $newresult['firstname'] . '</td>
			<td id="middlename_id'.$counter.'"">' . $newresult['middlename'] . '</td>
			<td id="regpartime_id'.$counter.'"">' . $newresult['regpartime'] . '</td>
			<td id="month_id'.$counter.'"">' . $newresult['month'] . '</td>
			<td id="year_id'.$counter.'"">' . $newresult['year'] . '</td>
			<td><center><a id="getbtn" class="newbtn-s" title="PRINT PDF" style="width: 12px; height: 20px;" onclick="change_color(this,'.$counter.','.$newresult['hap_approval_status'].','.$newresult['status'].')"><img src="images/icons/check-dark.png"></a> 
				<div  class="modal_for_check" id="modal_for_check_id'.$counter.'" style="display:none;">
						<span id="close_id'.$counter.'" onclick="close_dtr_modal('.$counter.')" class="close">&times;</span>
						<div id="modal_for_check_contents_id'.$counter.'" class="modal_for_check_contents">
							

							<p id="idleft">ID: </p>
							<h4 id="modal_id_id'.$counter.'" class="id_p_tag"></h4>
							<h5 class="hap_approval_status_pending">'.$hap_approval_status.'</h5>
							<h5 id="modal_name_id'.$counter.'" class="name_p_tag space_around"></h5> 
							<p id="modal_loadtype_id'.$counter.'" class="loadtype_p_Tag"></p>
							<p id="modal_comment_id'.$counter.'" class="comment_p_Tag"  >'.$newresult['hap_comments'].'</p>

						</div>
						

						
						<p class="hap_comment_class" id="comments'.$counter.'"></p>
								
						
						<input type="submit" class="" value="VIEW" onclick="call_print(\'' .$counter. '\')">

			</div>

					<button id="check_dtr_id'.$counter.'" class="" title="PRINT PDF" onclick="open_dtr_modal('.$counter.')" name="check_dtr" >check</button>
			</center></td>
			</tr>
		';
		$counter++;
	}


 ?>