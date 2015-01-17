<div class="homeGallery">

<?php 
$args = array(
	'post_type'	=> 'gallery',
	'orderby'	=> 'meta_value',
	'meta_key'	=> '_gallery_location_gallery_home',
	'order'		=> 'DESC',
	'posts_per_page'=>1
);
$hpg_query = new WP_Query( $args );
if ( $hpg_query->have_posts() ) : while ( $hpg_query->have_posts() ) : $hpg_query->the_post();
// Custom Fields
$productImages = get_post_meta($post->ID, '_gallery_images_gallery_images_prod_image', false);
?>
	
	<div class="flexslider" id="homepageGallery">
		<ul class="slides">
		<?php 
		foreach($productImages[0] as $productImage){
			$productImageURL = wp_get_attachment_image_src( $productImage, 'slideShow', true ); ?>
			<li>
				<img src="<?php echo $productImageURL[0];?>" alt="<?php the_title(); ?>" />
			</li>
		<?php }; ?>
		</ul>
	</div>
	<script>
		jQuery(window).load(function() {
			jQuery('.flexslider').flexslider({
				slideshow:		true,
				autoplay:		true,
				controlNav:		false,
				directionNav:	true
			});
		});
	</script>
					
<?php endwhile; ?>
<?php endif; ?>

</div>
