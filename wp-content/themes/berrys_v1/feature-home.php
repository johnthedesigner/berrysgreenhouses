        <!-- START #featureSection -->
		<?php 
		$feature_query = new WP_Query( 'post_type=feature&posts_per_page=10&order=ASC&feature_location=home-alternate-feature&orderby=meta_value&meta_key=_featured_story_info_order' );
		if ( $feature_query->have_posts() ) : ?>

        <section id="featureSection" class="container_12">
        	<div id="homeFeature" class="flexslider grid_12">
        		<ul class="slides">

				<?php
				while ( $feature_query->have_posts() ) : $feature_query->the_post(); 
				$featureTitle = get_post_meta($post->ID, '_featured_story_info_title', true);
				$featureCaption = get_post_meta($post->ID, '_featured_story_info_caption', true);
				$featureLink = get_post_meta($post->ID, '_featured_story_info_link_text', true);
				$featureURL = get_post_meta($post->ID, '_featured_story_info_link_url', true);
				$featureContentPlacement = get_post_meta($post->ID, '_featured_story_info_contentplacement', true);
				$featureImageID = get_post_meta($post->ID, '_featured_story_info_photo', true);
				$featureImage = wp_get_attachment_image_src( $featureImageID, 'feature', true );
		
				?>
        	
        			<li style="height:550px;">
	        			<img src="<?php echo $featureImage[0];?>" alt="<?php echo $featureTitle; ?>" width="1060" height="550" />
	        			<?php if ($featureCaption) { ?>
		        			<span class="featureContent<?php if ( $featureContentPlacement == "right" ) { echo " featureContentRight"; }; ?>">
			        			<?php if ($featureTitle) { ?>
			        				<h3 class="featureTitle"><?php echo $featureTitle; ?></h3>
			        			<?php }; ?>
			        			<?php if ($featureCaption) { ?>
			        				<p class="featureCap"><?php echo $featureCaption; ?></p>
			        			<?php }; ?>
			        			<?php if ($featureLink) { ?>
			        				<p class="featureLink"><a href="<?php echo $featureURL; ?>" title="<?php echo $featureLink; ?>">&rsaquo; <?php echo $featureLink; ?></a></p>
			        			<?php }; ?>
		        			</span>
	        			<?php }; ?>
        			</li>
        			
        	<?php endwhile; ?>
        	
        		</ul>
        	</div>
        </section>
        <?php endif; ?>
        
