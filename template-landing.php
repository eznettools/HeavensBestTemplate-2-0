<?php /* Template Name: Landing */ ?>


<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<?php wp_head(); ?>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700" rel="stylesheet">
	<link href="/wp-content/themes/heavens-best-modern/landing.css" type="text/css" rel="stylesheet" />

</head> 
<body class="<?php the_field('theme'); ?>" >



<section class="primary-section" style="<?php if ( has_post_thumbnail() ) : ?>background-image:url(<?php the_post_thumbnail_url( 'full' ); ?>);<?php endif; ?> background-size:cover;  ">

	<header class="landing-header">
		<h1><?php the_field('main_title'); ?></h1>
	</header>

	<div class="column-parent">


		<div class="text-block">

			<?php if( get_field('type_of_content') == 'text' ): ?>
 			<?php the_field('special_offer_details'); ?>
			<?php endif; ?>

			<?php if( get_field('type_of_content') == 'html' ): ?>
			<?php the_field('special_icon_html'); ?>
			<?php endif; ?>

		</div>
 

		<div class="form-wrapper">
			<div class="form-logo"><img alt="Heaven's Best" src="<?php the_field('logo_url','option'); ?>" /></div>
			<?php if( get_field('choose_your_form') ): ?>
				<?php the_field('choose_your_form');    ?>
			<?php else: ?>
				<?php echo FrmFormsController::get_form_shortcode( array( 'id' => 5, 'title' => false, 'description' => false ) ); ?>
			<?php endif; ?>
		</div>


	</div>

</section>

<section class="extra-info">

	<?php the_field('additional_features'); ?>

</section>

<section class="phone-footer">

	<?php if( get_field('phone_number') ): ?>

		<h2 class="phone-number">Call Us: <?php the_field('phone_number'); ?></h2>

	<?php else: ?>

		<h2 class="phone-number">Call Us: <?php the_field('phone_number','option'); ?></h2>

	<?php endif; ?>

	<?php if( get_field('add_homepage_link') ): ?>
		<a class="homepage-link" href="/">Visit Our Website</a>
	<?php endif; ?>

</section>

<footer class="address-footer">

	<?php if( get_field('add_address') ): ?>


	<div class="vcard" style="clear:both; text-align:center; padding:10px;">
	   <strong class="fn org">Heaven's Best Carpet Cleaners - <?php the_field('primary_location_name', 'option'); ?></strong> 
	     <div class="adr"> 
	        <span class="street-address"><?php the_field('street_address', 'option'); ?></span><br>
	        <span class="locality"><?php the_field('city', 'option'); ?></span>, 
	        <span class="region"><?php the_field('state_or_province', 'option'); ?></span>,
	        <span class="postal-code"><?php the_field('zip_code', 'option'); ?></span>
	     </div>   
	   Phone: <span class="tel"><?php the_field('phone_number', 'option'); ?></span>
</div>

	<?php endif; ?>

</footer>


<?php the_field('general_footer_code', 'option'); ?>

<?php wp_footer(); ?>
 


</body>
</html>
