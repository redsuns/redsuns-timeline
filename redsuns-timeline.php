<?php
/*
Plugin Name: Redsuns Timeline
Plugin URI: https://github.com/redsuns/redsuns-timeline
Description: Creates manageable Timeline items for Knight Labs TimelineJs <a href="http://timeline.knightlab.com">http://timeline.knightlab.com</a>. <strong>ATTENTION:</strong> This plugin requires Advanced Cutsom Fields it to be installed and enabled.
Author: Redsuns 
Version: 0.1
Require: Advanced Custom Fields
Author URI: http://redsuns.com.br
Text Domain: redsuns-timeline
*/

require_once __DIR__ . '/includes/post-type.php';
require_once __DIR__ . '/includes/install.php';
require_once __DIR__ . '/includes/shortcode.php';

/**
* Turns the plugin localization
*/
load_plugin_textdomain( 'redsuns-timeline', false, plugin_basename( __DIR__ ) . '/languages' );

/**
 * Creates Advanced Custom Fields needed for timeline
 */
register_activation_hook( __FILE__, 'start_install' );