 
<section id="leave-google-review" class="leave-google-review margin background-box" style="">
	<?php the_field('google_review_message','option'); ?>
	<?php if( get_field('google_review_button_text','option') ): ?>
		<a class="primary button" href="<?php the_field('google_review_link','option'); ?>">
			<?php the_field('google_review_button_text','option'); ?>
		</a>
	<?php endif; ?>
	<link rel="prerender" crossorigin href="<?php the_field('google_review_link','option'); ?>">
	<div class="background front"></div>
	<div class="background med"></div>
	<div class="background back"></div>
	<!--<img class="clouds" src="https://res.cloudinary.com/ez-nettools/image/upload/v1496775273/Clouds-Group_zzdy9k.png" />-->
	<?php if( get_field('read_reviews_link','option') ): ?>
		<p style="margin-bottom:0;"><a class="secondary button" href="<?php the_field('read_reviews_link','option'); ?>"><?php the_field('read_reviews_button_text','option'); ?></a></p>
	<?php endif; ?>
</section>
