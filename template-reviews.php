<?php /* Template Name: Reviews */ ?>
 
<?php 
acf_form_head();
get_header(); 
?>


<section id="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



	<section class="entry-content">
	  <div class="maxwidth">

		<?php the_content(); ?>

		<?php if( get_field('show_reviews') ): ?>
			<?php $args = array( 'post_type' => 'review', 'posts_per_page' => 16 );
			$Gloop = new WP_Query( $args );
			while ( $Gloop->have_posts() ) : $Gloop->the_post(); ?>

				<blockquote>
				 <?php the_field('review_text'); ?> 
				<cite> &mdash;<?php the_title(); ?> </cite>
				</blockquote>
 
			<?php endwhile; ?>
		<?php endif; ?>


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


	  </div>
	</section>





<!-- Show Child Pages For Testimonials -->
<header class="blue-header"><h2 class="maxwidth">Service Areas</h2></header> 
<section class="blue-box service-areas">
 <div class="maxwidth">

<ul class="area-list">
    <?php wp_list_categories( array(
        'orderby'    => 'name',
	'title_li' => '',
	'taxonomy' => 'location',
	'hide_empty' => '0'
    ) ); ?>
</ul>

 </div>
</section>






 
 		 <?php if ( ! post_password_required() ) comments_template( '', true ); ?> 


 </article>
	
 

<?php endwhile; endif; ?>
</section>

 
<?php get_footer(); ?>