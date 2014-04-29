$(document).ready(function(){

    var SHOW_CLASS = 'show',
        HIDE_CLASS = 'hide',
        ACTIVE_CLASS = 'OnActive';
  
    $('.tabs').on('click', 'li a', function(e){
        e.preventDefault()
        var $tab = $(this),
            href = $tab.attr('href');
     
        $('.OnActive').removeClass(ACTIVE_CLASS);
        $tab.addClass(ACTIVE_CLASS);
        
        $('.show')
            .removeClass(SHOW_CLASS)
            .addClass( HIDE_CLASS )
            .hide();

        $(href)
            .removeClass(HIDE_CLASS)
            .addClass(SHOW_CLASS)
            .hide()
            .fadeIn(550);
            
    
    });
     $('#closelogin').mouseenter(function() {
        $(this).fadeTo('fast', 0.6);
    });

    $('#closelogin').mouseleave(function() {
        $(this).fadeTo('fast', 1); 
    });

     $('#closecart').mouseenter(function() {
        $(this).fadeTo('fast', 0.6);
    });

    $('#closecart').mouseleave(function() {
        $(this).fadeTo('fast', 1); 
    });

});





   

