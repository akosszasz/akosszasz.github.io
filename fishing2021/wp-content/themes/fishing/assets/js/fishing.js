$( document ).ready(function () {
    var fishInit = function () {
        
        // Menu trigger
        $( '.nav-trigger' ).click(function () {
            $( '.header__menu' ).slideToggle();
        });

        var bgRand = Math.floor((Math.random() * 8) + 1);
        var bgImg = 'url(http://fishingonorfu.hu/wp-content/themes/fishing/assets/img/bg_0' + bgRand + '.jpg)';
        $('body').css( 'background-image', bgImg );

    };
    fishInit();
});