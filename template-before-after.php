<?php /* Template Name: Before & After */ ?>

<?php get_header(); ?>


<section id="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>




	<section class="entry-content">
	  <div class="maxwidth">
			<?php the_content(); ?>
	  </div>
	</section>




<?php if( have_rows('before_and_after_photos') ): ?>
  <section class="before-after maxwidth">


	<?php while( have_rows('before_and_after_photos') ):  the_row();   ?>
	  <?php if( get_sub_field('section_title') ): ?> <header class="blue-header"><h2><?php the_sub_field('section_title'); ?></h2></header> <?php endif; ?>
	  <div class="before-after-set">
		<figure>
			<img alt="Before Cleaning" src="<?php the_sub_field('before_photo'); ?>">
			<figcaption>Before</figcaption>
		</figure>
		<figure>
			<img alt="After Cleaning" src="<?php the_sub_field('after_photo'); ?>">
			<figcaption>After</figcaption>
		</figure>
	  </div>
	<?php endwhile; ?>

  </section>
<?php endif; ?>






 </article>
	
<?php if ( ! post_password_required() ) comments_template( '', true ); ?>

<?php endwhile; endif; ?>
</section>

 
<?php get_footer(); ?>