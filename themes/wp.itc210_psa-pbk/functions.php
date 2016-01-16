<?php
/*
Theme Name: Theme built for the Puget Sound Association of The Phi Beta Kappa Honor Society
Author: LOCKWOOD, CHRIS W, 
PETROVIC, ALEKSANDAR
Author URI: 
Text Domain: PSA-PBK
Description: This is a theme developed for the Puget Sound Association of The Phi Beta Kappa Honor Society
Version: 0.3
*/

#custom walker include
require_once('BS_Walker.php');
require_once('Two_Column_Menu_Walker.php');

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
		  'header-menu' => 'Header Menu',
		  'footer-menu' => 'Footer Menu',
		  'utility-menu' => 'Utility Menu',
		  'social-menu' => 'Social Menu'
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

function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
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
#get current url for og:url tag
function this_url(){
	$base_url = "http://www.psa-pbk.org";
	$path = $_SERVER['REQUEST_URI'];
	$this_url = $base_url + $path;
	return $this_url;
}
#custom flexslider - #genius, and a bit tacked on by @!Aleksandar
function add_flexslider($class) {
	$args = array(#get all posts/pages with this key/value pair
		'meta_query'	=>	array(
			array(
				'key' => 'On Front Page'
			)
		),
		'post_type'		=> array('post', 'page')
	);
	$ofp = new WP_Query($args);
	echo '<div class="flexslider '.$class.'">';
	echo '<ul class="slides">';
		if ( $ofp->have_posts() ) : while ( $ofp->have_posts() ) : $ofp->the_post();
			echo '<li>';
			$url = wp_get_attachment_url(get_post_thumbnail_id($ofp->ID));
			echo '<img class="center-block img-cover" src="'.$url.'" alt="Image of '.get_the_title($ofp->ID).' of Puget Sound Association of Phi Beta Kappa Honor Society." />';
			echo '<span class="flex-caption"><span class="flex-caption-content">'.get_the_title($ofp->ID).'<br />'.get_the_excerpt().'</span></span>';
			echo '</li>';
	endwhile;
		echo '</ul>';
		echo '</div>';
	else :
		_e( 'Sorry, no posts matched your criteria.' );
	endif;
} 
add_shortcode( 'flexslider', 'add_flexslider' );

#script for carousel
function flexsliderJs() { ?>

<script>
jQuery(document).ready(function($){
  $('.flexslider').flexslider({
				animation: "slide",
				controlNav: false,
				directionNav: true,
				prevText: "",
				nextText: "",
			});
});
</script>
<?php
}
add_action('wp_footer', 'flexsliderJs');

#another slider using native BS3
function alt_highlight_slider(){
	$highlights_number = 0;
	$args = array(#get all posts/pages with this key/value pair
		'meta_query'	=>	array(
			array(
				'key' => 'On Front Page'
			)
		),
		'post_type'		=> array('post', 'page'),
		'orderby' => 'id',
		'order'   => 'ASC',
	);
	$ofp = new WP_Query($args);
	$htmlstr = '';
	if($ofp->have_posts()){
		$htmlstr .= '<div id="highlights" class="carousel slide">';
			$htmlstr .= '<ol class="carousel-indicators">';		
				while($ofp->have_posts()):$ofp->the_post();
				$htmlstr .= '<li data-target="#highlights" data-slide-to='.$highlights_number++.'></li>';
				endwhile;
			$htmlstr .= '</ol>';
			
			$htmlstr .= '<div class="carousel-inner">';
				while($ofp->have_posts()):$ofp->the_post();
					$htmlstr .= '<div class="item">';
						$url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', true);
						$htmlstr .= '<div class="fill" style="background-image:url('.$url[0].')">';
							$htmlstr .=	'<div class="text-center">';
								$htmlstr .= '<div class="container">';
									$htmlstr .= '<div class="row vh-55">';
										$htmlstr .= '<div class="row-height">';
											$htmlstr .= '<div class="col-xs-12 col-height col-middle">';
												$htmlstr .= '<div class="inside">';
													$htmlstr .= '<div class="content">';
														$htmlstr .= '<h2 class="text-xxl">'.showMeta('Post Sub Caption').'</h2>';
													$htmlstr .= '</div>';
												$htmlstr .= '</div>';
											$htmlstr .= '</div>';
										$htmlstr .= '</div>';
									$htmlstr .= '</div>';
									
									$htmlstr .= '<div class="row">';
										$htmlstr .= '<div class="row-height">';
											$htmlstr .= '<div class="col-xs-12 col-height col-bottom">';
												$htmlstr .= '<div class="inside">';
													$htmlstr .= '<div class="content">';
														if(showMeta('Post Sub Caption') == 'The Nation\'s Oldest Academic Honor Society'){
															$htmlstr .= '<a href="#1" class="text-lg">';
																$htmlstr .= '<p class="btn btn-primary text-lg uppercase">welcome</p>';
																$htmlstr .= '<br/>';
																$htmlstr .= '<i class="text-lg fa fa-angle-down"></i>';
															$htmlstr .= '</a>';
														}else{
															$htmlstr .= '<a href="'.get_the_permalink($ofp->ID).'" class="text-lg">';
															$htmlstr .= '<h3>'.get_the_excerpt($ofp->ID).'</h3>';
															$htmlstr .= '</a>';
														}
													$htmlstr .= '</div>';
												$htmlstr .= '</div>';
											$htmlstr .= '</div>';
										$htmlstr .= '</div>';
									$htmlstr .= '</div>';
								$htmlstr .= '</div>	';
							$htmlstr .= '</div>';
						$htmlstr .= '</div>';
					$htmlstr .= '</div>';
				endwhile;
			$htmlstr .= '</div>';
			
				$htmlstr .= '<!-- Controls -->';
				$htmlstr .= '<a class="left carousel-control" href="#highlights" data-slide="prev">';
					$htmlstr .= '<span class="icon-prev"></span>';
				$htmlstr .= '</a>';
				$htmlstr .= '<a class="right carousel-control" href="#highlights" data-slide="next">';
					$htmlstr .= '<span class="icon-next"></span>';
				$htmlstr .= '</a>';
		$htmlstr .= '</div>';
	}
	else{
		$htmlstr = '		<div class="fill" style="background-image:url('. bloginfo('template_directory').'/images/fpstock.jpg\')">';
		$htmlstr = '			<div class="col-xs-12 text-center">';
		$htmlstr = '				<div class="vh-45"></div>';
		$htmlstr = '				<a href="#1" class="text-lg">';
		$htmlstr = '					<p class="btn btn-primary text-lg uppercase">welcome</p>';
		$htmlstr = '					<br/>';
		$htmlstr = '					<i class="text-lg fa fa-angle-down"></i>';
		$htmlstr = '				</a>';
		$htmlstr = '			</div>';
		$htmlstr = '		</div>';
		
	}
	return $htmlstr;
}

#script for carousel
function highlightsJs() { ?>

<script>
jQuery(document).ready(function($){
  $("#highlights .carousel-indicators li:first").addClass("active");
  $("#highlights .carousel-inner .item:first").addClass("active");
   $("#highlights").carousel({
  interval: 6000
  })
});
</script>
<?php
}
add_action('wp_footer', 'highlightsJs');

#get meta information - the convenient way (:
function showMeta($arg){
	return get_post_meta(get_the_ID(),$arg, true);
}

#get all sub pages
function get_all_subpages($page, $args = '', $output = OBJECT) {
    // Validate 'page' parameter
    if (! is_numeric($page))
        $page = 0;

    // Set up args
    $default_args = array(
        'post_type' => 'page',
    );
    if (empty($args))
        $args = array();
    elseif (! is_array($args))
        if (is_string($args))
            parse_str($args, $args);
        else
            $args = array();
    $args = array_merge($default_args, $args);
    $args['post_parent'] = $page;

    // Validate 'output' parameter
    $valid_output = array(OBJECT, ARRAY_A, ARRAY_N);
    if (! in_array($output, $valid_output))
        $output = OBJECT;

    // Get children
    $subpages = array();
    $children = get_children($args, $output);
    foreach ($children as $child) {
        $subpages[] = $child;

        if (OBJECT === $output)
            $page = $child->ID;
        elseif (ARRAY_A === $output)
            $page = $child['ID'];
        else
            $page = $child[0];

        // Get subpages by recursion
        $subpages = array_merge($subpages, get_all_subpages($page, $args, $output));
    }

    return $subpages;
}
