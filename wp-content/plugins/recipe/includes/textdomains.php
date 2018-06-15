<?php

function r_load_textdomains(){
	$plugin_url = 'recipe/lang';
	load_plugin_textdomain(
		'recipe',
		false,
		$plugin_url
	);
}