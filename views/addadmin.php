<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('Please Login');
if($_SESSION['userRole']!=1) { exit("You aren't Admin");}
$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">

	<title>Signup with us!</title>


</head>
<body>
  <body style="background-color:#b76e79 ;">
  </body>
	<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.btn {
    background-color: DodgerBlue;
    border: none;
    color: white;
    padding: 12px 16px;
    font-size: 16px;
    cursor: pointer;
}

/* Darker background on mouse-over */
.btn:hover {
    background-color: RoyalBlue;
}
</style>
</head>
<body>

<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

button:hover {
    opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
    padding: 16px;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
</style>
<body>

<form action="<?php echo base_url();?>index.php/hello/addadmin" style="border:1px solid #ccc" method="post">
  <div class="container">
		<div align="center"><b><font color="#FFFFFF"><h1>Sign Up</h1></font></b></div>
		<font size="4"><p>Please fill in this form to create an account.</p></font>
    <hr>

     <label for="First Name"><b>First Name</b></label>
    <input type="text" placeholder="Enter your first name" name="FirstName" required>

    <label for="Surname"><b>Surname</b></label>
    <input type="text" placeholder="Enter your surname" name="Surname" required>

		<label for="Username"><b>Username</b></label>
		<input type="text" placeholder="Enter your surname" name="Username" required>

    <label for="Email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="Email" required>

    <label for="Password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="Password" required>

    <label for="Number"><b>Number</b></label>
    <input type="text" placeholder="Enter your phone number" name="Number" required>

<p> Please select your gender <p>
  <input type="radio" name="gender" value="male"> Male<br>
  <input type="radio" name="gender" value="female"> Female<br>
  <br>


    <div class="clearfix">
      <a href="<?php echo base_url();?>index.php/hello/adminpage" class="next"><button type="button" class="cancelbtn">Cancel</button>
			<a href="<?php echo base_url();?>index.php/hello/mysixthpage" class="next"><button type="submit" class="signupbtn">Sign Up</button> <b></a><br/></b></a></div>


    </div>
  </div>
</form>

</body>
</html>
