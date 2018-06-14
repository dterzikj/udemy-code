<?php

function r_settings_api(){

	register_setting('r_opts_groups', 'r_opts', array('sanitize_callback' => 'r_sanitize_input'));

	add_settings_section(
		'recipe_settings',
		'Recipe Settings',
		'r_settings_section',
		'r_opts_sections'
	);

	add_settings_field(
		'rating_login_required',
		__('User login required for rating recipes', 'recipe'),
		'rating_login_required_input_cb',
		'r_opts_sections',
		'recipe_settings'
	);

	add_settings_field(
		'submission_login_required',
		__('User login required for submitting recipes', 'recipe'),
		'submission_login_required_input_cb',
		'r_opts_sections',
		'recipe_settings'
	);
}

function r_settings_section(){
	?><p>You can change recipe settings here.</p><?php
}

function r_sanitize_input($input){
	return $input;
}

function rating_login_required_input_cb(){
	$recipe_opts = get_option('r_opts');
	?>
	<select id="rating_login_required" name="r_opts[rating_login_required]">
		<option value="1">No</option>
		<option value="2" <?php echo $recipe_opts['rating_login_required'] == 2 ? 'selected' : '' ?>>Yes</option>
	</select>
	<?php
}

function submission_login_required_input_cb(){
	$recipe_opts = get_option('r_opts');
	?>
	<select id="submission_login_required" name="r_opts[submission_login_required]">
		<option value="1">No</option>
		<option value="2" <?php echo $recipe_opts['submission_login_required'] == 2 ? 'selected' : '' ?>>Yes</option>
	</select>
	<?php
}