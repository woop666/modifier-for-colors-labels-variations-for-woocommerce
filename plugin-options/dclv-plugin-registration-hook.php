<?php
/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if( ! function_exists( 'dclv_plugin_registration_hook' ) ){
    function dclv_plugin_registration_hook(){

        /**
         */
        $hook = str_replace( 'activate_', '', current_filter() );

        $option   = get_option( 'dclv_recently_activated', array() );
        $option[] = $hook;
        update_option( 'dclv_recently_activated', $option );
    }
}
