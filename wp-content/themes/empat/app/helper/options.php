<?php
namespace empat\helper;

class options {

	/**
	 * Get ACF option
	 *
	 * @param  string
	 * @param  mixed
	 * @param  mixed
	 */
	public static function get( $name, $post_id = '', $default_value = null ) {
		if ( function_exists( 'get_field' ) ) {
			return $post_id == '' ? get_field( $name, 'option' ) : get_field( $name, $post_id );
		} else {
			return $default_value;
		}
	}

	/**
	 * Get ACF subfield option
	 *
	 * @param  string
	 * @param  mixed
	 */
	public static function get_sub( $name, $default_value = null ) {
		if ( function_exists( 'get_sub_field' ) ) {
			return get_sub_field( $name );
		} else {
			return $default_value;
		}
	}

}
