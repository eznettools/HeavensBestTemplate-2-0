<?php get_template_part( 'badges' ); ?>

<div class="clear"></div>
</div>


<footer id="footer" class="footer mainWrapper" role="contentinfo">


	<div class="sticky-call-action active">
 	 <div class="popup">
		<?php the_field('sticky_call_to_action', 'option'); ?>
	  </div>
	</div>


 
	
	
	<?php if( have_rows('social_media_icons', 'option') ): ?>
	<div class="social-icons">
	<?php while( have_rows('social_media_icons', 'option') ): the_row();  $title = get_sub_field('social_media_title'); $link = get_sub_field('social_media_link');  ?>
		<a title="<?php echo $title; ?>" href="<?php echo $link; ?>">
			<img alt="<?php echo $title; ?>" src="<?php the_sub_field('icon', 'option'); ?>">
		</a>
	<?php endwhile; ?>
	</div>
	<?php endif; ?>
	
 	

	<div class="phone">Call: <?php the_field('phone_number', 'option'); ?></div>


<div class="vcard" style="clear:both; text-align:center; padding:10px;">
   <strong class="fn org">
	<?php if( get_field('carpet_cleaning_title','option') ): ?>
		<span><?php the_field('carpet_cleaning_title', 'option'); ?></span>
	<?php else: ?>
		<span>Heaven's Best Carpet Cleaners </span>
	<?php endif; ?>
	<?php the_field('primary_location_name', 'option'); ?>
	</strong> 
     <div class="adr"> 
		<img alt="Heaven's Best" src="<?php the_field('logo_url','option'); ?>"  class="photo" style="display:none;">
        <span class="street-address"><?php the_field('street_address', 'option'); ?></span><br>
        <span class="locality"><?php the_field('city', 'option'); ?></span>, 
        <span class="region"><?php the_field('state_or_province', 'option'); ?></span>
        <span class="postal-code"><?php the_field('zip_code', 'option'); ?></span>
     </div>   
   Phone: <span class="tel"><?php the_field('phone_number', 'option'); ?></span>
	<div class="pricerange"> <?php the_field('price_range', 'option'); ?> </div>

</div>
	
<div itemscope itemtype="http://schema.org/LocalBusiness" style="display:none;">
	<span itemprop="name"><?php if( get_field('carpet_cleaning_title','option') ): ?>	
		<?php the_field('carpet_cleaning_title', 'option'); ?>
	<?php else: ?> 
		Heaven's Best Carpet Cleaners
	<?php endif; ?>	<?php the_field('primary_location_name', 'option'); ?>
	</span>
	<span itemprop="url"><?php echo get_home_url(); ?></span>
	<img itemprop="image" src="<?php the_field('logo_url','option'); ?>" />
	<span itemprop="telephone"><?php the_field('phone_number', 'option'); ?></span>
	<div itemprop="pricerange"> <?php the_field('price_range', 'option'); ?> </div>
	<?php if( have_rows('social_media_icons', 'option') ): ?>
	 <?php while( have_rows('social_media_icons', 'option') ): the_row(); $link = get_sub_field('social_media_link');  ?>
  		<link itemprop="sameAs" href="<?php echo $link; ?>">
	 <?php endwhile; ?>
	<?php endif; ?>
</div>


	<div id="copyright">

		<a href="//www.dmca.com/Protection/Status.aspx?ID=f10a1261-83f1-46c2-b9f7-8124b6a69277" title="DMCA.com Protection Status" class="dmca-badge"> <img src ="https://images.dmca.com/Badges/dmca-badge-w100-5x1-09.png?ID=f10a1261-83f1-46c2-b9f7-8124b6a69277"  alt="DMCA.com Protection Status" /></a>  <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
		
		 <p>&copy; <?php echo date('Y'); ?> <a href="https://www.eznettools.com/">EZ-NetTools Inc</a>. All Rights Reserved.  <br/> 	
		Theme Version: <?php $my_theme = wp_get_theme(); echo esc_html( $my_theme->get( 'Version' ) ); ?></p>
		
		<p><a class="button blue franchise-sales" href="http://www.heavensbest.com/">Franchise Opportunities</a></p>

	</div>
	
 
</footer>

<?php if( get_field('other_custom_code_toggle') ): ?>
	<?php the_field('local_code') ?>
<?php endif; ?>
 
 
<script>
jQuery(document).ready(function( $ ) {
/*--- Sticky Header ---*/
var $document = $(document),
    $element = $('.sticky-header '),
    className = 'active';

$document.scroll(function() {
  if ($document.scrollTop() >= 80) {
    $element.addClass(className);
  } else {
    $element.removeClass(className);
  }
});

var len = $('script[src*="Javascript/MyScript.js"]').length; 

	
/*--- Mobile Dropdown fix ---*/

$('.topnav li:has(ul)' ).doubleTapToGo();

});

</script>
 
</div>

<?php the_field('general_footer_code', 'option'); ?>

<?php wp_footer(); ?>

<script src="//instant.page/1.1.0" type="module" integrity="sha384-EwBObn5QAxP8f09iemwAJljc+sU+eUXeL9vSBw1eNmVarwhKk2F9vBEpaN9rsrtp"></script>

</body>
</html>