<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->helper('url');
	$this->load->model("manage_users_model", "users");    
  }

  public function index(){

			$users = $this->users->get_all();
			$users_table = $this->users->pretty($users);

			$data["users"] 		= $users_table;
			$data["active"] 	= "dashboard";
			$data["users_count"] = $this->users->getUsersCount();
			$this->load->view('header');			
			$this->load->view('sidemenu', $data);
			$this->load->view('statistics', $data);			
			$this->load->view('footer');
  }

	
}
?>