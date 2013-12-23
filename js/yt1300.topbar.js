jQuery(document).ready(function($) {
    //set element ID/classes in vars
    social = '#top-social';
    nav = 'nav#primary-navigation';
    headerMain = '.header-main';

    //function for changing sizes
    $(function(){
        $('#masthead').data('size','big');
    });

    $(window).scroll(function(){
        //set container of the nav element
        var $nav = $('#masthead');
        //when scrolled away from top
        if ($('body').scrollTop() > 0) {
            if ($nav.data('size') == 'big') {
                $( social ).css('display', 'none');
                $( nav ).css({
                    display: 'inline',
                    top: '0px',
                });
                $( headerMain ).fadeOut("fast");
                $( nav ).animate({
                    paddingLeft: $( 'h1.site-title' ).width() + 45 + 'px',
                }), {queue:false, duration:600};
                $( nav ).css('top', '0px');
                $nav.data('size','small').stop().animate({
                    height:'48px'
                }, 600);
                $( headerMain ).animate({
                    left:200, opacity:"show"}, 600);
            };
        }
        //when scrolled back
        else {
            if ($nav.data('size') == 'small') {
                $( social ).css('display', 'inline');
                $( nav ).animate({
                    display: 'block',
                    top: '40px',
                }), {queue:false, duration:600}; ;
                $( nav ).animate({
                    paddingLeft: '30px',
                }), {queue:false, duration:600};
                $nav.data('size','big').stop().animate({
                    height:'88px'
                }, 600);
            }
        }
    });
    //fix the margins for #main content
    var adminbarHeight = $( '#wpadminbar' ).height();
    var mastHeight = $( '#masthead' ).height();
    $( '#masthead').css({
        marginTop:  adminbarHeight + 'px',
    })
    $( '#main').css({
        marginTop: mastHeight + 'px',
    })
}); //end jQuery noConflict wrapper