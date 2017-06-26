<?php get_header(); ?>

<main id="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<?php if( is_page('Home') ): ?>
	<section class="banner">
		<?php if( get_field('banner_image') == true ) { ?>
			<?php $image = get_field('banner_image'); $size = 'large'; ?>
			<div style="background-image:url(<?php echo wp_get_attachment_image_url( $image, $size ); ?>);" class="image-box"></div>
			
		<?php } else { ?>
			<div style="background-image:url(https://res.cloudinary.com/ez-nettools/image/upload/v1496775388/girl-carpet_ze08yo.jpg);" class="image-box"></div>
			<!--<img src="https://res.cloudinary.com/ez-nettools/image/upload/v1496775388/girl-carpet_ze08yo.jpg" />-->
		<?php } ?>
		<div class="textbox">
			<h1><?php the_field('banner_title'); ?>  
			<big><?php the_field('franchise_area_name'); ?></big>
			</h1>
			<a class="primary button" href="<?php the_field('button_link'); ?>"><?php the_field('button_text'); ?></a>
		</div>
		<img class="clouds" src="https://res.cloudinary.com/ez-nettools/image/upload/v1496775273/Clouds-Group_zzdy9k.png" />
	</section>

<!-- possible parallax scrolling code
<script>
jQuery(document).ready(function( $ ) {

	$(document).scroll(function() {
	 var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
	 console.log( scrollTop );
	$('.image-box').css('transform', 'translateY(' + scrollTop/2 + 'px)' );
	});

});
</script>
-->

	<?php endif; ?>




	<?php if( have_rows('featured_services') ): ?>
 
	<section id="featured-services" class="featured-services">
	  <header class="section-header">
		<?php the_field('featured_services_title'); ?>
	  </header>
	  <div class="inner">

	<?php while( have_rows('featured_services') ): the_row(); 
		$image = get_sub_field('featured_image'); 
		$content = get_sub_field('featured_name');
		$link = get_sub_field('featured_link');
		?>
		<figure style="background-image:url(<?php echo $image['url']; ?>);   " >
			<?php if( $link ): ?><a href="<?php echo $link; ?>"><?php endif; ?>
				<!--<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />-->
				<figcaption><?php echo $content; ?></figcaption>
			<?php if( $link ): ?></a><?php endif; ?>
		</figure>
	<?php endwhile; ?>

 	  </div>
	 <footer class="section-footer"><?php the_field('all_services_button'); ?></footer>
	</section>

	<?php endif; ?>



	<?php if( get_field('homepage_summary') ): ?>
	<section id="homepage-summary" class="homepage-summary">
	  <div class="maxwidth">
		<?php the_field('homepage_summary'); ?>

		 <footer class="maxwidth">
			<?php the_field('homepage_summary_button'); ?>
		</footer>
	 </div>
	</section>
	<?php endif; ?>




	<section class="entry-content">
	  <div class="maxwidth">
		<?php the_content(); ?>
	  </div>
	</section>



	<?php if( have_rows('coupons') ): ?>
	<section id="coupons" class="coupons">
		<header class="section-header">
			<?php the_field('coupon_title'); ?>
		</header>

	<div class="inner">

	<?php while( have_rows('coupons') ): the_row(); ?>
		<article class="coupon">
		   <div class="coupon-text">
			<h2><?php the_sub_field('big_title'); ?></h2>
			<h3><?php the_sub_field('small_title'); ?></h3>
			<?php the_sub_field('details'); ?>
			<?php if( get_sub_field('expiration_date') == true ): ?>
				<div class="expiration-date"><p>Expires: <?php the_sub_field('expiration_date'); ?>  </p></div>
			<?php endif; ?>
		   </div>
		</article>
	<?php endwhile; ?>

	<a href=""></a>
	  </div>
	 <footer class="section-footer"><?php the_field('special_deals_button'); ?></footer>
	</section>
	<?php endif; ?>	






	<?php if( have_rows('logos_awards_etc') ): ?>
	<section id="accolade-bar" class="accolade-bar <?php if( get_field('grayscale_images') ): ?> grayscale <?php endif; ?>" >
	<?php while( have_rows('logos_awards_etc') ): the_row(); $link = get_sub_field('logo_link'); ?>
 
		<figure>
			<?php if( $link ): ?><a target="_blank" href="<?php echo $link; ?>"><?php endif; ?>
			<?php $image = get_sub_field('logo_or_icon'); $size = 'small'; 
				if( $image ) { echo wp_get_attachment_image( $image, $size ); }
			?>
			<?php if( $link ): ?></a><?php endif; ?>
		</figure>
 
	<?php endwhile; ?>
	</section>
	<?php endif; ?>






<!-- Write Google Review -->
<section id="leave-google-review" class="leave-google-review margin background-box" style="">
	<?php the_field('google_review_message','option'); ?>
	<a class="primary button" href="<?php the_field('google_review_link','option'); ?>"><?php the_field('google_review_button_text','option'); ?></a>
	<link rel="prerender" crossorigin href="<?php the_field('google_review_link','option'); ?>">
	<div class="background front"></div>
	<div class="background med"></div>
	<div class="background back"></div>
	<!--<img class="clouds" src="https://res.cloudinary.com/ez-nettools/image/upload/v1496775273/Clouds-Group_zzdy9k.png" />-->
	<?php if( get_field('read_reviews_link','option') ): ?>
		<p style="margin-bottom:0;"><a class="secondary button" href="<?php the_field('read_reviews_link','option'); ?>"><?php the_field('read_reviews_button_text','option'); ?></a></p>
	<?php endif; ?>
</section>




<header class="blue-header"><h2 class="maxwidth">Request An Estimate</h2></header> 
<section id="respond" class="blue-box"> 
 <div class="maxwidth">
	<?php echo FrmFormsController::get_form_shortcode( array( 'id' => 9, 'title' => false, 'description' => false ) ); ?>
 </div>
</section>

 




 

<!-- Show Services Areas -->
<header class="blue-header"><h2 class="maxwidth">Service Areas</h2></header> 
<section class="blue-box service-areas">
 <div class="maxwidth">

<?php if( get_field('override_service_areas','option') ): ?>
	<?php wp_nav_menu( array( 'theme_location' => 'service-areas' ) ); ?>
<?php else: ?>

<ul class="area-list">
    <?php wp_list_categories( array(
        'orderby'    => 'name',
	'title_li' => '',
	'hierarchical' => false,
	'taxonomy' => 'location',
	'hide_empty' => 0
    ) ); ?>
</ul>
<?php endif; ?>

 </div>
</section>
 




 </article>
	
<?php if ( ! post_password_required() ) comments_template( '', true ); ?>

<?php endwhile; endif; ?>
</main>


<?php get_footer(); ?>