<?php

function wpsman_add_javascript ( $filepath, $priority = 10 ) {
	add_filter( 'wpsman_javascript_files', function ( $files ) use ( $filepath ) {
		$files[] = $filepath;
		return $files;
	}, $priority );
}

function wpsman_add_css ( $filepath, $priority = 10 ) {
	add_filter( 'wpsman_css_files', function ( $files ) use ( $filepath ) {
		$files[] = $filepath;
		return $files;
	}, $priority );
}