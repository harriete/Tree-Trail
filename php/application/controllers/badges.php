<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Badges extends REST_Controller {

  public function __construct(){
    parent::__construct();

    $this->load->model('Badges_model', 'badges');
  }

  public function index_get(){
    $this->response($this->badges->read());
  }

  public function index_post(){
    $data = $this->post();
    $validator = new Valitron\Validator($data);
    $validator->rule('required', ['name', 'latitude', 'longitude', 'types', 'abundance', 'quantity', 'email']);
    $validator->rule('numeric', ['latitude', 'longitude', 'quantity']);
    $validator->rule('email', ['email']);
    $validator->rule('min', 'quantity', 0);
    $validator->rule('in', 'abundance', ['abundant', 'average', 'scarce']);

    if($validator->validate()){
      $savedData = $this->badges->create($data);
      if($savedData) $this->response($savedData, 201);
      else $this->response(null, 400);
    } else {
      $this->response($validator->errors(), 400);
    }
  }

  public function index_put(){
    $data = $this->put();
    $validator = new Valitron\Validator($data);
    $validator->rule('required', ['id', 'name', 'latitude', 'longitude', 'types', 'abundance', 'quantity', 'email']);
    $validator->rule('numeric', ['latitude', 'longitude', 'quantity']);
    $validator->rule('in', 'abundance', ['abundant', 'average', 'scarce']);
    $validator->rule('email', 'email');
    $validator->rule('min', 'quantity', 0);
    $validator->rule('integer', 'id');
    $validator->rule('min', 'id', 1);

    if($validator->validate()){
      $savedData = $this->badges->update($data);
      if($savedData) $this->response($savedData, 200);
      else $this->response(null, 400);
    } else {
      $this->response($validator->errors(), 400);
    }
  }

  public function index_delete(){
    $data = ['id' => $this->uri->segment(2)];
    $validator = new Valitron\Validator($data);
    $validator->rule('integer', 'id');
    $validator->rule('min', 'id', 1);

    if($validator->validate()){
      $result = $this->badges->delete($data);
      if($result) $this->response(null, 204);
      else $this->response(null, 400);
    } else {
      $this->response($validator->errors(), 400);
    }
  }

}
