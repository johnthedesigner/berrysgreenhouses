<?php

get_header(); ?>

		<?php
		if ( have_posts() ) : while ( have_posts() ) : the_post();
		$productImages = get_post_meta($post->ID, '_product_images_prod_images_prod_image', false);
		//$productAvail = get_post_meta($post->ID, '_product_info_prod_avail', true);
		$productPack = get_post_meta($post->ID, '_product_info_prod_pack', true);
		$productPrice = get_post_meta($post->ID, '_product_info_prod_price', true);
		$productHabit = get_post_meta($post->ID, '_product_info_prod_habit', true);
		$productBlooms = get_post_meta($post->ID, '_product_info_prod_blooms', true);
		$productHeight = get_post_meta($post->ID, '_product_info_prod_height', true);
		$productSpacing = get_post_meta($post->ID, '_product_info_prod_spacing', true);
		$productZones = get_post_meta($post->ID, '_product_info_prod_zones', true);
		$productFertilize = get_post_meta($post->ID, '_product_info_prod_fertilize', true);
		$productWater = get_post_meta($post->ID, '_product_info_prod_water', true);
		$productLight = get_post_meta($post->ID, '_product_info_prod_light', true);
		$productFeatures = get_post_meta($post->ID, '_product_info_prod_features', true);
		$productUses = get_post_meta($post->ID, '_product_info_prod_uses', true);
		$productCare = get_post_meta($post->ID, '_product_info_prod_care', true);
		$productMisc01 = get_post_meta($post->ID, '_product_info_prod_misc1', true);
		$productMiscText01 = get_post_meta($post->ID, '_product_info_prod_misctext1', true);
		$productMisc02 = get_post_meta($post->ID, '_product_info_prod_misc2', true);
		$productMiscText02 = get_post_meta($post->ID, '_product_info_prod_misctext2', true);
		$productMisc03 = get_post_meta($post->ID, '_product_info_prod_misc3', true);
		$productMiscText03 = get_post_meta($post->ID, '_product_info_prod_misctext3', true);
		$productMisc04 = get_post_meta($post->ID, '_product_info_prod_misc4', true);
		$productMiscText04 = get_post_meta($post->ID, '_product_info_prod_misctext4', true);
		$productMisc05 = get_post_meta($post->ID, '_product_info_prod_misc5', true);
		$productMiscText05 = get_post_meta($post->ID, '_product_info_prod_misctext5', true);
		$productMisc06 = get_post_meta($post->ID, '_product_info_prod_misc6', true);
		$productMiscText06 = get_post_meta($post->ID, '_product_info_prod_misctext6', true);
		$productMisc07 = get_post_meta($post->ID, '_product_info_prod_misc7', true);
		$productMiscText07 = get_post_meta($post->ID, '_product_info_prod_misctext7', true);
		$productMisc08 = get_post_meta($post->ID, '_product_info_prod_misc8', true);
		$productMiscText08 = get_post_meta($post->ID, '_product_info_prod_misctext8', true);
		$productMisc09 = get_post_meta($post->ID, '_product_info_prod_misc9', true);
		$productMiscText09 = get_post_meta($post->ID, '_product_info_prod_misctext9', true);
		$productMisc10 = get_post_meta($post->ID, '_product_info_prod_misc10', true);
		$productMiscText10 = get_post_meta($post->ID, '_product_info_prod_misctext10', true);
		?>

		<!-- Product Page Top -->
		<section id="productTop" class="container_12 clearfix">
			<div id="breadcrumb" class="grid_12">
			    <?php if(function_exists('bcn_display')){
			        bcn_display();
			    }?>
			</div>
		</section>
		
		<section id="productBody" class="container_12 clearfix">
		
			<!-- Main Column -->
			<div class="grid_9 alpha" id="productMainColumn">
				
				<!-- Product Info -->
				<div class="grid_4 alpha">
					<div class="flexslider" id="productGallery">
						<ul class="slides">
						<?php 
						foreach($productImages[0] as $productImage){
							$productImageURL = wp_get_attachment_image_src( $productImage, 'productImage', true ); ?>
							<li>
								<img src="<?php echo $productImageURL[0];?>" alt="<?php the_title(); ?>" />
							</li>
						<?php }; ?>
						</ul>
					</div>
					<div class="flexsliderThumbs">
						<ul class="thumbs">
						<?php 
						foreach($productImages[0] as $productImage){
							$productImageURL = wp_get_attachment_image_src( $productImage, 'productThumb', true ); ?>
							<li>
								<img src="<?php echo $productImageURL[0];?>" alt="<?php the_title(); ?>" />
							</li>
						<?php }; ?>
						</ul>
						<span class="clearfix"></span>
					</div>
					<!--<script>
						jQuery(window).load(function() {
							jQuery('.flexslider').flexslider({
								slideshow:		false,
								manualControls:	'.flexsliderThumbs ul li',
								controlNav:		true,
								directionNav:	false
							});
						});
					</script>-->
				</div>
				<div class="grid_5 omega">
					<h1><?php the_title(); ?></h1>
					<div id="productDescription">
						<?php the_content(); ?>
					</div>
					
					<!-- PRODUCT DETAILS -->
					<table width="100%" cellspacing="0" cellpadding="0" id="productInfo">
					
						<?php // Output product info rows
						if ( $productPack ){ ?>
						<tr>
							<td class="productInfoTitle">Size/Pack</td>
							<td><p><?php echo $productPack; ?></p></td>
						</tr>
						<?php };
						if ( $productPrice ){ ?>
						<tr>
							<td class="productInfoTitle">Price</td>
							<td><p><?php echo $productPrice; ?></p></td>
						</tr>
						<?php };
						if ( has_tag() ){ ?>
						<tr>
							<td class="productInfoTitle">Tags</td>
							<td id="productTags"><p><?php the_tags("","",""); ?></p></td>
						</tr>
						<?php };
						if ( $productHabit ){ ?>
						<tr>
							<td class="productInfoTitle">Habit</td>
							<td><p><?php echo $productHabit; ?></p></td>
						</tr>
						<?php };
						if ( $productBlooms ){ ?>
						<tr>
							<td class="productInfoTitle">Blooms</td>
							<td><p><?php echo $productBlooms; ?></p></td>
						</tr>
						<?php };
						if ( $productHeight ){ ?>
						<tr>
							<td class="productInfoTitle">Height</td>
							<td><p><?php echo $productHeight; ?></p></td>
						</tr>
						<?php };
						if ( $productSpacing ){ ?>
						<tr>
							<td class="productInfoTitle">Spacing</td>
							<td><p><?php echo $productSpacing; ?></p></td>
						</tr>
						<?php };
						if ( $productZones ){ ?>
						<tr>
							<td class="productInfoTitle">Zones</td>
							<td><p><?php echo $productZones; ?></p></td>
						</tr>
						<?php };
						if ( $productFertilize ){ ?>
						<tr>
							<td class="productInfoTitle">Fertilize</td>
							<td><p><?php echo $productFertilize; ?></p></td>
						</tr>
						<?php };
						if ( $productWater ){ ?>
						<tr>
							<td class="productInfoTitle">Water</td>
							<td><p><?php echo $productWater; ?></p></td>
						</tr>
						<?php };
						if ( $productLight ){ ?>
						<tr>
							<td class="productInfoTitle">Light</td>
							<td><p><?php echo $productLight; ?></p></td>
						</tr>
						<?php };
						if ( $productFeatures ){ ?>
						<tr>
							<td class="productInfoTitle">Features</td>
							<td><p><?php echo $productFeatures; ?></p></td>
						</tr>
						<?php };
						if ( $productUses ){ ?>
						<tr>
							<td class="productInfoTitle">Uses</td>
							<td><p><?php echo $productUses; ?></p></td>
						</tr>
						<?php };
						if ( $productCare ){ ?>
						<tr>
							<td class="productInfoTitle">Care</td>
							<td><p><?php echo $productCare; ?></p></td>
						</tr>
						<?php };
						if ( $productMisc01 ){ ?>
						<tr>
							<td class="productInfoTitle"><?php echo $productMisc01; ?></td>
							<td><p><?php echo $productMiscText01; ?></p></td>
						</tr>
						<?php };
						if ( $productMisc02 ){ ?>
						<tr>
							<td class="productInfoTitle"><?php echo $productMisc02; ?></td>
							<td><p><?php echo $productMiscText02; ?></p></td>
						</tr>
						<?php };
						if ( $productMisc03 ){ ?>
						<tr>
							<td class="productInfoTitle"><?php echo $productMisc03; ?></td>
							<td><p><?php echo $productMiscText03; ?></p></td>
						</tr>
						<?php };
						if ( $productMisc04 ){ ?>
						<tr>
							<td class="productInfoTitle"><?php echo $productMisc04; ?></td>
							<td><p><?php echo $productMiscText04; ?></p></td>
						</tr>
						<?php };
						if ( $productMisc05 ){ ?>
						<tr>
							<td class="productInfoTitle"><?php echo $productMisc05; ?></td>
							<td><p><?php echo $productMiscText05; ?></p></td>
						</tr>
						<?php };
						if ( $productMisc06 ){ ?>
						<tr>
							<td class="productInfoTitle"><?php echo $productMisc06; ?></td>
							<td><p><?php echo $productMiscText06; ?></p></td>
						</tr>
						<?php };
						if ( $productMisc07 ){ ?>
						<tr>
							<td class="productInfoTitle"><?php echo $productMisc07; ?></td>
							<td><p><?php echo $productMiscText07; ?></p></td>
						</tr>
						<?php };
						if ( $productMisc08 ){ ?>
						<tr>
							<td class="productInfoTitle"><?php echo $productMisc08; ?></td>
							<td><p><?php echo $productMiscText08; ?></p></td>
						</tr>
						<?php };
						if ( $productMisc09 ){ ?>
						<tr>
							<td class="productInfoTitle"><?php echo $productMisc09; ?></td>
							<td><p><?php echo $productMiscText09; ?></p></td>
						</tr>
						<?php };
						if ( $productMisc10 ){ ?>
						<tr>
							<td class="productInfoTitle"><?php echo $productMisc10; ?></td>
							<td><p><?php echo $productMiscText10; ?></p></td>
						</tr>
						<?php }; ?>
					</table>
				</div>
				
				<div class="grid_9 alpha omega">
					<?php get_template_part('relatedProducts'); ?>
				</div>
				
			</div>
			
			<div class="grid_3 omega" style="background:#FFF;height:400px;">
				<?php get_template_part('sidebar'); ?>
			</div>
									
		</section>
		
		<?php endwhile; ?>
		<?php endif; ?>
		
<?php get_footer();

?>