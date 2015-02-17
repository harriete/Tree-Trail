<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Manage_users extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->helper('url');
	$this->load->model("manage_users_model", "users");    
  }

  public function index(){

			$users = $this->users->get_all();
			$users_table = $this->users->pretty($users);

			$data["users"] = $users_table;
			$data["active"] = "manage_users";
			$this->load->view('header');			
			$this->load->view('sidemenu', $data);
			$this->load->view('manage_users', $data);			
			$this->load->view('footer');
  }

	public function manage_users_modal($id) {

		$submit = $this->input->post("submit");
	
		$this->form_validation->set_error_delimiters("", "");
		if($submit == "add"):
			$this->form_validation->set_rules("_username", "Username", "required|alpha_numeric|callback_check_if_username_exists");
		else:
			$this->form_validation->set_rules("_username", "Username", "required|alpha_numeric|callback_check_if_conflict");
		endif;
		$this->form_validation->set_rules("lastname", "Last Name", "required");
		$this->form_validation->set_rules("firstname", "First Name", "required");
		$this->form_validation->set_rules("middlename", "Middle Name", "required");
		$this->form_validation->set_rules("_gender", "Gender", "required");
		$this->form_validation->set_rules("contactnumber", "Contact Number", "required|numeric");
		$this->form_validation->set_rules("_address", "Address", "required");

		if(!$this->form_validation->run()):
			$data["user_data"] = $this->users->get($id);
			echo $this->load->view("manage_users_modal", $data);
		else:
			$this->submit();
		endif;
	}

	function check_if_conflict($username) {
		$init_username = $this->input->post("init_username");
		
		if($username != $init_username):
			$query = $this->db->select("username")->where("username", $username)->get("users");
			
			if(empty($query->first_row()->username)):
				return TRUE;
			else:
				return FALSE;
			endif;
		else:
			return TRUE;
		endif;
	}

	function check_if_username_exists($username) {
		$query = $this->db->select("username")->where("username", $username)->get("users");
		
		if(empty($query->first_row()->username)):
			return TRUE;
		else:
			return FALSE;
		endif;
	}
	
	public function delete_user($id) {
		
		if($this->users->delete($id)):
			echo "{\"title\": \"Delete Successful\", \"body\": \"The user has been successfully deleted!\"}";
		else:
			echo "{\"title\": \"Delete Failed\", \"body\": \"The user has not been deleted!\"}";
		endif;
	}
	
	private function submit() {
		$submit = $this->input->post("submit");

		if($submit == "add"):
			if($this->users->add()):
				echo "{\"response\": \"Success!\", \"title\": \"Add Successful\", \"body\": \"The user has been successfully added!\"}";
			else:
				echo "{\"response\": \"Failure!\", \"title\": \"Add Failed\", \"body\": \"The user has not been added!\"}";
			endif;
		elseif($submit == "login"):
			echo "Success!";
		else:
			if($this->users->update()):
				echo "{\"response\": \"Success!\", \"title\": \"Update Successful\", \"body\": \"The user has been successfully updated!\"}";
			else:
				echo "{\"response\": \"Failure!\", \"title\": \"Update Failed\", \"body\": \"The user has not been updated!\"}";
			endif;
		endif;
		
	}
	
}
?>