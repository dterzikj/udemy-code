<?php

add_action('wp_enqueue_scripts', function(){
	wp_register_style('parent_theme_css', get_template_directory_uri() . '/style.css');
	wp_register_style('child_theme_css', get_stylesheet_uri());

	wp_enqueue_style('parent_theme_css');
	wp_enqueue_style('child_theme_css');
});