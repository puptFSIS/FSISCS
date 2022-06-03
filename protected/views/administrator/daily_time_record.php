<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if(isset($_SESSION['user'])) {
    if($_SESSION['user']==1) {
    } else if($_SESSION['user']==0) {
        header("location:index.php?r=faculty/");
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
<title>Reports | Home</title>
<!-- Page icon --> 
<link href='puplogo.ico' rel='shortcut icon'/>
<!-- Stylesheets -->
<style media=screen type='text/css'>@import "styles/base.css";
.cssLT #ut, .cssUT #ut{filter:progid:DXImageTransform.Microsoft.DropShadow(enabled=false);}
.cssWLGradientIMG{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMGSSL{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMG
{BACKGROUND-IMAGE: url(images/hd_tm1.png);BACKGROUND-REPEAT:repeat-x;top:0;height:105px;}
    
#page-title
{
    background-color: black;
    padding: 5px 5px 5px;
    height: 48px;
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
    text-align: center;
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
<body >
<!-- JS notice - will be displayed if javascript is disabled -->
    <p id=jsnotice>Javascript is currently disabled. This site requires Javascript to function correctly. Please <a href="http://enable-javascript.com/">enable Javascript in your browser</a>!</p>
    <!-- End - JS notice -->
    <!-- Page header -->
    <div id="GradientDiv" class="cssWLGradientCommon cssWLGradientIMG"></div>

    <!-- End - Page header -->

    <!-- Page subheader -->

    <!-- End - Page subheader -->
    <!-- Page body -->
        <!-- <section class=container-block id=page-body>
        <div class=container-inner> -->
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
            
            include("getPersonalInformation.php");

            
            // if($preview_value === 1)
            // {
            //     include("dtr_months.php");
            //     
            // }
            if($preview_value === 0)
            {
                 

            echo "<h2 class=underlined-header>Daily Time Record</h2>";
            include("getPersonalInformation.php");
            include("getRole.php");
            include("dtr_menu.php");
            include("dtr_form.php");
            }
            if($preview_value===1)
            {
            

            echo "<h2 class=underlined-header>List of Created Daily Time Records</h2>";
            include("getPersonalInformation.php");
            include("getRole.php");
            include("dtr_menu.php");
            include("Dtr_Table_2.php");
            }
            if($preview_value===2)
            {
                 

            echo "<h2 class=underlined-header>Daily Time Record Validation</h2>";
            include("getPersonalInformation.php");
            include("getRole.php");
            include("dtr_menu.php");
            include("HAP_Dtr_Table.php");
            }
            if($preview_value===3)
            {
            

            echo "<h2 class=underlined-header>End of the month form</h2>";
            include("getPersonalInformation.php");
            include("getRole.php");
            include("dtr_menu.php");
            // include("HAP_Secretary_table.php"); luma
            include("EOTM_form.php"); // bago
            }
            if($preview_value===4)
            {
                 

            echo "<h2 class=underlined-header>List of Faculty Members</h2>";
            include("getPersonalInformation.php");
            include("getRole.php");
            include("dtr_menu.php");
            // include("HAP_Secretary_table.php"); luma
            include("list_of_faculty_members.php"); // bago
            }
           
            if($preview_value===5)
            {

            echo "<h2 class=underlined-header>Reminder</h2>";
             include("getPersonalInformation.php");
            include("getRole.php");
            include("dtr_menu.php");

            // include("HAP_Dtr_Table.php");
            }
         ?>
        <?php 
           
        ?>

        </section>
        <!-- End - Showcase gallery -->
        </div>
        <!-- End - Page content -->
        <!-- Page sidebar -->
        <aside class=page-sidebar>
        <section class='widget-container widget-categories'>
        <?php
        if($preview_value===0)
        {
        // echo '<h2 class=widget-heading>Generate Daily Time Reports</h2>';
        }
        if($preview_value===1)
        {
        // echo '<h2 class=widget-heading></h2>';
        }
        ?>
        <div class=widget-content>
        

        



        
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
    � Copyright 2011 <a href="#" title="Dbooom Themes">vCore Team | PUP Taguig</a> - All Rights Reserved.
    </section>
    <!-- End - Footer left -->
    <!-- Footer right -->
    <section id=footer-right>
    <ul class=footer-navigation>
    <li>
    <a href='http://www.puptaguig.org' title=Home>Home</a>
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
    <!-- <link href='scripts/libs/switcher/switcher.css' rel=stylesheet /> -->

    <!-- Scripts -->
    <script>
        // window.onload = function()
        // {
        //     alert("pogi aq");
        // };


        ////////////////////

        // window.onload = function() {
        //     var today = new Date();   
        //     var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        //     var month = today.getMonth()+1
        //     var year = today.getFullYear();
        //     var day = today.getDate();
        //     var getDaysInMonth = function(month,year) {
        //      return new Date(year, month, 0).getDate()
        //     };

        //     if(getDaysInMonth(month,year) === day)
        //     {
        //         alert(" Today is "+date+" Generate and print your DTR now ");

        //     }
        // };
    </script>
    <script id=js-dispatcher src='scripts/scripts.js'></script>
    
</body>
</html>
