<?php

function du_customize_register($wp_customize){

	$wp_customize->get_section('title_tagline')->title = 'General';

	$wp_customize->add_panel( 'udemy', array(
		'title' => __('Udemy', 'udemy'),
		'description' => '<p>Udemy Theme Settings</p>',
		'priority' => 160
	));

	du_social_customizer_section($wp_customize);
	du_misc_customize_section($wp_customize);

//	echo '<pre>';
//	echo var_dump($wp_customize);
//	echo '</pre>';
}