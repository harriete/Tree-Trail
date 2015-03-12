<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TreeTrailModel extends CI_Model {
  public $tableName = '';
  public $tableId = '';

  public function create($data = []){
    $success = $this->db->insert($this->tableName, $data);
    return ($success) ? $this->retrieveLastSaved($this->db->insert_id()) : $success;
  }

  public function read($data = []){
    return $this->db->get_where($this->tableName, $data)->result_array();
  }

  public function update($data = []){
    $success = $this->db->where($this->tableId, $data[$this->tableId])->update($this->tableName, $data);
    return ($success) ? $this->retrieveLastSaved($data[$this->tableId]) : $success;
  }

  public function delete($data = []){
    return $this->db->where($this->tableId, $data[$this->tableId])->delete($this->tableName);
  }

  private function retrieveLastSaved($id){
    $this->db->flush_cache();
    return $this->db->where($this->tableId, $id)->get($this->tableName)->row_array();
  }
}