<?php
// Register and load the widget
function wpb_load_widget()
{
    register_widget('HotlineWidget');
}
add_action('widgets_init', 'wpb_load_widget');

// Creating the widget 
class HotlineWidget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

            // Base ID of your widget
            'support_online',

            // Widget name will appear in UI
            __('Support Online Widget', 'wpb_widget_domain'),

            // Widget description
            array('description' => __('Widget for hotline sidebar', 'wpb_widget_domain'),)
        );
    }

    // Creating widget front-end

    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        echo $args['after_widget'];
    }

    // Widget Backend 
    public function form($instance)
    {
        return $instance;
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
    }
} // Class wpb_widget ends here
function my_dynamic_sidebar_params($params)
{

    // get widget vars
    $widget_name = $params[0]['widget_name'];
    $widget_id = $params[0]['widget_id'];
    if ($widget_name != 'Support Online Widget') {

        return $params;
    }


    $params[0]['after_widget'] .=  '<div id="support-online" class="hero-panel">
                    <h3 class="panel-header"><i class="fas fa-comments"></i>'.get_field('title', 'widget_' . $widget_id).'</h3>
                <div class="panel-body">';
    while (the_flexible_field("contact", 'widget_' . $widget_id)) :
        if (get_row_layout() == 'new_contact') :
            $name = get_sub_field('name', 'widget_' . $widget_id);
            $phone_number = get_sub_field('phone_number', 'widget_' . $widget_id);
            $params[0]['after_widget'] .=  '<div class="account rows">';
            $params[0]['after_widget'] .=      '<p class="name">' . $name . '</p>';
            $params[0]['after_widget'] .=      '<a target="_blank" href="skype:Sandy.nguyen14?chat" rel="nofollow">';
            $params[0]['after_widget'] .=        '<img class="sky" src="http://nsvn.vn/template/img/skype.png" alt="Sandy.nguyen14" width="30px">';
            $params[0]['after_widget'] .=      '</a>';
            $params[0]['after_widget'] .=      '<div class="phone">' . $phone_number . '</div>';
            $params[0]['after_widget'] .=  '</div>';
        endif;
    endwhile;

    $params[0]['after_widget'] .= '</div>';
    $params[0]['after_widget'] .= '</div>';

    return $params;
}
add_filter('dynamic_sidebar_params', 'my_dynamic_sidebar_params');
