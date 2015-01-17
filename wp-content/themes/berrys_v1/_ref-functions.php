<?php

remove_action('wp_head', 'wp_generator');

// Image Sizes
add_theme_support( 'post-thumbnails' );
add_image_size( 'headshot', 160, 160, true );
add_image_size( 'feature', 1060, 550, true );
add_image_size( 'square', 340, 340, true );

// functions and definitions

function rss_post_thumbnail($content) {
global $post;
if(has_post_thumbnail($post->ID)) {
$content = '<p>' . get_the_post_thumbnail($post->ID) .
'</p>' . get_the_content();
}
return $content;
}
add_filter('the_excerpt_rss', 'rss_post_thumbnail');
add_filter('the_content_feed', 'rss_post_thumbnail');


// Register mainNav  Menu
add_action( 'init', 'register_menus' );

function register_menus() {
	register_nav_menu( 'mainNav', 'Main Nav Menu' );
	register_nav_menu( 'socialNav', 'Social Nav Menu' );
}

// REGISTER SCRIPTS
wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/vendor/html5shiv.js', true );
wp_enqueue_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', 'html5shiv', '1.9.1', true );
wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/vendor/modernizr-2.6.2.min.js', array('jquery'), '1', true );
wp_enqueue_script( 'flexjs', get_template_directory_uri() . '/js/vendor/jquery.flexslider-min.js', array('jquery'), '1', true );
wp_enqueue_script( 'mainjs', get_template_directory_uri() . '/js/main.js', array('flexjs'), '1', true );
wp_enqueue_script( 'pluginsjs', get_template_directory_uri() . '/js/plugins.js', array('mainjs'), '1', true );

// CUSTOM CONTENT & META BOXES

// FEATURED STORIES
$stories = new cpt_Post_Type('story', array(
    'has_archive' => false,
    'supports' => array( 'title' )
) );

$feature->add_meta_box( 
	'Featured Story Info', 
	array(
		array(
			'name' 			=> 'photo',
			'label' 		=> 'Main Photo',
			'description'	=> 'A large photo to display in the main feature area of the home page (Minimum dimensions 1060 x 550).',
			'type'			=> 'image'
		),
		array(
			'name' 			=> 'title',
			'label' 		=> 'Title',
			'description'	=> 'If you don\'t enter a title the original title of the selected article will be used.',
			'type'			=> 'text'
		),
		array(
			'name' 			=> 'caption',
			'label' 		=> 'Caption',
			'description'	=> 'Enter descriptive text about this feature.',
			'type'			=> 'textarea'
		),
		array(
			'name' 			=> 'link_url',
			'label' 		=> 'Link Address',
			'description'	=> 'Enter the URL of a link you would like to include.',
			'type'			=> 'text'
		),
		array(
			'name' 			=> 'link_text',
			'label' 		=> 'Link Text',
			'description'	=> 'Enter the display text of the included link (ie. "Read the Article").',
			'type'			=> 'text'
		),
		array(
			'name'			=> 'contentPlacement',
			'label'			=> 'Content Placement',
			'description'	=> 'When this feature appears on the home page feature banner, which side should the text content appear?',
			'type'			=> 'radio',
			'options'		=> array(
				'left'	=> 'Left',
				'right'	=> 'Right'
			)
		),
		array(
			'name' 			=> 'order',
			'label' 		=> 'Feature Order',
			'description'	=> 'Enter a number to set the order in which the posts should be displayed',
			'type'			=> 'text'
		)
	)
);

// ATHLETES
$athletes = new cpt_Post_Type('athlete', 
	array( 
		'supports' => array( 'title' ),
		'plural' => 'Athletes',
		'capability' => 'post',
		'show_ui' => true,
		'public' => true
	)
);

$athletes->add_taxonomy('Event');

$athletes->add_taxonomy('Individual Event');

$athletes->add_meta_box( 
	'Personal Information', 
	array(
		array(
			'name'			=> 'first',
			'label'			=> 'First Name',
			'description'	=> 'Enter this athlete\'s first name.',
			'type'			=> 'text'
		),
		array(
			'name'			=> 'last',
			'label'			=> 'Last Name',
			'description'	=> 'Enter this athlete\'s last name.',
			'type'			=> 'text'
		),
		array(
			'name'			=> 'residence',
			'label'			=> 'Residence',
			'description'	=> 'Where is this athlete based? ex. "Boston"',
			'type'			=> 'text'
		),
		array(
			'name'			=> 'nationality',
			'label'			=> 'Nationality',
			'description'	=> 'Where is this athlete from? ex. "Sydney"',
			'type'			=> 'text'
		),
		array(
			'name'			=> 'almamater',
			'label'			=> 'Alma Mater',
			'description'	=> 'What college or university did this athelete attend?',
			'type'			=> 'text'
		),
		array(
			'name'			=> 'dob',
			'label'			=> 'Date of Birth',
			'description'	=> 'When was this athlete born?',
			'type'			=> 'date'
		),
		array(
			'name' 			=> 'headshot',
			'label' 		=> 'Headshot',
			'description'	=> 'A square image to represent this athlete (Minimum dimensions 160 x 160).',
			'type'			=> 'image'
		)
	)
);

$athletes->add_meta_box( 
	'Photo Gallery', 
	array(
		array(
			'name'			=> 'images',
			'label'			=> 'Images',
			'description'	=> 'Add images to the gallery for this athlete',
			'type'			=> 'repeatwrap',
			'contents'		=> array(
				array(
					'name'			=> 'img',
					'label'			=> 'Image',
					'description'	=> 'Minimum image size 1060 x 550',
					'type'			=> 'image'
				),
				array(
					'name'			=> 'title',
					'label'			=> 'Title',
					'type'			=> 'text'
				),
				array(
					'name'			=> 'caption',
					'label'			=> 'Caption',
					'type'			=> 'textarea'
				),
				array(
					'name'			=> 'contentPlacement',
					'label'			=> 'Content Placement',
					'description'	=> 'When this feature appears on the home page feature banner, which side should the text content appear?',
					'type'			=> 'radio',
					'options'		=> array(
						'left'	=> 'Left',
						'right'	=> 'Right'
					)
				),
				array(
					'name'			=> 'captionPlacement',
					'label'			=> 'Caption Placement',
					'description'	=> 'When this feature appears on the home page feature banner, which side should the text content appear?',
					'type'			=> 'leftright'
				),
				array(
					'name'			=> 'order',
					'label'			=> 'Image Order',
					'description'	=> 'Enter a number to set the order in which the image should be displayed',
					'type'			=> 'text'
				)
			)
		)
	)
);

$athletes->add_meta_box( 
	'Bio', 
	array(
		array(
			'name'			=> 'bio',
			'label'			=> 'Athlete Bio',
			'description'	=> 'Enter a brief bio of the athlete.',
			'type'			=> 'textarea'
		)
	)
);

$athletes->add_meta_box( 
	'Favorite Quote', 
	array(
		array(
			'name'			=> 'quote',
			'label'			=> 'Quote',
			'description'	=> 'The Athlete\'s favorite inspirational quote.',
			'type'			=> 'textarea'
		)
	)
);

$athletes->add_meta_box( 
	'Personal Records', 
	array(
		array(
			'name'			=> 'records',
			'description'	=> 'Add a list of personal records',
			'type'			=> 'repeatwrap',
			'contents'		=> array(
				array(
					'name'			=> 'event',
					'label'			=> 'Event',
					'description'	=> 'The title of this event (ex. "200m")',
					'type'			=> 'text'
				),
				array(
					'name'			=> 'record',
					'label'			=> 'Record',
					'description'	=> 'Describe the record',
					'type'			=> 'textarea'
				)
			)
		),
	)
);

$athletes->add_meta_box( 
	'Awards & Achievments', 
	array(
		array(
			'name'			=> 'awards',
			'description'	=> 'Add a list of other achievments',
			'type'			=> 'repeatwrap',
			'contents'		=> array(
				array(
					'name'			=> 'award',
					'label'			=> 'Award',
					'description'	=> 'Describe an award or achievment (ex. "Gold medal in the 200m at London Olympic games.")',
					'type'			=> 'textarea'
				)
			)
		)
	)
);

$athletes->add_meta_box( 
	'Social Media', 
	array(
		array(
			'name'			=> 'twitter',
			'label'			=> 'Twitter Username',
			'description'	=> 'Enter a this athlete\'s twitter username.',
			'type'			=> 'text'
		),
		array(
			'name'			=> 'facebook',
			'label'			=> 'Facebook Link',
			'description'	=> 'Enter a link to this athlete\'s Facebook page or profile.',
			'type'			=> 'text'
		),
		array(
			'name'			=> 'instagram',
			'label'			=> 'Instagram Username',
			'description'	=> 'Enter a this athlete\'s Instagram username.',
			'type'			=> 'text'
		),
		array(
			'name'			=> 'youtube',
			'label'			=> 'Youtube Link',
			'description'	=> 'Enter a link to this athlete\'s Youtube channel.',
			'type'			=> 'text'
		),
		array(
			'name'			=> 'website',
			'label'			=> 'Personal Website',
			'description'	=> 'Enter a link to this athlete\'s Personal Website.',
			'type'			=> 'text'
		)
	)
);

$athletes->add_meta_box( 
	'Misc. Links', 
	array(
		array(
			'name'			=> 'links',
			'label'			=> 'Links',
			'description'	=> 'Add miscellaneous links to outside websites',
			'type'			=> 'repeatwrap',
			'contents'		=> array(
				array(
					'name'			=> 'title',
					'label'			=> 'Title',
					'description'	=> 'Enter a descriptive name for this link.',
					'type'			=> 'text'
				),
				array(
					'name'			=> 'url',
					'label'			=> 'Address',
					'description'	=> 'Enter a destination web address for this link.',
					'type'			=> 'text'
				)
			)
		)
	)
);


