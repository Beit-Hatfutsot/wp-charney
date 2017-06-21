<?php
/**
 * Google Drive functions
 *
 * @author		Beit Hatfutsot
 * @package		charney/functions
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * charney_save_google_drive_item_fields
 *
 * This function saves Google Drive item specific fields as post's ACF custom fields
 *
 * @param	$post_id (int) Post ID
 * @return	N/A
 */
function charney_save_google_drive_item_fields( $post_id, $post, $update ) {

	// Variables
	$format = get_post_format( $post_id );

	if ( ! in_array( $format, array( 'video', 'audio', 'link' ) ) )
		return;

	// Get Drive item ID
	if ( function_exists('get_field') ) {
		$drive_item_id = get_field( 'acf-post-attributes_google_drive_id', $post_id );
	}

	if ( ! $drive_item_id )
		return;

	require_once THEME_ROOT . '/api/google-api-php-client-2.1.3/vendor/autoload.php';

	define( 'APPLICATION_NAME', 'Charney Drive API' );
	define( 'GOOGLE_APPLICATION_CREDENTIALS', THEME_ROOT . '/api/charney-drive-api-credentials.json' );
	define( 'SCOPES', implode( ' ', array( Google_Service_Drive::DRIVE_READONLY ) ) );

	// Get the API client and construct the service object
	$client = charney_get_google_client();
	$service = new Google_Service_Drive($client);

	$fields = array(
		'url'		=> 'webViewLink',
		'duration'	=> 'videoMediaMetadata/durationMillis'
	);

	try {

		$results = @$service->files->get( $drive_item_id, array( 'fields' => implode( ',', $fields ) ) );

	} catch (Exception $e) {

		return;

	}

	if ( ! $results )
		return;

	foreach ( $fields as $key => $val ) {

		$keys_arr = explode('/', $val);

		if ( ! isset( $results[ $keys_arr[0] ] ) )
			continue;

		$f = $results[ $keys_arr[0] ];

		for ( $i = 1 ; count( $keys_arr ) > $i ; $i++ ) {
			if ( ! isset( $f[ $keys_arr[$i] ] ) )
				continue 2;

			$f = $f[ $keys_arr[$i] ];
		}

		if ( isset( $f ) ) {
			// Update ACF custom field
			update_field( 'acf-post-attributes_google_' . $key, $f, $post_id );
		}

	}

}
add_action( 'save_post', 'charney_save_google_drive_item_fields', 10, 3 );

/**
 * charney_get_google_client
 *
 * This function returns Google Client obj
 *
 * @param	N/A
 * @return	(obj)
 */
function charney_get_google_client() {

	$client = new Google_Client();

	$client->setApplicationName( APPLICATION_NAME );
	$client->setScopes( SCOPES );
	$client->setAuthConfig( GOOGLE_APPLICATION_CREDENTIALS );
	$client->setAccessType( 'offline' );

	// return
	return $client;

}