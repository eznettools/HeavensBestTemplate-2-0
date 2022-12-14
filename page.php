<?php get_header(); ?>

<main id="content" role="main">


	

 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


<?php if( is_page('Home') ): ?>
	 
	
	
	
	 
<section class="banner">
		<?php if( get_field('banner_type') == 'video' ): ?>
			<video muted autoplay <?php if( get_field('loop') ): ?>loop<?php endif; ?> playsinline>
				<source src="<?php the_field('video_url'); ?>" type="video/mp4">
			</video>
		<?php elseif( get_field('banner_type') == 'image' ): ?>
			<?php $image = get_field('banner_image'); $size = 'large'; ?>
			<div class="image-box ">
				<?php echo wp_get_attachment_image( $image, $size, false, array( "loading" => "eager" )  ); ?>
			</div> 

		<?php elseif( get_field('banner_type') == 'slideshow' ): ?>
			<!-- Find Slideshow documentation at https://swiffyslider.com/docs -->
			<script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/js/swiffy-slider.min.js" crossorigin="anonymous" defer></script>
			<?php if( have_rows('slides') ): $count = 1; ?>
			<section class="swiffy-slider slider-nav-autoplay" data-slider-nav-autoplay-interval="4500">
					<ul class="slider-container">
					<?php while( have_rows('slides') ): the_row(); $image = get_sub_field('image'); ?>
						<li aria-label="<?php echo $image['alt'] ?>" >
						<img width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt'] ?>" 
							<?php if( $count > 1 ) { echo ' loading=lazy decoding="async" '; } ?>  >
						</li>
						<?php $count++; ?>
					<?php endwhile; ?>
					</ul>
	    	<button type="button" class="slider-nav"></button>
    		<button type="button" class="slider-nav slider-nav-next"></button>
			</section>
			<?php endif; ?>


		<?php else: ?> <!-- Fallback so old templates don't get broken in update -->
			<?php if( get_field('video_background') ): ?>
			<video muted autoplay <?php if( get_field('loop') ): ?>loop<?php endif; ?> playsinline>
				<source src="<?php the_field('video_url'); ?>" type="video/mp4">
			</video>
			<?php else: ?>
				<?php $image = get_field('banner_image'); $size = 'large'; ?>
				<div style="background-image:url(<?php echo wp_get_attachment_image_url( $image, $size ); ?>);" class="image-box "></div> 
			<?php endif; ?>
		<?php endif; ?>

		<?php if( get_field('franchise_area_name') ): ?>
		<div class="textbox">
			<h1><span class="cleaning-title"><?php the_field('banner_title'); ?></span>
			<big class="franchise-area-title">
				<?php the_field('franchise_area_name');  ?>
			</big>
			</h1>
			<a class="primary button" href="<?php the_field('button_link'); ?>"><?php the_field('button_text'); ?></a>
		</div>
		<?php endif; ?>
	
		<img alt=" " class="clouds" src="https://res.cloudinary.com/ez-nettools/image/upload/v1670868099/clouds_vector3_kt5cak.svg" />
</section>
<?php endif; ?>


	<!--<a class="primary button mobile-only" href="<?php the_field('button_link'); ?>"><?php the_field('button_text'); ?></a>-->

 <?php the_field('unique_selling_point' ) ;?>
	 
	 

	 
	 
	 
	<?php if( have_rows('featured_services') ): ?>
	<section id="featured-services" class="featured-services">
	  <header class="section-header">
		<?php the_field('featured_services_title'); ?>
	  </header>
	  <div class="inner">

	<?php while( have_rows('featured_services') ): the_row(); 
		$image = get_sub_field('featured_image'); $content = get_sub_field('featured_name'); $link = get_sub_field('featured_link');
		?>
		<figure  >
			<?php if( $link ): ?><a href="<?php echo $link; ?>"><?php endif; ?>
				<img loading=lazy decoding="async" src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt'] ?>" />
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



<!--<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>-->

<?php if( '' !== get_post()->post_content ): ?>

	<section class="entry-content">
	  <div class="maxwidth">
		<?php the_content(); ?>
	  </div>
	</section>

<?php endif; ?>

<!--<?php endwhile; endif; ?>-->


<?php if( get_field('include_coupons_on_homepage') and get_field('special_deal_post') ): ?>
	<section id="coupons" class="coupons">
		<header class="section-header">
			<?php the_field('coupon_title'); ?>
		</header>

<!-- ========= Special Deal Coupons ========== -->


<?php $post_objects = get_field('special_deal_post');
if( $post_objects ): ?>
	<div class="coupon-collection">

    <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>

			<?php get_template_part( 'coupons' ); ?>

    <?php endforeach; ?>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

	<?php if( get_field('full_size_all_specials') ): ?>
	<a class=" see-all show" href="/deal/">
		<div class="shine"></div>
		<h4><?php the_field('all_specials_tile_text'); ?></h4>
	</a>
	<?php endif; ?>
 
	  </div>
<?php endif;?>

	<?php if( get_field('small_all_specials_button') ): ?>
	<footer class="section-footer"><?php the_field('special_deals_button'); ?></footer> 
	<?php endif; ?>

<?php if( get_field('3d_hover_effect') ): /*-- 3D effect javascript--*/  ?>


<script>
addEventListener('DOMContentLoaded', e => {
	

 const couponWrapper = document.querySelector('#coupons');
 const coupons = couponWrapper.querySelectorAll('.coupon');
	
 coupons.forEach( coupon => {
	couponWidth = Math.floor( coupon.getBoundingClientRect().width );
	coupon.style.setProperty('--width', couponWidth );
	couponHeight = Math.floor( coupon.getBoundingClientRect().height );
	coupon.style.setProperty('--height', couponHeight );
	coupon.addEventListener('mousemove', e => {
		coupon.style.setProperty('--mouseX', e.clientX - coupon.getBoundingClientRect().left );
		coupon.style.setProperty('--mouseY', e.clientY - coupon.getBoundingClientRect().top );
		e.cancelBubble = true;
	})
	coupon.addEventListener('mouseenter', e => {
		coupon.classList.add('is_hovered');
	});
	
	coupon.addEventListener('pointerleave', e => {
		coupon.classList.remove('is_hovered');
	})
 })
})
</script>
		
<?php endif; ?>

	</section>


<?php endif;?>

	 
<?php if( have_rows('testimonial_repeater') ): ?>
<?php $ratingTotal = 0; $ratingCount = 0; ?>
<section class="review-wrapper">
	<?php while( have_rows('testimonial_repeater') ): the_row();  $review = get_sub_field('review'); $cite = get_sub_field('cite'); $date = get_sub_field('date');  ?>
		<div class="h-review">
		<blockquote>
			 <?php $starCount = get_sub_field('rating'); $percent = $starCount * 20;  ?>
			<cite class="p-name"><?php echo $cite; ?></cite>
			<time class="dt-published" datetime="<?php the_time('Y-m-d h:i'); ?>"><?php echo $date; ?></time> 
			<?php if( $starCount ): ?>
				<?php $ratingTotal += $starCount; $ratingCount++; $average = $ratingTotal / $ratingCount ?>
					<data class="p-rating show-stars-wrapper" value="<?php echo $starCount ?>" title="<?php echo $starCount ?> Stars" >&#9733;&#9733;&#9733;&#9733;&#9733;
						<div class="show-stars gray" style="width:100%;">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
						<div class="show-stars colored" style="width:<?php echo $percent ?>%;  ">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
					</data>	
				<div style="display:none;"><?php echo $ratingTotal; ?>/<?php echo $ratingCount; ?>=<?php echo number_format($average,1); ?></div>
			<?php endif; ?>
			<div class="e-content">
			  <p>
				<?php echo $review; ?>  
			  </p>
			</div>

		</blockquote>
 		</div>
	<?php endwhile; ?>
</section>

	<?php if( current_user_can('administrator') and $average ):  ?> 
		<div style="text-align:center; font-size:.75em; padding:6px 0; color:#666;">
			  Average Rating: <?php echo number_format($average,1); ?> 
		</div>
	<?php endif; ?>

<?php endif; ?>
	 

<script type="application/ld+json">
{ "@context": "http://schema.org",
  "@type": "localbusiness",
  "name": "<?php wp_title(); ?>",
  "image": "<?php the_field('logo_url','option'); ?>",
  "priceRange": "<?php the_field('price_range', 'option'); ?>",
  "telephone": "<?php the_field('phone_number', 'option'); ?>",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "<?php the_field('street_address', 'option'); ?>",
    "addressLocality": "<?php the_field('city', 'option'); ?>",
    "addressRegion": "<?php the_field('state_or_province', 'option'); ?>",
    "postalCode": "<?php the_field('zip_code', 'option'); ?>"
  }
<?php if( have_rows('testimonial_repeater') ): ?>
  , "aggregateRating":
    {"@type": "AggregateRating",
     "ratingValue": "<?php echo number_format($average,1); ?>",
     "reviewCount": "<?php echo $ratingCount; ?>"
    }
<?php endif; ?>
}
</script>
	 
 
 

<?php get_template_part( 'google', 'review' ); ?>


<?php get_template_part( 'service', 'areas' ); ?>


 
 </article>
	
<?php if ( ! post_password_required() ) comments_template( '', true ); ?>


</main>
</div>













<?php get_footer(); ?>