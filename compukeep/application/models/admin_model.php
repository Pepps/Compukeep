<?php
// ************ Author: Alexander Frödeberg ************ //
class Admin_model extends CI_Model{

	function __construct() {
		parent::__construct();
		$this->load->database(); 
	}

	// lägger till en ny komponent i databasen, $values kommer från formen i viewn.
	function insertComponent($values, $table) { 
		$this->db->insert($table, $values);  

	}


}