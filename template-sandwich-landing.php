<?php /* Template Name: Sandwich Landing */ ?>
<!DOCTYPE html>



<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<?php wp_head(); ?>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700" rel="stylesheet">
	<link href="/wp-content/themes/heavens-best-modern/landing.css" type="text/css" rel="stylesheet" />

<!--<script>
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }
</script>
-->	

<script src="https://cdnjs.cloudflare.com/ajax/libs/iframe-resizer/3.6.3/iframeResizer.min.js"></script>
<script>
	iFrameResize(
		{log:true}, '#iframe'
	)
	</script>	
	
<style>
.frm_hidden{display:none;}
.iframe {
	display:block; 
	max-width:1300px;
	width:100%; 
	margin:auto; 
	min-height:1100px; 
	border:none;
}
iframe{width:1px; min-width: 100%;}
.fixed-phone {
    position: fixed;
    bottom: 0;
    right: 16px;
	background:rgba(5,45,85,.9) ;
	color:white;
	border:solid 2px white;
	border-bottom:none;
	padding:0.8em;
}
.fixed-phone .phone-number {font-size:1.2em; }
@media (max-width:600px){
	.fixed-phone { right:0; left:0; text-align:center; }
}
</style>
	
</head> 
<body class="<?php the_field('theme'); ?>" >

	
<div class="fixed-phone" >
	<?php if( get_field('phone_number') ): ?>
		<p class="phone-number"><b>Call Us:</b> <?php the_field('phone_number'); ?></p>
	<?php else: ?>
		<p class="phone-number"><b>Call Us:</b> <?php the_field('phone_number','option'); ?></p>
	<?php endif; ?>
</div>

<section class="primary-section" style="<?php if ( has_post_thumbnail() ) : ?>background-image:url(<?php the_post_thumbnail_url( 'full' ); ?>);<?php endif; ?> background-size:cover;  ">

	<header class="landing-header">
		<h1><?php the_field('main_title'); ?></h1>
	</header>

	<div class="column-parent">


		<div class="text-block">

			<?php if( get_field('type_of_content') == 'text' ): ?>
 			<?php the_field('special_offer_details'); ?>
			<?php endif; ?>

			<?php if( get_field('type_of_content') == 'html' ): ?>
			<?php the_field('special_icon_html'); ?>
			<?php endif; ?>

		</div>
 

		<div class="form-wrapper">
			<div class="form-logo"><img alt="Heaven's Best" src="<?php the_field('logo_url','option'); ?>" /></div>
			<?php if( get_field('choose_your_form') ): ?>
				<?php the_field('choose_your_form');    ?>
			<?php else: ?>
				<?php echo FrmFormsController::get_form_shortcode( array( 'id' => 5, 'title' => false, 'description' => false ) ); ?>
			<?php endif; ?>
		</div>


	</div>

</section>

	
	
	
	

<iframe class="iframe"  scrolling="no" style="" src="<?php the_field('iframe_url'); ?>" ></iframe>

	
	
	
<section class="extra-info">

	<?php the_field('additional_features'); ?>

</section>

<section class="phone-footer">

	<?php if( get_field('phone_number') ): ?>
		<h2 class="phone-number">Call Us: <?php the_field('phone_number'); ?></h2>
	<?php else: ?>
		<h2 class="phone-number">Call Us: <?php the_field('phone_number','option'); ?></h2>
	<?php endif; ?>

	<?php if( get_field('add_homepage_link') ): ?>
		<a class="homepage-link" href="/">Visit Our Website</a>
	<?php endif; ?>

</section>

	


	
	
<footer class="address-footer">

	<?php if( get_field('add_address') ): ?>


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

	<?php endif; ?>

</footer>


<?php the_field('general_footer_code', 'option'); ?>

<?php wp_footer(); ?>
 

	

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="../js/iframeResizer.min.js"></script>
	<script type="text/javascript">

		/*
		 * If you do not understand what the code below does, then please just use the
		 * following call in your own code.
		 *
		 *   iFrameResize({log:true});
		 *
		 * Once you have it working, set the log option to false.
		 */

		iFrameResize({
			log: true,                  // Enable console logging
			inPageLinks: true,
			resizedCallback: function (messageData) { // Callback fn when resize is received
				$('p#callback').html(
					'<b>Frame ID:</b> ' + messageData.iframe.id +
					' <b>Height:</b> ' + messageData.height +
					' <b>Width:</b> ' + messageData.width +
					' <b>Event type:</b> ' + messageData.type
				);
			},
			messageCallback: function (messageData) { // Callback fn when message is received
				$('p#callback').html(
					'<b>Frame ID:</b> ' + messageData.iframe.id +
					' <b>Message:</b> ' + messageData.message
				);
				alert(messageData.message);
				document.getElementsByTagName('iframe')[0].iFrameResizer.sendMessage('Hello back from parent page');
			},
			closedCallback: function (id) { // Callback fn when iFrame is closed
				$('p#callback').html(
					'<b>IFrame (</b>' + id +
					'<b>) removed from page.</b>'
				);
			}
		});

	</script>
	
	
	

</body>
</html>