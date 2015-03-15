<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends TreeTrailController {

  public function index_get(){
    $this->load->model("manage_users_model", "users");  
	  $this->load->model('session_model', 'session_m');

		$users = $this->users->get_all();
		$users_table = $this->users->pretty($users);

		$data["users"] 		= $users_table;
		$data["active"] 	= "dashboard";
		$data["isSuperAdmin"] = $this->session_m->isSuperAdmin();
		$data["users_count"] = $this->users->getUsersCount();
		if($this->isLoggedIn):
			$this->load->view('header');			
			$this->load->view('sidemenu', $data);
			$this->load->view('statistics', $data);			
			$this->load->view('footer');
		else:
			redirect('/');
		endif;
  }

  // Override to avoid redirect loop
  public function redirectToDashboardIfSuperAdmin(){}

}