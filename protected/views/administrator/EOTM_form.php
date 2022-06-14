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
            padding-bottom: 10px;
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
			font-size: 13px;

        }

        .body_text:hover
        {
			background-color: #dadada;
		}

		.listOfFacultyMembers

		{
			background-color: #f0f0f0;
            padding-bottom: 40px;
			max-width: 555px;
			height: 220px;
			overflow: auto;
			overflow-wrap: break-word;
			border: 1px solid #abb4bd;
			margin-left: 30px;
			margin-top: -560px;
			text-align: left;
			font-family: "Times New Roman", Times, serif;
			font-weight: bold;
			/* font-size: 12px; */
			/* background-color: #f0f0f0;
			border: 1px solid #abb4bd;
			font-weight: bold;
			font-family: "Times New Roman", Times, serif;
			margin-top: -450px;
			margin-left: 30px;
			border: none;
			max-width: 555px;
			overflow: auto; */
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

		#month_input_reg, #month_input_temp,
		#month_input_ts, #month_input_ot
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
			font-size: 13px;
			cursor: text;
			font-family: "Times New Roman", Times, serif;

		}


		#month_input_reg:hover, #month_input_temp:hover,
		#month_input_ts:hover, #month_input_ot:hover
		{
			background-color: #dadada;
		}

		#name_of_sender_reg, #name_of_sender_temp,
		#name_of_sender_ts, #name_of_sender_ot
		{
			background-color: #f0f0f0;
			box-sizing: border-box;
			border: 1px solid #abb4bd;
			transition: transform .04s;
			color: black;
			text-transform: capitalize;
			width: 280px;
			font-size: 13px;
			height: 15px;
			text-align: left;
			font-family: "Times New Roman", Times, serif;
			font-weight: bold;
			margin-top: 10px;
			margin-left: 30px;
			margin-bottom: 3px;
			cursor: text;
		}

		#name_of_sender_reg:hover, #name_of_sender_temp:hover,
		#name_of_sender_ts:hover, #name_of_sender_ot:hover
		{
			background-color: #dadada;
		}

		#position_of_sender_reg, #position_of_sender_temp, 
		#position_of_sender_ts, #position_of_sender_ot
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
			font-size: 13px;
			margin-left: 30px;
			margin-bottom: 25px;
			cursor: text;
		}

		#position_of_sender_reg:hover, #position_of_sender_temp:hover,
		#position_of_sender_ts:hover,  #position_of_sender_ot:hover
		{
			background-color: #dadada;
		}

		#department_name_reg, #department_name_temp,
		#department_name_ts, #department_name_ot
		{
			background-color: #f0f0f0;
			box-sizing: border-box;
			border: 1px solid #abb4bd;
			transition: transform .04s;
			color: black;
			text-transform: capitalize;
			width: 280px;
			font-size: 13px;
			height: 15px;
			text-align: left;
			font-family: "Times New Roman", Times, serif;
			font-weight: bold;
			margin-bottom: 55px;
			margin-top: -22px;
			margin-left: 30px;
			cursor: text;			
		}

		#department_name_reg:hover, #department_name_temp:hover,
		#department_name_ts:hover, #department_name_ot:hover
		{
			background-color: #dadada;
		}

		#dear_reg, #dear_temp, #dear_ts, #dear_ot 
		{
			background-color: #f0f0f0;
			box-sizing: border-box;
			border: 1px solid #abb4bd;
			transition: transform .04s;
			color: black;
			text-transform: capitalize;
			width: 125px;
			font-size: 13px;
			height: 15px;
			text-align: left;
			font-family: "Times New Roman", Times, serif;
			font-weight: bold;
			margin-bottom: 18px;
			margin-top: -22px;
			margin-left: 30px;
			cursor: text;
		}

		#dear_reg:hover, #dear_temp:hover, #dear_ts:hover, #dear_ot:hover
		{
			background-color: #dadada;
		}


		.list_items
		{

		}

		.thank_you
		{
			/* font-weight:bold; */
			margin-left:30px;
			font-size:13px;	
			margin-bottom:20px;
		}

		.closing_remarks
		{
			/* font-weight:bold; */
			margin-left:30px;
			font-size:13px;	
			margin-bottom:5px;
		}

		.closing_remarks_sender
		{
			font-weight:bold;
			margin-left:30px;
			font-size:13px;	
			margin-bottom:-5px;
			text-transform: uppercase;
		}

		.closing_remarks_sender_position
		{
			font-weight:bold;
			margin-left:30px;
			font-size:13px;	
			text-transform: capitalize;

		}

		#footer_address
		{
			text-align:center;
			font-weight:bold;
			text-transform:capitalize;
			font-size: 10px;
			margin-bottom: 0px;
			
		}

		#footer_email
		{
			text-align:center;
			font-weight:bold;
			text-transform:lowercase;
			font-size: 10px;
			white-space: pre;
			margin-bottom: 0px;
		}

		#footer_pup
		{
			text-align:center;
			font-weight:bold;
			font-size: 18px;
			font-family: 'Times New Roman';
		}

		#sender_reg, #sender_position_reg,
		#sender_temp, #sender_position_temp,
		#sender_ts, #sender_position_ts
		{
			background-color: #f0f0f0;
			box-sizing: border-box;
			border: 1px solid #abb4bd;
			transition: transform .04s;
			color: black;
			text-transform: capitalize;
			width: 200px;
			font-size: 13px;
			height: 15px;	
			text-align: left;
			font-family: "Times New Roman", Times, serif;
			font-weight: bold;
			margin-bottom: 10px;
			margin-top: -5px;
			margin-left: 29px;
			cursor: text;	
		}

		#sender_reg:hover, #sender_position_reg:hover,
		#sender_temp:hover, #sender_position_temp:hover,
		#sender_ts:hover, #sender_position_ts:hover
		{
			background-color: #dadada;
		}

	</style>


</head>

<body>

    <form method="POST">
        <?php 
        //global declaration for displaying name and date on form
      

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
        $sql="SELECT DISTINCT * FROM tbl_dtr where hap_approval_status !=2 and `year` = '2022'";
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
           	$newname = [];
			$newnewmonth = [];
			$newyear = [];
			$newdate ='';
			$namecounter = 0;
			$namecounterarray = [];

           		$sql="SELECT DISTINCT * FROM tbl_dtr hap_approval_status != 2 and `regpartime` = 'REGULAR'";
    			$result=mysqli_query($conn,$sql);

           		$sql="SELECT DISTINCT FCode FROM tbl_dtr where hap_approval_status != 2 and `regpartime` = 'REGULAR'";
    			$result_distinct=mysqli_query($conn,$sql);

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

						<input class="date no_box" id="month_input_reg" type="" name="" value="'.$date.'" oninput="date_onchange(this.value,1)">
						<input class="hrmd no_box" id="name_of_sender_reg" type="" name="" value="'.$hrmd.'" oninput="date_onchange(this.value,2)">
			 			<input id="position_of_sender_reg" type="" value="Director" oninput="date_onchange(this.value,3)">
						<input id="department_name_reg" type="" value="Human Resource Management Department" oninput="date_onchange(this.value,4)">
						<input id="dear_reg" type="" value="Dear Atty. Sarum:" oninput="date_onchange(this.value,5)">
						<br>
						<div class="body_text" contentEditable id="paragraph_text" >
			 					This is to endorse the Daily Time Record '.$temporary_list[$q].' of the following FACULTY MEMBERS of PUP TAGUIG for the month of: '.$firstmonth.'-'.$lastmonth.'
			 			</div>
			 			
					</div>
					
					<div id="paragraph_text_reg" class="listOfFacultyMembers" contentEditable> 

					 <ul>

					';
					// foreach($result as $newresult)
					// {}
					

					for($p = 0;$p < $namecount;$p++)
					{
						echo '<li class="list_items" id="regular_name">'.$newname[$p].'</li>';
					}

					if($namecount==0)
					{
						echo '<li class="list_items" id="regular_name">(Put name here)</li>';
					}
			 		echo'
			 		</ul>
			 			</div>	
						<br>
						<p class="thank_you">Thank you very much.</p>
						<p class="closing_remarks">Sincerly Yours,</p>
						<input id="sender_reg" type="" value="MARISSA B. FERRER">	
						<input id="sender_position_reg" type="" value="BRANCH DIRECTOR">	
						<br>
						<br>
						<br>
						<p id="footer_address">gen santos ave. lower bicutan, taguig city 1772; (direct line) 837-5858 to 60; (telfax) 837-5859;</p>
						<p id="footer_email">website: www.pup.edu.ph	     e-mail: taguig@pup.edu.ph</p>
						<p id="footer_pup">THE COUNTRY&#180;S 1<span style="vertical-align:super;">st</span> POLYTECHNICU</p>
					
				</div>
				<br><br>



				';


           }

           if($temporary_list[$q] == "PART-TIME")
           {
           	$newname = [];
			$newnewmonth = [];
			$newyear = [];
			$newdate ='';
			$namecounter = 0;
			$namecounterarray = [];

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

				            if(!in_array($name, $newname) && $regpartime[$x] == 'PART-TIME')
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
						<input class="date no_box" id="month_input_temp" type="" name="" value="'.$date.'" oninput="date_onchange(this.value,1)" readonly>
						<input class="hrmd no_box" id="name_of_sender_temp" type="" name="" value="'.$hrmd.'" oninput="date_onchange(this.value,2)" readonly>
			 			<input id="position_of_sender_temp" type="" value="Director" oninput="date_onchange(this.value,3)" readonly>
						<input id="department_name_temp" type="" value="Human Resource Management Department" oninput="date_onchange(this.value,4)" readonly>
						<input id="dear_temp" type="" value="Dear Atty. Sarum:" oninput="date_onchange(this.value,5)" readonly>
						<br>
						<div class="body_text" contentEditable id="paragraph_text2" >
			 					This is to endorse the Daily Time Record '.$temporary_list[$q].' of the following FACULTY MEMBERS of PUP TAGUIG for the month of: '.$firstmonth.'-'.$lastmonth.'
			 			</div>
			 			
					</div>
					
					<div id="paragraph_text_pt" class="listOfFacultyMembers" contentEditable> 
				
					 <ul>';

				
				
					
					for($p = 0;$p < $namecount;$p++)
					{
						echo '<li class="list_items" id="regular_name">'.$newname[$p].'</li>';
					}
					if($namecount==0)
					{
						echo '<li class="list_items" id="regular_name"></li>';
					}
					echo'
			 		</ul>

					 </div>	
					 <br>
					 <p class="thank_you">Thank you very much.</p>
					 <p class="closing_remarks">Sincerly Yours,</p>
					 <input id="sender_temp" type="" value="MARISSA B. FERRER">	
					 <input id="sender_position_temp" type="" value="BRANCH DIRECTOR">	
					 <br>
					 <br>
					 <br>
					 <p id="footer_address">gen santos ave. lower bicutan, taguig city 1772; (direct line) 837-5858 to 60; (telfax) 837-5859;</p>
					 <p id="footer_email">website: www.pup.edu.ph	     e-mail: taguig@pup.edu.ph</p>
					 <p id="footer_pup">THE COUNTRY&#180;S 1<span style="vertical-align:super;">st</span> POLYTECHNICHU</p>
				 
			 		</div>
			 <br><br>


				';

           }

           if($temporary_list[$q] == "TS")
           {
           	$newname = [];
			$newnewmonth = [];
			$newyear = [];
			$newdate ='';
			$namecounter = 0;
			$namecounterarray = [];

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

				            if(!in_array($name, $newname) && $regpartime[$x] == 'TEMPORARY SUBSTITUTION')
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
						<input class="date no_box" id="month_input_ts" type="" name="" value="'.$date.'" oninput="date_onchange(this.value,1)" readonly>
						<input class="hrmd no_box" id="name_of_sender_ts" type="" name="" value="'.$hrmd.'" oninput="date_onchange(this.value,2)" readonly>
			 			<input id="position_of_sender_ts" type="" value="Director" oninput="date_onchange(this.value,3)" readonly>
						<input id="department_name_ts" type="" value="Human Resource Management Department" oninput="date_onchange(this.value,4)" readonly>
						<input id="dear_ts" type="" value="Dear Atty. Sarum:" oninput="date_onchange(this.value,5)" readonly>
						<br>
						<div class="body_text" contentEditable id="paragraph_text3" >
			 					This is to endorse the Daily Time Record '.$temporary_list[$q].' of the following FACULTY MEMBERS of PUP TAGUIG for the month of: '.$firstmonth.'-'.$lastmonth.'
			 			</div>
			 			
					</div>
					
					<div id="paragraph_text_ts" class="listOfFacultyMembers" contentEditable> 
						
			
					 <ul>
					 

				';

				

					for($p = 0;$p < $namecount;$p++)
					{
						echo '<li class="list_items" id="regular_name">'.$newname[$p].'</li>';
					}
					if($namecount==0)
					{
						echo '<li class="list_items" id="regular_name">  </li>';
					}
					echo'
			 		</ul>
					 </div>	
					 <br>
					 <p class="thank_you">Thank you very much.</p>
					 <p class="closing_remarks">Sincerly Yours,</p>
					 <input id="sender_ts" type="" value="MARISSA B. FERRER">	
					 <input id="sender_position_ts" type="" value="BRANCH DIRECTOR">
					 <br>
					 <br>
					 <br>
					 <p id="footer_address">gen santos ave. lower bicutan, taguig city 1772; (direct line) 837-5858 to 60; (telfax) 837-5859;</p>
					 <p id="footer_email">website: www.pup.edu.ph	     e-mail: taguig@pup.edu.ph</p>
					 <p id="footer_pup">THE COUNTRY&#180;S 1<span style="vertical-align:super;">st</span> POLYTECHNICU</p>
				 
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
						<input class="date no_box" id="month_input_ot" type="" name="" value="'.$date.'" readonly>
						<input class="hrmd no_box" id="name_of_sender_ot" type="" name="" value="'.$hrmd.'" readonly>
						<input id="position_of_sender_ot" type="" value="Director" readonly>
						<input id="department_name_ot" type="" value="Human Resource Management Department" readonly>
						<input id="dear_ot" type="" value="Dear Atty. Sarum:" readonly>
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

				echo '<li class="list_items" id="regular_name"></li>';


           }
            
			$monthcounter++;
            
            
        } 


        ?>
    </form>
<button class="generate_btn_class" onclick="call_print()">generate receiving document</button>
<!-- <button class="generate_btn_class" onclick="preview_transmittal()">preview_transmittal -->
    <!-- <a style='color:white' href='index.php?r=administrator/Transmittal_form'>Php word</a> -->
	
</button>
</body>

<script>

	function date_onchange(val,counter)
	{
		var input_date = document.getElementById('month_input_temp');
		var input_date2 = document.getElementById('month_input_ts');
		var input_date3 = document.getElementById('month_input_ot');
		var sender_name = document.getElementById('name_of_sender_temp');
		var sender_name2 = document.getElementById('name_of_sender_ts');
		var sender_name3 = document.getElementById('name_of_sender_ot');
		var position_of_sender = document.getElementById('position_of_sender_temp');
		var position_of_sender2 = document.getElementById('position_of_sender_ts');
		var position_of_sender3 = document.getElementById('position_of_sender_ot');
		var department_name = document.getElementById('department_name_temp');
		var department_name2 = document.getElementById('department_name_ts');
		var department_name3 = document.getElementById('department_name_ot');
		var dear = document.getElementById('dear_temp');
		var dear2 = document.getElementById('dear_ts');
		var dear3 = document.getElementById('dear_ot');


		if(counter == 1)
		{
			input_date.value = val;
			input_date2.value = val;
			input_date3.value = val;
		}
		if(counter == 2)
		{
			sender_name.value = val;
			sender_name2.value = val;
			sender_name3.value = val;
		}
		if(counter == 3)
		{
			position_of_sender.value = val;
			position_of_sender2.value = val;
			position_of_sender3.value = val;
		}
		if(counter == 4)
		{
			department_name.value = val;
			department_name2.value = val;
			department_name3.value = val;
		}
		if(counter == 4)
		{
			department_name.value = val;
			department_name2.value = val;
			department_name3.value = val;
		}
		if(counter == 5)
		{
			dear.value = val;
			dear2.value = val;
			dear3.value = val;
		}
		
	}
	// const mickey = document.querySelector('#firstname').textContent;
	function call_print()
	{

	var month_input = document.getElementById('month_input_reg').value;
	var name_of_sender = document.getElementById('name_of_sender_reg').value;
	var position_of_sender = document.getElementById('position_of_sender_reg').value;
	var department_name = document.getElementById('department_name_reg').value;
	var dear = document.getElementById('dear_reg').value;
	var paragraph_text = document.getElementById('paragraph_text').innerText;
	var paragraph_text2 = document.getElementById('paragraph_text2').innerText;
	var paragraph_text3 = document.getElementById('paragraph_text3').innerText;
	var paragraph_text4 = document.getElementById('paragraph_text4').innerText;
	var paragraph_text_reg = document.getElementById('paragraph_text_reg').innerText;
	var paragraph_text_pt = document.getElementById('paragraph_text_pt').innerText;
	var paragraph_text_ts = document.getElementById('paragraph_text_ts').innerText;
	
			
	window.open("index.php?r=/administrator/Hap_generate_rd&val1="+month_input+"&val2="+name_of_sender+"&val3="+position_of_sender+"&val4="+department_name+"&val5="+dear+"&val6="+paragraph_text+"&val7="+paragraph_text2+"&val8="+paragraph_text3+"&val9="+paragraph_text4+"&val10="+paragraph_text_reg+"&val11="+paragraph_text_pt+"&val12="+paragraph_text_ts);
				     
				
	}

	function preview_transmittal()
	{
		window.open("index.php?r=/administrator/Transmittal_form");
	}
</script>
</html>

