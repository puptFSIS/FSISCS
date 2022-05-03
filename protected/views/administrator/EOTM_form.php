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
        	width: 612px;
        	height: 936px;
            border: 2px solid black;
            display: flex;
            flex-direction: column;

        }


        .text_container_div
        {
        	position: relative;
        	float: left;
  			width: 100%;


        }

        .body_text
        {
        	background-color: #f0f0f0;
            padding-bottom: 40px;
			max-width: 555px;
			max-height: 40px;
			overflow: auto;
			overflow-wrap: break-word;
			border: 1px solid #abb4bd;
			margin-left: 30px;
			margin-top: -20px;
			text-align: left;
			font-family: "Times New Roman", Times, serif;
			font-weight: bold;
			text-transform: capitalize;
        }

        .body_text:hover
        {
			background-color: #dadada;
		}

		.listOfFacultyMembers

		{
			background-color: #f0f0f0;
			border: 1px solid #abb4bd;
			font-weight: bold;
			font-family: "Times New Roman", Times, serif;
			margin-top: -450px;
			margin-left: 30px;
			border: none;
			max-width: 555px;
			overflow: auto;
		}

		.listOfFacultyMembers:hover
		{
			background-color: #dadada;
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
            margin-top: auto;
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
			width: 612px;
        	height: 936px;
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
			background-color: #f0f0f0;
			margin-top: -7px;
			margin-left: 30px;
			box-sizing: border-box;
			border: 1px solid #abb4bd;
			transition: transform .04s;
			color: black;
			text-transform: capitalize;
			width: 103px;
			height: 15px;
			text-align: left;
			font-weight: bold;
			font-size: 12px;
			font-family: "Times New Roman", Times, serif;

		}


		#month_input:hover
		{
			background-color: #dadada;
		}

		#name_of_sender
		{
			background-color: #f0f0f0;
			box-sizing: border-box;
			border: 1px solid #abb4bd;
			transition: transform .04s;
			color: black;
			text-transform: capitalize;
			width: 280px;
			font-size: 12px;
			height: 15px;
			text-align: left;
			font-family: "Times New Roman", Times, serif;
			font-weight: bold;
			margin-top: 10px;
			margin-left: 30px;
			margin-bottom: 3px;
		}

		#name_of_sender:hover
		{
			background-color: #dadada;
		}

		#position_of_sender
		{

			height: 15px;
			width: 103px;
			background-color: #f0f0f0;
			box-sizing: border-box;
			border: 1px solid #abb4bd;
			transition: transform .04s;
			color: black;
			text-transform: capitalize;
			font-weight: bold;
			font-family: "Times New Roman", Times, serif;
			text-align: left;
			font-size: 12px;
			margin-left: 30px;
			margin-bottom: 25px;

		}

		#position_of_sender:hover
		{
			background-color: #dadada;
		}

		#department_name
		{
			background-color: #f0f0f0;
			box-sizing: border-box;
			border: 1px solid #abb4bd;
			transition: transform .04s;
			color: black;
			text-transform: capitalize;
			width: 280px;
			font-size: 12px;
			height: 15px;
			text-align: left;
			font-family: "Times New Roman", Times, serif;
			font-weight: bold;
			margin-bottom: 55px;
			margin-top: -22px;
			margin-left: 30px;
		}

		#department_name:hover
		{
			background-color: #dadada;
		}

		#dear
		{
			background-color: #f0f0f0;
			box-sizing: border-box;
			border: 1px solid #abb4bd;
			transition: transform .04s;
			color: black;
			text-transform: capitalize;
			width: 125px;
			font-size: 12px;
			height: 15px;
			text-align: left;
			font-family: "Times New Roman", Times, serif;
			font-weight: bold;
			margin-bottom: 18px;
			margin-top: -22px;
			margin-left: 30px;
		}

		#dear:hover
		{
			background-color: #dadada;
		}


		#month_input2
		{
			background-color: #f0f0f0;
			margin-top: -7px;
			margin-left: 30px;
			box-sizing: border-box;
			border: 1px solid #abb4bd;
			transition: transform .04s;
			color: black;
			text-transform: capitalize;
			width: 103px;
			height: 15px;
			text-align: left;
			font-weight: bold;
			font-size: 12px;
			font-family: "Times New Roman", Times, serif;

		}


		#month_input2:hover
		{
			background-color: #dadada;
		}

		#name_of_sender2
		{
			background-color: #f0f0f0;
			box-sizing: border-box;
			border: 1px solid #abb4bd;
			transition: transform .04s;
			color: black;
			text-transform: capitalize;
			width: 280px;
			font-size: 12px;
			height: 15px;
			text-align: left;
			font-family: "Times New Roman", Times, serif;
			font-weight: bold;
			margin-top: 10px;
			margin-left: 30px;
			margin-bottom: 3px;
		}

		#name_of_sender2:hover
		{
			background-color: #dadada;
		}

		#position_of_sender2
		{

			height: 15px;
			width: 103px;
			background-color: #f0f0f0;
			box-sizing: border-box;
			border: 1px solid #abb4bd;
			transition: transform .04s;
			color: black;
			text-transform: capitalize;
			font-weight: bold;
			font-family: "Times New Roman", Times, serif;
			text-align: left;
			font-size: 12px;
			margin-left: 30px;
			margin-bottom: 25px;

		}

		#position_of_sender2:hover
		{
			background-color: #dadada;
		}

		#department_name2
		{
			background-color: #f0f0f0;
			box-sizing: border-box;
			border: 1px solid #abb4bd;
			transition: transform .04s;
			color: black;
			text-transform: capitalize;
			width: 280px;
			font-size: 12px;
			height: 15px;
			text-align: left;
			font-family: "Times New Roman", Times, serif;
			font-weight: bold;
			margin-bottom: 55px;
			margin-top: -22px;
			margin-left: 30px;
		}

		#department_name2:hover
		{
			background-color: #dadada;
		}

		#dear2
		{
			background-color: #f0f0f0;
			box-sizing: border-box;
			border: 1px solid #abb4bd;
			transition: transform .04s;
			color: black;
			text-transform: capitalize;
			width: 125px;
			font-size: 12px;
			height: 15px;
			text-align: left;
			font-family: "Times New Roman", Times, serif;
			font-weight: bold;
			margin-bottom: 18px;
			margin-top: -22px;
			margin-left: 30px;
		}

		#dear2:hover
		{
			background-color: #dadada;
		}

		#month_input3
		{
			background-color: #f0f0f0;
			margin-top: -7px;
			margin-left: 30px;
			box-sizing: border-box;
			border: 1px solid #abb4bd;
			transition: transform .04s;
			color: black;
			text-transform: capitalize;
			width: 103px;
			height: 15px;
			text-align: left;
			font-weight: bold;
			font-size: 12px;
			font-family: "Times New Roman", Times, serif;

		}


		#month_input3:hover
		{
			background-color: #dadada;
		}

		#name_of_sender3
		{
			background-color: #f0f0f0;
			box-sizing: border-box;
			border: 1px solid #abb4bd;
			transition: transform .04s;
			color: black;
			text-transform: capitalize;
			width: 280px;
			font-size: 12px;
			height: 15px;
			text-align: left;
			font-family: "Times New Roman", Times, serif;
			font-weight: bold;
			margin-top: 10px;
			margin-left: 30px;
			margin-bottom: 3px;
		}

		#name_of_sender3:hover
		{
			background-color: #dadada;
		}

		#position_of_sender3
		{

			height: 15px;
			width: 103px;
			background-color: #f0f0f0;
			box-sizing: border-box;
			border: 1px solid #abb4bd;
			transition: transform .04s;
			color: black;
			text-transform: capitalize;
			font-weight: bold;
			font-family: "Times New Roman", Times, serif;
			text-align: left;
			font-size: 12px;
			margin-left: 30px;
			margin-bottom: 25px;

		}

		#position_of_sender3:hover
		{
			background-color: #dadada;
		}

		#department_name3
		{
			background-color: #f0f0f0;
			box-sizing: border-box;
			border: 1px solid #abb4bd;
			transition: transform .04s;
			color: black;
			text-transform: capitalize;
			width: 280px;
			font-size: 12px;
			height: 15px;
			text-align: left;
			font-family: "Times New Roman", Times, serif;
			font-weight: bold;
			margin-bottom: 55px;
			margin-top: -22px;
			margin-left: 30px;
		}

		#department_name3:hover
		{
			background-color: #dadada;
		}

		#dear3
		{
			background-color: #f0f0f0;
			box-sizing: border-box;
			border: 1px solid #abb4bd;
			transition: transform .04s;
			color: black;
			text-transform: capitalize;
			width: 125px;
			font-size: 12px;
			height: 15px;
			text-align: left;
			font-family: "Times New Roman", Times, serif;
			font-weight: bold;
			margin-bottom: 18px;
			margin-top: -22px;
			margin-left: 30px;
		}

		#dear3:hover
		{
			background-color: #dadada;
		}


		#month_input4
		{
			background-color: #f0f0f0;
			margin-top: -7px;
			margin-left: 30px;
			box-sizing: border-box;
			border: 1px solid #abb4bd;
			transition: transform .04s;
			color: black;
			text-transform: capitalize;
			width: 103px;
			height: 15px;
			text-align: left;
			font-weight: bold;
			font-size: 12px;
			font-family: "Times New Roman", Times, serif;

		}


		#month_input4:hover
		{
			background-color: #dadada;
		}

		#name_of_sender4
		{
			background-color: #f0f0f0;
			box-sizing: border-box;
			border: 1px solid #abb4bd;
			transition: transform .04s;
			color: black;
			text-transform: capitalize;
			width: 280px;
			font-size: 12px;
			height: 15px;
			text-align: left;
			font-family: "Times New Roman", Times, serif;
			font-weight: bold;
			margin-top: 10px;
			margin-left: 30px;
			margin-bottom: 3px;
		}

		#name_of_sender4:hover
		{
			background-color: #dadada;
		}

		#position_of_sender4
		{

			height: 15px;
			width: 103px;
			background-color: #f0f0f0;
			box-sizing: border-box;
			border: 1px solid #abb4bd;
			transition: transform .04s;
			color: black;
			text-transform: capitalize;
			font-weight: bold;
			font-family: "Times New Roman", Times, serif;
			text-align: left;
			font-size: 12px;
			margin-left: 30px;
			margin-bottom: 25px;

		}

		#position_of_sender4:hover
		{
			background-color: #dadada;
		}

		#department_name4
		{
			background-color: #f0f0f0;
			box-sizing: border-box;
			border: 1px solid #abb4bd;
			transition: transform .04s;
			color: black;
			text-transform: capitalize;
			width: 280px;
			font-size: 12px;
			height: 15px;
			text-align: left;
			font-family: "Times New Roman", Times, serif;
			font-weight: bold;
			margin-bottom: 55px;
			margin-top: -22px;
			margin-left: 30px;
		}

		#department_name4:hover
		{
			background-color: #dadada;
		}

		#dear4
		{
			background-color: #f0f0f0;
			box-sizing: border-box;
			border: 1px solid #abb4bd;
			transition: transform .04s;
			color: black;
			text-transform: capitalize;
			width: 125px;
			font-size: 12px;
			height: 15px;
			text-align: left;
			font-family: "Times New Roman", Times, serif;
			font-weight: bold;
			margin-bottom: 18px;
			margin-top: -22px;
			margin-left: 30px;
		}

		#dear4:hover
		{
			background-color: #dadada;
		}

		.list_items
		{

		}



	</style>


</head>

<body>

    <form method="POST">
        <?php 
        //global declaration for displaying name and date on form
      $newname = [];
		$newnewmonth = [];
		$newyear = [];
		$newdate ='';
		$namecounter = 0;
		$namecounterarray = [];

        require('config.php');
        $counter = 1;
        $month_date = date("m");
        $day = date("d");
        $year_date = date("Y");
        $month_array = ['January','February','March','April','May','June','July','August','September','October','November','December'];

        $newmonth_date = (int)$month_date;
        $newmonth = $month_array[$newmonth_date-1];
        $date = $newmonth.' '.$day.' '.$year_date;
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

           		$sql="SELECT DISTINCT FCode FROM tbl_dtr where status != 1  and hap_approval_status = 1 and `regpartime` = 'REGULAR'";
    			$result_distinct=mysqli_query($conn,$sql);

    			
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

						<input class="date no_box" id="month_input" type="" name="" value="'.$date.'" oninput="date_onchange(this.value,1)">
						<input class="hrmd no_box" id="name_of_sender" type="" name="" value="'.$hrmd.'" oninput="date_onchange(this.value,2)">
			 			<input id="position_of_sender" type="" value="Director">
						<input id="department_name" type="" value="Human Resource Management Department">
						<input id="dear" type="" value="Dear Atty. Sarum:">
						<br>
						<div class="body_text" contentEditable id="paragraph_text">
			 					This is to endorse the Daily Time Record '.$temporary_list[$q].' of the following FACULTY MEMBERS of PUP TAGUIG for the month of DATE: 
			 			</div>

			 			

			 			
					</div>
					<div class="listOfFacultyMembers" contentEditable>
					 <ul>

					';
					// foreach($result as $newresult)
					// {}
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
				            // $date = $month[$x].' '.$year[$x];

				            if(!in_array($name, $newname) && $regpartime[$x] == 'REGULAR')
				            {
				            	$newname[] = $name;
				            	$namecounter++;
				            }

				            if(!in_array($month[$x], $newnewmonth))
				            {
				            $monthcount = count($month);
				            $month_array = ['January','February','March','April','May','June','July','August','September','October','November','December'];

				            $newnewmonth[] = $month[$x];
				            

				         	}

				            if(!in_array($year[$x], $newyear))
				            {
				            	$newyear[] = $year[$x];
				            }
   
				            $ctr = 0;

							}
			        
					}
					sort($newyear);
					$firstmonth = reset($newnewmonth);
					$lastmonth = end($newnewmonth);
					$firstyear = reset($newyear);
					$lastyear = end($newyear);
					$namecount = count($newname);

					for($p = 0;$p < $namecount;$p++)
					{
						echo '<li class="list_items" id="regular_name">'.$newname[$p].'</li>';
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

           if($temporary_list[$q] == "PART-TIME")
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
						<input class="date no_box" id="month_input2" type="" name="" value="'.$date.'" disabled>
						<input class="hrmd no_box" id="name_of_sender2" type="" name="" value="'.$hrmd.'" disabled>
						<input id="position_of_sender2" type="" value="Director">
						<input id="department_name2" type="" value="Human Resource Management Department">
						<input id="dear2" type="" value="Dear Atty. Sarum:">
						<br>
						<div class="body_text" contentEditable id="paragraph_text2">
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
						<input class="date no_box" id="month_input3" type="" name="" value="'.$date.'">
						<input class="hrmd no_box" id="name_of_sender3" type="" name="" value="'.$hrmd.'">
						<input id="position_of_sender3" type="" value="Director">
						<input id="department_name3" type="" value="Human Resource Management Department">
						<input id="dear3" type="" value="Dear Atty. Sarum:">
						<br>
						<div class="body_text" contentEditable id="paragraph_text3">
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
						<input class="date no_box" id="month_input4" type="" name="" value="'.$date.'">
						<input class="hrmd no_box" id="name_of_sender4" type="" name="" value="'.$hrmd.'">
						<input id="position_of_sender4" type="" value="Director">
						<input id="department_name4" type="" value="Human Resource Management Department">
						<input id="dear4" type="" value="Dear Atty. Sarum:">
						<br>
						<div class="body_text" contentEditable id="paragraph_text4">
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

    <button class="generate_btn_class" onclick="call_print()">generate receiving document</button>'
</body>

<script>

	function date_onchange(val,counter)
	{
		var input_date = document.getElementById('month_input2');
		var sender_name = document.getElementById('name_of_sender2');
		if(counter == 1)
			input_date.value = val;
		if(counter == 2)
			sender_name.value = val;
		
		
		
	}
	// const mickey = document.querySelector('#firstname').textContent;
	function call_print()
	{

	var month_input = document.getElementById('month_input').value;
	var name_of_sender = document.getElementById('name_of_sender').value;
	var position_of_sender = document.getElementById('position_of_sender').value;
	var department_name = document.getElementById('department_name').value;
	var dear = document.getElementById('dear').value;
	var paragraph_text = document.getElementById('paragraph_text').value;
	
			
	window.open("index.php?r=/administrator/Hap_generate_rd&val1="+month_input+"&val2="+name_of_sender+"&val3="+position_of_sender+"&val4="+department_name+"&val5="+dear+"&val6="+paragraph_text);
				     
				
	}
</script>
</html>

