<?php
/**
 * Helper functions
 *
 * @author		Beit Hatfutsot
 * @package		charney/functions
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * charney_maybe_get
 *
 * This function returns a variable if it exists in an array
 *
 * @param	$array (array) The array to look within
 * @param	$key (key) The array key to look for
 * @param	$default (mixed) The value returned if not found
 * @return	(mixed)
 */
function charney_maybe_get( $array, $key, $default = null ) {

	// Return default if does not exist
	if( ! isset( $array[ $key ] ) ) {

		return $default;

	}

	// return
	return $array[ $key ];

}

/**
 * charney_milliseconds_to_time
 *
 * This function converts milliseconds to time format
 *
 * @param	$milliseconds (int)
 * @return	(string)
 */
function charney_milliseconds_to_time( $milliseconds ) {

	$seconds 	= intval( (int)$milliseconds / 1000 );
	$minutes 	= intval( (int)$seconds / 60 );
	$hours		= intval( (int)$minutes / 60 );

	// return
	return sprintf( '%02d:%02d:%02d', $hours, $minutes%60, $seconds%60 );

}