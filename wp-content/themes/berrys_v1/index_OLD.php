<?php

get_header(); ?>

		<!-- Home Page Top -->
		<section id="homeTop" class="container_12 clearfix">
		
			<!-- Home Page Feature -->
			<div id="homeFeature" class="grid_8 alpha">
				<img src="#" alt="XXX" width="620" height="500">
				<!--<div class="homeFeatureContent">
					<h3>Favorite Colors</h3>
					<p>Lorem ipsum dolor sit amet.</p>
					<a>View our bright blooms</a>
				</div>-->
			</div>
			
			<!-- Home Page Stories -->
			<div id="homePageStories" class="grid_4 omega">
			
			<?php 
			$args = array(
				'post_type'	=> 'story',
				'orderby'	=> 'meta_value',
				'meta_key'	=> '_story_info_story_order',
				'order'		=> 'DESC'
			);
			$story_query = new WP_Query( $args );
			if ( $story_query->have_posts() ) : while ( $story_query->have_posts() ) : $story_query->the_post();
			// Custom Fields
			$storyCaption = get_post_meta($post->ID, '_story_info_story_caption', true);
			$storyLinkText = get_post_meta($post->ID, '_story_info_story_link', true);
			$promoCat = get_post_meta($post->ID, '_story_info_promo_cat', true);
			$promoCatTerm = get_term( $promoCat[0], 'product_category' );
			$storyLinkURL = get_term_link( $promoCatTerm );
			?>
				
				<div class="homeStory">
					<h3><?php the_title(); ?></h3>
					<p><?php echo $storyCaption; ?></p>
					<a href="<?php echo $storyLinkURL; ?>" title="<?php echo $storyLinkText; ?>">&raquo; <?php echo $storyLinkText; ?></a>
				</div>
								
			<?php endwhile; ?>
			<?php endif; ?>
			
			</div>
			
		</section>
		
<?php get_footer();

?>