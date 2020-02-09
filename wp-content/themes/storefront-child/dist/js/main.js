(function($){
    $(document).ready(function (){
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:false,
            items:1,
            lazyLoad:true,
            autoplay: true,

        });
        /** HANDLE NAV HEADER */
        $('#menu-main-menu').prepend('<li class="nav-item"><a href="#" ><i class="fa fa-home"></i></a></li>');
        $('#menu-main-menu.navbar-nav li.nav-item.menu-item-has-children').children('a').append(' <i class="child fa fa-angle-down"></i>');
        $('#menu-main-menu.navbar-nav li.nav-item.menu-item-has-children').hover(function(){
            $(this).children('ul')[0].style.display = 'block';
        }, function(){
            $(this).children('ul')[0].style.display = 'none'; 
        });
        /** HANDLE STICKY NAV */
        $(window).scroll(function(){
            let scroll = $(window).scrollTop();
            if (scroll >= 200) {
                $("#masthead").addClass("sticky");
            }else{
                $("#masthead").removeClass("sticky");
            }
        });
    });
})(jQuery);


