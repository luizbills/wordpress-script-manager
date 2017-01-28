# WP Script Manager

Enqueue and concatenates javascript and css files.

## Usage

```php
<?php

add_action( 'wpsman_add_javascript_files', 'prefix_theme_javascript_files' );
function prefix_theme_javascript_files () {
	wpsman_add_javascript( get_stylesheet_directory() .  '/assets/js/framework.js' );
	wpsman_add_javascript( get_stylesheet_directory() .  '/assets/js/app.js' );
}

add_action( 'wpsman_add_css_files', 'prefix_theme_css_files' );
function prefix_theme_css_files () {
	wpsman_add_css( get_stylesheet_directory() .  '/assets/css/grid.css' );
	wpsman_add_css( get_stylesheet_directory() .  '/assets/css/layout.css' );
}
```

## Functions

### `wpsman_add_javascript ( string filepath, int priority = 10 )`

Used to add javascript files. All files added will be concatenated.
Note: *This function should be called using the `wpsman_add_javascript_files` action hook.*

#### Arguments

##### `string filepath`

the absolute path of the file.

##### `int priority` (optional)

Used to specify the order in which the functions associated with a particular action are executed. Lower numbers correspond with earlier execution, and functions with the same priority are executed in the order in which they were added to the action.
Default value: 10

#### Return
Nothing.

### `wpsman_add_css ( string filepath, int priority = 10 )`
The same API as `wpsman_add_javascript`. But is used to css files.
Note: *This function should be called using the `wpsman_add_css_files` action hook.*

## Hooks

### Action `wpsman_add_javascript_files`
It's the proper hook to use when adding items with `wpsman_add_javascript` function.

### Action `wpsman_add_css_files`
It's the proper hook to use when adding items with `wpsman_add_css` function.

## LICENSE

GPLv2+