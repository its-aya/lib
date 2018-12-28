<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('Please Login');
$this->load->helper('url');


$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>SearchBook</title>


</head>
<body>

	<body style="background-color:#87AAB9 ;">

    <h1 style="text-align: center; color: #ffffff;">Our Books</span>🌷</h1>


 <?php
 if(isset($item))
 {
	 if(count($item) == 0)
	 {
		 echo "no results found";
	 }
	 else {
	 	echo '<div><h1><font color="#FFFFFF">Search result</font></h1></div>
	  <div class="divTable">
	  <div class="divTableHeading">
	  <div class="divTableRow">
		<div class="divTableHead">ISBN</div>
	  <div class="divTableHead">Book Title</div>
	  <div class="divTableHead">Number Of Pages</div>
		<div class="divTableHead">Number Of Copies</div>
		<div class="divTableHead">Publishing Date</div>
		<div class="divTableHead">Best Of Collection</div>
		<div class="divTableHead">Rating</div>
		<div class="divTableHead">Author Name</div>

	  </div>
	  </div>
	  <div class="divTableBody">';


	  			foreach ($item as $s) {

	  				echo '<div class="divTableRow">';
						echo '<div class="divTableCell">'.$s->ISBN.'</div>';
	  				echo '<div class="divTableCell">'.$s->Title.'</div>';
	  				echo '<div class="divTableCell">'.$s->No_OF_Pages.'</div>';
						echo '<div class="divTableCell">'.$s->No_Of_Copies.'</div>';
						echo '<div class="divTableCell">'.$s->Publishing_Date.'</div>';
						echo '<div class="divTableCell">'.$s->Best_Of_Collection.'</div>';
						echo '<div class="divTableCell">'.$s->Rating.'</div>';
						echo '<div class="divTableCell">'.$s->bookauthors.'</div>';



	  				echo '</div>';
	  			}
	  	echo"</div></div>";
	 }

	}
 ?>


</body>
</html>
