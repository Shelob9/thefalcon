jQuery(document).ready(function($) {
    //put IDs for sidebar and toggle in vars
    var toggle = "#menu-toggle";
    var slideout = "#secondary-mobile";
    //calculate the width of the mobile sidebar and put inverse in var
    var slideoff = -Math.abs( $( slideout ).width() );
    //add margin-left to mobile sidebar to push off canvas
    $( slideout).css( "marginLeft", slideoff );
    //When toggle is clicked show the slideout
    $( toggle ).on('click', function () {
        if ( $( slideout ).hasClass( 'hide' )) {
                $( slideout ).removeClass( 'hide').addClass( 'unhide' ).animate({
                    opacity: 1,
                    marginLeft: 0,
                }, 500, function() {
                    //I can haz callback?
                });
        } else {
            $( slideout ).animate({
                opacity: 0,
                marginLeft: slideoff,
            }, 500, function() {
                $( slideout ).addClass( 'hide').removeClass( 'unhide' );
            });

        }
   }); //end slideout function
}); //end noConflict