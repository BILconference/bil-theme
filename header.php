<!doctype html>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php wp_title('-', true, 'left'); ?></title>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png?v=1">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<meta name="theme-color" content="#121212">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
		<header id="header" class="masthead">
			<nav id="nav" class="navbar navbar-bil navbar-static-top navbar-custom" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<a class="navbar-brand" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
					</div>
					<div class="collapse navbar-collapse">
						<?php
							wp_nav_menu( array(
								'menu'              => __( 'The Main Menu', 'bonestheme' ),
								'theme_location'    => 'main-nav',
								'depth'             => 2,
								'container'         => 'div',
								'container_class'   => '',
								'container_id'      => 'primary-nav-menu',
								'menu_class'        => 'nav navbar-nav',
								'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
								'walker'            => new wp_bootstrap_navwalker())
							);
						?>

						<ul class="soc nav navbar-nav navbar-right visible-md visible-lg visible-xl">
							<li><a class="soc-twitter" href="http://twitter.com/bilconf" target="_blank"></a></li>
							<li><a class="soc-facebook" href="http://facebook.com/bilconference" target="_blank"></a></li>
							<li class="hidden"><a class="soc-github" href="https://github.com/bilconference" target="_blank"></a></li>
							<li class="slack hidden"><a href="/slack/"><img src="https://bil-slack.herokuapp.com/badge.svg"></a></li>
						</ul>
					</div>
				</div>
			</nav>
		</header>
