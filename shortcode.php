<?php

extract( shortcode_atts( array(
	'featured' => false
), $atts ) );
global $jade; 
if( $featured == false ) { ?>
	<hr class="rt-product-line">
	<?php global $post;
	$loop = new WP_Query( array ( 'post_type' => 'rt_jade', 'posts_per_page' => '100' ) );
	while ( $loop->have_posts() ) : $loop->the_post(); ?>
		<h2 class="rt-product-title">
			<span id="rt-product-<?php echo $post->ID; ?>" class="rt-product-icon">+</span>
			<?php the_title(); ?>
		</h2>
		<div id="rt-product-description-<?php echo $post->ID; ?>" class="rt-product-description clearfix">
			<?php if( get_post_meta($post->ID, '_sample_profile', true) != '' ) : ?>
				<a class="rt-product-preview rt-product-button" href="<?php echo get_post_meta($post->ID, '_sample_profile', true); ?>" target="_blank">
					<?php echo $jade->option('preview_button_text'); ?>
				</a>
			<?php endif; ?>
			<?php if( get_post_meta($post->ID, '_price', true) != '' ) : ?>
				<span class="rt-product-price rt-product-button">$<?php echo get_post_meta($post->ID, '_price', true); ?></span>
			<?php endif; ?>
			<?php the_content(); ?>
			<?php if( get_post_meta($post->ID, '_learn_more', true) != '' ) : ?>
				<a class="rt-product-learn-more rt-product-button" href="<?php echo get_post_meta($post->ID, '_learn_more', true); ?>" <?php if( get_post_meta($post->ID, '_lm_new_window',true) == true ) : ?>target='_blank'<?php endif; ?>>
					<?php echo $jade->option('learn_more_button_text'); ?>
				</a>
			<?php endif; ?>	
		</div>
		<hr class="rt-product-line">
		
	<?php endwhile;
}
else {
	$id = $jade->option('featured_product'); ?>
	<h2>Featured Product</h2>
	<div class="rt-feat-product clearfix">
		<h3><?php echo get_the_title($id); ?></h3>
		<div class="rt-product-info">
			<?php if( get_post_meta($id, '_sample_profile', true) != '' ) : ?>
				<a class="rt-product-preview rt-product-button" href="<?php echo get_post_meta($id, '_sample_profile', true); ?>" target="_blank">
					<?php echo $jade->option('preview_button_text'); ?>
				</a>
			<?php endif; ?>
			<?php if( get_post_meta($id, '_price', true) != '' ) : ?>
				<p class="rt-product-price rt-product-button">$<?php echo get_post_meta($id, '_price', true); ?></p>
			<?php endif; ?>	
			<p class="rt-feat-product-description">
				<?php 
				$feat_post = get_post( $id );
				echo $feat_post->post_content; ?>
			</p>
			<?php if( get_post_meta($id, '_learn_more', true) != '' ) : ?>
				<a class="rt-product-learn-more rt-product-button" href="<?php echo get_post_meta($id, '_learn_more', true); ?>" <?php if( get_post_meta($id, '_lm_new_window',true) == true ) : ?>target='_blank'<?php endif; ?>>
					<?php echo $jade->option('learn_more_button_text'); ?>
				</a>
			<?php endif; ?>
		</div>	
	</div>
	
<?php } 

?>