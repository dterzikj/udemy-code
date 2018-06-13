<?php

function r_add_new_recipe_columns($columns){

	$new_columns = array(
		'cb' => '<input type="checkbox">',
		'title' => __('Title', 'recipe'),
		'author' => __('Author', 'recipe'),
		'categories' => __('Categories', 'recipe'),
		'rating' => __('Rating', 'recipe'),
		'rating_count' => __('Rating Count', 'recipe'),
		'date' => __('Date', 'recipe')
	);

	return $new_columns;
}

function r_manage_recipe_columns($column_name, $post_id){

	$recipe_data = get_post_meta($post_id, RECIPE_META_KEY, true);
	switch ($column_name){
		case 'rating':
			echo $recipe_data['rating'];
			break;

		case 'rating_count':
			echo $recipe_data['rating_count'];
			break;

		default:
			break;
	}
}