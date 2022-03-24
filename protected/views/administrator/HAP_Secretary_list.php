			

<style>
	.hr_textdiv
	{
		margin: 20px 20px 0 0 ;
	}
	.hr_textfield
	{
		width: 250px;
	}
	.generate_btn_class
	{
		margin: 20px 20px 0 0 ;

	}
</style>
	<div class="hr_textdiv">
		<input class="hr_textfield" id="hr_name_id" type="text" name="" value="Atty. MICHELLE KRISTINE D. SARAUM">
		Director 
		Human Resources Management Department 

	</div>

<?php 
			require_once('config.php');
			$counter = 1;
			$sql="SELECT * FROM tbl_dtr where status != 1 and hap_approval_status = 1";
			$result=mysqli_query($conn,$sql);




			foreach($result as $newresult)
			{
				echo'
						<tr id="hap_sec_id'.$counter.'">
							<td id="hap_sec_id_fn'.$counter.'">' . $newresult['firstname'] . '</td>
							<td id="hap_sec_id_mn'.$counter.'">' . $newresult['middlename'] . '</td>
							<td id="hap_sec_id_sn'.$counter.'">' . $newresult['surname'] . '</td>
							<td id="hap_sec_id_type'.$counter.'">' . $newresult['regpartime'] . '</td>
							<td id="hap_sec_id_month'.$counter.'">' . $newresult['month'] . '</td>
							<td id="hap_sec_id_year'.$counter.'">' . $newresult['year'] . '</td>
						</tr>
				';
				
				$counter++;
				
			}
			echo '<button class="generate_btn_class" onclick="call_print(\'' .$counter. '\')">generate receiving document</button>';



?>
<script>
	
function call_print(counter)
{

		id1 = $("#hap_sec_id"+counter).html();
		firstname1= $("#hap_sec_id_fn"+counter).html();
		surname1 = $("#hap_sec_id_sn"+counter).html();
		middlename1= $("#hap_sec_id_mn"+counter).html();
		reg1= $("#hap_sec_id_type"+counter).html();
		mon1= $("#hap_sec_id_month"+counter).html();
		year1= $("#hap_sec_id_year"+counter).html();
		hr_name = document.getElementById("hr_name_id");
		newcounter = counter;
	

			
	window.open("index.php?r=/administrator/Hap_generate_rd&val1="+newcounter);
				     
				
}



</script>
