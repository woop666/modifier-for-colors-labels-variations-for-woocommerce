<?php
/**
 * Plugin Name: Modifier For Display Color Label Variations
 * Plugin URI: 
 * Description: 
 * Version: 1.0.0
 * Author: woop666
 * Author URI: https://github.com/woop666
 *
 */
/* 

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if ( !defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly

if ( ! function_exists( 'dclv_plugin_registration_hook' ) ) {
	require_once 'plugin-options/dclv-plugin-registration-hook.php';
}
register_activation_hook( __FILE__, 'dclv_plugin_registration_hook' );

if ( ! defined( 'DCLV' ) ) {
	define( 'DCLV', true );
}
if ( ! defined( 'DCLV_URL' ) ) {
	define( 'DCLV_URL', plugin_dir_url( __FILE__ ) );
}
if ( ! defined( 'DCLV_DIR' ) ) {
	define( 'DCLV_DIR', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'DCLV_VERSION' ) ) {
	define( 'DCLV_VERSION', '1.0.0' );
}

function dclv_constructor() {
    global $woocommerce;
    if ( ! isset( $woocommerce ) ) return;

    load_plugin_textdomain( 'colors-labels-variations', false, dirname( plugin_basename( __FILE__ ) ). '/languages/' );

    // Load required classes and functions
    require_once('functions.php');
    require_once('class-dclv-admin.php');
    require_once('class-dclv-frontend.php');
    require_once('class-dclv.php');

    // Let's start the game!
    global $dclv;
    $dclv = new DCLV();
}
add_action( 'plugins_loaded', 'dclv_constructor' );

