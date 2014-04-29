
<!--Daniel Nilsson-->

<?php

class SaveCartmodel extends CI_Model 
{

	function __construct()
	{
		//call the Model construktor.
		parent::__construct();
	}

	function InsertPart()
	{
	    $this->load->library('cart');
        session_start();

        //kollar om man har valt något.
        if (isset($_SESSION['activeComponent'])) {

        	$tablesfk = array();	

       	 	$tabels = array();

        	$count = 0;

            //kollar från sessionen vilka delar som är valda.
            if (isset($_SESSION['chassi_fk'])) {
            	$chassid_fk = $_SESSION['chassi_fk'];
            	array_push($tablesfk, $chassid_fk);
            	array_push($tabels, "chassi");
            	$count++;
            }
            if (isset($_SESSION['motherboard_fk'])) {
            	$motherboard_fk = $_SESSION['motherboard_fk'];
            	array_push($tablesfk, $motherboard_fk);
            	array_push($tabels, "motherboard");
            	$count++;
            }
            if (isset($_SESSION['processor_fk'])) {
            	$processor_fk = $_SESSION['processor_fk'];
            	array_push($tablesfk, $processor_fk);
            	array_push($tabels, "processor");
            	$count++;
            }
            if (isset($_SESSION['videocard_fk'])) {
            	$videocard_fk = $_SESSION['videocard_fk'];
            	array_push($tablesfk, $videocard_fk);
            	array_push($tabels, "videocard");
            	$count++;
            }
            if (isset($_SESSION['memory_fk'])) {
            	$memory_fk = $_SESSION['memory_fk'];
            	array_push($tablesfk, $memory_fk);
            	array_push($tabels, "memory");
            	$count++;
            }
            if (isset($_SESSION['harddrive_fk'])) {
            	$harddrive_fk = $_SESSION['harddrive_fk'];
            	array_push($tablesfk, $harddrive_fk);
            	array_push($tabels, "harddrive");
            	$count++;
            }
            if (isset($_SESSION['powersupply_fk'])) {
            	$powersupply_fk = $_SESSION['powersupply_fk'];
            	array_push($tablesfk, $powersupply_fk);
            	array_push($tabels, "powersupply");
            	$count++;
            }   
        }

        $insertcart = array();
        // en loop som tar del för del och hämtar informationen, o sedan lägger i en ny arry.
        for ($i=0; $i < $count ; $i++) { 
            $query = $this->db->query("SELECT name FROM $tabels[$i] WHERE id=$tablesfk[$i]");
            foreach ($query->result() as $key) {
            	array_push($insertcart, $key->name);
            }
        
        }
        return $insertcart;
        
        
	}

	function SaveBuild()
	{
		session_start();

        //kollar om man har valt något.
        if (isset($_SESSION['activeComponent'])) {

        	$tablesfk = array();	

       	 	$tabels = array();

        	$count = 0;

            //kollar från sessionen vilka delar som är valda.
            if (isset($_SESSION['chassi_fk'])) {
            	$chassid_fk = $_SESSION['chassi_fk'];
            }
            else{
            	$chassid_fk = "NULL";
            }
            if (isset($_SESSION['motherboard_fk'])) {
            	$motherboard_fk = $_SESSION['motherboard_fk'];
            }
            else{
            	$motherboard_fk = "NULL";
            }
            if (isset($_SESSION['processor_fk'])) {
            	$processor_fk = $_SESSION['processor_fk'];
            }
            else{
            	$processor_fk = "NULL";
            }
            if (isset($_SESSION['videocard_fk'])) {
            	$videocard_fk = $_SESSION['videocard_fk'];
            }
            else{
            	$videocard_fk = "NULL";
            }
            if (isset($_SESSION['memory_fk'])) {
            	$memory_fk = $_SESSION['memory_fk'];
            }
            else{
            	$memory_fk = "NULL";
            }
            if (isset($_SESSION['harddrive_fk'])) {
            	$harddrive_fk = $_SESSION['harddrive_fk'];
            }
            else{
            	$harddrive_fk = "NULL";
            }
            if (isset($_SESSION['powersupply_fk'])) {
            	$powersupply_fk = $_SESSION['powersupply_fk'];
            }
            else{
            	$powersupply_fk = "NULL";
            }   
        }

        //hämtar namnet på som bygget.
		$buildtitle = $_POST["SaveBuild"];

        //hämtar användarens id.
		$id = $this->session->userdata('id');

        //spara bygget i databasen.
		$sql = "INSERT INTO  `db1214354_compukeep`.`savedbuild` (`pcid` ,`userid_fk` ,`chassi_fk` ,`motherboard_fk` ,`processor_fk` ,`videocard_fk` ,`soundcard_fk` ,`networkcard_fk` ,`memory_fk` ,`ssd_fk` ,`harddrive_fk` ,`powersuply_fk` ,`cables_fk` ,`os_fk` ,`buildtitle`)VALUES (NULL , $id, $chassid_fk, $motherboard_fk, $processor_fk, $videocard_fk, NULL, NULL, $memory_fk, NULL, $harddrive_fk, $powersupply_fk, NULL, NULL, '".$buildtitle."')";
		$this->load->database();
		$data = $this->db->query($sql);
		
		return TRUE;



	}

}