<?php

/**
 * Gutenberghub Query
 *
 * @package GutenberghubQuerySearch
 */

/**
 * Prepares the core query block for gutenberghub filters queries.
 */
class Gutenberghub_Query_Search_Query {

	/**
	 * Constructor.
	 *
	 * @return void
	 */
	public function __construct() {
		add_filter('render_block', array($this, 'prepare_query_loop_block'), 10, 3);
		add_filter('register_block_type_args', array($this, 'prepare_query_id_consumption'), 10, 2);
		add_filter('query_loop_block_query_vars', array($this, 'apply_custom_search_query'), 10, 2);
	}

	/**
	 * Applies the custom search query to the query block result.
	 *
	 * @param array    $query - Current query.
	 * @param WP_Block $block - Block where the query is being applied.
	 *
	 * @return array - Modified query that respects the search query.
	 */
	public function apply_custom_search_query($query, $block) {

		$block_query_id   = $block->context['ghubQueryId'];
		$current_query_id = isset($_GET['qid']) ? $_GET['qid'] : -1;
		$is_current_query = (int) $current_query_id === (int) $block_query_id;

		if (!$is_current_query) {
			return $query;
		}

		if (!isset($_GET['qs'])) {
			return $query;
		}

		$searched_term = sanitize_text_field(wp_unslash($_GET['qs']));

		// Appending default search, if existing.
		if (isset($query['s'])) {
			$searched_term = $query['s'] . ',' . $searched_term;
		}

		$query['s'] = $searched_term;

		return $query;
	}

	/**
	 * Prepares all blocks to consume our custom query id.
	 *
	 * @param array  $args - Registeration arguments.
	 * @param string $block_name - Block type name.
	 *
	 * @return array - Modified arguments to consume custom query context id.
	 */
	public function prepare_query_id_consumption($args, $block_name) {
		if ('core/query' === $block_name) {
			$args['attributes'] = array_merge(
				$args['attributes'],
				array(
					'ghubQueryId' => array(
						'type' => 'string',
						'default' => ''
					)
				)
			);

			$current_provided_contexts = isset($args['provides_context']) ? $args['provides_context'] : array();
			$args['provides_context'] = array_merge($current_provided_contexts, array('ghubQueryId' => 'ghubQueryId'));
		} else {
			$current_use_context  = isset($args['uses_context']) ? $args['uses_context'] : array();
			$args['uses_context'] = array_merge($current_use_context, array('ghubQueryId'));
		}

		return $args;
	}

	/**
	 * Prepares the query loop block to use custom id.
	 *
	 * @param string   $block_content - Block content.
	 * @param array    $block - Parsed Block.
	 * @param WP_Block $block_instance - Block instance.
	 */
	public function prepare_query_loop_block($block_content, $block, $block_instance) {

		if ('core/query' !== $block['blockName']) {
			return $block_content;
		}

		$is_query_id_added = false !== stripos($block_content, 'ghub-query-id-');

		if ($is_query_id_added) {
			return $block_content;
		}

		if (isset($block['attrs']['ghubQueryId'])) {
			$block_content = str_replace('wp-block-query', sprintf('wp-block-query ghub-query-id-%s', $block['attrs']['ghubQueryId']), $block_content);
		}


		return $block_content;
	}
}

new Gutenberghub_Query_Search_Query();
