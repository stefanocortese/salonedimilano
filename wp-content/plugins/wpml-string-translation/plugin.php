<?php
/*
Plugin Name: WPML String Translation
Plugin URI: https://wpml.org/
Description: Adds theme and plugins localization capabilities to WPML. <a href="https://wpml.org">Documentation</a>.
Author: OnTheGoSystems
Author URI: http://www.onthegosystems.com/
Version: 2.0.8
*/

if(defined('WPML_ST_VERSION')) return;

define('WPML_ST_VERSION', '2.0.8');
define('WPML_ST_PATH', dirname(__FILE__));

require WPML_ST_PATH . '/inc/constants.php';
require WPML_ST_PATH . '/inc/wpml-string-translation.class.php';
require WPML_ST_PATH . '/inc/widget-text.php';

if ( defined( 'ICL_SITEPRESS_VERSION' ) && version_compare( ICL_SITEPRESS_VERSION, '3.2', '>=' ) ) {
	//@since 2.1 Create instance of WPML_String_Translation using dependencies hook
	function icl_st_startup() {
		global $WPML_String_Translation;
		$WPML_String_Translation = new WPML_String_Translation();
	}

	add_action( 'wpml_load_dependencies', 'icl_st_startup' );
} else {
	//Legacy WPML_String_Translation instance
	global $sitepress;
	if ( isset( $sitepress ) ) {
		global $WPML_String_Translation;
		$WPML_String_Translation = new WPML_String_Translation();
	}
}