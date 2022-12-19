 
<section id="leave-google-review" class="leave-google-review margin background-box" style="">
	<?php the_field('google_review_message','option'); ?>
	<?php $googleBtnTxt = get_field('google_review_button_text','option'); $googleReviewURL = get_field('google_review_link','option'); $googleReadURL = get_field('read_reviews_link','option'); ?>
	<?php if( $googleBtnTxt  ): ?>
		<a class="primary button" href="<?php echo $googleReviewURL; ?>">
			<?php echo $googleBtnTxt; ?>
		</a>
	<?php endif; ?>
	<link rel="prerender" crossorigin href="<?php echo $googleReviewURL; ?>">
	<div class="background front"></div>
	<div class="background med"></div>
	<div class="background back"></div>
	<?php if( $googleReadURL ): ?>
		<p style="margin-bottom:0;"><a class="secondary button" href="<?php echo $googleReadURL; ?>"><?php the_field('read_reviews_button_text','option'); ?></a></p>
	<?php endif; ?>
</section>
