<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('Please Login');
if($_SESSION['userRole']!=1) { exit("You aren't Admin");}
$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">

  	<title>All Items</title>


</head>
<body>
  <body style="background-color:#916B49;">


<h1 style="text-align: center; color: #ffffff;">Our Books</span>🌷</h1>


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
<div class="divTable">
<div class="divTableHeading">
<div class="divTableRow">
  <div class="divTableHead">ID</div>

<div class="divTableHead">ISBN</div>
<div class="divTableHead">Title</div>
<div class="divTableHead">Number Of Pages</div>
<div class="divTableHead">Number Of Copies</div>
<div class="divTableHead">Best of collection</div>
<div class="divTableHead">Rating</div>
<div class="divTableHead">Edition</div>
<div class="divTableHead">Print date</div>
<div class="divTableHead">Format</div>
<div class="divTableHead">Author Name</div>
<div class="divTableHead">Genre</div>
<div class="divTableHead">Update</div>
<div class="divTableHead">Delete</div>



</div>
</div>
<div class="divTableBody">

      <?php
			foreach ($items as $item) {

				echo '<div class="divTableRow">';
        echo '<div class="divTableCell">'.$item->ID.'</div>';

				echo '<div class="divTableCell">'.$item->ISBN.'</div>';
				echo '<div class="divTableCell">'.$item->Title.'</div>';
				echo '<div class="divTableCell">'.$item->No_Of_Pages.'</div>';
        echo '<div class="divTableCell">'.$item->No_Of_Copies.'</div>';
        echo '<div class="divTableCell">'.$item->Best_Of_Collection.'</div>';
        echo '<div class="divTableCell">'.$item->Rating.'</div>';
        echo '<div class="divTableCell">'.$item->booksedition.'</div>';
        echo '<div class="divTableCell">'.$item->editiondate.'</div>';

        echo '<div class="divTableCell">'.$booksformats->bookformats.'</div>';
        echo '<div class="divTableCell">'.$booksauthors->bookauthors.'</div>';
        echo '<div class="divTableCell">'.$booksgenres->bookgenres.'</div>';
        echo '<div class="divTableCell"><a href="'. base_url().'index.php/Hello/updatebook/'.$item->ID.'">update</a></div>';
        echo '<div class="divTableCell"><a href="'. base_url().'index.php/Hello/delete/'.$item->ID.'">Delete</a></div>';

				echo '</div>';
			}
			?>
		</div>
</div>
<br>
<br>
<br>
<b><div align="right"><a href="<?php echo base_url();?>index.php/Hello/adminpage"><b><input type="submit" value="Go Back to Admin Page"></a><br/></b></div></b>
</body>
</html>
