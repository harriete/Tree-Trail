<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Photos_Model extends TreeTrailModel {

  public $tableName = 'photos';
  public $tableId = 'id';

  public function deleteWithLocationId($id){
    return $this->db->where('location_id', $id)->delete($this->tableName);
  }

}