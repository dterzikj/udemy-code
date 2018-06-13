<?php

function r_recipe_auth_form_shortcode(){

	$formHTML = file_get_contents('recipe-auth-template.php', true);

	$formHTML = str_replace(
		'NONCE_FIELD_PH',
		wp_nonce_field(NONCE_AUTH_ACTION, '_wpnonce', true, false),
		$formHTML
	);

	return $formHTML;
}