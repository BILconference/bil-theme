<?php

	if (!is_admin()) {

		// ***********************************************************************
		//
		// Register Scripts
		//
		// ***********************************************************************

			wp_deregister_script('jquery');
			wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', null, null, false);
			wp_register_script('mainjs', get_stylesheet_directory_uri() . '/dist/js/main.min.js', ['jquery'], null, true);

		// ***********************************************************************
		//
		// Enqueue Scripts
		//
		// *********************************************************************** 

			// enqueue custom theme js
			wp_enqueue_script('jquery');
			wp_enqueue_script('mainjs');

	}