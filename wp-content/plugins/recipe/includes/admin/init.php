<?php

/***
 * Trigger with 'admin_init' hook. Creates and adds metaboxes to the UI. Enqueues the scripts and styles
 * needed for the metaboxes
 *
 * @since 1.0.0
 * @see r_create_metaboxes()
 * @see r_admin_enqueue()
 */
function recipe_admin_init(){

	include ('create-metaboxes.php');
	include ('recipe-options.php');
	include ('enqueue.php');

	add_action('add_meta_boxes_recipe', 'r_create_metaboxes');
	add_action('admin_enqueue_scripts', 'r_admin_enqueue');
}