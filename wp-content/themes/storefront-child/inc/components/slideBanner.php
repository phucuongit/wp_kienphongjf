<?php

add_action( 'homeSlide', 'create_slider', 10 );

if(!function_exists('create_slider')){
    function create_slider(){
        $images = get_field('image_slide');
        $output='<div class="owl-carousel owl-theme">';
        if(isset($images)){
            foreach($images as $image){
                $output .= '<div class="item">
                    <div class="slide-item">
                        <img src="'.esc_url($image['url']).'"/> 
                    </div>
                </div>';
            }
        };
        $output .= '</div>';
       echo $output;
    }
}