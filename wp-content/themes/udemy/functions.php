<?php
// region SETUP

// endregion

// region INCLUDES
include(get_template_directory() . "/includes/front/enqueue.php");

// endregion

// region HOOKS
add_action('wp_enqueue_scripts', 'du_enqueue');

// endregion

// region SHORTCODES

// endregion