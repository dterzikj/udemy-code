<?php

function du_setup_theme(){

	add_theme_support('post_thumbnails');
	add_theme_support('title-tag');
	add_theme_support('custom-logo');
	add_theme_support('automatic-feed-links');
	add_theme_support('html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ));
	add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quite', 'video', 'audio'));
	add_theme_support('woocommerce');

	register_nav_menu('primary', __('Primary Menu', 'udemy'));
	register_nav_menu('secondary', __('Secondary Menu', 'udemy'));

	if (function_exists('quads_register_ad')){
		quads_register_ad( array('location' => 'udemy_header', 'description' => 'Udemy Header position') );
	}
}