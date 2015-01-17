<?php

get_header(); ?>

		<!-- Home Page Description Banner -->
		<div id="homePageDescBanner" class="container_12">
			<p class="grid_12 alpha omega" id="homePageDescription">&bull; We carry the basics, but specialize in the unusual. &bull;</p>
		</div>
				
		<!-- Home Page Top -->
		<section id="homeTop" class="container_12 clearfix">
		
			<!-- Home Page Feature -->
			<div id="homeFeature" class="grid_8 alpha">
				<?php get_template_part('homepage_gallery'); ?>
			</div>
			
			<!-- Home Page Stories -->
			<div id="homePageStories" class="grid_4 omega">
			
			<?php 
			$args = array(
				'post_type'	=> 'story',
				'orderby'	=> 'meta_value',
				'meta_key'	=> '_story_info_story_order',
				'order'		=> 'ASC',
				'posts_per_page' => 4
			);
			$story_query = new WP_Query( $args );
			if ( $story_query->have_posts() ) : while ( $story_query->have_posts() ) : $story_query->the_post();
			// Custom Fields
			$storyCaption = get_post_meta($post->ID, '_story_info_story_caption', true);
			$storyLinkText = get_post_meta($post->ID, '_story_info_story_link', true);
			$promoCat = get_post_meta($post->ID, '_story_info_promo_cat', true);
			$promoCatTerm = get_term( $promoCat, 'product_category' );
			$promoPage = get_post_meta($post->ID, '_story_info_promo_page', true);
			if ( $promoCat ){
				$storyLinkURL = get_term_link( $promoCatTerm );
			} elseif( $promoCat == null && $promoPage != null ) {
				$storyLinkURL = get_page_link( $promoPage );
			} else {
				$storyLinkURL = false;
			} ?>
				
				<div class="homeStory">
					<h3><?php the_title(); ?></h3>
					<p><?php echo $storyCaption; ?></p>
					<?php if( $storyLinkURL ) { ?>
						<a href="<?php echo $storyLinkURL; ?>" title="<?php echo $storyLinkText; ?>">&raquo; <?php echo $storyLinkText; ?></a>
					<?php } ?>
				</div>
								
			<?php endwhile; ?>
			<?php endif; ?>
			
			</div>
			
		</section>
		
<?php get_footer();

?>