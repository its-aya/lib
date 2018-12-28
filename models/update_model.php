<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class update_model extends CI_Model {


  function __construct() {
    parent::__construct();
  }

  ///////////////////////////////////////////////////////////////////////////////////////////////////////////

  function getbookauthorsbyID($id)
            {
              $sql = "select * from authors_has_item where ID=$id";
                $query = $this->db->query($sql);
                  $results = array();
                  foreach ($query->result() as $result) {
                    $results[] = $result;
                  }
                  return $results;
                }
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////
  function getbookformatsbyID($id)
            {
              $sql = "select * from item_has_format where ID=$id";
                $query = $this->db->query($sql);
                  $results = array();
                  foreach ($query->result() as $result) {
                    $results[] = $result;
                  }
                  return $results;
                }

///////////////////////////////////////////////////////////////////////////////////////////////////////////
          function getbookgenresbyID($id)
                    {
                      $sql = "select * from genres_has_item where ID=$id";
                        $query = $this->db->query($sql);
                          $results = array();
                          foreach ($query->result() as $result) {
                            $results[] = $result;
                          }
                          return $results;
                        }

///////////////////////////////////////////////////////////////////////////////////////////////////////////
  function getbookDetailsbyID($id)
  {
    $sql = "select * from item inner join edition on item.ID=edition.ID where item.ID=$id";
    $query = $this->db->query($sql);
    return $query->result();
  }
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////

  function updateitem() {
    $id = $this->input->post("ID");

      $ISBN = $this->input->post("ISBN");
      $title = $this->input->post("Title");
      $no_pages = $this->input->post("No_Of_Pages");
      $no_copies = $this->input->post("No_Of_Copies");
      $bestof = $this->input->post("Best_Of_Collection");
      $rate = $this->input->post("Rating");
      $publishingdate = $this->input->post("Publishing_Date");


      $sql = "update item
      set
      ISBN=$ISBN,
      Title='$title',
      No_Of_Pages=$no_pages,
      No_Of_Copies=$no_copies,
      Best_Of_Collection='$bestof',
      Rating=$rate,
      Publishing_Date='$publishingdate'
      where ID=$id";
      $query = $this->db->query($sql);


      $edition_no = $this->input->post("Edition_Num");
      $printdate = $this->input->post("Print_Date");


      $sql = "update edition
      set
      Edition_Num=$edition_no,
      Print_Date='$printdate'
      where ID=$id";
      $query = $this->db->query($sql);


      $sql = "delete from authors_has_item where ID = $id";
      $query = $this->db->query($sql);

      $authors = $this->input->post("authors");
      if(!isset($authors))
      {
        return 1;
      }
      foreach($authors as $author)
      {

        $data = array(
                'ID' => $id,
                'Author_ID' => $author,
        );
        $this->db->insert('authors_has_item', $data);
      }

      $sql = "delete from genres_has_item where ID = $id";
      $query = $this->db->query($sql);

      $genres = $this->input->post("genre");
      if(!isset($genres))
      {
        return 1;
      }
      foreach($genres as $genre)
      {
        $data = array(
                'ID' => $id,
                'Genre_ID' => $genre,
        );
        $this->db->insert('genres_has_item', $data);
      }


      $sql = "delete from item_has_format where ID = $id";
      $query = $this->db->query($sql);

      $formats = $this->input->post("format");
      if(!isset($formats))
      {
        return 1;
      }
      foreach($formats as $format)
      {
        $data = array(
                'ID' => $id,
                'Format_ID' => $format,
        );
        $this->db->insert('item_has_format', $data);
      }


      return 1;
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////




}
