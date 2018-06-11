<?php

function du_misc_customize_section($wp_customize){

	$wp_customize->add_setting('du_header_show_search', array(
		'default' => CHECKBOX_TRUE,
		'transport' => 'postMessage'
	));

	$wp_customize->add_setting('du_header_show_cart', array(
		'default' => CHECKBOX_TRUE,
		'transport' => 'postMessage'
	));

	$wp_customize->add_setting('du_footer_copyright_text', array(
		'default' => 'Copyrights &copy; 2017 All Rights Reserved by Jasko Koyn Inc.'
	));

	$wp_customize->add_setting('du_footer_tos_page', array(
		'default' => 0
	));

	$wp_customize->add_setting('du_footer_privacy_page', array(
		'default' => 0
	));

	$wp_customize->add_setting('du_show_header_popular_posts_widget', array(
		'default' => CHECKBOX_TRUE
	));

	$wp_customize->add_setting('du_popular_posts_widget_title', array(
		'default' => 'Breaking News'
	));

	$wp_customize->add_section('du_misc_section', array(
		'title' => __('Udemy Misc Settings', 'udemy'),
		'priority' => 30,
		'panel' => 'udemy'
	));

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'du_header_show_search_input',
		array(
			'label' => __('Show Search Button in Header', 'udemy'),
			'section' => 'du_misc_section',
			'settings' => 'du_header_show_search',
			'type' => 'checkbox',
			'choices' => array(
				'yes' => __('Yes', 'udemy')
			)
		)
	));

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'du_header_show_cart_input',
		array(
			'label' => __('Show Cart in Header', 'udemy'),
			'section' => 'du_misc_section',
			'settings' => 'du_header_show_cart',
			'type' => 'checkbox',
			'choices' => array(
				'yes' => __('Yes', 'udemy')
			)
		)
	));

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'du_footer_copyright_text_input',
		array(
			'label' => __('Copyrights', 'udemy'),
			'section' => 'du_misc_section',
			'settings' => 'du_footer_copyright_text',
			'type' => 'text'
		)
	));

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'du_footer_tos_page_input',
		array(
			'label' => __('Terms of Service Page', 'udemy'),
			'section' => 'du_misc_section',
			'settings' => 'du_footer_tos_page',
			'type' => 'dropdown-pages'
		)
	));

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'du_footer_privacy_page_input',
		array(
			'label' => __('Privacy Policy Page', 'udemy'),
			'section' => 'du_misc_section',
			'settings' => 'du_footer_privacy_page',
			'type' => 'dropdown-pages'
		)
	));

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'du_show_header_popular_posts_widget_input',
		array(
			'label' => __('Show Header Popular Posts', 'udemy'),
			'section' => 'du_misc_section',
			'settings' => 'du_show_header_popular_posts_widget',
			'type' => 'checkbox',
			'choices' => array(
				CHECKBOX_TRUE => __('Yes', 'udemy')
			)
		)
	));

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'du_popular_posts_widget_title_input',
		array(
			'label' => __('Popular Posts Widget Title', 'udemy'),
			'section' => 'du_misc_section',
			'settings' => 'du_popular_posts_widget_title',
			'type' => 'text'
		)
	));
}