<?php 
session_start();
include("config.php");
if(isset($_SESSION['user'])) {
	if($_SESSION['user']==1) {

	} else if($_SESSION['user']==0) {

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
<title>IPCR | Create</title>
<!--Script of Sweet alert-->
<script src='<?php echo Yii::app()->getBaseUrl() ?>assets/jquery-3.6.0.min.js'></script>
<script src='<?php echo Yii::app()->getBaseUrl() ?>assets/sweetalert2.all.min.js'></script>
<!-- Page icon -->
<link href='puplogo.ico' rel='shortcut icon'/>
<!-- Stylesheets -->
<style media=screen type='text/css'>@import "styles/base.css";
.cssLT #ut, .cssUT #ut{filter:progid:DXImageTransform.Microsoft.DropShadow(enabled=false);}
.cssWLGradientIMG{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMGSSL{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMG
{BACKGROUND-IMAGE: url(images/hd_tm1.png);BACKGROUND-REPEAT:round;top:0;height:105px;}
    
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

.underlined
{
    background-color: lightgray;
    font-size: 18px;
    padding: 5px;
    text-align: left;
}

@media only screen and (min-width:150px) and (max-width:600px)
{
/* Title right */
    .title-right {
        float: left;
        margin: 0;
        padding: 0;
        height: 240px;
        line-height: 30px;
		width: 100%;
    }

        .title-right a {
            float: left;
            display: block;
            margin 0;
            height: 30px;
            padding: 0;
            line-height: 30px;
            text-align: center;
			width: 100%;
        }

        
	.title-right a:hover {
            background: url(../images/transparent/05_white.png);
            background-color: rgba(255,255,255,.05);
            width: 100%;
        }


	.title-right a:last-child {
            margin: 0;
        }

            .title-right a span {
                display: block;
                padding-left: 0;
                background-position: 0 50%;
                background-repeat: no-repeat;
            }

}


#page-body
{
    background-color: antiquewhite;
}

</style>

<link href='styles/print.css' media=print rel=stylesheet />
<!-- Modernizr library -->
<script src='scripts/libs/modernizr/modernizr.min.js'></script>
<meta charset="UTF-8"></head>
<body class='page-media page-sidebar-right' style="background-color: Black;">
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
<?php include("nav.php");?>
<!-- End - Page title -->
<!-- Page body content -->
<section id=page-body-content>
<div id=page-body-content-inner>
<!-- Page content -->
<div id=page-content>
<!-- Video - HTML5 -->
<section>

<h2 class=underlined-header><center>Individual Performance Commitment and Review</center></h2>
<br>
<h2 class="underlined">Create IPCR for:</h2>
<br>
<br>
<!----> 
<?php  
    
    if(isset($_POST['submit']))
    {
        $selectedm = $_POST['Month'];
        $selectedy = $_POST['Year'];
    } 
        
?> 
<form action="index.php?r=administrator/IPCRgenerate" method="post">
    <div style="display:flex; flex-direction: row; justify-content: center; align-items: center">
        <select name="Month" style="outline: 50px; height: 50px; margin-right: 20px;" required>
            <option value="" disabled selected>----Choose Month----</option>
            <option value="JJ">January - June</option>
            <option value="JD">July - December</option>
        </select>
        
        <select name="Year" id="ddlYears" style="outline: 50px; height: 50px;" required>
                <option value="" disabled selected>----Choose Year----</option>
        </select>
    </div>
    <br>
    <br>
    <center><button type="submit" name="submit" style="width: 100px">Generate</button></center>

</form>
</section>

            <!--Sweet alert success-->
            <?php if(isset($_GET['s'])) : ?>
                <div class="flash-data" data-flashdata="<?= $_GET['s']; ?>"></div>
            <?php endif; ?>

            <!-- Sweet alert Already visible -->
            <?php if(isset($_GET['a'])) : ?>
                <div class="flash-data-already" data-flashdata1="<?= $_GET['a']; ?>"></div>
            <?php endif; ?>

            <script>
                //Script for auto populate year
                window.onload = function () 
                {
                    //Reference the DropDownList.
                    var ddlYears = document.getElementById("ddlYears");
 
                    //Determine the Current Year.
                    var currentYear = (new Date()).getFullYear();
 
                    //Loop and add the Year values to DropDownList.
                    for (var i = currentYear; i >= 2018; i--) {
                        var option = document.createElement("OPTION");
                        option.innerHTML = i;
                        option.value = i;
                        ddlYears.appendChild(option);
                    }
                };

                const flashdata = $('.flash-data').data('flashdata')
                    if (flashdata) {
                        Swal.fire(
                            'IPCR Successfully Created and Available to Faculty',
                            'Faculty notified through email',
                            'success'
                        )
                    } 

                const flashdata1 = $('.flash-data-already').data('flashdata1')
                    if (flashdata1) {
                        Swal.fire(
                            'IPCR Already Created and Available to Faculty.',
                            '',
                            'warning'
                        )
                    }       


            </script>

<!-- End - Video -HTML5 -->
<br/>

<!-- End - Showcase gallery -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->
<aside class=page-sidebar>
<!--<section class='widget-container widget-categories'>-->
<h2 class=widget-heading>IPCR</h2>
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
<!-- Footer left -->
<section id=footer-left>
© Copyright 2021 <a href="https://sites.google.com/view/puptfsis/fsis-team-2/fsis2-team-members?authuser=0" title="Dbooom Themes">Apex Dev Team | PUP Taguig</a> - All Rights Reserved.
</section>
<!-- End - Footer left -->
<!-- Footer right -->
<section id=footer-right>
<ul class=footer-navigation>
<li>
<a href='http://www.pup-taguig.net' title=Home>Home</a>
</li>
<li>
<a href='index.php?r=site/about' title=About>About</a>
</li>
<li>
<a href='index.php?r=site/contact' title=Contacts>Contacts</a>
</li>
</ul>
</section>
<!-- End - Footer right -->
</div>
</footer>
<!-- End - Page footer -->
<!-- Theme backgrounds -->
<div id=theme-backgrounds>

<img alt='Asset 4' data-color='#D64333' src='assets/backgrounds/4.jpg.pagespeed.ce.AV4Gchw-qN.jpg' width=1600 height=1064 />

</div>
<!-- End - Theme backgrounds -->
<link href='scripts/libs/switcher/switcher.css' rel=stylesheet />

<!-- Scripts -->
<script id=js-dispatcher src='scripts/scripts.js'></script>
</body>
</html>



<?php
/*
original IPCR create jan to june

<?php
session_start();
include("config.php");
if(isset($_SESSION['user'])) {
    if($_SESSION['user']==1) {

    } else if($_SESSION['user']==0) {

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
<title>Administrator | IPCR</title>
<!--Script of Sweet alert-->
<script src="sweetalert/jquery-3.6.0.min.js"></script>
<script src="sweetalert/sweetalert2.all.min.js"></script>
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
.underlined-header1 {
    background-color: Lightblue;
    font-size: 22px;
}
</style>

<link href='styles/print.css' media=print rel=stylesheet />
<!-- Modernizr library -->
<script src='scripts/libs/modernizr/modernizr.min.js'></script>
<meta charset="UTF-8"></head>
<body style="background-color: Black;">
<!-- JS notice - will be displayed if javascript is disabled -->
<p id=jsnotice>Javascript is currently disabled. This site requires Javascript to function correctly. Please <a href="http://enable-javascript.com/">enable Javascript in your browser</a>!</p>
<!-- End - JS notice -->
<!-- Page header -->
<div id="GradientDiv" class="cssWLGradientCommon cssWLGradientIMG"></div>

<!-- End - Page header -->

<!-- Page subheader -->

<!-- End - Page subheader -->
<!-- Page body -->
<!--<section class=container-block id=page-body>-->
<!--<div class=container-inner>-->
<!-- Page title -->
<header id=page-title>
<!-- Title and summary -->

<!-- End - Title and summary -->
<!-- Title right side -->
<section id="menu_strip">
<a data-category=all href='index.php?r=administrator'>Home</a>
<a data-category=design href="index.php?r=administrator/profile">Profile</a>
<a data-category=design href="index.php?r=administrator/faculty">Faculty</a>
<a data-category=design href="index.php?r=administrator/reports">Reports</a>
<a data-category=design href="index.php?r=administrator/forms">Forms</a>
<a data-category=design href="index.php?r=administrator/ServiceCreditMenu">Service Credit</a>
<a data-category=design href="index.php?r=administrator/SchedulingSystem">Scheduling</a>
<a data-category=design href="index.php?r=administrator/SubjPrefer">Subject Preferences</a>
<a data-category=design href="index.php?r=administrator/other">Other</a>
<a data-category=design href="index.php?r=administrator/logout">Log out</a>
</section>
<!-- End - Title right side -->
</header>
<!-- End - Page title -->
<!-- Page body content -->

<section id=page-body-content>
<div id=page-body-content-inner>
<!-- Page content -->
<div id=page-content>
<!-- Video - HTML5 -->

 
<?php
    if(isset($_GET['m'],$_GET['y']))
    {
        $m = $_GET['m'];
        $y = $_GET['y'];
    }
?>

<h2 class="underlined-header">Create IPCR: <strong>JANUARY TO JUNE <?php echo '('.$y.')';?></strong></h2>
<a href="index.php?r=administrator/IPCRcreate"><button style="width: 80px;">Go back</button></a>
<br>
<br>
<?php echo'<a href="index.php?r=administrator/IPCRaddrow&m='.$m.'&y='.$y.'"><button style="width: 80px;">Add Row</button></a>
<a href="index.php?r=administrator/IPCRform1" target = "blank"><button>Generate PDF</button></a>';?>

<br>
<br>
<br>
<section>


<table class=round-3 style="width:100%; ">
<thead>
    <tr>
        <br>
        <h2 class="underlined-header1">Strategic Priority</h2>
        <th width="30%"><h5 align="center">Output</h5></th>
        <th width="30%"><h5 align="center">Success Indicators</h5></th>
        <th width="30%"><h5 align="center">Actual Accomplishments</h5></th>
        <!--<th><h5>Ratings</h5></th>
        <th><h5>Remarks</h5></th>-->
        <th width="20%"><h5 align="center">Action</h5></th>

    </tr>
</thead>
<tfoot>
<tr>
<td colspan=10></td>
</tr>
</tfoot>
<tbody >
<?php
        
        $sql = "SELECT * FROM tbl_ipcr1 WHERE part='sp' AND deleted_at IS NULL AND year = '$y'";
        $query = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($query)) :
        $id = $row['id'];
?>            
           <tr>
                <td name="outputs" style="text-align: left;"><?= $row['output']?></td>
                <td name="indi" style="text-align: left;"><?= $row['indicators']?></td>
                <td name="accomp" style="text-align: left;"></td>

                <td style="text-align: center;">
                    <a href="index.php?r=administrator/EditIPCRrow<?php echo'&id='.$id.'&m='.$m.'&y='.$y.'';?>"><button style="width:55px">Edit</button></a>
                    <a href="index.php?r=administrator/processDeleteIPCRinfo<?php echo'&id='.$id.'&m='.$m.'&y='.$y.'';?>" class="btn-del"><button  style="width:55px" name="del" >Delete</button></a>
                </td> 
            </tr>
        <?php endwhile; ?> 

</tbody>
</table>


<br>
<br>
<table class=round-3 style="width:100%; ">
<thread>
    <tr>
        <h2 class="underlined-header1">Core Function</h2>
        <th width="30%"><h5 align="center">Output</h5></th>
        <th width="30%"><h5 align="center">Succes Indicators</h5></th>
        <th width="30%"><h5 align="center">Actual Accomplishments</h5></th>
        <!--<th><h5>Ratings</h5></th>
        <th><h5>Remarks</h5></th>-->
        <th width="20%"><h5 align="center">Action</h5></th>
    </tr>
</thread>
<tfoot>
<tr>
<td colspan=3></td>
</tr>
</tfoot>
<tbody>
<?php
        
        $sql = "SELECT * FROM tbl_ipcr1 WHERE part='cf' AND deleted_at IS NULL AND year = '$y'";
        $query = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($query)) :
        $id = $row['id'];
?>          
           <tr>
                <td name="outputs" style="text-align: left;"><?= $row['output']?></td>
                <td name="indi" style="text-align: left;"><?= $row['indicators']?></td>
                <td name="accomp" style="text-align: left;"></td>

                <td style="text-align: center;">
                    <a href="index.php?r=administrator/EditIPCRrow<?php echo'&id='.$id.'&m='.$m.'&y='.$y.'';?>"><button style="width:55px">Edit</button></a>
                    <a href="index.php?r=administrator/processDeleteIPCRinfo<?php echo'&id='.$id.'&m='.$m.'&y='.$y.'';?>" class="btn-del"><button  style="width:55px" name="del" >Delete</button></a>
                </td> 
            </tr>
        <?php endwhile; ?> 
</tbody>
</table>
</table>
<br>
<br>
<table class=round-3 style="width:100%; ">
<thread>
    <tr>
        <h2 class="underlined-header1">Support Function</h2>
        <th width="30%"><h5 align="center">Output</h5></th>
        <th width="30%"><h5 align="center">Succes Indicators</h5></th>
        <th width="30%"><h5 align="center">Actual Accomplishments</h5></th>
        <!--<th><h5>Ratings</h5></th>
        <th><h5>Remarks</h5></th>-->
        <th width="20%"><h5 align="center">Action</h5></th>
    </tr>
</thread>
<tfoot>
<tr>
<td colspan=3></td>
</tr>
</tfoot>
<tbody>
<?php
        
        $sql = "SELECT * FROM tbl_ipcr1 WHERE part='sf' AND deleted_at IS NULL AND year = '$y'";
        $query = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($query)) :  
        $id = $row['id'];
?>
           <tr>
                <td name="outputs" style="text-align: left;"><?= $row['output']?></td>
                <td name="indi" style="text-align: left;"><?= $row['indicators']?></td>
                <td name="accomp" style="text-align: left;"></td>

                <td style="text-align: center;">
                    <a href="index.php?r=administrator/EditIPCRrow<?php echo'&id='.$id.'&m='.$m.'&y='.$y.'';?>"><button style="width:55px">Edit</button></a>
                    <a href="index.php?r=administrator/processDeleteIPCRinfo<?php echo'&id='.$id.'&m='.$m.'&y='.$y.'';?>" class="btn-del"><button  style="width:55px" name="del" >Delete</button></a>
                </td> 
            </tr>
        <?php endwhile; ?> 
</tbody>
</table>
<h5><strong><center>IF YOU ARE DONE ON CREATING IPCR, PLEASE PRESS THIS BUTTON TO MAKE IPCR AVAILABLE TO FACULTY</center></strong></h5>
<center><a href="index.php?r=administrator/IPCRtagvisible<?php echo'&m='.$m.'&y='.$y.'';?>"><button style="width:120px">Tag as Visible</button></a></center>
</div>
</div>
</section>
            <!--Sweet alert delete-->
            <?php if(isset($_GET['s'])) : ?>
                <div class="flash-data" data-flashdata="<?= $_GET['s']; ?>"></div>
            <?php endif; ?>

            <!-- Sweet alert Save -->
            <?php if(isset($_GET['a'])) : ?>
                <div class="flash-data-save" data-flashdata1="<?= $_GET['a']; ?>"></div>
            <?php endif; ?>
                
                <script>
                    $('.btn-del').on('click', function(e){
                        e.preventDefault()
                        const href = $(this).attr('href')

                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this action!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete!'
                        }).then((result) => {
                            if (result.value) {
                                document.location.href = href;
                            } else if (result.isDenied) {
                                Swal.fire(
                                    'Changes are not saved',
                                    '',
                                    'info'
                                )
                            }
                        })
                    })


                    const flashdata = $('.flash-data').data('flashdata')
                    if (flashdata) {
                        Swal.fire(
                            'Succesfully Deleted',
                            '',
                            'success'
                        )
                    }    

                    const flashdata1 = $('.flash-data-save').data('flashdata1')
                    if (flashdata1) {
                        Swal.fire(
                            'Succesfully Saved',
                            '',
                            'success'
                        )
                    }    

                </script>
<footer id=page-footer>
<div class=container-aligner>
<!-- Footer left -->
<section id=footer-left>
© Copyright 2021 <a href="https://sites.google.com/view/puptfsis/fsis-team-2/fsis2-team-members?authuser=0" title="Dbooom Themes">Apex Dev Team | PUP Taguig</a> - All Rights Reserved.
</section>
<!-- End - Footer left -->
<!-- Footer right -->
<section id=footer-right>
<ul class=footer-navigation>
<li>
<a href='http://www.pup-taguig.net' title=Home>Home</a>
</li>
<li>
<a href='index.php?r=site/about' title=About>About</a>
</li>
<li>
<a href='index.php?r=site/contact' title=Contacts>Contacts</a>
</li>
</ul>
</section>
<!-- End - Footer right -->
</div>
</footer>
<!-- End - Page footer -->
<!-- Theme backgrounds -->
<div id=theme-backgrounds>

<img alt='Asset 4' data-color='#D64333' src='assets/backgrounds/4.jpg.pagespeed.ce.AV4Gchw-qN.jpg' width=1600 height=1064 />

</div>
<!-- End - Theme backgrounds -->
<link href='scripts/libs/switcher/switcher.css' rel=stylesheet />

<!-- Scripts -->
<script id=js-dispatcher src='scripts/scripts.js'></script>
</body>
</html>


*/
?>