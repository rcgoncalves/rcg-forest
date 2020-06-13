<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width" />
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php echo esc_url(get_bloginfo('pingback_url')); ?>" />
		<!--[if lt IE 9]>
		<script src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/html5.js" type="text/javascript"></script>
		<![endif]-->
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>
		<div id="global" class="hfeed base">
			<div id="top1" class="site-top1">
				<div class="site-top-center">
					<header id="titlehead" class="site-header" role="banner">
						<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
						<h2 class="site-description"><?php bloginfo('description'); ?></h2>
					</header>
				<?php echo get_search_form(false); ?>
			</div>
		</div>
		<div id="top2" class="site-top2">
			<header id="masthead" class="site-header">
				<?php
				$header_image = get_header_image();
				if (!empty($header_image)) :
				?>
					<div class="header-image">
						<a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($header_image); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php bloginfo('name'); ?>" /></a>
					</div>
				<?php
				endif;
				?>
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<h3 class="menu-toggle"><?php _e('Menu', 'rcg-forest'); ?></h3>
					<a class="assistive-text" href="#content" title="<?php esc_attr_e('Skip to content', 'rcg-forest'); ?>"><?php _e('Skip to content', 'rcg-forest'); ?></a>
					<?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'nav-menu')); ?>
				</nav>
			</header>
		</div>
		<div id="page" class="site">
			<div id="main" class="wrapper">
