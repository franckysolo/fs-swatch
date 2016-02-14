<?php
/**
 * @package     Swatch
 * @author      Franck Matherat - franckysolo@gmail.com
 * @version     1.0
 * @desc        Testing plugin development
 */
/*
 Plugin Name: Swatch 1.0
 Text Domain: fs-swatch
 Domain Path: /languages
 */
/*
 Plugin Name: Swatch 1.0
 Plugin URI:  http://github.com/franckysolo/fs-swatch
 Description: Display locale date and a dynamic swatch using JavaScript on dashboard, useless plugin!
 Version:     1.0
 Author:      Franck Matherat
 Author URI:  http://franckysolo-productions.com/
 License:     GPL2
 License URI: https://www.gnu.org/licenses/gpl-2.0.html
 Text Domain: fs-swatch
 Domain Path: /languages/
 */
__('Display locale date and a dynamic swatch using JavaScript on dashboard, useless plugin!', 'fs-swatch');

// safety loading
if (! defined('WPINC')) {
    die(__('Can be executed directly', 'fs-swatch'));
}

// Only on admin
if (is_admin()) {
    require_once(plugin_dir_path(__FILE__) . 'admin/fs-swatch.php');
    add_action('plugins_loaded', array('Fs_Swatch_Generator', 'getInstance'));
}