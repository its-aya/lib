<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('Please Login');
if($_SESSION['userRole']!=1) { exit("You aren't Admin");}
$this->load->helper('url');


?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">

	<title>Add Author</title>


</head>
<body>

	<body style="background-color:#65DEAD ;">

    <h1 style="text-align: center; color: #ffffff;">Add Author</h1>
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
		    background-color: RoyalBlue;


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
		</style>
  <?php
  if(isset($result))
  {
    echo "Author added successfully";
  }
  else{
    echo '<form name="addauthor" action="'. base_url().'index.php/hello/add_author" onsubmit="return validateForm()" method="post">
    Author Name: <br> <input type="text" name= "Author_Name"><br><br>';
    echo '<input type="submit" value="Submit">
    </form>';
  }
  ?>
<b><div align="right"><a href="<?php echo base_url();?>index.php/Hello/adminpage"><b><input type="submit" value="Go Back to Admin Page"></a><br/></b></div></b>
</body>
</html>
