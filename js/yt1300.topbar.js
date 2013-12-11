
jQuery(document).ready(function($) {

    $(function(){
        $('#masthead').data('size','big');
    });

    $(window).scroll(function(){
        var $nav = $('#masthead');
        if ($('body').scrollTop() > 0) {
            if ($nav.data('size') == 'big') {
                $('#top-bar-widgets').css('display', 'none');
                $('nav#primary-navigation').css({
                    display: 'inline',
                    top: '0px',
                });
                $('.header-main').fadeOut("fast");
                $('nav#primary-navigation').animate({
                    paddingLeft: $( 'h1.site-title' ).width() + 45 + 'px',
                }), {queue:false, duration:600};
                $('nav#primary-navigation').css('top', '0px');
                $nav.data('size','small').stop().animate({
                    height:'48px'
                }, 600);
                $('.header-main').animate({
                    left:200, opacity:"show"}, 600);
            };
        }
        else {
            if ($nav.data('size') == 'small') {
                $('#top-bar-widgets').css('display', 'inline');
                $('nav#primary-navigation').animate({
                    display: 'block',
                    top: '40px',
                }), {queue:false, duration:600}; ;
                $('nav#primary-navigation').animate({
                    paddingLeft: '30px',
                }), {queue:false, duration:600};             $nav.data('size','big').stop().animate({
                    height:'88px'
                }, 600);

            }
        }
    });

}); //end jQuery noConflict wrapper