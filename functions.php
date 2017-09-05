<?php

add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup()
{
	load_theme_textdomain( 'heavens-best-modern', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 1280;
		register_nav_menus(
		array( 
			'main-menu' => __( 'Main Menu', 'heavens-best-modern' ),
			'service-areas' => __( 'Service Areas', 'heavens-best-modern' )
		)
	);
}

function wpb_add_google_fonts() {
wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Oswald:700', false ); 
}
add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');


add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );
function blankslate_load_scripts()
{
 
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js', false, '1.8.1');
		wp_enqueue_script('jquery');
	wp_enqueue_script( 'doubletaptogo', get_stylesheet_directory_uri() . '/doubletaptogo.min.js', array( 'jquery' ) );	
	//wp_enqueue_script( 'formidable', '/wp-content/plugins/formidable/js/formidable.min.js', array( 'jquery' ) );	
	//wp_enqueue_script( 'starRating', '/wp-content/plugins/formidable/pro/js/jquery.rating.min.js', array( 'jquery' ) );	



}

add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script()
{
	if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}

add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
	if ( $title == '' ) {
		return '&rarr;';
	} else {
		return $title;
	}
}
add_filter( 'wp_title', 'blankslate_filter_wp_title' );
function blankslate_filter_wp_title( $title )
{
	return $title . esc_attr( get_bloginfo( 'name' ) );
}

add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init()
{
	register_sidebar( array (
		'name' => __( 'Sidebar Widget Area', 'heavens-best-modern' ),
		'id' => 'primary-widget-area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => "</li>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}

function blankslate_custom_pings( $comment )
{
	$GLOBALS['comment'] = $comment;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
	<?php 
}

add_filter( 'get_comments_number', 'blankslate_comments_number' );
function blankslate_comments_number( $count )
{
	if ( !is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
		return count( $comments_by_type['comment'] );
	} else {
		return $count;
	}
}



add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
    add_image_size( 'small', 200, 150 );  
}

 


/*---- Add Theme Options Page -------*/
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'General Theme Settings & Info',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'position' => 56,
		'icon_url' => 'dashicons-admin-tools',

		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

add_action( 'admin_init', 'wpuxss_admin_scripts' );
function wpuxss_admin_scripts() {	
	global $pagenow;	
	if (( $pagenow == 'admin.php' ) && ($_GET['page'] == 'theme-general-settings') ) 	{		
		wp_enqueue_script( 'wplink', home_url('/wp-includes/js/wplink.js') );
		wp_enqueue_script( 'popup', home_url('/wp-content/plugins/formidable/js/formidable_admin_global.js?ver=2.03.10') );	
	}
}




/*----- Change Title label on reviews form ------*/
function my_acf_prepare_field( $field ) {	
    $field['label'] = "Your Name";
    return $field;
}
add_filter('acf/prepare_field/name=_post_title', 'my_acf_prepare_field');




/*----- Allow custom background color ------*/
$args = array(
	'default-color' => 'a0cef5',
);
add_theme_support( 'custom-background', $args );




/*------ Add Reviews Post Type -------*/
function cptui_register_my_cpts() {
	/**
	 * Post Type: Reviews.
	 */
	$labels = array(
		"name" => __( 'Reviews', 'heavens-best-modern' ),
		"singular_name" => __( 'Review', 'heavens-best-modern' ),
	);
	$args = array(
		"label" => __( 'Reviews', 'heavens-best-modern' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "review", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
		"taxonomies" => array( "location" ),
	);

	register_post_type( "review", $args );
}
add_action( 'init', 'cptui_register_my_cpts' );


function cptui_register_my_taxes() {
	/**
	 * Taxonomy: Locations.
	 */
	$labels = array(
		"name" => __( 'Locations', 'heavens-best-modern' ),
		"singular_name" => __( 'Location', 'heavens-best-modern' ),
	);
	$args = array(
		"label" => __( 'Locations', 'heavens-best-modern' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Locations",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'location', 'with_front' => true,  'hierarchical' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "location", array( "review" ), $args );
}
add_action( 'init', 'cptui_register_my_taxes' );

 
add_editor_style();


add_filter( 'nav_menu_link_attributes', 'wpse270596_add_navlink_atts', 10, 3 );
function wpse270596_add_navlink_atts( $atts, $item, $args ) {
  if (in_array('menu-item-has-children', $item->classes)) {
    $atts['data-toggle'] = 'dropdown';
    $atts['aria-haspopup'] = 'true';
  }
return $atts;
}





 
add_filter( 'frm_filter_final_form', 'auto_minimize_forms' );
function auto_minimize_forms( $form ) {
  $form = str_replace( array('<fieldset>', '</fieldset>'), '', $form);
  return $form;
}

// Move Yoast to bottom
function yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');


/*  Add responsive container to embeds
/* ------------------------------------ */ 
function alx_embed_html( $html ) {
    return '<div class="video-container">' . $html . '</div>';
}
 
add_filter( 'embed_oembed_html', 'alx_embed_html', 10, 3 );
add_filter( 'video_embed_html', 'alx_embed_html' ); // Jetpack

