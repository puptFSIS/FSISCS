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
#asterisk
{
    font-size: 20px;
    color: red;
}

#category
{
    display: inline;
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
<?php include("headerMenuIPCR.php");?>
<!-- End - Page title -->
<!-- Page body content -->
<section id=page-body-content>
<div id=page-body-content-inner>
<!-- Page content -->
<div id=page-content>

<section>
<?php
    if(isset($_GET['m'],$_GET['y']))
    {
        $m = $_GET['m'];
        $y = $_GET['y'];
    }
?>

<?php 
    $sql = "SELECT * FROM tbl_ipcrvisible WHERE month = '$m' AND year = '$y'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $dline = $row['dline_date'];
 ?>

<h2 class="underlined-header" style="text-align: center;"><strong>Individual Performance, Commitment and Review: JULY TO DECEMBER <?php echo '('.$y.')';?></strong></h2>
<h2 class="underlined-header" style="width:25%; color: Red;"><strong> Deadline: <input style="display: inline;" placeholder="yyyy-mm-dd" value="<?php echo $dline; ?>" readonly></strong></h2>

<a href="index.php?r=administrator/IPCRcreate"><button style="width: 80px;">&laquo; Previous</button></a>
<br>
<br>
    <a href="index.php?r=administrator/IPCRaddrow<?php echo'&m='.$m.'&y='.$y.'';?>"><button style="width: 80px;">Add Row</button></a>
    <a href="index.php?r=administrator/IPCRsetdeadline<?php echo'&m='.$m.'&y='.$y.'';?>"><button style="width: 100px;" class="btn-set">Set Deadline</button></a>
    <!-- <a href="index.php?r=administrator/IPCRform1" target = "blank"><button>Generate PDF</button></a> -->
<br/>
<br/>
<p style="font-size: 15px"><strong>Note: <b id="asterisk">*</b> - Required Fields.</strong></p>
<table class=round-3 style="width:100%; ">
<thead>
    <tr>
        <h2 class="underlined-header1"><center><p style="color: black;" id="category">S T R A T E G I C</p><p style="color: gray;" id="category"> P R I O R I T Y</p></center></h2>
        <th width="5%"><h5 align="center"></h5></th>
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
<td colspan="11" style="font-size: 12px">End of Strategic Priotrity</td> 
</tr>
</tfoot>
<tbody >
<?php
        // Fetch all the save information in the database of strategic priority
        $sql = "SELECT * FROM tbl_ipcr2 WHERE part='sp' AND deleted_on IS NULL AND year = '$y'";
        $query = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($query)) :
        $id = $row['id'];
        $ifRequired = $row['if_required'];
?>            
           <tr>
                <td name="required" style="text-align: left;">
                    <strong>
                        <center><?php if($ifRequired == "Required") { echo '<p id="asterisk">*</p>';  } else { ""; } ?></center>
                    </strong>
                </td>
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
        <h2 class="underlined-header1"><center><p style="color: black;" id="category">C O R E</p><p style="color: gray;" id="category"> F U N C T I O N</p></center></h2>
        <th width="5%"><h5 align="center"></h5></th>
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
<td colspan="11" style="font-size: 12px">End of Core Function</td> 
</tr>
</tfoot>
<tbody>
<?php
        // Fetch all the save information in the database of core function
        $sql = "SELECT * FROM tbl_ipcr2 WHERE part='cf' AND deleted_on IS NULL AND year = '$y'";
        $query = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($query)) :
        $id = $row['id'];
        $ifRequired = $row['if_required'];
?>          
           <tr>
                <td name="required" style="text-align: left;">
                    <strong>
                        <center><?php if($ifRequired == "Required") { echo '<p id="asterisk">*</p>';  } else { ""; } ?></center>
                    </strong>
                </td>
                <td name="outputs" style="text-align: left;"><?= $row['output']?></td>
                <td name="indi" style="text-align: left;"><?= $row['indicators']?></td>
                <td name="accomp" style="text-align: left;"></td>

                <td style="text-align: center;">
                    <a href="index.php?r=administrator/EditIPCRrow<?php echo'&id='.$id.'&m='.$m.'&y='.$y.'';?>"><button style="width:55px">Edit</button></a>
                    <a href="index.php?r=administrator/processDeleteIPCRinfop<?php echo'&id='.$id.'&m='.$m.'&y='.$y.'';?>" class="btn-del"><button  style="width:55px" name="del" >Delete</button></a>
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
        <h2 class="underlined-header1"><center><p style="color: black;" id="category">S U P P O R T</p><p style="color: gray;" id="category"> F U N C T I O N</p></center></h2>
        <th width="5%"><h5 align="center"></h5></th>
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
<td colspan="11" style="font-size: 12px">End of Support Function</td> 
</tr>
</tfoot>
<tbody>
<?php
        // Fetch all the save information in the database of support function
        $sql = "SELECT * FROM tbl_ipcr2 WHERE part='sf' AND deleted_on IS NULL AND year = '$y'";
        $query = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($query)) :  
        $id = $row['id'];
        $ifRequired = $row['if_required'];
?>
           <tr>
                <td name="required" style="text-align: left;">
                    <strong>
                        <center><?php if($ifRequired == "Required") { echo '<p id="asterisk">*</p>';  } else { ""; } ?></center>
                    </strong>
                </td>
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

            <!-- for add row -->
            <?php if(isset($_GET['b'])) : ?>
                <div class="flash-data-add" data-flashdata2="<?= $_GET['b']; ?>"></div>
            <?php endif; ?>

            <!-- for set deadline -->
            <?php if(isset($_GET['c'])) : ?>
                <div class="flash-data-set" data-flashdata3="<?= $_GET['c']; ?>"></div>
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

                    const flashdata2 = $('.flash-data-add').data('flashdata2')
                    if (flashdata2) {
                        Swal.fire(
                            'Succesfully Added!',
                            'Press OK to continue',
                            'success'
                        )
                    }   

                    const flashdata3 = $('.flash-data-set').data('flashdata3')
                    if (flashdata3) {
                        Swal.fire(
                            'Deadline Succesfully Set!',
                            'Press OK to continue',
                            'success'
                        )
                    }     

                </script>
<footer id=page-footer>
<div class=container-aligner>
<!-- Footer left -->
<section id=footer-left>
© Copyright 2011 <a href="https://sites.google.com/view/puptfsis/ipcr/fsis2-team-members?authuser=0" title="Dbooom Themes">Apex Dev Team | PUP Taguig</a> - All Rights Reserved.
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
