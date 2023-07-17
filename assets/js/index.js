$(document).ready(function() {
    $(".menu").on('click', 'li', function _() {
        $(this).addClass("selected");
    });

    $(".chatbox").on('click', '#tooglePassvisibility'  ,function () {
        var element = $(this);
        element.on('click', function () {
            if (element.siblings('input').attr('type') === 'text') {
                element.siblings('input').attr('type', 'password');
            } else {
                element.siblings('input').attr('type', 'text');
            }
        });
    });

    /**
   * Animation on scroll function and init
   */
    function aos_init() {
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
            once: false,
            mirror: false
        });
    }
    window.addEventListener('load', () => {
        aos_init();
    });
});
