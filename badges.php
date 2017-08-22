
<?php if( get_field('include_badges') ): ?>
	<?php if( have_rows('badges_awards_etc', 'option') ): ?>
	<section id="accolade-bar" class="accolade-bar <?php if( get_field('grayscale_images', 'option') ): ?> grayscale <?php endif; ?>" >
	<?php while( have_rows('badges_awards_etc', 'option') ): the_row(); $link = get_sub_field('logo_link'); ?> 
		<figure>
			<?php if( $link ): ?><a target="_blank" href="<?php echo $link; ?>"><?php endif; ?>
			<?php $image = get_sub_field('logo_or_icon'); $size = 'small'; 
				if( $image ) { echo wp_get_attachment_image( $image, $size ); }
			?>
			<?php if( $link ): ?></a><?php endif; ?>
		</figure>
 
	<?php endwhile; ?>
	</section>
	<?php endif; ?>
<?php endif; ?>