<?php
session_start(); /*
if(isset($_SESSION['user'])) {
	if($_SESSION['user']==1) {

	} else if($_SESSION['user']==0) {
		header("location:index.php?r=faculty/");
	}
} else {
	header("location:index.php?r=site/");
} */
?>
<!DOCTYPE html>
<!--[if IE 7 ]> <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]> <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]> <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]> <!--> <html class=no-js lang=en> <!-- <![endif]-->
<head>

<!--[if IE ]> <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> <![endif]-->
<meta content='width=device-width, initial-scale=1.0' name=eviewport />
<meta content='FSIS' name=ekeywords />
<meta content='PUP Taguig FSIS' name=edescription />
<meta content='vCore Team' name=eauthor />
<!-- Page title -->
<title>Update | Educational Background</title>
<!-- Page icon -->
<link href='puplogo.ico' rel='shortcut icon'/>
<!-- Stylesheets -->
<style media=screen type='text/css'>@import "styles/base.css";
.cssLT #ut, .cssUT #ut{filter:progid:DXImageTransform.Microsoft.DropShadow(enabled=false);}
.cssWLGradientIMG{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMGSSL{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMG
{BACKGROUND-IMAGE: url(images/hd.jpg);BACKGROUND-REPEAT:repeat-x;top:0;height:105px;}</style>

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

<!-- End - Page header -->

<!-- Page subheader -->

<!-- End - Page subheader -->
<!-- Page body -->
<section class=container-block id=page-body>
<div class=container-inner>
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
<?php include("Geb.php");?>
<h2 class=underlined-header>Educational Background Update</h2>
<form id=eb action="index.php?r=faculty/processUpdateEB" method=POST>
<div class="underlined-header"><center><strong>Elementary</strong></center></div>
<p style="margin-bottom: 9px;">NAME OF SCHOOL:<textarea name=e1 style="width: 320px; margin-top: -28px; margin-left: 35%;"  ><?php echo $d1;?></textarea></p>
<p style="margin-bottom: 9px;">DEGREE COURSE:<input name=e2 type=text style="width: 320px; margin-top: -28px; margin-left: 35%;"  value='<?php echo $d2;?>'/></p>
<p style="margin-bottom: 9px;">YEAR GRADUATED:<select name=e3 type=text style="width: 90px; margin-top: -28px; margin-left: 35%;"  /><option><?php echo $d3;?></option></select></p>
<p style="margin-top: -37px; margin-left:53%;">UNITS EARNED:<input name=e4 type=text style="width: 100px; margin-top: -28px; margin-left: 40%;"  value='<?php echo $d4;?>'/></p>
<p style="margin-bottom: 9px;">INCLUSIVE DATE OF ATTENDANCE (FROM-TO):
<select name=e5 type=text style="width: 90px; margin-top: -28px; margin-left: 50%;" >
<option value='1955' >1955</option>
<option value='1956' >1956</option>
<option value='1957' >1957</option>
<option value='1958' >1958</option>
<option value='1959' >1959</option>
<option value='1960' >1960</option>
<option value='1961' >1961</option>
<option value='1962' >1962</option>
<option value='1963' >1963</option>
<option value='1964' >1964</option>
<option value='1965' >1965</option>
<option value='1966' >1966</option>
<option value='1967' >1967</option>
<option value='1968' >1968</option>
<option value='1969' >1969</option>
<option value='1970' >1970</option>
<option value='1971' >1971</option>
<option value='1972' >1972</option>
<option value='1973' >1973</option>
<option value='1974' >1974</option>
<option value='1975' >1975</option>
<option value='1976' >1976</option>
<option value='1977' >1977</option>
<option value='1978' >1978</option>
<option value='1979' >1979</option>
<option value='1980' >1980</option>
<option value='1981' >1981</option>
<option value='1982' >1982</option>
<option value='1983' >1983</option>
<option value='1984' >1984</option>
<option value='1985' >1985</option>
<option value='1986' >1986</option>
<option value='1987' >1987</option>
<option value='1988' >1988</option>
<option value='1989' >1989</option>
<option value='1990' >1990</option>
<option value='1991' >1991</option>
<option value='1992' >1992</option>
<option value='1993' >1993</option>
<option value='1994' >1994</option>
<option value='1995' >1995</option>
</select>
<select name=e6 type=text style="width: 90px; margin-top: -37px; margin-left: 67%;" >
<option value='1955' >1955</option>
<option value='1956' >1956</option>
<option value='1957' >1957</option>
<option value='1958' >1958</option>
<option value='1959' >1959</option>
<option value='1960' >1960</option>
<option value='1961' >1961</option>
<option value='1962' >1962</option>
<option value='1963' >1963</option>
<option value='1964' >1964</option>
<option value='1965' >1965</option>
<option value='1966' >1966</option>
<option value='1967' >1967</option>
<option value='1968' >1968</option>
<option value='1969' >1969</option>
<option value='1970' >1970</option>
<option value='1971' >1971</option>
<option value='1972' >1972</option>
<option value='1973' >1973</option>
<option value='1974' >1974</option>
<option value='1975' >1975</option>
<option value='1976' >1976</option>
<option value='1977' >1977</option>
<option value='1978' >1978</option>
<option value='1979' >1979</option>
<option value='1980' >1980</option>
<option value='1981' >1981</option>
<option value='1982' >1982</option>
<option value='1983' >1983</option>
<option value='1984' >1984</option>
<option value='1985' >1985</option>
<option value='1986' >1986</option>
<option value='1987' >1987</option>
<option value='1988' >1988</option>
<option value='1989' >1989</option>
<option value='1990' >1990</option>
<option value='1991' >1991</option>
<option value='1992' >1992</option>
<option value='1993' >1993</option>
<option value='1994' >1994</option>
<option value='1995' >1995</option>
</select></p>
<p style="margin-bottom: 9px;">SCHOLARSHIP/ACADEMIC HONORS RECEIVED:
<input name=e7 type=text style="width: 230px; margin-top: -28px; margin-left: 50%;"  value='<?php echo $d7;?>' /></p>
<hr style="margin-bottom:5px;"/>
<div class="underlined-header"><center><strong>Secondary</strong></center></div>
<p style="margin-bottom: 9px;">NAME OF SCHOOL:<textarea name=e8 style="width: 320px; margin-top: -28px; margin-left: 35%;"  ><?php echo $d8;?></textarea></p>
<p style="margin-bottom: 9px;">DEGREE COURSE:<input name=e9 type=text style="width: 320px; margin-top: -28px; margin-left: 35%;"  value='<?php echo $d9;?>'/></p>
<p style="margin-bottom: 9px;">YEAR GRADUATED:<select name=e10 type=text style="width: 90px; margin-top: -28px; margin-left: 35%;"  /><option><?php echo $d10;?></option></select></p>
<p style="margin-top: -37px; margin-left:53%;">UNITS EARNED:<input name=e11 type=text style="width: 100px; margin-top: -28px; margin-left: 40%;"  value='<?php echo $d11;?>'/></p>
<p style="margin-bottom: 9px;">INCLUSIVE DATE OF ATTENDANCE (FROM-TO):
<select name=e12 type=text style="width: 90px; margin-top: -28px; margin-left: 50%;" >
<option value='1955' >1955</option>
<option value='1956' >1956</option>
<option value='1957' >1957</option>
<option value='1958' >1958</option>
<option value='1959' >1959</option>
<option value='1960' >1960</option>
<option value='1961' >1961</option>
<option value='1962' >1962</option>
<option value='1963' >1963</option>
<option value='1964' >1964</option>
<option value='1965' >1965</option>
<option value='1966' >1966</option>
<option value='1967' >1967</option>
<option value='1968' >1968</option>
<option value='1969' >1969</option>
<option value='1970' >1970</option>
<option value='1971' >1971</option>
<option value='1972' >1972</option>
<option value='1973' >1973</option>
<option value='1974' >1974</option>
<option value='1975' >1975</option>
<option value='1976' >1976</option>
<option value='1977' >1977</option>
<option value='1978' >1978</option>
<option value='1979' >1979</option>
<option value='1980' >1980</option>
<option value='1981' >1981</option>
<option value='1982' >1982</option>
<option value='1983' >1983</option>
<option value='1984' >1984</option>
<option value='1985' >1985</option>
<option value='1986' >1986</option>
<option value='1987' >1987</option>
<option value='1988' >1988</option>
<option value='1989' >1989</option>
<option value='1990' >1990</option>
<option value='1991' >1991</option>
<option value='1992' >1992</option>
<option value='1993' >1993</option>
<option value='1994' >1994</option>
<option value='1995' >1995</option>
</select>
<select name=e13 type=text style="width: 90px; margin-top: -37px; margin-left: 67%;" >
<option value='1955' >1955</option>
<option value='1956' >1956</option>
<option value='1957' >1957</option>
<option value='1958' >1958</option>
<option value='1959' >1959</option>
<option value='1960' >1960</option>
<option value='1961' >1961</option>
<option value='1962' >1962</option>
<option value='1963' >1963</option>
<option value='1964' >1964</option>
<option value='1965' >1965</option>
<option value='1966' >1966</option>
<option value='1967' >1967</option>
<option value='1968' >1968</option>
<option value='1969' >1969</option>
<option value='1970' >1970</option>
<option value='1971' >1971</option>
<option value='1972' >1972</option>
<option value='1973' >1973</option>
<option value='1974' >1974</option>
<option value='1975' >1975</option>
<option value='1976' >1976</option>
<option value='1977' >1977</option>
<option value='1978' >1978</option>
<option value='1979' >1979</option>
<option value='1980' >1980</option>
<option value='1981' >1981</option>
<option value='1982' >1982</option>
<option value='1983' >1983</option>
<option value='1984' >1984</option>
<option value='1985' >1985</option>
<option value='1986' >1986</option>
<option value='1987' >1987</option>
<option value='1988' >1988</option>
<option value='1989' >1989</option>
<option value='1990' >1990</option>
<option value='1991' >1991</option>
<option value='1992' >1992</option>
<option value='1993' >1993</option>
<option value='1994' >1994</option>
<option value='1995' >1995</option>
</select>
</p>
<p style="margin-bottom: 9px;">SCHOLARSHIP/ACADEMIC HONORS RECEIVED:
<input name=e14 type=text style="width: 230px; margin-top: -28px; margin-left: 50%;"  value='<?php echo $d14;?>' /></p>
<hr style="margin-bottom:5px;"/>
<div class="underlined-header"><center><strong>Vocational</strong></center></div>
<p style="margin-bottom: 9px;">NAME OF SCHOOL:<textarea name=e15 style="width: 320px; margin-top: -28px; margin-left: 35%;"  ><?php echo $d15;?></textarea></p>
<p style="margin-bottom: 9px;">DEGREE COURSE:<input name=e16 type=text style="width: 320px; margin-top: -28px; margin-left: 35%;"  value='<?php echo $d16;?>'/></p>
<p style="margin-bottom: 9px;">YEAR GRADUATED:<select name=e17 type=text style="width: 90px; margin-top: -28px; margin-left: 35%;"  /><option><?php echo $d17;?></option></select></p>
<p style="margin-top: -37px; margin-left:53%;">UNITS EARNED:<input name=e18 type=text style="width: 100px; margin-top: -28px; margin-left: 40%;"  value='<?php echo $d18;?>'/></p>
<p style="margin-bottom: 9px;">INCLUSIVE DATE OF ATTENDANCE (FROM-TO):
<select name=e19 type=text style="width: 90px; margin-top: -28px; margin-left: 50%;" >
<option value='1955' >1955</option>
<option value='1956' >1956</option>
<option value='1957' >1957</option>
<option value='1958' >1958</option>
<option value='1959' >1959</option>
<option value='1960' >1960</option>
<option value='1961' >1961</option>
<option value='1962' >1962</option>
<option value='1963' >1963</option>
<option value='1964' >1964</option>
<option value='1965' >1965</option>
<option value='1966' >1966</option>
<option value='1967' >1967</option>
<option value='1968' >1968</option>
<option value='1969' >1969</option>
<option value='1970' >1970</option>
<option value='1971' >1971</option>
<option value='1972' >1972</option>
<option value='1973' >1973</option>
<option value='1974' >1974</option>
<option value='1975' >1975</option>
<option value='1976' >1976</option>
<option value='1977' >1977</option>
<option value='1978' >1978</option>
<option value='1979' >1979</option>
<option value='1980' >1980</option>
<option value='1981' >1981</option>
<option value='1982' >1982</option>
<option value='1983' >1983</option>
<option value='1984' >1984</option>
<option value='1985' >1985</option>
<option value='1986' >1986</option>
<option value='1987' >1987</option>
<option value='1988' >1988</option>
<option value='1989' >1989</option>
<option value='1990' >1990</option>
<option value='1991' >1991</option>
<option value='1992' >1992</option>
<option value='1993' >1993</option>
<option value='1994' >1994</option>
<option value='1995' >1995</option>
</select>
<select name=e20 type=text style="width: 90px; margin-top: -37px; margin-left: 67%;" >
<option value='1955' >1955</option>
<option value='1956' >1956</option>
<option value='1957' >1957</option>
<option value='1958' >1958</option>
<option value='1959' >1959</option>
<option value='1960' >1960</option>
<option value='1961' >1961</option>
<option value='1962' >1962</option>
<option value='1963' >1963</option>
<option value='1964' >1964</option>
<option value='1965' >1965</option>
<option value='1966' >1966</option>
<option value='1967' >1967</option>
<option value='1968' >1968</option>
<option value='1969' >1969</option>
<option value='1970' >1970</option>
<option value='1971' >1971</option>
<option value='1972' >1972</option>
<option value='1973' >1973</option>
<option value='1974' >1974</option>
<option value='1975' >1975</option>
<option value='1976' >1976</option>
<option value='1977' >1977</option>
<option value='1978' >1978</option>
<option value='1979' >1979</option>
<option value='1980' >1980</option>
<option value='1981' >1981</option>
<option value='1982' >1982</option>
<option value='1983' >1983</option>
<option value='1984' >1984</option>
<option value='1985' >1985</option>
<option value='1986' >1986</option>
<option value='1987' >1987</option>
<option value='1988' >1988</option>
<option value='1989' >1989</option>
<option value='1990' >1990</option>
<option value='1991' >1991</option>
<option value='1992' >1992</option>
<option value='1993' >1993</option>
<option value='1994' >1994</option>
<option value='1995' >1995</option>
</select>
</p>
<p style="margin-bottom: 9px;">SCHOLARSHIP/ACADEMIC HONORS RECEIVED:
<input name=e21 type=text style="width: 230px; margin-top: -28px; margin-left: 50%;"  value='<?php echo $d21;?>' /></p>
<hr style="margin-bottom:5px;"/>
<div class="underlined-header"><center><strong>College</strong></center></div>
<p style="margin-bottom: 9px;">NAME OF SCHOOL:<textarea name=e22 style="width: 320px; margin-top: -28px; margin-left: 35%;"  ><?php echo $d22;?></textarea></p>
<p style="margin-bottom: 9px;">DEGREE COURSE:<input name=e23 type=text style="width: 320px; margin-top: -28px; margin-left: 35%;"  value='<?php echo $d23;?>'/></p>
<p style="margin-bottom: 9px;">YEAR GRADUATED:<select name=e24 type=text style="width: 90px; margin-top: -28px; margin-left: 35%;"  /><option><?php echo $d24;?></option></select></p>
<p style="margin-top: -37px; margin-left:53%;">UNITS EARNED:<input name=e25 type=text style="width: 100px; margin-top: -28px; margin-left: 40%;"  value='<?php echo $d25;?>'/></p>
<p style="margin-bottom: 9px;">INCLUSIVE DATE OF ATTENDANCE (FROM-TO):
<select name=e26 type=text style="width: 90px; margin-top: -28px; margin-left: 50%;" >
<option value='1955' >1955</option>
<option value='1956' >1956</option>
<option value='1957' >1957</option>
<option value='1958' >1958</option>
<option value='1959' >1959</option>
<option value='1960' >1960</option>
<option value='1961' >1961</option>
<option value='1962' >1962</option>
<option value='1963' >1963</option>
<option value='1964' >1964</option>
<option value='1965' >1965</option>
<option value='1966' >1966</option>
<option value='1967' >1967</option>
<option value='1968' >1968</option>
<option value='1969' >1969</option>
<option value='1970' >1970</option>
<option value='1971' >1971</option>
<option value='1972' >1972</option>
<option value='1973' >1973</option>
<option value='1974' >1974</option>
<option value='1975' >1975</option>
<option value='1976' >1976</option>
<option value='1977' >1977</option>
<option value='1978' >1978</option>
<option value='1979' >1979</option>
<option value='1980' >1980</option>
<option value='1981' >1981</option>
<option value='1982' >1982</option>
<option value='1983' >1983</option>
<option value='1984' >1984</option>
<option value='1985' >1985</option>
<option value='1986' >1986</option>
<option value='1987' >1987</option>
<option value='1988' >1988</option>
<option value='1989' >1989</option>
<option value='1990' >1990</option>
<option value='1991' >1991</option>
<option value='1992' >1992</option>
<option value='1993' >1993</option>
<option value='1994' >1994</option>
<option value='1995' >1995</option>
</select>
<select name=e27 type=text style="width: 90px; margin-top: -37px; margin-left: 67%;" >
<option value='1955' >1955</option>
<option value='1956' >1956</option>
<option value='1957' >1957</option>
<option value='1958' >1958</option>
<option value='1959' >1959</option>
<option value='1960' >1960</option>
<option value='1961' >1961</option>
<option value='1962' >1962</option>
<option value='1963' >1963</option>
<option value='1964' >1964</option>
<option value='1965' >1965</option>
<option value='1966' >1966</option>
<option value='1967' >1967</option>
<option value='1968' >1968</option>
<option value='1969' >1969</option>
<option value='1970' >1970</option>
<option value='1971' >1971</option>
<option value='1972' >1972</option>
<option value='1973' >1973</option>
<option value='1974' >1974</option>
<option value='1975' >1975</option>
<option value='1976' >1976</option>
<option value='1977' >1977</option>
<option value='1978' >1978</option>
<option value='1979' >1979</option>
<option value='1980' >1980</option>
<option value='1981' >1981</option>
<option value='1982' >1982</option>
<option value='1983' >1983</option>
<option value='1984' >1984</option>
<option value='1985' >1985</option>
<option value='1986' >1986</option>
<option value='1987' >1987</option>
<option value='1988' >1988</option>
<option value='1989' >1989</option>
<option value='1990' >1990</option>
<option value='1991' >1991</option>
<option value='1992' >1992</option>
<option value='1993' >1993</option>
<option value='1994' >1994</option>
<option value='1995' >1995</option>
</select>
</p>
<p style="margin-bottom: 9px;">SCHOLARSHIP/ACADEMIC HONORS RECEIVED:
<input name=e28 type=text style="width: 230px; margin-top: -28px; margin-left: 50%;"  value='<?php echo $d28;?>' /></p>
<hr style="margin-bottom:5px;"/>
<div class="underlined-header"><center><strong>Graduate Studies</strong></center></div>
<p style="margin-bottom: 9px;">NAME OF SCHOOL:<textarea name=e29 style="width: 320px; margin-top: -28px; margin-left: 35%;"  ><?php echo $d29;?></textarea></p>
<p style="margin-bottom: 9px;">DEGREE COURSE:<input name=e30 type=text style="width: 320px; margin-top: -28px; margin-left: 35%;"  value='<?php echo $d30;?>'/></p>
<p style="margin-bottom: 9px;">YEAR GRADUATED:<select name=e31 type=text style="width: 90px; margin-top: -28px; margin-left: 35%;"  /><option><?php echo $d31;?></option></select></p>
<p style="margin-top: -37px; margin-left:53%;">UNITS EARNED:<input name=e32 type=text style="width: 100px; margin-top: -28px; margin-left: 40%;"  value='<?php echo $d32;?>'/></p>
<p style="margin-bottom: 9px;">INCLUSIVE DATE OF ATTENDANCE (FROM-TO):
<select name=e33 type=text style="width: 90px; margin-top: -28px; margin-left: 50%;" >
<option value='1955' >1955</option>
<option value='1956' >1956</option>
<option value='1957' >1957</option>
<option value='1958' >1958</option>
<option value='1959' >1959</option>
<option value='1960' >1960</option>
<option value='1961' >1961</option>
<option value='1962' >1962</option>
<option value='1963' >1963</option>
<option value='1964' >1964</option>
<option value='1965' >1965</option>
<option value='1966' >1966</option>
<option value='1967' >1967</option>
<option value='1968' >1968</option>
<option value='1969' >1969</option>
<option value='1970' >1970</option>
<option value='1971' >1971</option>
<option value='1972' >1972</option>
<option value='1973' >1973</option>
<option value='1974' >1974</option>
<option value='1975' >1975</option>
<option value='1976' >1976</option>
<option value='1977' >1977</option>
<option value='1978' >1978</option>
<option value='1979' >1979</option>
<option value='1980' >1980</option>
<option value='1981' >1981</option>
<option value='1982' >1982</option>
<option value='1983' >1983</option>
<option value='1984' >1984</option>
<option value='1985' >1985</option>
<option value='1986' >1986</option>
<option value='1987' >1987</option>
<option value='1988' >1988</option>
<option value='1989' >1989</option>
<option value='1990' >1990</option>
<option value='1991' >1991</option>
<option value='1992' >1992</option>
<option value='1993' >1993</option>
<option value='1994' >1994</option>
<option value='1995' >1995</option>
</select>
<select name=e34 type=text style="width: 90px; margin-top: -37px; margin-left: 67%;" >
<option value='1955' >1955</option>
<option value='1956' >1956</option>
<option value='1957' >1957</option>
<option value='1958' >1958</option>
<option value='1959' >1959</option>
<option value='1960' >1960</option>
<option value='1961' >1961</option>
<option value='1962' >1962</option>
<option value='1963' >1963</option>
<option value='1964' >1964</option>
<option value='1965' >1965</option>
<option value='1966' >1966</option>
<option value='1967' >1967</option>
<option value='1968' >1968</option>
<option value='1969' >1969</option>
<option value='1970' >1970</option>
<option value='1971' >1971</option>
<option value='1972' >1972</option>
<option value='1973' >1973</option>
<option value='1974' >1974</option>
<option value='1975' >1975</option>
<option value='1976' >1976</option>
<option value='1977' >1977</option>
<option value='1978' >1978</option>
<option value='1979' >1979</option>
<option value='1980' >1980</option>
<option value='1981' >1981</option>
<option value='1982' >1982</option>
<option value='1983' >1983</option>
<option value='1984' >1984</option>
<option value='1985' >1985</option>
<option value='1986' >1986</option>
<option value='1987' >1987</option>
<option value='1988' >1988</option>
<option value='1989' >1989</option>
<option value='1990' >1990</option>
<option value='1991' >1991</option>
<option value='1992' >1992</option>
<option value='1993' >1993</option>
<option value='1994' >1994</option>
<option value='1995' >1995</option>
</select>
</p>
<p style="margin-bottom: 9px;">SCHOLARSHIP/ACADEMIC HONORS RECEIVED:
<input name=e35 type=text style="width: 230px; margin-top: -28px; margin-left: 50%;"  value='<?php echo $d35;?>' /></p>
<hr /><p><center>
<input type=submit value='Save Changes' /></center>
</p>
</form>
</section>
<!-- End - Video -HTML5 -->
<br/>

<!-- End - Showcase gallery -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->
<aside class=page-sidebar>
<section class='widget-container widget-categories'>
<h2 class=widget-heading>Profile</h2>
<div class=widget-content>
<ul class='widget-list categories-list'>
<?php include("profileMenu.php");?>
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

<img alt='Asset 4' data-color='#D64333' src='assets/backgrounds/4.jpg.pagespeed.ce.AV4Gchw-qN.jpg' width=1500 height=1064 />

</div>
<!-- End - Theme backgrounds -->
<link href='scripts/libs/switcher/switcher.css' rel=stylesheet />

<!-- Scripts -->
<script id=js-dispatcher src='scripts/scripts.js'></script>
</body>
</html>
