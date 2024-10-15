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
 }
 add_action( 'wp_batch_processing_init', 'syncro_wp_batch_processing_init', 15, 1 );