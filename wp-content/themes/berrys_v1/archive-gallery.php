<?php

get_header(); ?>

		<!-- Archive Page Top -->
		<section id="archiveTop" class="container_12 clearfix">
			<div id="breadcrumb" class="grid_12">
			    <?php if(function_exists('bcn_display')){
			        bcn_display();
			    }?>
			</div>
		</section>
		
		<section id="archiveBody" class="container_12 clearfix">
		
			<!-- Main Column -->
			<div class="grid_9" id="archiveMainColumn">
				
				<!-- Product Table -->
				<table width="100%" cellspacing="0" cellpadding="0" id="archiveProductTable">
				<tbody>
					<tr width="100%" height="40" class="archiveTableHeader">
						<td width="80"></td>
						<td width="200">XName</td>
						<td width="80">Availability</td>
						<td width="100">size/pack</td>
						<td width="140">Details</td>
						<td width="100">Price</td>
					</tr>					
					<?php
					if ( have_posts() ) : while ( have_posts() ) : the_post();
					$productPrice = get_post_meta($post->ID, '_product_info_prod_price', false);
					$productPack = get_post_meta($post->ID, '_product_info_prod_pack', false);
					$productImages = get_post_meta($post->ID, '_product_images_prod_images_prod_image', false);
					$productThumb = wp_get_attachment_image_src( $productImages[0][0], 'productThumb', true );
					?>
				
					<tr width="100%">
						<td width="80">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<img src="<?php echo $productThumb[0]; ?>" width="60" height="60" alt="<?php the_title(); ?>" />
							</a>
						</td>
						<td width="200">
							<span class="archiveProductTitle">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
							</span>
						</td>
						<td width="100">10/10/2013</td>
						<td width="100"><?php echo $productPack[0]; ?></td>
						<td width="140"></td>
						<td width="100"><?php echo $productPrice[0]; ?></td>
					</tr>
				
				<?php endwhile; ?>
				<?php endif; ?>
				</tbody>
				</table>
				
			</div>
			
			<div class="grid_3 omega" style="background:#FFF;height:400px;">
				<?php get_template_part('sidebar'); ?>
			</div>
						
		</section>
		
<?php get_footer();

?>