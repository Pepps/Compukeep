<?php
// ************ Author: Alexander Frödeberg ************ //
class Components_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    // hämtar kolumn namnen från tabellen som funktionen tar emot som argument
    function getColumnNames($type) {
    	$query = $this->db->query("SELECT `COLUMN_NAME` 
    	    			FROM `INFORMATION_SCHEMA`.`COLUMNS` 
    	    			WHERE `TABLE_SCHEMA`='db1214354_compukeep' 
    	    	    	AND `TABLE_NAME`= '$type'");
    	return $query->result_array();
    }

    // om allt ska hämtas från en tabel som t.ex chassin eller harddrives
	function getComponent($type) {
		$query = $this->db->query("SELECT * FROM $type");
		return $query;
	}

    // hämtar info texten i tablen
    function getComponentInfo($table, $id) {
        $query = $this->db->query("SELECT info FROM $table WHERE ID = $id");
        $a = $query->result_array();
        echo $a[0]['info'];
    }
	
}
?>