// ************ Author: Alexander Frödeberg ************ //
$(document).ready(function() { // mousehover för table
	$('table.hov').hover(
		function(){
			$(this).addClass('active');
		},
		function(){
			$(this).removeClass('active');
		}
	);

	
	

	$('table.hov').click(function(){ // tar bort bg color från gammla valda tb och lägger till på nya valda. 
		$('table.hov').removeClass('clicked');
		$(this).addClass('clicked');


			// $('.componentInfo').fadeIn(400);

	});
});

$(document).ready(function() { // välja radiobutton från hela tablen
	$('.compBoxWhite, td, .compBoxGray').click(function() {
    	$(this).find('td input:radio').prop('checked', true);
	});
});

// $(document).keyup(function(e) { // stänger infofönster med ESC
// 	if (e.keyCode == 27) {
// 		$('.componentInfo').fadeOut(400);
// 		return false;
// 	}
// });


$(document).ready(function() { 
	$('.infoTest').click(function() {
		
		var unit = $("input:radio[name=useable]:checked" ).val();
		// alert(unit);
		$.post('../index.php/Components/getInfo/'+unit, '', function(data) {
			$('div#infoBox').html(data);
		});
	});
});
