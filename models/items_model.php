<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class items_model extends CI_Model {


  function __construct() {
    parent::__construct();
  }
  /////////////////////SHOW ALL BOOKS//////////////////////////////////////

function get_all_items() {


$sql="SELECT item.ISBN, item.Title, item.Edition, item.No_Of_Pages, item.No_Of_Copies, item.Best_Of_Collection,item.Print_Date, item.Publishing_Date, item.Rating, authors.Author_Name, format.Format_Type, genres.Genre FROM (((((item INNER JOIN authors_has_item ON item.ISBN=authors_has_item.ISBN)
 INNER JOIN authors ON authors_has_item.Author_ID=authors.Author_ID)
 INNER JOIN genres_has_item ON item.ISBN=genres_has_item.ISBN)
 INNER JOIN genres ON genres_has_item.Genre_ID=genres.Genre_ID)
 INNER JOIN item_has_format on item.ISBN=item_has_format.ISBN)
INNER JOIN format ON item_has_format.Format_ID=format.Format_ID";
//echo $sql;
$query = $this->db->query($sql);
//echo count($query->result());
$results = array();
foreach ($query->result() as $result) {
  $results[] = $result;
}
return $results;
}
}
/////////////////////////////////DELETE BOOKS/////////////////////////////////////////////
function deletebook($id) {
  $sql = "delete from item where ISBN = $id";
  $query = $this->db->query($sql);
  return 1;
}
