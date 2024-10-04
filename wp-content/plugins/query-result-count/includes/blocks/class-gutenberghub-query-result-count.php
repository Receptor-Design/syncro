<?php

/**
 * Query result count block
 * 
 * @package GutenberghubQueryFilters
 */

use PhpParser\Node\Stmt\Global_;

if (!defined("ABSPATH")) {
     die('No direct access');
}


/**
 * Main class for handling block functionalities
 */
class Gutenberghub_Query_Result_Count_Block {

     /**
      * Constructor
      *
      * @return void
      */
     public function __construct() {
          add_action('init', array($this, 'register'));
     }

     /**
      * Renders the block.
      *
      * @param array    $attributes - Attributes.
      * @param string   $content - Block content.
      * @param WP_Block $block_instance - Block instance.
      *
      * @return string - Rendered block.
      */
     public function render($attributes, $content, $block_instance) {
          global $page;

          $context     = $block_instance->context;
          $start_text  = isset($attributes['startText']) ? $attributes['startText'] : "";
          $center_text = isset($attributes['centerText']) ? $attributes['centerText'] : "";
          $end_text    = isset($attributes['endText']) ? $attributes['endText'] : "";
          $hide        = isset($attributes['hide']) ? $attributes['hide'] : "none";

          $total_count = wp_count_posts($context['query']['postType'])->publish;

          $query_args       = build_query_vars_from_query_block($block_instance, $page);
          $query            = new WP_Query($query_args);
          $total_count_ele  = '<span>' . esc_html($total_count) . '</span>';
          $result_count_ele = '<span>' . esc_html($query->found_posts) . '</span>';

          $rendered_block = sprintf('
               <span>%1$s</span>
               %5$s
               <span>%2$s</span>
               %4$s
               <span>%3$s</span>
               ',
               esc_html( $start_text ),
               esc_html( $center_text ),
               esc_html( $end_text ),
               'total-count' !== $hide ? $total_count_ele : "",
               'result-count' !== $hide ? $result_count_ele : "",
          );

          /**
           * Replacing content inside the block container.
           */
          return str_replace('%1$s', $rendered_block, $content);
     }

     /**
      * Main registration.
      * 
      * @return void
      */
     public function register() {
          register_block_type_from_metadata(
               GHRC_DIR_PATH . 'dist/block.json',
               array(
                    'render_callback' => array($this, 'render')
               )
          );
     }
}

new Gutenberghub_Query_Result_Count_Block;
