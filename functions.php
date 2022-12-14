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



remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');


add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );
function blankslate_load_scripts() {
 
	wp_enqueue_script('jquery');
	//wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'doubletaptogo', get_stylesheet_directory_uri() . '/doubletaptogo.min.js', array( 'jquery' ) );
	//wp_enqueue_script( 'wallop', 'https://cdnjs.cloudflare.com/ajax/libs/wallop/2.4.1/js/Wallop.js'  );
	//wp_enqueue_style( 'wallopcss', 'https://cdnjs.cloudflare.com/ajax/libs/wallop/2.4.1/css/wallop--fade.min.css'   );
	
	//wp_enqueue_script( 'formidable', '/wp-content/plugins/formidable/js/formidable.min.js', array( 'jquery' ) );	
	//wp_enqueue_script( 'starRating', '/wp-content/plugins/formidable/pro/js/jquery.rating.min.js', array( 'jquery' ) );
	if ( is_archive() ) {
		wp_enqueue_script( 'lightslider', 'https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.5/js/lightslider.min.js', array( 'jquery' ) );
		wp_enqueue_style( 'lightcss', 'https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.5/css/lightslider.min.css'   );
	}


}

 




//Remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css(){
 wp_dequeue_style( 'wp-block-library' );
 wp_dequeue_style( 'wp-block-library-theme' );
}
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css' );






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

 





 
add_filter( 'frm_filter_final_form', 'auto_minimize_forms' );
function auto_minimize_forms( $form ) {
  $form = str_replace( array('<fieldset>', '</fieldset>'), '', $form);
  return $form;
}

// Move Yoast to bottom
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');
function yoasttobottom() {
	return 'low';
}


/*  Add responsive container to embeds */
function alx_embed_html( $html ) {
    return '<div class="video-container">' . $html . '</div>';
}
 
add_filter( 'embed_oembed_html', 'alx_embed_html', 10, 3 );
add_filter( 'video_embed_html', 'alx_embed_html' ); // Jetpack

// Removes Related Videos for YouTube embeds.
function iweb_modest_youtube_player( $html, $url, $args ) {
	return str_replace( '?feature=oembed', '?feature=oembed&modestbranding=1&showinfo=0&rel=0', $html );
}
add_filter( 'oembed_result', 'iweb_modest_youtube_player', 10, 3 );




// Returns true if user has specific role 
function check_user_role( $role, $user_id = null ) {
    if ( is_numeric( $user_id ) )
        $user = get_userdata( $user_id );
    else
        $user = wp_get_current_user();
    if ( empty( $user ) )
        return false;
    return in_array( $role, (array) $user->roles );
}
 
// Disable WordPress SEO meta box for all roles other than administrator and seo
function wpse_init(){
    if( !(check_user_role('seo') || check_user_role('administrator')) ){
        // Remove page analysis columns from post lists, also SEO status on post editor
        add_filter('wpseo_use_page_analysis', '__return_false');
        // Remove Yoast meta boxes
        add_action('add_meta_boxes', 'disable_seo_metabox', 100000);
    }   
}
add_action('init', 'wpse_init');
 
function disable_seo_metabox(){
    remove_meta_box('wpseo_meta', 'post', 'normal');
    remove_meta_box('wpseo_meta', 'page', 'normal');
}

remove_role( 'adwords_manager' );

add_role('adwords_manager', __('Adwords Manager'),
    array(
        'read'              => true, // Allows a user to read
		'activate_plugins' => true,
		'create_pages' 		=> true,
		'publish_pages'   	=> true,
		'edit_pages'   		=> true,
		'edit_others_pages' => false,
		'create_posts' => true,
		'delete_posts' => true,
		'delete_published_posts' => true,
		'edit_posts' => true,
		'publish_posts' => true,
		'delete_published_posts	' => true,
		'edit_published_posts' => true,
		'edit_others_posts' => true,
		'upload_files' => true,
		'edit_published_pages' => true,
		'delete_pages'   	=> true,
		'delete_published_pages' => true,
		'frm_view_entries' => true,
		'frm_view_forms' => true,
		'frm_edit_forms' => true,
		'frm_view_entries' => true,
		'level_8' => true
        )
);
$adwords_manager = get_role('adwords_manager'); $adwords_manager -> add_cap('level_10');


 
function wpsites_query( $query ) {
if ( $query->is_archive() && $query->is_main_query() && !is_admin() ) {
        $query->set( 'posts_per_page', 200 );
    }
}
add_action( 'pre_get_posts', 'wpsites_query' );


/*--- ACF new Landing page stuff ---*/
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_593ed9fcb20ce',
	'title' => 'Landing Pages',
	'fields' => array(
		array(
			'key' => 'field_59430c05d246d',
			'label' => 'Theme',
			'name' => 'theme',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'standard' => 'Standard Blue',
				'spring' => 'Spring',
				'summer' => 'Summer',
				'fall' => 'Fall',
				'christmas' => 'Winter Holiday',
				'celebration' => 'Celebration Countdown',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => '',
			'layout' => 'horizontal',
			'return_format' => 'value',
		),
		array(
			'key' => 'field_593ed9eff3046',
			'label' => 'Main Title',
			'name' => 'main_title',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_59403754add86',
			'label' => 'Type of Content',
			'name' => 'type_of_content',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'text' => 'Text',
				'html' => 'Custom HTML Code',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => 'text',
			'layout' => 'horizontal',
			'return_format' => 'value',
		),
		array(
			'key' => 'field_594306d52486e',
			'label' => 'Special Icon HTML',
			'name' => 'special_icon_html',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_59403754add86',
						'operator' => '==',
						'value' => 'html',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '<article>
	<figure><img src="https://res.cloudinary.com/ez-nettools/image/upload/v1497564678/white-icon-stars_bwyyn8.png" /></figure>
	<h3>Highest Satisfaction</h3>
	<p>We are insured, licensed, and flexible. Our schedule works with yours. Our professional, well groomed, uniformed employees are verified through extensive background checks.</p>
	<hr>
</article>

<article>
	<figure><img src="https://res.cloudinary.com/ez-nettools/image/upload/v1497564678/white-icon-1-hour_s6i1ar.png" /></figure>
	<h3>Dry in 1 Hour</h3>
	<p>Your carpets get cleaner, and dry in less than an hour, and we offer the best value on a budget. That means quality work.</p>
	<hr>
</article>

<article>
	<figure><img src="https://res.cloudinary.com/ez-nettools/image/upload/v1497564678/white-icon-kid-dog_yko18h.png" /></figure>
	<h3>Family Safe</h3>
	<p>No harsh chemicals so it\'s safe for kids, pets, and your family. That means Hypoallergenic and Residue Free too! Your family\'s safety in our priority!</p>
</article>',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => 18,
			'new_lines' => '',
		),
		array(
			'key' => 'field_594036106af6e',
			'label' => 'Special Offer Details',
			'name' => 'special_offer_details',
			'type' => 'wysiwyg',
			'instructions' => 'Put information about your specials offer.',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_59403754add86',
						'operator' => '==',
						'value' => 'text',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '<h2>3 Room Carpet Cleaning for $99</h2>
<hr />
</article><article>
<h3>This Exclusive Deal is Only For a Limited Time!</h3>
<ul>
 	<li>Highest Satisfaction</li>
 	<li>Dry in 1 Hour</li>
 	<li>Family Safe</li>
</ul>
Limited to 600 Sq/Ft up to 3 rooms. Special rates apply for exceeding 600 Sq/Ft limit. $35 for additional rooms. Limitations apply. Call for details.',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_59495f91f4b15',
			'label' => 'Choose Your Form',
			'name' => 'choose_your_form',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_594035d2250ad',
			'label' => 'Phone Number',
			'name' => 'phone_number',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_59430d3f80280',
			'label' => 'Additional Features',
			'name' => 'additional_features',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '<h3>Additional Features</h3>
<ul>
	<li>Hypoallergenic</li>
	<li>Residue free</li>
	<li>Hospital grade disinfectant</li>
	<li>No harsh chemicals</li>
</ul>',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
		),
		array(
			'key' => 'field_594947f37776c',
			'label' => 'Homepage Link (optional)',
			'name' => 'add_homepage_link',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => 'Add a link under the phone number to the homepage',
			'default_value' => 0,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_5949488cd278d',
			'label' => 'Add Address (optional)',
			'name' => 'add_address',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => 'Place your address in the footer',
			'default_value' => 0,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'template-landing.php',
			),
		),
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'template-sandwich-landing.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array(
		0 => 'the_content',
	),
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_5c05940af1162',
	'title' => 'Sandwich Landing Page',
	'fields' => array(
		array(
			'key' => 'field_5c0593dd63855',
			'label' => 'iframe URL',
			'name' => 'iframe_url',
			'type' => 'url',
			'instructions' => 'The middle part of the	Sandwich Landing Page is an iframe from another source.	Choose the middle part here.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'https://hbcarpetcleaning.com/landing-page-piece',
			'placeholder' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_template',
				'operator' => '==',
				'value' => 'template-sandwich-landing.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;
