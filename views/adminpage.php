<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('Please Login');
if($_SESSION['userRole']!=1) { exit("You aren't Admin");}
$this->load->helper('url');


?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">

	<title>Your Profile</title>


</head>
<body>
  <body style="background-color:#301F0D;">
		<a href="<?php echo base_url();?>index.php/hello/"><button class="btn"><i class="fa fa-home"></i></button></a>

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
    background-color: #B85750;
    color: white;
}


/* Darker background on mouse-over */
.btn:hover {
    background-color: #B85750;


}
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=submit] {
    background-color: #e57373;
    color: white;
    padding: 15px 30px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #e57373;
}

.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
img {
		display: block;
		margin-left: auto;
		margin-right: auto;
}
button {
    background-color: #AF7B42;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}
</style>

<p></p>
<h1 style="text-align: center; color: #ffffff;">Welcome to your profile</span>🌷</h1>
<h1><i><font color="#FFFFFF"><span style="font-family: Gabriola, 'Freestyle Script', 'Brush Script MT'; font-weight: normal; font-style: normal; text-decoration: none;">"A reader lives a thousand lives before he dies, said Jojen. The man who never reads lives only one." -George R.R. Martin, A Dance with Dragons</font></span></font></i><h1/>
<img src="<?php echo base_url(); ?>images/12.jpg" width="1330"></body> <html>

<meta name="viewport" content="width=device-width, initial-scale=1">

<div align="center"><a href="<?php echo base_url();?>index.php/hello/showbooksbygenre/2"><img src="<?php echo base_url(); ?>images/romance 4.svg"width="120"></a>

<a href="<?php echo base_url();?>index.php/hello/showbooksbygenre/1"><img src="<?php echo base_url(); ?>images/science fiction 2.png"width="120"></a>

<a href="<?php echo base_url();?>index.php/hello/showbooksbygenre/3"><img src="<?php echo base_url(); ?>images/adventure 4.png"width="120"></a>

<a href="<?php echo base_url();?>index.php/hello/showbooksbygenre/4"><img src="<?php echo base_url(); ?>images/horror 3.png"width="120"></a>

<a href="<?php echo base_url();?>index.php/hello/showbooksbygenre/5"><img src="<?php echo base_url(); ?>images/comedy2.png"width="120"></a>

<a href="<?php echo base_url();?>index.php/hello/showbooksbygenre/6"><img src="<?php echo base_url(); ?>images/action 4.png"width="120"></a>

<a href="<?php echo base_url();?>index.php/hello/showbooksbygenre/7"><img src="<?php echo base_url(); ?>images/drama 7.png"width="120"></a></div>

<br>
	<font color="#FFFFFF"><font size="4"><p>Or search for a book by its name, ISBN, or author!</p></font>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


	<form class="searchform" action="<?php echo base_url(); ?>index.php/Hello/search_results" onsubmit= "return validation form()" method= "post">
	  <input type="text" placeholder="Search.." name="search">
		<select name="searchby">
			<option  value= "1">	Book Name </option>
			<option value= "2">	Book ISBN </option>
		  <option value= "3">	Book Author </option> </select>

	  <button type="submit"><i class="fa fa-search"></i></button>
	</form>
	<br>

  <div align="center"><a href="<?php echo base_url();?>index.php/hello/showallitems" class="next"><b>Show Books</a><br/></b></a></div><br>
	<div align="center"><a href="<?php echo base_url();?>index.php/hello/showallauthors" class="next"><b>Show Authors</a><br/></b></a></div><br>
	<div align="center"><a href="<?php echo base_url();?>index.php/hello/add_book" class="next"><b>Add Book</a><br/></b></a></div><br>
  <div align="center"><a href="<?php echo base_url();?>index.php/hello/add_author" class="next"><b>Add Author</a><br/></b></a></div><br>
	<div align="center"><a href="<?php echo base_url();?>index.php/hello/add_genre" class="next"><b>Add Genre</a><br/></b></a></div><br>
	<div align="center"><a href="<?php echo base_url();?>index.php/hello/showallmembers" class="next"><b>Show Members</a><br/></b></a></div><br>
	<div align="center"><a href="<?php echo base_url();?>index.php/hello/addadmin" class="next"><b>Add Admin</a><br/></b></a></div><br>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<br>
<b><div align="right"><a href="<?php echo base_url();?>index.php/Hello/logout"><b><input type="submit" value="Logout"></a><br/></b></div></b>

</body></html>
