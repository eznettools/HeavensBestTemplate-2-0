<?php global $wp_query; if ( $wp_query->max_num_pages > 1 ) { ?>
 
 
<nav id="nav-below" class="pagination navigation inner" role="navigation">
<?php
the_posts_pagination( array(
	'mid_size'  => 2,
	'prev_text' => __( 'Previous', 'textdomain' ),
	'next_text' => __( 'Next', 'textdomain' ),
) );
?>
</nav>

<?php } ?>