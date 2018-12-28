<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class library_model extends CI_Model {


  function __construct() {
    parent::__construct();
  }


  function searchBookByTitle($searchfor)
    {
            $sql = "select Item.ISBN, item.Title, Item.No_OF_Pages, Item.No_Of_Copies,
            Item.No_OF_Pages, Item.Best_Of_Collection, Item.Rating, Item.Publishing_Date,
            GROUP_CONCAT( authors.Author_Name SEPARATOR ', ') bookauthors from
      (library.item inner join library.authors_has_item on item.ID= authors_has_item.ID)
      inner join library.authors on authors_has_item.Author_ID = authors.Author_ID WHERE item.ID='$searchfor' like '%{$searchfor}%' GROUP BY item.ID";
    
        $query = $this->db->query($sql);
        $results = array();
        foreach ($query->result() as $x) {
          $results[] = $x;
          //echo  "hi";
        }
        return $results;
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////
    function searchBookByISBN($searchfor)
      {
              $sql = "select Item.ISBN, item.Title, Item.No_OF_Pages, Item.No_Of_Copies,
              Item.No_OF_Pages, Item.Best_Of_Collection, Item.Rating, Item.Publishing_Date,
              GROUP_CONCAT( authors.Author_Name SEPARATOR ', ') bookauthors from
        (library.item inner join library.authors_has_item on item.ID= authors_has_item.ID)
        inner join library.authors on authors_has_item.Author_ID = authors.Author_ID where item.ISBN ='$searchfor' GROUP BY item.ID ";
          $query = $this->db->query($sql);
          $results = array();
          foreach ($query->result() as $x) {
            $results[] = $x;
          }
          return $results;
      }


      ////////////////////////////////////////////////////////////////////////////////////////////////
      function searchBookByAuthor($searchfor)
        {
                $sql = "select Item.ISBN, item.Title, Item.No_OF_Pages, Item.No_Of_Copies,
                Item.No_OF_Pages, Item.Best_Of_Collection, Item.Rating, Item.Publishing_Date,
                GROUP_CONCAT( authors.Author_Name SEPARATOR ', ') bookauthors from
          (library.item inner join library.authors_has_item on item.ID= authors_has_item.ID)
          inner join library.authors on authors_has_item.Author_ID = authors.Author_ID  where Authors.Author_Name ='$searchfor' GROUP BY item.ID";
            $query = $this->db->query($sql);
            $results = array();
            foreach ($query->result() as $x) {
              $results[] = $x;
            }
            return $results;
}

//REGISTERING MEMBERS
  function AddUser() {
    $data = array(
          'First_Name' => $this->input->post("FirstName"),
          'Surname' => $this->input->post("Surname"),
          'Username' => $this->input->post("Username"),
          'email' => $this->input->post("Email"),
          'Password' => $this->input->post("Password"),
          'Number' => $this->input->post("Number"),
          'Gender' => $this->input->post("gender"),
          'RoleID' => 2

  );
  //print_r($data);
  $this->db->insert('user', $data);
  return 1;
  }

/*  function login($UserName, $Password)
  {
    $sql = "select RoleID from User where UserName ='$UserName' AND Password='$Password'";
    $query = $this->db->query($sql);
    if(count($query->result()) == 1)
    {
      return $query->row()->userRole;
    }
    else {
      return 0;
    }
  */


  function getBooksByGenre($id)
  {
        $sql = "select item.Title, Item.No_OF_Pages, authors.Author_Name, library.genres.Genre from (((
    (library.item inner join library.authors_has_item on library.item.ID= library.authors_has_item.ID)
    inner join library.authors on library.authors_has_item.Author_ID = library.authors.Author_ID))
    inner join library.genres_has_item on library.genres_has_item.ID = library.item.ID)
    inner join library.genres on library.genres.Genre_ID = library.genres_has_item.Genre_ID where library.genres.Genre_ID = $id;";

      $query = $this->db->query($sql);
      $results = array();
      foreach ($query->result() as $x) {
        $results[] = $x;
      }
      return $results;
  }

}
