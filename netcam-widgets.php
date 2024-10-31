<?php
if( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class nls_widget extends WP_Widget
{
	public function __construct()
	{
		$widget_ops = array( 'classname' => 'widget_nls', 'description' => __('Add a netcam / webcam live stream.') );
		$control_ops = array();
		parent::__construct( 'nls_widget', __('Netcam live stream'), $widget_ops, $control_ops );
	}

	public function widget( $args, $instance )
	{
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		echo $args['before_widget'];
		if( !empty( $title ) ) echo $args['before_title'], $title, $args['after_title'];
		if( !empty( $instance['url'] ) )
		{
			$short = '[netcam-live url="' . $instance['url'] . '"' . ( !empty( $instance['refresh'] ) ? ( ' refresh="' . $instance['refresh'] . '"' ) : '' ) . ']';
			echo do_shortcode( $short );
		}
		echo $args['after_widget'], "\n";
	}

	public function form( $instance )
	{
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$title = strip_tags( $instance['title'] );
		$url = $instance['url'];
		$refresh = intval( $instance['refresh'] );
//		$content = esc_textarea( $instance['content'] );
?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e( 'Image URL:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" type="text" value="<?php echo esc_attr( $url ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'refresh' ); ?>"><?php _e( 'Refresh time (ms):' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id('refresh'); ?>" name="<?php echo $this->get_field_name('refresh'); ?>" type="text" value="<?php echo esc_attr( $refresh ); ?>" />
		</p>
<?php 
	}

	public function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['url'] = esc_url( trim( $new_instance['url'] ) );
		$instance['refresh'] = intval( $new_instance['refresh'] );
		return $instance;
	}
}
