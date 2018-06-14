<?php

/***
 * Enqueues scripts and styles for the rateit framework.
 *
 * @see wp_register_style()
 * @see wp_register_script()
 * @see wp_enqueue_style()
 * @see wp_enqueue_script()
 * @see wp_localize_script()
 */
function r_enqueue_scripts(){

	// region REGISTERING AND ENQUEUING STYLES

	wp_register_style(
		'r_rateit',
		plugins_url('/assets/rateit/rateit.css', RECIPE_PLUGIN_URL)
	);

	wp_enqueue_style('r_rateit');

	// endregion

	// region REGISTERING AND ENQUEUING SCRIPTS

	wp_register_script(
		'r_rateit',
		plugins_url('/assets/rateit/jquery.rateit.js', RECIPE_PLUGIN_URL),
		array('jquery'),
		'1.0.0',
		true
	);
	wp_register_script(
		'r_main',
		plugins_url('/assets/scripts/main.js', RECIPE_PLUGIN_URL),
		array('jquery'),
		'1.0.0',
		true
	);

	/***
	 * Creating AJAX URLs for usage in main.js
	 *
	 * @since 1.0.0
	 * @see main.js
	 */
	wp_localize_script('r_main', 'recipe_obj', array(
		'ajax_url' => admin_url('admin-ajax.php'),
		'home_url' => home_url('/'),
		'about_us_url' => get_permalink(50)
	));

	wp_enqueue_script('r_rateit');
	wp_enqueue_script('r_main');

	// endregion
}