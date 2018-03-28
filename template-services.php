<?php /* Template Name: Services */ ?>

<?php get_header(); ?>


<section id="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

 
<div class="services-banner" style="">
	<div class="banner-image lowres" style="background-image:url(<?php the_post_thumbnail_url( 'small' ); ?>); background-size:cover;"></div>
	<div class="banner-image highres" style="background-image:url(<?php the_post_thumbnail_url( 'full' ); ?>); background-size:cover;"></div>

	<header style="">
		<h1 class="maxwidth"><span class="cleaning-title"><?php the_title(); ?></span> <small class="franchise-area-title">in <?php the_field('primary_location_name', 'options'); ?></small></h1>
	</header>
</div>


<?php if( have_rows('flexible_content_areas') ):
    while ( have_rows('flexible_content_areas') ) : the_row();

        if( get_row_layout() == 'add_checkbox_block' ): ?>

				<section class="checkbox-list <?php the_sub_field('custom_classes'); ?>" <?php the_sub_field('other_attributes'); ?> >

					<?php if( get_sub_field('custom_background_image') ): ?>
						<?php $image = get_sub_field('custom_background_image'); ?>
						<div class="banner-image lowres" style="background-image:url(<?php echo wp_get_attachment_image_url( $image, 'medium' ); ?>); background-size:cover;"></div>
					<?php else: ?>
						<div class="banner-image lowres" style="background-image:url(<?php the_post_thumbnail_url( 'small' ); ?>); background-size:cover;"></div>
					<?php endif; ?>
				
					<div class="maxwidth" style="position:relative; max-width:32em; margin:auto;">
						<header class=""><h2><?php the_sub_field('check_block_title'); ?></h2></header>
	    	    	<?php if( have_rows('checkbox_repeater') ): ?>
						<?php while ( have_rows('checkbox_repeater') ) : the_row(); ?>

						<p><img class="checkmark" src="https://res.cloudinary.com/ez-nettools/image/upload/v1502741204/checkmark_quqbos.png" alt="&#x2714;" />
					  	<?php the_sub_field('check_item'); ?></p>

					<?php endwhile; ?>
				</div>
				<?php echo '</section>';
			endif;
        endif;
        if( get_row_layout() == 'add_basic_text_block' ): ?>

				<section class="entry-content">
					<div class="maxwidth"><?php the_sub_field('text_block'); ?></div>
				</section>

        <?php endif;  
		if( get_row_layout() == 'add_guarantee_box' ): ?>
			<section class="checkbox-list" >
				<div class="banner-image lowres" style="background-image:url(<?php the_post_thumbnail_url( 'small' ); ?>); background-size:cover;"></div>
				<div class="maxwidth" style="position:relative;">
					<?php the_sub_field('guarantee_box'); ?>
				</div>
			</section>
		<?php endif; ?>
    <?php endwhile;
else :
    // no layouts found
endif; ?>


<?php if ( $post->post_content!=="" ): ?>
	<section class="entry-content">
	  <div class="maxwidth">
			<?php the_content(); ?>
	  </div>
	</section>
<?php endif; ?>



<!-- Service Page Form -->
<?php if( get_field('include_quick_estimate') ): ?>
<section class="service-form">
 <div class="maxwidth">
	<?php the_field('choose_service_page_form', 'option'); ?>
 </div>
</section>
<?php endif; ?>



<!-- Show Child Pages For Services -->
 
<section id="featured-services" class="child-pages featured-services"><div class="inner"> 
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
  foreach ( $child_pages as $post ) { setup_postdata( $post ); ?>
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



<div class="maxwidth">
	 <?php the_field('additional_text_below_services'); ?>
</div>


<?php get_template_part( 'service', 'areas' ); ?>





 </article>
	
<?php if ( ! post_password_required() ) comments_template( '', true ); ?>

<?php endwhile; endif; ?>
</section>

</div>
  
<?php get_footer(); ?>