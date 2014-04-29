<?php
// ************ Author: Alexander Frödeberg ************ //
class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('header_view');
		$this->load->view('admin_view.php');
	}

	function __construct()
	{
		parent::__construct();

		if($this->session->userdata('access') != 1) { // kollar så endast inloggade med access 1 kommer åt sidan.
			redirect(base_url('components'));

		}

		$this->load->library('component_value_array'); // klassen som innehåller arrayn med all komponenters info (application->libraries->Component_value_array)
		$this->load->library('cart');

		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->model('admin_model');
		session_start();
	}

	// Skickar med all info som behövs i viewn för att lägga till en ny komponent.
	function view() { 
		$columns = $this->getColumns($_POST['component']); // $_POST['component'] kommer ifån ajax i adminJS
		$data['columns'] = $columns;
		$data['component'] = $_POST['component'];
		$this->load->view('admin_container_view', $data);
	}

	// hämtar kolumn namnen för en speciell tabell. 
	// $table är tabell namnet som den ska hämta kolumn namn ifrån.
	function getColumns($table) { 
		$this->load->model('Components_model');
		$columns = $this->Components_model->getColumnNames($table);
		return $columns;
	}

	// lägger till en ny komponent efter användare har skrivit in alla uppgifter för komponenten.
	// $component = värdet som tillhandatogs i funtionen view. tas emot är och skickas till insertComponent
	// för att veta vilken tabell den nya komponenten ska läggas i.
	// $_POST innehåller alla saker som fylldes i för komponenten av användaren.
	function insertComponent($component) { 
		$this->admin_model->insertComponent($_POST, $component);
		redirect(base_url('admin'));

	}

	// detta är inget som blev klart men tanken var att användaren skulle kunda ladda upp en bild
	// för komponenten som skulle synas när man väljer komponeter i "Build".
	function do_upload()
	{
		$_FILES['userfile']['name'] = 'hej.png';
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '75';
		$config['max_height']  = '75';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			// $this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			// $this->load->view('upload_success', $data);
		}
		echo $_FILES['userfile']['name'];
	}

}