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

		         if( document.forms["update"]["Title"].value == "" )
		         {
		            alert( "Please provide Book Title!" );
		            return false;
							}
							if( document.forms["update"]["ISBN"].value == "" )
							{
								 alert( "Please provide Book ISBN!" );
								 return false;
							 }
						 if( document.forms["update"]["Edition_Num"].value == "" )
						 {
								 alert( "Please provide Book Edition!" );
								 return false;
							 }
						 if( document.forms["update"]["No_Of_Pages"].value == "" )
								 {
								 alert( "Please provide Book No_Of_Pages!" );
								 		return false;
									}
						 if( document.forms["update"]["No_Of_Copies"].value == "" )
								{
									alert( "Please provide No_Of_Copies!" );
												return false;
							}
						 if( document.forms["update"]["Best_Of_Collection"].value == "" )
								{
									alert( "Please say if Book is in the Best_Of_Collection!" );
													return false;
							}
						if( document.forms["update"]["Rating"].value == "" )
								{
									alert( "Please provide Book Rating!" );
																return false;
								}
						if( document.forms["update"]["Print_Date"].value == "" )
						{
								 alert( "Please provide Book Print_Date!" );
																	return false;
							}
						if( document.forms["update"]["Publishing_Date"].value == "" )
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
	<div><h1>Update Book<h1></div>

			<form name="update" action="<?php echo base_url(); ?>index.php/hello/updatebookresults" onsubmit="return validateForm()" method="post">
			 ISBN : <input type="text" name="ISBN" value="<?php echo $books->ISBN; ?>"><br>
			 Title : <input type="text" name="Title" value="<?php echo $books->Title; ?>"><br>
			 Number Of Pages : <input type="text" name="No_Of_Pages" value="<?php echo $books->No_Of_Pages; ?>"><br>
			 Number Of Copies : <input type="text" name="No_Of_Copies"  value="<?php echo $books->No_Of_Copies; ?>"><br>

			 Best Of Collection : <input type="text" name="Best_Of_Collection"  value="<?php echo $books->Best_Of_Collection; ?>"><br>
			 Publishing Date : <input type="date" name="Publishing_Date" value="<?php echo $books->Publishing_Date; ?>"><br>
			 Rating : <input type="text" name="Rating" value="<?php echo $books->Rating; ?>"><br>
			 Edition number : <input type="Text" name="Edition_Num" value="<?php echo $books->Edition_Num; ?>" ><br>
			 Print Date : <input type="date" name="Print_Date" value="<?php echo $books->Print_Date; ?>" ><br>
			<?php



      echo "Authors<br>";
  foreach ($authorslist as $author)
 		 {
 			 $isthere = 0;
 			 foreach($authors_has_item as $selected)
 			 {
 				 if($author->Author_ID == $selected->Author_ID)
 				 {
 					 $isthere = 1;
 					 break;
 				 }
 			 }
 			 if($isthere == 1)
 			 {
 				 echo '<input checked type="checkbox" name="authors[]" value="'.$author->Author_ID.'"> '.$author->Author_Name.'<br>';
 			 }
 			 else
 			 {
 				 echo '<input type="checkbox" name="authors[]" value="'.$author->Author_ID.'"> '.$author->Author_Name.'<br>';
 			 }
 		 }
echo "<br><br>";
   echo "Formats<br>";

		 foreach ($formatslist as $format)
	  		 {
	  			 $isthere = 0;
	  			 foreach($item_has_format as $selected)
	  			 {
	  				 if($format->Format_ID == $selected->Format_ID)
	  				 {
	  					 $isthere = 1;
	  					 break;
	  				 }
	  			 }
	  			 if($isthere == 1)
	  			 {
	  				 echo '<input checked type="checkbox" name="format[]" value="'.$format->Format_ID.'"> '.$format->Format_Type.'<br>';
	  			 }
	  			 else
	  			 {
	  				 echo '<input type="checkbox" name="format[]" value="'.$format->Format_ID.'"> '.$format->Format_Type.'<br>';
	  			 }
	  		 }
echo "<br><br>";

				 echo "Genre<br>";

					foreach ($genreslist as $genre)
							{
								$isthere = 0;
								foreach($genres_has_item as $selected)
								{
									if($genre->Genre_ID == $selected->Genre_ID)
									{
										$isthere = 1;
										break;
									}
								}
								if($isthere == 1)
								{
									echo '<input checked type="checkbox" name="genre[]" value="'.$genre->Genre_ID.'"> '.$genre->Genre.'<br>';
								}
								else
								{
									echo '<input type="checkbox" name="genre[]" value="'.$genre->Genre_ID.'"> '.$genre->Genre.'<br>';
								}
							}


			  echo'  <input type="hidden" name="ID" value="'.$books->ID.'">
         <input type="submit" value="Submit">
			  </form>';

		?>






<b><div align="right"><a href="<?php echo base_url();?>index.php/Hello/adminpage"><b><input type="submit" value="Go Back to Admin Page"></a><br/></b></div></b>




</body>
</html>
