<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends TT_Controller {

  public function index_get(){
    $this->renderPageWithData();
  }

  public function index_post(){
    $loginData = $this->post();
    $validator = new Valitron\Validator($loginData);
    $validator->rule('required', ['username', 'password']);
    $validator->rule('lengthMin', ['username','password'], 6);
    $username = $loginData['username'];
    $password = $loginData['password'];
    $isLoginValid = $validator->validate();
    $canLogin = $this->loginUser($username, $password);

    if($isLoginValid && $canLogin){
      header(base_url('dashboard'));
    } else {
      $this->renderPageWithData([
        'error' => 'Invalid login data. Please try again.'
      ]);
    }

  }

  private function renderPageWithData($data = []){
    $this->render('login', $data, [
      'layout' => 'layout'
    ]);
  }

  private function loginUser($username = '', $password = ''){
    // Create a model for users and use that to search for a user with the given
    // username and password.
    return false;
  }

/*
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
            'user_id' => $db_sess['id'],
            'username'  => $db_sess['username'],
            'type'    => $db_sess['type'],
            'active'  => 1,
          );
      $this->session->set_userdata($sess);
      
      return TRUE;
    else:
      return FALSE;
    endif;
  }
  */
}
