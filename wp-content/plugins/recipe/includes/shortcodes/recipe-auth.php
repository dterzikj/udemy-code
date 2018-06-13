<?php

function r_recipe_auth_form_shortcode(){

	if(is_user_logged_in()){
		return '<h3>Already logged in</h3>';
	}

	$formHTML = file_get_contents('recipe-auth-template.php', true);

	$formHTML = str_replace(
		'NONCE_FIELD_PH',
		wp_nonce_field(NONCE_AUTH_ACTION, '_wpnonce', true, false),
		$formHTML
	);

	$formHTML = str_replace(
		'REGISTER_FORM_PH',
		get_option('user_can_register') ? 'style="display: none;"' : '',
		$formHTML
	);

	return $formHTML;
}