<script>
function ajaxFileUpload(upload_field)
{
// Checking file type
var re_text = /\.jpg|\.gif|\.jpeg|\.png/i;
var filename = upload_field.value;
if (filename.search(re_text) == -1) {
alert("Only JPG, JPEG, GIF and PNG pictures are allowed.");
upload_field.form.reset();
return false;
}
document.getElementById('picture_preview').innerHTML = '<div><img src="images/progressbar.gif" border="0" /></div>';
upload_field.form.action = 'upload-picture.php';
upload_field.form.target = 'upload_iframe';
upload_field.form.submit();
upload_field.form.action = '';
upload_field.form.target = '';
return true;
}
</script>

<!-- iframe used for ajax file upload-->
<!-- debug: change it to style="display:block" -->
<iframe name="upload_iframe" id="upload_iframe" style="display:none;"></iframe>
<!-- iframe used for ajax file upload-->

<?php
	include("config.php");
	$path = "";
	$EmpID = $_SESSION['CEmpID'];
	$sql="SELECT * FROM tbl_profpic WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	$path = $row['path'];
	if($path==null or $path=="") {
		$path="accpictures/default.png";
	}
	echo '
	<div id="picture_preview" class="align-center">
		<div id="picture_preview" class="element-holder">
		<img alt="Account Main Photo" src="' . $path . '" width=150 height=180 />
		<div class="caption">' . $_SESSION['FullName'] . '</div>
		</div>
	</div>
	<br />';
?>

<!-- <form name="pictureForm" method="post" autocomplete="off" enctype="multipart/form-data">
<div>
<span>Change Picture</span>
<input style="width: 100%;"type="file" name="picture" id="picture" onchange="return ajaxFileUpload(this);" />
<span id="picture_error"></span>
</div>
</form>

<li style="margin:0;">
<a href='index.php?r=faculty/index' >Getting Started</a>
</li>
<li>
<a href='index.php?r=faculty/QuickGuide' >Quick Guide</a>
<span class=widget-hint><a href='FORMS/QuickGuide.zip'>Download</a></span>
</li>
<li>
<a href='index.php?r=faculty/Announcements' >Announcement</a>
</li>
<br />
<li>
<a href='index.php?r=faculty/pi' >Personal Information</a>
<span class=widget-hint><a href='index.php?r=faculty/Upi'>Update</a></span>
</li>

<li>
<a href='index.php?r=faculty/fb' >Family Background</a>
<span class=widget-hint><a href='index.php?r=faculty/Afb'>Update</a></span>
</li>
<li>
<a href='index.php?r=faculty/eb' >Educational Background</a>
</li>

<br />
<li class="hide">
<a href='index.php?r=faculty/communitySE'>Civil Service Elegibility</a>
<span class=widget-hint><a href='index.php?r=faculty/NewCSE'>New</a></span>
</li>

</li>
<li class="hide">
<a href='index.php?r=faculty/we' >Work Experience</a>
</li>

<br />
<li class="hide">
<a href='index.php?r=faculty/VoluntaryWork'>Voluntary Work</a>
<span class=widget-hint><a href='index.php?r=faculty/VoluntaryWorkNew'>New</a></span>
</li>

<li class="hide">
<a href='index.php?r=faculty/TrainingPrograms'>Training Programs</a>
<span class=widget-hint><a href='index.php?r=faculty/TrainingProgramNew'>New</a></span>
</li>

<br />
<li class="hide">
<a href='index.php?r=faculty/OtherInformation'>Other Information</a>
</li>

<li class="hide">
<a href='index.php?r=faculty/Questions'>Questions</a>
</li>

<li class="hide">
<a href='index.php?r=faculty/References'>References</a>
</li>

<li class="hide">
<a href='index.php?r=faculty/TaxCertificate'>Tax Certificate</a>
</li>

<br />

<li class="hey">
<a href='index.php?r=faculty/PDS' >Personal Data Sheet</a>
</li>
<br /> -->

<!--
<li>
<a href='index.php?r=faculty/AccSettings' >Account Settings</a>
<span class=widget-hint><a href='index.php?r=faculty/cas'>Change</a></span>
</li>-->