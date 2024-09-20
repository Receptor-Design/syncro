<?php

/**
 * Displays author page. 
 */
$author_id = get_the_author_meta('ID');
get_header(); ?>

<?php get_template_part('parts/custom/reshub_author_hero_banner'); ?>


<section class="blog-author-block">
	<?php if (get_field('author_headshot', 'user_' . $author_id) || get_field('author_position', 'user_' . $author_id) || get_field('author_description', 'user_' . $author_id)) : ?>
		<div class="grid-container fader">
			<div class="grid-x grid-padding-x align-middle">
				<?php $image = get_field('author_headshot', 'user_' . $author_id);
				if (!empty($image)) : ?>
					<div class="cell small-12 medium-shrink">
						<img class="author-headshot lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					</div>
				<?php endif; ?>
				<div class="cell small-12 medium-auto author-content">
					<h3 class="author-headline"><?php echo get_the_author(); ?>
						<?php $linkedin = get_field('author_linkedin', 'user_' . $author_id);
						if (!empty($linkedin)) : ?>
							<a href="<?php echo get_field('author_linkedin', 'user_' . $author_id); ?>" target="_blank" rel="nofollow">
								<img class="authorsocial lozad" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/syncro_social-blue-linkedin.svg)">
							</a>
						<?php endif; ?>
						<?php $twitter = get_field('author_twitter', 'user_' . $author_id);
						if (!empty($twitter)) : ?>
							<a href="<?php echo get_field('author_twitter', 'user_' . $author_id); ?>" target="_blank" rel="nofollow">
								<img class="authorsocial lozad" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/syncro_social-blue-x.svg)">
							</a>
						<?php endif; ?>
					</h3>
					<?php if (get_field('author_position', 'user_' . $author_id)) : ?>
						<h5><?php echo get_field('author_position', 'user_' . $author_id); ?></h5>
					<?php endif; ?>
					<?php if (get_field('author_description', 'user_' . $author_id)) : ?>
						<?php echo get_field('author_description', 'user_' . $author_id); ?>
					<?php endif; ?>
					<?php $link = get_field('author_cta_link',  'user_' . $author_id);
					if ($link) : $link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
					?>
						<a class="syncro-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
							<?php echo esc_html($link_title); ?>&nbsp;>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
</section>

<main class="resource-hub" data-sort-by="<?php echo '' ?>">
	<section class="resource-hub resource-hub-archive" role="main">
		<div class="grid-container reshub-container">
			<div class="grid-x grid-margin-x all-posts">
				<div class="cell small-12 content-before">
					<h3 style="font-weight: 600;">More from <?php echo  get_the_author_meta('first_name', $author_id); ?></h3>
				</div>
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
			var currentLimit = 14;
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

<?php get_template_part('parts/custom/footer_cta_resourcehub'); ?>
<?php get_footer(); ?>