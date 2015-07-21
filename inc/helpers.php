<?php

// Quick shortcut to get the right module.

function get_module_by_slug($page_slug) {
	$module = get_page_by_path($page_slug, OBJECT, 'module');
	if ($module) {
		return $module;
	} else {
		return null;
	}
}

// Gross code to go grab the upcoming events and pass them back as an array of objects for you to loop over

function upcoming_bils() {
	$today = date('Ymd');

    $args = array (
		'posts_per_page' => -1,
		'post_type'     => 'event',
		'meta_query'    => array(
			'key'   => 'end_date',
			'compare' => '>=',
			'value'   => $today
		),
		'orderby'     => 'meta_value_num',
		'meta_key'      => 'end_date',
		'order'       => 'ASC'
	);

	$upcoming_bils = new WP_Query($args);

	return $upcoming_bils;
}

// Gross code to go grab the past events and pass them back as an array of objects for you to loop over

function past_bils() {
	$today = date('Ymd');

    $args = array (
		'posts_per_page' => -1,
		'post_type'     => 'event',
		'meta_query'    => array(
			'key'   => 'end_date',
			'compare' => '<',
			'value'   => $today
		),
		'orderby'     => 'meta_value_num',
		'meta_key'      => 'end_date',
		'order'       => 'ASC'
	);

	$past_bils = new WP_Query($args);

	return $past_bils;
}

$pretty = function($v='',$c="&nbsp;&nbsp;&nbsp;&nbsp;",$in=-1,$k=null)use(&$pretty){$r='';if(in_array(gettype($v),array('object','array'))){$r.=($in!=-1?str_repeat($c,$in):'').(is_null($k)?'':"$k: ").'<br>';foreach($v as $sk=>$vl){$r.=$pretty($vl,$c,$in+1,$sk).'<br>';}}else{$r.=($in!=-1?str_repeat($c,$in):'').(is_null($k)?'':"$k: ").(is_null($v)?'&lt;NULL&gt;':"<strong>$v</strong>");}return$r;};