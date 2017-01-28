<?php
/**
 * WP Script Manager
 * Enqueue and concatenates javascript and css files.
 * @version 1.0.0
 */

$upload_dir = wp_upload_dir();

define( 'WPSMAN_VERSION', '1.0.0' );
define( 'WPSMAN_SCRIPTS_DIR', $upload_dir['basedir'] . '/wpsman' );
define( 'WPSMAN_SCRIPTS_URL', $upload_dir['baseurl'] . '/wpsman' );

if ( !wp_is_writable( $upload_dir['basedir'] ) ) {
	// the error notice that show when 'uploads' directory is not writable
	add_action( 'admin_notices', 'wpsman_error_notice' );
	function wpsman_error_notice (){
		$class = 'notice notice-error';
		$message = __( 'Your <code>uploads</code> directory is <strong>not writable</strong>. This is necessary for <strong>WP Script Manager</strong> to work.', 'wpsman' );
		printf( '<div class="%1$s"><p>%2$s</p></div>', $class, $message );
	}
} else {
	include 'inc/builder.php';
	include 'inc/hooks.php';
	include 'inc/functions.php';
}