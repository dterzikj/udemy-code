<?php

function r_daily_recipe_cron(){

	global $wpdb;

	$recipe_id              =   $wpdb->get_var($wpdb->prepare(
		"SELECT `ID` FROM `" . $wpdb->posts. "`
            WHERE post_status=%s AND post_type=%s
            ORDER BY rand() LIMIT 1;",
		'publish', 'recipe'
	));

	set_transient(DAILY_RECIPE_TRAINSIENT_KEY, $recipe_id, DAY_IN_SECONDS);
}