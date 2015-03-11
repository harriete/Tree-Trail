<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends TT_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->helper('url');
	$this->load->model('session_model', 'session');
  }

  public function index_get(){
    $this->render('home',[
    ],[
      'layout' => 'layout'
    ]);
  }
  
  public function login() {
	$this->form_validation->set_error_delimiters("", "");
	
	$this->form_validation->set_rules("username", "Username", "required|callback_check_if_exist");
	$this->form_validation->set_rules("password", "Password", "required|callback_check_database");
	
	if(!$this->form_validation->run()):
	$this->render('home',[
      'foo' => 'still login',
      'badges' => [0,9,2,2,1,2,3,4,5,6,7]
    ],[
      'layout' => 'layout'
    ]);
	else:
	$this->render('home',[
      'foo' => 'login success',
      'badges' => [0,9,2,2,1,2,3,4,5,6,7]
    ],[
      'layout' => 'layout'
    ]);
	endif;
  }
  
  function check_if_exist($username) {
		$password = $this->input->post('password');
		
		$this->load->model("users_model", "users_m");
		
		$query = $this->users_m->validate($username, $password);
		
		if($query):
			return TRUE;
		else:
			return FALSE;
		endif;
	}
	
	function check_database($password) {
		$username = $this->input->post('username');
		
		$this->load->model("users_model", "users_m");
		
		$query = $this->users_m->validate($username, $password);
		
		if($query):
			$db_sess = $this->users_m->getAllData($username);
			
			$sess = array(
						'user_id'	=> $db_sess['id'],
						'username'	=> $db_sess['username'],
						'type'		=> $db_sess['type'],
						'active'	=> 1,
					);
			$this->session->set_userdata($sess);
			
			return TRUE;
		else:
			return FALSE;
		endif;
	}
}
