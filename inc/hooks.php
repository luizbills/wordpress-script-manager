<?php

add_action( 'wp_enqueue_scripts', 'wpsman_build_javascript_and_css' );
function wpsman_build_javascript_and_css () {
	// build javascript
	do_action( 'wpsman_add_javascript_files' );

	$js_filename = apply_filters( 'wpsman_javascript_build_filename', 'scripts.js' );
	$js_files = apply_filters( 'wpsman_javascript_files', array() );

	if ( count( $js_files ) > 0 ) {

		if ( wpsman_build_script_file( $js_filename, $js_files ) ) {
			do_action( 'wpsman_after_javascript_build', $js_filename );

			$handle = apply_filters( 'wpsman_enqueue_javascript_handle', 'wpsman_javascript', $js_filename );
			$src = apply_filters( 'wpsman_enqueue_javascript_src', WPSMAN_SCRIPTS_URL . '/' . $js_filename, $js_filename );
			$deps = apply_filters( 'wpsman_enqueue_javascript_deps', false, $js_filename );
			$version = apply_filters( 'wpsman_enqueue_javascript_version', filemtime( WPSMAN_SCRIPTS_DIR . '/' . $js_filename ), $js_filename );
			$in_footer = apply_filters( 'wpsman_enqueue_javascript_in_footer', true, $js_filename );

			wp_register_script( $handle, $src, $deps, $version, $in_footer );
			wp_enqueue_script( $handle );

			do_action( 'wpsman_after_javascript_enqueue', $js_filename, $handle );
		}

	}

	// build css
	do_action( 'wpsman_add_css_files' );

	$ccs_filename = apply_filters( 'wpsman_css_build_filename', 'styles.css' );
	$csss_files = apply_filters( 'wpsman_css_files', array() );

	if ( count( $css_files ) > 0 ) {

		if ( wpsman_build_script_file( $css_filename, $css_files ) ) {
			do_action( 'wpsman_after_css_build', $css_filename );

			$handle = apply_filters( 'wpsman_enqueue_css_handle', 'wpsman_css', $css_filename );
			$src = apply_filters( 'wpsman_enqueue_css_src', WPSMAN_SCRIPTS_URL . '/' . $css_filename, $css_filename );
			$deps = apply_filters( 'wpsman_enqueue_css_deps', false, $css_filename );
			$version = apply_filters( 'wpsman_enqueue_css_version', filemtime( WPSMAN_SCRIPTS_DIR . '/' . $css_filename ), $css_filename );
			$media = apply_filters( 'wpsman_enqueue_css_media', 'all', $css_filename );

			wp_register_style( $handle, $src, $deps, $version, $media );
			wp_enqueue_style( $handle );

			do_action( 'wpsman_after_css_enqueue', $css_filename, $handle );
		}

	}
}