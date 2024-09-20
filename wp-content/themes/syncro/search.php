<?php

/**
 * The template for displaying search results pages
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 */

get_header(); ?>











<section class="hero-banner">
	<div class="grid-container closer-container">
		<div class="grid-x grid-padding-x text-center align-middle">

			<div class="cell">
				<h1><?php if (get_field('resource_hub_hero_banner_headline', 'option')) :
							echo get_field('resource_hub_hero_banner_headline', 'option');
						else :
							the_archive_title();
						endif; ?></h1>
				<?php if (get_field('resource_hub_hero_banner_content', 'option')) : ?>
					<div class="hero-content-container">
						<?php echo get_field('resource_hub_hero_banner_content', 'option'); ?>
					</div>
				<?php endif; ?>

				<?php if (have_rows('resource_hub_hero_banner_links', 'option')) : ?>
					<div class="hero-content-repeater">
						<?php while (have_rows('resource_hub_hero_banner_links', 'option')) : the_row(); ?>
							<div class="hero-link">
								<?php $link = get_sub_field('resource_hub_hero_link', 'option');
								if ($link) : $link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';
								?>
									<a class="" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
										<?php echo esc_html($link_title); ?>
									</a>
								<?php endif; ?>
							</div>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>





<main class="resource-hub" data-sort-by="<?php echo '' ?>">
	<?php get_template_part('parts/custom/reshub-searchbar-search'); ?>

	<section class="reshub-filters">
		<div class="grid-container">
			<div class="grid-x grid-margin-x">
				<div class="cell small-12 results-container">
					<h4><span>Showing search results for:</span> “<?php echo esc_attr(get_search_query()); ?>”</h4>
				</div>
				<div class="cell small-12 medium-6 topic-filter">
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
				<div class="cell small-12 medium-6 format-filter">
					<h6>FILTER BY FORMAT</h6>
					<fieldset data-filter-group="formats" data-logic="or">
						<?php
						$terms = get_field('format_filter', 'option');
						if ($terms) : ?>
							<!--<label class="resfilteritem" for="format-all">
								<input value="" type="radio" id="format-all" name="type" checked />
								<span class="filter-button-purple filter-button" for="format-all">All</span>
							</label>-->
							<?php foreach ($terms as $term) : ?>
								<label class="resfilteritem" for="format-<?php echo $term->slug ?>">
									<input value=".<?php echo $term->slug ?>" type="checkbox" id="format-<?php echo $term->slug ?>" name="type" />
									<span class="filter-button-purple filter-button" for="format-<?php echo $term->slug ?>"><?php echo $term->name ?></span>
								</label>
							<?php endforeach; ?>
						<?php endif; ?>
					</fieldset>
				</div>
			</div>
		</div>
	</section>

	<section class="resource-hub resource-hub-archive" role="main">
		<div class="grid-container reshub-container">
			<div class="grid-x grid-margin-x all-posts">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php get_template_part('parts/loop', 'archive'); ?>
					<?php endwhile; ?>
					<div class="cell text-center">
						<span id="no-posts-text" style="display: none; text-align: center; margin: 100px auto;font-size: 24px;">Sorry, no resources meet this criteria. Please adjust your filter settings.</span>
					</div>
					<div class="cell text-center">
						<div class="load-more-wrapper">
							<button type="button" class="load-more load-more-button">Load more</button>
						</div>
					</div>
				<?php else : ?>
					<?php get_template_part('parts/content', 'missing'); ?>
				<?php endif; ?>
			</div>
		</div>
	</section>
</main> <!-- end #main -->




<?php get_template_part('parts/custom/footer_cta_resourcehub'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/mixitup/3.3.1/mixitup.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/scripts/mixitup/mixitup-pagination.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/scripts/mixitup/mixitup-multifilter.min.js"></script>
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
			//if (dataSort === '') {
			//	mixer.setFilterGroupSelectors('formats', '');
			//} else {
			//	mixer.setFilterGroupSelectors('formats', filterVal);
			//}
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

<?php get_footer(); ?>