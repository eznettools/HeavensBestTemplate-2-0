<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'medium', true);  ?>

<figure>
<a id="post-<?php the_ID(); ?>" href="<?php the_permalink(); ?>" class="post summary <?php echo get_post_type(); ?> <?php if( get_field('unfinished') ): ?> unfinished <?php endif; ?>">

	<?php if ( has_post_thumbnail() ): ?>
	<div class="featured-image" style=background-image:url(<?php echo $image_url[0]; ?>); "  title="<?php the_title_attribute(); ?>" rel="bookmark">
	</div>
	<?php else: ?>
	 
	<?php endif; ?>
	<div class="post-text">	
		<header>
 
		<h4 class="entry-title">
			<?php the_title(); ?> 
		</h4> 
		</header>
	</div>

</a>
</figure>