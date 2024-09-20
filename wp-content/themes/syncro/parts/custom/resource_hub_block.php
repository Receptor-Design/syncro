<main class="resource-hub" data-sort-by="<?php echo '' ?>">
	<section class="reshub-filters">
		<div class="grid-container">
			<div class="grid-x grid-margin-x">
				<?php if (get_sub_field('disable_topics_filter')) : ?>
				<?php else : ?>
					<div class="cell small-12 topic-filter">
						<h6>FILTER BY TOPIC</h6>
						<fieldset data-filter-group="topics" data-logic="or">
							<?php
							$terms = get_field('topic_filter', 'option');
							if ($terms) : ?>
								<?php foreach ($terms as $term) : ?>
									<label class="resfilteritem" for="topic-<?php echo $term->slug ?>">
										<input value=".<?php echo $term->slug ?>" type="checkbox" id="topic-<?php echo $term->slug ?>" name="topic" />
										<span class="filter-button-teal filter-button" for="topic-<?php echo $term->slug ?>"><?php echo $term->name ?></span>
									</label>
								<?php endforeach; ?>
							<?php endif; ?>
						</fieldset>
					</div>
				<?php endif; ?>

				<?php if (get_sub_field('filter_by_format')) : ?>
				<?php else : ?>

					<div class="cell small-12 medium-6 format-filter">
						<h6>FILTER BY FORMAT</h6>
						<fieldset data-filter-group="formats" data-logic="or">
							<?php
							$terms = get_field('format_filter', 'option');
							if ($terms) : ?>
								<label class="resfilteritem" for="format-all">
									<input value="" type="radio" id="format-all" name="type" checked />
									<span class="filter-button-purple filter-button" for="format-all">All</span>
								</label>
								<?php foreach ($terms as $term) : ?>
									<label class="resfilteritem" for="format-<?php echo $term->slug ?>">
										<input value=".<?php echo $term->slug ?>" type="radio" id="format-<?php echo $term->slug ?>" name="type" />
										<span class="filter-button-purple filter-button" for="format-<?php echo $term->slug ?>"><?php echo $term->name ?></span>
									</label>
								<?php endforeach; ?>
							<?php endif; ?>
						</fieldset>
					</div>

				<?php endif; ?>

			</div>
		</div>
	</section>


	<section class="resource-hub resource-hub-archive" role="main">
		<div class="grid-container">
			<div class="grid-x grid-margin-x all-posts" data-equalizer data-equalize-on-stack="true" data-equalize-by-row="true">
				<?php if (get_sub_field('filter_by_format')) : ?>

					<?php if (get_sub_field('resource_format')) : ?>
						<?php $formatcat = (get_sub_field('resource_format')); ?>
					<?php else : ?>
						<?php $formatcat = (''); ?>
					<?php endif; ?>

					<?php $args = array(
						'cat' => $formatcat, // Need to use the acf taxonomy field to pull the cat
						'post_type' => 'resource',
						'post_status' => 'publish',
						'posts_per_page' => -1,
						'orderby'         => 'date',
						'order'           => 'DESC',
						'tax_query' => array(
							array(
								'taxonomy' => 'resource-syncrotopic',
								'terms' => 'hidden',
								'field' => 'slug',
								'include_children' => true,
								'operator' => 'NOT IN'
							)
						)
					);
					$resblock_query = new WP_Query($args); ?>
				<?php else : ?>
					<?php $args = array(
						'post_type' => 'resource',
						'post_status' => 'publish',
						'posts_per_page' => -1,
						'orderby' => 'title',
						'order'   => 'ASC',
						'tax_query' => array(
							array(
								'taxonomy' => 'resource-syncrotopic',
								'operator' => 'NOT IN',
								'field'    => 'slug',
								'terms' => 'hidden'
							)
						)
					);
					$resblock_query = new WP_Query($args); ?>
				<?php endif; ?>
				<?php if ($resblock_query->have_posts()) : ?>
					<?php while ($resblock_query->have_posts()) : $resblock_query->the_post(); ?>
						<?php get_template_part('parts/loop', 'archive'); ?>
					<?php endwhile; ?>
					<div class="cell text-center">
						<span id="no-posts-text" style="display: none; text-align: center; margin: 100px auto;font-size: 24px;">Sorry, no resources meet this criteria. Please adjust your filter settings.</span>
					</div>
					<div class="cell text-center">
						<div class="load-more-wrapper">
							<?php if (get_sub_field('disable_load_more')) : ?>
							<?php else : ?>
								<button type="button" class="load-more load-more-button">Load more</button>
							<?php endif; ?>
						</div>
					</div>
				<?php else : ?>
					<?php get_template_part('parts/content', 'missing'); ?>
				<?php endif; ?>
			</div>
		</div>
	</section>
</main> <!-- end #main -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/mixitup/3.3.1/mixitup.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/scripts/mixitup/mixitup-pagination.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/scripts/mixitup/mixitup-multifilter.min.js"></script>

<?php if (get_sub_field('disable_load_more')) : ?>
	<script>
		jQuery('.resource-hub').each(function() {
			if (!jQuery(this).hasClass('active')) {
				jQuery(this).addClass('active');
				var filterVal = 'all';
				var dataSort = '';
				var thisContainer = jQuery(this).find('.all-posts');

				var dataSort = jQuery(this).attr('data-sort-by');
				if (dataSort === '') {
					var filterVal = 'all';
				} else {
					var filterVal = '.' + dataSort
				}

				var mixer = mixitup(thisContainer, {
					callbacks: {
						onMixStart: function(state, futureState) {
							console.log(futureState)
							if (futureState.hasFailed) {
								jQuery('#no-posts-text').css('display', 'block');
							} else {
								jQuery('#no-posts-text').css('display', 'none');
							}
						},
					},
					animation: {
						effects: 'fade stagger(50ms)' // Set a 'stagger' effect for the loading animation
					},
					load: {
						filter: filterVal
					},
					multifilter: {
						enable: true
					},
					controls: {
						toggleLogic: 'and',
					},
				});
			}
		});
	</script>
<?php else : ?>
	<script>
		jQuery('.resource-hub').each(function() {
			if (!jQuery(this).hasClass('active')) {
				jQuery(this).addClass('active');
				var filterVal = 'all';
				var dataSort = '';
				var thisContainer = jQuery(this).find('.all-posts');

				var dataSort = jQuery(this).attr('data-sort-by');
				if (dataSort === '') {
					var filterVal = 'all';
				} else {
					var filterVal = '.' + dataSort
				}
				var loadMoreEl = document.querySelector('.load-more');
				var currentLimit = 12;
				var incrementAmount = 12;

				var mixer = mixitup(thisContainer, {
					callbacks: {
						onMixStart: handleMixStart,
						onMixEnd: handleMixEnd,
					},
					animation: {
						effects: 'fade stagger(50ms)' // Set a 'stagger' effect for the loading animation
					},
					load: {
						filter: filterVal
					},
					pagination: {
						limit: currentLimit
					},
					multifilter: {
						enable: true
					},
					controls: {
						toggleLogic: 'and',
					},
				});
			}

			jQuery(function() {
				var numItems = jQuery('.mix').length
				if (currentLimit >= numItems) {
					loadMoreEl.disabled = true;
					jQuery('.load-more-button').css('display', 'none');
				} else {
					loadMoreEl.disabled = false;
				}
			});

			function handleMixStart(state, futureState) {
				console.log(futureState)
				if (futureState.hasFailed) {
					jQuery('#no-posts-text').css('display', 'block');
				} else {
					jQuery('#no-posts-text').css('display', 'none');
				};
			}

			function handleMixEnd(state) {
				if (state.activePagination.limit >= state.totalMatching) {
					// Disable button
					loadMoreEl.disabled = true;
				} else if (loadMoreEl.disabled) {
					// Enable button
					loadMoreEl.disabled = false;
				}
			}

			function handleLoadMoreClick() {
				// On each click of the load more button, we increment
				// the current limit by a defined amount
				currentLimit += incrementAmount;
				mixer.paginate({
					limit: currentLimit
				});
			}
			loadMoreEl.addEventListener('click', handleLoadMoreClick);
			// preload based on URL ending with #inserttopic
			if (location.hash) {
				var hash = location.hash.replace('#', '.')
				mixer.filter(hash)
				jQuery("input[value='" + hash + "']").prop('checked', true)
			}
		});
	</script>
<?php endif; ?>