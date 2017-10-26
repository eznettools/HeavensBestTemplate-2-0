<?php
  get_header(); 
?>

<main id="content" role="main" class="reviews ">

<article class="entry-content">

	<header class="section-header maxwidth">
		<?php $queried_object = get_queried_object(); $taxonomy = $queried_object->taxonomy; $term_id = $queried_object->term_id;  ?>

		<?php if( get_field('location_title', $taxonomy . '_' . $term_id) ): ?>
 			<h1><?php the_field('location_title', $taxonomy . '_' . $term_id); ?></h1>
		<?php else: ?>
 		<h1><small>Carpet Cleaning</small> <?php single_term_title(); ?> <?php the_field('state_or_province','option'); ?></h1>
		<?php endif; ?>

		<?php echo term_description(); ?> 
	</header>




 
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

<!--
<h2>Write a Testimonial...</h2>
	<?php	
	acf_form(array(
		'post_id'	=> 'new_post',
		'post_title'	=> true,
		'post_content'	=> false,
		'submit_value' => 'Submit Testimonial',
		'field_groups'   => array(312),
		'new_post'	=> array(
			'post_type'	=> 'review',
			'post_status'	=> 'publish'
		)
	));
	?>
-->



</article>


<?php get_template_part( 'google', 'review' ); ?>

<?php get_template_part( 'service', 'areas' ); ?>





<style>
.acf-taxonomy-field ul.children {padding-left:4px; display:inline-block;}
</style>

</main>
</div>

<?php get_footer(); ?>