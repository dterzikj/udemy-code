<?php

function du_register_required_plugins(){

	$plugins = [
		[
			'name' => 'AdSense Integration WP QUADS',
			'slug' => 'quick-adsense-reloaded',
			'required' => false
		],
		[
			'name' => 'WooCommerce',
			'slug' => 'woocommerce',
			'required' => true
		],
		[
			'name' => 'WooCommerce PayPal Express Checkout Gateway',
			'slug' => 'woocommerce-gateway-paypal-express-checkout',
			'required' => true
		],
		[
			'name' => 'WP Subtitle',
			'slug' => 'wp-subtitle',
			'required' => true
		],
		[
			'name' => 'Recipe',
			'slug' => 'recipe',
			'source' => get_template_directory() . '/plugins/recipe.zip',
			'required' => true
		]
	];

	$config = [
		'id' => 'udemy',
		'menu' => 'tgmpa-install-plugins',
		'parent_slug' => 'themes.php',
		'capability' => 'edit_theme_options',
		'has_notices' => true,
		'dismissable' => true
	];

	tgmpa($plugins, $config);
}