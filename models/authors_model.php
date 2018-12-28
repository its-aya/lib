<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class authors_model extends CI_Model {


  function __construct() {
    parent::__construct();
  }


  function get_all_authors() {


  $sql="select * from authors";
  $query = $this->db->query($sql);
  $results = array();
  foreach ($query->result() as $result) {
    $results[] = $result;
  }
  return $results;
  }




  function addAuthor() {
        $data = array(
              'Author_ID' => $this->input->post("Author_ID"),
              'Author_Name' => $this->input->post("Author_Name"),

      );

      $this->db->insert('authors', $data);
      return 1;
      }
}
