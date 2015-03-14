<?php

class Statistics_model extends CI_Model
{

	public function retrieve_all()
	{
		$this->db->select('quantity, name, id, types');
		$this->db->from('locations');
		$query = $this->db->get();
		return $query;
	}
	
}


?>