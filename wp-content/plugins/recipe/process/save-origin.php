<?php

function r_save_origin($term_id){

	if(!isset($_POST['r_more_info_url']) or empty($_POST['r_more_info_url'])){
		return;
	} else if(doing_action()){
		return;
	}

	// TODO: Fix updating meta to database problem
	update_term_meta( $term_id, ORIGIN_META_KEY, esc_url_raw($_POST['r_more_info_url']));
}