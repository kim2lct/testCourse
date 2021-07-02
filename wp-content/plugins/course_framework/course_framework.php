<?php
/**
 * WP Plugin to manage course
 *
 
 *
 * Plugin Name:  Course Framework
 * Description:  Manage Course Template for Wordpress
 * Version:      1.0
 * Author:       Pexadesign
 * Author URI:   https://github.com/kim2lct
 * Text Domain:  pxa
 * Network:      true
 * Requires PHP: 7.0
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 */

/**
 * Main container class for the User Switching plugin.
 */
if ( !function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

define( 'PXA_VERSION', '1.0' );
define( 'PXA_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'PXA_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'PXA_PLUGIN', plugin_basename( __FILE__ ) );


if (file_exists( dirname(__FILE__) . '/vendor/autoload.php')){  
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

use PXA\Bootstrap;

if(Bootstrap::class){   
    Bootstrap::run();    
}