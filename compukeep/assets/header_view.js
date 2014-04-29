//###########SANNIE############//

$(document).ready(function() {
     $("#buildDrop").click(function(){/*Shows the info-div in the current build*/
        $("#compukeepinfocontainer").slideToggle();
    });

     $("#navlogo").click(function(){/*Shows the info-div in the current build*/
        $("#compukeepinfocontainer").slideToggle();
    });

     $("#home").click(function(){/*Shows the info-div in the current build*/
        $("#compukeepinfocontainer").slideToggle();
    });

    $('.buildname').mouseenter(function() { /*Styling for the build-name-link*/
        $(this).fadeTo('fast', 0.6);
    });

    $('.buildname').mouseleave(function() {/*Styling for the build-name-link*/
        $(this).fadeTo('fast', 1); 
    });

    $("#toggle").click(function(){/*Shows the info-div in the current build*/
        $(".info").toggle(1000);
    });

    $('#toggle').mouseenter(function() {/*Styling for the toggle-button*/
        $(this).fadeTo('fast', 0.6);
    });

    $('#toggle').mouseleave(function() {/*Styling for the toggle-button*/
        $(this).fadeTo('fast', 1); 
    });

    $('#closebuilds').mouseenter(function() {/*Styling for the close-mybuilds-button*/
        $(this).fadeTo('fast', 0.6);
    });

    $('#closebuilds').mouseleave(function() {/*Styling for the close-mybuilds-button*/
        $(this).fadeTo('fast', 1); 
    });

});
    /*Here the content for each build is swapped, deppending on which "build-link" the user clicks. The variable for the build-models query is also processed here*/
	function swapContent(cv) {
$("#getbuild").html('Loading...').show();
	    var url = "Components/builds";
	    $.post(url, {contentVar: cv} ,function(data) {
	       $("#getbuild").html(data).show();
	    });
	}
//###########SANNIE############//

 
