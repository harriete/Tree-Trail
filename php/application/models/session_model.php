<?php

class Session_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	function isSuperAdmin() {
		return $this->session->userdata('type') == "super-admin" ? TRUE : FALSE;
	}
	
	function isLogin() {
		return $this->session->userdata('username') != '' ? TRUE : FALSE;
	}
}

?>