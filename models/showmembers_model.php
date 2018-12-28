<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class showmembers_model extends CI_Model {


  function __construct() {
    parent::__construct();
  }

  function get_all_members() {
    $sql = " select * from user where user.RoleID=2";
    $query = $this->db->query($sql);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }





}
