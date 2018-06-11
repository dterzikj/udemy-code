<?php

function du_customize_preview_init(){
	wp_enqueue_script(
		'du_theme_customizer',
		get_template_directory_uri() . '/assets/js/theme-customize.js',
		array('jquery', 'customize-preview'),
		false,
		true
	);
}