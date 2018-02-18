<?php
/**
 * Functions
 *
 * @author woop666
 * @package Modifier For Display Color Label Variations
 * @version 1.0.0
 */

if( ! function_exists( 'dclv_get_term_meta' ) ) {
	function dclv_get_term_meta( $term_id, $key, $single = true ) {
		if ( dclv_check_wc_version( '2.6', '>=' ) ) {
			return function_exists( 'get_term_meta' ) ? get_term_meta( $term_id, $key, $single ) : get_metadata( 'woocommerce_term', $term_id, $key, $single );
		} else {
			return get_woocommerce_term_meta( $term_id, $key, $single );
		}
	}
}

if( ! function_exists( 'dclv_update_term_meta' ) ) {
	function dclv_update_term_meta( $term_id, $meta_key, $meta_value, $prev_value = '' ) {
		if ( dclv_check_wc_version( '2.6', '>=' ) ) {
			return function_exists( 'update_term_meta' ) ? update_term_meta( $term_id, $meta_key, $meta_value, $prev_value ) : update_metadata( 'woocommerce_term', $term_id, $meta_key, $meta_value, $prev_value );
		} else {
			return update_woocommerce_term_meta( $term_id, $meta_key, $meta_value, $prev_value = '' );
		}
	}
}

if( ! function_exists( 'dclv_check_wc_version' ) ) {
	function dclv_check_wc_version( $version, $operator ) {
		return version_compare( WC()->version, $version, $operator );
	}
}

if( ! function_exists( 'dclv_get_custom_tax_types' ) ) {
	function dclv_get_custom_tax_types() {
		return apply_filters( 'dclv_get_custom_tax_types', array(
			'colorpicker' 	    => __( 'Colorpicker', 'modifier-for-display-colors-labels-variations' ),
			'round_color' 		=> __( 'Colorpicker in circular', 'modifier-for-display-colors-labels-variations' ),
			'color_desc' 		=> __( 'Description after colorpicker', 'modifier-for-display-colors-labels-variations' ),
			'tooltip_color'		=> __( 'Tooltip above colorpicker', 'modifier-for-display-colors-labels-variations' ),
			'two_colorpicker'	=> __( 'Two colorpicker', 'modifier-for-display-colors-labels-variations' ),
			'round_two_color' 	=> __( 'Two colorpicker in circular', 'modifier-for-display-colors-labels-variations' ),
			'two_color_desc' 	=> __( 'Description after two colorpicker', 'modifier-for-display-colors-labels-variations' ),
			'tooltip_two_color' => __( 'Tooltip above two colorpicker', 'modifier-for-display-colors-labels-variations' ),
			'image'       		=> __( 'Image', 'modifier-for-display-colors-labels-variations' ),
			'round_image' 		=> __( 'Image in circular', 'modifier-for-display-colors-labels-variations' ),
			'tooltip_image' 	=> __( 'Tooltip above image', 'modifier-for-display-colors-labels-variations' ),
			'desc_image' 		=> __( 'Description after image', 'modifier-for-display-colors-labels-variations' ),
			'label'			 	=> __( 'Label', 'modifier-for-display-colors-labels-variations' )
		) );
	}
}