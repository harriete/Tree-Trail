<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends TreeTrailController {

  public function index_get(){
    $this->session->sess_destroy();

    $this->load->model('session_model', 'session_m');

    $data = ['isLogin' => $this->session_m->isLogin()];

    $this->renderPageWithData($data);
  }

  private function renderPageWithData($data = []){
    $this->render('home', $data, [
      'layout' => 'layout'
    ]);
  }
  
}
