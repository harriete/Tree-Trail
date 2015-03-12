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
	
	function initSession($username, $password) {
      $credentials = array(
            'username'	=> $username,
            'password'	=> $password
      );

      $query = $this->db->where($credentials)->get('users');

      if($query->num_rows() == 1):
        foreach($query->result() as $row):
          $sess = array(
                'user_id'		=> $row->id,
                'username'	=> $row->username,
                'type'			=> $row->type
          );
        endforeach;

        $this->session->set_userdata($sess);
      else:
        return FALSE;
      endif;
    }
}

?>