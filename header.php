<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<!--<link href="https://fonts.googleapis.com/css?family=Oswald:700|Roboto:400,400i,700" rel="stylesheet">-->
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
	<?php wp_head(); ?>

<script src="https://osvaldas.info/examples/drop-down-navigation-touch-friendly-and-responsive/doubletaptogo.min.js"></script>

<script>
jQuery(document).ready(function( $ ) {
var $document = $(document),
    $element = $('.sticky-header'),
    className = 'active';

$document.scroll(function() {
  if ($document.scrollTop() >= 250) {
    $element.addClass(className);
  } else {
    $element.removeClass(className);
  }
});

$( '.topnav li:has(ul)' ).doubleTapToGo();

});








</script>


<?php if( get_field('custom_css_toggle') ): ?>
<style>
/*-- Local Page CSS --*/ 
<?php the_field('local_css'); ?>
</style>
<?php endif; ?>

</head>



<body <?php body_class(); ?>>

<div id="wrapper" class="mainWrapper hfeed">

   <header id="header" class="header" role="banner">
	
 	<a href="/" class="logo">
		<img alt="Heaven's Best" src="<?php the_field('logo_url','option'); ?>" />
	</a>

	<aside class="header-aside">
		<div class="dry-ribbon">
		<img alt="Dry in 1 Hour" src="https://res.cloudinary.com/ez-nettools/image/upload/v1496774919/dry-banner-flat_i3nrpr.png" />
		</div>
		<div class="phone"><?php the_field('phone_number', 'option'); ?></div>
	</aside>

	<nav id="menu" class="topnav" role="navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container' => false ) ); ?>
	</nav>
	
   </header>

   <header class="sticky-header">
    <div class="header mainWrapper">
 	<a href="/" class="logo">
		<img src="https://res.cloudinary.com/ez-nettools/image/upload/v1496774893/logo-flat_hr0qck.png" />
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