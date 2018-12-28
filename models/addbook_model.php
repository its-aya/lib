<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class addbook_model extends CI_Model {


  function __construct() {
    parent::__construct();
  }

function getformats() {
      $sql = "select * from format";
      $query = $this->db->query($sql);
      $results = array();
      foreach ($query->result() as $result) {
        $results[] = $result;
      }
      return $results;
    }
    function getauthors() {
      $sql = "select * from authors";
      $query = $this->db->query($sql);
      $results = array();
      foreach ($query->result() as $result) {
        $results[] = $result;
      }
      return $results;
    }
    function getgenres() {
      $sql = "select * from genres";
      $query = $this->db->query($sql);
      $results = array();
      foreach ($query->result() as $result) {
        $results[] = $result;
      }
      return $results;
    }
    function additems() {
      $data = array(

            'ISBN' => $this->input->post("ISBN"),

            'Title' => $this->input->post("Title"),

            'No_Of_Pages' => $this->input->post("No_Of_Pages"),
            'No_Of_Copies' => $this->input->post("No_Of_Copies"),
            'Best_Of_Collection' => $this->input->post("Best_Of_Collection"),

            'Publishing_Date' => $this->input->post("Publishing_Date"),
            'Rating' => $this->input->post("Rating")

    );

    $this->db->insert('item', $data);
    $lastID =$this->db->insert_id();

    $ID = $lastID;
    $Edition_Num = $this->input->post('Edition_Num');
    $Print_Date = $this->input->post('Print_Date');


     $sql = "insert into edition (ID, Edition_Num, Print_Date) VALUES ($lastID, $Edition_Num, '$Print_Date')";
$query = $this->db->query($sql);


    $formats = $this->input->post("format");
  foreach($formats as $format)
  {
    $data = array(
            'ID' => $lastID,
            'Format_ID' => $format,
    );
    $this->db->insert('item_has_format', $data);
  }

  $authors = $this->input->post("authors");
foreach($authors as $author)
{
  $data = array(
          'ID' => $lastID,
          'Author_ID' => $author,
  );
  $this->db->insert('authors_has_item', $data);
}
$genres = $this->input->post("genres");
foreach($genres as $genre)
{
$data = array(
        'ID' => $lastID,
        'Genre_ID' => $genre,
);
$this->db->insert('genres_has_item', $data);
}
    return 1;
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////
    function deleteitem($id){
      $sql="delete from item where ID=$id";
      $query = $this->db->query($sql);
      return 1;

    }



  }
