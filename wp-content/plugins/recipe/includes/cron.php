<?php

function r_daily_recipe_cron(){

	global $wpdb;

	$recipe_id              =   $wpdb->get_var(
		"SELECT `ID` FROM `" . $wpdb->posts. "`
            WHERE post_status='publish' AND post_type='recipe'
            ORDER BY rand() LIMIT 1;"
	);

	set_transient(DAILY_RECIPE_TRAINSIENT_KEY, $recipe_id, DAY_IN_SECONDS);
}