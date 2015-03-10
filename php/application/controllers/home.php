<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends TT_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->helper('url');
  }

  public function index_get(){
    $this->render('home',[

    ],[
      'layout' => 'layout'
    ]);
  }
}
