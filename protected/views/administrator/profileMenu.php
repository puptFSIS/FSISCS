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
	$EmpID= "";
	if(isset($_SESSION['CEmpID'])) {
		$EmpID = $_SESSION['CEmpID'];
	} else {
		die(header("Location: index.php?r=site/index"));
	}
	$sql="SELECT * FROM tbl_profpic WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	$path = $row['path'];
	if($path==null or $path=="") {
		$path="accpictures/default.png";
	}
	echo '
	<div id="picture_preview" class="align-center">
		<div id="picture_preview" class="element-holder">
		<img alt="Account Main Photo" src="' . $path . '" width=180 height=180 />
		<div class="caption">' . $_SESSION['FullName'] . '</div>
		</div>
	</div>
	<br />';
?>

<form name="pictureForm" method="post" autocomplete="off" enctype="multipart/form-data">
<div>
<span>Change Picture</span>
<input style="width: 100%;"type="file" name="picture" id="picture" onchange="return ajaxFileUpload(this);" />
<span id="picture_error"></span>
</div>
</form>

<li>
<a href='index.php?r=administrator/' >Getting Started</a>
</li>
<br />

<li>
<a href='index.php?r=administrator/pi' >Personal Information</a>
<span class=widget-hint><a href='index.php?r=administrator/Upi'>Update</a></span>
</li>

<li>
<a href='index.php?r=administrator/fb' >Family Background</a>
<span class=widget-hint><a href='index.php?r=administrator/Afb'>Update</a></span>
</li>
<li>
<a href='index.php?r=administrator/eb' >Educational Background</a>
</li>

<br />
<li>
<a href='index.php?r=administrator/communitySE'>Civil Service Elegibility</a>
<span class=widget-hint><a href='index.php?r=administrator/NewCSE'>New</a></span>
</li>

</li>
<li>
<a href='index.php?r=administrator/we' >Work Experience</a>
<span class=widget-hint><a href='index.php?r=administrator/Awe&mode=1'>New</a></span>
</li>

<br />
<li>
<a href='index.php?r=administrator/VoluntaryWork'>Voluntary Work</a>
<span class=widget-hint><a href='index.php?r=administrator/VoluntaryWorkNew'>New</a></span>
</li>

<li>
<a href='index.php?r=administrator/TrainingPrograms'>Training Programs</a>
<span class=widget-hint><a href='index.php?r=administrator/TrainingProgramNew'>New</a></span>
</li>

<br />
<li>
<a href='index.php?r=administrator/OtherInformation'>Other Information</a>
</li>

<li>
<a href='index.php?r=administrator/Questions'>Questions</a>
</li>

<li>
<a href='index.php?r=administrator/References'>References</a>
<span class=widget-hint><a href='index.php?r=administrator/ReferencesNew'>New</a></span>
</li>

<li>
<a href='index.php?r=administrator/TaxCertificate'>Tax Certificate</a>
</li>

<br />
<!--
<li>
<a href='index.php?r=administrator/scholarships'>Scholarships</a>
</li>
<li>
<a href='index.php?r=administrator/refereedPublications'>Refereed Publications</a>
</li>
<li>
<a href='index.php?r=administrator/TempSub'>Temporary Substitution</a>
</li>
<br />
-->
<li>
<a href='index.php?r=administrator/PDS' >Personal Data Sheet</a>
</li>
<br />

<li>
<a href='index.php?r=administrator/AccSettings' >Account Settings</a>
<span class=widget-hint><a href='index.php?r=administrator/cas'>Change</a></span>
</li>