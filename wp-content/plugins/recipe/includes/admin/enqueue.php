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

	if($typenow != 'recipe'){
		return;
	}

	wp_register_style('du_bootstrap', plugins_url('/assets/styles/bootstrap.css', RECIPE_PLUGIN_URL));

	wp_enqueue_style('du_bootstrap');


}