<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class loginmodel extends CI_Model {


  function __construct() {
    parent::__construct();
  }
  function login($UserName, $Password)
  {

    $sql = "select RoleID from User where UserName ='$UserName' AND Password='$Password'";
    $query = $this->db->query($sql);
    if(count($query->result()) == 1)
    {
      return $query->row()->RoleID;
    }
    else {
      return 0;
    }
  }
}
