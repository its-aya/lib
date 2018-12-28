<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class addadmin_model extends CI_Model {


  function __construct() {
    parent::__construct();
  }

  function Add_admin() {
    $data = array(
          'First_Name' => $this->input->post("FirstName"),
          'Surname' => $this->input->post("Surname"),
          'Username' => $this->input->post("Username"),
          'email' => $this->input->post("Email"),
          'Password' => $this->input->post("Password"),
          'Number' => $this->input->post("Number"),
          'Gender' => $this->input->post("gender"),
          'RoleID' => 1

  );
  //print_r($data);
  $this->db->insert('user', $data);
  return 1;
  }

}
