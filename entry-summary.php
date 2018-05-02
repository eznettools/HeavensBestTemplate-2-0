<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="summary-header">
	<a class="summary-header-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
		<?php if( has_post_thumbnail() ): ?>
			<div class="featured-image" style="background-image:url(<?php the_post_thumbnail_url('large'); ?>);  "></div> 
 		<?php else: ?>
		<?php endif; ?>
	</a>
	</header>
	
	<section class="entry-content">
		<a class="summary-header-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
		<h2 class="entry-title"><?php the_title(); ?></h2>
		</a>
		<?php get_template_part( 'entry', 'meta' ); ?>
		<?php the_excerpt(); ?>
	</section>
	<?php if( is_search() ) { ?><div class="entry-links"><?php wp_link_pages(); ?></div><?php } ?>

</article>