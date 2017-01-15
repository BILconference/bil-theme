<?php 

add_filter( 'wp_kses_allowed_html', 'bil_allowed_tags', 1, 1);

function bil_allowed_tags( $allowedposttags ) {

	if ( !current_user_can( 'publish_posts' ) ) {
		return $allowedposttags;
	} else {
		$allowedposttags['iframe'] = array(
			'align' => true,
			'width' => true,
			'height' => true,
			'frameborder' => true,
			'name' => true,
			'src' => true,
			'id' => true,
			'class' => true,
			'style' => true,
			'scrolling' => true,
			'marginwidth' => true,
			'marginheight' => true,
		);
		
		return $allowedposttags;
	}
}