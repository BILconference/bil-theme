<?php

	if (!is_admin()) {

		// ***********************************************************************
		//
		// Register Scripts
		//
		// ***********************************************************************

			// Unregister jquery, re-register it with google cdn			
			wp_deregister_script('jquery');
			wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false);

			// register modernizr
			wp_register_script( 'theme-modernizr', get_stylesheet_directory_uri() . '/library/js/libs/modernizr.custom.min.js', array(), '2.5.3', false );

			// Bootstrap
			wp_register_script( 'bootstrap-cdn-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js', array('jquery'), '3.3.5', true );

			// register our custom scripts.js
			wp_register_script( 'theme-js', get_stylesheet_directory_uri() . '/library/js/scripts.js', array( 'jquery' ), '', true );

			wp_register_script( 'fittextjs-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/FitText.js/1.1/jquery.fittext.min.js', array('jquery'), '1.1', true );
			wp_enqueue_script( 'fittextjs-cdn' );

		// ***********************************************************************
		//
		// Enqueue Scripts
		//
		// *********************************************************************** 

			// get jquery from google cdn
			wp_enqueue_script('jquery');

			// enqueue styles and scripts
			wp_enqueue_script( 'theme-modernizr' );

			// enqueue bootstrap js
			wp_enqueue_script( 'bootstrap-cdn-js');

			// enqueue custom theme js
			wp_enqueue_script( 'theme-js' );

			// comment reply script for threaded comments
			if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
				wp_enqueue_script( 'comment-reply' );
			}

			
			if ( is_home() || is_front_page() ){
				// Fittext.js (Load only on homepage)	
				

			}
	}