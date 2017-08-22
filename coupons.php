		<a class="coupon" href="<?php the_permalink(); ?>" >
 			<div class="shine"></div>
		   <div class="coupon-text">
            <h2><?php the_title(); ?></h2>
			<div class="deal-details"><?php the_field('deal_details'); ?></div>
			<small class="fine-print"><?php the_field('fine_print'); ?></small>
            <small class="expiration-date"><p>Expires: <?php the_field('expiration_date'); ?></p></small>
		  </div>
		</a>