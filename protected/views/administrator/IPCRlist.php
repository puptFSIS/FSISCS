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
{BACKGROUND-IMAGE: url(images/hd_tm1.jpg);BACKGROUND-REPEAT:space;top:0;height:105px;}
    
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

.underlined-header-submitted {
    background-color: black;
    font-size: 22px;
    color: white;
}

.underlined-header-approved {
    background-color: green;
    font-size: 22px;
    color: white;
}

.underlined-header-pending {
    background-color: blue;
    font-size: 22px;
    color: white;
}
.underlined-header-unsubmitted {
    background-color: #d19c15;
    font-size: 22px;
    color: white;
}
/*styles for switchable tab*/

.warpper{
  display:flex;
  flex-direction: column;
  align-items: center;
}
.tab1{
  cursor: pointer;
  padding:10px 20px;
  margin:0px 2px;
  background:#000;
  display:inline-block;
  color:#fff;
  border-radius:3px 3px 0px 0px;
  box-shadow: 0 0.5rem 0.8rem #00000080;
}
.tab2{
  cursor: pointer;
  padding:10px 20px;
  margin:0px 2px;
  background:green;
  display:inline-block;
  color:#fff;
  border-radius:3px 3px 0px 0px;
  box-shadow: 0 0.5rem 0.8rem #00000080;
}
.tab3{
  cursor: pointer;
  padding:10px 20px;
  margin:0px 2px;
  background:Blue;
  display:inline-block;
  color:#fff;
  border-radius:3px 3px 0px 0px;
  box-shadow: 0 0.5rem 0.8rem #00000080;
}
.tab4{
  cursor: pointer;
  padding:10px 20px;
  margin:0px 2px;
  background: #d19c15;
  display:inline-block;
  color:#fff;
  border-radius:3px 3px 0px 0px;
  box-shadow: 0 0.5rem 0.8rem #00000080;
}
.panels{
  background:whitesmoke;
  box-shadow: 0 2rem 2rem #00000080;
  min-height:200px;
  width:570px;
  max-width:1000px;
  border-radius:3px;
  /*overflow:hidden;*/
  padding:20px;  
}
.panel{
  display:none;
  animation: fadein .8s;
}
@keyframes fadein {
    from {
        opacity:0;
    }
    to {
        opacity:1;
    }
}
.panel-title{
  font-size:1.5em;
  font-weight:bold;
}

#one:checked ~ .panels #one-panel,
#two:checked ~ .panels #two-panel,
#three:checked ~ .panels #three-panel,
#four:checked ~ .panels #four-panel{
  display:block;
}
#one:checked ~ .tabs #one-tab
{
  background:#fffffff6;
  color:#000;
  border-top: 3px solid #000;
}
#two:checked ~ .tabs #two-tab
{
  background:#fffffff6;
  color:#000;
  border-top: 3px solid green;
}
#three:checked ~ .tabs #three-tab
{
  background:#fffffff6;
  color:#000;
  border-top: 3px solid blue;
}
#four:checked ~ .tabs #four-tab
{
  background:#fffffff6;
  color:#000;
  border-top: 3px solid #d19c15;
}


footer {
    position: absolute;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: black;
   color: white;
   text-align: center;
}
</style>

<link href='styles/print.css' media=print rel=stylesheet />
<!-- Modernizr library -->
<script src='scripts/libs/modernizr/modernizr.min.js'></script>
<meta charset="UTF-8"></head>
<body class=' page-sidebar-right' style="background-color: ghostwhite;" >
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
<!-- Video - HTML5 -->
<section>

<h2 class=underlined-header><center>Individual Performance Commitment and Review</center></h2>

<!---->
<?php
    

    if(isset($_GET['m'],$_GET['y']))
    {
        $m = $_GET['m'];
        $y = $_GET['y'];
    }
 
?>
    <div class="main_container" onload="makeTableScroll();">
        <div class="scrollingTable">
                <br>
                <?php if($m == "JJ") : ?>
                    <h3><strong>List of Faculty IPCR <?php echo '(January to June, '.$y.')';?></strong></h3>
                <?php else : ?>
                    <h3><strong>List of Faculty IPCR <?php echo '(July to December, '.$y.')';?></strong></h3>
                <?php endif; ?>
                <br>
                
            <div class="warpper">
                        <input class="radio" id="one" name="group" type="radio" checked style="display: none;">
                        <input class="radio" id="two" name="group" type="radio" style="display: none;">
                        <input class="radio" id="three" name="group" type="radio" style="display: none;">
                        <input class="radio" id="four" name="group" type="radio" style="display: none;">
                    <div class="tabs">
                          <label class="tab1" id="one-tab" for="one">Submitted</label>
                          <label class="tab2" id="two-tab" for="two">Approved</label>
                          <label class="tab3" id="three-tab" for="three">Pending</label>
                          <label class="tab4" id="four-tab" for="four">Unsubmitted</label>
                    </div>
                <div class="panels">
                    <div class="panel" id="one-panel">
                        <div class="panel-title underlined-header-submitted"><center>SUBMITTED IPCR</center></div>
                        <br>
                        <p><strong>Search professor</strong><input type="text" id="myInputSubmit" onkeyup="myFunction1()" placeholder="i.e. Dela Cruz, Juan E." title="Type in a name"></p>
                        <table id="myTableSubmit">
                            <thead>
                                <tr>
                                    
                                    <th width="30%"><h5 align="Left">Name</th></h5>
                                    <th width="30%"><h5 align="Left">Faculty Code</th></h5>
                                    <th width="30%"><h5 align="Left">Status</th></h5>
                                    <th width="5%"><h5 align="center">Action</th></h5> 
                                </tr>
                            </thead>
                            <?php
                             //Database
                                $sql = "SELECT tbl_evaluationfaculty.LName,tbl_evaluationfaculty.FName,tbl_evaluationfaculty.MName,tbl_ipcrstatus.* FROM tbl_evaluationfaculty LEFT JOIN tbl_ipcrstatus ON tbl_ipcrstatus.fcode = tbl_evaluationfaculty.FCode WHERE tbl_evaluationfaculty.Status = 'Active' AND tbl_ipcrstatus.year = '$y' AND tbl_ipcrstatus.month = '$m' AND tbl_ipcrstatus.status = 'Submitted' ORDER BY tbl_evaluationfaculty.LName ASC";
                                $result = mysqli_query($conn,$sql);
                                $count = mysqli_num_rows($result);

                                if($count > 0) {
                                while($row = mysqli_fetch_array($result)) 
                                {
                                    $fcode = $row['fcode'];
                                    $fname = $row['FName'];
                                    $status = $row['status'];
                                    $mname = $row['MName'];
                                    $sname = $row['LName'];
                            
                                    echo '<tr>
                                        <td name="name" style="text-align: left;">'.$sname.", ".$fname." ".$mname.'</td>
                                        <td name="fcode" style="text-align: left;">'.$fcode.'</td>
                                        <td name="status" style="text-align: left;">'.$status.'</td>
                                        <td><a href="index.php?r=administrator/IPCRviewprocess&status='.$status.'&fcode='.$fcode.'&m='.$m.'&y='.$y.'"><button type="submit" name="submit" style="width: 60px">View</button></a></td>
                                    </tr>';
                                }
                                } elseif($count == 0) {
                                    echo '
                                        <tfoot>
                                            <tr>
                                            <td colspan="4" style="font-size: 14px">No Records Found</td> 
                                            </tr>
                                        </tfoot>
                                    ';
                                } 
                            ?> 
                            <script>
                                function myFunction1() 
                                {
                                    var input, filter, table, tr, td, i, txtValue;
                                    input = document.getElementById("myInputSubmit");
                                    filter = input.value.toUpperCase();
                                    table = document.getElementById("myTableSubmit");
                                    tr = table.getElementsByTagName("tr");
                                    for (i = 0; i < tr.length; i++) 
                                    {
                                        td = tr[i].getElementsByTagName("td")[0];
                                        if (td) 
                                        {
                                            txtValue = td.textContent || td.innerText;
                                            if (txtValue.toUpperCase().indexOf(filter) > -1) 
                                            {
                                             tr[i].style.display = "";
                                            } else {
                                                tr[i].style.display = "none";
                                            }
                                        }       
                                    }
                                }
                            </script>        
                        </table>
                    </div>
                    <div class="panel" id="two-panel">
                        <div class="panel-title underlined-header-approved"><center>APPROVED IPCR</center></div>
                        <br>
                        <p><strong>Search professor</strong><input type="text" id="myInputApproved" onkeyup="myFunction2()" placeholder="i.e. Dela Cruz, Juan E." title="Type in a name"></p>
                        <table id="myTableApproved">
                            <thead>
                                <tr>
                                    
                                    <th width="30%"><h5 align="Left">Name</th></h5>
                                    <th width="30%"><h5 align="Left">Faculty Code</th></h5>
                                    <th width="15%"><h5 align="Left">Status</th></h5>
                                    <th width="20%"><h5 align="center">Action</th></h5> 
                                </tr>
                            </thead>
                            <?php
                             //Database approved
                                $sql = "SELECT tbl_evaluationfaculty.LName,tbl_evaluationfaculty.FName,tbl_evaluationfaculty.MName,tbl_ipcrstatus.* FROM tbl_evaluationfaculty LEFT JOIN tbl_ipcrstatus ON tbl_ipcrstatus.fcode = tbl_evaluationfaculty.FCode WHERE tbl_evaluationfaculty.Status = 'Active' AND tbl_ipcrstatus.year = '$y' AND tbl_ipcrstatus.month = '$m' AND tbl_ipcrstatus.status = 'Approved' ORDER BY tbl_evaluationfaculty.LName ASC";
                                $result = mysqli_query($conn,$sql);
                                $count = mysqli_num_rows($result);

                                if($count > 0) {
                                while($row = mysqli_fetch_array($result)) 
                                {
                                    $fcode = $row['fcode'];
                                    $fname = $row['FName'];
                                    $status = $row['status'];
                                    $mname = $row['MName'];
                                    $sname = $row['LName'];
                            
                                    echo '<tr>
                                        <td name="name" style="text-align: left;">'.$sname.", ".$fname." ".$mname.'</td>
                                        <td name="fcode" style="text-align: left;">'.$fcode.'</td>
                                        <td name="status" style="text-align: left;">'.$status.'</td>
                                        <td >
                                            <a href="index.php?r=administrator/IPCRviewprocess&status='.$status.'&fcode='.$fcode.'&m='.$m.'&y='.$y.'"><button type="submit" name="submit">View</button></a>
                                            <a href="index.php?r=administrator/IPCRform1&fcode='.$fcode.'&m='.$m.'&ye='.$y.'&fname='.$fname.'&mname='.$mname.'&sname='.$sname.'"><button type="submit" name="submit">PDF</button></a>
                                        </td>
                                    </tr>';
                                }
                                } elseif($count == 0) {
                                    echo '
                                        <tfoot>
                                            <tr>
                                            <td colspan="4" style="font-size: 14px">No Records Found</td> 
                                            </tr>
                                        </tfoot>
                                    ';
                                }
                            ?>  
                            <script>
                                function myFunction2() 
                                {
                                    var input, filter, table, tr, td, i, txtValue;
                                    input = document.getElementById("myInputApproved");
                                    filter = input.value.toUpperCase();
                                    table = document.getElementById("myTableApproved");
                                    tr = table.getElementsByTagName("tr");
                                    for (i = 0; i < tr.length; i++) 
                                    {
                                        td = tr[i].getElementsByTagName("td")[0];
                                        if (td) 
                                        {
                                            txtValue = td.textContent || td.innerText;
                                            if (txtValue.toUpperCase().indexOf(filter) > -1) 
                                            {
                                             tr[i].style.display = "";
                                            } else {
                                                tr[i].style.display = "none";
                                            }
                                        }       
                                    }
                                }
                            </script>      
                        </table>
                    </div>
                    <div class="panel" id="three-panel">
                        <div class="panel-title underlined-header-pending"><center>PENDING / ON REVIEW IPCR</center></div>
                        <br>
                        <p><strong>Search professor</strong><input type="text" id="myInputPending" onkeyup="myFunction3()" placeholder="i.e. Dela Cruz, Juan E." title="Type in a name"></p>
                        <table id="myTablePending">
                            <thead>
                                <tr>
                                    
                                    <th width="30%"><h5 align="Left">Name</th></h5>
                                    <th width="30%"><h5 align="Left">Faculty Code</th></h5>
                                    <th width="30%"><h5 align="Left">Status</th></h5>
                                    <th width="5%"><h5 align="center">Action</th></h5> 
                                </tr>
                            </thead>
                            <?php
                             //Database
                                $sql = "SELECT tbl_evaluationfaculty.LName,tbl_evaluationfaculty.FName,tbl_evaluationfaculty.MName,tbl_ipcrstatus.* FROM tbl_evaluationfaculty LEFT JOIN tbl_ipcrstatus ON tbl_ipcrstatus.fcode = tbl_evaluationfaculty.FCode WHERE tbl_evaluationfaculty.Status = 'Active' AND tbl_ipcrstatus.year = '$y' AND tbl_ipcrstatus.month = '$m' AND tbl_ipcrstatus.status = 'Pending' ORDER BY tbl_evaluationfaculty.LName ASC";
                                $result = mysqli_query($conn,$sql);
                                $count = mysqli_num_rows($result);

                                if($count > 0) {
                                while($row = mysqli_fetch_array($result)) 
                                {
                                    $fcode = $row['fcode'];
                                    $fname = $row['FName'];
                                    $status = $row['status'];
                                    $mname = $row['MName'];
                                    $sname = $row['LName'];
                            
                                    echo '<tr>
                                        <td name="name" style="text-align: left;">'.$sname.", ".$fname." ".$mname.'</td>
                                        <td name="fcode" style="text-align: left;">'.$fcode.'</td>
                                        <td name="status" style="text-align: left;">'.$status.'</td>
                                        <td><a href="index.php?r=administrator/IPCRviewprocess&status='.$status.'&fcode='.$fcode.'&m='.$m.'&y='.$y.'"><button type="submit" name="submit" style="width: 60px">View</button></a></td>
                                    </tr>';
                                }
                                } elseif($count == 0) {
                                    echo '
                                        <tfoot>
                                            <tr>
                                            <td colspan="4" style="font-size: 14px">No Records Found</td> 
                                            </tr>
                                        </tfoot>
                                    ';
                                }
                            ?>  
                            <script>
                                function myFunction3() 
                                {
                                    var input, filter, table, tr, td, i, txtValue;
                                    input = document.getElementById("myInputPending");
                                    filter = input.value.toUpperCase();
                                    table = document.getElementById("myTablePending");
                                    tr = table.getElementsByTagName("tr");
                                    for (i = 0; i < tr.length; i++) 
                                    {
                                        td = tr[i].getElementsByTagName("td")[0];
                                        if (td) 
                                        {
                                            txtValue = td.textContent || td.innerText;
                                            if (txtValue.toUpperCase().indexOf(filter) > -1) 
                                            {
                                             tr[i].style.display = "";
                                            } else {
                                                tr[i].style.display = "none";
                                            }
                                        }       
                                    }
                                }
                            </script>        
                         </table>
                    </div>
                    <div class="panel" id="four-panel">
                        <div class="panel-title underlined-header-unsubmitted"><center>UNSUBMITTED IPCR</center></div>
                        <br>
                        <p><a href="index.php?r=administrator/IPCRemailreminder<?php echo'&m='.$m.'&y='.$y.'';?>"><button>Send Reminder</button></a></p>
                        <table id="myTablePending">
                            <thead>
                                <tr>
                                    
                                    <th width="30%"><h5 align="Left">Name</th></h5>
                                    <th width="30%"><h5 align="Left">Faculty Code</th></h5>
                                    <th width="30%"><h5 align="center">Email</th></h5>
                                    <!-- <th width="5%"><h5 align="center">Action</th></h5>  -->
                                </tr>
                            </thead>
                            <?php
                             //Database
                                $sql = "SELECT tbl_evaluationfaculty.LName,tbl_evaluationfaculty.FName,tbl_evaluationfaculty.MName,tbl_evaluationfaculty.Email,tbl_ipcrstatus.* FROM tbl_evaluationfaculty LEFT JOIN tbl_ipcrstatus ON tbl_ipcrstatus.fcode = tbl_evaluationfaculty.FCode WHERE tbl_evaluationfaculty.Status = 'Active' AND tbl_ipcrstatus.year = '$y' AND tbl_ipcrstatus.month = '$m' AND tbl_ipcrstatus.status IS NULL ORDER BY tbl_evaluationfaculty.LName ASC";
                                $result = mysqli_query($conn,$sql);
                                $count = mysqli_num_rows($result);

                                if($count > 0) {
                                while($row = mysqli_fetch_array($result)) 
                                {
                                    $fcode = $row['fcode'];
                                    $fname = $row['FName'];
                                    $email = $row['Email'];
                                    $mname = $row['MName'];
                                    $sname = $row['LName'];
                            
                                    echo '<tr>
                                        <td name="name" style="text-align: left;">'.$sname.", ".$fname." ".$mname.'</td>
                                        <td name="fcode" style="text-align: left;">'.$fcode.'</td>
                                        <td name="email" style="text-align: left;">'.$email.'</td>
                                    </tr>';
                                }
                                } elseif($count == 0) {
                                    echo '
                                        <tfoot>
                                            <tr>
                                            <td colspan="4" style="font-size: 14px">No Records Found</td> 
                                            </tr>
                                        </tfoot>
                                    ';
                                }
                            ?>  
<!--                             <td name="status" style="text-align: left;">'.$status.'</td>
                                        <td><a href="index.php?r=administrator/IPCRviewprocess&status='.$status.'&fcode='.$fcode.'&m='.$m.'&y='.$y.'"><button type="submit" name="submit" style="width: 60px">View</button></a></td> -->        
                         </table>
                    </div>
                </div>
            </div>
            <!-- Sweetalert for can't access -->
            <?php if (isset($_GET['mess'])) : ?>
                <?php if($_GET['mess'] == 1) : ?>
                    <div class="flash-data" data-flashdata="<?= $_GET['mess']; ?>"></div>
                <?php endif; ?>

                <?php if($_GET['mess'] == 2) : ?>
                    <div class="flash-data" data-flashdata="<?= $_GET['mess']; ?>"></div>
                <?php endif; ?>

                <?php if($_GET['mess'] == 3) : ?>
                    <div class="flash-data" data-flashdata="<?= $_GET['mess']; ?>"></div>
                <?php endif; ?>
            <?php endif;?>



            
                <!-- <script src="js/preventresize.js"></script> -->
                <!-- Script function for searching -->
                <script>
                    
                    flashdata = $('.flash-data').data('flashdata')
                    if (flashdata == 1) {
                        Swal.fire(
                            'Faculty notify through email',
                            'Press OK to continue',
                            'success'
                        )
                    }

                    if (flashdata == 2) {
                        Swal.fire(
                            'Table is Empty, no one needs to remind',
                            'Press OK to continue',
                            'warning'
                        )
                    }  

                    if (flashdata == 3) {
                        Swal.fire(
                            'Email not sent',
                            'Press OK to continue',
                            'success'
                        )
                    }

                </script>          
        </div>
    </div>

</section>
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
        <section id=footer-left>
            © Copyright 2021 <a href="https://sites.google.com/view/puptfsis/ipcr/fsis2-team-members?authuser=0">Team Apex | PUP Taguig</a> - All Rights Reserved.
        </section>
    </div>
</footer>
</body>
</html>     