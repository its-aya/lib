<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">

	<title>Welcome to Esenyurt's Library</title>


</head>
<body>
  <body style="background-color:#916B49;">

<script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>

<body onload="startTime()">

<div id="txt"></div>


<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
a {
    text-decoration: none;
    display: inline-block;
    padding: 8px 16px;
}

a:hover {
    background-color: #ddd;
    color: black;
}



.next {
    background-color: #F0866E;
    color: white;
}
img {
    display: block;
    margin-left: auto;
    margin-right: auto;
}

</style>

<div align="right"><a href="<?php echo base_url();?>index.php/admin/myfourthpage" class="next">Contact us &raquo;</a></div>

<h1 style="text-align: center; color: #ffffff;">Welcome to Esenyurt's Library</span>🌷</h1>
<h1><i><font color="#FFFFFF"><span style="font-family: Gabriola, 'Freestyle Script', 'Brush Script MT'; font-weight: normal; font-style: normal; text-decoration: none;">"A reader lives a thousand lives before he dies, said Jojen. The man who never reads lives only one." -George R.R. Martin, A Dance with Dragons</font></span></font></i><h1/>
<img src="<?php echo base_url(); ?>images/7.jpg" width="1200"></body> <html>

<meta name="viewport" content="width=device-width, initial-scale=1">

<font color="#FFFFFF"><h3>New here? Create an account to become a member and enjoy our wide book varieties!</h3></font>
<div align="right"><a href="<?php echo base_url();?>index.php/hello/signuprequest" class="next"><b>Signup &raquo;</a><br/></b></a></div> <br>
<div align="right"><a href="<?php echo base_url();?>index.php/hello/mythirdpage" class="next"><b>Login</a><br/></b></a></div><br><br>



</body>
</html>
