<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends TreeTrailController {

  public function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('contact_model','contacts');
  }

  public function index_get(){

    if($this->isAdmin){
      $this->render('contact_admin',['contacts'=>$this->contacts->read()],[
     'layout'=>'layout'
    ]);
    }
    else if($this->isSuperAdmin){
       $this->render('contact_admin',['contacts'=>$this->contacts->read()],[
     'layout'=>'layout'
    ]);
    }else{
      $this->render('contacts',['contacts'=>$this->contacts->read()],[
     'layout'=>'layout'
    ]);
    }
  	
  }

 public function index_post(){
  $action = $this->post('action');
  if($action === 'add'){
  	$con = $this->post();
    unset($con['action']);
    $validator = new Valitron\Validator($con);
    $validator->rule('required', ['contact_person', 'contact_number','email','organization']);
    $validator->rule('lengthMin', ['contact_person','organization'], 6);
    $validator->rule('lengthMin', ['contact_number'], 7);

    $iscon = $validator->validate();
    if($iscon){
      $this->contacts->create($con);
      $this->renderPageWithData([
        'message' => 'Account has been successfully created.',
        'contacts'=>$this->contacts->read()
      ]);
    } else{
      $this->renderPageWithData([
        'message' => 'Account not successfully created. Please try again.',
        'contacts'=>$this->contacts->read()
      ]);
    }
  }
  else if($action == 'edit'){
    echo "edit";
  }
  else if($action == 'delete'){
  	$this->contacts->delete(['id'=>$this->post('id')]);
    $this->renderPageWithData([
        'message' => 'Account successfully deleted.',
        'contacts'=>$this->contacts->read()
      ]);
  	}
 }

 private function renderPageWithData($data = []){
    $this->render('contact_admin', $data, [
      'layout' => 'layout'
    ]);
  }

}