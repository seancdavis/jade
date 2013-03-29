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
require_once(dirname(__FILE__) . '/widgets.php'); // custom widgets

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
	'Product_Display' => array (
		'box_color' => array(
			'name' => 'box_color',
			'label' => 'Box Background:',
			'type' => 'color',
			'default' => '#68c5d7'
		),
		'button_color' => array(
			'name' => 'button_color',
			'label' => 'Button Color:',
			'type' => 'color',
			'default' => '#3fb5cc'
		),
		'button_hover' => array(
			'name' => 'button_hover',
			'label' => 'Button Hover Color:',
			'type' => 'color',
			'default' => '#288597',
		),
		'preview_button_text' => array(
			'name' => 'preview_button_text',
			'label' => 'Preview Button Text:',
			'type' => 'text',
			'default' => 'Product Preview',
			'help' => 'The text that will appear as a button link to a sample or preview of your product.'
		),
		'learn_more_button_text' => array(
			'name' => 'learn_more_button_text',
			'label' => 'Learn More Button Text:',
			'type' => 'text',
			'default' => 'Learn More',
			'help' => 'The text that will appear as a button link to more information about your product.'
		)
	),
	'Featured_Product' => array(
		'featured_product' => array(
			'name' => 'featured_product',
			'label' => 'Featured Product:',
			'type' => 'post_type_single_option',
			'default' => ''
		),
		'title_background' => array(
			'name' => 'title_background',
			'label' => 'Title Background Color:',
			'type' => 'color',
			'default' => '#288597',
			'help' => 'We suggest you go darker than your buttons, but of the same hue.'
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
	//'taxonomies' => array('category')
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
		'label' => 'Preview URL:',
		'type' => 'media'
	),
	'_learn_more' => array(
		'label' => 'Learn More URL:',
		'type' => 'text',
		'after' => '<p><i>Use if you want to link to another page or site for more information.</i></p>'
	),
	'_lm_new_window' => array(
		'label' => 'Open Learn More Link in New Window?',
		'type' => 'boolean'
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