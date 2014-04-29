<!--Daniel Nilsson-->

<?php

class RegistrationModel extends CI_Model 
{

	function __construct()
	{
		//call the Model construktor.
		parent::__construct();
	}


	//Registrerings info som ska skickas till databasen.
	public function add_user()
	{

		if (isset($_POST['email']) && isset($_POST['password'])) {  
			
			$email = $_POST['email'];
			//salt och peppar kryptering
			$salt = $this->generate_random_string(5);
			$password = hash("sha512", $salt . $_POST['password'] . "rostedbeefwithCompuKeep");
			
			//Kollar så att email och confirm email är satta.
			if(isset($email) && isset($password)){

				$sql = "INSERT INTO user (`userid`, `password`, `useremail`, `salt`) 
						VALUES (NULL, '".$password."', '".$email."', '".$salt."')";
		
				$this->load->database();
				$data = $this->db->query($sql);

				return TRUE;
				
			}
			else{
				redirect('../Home');
			}
		}
	}
	
	
	// Salt kryptering
	public function generate_random_string($nbletters){
		
		$randString="";
		$charUniverse="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+-=";
		for($i=0; $i<$nbletters; $i++){
			$randInt=rand(0,(strlen($charUniverse)-1));
			$randChar=$charUniverse[$randInt];
            $randString=$randString.$randChar;
        }
        return $randString;
    }


}
