<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	/**
	 * The constructor loads models and makes them available to all the controller's actions.
	 */
	public function __construct() {
		parent::__construct();
		/**
		 * Here, we called the dlibrary_model contained in the project to be available for the admin controller.
		 */
		$this->load->model('library_model');

	}
	/**
	 *  The index loads the data and makes it available to render the view.
	 */
/
	public function index()
	{
		$this->load->view('adminhome');
	}
/**
 * Here, the controller can call out and render the views.
 */
	public function myfourthpage()
	{
		$this->load->view('contact_us');
	}
	public function mysecondpage()
	{
	$this->load->view('signup');
}
public function members()
{
	$this->load->view('members');
}
public function mysixthpage()
{
	$this->load->view('congratulations');
}
public function myninethpage()
{
$this->load->view('adminpage');
}

}
