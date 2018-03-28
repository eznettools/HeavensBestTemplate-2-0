<?php
  get_header(); 
?>

<style>
#slideshow {position:relative;}
#slideshow ul {	margin:0; padding:0; position:relative; }
#slideshow li {	margin:0; list-style:none;position: absolute; left: 0; top: 0;}
#slideshow li:first-child {	position: relative;  z-index: 3; }
#slideshow .lSSlideOuter li {position:relative;}
.lSAction a { top:0%; height:98%; background:rgba(80,80,80,.4); margin:0; display:flex; justify-content: center; align-items:center; color:white; font-size:2.5em; opacity:.4; text-shadow:1px 0px 8px #333; z-index:20;}
.lSAction > .lSPrev {left:0;}
.lSAction > .lSNext {right:0;}
.lSPrev:after {content:'\2039';}
.lSNext:after {content:'\203A';}
#slideshow .primary.button {position:absolute;  bottom:5%;  right:1%;}
@media (max-width:400px) {
	#slideshow .primary.button {position:static; width:100%; text-align:center; }
}
</style>

<main id="content" role="main" class="reviews ">

<article class="entry-content">

 <!--
	<header class="banner">
	<?php $queried_object = get_queried_object(); $taxonomy = $queried_object->taxonomy; $term_id = $queried_object->term_id;  ?>
		<?php if( get_field('custom_banner_image', $taxonomy . '_' . $term_id) ): ?>
			<div style="background-image:url(<?php the_field('custom_banner_image', $taxonomy . '_' . $term_id); ?>);" class="image-box "></div> 
		<?php else: ?>
			<?php $image = get_field('banner_image', 17); $size = 'large'; ?>
			<div style="background-image:url(<?php echo wp_get_attachment_image_url( $image, $size ); ?>);" class="image-box "></div> 
		<?php endif; ?>
		<div class="textbox">
		<?php if( get_field('location_title', $taxonomy . '_' . $term_id) ): ?>
 			<h1><?php the_field('location_title', $taxonomy . '_' . $term_id); ?></h1>
		<?php else: ?>
			<h1><span class="cleaning-title">Carpet Cleaning </span>
			<big class="franchise-area-title">
				<?php single_term_title(); ?> <?php the_field('state_or_province','option'); ?>
			</big>
			</h1>
		<?php endif; ?>
			<a class="primary button" href="<?php the_field('button_link',17); ?>"><?php the_field('button_text',17); ?></a>
		</div>
	</header>
 -->

	
<section id="slideshow">
	<?php if( get_field('slideshow' , options) ): ?>
		<ul>
		<?php while( have_rows('slideshow', options) ): the_row(); $image = get_sub_field('image'); ?>
			<li><img alt=" " src="<?php echo $image; ?>" /></li>
		<?php endwhile; ?>
		</ul>
	<?php else: ?>
		<ul>
			<li><img alt="Fast Professional Service" src="https://res.cloudinary.com/ez-nettools/image/upload/v1512594452/Fast_Professional_Service_szehlc.webp" onerror="this.onerror=null; this.src='https://res.cloudinary.com/ez-nettools/image/upload/v1512594452/Fast_Professional_Service_szehlc.jpg' "/></li>
			<li><img alt="Safe for Pets and People" src="https://res.cloudinary.com/ez-nettools/image/upload/v1512594474/safe_for_pets_and_people_jgj8io.webp" onerror="this.onerror=null; this.src='https://res.cloudinary.com/ez-nettools/image/upload/v1512594474/safe_for_pets_and_people_jgj8io.jpg' "/></li>			
			<li><img alt="Dry in 1 Hour" src="https://res.cloudinary.com/ez-nettools/image/upload/v1512764723/Dry_in_1_Hour_mtcqdm.webp" onerror="this.onerror=null; this.src='https://res.cloudinary.com/ez-nettools/image/upload/v1512764723/Dry_in_1_Hour_mtcqdm.jpg' "/></li>			
		</ul>
	<?php endif; ?>
 </section>

<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.5/js/lightslider.min.js"></script>-->
<!--<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.5/css/lightslider.min.css" />-->
<script>
jQuery(document).ready(function( $ ) {
  $("#slideshow ul").lightSlider({
	item: 1,
	adaptiveHeight: false,
        autoWidth: false,
        auto: true,
        loop: true,
		mode: 'fade',
		speed: 600,
        pager: false,
        pause:3000
  });
});
</script>


 
	<div class="maxwidth">
		<?php if( get_field('location_title', $taxonomy . '_' . $term_id) ): ?>
 			<h1><?php the_field('location_title', $taxonomy . '_' . $term_id); ?></h1>
		<?php else: ?>
			<h1><span>Carpet Cleaning </span><big><?php single_term_title(); ?> <?php the_field('state_or_province','option'); ?></big></h1>
		<?php endif; ?>
 		<?php if( term_description() ): ?>
			<?php echo term_description(); ?> 
		<?php else: ?>
		<p>We provide quality <b>carpet cleaning services in <?php single_term_title(); ?>, <?php the_field('state_or_province','option'); ?></b> and the surrounding areas. There are several reasons to get your carpets cleaned, we recommend having it done professional every 6 to 12 months.  People love Heaven's Best Carpet Cleaning (<?php single_term_title(); ?>, <?php the_field('state_or_province','option'); ?>) because of our quality service and effective low-moisture cleaning process.  </p>
			<p>Here's what our customers are saying about us in your area...</p> 
		<?php endif; ?>

	</div>




 
<section class="review-wrapper">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<div class="h-review">
			<?php edit_post_link(); ?>

				<blockquote>
				
				 <?php $starCount = get_field('rating'); $percent = $starCount * 20;  ?>

				<cite class="p-name"><?php the_title(); ?></cite>
				<time class="dt-published" datetime="<?php the_time('Y-m-d h:i'); ?>"><?php the_time('M j, Y'); ?></time> 
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
					<?php the_field('review_text'); ?>  
				  </p>
				</div>				
				</blockquote>
 			</div>
<?php endwhile; endif; ?>
</section>

<?php get_template_part( 'nav', 'below' ); ?>
 
	<div style="text-align:right; font-size:.8em; padding:6px 0; color:#888;">
		Overall Score: <?php echo number_format($average,1); ?> 
	</div>
 
<div id="review-form" class="maxwidth review-form">
	<?php echo FrmFormsController::get_form_shortcode( array( 'id' => 11, 'title' => false, 'description' => false ) ); ?>
</div>
<script>
jQuery(document).ready(function( $ ) {

$('.frm_scale label').css('color','transparent');
$('.frm_scale input').css('display','none');

$('.frm_scale input').click(function() {
  var Parent = $(this).parent().parent();
  Parent.siblings().removeClass('selected');
  Parent.addClass('selected');
  Parent.prevAll().addClass('selected');
});

});
</script>
 
 

<script type="application/ld+json">
{ "@context": "http://schema.org",
  "@type": "Product",
  "name": "<?php wp_title(); ?>",
  "aggregateRating":
    {"@type": "AggregateRating",
     "ratingValue": "<?php echo number_format($average,1); ?>",
     "reviewCount": "<?php echo $ratingCount; ?>"
    }
}
</script>


</article>


<?php get_template_part( 'google', 'review' ); ?>

<?php get_template_part( 'service', 'areas' ); ?>



<style>
.acf-taxonomy-field ul.children {padding-left:4px; display:inline-block;}
</style>

</main>
</div>

<?php get_footer(); ?>