<?php
// region SETUP

define('CHECKBOX_TRUE', 'yes');

// endregion

// region INCLUDES
include(get_template_directory() . "/includes/front/enqueue.php");
include(get_template_directory() . '/includes/setup.php');
include(get_template_directory() . '/includes/widgets.php');
include(get_template_directory() . '/includes/theme-customizer.php');
include(get_template_directory() . '/includes/customizer/social.php');
include(get_template_directory() . '/includes/customizer/misc.php');
include(get_template_directory() . '/includes/customizer/enqueue.php');
include (get_template_directory() . '/includes/woocommerce/billing-fields.php');
include (get_template_directory() . '/includes/woocommerce/shipping-fields.php');
include (get_template_directory() . '/includes/excerpt-length.php');
include (get_template_directory() . '/includes/author-fields.php');
include (get_template_directory() . '/includes/avatar.php');
include (get_template_directory() . '/includes/query.php');
include (get_template_directory() . '/includes/textdomains.php');
include (get_template_directory() . '/includes/register-plugins.php');
require_once (get_template_directory() . '/libs/class-tgm-plugin-activation.php');

// endregion

// region HOOKS
add_action('wp_enqueue_scripts', 'du_enqueue');
add_action('after_setup_theme', 'du_setup_theme');
add_action('widgets_init', 'du_widgets');
add_action('customize_register', 'du_customize_register');
add_action('customize_preview_init', 'du_customize_preview_init');
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
add_filter('woocommerce_billing_fields', 'du_wc_billing_fields');
add_filter('woocommerce_shipping_fields', 'du_wc_shipping_fields');
add_filter('excerpt_more', '__return_false');
add_filter('excerpt_length', 'du_excerpt_length');
add_action('show_user_profile', 'du_custom_user_profile_fields');
add_action('edit_user_profile', 'du_custom_user_profile_fields');
add_action('personal_options_update', 'du_save_extra_profile_fields');
add_action('edit_user_profile_update', 'du_save_extra_profile_fields');
add_filter('avatar_defaults', 'du_avatar_defaults');
add_action('pre_get_posts', 'du_modify_homepage_query');
add_action('after_setup_theme', 'du_load_textdomains');
add_action( 'tgmpa_register', 'du_register_required_plugins' );
// endregion

// region SHORTCODES

// endregion