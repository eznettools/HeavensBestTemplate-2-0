<?php get_header(); ?>

<main id="content" role="main">

<section class="reviews  ">

	<header class="section-header">
 	<h1>Special Deals</h1>
	</header>


	<section id="coupons" class="coupons">
	  <div class="inner">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

 
			<?php get_template_part( 'coupons' ); ?>
 

		<?php endwhile; endif; ?>	
	  </div>
	</section>

</section>

</main>
</div>

<?php get_footer(); ?>