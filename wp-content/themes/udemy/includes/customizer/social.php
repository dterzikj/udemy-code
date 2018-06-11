<?php

function du_social_customizer_section($wp_customize){

	$wp_customize->add_setting('du_facebook_handle', array(
		'default' => ''
	));

	$wp_customize->add_setting('du_twitter_handle', array(
		'default' => ''
	));

	$wp_customize->add_setting('du_instagram_handle', array(
		'default' => ''
	));

	$wp_customize->add_setting('du_phone_number', array(
		'default' => ''
	));

	$wp_customize->add_setting('du_email_address', array(
		'default' => ''
	));

	$wp_customize->add_section('du_social_section', array(
		'title' => __('Udemy Social Settings', 'udemy'),
		'priority' => 30,
		'panel' => 'udemy'
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'du_social_facebook_input',
			array(
				'label'          => __( 'Facebook Handle', 'udemy' ),
				'section'        => 'du_social_section',
				'settings'       => 'du_facebook_handle',
				'type'           => 'text'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'du_social_twitter_input',
			array(
				'label'          => __( 'Twitter Handle', 'udemy' ),
				'section'        => 'du_social_section',
				'settings'       => 'du_twitter_handle',
				'type'           => 'text'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'du_social_instagram_input',
			array(
				'label'          => __( 'Instagram Handle', 'udemy' ),
				'section'        => 'du_social_section',
				'settings'       => 'du_instagram_handle',
				'type'           => 'text'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'du_social_phone_input',
			array(
				'label'          => __( 'Phone Number', 'udemy' ),
				'section'        => 'du_social_section',
				'settings'       => 'du_phone_number',
				'type'           => 'text'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'du_social_email_input',
			array(
				'label'          => __( 'E-mail Address', 'udemy' ),
				'section'        => 'du_social_section',
				'settings'       => 'du_email_address',
				'type'           => 'text'
			)
		)
	);
}