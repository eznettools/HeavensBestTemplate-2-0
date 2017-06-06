<?php
acf_form_head();
get_header(); 
?>

<main id="content" role="main">

	
<section class="reviews maxwidth">

	<header class="header">
 	<h1>Reviews For <?php single_term_title(); ?><h1>
	</header>


	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<blockquote>
		 <?php the_field('review_text'); ?> 
		<cite> &mdash;<?php the_title(); ?> </cite>
		</blockquote>

	<?php endwhile; endif; ?>
	

<h2>Write Your Own Review...</h2>
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


<?php get_template_part( 'nav', 'below' ); ?>

</main>


<?php get_footer(); ?>