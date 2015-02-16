<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Init_db extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model("init_db_model", "db_checker");
	}

	public function index() {
		//run checks


		$this->load->view("init_db/status", $data);
	}

	public function start_init() {
		
	}

}
