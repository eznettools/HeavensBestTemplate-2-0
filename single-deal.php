<?php get_header(); ?>

<main id="content" class="maxwidth" style="margin:40px auto;" role="main">
 <article class="coupon">
  <div class="coupon-text">

	<h1><?php the_title_attribute(); ?></h1>

	<?php the_field('deal_details'); ?>

	<small class="fine-print">
	<?php the_field('fine_print'); ?>
	</small>

	<div class="expiration-date">
	<p>Expires: <?php the_field('expiration_date'); ?></p>
	</div>

   </div>
  </article>	



<!-- Countdown Timer -->
<?php if( get_field('timer') ): ?>
<section class="countdown-wrapper" style="text-align:center;">

	<?php $date = get_field('expiration_date', false, false); $date = new DateTime($date); ?>
 
	<div id="clock" class="countdown" data-countdown="<?php echo $date->format('Y/m/d'); ?>"><span> <?php echo $date->format('Y/m/d'); ?></span></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js"></script>
<script>
/* http://hilios.github.io/jQuery.countdown/ */
jQuery(document).ready(function( $ ) {


<?php if( get_field('countdown_for_set_hours') ): ?>

  var HoursFromNow = new Date().valueOf() + <?php the_field('countdown_for_set_hours'); ?> * 60 * 60 * 1000;
  $('#clock').countdown(HoursFromNow, function(event) {
    var totalHours = event.offset.totalDays * 24 + event.offset.hours;
    $(this).html(event.strftime(''
		+ '<span> %H:<small>hrs</small></span>'
		+ '<span> %M:<small>min</small></span>'
		+ '<span class="secs">%S <small>sec</small></span>'
		));
  });
<?php else: ?>

$('[data-countdown]').each(function() {
  var $this = $(this), finalDate = $(this).data('countdown');
  $this.countdown(finalDate, function(event) {
  		var $this = $(this).html(event.strftime(''
		+ '<span class="days">%D&nbsp;<small>Days </small></span>'
		+ '<span> %H:<small>hrs</small></span>'
		+ '<span> %M:<small>min</small></span>'
		+ '<span class="secs">%S <small>sec</small></span>'
		));
  });
});

<?php endif; ?>

});
</script>

</section>
<?php endif; ?>


<?php if( get_field('add_claim_offer_form') ): ?>
<section class="claim-offer">
	<h2 style="text-align:center;">Claim This Offer</h2>
	<?php the_field('signup_form'); ?>
</section>
<?php endif; ?>


</main>

<link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">



<style>

.countdown-wrapper {
padding:5px 0 10px;
margin:10px;
margin-right:0;
border:solid 1px #ccc;
border-right:none; border-left:none;
}
.countdown span {
	display:inline-block;
	line-height: 1.05;
	font-size:2.2em;
	padding:0px;
 	text-align: center;
 vertical-align: middle;
font-family: 'Inconsolata', monospace;
}
.countdown span small {
	display:block;
	font-size:45%;
	text-transform: capitalize;
	padding-right:1em;
	color:#aaa;
}
.countdown span.secs small {padding-right:0;}
</style>
 
<?php get_footer(); ?>