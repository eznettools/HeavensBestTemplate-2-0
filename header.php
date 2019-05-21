<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>?v=<?php $my_theme = wp_get_theme(); echo esc_html( $my_theme->get( 'Version' ) ); ?>" />
	<?php wp_head(); ?>

	<?php if( get_field('custom_css_toggle') ): ?>
		<style>
		/*-- Local Page CSS --*/ 
		<?php the_field('local_css'); ?>
	</style>
	<?php endif; ?>

	<?php the_field('general_headcode', 'option'); ?>

</head>


<body <?php body_class(); ?>>

<div id="wrapper" class="mainWrapper hfeed">
	<a href="#container" class="screen-reader-text visually-hidden focusable skip-link">Skip to main content</a>

 <header id="header" class="header" role="banner">
	
 	<a href="/" class="logo"><img alt="Heaven's Best" src="<?php the_field('logo_url','option'); ?>" /></a>

	<aside class="header-aside">
		<div class="dry-ribbon">
			<img alt="Dry in 1 Hour" src="https://res.cloudinary.com/ez-nettools/image/upload/v1496774919/dry-banner-flat_i3nrpr.png" />
		</div>

		<div class="phone">
			<?php if( get_field('override_phone_number_in_header','option') ): ?>
					<?php the_field('manual_phone_number_html','option'); ?>
			<?php else: ?>
				<img alt=" " class="phone-icon" src="https://res.cloudinary.com/ez-nettools/image/upload/v1502460774/icon-telephone_vii2sr.png" />
				<?php the_field('phone_number', 'option'); ?>
			<?php endif; ?>
		</div>
	</aside>

	<nav id="menu" class="topnav" role="navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container' => false ) ); ?>
	</nav>

 </header>

 <header class="sticky-header">
    <div class="header mainWrapper">
 	<a href="/" class="logo">
		<img alt="Heaven's Best" src="https://res.cloudinary.com/ez-nettools/image/upload/v1496774893/logo-flat_hr0qck.png" />
	</a>
	<nav id="menu" class="topnav" role="navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container' => false ) ); ?>
	</nav>

	<aside class="header-aside">
		<div class="phone"><?php the_field('phone_number', 'option'); ?></div>
	</aside>
    </div>
 </header>

	
	<div id="container">