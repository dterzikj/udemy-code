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

// endregion

// region HOOKS
add_action('wp_enqueue_scripts', 'du_enqueue');
add_action('after_setup_theme', 'du_setup_theme');
add_action('widgets_init', 'du_widgets');
add_action('customize_register', 'du_customize_register');
add_action('customize_preview_init', 'du_customize_preview_init');
// endregion

// region SHORTCODES

// endregion