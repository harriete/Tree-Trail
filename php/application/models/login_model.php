<?php

class Login_model extends CI_Model {
	
	function __construct() {
      parent::__construct();
	}
	
	public function validateUser($username, $password) {
      $credentials = array(
            'username'	=> $username,
            'password'	=> $password
      );
					
      $query = $this->db->where($credentials)->get('users');

      if($query->num_rows() == 1) {
        return TRUE;
      }

      return FALSE;
    }
	
    function isSuperAdmin() {
      return $this->session->userdata('type') == "super-admin" ? TRUE : FALSE;
    }
	
    function isLogin() {
      return $this->session->userdata('username') != '' ? TRUE : FALSE;
    }
}

?>