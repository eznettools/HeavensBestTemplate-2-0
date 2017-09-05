<?php get_template_part( 'badges' ); ?>

<div class="clear"></div>
</div>


<footer id="footer" class="footer mainWrapper" role="contentinfo">



<div class="sticky-call-action">
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
   <strong class="fn org">Heaven's Best Carpet Cleaners - <?php the_field('primary_location_name', 'option'); ?></strong> 
     <div class="adr"> 
		<img src="<?php the_field('logo_url','option'); ?>" width="50" class="photo" style="display:none;">
        <span class="street-address"><?php the_field('street_address', 'option'); ?></span><br>
        <span class="locality"><?php the_field('city', 'option'); ?></span>, 
        <span class="region"><?php the_field('state_or_province', 'option'); ?></span>,
        <span class="postal-code"><?php the_field('zip_code', 'option'); ?></span>
     </div>   
   Phone: <span class="tel"><?php the_field('phone_number', 'option'); ?></span>

</div>


	<div id="copyright">

		 <p>&copy; <?php echo date('Y'); ?> <a href="http://www.eznettools.com/">EZ-NetTools Inc</a>. All Rights Reserved.</p>

		<p style="margin-bottom:0;"><a class="button blue franchise-sales" href="http://www.heavensbest.com/">Franchise Opportunities</a></p>

	</div>
	


</footer>

<?php if( get_field('other_custom_code_toggle') ): ?>
	<?php the_field('local_code') ?>
<?php endif; ?>
 
 
<script>
jQuery(document).ready(function( $ ) {
/*--- Sticky Header ---*/
var $document = $(document),
    $element = $('.sticky-header, .sticky-call-action'),
    className = 'active';

$document.scroll(function() {
  if ($document.scrollTop() >= 280) {
    $element.addClass(className);
  } else {
    $element.removeClass(className);
  }
});

/*--- Collapsible Blue Headers ---*/
/* 
var Headers = $('.blue-header');
Headers.addClass('header-toggle open');
//Headers.next().slideToggle(600);
Headers.click(function(){
	$(this).next().slideToggle(150);
	$(this).toggleClass('open');
});
*/

var len = $('script[src*="Javascript/MyScript.js"]').length; 
 
/*--- Mobile Dropdown fix ---*/

$('.topnav li:has(ul)' ).doubleTapToGo();

 

});

</script>
 

</div>
<?php wp_footer(); ?>
</body>
</html>