<?php

function r_deactivate_plugin() {

	/***
	 * Deactivate cron jobs when plugin is deactivated
	 *
	 * @since 1.0.0
	 * @see wp_clear_scheduled_hook()
	 * @link https://codex.wordpress.org/Transients_API
	 */
	wp_clear_scheduled_hook( 'r_daily_recipe_hook' );
}