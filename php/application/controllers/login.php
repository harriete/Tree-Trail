<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends TreeTrailController {

  public function index_get(){
    $this->renderPageWithData();
  }

  public function index_post(){
    $loginData = $this->post();
    $validator = new Valitron\Validator($loginData);
    $validator->rule('required', ['username', 'password']);
    $validator->rule('lengthMin', ['username','password'], 6);
    $username = $loginData['username'];
    $password = md5($loginData['password']);
    $isLoginValid = $validator->validate();
    $canLogin = $this->loginUser($username, $password);

    if($isLoginValid && $canLogin){
	  $this->load->model('session_model', 'session_m');

      $this->session_m->initSession($username, $password);

      redirect('/');
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
    $this->load->model("login_model", "login_m");

    return $this->login_m->validateUser($username, $password);
  }
  
}
