<?php

get_header(); ?>

		<section id="pageBody" class="container_12 clearfix">
		
			<!-- Main Column -->
			<div class="grid_9 alpha" id="productMainColumn">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
				<h1><?php the_title(); ?></h1>
				<div id="productDescription">
					<?php the_content(); ?>
				</div>
				
			<?php endwhile; endif; ?>
			</div>
			
			<div class="grid_3 omega" style="background:#FFF;height:400px;">
				<?php get_template_part('sidebar'); ?>
			</div>
									
		</section>
		
<?php get_footer();

?>