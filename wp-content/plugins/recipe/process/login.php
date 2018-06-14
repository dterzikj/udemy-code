<?php

/***
 * Authenticates and logs in the user.
 *
 * @since 1.0.0
 *
 * @see wp_signon()
 */
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

	add_user_meta(
		$user->ID,
		DISPLAY_MESSAGE_KEY,
		'<div class="container clearfix">
						<h3>Welcome, '. $user->user_nicename .'!</h3>
					</div>');

	$output['status'] = 2;
	wp_send_json($output);
}

/***
 * Outputs a welcome message on user's screen after the first login.
 *
 * @param string|bool|mixed $content the content of the page
 *
 * @return string content of the page
 */
function output_notices($content) {
	if(is_page() or is_single()) {
		$user = wp_get_current_user();
		if (!empty($user)) {
			$notices = get_user_meta($user->ID, DISPLAY_MESSAGE_KEY);
			if (is_array($notices)) {
				foreach ($notices as $notice) {
					$content = $notice . $content;
				}
			}
			delete_user_meta($user->ID, DISPLAY_MESSAGE_KEY);
		}
	} else if (is_archive()) {
		// TODO: Make display message appear on the home page as well and redirect user after login to homepage
	}


	return $content;
}
