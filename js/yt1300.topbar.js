$(function(){
    $('#header_nav').data('size','big');
});

$(window).scroll(function(){
    var $nav = $('#header_nav');
    if ($('body').scrollTop() > 0) {
        if ($nav.data('size') == 'big') {
            $('#top-bar-widgets').css('display', 'none');
            $('#header-menu').css({
                display: 'inline',
                top: '0px',
            });
            $('#header-logo').fadeOut("fast");
            $('#header-menu').animate({
                paddingLeft: '25%',
            }), {queue:false, duration:600};
            $('#header-menu').css('top', '0px');
            $nav.data('size','small').stop().animate({
                height:'50px'
            }, 600);
            $('#header-logo').animate({
                left:200, opacity:"show"}, 600);
        };
    }
    else {
        if ($nav.data('size') == 'small') {
            $('#top-bar-widgets').css('display', 'inline');
            $('#top-wrap').css('display', 'inline');
            $('#header-menu').animate({
                display: 'block',
                top: '40px',
            }), {queue:false, duration:600}; ;
            $('#header-menu').animate({
                paddingLeft: '0px',
            }), {queue:false, duration:600};             $nav.data('size','big').stop().animate({
                height:'100px'
            }, 600);

        }
    }
});