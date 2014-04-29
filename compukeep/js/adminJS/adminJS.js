// ************ Author: Alexander Frödeberg ************ //
$(document).ready(function() {
	$('select#components').click(function() {
		var text = $("#components option:selected").text();
		$.post('http://localhost/CompuKeep/index.php/Admin/view/', {component:text}, function(data) {
			$('div#container').html(data);
		});
	});
	return false;
});

$(document).ready(function() {
	$('.jes').click(function() {
		alert(1);
	});
	return false;
});