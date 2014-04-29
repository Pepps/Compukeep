<?php
// ************ Author: Alexander Frödeberg ************ //
class Components extends CI_Controller {

	public function index()
	{	
		$this->load->model("Builds_model");
		$data['buildtitles'] = $this->Builds_model->Get_builds();

		$this->load->view("Header_view", $data);	
		$this->load->view('index');
		$this->load->view('footer');

	}

	function __construct()
	{
		parent::__construct();
		$this->load->model('Components_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->library('session');
		$this->load->library('cart');
		if(!isset($_SESSION)) {
		     session_start();
		}
	}

	// fixar så att delarna kan printas ut med index från arrayn 
	// istället för en string för alla kolumner heter olika utifrån vilken tabel
	public function builds()
	{
		$this->load->model("Builds_model");
		print_r($this->Builds_model->Get_spec_build());
		
	}

	// fixar arrayn som tas emot så den kan användas i currentBuildCompatible viewn.
	function readyTable($query) { 
		$workingArray = array();
		
		$nr = 0;
		$count = count($query->result_array());

		while ($nr < $count) {
			array_push($workingArray, array_values($query->row_array($nr)));
			$nr += 1;
		}
		return $workingArray;
	}


	function getComponent($type) { // $type of component.
		if ($type != 'chassi' && $type != 'harddrive') { // chassi eller hardrive behövs inte jämnföras med andra saker atm..
			$this->load->helper('load_controller');
			$result = load_controller('Compability', 'switchComp', $type); // kör switchComp i Combability controllern för jämnförelse

			$fixedArrayYes = $this->readyTable($result['CompQuery']); // fixar array för att echoas ut i tabellen (komptibla)
			
			if (isset($result['notCompQuery'])) { // Ifall användaren inte har valt en komponent innan som ska kollas mot den nya är denna tom
				$fixedArrayNo = $this->readyTable($result['notCompQuery']); // fixar array för att echoas ut i tabellen (EJ komptibla)
				$data['componentsNo'] = $fixedArrayNo;
			}
		
			$columns = $this->getColumnNames($type); // hämtar kolumn namnen för att rätt info ska synas i tabellen
			$data['columns'] = $columns; 
			$data['components'] = $fixedArrayYes;
			
			$this->load->view('currentBuildCompatible.php', $data);
		}

		else { // körs för chassi eller hardrive inte behöver kollas mot något. 
		$result = $this->Components_model->getComponent($type); // hämtar alla chassin elr hardrives
		
		$columns = $this->getColumnNames($type); // hämtar kolumn namnen för att rätt info ska synas i tabellen
		$fixedArray = $this->readyTable($result); // fixar array för att echoas ut i tabellen
		$data['columns'] = $columns; 
		$data['components'] = $fixedArray;
		$this->load->view('currentBuildCompatible.php', $data); 
		}
		$_SESSION['activeComponent'] = $type; // sätter ny session för vilken komponent som har senast klickats på.
	}

	// sätter ett nytt session med komponetens namn och dens value är ID för komponeten
	function setSession() { 
		$componentID = $_POST['unit'];
		$this->load->helper('url');
		$type = $_SESSION['activeComponent'].'_fk';
		$a = (string)$type;
		$_SESSION[$a] = $componentID;		
	}
/*
	function cartTesst() {
		$this->load->helper('load_controller');
		$andreas = load_controller('Handler', 'sessionHandling');
	}*/

	function getColumnNames($type) {
		$result = $this->Components_model->getColumnNames($type);
    	return $result;
	}

	// nästa användaren klickar på nästa eller föregående komponent så kollar den i arrayn var man är och går fram elr tillbaka i arrayn.
	function currentComponent() {
		$componentsArray = array('chassi','motherboard', 'processor', 'videocard','memory','harddrive', 'powersupply');
		$currentIndex = array_search($_SESSION['activeComponent'], $componentsArray);
		if ($_POST['nr'] == '+') { // posen kommer från jQueryn i script.js
			$index = $currentIndex += 1;
		}
		elseif ($_POST['nr'] == '-') {
			$index = $currentIndex -= 1;
			
		}

		$nextComponent = $componentsArray[$index];
		echo $nextComponent;
	}

	function destroy() {
		session_destroy();
		redirect(base_url('Components'));
	}

	// om användaren klickar på More Info i table 
	function getInfo($id) {
		$this->Components_model->getComponentInfo($_SESSION['activeComponent'], $id);
	}
}
?>