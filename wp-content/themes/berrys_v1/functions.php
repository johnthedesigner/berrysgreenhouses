<?php

remove_action('wp_head', 'wp_generator');

// Image Sizes
add_theme_support( 'post-thumbnails' );
add_image_size( 'productThumb', 60, 60, true );
add_image_size( 'productRelated', 220, 220, true );
add_image_size( 'productImage', 300, 300, true );
add_image_size( 'productZoom', 640, 900, false );
add_image_size( 'slideShow', 620, 500, true );

// functions and definitions

// Sort Products
function sortProducts($query){
	if( $query->is_main_query() && is_tax('product_category') && !is_admin() ){
		$query->set('order', 'ASC');
		$query->set('orderby', 'title');
	};
}
add_action( 'pre_get_posts', 'sortProducts' );

// Add thumbnails to RSS
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

// ENQUEUE STYLES
if (!is_admin()){
	wp_enqueue_style( 'berrys_normalize', get_template_directory_uri().'/css/normalize.css', array(), '1', 'all' );
	wp_enqueue_style( 'berrys_grid', get_template_directory_uri().'/css/grid.css', 'berrys_normalize', '1', 'all' );
	wp_enqueue_style( 'berrys_reset', get_template_directory_uri().'/css/reset.css', 'berrys_grid', '1', 'all' );
	wp_enqueue_style( 'berrys_fonts', 'http://fonts.googleapis.com/css?family=Fjalla+One|Oswald:300', 'berrys_reset', '1', 'all' );
	wp_enqueue_style( 'berrys_main', get_template_directory_uri().'/css/main.css', 'berrys_fonts', '1', 'all' );
}

// ENQUEUE SCRIPTS
wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/js/vendor/html5shiv.js', true );
wp_enqueue_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', 'html5shiv', '1.10.2', true );
wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/vendor/modernizr-2.6.2.min.js', array('jquery'), '1', true );
wp_enqueue_script( 'flexjs', get_template_directory_uri() . '/js/vendor/jquery.flexslider-min.js', array('jquery'), '1', true );
wp_enqueue_script( 'mainjs', get_template_directory_uri() . '/js/main.js', array('flexjs'), '1', true );
wp_enqueue_script( 'pluginsjs', get_template_directory_uri() . '/js/plugins.js', array('mainjs'), '1', true );

// CUSTOM CONTENT & META BOXES
if ($cpt){

// GALLERY ITEMS
$gellery = new cpt_Post_Type('gallery', array(
    'has_archive' => true,
    'supports' => array( 'title' )
));

$gellery->add_meta_box( 
	'Gallery Images', 
	array(
		array(
			'name' 			=> 'gallery_images',
			'description'	=> 'Select one or more images for this gallery',
			'type'			=> 'repeatwrap',
			'contents'		=> array(
				array(
					'name'		=> 'prod_image',
					'label'		=> 'Product Image',
					'type'		=> 'image'
				)
			)
		)
	)
);

$gellery->add_meta_box( 
	'Gallery Location', 
	array(
		array(
			'name' 			=> 'gallery_home',
			'label'			=> 'Homepage',
			'description'	=> 'Should this gallery appear on the homepage?',
			'type'			=> 'checkbox'
		),
		array(
			'name' 			=> 'gallery_archive',
			'label'			=> 'Gallery Page',
			'description'	=> 'Should this gallery appear on the gallery page?',
			'type'			=> 'checkbox'
		)
	),
	'side'
);

// PRODUCTS
$products = new cpt_Post_Type('product', array(
    'has_archive' => false,
    'supports' => array( 'title','editor' ),
    'taxonomies' => array('category', 'post_tag')
));

$products->add_meta_box( 
	'Product Info', 
	array(
		array(
			'name' 			=> 'prod_avail',
			'label' 		=> 'Availability',
			'description'	=> 'The date this product becomes available',
			'type'			=> 'text'
		),
		array(
			'name' 			=> 'prod_pack',
			'label' 		=> 'Size/Pack',
			'description'	=> 'Size or quantity of this product',
			'type'			=> 'text'
		),
		array(
			'name' 			=> 'prod_price',
			'label' 		=> 'Price',
			'type'			=> 'text'
		),
		array(
			'name' 			=> 'prod_habit',
			'label' 		=> 'Habit',
			'type'			=> 'textarea'
		),
		array(
			'name' 			=> 'prod_blooms',
			'label' 		=> 'Blooms',
			'type'			=> 'textarea'
		),
		array(
			'name' 			=> 'prod_height',
			'label' 		=> 'Height',
			'type'			=> 'textarea'
		),
		array(
			'name' 			=> 'prod_spacing',
			'label' 		=> 'Spacing',
			'type'			=> 'textarea'
		),
		array(
			'name' 			=> 'prod_zones',
			'label' 		=> 'Zones',
			'type'			=> 'textarea'
		),
		array(
			'name' 			=> 'prod_fertilize',
			'label' 		=> 'Fertilize',
			'type'			=> 'textarea'
		),
		array(
			'name' 			=> 'prod_water',
			'label' 		=> 'Water',
			'type'			=> 'textarea'
		),
		array(
			'name' 			=> 'prod_light',
			'label' 		=> 'Light',
			'type'			=> 'textarea'
		),
		array(
			'name' 			=> 'prod_features',
			'label' 		=> 'Features',
			'type'			=> 'textarea'
		),
		array(
			'name' 			=> 'prod_uses',
			'label' 		=> 'Uses',
			'type'			=> 'textarea'
		),
		array(
			'name' 			=> 'prod_care',
			'label' 		=> 'Care',
			'type'			=> 'textarea'
		),
		array(
			'type'			=> 'hr'
		),
		array(
			'name' 			=> 'prod_misc1',
			'label' 		=> 'Misc 1',
			'type'			=> 'text'
		),
		array(
			'name' 			=> 'prod_misctext1',
			'type'			=> 'textarea'
		),
		array(
			'type'			=> 'hr'
		),
		array(
			'name' 			=> 'prod_misc2',
			'label' 		=> 'Misc 2',
			'type'			=> 'text'
		),
		array(
			'name' 			=> 'prod_misctext2',
			'type'			=> 'textarea'
		),
		array(
			'type'			=> 'hr'
		),
		array(
			'name' 			=> 'prod_misc3',
			'label' 		=> 'Misc 3',
			'type'			=> 'text'
		),
		array(
			'name' 			=> 'prod_misctext3',
			'type'			=> 'textarea'
		),
		array(
			'type'			=> 'hr'
		),
		array(
			'name' 			=> 'prod_misc4',
			'label' 		=> 'Misc 4',
			'type'			=> 'text'
		),
		array(
			'name' 			=> 'prod_misctext4',
			'type'			=> 'textarea'
		),
		array(
			'type'			=> 'hr'
		),
		array(
			'name' 			=> 'prod_misc5',
			'label' 		=> 'Misc 5',
			'type'			=> 'text'
		),
		array(
			'name' 			=> 'prod_misctext5',
			'type'			=> 'textarea'
		),
		array(
			'type'			=> 'hr'
		),
		array(
			'name' 			=> 'prod_misc6',
			'label' 		=> 'Misc 6',
			'type'			=> 'text'
		),
		array(
			'name' 			=> 'prod_misctext6',
			'type'			=> 'textarea'
		),
		array(
			'type'			=> 'hr'
		),
		array(
			'name' 			=> 'prod_misc7',
			'label' 		=> 'Misc 7',
			'type'			=> 'text'
		),
		array(
			'name' 			=> 'prod_misctext7',
			'type'			=> 'textarea'
		),
		array(
			'type'			=> 'hr'
		),
		array(
			'name' 			=> 'prod_misc8',
			'label' 		=> 'Misc 8',
			'type'			=> 'text'
		),
		array(
			'name' 			=> 'prod_misctext8',
			'type'			=> 'textarea'
		),
		array(
			'type'			=> 'hr'
		),
		array(
			'name' 			=> 'prod_misc9',
			'label' 		=> 'Misc 9',
			'type'			=> 'text'
		),
		array(
			'name' 			=> 'prod_misctext9',
			'type'			=> 'textarea'
		),
		array(
			'type'			=> 'hr'
		),
		array(
			'name' 			=> 'prod_misc10',
			'label' 		=> 'Misc 10',
			'type'			=> 'text'
		),
		array(
			'name' 			=> 'prod_misctext10',
			'type'			=> 'textarea'
		),
	),
	'normal',
	'high'
);

$products->add_meta_box( 
	'Product Images', 
	array(
		array(
			'name' 			=> 'prod_images',
			'description'	=> 'Select one or more images of this product',
			'type'			=> 'repeatwrap',
			'contents'		=> array(
				array(
					'name'		=> 'prod_image',
					'label'		=> 'Product Image',
					'type'		=> 'image'
				)
			)
		)
	)
);

$products->add_taxonomy('Product Category');


// FEATURED STORIES
$stories = new cpt_Post_Type('story', array(
    'has_archive' => false,
    'supports' => array( 'title' )
));

$stories->add_meta_box( 
	'Story Info', 
	array(
		array(
			'name' 			=> 'story_caption',
			'label' 		=> 'Story Caption',
			'description'	=> 'Write a brief (150 character) caption describing this story.',
			'type'			=> 'textarea',
			'char_limit'	=> 150
		),
		array(
			'name' 			=> 'promo_cat',
			'label' 		=> 'Category',
			'description'	=> 'Select the product category to which this story applies. (Category takes precedence over Page)',
			'type'			=> 'cat_list',
			'cat'			=> 'product_category'
		),
		array(
			'name' 			=> 'promo_page',
			'label' 		=> 'Page',
			'description'	=> 'Select a Page to which this story applies.',
			'type'			=> 'post_list',
			'post_type'		=> 'page',
		),
		array(
			'name' 			=> 'story_link',
			'label' 		=> 'Link Text',
			'description'	=> 'Enter text for the link (ex. "View Seasonal Specials").',
			'type'			=> 'text'
		),
		array(
			'name' 			=> 'story_order',
			'label' 		=> 'Display Order',
			'description'	=> 'Enter a number by which this story should be ordered on the front page (eg. 1, 2, 3...).',
			'type'			=> 'text'
		)
	)
);

// SEASONS
$seasons = new cpt_Post_Type('season', array(
    'has_archive' => false,
    'supports' => array( 'title' )
));

$seasons->add_meta_box( 
	'Season Gallery', 
	array(
		array(
			'name' 			=> 'gallery',
			'description'	=> 'Add images to this season\'s gallery',
			'type'			=> 'repeatwrap',
			'contents'		=> array(
				array(
					'name'		=> 'image',
					'label'		=> 'Product Image',
					'type'		=> 'image'
				)
			)
		)
	)
);

// CATEGORIES
$categories = new cpt_Post_Type('category', array(
    'has_archive' => false,
    'supports' => array( 'title' )
));

$categories->add_meta_box( 
	'Select a Season',
	array(
		array(
			'name' 			=> 'gallery',
			'description'	=> 'To which season does this category apply?',
			'type'			=> 'post_list',
			'post_type'		=> 'season'
		)
	),
	'normal',
	'high'
);

};

// UPLOAD FILES

// PDF UPLOAD
function wp_pdf_attachment($post) {
 
    wp_nonce_field(plugin_basename(__FILE__), 'wp_pdf_attachment_nonce');
     
    $the_file = get_post_meta($post->ID,'wp_pdf_attachment',true);
    $file_name = explode('/',$the_file['url']);
    $file_name = $file_name[count($file_name) - 1];
    
    if( $the_file['url'] ){
	    
	    $html = '<p><b>File:</b> ' . $file_name . '</p>';
	    $html .= '<p class="description">Upload a new PDF here</p>';
	    $html .= '<input type="file" id="wp_pdf_attachment" name="wp_pdf_attachment" value="" size="25" />';

    } else {
	    
	    $html = '<p class="description">Upload your PDF here.</p>';
	    $html .= '<input type="file" id="wp_pdf_attachment" name="wp_pdf_attachment" value="" size="25" />';

    };
     
    echo $html;
 
} // end wp_pdf_attachment

// SAVE PDF
function save_pdf_meta_data($id) {
 
    /* --- security verification --- */
    if(!wp_verify_nonce($_POST['wp_pdf_attachment_nonce'], plugin_basename(__FILE__))) {
      return $id;
    } // end if
       
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
      return $id;
    } // end if
       
    if('page' == $_POST['post_type']) {
      if(!current_user_can('edit_page', $id)) {
        return $id;
      } // end if
    } else {
        if(!current_user_can('edit_page', $id)) {
            return $id;
        } // end if
    } // end if
    /* - end security verification - */
     
    // Make sure the file array isn't empty
    if(!empty($_FILES['wp_pdf_attachment']['name'])) {
         
        // Setup the array of supported file types. In this case, it's just PDF.
        $supported_types = array('application/pdf');
         
        // Get the file type of the upload
        $arr_file_type = wp_check_filetype(basename($_FILES['wp_pdf_attachment']['name']));
        $uploaded_type = $arr_file_type['type'];
         
        // Check if the type is supported. If not, throw an error.
        if(in_array($uploaded_type, $supported_types)) {
 
            // Use the WordPress API to upload the file
            $upload = wp_upload_bits($_FILES['wp_pdf_attachment']['name'], null, file_get_contents($_FILES['wp_pdf_attachment']['tmp_name']));
     
            if(isset($upload['error']) && $upload['error'] != 0) {
                wp_die('There was an error uploading your file. The error is: ' . $upload['error']);
            } else {
                add_post_meta($id, 'wp_pdf_attachment', $upload);
                update_post_meta($id, 'wp_pdf_attachment', $upload);     
            } // end if/else
 
        } else {
            wp_die("The file type that you've uploaded is not a PDF.");
        } // end if/else
         
    } // end if
     
} // end save_custom_meta_data
add_action('save_post', 'save_pdf_meta_data');

// CSV UPLOAD
function wp_csv_attachment($post) {
 
    wp_nonce_field(plugin_basename(__FILE__), 'wp_csv_attachment_nonce');
     
    $the_file = get_post_meta($post->ID,'wp_csv_attachment',true);
    $file_name = explode('/',$the_file['url']);
    $file_name = $file_name[count($file_name) - 1];
    
    if( $the_file['url'] ){
	    
	    $html = '<p><b>File:</b> ' . $file_name . '</p>';
	    $html .= '<p class="description">Upload a new CSV here</p>';
	    $html .= '<input type="file" id="wp_csv_attachment" name="wp_csv_attachment" value="" size="25" />';

    } else {
	    
	    $html = '<p class="description">Upload your CSV here.</p>';
	    $html .= '<input type="file" id="wp_csv_attachment" name="wp_csv_attachment" value="" size="25" />';

    };
     
    echo $html;
 
} // end wp_csv_attachment

// SAVE CSV
function save_csv_meta_data($id) {
 
    /* --- security verification --- */
    if(!wp_verify_nonce($_POST['wp_csv_attachment_nonce'], plugin_basename(__FILE__))) {
      return $id;
    } // end if
       
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
      return $id;
    } // end if
       
    if('page' == $_POST['post_type']) {
      if(!current_user_can('edit_page', $id)) {
        return $id;
      } // end if
    } else {
        if(!current_user_can('edit_page', $id)) {
            return $id;
        } // end if
    } // end if
    /* - end security verification - */
     
    // Make sure the file array isn't empty
    if(!empty($_FILES['wp_csv_attachment']['name'])) {
         
        // Setup the array of supported file types. In this case, it's just PDF.
        $supported_types = array('text/csv');
         
        // Get the file type of the upload
        $arr_file_type = wp_check_filetype(basename($_FILES['wp_csv_attachment']['name']));
        $uploaded_type = $arr_file_type['type'];
         
        // Check if the type is supported. If not, throw an error.
        if(in_array($uploaded_type, $supported_types)) {
 
            // Use the WordPress API to upload the file
            $upload = wp_upload_bits($_FILES['wp_csv_attachment']['name'], null, file_get_contents($_FILES['wp_csv_attachment']['tmp_name']));
     
            if(isset($upload['error']) && $upload['error'] != 0) {
                wp_die('There was an error uploading your file. The error is: ' . $upload['error']);
            } else {
                add_post_meta($id, 'wp_csv_attachment', $upload);
                update_post_meta($id, 'wp_csv_attachment', $upload);     
            } // end if/else
 
        } else {
            wp_die("The file type that you've uploaded is not a CSV.");
        } // end if/else
         
    } // end if
     
} // end save_custom_meta_data
add_action('save_post', 'save_csv_meta_data');

// MAKE FORMS ACCEPT FILE UPLOAD
function update_edit_form() {
    echo ' enctype="multipart/form-data"';
} // end update_edit_form
add_action('post_edit_form_tag', 'update_edit_form');

// SETUP META BOXES
function add_custom_meta_boxes() {
 
    // Define the custom attachment for posts
    add_meta_box(
        'wp_pdf_attachment',
        'Attach a PDF',
        'wp_pdf_attachment',
        'category',
        'normal',
        'high'
    );
     
    // Define the custom attachment for pages
    add_meta_box(
        'wp_csv_attachment',
        'Attach a CSV',
        'wp_csv_attachment',
        'category',
        'normal',
        'high'
    );
 
} // end add_custom_meta_boxes
add_action('add_meta_boxes', 'add_custom_meta_boxes');


