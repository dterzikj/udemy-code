<?php

function du_wc_shipping_fields($fields){

	unset($fields['shipping_company']);

	return $fields;
}