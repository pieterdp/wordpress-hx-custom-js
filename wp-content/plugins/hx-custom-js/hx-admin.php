<?php

function hx_custom_js_menu() {
    add_options_page('Add custom JS code', 'Helptux Custom JS', 'manage_options', 'hx-custom-js-admin', 'hx_custom_js_options');
    add_action('admin_init', 'hx_custom_js_register_settings');
}

function hx_custom_js_register_settings() {
    register_setting('hx_custom_js_options', 'hx_custom_js_code');
    add_settings_section('hx_custom_js_code_s', 'Custom JS snippet', 'hx_custom_js_code_s_cb', 'hx_custom_js_options');
    add_settings_field('hx_custom_js_code_f', 'Custom JS snippet', 'hx_custom_js_code_f_cb', 'hx_custom_js_options', 'hx_custom_js_code_s');
}

function hx_custom_js_code_s_cb () {
    echo '<p>Enter a custom JS snippet to be included in the &lt;head&gt;&lt;/head&gt; section.</p>';
}

function hx_custom_js_code_f_cb () {
    $s = get_option('hx_custom_js_code');
    $c = '<textarea class="widefat" name="hx_custom_js_code" id="hx_custom_js_code" rows="3" cols="100">%s</textarea>';
    echo sprintf($c, $s);
}

function hx_custom_js_options() {
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }
    ?>
    <div class="wrap">
        <h1>Custom JS</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('hx_custom_js_options');
            do_settings_sections('hx_custom_js_options');
            submit_button();
            ?>
        </form>
    </div>
<?php
}