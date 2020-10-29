<?php /* Template Name: Reviews */ ?>
 
<?php get_header(); ?>


<main id="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<section class="entry-content">


		<?php the_content(); ?>


		<?php if( get_field('show_reviews') ): ?>
		<section class="review-wrapper">
			<?php $args = array( 'post_type' => 'review', 'posts_per_page' => 46 );
			$Gloop = new WP_Query( $args );
			while ( $Gloop->have_posts() ) : $Gloop->the_post(); ?>

			<div class="h-review">
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
			<?php endwhile; ?>


		</section>
 		<?php endif; ?>

	<div style="text-align:right; font-size:.8em; padding:6px 0; color:#888;">
		Overall Score: <?php echo number_format($average,1); ?> 
	</div>
 

<div id="review-form" class="maxwidth review-form">
	<?php echo FrmFormsController::get_form_shortcode( array( 'id' => 11, 'title' => false, 'description' => false ) ); ?>
</div>


	</section>




<?php get_template_part( 'google', 'review' ); ?>

<?php get_template_part( 'service', 'areas' ); ?>
 

<?php endwhile; endif; ?>
</main>

</div>


<?php if( current_user_can('administrator')):  ?> 
	<div style="text-align:center; font-size:.75em; padding:6px 0; color:#666;">
		Total Stars: <?php echo $ratingTotal; ?> / Number of Reviews: <?php echo $ratingCount; ?> = Average Rating: <?php echo number_format($average,1); ?> 
	</div>
<?php endif; ?>


<script type="application/ld+json">
{ "@context": "http://schema.org",
  "@type": "Organization",
  "name": "<?php wp_title(); ?>"
<?php if( get_field('show_reviews') ): ?>
  , "aggregateRating":
    {"@type": "AggregateRating",
     "ratingValue": "<?php echo number_format($average,1); ?>",
     "reviewCount": "<?php echo $ratingCount; ?>"
    }
<?php endif; ?>
}
</script>


<script>
jQuery(document).ready(function( $ ) {

$('.frm_scale label').css('color','transparent');
$('.frm_scale input').css('display','none');
$('#field_rating-5').prop("checked", true);
$('.frm_scale').addClass('selected');
	
$('.frm_scale input').click(updateStars);

function updateStars(){
  var Parent = $(this).parent().parent();
  Parent.siblings().removeClass('selected');
  Parent.addClass('selected');
  Parent.prevAll().addClass('selected');
}
	
});
</script>
 
<?php get_footer(); ?>