<?php get_template_part( 'badges' ); ?>

<div class="clear"></div>
</div>


<div class="sticky-call-action active">
	<div class="popup">
		<?php the_field('sticky_call_to_action', 'option'); ?>
	</div>
</div>


<footer id="footer" class="footer mainWrapper" role="contentinfo">

	
	
	<?php if( have_rows('social_media_icons', 'option') ): ?>
	<div class="social-icons">
	<?php while( have_rows('social_media_icons', 'option') ): the_row();  $title = get_sub_field('social_media_title'); $link = get_sub_field('social_media_link');  ?>
		<a title="<?php echo $title; ?>" href="<?php echo $link; ?>">
			<img loading=lazy width=32 height=32 alt="<?php echo $title; ?>" src="<?php the_sub_field('icon', 'option'); ?>">
		</a>
	<?php endwhile; ?>
	</div>
	<?php endif; ?>
	
 	

<?php $phoneNumber = get_field('phone_number', 'option'); ?>
<div class="phone">Call: <?php echo $phoneNumber; ?></div>

<?php 
$siteTitle = get_field('carpet_cleaning_title','option');  
$locationName = get_field('primary_location_name', 'option');
$logoURL = get_field('logo_url','option');
?>
	
<div class="vcard" style="clear:both; text-align:center; padding:10px;">
   <strong class="fn org">
	<?php if( $siteTitle ): ?>
		<span><?php echo $siteTitle; ?></span>
	<?php else: ?>
		<span>Heaven's Best Carpet Cleaners </span>
	<?php endif; ?>
	<?php echo $locationName; ?>
	</strong> 
     <div class="adr"> 
		<img alt="Heaven's Best" src="<?php echo $logoURL; ?>"  class="photo" style="display:none;">
        <span class="street-address"><?php the_field('street_address', 'option'); ?></span><br>
        <span class="locality"><?php the_field('city', 'option'); ?></span>, 
        <span class="region"><?php the_field('state_or_province', 'option'); ?></span>
        <span class="postal-code"><?php the_field('zip_code', 'option'); ?></span>
     </div>   
   Phone: <span class="tel"><?php echo $phoneNumber; ?></span>
	<div class="pricerange"><?php the_field('price_range', 'option'); ?></div>

</div>
	
<div itemscope itemtype="http://schema.org/LocalBusiness" style="display:none;">
	<span itemprop="name"><?php if( $siteTitle ): ?>	
		<?php echo $siteTitle; ?>
	<?php else: ?> 
		Heaven's Best Carpet Cleaners
	<?php endif; ?>	<?php echo $locationName; ?>
	</span>
	<span itemprop="url"><?php echo get_home_url(); ?></span>
	<img itemprop="image" alt=" " src="<?php echo $logoURL; ?>" />
	<span itemprop="telephone"><?php echo $phoneNumber; ?></span>
	<div itemprop="pricerange"> <?php the_field('price_range', 'option'); ?> </div>
	<div class="address" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress"> 
		<img alt="Heaven's Best" src="<?php echo $logoURL; ?>"  class="photo" style="display:none;">
        <span class="street-address"><?php the_field('street_address', 'option'); ?></span><br>
        <span class="locality"><?php the_field('city', 'option'); ?></span>, 
        <span class="region"><?php the_field('state_or_province', 'option'); ?></span>
        <span class="postal-code"><?php the_field('zip_code', 'option'); ?></span>
     </div> 
	<?php if( have_rows('social_media_icons', 'option') ): ?>
	 <?php while( have_rows('social_media_icons', 'option') ): the_row(); $link = get_sub_field('social_media_link');  ?>
  		<link itemprop="sameAs" href="<?php echo $link; ?>">
	 <?php endwhile; ?>
	<?php endif; ?>
</div>


	<div id="copyright">

		<a href="//www.dmca.com/Protection/Status.aspx?ID=f10a1261-83f1-46c2-b9f7-8124b6a69277" title="DMCA.com Protection Status" class="dmca-badge"> 
			<img width=100 height=20 src="https://images.dmca.com/Badges/dmca-badge-w100-5x1-09.png?ID=f10a1261-83f1-46c2-b9f7-8124b6a69277" loading=lazy alt="DMCA.com Protection Status" />
		</a>  
		<script defer src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
		
		<p>ADA Optimized</p>
		
		 <p>&copy; <?php echo date('Y'); ?> <a href="https://www.eznettools.com/">EZ-NetTools Inc</a>. All Rights Reserved.  <br/> 	
		Theme Version: <?php $my_theme = wp_get_theme(); echo esc_html( $my_theme->get( 'Version' ) ); ?></p>
		
		<p><a class="button blue franchise-sales" href="http://www.heavensbest.com/">Franchise Opportunities</a></p>

	</div>
	
 
</footer>

<?php if( get_field('other_custom_code_toggle') ): ?>
	<?php the_field('local_code') ?>
<?php endif; ?>
 

<script>
	
/*--- Sticky Header ----*/
window.addEventListener('scroll', getScrollPos);
const stickyHeader = document.querySelector('.sticky-header');	
	
function getScrollPos() {
	scrollPos =  document.body.getBoundingClientRect().top * -1 ; 
	if( scrollPos >= 80 ) {
		stickyHeader.classList.add('active');
	} else {
		stickyHeader.classList.remove('active');
	}
}
</script>
	




 
</div>

<?php the_field('general_footer_code', 'option'); ?>

<?php wp_footer(); ?>

<script src="//instant.page/1.1.0" type="module" integrity="sha384-EwBObn5QAxP8f09iemwAJljc+sU+eUXeL9vSBw1eNmVarwhKk2F9vBEpaN9rsrtp"></script>

</body>
</html>