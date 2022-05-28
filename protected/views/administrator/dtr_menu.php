<style>
    /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */

}

.modal2 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
.modal3 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
.hap_modal_class
{
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto;  /*Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
.modal-header {
  padding: 2px 16px;
  background-color: #fefefe;
  color: black;
}
.modal-header_generate
{
  padding: 2px 16px;
  background-color: black;
  color: green;
}
/*.modal-footer_generate
{
  padding: 2px 16px;
  height:30px;
  background-color: #fefefe;
  color: black;
}*/

/* Modal Content/Box */
.modal-body {
  background-color: #f2f1ed;
  padding: 2px 16px;
  height: 350px;
  text-align: center;

}
.modal-body select
{
  position: relative;
  top: 30px;
  margin: auto;
  margin-left: -16px;
}

/* Modal Footer */
.modal-footer {
  padding: 2px 16px;
  height:30px;
  background-color: #fefefe;
  color: white;
}

/* Modal Content */
  .modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 50%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s;
    overflow:scroll;
    /*overflow: hidden;*/
  }
/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  text-decoration: none;
  cursor: pointer;
}

.close2 {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close2:hover,
.close2:focus {
  color: red;
  text-decoration: none;
  cursor: pointer;
}

.close3 {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close3:hover,
.close3:focus {
  color: red;
  text-decoration: none;
  cursor: pointer;
}

.exit_subjs_class
{
  display: none;
  float:right;
  font-size: 15px;
}

.exit_hap_modal_class
{
  float: right;

}
.modal_for_subjects
{
  width: 220px;
  height: 500px;
  display: none; /* Hidden by default */
  position: relative; /* Stay in place */
  /*background-color: gray;*/
  padding: 10px;
  padding-right: 40px;
  overflow-y: scroll;
}

a:hover {
 cursor:pointer;
}

.middle
{
  text-align: center;
  font-family: bold;
  font-size: 27px;
  color: white;
  margin-top: 5px;
}
.surname_search {
  width:200px;
  margin-left: 205px;
  margin-top: 20px;
  color: black;
  font-size: 13px;
  font-weight: bold;/*
  background-color: #a6a6a6;*/
  text-transform: uppercase;
  text-align: center;
}


.fn_search {
  width:200px;
  margin-left: 205px;
  margin-top: 20px;
  color: black;
  font-size: 13px;
  font-weight: bold;
  text-transform: uppercase;
  text-align: center;

}
.mn_search {
  width:200px;
  margin-left: 205px;
  margin-top: 20px;
  color: black;
  font-size: 13px;
  font-weight: bold;
  text-transform: uppercase;
  text-align: center;
}
.top_search {
  width:300px;
  background-color: white;
  pointer-events: none;
}
.year_search {
   width:200px;
  margin-left: 205px;
  margin-top: 20px;
  color: black;
  font-size: 13px;
  font-weight: bold;
  /*text-transform: uppercase;*/
  text-align: center;
}
.month_search {
  width:200px;
  margin-left: 205px;
  margin-top: 20px;
  color: black;
  font-size: 13px;
  font-weight: bold;
  text-align: center;
}

.subjects_btn
{
  margin:10px;
  /*margin: 10px;*/
  /*height: 40px;*/
  width: 200px;
}

.position_type{
  width:300px;
}
#inboxBtn
{
  position: relative;
  width: 200px;
}
.genBtn
{
  position: relative;
  width: 200px;
}
.box
{
  box-shadow: 5px 8px 11px #414141;
  border: 8px ridge #9e3939; 
  border-radius: 15px;
  /*
  width: 1045px;
  height: 500px;
  margin-top: -.1cm;
  margin-left: -.55cm;
  margin-bottom: -7.5px;*/
}

.hap_default_box
{
  height: 500px;
  width: 1000px;
}
.search_hover
{
  position: relative;
  text-align: center;
  left: 10px;
  color: black;
  font-size: 18px;
  font-weight: bold;
  width: 559px;
  height: 36px;

  background-color: #a6a6a6;
}

.result_text{
  left: 100px;
}
.boxed{
  width:350px;height:50px;border:1px solid #008000; margin: auto;
}
.hap_box
{
  width: 600px;
}
/*.search_hover:hover
{
  background-color: #c59828;
}*/

.hap_actions_class
{
  display: flex;
  flex-direction: row;
  justify-content: center;
}

#submit_button
{
  width: 200px;
  margin-top: 190px;
  margin-left: 210px;
}
#gradient_inbox {
  height: 50px;
  background-color: red; /* For browsers that do not support gradients */
  background-image: linear-gradient(180deg, #660000, #aaaa10);

}

.hap_submit_class
{
  height: 10px;
  width: 140px;

  /*font-size: 5px;*/
}
.hap_comment_class
{
  height: 20px;
  width: 140px;
}

.dtr_id_class
{

  /*display: none;*/
}

.menu_list_div
{
  position: relative;
  z-index: 2;

}

.menu {
  display: inline-block;
}

/*.dtrtable {
  margin-left: 20px;
}*/

ul .widget-list
{
  margin-left: 20px;
}

li
{
  font-size: 15px;
  /*margin-left: 20px;*/
}
</style>

<?php 
  if(isset($_POST['hap_submit']))
  {
    $hap_approval_var = $_POST['approval'];
    $hap_comments_var = $_POST['comments'];
    $dtr_account_name_var = $_POST['dtr_id'];

    
    $update = mysqli_query($conn,"UPDATE `tbl_dtr` SET `hap_approval_status` = '$hap_approval_var', `hap_comments` = '$hap_comments_var'  WHERE id = '$dtr_account_name_var'");
    if(!$update)
            {
                echo mysqli_error($conn);
                
            }
    else
            {
                echo "Records added successfully.";
            }
  }
  
  
 ?>

<br>
<!-- ----------------------------INBOX BUTTON---------------------------- -->
<!-- Trigger/Open The Modal -->
<!--<button>save</button> -->
<?php
if($preview_value===0)
{

// echo '<ul>';
// echo '<li><a href="index.php?r=administrator/DtrTable">Created DTRs</a></li>';
    

// echo '</ul>';

}
?>
<?php 
  include("getRole.php"); ?>
 <?php if($role === "HAP") : ?>
  
            
    
    <ul class="widget-list categories-list">
    <li><a style='color:black' href='index.php?r=administrator/daily_time_record'>DTR Generator </button></a></li>
    <li><a style='color:black' href='index.php?r=administrator/DtrTable'>Created DTRs </a></li>
    
    <li><a style='color:black' href='index.php?r=administrator/HAPDtrTable'>DTR Validation</button></a></li>
    <li><a style='color:black' href='index.php?r=administrator/HAP_Secretary_table'>Generate end of the Month</a></li>
    <li><a style='color:black' href='index.php?r=administrator/ListOfFac'>List of Faculty Members</a></li>
    <!-- <li><a href='index.php?r=administrator/Dtr_Email'>Reminder</a></li>"; -->
    <!-- <li><a style='color:black' href='index.php?r=administrator/PhpWord'>Php word</a></li>"; -->
    
    </ul>
    

  
<?php elseif($role === "HAP Secretary"): ?>

   
    <ul class="widget-list categories-list">
    <li><a style='color:black' href='index.php?r=administrator/daily_time_record'>DTR Generator </button></a></li>
    <li><a href="index.php?r=administrator/DtrTable">Created DTRs</a></li>
    
    <li><a style='color:black' href='index.php?r=administrator/HAPDtrTable'>DTR Validation</button></a></li>
    <li><a style='color:black' href='index.php?r=administrator/HAP_Secretary_table'>Generate end of the Month</a></li>
    <li><a style='color:black' href='index.php?r=administrator/ListOfFac'>List of Faculty Members</a></li>
    <!-- <li><a href='index.php?r=administrator/Dtr_Email'>Reminder</a></li>"; -->
    <!-- <li><a style='color:black' href='index.php?r=administrator/PhpWord'>Php word</a></li>"; -->
    </ul>
    
<?php else: ?>
    <ul class="widget-list categories-list">
      <li><a style='color:black' href='index.php?r=administrator/daily_time_record'>DTR Generator </button></a></li>
      <li><a style='color:black' href='index.php?r=administrator/DtrTable'>Created DTRs</a></li>
      
   
      <!-- <li><a href='index.php?r=administrator/Dtr_Email'>Reminder</a></ -->
    </ul>
    
  <?php endif ?>










  







