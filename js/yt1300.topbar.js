
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
                $('#header-main').fadeOut("fast");
                $('nav#primary-navigation').animate({
                    paddingLeft: '25%',
                }), {queue:false, duration:600};
                $('nav#primary-navigation').css('top', '0px');
                $nav.data('size','small').stop().animate({
                    height:'50px'
                }, 600);
                $('#header-main').animate({
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
                    paddingLeft: '0px',
                }), {queue:false, duration:600};             $nav.data('size','big').stop().animate({
                    height:'100px'
                }, 600);

            }
        }
    });

}); //end jQuery noConflict wrapper