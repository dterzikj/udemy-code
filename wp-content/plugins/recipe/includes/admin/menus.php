<?php

function r_admin_menus(){
	add_menu_page(
		'Recipe Options',
		'Recipe Options',
		RECIPE_OPTIONS_CAPABILITY,
		RECIPE_OPTIONS_SLUG,
		'r_plugin_opts_page'
	);
}