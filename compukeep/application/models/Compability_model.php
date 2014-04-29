<?php
// ************ Author: Andreas Alm ************ //
// ************ Author: Alexander Frödeberg ************ //
class Compability_model extends CI_Model{

	function __construct() {
		parent::__construct();
		$this->load->database(); 
	}


	function getComponents($table, $columnName=FALSE, $value=FALSE){
		if ($columnName == FALSE && $value == FALSE) { // körs ifall man inte har valt en komponent innan som den nya behövs kollas mot
			$query = $this->db->query("SELECT * FROM $table");
			$data['CompQuery'] = $query;
		}
		else {
			$queryArray = array(); // fixar en array för att kunda hämta saker som !=
			foreach ($value as $key => $val){
				$a = $key.' != '; 
				$queryArray[$a] = $val;
			}
			$notCompQuery = $this->db->get_or_where($table, $queryArray);
			$CompQuery = $this->db->get_where($table, $value);
			
			$data['CompQuery'] = $CompQuery;
			$data['notCompQuery'] = $notCompQuery;
		}
		return $data;
	}

	// $columnArray = en array med de columner som värden ska hämtas
	// hämtar ut en komponents beteckning
	function checkValue($ComponentId, $table, $columnArray) { 
		$query = $this->db->query("SELECT * FROM $table WHERE ID = $ComponentId");
		$a = $query->result_array();

		foreach ($columnArray as $key) {
			$data[$key] = $a[0][$key];
		}
		return $data;
	}

	// hämtar ut hur mycker watt ens valda grafikkort behöver
	function videocardWatt($ComponentId) { 
		$query = $this->db->query("SELECT power FROM videocard WHERE ID = $ComponentId");
		$result = $query->result_array();
		return $result[0]['power'];
	}
	
	// hämtar powersupplys som har lika mycker eller mer watt än vad som behövs för bygget.
	function getPowersupplyByWatt($watt) { 
		$data['CompQuery'] = $this->db->query("SELECT * FROM powersupply WHERE power >= $watt");
		$data['notCompQuery'] = $this->db->query("SELECT * FROM powersupply WHERE power < $watt");
		return $data;
	} 
}

?>