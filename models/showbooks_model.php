<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class showbooks_model extends CI_Model {


  function __construct() {
    parent::__construct();
  }
  function showbooks() {
      $sql = " SELECT item.ID, library.item.ISBN, library.item.Title,
      library.item.No_Of_Pages, library.item.No_Of_Copies,
      library.item.Best_Of_Collection, library.item.Publishing_Date,
      library.item.Rating, GROUP_CONCAT( edition.Edition_Num SEPARATOR ', ') booksedition,
       GROUP_CONCAT(edition.Print_Date SEPARATOR ', ') editiondate FROM library.item
       INNER JOIN edition ON item.ID=edition.ID  group by item.ID";
      $query = $this->db->query($sql);
      $results = array();
      foreach ($query->result() as $result) {
        $results[] = $result;
      }
      return $results;
    }

    function showbookgenres() {
      $sql = " select  GROUP_CONCAT(genres.Genre SEPARATOR ',') bookgenres from (item inner join genres_has_item on item.ID=genres_has_item.ID)
       inner join genres on genres_has_item.Genre_ID=genres.Genre_ID group by item.ID";
      $query = $this->db->query($sql);
      $results = array();
      foreach ($query->result() as $result) {
        $results[] = $result;
      }
      return $results;
    }

    function showbookauthors() {
      $sql = " select  GROUP_CONCAT( authors.Author_Name SEPARATOR ',') bookauthors from (item inner join authors_has_item on item.ID=authors_has_item.ID)
       inner join authors on authors_has_item.Author_ID=authors.Author_ID group by item.ID";
      $query = $this->db->query($sql);
      $results = array();
      foreach ($query->result() as $result) {
        $results[] = $result;
      }
      return $results;
    }

    function showbookformats() {
      $sql = "   select  GROUP_CONCAT( format.Format_Type SEPARATOR ',') bookformats from (item inner join item_has_format on item.ID=item_has_format.ID)
      inner join format on item_has_format.Format_ID=format.Format_ID group by item.ID";
      $query = $this->db->query($sql);
      $results = array();
      foreach ($query->result() as $result) {
        $results[] = $result;
      }
      return $results;
    }



}
