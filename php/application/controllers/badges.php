<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Badges extends REST_Controller {

  public function __construct(){
    parent::__construct();

    $this->load->model('Badges_model', 'badges');
  }

  public function index_get(){
    $this->response($this->badges->read());
  }

  public function index_post(){

  }

  public function index_put(){

  }

  public function index_delete(){

  }

}
