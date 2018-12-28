<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8"
<div align="center"><meta name="viewport" content="width=device-width, initial-scale=1">


</head>
<body>


	<title>Our Books</title>

  <body style="background-color:#00796b  ;">


    <h1 style="text-align: center; color: #ffffff;">Our Books</span>🌷</h1>
    <div class="divTable">
    <div class="divTableHeading">
    <div class="divTableRow">
    <div class="divTableHead">Title</div>
    <div class="divTableHead">Number of Pages</div>
    <div class="divTableHead">Author Name</div>
    <div class="divTableHead">Genre</div>


    </div>
    </div>
    <div class="divTableBody">

          <?php
    			foreach ($books as $b) {

    				echo '<div class="divTableRow">';
    				echo '<div class="divTableCell">'.$b->Title.'</div>';
    				echo '<div class="divTableCell">'.$b->No_OF_Pages.'</div>';
    				echo '<div class="divTableCell">'.$b->Author_Name.'</div>';
    				echo '<div class="divTableCell">'.$b->Genre.'</div>';
    				echo '</div>';
    			}
    			?>
    		</div>
    </div>
<br>
<br>
<br>

  </body>
