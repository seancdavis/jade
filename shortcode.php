<?php
global $jade;

extract( shortcode_atts( array(
	'feature' => false,
), $atts ) );

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
	
<?php endwhile; ?>