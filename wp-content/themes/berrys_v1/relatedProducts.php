<div class="relatedProducts">
<?php
	$orig_post = $post;
	global $post;
	$tags = get_the_tags();
	
	if ($tags) {
		
		$tag_ids = array();
		foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
		
		$args = array(
			'tag__in' => $tag_ids,
			'post_type' => 'product',
			'post__not_in' => array($post->ID),
			'posts_per_page'=>3
		);
		
		$rp_query = new wp_query( $args );
		if ( $rp_query->have_posts() ) ?>

	<h3>Related Products</h3>
	
		<?php
		while( $rp_query->have_posts() ) {
		$rp_query->the_post();
		
		$productImages = get_post_meta($post->ID, '_product_images_prod_images_prod_image', false);
		$productThumb = wp_get_attachment_image_src( $productImages[0][0], 'productRelated', true );
	?>

	<div class="relatedThumb">
		<img src="<?php echo $productThumb[0]; ?>" width="220" height="220" alt="<?php the_title(); ?>" />
		<h4><?php the_title(); ?></h4>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">View Product &raquo;</a>
	</div>
	
	<? } ?>
	<span class="clearfix"></span>
	<? }
	$post = $orig_post;
	wp_reset_query();
	?>
</div>
