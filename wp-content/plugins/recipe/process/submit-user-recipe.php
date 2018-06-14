<?php

/***
 * Submit user recipe
 *
 * @since 1.0.0
 *
 * @see wp_kses_post()
 */
function r_submit_user_recipe(){

	$output = array('status' => 1);

	if(empty($_POST['ingredients'])
	   or empty($_POST['title'])
	   or empty($_POST['content'])
	   or empty($_POST['time'])
	   or empty($_POST['meal_type'])){

			wp_send_json($output);
	}

	$title = sanitize_text_field($_POST['title']);
	$content = wp_kses_post($_POST['content']);
	$recipe_data = array(
		'ingredients' => sanitize_text_field($_POST['ingredients']),
		'time' => sanitize_text_field($_POST['time']),
		'utensils' => sanitize_text_field($_POST['utensils']),
		'level' => sanitize_text_field($_POST['level']),
		'meal_type' => sanitize_text_field($_POST['meal_type']),
		'rating' => 0,
		'rating_count' => 0
	);

	$post_id = wp_insert_post(array(
		'post_content' => $content,
		'post_title' => $title,
		'post_status' => 'pending',
		'post_type' => 'recipe',
		'post_name' => $title
	));

	update_post_meta($post_id, RECIPE_META_KEY, $recipe_data);

	$output['status'] = 2;
	wp_send_json($output);
}