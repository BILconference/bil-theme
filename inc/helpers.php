<?php
function get_module_by_slug($page_slug) {
	$module = get_page_by_path($page_slug, OBJECT, 'module');
	if ($module) {
		return $module;
	} else {
		return null;
	}
}