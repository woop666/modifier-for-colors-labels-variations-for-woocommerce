<?php
/**
 * Main class
 *
 */

if ( !defined( 'DCLV' ) ) { exit; } // Exit if accessed directly

if( !class_exists( 'DCLV' ) ) {
    /**
     *
     * @since 1.0.0
     */
    class DCLV {

        /**
         * Plugin object
         *
         * @var string
         * @since 1.0.0
         */
        public $obj = null;

        /**
         * Constructor
         *
         * @return mixed|DCLV_Admin|DCLV_Frontend
         * @since 1.0.0
         */
        public function __construct() {

            // actions
            add_action( 'init', array( $this, 'init' ) );

            if( is_admin() ) {
                $this->obj = new DCLV_Admin( DCLV_VERSION );
            }  else {
                $this->obj = new DCLV_Frontend( DCLV_VERSION );
            }

            // add new attribute types
            add_filter( 'product_attributes_type_selector', array( $this, 'attribute_types' ), 10, 1 );

        }

        /**
         * Add new attribute types to standard WooCommerce
         *
         */
        public function attribute_types( $default_type ){
            $custom = dclv_get_custom_tax_types();
            return is_array( $custom ) ? array_merge( $default_type, $custom ) : $default_type;
        }



        /**
         * Init method
         *
         * @access public
         * @since 1.0.0
         */
        public function init() {}

    }
}