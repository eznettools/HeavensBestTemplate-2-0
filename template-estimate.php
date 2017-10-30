<?php /* Template Name: Get Estimate */ ?>

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
 


 


	  </div>
	</section>






 
 


 </article>
	
 

<?php endwhile; endif; ?>
</section>

 
<?php get_footer(); ?>