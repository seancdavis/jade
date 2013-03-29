<?php

add_action( 'widgets_init', 'load_jade_widget' );

function load_jade_widget() {
	register_widget( 'Jade_Widget' );
}

class Jade_Widget extends WP_Widget {

	function Jade_Widget() {
		$widget_ops = array( 'classname' => 'jade', 'description' => __('Displays your featured product.', 'jade') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'jade' );
		$this->WP_Widget( 'jade', __('Featured Product', 'jade'), $widget_ops, $control_ops );
		add_action('wp_enqueue_scripts', array($this, 'load_styles') );
	}
	
	public function load_styles() {
		wp_enqueue_style('jade-widget-style', plugins_url().'/jade/widget-style.css');
	}

	function widget( $args, $instance ) {
		global $jade_rock, $jade;
		extract( $args );
		$title = apply_filters('widget_title', $instance['title'] );
		echo $before_widget;
		//if ( $title ) echo '<h2>' . $title . '</h2>';
		
		$id = $jade->option('featured_product');
		if( $id != '' ) { ?>			
			<div class="rt-feat-product-widget clearfix">
				<h3><?php echo get_the_title($id); ?></h3>
				<div class="rt-product-widget-info">	
					<p class="rt-feat-product-widget-description">
						<?php 
						$feat_post = get_post( $id );
						echo $feat_post->post_content; ?>
					</p>
					<?php if( get_post_meta($id, '_learn_more', true) != '' ) : ?>
						<a class="rt-product-widget-learn-more rt-product-widget-button" href="<?php echo get_post_meta($id, '_learn_more', true); ?>" <?php if( get_post_meta($id, '_lm_new_window',true) == true ) : ?>target='_blank'<?php endif; ?>>
							<?php echo $jade->option('learn_more_button_text'); ?>
						</a>
					<?php endif; ?>
					<?php if( get_post_meta($id, '_sample_profile', true) != '' ) : ?>
						<a class="rt-product-widget-preview rt-product-widget-button" href="<?php echo get_post_meta($id, '_sample_profile', true); ?>" target="_blank">
							<?php echo $jade->option('preview_button_text'); ?>
						</a>
					<?php endif; ?>
					<?php if( get_post_meta($id, '_price', true) != '' ) : ?>
						<p class="rt-product-widget-price rt-product-widget-button">$<?php echo get_post_meta($id, '_price', true); ?></p>
					<?php endif; ?>
				</div>	
			</div>			
		<?php }		
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}

	function form( $instance ) { ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hybrid'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>
		<p>All options here are set from the Contact Form setttings. Click "Save" and adjust settings accordingly (<a href="<?php echo get_bloginfo('wpurl') . "/wp-admin/edit.php?post_type=rt_jade&page=rt_jade_settings"; ?>">Click here for settings</a>).</p>
	<?php }
}

?>