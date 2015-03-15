<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// class statistics extends CI_Controller {
class about extends TreeTrailController {

  public function index_get() {

	// $this->load->view('about_page');
	$this->render('about_page',[],[
      'layout' => 'layout'
    ]);
  }
  
}
