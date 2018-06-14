<?php

/***
 * Enqueues styles for recipe plugin od the admin site.
 *
 * @since 1.0.0
 * @see wp_register_style()
 * @see wp_enqueue_style()
 */
function r_admin_enqueue(){

	global $typenow;
	if($typenow != 'recipe' and (!isset($_GET['page']) or $_GET['page'] != RECIPE_OPTIONS_SLUG)){
		return;
	}
	wp_register_style('du_bootstrap', plugins_url('/assets/styles/bootstrap.css', RECIPE_PLUGIN_URL));

	wp_enqueue_style('du_bootstrap');

	wp_register_script(
		'r_admin_options',
		plugins_url('/assets/scripts/options.js', RECIPE_PLUGIN_URL),
		array('jquery'),
		'1.0.0',
		true
	);

	wp_enqueue_script('r_admin_options');
}