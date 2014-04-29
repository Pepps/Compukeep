<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//---@Arthur daniel---\\

class Login extends CI_Controller 
{

	public function index()
	{
		#inlogins form.
		$this->load->view("LoginReg_view.php");
		
	}
	public function checklogin()
	{
		#laddar model.
		$data = $this->load->model("LoginModel");
		

		if (!empty($_POST['password']) && !empty($_POST['email'])) {
			# laddar checklogin functionen i checkloginmodel.
			
			$data = $this->LoginModel->checkloginmodel();
		
			#crypterar lösenordet som ska jämnföras.
			$password = hash("sha512", $data[2] . $_POST['password'] . "rostedbeefwithCompuKeep");
		}
		else{
			#om $_POST är tomma så skickas man tillbacks
			redirect(base_url('components'));

		}

		#kollar så att lösenordet stämmer med databasen.
		if($data[1] == $password) {
			#startar session.
            $this->start_session($data);

            if ($this->session->userdata('logged_in') == TRUE) {
            	redirect(base_url('components'));
            }

        }
        else{
        	#om det är fel lösenord eller email, så skickas man tillbaka.
            redirect(base_url('components'));
        }
	}
	public function start_session($data)
	{
		#här är sparar jag vad jag vill ha i sessionen.
		if(isset($data[0]) && isset($data[1]))
		{
			$newdata = array(
	                   'email' => $data[0],
	                   'id' => $data[3],
	                   'logged_in' => TRUE,
	                   'access' => $data[4]
	               );

	        $this->session->set_userdata($newdata);
	    }

	}

}
//---@Arthur daniel---\\
