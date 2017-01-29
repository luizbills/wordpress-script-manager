# WP Script Manager
Enqueue and concatenates javascript and css files.

## Usage
```php
<?php

include 'path/to/wp-script-manager.php';

add_action( 'wpsman_add_javascript_files', 'prefix_theme_javascript_files' );
function prefix_theme_javascript_files () {
	// That will concatenate all added javascript files into a build file (by default named as 'scripts.js')
	wpsman_add_javascript( get_stylesheet_directory() .  '/assets/js/framework.js' );
	wpsman_add_javascript( get_stylesheet_directory() .  '/assets/js/helper.js' );
	wpsman_add_javascript( get_stylesheet_directory() .  '/assets/js/app.js' );
}

add_action( 'wpsman_add_css_files', 'prefix_theme_css_files' );
function prefix_theme_css_files () {
	global $post;
	$post_slug = $post->post_name;
	
	wpsman_add_css( get_stylesheet_directory() .  '/assets/css/grid.css' );
	wpsman_add_css( get_stylesheet_directory() .  '/assets/css/layout.css' );
	
	if ( $post_slug == 'contact' ) {
		wpsman_add_css( get_stylesheet_directory() .  '/assets/css/contact-page.css' );
		// tip: change the name of build file (default is 'styles.css') to create another build file
		// it's useful when you are using a cache plugin
		add_filter( 'wpsman_css_build_filename', create_function( '$name', 'return "styles-contact.css";' );
	}
}
```

## Functions

### `wpsman_add_javascript ( string filepath, int priority = 10 )`
Used to add javascript files. All files added will be concatenated.

Note: *This function should be called using the `wpsman_add_javascript_files` action hook.*

#### Arguments

##### `string` filepath
the absolute path of the file.

##### `int` priority *(optional)*
Used to specify the order in which the functions associated with a particular action are executed. Lower numbers correspond with earlier execution, and functions with the same priority are executed in the order in which they were added to the action.

*Default value: __10__*

#### Return
Nothing.

### `wpsman_add_css ( string filepath, int priority = 10 )`
The same API as `wpsman_add_javascript`. But is used to css files.

*Note: This function should be called using the `wpsman_add_css_files` action hook.*

## Action Hooks

### `wpsman_add_javascript_files`
It's the proper hook to use when adding items with `wpsman_add_javascript` function.

### `wpsman_add_css_files`
It's the proper hook to use when adding items with `wpsman_add_css` function.

## Filter Hooks

### `wpsman_javascript_build_filename`
Used to change the name of the javascript build file.

*Default value: __scripts.js__*

### `wpsman_css_build_filename`
Used to change the name of the css build file.

*Default value: __styles.js__*

### `wpsman_build_delimiter`
The content added between each concatenated file.

*Default value: __PHP_EOL__ (a line break)*

### Other filters
- The javascript build file will be linked to the page with `wp_enqueue_script`. To change the arguments of this `wp_enqueue_script` you can use the filters `wpsman_enqueue_javascript_handle` (default: wpsman_javascript), `wpsman_enqueue_javascript_src`, `wpsman_enqueue_javascript_deps`, `wpsman_enqueue_javascript_version` and `wpsman_enqueue_javascript_in_footer` (default: `true`). *Note: the name of the build file is passed as 2nd argument on all these filters.*
- The css build file will be linked to the page with `wp_enqueue_style`. To change the arguments of this `wp_enqueue_style` you can use the filters `wpsman_enqueue_css_handle` (default: wpsman_css), `wpsman_enqueue_css_src`, `wpsman_enqueue_css_deps`, `wpsman_enqueue_css_version` and `wpsman_enqueue_css_in_media`. *Note: the name of the build file is passed as 2nd argument on all these filters.*

## LICENSE
GPLv2+
