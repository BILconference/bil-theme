<?php

	if (!is_admin()) {

		// ***********************************************************************
		//
		// Register Scripts
		//
		// ***********************************************************************

			// Unregister jquery, re-register it with google cdn			
			wp_deregister_script('jquery');

			// register our custom scripts.js
			wp_register_script('theme-js', get_stylesheet_directory_uri() . '/dist/js/main.min.js', '', '', true );

		// ***********************************************************************
		//
		// Enqueue Scripts
		//
		// *********************************************************************** 

			// enqueue custom theme js
			wp_enqueue_script( 'theme-js' );

	}