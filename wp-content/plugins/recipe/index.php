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
define('DAILY_RECIPE_TRAINSIENT_KEY', 'r_daily_recipe');
define('NONCE_AUTH_ACTION', 'recipe_auth');
define('DISPLAY_MESSAGE_KEY', 'front_end_message');
define('RECIPE_RATING_DASHBOARD_WIDGET_ID', 'r_latest_recipe_rating_widget');
define('RECIPE_OPTIONS_SLUG', 'r_plugin_opts');
define('RECIPE_OPTIONS_CAPABILITY', 'edit_theme_options');
define('ORIGIN_META_KEY', 'more_info_url');

// endregion

// region INCLUDES

include('includes/activate.php');
include('includes/deactivate.php');
include('includes/init.php');
include ('includes/admin/init.php');
include ('process/save-post.php');
include ('process/filter-content.php');
include( 'includes/front/enqueue.php' );
include ('process/rate-recipe.php');
include (dirname(__FILE__) . '/includes/widgets.php');
include ('includes/widgets/class-daily-recipe.php');
include ('includes/cron.php');
include ('includes/shortcodes/creator.php');
include ('process/submit-user-recipe.php');
include ('includes/shortcodes/recipe-auth.php');
include ('process/create-account.php');
include ('process/login.php');
include ('includes/admin/dashboard-widgets.php');
include ('includes/admin/menus.php');
include ('includes/admin/options-page.php');
include ('process/save-options.php');
include ('includes/admin/origin-fields.php');

// endregion

// region HOOKS

register_activation_hook(__FILE__, 'r_activate_plugin');
register_deactivation_hook(__FILE__, 'r_deactivate_plugin');
add_action('init', 'recipe_init');
add_action('admin_init', 'recipe_admin_init');
add_action('save_post_recipe', 'r_save_post_admin', 10, 3);
add_filter('the_content', 'r_filter_recipe_content');
add_action('wp_enqueue_scripts', 'r_enqueue_scripts', 100);
add_action('wp_ajax_r_rate_recipe', 'r_rate_recipe');
add_action('wp_ajax_nopriv_r_rate_recipe', 'r_rate_recipe');
add_action('widgets_init', 'r_widgets_init');
add_action('r_daily_recipe_hook', 'r_daily_recipe_cron');
add_action('wp_ajax_r_submit_user_recipe', 'r_submit_user_recipe');
add_action('wp_ajax_nopriv_r_submit_user_recipe', 'r_submit_user_recipe');
add_action('wp_ajax_nopriv_recipe_create_account', 'recipe_create_account');
add_action('wp_ajax_nopriv_recipe_user_login', 'recipe_user_login');
add_filter ('the_content' , 'output_notices', 20);
add_action('wp_dashboard_setup', 'r_add_dashboard_widgets');
add_action('admin_menu', 'r_admin_menus');
add_action('admin_post_r_save_options', 'r_save_options');
add_action('origin_add_form_fields', 'r_origin_add_form_fields');
add_action('create_origin', 'r_save_origin');
add_action('edited_origin', 'r_save_origin');
add_action('origin_edit_form_fields', 'r_origin_edit_form_fields');


// endregion

// region SHORTCODES

add_shortcode('recipe_creator', 'r_recipe_creator_shortcode');
add_shortcode('recipe_auth_form', 'r_recipe_auth_form_shortcode');

// endregion