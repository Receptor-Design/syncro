<?php

/**
 * The template for displaying all single posts and attachments
 */
get_header();

$thisID = get_the_ID();
$author_id = get_the_author_meta('ID');
$allcat = wp_get_post_terms($thisID, array('resource-category'));
$topics = wp_get_post_terms($thisID, array('resource-syncrotopic'));
$filtered_topics = array_filter($topics, function ($term) {
	return !in_array($term->slug, ['hidden']);
});
?>

<main class="single-blog grid-container">
	<div class="grid-x grid-padding-x align-center">
		<article id="post-<?php the_ID(); ?>" class="post-item cell small-12" role="article" itemscope itemtype="http://schema.org/BlogPosting">
			<section class="blog-header text-center" id="blogHeader">
				<?php if (!get_field('hide_featured_image_on_post')) : ?>
					<?php the_post_thumbnail('full'); ?>
				<?php endif; ?>
				<section class="blog-header-content fader2" id="centeredDiv">
					<h1 class="single-title" itemprop="headline"><strong><?php the_title(); ?></strong></h1>
					<div class="blog-header-details">

						<div class="byline-item">
							<p><?php echo get_the_time('F j, Y'); ?></p>
						</div>

						<?php if (!empty($filtered_topics)) : ?>
							<div class="byline-item">
								<p class="byline-topic">
									<?php foreach ($filtered_topics as $topic) : ?>
										<a href="/resources/#<?php echo $topic->slug; ?>" class="<?php echo $topic->slug; ?>"><?php echo $topic->name; ?><span>,</span></a>
									<?php endforeach; ?>
								</p>
							</div>
						<?php endif; ?>

						<?php if (!empty($allcat)) : ?>
							<div class="byline-item">
								<p class="byline-topic">
									<?php foreach ($allcat as $cat) : ?>
										<a href="/resources/#<?php echo $cat->slug; ?>" class="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?><span>,</span></a>
									<?php endforeach; ?>
								</p>
							</div>
						<?php endif; ?>



					</div>
				</section>
				<p class="breadcrumb fader2">
					<span class="breadcrumb-item byline-topic">
						<a href="/resources" class="resource">Resources</a>
					</span>
					<?php if (!empty($filtered_topics)) : ?>
						<span class="breadcrumb-item">></span>
						<span class="breadcrumb-item byline-topic">
							<?php foreach ($filtered_topics as $topic) : ?>
								<a href="/resources/#<?php echo $topic->slug; ?>" class="<?php echo $topic->slug; ?>"><?php echo $topic->name; ?><span>,</span></a>
							<?php endforeach; ?>
						</span>
					<?php endif; ?>
					<span class="breadcrumb-item">></span>
					<span class="breadcrumb-item">
						<?php the_title(); ?>
					</span>
				</p>
			</section>

			<section class="entry-main fader2" itemprop="text">
				<div id="entry-content" class="entry-content">
					<?php the_content(); ?>
					<?php if (have_rows('extended_blog_content')) :
						while (have_rows('extended_blog_content')) : the_row(); ?>
							<?php // Call to Action
							if (get_row_layout() == 'blog_advertisement') : ?>
								<div class="blog-ad-container">
									<?php if (get_sub_field('ad_type') == 'custom') : ?>
										<?php $link = get_sub_field('ad_link');
										if ($link) : $link_url = $link['url'];
											$link_title = $link['title'];
											$link_target = $link['target'] ? $link['target'] : '_self';
										?>
											<a class="blog-advertisement-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
												<?php $image = get_sub_field('ad_image');
												if (!empty($image)) : ?>
													<img class="blog-advertisement-image lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
												<?php endif; ?>
											</a>
										<?php endif; ?>
									<?php elseif (get_sub_field('ad_type') == 'globalone') : ?>
										<?php if (have_rows('global_ad_one', 'option')) : ?>
											<?php while (have_rows('global_ad_one', 'option')) : the_row(); ?>
												<?php $link = get_sub_field('ad_one_link', 'option');
												if ($link) : $link_url = $link['url'];
													$link_title = $link['title'];
													$link_target = $link['target'] ? $link['target'] : '_self';
												?>
													<a class="blog-advertisement-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
														<?php $image = get_sub_field('ad_one_image', 'option');
														if (!empty($image)) : ?>
															<img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
														<?php endif; ?>
													</a>
												<?php endif; ?>
											<?php endwhile; ?>
										<?php endif; ?>
									<?php elseif (get_sub_field('ad_type') == 'globaltwo') : ?>
										<?php if (have_rows('global_ad_two', 'option')) : ?>
											<?php while (have_rows('global_ad_two', 'option')) : the_row(); ?>
												<?php $link = get_sub_field('ad_two_link', 'option');
												if ($link) : $link_url = $link['url'];
													$link_title = $link['title'];
													$link_target = $link['target'] ? $link['target'] : '_self';
												?>
													<a class="blog-advertisement-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
														<?php $image = get_sub_field('ad_two_image', 'option');
														if (!empty($image)) : ?>
															<img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
														<?php endif; ?>
													</a>
												<?php endif; ?>
											<?php endwhile; ?>
										<?php endif; ?>
									<?php endif; ?>
								</div>
							<?php endif; ?>

							<?php // Continued Blog Content
							if (get_row_layout() == 'continued_blog_content') : ?>
								<?php echo get_sub_field('blog_content'); ?>
							<?php endif; ?>

							<?php
							// side-by-side_modules
							if (get_row_layout() == 'side-by-side_modules')
								get_template_part('parts/custom/_side-by-side_modules');

							// accordion_section
							if (get_row_layout() == 'accordion_section')
								get_template_part('parts/custom/accordion_section');

							// careers_section
							if (get_row_layout() == 'careers_section')
								get_template_part('parts/custom/careers_section');

							// contact_blocks
							if (get_row_layout() == 'contact_blocks')
								get_template_part('parts/custom/contact_blocks');

							// community_section
							if (get_row_layout() == 'community_section')
								get_template_part('parts/custom/community_section');

							// cta_section
							if (get_row_layout() == 'cta_section')
								get_template_part('parts/custom/cta_section');

							// content_section
							if (get_row_layout() == 'content_section')
								get_template_part('parts/custom/content_section');

							// device_cta
							if (get_row_layout() == 'device_cta')
								get_template_part('parts/custom/device_cta');

							// full_background_image_section
							if (get_row_layout() == 'full_background_image_section')
								get_template_part('parts/custom/full_background_image_section');

							// icon_grid
							if (get_row_layout() == 'icon_grid')
								get_template_part('parts/custom/icon_grid');

							// icons_with_content_section
							if (get_row_layout() == 'icons_with_content_section')
								get_template_part('parts/custom/icons_with_content_section');

							// information_tiles
							if (get_row_layout() == 'information_tiles')
								get_template_part('parts/custom/information_tiles');

							// leadership_section
							if (get_row_layout() == 'leadership_section')
								get_template_part('parts/custom/leadership_section');

							// logo_slider
							if (get_row_layout() == 'logo_slider')
								get_template_part('parts/custom/logo_slider');

							// instagram_feed
							if (get_row_layout() == 'instagram_feed')
								get_template_part('parts/custom/instagram_feed');

							// masonry_quotes
							if (get_row_layout() == 'masonry_quotes')
								get_template_part('parts/custom/masonry_quotes');

							// media_accordion
							if (get_row_layout() == 'media_accordion')
								get_template_part('parts/custom/media_accordion');

							// photo_circles
							if (get_row_layout() == 'photo_circles')
								get_template_part('parts/custom/photo_circles');

							// pricing_section
							if (get_row_layout() == 'pricing_section')
								get_template_part('parts/custom/pricing_section');

							// quote_bar
							if (get_row_layout() == 'quote_bar')
								get_template_part('parts/custom/quote_bar');

							// resource_hub_block
							if (get_row_layout() == 'resource_hub_block')
								get_template_part('parts/custom/resource_hub_block');

							// resource_trio
							if (get_row_layout() == 'resource_trio')
								get_template_part('parts/custom/resource_trio');

							// social_cta
							if (get_row_layout() == 'social_cta')
								get_template_part('parts/custom/social_cta');

							// split_content_and_image_section
							if (get_row_layout() == 'split_content_and_image_section')
								get_template_part('parts/custom/split_content_and_image_section');

							// split_content_and_image_to_edge_section
							if (get_row_layout() == 'split_content_and_image_to_edge_section')
								get_template_part('parts/custom/split_content_and_image_to_edge_section');

							// split_headline_and_content_section
							if (get_row_layout() == 'split_headline_and_content_section')
								get_template_part('parts/custom/split_headline_and_content_section');

							// transition
							if (get_row_layout() == 'transition')
								get_template_part('parts/custom/transition');

							// values_section
							if (get_row_layout() == 'values_section')
								get_template_part('parts/custom/values_section');

							// vertical_videos_section
							if (get_row_layout() == 'vertical_videos_section')
								get_template_part('parts/custom/vertical_videos_section');

							// video_section
							if (get_row_layout() == 'video_section')
								get_template_part('parts/custom/video_section');
							?>

					<?php endwhile;
					endif; ?>

				</div>

			</section> <!-- end article section -->
		</article> <!-- end article -->
	</div>
</main> <!-- end #main -->


<script>
	function adjustMarginTop() {
		const blogHeader = document.getElementById('blogHeader');
		if (blogHeader && blogHeader.querySelector('img.wp-post-image')) {
			const centeredDiv = document.getElementById('centeredDiv');
			const divHeight = centeredDiv.offsetHeight;
			centeredDiv.style.marginTop = `-${divHeight / 2}px`;
		}
	}
	document.addEventListener('DOMContentLoaded', adjustMarginTop);
	window.addEventListener('load', adjustMarginTop);
	window.addEventListener('resize', adjustMarginTop);
</script>

<?php get_template_part('parts/custom/footer_cta_resourcehub'); ?>

<?php get_footer(); ?>