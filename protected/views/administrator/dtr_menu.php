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


li
{
  font-size: 15px;
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
  include("getRole.php");
  if($role === "HAP")
  {
            
    
    echo '<ul class="widget-list categories-list">';
    echo "<li><a style='color:black' href='index.php?r=administrator/daily_time_record'>DTR Generator </button></a></li>";
    echo "<li><a style='color:black' href='index.php?r=administrator/DtrTable'>Created DTRs</a></li>";
    
    echo "<li><a style='color:black' href='index.php?r=administrator/HAPDtrTable'>DTR Validation</button></a></li>";
    echo "<li><a style='color:black' href='index.php?r=administrator/HAP_Secretary_table'>Generate end of the Month</a></li>";
    // echo "<li><a href='index.php?r=administrator/Dtr_Email'>Reminder</a></li>";
    // echo "<li><a style='color:black' href='index.php?r=administrator/PhpWord'>Php word</a></li>";
    
    echo '</ul>';
    

  }
  else if($role === "HAP Secretary")
  {
   
    echo '<ul class="widget-list categories-list">';
    echo "<li><a style='color:black' href='index.php?r=administrator/daily_time_record'>DTR Generator </button></a></li>";
    echo '<li><a href="index.php?r=administrator/DtrTable">Created DTRs</a></li>';
    
    echo "<li><a style='color:black' href='index.php?r=administrator/HAPDtrTable'>DTR Validation</button></a></li>";
    echo "<li><a style='color:black' href='index.php?r=administrator/HAP_Secretary_table'>Generate end of the Month</a></li>";
    // echo "<li><a href='index.php?r=administrator/Dtr_Email'>Reminder</a></li>";
    // echo "<li><a style='color:black' href='index.php?r=administrator/PhpWord'>Php word</a></li>";
    echo '</ul>';
    

  }

  else
  {
    echo '<ul class="widget-list categories-list">';
      echo "<li><a style='color:black' href='index.php?r=administrator/daily_time_record'>DTR Generator </button></a></li>";
      echo "<li><a style='color:black' href='index.php?r=administrator/DtrTable'>Created DTRs</a></li>";
      
   
      // echo "<li><a href='index.php?r=administrator/Dtr_Email'>Reminder</a></li>";

    echo '</ul>';
    
  }
 ?>









  







<script src="jquery-3.6.0.min.js"></script>
<script src="sweetalert2.all.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
    $('#inboxBtn').on('click',function()
    {
      Swal.fire(
      {
        type: 'success',
        title: 'success',
        text: 'DTR SUBMITTED SUCCESFULLY'
      })
    })
  </script>
<script>
    // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("inboxBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

var modal2 = document.getElementById("myModal2");

var subj_modal_var = document.getElementById("subj_modal_id");

var subj_exit_btn_var = document.getElementById("exit_subjs_id");

var subj_realmodal_var = document.getElementById("subj_modall");

var hap_btn_var = document.getElementById("hap_btn_id");

var hap_modal_var = document.getElementById("hap_modal_id");

var exit_hap_modal_var = document.getElementById("exit_hap_modal_id");


// Get the button that opens the modal for generate dtr


// Get the button that opens the modal for subjects
var subj_btn_var = document.getElementById("subj_btn");


// Get the <span> element that closes the modal
var span2 = document.getElementsByClassName("close2")[0];

var span3 = document.getElementsByClassName("close3")[0];

var search_bar = document.getElementById("surname_search");
var search_bar2 = document.getElementById("fn_search");
var search_bar3 = document.getElementById("mn_search");
var search_bar4 = document.getElementById("year_search");
var search_bar5 = document.getElementById("month_search");
var search_type_text = document.getElementById("search_type_text");
var submit_btn = document.getElementById("submit_button");

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    search_bar.style.display = "none";
    search_bar2.style.display = "none";
    search_bar3.style.display = "none";
    search_bar4.style.display = "none";
    search_bar5.style.display = "none";
    submit_btn.style.display = "none";
    search_type_text.style.display = "none";
  }
  if (event.target == modal2) {
    modal2.style.display = "none";
    search_bar.style.display = "none";
    search_bar2.style.display = "none";
    search_bar3.style.display = "none";
    search_bar4.style.display = "none";
    search_bar5.style.display = "none";
    submit_btn.style.display = "none";
    search_type_text.style.display = "none";
  }
  if (event.target == subj_realmodal_var) {
    subj_realmodal_var.style.display = "none";
  }
}
// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
  search_bar.style.display = "none";
  search_bar2.style.display = "none";
  search_bar3.style.display = "none";
  search_bar4.style.display = "none";
  search_bar5.style.display = "none";
  submit_btn.style.display = "none";
  search_type_text.style.display = "none";
}

// When the user clicks on <span> (x), close the modal
span2.onclick = function() {
  modal2.style.display = "none";
  search_bar.style.display = "none";
  search_bar2.style.display = "none";
  search_bar3.style.display = "none";
  search_bar4.style.display = "none";
  search_bar5.style.display = "none";
  submit_btn.style.display = "none";
  search_type_text.style.display = "none";
}

span3.onclick = function() {
  subj_realmodal_var.style.display = "none";
}
// When the user clicks on the button, open the modal

subj_btn_var.onclick = function()
{
  subj_modal_var.style.display = "block";
  subj_exit_btn_var.style.display = "block";
}

subj_exit_btn_var.onclick = function()
{
  subj_modal_var.style.display = "none";
  subj_exit_btn_var.style.display = "none";
}

hap_btn_var.onclick = function()
{
  hap_modal_var.style.display = "block";

}

exit_hap_modal_var.onclick = function()
{
  hap_modal_var.style.display = "none";

}





// hap radio buttons
$('input[type="checkbox"]').on('change', function() {
    $('input[name="' + this.name + '"]').not(this).prop('checked', false);
});




function subjonclick(stitlevalue){
  var sbj = stitlevalue;
  document.getElementById("subj_name").innerHTML = sbj;
  subj_realmodal_var.style.display = "block"; 
}




function mouseOver() {
  document.getElementById("search_type").style.backgroundColor = "#c59828";
}

function mouseOut() {
  document.getElementById("search_type").style.backgroundColor = "#a6a6a6";
}

function getSearchType(selectObject) {
  var m = selectObject.value;
  
  search_bar.style.display = "none";
  search_bar2.style.display = "none";
  search_bar3.style.display = "none";
  search_bar4.style.display = "none";
  search_bar5.style.display = "none";

  if(m==1) 
  {
    search_type_text.style.display = "block";
      document.getElementById("search_type_text").innerHTML = "Search by Surname:";
      search_bar.style.display = "block";
      submit_btn.style.display = "block";


  }
  if(m==2)
  {
    search_type_text.style.display = "block";
    document.getElementById("search_type_text").innerHTML = "Search by First name:";
    search_bar2.style.display = "block";
    submit_btn.style.display = "block";
  }
  if(m==3)
  {
    search_type_text.style.display = "block";
    document.getElementById("search_type_text").innerHTML = "Search by Middle name:";
    search_bar3.style.display = "block";
    submit_btn.style.display = "block";

  }
  if(m==4)
  {
    search_type_text.style.display = "block";
    document.getElementById("search_type_text").innerHTML = "Search by Year:";
    search_bar4.style.display = "block";
    submit_btn.style.display = "block";

  }
  if(m==5)
  {
    search_type_text.style.display = "block";
    document.getElementById("search_type_text").innerHTML = "Search by Month:";
    search_bar5.style.display = "block";
    submit_btn.style.display = "block";

  }
}


</script>



<!-- for generate -->
<!-- index.php?r=administrator/printChecklist
index.php?r=administrator/PrintInfoReport
index.php?r=administrator/report&content=FWE -->