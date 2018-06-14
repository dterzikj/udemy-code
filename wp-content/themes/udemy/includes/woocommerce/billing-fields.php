<?php

function du_wc_billing_fields($fields){

//	echo '<pre>';
//	print_r($fields);
//	echo '</pre>';

	unset($fields['billing_company']);

	return $fields;
}