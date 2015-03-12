<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends TT_Controller {

  public function index_get(){
    $this->render('register',[
      
    ],[
      'layout' => 'layout'
    ]);
  }
}
