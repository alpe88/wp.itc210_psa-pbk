<?php
/*
Theme Name: Theme built for the Puget Sound Association of The Phi Beta Kappa Honor Society
Author: Bo LOCKWOOD, CHRIS W, 
ZHANG, BOQUN, 
PETROVIC, ALEKSANDAR
HAILEMARIAM, MAHILET D
MALAVE, RAFAEL E
Author URI: 
Text Domain: PSA-PBK
Description: This is a theme developed for the Puget Sound Association of The Phi Beta Kappa Honor Society
Version: 0.1
*/

#custom walker include
require_once('DD_Walker.php');
#custom breadcrumbs include
require_once('BS_Breadcrumbs.php');
#theme support additions
add_theme_support('post-thumbnails');
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
add_post_type_support( 'page', 'excerpt', 'post-formats' );

#add RSS feed links to <head> tag
add_theme_support( 'automatic-feed-links' );

#for security, hide wp version in web pages and feeds
function remove_version_info() {
     return '';
}
add_filter('the_generator', 'remove_version_info');

#set Media Library image link default to "none"
function wpb_imagelink_setup() {
	$image_set = get_option( 'image_default_link_type' );
	
	if ($image_set !== 'none') {
		update_option('image_default_link_type', 'none');
	}
}
add_action('admin_init', 'wpb_imagelink_setup', 10);

#use shortcodes in widgets
add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');

#Register custom menus
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
		  'main-menu' => 'Main Menu',
		  'utility-menu' => 'Utility Menu',
		  'social_menu' => 'Social Menu' 
		)
	);
}   
   
#Register sidebars
add_action( 'widgets_init', 'my_register_sidebars' );

function my_register_sidebars() {

	/* Register the social sidebar. */
	register_sidebar(
		array(
			'id' => 'social',
			'name' => __('Social Sidebar' ),
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	/* Repeat register_sidebar() code for additional sidebars. */
}

#Remove rel attribute from the category list
function remove_category_list_rel($output)
{
  $output = str_replace(' rel="category tag"', '', $output);
  return $output;
}
add_filter('wp_list_categories', 'remove_category_list_rel');
add_filter('the_category', 'remove_category_list_rel');

#Redirect to home page after logout
function admin_bar_logout_redirect(){
  wp_redirect(home_url());
  exit();
}
add_action('wp_logout','admin_bar_logout_redirect');

function remove_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'remove_excerpt_more');

#SEO Titling:
function SEO_title(){
	global $post;

	if(is_front_page()){
		echo bloginfo('description');
	}
	elseif(is_page() || is_single()){
		echo the_title();
	}
	elseif(is_author()){
		if ($author_id = get_query_var('author')){$author = get_user_by( 'id',$author_id);}
		echo $author->first_name . ' ' . $author->last_name;
	}
	else{
		echo bloginfo('description');
	}

	if($post->post_parent){
		echo ' | ';
		echo get_the_title($post->post_parent);
	}
	
	echo ' | ';
	echo bloginfo('name');
	echo ' | ';
	echo 'Seattle, WA';
}

#custom function for sidebar display
function display_sidebar(){
$isMobile = (bool)preg_match('#\b(ip(hone|od|ad)|android|opera m(ob|in)i|windows (phone|ce)|blackberry|tablet'.
                    '|s(ymbian|eries60|amsung)|p(laybook|alm|rofile/midp|laystation portable)|nokia|fennec|htc[\-_]'.
                    '|mobile|up\.browser|[1-4][0-9]{2}x[1-4][0-9]{2})\b#i', $_SERVER['HTTP_USER_AGENT'] );
	if(is_front_page() && is_home()){#Default homepage - sidebar displayed
		echo "col-xs-12 col-sm-4";
	}elseif (is_front_page()) {#static homepage - sidebar displayed (probably not needed, but better to be complete)
		echo "col-xs-12 col-sm-4";
	}elseif (is_home()) {#blog page - sidebar displayed
		echo "col-xs-12 col-sm-4";
	}else{#everything else
		if(is_page('About Us')){return "hidden-xs hidden-sm hidden-md hidden-lg";}
	}
}

#custom flexslider ala mike sinkula - #genius, and a bit tacked on by @!Aleksandar
#custom flexslider ala mike sinkula - #genius, and a bit tacked on by @!Aleksandar
function add_flexslider() {
	
	global $post; // don't forget to make this a global variable inside your function
	
	if ( $images = get_posts(array(
		'post_parent' => $post->ID,
		'post_type' => 'attachment',
		'numberposts' => -1,
		'post_mime_type' => 'image',)))
	{
		foreach( $images as $image ) {
			$attachmenturl=wp_get_attachment_url($image->ID);
			$attachmentimage=wp_get_attachment_image_src( $image->ID, full );
			$imageDescription = apply_filters( 'the_description' , $image->post_content );
			$imageTitle = apply_filters( 'the_title' , $image->post_title );

			if (!empty($imageDescription)) {
    echo '<a href="'.$imageDescription .'"><img src="' . $attachmentimage[0] . '" alt=""  /></a>';
} else { echo '<img src="' . $attachmentimage[0] . '" alt="" />'; }
		}
	} else {
		echo "No Image";
	}
	
	
	
	$attachments = get_children(array('order' => 'ASC', 'orderby' => 'menu_order',  'post_type' => 'attachment', 'post_mime_type' => 'image', ));
	if ($attachments) { // see if there are images attached to posting
	
		echo '<div id="spotlight-home" class="flexslider">';
		echo '<ul class="slides">';
		
		foreach ( $attachments as $attachment_id => $attachment ) { // create the list items for images with captions
		
			echo '<li>';
			echo wp_get_attachment_image($attachment_id, 'full'); // get image size large
			echo '<span class="description">';
			echo get_post_field('post_content', $attachment->ID); // get image description field
			echo '</span>';
			echo '</li>';
		
		}
	
		echo '</ul>';
		echo '</div>';
	
	} // end see if images attachmed
} 
add_shortcode( 'flexslider', 'add_flexslider' );


