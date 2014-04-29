<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Component_value_array {
	// Array för alla olika values som komponenter kan ha, denna används i admin_container_view.
	// nästad med 3 arrayer sammanlagt.
	// En array med index 0 => NONE är de kolumner som inte ska röras, t.ex ID
	// En array med index 0 => INPUT är de kolumner som ska ha en input från användaren som t.ex namn.
	// 1. array som innehåller alla komponent namn
	// 2. array som innehåller alla kolumner som finns i tabellen för komponenter
	// 3. Alla värden man ska kunda välja mellan
	public function componentArray() {
		$array = array(
					'chassi' => array(
							'ID' => array(
									0 => 'none'), 
							'name' => array(
									0 => 'input'),
							'price' => array(
									0 => 'input'),
							'ATX' => array(
									0 => 'mATX', 1 => 'ATX', 2 => 'mATX, atx', 3 => 'eATX', 4 => 'mATX, ATX, eATX', 5 => 'eATX, ATX'),
							'info' => array(
									0 => 'textarea')
						),
					'motherboard' => array(
							'ID' => array(
									0 => 'none'),
							'name' => array(
									0 => 'input'),
							'price' => array(
									0 => 'input'),
							'socket' => array(
									0 => 'LGA 1150', 1 => 'LGA 1155', 2 => 'LGA 2011', 3 => 'AMD3+', 4 => 'AMD2+'),
							'ATX' => array(
									0 => 'mATX', 1 => 'ATX', 2 => 'mATX, atx', 3 => 'eATX', 4 => 'mATX, ATX, eATX', 5 => 'eATX, ATX'),
							'pci' => array(
									0 => 'pcie', 1 => 'pcie 2.0', 2 => 'pcie 3.0', 3 => 'pci'),
							'memory' => array(
									0 => 'DDR2', 1 => 'DDR3', 2 => 'DDR4'),
							'memoryclock' => array(
									0 => '1333', 1 => '1600', 2 => '2000'),
							'info' => array(
									0 => 'textarea')
						),
					'processor' => array(
							'ID' => array(
									0 => 'none'),
							'name' => array(
									0 => 'input'),
							'price' => array(
									0 => 'input'),
							'socket' => array(
									0 => 'LGA 1150', 1 => 'LGA 1155', 2 => 'LGA 2011', 3 => 'AMD3+', 4 => 'AMD2+'),
							'info' => array(
									0 => 'textarea')
						),
					'videocard' => array(
							'ID' => array(
									0 => 'none'),
							'name' => array(
									0 => 'input'),
							'price' => array(
									0 => 'input'),
							'pci' => array(
									0 => 'pcie', 1 => 'pcie 2.0', 2 => 'pcie 3.0', 3 => 'pci'),
							'power' => array(
									0 => 'input'),
							'info' => array(
									0 => 'textarea')
						),
					'memory' => array(
							'ID' => array(
									0 => 'none'),
							'name' => array(
									0 => 'input'),
							'price' => array(
									0 => 'input'),
							'memory' => array(
									0 => 'DDR2', 1 => 'DDR3', 2 => 'DDR4'),
							'memoryclock' => array(
									0 => '1333', 1 => '1600', 2 => '2000'),
							'info' => array(
									0 => 'textarea')
						),
					'harddrive' => array(
							'ID' => array(
									0 => 'none'),
							'name' => array(
									0 => 'input'),
							'price' => array(
									0 => 'input'),
							'size' => array(
									0 => '2.5"', 1 => '3.5"'),
							'info' => array(
									0 => 'textarea')
						),
					'powersupply' => array(
							'ID' => array(
									0 => 'none'),
							'name' => array(
									0 => 'input'),
							'price' => array(
									0 => 'input'),
							'power' => array(
									0 => 'input'),
							'info' => array(
									0 => 'textarea')
						)
					);
		return $array;
	}
}
?>