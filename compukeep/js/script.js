// ************ Author: Alexander Frödeberg ************ //
$(document).ready(function() {

	$('#home').click(function() {
		//**** Innehåll-fade, RING JESPER FÖR YTTERLIGARE INFORMATION, 0738060598<3
		$('.style').fadeIn(400);
		$('.popupInfo').fadeOut(0);
		//**** Menu-fade, RING JESPER FÖR YTTERLIGARE INFORMATION, 0738060598<3
		$('#buildDrop').fadeIn(400);
		$('.navbar-right').fadeOut(0);
		$('.dropdown').fadeOut(0);
	});
		
	$('#buildDrop').click(function() {
		//**** Innehåll-fade, RING JESPER FÖR YTTERLIGARE INFORMATION, 0738060598<3
		$('.style').fadeOut(0);
		$('.popupInfo').fadeIn(400);
		//**** Menu-fade, RING JESPER FÖR YTTERLIGARE INFORMATION, 0738060598<3
		$('#buildDrop').fadeOut(0);
		$('.navbar-right').fadeIn(400);
		$('.dropdown').fadeIn(400);
		MainPop('chassi');
	});


	// Funktion för att hämta rätt komponeter beroende på vad användaren vill se.
	// type = string med vilken komponent.
	function MainPop(type) {
		$('#bray').fadeOut(400);
		$('#loading').fadeIn(100); // loading gifen

		$.post('http://localhost/CompuKeep/index.php/Components/getComponent/'+type, '', function(data) {

			
			$('div#bray').html(data);

	        $('#loading').hide();
	        $('#bray').fadeIn(400);
			});

		$('#compYes').addClass('clicked');
		$('#compNo').removeClass('clicked');

	}
			
		$('#next').click(function() { // nästa komponent knapp
			var unit = $("input:radio[name=useable]:checked" ).val();
			if (unit !== undefined) { // ifall ingen komponent har valt så ska setSession inte köras fär då sätta ett tomt session id vilket är :(
				$.post('http://localhost/CompuKeep/index.php/Components/setSession', {unit:unit}, function(data) {

				});
			};	
			// nr = + för att vi vill hoppa framåt i arrayn med komponent namn för att sedan få nästa namn o köra mainpop
			$.post('http://localhost/CompuKeep/index.php/Components/currentComponent', {nr:'+'}, function(data) {
				MainPop(data);

			});
		});

		$('#previous').click(function() { // föregående komponent knapp
			var unit = $("input:radio[name=useable]:checked" ).val();
			if (unit !== undefined) { /// ifall ingen komponent har valt så ska setSession inte köras fär då sätta ett tomt session id vilket är :(
				$.post('http://localhost/CompuKeep/index.php/Components/setSession', {unit:unit}, function(data) {

				});
			};
			// nr = - för att vi vill hoppa bakåt i arrayn med komponent namn för att sedan få nästa namn o köra mainpop
			$.post('http://localhost/CompuKeep/index.php/Components/currentComponent', {nr:'-'}, function(data) {
				MainPop(data);
			});
		});

	// dropbox med de olika komponenter tar ut vilken användaren valde o skickar till mainpop
	$('.name').click(function() { // val av komponent 
		var type = $(this).attr('value');
		MainPop(type);
	});

	$('#compYes').click(function() { // Kompatibla box
		$('div.compYesTable').fadeIn(400);
		$('div.compNoTable').fadeOut(0);
		
		$('#compNo').removeClass('clicked');
		$(this).addClass('clicked');
	});

	$('#compNo').click(function() { // Ej kompatibla box
		$('div.compNoTable').fadeIn(400);
		$('div.compYesTable').fadeOut(0);
		
		$('#compYes').removeClass('clicked');
		$(this).addClass('clicked');
	});
});

$(document).ready(function() { // När man har valt en produkt, uppdateras databasen och fadar ut diven.
	$('#mySelect, .btn-primary').click(function() {
		var unit = $("input:radio[name=useable]:checked" ).val();


		$.post('http://localhost/CompuKeep/index.php/Components/setSession', {unit:unit}, function(data) {
			$('div#cartTest').html(data); //debugg

		});
		

	});
	return false;
});

