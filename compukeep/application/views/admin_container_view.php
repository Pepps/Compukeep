<?php
// ************ Author: Alexander Frödeberg ************ //

// viewn för när en komponent är valt. Går igenom array från library och echoar ut rätt saker från arrayn
// i if satserna så kollar den ifall det ska vara inputs, textareas eller dropdowns. 

$array = $this->component_value_array->componentArray(); // arrayn

$charSet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; // används för att sätta beteckningen för vad personen har valt i de olika dropdowns så de blir rätt beteckning i databasen för jämnförlse när man bygger en dator
echo form_open(base_url('admin/insertComponent/'.$component)); // öppnar formen
foreach ($columns as $key) {
	$column = $key['COLUMN_NAME']; // Kolumn namnet som den jobbar med under loopen

	if ($array[$component][$column][0] == 'input') { // ifall kolumnen ska ha en input, som t.ex namn 
		echo '<h3>'.$column.'</h3>'.form_input($column).'<br>'; // lägger till inputen i viewn
	}
	elseif ($array[$component][$column][0] == 'none') { // ifall det är ett kolumn som inte ska röras t.ex ID.
	}
	elseif ($array[$component][$column][0] == 'textarea') {
		$class = 'style="width: 100%"';
		echo '<h3>'.$column.'</h3>'.form_textarea($column, '', $class).'<br>';
	}
	else {	// ifall det inte är något av ovanstående läggs det ut en dropdown med values från arrayn
		$charIndex = 0; // plusas i foreach loopen för att en ny bokstav ska användas för beteckning
		foreach ($array[$component][$column] as $key) { 
			$options[$charSet[$charIndex]] = $key; // lägger till value till options arrayn med bokstavs key för val i dropdown.
			$charIndex += 1; 
		}
		$class = 'class="drop"';
		echo '<h3>'.$column.'</h3>'.form_dropdown($column, $options, '', $class).'<br>'; // lägger till dropdownen för en kolumn 
		$options = array(); // array för valen och nollställs här innan loopen börjar om för nästa kolumn.
	}
}
$class = 'class="button flex"';
echo 
	'<br>'.form_submit('', 'Add component', $class). // submit knapp för att posta o sen in till db.
form_close().'<br>';
?>