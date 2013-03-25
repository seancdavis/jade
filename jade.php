<?php
/*
Plugin Name: Jade
Plugin URI: http://rocktreedesign.com
Description: Jade enables you to manage a <strong>list of products</strong>. It comes with shortcodes that let you feature certain products, or print a list of products. 
Version: 0.1
Author: rocktree Design
Author URI: http://rocktreedesign.com
License: ???
*/

/* Load Files
-------------------------------------------------------------------------------- */
require_once( dirname(__FILE__) . '/rocktree-core.php' ); // REQUIRED!!! installs rocktree-core files if necessary
require_once(dirname(__FILE__) . '/widgets.php'); // custom widgets

/* The Values Array
-------------------------------------------------------------------------------- */
$gs_vals = array(
	'Email' => array(
		'email_notification' => array(
			'name' => 'email_notification',
			'label' => 'Email Notification:',
			'type' => 'boolean',
			'default' => false,
			'after' => '&nbsp;&nbsp;<i>Send email notification upon form submission?</i>'
		),
		'email' => array(
			'name' => 'email',
			'label' => 'Email Address:',
			'type' => 'text',
			'default' => 'you@yourdomain.com',
			'before' => '<p><i>Address to send email notification.</i></p>'
		),
	),
	'Button' => array(
		'button_bkg' => array(
			'name' => 'button_bkg',
			'label' => 'Button Background Color',
			'type' => 'color',
			'default' => '#333333',
		),
		'button_text' => array(
			'name' => 'button_text',
			'label' => 'Button Text',
			'type' => 'text',
			'default' => 'Send Message',
		)
	)
);

$gs_args = array(
	'post_type' => 'rt_mrcf',
	'title' => 'Contact Form Settings',
	'menu_title' => 'Settings',
	'menu_slug' => 'rt_mrcf_settings',
	'script_dir' => plugins_url() . '/moon-rock-contact-form/admin/settings.js',
	'style_dir' => plugins_url() . '/moon-rock-contact-form/admin/settings.css',
	
);

$args = array(
	'name' => 'Contact Form',
	'prefix' => 'mrcf',
	'dir' => 'moon-rock-contact-form',
	'shortcode' => 'mrcf',
	'shortcode_dir' => dirname(__FILE__) . '/shortcode.php',
	'post_type' => 'rt_mrcf',
	'item' => 'Message',
	'description'   => 'Enables you to build and display a contact form, and saves all entries on your site',
	'menu_position' => 25,
	'script_dir' => plugins_url() . '/moon-rock-contact-form/scripts.js', 
	'style_dir' => plugins_url() . '/moon-rock-contact-form/style.css',
	'dynamic_style_dir' => dirname(__FILE__) . '/custom-style.php',
);

if( is_dir( dirname(dirname(__FILE__)) . '/rocktree-core/rocktree-core' ) ) {
	$mrcf_gs = new GiftShop($gs_args, $gs_vals);
	$moon_rock = new Rock($args);
	$MyUpdateChecker = new PluginUpdateChecker(
	    'http://wp-plugins.rocktreedesign.com/jade/update.json',
	    __FILE__,
	    'jade',
	    1
	);
}


?>