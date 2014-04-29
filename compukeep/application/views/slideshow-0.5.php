<script>


$(document).ready(function(){
  var currentPosition = 0;
  var slideWidth = $(window).width() * 0.4;
  var slides = $('.slide');
  var numberOfSlides = slides.length;

  //Set slide widths depending on device
  
  $('.slide').css("width", slideWidth);
  $('#slidesContainer').css("width", slideWidth);
  	
  	//MOBILE DEVICE

	$( window ).resize(function() {	
	  if($(window).width() < 480) {
		slideWidth = $(window).width();
		$('#slideshow').css("width", $(window).width());
		$('.control').css("margin-top", 0);
		$('.slideshow-p').css("display", "none");
		$('.slideshow-img').css("width", 245);
		$('.slideshow-img').css("height", 155);
		$('.slideshow-img').css("float", "none");
		$('.slideshow-img').css("margin-left", 20);

	  }	
	  if($(window).width() < 650 && $(window).width() > 480) {
		slideWidth = $(window).width()-120;
		$('.slideshow-p').css("display", "block");
		$('.slideshow-p').css("width", 200);
		$('#slideshow').css("width", $(window).width());
		$('.control').css("margin-top", -115);
		$('.slideshow-img').css("width", 215);
		$('.slideshow-img').css("height", 145);
		$('.slideshow-img').css("float", "right");
		$('.slideshow-img').css("margin-left", 0);
	  }
	  //DESKTOP 	
	  else if($(window).width() > 1024) {
	  	slideWidth = $(window).width() * 0.45;
	  	$('#slideshow').css("width", 960);
		$('.slideshow-p').css("width", 300);
	  }

  	$('.slide').css("width", slideWidth);
  	$('#slidesContainer').css("width", slideWidth);	
  	$('#slideInner').css("width", slideWidth * 4);
  	});

  // Remove scrollbar in JS
  $('#slidesContainer').css('overflow', 'hidden');

  // Wrap all .slides with #slideInner div
  slides
    .wrapAll('<div id="slideInner"></div>')
    // Float left to display horizontally, readjust .slides width
	.css({
      'float' : 'left',
      'width' : slideWidth
    });

  // Set #slideInner width equal to total width of all slides
  $('#slideInner').css('width', slideWidth * numberOfSlides);

  // Insert controls in the DOM
  $('#slideshow')
    .append('<img src="http://www.em-id.com/images/carousel/left-arrow.png" class="control" id="leftControl" />')
    .append('<img src="http://dental.anatomage.com/images/mdstudio/right-normal.png" class="control" id="rightControl" />');

  // Hide left arrow control on first load
  manageControls(currentPosition);

  // Create event listeners for .controls clicks
  $('.control')
    .bind('click', function(){
    // Determine new position
	currentPosition = ($(this).attr('id')=='rightControl') ? currentPosition+1 : currentPosition-1;
    
	// Hide / show controls
    manageControls(currentPosition);
    // Move slideInner using margin-left
    $('#slideInner').animate({
      'marginLeft' : slideWidth*(-currentPosition)
    });
  });

  // manageControls: Hides and Shows controls depending on currentPosition
  function manageControls(position){
    // Hide left arrow if position is first slide
	if(position==-1){ currentPosition=numberOfSlides-1 } else{}
	// Hide right arrow if position is last slide
    if(position==numberOfSlides){ currentPosition=0 } else{}
  }	
});

</script>

	<script type="text/javascript"> 

	$(document).ready(function() {
    $('.popup-window').mouseenter(function() {
        $(this).fadeTo('fast', 0.8);
    });
    $('.popup-window').mouseleave(function() {
       $(this).fadeTo('fast', 1); 
    });
});

	</script>


  <!-- Slideshow HTML -->
    <div id="slideshow">
      <div id="slidesContainer">
        <div class="slide">
          <h2 class="slideshow-h">Web Development Tutorial</h2>
          <p class="slideshow-p"><a href="http://sixrevisions.com/tutorials/web-development-tutorials/using-xampp-for-local-wordpress-theme-development/"></a>If you're into developing web apps, you should check out the tutorial called "<a href="http://sixrevisions.com/tutorials/web-development-tutorials/using-xampp-for-local-wordpress-theme-development/">Using XAMPP for Local WordPress Theme Development</a>" which shows you how to set up a local testing server for developing PHP/Perl based applications locally on your computer. The example also shows you how to set up WordPress locally!</p>
          <img class="slideshow-img" src="http://www.xavierycomputers.com/images/desktop.png" alt="An image that says Install X A M P P for wordpress." width="215" height="145" />
        </div>
        <div class="slide">
          <h2>Web Development Tutorial</h2>
          <p class="slideshow-p"><a href="http://sixrevisions.com/tutorials/web-development-tutorials/using-xampp-for-local-wordpress-theme-development/"></a>If you're into developing web apps, you should check out the tutorial called "<a href="http://sixrevisions.com/tutorials/web-development-tutorials/using-xampp-for-local-wordpress-theme-development/">Using XAMPP for Local WordPress Theme Development</a>" which shows you how to set up a local testing server for developing PHP/Perl based applications locally on your computer. The example also shows you how to set up WordPress locally!</p>
          <img class="slideshow-img" src="http://www.stockcarevolution.com/css/images/custom-gaming-computer.png" alt="An image that says Install X A M P P for wordpress." width="215" height="145" />
        </div>
        <div class="slide">
          <h2>Web Development Tutorial</h2>
          <p class="slideshow-p"><a href="http://sixrevisions.com/tutorials/web-development-tutorials/using-xampp-for-local-wordpress-theme-development/"></a>If you're into developing web apps, you should check out the tutorial called "<a href="http://sixrevisions.com/tutorials/web-development-tutorials/using-xampp-for-local-wordpress-theme-development/">Using XAMPP for Local WordPress Theme Development</a>" which shows you how to set up a local testing server for developing PHP/Perl based applications locally on your computer. The example also shows you how to set up WordPress locally!</p>
          <img class="slideshow-img" src="http://212.71.253.56/~alfr13/icon1.png" alt="An image that says Install X A M P P for wordpress." width="215" height="145" />
        </div>
      </div>
    </div>