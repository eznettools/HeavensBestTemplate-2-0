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
			<div style="background-image:url(<?php echo wp_get_attachment_image_url( $image, $size ); ?>);" class="image-box "></div> 

		<?php elseif( get_field('banner_type') == 'slideshow' ): ?>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/wallop/2.4.1/js/Wallop.js"></script>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/wallop/2.4.1/css/wallop--fade.min.css" />
				<?php if( have_rows('slides') ): ?>
				<div class="Wallop Wallop--fade">
					<ul class="Wallop-list">
					<?php while( have_rows('slides') ): the_row(); $image = get_sub_field('image'); ?>
						<div style="background-image:url(<?php echo $image['sizes']['large']; ?>);" class="image-box slide Wallop-item"></div>
					<?php endwhile; ?>
					</ul>
	    	<button class="Wallop-buttonPrevious">&lsaquo;</button>
    		<button class="Wallop-buttonNext">&rsaquo;</button>
				</div>
				<?php endif; ?>
		<script>
		jQuery(document).ready(function( $ ) {
			var wallopEl = document.querySelector('.Wallop');
			var wallop = new Wallop(wallopEl);
			autoplay(5500);
			function autoplay(interval) {
			  var lastTime = 0;  
			  function frame(timestamp) {
			    var update = timestamp - lastTime >= interval;
				    if (update) {
				      wallop.next();
				      lastTime = timestamp;
				    }
			    requestAnimationFrame(frame);
				  }
			  requestAnimationFrame(frame);
			};
		});
		</script>

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
			
		<div class="textbox">
			<h1><span class="cleaning-title"><?php the_field('banner_title'); ?></span>
			<big class="franchise-area-title"> 
				<?php if( get_field('franchise_area_name') ) { the_field('franchise_area_name'); } else { the_field('primary_location_name','option'); } ?>
			</big>
			</h1>
			<a class="primary button" href="<?php the_field('button_link'); ?>"><?php the_field('button_text'); ?></a>
		</div>
		<img class="clouds" src="https://res.cloudinary.com/ez-nettools/image/upload/v1502310103/clouds3_rwfjfb.png" />
	</section>

	<?php endif; ?>


	<a class="primary button mobile-only" href="<?php the_field('button_link'); ?>"><?php the_field('button_text'); ?></a>


	<?php if( have_rows('featured_services') ): ?>
 
	<section id="featured-services" class="featured-services">
	  <header class="section-header">
		<?php the_field('featured_services_title'); ?>
	  </header>
	  <div class="inner">

	<?php while( have_rows('featured_services') ): the_row(); 
		$image = get_sub_field('featured_image'); $content = get_sub_field('featured_name'); $link = get_sub_field('featured_link');
		?>
		<figure style="background-image:url(<?php echo $image['sizes']['medium']; ?>);   " >
			<?php if( $link ): ?><a href="<?php echo $link; ?>"><?php endif; ?>
				<!--<img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt'] ?>" />-->
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
	<div class="inner">

    <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>

			<?php get_template_part( 'coupons' ); ?>

    <?php endforeach; ?>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

	<?php if( get_field('full_size_all_specials') ): ?>
	<a class="coupon see-all show" href="/deal/">
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
<style>
.coupon:hover { transform:scale(1.015); }
</style>
<script>
jQuery(document).ready(function( $ ) {

(function() {
   $( document )
    .on( "mousemove touchstart touchmove", ".coupon", function( event ) {
    var halfW = ( this.clientWidth / 2 );
    var halfH = ( this.clientHeight / 2 );
    var coorX = ( halfW - ( event.pageX - this.offsetLeft ) );
    var coorY = ( halfH - ( event.pageY - this.offsetTop ) );
    var degX  = ( ( coorY / halfH ) * 10 ) + 'deg'; // max. degree = 10
    var degY  = ( ( coorX / halfW ) * -10 ) + 'deg'; // max. degree = 10
    var opacity = Math.abs(coorY *.0037)
     
    $(this).children('.shine').css('background','radial-gradient(circle at ' + coorX + '%' + coorY + '%, rgba(255,255,255,' + opacity + ') 1%, rgba(255,255,255,0) 75% )');

    $(this).css({'transition':'none', 'zIndex':'50'})

    $( this ).css( 'transform', function() {
      return 'perspective( 1200px ) translate3d( 0, -2px, 0 ) scale(1.03)  rotateX('+ degX +') rotateY('+ degY +')';           
    } )
  } )
    .on( "mouseout touchend", ".coupon", function() {
    $( this ).removeAttr( 'style' );
     $(this).children().removeAttr( 'style' );
  } );
  
})();

});
</script>
<?php endif; ?>

	</section>


<?php endif;?>







 
	<!--<?php get_template_part( 'quick', 'estimate' ); ?>-->
 

<?php get_template_part( 'google', 'review' ); ?>



<?php get_template_part( 'service', 'areas' ); ?>





 </article>
	
<?php if ( ! post_password_required() ) comments_template( '', true ); ?>


</main>
</div>

<?php get_footer(); ?>