<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		
		body
		{
		}

		.header
		{
			width: 100%;
			height: 150px;
			position: relative;
			display: inline-block;
			overflow: hidden;
			margin: 0;
			background-color: #ffffff;
		}

		div > img
		{
		  
		  width: 100%;
		}
		.body
		{
			height: 400px;
			width: 100%;
			background-color: #ffffff;
		}


		.no_box
		{
			border: none;
			background: #ffffff;

		}

		.page
		{
			border: 2px solid black;

		}

		.footer
		{
			width: 100%;
			height: 150px;
			position: relative;
			display: inline-block;
			overflow: hidden;
			margin: 0;
			background-color: #ffffff;
		}

		.pup_logo
		{
			 position: sticky;
			 width: 90px; 
			 height:90px; 
			 margin-top: -107px;
			 margin-left: 20px;
		}

		.header_first_text
		{
			margin-left: 120px;
			font-size: 11px;
			font-family: "Times New Roman", Times, serif;
			margin-bottom: -1px;
		}
		.header_second_text
		{

			margin-left: 120px;
			font-size: 13px;
			font-weight: bold;
			font-family: "Times New Roman", Times, serif;
			margin-bottom: -7px;
		}
		.header_third_text
		{
			margin-left: 120px;
			font-size: 13px;
			font-weight: bold;
			font-family: "Times New Roman", Times, serif;
			margin-bottom: -7px;
		}
		.header_fourth_text
		{
			margin-left: 120px;
			font-size: 13px;
			font-weight: bold;
			font-family: "Times New Roman", Times, serif;
			margin-bottom: -7px;
		}
		.header_fifth_text
		{
			margin-left: 432px;
			font-size: 13px;
			font-weight: bold;
			font-family: "Times New Roman", Times, serif;
			
		}
		
		#long_line
		{
			margin-top: -20px;
			margin-left: 20px;
		}

		#month_input
		{
			background-color: #e2d9d9;
			margin-top: -7px;
			margin-left: 30px;
			transition: transform .04s;
			color: black;
			text-transform: uppercase;
			box-shadow: 2px 2px 5px #9a9393;
			border-radius: 50px 50px 50px;
			width: 105px;
			font-weight: bold;
			font-family: "Times New Roman", Times, serif;
		
		}
		#month_input:hover
		{
			background-color: #c59828;
			-ms-transform: scale(.5); /* IE 9 */
  			-webkit-transform: scale(1.5); /* Safari 3-8 */
  			transform: scale(1.10);
		}

		#hr_name
		{
			background-color: #e2d9d9;
			transition: transform .04s;
			color: black;
			text-transform: uppercase;
			box-shadow: 2px 2px 5px #9a9393;
			border-radius: 50px 50px 50px;
			width: 300px;
			font-weight: bold;
			font-family: "Times New Roman", Times, serif;
			margin-top: 10px;
			margin-left: 30px;
		}

		#hr_name:hover
		{
			background-color: #c59828;
			-ms-transform: scale(.5); /* IE 9 */
  			-webkit-transform: scale(1.5); /* Safari 3-8 */
  			transform: scale(1.05);
		}

		#director
		{
			font-weight: bold;
			font-family: "Times New Roman", Times, serif;
			margin-top: -10px;
			margin-left: 35px;
		}

		#human_resource
		{
			font-weight: bold;
			font-family: "Times New Roman", Times, serif;
			margin-top: -22px;
			margin-left: 35px;
		}

		#dear
		{
			font-weight: bold;
			font-family: "Times New Roman", Times, serif;
			margin-left: 35px;
		}

	</style>

</head>

<body>
	
	<form method="POST">
		<?php 

		require('config.php');

		$month_date = date("m");
    	$year_date = date("Y");
    	$month_array = ['January','February','March','April','May','June','July','August','September','October','November','December'];

    	$newmonth_date = (int)$month_date;
    	$newmonth = $month_array[$newmonth_date-1];
        $date = $newmonth.' '.$year_date;
      	$hrmd = "Atty. MICHELLE KRISTINE D. SARAUM";
      	
      	$regular_text ="This is to endorse the Daily Time Record REGULAR of the following FACULTY MEMBERS of PUP TAGUIG for the month of MARCH and APRIL 2021: ";
      	$part_text = "This is to endorse the Daily Time Record PART TIME of the following FACULTY MEMBERS of PUP TAGUIG for the month of MARCH and APRIL 2021: ";
      	$ts_text = "This is to endorse the Daily Time Record TS of the following FACULTY MEMBERS of PUP TAGUIG for the month of MARCH and APRIL, 2021: ";
      	$ot_text = "This is to endorse the Daily Time Record TS of the following FACULTY MEMBERS of PUP TAGUIG for the month of MARCH and APRIL, 2021: ";




        $counterforitems = 0;
        $counter = 0;
        $newresult_array  = [];  
        $temporary_list = ["REGULAR","PART-TIME","TS","OT"];
        $sql="SELECT * FROM tbl_dtr where status != 1 and hap_approval_status = 1";
        $result=mysqli_query($conn,$sql);

        
        
        
        foreach($result as $newresult)
        {
            $newresult_array[$counter] = $newresult['regpartime'];
            $counter++;
        }

        $count = count($temporary_list);
        
        for($q = 0; $q<$count;$q++)
        {
           $monthcounter = 0;
           if($temporary_list[$q] == "REGULAR")
           {
           		echo'
	            
           			
					<div class="body">
						<br>
						<p class="header_first_text">Republic of the Philippines</p>
						<p class="header_second_text">POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</p>
						<p class="header_third_text">Office of the Vice President for Branches and Satellite Campuses</p>
						<p class="header_fourth_text">TAGUIG BRANCH</p>
						<p class="header_fifth_text">CTS No.</p>
						<img src="assets/puplogo.png" class="pup_logo">
						<br>
						<p id="long_line">___________________________________________________________________________________</p>

						<input class="date no_box" id="month_input" type="" name="" value="'.$date.'">
						<input class="hrmd no_box" id="hr_name" type="" name="" value="'.$hrmd.'">
						<br>
			 			<p id="director">Director</p>
						<p id="human_resource">Human Resources Management Department</p> 
						<br>
						<br>
						<p id="dear">Dear Atty. Saraum:</p>
					</p> 

						
			 				<input class type="" name="" value="'.$regular_text.'">
						

			 			
						<p class="loadtype">'.$temporary_list[$q].'</p>
					</div>



					<div class="footer">
						<img src="assets/EOTM_footer.PNG" width="" height="">
					</div>
				</div>
				<br><br>';


           }

           if($temporary_list[$q] == "PART TIME")
           {
           		echo'
	            <div class="page">
	            	<div class="header">
						<img src="assets/EOTM_header.PNG" width="" height="">
					</div>



					<div class="body">
						<input class="date no_box" type="" name="" value="'.$date.'">
						<input class="hrmd no_box" type="" name="" value="'.$hrmd.'">
			 			<p>Director
			 			<br>
						Human Resources Management Department 
						<br>
						<br>
						Dear Atty. Saraum:
						</p> 

						
			 				<input class type="" name="" value="'.$part_text.'">
						

			 			
						<p class="loadtype">'.$temporary_list[$q].'</p>
					</div>



					<div class="footer">
						<img src="assets/EOTM_footer.PNG" width="" height="">
					</div>
				</div>
				<br><br>';

           }
            
			$monthcounter++;
            
            
        }



		 ?>

	</form>
</body>
</html>