<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends TreeTrailController {

  public function index_get(){

    $this->render('home', NULL, [
      'layout' => 'layout'
    ]);
  }
  
}
