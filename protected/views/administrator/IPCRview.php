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

#btn-act
{
    width: 95px;
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
<?php include("headerMenu.php");?>
<!-- End - Page title -->
<!-- Page body content -->

<section id=page-body-content>
<div id=page-body-content-inner>
<!-- Page content -->
<div id=page-content>
<!-- Video - HTML5 -->
<section>
 
<?php
    if(isset($_GET['m'],$_GET['y'],$_GET['fcode'],$_GET['fname'],$_GET['mname'],$_GET['sname']))
    {
        $m = $_GET['m'];
        $y = $_GET['y'];
        $fcode = $_GET['fcode'];
        $fname = $_GET['fname'];
        $mname = $_GET['mname'];
        $sname = $_GET['sname'];
    }

if($m == "JJ")
{
    echo '<h2 class="underlined-header" style="width:132%; margin-left: -15%;"><strong>IPCR OF: '.$sname.", ".$fname." ".$mname.' (JANUARY TO JUNE - '.$y.')</strong></h2>
    ';
} else {
    echo '<h2 class="underlined-header" style="width:132%; margin-left: -15%;"><strong>IPCR OF: '.$sname.", ".$fname." ".$mname.' (JULY TO DECEMBER - '.$y.')</strong></h2>
    ';
}
?>
<section>
<a href="index.php?r=administrator/IPCRlist<?php echo'&m='.$m.'&y='.$y.'';?>"><button style="width: 80px; margin-left: -15%;">&laquo; Previous</button></a>

<br>
<table class=round-3 style="width:132%; margin-left: -15%;">
<thead>
    <tr align="center">
        <br>
        <h2 class="underlined-header1" style="width:132%; margin-left: -15%;">Strategic Priority</h2>
        <th style="width: 20%;" rowspan="2"><h5>Output</h5></th>
        <th style="width: 20%;" rowspan="2"><h5>Success Indicators</h5></th>
        <th style="width: 20%;" rowspan="2"><h5>Actual Accomplishments</h5></th>
        <th style="width: 30%;" colspan="4"><h5>Ratings</h5></th>
        <th style="width: 30%;" rowspan="2"><h5>Remarks</h5></th>
        <th style="width: 20%;" rowspan="2"><h5>Approval</h5></th>
        <th style="width: 20%;" rowspan="2"><h5>Action</h5></th>
    </tr>
    <tr align="center">
        <th>Q1</th>
        <th>E2</th>
        <th>T3</th>
        <th>A4</th>
    </tr>
</thead>
<tfoot>
<tr>
<td colspan=10></td>
</tr>
</tfoot>
<tbody >

<?php 
    if($m == "JJ")
    {
        $sql= "SELECT tbl_ipcr1.*,tbl_ipcraccomp.* FROM tbl_ipcr1 LEFT JOIN tbl_ipcraccomp ON tbl_ipcraccomp.id_ipcr1 = tbl_ipcr1.id AND tbl_ipcraccomp.FCode = '$fcode' WHERE tbl_ipcr1.part='sp' AND tbl_ipcr1.year = '$y' AND tbl_ipcr1.deleted_at IS NULL ORDER BY tbl_ipcr1.id, tbl_ipcraccomp.id_ipcr1 ASC";
        $result = mysqli_query($conn,$sql);
    } else
    {
        $sql= "SELECT tbl_ipcr2.*,tbl_ipcraccomp.* FROM tbl_ipcr2 LEFT JOIN tbl_ipcraccomp ON tbl_ipcraccomp.id_ipcr2 = tbl_ipcr2.id AND tbl_ipcraccomp.FCode = '$fcode' WHERE tbl_ipcr2.part='sp' AND tbl_ipcr2.year = '$y' AND tbl_ipcr2.deleted_at IS NULL ORDER BY tbl_ipcr2.id, tbl_ipcraccomp.id_ipcr2 ASC";
        $result = mysqli_query($conn,$sql);
    }
        while($row = mysqli_fetch_array($result)) :
            $outputs = $row['output'];
            $indi = $row['indicators'];
            $accomp = $row['accomplishment'];
            $rem = $row['remarks'];
            $id = $row['id'];
?>
            
                <tr>
                    <td style="white-space:pre-line;" name="outputs" style="text-align: left;"><?= $row['output']?></td>
                    <td name="indi" style="text-align: left;"><?= $row['indicators']?></td>
                    <td id="accomp" name="accomp" style="text-align: left;"><?= $row['accomplishment']?></td>
                    <td id="accomp" name="accomp" style="text-align: left;"></td>
                    <td id="accomp" name="accomp" style="text-align: left;"></td>
                    <td id="accomp" name="accomp" style="text-align: left;"></td>  
                    <td id="accomp" name="accomp" style="text-align: left;"></td>
                    <td id="accomp" name="accomp" style="text-align: left;"><?= $row['remarks']?></td>
                    <td id="accomp" name="accomp" style="text-align: left;"></td>
        
                    <td style="text-align: center;">
                    <form method="post">
                        <input type="hidden" name="fname" value="<?php echo $fname; ?>">
                        <input type="hidden" name="mname" value="<?php echo $mname; ?>">
                        <input type="hidden" name="sname" value="<?php echo $sname; ?>">
                    </form>
                    <a href="index.php?r=administrator/IPCRviewproof<?php echo'&accomp='.$accomp.'&fcode='.$fcode.'&id='.$id.'&m='.$m.'&y='.$y.'';?>"><button id="btn-act">View Proof/s</button></a>
                    <a href="index.php?r=administrator/IPCRviewproof<?php echo'&accomp='.$accomp.'&fcode='.$fcode.'&id='.$id.'&m='.$m.'&y='.$y.'';?>"><button id="btn-act">Add Ratings</button></a>
                    <a href="index.php?r=administrator/IPCRremarks<?php echo'&accomp='.$accomp.'&fcode='.$fcode.'&id='.$id.'&m='.$m.'&y='.$y.'';?>"><button id="btn-act">Add Remarks</button></a>
                    </td>
                </tr>       
            <?php endwhile; ?>    

</tbody>
</table>
<br>
<br>
<table class=round-3 style="width:132%; margin-left: -15%; ">
<thead>
    <tr align="center">
        <br>
        <h2 class="underlined-header1" style="width:132%; margin-left: -15%; ">Core Function</h2>
        <th style="width: 20%;" rowspan="2"><h5>Output</h5></th>
        <th style="width: 20%;" rowspan="2"><h5>Success Indicators</h5></th>
        <th style="width: 20%;" rowspan="2"><h5>Actual Accomplishments</h5></th>
        <th style="width: 30%;" colspan="4"><h5>Ratings</h5></th>
        <th style="width: 30%;" rowspan="2"><h5>Remarks</h5></th>
        <th style="width: 20%;" rowspan="2"><h5>Approval</h5></th>
        <th style="width: 20%;" rowspan="2"><h5>Action</h5></th>
    </tr>
    <tr align="center">
        <th>Q1</th>
        <th>E2</th>
        <th>T3</th>
        <th>A4</th>
    </tr>
</thead>
<tfoot>
<tr>
<td colspan=10></td>
</tr>
</tfoot>
<tbody >
<?php
    if($m == "JJ")
    {
        $sql= "SELECT tbl_ipcr1.*,tbl_ipcraccomp.* FROM tbl_ipcr1 LEFT JOIN tbl_ipcraccomp ON tbl_ipcraccomp.id_ipcr1 = tbl_ipcr1.id AND tbl_ipcraccomp.FCode = '$fcode' WHERE tbl_ipcr1.part='cf' AND tbl_ipcr1.year = '$y' AND tbl_ipcr1.deleted_at IS NULL ORDER BY tbl_ipcr1.id, tbl_ipcraccomp.id_ipcr1 ASC";
        $result = mysqli_query($conn,$sql);
    } else
    {
        $sql= "SELECT tbl_ipcr2.*,tbl_ipcraccomp.* FROM tbl_ipcr2 LEFT JOIN tbl_ipcraccomp ON tbl_ipcraccomp.id_ipcr2 = tbl_ipcr2.id AND tbl_ipcraccomp.FCode = '$fcode' WHERE tbl_ipcr2.part='cf' AND tbl_ipcr2.year = '$y' AND tbl_ipcr2.deleted_at IS NULL ORDER BY tbl_ipcr2.id, tbl_ipcraccomp.id_ipcr2 ASC";
        $result = mysqli_query($conn,$sql);
    }
        while($row = mysqli_fetch_array($result)) :
            $outputs = $row['output'];
            $indi = $row['indicators'];
            $accomp = $row['accomplishment'];
            $id = $row['id'];
?>
            
                <tr>
                    <td style="white-space:pre-line;" name="outputs" style="text-align: left;"><?= $row['output']?></td>
                    <td name="indi" style="text-align: left;"><?= $row['indicators']?></td>
                    <td id="accomp" name="accomp" style="text-align: left;"><?= $row['accomplishment']?></td>
                    <td id="accomp" name="accomp" style="text-align: left;"></td>
                    <td id="accomp" name="accomp" style="text-align: left;"></td>
                    <td id="accomp" name="accomp" style="text-align: left;"></td>
                    <td id="accomp" name="accomp" style="text-align: left;"></td>
                    <td id="accomp" name="accomp" style="text-align: left;"><?= $row['remarks']?></td>
                    <td id="accomp" name="accomp" style="text-align: left;"></td>         
             
                    <td style="text-align: center;">
                    <a href="index.php?r=administrator/IPCRviewproof<?php echo'&accomp='.$accomp.'&fcode='.$fcode.'&id='.$id.'&m='.$m.'&y='.$y.'';?>"><button id="btn-act">View Proof/s</button></a>
                    <a href="index.php?r=administrator/IPCRviewproof<?php echo'&accomp='.$accomp.'&fcode='.$fcode.'&id='.$id.'&m='.$m.'&y='.$y.'';?>"><button id="btn-act">Add Ratings</button></a>
                    <a href="index.php?r=administrator/IPCRremarks<?php echo'&accomp='.$accomp.'&fcode='.$fcode.'&id='.$id.'&m='.$m.'&y='.$y.'';?>"><button id="btn-act">Add Remarks</button></a>
                    </td>
                </tr>       
            <?php endwhile; ?>
</tbody>
</table>
<br>
<br>
<table class=round-3 style="width:132%; margin-left: -15%; ">
<thead>
    <tr align="center">
        <br>
        <h2 class="underlined-header1" style="width:132%; margin-left: -15%;">Support Function</h2>
        <th style="width: 20%;" rowspan="2"><h5>Output</h5></th>
        <th style="width: 20%;" rowspan="2"><h5>Success Indicators</h5></th>
        <th style="width: 20%;" rowspan="2"><h5>Actual Accomplishments</h5></th>
        <th style="width: 30%;" colspan="4"><h5>Ratings</h5></th>
        <th style="width: 30%;" rowspan="2"><h5>Remarks</h5></th>
        <th style="width: 20%;" rowspan="2"><h5>Approval</h5></th>
        <th style="width: 20%;" rowspan="2"><h5>Action</h5></th>
    </tr>
    <tr align="center">
        <th>Q1</th>
        <th>E2</th>
        <th>T3</th>
        <th>A4</th>
    </tr>
</thead>
<tfoot>
<tr>
<td colspan=10></td>
</tr>
</tfoot>
<tbody >
<?php
    if($m == "JJ")
    {
        $sql= "SELECT tbl_ipcr1.*,tbl_ipcraccomp.* FROM tbl_ipcr1 LEFT JOIN tbl_ipcraccomp ON tbl_ipcraccomp.id_ipcr1 = tbl_ipcr1.id AND tbl_ipcraccomp.FCode = '$fcode' WHERE tbl_ipcr1.part='sf' AND tbl_ipcr1.year = '$y' AND tbl_ipcr1.deleted_at IS NULL ORDER BY tbl_ipcr1.id, tbl_ipcraccomp.id_ipcr1 ASC";
        $result = mysqli_query($conn,$sql);
    } else
    {
        $sql= "SELECT tbl_ipcr2.*,tbl_ipcraccomp.* FROM tbl_ipcr2 LEFT JOIN tbl_ipcraccomp ON tbl_ipcraccomp.id_ipcr2 = tbl_ipcr2.id AND tbl_ipcraccomp.FCode = '$fcode' WHERE tbl_ipcr2.part='sf' AND tbl_ipcr2.year = '$y' AND tbl_ipcr2.deleted_at IS NULL ORDER BY tbl_ipcr2.id, tbl_ipcraccomp.id_ipcr2 ASC";
        $result = mysqli_query($conn,$sql);
    }
        while($row = mysqli_fetch_array($result)) :
            $outputs = $row['output'];
            $indi = $row['indicators'];
            $accomp = $row['accomplishment'];
            $id = $row['id'];
?>
            
                <tr>
                    <td style="white-space:pre-line;" name="outputs" style="text-align: left;"><?= $row['output']?></td>
                    <td name="indi" style="text-align: left;"><?= $row['indicators']?></td>
                    <td id="accomp" name="accomp" style="text-align: left;"><?= $row['accomplishment']?></td>
                    <td id="accomp" name="accomp" style="text-align: left;"></td>
                    <td id="accomp" name="accomp" style="text-align: left;"></td>
                    <td id="accomp" name="accomp" style="text-align: left;"></td>
                    <td id="accomp" name="accomp" style="text-align: left;"></td>
                    <td id="accomp" name="accomp" style="text-align: left;"><?= $row['remarks']?></td>
                    <td id="accomp" name="accomp" style="text-align: left;"></td>         
             
                    <td style="text-align: center;">
                    <a href="index.php?r=administrator/IPCRviewproof<?php echo'&accomp='.$accomp.'&fcode='.$fcode.'&id='.$id.'&m='.$m.'&y='.$y.'';?>"><button id="btn-act">View Proof/s</button></a>
                    <a href="index.php?r=administrator/IPCRviewproof<?php echo'&accomp='.$accomp.'&fcode='.$fcode.'&id='.$id.'&m='.$m.'&y='.$y.'';?>"><button id="btn-act">Add Ratings</button></a>
                    <a href="index.php?r=administrator/IPCRremarks<?php echo'&accomp='.$accomp.'&fcode='.$fcode.'&id='.$id.'&m='.$m.'&y='.$y.'';?>"><button id="btn-act">Add Remarks</button></a>
                    </td>
                </tr>       
            <?php endwhile; ?>
                

</tbody>
</table>
</div>
</div>
</section>
</section>

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
