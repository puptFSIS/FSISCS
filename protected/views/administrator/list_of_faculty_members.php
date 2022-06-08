


<style>
	
	.outer_container
	{
		width: 1000px;
		margin-top: 50px;
		background-color: ghostwhite;
		border: 2px solid;
		padding: 10px;
	}

	.inner_container
	{
		width: 100%;
		margin-top: 50px;
		background-color: #f7f7f7;
	}






	/*      for switchable tab       */


	.warpper{
	  display:flex;
	  flex-direction: column;
	  align-items: center;
	}
	.tab1{
	  cursor: pointer;
	  padding:10px 20px;
	  margin:0px 2px;
	  background:yellow;
	  display:inline-block;
	  color:#fff;
	  border-radius:3px 3px 0px 0px;
	  box-shadow: 0 0.5rem 0.8rem #00000080;
	}
	.tab2{
	  cursor: pointer;
	  padding:10px 20px;
	  margin:0px 2px;
	  background:green;
	  display:inline-block;
	  color:#fff;
	  border-radius:3px 3px 0px 0px;
	  box-shadow: 0 0.5rem 0.8rem #00000080;
	}
	.tab3{
	  cursor: pointer;
	  padding:10px 20px;
	  margin:0px 2px;
	  background:orange;
	  display:inline-block;
	  color:#fff;
	  border-radius:3px 3px 0px 0px;
	  box-shadow: 0 0.5rem 0.8rem #00000080;
	}
	.panels{
	  background:whitesmoke;
	  box-shadow: 0 2rem 2rem #00000080;
	  min-height:200px;
	  /*width:570px;*/
	  /*max-width:1000px;*/
	  border-radius:3px;
	  /*overflow:hidden;*/
	  padding:20px;  
	}
	.panel{
	  display:none;
	  animation: fadein .8s;
	}
	@keyframes fadein {
	    from {
	        opacity:0;
	    }
	    to {
	        opacity:1;
	    }
	}
	.panel-title{
	  font-size:1.5em;
	  font-weight:bold;
	}

	#one:checked ~ .panels #one-panel,
	#two:checked ~ .panels #two-panel,
	#three:checked ~ .panels #three-panel{
	  display:block;
	}
	#one:checked ~ .tabs #one-tab
	{
	  background:#fffffff6;
	  color:#000;
	  border-top: 3px solid yellow;
	}
	#two:checked ~ .tabs #two-tab
	{
	  background:#fffffff6;
	  color:#000;
	  border-top: 3px solid green;
	}
	#three:checked ~ .tabs #three-tab
	{
	  background:#fffffff6;
	  color:#000;
	  border-top: 3px solid orange;
	}

</style>


<!-- <a href="index.php?r=administrator/ListOfFac&sort=all"><input type="button" value="View All" /></a>
<a href="index.php?r=administrator/ListOfFac&sort=passed"><input type="button" value="Already Passed"/></a>
<a href="index.php?r=administrator/ListOfFac&sort=notyet"><input type="button" value="Not Passing Yet"/></a>
 -->

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

					$sql = "SELECT DISTINCT tbl_evaluationfaculty.`FCode`, tbl_evaluationfaculty.`FName`, tbl_evaluationfaculty.`LName`, tbl_evaluationfaculty.`MName`
					FROM tbl_evaluationfaculty
					INNER JOIN tbl_schedule
					ON tbl_evaluationfaculty.`FCode` = tbl_schedule.`sprof`
					WHERE tbl_schedule.`sem` = 2 and tbl_schedule.`schoolYear` = '2021-2022'";
					 $result=mysqli_query($conn,$sql);

					 ?>

						<table  id="ProfTable1" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th class="thead" style="text-align: center;"><strong>ID</strong></th>
									<th class="thead" style="text-align: center;"><strong>name</strong></th>
									<!-- <th class="thead" style="text-align: center;"><strong>Status</strong></th> -->
									<!-- <th class="thead" style="text-align: center;"><strong>Actions</strong></th> -->


								</tr>
							</thead>

							<?php 

							foreach($result as $newresult)
							{
								if($newresult['FCode'])
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
							 	}else{
							 		echo'
							 		<tr> 
							 		<td width="20.5%">
							 			
							 		</td>
							 		<td width="33%">
							 			No Records Found! 
							 		</td>

							 		</tr>
							 		';
							 		break;

							 	}

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
					WHERE tbl_schedule.`sem` = 2 and tbl_schedule.`schoolYear` = '2021-2022' and tbl_dtr.`status` = 1";
					
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

							
							<?php 

							foreach($result as $newresult)
							{
								if($newresult['FCode'])
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

								}else{
							 		echo'
							 		<tr> 
							 		<td width="20.5%">
							 			
							 		</td>
							 		<td width="33%">
							 			No Records Found! 
							 		</td>

							 		</tr>
							 		';
							 		break;

							 	}

							}	

						

							echo "<h3 style='border: 2px solid black; background-color:green; text-align: center; color: black'; class='status_tab_apr'>SUBMITTED DTR</h3>";

							 ?>

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
						WHERE tbl_schedule.`sem` = 2 and tbl_schedule.`schoolYear` = '2021-2022' and tbl_dtr.`status` = ''";
						// $sql = "SELECT DISTINCT tbl_evaluationfaculty.`FCode`, tbl_evaluationfaculty.`FName`, tbl_evaluationfaculty.`LName`, tbl_evaluationfaculty.`MName`
						// FROM tbl_evaluationfaculty
						// INNER JOIN tbl_schedule
						// ON tbl_evaluationfaculty.`FCode` = tbl_schedule.`sprof`
						// INNER JOIN tbl_dtr 
						// ON tbl_dtr.`FCode` = tbl_schedule.`sprof`
						// WHERE tbl_schedule.`sem` = 2 and tbl_schedule.`schoolYear` = '2021-2022' and tbl_dtr.`status` != 1";
						 $result=mysqli_query($conn,$sql);

						 // $status = "Not Yet";
					 ?>

						<table  id="ProfTable3" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th width="33%" class="thead" style="text-align: center;"><strong>ID</strong></th>
									<th width="33%" class="thead" style="text-align: center;"><strong>Name</strong></th>
									<th width="33%"	 class="thead" style="text-align: center;"><strong>Email</strong></th>

								</tr>
							</thead>

							<?php 
							 $email_container = [];
							 $counter = 0;
							foreach($result as $newresult)
							{
								if($newresult['FCode'])
								{
								echo '
							 	<tr>
							 		<td width="33%">
							 			'.$newresult['FCode'].'
							 		</td>
							 		<td width="33%">
							 			'.$newresult['FName'].' '.$newresult['MName'].' '.$newresult['LName'].'
							 		</td>
							 		<td width="33%">
							 			'.$newresult['Email'].'
							 		</td>
							 		
							 		
							 		
							 	</tr>



							 	';
							 	}
							 	else{
							 		echo'
							 		<tr> 
							 		<td width="33%">
							 			
							 		</td>
							 		<td width="33%">
							 			<center> No Records Found! </center>
							 		</td>
							 		<td width="33%">
							 			
							 		</td>
							 		</tr>
							 		';
							 		break;

							 	}

							 	

							 	// array_push($email_container,$newresult['Email']);

							 	// $counter++;


							}
							// $email_container = $newresult['Email'];
							$email = $newresult['Email'];
							
							echo "<a onclick='on_send_email(".$email.")' ><input id='send_email_id' type='button' name='send_email' value='Send Email Reminder' /></a> 
									
									<br>";

							echo "<h3 style='border: 2px solid black; background-color: orange; text-align: center; color: black'; class='status_tab_apr'>DID NOT SUBMIT DTR</h3>";

							 ?>


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







<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src='<?php echo Yii::app()->getBaseUrl() ?>assets/jquery-3.6.0.min.js'></script>
<script src='<?php echo Yii::app()->getBaseUrl() ?>assets/sweetalert2.all.min.js'></script>
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl() ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl() ?>assets/js/datatables.min.js"></script>
<script>
	var ProfTable1 = $("#ProfTable1").DataTable({
        "scrollY":        false,
        "scrollCollapse": false,
        "paging":         true,
        "lengthChange": true,
        "pagingType": "full_numbers",
        "ordering": true, /// allow sorting sa buong table
        "aaSorting": [],   /// remove sorting sa unang column  - 0
        "columnDefs": [
	        {
	        	"targets": [0,1],
	        	"orderable": false ///remove sorting sa lahat ng column maliban sa isa
	        }
        ],



        language: { 
        search: "", 

        searchPlaceholder: "Search:" }


    });

    

   
</script>
<script>
	var ProfTable2 = $("#ProfTable2").DataTable({
        "scrollY":        false,
        "scrollCollapse": false,
        "paging":         true,
        "lengthChange": true,
        "pagingType": "full_numbers",
        "ordering": true, /// allow sorting sa buong table
        "aaSorting": [],   /// remove sorting sa unang column  - 0
        "columnDefs": [
	        {
	        	"targets": [0,1],
	        	"orderable": false ///remove sorting sa lahat ng column maliban sa isa
	        }
        ],



        language: { 
        search: "", 

        searchPlaceholder: "Search:" }


    });
</script>
<script>
	var ProfTable3 = $("#ProfTable3").DataTable({
        "scrollY":        false,
        "scrollCollapse": false,
        "paging":         true,
        "lengthChange": true,
        "pagingType": "full_numbers",
        "ordering": true, /// allow sorting sa buong table
        "aaSorting": [],   /// remove sorting sa unang column  - 0
        "columnDefs": [
	        {
	        	"targets": [0,1,2],
	        	"orderable": false ///remove sorting sa lahat ng column maliban sa isa
	        }
        ],



        language: { 
        search: "", 

        searchPlaceholder: "Search:" }


    });



    // send_email_id


    function on_send_email(email)
    {
    	if(email)
    	{
    	Swal.fire({
	  title: 'Are you sure?',
	  text: "You won't be able to revert this!",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: '<a href="index.php?r=administrator/Dtr_send_email&email=".$email."">Confirm Send email</a>'
	}).then((result) => {
	  if (result.isConfirmed) {
	    Swal.fire(
					   'EMAIL sent Successfully',
						  'Redirecting...',
						   'success',
						  
					)	
	  		}
		})
		}
		else{
			Swal.fire({
					 title: 'Email is empty!',
					  icon: 'error',
					})
		}
    }

    
</script>