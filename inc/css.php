<?php

	global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

	if (!is_admin()) {

		// ***********************************************************************
		//
		// Register Stylesheets
		//
		// *********************************************************************** 

			// Bootstrap CDN File
			// NOTE: We should write a check to grab a local file if CDN is not accessible
			wp_register_script ('bootstrap-cdn', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css', array(), '3.3.5', false);

			// register main stylesheet
			wp_register_style( 'bones-stylesheet', get_stylesheet_directory_uri() . '/library/css/style.css', array(), '', 'all' );

			// ie-only style sheet
			wp_register_style( 'bones-ie-only', get_stylesheet_directory_uri() . '/library/css/ie.css', array(), '' );

		// ***********************************************************************
		//
		// Enqueue Stylesheets
		//
		// *********************************************************************** 
			wp_enqueue_style ('bootstrap-cdn');
			wp_enqueue_style( 'bones-stylesheet' );
			wp_enqueue_style( 'bones-ie-only' );

			$wp_styles->add_data( 'bones-ie-only', 'conditional', 'lt IE 9' ); // add conditional wrapper around ie stylesheet
	}