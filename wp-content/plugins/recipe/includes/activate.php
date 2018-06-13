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

	wp_schedule_event(time(), 'daily', 'r_daily_recipe_hook');
}