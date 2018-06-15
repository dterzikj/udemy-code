<?php

function du_enqueue(){

	$path_to_assets_css = get_template_directory_uri() . '/assets/css/';
	$path_to_scripts = get_template_directory_uri() . '/assets/js/';

	wp_register_style('du_google_fonts',
		'http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic');
	wp_register_style('du_bootstrap', $path_to_assets_css . 'bootstrap.css');
	wp_register_style('du_style', get_template_directory_uri() . '/assets/style.css');
	wp_register_style('du_dark', $path_to_assets_css . 'dark.css');
	wp_register_style('du_font_icons', $path_to_assets_css . 'font-icons.css');
	wp_register_style('du_animate', $path_to_assets_css . 'animate.css');
	wp_register_style('du_magnific_popup', $path_to_assets_css . 'magnific-popup.css');
	wp_register_style('du_responsive', $path_to_assets_css . 'responsive.css');
	wp_register_style('du_custom', $path_to_assets_css . 'custom.css');

	// RTL styles
	wp_register_style('du_bootstrap_rtl', get_template_directory() . '/assets/css/bootstrap-rtl.css');
	wp_register_style('du_style_rtl', get_template_directory() . '/assets/style-rtl.css');
	wp_register_style('du_dark_rtl', get_template_directory() . '/assets/css/dark-rtl.css');
	wp_register_style('du_font_icons_rtl', get_template_directory() . '/assets/css/font-icons-rtl.css');
	wp_register_style('du_responsive_rtl', get_template_directory() . '/assets/css/responsive-rtl.css');

	wp_enqueue_style('du_google_fonts');
	wp_enqueue_style('du_bootstrap');
	wp_enqueue_style('du_style');
	wp_enqueue_style('du_dark');
	wp_enqueue_style('du_font_icons');
	wp_enqueue_style('du_animate');
	wp_enqueue_style('du_magnific_popup');
	wp_enqueue_style('du_responsive');
	wp_enqueue_style('du_custom');

	if(is_rtl()){
		wp_enqueue_style('du_bootstrap_rtl');
		wp_enqueue_style('du_style_rtl');
		wp_enqueue_style('du_dark_rtl');
		wp_enqueue_style('du_font_icons_rtl');
		wp_enqueue_style('du_responsive_rtl');
	}

//	wp_register_script('du_jquery', $path_to_scripts . 'jquery.js', array(), false, true);
	wp_register_script('du_plugins', $path_to_scripts . 'plugins.js', array(), false, true);
	wp_register_script('du_functions', $path_to_scripts . 'functions.js', array(), false, true);

	wp_enqueue_script('jquery');
	wp_enqueue_script('du_plugins');
	wp_enqueue_script('du_functions');

	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
}
