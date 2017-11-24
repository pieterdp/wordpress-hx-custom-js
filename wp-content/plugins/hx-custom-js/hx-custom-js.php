<?php
/*
Plugin Name: Helptux Custom JS
Plugin URI: https://github.com/pieterdp/wordpress-hx-custom-js
Version: 0.1.0
Description: Add custom JS snippets to your Wordpress blog.
Author: Pieter De Praetere
License: GPL3
 */

include_once(plugin_dir_path(__FILE__).'/hx-admin.php');
include_once(plugin_dir_path(__FILE__).'/hx-include-js.php');
include_once(plugin_dir_path(__FILE__).'/hx-widget.php');


/*
 * Hooks & registrations
 */
add_action('admin_menu', 'hx_custom_js_menu');
add_action('wp_head', 'add_js_code');
$hx_custom_js_widget = new Hx_Custom_Js_Widget();