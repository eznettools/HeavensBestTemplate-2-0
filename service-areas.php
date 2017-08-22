<section class="service-areas">
<header class="section-header"><h2 class="maxwidth">Service Areas</h2></header> 

 <div class="maxwidth">

<?php if( get_field('override_service_areas','option') ): ?>
	<?php wp_nav_menu( array( 'theme_location' => 'service-areas' ) ); ?>
<?php else: ?>

<ul class="area-list">
    <?php wp_list_categories( array(
        'orderby'    => 'name',
	'title_li' => '',
	'hierarchical' => false,
	'taxonomy' => 'location',
	'hide_empty' => 0
    ) ); ?>
</ul>
<?php endif; ?>

 </div>
</section>