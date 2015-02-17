<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Init_db_model extends CI_Model {

	function __construct() {
		parent::__construct();

		$this->load->database();
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

	function db_name() {
		return $this->db_name;
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
		$query = "SHOW TABLE STATUS FROM ".$this->db_name;
		$final_result = true;

		$this->db_results["check_db_table_collations"]["condition"] = "table->Collation === utf8_general_ci";

		$r = $this->db->query($query);
		if($r->num_rows() > 0):
			foreach($r->result() as $row):
				if(!($test_result = (($row->Collation === "utf8_general_ci")?"pass":"fail"))):
					$final_result = false;
				endif;

				$this->db_results["check_db_table_collations"]["result"][$row->Name] = ($test_result)?"pass":"fail";
			endforeach;
		else:
			$this->db_results["check_db_table_collations"]["result"]["No tables found"] = "fail";
			$final_result = false;
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
	}

	function drop_tables() {
		$tables = $this->db->list_tables();
		$query = "DROP TABLE `";
		$final_result = true;

		$this->db_results["drop_tables"]["query"] = $query."?`";
		if(count($tables) > 0):
			foreach($tables as $table):
				$result = $this->db->query($query.$table."`");
				$this->db_results["drop_tables"]["result"][$table] = ($result)?"ok":"notok";
				if(!$result):
					$final_result = false;
				endif;
			endforeach;
		else:
			$this->db_results["drop_tables"]["result"]["No tables found"] = "ok";
			$final_result = true;
		endif;
		$this->db_results["drop_tables"]["final_result"] = ($final_result)?"ok":"notok";
	}

	function create_tables() {
		$query = "CREATE TABLE IF NOT EXISTS `?` (...)";
		$table_query = array(
			"comments"	=> "CREATE TABLE IF NOT EXISTS `comments` (
							`id` int(11) NOT NULL AUTO_INCREMENT,
							`comment` text NOT NULL,
							`parent_id` int(11) NOT NULL,
							`owner_id` int(11) NOT NULL,
							`date` datetime NOT NULL,
							PRIMARY KEY (`id`)
							) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;",
			"locations"	=> "CREATE TABLE IF NOT EXISTS `locations` (
							`id` int(11) NOT NULL AUTO_INCREMENT,
							`name` varchar(1024) NOT NULL,
							`latitude` float NOT NULL,
							`longitude` float NOT NULL,
							`added_by` datetime NOT NULL,
							`added_on` datetime NOT NULL,
							PRIMARY KEY (`id`)
							) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;",
			"photos"	=> "CREATE TABLE IF NOT EXISTS `photos` (
							`id` int(11) NOT NULL AUTO_INCREMENT,
							`image_path` text NOT NULL,
							`caption` text NOT NULL,
							`uploader_ip` int(11) NOT NULL,
							`location_id` int(11) NOT NULL,
							PRIMARY KEY (`id`)
							) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;",
			"users"		=> "CREATE TABLE IF NOT EXISTS `users` (
							`id` int(11) NOT NULL AUTO_INCREMENT,
							`username` varchar(32) NOT NULL,
							`password` varchar(32) NOT NULL,
							`type` int(11) NOT NULL DEFAULT '0',
							PRIMARY KEY (`id`)
							) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;"
		);
		$final_result = true;

		$this->db_results["create_tables"]["query"] = $query;
		foreach($this->db_tables as $table):
			$result = $this->db->query($table_query[$table]);
			$this->db_results["create_tables"]["result"][$table] = ($result)?"ok":"notok";
			if(!$result):
				$final_result = false;
			endif;
		endforeach;
		$this->db_results["create_tables"]["final_result"] = ($final_result)?"ok":"notok";
	}

}
