<?php

use WPSeeders\Load;

/**
 * Plugin Name:     WP Seeders
 * Plugin URI:      https://github.com/aigen31/wp-seeders
 * Description:     Create terms in WordPress using WP CLI.
 * Author:          IntelliDev
 * Author URI:      https://github.com/aigen31
 * Text Domain:     wp-seeders
 * Domain Path:     /languages
 * Version:         0.1.1
 *
 * @package         wp_seeders
 */

if (! function_exists('wp_seeders_activate')) {
  function wp_seeders_activate()
  {
    add_option('wp_seeders_active', 'true');
  }
}

register_activation_hook(__FILE__, 'wp_seeders_activate');

if (! function_exists('wp_seeders_deactivate')) {
  function wp_seeders_deactivate()
  {
    delete_option('wp_seeders_active');
  }
}

register_deactivation_hook(
  __FILE__, 'wp_seeders_deactivate'
);

require_once __DIR__ . '/vendor/autoload.php';

Load::init();