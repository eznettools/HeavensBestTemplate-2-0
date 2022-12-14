		<a class="coupon" href="<?php the_permalink(); ?>" >
			<div class="coupon-inner">
				<header>
				<h3 class="coupon-title"><?php the_title(); ?></h3>
				</header>
				<div class="deal-details"><?php the_field('deal_details'); ?></div>
				<small class="fine-print"><?php the_field('fine_print'); ?></small>
				<?php if( get_field('expiration_date') ): ?>
					<small class="expiration-date"><p>Expires: <?php the_field('expiration_date'); ?></p></small>
				<?php endif; ?>
			</div>
		</a>