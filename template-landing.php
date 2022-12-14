<?php /* Template Name: Landing */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />

	<link rel="preload" as="image" href="<?php the_post_thumbnail_url( 'full' ); ?>" />
	<?php $theme = get_field('theme'); ?>
	<?php if ($theme == 'fall') { echo '<link rel="preload" as="image" href="https://res.cloudinary.com/ez-nettools/image/upload/f_auto/fall-background_jikenu_e7cmgx.avif" />'; }  ?>
	<?php if ($theme == 'christmas') { echo '<link rel="preload" as="image" href="https://res.cloudinary.com/ez-nettools/image/upload/f_auto/holiday-background_hotef6_tuzskh.webp" />'; }  ?>
	<link rel="preload" as="image" href="https://res.cloudinary.com/ez-nettools/image/upload/f_auto/carpet_cleaning_3_hqdrov.avif" />
	<link rel="preload" as="image" href="<?php the_field('logo_url','option'); ?>"  />
	<?php wp_head(); ?>
	<!-- <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">-->
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
	<link href="/wp-content/themes/heavens-best-modern/landing.css?v2.0" type="text/css" rel="stylesheet" />
</head> 
<body class="<?php echo $theme; ?>" >



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
			<div class="form-logo"><img width=280 height=280 alt="Heaven's Best" src="<?php the_field('logo_url','option'); ?>" /></div>
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
