<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<!--<link href="https://fonts.googleapis.com/css?family=Oswald:700|Roboto:400,400i,700" rel="stylesheet">-->
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
	<?php wp_head(); ?>

</head>

<style>
/*---- Local page CSS -----*/ 
<?php the_field('local_css'); ?>
</style>

<body <?php body_class(); ?>>

<div id="wrapper" class="hfeed">

   <header id="header" role="banner">
	
 	<a href="/" id="logo">
		<img src="https://res.cloudinary.com/ez-nettools/image/upload/v1496774893/logo-flat_hr0qck.png" />
	</a>

	<aside class="header-aside">
		<img alt="Dry in 1 Hour" id="dry-ribbon" src="https://res.cloudinary.com/ez-nettools/image/upload/v1496774919/dry-banner-flat_i3nrpr.png" />
		<div class="phone"><?php the_field('phone_number', 'option'); ?></div>


	</aside>

	<nav id="menu" role="navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container' => false ) ); ?>
	</nav>
	

 
	

	
   </header>
	
	<div id="container">