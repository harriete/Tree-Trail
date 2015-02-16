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

		$this->db_results["check_if_tables_exist"]["condition"] = "Ideal DB Tables == Actual DB Tables";

		$result = empty($diff);
		$this->db_results["check_if_tables_exist"]["result"] = ($result)?"pass":"fail";
	}

	function check_for_partial_tables() {
		$tables = $this->db->list_tables();
		$diff = array_filter(array_diff($this->db_tables, $tables));

		$this->db_results["check_for_partial_tables"]["condition"] = "No of Ideal DB Tables != No of Actual DB Tables";

		$result = (!$this->check_if_tables_exist() && count($diff) != count($this->db_tables));
		$this->db_results["check_for_partial_tables"]["result"] = ($result)?"pass":"fail";
	}

	function check_db_table_collations() {
		$query = "SHOW TABLE STATUS FROM sonsonaja_cpe429e";//.$this->db_name;
		$final_result = true;

		$this->db_results["check_db_table_collations"]["condition"] = "table->Collation === utf8_general_ci";

		$r = $this->db->query($query);
		if($r->num_rows() > 0):
			foreach($r->result() as $row):
				if(!($test_result = (($row->Collation === "utf8_general_ci")?"true":"false"))):
					$final_result = false;
				endif;

				$this->db_results["check_db_table_collations"]["result"][$row->Name] = $test_result;
			endforeach;
		else:
			$this->db_results["check_db_table_collations"]["result"]["No table"] = false;
		endif;
		$this->db_results["check_db_table_collations"]["final_result"] = ($final_result)?"pass":"fail";

		$r->free_result();
	}

	function modify_db() {
		$query = "ALTER DATABASE `".$this->db_name."`
				  CHARACTER SET utf8
				  COLLATE utf8_general_ci";

		$result = ($this->db->query($query));
		$this->db_results["modify_db"]["query"] = $query;
		$this->db_results["modify_db"]["result"] = ($result)?"ok":"notok";

		return $result;
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
