<!--daniel Nilsson-->

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller 
{

	//laddar registrerings viewn och error hanterar ifall formuläret fylls i fel.
	public function index()
	{
		$this->load->view('Registration_view', $data);
	}

	//laddar registrationModel och kör funktionen add_user.
	public function registrationsent()
	{
		$this->load->model('RegistrationModel');
		
		if($this->RegistrationModel->add_user()){
			redirect(base_url('components'));
		}

	}

	
}

