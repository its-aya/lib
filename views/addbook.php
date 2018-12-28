<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('Please Login');
if($_SESSION['userRole']!=1) { exit("You aren't Admin");}
$this->load->helper('url');


?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">

	<title>Add Book</title>
	<script type="text/javascript">
		   <!--
		      // Form validation code will come here.
		      function validateForm()
		      {

		        // if( document.forms["additem"]["ISBN"].value == "" )
		        // {
		            //( "Please provide Book ISBN!" );
		           // return false;
		         //}

		         if( document.forms["additem"]["Title"].value == "" )
		         {
		            alert( "Please provide Book Title!" );
		            return false;
							}
							if( document.forms["additem"]["ISBN"].value == "" )
							{
								 alert( "Please provide Book ISBN!" );
								 return false;
							 }
						 if( document.forms["additem"]["Edition_Num"].value == "" )
						 {
								 alert( "Please provide Book Edition!" );
								 return false;
							 }
						 if( document.forms["additem"]["No_Of_Pages"].value == "" )
								 {
								 alert( "Please provide Book No_Of_Pages!" );
								 		return false;
									}
						 if( document.forms["additem"]["No_Of_Copies"].value == "" )
								{
									alert( "Please provide No_Of_Copies!" );
												return false;
							}
						 if( document.forms["additem"]["Best_Of_Collection"].value == "" )
								{
									alert( "Please say if Book is in the Best_Of_Collection!" );
													return false;
							}
						if( document.forms["additem"]["Rating"].value == "" )
								{
									alert( "Please provide Book Rating!" );
																return false;
								}
						if( document.forms["additem"]["Print_Date"].value == "" )
						{
								 alert( "Please provide Book Print_Date!" );
																	return false;
							}
						if( document.forms["additem"]["Publishing_Date"].value == "" )
									{
									 alert( "Please provide Book Publishing_Date!" );
																				return false;
		         }

		      }
		   //-->
		</script>

</head>
<body>

	<body style="background-color:#65DEAD ;">

		<h1 style="text-align: center; color: #ffffff;">Add Book</h1>
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


			<form name="additem" action="<?php echo base_url(); ?>index.php/hello/add_book_result" onsubmit="return validateForm()" method="post">
			 ISBN : <input type="text" name="ISBN"><br>
			 Title : <input type="text" name="Title"><br>
			 Number Of Pages : <input type="text" name="No_Of_Pages"><br>
			 Number Of Copies : <input type="text" name="No_Of_Copies"><br>

			 Best Of Collection (State if 'Yes' or 'No') : <input type="text" name="Best_Of_Collection"><br>
			 Publishing Date : <input type="date" name="Publishing_Date"><br>
			 Rating (1 to 10) : <input type="text" name="Rating"><br>
			 Edition number : <input type="Text" name="Edition_Num"><br>
			 Print Date : <input type="date" name="Print_Date"><br>


			<?php


			 echo '<br><br> Authors <br>';

			 foreach ($authorslist as $authors)
			 {
				 echo '<input type="checkbox" name="authors[]" value="'.$authors->Author_ID.'"> '.$authors->Author_Name.'<br>';
			 }

			 echo '<br><br> Genres <br>';

			 foreach ($genreslist as $genres)
			 {
				 echo '<input type="checkbox" name="genres[]" value="'.$genres->Genre_ID.'"> '.$genres->Genre.'<br>';
			 }
			 echo '<br><br> Format <br>';

			foreach ($formatslist as $format)
			{
				echo '<input type="checkbox" name="format[]" value="'.$format->Format_ID.'"> '.$format->Format_Type.'<br>';
			}


			  echo'  <input type="submit" value="Submit">
			  </form>';

		?>
<br>
<br>
<b><div align="right"><a href="<?php echo base_url();?>index.php/Hello/adminpage"><b><input type="submit" value="Go Back to Admin Page"></a><br/></b></div></b>









</body>
</html>
