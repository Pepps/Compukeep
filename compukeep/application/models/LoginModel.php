<?php
//---@Arthur daniel---\\

class LoginModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        
    }

    function checkloginmodel()
    {
    	// hämtar all information och sparar den information jag vill ha i en ny array.
        $log = array();
        try {
            $data = $this->db->query("SELECT userid, useremail, password, salt, access FROM user WHERE useremail='".$_POST['email']."'");
        } catch (Exception $e) {
            echo "något gick fel med queryn".$e->getMessage();
        }
        
        foreach ($data->result() as $key) {
			array_push($log, $key->useremail); // $log[0]
			array_push($log, $key->password); // $log[1]
			array_push($log, $key->salt); // $log[2]
			array_push($log, $key->userid); // $log[3]
            array_push($log, $key->access); // $log[4]

		}
        return $log;
        
    }

}
//---@Arthur daniel---\\
