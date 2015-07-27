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

	/* Register the primary sidebar. */
	register_sidebar(
		array(
			'id' => 'primary',
			'name' => __( 'Primary Sidebar' ),
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	
	/* Register the secondary sidebar. */
	register_sidebar(
		array(
			'id' => 'secondary',
			'name' => __( 'Secondary Sidebar' ),
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	
	/* Register the footer widget area. */
	register_sidebar(
		array(
			'id' => 'foot',
			'name' => __( 'Footer Widget Area' ),
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
#custom flexslider ala mike sinkula - #genius
function add_flexslider($cp_id) { 
	$args = array(
		'post_type' => 'attachment', 'post_parent' => $cp_id 
	);
    $attchs = get_children($args);
    if ($attchs) {        
        echo '<div class="flexslider">';
        echo '<ul class="slides">';
    
        foreach ($attchs as $attachment_id => $attachment) {            
			echo '<li class="img-responsive">';
            echo wp_get_attachment_image($attachment_id, 'large');
            echo '<p class="flex-caption">';
            echo get_post_field('post_content', $attachment->ID);
            echo '</p>';
            echo '</li>';
        }
        echo '</ul>';
        echo '</div>';
    }else {echo 'pusi karu kurvo';}
}
add_shortcode( 'flexslider', 'add_flexslider' );