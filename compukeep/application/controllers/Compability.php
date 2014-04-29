<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// ************ Author: Alexander Frödeberg ************ //
// ************ Author: Andreas Alm ************ //
class Compability extends CI_Controller{
	
	function index(){
		$this->load->helper('url');
	}

	function __construct(){
		parent::__construct();
		$this->load->model('Compability_model');
		$this->load->model('Components_model');		
	}

	function switchComp($active){
		switch ($active) {
			case 'motherboard':

				if (isset($_SESSION['chassi_fk'])) { // Om satt så ska den komponenten passa med denna komponent

					$columnArray = array('ATX'); // alla kolumner som ska kollas skrivs i här
					$result = $this->componentCheck($_SESSION['chassi_fk'], 'chassi', $columnArray, $active); // 1. Session den ska kolla mot 2. table namnet 3. kolumn 4.aktivt val (detta fall motherboard))
				}							
				else {
					$result = $this->Compability_model->getComponents($active);
				}
				break;
			
			case 'processor':

				if (isset($_SESSION['motherboard_fk'])) {

					$columnArray = array('socket');
					$result = $this->componentCheck($_SESSION['motherboard_fk'], 'motherboard', $columnArray, $active);
				}
				else {
					$result = $this->Compability_model->getComponents($active);
				}
				break;
			
			case 'videocard':

				if (isset($_SESSION['motherboard_fk'])) {
					$columnArray = array('pci');
					$result = $this->componentCheck($_SESSION['motherboard_fk'], 'motherboard', $columnArray, $active);
				}
				else {
					$result = $this->Compability_model->getComponents($active);
				}
				break;
			
			case 'memory':

				if (isset($_SESSION['motherboard_fk'])) {
					$columnArray = array('memory', 'memoryclock');
					$result = $this->componentCheck($_SESSION['motherboard_fk'], 'motherboard', $columnArray, $active);
				}
				else {
					$result = $this->Compability_model->getComponents($active);
				}
				break;

			case 'powersupply':

				if (isset($_SESSION['videocard_fk'])) {
					$result = $this->powersupplyCalculation($_SESSION['videocard_fk']);
				}
				else {
					$result = $this->Compability_model->getComponents($active);
				}
				break;
		}

		return $result;
	}

	function powersupplyCalculation($videocardID) { // hämtar värdet power för ditt valda grafikkort och hämtar o returnar PSU's som räcker till.
			$result = $this->Compability_model->videocardWatt($videocardID);
			$neededWatt = $result += 250; // lägger till 250 watt för säkerhetsmarginal

			$data = $this->Compability_model->getPowersupplyByWatt($neededWatt);
			return $data;

	}

	function componentCheck($ComponentId, $table, $columnArray, $active) { // hämtar value från kolumn från komonenten som ska passa med och hämtar sedan komponenten som har det värdet
		$checkValue = $this->Compability_model->checkValue($ComponentId, $table, $columnArray); // 1. vald ID för passande komponent, 2.table, 3.kolumn namn
		$data = $this->Compability_model->getComponents($active, $columnArray, $checkValue);
		return $data;
	}
}
?> 