<?php

/***
 * Creates/Adds metabox
 *
 * @since 1.0.0
 * @see add_meta_box()
 */
function r_create_metaboxes(){
	add_meta_box(
		'r_recipe_options_mb',
		__('Recipe Options', 'recipe'),
		'r_recipe_options_mb',
		'recipe',
		'normal',
		'high'
	);
}