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
			
				<!-- Title & Description-->
				<?php if ( is_tax() ) { 
					$catID = get_query_var('cat');
				?>
				<div id="archiveTitleBlock">
					<h3 id="archiveTitle"><?php single_cat_title(); ?></h3>
					<?php if ( category_description( $catID ) ) {
						echo category_description( $catID );
					} ?>
				</div>
					
					
				<?php } else {
					//Do Nothing
				}; ?>
				
				<?php
				// Attachments 
				// PDF
				$the_pdf_meta = get_post_meta($post->ID,'wp_pdf_attachment',true);
				// CSV
				$the_csv_meta = get_post_meta($post->ID,'wp_csv_attachment',true);
				
				$row = 1;
				ini_set("auto_detect_line_endings", "1");
				if (($handle = fopen($the_csv_meta['url'], "r")) !== FALSE) {
					
					// START TABLE
					$html = '<!-- Product Table --><table width="100%" cellspacing="0" cellpadding="0" id="categoryTable">';
						
					// LOOP THROUGH ROWS
				    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				        $num = count($data);
				        
				        if( $row == 1 ) {
					        
					        // FIRST ROW
					        $html .= '<thead><tr>';
					        for ($c=0; $c < $num; $c++) {
					            $html .= '<th>' . $data[$c] . "</th>";
					        }
					        $html .= '</tr></thead>';
					        
				        } elseif( $row == 2 ) {
					        
					        // SECOND ROW
					        $html .= '<tbody><tr>';
					        for ($c=0; $c < $num; $c++) {
					            $html .= '<td>' . $data[$c] . "</td>";
					        }
					        $html .= '</tr>';
					        
				        } else {
					        
					        // OTHER ROWS
					        $html .= '<tr>';
					        for ($c=0; $c < $num; $c++) {
					            $html .= '<td>' . $data[$c] . "</td>";
					        }
					        $html .= '</tr>';
					        
				        };
				        
				        $row++;

				    }
			        $html .= '</tbody></table>';
					echo $html;
				    fclose($handle);
				};

				?>
				
				<!-- Product Table -->
				<table width="100%" cellspacing="0" cellpadding="0" id="archiveProductTable">
				<tbody>
					<tr width="100%" height="40" class="archiveTableHeader">
						<td width="80"></td>
						<td width="490">Name</td>
						<!--<td width="150">Availability</td>-->
						<td width="150">size/pack</td>
					</tr>					
					<?php if (have_posts()) : while (have_posts()) : the_post();
					$productAvail = get_post_meta($post->ID, '_product_info_prod_avail', false);
					$productPack = get_post_meta($post->ID, '_product_info_prod_pack', false);
					$productImages = get_post_meta($post->ID, '_product_images_prod_images_prod_image', false);
					$productThumb = wp_get_attachment_image_src( $productImages[0][0], 'productThumb', true );
					?>
				
					<tr width="100%" class="archiveTableRow">
						<td width="80">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<img src="<?php echo $productThumb[0]; ?>" width="60" height="60" alt="<?php the_title(); ?>" />
							</a>
						</td>
						<td width="340">
							<span class="archiveProductTitle">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
							</span>
						</td>
						<!--<td width="150"><?php echo $productAvail[0]; ?></td>-->
						<td width="150"><?php echo $productPack[0]; ?></td>
					</tr>
				
				<?php endwhile; ?>
				<?php endif; ?>
				</tbody>
				</table>
				
				<!-- Pagination -->
				<?php if(function_exists('wp_paginate')) {
				wp_paginate();
				} ?>
				
			</div>
			
			<div class="grid_3 omega" style="background:#FFF;height:400px;">
				<?php get_template_part('sidebar'); ?>
			</div>
						
		</section>
		
<?php get_footer();

?>