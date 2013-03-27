<?php

extract( shortcode_atts( array(
	'featured' => false
), $atts ) );

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
			<a class="rt-product-preview" href="<?php echo get_post_meta($post->ID, '_sample_profile', true); ?>" target="_blank">Sample Profile</a>
			<span class="rt-product-price">$<?php echo get_post_meta($post->ID, '_price', true); ?></span>
			<?php the_content(); ?>
		</div>
		<hr class="rt-product-line">
		
	<?php endwhile;
}
else {
	global $jade; 
	$id = $jade->option('featured_product'); ?>
	<h2>Featured Product</h2>
	<div class="rt-feat-product clearfix">
		<h3><?php echo get_the_title($id); ?></h3>
		<a class="rt-feat-product-preview" href="<?php echo get_post_meta($id, '_sample_profile', true); ?>" target="_blank">Sample Profile</a>
		<p class="rt-feat-product-price">$<?php echo get_post_meta($id, '_price', true); ?></p>
		<p class="rt-feat-product-description">
			<?php 
			$feat_post = get_post( $id );
			echo $feat_post->post_content; ?>
		</p>
	</div>
	
<?php } 

?>