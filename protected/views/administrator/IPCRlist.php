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
<body class='page-media page-sidebar-right' style="background-color: Black;" >
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
                <!--  Uploaded File list -->
                
                <p><strong>Search professor</strong><input type="text" id="myInput" onkeyup="myFunction()" placeholder="i.e. Dela Cruz, Juan E." title="Type in a name"></p>
                <table id="myTable">
                    <thead>
                        <tr>
                            
                            <th width="30%"><h5 align="Left">Name</th></h5>
                            <th width="30%"><h5 align="Left">Faculty Code</th></h5>
                            <th width="30%"><h5 align="Left">Status</th></h5>
                            <th width="5%"><h5 align="Left">Action</th></h5> 
                        </tr>
                    </thead>
                    <?php
                     //Database
                        $sql = "SELECT tbl_evaluationfaculty.*,tbl_ipcrstatus.status FROM tbl_evaluationfaculty LEFT JOIN tbl_ipcrstatus ON tbl_ipcrstatus.fcode = tbl_evaluationfaculty.FCode WHERE tbl_evaluationfaculty.Status = 'Active' AND tbl_ipcrstatus.year='$y' AND tbl_ipcrstatus.month = '$m' ORDER BY tbl_evaluationfaculty.LName ASC";
                        $result = mysqli_query($conn,$sql);

                        while($row = mysqli_fetch_array($result)) 
                        {
                            $fcode = $row['FCode'];
                            $fname = $row['FName'];
                            $status = $row['status'];
                            $mname = $row['MName'];
                            $sname = $row['LName'];
                    
                            echo '<tr>
                                <td name="name" style="text-align: left;">'.$sname.", ".$fname." ".$mname.'</td>
                                <td name="fcode" style="text-align: left;">'.$fcode.'</td>
                                <td name="status" style="text-align: left;">'.$status.'</td>
                                <td><a href="index.php?r=administrator/IPCRviewprocess&status='.$status.'&fcode='.$fcode.'&m='.$m.'&y='.$y.'"><button type="submit" name="submit" style="width: 100px">View IPCR</button></a></td>
                            </tr>';
                        }
                    ?>        
            </table> 
            <!-- Sweetalert for can't access -->
            <?php if(isset($_GET['a'])) : ?>
                <div class="flash-data" data-flashdata="<?= $_GET['a']; ?>"></div>
            <?php endif; ?>


            <!-- Script function for searching -->
                <script src="js/preventresize.js"></script>
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
 
                    const flashdata = $('.flash-data').data('flashdata')
                    if (flashdata) {
                        Swal.fire(
                            'IPCR is not yet submitted.',
                            'You cannot access at the moment.',
                            'warning'
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