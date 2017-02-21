<?php
/**
 * Functions
 *
 * @author		Beit Hatfutsot
 * @package		charney
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Theme configuration
require_once('functions/config.php');

// Theme
require_once('functions/theme.php');

// Scripts and styles
require_once('functions/scripts-n-styles.php');

// Admin login tweaks
require_once('functions/admin/login.php');

if ( is_admin() ) {
	// Admin header tweaks
	require_once('functions/admin/header.php');

	// Admin footer tweaks
	require_once('functions/admin/footer.php');
}

// Sidebars
require_once('functions/sidebars.php');

// Menus
require_once('functions/menus.php');

// ACF configuration
require_once('functions/acf/acf-configuration.php');

if ( ! defined( 'USE_LOCAL_ACF_CONFIGURATION' ) || ! USE_LOCAL_ACF_CONFIGURATION ) {
	// ACF Field Groups
	require_once('functions/acf/acf-field-groups.php');
}