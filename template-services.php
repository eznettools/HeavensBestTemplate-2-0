<?php /* Template Name: Services */ ?>

<?php get_header(); ?>


<section id="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


<div class="services-banner" style="">
	<div class="banner-image lowres" style="background-image:url(<?php the_post_thumbnail_url( 'small' ); ?>); background-size:cover;"></div>
	<div class="banner-image highres" style="background-image:url(<?php the_post_thumbnail_url( 'full' ); ?>); background-size:cover;"></div>

	<header style="">
		<h1 class="maxwidth"><span class="cleaning-title"><?php the_title(); ?></span> <small>in <?php the_field('primary_location_name', 'options'); ?></small></h1>
	</header>
</div>


	<section class="entry-content">
	  <div class="maxwidth">
			<?php the_content(); ?>
	  </div>
	</section>




<!-- Show Child Pages For Services -->
 
<section id="featured-services" class="child-pages featured-services"><div class="inner maxwidth"> 
<?php
$parent = $post->post_parent == 0 ? $post->ID : $post->post_parent;

// if we use current post parent as $paren, exclude the current page
$exclude = $parent == $post->post_parent ? $post->ID : false;

// get all the children
$args = array( 'parent' => $parent, 'sort_column' => 'menu_order' );
if ( $exclude ) $args['exclude'] = $exclude;
$child_pages = get_pages($args);

// show only if there are children
if ( ! empty($child_pages) ) {
  global $post;
 
  foreach ( $child_pages as $post ) { setup_postdata( $post );
  ?>
 

	<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'medium', true);  ?>

	<figure style=background-image:url(<?php echo $image_url[0]; ?>);"  title="<?php the_title_attribute(); ?>">
	<a id="post-<?php the_ID(); ?>" href="<?php the_permalink(); ?>" class="post summary <?php echo get_post_type(); ?> <?php if( get_field('unfinished') ): ?> unfinished <?php endif; ?>">

	<?php if ( has_post_thumbnail() ): ?>
 
	<?php else: ?>
	 
	<?php endif; ?>
 

		 <figcaption><?php the_title(); ?> </figcaption>

 

	</a>
	</figure>



  <?php
  }
  wp_reset_postdata();
}
?>
</div>
</section> 





 </article>
	
<?php if ( ! post_password_required() ) comments_template( '', true ); ?>

<?php endwhile; endif; ?>
</section>

 
<?php get_footer(); ?>