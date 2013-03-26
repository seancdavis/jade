<?php
/*
Plugin Name: Jade
Plugin URI: http://rocktreedesign.com
Description: Jade enables you to manage a <strong>list of products</strong>. It comes with shortcodes that let you feature certain products, or print a list of products. 
Version: 0.1
Author: rocktree Design
Author URI: http://rocktreedesign.com
License:
*/

/* Load Files
-------------------------------------------------------------------------------- */
require_once( dirname(__FILE__) . '/rocktree-core.php' ); // REQUIRED!!! installs rocktree-core files if necessary

// this file doesn't exist right now. Will want to copy widget.php from another plugin.
//require_once(dirname(__FILE__) . '/widgets.php'); // custom widgets

/* Gift Shop (Options Page)
-------------------------------------------------------------------------------- */
// page setup
$gs_setup = array(
	'post_type' => 'rt_jade',
	'title' => 'Products Settings',
	'menu_title' => 'Settings',
	'menu_slug' => 'rt_jade_settings',
);

// options control
$gs_options = array(
	'List_Options' => array (
		'button_color' => array(
			'name' => 'button_color',
			'label' => 'Button Color:',
			'type' => 'color',
			'default' => '#68c5d7'
		)
	),
	'Featured_Product' => array(
		'featured_product' => array(
			'name' => 'featured_product',
			'label' => 'Featured Product:',
			'type' => 'post_type_single_option',
			'default' => ''
		),
	),
);

/* Post Type Setup
-------------------------------------------------------------------------------- */
$post_type_options = array(
	'name' => 'Products',
	'prefix' => 'jade',
	'dir' => 'jade',
	'shortcode' => 'products',
	'shortcode_dir' => dirname(__FILE__) . '/shortcode.php',
	'post_type' => 'rt_jade',
	'item' => 'Product',
	'description'   => 'Manage your list of products.',
	'menu_position' => 30,
	'script_dir' => plugins_url() . '/jade/scripts.js', 
	'style_dir' => plugins_url() . '/jade/style.css',
	'dynamic_style_dir' => dirname(__FILE__) . '/custom-style.php',
);

/* Post Type Meta Options
-------------------------------------------------------------------------------- */
$meta_options = array(
	'setup' => array(
		'id' => 'rt_product_meta',
		'title' => 'Product Details'
	),
	'_price' => array(
		'label' => 'Price (USD):',
		'type' => 'text',
		'before' => '',
		'after' => ''
	),
	'_sample_profile' => array(
		'label' => 'Sample Profile URL:',
		'type' => 'media'
	),
	
);

/* File Loader
-------------------------------------------------------------------------------- */
if( is_dir( dirname(dirname(__FILE__)) . '/rocktree-core/rocktree-core' ) ) {
	$jade = new GiftShop($gs_setup, $gs_options);
	$jade_rock = new Rock($post_type_options, $meta_options);
	$MyUpdateChecker = new PluginUpdateChecker(
	    'http://wp-plugins.rocktreedesign.com/jade/update.json',
	    __FILE__,
	    'jade',
	    1
	);
}


?>