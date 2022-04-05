<!DOCTYPE html>
<html>
<head>

    <title></title>
    <style>
        
     

       

       
        .body
        {
            height: 600px;
            width: 100%;
            background-color: #ffffff;
			clear:both;

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


        .text_container_div
        {
        	position: relative;
        	float: left;
  			width: 100%;


        }

        .body_text
        {
            /*width: 100%;*/
            padding-bottom: 40px;
			max-width: 560px;
			overflow-y: auto;
			overflow-wrap: break-word;
			border: 1px solid black;
			margin: auto;
        }

        .text_div_class
        {
        	padding-bottom: 40px;
		  max-width: 560px;
		  overflow-y: auto;
		  overflow-wrap: break-word;
		  border: 1px solid black;
			margin: auto;

        }

       

        .before_footer
        {
        	position: relative;
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

		.body_text

		{
			font-weight: bold;
			font-family: "Times New Roman", Times, serif;
			margin-left: 35px;
			border: none;
		}

		.listOfFacultyMembers

		{
			font-weight: bold;
			font-family: "Times New Roman", Times, serif;
			margin-left: 35px;
			border: none;
			height: 100px;
			overflow-y: scroll;
		}

		.list_items
		{

		}



	</style>


</head>

<body>


    <form method="POST">
        <?php 

        require('config.php');
        $counter = 1;
        $month_date = date("m");
        $year_date = date("Y");
        $month_array = ['January','February','March','April','May','June','July','August','September','October','November','December'];

        $newmonth_date = (int)$month_date;
        $newmonth = $month_array[$newmonth_date-1];
        $date = $newmonth.' '.$year_date;
        $hrmd = "Atty. MICHELLE KRISTINE D. SARAUM";

        $counterforitems = 0;
        $counter = 0;
        $newresult_array  = [];  
        $temporary_list = ["REGULAR","PART-TIME","TS","OT"];
        $sql="SELECT DISTINCT * FROM tbl_dtr where status != 1 and hap_approval_status = 1";
        $result=mysqli_query($conn,$sql);

        
        
        
        foreach($result as $newresult)
        {
            $newresult_array[$counter] = $newresult['regpartime'];
            $counter++;
        }


        foreach($result as $newresult)
			{
			    $id[] = $newresult['id'];
			    $sn[] = $newresult['surname'];
			    $fn[] = $newresult['firstname'];
			    $mn[] = $newresult['middlename'];
			    $regpartime[] = $newresult['regpartime'];
			    $month[] = $newresult['month'];
			    $year[] = $newresult['year'];
			    $counterforitems++;
			}
			$y = 5;
    		$number_of_items = $counterforitems;	

        $count = count($temporary_list);
        
        for($q = 0; $q<$count;$q++)
        {
        	

           $monthcounter = 0;
           if($temporary_list[$q] == "REGULAR")
           {
           		$sql="SELECT DISTINCT * FROM tbl_dtr where status != 1  and hap_approval_status = 1 and `regpartime` = 'REGULAR'";
    			$result=mysqli_query($conn,$sql);
    			
           		echo'
	            <div class="page">
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
			 			<div id="director" contentEditable>Director</div>
						<br>

						<div id="human_resource" contentEditable>Human Resources Management Department</div> 
						<br>
						<br>
						<div id="dear" contentEditable>Dear Atty. Saraum:</div>
						<br>
						<div class="body_text" contentEditable>
			 					This is to endorse the Daily Time Record '.$temporary_list[$q].' of the following FACULTY MEMBERS of PUP TAGUIG for the month of DATE: 
			 			</div>

			 			

			 			
					</div>
					<div class="listOfFacultyMembers" contentEditable>
					 				<ul>

					';
					foreach($result as $newresult)
					{}
					for ($x = 0; $x <= $number_of_items; $x++)
    				{				
    					if ($x >= 1 && $x <= $number_of_items)
			            {
			                $y = $y + 5;
			            }
			            if(array_key_exists($x,$id))
			            {
				            $new_x = $x+1;
				            $x_dot = $new_x." ".".";
				            $name = $sn[$x].', '.$fn[$x].' '.$mn[$x];
				            $date = $month[$x].' '.$year[$x];
				            $name_temp = ["fernan","enan","mary","grace"];
				            $ctr = 0;


				            
				            	echo '
											<li class="list_items">'.$name.'</li>
										';
				            	

				            
				            
				                
						}
			        
					}
			 		echo'
			 		</ul>
			 					</div>	
					<div class="footer">
							<img src="assets/EOTM_footer.PNG" width="" height="">
						</div>
					
				</div>
				<br><br>



				';


           }

           if($temporary_list[$q] == "PART TIME")
           {
           		echo'
	            <div class="page">
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
			 			<div id="director" contentEditable>Director</div>
						<br>

						<div id="human_resource" contentEditable>Human Resources Management Department</div> 
						<br>
						<br>
						<div id="dear" contentEditable>Dear Atty. Saraum:</div>
						<br>
						<div class="body_text" contentEditable>
			 					This is to endorse the Daily Time Record '.$temporary_list[$q].' of the following FACULTY MEMBERS of PUP TAGUIG for the month of DATE:
			 				</div>
					</div>

			 		

					<div class="footer">
						<img src="assets/EOTM_footer.PNG" width="" height="">
					</div>
				</div>
				<br><br>



				';

           }

           if($temporary_list[$q] == "TS")
           {
           		echo'
	            <div class="page">
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
			 			<div id="director" contentEditable>Director</div>
						<br>

						<div id="human_resource" contentEditable>Human Resources Management Department</div> 
						<br>
						<br>
						<div id="dear" contentEditable>Dear Atty. Saraum:</div>
						<br>
						<div class="body_text" contentEditable>
			 					This is to endorse the Daily Time Record '.$temporary_list[$q].' of the following FACULTY MEMBERS of PUP TAGUIG for the month of DATE:
			 				</div>
					</div>

			 		

					<div class="footer">
						<img src="assets/EOTM_footer.PNG" width="" height="">
					</div>
				</div>
				<br><br>



				';
           }

           if($temporary_list[$q] == "OT")
           {
           		echo'
	            <div class="page">
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
			 			<div id="director" contentEditable>Director</div>
						<br>

						<div id="human_resource" contentEditable>Human Resources Management Department</div> 
						<br>
						<br>
						<div id="dear" contentEditable>Dear Atty. Saraum:</div>
						<br>
						<div class="body_text" contentEditable>
			 					This is to endorse the Daily Time Record '.$temporary_list[$q].' of the following FACULTY MEMBERS of PUP TAGUIG for the month of DATE:
			 				</div>
					</div>

			 		

					<div class="footer">
						<img src="assets/EOTM_footer.PNG" width="" height="">
					</div>
				</div>
				<br><br>



				';



           }
            
			$monthcounter++;
            
            
        }


         ?>


    </form>


</body>
<script>
	const mickey = document.querySelector('#firstname').textContent;
</script>
</html>

