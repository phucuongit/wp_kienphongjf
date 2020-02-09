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
        echo '<div id="support-online" class="hero-panel">
                <h3 class="panel-header"><i class="fa fa-comments-o"></i>Hỗ trợ trực tuyến</h3>
            <div class="panel-body">';
        echo '<div class="account rows">
                        <p class="name">Ms Trancy</p>
                        <a target="_blank" href="skype:Sandy.nguyen14?chat" rel="nofollow">
                            <img class="sky" src="http://nsvn.vn/template/img/skype.png" alt="Sandy.nguyen14" width="30px">
                        </a>
                        <div class="phone">+84 93 448 93 29</div>
                    </div>
                    <!-- account -->
                    <div class="account rows">
                        <p class="name">Ms Thasa</p>
                        <a target="_blank" href="skype:nguyen.thsa2301?chat" rel="nofollow">
                            <img class="sky" src="http://nsvn.vn/template/img/skype.png" alt="nguyen.thsa2301" width="30px">
                        </a>
                        <div class="phone">0084 902 819 638</div>
                    </div>
                    <!-- account -->
                </div>
                <!-- panel-body -->
            </div>';
    }

    // Widget Backend 
    public function form($instance)
    {

    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
     
    }
} // Class wpb_widget ends here
