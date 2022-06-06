<style>
	.header1 {
		/*float: left;*/
		margin:-10px 6.5px 0px 0px;
	}
	.c {
		float: right;
		margin-top: -42px;
	}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<header id=page-title>



<section id='menu_strip'>
<a class="header1" data-category=all href='index.php?r=administrator'>Home</a>
<a class="header1" data-category=design href="index.php?r=administrator/profile">Profile</a>
<a class="header1" data-category=design href="index.php?r=administrator/faculty">Faculty</a>
<a class="header1" data-category=design href="index.php?r=administrator/SchedulingSystem">Scheduling</a>
<a class="header1" data-category=design href="index.php?r=administrator/IPCR">IPCR</a>
<a class="header1" data-category=design href="index.php?r=administrator/daily_time_record">DTR</a>
<a class="header1" data-category=design href="index.php?r=administrator/SubjPrefer">Subject Preferences</a>
<a class="header1" data-category=design href="index.php?r=administrator/TeachingAssignment">Teaching Assignment</a>
<a class="header1" data-category=design href="index.php?r=administrator/other">Other</a>
<a class="header1" data-category=design href="index.php?r=administrator/logout">Log out</a>

<!-- <a class="header1 c" data-category=design href="#">Notification</a> -->
<div>
<ul class="nav navbar-nav navbar-right"> 
      <li class="dropdown">
      	<a href="#" class="header1 c" class="dropdown-toggle" data-toggle="dropdown" data-category=design ><span class="label label-pill label-danger count"></span>Notification</a>
       
       <ul class="dropdown-menu"></ul>
      </li>
     </ul>
</div>
</section>

</header>


<script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  if($('#subject').val() != '' && $('#comment').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#comment_form')[0].reset();
     load_unseen_notification();
    }
   });
  }
  else
  {
   alert("Both Fields are Required");
  }
 });
 
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});
</script>
