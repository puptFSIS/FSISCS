<?php 
session_start();
include("config.php");
if(isset($_SESSION['user'])) {
	if($_SESSION['user']==1) {

	} else if($_SESSION['user']==0) {
		header("Location: index.php?r=faculty/");
	}
} else {
	header("location:index.php?r=site/");
}
?>
<!DOCTYPE html>
<!--[if IE 7 ]> <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]> <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]> <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]> <!--> <html class=no-js lang=en> <!-- <![endif]-->
<head>

<!--[if IE ]> <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> <![endif]-->
<meta content='width=device-width, initial-scale=1.0' name=viewport />
<meta content='FSIS' name=keywords />
<meta content='PUP Taguig FSIS' name=description />
<meta content='vCore Team' name=author />
<!-- Page title -->
<title>IPCR | Add</title>

<!-- <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script> -->

<!-- Page icon -->
<link href='puplogo.ico' rel='shortcut icon'/>
<!-- Stylesheets -->
<style media=screen type='text/css'>@import "styles/base.css";
.cssLT #ut, .cssUT #ut{filter:progid:DXImageTransform.Microsoft.DropShadow(enabled=false);}
.cssWLGradientIMG{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMGSSL{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMG
{BACKGROUND-IMAGE: url(images/hd_tm1.jpg);BACKGROUND-REPEAT:repeat-x;top:0;height:105px;}
    
#page-title
{
    background-color: black;
    padding: 5px 5px 5px;
    height: 41px;
}
    
#menu_strip
{
    margin-top: 10px;
}
    
#menu_strip a
{
    color: white;
    padding: 10px 10px 10px;
    border-radius: 5px;
}
    
#menu_strip a:hover
{
    background-color: lightgray;
    color: white;
    padding: 10px 10px 10px;
    border-radius: 5px;
}
    
#menu_title
{
    margin-left: 30px;
    background-color: lightgray;
    color: black;
    text-align: center;
    font-family: "Helvetica";
    padding: 5px 5px 5px;
    font-size: 16px;
    width: 100%;
}
    
#options_menu_title
{
    margin-left: 30px;
    background-color: lightgray;
    color: black;
    text-align: center;
    font-family: "Helvetica";
    padding: 5px 5px 5px;
    width: 100%;
}
 
#req
{
    width: 100px;
}   

#head 
{
    font-size: 20px;
}

#select
{
    font-size: 20px;
    width: 350px;
}
/*.page-sidebar-right*/

footer {
    position: absolute;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: black;
   color: white;
   text-align: center;
}
/*.wrapper {
    width:200px;
padding:20px;
height: 150px;
}*/
</style>

<link href='styles/print.css' media=print rel=stylesheet />
<!-- Modernizr library -->
<script src='scripts/libs/modernizr/modernizr.min.js'></script>
<meta charset="UTF-8"></head>
<body class='page-media page-sidebar-right' style="background-color: ghostwhite;">
<!-- JS notice - will be displayed if javascript is disabled -->
<p id=jsnotice>Javascript is currently disabled. This site requires Javascript to function correctly. Please <a href="http://enable-javascript.com/">enable Javascript in your browser</a>!</p>
<!-- End - JS notice -->
<!-- Page header -->
<div id="GradientDiv" class="cssWLGradientCommon cssWLGradientIMG"></div>

<!-- End - Page header -->

<!-- Page subheader -->

<!-- End - Page subheader -->
<!-- Page body -->

<!-- Page title -->
<?php include("headerMenu.php");?>
<!-- End - Page title -->
<!-- Page body content -->
<section id=page-body-content>
<div id=page-body-content-inner>
<!-- Page content -->
<div id=page-content>


<section>
<h2 class="underlined-header"><center><strong>INDIVIDUAL PERFORMANCE, COMMITMENT AND REVIEW</strong></center></h2>

<?php //get the value of month and year pass by another/ previous page
if(isset($_GET['m'],$_GET['y'])) :
        $m = $_GET['m'];
        $y = $_GET['y'];
?>
    <br>   
    <!-- Form for processing created IPCR input -->
    <form action="index.php?r=administrator/ProcessIPCRinfo<?php echo'&m='.$m.'&y='.$y.'';?>" method="post">
    <h4 class="underlined-header" id="req">
        <input type="hidden" name="checkbox" value="Not Required">
        <input type="checkbox" name="checkbox" value="Required"> Required</h4>
    <h4 class="underlined-header" id="select"><strong>Add information for: </strong></h4>
    <select name="part" required>
        <option value="" disabled selected>---Select One---</option>
        <option value="sp">Strategic Priority</option>
        <option value="cf">Core Function</option>
        <option value="sf">Support Function</option>
    </select>
    <br>
    <hr style="margin-top: -10px;" />
    
    <textarea style="display: none; border: none; background-color: transparent; resize: none; outline: none;" type="hidden" name="month"><?= $m; ?></textarea>
    <textarea style="display: none; border: none; background-color: transparent; resize: none; outline: none;" type="hidden" name="year"><?= $y; ?></textarea>
<?php endif; ?>

    <h4 class="underlined-header" id="head"><strong>OUTPUT:</strong><textarea style="width: 100%; height: 30%;" name="output" type=text placeholder='Output'></textarea></h4>
    <br>
    <br>
    <h4 class="underlined-header" id="head"><strong>SUCCESS INDICATORS:</strong><textarea style="width: 100%; height: 30%;" name="indicators" type=text placeholder='Success Indicators'></textarea></h4>
    <br>
    <br>
    <h4 class="underlined-header" style="border-radius:5px;">
    <p style="margin-bottom: 9px; font-size: 20px;"><strong>ACTUAL ACCOMPLISHMENT:</strong></p>
    <div style="font-size:12px; padding: 5px;" >
    <li>Select Accomplishment which alligned with the output and indicators that you input and this will use to get the accomplishment synchronization of the faculty from <strong>eQAR</strong> to IPCR.</li>
    </div>
    <br/>
    <!-- <div class="wrapper"> -->
    <center>
    <select style="height: 40px;">
        <option>--------SELECT ACCOMPLISHMENT TYPE--------</option>
        <optgroup label="ACADEMIC PROGRAM DEVELOPMENT" style="font-size:15px;">
            <option>Course Syllabus</option>
            <option>Reference/Textbook/Module/Monographs/Instructional Materials</option>
            <option>Student Awards and Recognition</option>
            <option>Student Attended Seminars and Trainings</option>
            <option>• Awards and Recognition Received by the College/Department</option>
            <option>Viable Demonstration Projects</option>
        </optgroup>
        <optgroup label="EXTENSION PROGRAMS AND EXPERT SERVICES" style="font-size:15px;">
            <option>Expert Service Rendered as Consultant</option>
            <option>Expert Service Rendered in Conference, Workshops, and/or Training Course for  Professional</option>
            <option>Expert Service Rendered in Academic Journals/Books/Publication/Newsletter/Creative Works</option>
            <option>Extension Program/Project/Activity</option>
            <option>Inter-country Mobility</option>
            <option>Intra-country Mobility</option>
            <option>Partnership/Linkages/Network</option>
            <option>Community Engagement Conducted by College and Department</option>
            <option>Community Relation and Outreach Program</option>
            <option>Technical Extension Program/Project/Activity</option>
        </optgroup>
        <optgroup label="INVENTIONS, INNOVATION & CREATIVITY" style="font-size:15px;">
            <option>Inventions, Innovation, and Creative Works</option>
        </optgroup>
        <optgroup label="PERSONAL DATA" style="font-size:15px;">
            <option>Officerships/ Memberships</option>
            <option>Ongoing Studies</option>
            <option>Outstanding Awards</option>
            <option>Seminars and Trainings</option>
        </optgroup>
        <optgroup label="RESEARCH & BOOK CHAPTER" style="font-size:15px;">
            <option>Research Registration</option>
        </optgroup>
        <optgroup label="REQUESTS & QUERIES" style="font-size:15px;">
            <option>Requests and Queries Acted Upon</option>
        </optgroup>
        <optgroup label="TASKS & FUNCTIONS" style="font-size:15px;">
            <option>Academic Special Tasks</option>
            <option>• Admin Special Tasks</option>
            <option>Accomplishments Based on OPCR</option>
            <option>Attendance in College & University Functions</option>
        </optgroup>
        <optgroup label="OTHERS" style="font-size:15px;">
            <option>Other Individual Accomplishments</option>
            <option>Other Department/College Accomplishments</option>
        </optgroup>
    </select>
    </center>
    </h4>
    <!-- </div> -->
    <script src="ckeditor4/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('output');
        CKEDITOR.replace('indicators');
    
    </script>
    <br/>
    <center><button style="width: 100px;" type="submit" name="submit">Save</button></center>

    </form>
</section>

<!-- End - Video -HTML5 -->
<br/>

<!-- End - Showcase gallery -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->
<aside class=page-sidebar>
<h2 class=widget-heading>IPCR</h2>
<section class='widget-container widget-categories'>

<div class=widget-content>
<ul class='widget-list categories-list'>
<?php include("IPCRmenu.php");?>
</ul>
</div>
</section>
</aside>
<!-- End - Page sidebar -->
</div>
</section>
<!-- End - Page body content -->
</div>
</section>
<!-- End - Page body -->

<!-- Page footer -->
<footer id=page-footer>
    <div class=container-aligner>
        <section id=footer-left>
            © Copyright 2021 <a href="https://sites.google.com/view/puptfsis/ipcr/fsis2-team-members?authuser=0" title="Dev Team">Team Apex | PUP Taguig</a> - All Rights Reserved.
        </section>
    </div>
</footer>
</body>
</html>