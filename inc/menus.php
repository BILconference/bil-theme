<?php

	// wp menus
	add_theme_support( 'menus' );

	// registering wp3+ menus
	register_nav_menus(
		array(
			'main-nav' => __( 'The Main Menu', 'bonestheme' ),   // main nav in header
			'footer-links' => __( 'Footer Links', 'bonestheme' ), // secondary nav in footer
			'footer-links2'=> __( 'Footer Links 2', 'bonestheme' ),
			'footer-links3'=> __( 'Footer Links 3', 'bonestheme' )

		)
	);

?>