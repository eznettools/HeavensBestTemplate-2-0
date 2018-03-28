<?php /* Template Name: Before & After */ ?>

<?php get_header(); ?>


<main id="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>




	<section class="entry-content">
	  <div class="" style=" ">
			<?php the_content(); ?>
	  </div>
	</section>




<?php if( have_rows('before_and_after_photos_revised') ):
 	// loop through the rows of data
    while ( have_rows('before_and_after_photos_revised') ) : the_row();

        if( get_row_layout() == 'add_gallery_set' ):
        	if( have_rows('gallery_set') ):
			 	echo '<section class="before-after">';

			 	// loop through the rows of data
			    while ( have_rows('gallery_set') ) : the_row();

					$Bimage = get_sub_field('before_photo');
					$Aimage = get_sub_field('after_photo');
					$Btext = get_sub_field('before_text');
					$Atext = get_sub_field('after_text');

 				   echo '<div class="before-after-set">';
					if( $Bimage ) { echo '<figure><img src="' . $Bimage['sizes']['large'] . '" alt="' . $Bimage['alt'] . '" /><figcaption>'. $Btext .'</figcaption></figure>'; }
					if( $Aimage ) { echo '<figure><img src="' . $Aimage['sizes']['large'] . '" alt="' . $Aimage['alt'] . '" /><figcaption>'. $Atext .'</figcaption></figure>'; }
				  echo '</div>';
				endwhile;
				echo '</section>';

			endif;
        endif;
        if( get_row_layout() == 'add_section_title' ): ?>

			<header class="blue-header "><h2><?php the_sub_field('section_title'); ?></h2></header>

        <?php endif;  
	 	if( get_row_layout() == 'add_text_block' ):  
	 		echo '<div class="entry-content">';	the_sub_field('text_block'); echo '</div>';
	 	endif;
    endwhile;
else :
    // no layouts found
endif; ?>


<?php get_template_part( 'service', 'areas' ); ?>

 </article>
	
<?php if ( ! post_password_required() ) comments_template( '', true ); ?>

<?php endwhile; endif; ?>
</main>

</div>

 
<?php get_footer(); ?>