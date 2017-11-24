<?php

class Hx_Custom_Js_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'hx_custom_js_w',
            'Custom JS Snippet'
        );
        add_action('widgets_init', function() {
            register_widget('Hx_CUstom_Js_Widget');
        });
    }

    public $args = array ();

    public function widget($args, $instance) {
        echo $instance['code'];
    }

    public function form($instance) {
        $code = '';
        if (! empty($instance['code'])) {
            $code = $instance['code'];
        }
        ?>
            <label for="<?php echo esc_attr($this->get_field_id('code')) ?>"><?php echo esc_attr_e('Custom JS snippet:', 'text_domain') ?></label>
        <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('code')) ?>" name="<?php echo esc_attr($this->get_field_name('code')) ?>" cols="100" rows="30"><?php echo $code ?></textarea>
<?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        if (!empty($new_instance['code'])) {
            $instance['code'] = $new_instance['code'];
        } else {
            $instance['code'] = $old_instance['code'];
        }
        return $instance;
    }

}
