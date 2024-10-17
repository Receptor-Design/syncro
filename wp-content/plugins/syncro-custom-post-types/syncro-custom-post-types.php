<?php
/*
 * Plugin Name:       Syncro Custom Post Types
 * Description:       Registers custom post types and taxonomies for the Syncro MSP site.
 * Version:           1.0.0
 * Requires at least: 6.1
 * Requires PHP:      8.0
 * Author:            Colin Duwe
 * Author URI:        https://www.colinduwe.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       syncro
 * Domain Path:       /languages
 */
 
 // Register Resource Category Taxonomy
 function add_syncrotopic_taxonomy()
 {
   $labels = array(
	 'name'                       => _x('Post Topics', 'Taxonomy General Name', 'syncro'),
	 'singular_name'              => _x('Topic', 'Taxonomy Singular Name', 'syncro'),
	 'menu_name'                  => __('Topics', 'syncro'),
	 'all_items'                  => __('Topics', 'syncro'),
	 'parent_item'                => __('Parent Topic', 'syncro'),
	 'parent_item_colon'          => __('Parent Topic:', 'syncro'),
	 'new_item_name'              => __('New Topic Name', 'syncro'),
	 'add_new_item'               => __('Add New Topic', 'syncro'),
	 'edit_item'                  => __('Edit Topic', 'syncro'),
	 'update_item'                => __('Update Topic', 'syncro'),
	 'view_item'                  => __('View Topic', 'syncro'),
	 'separate_items_with_commas' => __('Separate items with commas', 'syncro'),
	 'add_or_remove_items'        => __('Add or remove items', 'syncro'),
	 'choose_from_most_used'      => __('Choose from the most used', 'syncro'),
	 'popular_items'              => __('Popular Topics', 'syncro'),
	 'search_items'               => __('Search Topics', 'syncro'),
	 'not_found'                  => __('Not Found', 'syncro'),
	 'no_terms'                   => __('No Topics', 'syncro'),
	 'items_list'                 => __('Topic list', 'syncro'),
	 'items_list_navigation'      => __('Topic list navigation', 'syncro'),
   );
   $args = array(
	 'labels'                     => $labels,
	 'hierarchical'               => true,
	 'public'                     => true,
	 'show_ui'                    => true,
	 'show_admin_column'          => true,
	 'show_in_nav_menus'          => true,
	 'query_var'                  => true,
	 'show_tagcloud'              => false,
	 'capabilities' => array(
	   'manage_terms' => 'manage_categories',  // Capabilities needed to manage terms
	   'edit_terms' => 'edit_categories',
	   'delete_terms' => 'delete_categories',
	   'assign_terms' => 'edit_posts',
	 ),
	 'rewrite' => array(
	   'slug' => 'topic', // This controls the base slug that will display before each term
	   'with_front' => false, // Don't display the category base before "/topic/"
	   'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
	 ),
	 'show_in_rest' => true
   );
   //What post types is this taxonomy for?
   register_taxonomy('syncrotopic', array('post'), $args);
 }
 //add_action('init', 'add_syncrotopic_taxonomy', 1);
 
 
 
 
 
 // Register Resource Category Taxonomy
 function add_syncrotopic_resource_taxonomy()
 {
   $labels = array(
	 'name'                       => _x('Topics', 'Taxonomy General Name', 'syncro'),
	 'singular_name'              => _x('Topic', 'Taxonomy Singular Name', 'syncro'),
	 'menu_name'                  => __('Topics', 'syncro'),
	 'all_items'                  => __('Topics', 'syncro'),
	 'parent_item'                => __('Parent Topic', 'syncro'),
	 'parent_item_colon'          => __('Parent Topic:', 'syncro'),
	 'new_item_name'              => __('New Topic Name', 'syncro'),
	 'add_new_item'               => __('Add New Topic', 'syncro'),
	 'edit_item'                  => __('Edit Topic', 'syncro'),
	 'update_item'                => __('Update Topic', 'syncro'),
	 'view_item'                  => __('View Topic', 'syncro'),
	 'separate_items_with_commas' => __('Separate items with commas', 'syncro'),
	 'add_or_remove_items'        => __('Add or remove items', 'syncro'),
	 'choose_from_most_used'      => __('Choose from the most used', 'syncro'),
	 'popular_items'              => __('Popular Topics', 'syncro'),
	 'search_items'               => __('Search Topics', 'syncro'),
	 'not_found'                  => __('Not Found', 'syncro'),
	 'no_terms'                   => __('No Topics', 'syncro'),
	 'items_list'                 => __('Topic list', 'syncro'),
	 'items_list_navigation'      => __('Topic list navigation', 'syncro'),
   );
   $args = array(
	 'labels'                     => $labels,
	 'hierarchical'               => true,
	 'public'                     => true,
	 'show_ui'                    => true,
	 'show_admin_column'          => true,
	 'show_in_nav_menus'          => true,
	 'query_var'                  => true,
	 'show_tagcloud'              => false,
	 'capabilities' => array(
	   'manage_terms' => 'manage_categories',  // Capabilities needed to manage terms
	   'edit_terms' => 'edit_categories',
	   'delete_terms' => 'delete_categories',
	   'assign_terms' => 'edit_posts',
	 ),
	 'rewrite' => array(
	   'slug' => 'rtopic', // This controls the base slug that will display before each term
	   'with_front' => false, // Don't display the category base before "/topic/"
	   'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
	 ),
	 'show_in_rest' => true
   );
   //What post types is this taxonomy for?
   register_taxonomy('resource-syncrotopic', array('post', 'resource'), $args);
 }
 add_action('init', 'add_syncrotopic_resource_taxonomy', 1);
 
 
 
 
 
 
 // Post Type: Resources 
 function cptui_register_my_cpts_resource()
 {
   $labels = array(
	 "name"                  => __('Resources', ''),
	 "singular_name"         => __('Resource', ''),
	 'menu_name'             => __('Resources', ''),
	 'name_admin_bar'        => __('Resources', ''),
	 'archives'              => __('Resource Archives', ''),
	 'attributes'            => __('Resource Attributes', ''),
	 'parent_item_colon'     => __('Resource:', ''),
	 'all_items'             => __('All Resources', ''),
	 'add_new_item'          => __('Add New Resource', ''),
	 'add_new'               => __('Add New', ''),
	 'new_item'              => __('New Resource', ''),
	 'edit_item'             => __('Edit Resource', ''),
	 'update_item'           => __('Update Resource', ''),
	 'view_item'             => __('View Resource', ''),
	 'view_items'            => __('View Resources', ''),
	 'search_items'          => __('Search Resources', ''),
	 'not_found'             => __('Not found', ''),
	 'not_found_in_trash'    => __('Not found in Trash', ''),
	 'featured_image'        => __('Featured Image', ''),
	 'set_featured_image'    => __('Set featured image', ''),
	 'remove_featured_image' => __('Remove featured image', ''),
	 'use_featured_image'    => __('Use as featured image', ''),
	 'insert_into_item'      => __('Insert into Resource', ''),
	 'uploaded_to_this_item' => __('Uploaded to this Resource', ''),
	 'items_list'            => __('Resource list', ''),
	 'items_list_navigation' => __('Resource list navigation', ''),
	 'filter_items_list'     => __('Filter Resource list', ''),
   );
   $args = array(
	 'label'                 => __('Resource', ''),
	 'description'           => __('Resource Post Type', ''),
	 'labels'                => $labels,
	 'menu_icon'             => 'dashicons-format-aside',
	 'capability_type'       => 'post',
	 'supports'              => array('title', 'editor', 'excerpt', 'custom-fields', 'thumbnail', 'page-attributes', 'revisions'),
	 //'taxonomies'            => array('category', 'post_tag'),
	 'public'                => true,
	 'hierarchical'          => true,
	 'show_ui'               => true,
	 'show_in_nav_menus'     => true,
	 "show_in_rest"          => true,
	 'exclude_from_search'   => false,
	 'publicly_queryable'    => true,
 
	 'has_archive'           => false,
	 'rewrite'            => array(
	   'slug'       => 'resources',
	   'with_front' => false,
	 ),
   );
   register_post_type('resource', $args);
 }
 add_action('init', 'cptui_register_my_cpts_resource', 0);
 
 // Register Resource Category Taxonomy
 function resource_category_taxonomy()
 {
   $labels = array(
	 'name'                       => _x('Resource Types', 'Taxonomy General Name', 'syncro'),
	 'singular_name'              => _x('Resource Type', 'Taxonomy Singular Name', 'syncro'),
	 'menu_name'                  => __('Resource Types', 'syncro'),
	 'all_items'                  => __('Types', 'syncro'),
	 'parent_item'                => __('Parent Category', 'syncro'),
	 'parent_item_colon'          => __('Parent Category:', 'syncro'),
	 'new_item_name'              => __('New Type Name', 'syncro'),
	 'add_new_item'               => __('Add New Type', 'syncro'),
	 'edit_item'                  => __('Edit Type', 'syncro'),
	 'update_item'                => __('Update type_url_form_audio()', 'syncro'),
	 'view_item'                  => __('View Type', 'syncro'),
	 'separate_items_with_commas' => __('Separate items with commas', 'syncro'),
	 'add_or_remove_items'        => __('Add or remove items', 'syncro'),
	 'choose_from_most_used'      => __('Choose from the most used', 'syncro'),
	 'popular_items'              => __('Popular Types', 'syncro'),
	 'search_items'               => __('Search Types', 'syncro'),
	 'not_found'                  => __('Not Found', 'syncro'),
	 'no_terms'                   => __('No Types', 'syncro'),
	 'items_list'                 => __('Resource Type list', 'syncro'),
	 'items_list_navigation'      => __('Resource Type list navigation', 'syncro'),
   );
   $args = array(
	 'labels'                     => $labels,
	 'hierarchical'               => true,
	 'public'                     => true,
	 'show_ui'                    => true,
	 'show_admin_column'          => true,
	 'show_in_nav_menus'          => true,
	 'query_var'                  => true,
	 'show_tagcloud'              => false,
	 'show_in_rest'				  => true,
   );
   //What post types is this taxonomy for?
   register_taxonomy('resource-category', array('post', 'resource'), $args);
 }
 add_action('init', 'resource_category_taxonomy', 1);
 
 // Register Resource Tag Taxonomy
 function resource_tag_taxonomy()
 {
   $labels = array(
	 'name'                       => _x('Resource Tags', 'Taxonomy General Name', 'syncro'),
	 'singular_name'              => _x('Tag', 'Taxonomy Singular Name', 'syncro'),
	 'menu_name'                  => __('Resource Tags', 'syncro'),
	 'all_items'                  => __('Tags', 'syncro'),
	 'parent_item'                => __('Parent Tag', 'syncro'),
	 'parent_item_colon'          => __('Parent Tag:', 'syncro'),
	 'new_item_name'              => __('New Tag Name', 'syncro'),
	 'add_new_item'               => __('Add New Tag', 'syncro'),
	 'edit_item'                  => __('Edit Tag', 'syncro'),
	 'update_item'                => __('Update Tag', 'syncro'),
	 'view_item'                  => __('View Tag', 'syncro'),
	 'separate_items_with_commas' => __('Separate items with commas', 'syncro'),
	 'add_or_remove_items'        => __('Add or remove items', 'syncro'),
	 'choose_from_most_used'      => __('Choose from the most used', 'syncro'),
	 'popular_items'              => __('Popular Tags', 'syncro'),
	 'search_items'               => __('Search Tags', 'syncro'),
	 'not_found'                  => __('Not Found', 'syncro'),
	 'no_terms'                   => __('No Tags', 'syncro'),
	 'items_list'                 => __('Tag list', 'syncro'),
	 'items_list_navigation'      => __('Tag list navigation', 'syncro'),
   );
   $args = array(
	 'labels'                     => $labels,
	 'hierarchical'               => true,
	 'public'                     => true,
	 'show_ui'                    => true,
	 'show_admin_column'          => true,
	 'show_in_nav_menus'          => true,
	 'query_var'                  => true,
	 'show_tagcloud'              => false,
   );
   //What post types is this taxonomy for?
   register_taxonomy('resource-tag', array('resource'), $args);
 }
// NOT REGISTERING THIS SINCE IT IS NOT CURRENTLY IN USE
// add_action('init', 'resource_tag_taxonomy', 1);

 //REGISTER INTEGRATIONS POST TYPE
 function cpt_integrations()
 {
   register_post_type(
	 'integrations',
	 array(
	   'labels' => array(
		 'name' => __('Integrations', 'syncro'),
		 'singular_name' => __('Integration', 'syncro'),
		 'all_items' => __('All Integrations', 'syncro'),
		 'add_new' => __('Add New', 'syncro'),
		 'add_new_item' => __('Add New Integration', 'syncro'),
		 'edit' => __('Edit', 'syncro'),
		 'edit_item' => __('Edit Integrations', 'syncro'),
		 'new_item' => __('New Integration', 'syncro'),
		 'view_item' => __('View Integration', 'syncro'),
		 'search_items' => __('Search Integration', 'syncro'),
		 'not_found' =>  __('Nothing found in the Database.', 'syncro'),
		 'not_found_in_trash' => __('Nothing found in Trash', 'syncro'),
		 'parent_item_colon' => ''
	   ),
	   'description' => __('This is the example custom post type', 'syncro'), /* Custom Type Description */
	   'public' => true,
	   'publicly_queryable' => true,
	   'exclude_from_search' => false,
	   'show_ui' => true,
	   'show_in_rest' => true,
	   'query_var' => true,
	   'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */
	   'menu_icon' => 'dashicons-book', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
	   'rewrite'  => array('slug' => 'integrations', 'with_front' => false), /* you can specify its url slug */
	   'has_archive' => 'integrations', /* you can rename the slug here */
	   'capability_type' => 'post',
	   'hierarchical' => false,
 
	   'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
	 )
   );
   //register_taxonomy_for_object_type('category', 'integrations');
   //register_taxonomy_for_object_type('post_tag', 'integrations');
 }
 add_action('init', 'cpt_integrations');
 
 //REGISTER INTEGRATIONS TAXONOMIES
function syncro_integrations_taxonomies() {
	//INTEGRATION TYPES
	register_taxonomy(
    	'integration_types',
		array('integrations'),
		array(
			'hierarchical' => true,
			'labels' => array(
			'name' => __('Integration Types', 'syncro'), /* name of the custom taxonomy */
			'singular_name' => __('Integration Type', 'syncro'), /* single taxonomy name */
			'search_items' =>  __('Search Integration Types', 'syncro'), /* search title for taxomony */
			'all_items' => __('All Integration Types', 'syncro'), /* all title for taxonomies */
			'parent_item' => __('Parent Integration Type', 'syncro'), /* parent title for taxonomy */
			'parent_item_colon' => __('Parent Integration Type:', 'syncro'), /* parent taxonomy title */
			'edit_item' => __('Edit Integration Type', 'syncro'), /* edit custom taxonomy title */
			'update_item' => __('Update Integration Type', 'syncro'), /* update title for taxonomy */
			'add_new_item' => __('Add New Integration Type', 'syncro'), /* add new title for taxonomy */
			'new_item_name' => __('New Integration Type Name', 'syncro') /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'show_in_rest' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'integration-types'),
		)
	);
	//INTEGRATION KEY
	register_taxonomy(
		'integration_key',
		array('integrations'),
		array(
			'hierarchical' => true,
			'labels' => array(
			'name' => __('Integration Key', 'syncro'), /* name of the custom taxonomy */
			'singular_name' => __('Integration Key Item', 'syncro'), /* single taxonomy name */
			'search_items' =>  __('Search Integration Key Items', 'syncro'), /* search title for taxomony */
			'all_items' => __('All Integration Key Items', 'syncro'), /* all title for taxonomies */
			'parent_item' => __('Parent Integration Key Item', 'syncro'), /* parent title for taxonomy */
			'parent_item_colon' => __('Parent Integration Key Item:', 'syncro'), /* parent taxonomy title */
			'edit_item' => __('Edit Integration Key Item', 'syncro'), /* edit custom taxonomy title */
			'update_item' => __('Update Integration Key Item', 'syncro'), /* update title for taxonomy */
			'add_new_item' => __('Add New Integration Key Item', 'syncro'), /* add new title for taxonomy */
			'new_item_name' => __('New Integration Key Item Name', 'syncro') /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'show_in_rest' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'integration-key'),
		)
	);
}
 
 add_action( 'init', 'syncro_integrations_taxonomies' );
 
 // Register Media Releases Post Type
 function cpt_media_releases()
 {
   $labels = array(
	 'name'                  => _x('Media Releases', 'Post Type General Name'),
	 'singular_name'         => _x('Media Release', 'Post Type Singular Name'),
	 'menu_name'             => __('Media Releases'),
	 'name_admin_bar'        => __('Media Releases'),
	 'archives'              => __('Media Release Archives'),
	 'attributes'            => __('Media Release Attributes'),
	 'parent_item_colon'     => __('Parent Media Release:'),
	 'all_items'             => __('All Media Releases'),
	 'add_new_item'          => __('Add New Media Releases'),
	 'add_new'               => __('Add New'),
	 'new_item'              => __('New Media Release'),
	 'edit_item'             => __('Edit Media Release'),
	 'update_item'           => __('Update Media Release'),
	 'view_item'             => __('View Media Release'),
	 'view_items'            => __('View Media Releases'),
	 'search_items'          => __('Search Media Releases'),
	 'not_found'             => __('Not found'),
	 'not_found_in_trash'    => __('Not found in Trash'),
	 'insert_into_item'      => __('Insert into Media Release'),
	 'uploaded_to_this_item' => __('Uploaded to this Media Release'),
	 'items_list'            => __('Media Release list'),
	 'items_list_navigation' => __('Media Release list navigation', 'deepfactor'),
	 'filter_items_list'     => __('Filter Media Release list'),
   );
   $args = array(
	 'label'                 => __('Media Releases'),
	 'description'           => __('Media Release Post Type'),
	 'rewrite'               => array(
	   'slug'                 => 'media-release',
	   'with_front'           => false,
	 ),
	 'labels'                => $labels,
	 'supports'              => array('title', 'editor', 'custom-fields', 'thumbnail', 'revisions', 'author'),
	 'taxonomies'            => array('topic', 'post_tag'),
	 'public'                => true,
	 'hierarchical'          => true,
	 'show_ui'               => true,
	 'show_in_nav_menus'     => true,
	 'menu_position'         => 4,
	 'has_archive'           => false,
	 'menu_icon'             => 'dashicons-format-aside',
	 'exclude_from_search'   => false,
	 'publicly_queryable'    => true,
	 'capability_type'       => 'post',
	 'posts_per_page'    => -1,
   );
   register_post_type('media_releases', $args);
 }
 add_action('init', 'cpt_media_releases', 0);
 

 /**
  * Display a custom taxonomy dropdown in admin
  * @author Mike Hemberger
  * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
  */
 add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy');
 function tsm_filter_post_type_by_taxonomy()
 {
   global $typenow;
   $post_type = 'post'; // change to your post type
   $taxonomy  = 'resource-syncrotopic'; // change to your taxonomy
   if ($typenow == $post_type) {
	 $selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
	 $info_taxonomy = get_taxonomy($taxonomy);
	 wp_dropdown_categories(array(
	   'show_option_all' => sprintf(__('Show all %s', 'textdomain'), $info_taxonomy->label),
	   'taxonomy'        => $taxonomy,
	   'name'            => $taxonomy,
	   'orderby'         => 'name',
	   'selected'        => $selected,
	   'show_count'      => true,
	   'hide_empty'      => true,
	 ));
   };
 }
 /**
  * Filter posts by taxonomy in admin
  * @author  Mike Hemberger
  * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
  */
 add_filter('parse_query', 'tsm_convert_id_to_term_in_query');
 function tsm_convert_id_to_term_in_query($query)
 {
   global $pagenow;
   $post_type = 'post'; // change to your post type
   $taxonomy  = 'resource-syncrotopic'; // change to your taxonomy
   $q_vars    = &$query->query_vars;
   if ($pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0) {
	 $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
	 $q_vars[$taxonomy] = $term->slug;
   }
 }
 
 
 
 

 
 
 

