<?php
/*
Plugin Name: Custom Post Type Plugin
License: GPL2
*/
?>
<?php
/*  Copyright YEAR  PLUGIN_AUTHOR_NAME  (email : PLUGIN AUTHOR EMAIL)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
?>
<?php

ob_start();

// enqueue scripts and styles, but only if is_admin
if(is_admin()) {
	wp_enqueue_style('jquery-ui-custom', 
		plugin_dir_url(__FILE__) . 'css/jquery-ui-custom.css'
	);
}

// Define
define( 'CPT_VERSION', '0.3.1' );
if( ! defined( 'JQUERY_UI_STYLE' ) ) define( 'JQUERY_UI_STYLE', 'cupertino' );

// Init
$cpt = new cpt();


/**
 * General class with main methods and helper methods
 *
 * @author Gijs Jorissen
 * @since 0.2
 *
 */
class cpt
{
	
	/**
	 * Contructs the cpt class
	 * Adds actions
	 *
	 * @author Gijs Jorissen
	 * @since 0.3
	 *
	 */
	function __construct()
	{
		add_action( 'admin_init', array( $this, 'register_styles' ) );
		add_action( 'admin_print_styles', array( $this, 'enqueue_styles' ) );
		
		add_action( 'admin_init', array( $this, 'register_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}
	
	
	/**
	 * Registers styles
	 *
	 * @author Gijs Jorissen
	 * @since 0.3
	 *
	 */
	function register_styles()
	{
		wp_register_style( 'cpt_css', 
			plugin_dir_url(__FILE__) . 'css/cp_style.css', 
			false, 
			CPT_VERSION, 
			'screen'
		);
		
// --REMOVE JQUERY UI CSS--
//		wp_register_style( 'jquery_ui_css', 
//			'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/' . JQUERY_UI_STYLE . '/jquery-ui.css', 
//			false, 
//			CPT_VERSION, 
//			'screen'
//		);
	}
	
	
	/**
	 * Enqueues styles
	 *
	 * @author Gijs Jorissen
	 * @since 0.3
	 *
	 */
	function enqueue_styles()
	{
		wp_enqueue_style( 'thickbox' );
		wp_enqueue_style( 'cpt_css' );
//		wp_enqueue_style( 'jquery_ui_css' );
	}
	
	
	/**
	 * Registers scripts
	 *
	 * @author Gijs Jorissen
	 * @since 0.3
	 *
	 */
	function register_scripts()
	{
		wp_register_script( 'cpt_js', 
			plugin_dir_url(__FILE__) . 'js/cp_functions.js', 
			array( 'admin-bar','hoverIntent','common','jquery-color','schedule','wp-ajax-response','autosave','wp-lists','quicktags','jquery-query','admin-comments','suggest','jquery-ui-core','jquery-ui-widget','jquery-ui-mouse','jquery-ui-sortable','postbox','post','thickbox','media-upload','jquery-ui-datepicker','word-count','editor','jquery-ui-resizable','jquery-ui-draggable','jquery-ui-button','jquery-ui-position','jquery-ui-dialog','wpdialogs','wplink','wpdialogs-popup','wp-fullscreen' ), 
			CPT_VERSION, 
			true 
		);
	}
	
	
	/**
	 * Enqueues scripts
	 *
	 * @author Gijs Jorissen
	 * @since 0.3
	 *
	 */
	function enqueue_scripts()
	{
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'jquery-ui-datepicker' );
		wp_enqueue_script( 'thickbox' );
		wp_enqueue_script( 'media-upload' );
		wp_enqueue_script( 'cpt_js' );
		wp_enqueue_script( 'admin-bar' );
		wp_enqueue_script( 'hoverIntent' );
		wp_enqueue_script( 'common' );
		wp_enqueue_script( 'jquery-color' );
		wp_enqueue_script( 'schedule' );
		wp_enqueue_script( 'wp-ajax-response' );
		wp_enqueue_script( 'autosave' );
		wp_enqueue_script( 'wp-lists' );
		wp_enqueue_script( 'quicktags' );
		wp_enqueue_script( 'jquery-query' );
		wp_enqueue_script( 'admin-comments' );
		wp_enqueue_script( 'suggest' );
		wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script( 'jquery-ui-widget' );
		wp_enqueue_script( 'jquery-ui-mouse' );
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'postbox' );
		wp_enqueue_script( 'post' );
		wp_enqueue_script( 'thickbox' );
		wp_enqueue_script( 'media-upload' );
		wp_enqueue_script( 'jquery-ui-datepicker' );
		wp_enqueue_script( 'word-count' );
		wp_enqueue_script( 'editor' );
		wp_enqueue_script( 'jquery-ui-resizable' );
		wp_enqueue_script( 'jquery-ui-draggable' );
		wp_enqueue_script( 'jquery-ui-button' );
		wp_enqueue_script( 'jquery-ui-position' );
		wp_enqueue_script( 'jquery-ui-dialog' );
		wp_enqueue_script( 'wpdialogs' );
		wp_enqueue_script( 'wplink' );
		wp_enqueue_script( 'wpdialogs-popup' );
		wp_enqueue_script( 'wp-fullscreen' );
		wp_enqueue_script( 'custom-js',plugin_dir_url(__FILE__) . 'js/custom-js.js' );
	}
	
	
	/**
	 * Beautifies a string. Capitalize words and remove underscores
	 *
	 * @param string $string
	 * @return string
	 *
	 * @author Gijs Jorissen
	 * @since 0.1
	 *
	 */
	public static function beautify( $string )
	{
		return ucwords( str_replace( '_', ' ', $string ) );
	}
	
	
	/**
	 * Uglifies a string. Remove underscores and lower strings
	 *
	 * @param string $string
	 * @return string
	 *
	 * @author Gijs Jorissen
	 * @since 0.1
	 *
	 */
	public static function uglify( $string )
	{
		return strtolower( preg_replace( '/[^A-z0-9]/', '_', $string ) );
	}
	
	
	/**
	 * Makes a word plural
	 *
	 * @param string $string
	 * @return string
	 *
	 * @author Gijs Jorissen
	 * @since 0.1
	 *
	 */
	public static function pluralize( $string )
	{
		$last = $string[strlen( $string ) - 1];
		
		if( $last == 'y' )
		{
			$cut = substr( $string, 0, -1 );
			//convert y to ies
			$plural = $cut . 'ies';
		}
		else
		{
			// just attach a s
			$plural = $string . 's';
		}
		
		return $plural;
	}	
}


/**
 * Post Type class used to register post types
 * Can call add_taxonomy and add_meta_box to call the associated classes
 * Method chaining is possible
 *
 * @author Gijs jorissen
 * @since 0.1
 *
 */
class cpt_Post_Type
{
	public $post_type_name;
	public $post_type_args;
	public $post_type_labels;
	
	
	/**
	 * Construct a new Custom Post Type
	 *
	 * @param string $name
	 * @param array $args
	 * @param array $labels
	 *
	 * @author Gijs Jorissen
	 * @since 0.1
	 *
	 */
	public function __construct( $name, $args = array(), $labels = array() )
	{
		if( ! empty( $name ) )
		{
			// Set some important variables
			$this->post_type_name		= cpt::uglify( $name );
			$this->post_type_args 		= $args;
			$this->post_type_labels 	= $labels;

			// Add action to register the post type, if the post type doesnt exist
			if( ! post_type_exists( $this->post_type_name ) )
			{
				add_action( 'init', array( &$this, 'register_post_type' ) );
			}
		}
	}
	
	
	/**
	 * Register the Post Type
	 *
	 * @author Gijs Jorissen
	 * @since 0.1
	 *
	 */
	public function register_post_type()
	{		
		// Capitilize the words and make it plural
		$name 		= cpt::beautify( $this->post_type_name );
		$plural 	= cpt::pluralize( $name );

		// We set the default labels based on the post type name and plural. 
		// We overwrite them with the given labels.
		$labels = array_merge(

			// Default
			array(
				'name' 					=> _x( $plural, 'post type general name' ),
				'singular_name' 		=> _x( $name, 'post type singular name' ),
				'add_new' 				=> _x( 'Add New', strtolower( $name ) ),
				'add_new_item' 			=> __( 'Add New ' . $name ),
				'edit_item' 			=> __( 'Edit ' . $name ),
				'new_item' 				=> __( 'New ' . $name ),
				'all_items' 			=> __( 'All ' . $plural ),
				'view_item' 			=> __( 'View ' . $name ),
				'search_items' 			=> __( 'Search ' . $plural ),
				'not_found' 			=> __( 'No ' . strtolower( $plural ) . ' found'),
				'not_found_in_trash' 	=> __( 'No ' . strtolower( $plural ) . ' found in Trash'), 
				'parent_item_colon' 	=> '',
				'menu_name' 			=> $plural
			),

			// Given labels
			$this->post_type_labels

		);

		// Same principle as the labels. We set some default and overwite them with the given arguments.
		$args = array_merge(

			// Default
			array(
				'label' 				=> $plural,
				'labels' 				=> $labels,
				'public' 				=> true,
				'show_ui' 				=> true,
				'supports' 				=> array( 'title', 'editor' ),
				'show_in_nav_menus' 	=> true,
				'_builtin' 				=> false,
			),

			// Given args
			$this->post_type_args

		);

		// Register the post type
		register_post_type( $this->post_type_name, $args );
	}
	
	
	/**
	 * Add a taxonomy to the Post Type
	 *
	 * @param string $name
	 * @param array $args
	 * @param array $labels
	 *
	 * @author Gijs Jorissen
	 * @since 0.1
	 *
	 */
	public function add_taxonomy( $name, $args = array(), $labels = array() )
	{
		// Call cpt_Taxonomy with this post type name as second parameter
		$taxonomy = new cpt_Taxonomy( $name, $this->post_type_name, $args, $labels );
		
		// For method chaining
		return $this;
	}
	
	
	/**
	 * Add post meta box to the Post Type
	 *
	 * @param string $title
	 * @param array $fields
	 * @param string $context
	 * @param string $priority
	 *
	 * @author Gijs Jorissen
	 * @since 0.1
	 *
	 */
	public function add_meta_box( $title, $fields = array(), $context = 'normal', $priority = 'default' )
	{
		$meta_box = new cpt_Meta_Box( $title, $fields, $this->post_type_name, $context, $priority );
		
		// For method chaining
		return $this;
	}	
}


/**
 * Creates custom taxonomies
 *
 *
 * @author Gijs Jorissen
 * @since 0.2
 *
 */
class cpt_Taxonomy
{
	var $taxonomy_name;
	var $taxonomy_labels;
	var $taxonomy_args;
	var $post_type_name;
	
	
	/**
	 * Constructs the class with important vars and method calls
	 * If the taxonomy exists, it will be attached to the post type
	 *
	 * @param string $name
	 * @param string $post_type_name
	 * @param array $args
	 * @param array $labels
	 *
	 * @author Gijs Jorissen
	 * @since 0.2
	 *
	 */
	public function __construct( $name, $post_type_name = null, $args = array(), $labels = array() )
	{
		if( ! empty( $name ) )
		{
			$this->post_type_name = $post_type_name;
			
			// Taxonomy properties
			$this->taxonomy_name		= cpt::uglify( $name );
			$this->taxonomy_labels		= $labels;
			$this->taxonomy_args		= $args;

			if( ! taxonomy_exists( $this->taxonomy_name ) )
			{
				add_action( 'init', array( &$this, 'register_taxonomy' ) );
			}
			else
			{
				add_action( 'init', array( &$this, 'register_taxonomy_for_object_type' ) );
			}
		}
	}
	
	
	/**
	 * Registers the custom taxonomy with the given arguments
	 *
	 * @author Gijs Jorissen
	 * @since 0.2
	 *
	 */
	public function register_taxonomy()
	{
		$name 		= cpt::beautify( $this->taxonomy_name );
		$plural 	= cpt::pluralize( $name );

		// Default labels, overwrite them with the given labels.
		$labels = array_merge(

			// Default
			array(
				'name' 					=> _x( $plural, 'taxonomy general name' ),
				'singular_name' 		=> _x( $name, 'taxonomy singular name' ),
			    'search_items' 			=> __( 'Search ' . $plural ),
			    'all_items' 			=> __( 'All ' . $plural ),
			    'parent_item' 			=> __( 'Parent ' . $name ),
			    'parent_item_colon' 	=> __( 'Parent ' . $name . ':' ),
			    'edit_item' 			=> __( 'Edit ' . $name ), 
			    'update_item' 			=> __( 'Update ' . $name ),
			    'add_new_item' 			=> __( 'Add New ' . $name ),
			    'new_item_name' 		=> __( 'New ' . $name . ' Name' ),
			    'menu_name' 			=> __( $name ),
			),

			// Given labels
			$this->taxonomy_labels

		);

		// Default arguments, overwitten with the given arguments
		$args = array_merge(

			// Default
			array(
				'label'					=> $plural,
				'labels'				=> $labels,
				"hierarchical" 			=> true,
				'public' 				=> true,
				'show_ui' 				=> true,
				'show_in_nav_menus' 	=> true,
				'_builtin' 				=> false,
			),

			// Given
			$this->taxonomy_args

		);
		
		register_taxonomy( $this->taxonomy_name, $this->post_type_name, $args );
	}
	
	
	/**
	 * Used to attach the existing taxonomy to the post type
	 *
	 * @author Gijs Jorissen
	 * @since 0.2
	 *
	 */
	public function register_taxonomy_for_object_type()
	{
		register_taxonomy_for_object_type( $tihs->taxonomy_name, $this->post_type_name );
	}	
}


/**
 * Registers the meta boxes
 *
 * @author Gijs Jorissen
 * @since 0.2
 *
 */
class cpt_Meta_Box
{
	var $box_id;
	var $box_title;
	var $box_context;
	var $box_priority;
	var $post_type_name;
	var $meta_fields;
	
	
	/**
	 * Constructs the meta box
	 *
	 * @param string $title
	 * @param array $fields
	 * @param string $post_type_name
	 * @param string $context
	 * @param string $priority
	 *
	 * @author Gijs Jorissen
	 * @since 0.2
	 *
	 */
	function __construct( $title, $fields = array(), $post_type_name = null, $context = 'normal', $priority = 'default' )
	{
		if( ! empty( $title ) )
		{
			$this->post_type_name 	= $post_type_name;
			
			// Meta variables	
			$this->box_id 			= cpt::uglify( $title );
			$this->box_title 		= cpt::beautify( $title );
			$this->box_context		= $context;
			$this->box_priority		= $priority;

			$this->meta_fields 	= $fields;

			add_action( 'admin_init', array( $this, 'add_meta_box' ) );
		}
		
		// Add multipart for files
		add_action( 'post_edit_form_tag', array( $this, 'post_edit_form_tag' ) );
		
		// Listen for the save post hook
		add_action( 'save_post', array( $this, 'save_post' ) );		
	}
	
	
	/**
	 * Method that calls the add_meta_box function
	 *
	 * @author Gijs Jorissen
	 * @since 0.2
	 *
	 */
	public function add_meta_box()
	{			
		add_meta_box(
			$this->box_id,
			$this->box_title,
			array( $this, 'callback' ),
			$this->post_type_name,
			$this->box_context,
			$this->box_priority
		);
	}
	
	
	/**
	 * Main callback function of add_meta_box
	 *
	 * @param object $post
	 * @param object $data
	 * @return mixed
	 *
	 * @author Gijs Jorissen
	 * @since 0.2
	 *
	 */
	public function callback( $post, $data )
	{
		// Nonce field for validation
		wp_nonce_field( plugin_basename( __FILE__ ), 'cpt_nonce' );

		// Get all inputs from $data
		$meta_fields = $this->meta_fields;
		
		// Check the array and loop through it
		if( ! empty( $meta_fields ) )
		{
			echo '<div class="cpt_helper">';
				echo '<table border="0" cellading="0" cellspacing="0" class="cpt_table cpt_helper_table">';
						
					/* Loop through $meta_fields */
					foreach( $meta_fields as $field )
					{
						$i=0;
						$field_id_name = '_' . cpt::uglify( $this->box_title ) . "_" . cpt::uglify( $field['name'] );
						$meta = get_post_meta( $post->ID, $field_id_name );
					
						echo '<tr class="cpt_block">';
							echo '<th class="cpt_th th">';
								echo '<label for="' . $field_id_name . '" class="cpt_label">' . $field['label'] . '</label>';
								echo '<div class="cpt_description description">' . $field['description'] . '</div>';
							echo '</th>';
							echo '<td class="cpt_td td">';
						
								$this->output_field( $field_id_name, $field, $meta, $i );
							
							echo '</td>';
						echo '</tr>';
					}
				
				echo '</table>';
			echo '</div>';
		}
	}
	
	
	/**
	 * Outputs a field based on its type
	 *
	 * @param string $field_id_name
	 * @param array $type
	 * @param array $meta
	 * @return mixed
	 *
	 * @author Gijs Jorissen
	 * @since 0.2
	 *
	 */
	function output_field( $field_id_name, $field, $meta, $number='', $i=0 )
	{
		switch( $field['type'] ) :
			
			case 'text' :
				echo '<input type="text" name="cpt[' . $field_id_name .']'.$number.'" class="custom_post_field custom_post_text_field" id="' . $field_id_name . $number . '" value="' . htmlspecialchars($meta[$i]) . '" />';

			break;
			
			case 'textarea' :
				if($field[char_limit]){$char_limit = ' maxlength="' . $field[char_limit] . '"'; } else {$char_limit='';};
				echo '<textarea name="cpt[' . $field_id_name .']'.$number.'" class="custom_post_field" id="' . $field_id_name . $number . '"' . $char_limit . '>' . htmlspecialchars($meta[$i]) . '</textarea>';
			break;
			
			case 'checkbox' :
				echo '<input type="checkbox" name="cpt[' . $field_id_name .']'.$number.'" class="custom_post_field" id="' . $field_id_name . $number . '" ' . checked( $meta[$i], 'on', false ) . ' />';
			break;
			
			case 'yesno' :
				echo '<input type="radio" name="cpt[' . $field_id_name .']'.$number.'" class="custom_post_field" id="' . $field_id_name . $number . '_yes" value="yes" ' . checked( $meta[0], 'yes', false ) . ' />';
				echo '<label for="' . $field_id_name . '_yes">' . __('Yes') . '</label>';
				
				echo '<input type="radio" name="cpt[' . $field_id_name . $number .']" class="custom_post_field" id="' . $field_id_name . $number . '_no" value="no" ' . checked( $meta[0], 'no', false ) . ' />';
				echo '<label for="' . $field_id_name . '_no">' . __('No') . '</label>';
			break;
			
			case 'leftright' :
				if ( $meta ) {
					echo '<input type="radio" name="cpt[' . $field_id_name .']'.$number.'" class="custom_post_field" id="' . $field_id_name . $number . '_left" value="left" ' . checked( $meta[0], 'left', false ) . ' />';
					echo '<label style="margin-right:10px;" for="' . $field_id_name . '_left">' . __('Left') . '</label>';
					
					echo '<input type="radio" name="cpt[' . $field_id_name .']'.$number.'" class="custom_post_field" id="' . $field_id_name . $number . '_right" value="right" ' . checked( $meta[0], 'right', false ) . ' />';
					echo '<label for="' . $field_id_name . '_right">' . __('Right') . '</label>';
				} else {
					echo '<input type="radio" name="cpt[' . $field_id_name .']'.$number.'" class="custom_post_field" id="' . $field_id_name . $number . '_left" value="left" checked="checked" />';
					echo '<label style="margin-right:10px;" for="' . $field_id_name . '_left">' . __('Left') . '</label>';
					
					echo '<input type="radio" name="cpt[' . $field_id_name .']'.$number.'" class="custom_post_field" id="' . $field_id_name . $number . '_right" value="right" />';
					echo '<label for="' . $field_id_name . '_right">' . __('Right') . '</label>';
				}
			break;
			
			case 'select' :
				echo '<select name="cpt[' . $field_id_name .']'.$number.'" class="custom_post_field" id="' . $field_id_name . $number . '">';
					foreach( $field['options'] as $slug => $name )
					{
						echo '<option value="' . cpt::uglify( $slug ) . '" ' . selected( cpt::uglify( $slug ), $meta[0], false ) . '>' . cpt::beautify( $name ) . '</option>';
					}
				echo '</select>';
			break;
			
			case 'checkboxes' :
				foreach( $field['options'] as $slug => $name )
				{
					echo '<input type="checkbox" name="cpt[' . $field_id_name . '][]" class="custom_post_field" id="' . $field_id_name . $number . '_' . cpt::uglify( $slug ) . '" value="' . cpt::uglify( $slug ) . '" ' . ( in_array( cpt::uglify( $slug ), maybe_unserialize( $meta[0] ) ) ? 'checked="checked"' : '' ) . ' /><label for="' . $field_id_name . '_' . cpt::uglify( $slug ) . '">' . cpt::beautify( $name ) . '</label>';
				}
			break;
			
			case 'radio' :
				foreach( $field['options'] as $slug => $name )
				{
					echo '<input type="radio" name="cpt[' . $field_id_name .']'.$number.'" class="custom_post_field" id="' . $field_id_name . $number . '_' . cpt::uglify( $slug ) . '" value="' . cpt::uglify( $slug ) . '" ' . checked( cpt::uglify( $slug ), $meta[0], false ) . ' /><label for="' . $field_id_name . '_' . cpt::uglify( $slug ) . '"> ' . cpt::beautify( $name ) . '</label><br />';
				}
			break;
			
			case 'wysiwyg' :
				wp_editor( $meta[0], $field_id_name, array_merge( 
					
					// Default
					array(
						'textarea_name' => 'cpt[' . $field_id_name . ']',
						'media_buttons' => false
					),
					
					// Given
					isset( $field['options'] ) ? $field['options'] : array()
				
				) );
			break;
			
			case 'image' :
				$image = plugin_dir_url(__FILE__) . '/img/image.png';	
				echo '<span class="custom_default_image" style="display:none">'.$image.'</span>';
				if ($meta[$i]) { $image = wp_get_attachment_image_src($meta[$i], 'medium');	$image = $image[0]; }				
				echo	'<input name="cpt[' . $field_id_name .']'.$number.'" type="hidden" class="custom_upload_image custom_post_field" id="' . $field_id_name . $number . '" value="'.$meta[$i].'" />
							<img src="'.$image.'" class="custom_preview_image" alt="" /><br />
								<input class="custom_upload_image_button button" type="button" value="Choose Image" />
								<small>&nbsp;<a href="#" class="custom_clear_image_button">Remove Image</a></small>
								<br clear="all" /><span class="description">'.$field['desc'].'</span>';
			break;
			
			case 'date' :
				echo '<input type="text" name="cpt[' . $field_id_name .']'.$number.'" id="' . $field_id_name . $number . '" class="cpt_datepicker datepicker custom_post_field" value="' . $meta[$i] . '" />';
			break;
			
			case 'repeatable':
				echo '<a class="repeatable-add button" href="#">+</a>
						<ul id="'.$field_id_name.'-repeatable" class="custom_repeatable">';
				$i = 0;
				if ($meta) {
					foreach($meta[0] as $row) {
						echo '<li><span class="sort handle">|||</span>
									<input type="text" name="cpt['.$field_id_name.']['.$i.']" class="custom_post_field" id="'.$field_id_name.$number.'" value="'.$row.'" size="30" />
									<a class="repeatable-remove button" href="#">-</a></li>';
						$i++;
					}
				} else {
					echo '<li><span class="sort handle">|||</span>
								<input type="text" name="cpt['.$field_id_name.']['.$i.']" class="custom_post_field" id="'.$field_id_name.$number.'" value="" size="30" />
								<a class="repeatable-remove button" href="#">-</a></li>';
				}
				echo '</ul>';
			break;

			case 'repeatwrap':

				echo '<a class="repeatable-add button" href="#">+ Add Panel</a>';

				global $post;
				$field_id = $field['contents'][0];
				$first = '_' . cpt::uglify( $this->box_title ) . '_' . $field['name'] . '_' . cpt::uglify( $field_id['name'] );
				$meta_first = get_post_meta( $post->ID, $first, true );
				$count = count($meta_first);
				$i=0;

				if ($meta_first) {

					echo '<ul id="'.$field_id_name.'-repeatable" class="custom_repeatable">';
				
					for($i = 0; $i < $count; $i++){
						
						echo '<li class="fieldset postbox"><h3 class=""><em></em></h3>';

						$parent = $field['name'];
						foreach( $field['contents'] as $subfield )
						{
		
							global $post;
							$number = '['.$i.']';
							$field_id_name = '_' . cpt::uglify( $this->box_title ) . '_' . $parent . '_' . cpt::uglify( $subfield['name'] );
							$get_field=$field_id_name.$number;
							$meta = get_post_meta( $post->ID, $field_id_name, true );
											
							echo '<div class="subfield pad">';
							echo '<label for="' . $field_id_name . '" class="cpt_label">' . $subfield['label'] . '</label>';
							echo '<div class="cpt_description description">' . $subfield['description'] . '</div>';
		
									$this->output_field( $field_id_name, $subfield, $meta, $number, $i );
																	
							echo '</div>';
							
						}

						echo '<div class="remove-wrap"><a class="repeatable-remove button" href="#">Remove</a></div></li>';

					}
					
					echo '</ul>';

				} else {

					echo '<ul id="'.$field_id_name.'-repeatable" class="custom_repeatable">
							<li class="fieldset postbox"><h3 class=""><em></em></h3>';

					$parent = $field['name'];
					foreach( $field['contents'] as $field )
					{
	
						global $post;
						$number = '['.$i.']';
						$field_id_name = '_' . cpt::uglify( $this->box_title ) . '_' . $parent . '_' . cpt::uglify( $field['name'] );
						$get_field=$field_id_name.$number;
						$meta = get_post_meta( $post->ID, $field_id_name, true );
										
						echo '<div class="subfield pad">';
						echo '<label for="' . $field_id_name . '" class="cpt_label">' . $field['label'] . '</label>';
						echo '<div class="cpt_description description">' . $field['description'] . '</div>';
	
								$this->output_field( $field_id_name, $field, $meta, $number );
						
						echo '</div>';
						
					}
					echo '<div class="remove-wrap"><a class="repeatable-remove button" href="#">Remove</a></div></li>';
					echo '</ul>';

				}

			break;

			case 'post_list':
			if(!$field['posts_per_page']) $posts_per_page = -1;
			$items = get_posts( array (
				'post_type'	=> $field['post_type'],
				'posts_per_page' => 200
			));			
				echo '<select name="cpt[' . $field_id_name .']'.$number.'" class="custom_post_field" id="'.$field_id_name.$number.'">
						<option value="">Select One</option>'; // Select One
					foreach($items as $item) {
						echo '<option value="'.$item->ID.'"',$meta[$i] == $item->ID ? ' selected="selected"' : '','>'.$item->post_type.': '.$item->post_title.'</option>';
					} // end foreach
				echo '</select><br /><span class="description">'.$field['desc'].'</span>';
			break;

			case 'cat_list':
			$cats = get_categories( array (
				'taxonomy'	=> $field['cat']
			));			
				echo '<select name="cpt[' . $field_id_name .']'.$number.'" class="custom_post_field" id="'.$field_id_name.$number.'">
						<option value="">Select One</option>'; // Select One
					foreach($cats as $cat) {
						echo '<option value="'.$cat->cat_ID.'"',$meta[$i] == $cat->cat_ID ? ' selected="selected"' : '','>'.$cat->name.'</option>';
					} // end foreach
				echo '</select><br /><span class="description">'.$field['desc'].'</span>';
			break;

			case 'hr':
				echo '<hr>';
			break;

			default:
				echo __( 'Input type not available' );
			break;
			
		endswitch;
	}
	
	
	/**
	 * Hooks into the save hook for the newly registered Post Type
	 *
	 * @author Gijs Jorissen
	 * @since 0.1
	 *
	 */
	public function save_post()
	{		
		// Deny the wordpress autosave function
		if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;

		if( $_POST && ! wp_verify_nonce( $_POST['cpt_nonce'], plugin_basename( __FILE__ ) ) ) return;
		if( ! isset( $_POST ) ) return;
		
		global $post;
		if( ! isset( $post->ID ) && get_post_type( $post->ID ) !== $this->post_type_name ) return;
		
		// Loop through each meta box
		if( ! empty( $this->meta_fields ) )
		{
			foreach( $this->meta_fields as $field )
			{
				$field_id_name = '_' . cpt::uglify( $this->box_title ) . "_" . cpt::uglify( $field['name'] );
							
				if( $field['type'] == 'image' )
				{					
					if( isset( $_FILES ) && ! empty( $_FILES['cpt']['tmp_name'][$field_id_name] ) )
					{
						$upload = wp_upload_bits( 
							$_FILES['cpt']['name'][$field_id_name], 
							null, 
							file_get_contents( $_FILES['cpt']['tmp_name'][$field_id_name] ) 
						);
						
						if( isset( $upload['error'] ) && $upload['error'] != 0 ) 
						{  
			                wp_die('There was an error uploading your file: ' . $upload['error']);  
			            } else {  
			                update_post_meta( $post->ID, $field_id_name, $upload['url']);
			            }
					}
				}
				else
				{
					$field_id_name = '_' . cpt::uglify( $this->box_title ) . "_" . cpt::uglify( $field['name'] );				
					update_post_meta( $post->ID, $field_id_name, $_POST['cpt'][$field_id_name] );
				}
				foreach ($_POST['cpt'] as $key => $value){
					update_post_meta($post->ID, $key, $value);
				}
			}			
		}		
	}
	
	
	/**
	 * Adds multipart support to the post form
	 *
	 * @return mixed
	 *
	 * @author Gijs Jorissen
	 * @since 0.2
	 *
	 */
	function post_edit_form_tag()
	{
		echo ' enctype="multipart/form-data"';
	}
}

function custom_loop($id){
		
	$custom_meta_values = get_post_custom($id);
	
	global $custom_meta_array;
	global $count;
	
	$custom_meta_array = array();
	
	foreach($custom_meta_values as $key=>$meta){
		
		$values = get_post_meta( $id, $key, true);
		if ( count($values) > 1 ){
			$count = count($values);
			$meta_array['count'] = $count;
			for ( $i=0; $i<$count; $i++ ) {
				$value = $values[$i];
				$custom_meta_array[$key][] = $value;
			}
		} else {
			$custom_meta_array[$key][] = $values;
		}
	
	};
}

?>