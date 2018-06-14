<?php

/***
 * Function which is triggered when action hook 'wp_ajax_r_rate_recipe' is called. Updates the rating
 * via AJAX requests.
 *
 * @since 1.0.0
 * @see update_post_meta()
 */
function r_rate_recipe(){

	global $wpdb;

	$output = array('status' => 1);
	$post_id = absint($_POST['rid']);
	$rating = round($_POST['rating'], 1);
	$user_IP = $_SERVER['REMOTE_ADDR'];

	$rating_count = $wpdb->get_var($wpdb->prepare(
		"SELECT COUNT(*) FROM `". $wpdb->prefix ."recipe_ratings` 
		WHERE `recipe_id`=%d AND `user_ip`=%s;",
		$post_id, $user_IP
	));

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
		$wpdb->get_var($wpdb->prepare(
			"SELECT AVG(`rating`) FROM `". $wpdb->prefix ."recipe_ratings` WHERE `recipe_id`=%d;",
			$post_id
		)),
		1
	);
	update_post_meta($post_id, RECIPE_META_KEY, $recipe_data);

	$output['status'] = 2;
	wp_send_json($output);
}