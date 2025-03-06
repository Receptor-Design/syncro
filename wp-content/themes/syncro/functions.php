<?php
/*
function move_specific_posts_to_new_post_type()
{
  // Arguments for the query to get all posts of old_post_type with specific taxonomy term
  $args = array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'post_status' => 'any',
    'tax_query' => array(
      array(
        'taxonomy' => 'category',
        'field' => 'slug',
        'terms' => array('blog', 'uncategorized'),
        'operator' => 'NOT IN',
      ),
    ),
  );
  // Custom query to get all posts
  $posts = get_posts($args);
  // Loop through each post and update the post type
  foreach ($posts as $post) {
    // Update the post type
    set_post_type($post->ID, 'resource');
  }
}
// Hook into 'init' to perform the action once WordPress is initialized
add_action('init', 'move_specific_posts_to_new_post_type');
*/


/** 
 * For more info: https://developer.wordpress.org/themes/basics/theme-functions/
 */
// Theme support options
require_once(get_template_directory() . '/functions/theme-support.php');
// WP Head and other cleanup functions
require_once(get_template_directory() . '/functions/cleanup.php');
// Register scripts and stylesheets
require_once(get_template_directory() . '/functions/enqueue-scripts.php');
// Register custom menus and menu walkers
require_once(get_template_directory() . '/functions/menu.php');
// Register sidebars/widget areas
require_once(get_template_directory() . '/functions/sidebar.php');
// Makes WordPress comments suck less
require_once(get_template_directory() . '/functions/comments.php');
// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory() . '/functions/page-navi.php');
// Adds support for multiple languages
require_once(get_template_directory() . '/functions/translation/translation.php');
// Remove Emoji Support
// require_once(get_template_directory().'/functions/disable-emoji.php'); 
// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/functions/related-posts.php'); 
// Use this as a template for custom post types
// require_once(get_template_directory().'/functions/custom-post-type.php');
// Customize the WordPress login menu
// require_once(get_template_directory().'/functions/login.php'); 
// Customize the WordPress admin
// require_once(get_template_directory().'/functions/admin.php'); 

//ADD OPTIONS PAGES
if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
    'page_title'   => 'Global Content',
    'menu_title'  => 'Global Content',
    'menu_slug'   => 'global-content-media',
    'capability'  => 'edit_posts',
    'redirect'    => false,
    'position'    => 2,
    'icon_url'    => 'dashicons-admin-site-alt3'
  ));
  acf_add_options_sub_page(array(
    'page_title'     => 'Shortcode List',
    'menu_title'    => 'Shortcode List',
    'parent_slug'    => 'global-content-media',
  ));


  acf_add_options_sub_page(array(
    'page_title'     => 'Blog Hub Options',
    'menu_title'    => 'Blog Hub Options',
    'parent_slug'    => 'edit.php',
  ));
  acf_add_options_sub_page(array(
    'page_title'     => 'Resource Hub Options',
    'menu_title'    => 'Resource Hub Options',
    'parent_slug'    => 'edit.php?post_type=resource',
  ));
  acf_add_options_sub_page(array(
    'page_title'     => 'Integrations Options',
    'menu_title'    => 'Integrations Options',
    'parent_slug'    => 'edit.php?post_type=integrations',
  ));
  acf_add_options_sub_page(array(
    'page_title'     => 'Media Release Settings',
    'menu_title'    => 'Media Release Settings',
    'parent_slug'    => 'edit.php?post_type=media_releases',
  ));
}

/* Register template redirect action callback */
add_action('template_redirect', 'remove_wp_archives');


/* Remove archives - removing specific archive pages */
function remove_wp_archives()
{
  //If we are on category or tag or date or author archive
  if (is_category() || is_tag() || is_date()) {
    global $wp_query;
    $wp_query->set_404(); //set to 404 not found page
  }
}








// Register Resource Category Taxonomy
function add_syncrotopic_taxonomy()
{
  $labels = array(
    'name'                       => _x('Topics', 'Taxonomy General Name', 'text_domain'),
    'singular_name'              => _x('Topic', 'Taxonomy Singular Name', 'text_domain'),
    'menu_name'                  => __('Topics', 'text_domain'),
    'all_items'                  => __('Topics', 'text_domain'),
    'parent_item'                => __('Parent Topic', 'text_domain'),
    'parent_item_colon'          => __('Parent Topic:', 'text_domain'),
    'new_item_name'              => __('New Topic Name', 'text_domain'),
    'add_new_item'               => __('Add New Topic', 'text_domain'),
    'edit_item'                  => __('Edit Topic', 'text_domain'),
    'update_item'                => __('Update Topic', 'text_domain'),
    'view_item'                  => __('View Topic', 'text_domain'),
    'separate_items_with_commas' => __('Separate items with commas', 'text_domain'),
    'add_or_remove_items'        => __('Add or remove items', 'text_domain'),
    'choose_from_most_used'      => __('Choose from the most used', 'text_domain'),
    'popular_items'              => __('Popular Topics', 'text_domain'),
    'search_items'               => __('Search Topics', 'text_domain'),
    'not_found'                  => __('Not Found', 'text_domain'),
    'no_terms'                   => __('No Topics', 'text_domain'),
    'items_list'                 => __('Topic list', 'text_domain'),
    'items_list_navigation'      => __('Topic list navigation', 'text_domain'),
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
    )
  );
  //What post types is this taxonomy for?
  register_taxonomy('syncrotopic', array('post'), $args);
}
add_action('init', 'add_syncrotopic_taxonomy', 1);





// Register Resource Category Taxonomy
function add_syncrotopic_resource_taxonomy()
{
  $labels = array(
    'name'                       => _x('Resource Topics', 'Taxonomy General Name', 'text_domain'),
    'singular_name'              => _x('Topic', 'Taxonomy Singular Name', 'text_domain'),
    'menu_name'                  => __('Resource Topics', 'text_domain'),
    'all_items'                  => __('Topics', 'text_domain'),
    'parent_item'                => __('Parent Topic', 'text_domain'),
    'parent_item_colon'          => __('Parent Topic:', 'text_domain'),
    'new_item_name'              => __('New Topic Name', 'text_domain'),
    'add_new_item'               => __('Add New Topic', 'text_domain'),
    'edit_item'                  => __('Edit Topic', 'text_domain'),
    'update_item'                => __('Update Topic', 'text_domain'),
    'view_item'                  => __('View Topic', 'text_domain'),
    'separate_items_with_commas' => __('Separate items with commas', 'text_domain'),
    'add_or_remove_items'        => __('Add or remove items', 'text_domain'),
    'choose_from_most_used'      => __('Choose from the most used', 'text_domain'),
    'popular_items'              => __('Popular Topics', 'text_domain'),
    'search_items'               => __('Search Topics', 'text_domain'),
    'not_found'                  => __('Not Found', 'text_domain'),
    'no_terms'                   => __('No Topics', 'text_domain'),
    'items_list'                 => __('Topic list', 'text_domain'),
    'items_list_navigation'      => __('Topic list navigation', 'text_domain'),
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
    )
  );
  //What post types is this taxonomy for?
  register_taxonomy('resource-syncrotopic', array('resource'), $args);
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
    'supports'              => array('title', 'editor', 'custom-fields', 'thumbnail', 'page-attributes', 'revisions'),
    //'taxonomies'            => array('category', 'post_tag'),
    'public'                => true,
    'hierarchical'          => true,
    'show_ui'               => true,
    'show_in_nav_menus'     => true,
    "show_in_rest"          => false,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,

    'has_archive'           => 'resources',
    'rewrite'            => array(
      'slug'       => 'resources',
      'with_front' => false,
    ),
  );
  register_post_type('resource', $args);
}
add_action('init', 'cptui_register_my_cpts_resource', 0);

function custom_resources_per_page($query)
{
  if (!is_admin() && $query->is_main_query() && is_post_type_archive('resource')) {
    $query->set('posts_per_page', 12); // Set the desired number of posts per page
  }
}
add_action('pre_get_posts', 'custom_resources_per_page');






// Register Resource Category Taxonomy
function resource_category_taxonomy()
{
  $labels = array(
    'name'                       => _x('Resource Categories', 'Taxonomy General Name', 'text_domain'),
    'singular_name'              => _x('Category', 'Taxonomy Singular Name', 'text_domain'),
    'menu_name'                  => __('Resource Categories', 'text_domain'),
    'all_items'                  => __('Categories', 'text_domain'),
    'parent_item'                => __('Parent Category', 'text_domain'),
    'parent_item_colon'          => __('Parent Category:', 'text_domain'),
    'new_item_name'              => __('New Category Name', 'text_domain'),
    'add_new_item'               => __('Add New Category', 'text_domain'),
    'edit_item'                  => __('Edit Category', 'text_domain'),
    'update_item'                => __('Update Category', 'text_domain'),
    'view_item'                  => __('View Category', 'text_domain'),
    'separate_items_with_commas' => __('Separate items with commas', 'text_domain'),
    'add_or_remove_items'        => __('Add or remove items', 'text_domain'),
    'choose_from_most_used'      => __('Choose from the most used', 'text_domain'),
    'popular_items'              => __('Popular Categories', 'text_domain'),
    'search_items'               => __('Search Categories', 'text_domain'),
    'not_found'                  => __('Not Found', 'text_domain'),
    'no_terms'                   => __('No Categories', 'text_domain'),
    'items_list'                 => __('Category list', 'text_domain'),
    'items_list_navigation'      => __('Category list navigation', 'text_domain'),
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
  register_taxonomy('resource-category', array('resource'), $args);
}
add_action('init', 'resource_category_taxonomy', 1);

// Register Resource Tag Taxonomy
function resource_tag_taxonomy()
{
  $labels = array(
    'name'                       => _x('Resource Tags', 'Taxonomy General Name', 'text_domain'),
    'singular_name'              => _x('Tag', 'Taxonomy Singular Name', 'text_domain'),
    'menu_name'                  => __('Resource Tags', 'text_domain'),
    'all_items'                  => __('Tags', 'text_domain'),
    'parent_item'                => __('Parent Tag', 'text_domain'),
    'parent_item_colon'          => __('Parent Tag:', 'text_domain'),
    'new_item_name'              => __('New Tag Name', 'text_domain'),
    'add_new_item'               => __('Add New Tag', 'text_domain'),
    'edit_item'                  => __('Edit Tag', 'text_domain'),
    'update_item'                => __('Update Tag', 'text_domain'),
    'view_item'                  => __('View Tag', 'text_domain'),
    'separate_items_with_commas' => __('Separate items with commas', 'text_domain'),
    'add_or_remove_items'        => __('Add or remove items', 'text_domain'),
    'choose_from_most_used'      => __('Choose from the most used', 'text_domain'),
    'popular_items'              => __('Popular Tags', 'text_domain'),
    'search_items'               => __('Search Tags', 'text_domain'),
    'not_found'                  => __('Not Found', 'text_domain'),
    'no_terms'                   => __('No Tags', 'text_domain'),
    'items_list'                 => __('Tag list', 'text_domain'),
    'items_list_navigation'      => __('Tag list navigation', 'text_domain'),
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
add_action('init', 'resource_tag_taxonomy', 1);





















//REGISTER INTEGRATIONS POST TYPE
function cpt_integrations()
{
  register_post_type(
    'integrations',
    array(
      'labels' => array(
        'name' => __('Integrations', 'jointswp'),
        'singular_name' => __('Integration', 'jointswp'),
        'all_items' => __('All Integrations', 'jointswp'),
        'add_new' => __('Add New', 'jointswp'),
        'add_new_item' => __('Add New Integration', 'jointswp'),
        'edit' => __('Edit', 'jointswp'),
        'edit_item' => __('Edit Integrations', 'jointswp'),
        'new_item' => __('New Integration', 'jointswp'),
        'view_item' => __('View Integration', 'jointswp'),
        'search_items' => __('Search Integration', 'jointswp'),
        'not_found' =>  __('Nothing found in the Database.', 'jointswp'),
        'not_found_in_trash' => __('Nothing found in Trash', 'jointswp'),
        'parent_item_colon' => ''
      ),
      'description' => __('This is the example custom post type', 'jointswp'), /* Custom Type Description */
      'public' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'show_ui' => true,
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
//INTEGRATION TYPES
register_taxonomy(
  'integration_types',
  array('integrations'),
  array(
    'hierarchical' => true,
    'labels' => array(
      'name' => __('Integration Types', 'jointswp'), /* name of the custom taxonomy */
      'singular_name' => __('Integration Type', 'jointswp'), /* single taxonomy name */
      'search_items' =>  __('Search Integration Types', 'jointswp'), /* search title for taxomony */
      'all_items' => __('All Integration Types', 'jointswp'), /* all title for taxonomies */
      'parent_item' => __('Parent Integration Type', 'jointswp'), /* parent title for taxonomy */
      'parent_item_colon' => __('Parent Integration Type:', 'jointswp'), /* parent taxonomy title */
      'edit_item' => __('Edit Integration Type', 'jointswp'), /* edit custom taxonomy title */
      'update_item' => __('Update Integration Type', 'jointswp'), /* update title for taxonomy */
      'add_new_item' => __('Add New Integration Type', 'jointswp'), /* add new title for taxonomy */
      'new_item_name' => __('New Integration Type Name', 'jointswp') /* name title for taxonomy */
    ),
    'show_admin_column' => true,
    'show_ui' => true,
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
      'name' => __('Integration Key', 'jointswp'), /* name of the custom taxonomy */
      'singular_name' => __('Integration Key Item', 'jointswp'), /* single taxonomy name */
      'search_items' =>  __('Search Integration Key Items', 'jointswp'), /* search title for taxomony */
      'all_items' => __('All Integration Key Items', 'jointswp'), /* all title for taxonomies */
      'parent_item' => __('Parent Integration Key Item', 'jointswp'), /* parent title for taxonomy */
      'parent_item_colon' => __('Parent Integration Key Item:', 'jointswp'), /* parent taxonomy title */
      'edit_item' => __('Edit Integration Key Item', 'jointswp'), /* edit custom taxonomy title */
      'update_item' => __('Update Integration Key Item', 'jointswp'), /* update title for taxonomy */
      'add_new_item' => __('Add New Integration Key Item', 'jointswp'), /* add new title for taxonomy */
      'new_item_name' => __('New Integration Key Item Name', 'jointswp') /* name title for taxonomy */
    ),
    'show_admin_column' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'integration-key'),
  )
);

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




// Add brand colors to the color picker in the WYSIWYG editor
function my_mce4_options($init)
{
  $custom_colours = '
    "2AD2C9", "Teal",
    "1A8480", "Dark Teal",
    "d6006e", "Magenta",		
			"3e0099", "Purple",
			"121d29", "Dark Blue",	
      
			"3f5465", "Dark Grey",	
			"d8e0e4", "Mid Grey",	
			"86a1bf", "Light Grey",	

      "000000", "Black",
			"ffffff", "White",		
	';
  // build colour grid default+custom colors
  $init['textcolor_map'] = '[' . $custom_colours . ']';
  // change the number of rows in the grid if the number of colors changes
  // 8 swatches per row
  $init['textcolor_rows'] = 2;
  return $init;
}
add_filter('tiny_mce_before_init', 'my_mce4_options');



//Excludes Hidden from search
add_filter('pre_get_posts', 'exclude_hidden_topics_from_search');
function exclude_hidden_topics_from_search($query)
{
  if ($query->is_search) {
    $tax_query = array([
      'taxonomy' => 'syncrotopic',
      'field' => 'term_id',
      'terms' => [114],
      'operator' => 'NOT IN',
    ]);
    $query->set('tax_query', $tax_query);
  }
  return $query;
}



//INCLUDES CUSTOM SHORTCODES FILE
include('custom-shortcodes.php');





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
  $taxonomy  = 'syncrotopic'; // change to your taxonomy
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
  $taxonomy  = 'syncrotopic'; // change to your taxonomy
  $q_vars    = &$query->query_vars;
  if ($pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0) {
    $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
    $q_vars[$taxonomy] = $term->slug;
  }
}




add_filter('wpseo_exclude_from_sitemap_by_post_ids', function ($excluded_posts_ids) {
  $args = array(
    'fields'         => 'ids',
    'post_type'      => 'post',
    'posts_per_page' => -1,

    'tax_query' => array(
      array(
        'taxonomy' => 'syncrotopic',
        'terms' => 'hidden',
        'field' => 'slug',
      )
    ),
  );

  return array_merge($excluded_posts_ids, get_posts($args));
});




function add_noindex_to_feeds()
{
  if (is_feed()) {
    echo '<meta name="robots" content="noindex, follow" />';
  }
}
add_action('wp_head', 'add_noindex_to_feeds');



/*************************************************************/
/*   Friendly Block Titles                                  */
/***********************************************************/

// function my_layout_title($title, $field, $layout, $i)
// {
//   if ($value = get_sub_field('layout_title')) {
//     return $value;
//   } else {
//     foreach ($layout['sub_fields'] as $sub) {
//       if ($sub['name'] == 'layout_title') {
//         $key = $sub['key'];
//         if (array_key_exists($i, $field['value']) && $value = $field['value'][$i][$key])
//           return $value;
//       }
//     }
//   }
//   return $title;
// }
// add_filter('acf/fields/flexible_content/layout_title', 'my_layout_title', 10, 4);




/* Conditional Logic to display field if an options page field is set */
//function hideannouncementbar($hideannouncementbar)
//{
//  if (get_field('announcement_bar_visibility', 'option') == 'custom') {
//    return $hideannouncementbar;
//  } else {
//    return;
//  }
//}
//add_filter('acf/prepare_field/key=field_63e66ce0d3a41', 'hideannouncementbar', 20);
//function showannounementbar($showannouncementbar)
//{
//  if (get_field('announcement_bar_visibility', 'option') == 'customshow') {
//    return $showannouncementbar;
//  } else {
//    return;
//  }
//}
//add_filter('acf/prepare_field/key=field_647f5656ee9f5', 'showannounementbar', 20);
