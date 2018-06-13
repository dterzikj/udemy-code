<?php

function recipe_user_login(){

	$output = array('status' => 1);
	$nonce = isset($_POST['_wpnonce']) ? $_POST['_wpnonce'] : '';

	if(!wp_verify_nonce($nonce, NONCE_AUTH_ACTION)){
		wp_send_json($output);
	}

	if(!isset($_POST['username'], $_POST['pass'])){
		wp_send_json($output);
	}

	$username = sanitize_text_field($_POST['username']);
	$pass = sanitize_text_field($_POST['pass']);

	$user = wp_signon(
		array(
			'user_login' => $username,
			'user_password' => $pass,
			'remember' => true
		),
		false);

	if(is_wp_error($user)){
		wp_send_json($output);
	}

	$output['status'] = 2;
	wp_send_json($output);
}
