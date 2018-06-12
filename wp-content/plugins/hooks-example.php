<?php
/**
 * Plugin Name: Hooks Example
 */

//add_filter('the_title', 'du_title');
//add_action('wp_footer', 'du_footer_shoutout');
//add_action('wp_footer', 'du_footer_shoutout_v2', PHP_INT_MIN);
//
//
//function du_title($title){
//	return 'Hooked: ' . $title;
//}
//
//function du_footer_shoutout(){
//	echo 'Hooked example plugin was here. <br>';
//}
//
//function du_footer_shoutout_v2(){
//	echo 'Hooked example plugin was here v2. <br>';
//}

add_action('wp_footer', 'du_footer');

function du_footer(){
	do_action('du_custom_footer');
}

add_action('du_custom_footer', 'du_kill_wp');

function du_kill_wp(){
	echo 'Custom hook';
}