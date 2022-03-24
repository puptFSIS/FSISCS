<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		.dtr_form
		{
			
			width: 550px;
			height: 1400px;
			background-color: white;


		}
		.dtr_type_id
		{
			position: relative;
  			display: inline-block;
			border-radius: 25px;
			width: 185px;
			top: 10px;
			left:350px;
			border:none;
			text-align: center;
			background: #e2d9d9;
			font-weight: bold;
			color: black;		
			font-size: 15.5px;
			transition: transform .04s;	
			/*box-shadow: 5px 7px 12px #888888;*/
			box-shadow: 5px 4px 10px #9a9393;
		}
	.dtr_type_id:hover
		{
			position: relative;
			background-color: #c59828;
			-ms-transform: scale(.5);  IE 9 
  			-webkit-transform: scale(1.5); 
  			transform: scale(1.110);
		}



		.civil_service
		{
			position:relative;
			left:120px;
		}
		.dtr_header_id
		{
			position:relative;
			text-align: center;

		}
		.user_name_sur
		{
			border-radius: 15px 20px 50px;
			width: 110px;
			position: relative;
			bottom:10px;
			margin: 0 auto;
			margin-left: 100px;
			height: 35px;
			border:none;
			font-weight: bold;
			font-size: 13.8px;
			text-align: center;
			border-bottom: 1px solid #000000;
			background: #e2d9d9;
			transition: transform .04s;
			color: black;
			text-transform: uppercase;
			box-shadow: 5px 4px 10px #9a9393;
		}
		.user_name_sur:hover
		{
			background-color: #c59828;
			-ms-transform: scale(.5); /* IE 9 */
  			-webkit-transform: scale(1.5); /* Safari 3-8 */
  			transform: scale(1.12);
		}
		.user_name_fn
		{
			border-radius: 50px 8px 50px;
			width: 110px;
			position: relative;
			bottom:45px;
			left:115px;
			margin: 0 auto;
			margin-left: 100px;
			height: 35px;
			border:none;
			text-align: center;
			border-bottom: 1px solid #000000;
			background: #e2d9d9;
			font-weight: bold;
			font-size: 13.8px;
			color: black;
			text-transform: uppercase;
			box-shadow: 5px 4px 10px #9a9393;
		}
		.user_name_fn:hover
		{
			background-color: #c59828;
			-ms-transform: scale(.5); /* IE 9 */
  			-webkit-transform: scale(1.5); /* Safari 3-8 */
  			transform: scale(1.12);
		}

		.user_name_mn
		{
			border-radius: 50px 20px 15px;
			width: 120px;
			position: relative;
			bottom:80px;
			left:115px;
			margin: 0 auto;
			height: 35px;
			border:none;
			text-align: center;
			border-bottom: 1px solid #000000;
			background: #e2d9d9;
			font-size: 13.8px;
			font-weight: bold;
			color: black;
			text-transform: uppercase;
			box-shadow: 5px 4px 10px #9a9393;		
		}
		.user_name_mn:hover
		{
			background-color: #c59828;
			-ms-transform: scale(.5); /* IE 9 */
  			-webkit-transform: scale(1.5); /* Safari 3-8 */
  			transform: scale(1.08);
		}
		.name_para
		{
			position: relative;
			bottom:75px;
			right :119px;
			text-align: center;
		}
		.name_para2
		{
			position: relative;
			bottom:115px;
			left: -7px;
			text-align: center;
		}
		.name_para3
		{
			position: relative;
			bottom:155px;
			left: 115px;
			text-align: center;
		}
		/*.line
		{
			position: relative;
			bottom:15px;
		}*/
		
		
		.month_text
		{
			position: relative;
			bottom: 170px;
			left: 45px;
			font-style: italic;
		}
		.month_input_class
		{
			width: 120px;
			position: relative;
			bottom: 85px;
			left: 145px;
			height: 7px;
		}

		
		.official_hours_class
		{
			position: relative;
			bottom: 240px;
			left: 45px;
			font-style: italic;
		}

		.regular_days_extra
		{
			position: relative;
			bottom: 280px;
			left: 304px;
			font-style: italic;
			/*display: none;*/
		}

		.saturdays_extra
		{
			position: relative;
			bottom: 300px;
			left: 319px;
			font-style: italic;
		}

		.official_hours_input_class
		{
			border-radius: 25px;
			width: 120px;
			position: relative;
			bottom:  403px;
			left: 400px;
			height: 7px;
			border:none;
			text-align: center;
			border-bottom: 1px solid #000000;
			background: #e2d9d9;
			color: black;
			font-weight: bold;
			transition: transform .04s;
			box-shadow: 2px 1.8px 5px #9a9393;
		}

		.official_hours_input_class:hover
		{
			background-color: #c59828;
			-ms-transform: scale(.5); /* IE 9 */
  			-webkit-transform: scale(1.5); /* Safari 3-8 */
  			transform: scale(1.115);
		}

		.arrival_and_departure_class
		{
			position: relative;
			bottom: 340px;
			left: 45px;
			font-style: italic;
			transition: transform .04s;
		}
		.arrival_and_departure_input_class:hover
		{
			background-color: #c59828;
			-ms-transform: scale(.5); /* IE 9 */
  			-webkit-transform: scale(1.5); /* Safari 3-8 */
  			transform: scale(1.115);
		}

		.arrival_and_departure_input_class
		{
			border-radius: 25px;
			width: 120px;
			position: relative;
			bottom: 400px;
			left: 400px;
			height: 7px;
			border:none;
			text-align: center;
			border-bottom: 1px solid #000000;
			background: #e2d9d9;
			color: black;
			font-weight: bold;
			box-shadow: 2px 1.8px 5px #9a9393;
		}

	
		select
		{
			width: 103px;
			height: 33px;
			-webkit-appearance: none;
		}


		.month_dropdown
		{
			position:relative;
			left: 360px;
			bottom: 220px;	
			border:none;
			border-bottom: 1px solid #000000;
			border-radius: 0;
			font-weight: bold;
			text-align: center;
			color: black;
			background: #d7cfcf;	
			transition: transform .04s;
			width: 100px;
		}
		.month_dropdown:hover
		{
	
			background-color: #cf682f;
			-ms-transform: scale(.5); /* IE 9 */
  			-webkit-transform: scale(1.5); /* Safari 3-8 */
  			transform: scale(1.115); 
		}
		

		.year_dropdown
		{
			position:relative;
			left: 470px;
			bottom: 253px;	
			width: 50px;
			height: 33px;	
			text-align: center;
			border:none;
			border-bottom: 1px solid #000000;
			border-radius: 0;
			background: #d7cfcf;
			font-weight: bold;
			color: black;
			transition: transform .04s;
		}

		.year_dropdown:hover
		{
			background-color: #cf682f;
			-ms-transform: scale(.5); /* IE 9 */
  			-webkit-transform: scale(1.5); /* Safari 3-8 */
  			transform: scale(1.115);
		}

		.text_center
		{
			width: 500px;
			position: relative;
			text-align: center;
			bottom: 300px;
			left: 30px;
		}

		.bottom_text
		{
			bottom: -58px;
			font-size: 8px;
			left: 32px;
		}

		.bottom_text2
		{
			bottom: -33px;
			font-size: 8px;
			left: 32px;
		}

		.table_class
		{
			text-align: center;
			/*border-right: 2px solid black;*/
			border-color: black;
			border-left: none;
			border-right: 1px solid black;
			border-top: none;
			border-bottom: none;
			border-collapse: inherit;
			position: relative;
			bottom:400px;




		}
		td
		{
			width: 2px;
			
		
			border: 1px solid black;
			font-size: 3px;
			border:collapse;
			padding: 0;
			margin: 0;
			padding:0px !important;
    		/*vertical-align:top;*/

		}
		.onetothirtyone_input
		{
		width: 100%;
		box-sizing: border-box;
		-webkit-box-sizing:border-box;
		-moz-box-sizing: border-box;
		background:transparent !important;
		border: 0px;
		padding: 0;
		text-align: center;
		}

		#align_form
		{
			margin-top: -150px;
		}

		.total_word
		{
			text-align: right;
		}

		.footer_text
		{
			position: relative;
			bottom: 270px;
			text-align: center;
		}
		.footer_username
		{
			width: 500px;
			position: relative;
			bottom: 270px;
			margin: 0 auto;
			height: 35px;
			border:none;
			text-align: center;
			border-bottom: 1px solid #000000;
			border-radius: 0;
			background: #d7cfcf;
			color: black;
			font-weight: bold;
			transition: transform .04s;
			text-transform: uppercase;
		}
		.footer_username:hover
		{
			background-color: #cf682f;
			-ms-transform: scale(.5); /* IE 9 */
  			-webkit-transform: scale(1.5); /* Safari 3-8 */
  			transform: scale(1.05);
		}
		.footer_username_text
		{
			width: 500px;
			position: relative;
			bottom: 270px;
			margin: 0 auto;
			text-align: center;

			
		}

		.footer_incharge
		{
			width: 500px;
			position: relative;
			bottom: 220px;
			margin: 0 auto;
			height: 35px;
			border:none;
			text-align: center;
			border-bottom: 1px solid #000000;
			border-radius: 0;
			background: #d7cfcf;
			color: black;
			font-weight: bold;
			transition: transform .04s;
		}
		.footer_incharge:hover
		{
			background-color: #cf682f;
			-ms-transform: scale(.5); /* IE 9 */
  			-webkit-transform: scale(1.5); /* Safari 3-8 */
  			transform: scale(1.05);
		}
		.footer_incharge_text
		{
			width: 500px;
			position: relative;
			bottom: 220px;
			margin: 0 auto;
			text-align: center;
			
		}

		.days_of_month
		{
			position: relative;
			bottom:150px;
			font-size: 8px;
		}

		#month_holder
		{
			bottom: 220px;
			left: 418px;
			font-size: 20px;
			font-weight: bold;
		}



<p class="month_text">For the month of  </p>
<p id="month_holder"><?php echo " ".date("M Y");?></p>


	</style>

	<?php 
	include("config.php"); include("getPersonalInformation.php");
		$array_month =array('January','February','March','April','May','June','July','August','September','October','November','December');
		if(isset($_POST['submit'])) 
		{
			$RegPartTemp = $_POST['dtr1'];
			$month = $_POST['dtr2'];
			$year = $_POST['dtr3'];
			$new_count = $_POST['count_day'];
			$new_month = $array_month[$month-1];
			$reg_days_hrs=  $_POST['official_hours_input'];
			$saturdays=  $_POST['arrival_and_departure'];
			$ntd_by = $_POST['ntd_by'];
			$in_charge = $_POST['in_charge'];
			$new_sur= $_POST['DTR_NAME1'];
			$new_fn= $_POST['DTR_NAME2'];
			$new_mn= $_POST['DTR_NAME3'];
			$date = date('Y-m-d H:i:s');

			$insert = mysqli_query($conn,"INSERT INTO `tbl_dtr`(`id`,`FCode`, `surname`,`firstname`,`middlename`,`regpartime`,`month`,`year`,`days_count`,`reg_days_hrs`,`saturdays`,`ntd_by_offhour`,`in_charge`,`modified_date`) VALUES ('','$fcode','$new_sur','$new_fn','$new_mn','$RegPartTemp','$new_month','$year','$new_count','$reg_days_hrs','$saturdays','$ntd_by','$in_charge','$date')");
				if(!$insert)
				    {
				        echo mysqli_error($conn);
				        
				    }
				    else
				    {
				        echo "Records added successfully.";
				    }
			
			
			for($i=1;$i<=$new_count;$i++)
			{

			 $day_date = $_POST['cells_datee'.$i];
			 $cells_am_arr = mysqli_real_escape_string($conn,$_POST['cells_am_arr'.$i]);
			 $cells_am_dep = mysqli_real_escape_string($conn,$_POST['cells_am_dep'.$i]);
			 $cells_pm_arr = mysqli_real_escape_string($conn,$_POST['cells_pm_arr'.$i]);
			 $cells_pm_dep = mysqli_real_escape_string($conn,$_POST['cells_pm_dep'.$i]);
			 $cells_hrs_under = mysqli_real_escape_string($conn,$_POST['cells_hrs_under'.$i]);
			 $cells_min_under = mysqli_real_escape_string($conn,$_POST['cells_min_under'.$i]);
			$insert2 = mysqli_query($conn,"INSERT INTO `tbl_dtr_timesheet`(`id`,`FCode`,`month`,`year`,`day_date`,`am_arrival`,`am_departure`,`pm_arrival`,`pm_departure`,`under_hours`,`under_minute`) VALUES ('','$fcode','$new_month','$year','$day_date','$cells_am_arr','$cells_am_dep','$cells_pm_arr','$cells_pm_dep','$cells_hrs_under','$cells_min_under')");
	       }
		}
		mysqli_close($conn);
	?>


</head>
<body>
	<form method="POST">
		<div class="dtr_form">
			<div class="header">
				<!-- <input class="dtr_type_id" type="text" name="DTR-TYPE_NAME" value="DTR-TYPE"> -->
					<td><input id="count_day" class="onetothirtyone_input" type="hidden" name="count_day"></td>
					  <select class="dtr_type_id" name="dtr1" id="dtr" onmouseover="mouseOver()" onmouseout="mouseOut()" onchange="timeprof(this)">
					  	<option style="display:none;">LOAD TYPE</option>
					    <option value="REGULAR" id="bg_dropdown">REGULAR</option>
					    <option value="PART-TIME" id="bg_dropdown">PART-TIME</option>
					    <option value="TEMPORARY SUBSTITUTION" id="bg_dropdown">TEMPORARY SUBSTITUTION</option>
					  </select>
				<p id="date_test_id" hidden="true"></p>
				<p class="civil_service">Civil Service Form No. 48</p>
				<h3 class="dtr_header_id">DAILY TIME RECORD</h3>
				<p class="dtr_header_id">------o0o------</p>
				<input class="user_name_sur" type="text" name="DTR_NAME1" value="<?php echo $surname; ?>">
				<input class="user_name_fn" type="text" name="DTR_NAME2" value="<?php echo $firstname; ?>">
				<input class="user_name_mn" type="text" name="DTR_NAME3" value="<?php echo $middlename;?>">
				<p class="name_para">(Surname)</p>
				<p class="name_para2">(First name)</p>
				<p class="name_para3">(Middle name)</p>
				<br>
				<p class="month_text">For the month of  </p>
				<!-- <p id="month_holder"><?php //echo " ".date("M Y");?></p> -->
				<select id="month_dropdown_id" class="month_dropdown" name="dtr2" onchange="getMonth(this)">
						<!-- <option value=""></option> -->
						<option style="display:none;" value="<?php echo date("m");?>"><?php echo date("F");?></option>
						<option style="background-color: white" value="1">January</option>
					    <option style="background-color: white" value="2">February</option>
					    <option style="background-color: white" value="3">March</option>
					    <option style="background-color: white" value="4">April</option>
					    <option style="background-color: white" value="5">May</option>
					    <option style="background-color: white" value="6">June</option>
					    <option style="background-color: white" value="7">July</option>
					    <option style="background-color: white" value="8">August</option>
					    <option style="background-color: white" value="9">September</option>
					    <option style="background-color: white" value="10">October</option>
					    <option style="background-color: white" value="11">November</option>
					    <option style="background-color: white" value="12">December</option>
					    <!-- <option value="JANUARY">JANUARY</option>
					    <option value="FEBRUARY">FEBRUARY</option>
					    <option value="MARCH">MARCH</option>
					    <option value="APRIL">APRIL</option>
					    <option value="MAY">MAY</option>
					    <option value="JUNE">JUNE</option>
					    <option value="JULY">JULY</option>
					    <option value="AUGUST">AUGUST</option>
					    <option value="SEPTEMBER">SEPTEMBER</option>
					    <option value="OCTOBER">OCTOBER</option>
					    <option value="NOVEMBER">NOVEMBER</option>
					    <option value="DECEMBER">DECEMBER</option> -->
				</select>

				<select class="year_dropdown" id="year_dropdown_id" name="dtr3" onchange="getYear(this)" >
						<!-- <option value=""></option> -->
						<option style="display:none;" value="<?php echo date("Y");?>" ><?php echo date("Y");?></option>
						<option style="background-color: white" value="2021">2022</option>
					    <option style="background-color: white" value="2021">2021</option>
					    <option style="background-color: white" value="2020">2020</option>
					    <option style="background-color: white" value="2019">2019</option>
					    <option style="background-color: white" value="2018">2018</option>
					    <option style="background-color: white" value="2017">2017</option>
					    <option style="background-color: white" value="2016">2016</option>						
					    <option style="background-color: white" value="2015">2015</option>	
					    <option style="background-color: white" value="2014">2014</option>	
				</select>

				<p class="official_hours_class">Official Hours For</p>
				
				<p class="regular_days_extra">Regular Days</p>
				<p class="saturdays_extra">Saturdays</p>
				<p class="arrival_and_departure_class">Arrival and Departure</p>
				<input id="sample5" class="official_hours_input_class" type="text" name="official_hours_input">
				<input class="arrival_and_departure_input_class" type="text" name="arrival_and_departure">
				
				

			<table class="table_class" >
				<tr>
				 	<td rowspan="2">DAY</td>
				  	<td colspan="2">A.M</td>
				  	<td colspan="2">P.M</td>
				  	<td colspan="2">UNDERTIME</td>

				</tr>

				 <tr>
				    <td>Arrival</td>
				    <td>Departure</td>
				    <td>Arrival</td>
				    <td>Departure</td>
				    <td>HOURS</td>
				    <td>MINUTES</td>
				</tr>

				

				<!-- start of 1 - 3 -->
				<div class="onetothirtyone">
					<?php for($i=1;$i<=31;$i++) {
						?>
					<tr>
						<input id="cells_datee<?php echo $i; ?>" name="cells_datee<?php echo $i; ?>" type="hidden" >
						<td id="cells_date<?php echo $i; ?>" name="cells_date<?php echo $i; ?>" ></td>
						<td><input id="cells_am_arr<?php echo $i; ?>" class="onetothirtyone_input" type="text" name="cells_am_arr<?php echo $i; ?>"></td>
						<td><input id="cells_am_dep<?php echo $i; ?>" class="onetothirtyone_input" type="text" name="cells_am_dep<?php echo $i; ?>"></td>
						<td><input id="cells_pm_arr<?php echo $i; ?>" class="onetothirtyone_input" type="text" name="cells_pm_arr<?php echo $i; ?>"></td>
						<td><input id="cells_pm_dep<?php echo $i; ?>" class="onetothirtyone_input" type="text" name="cells_pm_dep<?php echo $i; ?>"></td>
						<td><input id="cells_hrs_under<?php echo $i; ?>" class="onetothirtyone_input" type="text" name="cells_hrs_under<?php echo $i; ?>"></td>
						<td><input id="cells_min_under<?php echo $i; ?>" class="onetothirtyone_input" type="text" name="cells_min_under<?php echo $i; ?>"></td> 
					</tr>
				<?php }?>
				
					
					<tr>
						<td class="total_word" colspan="5">TOTAL</td>
						<td><input class="onetothirtyone_input" type="text" name=""></td>
						<td><input id="last_cell_id" class="onetothirtyone_input" type="text" name=""></td>
					</tr>
				</div>
				
			
				
			</table>

			

			</div>
			<p class="footer_text">I certify on my honor that the above is a true and correct report of the hours of work performed, record of which was made daily at the time of arrival and departure from office.</p>

			<input  class="footer_username" type="text" name="ntd_by" value="<?php echo $surname," ",$firstname," ",$middlename; ?>" >
			<p class="footer_username_text">Noted by as the prescribed office hours</p>
			<input class="footer_incharge" type="text" name="in_charge" value="MARRISA B. FERRER" >
			<p class="footer_incharge_text">In Charge</p>
		</div>
		<input id=submitbtn type="submit" name="submit" value="Submit" disabled>
		</form>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script>

		//const date_test = document.getElementById("date_test_id");
		//const last_cell = document.getElementById("last_cell_id");
		//const month = document.getElementById("month_dropdown_id");
		//const year = document.getElementById("year_dropdown_id");
		var x2 = 0;
		var d2 = 0;
		var m2 = 0;
		var x3 = 0;
		var d3 = 0;
		var monthcounter = 0;
		var yearcounter = 0;
		var x;
		var d;
		var mm;
		var yy;
		var xx;
		var new_xx;
		var fcode1 = '<?php echo $fcode;?>';
		
		
		function timeprof(selectObject) {
			var checkloadtype = ['PART-TIME','REGULAR','TEMPORARY SUBSTITUTION'];
			var tp = selectObject.value;
			var lt=tp;
				if(lt == checkloadtype[0])
				{
					xx = 0;
				}
				if(lt == checkloadtype[1])
				{
					xx = 1;
				}
				if(lt == checkloadtype[2])
				{
					xx = 2;
				}
			getdtrdata(xx,0,0);
		}

		function getMonth(selectObject) {
			var m = selectObject.value;
			let date = new Date();
			let year = date.getFullYear();
			if(monthcounter ==0)
			{
				getDate(m,year);
				getdtrdata(-1,m,year);
			}
			else
			{
				getDate(m,0);
				getdtrdata(-1,m,0);
			}
			monthcounter++;
			
		}

		function getYear(selectObject) {
			var y = selectObject.value;
			let date = new Date();
			let month = date.getMonth();
			if(monthcounter ==0)
			{
				getDate(month,y);
				getdtrdata(-1,month,y);
			}
			else
			{
				getDate(0,y);
				getdtrdata(-1,0,y);
			}
			yearcounter++;
			
		}



		function getdtrdata(load,month,year) {

			var days2 = ['SUN','M','T','W','TH','F','S'];
			
			if(load!==-1)
			{
				new_xx = load;
				m2++;
			}
			if(month!==0)
			{
				mm=month;
				x3++;
			}
			if(year!==0)
			{
				yy=year;
				d3++;
			}

			if(m2!==0 && x3!==0 && d3!==0)
  			{
	  			$.ajax({
		      type: "POST",
		      url:    "<?php echo Yii::app()->createUrl('administrator/FetchDtrSched'); ?>",
		      data:  {val1:new_xx,val3:yy,val4:fcode1},
		      dataType:"JSON",
		      success:function(data){
		      	var final_stimes;
		      	var final_stimee;
		      	var stimes_hold = [];
		      	var stimee_hold = [];
		      	var final_stimes_pm;
		      	var final_stimee_pm;
		      	var stimes_hold_pm = [];
		      	var stimee_hold_pm = [];

		      	var counter = 0;
		    	var cd = document.getElementById('count_day').value;
		    	for(var a=1;a<=cd;a++)
		    	{
		    		var cells_am_arr = document.getElementById('cells_am_arr'+a);
		    		cells_am_arr.value='';
		    		var cells_am_dep = document.getElementById('cells_am_dep'+a);
		    		cells_am_dep.value='';
		    		var cells_pm_arr = document.getElementById('cells_pm_arr'+a);
		    		cells_pm_arr.value='';
		    		var cells_pm_dep = document.getElementById('cells_pm_dep'+a);
		    		cells_pm_dep.value='';
		    		var i = document.getElementById('cells_datee'+a).value;
		    		var ii = i.replace(/[0-9]/g, '');
		    		var new_ii = ii.replace(/^[\s\d]+/, '');
		    		var new_iii = new_ii.replace(/^\s+|\s+$/gm,'');

		    		if (new_iii=='Mon') 
						{
							var new_i = days2[1];
						}
					if (new_iii=='Tue') 
						{
							var new_i = days2[2];
						}
					if (new_iii=='Wed') 
						{
							var new_i = days2[3];
						}
					if (new_iii=='Thu') 
						{
							var new_i = days2[4];
						}
					if (new_iii=='Fri') 
						{
							var new_i = days2[5];
						}
					if (new_iii=='Sat') 
						{
							var new_i = days2[6];
						}
					if (new_iii=='Sun') 
						{
							var new_i = days2[0];
						}
				for(var b=1;b<=data.count;b++) 
				{
					//var final_stimes ='';
					if(new_i == data.sday[b-1])
					{
						stimes_hold[counter] = data.stimeS[b-1];
						stimee_hold[counter] = data.stimeE[b-1];
						stimes_hold_pm[counter] = data.stimeS[b-1];
						stimee_hold_pm[counter] = data.stimeE[b-1];
						counter++;
					}
				/*if(stimee_hold >= data.stimeE[b] && stimee_hold < 1200)
					{
						final_stimee = stimee_hold;
						cells_am_dep.value = final_stimee;
					} */
												
				} 
				//for am arrival below
				if (stimes_hold.length==1 && stimes_hold[0]<1200)
				{
					final_stimes = stimes_hold[0];
					cells_am_arr.value = final_stimes;
					
				}
				if (stimes_hold.length > 1){
					stimes_hold.sort(function(a, b) {
					  return a - b;
					});
					if(stimes_hold[0]<1200)
					{
					final_stimes = stimes_hold[0];
					cells_am_arr.value = final_stimes;
					}	
					
				}
				// for am departure below
				if (stimee_hold.length==1 && stimee_hold[0]<1200)
				{
					final_stimee = stimee_hold[0];
					cells_am_dep.value = final_stimee;
					
				}
				if (stimee_hold.length > 1){
					stimee_hold.sort(function(a, b) {
					  return a - b;
					});
					if(stimee_hold[0]<1200)
					{
					final_stimee = stimee_hold[0];
					cells_am_dep.value = final_stimee;
					}	
					
				}

				//for pm arrival below
				 var filter = stimes_hold_pm.filter(function(x) {
				    return x > 1159 && x <2400;
				});

				if (filter.length==1 && filter[0]>1159)
				{
					final_stimes_pm = filter[0];
					cells_pm_arr.value = final_stimes_pm;
					
				}
				if (filter.length > 1){
					filter.sort(function(a, b) {
					  return a - b;
					});
					if(filter[0]>1159)
					{
					final_stimes_pm = filter[0];
					cells_pm_arr.value = final_stimes_pm;
					}	
					
				} 

				//for pm departure below
				var filter2 = stimee_hold_pm.filter(function(x) {
				    return x > 1159 && x <2400;
				});

				if (filter2.length==1 && filter2[0]>1159)
				{
					final_stimee_pm = filter2[0];
					cells_pm_dep.value = final_stimee_pm;
					
				}
				if (filter2.length > 1){
					filter2.sort(function(a, b) {
					  return a - b;
					});
					if(filter2[0]>1159)
					{
					final_stimee_pm = filter2[0];
					cells_pm_dep.value = final_stimee_pm;
					}	
					
				} 


				counter =0;
				stimee_hold = [];
				stimes_hold = [];
				stimes_hold_pm = [];
				stimee_hold_pm = [];
				filter = [];
		    	}
		    	
		      	//console.log(data.stimeE);
		      	
		      	//$.each(data.data, function (schoolYear, value) { alert(value.schoolYear)});
               
            },
            error: function(data) { // if error occured
                var cd = document.getElementById('count_day').value;
		    	for(var a=1;a<=cd;a++)
		    	{
		    		var cells_am_arr = document.getElementById('cells_am_arr'+a);
		    		cells_am_arr.value='';
		    		var cells_am_dep = document.getElementById('cells_am_dep'+a);
		    		cells_am_dep.value='';
		    		var cells_pm_arr = document.getElementById('cells_pm_arr'+a);
		    		cells_pm_arr.value='';
		    		var cells_pm_dep = document.getElementById('cells_pm_dep'+a);
		    		cells_pm_dep.value='';
		    	}
                alert("No such directory exists!");

            }
	    		});
  			
  			x3 = 1;
  			d3 = 1;
  			m2 = 1;
  			}
		}

		function getmonthyear()
		{
			let date = new Date();
			let month = date.getMonth();
			let year = date.getFullYear();
			getDaysInAMonth(1,1,month+1,year);
			getDaysInAMonth(2,2,month+1,year);
			getDaysInAMonth(3,3,month+1,year);
			getDaysInAMonth(4,4,month+1,year);
			getDaysInAMonth(5,5,month+1,year);
			getDaysInAMonth(6,6,month+1,year);
			getDaysInAMonth(7,0,month+1,year);
			getdtrdata(-1,month,year);
		}

		function getDate(month,year) {
			if(month == 0)
				x = year;
			else if(year ==0)
				d = month;
			else
			{
				x = year;
				d = month;
			}

  			getDaysInAMonth(1,1,d,x);
			getDaysInAMonth(2,2,d,x);
			getDaysInAMonth(3,3,d,x);
			getDaysInAMonth(4,4,d,x);
			getDaysInAMonth(5,5,d,x);
			getDaysInAMonth(6,6,d,x);
			getDaysInAMonth(7,0,d,x);
			}


		window.onload = function() {
			getmonthyear();
		}

		

		function current_date()
		{
			n =  new Date();
			y = n.getFullYear();
			m = n.getMonth() + 1;
			d = n.getDate();
			document.getElementById("date_test_id").innerHTML = m + "/" + d + "/" + y;
			month.value = m;
			year.value = y;

		}

		//monday = 1, tues = 2, wed = 3, thurs = 4, fri = 5, sat = 6, sun = 7
		function getDaysInAMonth(day,counter,month2,year2) {
		    var d = new Date(year2,month2-1),
		        month = d.getMonth(),
		        monday = [],
		        tuesday = [],
		        wednesday = [],
		        thursday = [],
		        friday = [],
		        saturday = [],
		        sunday = [],
		        days = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'],
		        count = 0;
		        document.getElementById("submitbtn").disabled = false;
		   
		    for (let i =1;i<=31;i++)
		    {
		    	d.setDate(i)
		    	if(d.getDay() == 1 && d.getMonth()==month)
		    	{
		    		//monday.push(new Date(d.getTime()).toDateString());
		    		document.getElementById('cells_date'+i).innerHTML =days[1]+" "+ i ;
		    		var a = document.getElementById('cells_datee'+i);
		    		a.value = days[1]+" "+ i;
		    		count++;
		    	}
		    	else if(d.getDay() == 2 && d.getMonth()==month)
		    	{
		    		//tuesday.push(new Date(d.getTime()).toDateString());
		    		document.getElementById('cells_date'+i).innerHTML = days[2]+" "+ i ;
		    		var a = document.getElementById('cells_datee'+i);
		    		a.value = days[2]+" "+ i;
		    		count++;
		    	}
		    	else if(d.getDay() == 3 && d.getMonth()==month)
		    	{
		    		//wednesday.push(new Date(d.getTime()).toDateString());
		    		document.getElementById('cells_date'+i).innerHTML = days[3]+" "+ i ;
		    		var a = document.getElementById('cells_datee'+i);
		    		a.value = days[3]+" "+ i;
		    		count++;
		    	}
		    	else if(d.getDay() == 4 && d.getMonth()==month)
		    	{days[1]+" "+ i 
		    		//thursday.push(new Date(d.getTime()).toDateString());
		    		document.getElementById('cells_date'+i).innerHTML = days[4]+" "+ i ;
		    		var a = document.getElementById('cells_datee'+i);
		    		a.value = days[4]+" "+ i;
		    		count++;
		    	}
		    	else if(d.getDay() == 5 && d.getMonth()==month)
		    	{
		    		//friday.push(new Date(d.getTime()).toDateString());
		    		document.getElementById('cells_date'+i).innerHTML = days[5]+" "+ i ;
		    		var a = document.getElementById('cells_datee'+i);
		    		a.value = days[5]+" "+ i;
		    		count++;
		    	}
		    	else if(d.getDay() == 6 && d.getMonth()==month)
		    	{
		    		//saturday.push(new Date(d.getTime()).toDateString());
		    		document.getElementById('cells_date'+i).innerHTML = days[6]+" "+ i ;
		    		var a = document.getElementById('cells_datee'+i);
		    		a.value = days[6]+" "+ i;
		    		count++;
		    	}
		    	else if(d.getDay() == 0 && d.getMonth()==month)
		    	{
		    		//sunday.push(new Date(d.getTime()).toDateString());
		    		document.getElementById('cells_date'+i).innerHTML = days[0]+" "+ i ;
		    		var a = document.getElementById('cells_datee'+i);
		    		a.value = days[0]+" "+ i;
		    		count++;
		    	}
		    	else{
		    		document.getElementById('cells_date'+i).innerHTML = " ";
		    		var a = document.getElementById('cells_datee'+i);
		    		a.value = " ";
		    	}
		    	
		    	if(i===31)
		    	{
		    	var a = document.getElementById("count_day");
		    	a.value = count;
		    	count=0;

		    	}

		    }
		    
		    
		    
		/*
		    // Get the first Monday in the month
		    while (d.getDay() !== counter) {
		        d.setDate(d.getDate() + 1);
		    }
		    // Get all the other Mondays in the month
		    while (d.getMonth() === month) {
		        days.push(new Date(d.getTime()).toDateString());
		        d.setDate(d.getDate() + 7);
		    }
		    // return mondays;
		    if(day == 1 && counter ==1)
		    {
				document.getElementById("mondays").innerHTML = days;
		    }
		    if(day == 2 && counter ==2)
		    {
				document.getElementById("tuesdays").innerHTML = days;
		    }
		    if(day == 3 && counter ==3)
		    {
				document.getElementById("wednesdays").innerHTML = days;
		    }
		    if(day == 4 && counter ==4)
		    {
				document.getElementById("thursdays").innerHTML = days;
		    }
		    if(day == 5 && counter ==5)
		    {
				document.getElementById("fridays").innerHTML = days;
		    }
		    if(day == 6 && counter ==6)
		    {
				document.getElementById("saturdays").innerHTML = days;
		    }
		    if(day == 7 && counter ==0)
		    {
				document.getElementById("sundays").innerHTML = days;
		    }
		    
		    console.log(days); */
		}

	</script>
	</body>
	</html>