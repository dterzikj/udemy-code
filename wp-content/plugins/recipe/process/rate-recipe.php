<?php

function r_rate_recipe(){

	global $wpdb;

	$output = array('status' => 1);
	$post_id = absint($_POST['rid']);
	$rating = round($_POST['rating'], 1);
	$user_IP = $_SERVER['REMOTE_ADDR'];

	$rating_count = $wpdb->get_var(
		"SELECT COUNT(*) FROM `". $wpdb->prefix ."recipe_ratings` WHERE `recipe_id`='". $post_id ."' AND `user_ip`='". $user_IP ."';"
	);

	if($rating_count > 0){
		wp_send_json($output);
	}

	$wpdb->insert(
		$wpdb->prefix . 'recipe_ratings',
		array(
			'recipe_id' => $post_id,
			'rating' => $rating,
			'user_ip' => $user_IP
		),
		array('%d', '%f', '%s')
	);

	$recipe_data = get_post_meta($post_id, RECIPE_META_KEY, true);
	$recipe_data['rating_count']++;
	$recipe_data['rating'] = round(
		$wpdb->get_var(
			"SELECT AVG(`rating`) FROM `". $wpdb->prefix ."recipe_ratings` WHERE `recipe_id`='". $post_id ."';"
		),
		1
	);
	update_post_meta($post_id, RECIPE_META_KEY, $recipe_data);

	$output['status'] = 2;
	wp_send_json($output);
}