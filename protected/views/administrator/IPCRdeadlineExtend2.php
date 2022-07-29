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
<title>IPCR | Deadline Extension</title>

<!-- Script for Modal -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

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
    height: 50px;
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

/**/

#page-body
{
    background-color: antiquewhite;
}

.disabled{
  pointer-events: none;
  cursor: not-allowed;
  opacity: 0.65;
  filter: alpha(opacity=65);
  -webkit-box-shadow: none;
  box-shadow: none;
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

a.button:hover {
    color: green;
}

div.modal-body {

}
</style>

<link href='styles/print.css' media=print rel=stylesheet />
<!-- Modernizr library -->
<script src='scripts/libs/modernizr/modernizr.min.js'></script>
<meta charset="UTF-8"></head>
<body class='page-media page-sidebar-right' style="background-color: ghostwhite;" >
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

<h2 class=underlined-header><center>Individual Performance, Commitment and Review</center></h2>

<!---->
<?php
    

    if(isset($_GET['m'],$_GET['y']))
    {
        $m = $_GET['m'];
        $y = $_GET['y'];
    }
    //$sql="SELECT tbl_ipcr1.*,tbl_ipcraccomp.* FROM tbl_ipcr1 LEFT JOIN tbl_ipcraccomp ON tbl_ipcraccomp.id_ipcr1 = tbl_ipcr1.id AND tbl_ipcraccomp.FCode = $fcode WHERE tbl_ipcr1.year = $y AND tbl_ipcr1.deleted_on IS NULL ORDER BY tbl_ipcr1.id, tbl_ipcraccomp.id_ipcr1 ASC";

?>

    <div class="main_container" onload="makeTableScroll();">
        <div class="scrollingTable">
                <br>
                <?php if($m == "JJ") : ?>
                    <h3><strong>List of Faculty IPCR Deadlines <?php echo '(January to June, '.$y.' IPCR)';?></strong></h3>
                <?php else : ?>
                    <h3><strong>List of Faculty IPCR Deadlines <?php echo '(July to December, '.$y.' IPCR)';?></strong></h3>
                <?php endif; ?>
                <br>
                <!--  Uploaded File list -->
                
                <p><strong>Search professor</strong><input type="text" id="myInput" onkeyup="myFunction()" placeholder="i.e. Dela Cruz, Juan E." title="Type in a name"></p>
                <!-- <p><strong>Note: Only APPROVE IPCR Will be seen on the List.</strong></p> -->
                <table id="myTable">
                    <thead>
                        <tr>
                            <th width="30%"><h5 align="Left">Name</th></h5>
                            <th width="30%"><h5 align="Left">Faculty Code</th></h5>
                            <th width="30%"><h5 align="center">Deadline</th></h5>
                            <th width="5%"><h5 align="center">Action</th></h5> 
                        </tr>
                    </thead>
                    <?php
                     //Database
                        $sql = "SELECT tbl_evaluationfaculty.*,tbl_ipcrstatus.* FROM tbl_evaluationfaculty LEFT JOIN tbl_ipcrstatus ON tbl_ipcrstatus.fcode = tbl_evaluationfaculty.FCode WHERE tbl_evaluationfaculty.status = 'Active' AND tbl_ipcrstatus.year='$y' AND tbl_ipcrstatus.month = '$m' ORDER BY tbl_evaluationfaculty.LName ASC";
                        $result = mysqli_query($conn,$sql);
                        $count = mysqli_num_rows($result);

                    ?>
                    <?php if($count > 0): ?> 
                        <?php while($row = mysqli_fetch_array($result)) : ?>
                        
                            <?php
                                $fcode = $row['FCode'];
                                $fname = $row['FName'];
                                $status = $row['status'];
                                $mname = $row['MName'];
                                $sname = $row['LName'];
                                $dlinedt = $row['dline_date'];
                            ?> 
                              
                            <tbody>             
                                <tr>
                                    <td name="name" style="text-align: left;"><?= $row['LName'],", ", $row['FName']," ",$row['MName']?></td>
                                    <td name="fcode" style="text-align: left;"><?= $row['FCode']?></td>
                                    <td name="status" style="text-align: center;"><?= $row['dline_date']?></td>
                                    <?php if($m == "JJ") : ?>
                                            <td><button data-toggle="modal" data-target="#ModalCenter" style="width: 120px">Extend Deadline</button></td>
                                    <?php else : ?>
                                            <td><button data-toggle="modal" data-target="#ModalCenter" style="width: 120px">Extend Deadline</button></td>
                                    <?php endif; ?>
                                </tr>
                            </tbody>
                            <?php endwhile; ?>
                    <?php elseif($count == 0): ?>
                            <tfoot>
                                <tr>
                                    <td colspan="4" style="font-size: 14px">No Records Found</td> 
                                </tr>
                            </tfoot>
                    <?php endif ?>
                </table> 

            <!-- Modal for deadline Extension -->
             <div class="modal fade" id="ModalCenter">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <form action="index.php?r=administrator/IPCRdeadlineExtend" method="post">
                        <input type="hidden" name="month" value="<?php echo $m; ?>">
                        <input type="hidden" name="year" value="<?php echo $y; ?>">
                        <input type="hidden" name="fcode" value="<?php echo $fcode; ?>">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><strong>EXTEND FACULTY DEADLINE</strong></h5>
                      </div>
                      <div class="modal-body">
                        <center><input id="date" type="date" name="dlinedatetime" required></center>
                      </div>
                      <div class="modal-footer">
                        <button id="btn-modal" data-dismiss="modal">Close</button>
                        <button  id="btn-modal" name="submit" type="submit">Extend</button>
                      </div>
                      </form>
                    </div>
                  </div>
            </div>

            <!-- Sweetalert for can't access -->
            <?php if(isset($_GET['mess'])) : ?>

                <?php if($_GET['mess'] == 1) : ?>
                    <div class="flash-data" data-flashdata="<?= $_GET['mess']; ?>"></div>
                <?php endif; ?>

            <?php endif; ?>


            <!-- Script function for searching -->
                <script>
                    function myFunction() 
                    {
                        var input, filter, table, tr, td, i, txtValue;
                        input = document.getElementById("myInput");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("myTable");
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
 
                    flashdata = $('.flash-data').data('flashdata')
                    if (flashdata == 1) {
                        Swal.fire(
                            'Deadline Extended',
                            'Press ok to continue',
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
            © Copyright 2021 <a href="https://sites.google.com/view/puptfsis/ipcr/fsis2-team-members?authuser=0" title="Dev Team">Team Apex | PUP Taguig</a> - All Rights Reserved.
        </section>
    </div>
</footer>
</body>
</html>     