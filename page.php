<?php get_header(); ?>

<section id="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<?php if( is_page('Home') ): ?>
	<section class="banner">
		<?php if( get_field('banner_image') == true ) { ?>
			<?php $image = get_field('banner_image'); $size = 'large';
			echo wp_get_attachment_image( $image, $size ); ?>
			<!--<img style="width:100%;" src="<?php the_field('banner_image'); ?>"  />-->
		<?php } else { ?>
			<img src="https://res.cloudinary.com/ez-nettools/image/upload/v1496775388/girl-carpet_ze08yo.jpg" />
		<?php } ?>
		<div class="textbox">
			<h1><?php the_field('banner_title'); ?>  
			<big><?php the_field('franchise_area_name'); ?></big>
			</h1>
			<a class="primary button" href="<?php the_field('button_link'); ?>"><?php the_field('button_text'); ?></a>
		</div>
		<img id="clouds" src="https://res.cloudinary.com/ez-nettools/image/upload/v1496775273/Clouds-Group_zzdy9k.png" />
	</section>
	<?php endif; ?>



<?php if( have_rows('featured_services') ): ?>
 
	<section id="featured-services">
	  <header class="section-header">
		<?php the_field('featured_services_title'); ?>
	  </header>
	  <div class="inner">

	<?php while( have_rows('featured_services') ): the_row(); 
		$image = get_sub_field('featured_image'); 
		$content = get_sub_field('featured_name');
		$link = get_sub_field('featured_link');
		?>
		<figure style="background-image:url(<?php echo $image['url']; ?>);   " >
			<?php if( $link ): ?><a href="<?php echo $link; ?>"><?php endif; ?>
				<!--<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />-->
				<figcaption><?php echo $content; ?></figcaption>
			<?php if( $link ): ?></a><?php endif; ?>
		</figure>
	<?php endwhile; ?>

 	  </div>
	 <footer class="section-footer"><?php the_field('all_services_button'); ?></footer>
	</section>

<?php endif; ?>



	
	<section class="entry-content">
	  <div class="maxwidth">
			<?php the_content(); ?>
	  </div>
	</section>


<?php if( have_rows('coupons') ): ?>
	<section id="coupons">
		<header class="section-header">
			<?php the_field('coupon_title'); ?>
		</header>

	<div class="inner">

	<?php while( have_rows('coupons') ): the_row(); ?>
		<article class="coupon">
		   <div class="coupon-text">
			<!--<h2><?php the_sub_field('big_title'); ?></h2>-->
			<h3><?php the_sub_field('small_title'); ?></h3>
			<?php the_sub_field('details'); ?>
			<?php if( get_sub_field('expiration_date') == true ): ?>
				<div class="expiration-date"><p>Expires: <?php the_sub_field('expiration_date'); ?>  </p></div>
			<?php endif; ?>
		   </div>
		</article>
	<?php endwhile; ?>

	<a href=""></a>
	  </div>
	 <footer class="section-footer"><?php the_field('special_deals_button'); ?></footer>
	</section>
<?php endif; ?>	



<?php if( have_rows('logos_awards_etc') ): ?>
	<section id="accolade-bar">
	<?php while( have_rows('logos_awards_etc') ): the_row(); $link = get_sub_field('logo_link'); ?>
 
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


 





<!-- Show Child Pages For Testimonials -->

<header class="blue-header"><h2 class="maxwidth">Service Areas</h2></header> 
<section class="blue-box service-areas">
 <div class="maxwidth">

<ul class="area-list">
    <?php wp_list_categories( array(
        'orderby'    => 'name',
	'title_li' => '',
	'taxonomy' => 'location',
	'hide_empty' => '0'
    ) ); ?>
</ul>


 </div>
</section>
 




<!-- Get Estimate Form -->
<?php
  //response generation function
  $response = ""; 
  function my_contact_form_generate_response($type, $message){ 
	global $response;
	if($type == "success") $response = "<div class='success'>{$message}</div>";
	else $response = "<div class='error'>{$message}</div>"; 
  }
//response messages
	$not_human       = "Human verification incorrect.";
	$missing_content = "Please fill out all required fields.";
	$email_invalid   = "Email Address Invalid.";
	$message_unsent  = "Message was not sent. Try Again.";
	$message_sent    = "Thanks! Your message has been sent.";
 
//user posted variables
	$name = $_POST['message_name'];
	$email = $_POST['message_email'];
	$message = '<h1>Quick Estimate Form Information</h1>';
	$message .= '<p><b>Name: </b>'. $_POST['message_name']  .'</p>';
	$message .= '<p><b>Email: </b>'. $_POST['message_email']  .'</p>';
	$message .= '<p><b>Phone: </b>'. $_POST['message_phone']  .'</p>';
	$message .= '<p><b>Address: </b>'. $_POST['address']  .'</p>';
	$message .= '<p><b>Questions or Comments:</b><br>'. $_POST['message_text']  .'</p>';

	$human = $_POST['message_human'];
 
//php mailer variables
	$to = get_option('admin_email');
	$subject = "Customer Requested Quote ".get_bloginfo('name');
	$headers = 'From: '. $email . "\r\n" .
	'Reply-To: ' . $email . "\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


 
		//validate email
		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			my_contact_form_generate_response("error", $email_invalid);
		else {
  			//validate presence of name and message
			if(empty($name) || empty($message)){
				my_contact_form_generate_response("error", $missing_content);
		}
		$sent = wp_mail($to, $subject, $message, $headers);
		if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
		else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
		}
 
 
		
?>

<header class="blue-header"><h2 class="maxwidth">Request An Estimate</h2></header> 
<div id="respond" class="blue-box">

  <form class="form maxwidth" action="#respond" method="post">
	<div class="fieldgroup">
	<label for="name">Name: <span>*</span> <br>
		<input required type="text" name="message_name" value="<?php echo esc_attr($_POST['message_name']); ?>">
	</label>
	<label for="message_email">Email: <span>*</span> <br>
		<input required type="email" name="message_email" value="<?php echo esc_attr($_POST['message_email']); ?>">
	</label>
	<label for="message_phone">Phone: <span>*</span> <br>
		<input required type="tel" name="message_phone" value="<?php echo esc_attr($_POST['message_phone']); ?>">
	</label>
	</div>

	<p><label for="message_text">Address: <span>*</span> <br>
		<textarea rows="2" type="text" name="address"><?php echo esc_textarea($_POST['address']); ?></textarea>
	</label></p>

	<p><label for="message_text">Comments or Questions: <span>*</span> <br>
		<textarea rows="3" type="text" name="message_text"><?php echo esc_textarea($_POST['message_text']); ?></textarea>
	</label></p>

	<input id="morning" name="morning" type="checkbox"><label for="morning" >Morning</label>
	<input id="afternoon" name="afternoon" type="checkbox"><label for="afternoon" >Afternoon</label>
	<input id="evening" name="evening" type="checkbox"><label for="evening" >Evening</label>
	<input id="Immediately " name="Immediately " type="checkbox"><label for="Immediately " >Immediately </label>

	<img style="position:absolute; top:-50px;" src="https://res.cloudinary.com/ez-nettools/image/upload/v1496775245/checkbox-checked_uuccy2.png" >

  <?php echo $response; ?>

	<input type="hidden" name="submitted" value="1">
	<p><button class="primary button" type="submit" value="Get Estimate">Get Estimate</button></p>



  </form>
</div>






 </article>
	
<?php if ( ! post_password_required() ) comments_template( '', true ); ?>

<?php endwhile; endif; ?>
</section>


<?php get_footer(); ?>