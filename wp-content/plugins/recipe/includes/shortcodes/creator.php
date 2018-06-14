<?php

/***
 * Generate an html code on a position of a shortcode. It creates a recipe submit form.
 *
 * @since 1.0.0
 * @see r_generate_content_editor()
 *
 * @return bool|mixed|string
 */
function r_recipe_creator_shortcode(){

	$recipe_opts = get_option('r_opts');

	if(!is_user_logged_in() and $recipe_opts['submission_login_required'] == 2){
		return '<h3>You must be logged in to submit a recipe.</h3>';
	}

	$creator_template = wp_remote_get(plugins_url('/includes/shortcodes/creator-template.php', RECIPE_PLUGIN_URL));
	$creatorHTML = wp_remote_retrieve_body($creator_template);

	$editorHTML = r_generate_content_editor();

	$creatorHTML = str_replace('CONTENT_EDITOR', $editorHTML, $creatorHTML);
	return $creatorHTML;
}

/***
* Encapsulates all output using ob_start() and ob_get_clean().
 *
 * @since 1.0.0
 * @see wp_editor()
 * @see ob_start()
 * @see ob_get_clean()
 * @link https://www.tinymce.com/
 *
 * @return string
 */
function r_generate_content_editor(){
	ob_start();
	wp_editor('', 'recipe_content_editor');
	$editorHTML = ob_get_clean();
	return $editorHTML;
}