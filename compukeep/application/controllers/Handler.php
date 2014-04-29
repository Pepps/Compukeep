<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// ************ Author: Andreas Alm ************ //
class Handler extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		
		$this->load->library('session');
		$this->load->model('Compability_model');
		$this->load->model('Components_model');

		if(!isset($_SESSION)) {
			session_start();
		}

	}

	function sessionHandling(){
			foreach ($_SESSION as $key =>$H )
			{ 
				if($key!='activeComponent'){
					$componentId = $H;
					$this->componentSession($componentId,$key);
				}
			}
		}
		//Startar jämförelsen mellan komponenterna och kollar ifall delarna passar med varandra.
	 function componentSession($componentId,$key){
		switch ($key) {
			case 'chassi_fk'://Chassi jämförs med moderkortet för att se om det passar. 
				if (isset($_SESSION['motherboard_fk'])){
					$compId = $_SESSION['motherboard_fk'];
					$columnArray = array('ATX');
					// echo $compId;
					$checkvalue = $this->Compability_model->checkValue($compId,'chassi', $columnArray);
					// echo "dddd";

					$data = $this->Compability_model->getComponents('chassi','ATX', $checkvalue);
					
					$this->load->helper('load_controller');
					$result = load_controller('Components', 'readyTable', $data['CompQuery']);
					foreach ($result as $key => $value) {
						if ($value[0] == $componentId) { // Ifall komponent id som användaren har valt finns med i listan körs denna, alltså betyder att den passar med moderkortet i detta fallet
							$a = TRUE;
							break;
						}
					}

					if (!isset($a)) { //Berättar för användaren om en komponent inte är kompatibel med en annan, och vilken komponent som orsakar felet. 
					 	echo '<span style="color:#ff0000;"> Chassi is incorrect! (Does not work with motherboard)</span><br>';
					}
				}
				break;

			case 'motherboard_fk': //Moderkortet jämförs med chassit för att se om det passar. 
				if (isset($_SESSION['chassi_fk'])){
					$compId = $_SESSION['chassi_fk'];
					$columnArray = array('ATX');

					$checkvalue = $this->Compability_model->checkValue($compId,'chassi', $columnArray);

					$data = $this->Compability_model->getComponents('chassi','ATX', $checkvalue);
					
					$this->load->helper('load_controller');
					$result = load_controller('Components', 'readyTable', $data['CompQuery']);
					foreach ($result as $key => $value) {
						if ($value[0] == $componentId) { // Ifall komponent id som användaren har valt finns med i listan körs denna, alltså betyder att den passar med moderkortet i detta fallet							
							$a = TRUE;
							break;
						}
					}

					if (!isset($a)) {//Berättar för användaren om en komponent inte är kompatibel med en annan, och vilken komponent som orsakar felet. 
					 	echo '<span style="color:#ff0000;"> Motherboard is incorrect! (Does not work with chassi)</span><br>';
					}
				}
				break;

			case 'processor_fk': //Processorn jämförs med moderkortet för att se om det passar. 
				if (isset($_SESSION['motherboard_fk'])){
					$compId = $_SESSION['motherboard_fk'];
					$columnArray = array('socket');

					$checkvalue = $this->Compability_model->checkValue($compId, 'motherboard', $columnArray); // hämtar ut beteckningen från det valda kolumnen från $columnArray


					$data = $this->Compability_model->getComponents('processor', 'socket', $checkvalue); // hämtar de komponenter som har samma beteckning som de vi fick från förra funktionen
					
					$this->load->helper('load_controller');
					$result = load_controller('Components', 'readyTable', $data['CompQuery']);
					foreach ($result as $key => $value) {
						if ($value[0] == $componentId) { // Ifall komponent id som användaren har valt finns med i listan körs denna, alltså betyder att den passar med moderkortet i detta fallet
							$a = TRUE;
							break;
						}
					}

					if (!isset($a)) { //Berättar för användaren om en komponent inte är kompatibel med en annan, och vilken komponent som orsakar felet. 
					 	echo '<span style="color:#ff0000;"> Processor is incorrect! (Does not work with motherboard)</span><br>';
					}
				}
				break;

			case 'videocard_fk': //Grafikkortet jämförs med moderkortet för att se om det passar. 

				if (isset($_SESSION['motherboard_fk'])){
					$compId = $_SESSION['motherboard_fk'];
					$columnArray = array('pci');

					$checkvalue = $this->Compability_model->checkValue($compId,'motherboard', $columnArray);

					$data = $this->Compability_model->getComponents('videocard','pci', $checkvalue);

					$this->load->helper('load_controller');
					$result = load_controller('Components','readyTable', $data['CompQuery']);
					foreach ($result as $key => $value) {
						if ($value[0] == $componentId) { // Ifall komponent id som användaren har valt finns med i listan körs denna, alltså betyder att den passar med moderkortet i detta fallet
							$a = TRUE;
							break;
						}
					}

					if (!isset($a)) { //Berättar för användaren om en komponent inte är kompatibel med en annan, och vilken komponent som orsakar felet. 
					 	echo '<span style="color:#ff0000;"> Videocard is incorrect! (Does not work with motherboard)</span><br>';
					}
				}
				break;

			case 'memory_fk': //RAM-minnet jämförs med moderkortet för att se om det passar. 

				if (isset($_SESSION['motherboard_fk'])){
					$compId = $_SESSION['motherboard_fk'];
					$columnArray = array('memory');

					$checkvalue = $this->Compability_model->checkValue($compId,'motherboard', $columnArray);
					$data = $this->Compability_model->getComponents('memory','memory', $checkvalue);

					$this->load->helper('load_controller');
					$result = load_controller('Components','readyTable', $data['CompQuery']);
					foreach ($result as $key => $value) {
						if ($value[0] == $componentId) { // Ifall komponent id som användaren har valt finns med i listan körs denna, alltså betyder att den passar med moderkortet i detta fallet
							$a = TRUE;
							break;
						}
					}

					if (!isset($a)) { //Berättar för användaren om en komponent inte är kompatibel med en annan, och vilken komponent som orsakar felet. 
					 	echo '<span style="color:#ff0000;"> Memory is incorrect! (Does not work with motherboard)</span><br>';
					}
				}
				break;
				
			case 'powersupply_fk': //Nätagregat jämförs med grafikkortet för att se om det passar. 
				
				if (isset($_SESSION['videocard_fk'])){
					$compId = $_SESSION['videocard_fk'];
					
					$data = load_controller('Compability', 'powersupplyCalculation', $compId);

					$this->load->helper('load_controller');

					$result = load_controller('Components','readyTable', $data['CompQuery']);
					
					foreach ($result as $key => $value) {
						if ($value[0] == $componentId) { // Ifall komponent id som användaren har valt finns med i listan körs denna, alltså betyder att den passar med moderkortet i detta fallet
							$a = TRUE;
							break;
						}
					}

					if (!isset($a)) { //Berättar för användaren om en komponent inte är kompatibel med en annan, och vilken komponent som orsakar felet. 
					 	echo '<span style="color:#ff0000;"> Powersupply is incorrect! (Does not work with videocard)</span><br>';
					}
				}
				break;
		}
	}
}