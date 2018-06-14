<?php

/***
 * Creates a new user
 *
 * @since 1.0.0
 *
 * @see wp_insert_user()
 */
function recipe_create_account(){

	$output = array('status' => 1);
	$nonce = isset($_POST['_wpnonce']) ? $_POST['_wpnonce'] : '';

	if(!wp_verify_nonce($nonce, NONCE_AUTH_ACTION)){
		wp_send_json($output);
	}

	if(!isset($_POST['name'],
		$_POST['username'],
		$_POST['email'],
		$_POST['pass'],
		$_POST['confirm_pass'])){
			wp_send_json($output);
	}

	$name = sanitize_text_field($_POST['name']);
	$username = sanitize_text_field($_POST['username']);
	$email = sanitize_email($_POST['email']);
	$pass = sanitize_text_field($_POST['pass']);
	$confirm_pass = sanitize_text_field($_POST['confirm_pass']);

	if($confirm_pass != $pass or username_exists($username) or email_exists($email) or !is_email($email)){
		wp_send_json($output);
	}

	$user_id = wp_insert_user(array(
		'user_login' => $username,
		'user_pass' => $pass,
		'user_nicename' => $name,
		'user_email' => $email
	));

	if(is_wp_error($user_id)){
		wp_send_json($output);
	}

	/***
	 * Authenticate user for the first time
	 *
	 * @since 1.0.0
	 *
	 * @see get_user_by()
	 * @see wp_set_current_user()
	 * @see wp_set_auth_cookie()
	 * @see wp_login()
	 */
	$user = get_user_by('id', $user_id);
	wp_set_current_user($user_id, $user->user_login);
	wp_set_auth_cookie($user_id, false);
	do_action('wp_login', $user->user_login, $user);

	$output['status'] = 2;
	wp_send_json($output);
}