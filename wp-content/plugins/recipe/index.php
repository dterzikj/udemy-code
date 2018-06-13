<?php

/*
 * Plugin Name: Recipe
 * Description: A simple WordPress plugin that allows users to create recipes and rate those recipes
 * Version: 1.0
 * Author: Udemy
 * Author URI: https://udemy.com
 * Text Domain: recipe
 * */

/***
 * Check if the plugin is used from a website or by itself. Do not let usage by itself.
 *
 * @since 1.0.0
 */
if(!function_exists('add_action')){
	die('Hi there! I am just a plugin, not much I can do when called directly.');
}

// region SETUP

define('RECIPE_PLUGIN_URL', __FILE__);
define('RECIPE_META_KEY', 'recipe_data');

// endregion

// region INCLUDES

include('includes/activate.php');
include('includes/init.php');
include ('includes/admin/init.php');
include ('process/save-post.php');
include ('process/filter-content.php');
include( 'includes/front/enqueue.php' );
include ('process/rate-recipe.php');

// endregion

// region HOOKS

register_activation_hook(__FILE__, 'r_activate_plugin');
add_action('init', 'recipe_init');
add_action('admin_init', 'recipe_admin_init');
add_action('save_post_recipe', 'r_save_post_admin', 10, 3);
add_filter('the_content', 'r_filter_recipe_content');
add_action('wp_enqueue_scripts', 'r_enqueue_scripts', 100);
add_action('wp_ajax_r_rate_recipe', 'r_rate_recipe');

// endregion

// region SHORTCODES

// endregion