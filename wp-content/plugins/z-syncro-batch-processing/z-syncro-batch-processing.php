<?php
/*
 * Plugin Name:       Syncro Batch Processing
 * Description:       Registers batches of data for processing. 
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

if( class_exists( 'WP_Batch' ) ){ 
	 /**
	  * Class Syncro_Post_Resource_Type_Batch
	  */
	 class Syncro_Post_Resource_Type_Batch extends WP_Batch {
 
		 /**
		  * Unique identifier of each batch
		  * @var string
		  */
		 public $id = 'post_resource_type';
 
		 /**
		  * Describe the batch
		  * @var string
		  */
		 public $title = 'Set the resource type term for each Post to Blog';
 
		 /**
		  * To setup the batch data use the push() method to add WP_Batch_Item instances to the queue.
		  *
		  * Note: If the operation of obtaining data is expensive, cache it to avoid slowdowns.
		  *
		  * @return void
		  */
		 public function setup() {
 
			$posts = get_posts( array( 'numberposts' => -1, 'post_status' => 'any' ) );
 
			 foreach ( $posts as $post ) {
				 $this->push( new WP_Batch_Item( $post->ID, array( 'post_id' => $post->ID ) ) );
			 }
		 }
 
		 /**
		  * Handles processing of batch item. One at a time.
		  *
		  * In order to work it correctly you must return values as follows:
		  *
		  * - TRUE - If the item was processed successfully.
		  * - WP_Error instance - If there was an error. Add message to display it in the admin area.
		  *
		  * @param WP_Batch_Item $item
		  *
		  * @return bool|\WP_Error
		  */
		 public function process( $item ) {
 
			 // Retrieve the custom data
			 $post_id = $item->get_value( 'post_id' );
			 $result = wp_set_post_terms( $post_id, '147', 'resource-category' );
 
			 // Return WP_Error if the item processing failed (In our case we simply skip author with user id 5)
			 if ( is_wp_error( $result ) ) {
				 return $result;
			 }
 
			 // Do the expensive processing here.
			 // ...
 
			 // Return true if the item processing is successful.
			 return true;
		 }
		 
		 /**
		  * Called when specific process is finished (all items were processed).
		  * This method can be overriden in the process class.
		  * @return void
		  */
		 public function finish() {
			 // Do something after process is finished.
			 // You have $this->items, etc.
		 }
	 }

	  /**
	  * Class Syncro_Post_Resource_Type_Batch
	  */
	  class Syncro_Post_Resource_Topic_Batch extends WP_Batch {
 
		/**
		 * Unique identifier of each batch
		 * @var string
		 */
		public $id = 'post_resource_topic';

		/**
		 * Describe the batch
		 * @var string
		 */
		public $title = 'Migrate Post topics to the Resource Topic Taxonomy';

		/**
		 * To setup the batch data use the push() method to add WP_Batch_Item instances to the queue.
		 *
		 * Note: If the operation of obtaining data is expensive, cache it to avoid slowdowns.
		 *
		 * @return void
		 */
		public function setup() {

			$posts = get_posts( array( 'numberposts' => -1, 'post_status' => 'any' ) );

			foreach ( $posts as $post ) {
				$this->push( new WP_Batch_Item( $post->ID, array( 'post_id' => $post->ID ) ) );
			}
		}

		/**
		 * Handles processing of batch item. One at a time.
		 *
		 * In order to work it correctly you must return values as follows:
		 *
		 * - TRUE - If the item was processed successfully.
		 * - WP_Error instance - If there was an error. Add message to display it in the admin area.
		 *
		 * @param WP_Batch_Item $item
		 *
		 * @return bool|\WP_Error
		 */
		public function process( $item ) {

			// Retrieve the custom data
			$post_id = $item->get_value( 'post_id' );
			$post_topics = wp_get_post_terms( $post_id, 'syncrotopic' );
			if ( is_wp_error( $post_topics ) ) {
				return $post_topics;
			}
			foreach( $post_topics as $post_topic ){
				$resource_topic_id = term_exists( $post_topic->name, 'resource-syncrotopic' );
				if( ! $resource_topic_id ){
					$resource_topic_new = wp_insert_term( $post_topic->name, 'resource-syncrotopic' );
					$resource_topic_id = $resource_topic_new['term_id'];
				}
				$result = wp_set_post_terms( $post_id, $resource_topic_id, 'resource-syncrotopic', true );
			}

			// Return WP_Error if the item processing failed (In our case we simply skip author with user id 5)
			if ( is_wp_error( $result ) ) {
				return $result;
			}

			// Do the expensive processing here.
			// ...

			// Return true if the item processing is successful.
			return true;
		}
		
		/**
		 * Called when specific process is finished (all items were processed).
		 * This method can be overriden in the process class.
		 * @return void
		 */
		public function finish() {
			// Do something after process is finished.
			// You have $this->items, etc.
		}
	}

	/**
	 * Class Sets a meta field for any post that has the term hidden.
	*/
	class Syncro_Hide_Hidden extends WP_Batch {
 
		/**
		 * Unique identifier of each batch
		 * @var string
		 */
		public $id = 'hide_hidden';

		/**
		 * Describe the batch
		 * @var string
		 */
		public $title = 'Migrate the hidden term to a meta field';

		/**
		 * To setup the batch data use the push() method to add WP_Batch_Item instances to the queue.
		 *
		 * Note: If the operation of obtaining data is expensive, cache it to avoid slowdowns.
		 *
		 * @return void
		 */
		public function setup() {

			$posts = get_posts( array( 'post_type' => 'resource', 'numberposts' => -1, 'post_status' => 'any' ) );

			foreach ( $posts as $post ) {
				$this->push( new WP_Batch_Item( $post->ID, array( 'post_id' => $post->ID ) ) );
			}
		}

		/**
		 * Handles processing of batch item. One at a time.
		 *
		 * In order to work it correctly you must return values as follows:
		 *
		 * - TRUE - If the item was processed successfully.
		 * - WP_Error instance - If there was an error. Add message to display it in the admin area.
		 *
		 * @param WP_Batch_Item $item
		 *
		 * @return bool|\WP_Error
		 */
		public function process( $item ) {

			// Retrieve the custom data
			$post_id = $item->get_value( 'post_id' );
			$has_hidden_term = has_term( 'hidden', 'resource-syncrotopic', $post_id );
			$result = true;
			if( $has_hidden_term ){
				$result = update_field( 'hidden', true, $post_id );
			}

			if( ! $result ){
				return new WP_Error( 'Update Field Error', 'Updating the hidden field failed.' );
			}
		

			// Return true if the item processing is successful.
			return true;
		}
		
		/**
		 * Called when specific process is finished (all items were processed).
		 * This method can be overriden in the process class.
		 * @return void
		 */
		public function finish() {
			// Do something after process is finished.
			// You have $this->items, etc.
		}
	}

	/**
	 * Class Syncro_Post_Resource_Type_Batch
	*/
	class Syncro_Post_Content_Migration_Batch extends WP_Batch {

	/**
	 * Unique identifier of each batch
	 * @var string
	 */
	public $id = 'post_migration_batch';

	/**
	 * Describe the batch
	 * @var string
	 */
	public $title = 'Migrate Post custom fields into content and excerpt';

	/**
	 * To setup the batch data use the push() method to add WP_Batch_Item instances to the queue.
	 *
	 * Note: If the operation of obtaining data is expensive, cache it to avoid slowdowns.
	 *
	 * @return void
	 */
	public function setup() {

		//$posts = get_posts( array( 'numberposts' => -1, 'post_status' => 'any' ) );
		$posts = get_posts( array( 'include' => [ 22760, 21994, 815, 23919, 23917 ], 'numberposts' => 1 ) );

		foreach ( $posts as $post ) {
			$this->push( new WP_Batch_Item( $post->ID, array( 'post_id' => $post->ID ) ) );
		}
	}

		/**
		 * Handles processing of batch item. One at a time.
		 *
		 * In order to work it correctly you must return values as follows:
		 *
		 * - TRUE - If the item was processed successfully.
		 * - WP_Error instance - If there was an error. Add message to display it in the admin area.
		 *
		 * @param WP_Batch_Item $item
		 *
		 * @return bool|\WP_Error
		 */
		public function process( $item ) {

			// Retrieve the custom data
			$post_id = $item->get_value( 'post_id' );
			// Move the custom field excerpt into the post excerpt.
			$cf_excerpt = get_field( 'post_excerpt', $post_id, false, false );
			if( $cf_excerpt ){
				$excerpt_result = wp_update_post( array( 'ID' => $post_id, 'post_excerpt' => $cf_excerpt ) );
				if( is_wp_error( $excerpt_result ) ){
					return $excerpt_result;
				}
			}

			// Retrieve the content
			$post_content = get_the_content( null, false, $post_id );
			
			// Add IDs to headings
			$p = new WP_HTML_Tag_Processor( $post_content );
			while( $p->next_tag() ){
				if( 'H1' === $p->get_tag() || 'H2' === $p->get_tag() || 'H3' === $p->get_tag() ){
					$p->set_attribute( 'id', wp_unique_id( 'h-') );
					$p->add_class( 'wp-block-heading' );
				}
			}
			$post_content = $p->get_updated_html();
			
			if ( have_rows( 'extended_blog_content', $post_id ) ) :
				while( have_rows( 'extended_blog_content', $post_id ) ): the_row();
					if( get_row_layout() == 'continued_blog_content' || get_row_layout() == 'content_section' ){
						$blog_content = get_sub_field( 'blog_content' );
						$p = new WP_HTML_Tag_Processor( $blog_content );
						while( $p->next_tag() ){
							if( 'H1' === $p->get_tag() || 'H2' === $p->get_tag() || 'H3' === $p->get_tag() ){
								$p->set_attribute( 'id', wp_unique_id( 'h-') );
								$p->add_class( 'wp-block-heading' );
							}
						}
						$post_content .= $p->get_updated_html();
						
					} elseif( get_row_layout() == 'cta_section' ){
						$cta = '<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"border":{"radius":"24px"},"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"backgroundColor":"cream-4","textColor":"base","layout":{"type":"constrained"}} -->
						<div class="wp-block-group has-base-color has-cream-4-background-color has-text-color has-background has-link-color" style="border-radius:24px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:columns {"verticalAlignment":"center"} -->
						<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
						<div class="wp-block-column is-vertically-aligned-center"><!-- wp:separator {"className":"is-style-narrow"} -->
						<hr class="wp-block-separator has-alpha-channel-opacity is-style-narrow"/>
						<!-- /wp:separator -->
						
						<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"fontSize":"heading-2"} -->
<h3 class="wp-block-heading has-heading-2-font-size" id="' . wp_unique_id( 'h-') . '" style="margin-top:var(--wp--preset--spacing--30)">' . esc_html( get_sub_field( 'cta_headline' ) ) . '</h2>
						<!-- /wp:heading -->
						
						<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
						<p style="margin-top:var(--wp--preset--spacing--30)">' . strip_tags( get_sub_field( 'cta_body', false, false ) ) . '</p>
						<!-- /wp:paragraph -->
						
						<!-- wp:buttons -->
						<div class="wp-block-buttons">';

						if( have_rows( 'cta_buttons' ) ):
							while( have_rows( 'cta_buttons' ) ): the_row();
								$link = get_sub_field( 'cta_button' );
								if( $link ): 
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';
																	
									$cta .= '<!-- wp:button {"backgroundColor":"support-2","className":"is-style-arrow-large"} --><div class="wp-block-button is-style-arrow-large">';
									$cta .= '<a href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '" class="wp-block-button__link has-support-2-background-color has-background wp-element-button">' . esc_html( $link_title ) . '</a>';
									$cta .= '</div><!-- /wp:button -->';

								endif;
							endwhile;
						endif;
						
						$cta .= '</div>
						<!-- /wp:buttons --></div>
						<!-- /wp:column -->
						
						<!-- wp:column {"verticalAlignment":"center"} -->
						<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":27867,"sizeSlug":"full","linkDestination":"none","align":"center","className":"is-style-rounded"} -->
						<figure class="wp-block-image aligncenter size-full is-style-rounded"><img src="/wp-content/uploads/2024/10/ricklowedesign_Surrealism_style_painting_very_simple_forms_chan_9d80bad7-278f-4980-bcdd-707db9f734f7-1.png" alt="" class="wp-image-27867"/></figure>
						<!-- /wp:image --></div>
						<!-- /wp:column --></div>
						<!-- /wp:columns --></div>
						<!-- /wp:group -->';

						$post_content .= $cta;
					} 
				endwhile;
			endif;

			$result = wp_update_post( array( 'ID' => $post_id, 'post_content' => $post_content ) );

			//$result = new WP_Error( 'notice', '<div id="post-content-to-examine">' . $post_content . '</div>');

			// Return WP_Error if the item processing failed (In our case we simply skip author with user id 5)
			if ( is_wp_error( $result ) ) {
				return $result;
			}

			return new WP_Error( 'notice', 'Post ' . $post_id . ' was successfully updated' );

			// Do the expensive processing here.
			// ...

			// Return true if the item processing is successful.
			return true;
		}
		
		/**
		 * Called when specific process is finished (all items were processed).
		 * This method can be overriden in the process class.
		 * @return void
		 */
		public function finish() {
			// Do something after process is finished.
			// You have $this->items, etc.
		}
	}

	/**
	 * Class Syncro_Post_Migrate_Into_Pattern
	*/
	class Syncro_Post_Migrate_Into_Pattern extends WP_Batch {

		/**
		 * Unique identifier of each batch
		 * @var string
		 */
		public $id = 'syncro_post_migrate_into_pattern';
	
		/**
		 * Describe the batch
		 * @var string
		 */
		public $title = 'Migrate Post Content Into the Pattern';
	
		/**
		 * To setup the batch data use the push() method to add WP_Batch_Item instances to the queue.
		 *
		 * Note: If the operation of obtaining data is expensive, cache it to avoid slowdowns.
		 *
		 * @return void
		 */
		public function setup() {
	
			$posts = get_posts( array( 'numberposts' => -1, 'post_status' => 'any' ) );
			//$posts = get_posts( array( 'include' => [ 4020, 23016, 24210 ], 'numberposts' => 3 ) );
	
			foreach ( $posts as $post ) {
				$this->push( new WP_Batch_Item( $post->ID, array( 'post_id' => $post->ID ) ) );
			}
		}
	
			/**
			 * Handles processing of batch item. One at a time.
			 *
			 * In order to work it correctly you must return values as follows:
			 *
			 * - TRUE - If the item was processed successfully.
			 * - WP_Error instance - If there was an error. Add message to display it in the admin area.
			 *
			 * @param WP_Batch_Item $item
			 *
			 * @return bool|\WP_Error
			 */
			public function process( $item ) {
	
				// Retrieve the custom data
				$post_id = $item->get_value( 'post_id' );
	
				// Retrieve the content
				$post_content = get_the_content( null, false, $post_id );

				if( ! strlen( $post_content ) ){
					return new WP_Error( 'notice', 'Post not migrated because it has no content ' . $post_id );
				}
				if( str_starts_with( $post_content, '<!-- wp:columns -->' ) ){
					return new WP_Error( 'notice', 'Post not migrated because it begins with a column' . $post_id );
				}

	
				$pattern = '<!-- wp:columns -->
	<div class="wp-block-columns"><!-- wp:column {"width":"400px"} -->
	<div class="wp-block-column" style="flex-basis:400px"><!-- wp:group {"className":"sticky-scroll","style":{"position":{"type":"sticky","top":"0px"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group sticky-scroll"><!-- wp:yoast-seo/table-of-contents {"maxHeadingLevel":2} -->
	<div class="wp-block-yoast-seo-table-of-contents yoast-table-of-contents"><h2>Table of contents</h2></div>
	<!-- /wp:yoast-seo/table-of-contents --></div>
	<!-- /wp:group --></div>
	<!-- /wp:column -->
	
	<!-- wp:column {"width":"66.66%"} -->
	<div class="wp-block-column" style="flex-basis:66.66%">';
	
	$pattern .= $post_content;
	
	$pattern .= '<!-- wp:group {"metadata":{"name":"About The Author"},"className":"group-about-the-author","layout":{"type":"constrained"}} -->
	<div class="wp-block-group group-about-the-author"><!-- wp:separator -->
	<hr class="wp-block-separator has-alpha-channel-opacity"/>
	<!-- /wp:separator -->
	
	<!-- wp:columns -->
	<div class="wp-block-columns"><!-- wp:column {"width":"124px"} -->
	<div class="wp-block-column" style="flex-basis:124px"><!-- wp:syncro-blocks/author-headshot {"name":"syncro-blocks/author-headshot","mode":"preview"} /--></div>
	<!-- /wp:column -->
	
	<!-- wp:column {"width":"66.66%"} -->
	<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"fontSize":"meta-data-labels","layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group has-meta-data-labels-font-size"><!-- wp:paragraph -->
	<p>By</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:post-author-name {"isLink":true} /--></div>
	<!-- /wp:group -->
	
	<!-- wp:post-author-biography {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}},"elements":{"link":{"color":{"text":"var:preset|color|foreground-100"}}}},"textColor":"foreground-100","fontSize":"small"} /--></div>
	<!-- /wp:column --></div>
	<!-- /wp:columns -->
	
	<!-- wp:separator -->
	<hr class="wp-block-separator has-alpha-channel-opacity"/>
	<!-- /wp:separator --></div>
	<!-- /wp:group -->
	
	<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground-50"}}}},"textColor":"foreground-50","fontSize":"x-small"} -->
	<p class="has-foreground-50-color has-text-color has-link-color has-x-small-font-size">Share</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:outermost/social-sharing {"iconColor":"syncro-black","iconColorValue":"#1d1d1c","iconBackgroundColor":"base","iconBackgroundColorValue":"#fffcf8","style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
	<ul class="wp-block-outermost-social-sharing has-icon-color has-icon-background-color" style="margin-top:var(--wp--preset--spacing--30)"><!-- wp:outermost/social-sharing-link {"service":"facebook","style":{"border":{"width":"1px"}},"borderColor":"syncro-black"} /-->
	
	<!-- wp:outermost/social-sharing-link {"service":"x","style":{"border":{"width":"1px"}},"borderColor":"syncro-black"} /-->
	
	<!-- wp:outermost/social-sharing-link {"service":"mail","style":{"border":{"width":"1px"}},"borderColor":"syncro-black"} /--></ul>
	<!-- /wp:outermost/social-sharing --></div>
	<!-- /wp:column --></div>
	<!-- /wp:columns -->
	
	<!-- wp:group {"metadata":{"name":"Related Resources"},"style":{"spacing":{"margin":{"top":"50px"},"padding":{"bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group" style="margin-top:50px;padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:heading {"level":6} -->
	<h6 class="wp-block-heading" id="h-related-resources">Related Resources</h6>
	<!-- /wp:heading -->
	
	<!-- wp:syncro-blocks/related-posts {"name":"syncro-blocks/related-posts","mode":"preview"} /--></div>
	<!-- /wp:group -->
	
	<!-- wp:block {"ref":28050} /-->
	
	<!-- wp:block {"ref":28052} /-->';
	
				$result = wp_update_post( array( 'ID' => $post_id, 'post_content' => $pattern ) );
	
				$result = new WP_Error( 'notice', $result . ' processed' );

	
				// Return WP_Error if the item processing failed (In our case we simply skip author with user id 5)
				if ( is_wp_error( $result ) ) {
					return $result;
				}
	
				// Do the expensive processing here.
				// ...
	
				// Return true if the item processing is successful.
				return true;
			}
			
			/**
			 * Called when specific process is finished (all items were processed).
			 * This method can be overriden in the process class.
			 * @return void
			 */
			public function finish() {
				// Do something after process is finished.
				// You have $this->items, etc.
			}
		}

	/**
	 * Class Syncro_Gated_Resource_Migration_Batch
	 */
	class Syncro_Gated_Resource_Migration_Batch extends WP_Batch {
 
		/**
		 * Unique identifier of each batch
		 * @var string
		 */
		public $id = 'gated_resource_migration';

		/**
		 * Describe the batch
		 * @var string
		 */
		public $title = 'Migrate the gated resource content out of the custom fields';

		/**
		 * To setup the batch data use the push() method to add WP_Batch_Item instances to the queue.
		 *
		 * Note: If the operation of obtaining data is expensive, cache it to avoid slowdowns.
		 *
		 * @return void
		 */
		public function setup() {

			$args = array(
				'post_type' => 'resource',
				'post_status' => 'any',
				'meta_query' => array(
					//'relation' => 'and',
					/*array(
						'key' => '_wp_page_template',
						'value' => 'templates/template-gated-resource.php',
					),*/
					array(
						'key' => 'content_type',
						'value' => 'basic'
					)
				),
				'posts_per_page' => -1
			);

		   $posts = new WP_Query( $args );

		   if( $posts->have_posts() ){
			while( $posts->have_posts() ){
				$posts->the_post();
				$this->push( new WP_Batch_Item( get_the_ID(), array( 'post_id' => get_the_ID() ) ) );
			}
		   }
		}

		/**
		 * Handles processing of batch item. One at a time.
		 *
		 * In order to work it correctly you must return values as follows:
		 *
		 * - TRUE - If the item was processed successfully.
		 * - WP_Error instance - If there was an error. Add message to display it in the admin area.
		 *
		 * @param WP_Batch_Item $item
		 *
		 * @return bool|\WP_Error
		 */
		public function process( $item ) {

			// Retrieve the custom data
			// Retrieve the custom data
			$post_id = $item->get_value( 'post_id' );
			// Move the custom field excerpt into the post excerpt.
			/*$cf_excerpt = get_field( 'post_excerpt', $post_id, false, false );
			if( $cf_excerpt ){
				$excerpt_result = wp_update_post( array( 'ID' => $post_id, 'post_excerpt' => $cf_excerpt ) );
				if( is_wp_error( $excerpt_result ) ){
					return $excerpt_result;
				}
			}*/

			// Retrieve the content
			$post_content = get_the_content( null, false, $post_id );
			
			if ( get_field( 'introduction_content', $post_id ) ) :
				$post_content .= get_field( 'introduction_content', $post_id );
			endif;

			if ( get_field( 'main_content', $post_id ) ) :
				$post_content .= get_field( 'main_content', $post_id );
			endif;
			
			$result = wp_update_post( array( 'ID' => $post_id, 'post_content' => $post_content ) );
			//$result = $post_id;
			//write_log( 'post id' . $post_id );
			//update_post_meta( $post_id, '_wp_page_template', 'gated' );
	
			$result = new WP_Error( 'notice', $result . ' processed' );

			// Return WP_Error if the item processing failed (In our case we simply skip author with user id 5)
			if ( is_wp_error( $result ) ) {
				return $result;
			}

			// Do the expensive processing here.
			// ...

			// Return true if the item processing is successful.
			return true;
		}
		
		/**
		 * Called when specific process is finished (all items were processed).
		 * This method can be overriden in the process class.
		 * @return void
		 */
		public function finish() {
			// Do something after process is finished.
			// You have $this->items, etc.
		}
	}
	
	
		/**
	 * Class Syncro_Gated_Resource_Migrate_To_Pattern_Batch
	 */
	class Syncro_Gated_Resource_Migrate_To_Pattern_Batch extends WP_Batch {
 
		/**
		 * Unique identifier of each batch
		 * @var string
		 */
		public $id = 'gated_resource_migrate_to_pattern';

		/**
		 * Describe the batch
		 * @var string
		 */
		public $title = 'Migrate the gated resource into the pattern';

		/**
		 * To setup the batch data use the push() method to add WP_Batch_Item instances to the queue.
		 *
		 * Note: If the operation of obtaining data is expensive, cache it to avoid slowdowns.
		 *
		 * @return void
		 */
		public function setup() {

			$args = array(
				'post_type' => 'resource',
				'post_status' => 'any',
				'meta_query' => array(
					'relation' => 'and',
					array(
						'key' => '_wp_page_template',
						'value' => 'gated',
					),
					array(
						'key' => 'content_type',
						'value' => 'basic'
					)
				),
				'posts_per_page' => -1
			);

		   $posts = new WP_Query( $args );

		   if( $posts->have_posts() ){
			while( $posts->have_posts() ){
				$posts->the_post();
				$this->push( new WP_Batch_Item( get_the_ID(), array( 'post_id' => get_the_ID() ) ) );
			}
		   }
		}

		/**
		 * Handles processing of batch item. One at a time.
		 *
		 * In order to work it correctly you must return values as follows:
		 *
		 * - TRUE - If the item was processed successfully.
		 * - WP_Error instance - If there was an error. Add message to display it in the admin area.
		 *
		 * @param WP_Batch_Item $item
		 *
		 * @return bool|\WP_Error
		 */
		public function process( $item ) {

			// Retrieve the custom data
			$post_id = $item->get_value( 'post_id' );

			// Retrieve the content
			$post_content = get_the_content( null, false, $post_id );
			
			$pattern = '<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"66.6%"} -->
<div class="wp-block-column" style="flex-basis:66.6%"><!-- wp:group {"layout":{"type":"constrained","contentSize":"620px","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:post-featured-image {"aspectRatio":"auto","sizeSlug":"gated_featured_image","style":{"border":{"radius":"24px"}}} /-->';
			$pattern .= $post_content;
			$pattern .= '<!-- wp:group {"metadata":{"name":"Social Sharing"},"layout":{"type":"constrained"},"responsiveBlockControl":{"tablet":true,"mobile":true,"desktop":false,"wide":false}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground-50"}}}},"textColor":"foreground-50","fontSize":"x-small"} -->
<p class="has-foreground-50-color has-text-color has-link-color has-x-small-font-size">Share</p>
<!-- /wp:paragraph -->

<!-- wp:outermost/social-sharing {"iconColor":"syncro-black","iconColorValue":"#1d1d1c","iconBackgroundColor":"base","iconBackgroundColorValue":"#fffcf8","style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
<ul class="wp-block-outermost-social-sharing has-icon-color has-icon-background-color" style="margin-top:var(--wp--preset--spacing--30)"><!-- wp:outermost/social-sharing-link {"service":"facebook","style":{"border":{"width":"1px"}},"borderColor":"syncro-black"} /-->

<!-- wp:outermost/social-sharing-link {"service":"x","style":{"border":{"width":"1px"}},"borderColor":"syncro-black"} /-->

<!-- wp:outermost/social-sharing-link {"service":"mail","style":{"border":{"width":"1px"}},"borderColor":"syncro-black"} /--></ul>
<!-- /wp:outermost/social-sharing --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"33.6%"} -->
<div class="wp-block-column" style="flex-basis:33.6%"><!-- wp:group {"style":{"position":{"type":"sticky","top":"0px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:html -->';
			$pattern .= get_field( 'form_embed', $post_id );
			$pattern .= '<!-- /wp:html --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Social Sharing"},"layout":{"type":"constrained"},"responsiveBlockControl":{"wide":true,"desktop":true,"tablet":false,"mobile":false}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground-50"}}}},"textColor":"foreground-50","fontSize":"x-small"} -->
<p class="has-foreground-50-color has-text-color has-link-color has-x-small-font-size">Share</p>
<!-- /wp:paragraph -->

<!-- wp:outermost/social-sharing {"iconColor":"syncro-black","iconColorValue":"#1d1d1c","iconBackgroundColor":"base","iconBackgroundColorValue":"#fffcf8","style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
<ul class="wp-block-outermost-social-sharing has-icon-color has-icon-background-color" style="margin-top:var(--wp--preset--spacing--30)"><!-- wp:outermost/social-sharing-link {"service":"facebook","style":{"border":{"width":"1px"}},"borderColor":"syncro-black"} /-->

<!-- wp:outermost/social-sharing-link {"service":"x","style":{"border":{"width":"1px"}},"borderColor":"syncro-black"} /-->

<!-- wp:outermost/social-sharing-link {"service":"mail","style":{"border":{"width":"1px"}},"borderColor":"syncro-black"} /--></ul>
<!-- /wp:outermost/social-sharing --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"metadata":{"name":"Related Resources"},"style":{"spacing":{"margin":{"top":"50px"},"padding":{"bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:50px;padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:heading {"level":6} -->
<h6 class="wp-block-heading" id="h-related-resources">Related Resources</h6>
<!-- /wp:heading -->

<!-- wp:syncro-blocks/related-posts {"name":"syncro-blocks/related-posts","mode":"preview"} /--></div>
<!-- /wp:group -->

<!-- wp:block {"ref":28050} /-->

<!-- wp:block {"ref":28052} /-->';
			
			$result = wp_update_post( array( 'ID' => $post_id, 'post_content' => $pattern ) );
			
			$custom_footer = get_field( 'use_custom_footer_cta', $post_id ) ? 'It has a custom footer' : ' default footer';
	
			$result = new WP_Error( 'notice', $result . ' processed' . $custom_footer );

			// Return WP_Error if the item processing failed (In our case we simply skip author with user id 5)
			if ( is_wp_error( $result ) ) {
				return $result;
			}

			// Do the expensive processing here.
			// ...

			// Return true if the item processing is successful.
			return true;
		}
		
		/**
		 * Called when specific process is finished (all items were processed).
		 * This method can be overriden in the process class.
		 * @return void
		 */
		public function finish() {
			// Do something after process is finished.
			// You have $this->items, etc.
		}
	}

	/**
	 * Class Syncro_Ungated_Resource_Migrate_To_Pattern_Batch
	 */
	class Syncro_Ungated_Resource_Migrate_To_Pattern_Batch extends WP_Batch {
 
		/**
		 * Unique identifier of each batch
		 * @var string
		 */
		public $id = 'syncro_resource_migrate_ungated_to_pattern';

		/**
		 * Describe the batch
		 * @var string
		 */
		public $title = 'Migrate the UNgated resource into the pattern';

		/**
		 * To setup the batch data use the push() method to add WP_Batch_Item instances to the queue.
		 *
		 * Note: If the operation of obtaining data is expensive, cache it to avoid slowdowns.
		 *
		 * @return void
		 */
		public function setup() {

			$args = array(
				'post_type' => 'resource',
				'post_status' => 'any',
				'meta_query' => array(
					'relation' => 'AND',
					array(
						'key' => '_wp_page_template',
						'value' => 'default'
					),
					array(
						'key' => 'content_type',
						'value' => 'flexible',
						'compare' => '!='
					)
				),
				'posts_per_page' => -1
			);

		   $posts = new WP_Query( $args );

		   if( $posts->have_posts() ){
			while( $posts->have_posts() ){
				$posts->the_post();
				write_log( get_the_title() );
				$this->push( new WP_Batch_Item( get_the_ID(), array( 'post_id' => get_the_ID() ) ) );
			}
		   }
		}

		/**
		 * Handles processing of batch item. One at a time.
		 *
		 * In order to work it correctly you must return values as follows:
		 *
		 * - TRUE - If the item was processed successfully.
		 * - WP_Error instance - If there was an error. Add message to display it in the admin area.
		 *
		 * @param WP_Batch_Item $item
		 *
		 * @return bool|\WP_Error
		 */
		public function process( $item ) {

			// Retrieve the custom data
			$post_id = $item->get_value( 'post_id' );

			// Retrieve the content
			$post_content = get_the_content( null, false, $post_id );

			if( ! strlen( $post_content ) ){
				return new WP_Error( 'notice', $post_id . ' not processed because its content was empty.' );
			}
			if( str_starts_with( $post_content, '<!-- wp:columns -->' ) ){
				return new WP_Error( 'notice', $post_id . ' not processed because its content began with columns.' );
			}
			
			$pattern = '<!-- wp:columns -->
	<div class="wp-block-columns"><!-- wp:column {"width":"400px"} -->
	<div class="wp-block-column" style="flex-basis:400px"><!-- wp:group {"className":"sticky-scroll","style":{"position":{"type":"sticky","top":"0px"}},"layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group sticky-scroll"><!-- wp:yoast-seo/table-of-contents {"maxHeadingLevel":2} -->
	<div class="wp-block-yoast-seo-table-of-contents yoast-table-of-contents"><h2>Table of contents</h2></div>
	<!-- /wp:yoast-seo/table-of-contents --></div>
	<!-- /wp:group --></div>
	<!-- /wp:column -->
	
	<!-- wp:column {"width":"66.66%"} -->
	<div class="wp-block-column" style="flex-basis:66.66%">';
	
	$pattern .= $post_content;
	
	$pattern .= '<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground-50"}}}},"textColor":"foreground-50","fontSize":"x-small"} -->
	<p class="has-foreground-50-color has-text-color has-link-color has-x-small-font-size">Share</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:outermost/social-sharing {"iconColor":"syncro-black","iconColorValue":"#1d1d1c","iconBackgroundColor":"base","iconBackgroundColorValue":"#fffcf8","style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
	<ul class="wp-block-outermost-social-sharing has-icon-color has-icon-background-color" style="margin-top:var(--wp--preset--spacing--30)"><!-- wp:outermost/social-sharing-link {"service":"facebook","style":{"border":{"width":"1px"}},"borderColor":"syncro-black"} /-->
	
	<!-- wp:outermost/social-sharing-link {"service":"x","style":{"border":{"width":"1px"}},"borderColor":"syncro-black"} /-->
	
	<!-- wp:outermost/social-sharing-link {"service":"mail","style":{"border":{"width":"1px"}},"borderColor":"syncro-black"} /--></ul>
	<!-- /wp:outermost/social-sharing --></div>
	<!-- /wp:column --></div>
	<!-- /wp:columns -->
	
	<!-- wp:group {"metadata":{"name":"Related Resources"},"style":{"spacing":{"margin":{"top":"50px"},"padding":{"bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group" style="margin-top:50px;padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:heading {"level":6} -->
	<h6 class="wp-block-heading" id="h-related-resources">Related Resources</h6>
	<!-- /wp:heading -->
	
	<!-- wp:syncro-blocks/related-posts {"name":"syncro-blocks/related-posts","mode":"preview"} /--></div>
	<!-- /wp:group -->
	
	<!-- wp:block {"ref":28050} /-->
	
	<!-- wp:block {"ref":28052} /-->';
			
			//$result = wp_update_post( array( 'ID' => $post_id, 'post_content' => $pattern ) );
			$result = $post_id;
			if( $post_id != 27173 ){
				$result = wp_update_post( array( 'ID' => $post_id, 'post_content' => $pattern ) );
			}
			$custom_footer = get_field( 'use_custom_footer_cta', $post_id ) ? 'It has a custom footer' : ' default footer';
	
			$result = new WP_Error( 'notice', $result . ' processed' . $custom_footer );

			// Return WP_Error if the item processing failed (In our case we simply skip author with user id 5)
			if ( is_wp_error( $result ) ) {
				return $result;
			}

			// Do the expensive processing here.
			// ...

			// Return true if the item processing is successful.
			return true;
		}
		
		/**
		 * Called when specific process is finished (all items were processed).
		 * This method can be overriden in the process class.
		 * @return void
		 */
		public function finish() {
			// Do something after process is finished.
			// You have $this->items, etc.
		}
	}

} 
/**
  * Initialize the batches.
  */
 function syncro_wp_batch_processing_init() {
	 $batch = new Syncro_Post_Resource_Type_Batch();
	 WP_Batch_Processor::get_instance()->register( $batch );

	 $migrate_topics = new Syncro_Post_Resource_Topic_Batch();
	 WP_Batch_Processor::get_instance()->register( $migrate_topics );

	 $migrate_hidden = new Syncro_Hide_Hidden();
	 WP_Batch_Processor::get_instance()->register( $migrate_hidden );

	 $migrate_posts = new Syncro_Post_Content_Migration_Batch();
	 WP_Batch_Processor::get_instance()->register( $migrate_posts );

	 $migrate_posts_into_pattern = new Syncro_Post_Migrate_Into_Pattern();
	 WP_Batch_Processor::get_instance()->register( $migrate_posts_into_pattern );

	 $migrate_gated_resources_into_content = new Syncro_Gated_Resource_Migration_Batch();
	 WP_Batch_Processor::get_instance()->register( $migrate_gated_resources_into_content );

	 $migrate_gated_resources_into_pattern = new Syncro_Gated_Resource_Migrate_To_Pattern_Batch();
	 WP_Batch_Processor::get_instance()->register( $migrate_gated_resources_into_pattern );

	 $migrate_ungated_resources_into_pattern = new Syncro_Ungated_Resource_Migrate_To_Pattern_Batch();
	 WP_Batch_Processor::get_instance()->register( $migrate_ungated_resources_into_pattern );

 }
 add_action( 'wp_batch_processing_init', 'syncro_wp_batch_processing_init', 15, 1 );

 function wp_bp_my_custom_delay($delay) {
	return 2; // in seconds
 }
 add_filter('wp_batch_processing_delay', 'wp_bp_my_custom_delay', 10, 1);

 if ( ! function_exists('write_log')) {
	function write_log ( $log )  {
	   if ( is_array( $log ) || is_object( $log ) ) {
		  error_log( print_r( $log, true ) );
	   } else {
		  error_log( $log );
	   }
	}
 }