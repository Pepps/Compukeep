<script type="text/javascript" src="<?php echo base_url('../js/table.js'); ?>"></script>
<?php
// ************ Author: Alexander Frödeberg ************ //
$tableClass = 'compBoxGray cursor';

$count = count($components);
$count = $count -= 1;

echo'
<table class="compBoxGray">';
		echo '<td><p style="margin-left:90%;">Name</p></td>';
		echo '<td><p style="margin-left:50%;">Price</p></td>';
		echo '<td><p style="margin-left:30%;">Info</p></td>';
echo'</table>';

$nr = 0;
echo '	
<div class="compYesTable">';

while ($nr <= $count) {
	if ($tableClass == 'compBoxWhite cursor') { // Kör varannan div class för bakgrundsfärg
		$tableClass = 'compBoxGray cursor';
	}
	else {
		$tableClass = 'compBoxWhite cursor';	
	}
	
	echo '	
	<table class="'.$tableClass.' hov">
	<td><div class="pic"></div></td>';

		
		$data = array(
					"name" => "useable",
					"id" => '1',
					"value" =>$components[$nr][0],
					"style" => "margin:10px; display:none;",
					);
		
		echo 
		'<td>'.form_radio($data).
		$components[$nr][1].'</td>
		<td>'.$components[$nr][2].'</td>';

	echo '<td><a href="#test" style="float:left; color:black;" class="infoTest" data-toggle="modal">More Info</a></td>
	</table>';
	$nr += 1;
}
echo '</div>';


// ******************************** KOMPONENTER SOM INTE PASSAR ************************************************
if (empty($componentsNo)) {
	
}
else {
	$tableClass1 = 'compBoxGray cursor';

	$count1 = count($componentsNo);
	$count1 = $count1 -= 1;


	$nr1 = 0;
	echo '	
	<div class="compNoTable" style="display:none;">';
	while ($nr1 <= $count1) {
		if ($tableClass1 == 'compBoxWhite cursor') { // Kör varannan div class för bakgrundsfärg
			$tableClass1 = 'compBoxGray cursor';
		}
		else {
			$tableClass1 = 'compBoxWhite cursor';	
		}
		
		echo '	
		<table class="'.$tableClass1.' hov">
		<td><div class="pic"></div></td>';
			
			$data1 = array(
						"name" => "useable",
						"id" => '1',
						"value" =>$componentsNo[$nr1][0],
						"style" => "margin:10px; display:none;",
						);
			
			echo 
			'<td>'.form_radio($data1).
			$componentsNo[$nr1][1].'</td>
			<td>'.$componentsNo[$nr1][2].'</td>';

		echo '<td><a href="#test" style="float:left; color:black;" class="infoTest" data-toggle="modal">More Info</a></td>
		</table>';
		$nr1 += 1;
	}
	echo '</div>';
}
?>