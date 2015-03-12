<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Badges extends REST_Controller {

  public function __construct(){
    parent::__construct();

    $this->load->model('Badges_Model', 'badges');
    $this->load->model('Photos_Model', 'photos');
  }

  public function index_get(){
    $this->response($this->badges->read());
  }

  public function index_post(){
    $data = $this->post();
    $validator = new Valitron\Validator($data);
    $validator->rule('required', ['name', 'latitude', 'longitude', 'types', 'photos', 'abundance', 'quantity', 'email']);
    $validator->rule('numeric', ['latitude', 'longitude', 'quantity']);
    $validator->rule('email', ['email']);
    $validator->rule('min', 'quantity', 0);
    $validator->rule('in', 'abundance', ['abundant', 'average', 'scarce']);


    if($validator->validate()){
      // Remove photos for the badge create
      $photos = $data['photos'];
      unset($data['photos']);
      $savedData = $this->badges->create($data);

      if(!$savedData){
        $this->response(null, 500);
      } else {
        $savedPhotos = $this->savePhotos($savedData['id'], $photos);
        if(!$savedPhotos){
          $this->response(null, 500);
        } else {
          // Append back photos for the return data
          $savedData['photos'] = $photos;
          $this->response($savedData, 201);
        }
      }
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

  private function savePhotos($badgeId = '', $photos = []){    
    return !in_array(false, array_map(function($photo) use ($badgeId){
      return $this->photos->create([
        'image_path' => $photo,
        'location_id' => $badgeId,
        'caption' => '',
        'uploader_ip' => '',
      ]);
    }, $photos));
  }

}
