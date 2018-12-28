<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class genre_model extends CI_Model {


  function __construct() {
    parent::__construct();
  }


  function addgenre() {
        $data = array(
              'Genre_ID' => $this->input->post("Genre_ID"),
              'Genre' => $this->input->post("Genre"),

      );

      $this->db->insert('genres', $data);
      return 1;
      }
}
