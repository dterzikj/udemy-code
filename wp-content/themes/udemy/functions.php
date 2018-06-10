<?php
// region SETUP

// endregion

// region INCLUDES
include(get_template_directory() . "/includes/front/enqueue.php");
include(get_template_directory() . '/includes/setup.php');
include(get_template_directory() . '/includes/widgets.php');

// endregion

// region HOOKS
add_action('wp_enqueue_scripts', 'du_enqueue');
add_action('after_setup_theme', 'du_setup_theme');
add_action('widgets_init', 'du_widgets');

// endregion

// region SHORTCODES

// endregion