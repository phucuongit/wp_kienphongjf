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
        $('#menu-main-menu').prepend('<li class="nav-item"><a href="#" ><i class="fa fa-home"></i></a></li>');
        $('#menu-main-menu.navbar-nav li.nav-item.menu-item-has-children').children('a').append(' <i class="child fa fa-angle-down"></i>');
        $('#menu-main-menu.navbar-nav li.nav-item.menu-item-has-children').hover(function(){
            $(this).children('ul')[0].style.display = 'block';
        }, function(){
            $(this).children('ul')[0].style.display = 'none'; 
        });
    });
})(jQuery);


