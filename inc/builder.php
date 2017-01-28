<?php

function wpsman_build_script_file ( $filename, $file_list, $delimiter = PHP_EOL ) {
	$result = false;

	if ( ! file_exists( WPSMAN_SCRIPTS_DIR ) ) {
		wp_mkdir_p( WPSMAN_SCRIPTS_DIR );
	}

	$build_content = '';

	if ( WP_DEBUG ) {
		$build_content .= '/** Build date: ' . date('l jS \of F Y h:i:s A') . ' */' . PHP_EOL;
	}

	foreach ( $file_list as $file ) {
		$build_content .= file_get_contents( $file ) . $delimiter;
	}

	$result = file_put_contents( WPSMAN_SCRIPTS_DIR . '/' . $filename, $build_content );


	return !empty( $result );
}