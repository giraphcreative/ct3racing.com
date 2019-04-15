<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // Google Chrome Frame for IE ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php the_title(); ?> | CT3 Race Team</title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

	</head>

	<body <?php body_class(); ?>>

		<div id="container">

			<header class="header" role="banner">

				<nav role="navigation">
					<?php bones_main_nav(); ?>
					<button class="menu-toggle">Menu</button>
				</nav>
					
				<a href="<?php echo home_url(); ?>" rel="nofollow"><img src="<?php bloginfo( "template_url" ) ?>/library/images/logo.png" class="logo"></a>
				
				<h3 class="slogan"><?php bloginfo( 'description' ); ?></h3>
	
				<img src="<?php bloginfo( "template_url" ); ?>/library/images/home-header-banner.png" class="home-header-banner" />

			</header>
