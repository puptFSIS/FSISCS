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

        .list
        {
        	/*position: relative;

            width: 300px;
            height: 200px;
            background-color: pink;
			/*margin: auto;*/
            padding-top: 100px;*/


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
    </style>

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

		.header_style
		{
			 position: sticky;
			 width: 90px; 
			 height:90px; 
			 margin-top: -20px;
			 margin-left: 20px;
		}

		.header_text
		{
			margin-left: 150px;
			font-size: 10px;
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

						
			 				<input class="body_text" type="" name="" value="This is to endorse the Daily Time Record '.$temporary_list[$q].' of the following FACULTY MEMBERS of PUP TAGUIG for the month of MARCH and APRIL 2021: ">


			 				<textarea></textarea>

			 				<div class="list">list</div>
						

			 				
				
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

						
			 				<input class="body_text" type="" name="" value="This is to endorse the Daily Time Record '.$temporary_list[$q].' of the following FACULTY MEMBERS of PUP TAGUIG for the month of MARCH and APRIL 2021: ">
						
			 				<div class="list">list</div>
						

			 				<p>
							 	Thank you very much 
							 	<br>
							 	<br>
							 	Sincerely yours, 
							 </p>
			 			
						
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

						
			 				<input class="body_text" type="" name="" value="This is to endorse the Daily Time Record '.$temporary_list[$q].' of the following FACULTY MEMBERS of PUP TAGUIG for the month of MARCH and APRIL, 2021: ">
						
			 				<div class="list">list</div>
						

			 				<p>
							 	Thank you very much 
							 	<br>
							 	<br>
							 	Sincerely yours, 
							 </p>
			 			
						
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

						
			 				<input class="body_text" type="" name="" value=This is to endorse the Daily Time Record '.$temporary_list[$q].' of the following ADMINISTRATIVE PERSONNEL  of PUP TAGUIG for the month of APRIL 1-30, 2021: >
						
			 				<div class="list">list</div>
						

			 				<p>
							 	Thank you very much 
							 	<br>
							 	<br>
							 	Sincerely yours, 
							 </p>
			 			
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

