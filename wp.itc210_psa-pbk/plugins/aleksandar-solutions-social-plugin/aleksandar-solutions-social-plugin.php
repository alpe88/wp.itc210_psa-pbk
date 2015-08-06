<?php
/*
Plugin Name: Aleksandar's Solution to Social Widget as a Plugin
Description: This plugin is to be used as a theme independent extension of function.php file, holding custom made social widgets.
*/

// Creating the widget 
class Social_Widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'social_widget', 

// Widget name will appear in UI
__('Social Widget', 'social_widget_domain'), 

// Widget description
array( 'description' => __( 'Widget that will add Facebook and Twitter feeds.', 'social_widget_domain' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// a little bit of action.

	wp_enqueue_script('tf', plugin_dir_url(__FILE__) . 'inc/tw/tf.min.js', array('jquery'), '1.0', true);
	echo	'<div id="tw-widget"></div>';
	wp_enqueue_script('fb', plugin_dir_url(__FILE__) . 'inc/fb/fb.js', '1.0', true);
	echo '<div class="fb-page" data-href="https://www.facebook.com/PSAPhiBetaKappa" 
				data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"
				data-show-posts="false">
				<div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/PSAPhiBetaKappa">
				<a href="https://www.facebook.com/PSAPhiBetaKappa">Puget Sound Association of Phi Beta Kappa</a></blockquote>
				</div></div>';

echo $args['after_widget'];
}
		
// Widget Back-end 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'social_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class wpb_widget ends here

// Register and load the widget
function wpb_load_widget() {
	register_widget( 'social_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );


?>