<?php

add_action( 'homeSlide', 'create_slider', 10 );

if(!function_exists('create_slider')){
    function create_slider(){
        echo '<div class="owl-carousel owl-theme">
                <div class="item">
                    <div class="slide-item">
                        <img src="'.get_stylesheet_directory_uri().'/img/slide1.png"/> 
                    </div>
                </div>
                <div class="item">
                    <div class="slide-item">
                        <img src="'.get_stylesheet_directory_uri().'/img/slide2.png"/> 
                    </div>
                </div>
                <div class="item">
                    <div class="slide-item">
                        <img src="'.get_stylesheet_directory_uri().'/img/slide3.png"/> 
                    </div>
                </div>
                <div class="item">
                    <div class="slide-item">
                        <img src="'.get_stylesheet_directory_uri().'/img/slide4.png"/> 
                    </div>
                </div>
       
    </div>';
    }
}