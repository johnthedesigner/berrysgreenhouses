<?php

get_header(); 

if (is_front_page()){
	get_template_part('feature-home');
	get_template_part('athlete-grid');
	get_template_part('hurricanes');
} else if (is_single() && get_post_type( $post->ID ) == "athlete") {
	get_template_part('athlete');
};

get_footer();

?>