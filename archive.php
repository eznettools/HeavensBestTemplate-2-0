<?php
acf_form_head();
get_header(); 
?>

<main id="content" role="main">

	
<section class="reviews maxwidth">

	<header >
 	<h1><b> Reviews For <?php single_term_title(); ?>  </b></h1>
	</header>




	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<blockquote>
		 <?php the_field('review_text'); ?> 
		<cite> &mdash;<?php the_title(); ?> </cite>
		</blockquote>

	<?php endwhile; endif; ?>
	



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





<style>
.acf-taxonomy-field ul.children {padding-left:4px; display:inline-block;}
</style>

</main>


<?php get_footer(); ?>