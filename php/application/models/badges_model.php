<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Badges_model extends CI_Model {

  private $table_name = 'locations';

  public function create($data = []){

  }

  public function read($id = null){
    return $this->db
                ->get($this->table_name)
                ->result();
  }

  public function update($data = []){

  }

  public function delete($id = null){

  }

}