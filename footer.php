<div class="clear"></div>
</div>


<footer id="footer" class="footer" role="contentinfo">


	<?php if( have_rows('social_media_icons', 'option') ): ?>
	<div class="social-icons">
	<?php while( have_rows('social_media_icons', 'option') ): the_row();  $title = get_sub_field('social_media_title'); $link = get_sub_field('social_media_link');  ?>
		<a title="<?php echo $title; ?>" href="<?php echo $link; ?>">
			<img alt="<?php echo $title; ?>" src="<?php the_sub_field('icon', 'option'); ?>">
		</a>
	<?php endwhile; ?>
	</div>
	<?php endif; ?>

	<div class="phone"><?php the_field('phone_number', 'option'); ?></div>


<div class="vcard" style="clear:both; text-align:center; padding:10px;">
   <strong class="fn org">Heaven's Best Carpet Cleaners - <?php the_field('primary_location_name', 'option'); ?></strong> 
     <div class="adr"> 
        <span class="street-address"><?php the_field('street_address', 'option'); ?></span><br>
        <span class="locality"><?php the_field('city', 'option'); ?></span>, 
        <span class="region"><?php the_field('state_or_province', 'option'); ?></span>,
        <span class="postal-code"><?php the_field('zip_code', 'option'); ?></span>
     </div>   
   Phone: <span class="tel"><?php the_field('phone_number', 'option'); ?></span>
</div>


	<div id="copyright">
	<?php echo sprintf( __( '%1$s %2$s %3$s. All Rights Reserved.', 'blankslate' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) ); echo sprintf( __( ' Design By: %1$s.', 'blankslate' ), '<a href="http://eznettools.com/">EZ-NetTools.com</a>' ); ?>
	</div>
	
</footer>


</div>
<?php wp_footer(); ?>
</body>
</html>