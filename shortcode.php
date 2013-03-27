<?php

extract( shortcode_atts( array(
	'featured' => false
), $atts ) );

if( $featured == false ) {
	global $post;
	$loop = new WP_Query( array ( 'post_type' => 'rt_jade', 'posts_per_page' => '100' ) );
	while ( $loop->have_posts() ) : $loop->the_post(); ?>
		
		<h2 class="rt-product-title">
			<span id="rt-product-<?php echo $post->ID; ?>" class="rt-product-icon">+</span>
			<?php the_title(); ?>
		</h2>
		<div id="rt-product-description-<?php echo $post->ID; ?>" class="rt-product-description clearfix">
			<span class="rt-product-price">$<?php echo get_post_meta($post->ID, '_price', true); ?></span>
			<a class="rt-product-preview" href="<?php echo get_post_meta($post->ID, '_sample_profile', true); ?>" target="_blank">Sample Profile</a>
			<?php the_content(); ?>
		</div>
		
	<?php endwhile;
}
else {
	global $jade; 
	$id = $jade->option('featured_product'); ?>
	<h2 class=""><?php echo get_the_title($id); ?></h2>
	<p>$<?php echo get_post_meta($id, '_price', true); ?></p>
	<a class="" href="<?php echo get_post_meta($id, '_sample_profile', true); ?>" target="_blank">Sample Profile</a>
	<p>
		<?php 
		$feat_post = get_post( $id );
		echo $feat_post->post_content; ?>
	</p>
	
<?php } 

?>