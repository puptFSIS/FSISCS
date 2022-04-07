<?php
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
<title>Welcome to FSIS | Home</title>
<!-- Page icon -->
<link href='puplogo.ico' rel='shortcut icon'/>
<!-- Stylesheets -->
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css">
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.3.0/css/fixedColumns.dataTables.css"> -->
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

.dataTables_filter {
   float: left !important;
}

.dataTables_filter input {
width: 300px;
} 

.modal-backdrop {
    /* bug fix - no overlay */    
    display: none;    
}

</style>

<link href='styles/print.css' media=print rel=stylesheet />
<!-- Modernizr library -->
<script src='scripts/libs/modernizr/modernizr.min.js'></script>
<meta charset="UTF-8"></head>
<body class='page-media page-sidebar-right'>
<!-- JS notice - will be displayed if javascript is disabled -->
<p id=jsnotice>Javascript is currently disabled. This site requires Javascript to function correctly. Please <a href="http://enable-javascript.com/">enable Javascript in your browser</a>!</p>
<!-- End - JS notice -->
<!-- Page header -->
<div id="GradientDiv" class="cssWLGradientCommon cssWLGradientIMG"></div>

<?php if (isset($_GET['mes'])) : ?>
    <?php if ($_GET['mes']==1): ?>
    <div class="flash-data" data-flashdata="<?= $_GET['mes']?>"></div>
    <?php endif;?>

    <?php if ($_GET['mes']==2): ?>
    <div class="flash-data" data-flashdata="<?= $_GET['mes']?>"></div>
    <?php endif;?>

    <?php if ($_GET['mes']==3): ?>
    <div class="flash-data" data-flashdata="<?= $_GET['mes']?>"></div>
    <?php endif;?>

    <?php if ($_GET['mes']==4): ?>
    <div class="flash-data" data-flashdata="<?= $_GET['mes']?>"></div>
    <?php endif;?>
<?php endif;?>

<!-- End - Page header -->

<!-- Page subheader -->

<!-- End - Page subheader -->
<!-- Page body -->
<section class=container-block id=page-body>
<div class=container-inner>
<!-- Page title -->
<?php include("headerMenu.php");?>
<!-- End - Page title -->
<!-- Page body content -->
<section id="page-body-content">
<div id="page-body-content-inner">
<!-- Page content -->
<div id="page-content">
<!-- Video - HTML5 -->
<section>
<h2 class=underlined-header>Getting Started with Extras</h2>

<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form id="annc" name="annc" action="index.php?r=administrator/SendSpecific" method="post">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color:black;">&times;</span>
            </button>
          <h4 class="modal-title" style="position: absolute; left: 5px;top: 5px;">Add Receipients</h4>
        </div>
        <div class="modal-body">
        <p id="result" style="position: absolute; top: 30px; left: 650px">Receipient/s Selected: 0</p>
        <table id = "ProfTable" class="table table-bordered table-striped table-hover" style="width:100%;">
            <thead style="display:none;">
                    <tr>
                        <td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"> </td>
                        <td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">NAME</td>
                    </tr>
            </thead>
            <tbody>
                <?php foreach ($fcode as $row): ?>
                    <?php if ($row['FCode'] != "" || !empty($row['FCode'])): ?>
                    <tr>
                        <td style="text-align: center;width: 50px;"><input style = "width: 17px; height: 17px;" type="checkbox" id = "checks" name="fcode1[]" value = "<?php echo $row['FCode']?>"></td>
                        <td style="text-align: center; text-transform: uppercase;"><input type="hidden" name="fcode2[]" value = "<?php echo $row['FCode']?>"><?php echo $row['LName'].", ".$row['FName']?></td>
                        
                    </tr>
                    <?php endif ?>
                    
                <?php endforeach; ?>                
                    
            </tbody>
        </table>

        </div>

        <div class="modal-footer">
          <input id = "sub" type="submit" name="Submit">
          </form>
        </div>
      </div>
      
    </div>
  </div>
</section>
<!-- End - Showcase gallery -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->
<aside class=page-sidebar>
<section class='widget-container widget-categories'>
<h2 class=widget-heading>Other</h2>
<div class=widget-content>
<ul class='widget-list categories-list'>

<li>
<a href='index.php?r=administrator/announcements'>Announcements</a>
<span class=widget-hint><a href='index.php?r=administrator/AnncNew'>New</a></span>
</li>

<li>
    <a href='index.php?r=administrator/newsandevents'>News &amp; Events</a>
<span class=widget-hint><a href='index.php?r=administrator/NwEvtNew'>New</a></span>
</li>


<details style = "padding-top: 6px; margin-left: 5px; margin-bottom: 5px;">
    <summary style="font-family: Helvetica;font-size: 12px;color: black;">Compose Email</summary>
    <li>
    <a href='index.php?r=administrator/messages'>Send to All Active Faculty Members</a>
    </li>

    <li>
    <a data-target='#myModal' data-toggle='modal' href='#myModal'>Send to Receipients</a>
    </li>

</details>


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
© Copyright 2011 <a href="#" title="Dbooom Themes">vCore Team | PUP Taguig</a> - All Rights Reserved.
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
<link href='scripts/libs/switcher/switcher.css' rel=stylesheet />

<!-- Scripts -->
<script src='assets/jquery-3.6.0.min.js'></script>
<script src='assets/sweetalert2.all.min.js'></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/datatables.min.js"></script>
<script id=js-dispatcher src='scripts/scripts.js'></script>

<!-- <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.3.0/js/dataTables.fixedColumns.js"></script> -->

<script>

    var inputs = document.getElementsByTagName('input');

    for (var i=0; i<inputs.length; i++)  {
      if (inputs[i].type == 'checkbox')   {
        inputs[i].checked = false;
      }
    }

    var table = $("#ProfTable").DataTable({
        "scrollY":        "50vh",
        "scrollCollapse": true,
        "paging":         false,
        "lengthChange": false,
        language: { 
        search: "", 
        searchPlaceholder: "Name:",
        emptyTable: "Subject/s are not available in this Curriculum.", },
        columnDefs: [ {
            orderable: false,
            targets:   0,
        } ],

    });


    var increment2=0; 
    $('input:checkbox').click(function () { 
        if (this.checked) {
            increment2++;                 
        } else {
            increment2--;
        }
        $('#result').html( 'Receipient/s Selected: ' + increment2 + '');             
    })

    $("#sub").on('click', function(e){
        table.destroy();
    });

    flashdata = $('.flash-data').data('flashdata')
    if(flashdata==1){
        Swal.fire({
            icon:'success',
            title:'Success!',
            text:'All Faculty were emailed!',
            timer: '4000'
        })
    }

    if(flashdata==2){
        Swal.fire({
            icon:'warning',
            title:'Ooops!',
            text:'Message was Not Sent!',
            timer: '4000'
        })
    }

    if(flashdata==3){
        Swal.fire({
            icon:'warning',
            title:'Ooops',
            text:'Message could not be sent. There are no active faculty and staff listed for the current year',
            timer: '4000'
        })
    }

    if(flashdata==4){
        Swal.fire({
            icon:'warning',
            title:'Ooops',
            text:'Please Select Receipients!',
            timer: '4000'
        })
    }
</script>
</body>
</html>
