<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	
	<?php $templateUrl = get_template_directory_uri(); ?>
	<?php $logoUrl = get_field('logo_url','option'); $logoSize = getimagesize($logoUrl); ?>
	<link rel="preload" as="image" href="<?php echo $logoUrl; ?>" >
	<?php if( get_field('banner_type') == 'slideshow' ): $repeater = get_field('slides'); $first_img = $repeater[0]['image']['url']; ?>
	  <link rel="preload" as="image" href="<?php echo $first_img; ?>"  crossorigin="anonymous">
	  <link rel="stylesheet" type="text/css" href="<?php echo $templateUrl; ?>/swiffy-slider.css?">
	<script src="<?php echo $templateUrl; ?>/swiffy-slider.min.js?123" defer></script>
	<?php endif; ?>
	<?php if( get_field('banner_type') == 'image' ): $image = get_field('banner_image'); $size = 'large'; ?>
	  <link rel="preload" as="image" href="<?php echo wp_get_attachment_image_url( $image, $size ); ?>">
	<?php endif; ?>
	<?php if( get_field('banner_type') == 'video' ): ?>
	  <link rel="preload" as="video" type="video/mp4" href="<?php the_field('video_url'); ?>">
	<?php endif; ?>		
	<?php if( has_post_thumbnail() ): ?><link rel="preload" as="image" href="<?php the_post_thumbnail_url( 'full' ); ?>" /><?php endif; ?>
	<link rel="preload" as="image" href="https://res.cloudinary.com/ez-nettools/image/upload/v1670453572/DryBanner7_dsvyi6.svg">
	<link rel="preload" as="image" href="https://res.cloudinary.com/ez-nettools/image/upload/v1670455014/Phone_Icon_ay4o9j.svg">
	<link rel="preload" as="image" href="https://res.cloudinary.com/ez-nettools/image/upload/v1670868099/clouds_vector3_kt5cak.svg">
	

	
	
	<link rel="stylesheet" type="text/css"  href="<?php echo get_stylesheet_uri(); ?>?v=<?php $my_theme = wp_get_theme(); echo esc_html( $my_theme->get( 'Version' ) ); ?>" />

<!--
<link rel="preload" href="<?php echo get_stylesheet_uri(); ?>?v=<?php $my_theme = wp_get_theme(); echo esc_html( $my_theme->get( 'Version' ) ); ?>"  as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>?v=<?php $my_theme = wp_get_theme(); echo esc_html( $my_theme->get( 'Version' ) ); ?>"  as="style" onload="this.onload=null;this.rel='stylesheet'"></noscript>
-->	

	<!-- WP_header -->
	<?php wp_head(); ?>
	<!-- end WP Head -->

	<?php if( get_field('custom_css_toggle') ): ?>
		<style>
		/*-- Local Page CSS --*/ 
		<?php the_field('local_css'); ?>
	</style>
	<?php endif; ?>
	
<!--
<script>
jQuery(document).ready(function( $ ) {
	$('.topnav li:has(ul)' ).doubleTapToGo();
});
</script>
-->	

<style>
/* latin italic */
@font-face {
  font-family: 'Asap';
  font-style: italic;
  font-weight: 100 900;
  font-stretch: 100%;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/asap/v26/KFO7CniXp96ayz4E7kSn66aGLdTylUAMa3yUBA.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* latin normal */
@font-face {
  font-family: 'Asap';
  font-style: normal;
  font-weight: 100 900;
  font-stretch: 100%;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/asap/v26/KFO9CniXp96a4Tc2DaTeuDAoKsE615hJW34.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
</style>

	<?php the_field('general_headcode', 'option'); ?>

</head>


<body <?php body_class(); ?>>

<div id="wrapper" class="mainWrapper hfeed">
	<a href="#container" class="screen-reader-text visually-hidden focusable skip-link">Skip to main content</a>

 <header id="header" class="header" role="banner">
	
 	<a href="/" class="logo"><img alt="Heaven's Best" src="<?php echo $logoUrl; ?>" width=<?php echo $logoSize[0]; ?> height=<?php echo $logoSize[1]; ?> /></a>

	<aside class="header-aside">
		<div class="dry-ribbon">
			<!--<img alt="Dry in 1 Hour" width=284 height=70 src="https://res.cloudinary.com/ez-nettools/image/upload/v1496774919/dry-banner-flat_i3nrpr.png" />-->
			<img alt="Dry in 1 Hour" width=281 height=66 src="https://res.cloudinary.com/ez-nettools/image/upload/v1670453572/DryBanner7_dsvyi6.svg" />
			
		</div>

		<div class="phone">
			<?php if( get_field('override_phone_number_in_header','option') ): ?>
					<?php the_field('manual_phone_number_html','option'); ?>
			<?php else: ?>
				<img alt=" " class="phone-icon" width=32 height=32 src="https://res.cloudinary.com/ez-nettools/image/upload/v1670455014/Phone_Icon_ay4o9j.svg" />
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