<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Init_db_model extends CI_Model {

	function __construct() {
		parent::__construct();

		$this->load->database();
		$this->load->dbforge();
		$this->load->dbutil();

		$this->db_name = getenv("OPENSHIFT_MYSQL_DB_NAME");
		$this->db_tables = array(
			"comments", "locations",
			"photos", "users"
		);
		$this->db_results = array();
	}

	function results() {
		return $this->db_results;
	}

	function reset_results() {
		$this->db_results = array();
	}

	function check_if_tables_exist() {
		$tables = $this->db->list_tables();
		$diff = array_filter(array_diff($this->db_tables, $tables));

		return empty($diff);
	}

	function check_for_partial_tables() {
		$tables = $this->db->list_tables();
		$diff = array_filter(array_diff($this->db_tables, $tables));

		return !$this->check_if_tables_exist() &&
			   count($diff) != count($this->db_tables);
	}

	function modify_db() {
		// $this->dbforge->create_database("tree_trail");
		$query = "ALTER DATABASE `".$this->db_name."`
				  CHARACTER SET utf8
				  COLLATE utf8_general_ci";

		return $this->db->query($query);
	}

	function drop_tables() {
		$tables = $this->db->list_tables();

		foreach($tables as $table):
			$this->dbforge->drop_table($table);
		endforeach;
	}

	function create_tables() {
		
	}

}
