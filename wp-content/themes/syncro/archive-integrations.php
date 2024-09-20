<?php get_header(); ?>

<section class="hero-banner">
	<div class="grid-container closer-container">
		<div class="grid-x grid-padding-x text-center align-middle">
			<div class="cell">
				<h1><?php if (get_field('integrations_hero_banner_headline', 'option')) :
							echo get_field('integrations_hero_banner_headline', 'option');
						else :
							the_archive_title();
						endif; ?></h1>
				<?php if (get_field('integrations_hero_banner_content', 'option')) : ?>
					<div class="hero-content-container">
						<?php echo get_field('integrations_hero_banner_content', 'option'); ?>
					</div>
				<?php endif; ?>
				<?php if (have_rows('integrations_hero_banner_links', 'option')) : ?>
					<div class="hero-content-repeater">
						<?php while (have_rows('integrations_hero_banner_links', 'option')) : the_row(); ?>
							<div class="hero-link">
								<?php $link = get_sub_field('integrations_hero_banner_links', 'option');
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
<main class="integration-hub" data-sort-by="<?php echo '' ?>">
	<section class="integration-filters">
		<div class="grid-container">
			<div class="grid-x grid-margin-x text-center">
				<div class="cell small-12 integration-type-filter">
					<fieldset data-filter-group="topics" data-logic="or">
						<?php
						$terms = get_field('integration_type_filter', 'option');
						if ($terms) : ?>
							<label class="intfilteritem" for="type-all">
								<input value="" type="radio" id="type-all" name="type" checked />
								<span class="filter-button-radio" for="format-all">All</span>
							</label>
							<?php foreach ($terms as $term) : ?>
								<label class="intfilteritem" for="type-<?php echo $term->slug ?>">
									<input value=".<?php echo $term->slug ?>" type="radio" id="type-<?php echo $term->slug ?>" name="type" />
									<span class="filter-button-radio" for="type-<?php echo $term->slug ?>"><?php echo $term->name ?></span>
								</label>
							<?php endforeach; ?>
						<?php endif; ?>
					</fieldset>
				</div>

				<div class="cell small-12 integration-key-filter">
					<fieldset data-filter-group="formats" data-logic="or">
						<?php
						$terms = get_field('integration_key', 'option');
						if ($terms) : ?>
							<?php foreach ($terms as $term) : ?>
								<!-- swap div to label to enable filtering-->
								<div class="intfilteritem" for="key-<?php echo $term->slug ?>">
									<!--
									<input value=".<?php echo $term->slug ?>" type="radio" id="key-<?php echo $term->slug ?>" name="key" />
									-->
									<span class="filter-key-item" for="key-<?php echo $term->slug ?>">
										<?php $keyimage = get_field('integration_key_icon', $term);
										if (!empty($keyimage)) : ?>
											<img class="intfilter-key-icon" src="<?php echo esc_url($keyimage['url']); ?>" alt="<?php echo esc_attr($keyimage['alt']); ?>" />
										<?php endif; ?>
										<?php echo $term->name ?></span>
								</div>
							<?php endforeach; ?>
						<?php endif; ?>
					</fieldset>
				</div>

			</div>
		</div>
	</section>

	<section class="integration-hub integration-hub-archive" role="main">
		<div class="grid-container reshub-container">
			<div class="grid-x grid-margin-x all-posts">

				<?php $args = array(
					'post_type'       => 'integrations',
					'orderby'         => 'title',
					'order'           => 'ASC',
					//'paged' => $paged,

					'tax_query' => array(
						array(
							'taxonomy' => 'syncrotopic',
							'terms' => 'hidden',
							'field' => 'slug',
							'include_children' => true,
							'operator' => 'NOT IN'
						)
					),
				);
				$intq = new WP_Query($args);
				if ($intq->have_posts()) : /* Open Loop */ ?>
					<?php while ($intq->have_posts()) : $intq->the_post(); /* Open Loop */ ?>

						<?php
						$thisID = get_the_ID();
						$types = wp_get_post_terms($thisID, array('integration_types'));
						$typeslugs = wp_list_pluck($types, 'slug');
						$ttypenames = wp_list_pluck($types, 'name');
						$type_class_names = join(' ', $typeslugs);
						$topicnames = join(', ', $ttypenames);
						$thisType = '';
						$thisTypecSlug = '';
						if (!empty($types)) {
							$thisType =  esc_html($types[0]->name);
							$thisTypeSlug =  esc_html($types[0]->slug);
						}
						$keys = wp_get_post_terms($thisID, array('integration_key'));
						$keyslugs = wp_list_pluck($keys, 'slug');
						$kkeynames = wp_list_pluck($keys, 'name');
						$key_class_names = join(' ', $keyslugs);
						$keynames = join(', ', $kkeynames);

						$thisKey = '';
						$thisKeySlug = '';
						if (!empty($topics)) {
							$thisKey =  esc_html($keys[0]->name);
							$thisKeySlug =  esc_html($keys[0]->slug);
						}
						?>

						<article id="post-<?php the_ID(); ?>" class="intitem-cont cell small-12 medium-6 large-4 mix
<?php if ($type_class_names) {
							echo ' ' . $type_class_names;
						} ?> 
<?php if ($key_class_names) {
							echo ' ' . $key_class_names;
						} ?> " role="article">

							<?php if (get_field('integrations_page_type') == 'custompage') : ?>
								<a href="<?php the_permalink() ?>">
									<div class="intitem hoverlift fader">
									<?php else : ?>
										<?php if (get_field('integration_link')) : ?>
											<a href="<?php echo get_field('integration_link'); ?>" target="_blank" rel="noopener">
												<div class="intitem hoverlift fader">
												<?php else : ?>
													<div class="intitem">
													<?php endif; ?>
												<?php endif; ?>

												<div class="intitem-content">
													<div class="intitem-logo-container">
														<?php $image = get_field('integration_logo');
														if (!empty($image)) : ?>
															<img class="intitem-logo" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
														<?php endif; ?>
													</div>
													<div class="intitem-desc"><?php echo get_field('integration_description'); ?></div>
													<div class="intitem-key">
														<?php foreach (wp_get_post_terms($thisID, array('integration_key')) as $keys) : ?>
															<?php $keyimage = get_field('integration_key_icon', $keys);
															if (!empty($keyimage)) : ?>
																<img class="intitem-key-icon" src="<?php echo esc_url($keyimage['url']); ?>" alt="<?php echo esc_attr($keyimage['alt']); ?>" />
															<?php endif; ?>
														<?php endforeach; ?>
													</div>
												</div>

												<?php if (get_field('integrations_page_type') == 'custompage') : ?>
													</div>
											</a>

										<?php else : ?>
											<?php if (get_field('integration_link')) : ?>
									</div>
								</a>
							<?php else : ?>
			</div>
		<?php endif; ?>

	<?php endif; ?>

	</article> <!-- end article -->









<?php endwhile; ?>
<?php joints_page_navi(); ?>
<?php else : ?>
	<?php get_template_part('parts/content', 'missing'); ?>
<?php endif; ?>

		</div>
		<div class="grid-x grid-margin-x text-center">
			<div class="cell">
				<span id="no-posts-text" style="display: none; text-align: center; margin: 100px auto;font-size: 20px;">Sorry, no integrations meet this criteria. Please adjust your filtering settings.</span>
			</div>
			<div class="cell">
				<!--
						<div class="load-more-wrapper">
						<button type="button" class="load-more load-more-button">Load more</button>
					</div>
				-->
			</div>
		</div>
		</div>
	</section>
</main> <!-- end #main -->

<?php get_template_part('parts/custom/footer_cta_integrations'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/mixitup/3.3.1/mixitup.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/scripts/mixitup/mixitup-pagination.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/scripts/mixitup/mixitup-multifilter.min.js"></script>
<script>
	jQuery('.integration-hub').each(function() {
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

			//var loadMoreEl = document.querySelector('.load-more');
			//var currentLimit = 6;
			//var incrementAmount = 6;



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
					//onMixEnd: handleMixEnd,

				},
				animation: {
					effects: 'fade stagger(50ms)' // Set a 'stagger' effect for the loading animation
				},

				load: {
					filter: filterVal
				},
				//pagination: {
				//	limit: currentLimit
				//},
				multifilter: {
					enable: true
				},
				controls: {
					toggleLogic: 'and',
				},
			});
		}

		//		function handleMixEnd(state) {
		//			// At the end of each operation, we must check whether the current
		//			// matching collection of target elements has additional hidden
		//			// elements, and enable or disable the load more button as
		//			// appropriate
		//
		//			if (state.activePagination.limit >= state.totalMatching) {
		//				// Disable button
		//
		//				loadMoreEl.disabled = true;
		//			} else if (loadMoreEl.disabled) {
		//				// Enable button
		//
		//				loadMoreEl.disabled = false;
		//			}
		//		}
		//
		//		function handleLoadMoreClick() {
		//			// On each click of the load more button, we increment
		//			// the current limit by a defined amount
		//
		//			currentLimit += incrementAmount;
		//
		//			mixer.paginate({
		//				limit: currentLimit
		//			});
		//		}
		//
		//		loadMoreEl.addEventListener('click', handleLoadMoreClick);
		//
	});
</script>

<?php get_footer(); ?>