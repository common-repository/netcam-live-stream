<?php
/**
 * Plugin Name: Netcam / Webcam Live Stream
 * Plugin URI: http://blocknot.es/
 * Description: Add a live video stream from a netcam / webcam in posts or pages
 * Version: 1.0.5
 * Author: Mattia Roccoberton
 * Author URI: http://blocknot.es
 * License: GPL3
 */
class netcam_live_stream
{
	function __construct()
	{
		if( !is_admin() ) add_action( 'wp_enqueue_scripts', array( &$this, 'wp_enqueue_scripts' ) );
		add_action( 'widgets_init', array( &$this, 'widgets_init' ) );
	}

	function widgets_init()
	{
		register_widget( 'nls_widget' );	// Work in progress...
	}

	function wp_enqueue_scripts()
	{	// action
		wp_enqueue_script( 'imagesloaded-script', plugin_dir_url( __FILE__ ) . 'imagesloaded.pkgd.min.js', array( 'jquery' ) );
		wp_enqueue_script( 'netcam-ls-script', plugin_dir_url( __FILE__ ) . 'netcam-live-stream.js', array( 'jquery' ) );
		wp_register_style( 'netcam-ls-styles', plugins_url( 'netcam-live-stream.css', __FILE__ ) );
		wp_enqueue_style( 'netcam-ls-styles' );
	}
}

$netcamlt = new netcam_live_stream();

require( plugin_dir_path( __FILE__ ) . 'netcam-shortcodes.php' );
require( plugin_dir_path( __FILE__ ) . 'netcam-widgets.php' );
