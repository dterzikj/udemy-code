<?php

/***
 * Function which triggers upon plugin activation
 *
 * @since 1.0.0
 * @see register_activation_hook()
 */
function r_activate_plugin(){
	/***
	 * Check the version of WordPress. WordPress version of 4.5 or higher is needed for this plugin.
	 */
	if(version_compare(get_bloginfo('version'), '4.5', '<')){
		wp_die(__('You must update WordPress to use this plugin', 'recipe'));
	}

	recipe_init();
	flush_rewrite_rules();

	/***
	 * Create a database for the plugin
	 */
	global $wpdb;

	$createSQL = "
		CREATE TABLE `" . $wpdb->prefix . "recipe_ratings` (
			`ID` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
			`recipe_id` BIGINT(20) UNSIGNED NOT NULL,
			`rating` FLOAT(3,2) UNSIGNED NOT NULL,
			`user_ip` VARCHAR(32) NOT NULL,
			PRIMARY KEY (`ID`)
		)
		ENGINE=InnoDB " . $wpdb->get_charset_collate() . " AUTO_INCREMENT=1;
	";

	/**
	 * Needed for executing dbDelta().
	 *
	 * @since 1.0.0
	 * @see dbDelta()
	 */
	require_once (ABSPATH . '/wp-admin/includes/upgrade.php');
	dbDelta($createSQL);

	/***
	 * Schedule a cron job to show recipe of the day on a daily basis
	 *
	 * @since 1.0.0
	 * @see wp_schedule_event()
	 * @link https://codex.wordpress.org/Transients_API
	 */
	wp_schedule_event(time(), 'daily', 'r_daily_recipe_hook');

	$recipe_opts = get_option('r_opts');

	if(!$recipe_opts){
		add_option('r_opts', array(
			'rating_login_required' => 1,
			'submission_login_required' => 1
		));
	}

	add_role(
		'recipe_author',
		__('Recipe Author', 'recipe'),
		array(
			'read' => true,
			'upload_files' => true,
			'edit_posts' => true
		)
	);
}