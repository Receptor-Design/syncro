<?php

/**
 * Template part for displaying a single post
 */
$thisID = get_the_ID();
$allcat = get_the_category();
?>

<main class="single-blog grid-container closer-container">
	<div class="grid-x grid-padding-x align-center">
		<article id="post-<?php the_ID(); ?>" class="post-item cell small-12" role="article" itemscope itemtype="http://schema.org/BlogPosting">
			<section class="post-header text-center fader">
				<p class="h6">
					<?php foreach ($allcat as $cat) : ?>
						<a href="/<?php echo $cat->slug; ?>" class="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></a>
						<!--<span class="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></span>-->
						<?php endforeach; ?><?php $topics = wp_get_post_terms($thisID, array('syncrotopic')); ?><?php if ($topics) : ?>&ensp;|&ensp;<?php endif; ?><?php foreach ($topics as $topic) : ?>
						<!--<a href="/<?php echo $topic->slug; ?>" class="<?php echo $topic->slug; ?>"><?php echo $topic->name; ?></a><span>,</span>-->
						<span class="<?php echo $topic->slug; ?>"><?php echo $topic->name; ?></span><span>,</span>
					<?php endforeach; ?>
				</p>
				<h1 class="single-title" itemprop="headline"><strong><?php the_title(); ?></strong></h1>

				<p class="byline <?php foreach ($allcat as $cat) : ?>catcheck-<?php echo $cat->slug; ?><?php endforeach; ?>">
					<?php echo get_the_author(); ?>&ensp;|&ensp;<?php echo get_the_time('M j, Y'); ?>
				</p>
			</section> <!-- end article header -->
			<section class="blog-thumbnail text-center fader">
				<?php if (get_field('hide_featured_image_on_post')) : ?>
				<?php else : ?>
					<?php the_post_thumbnail('full'); ?>
					<p class="post-thumb-caption"><?php the_post_thumbnail_caption(''); ?></p>
				<?php endif; ?>
			</section>
			<section class="entry-content fader2" itemprop="text">
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

						<?php // accordion_section
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
			</section> <!-- end article section -->
		</article> <!-- end article -->
	</div>
</main> <!-- end #main -->

<section class="blog-author-block bg-dark <?php foreach ($allcat as $cat) : ?>catcheck-<?php echo $cat->slug; ?><?php endforeach; ?>">
	<div class="grid-container closer-container fader">
		<div class="grid-x grid-padding-x align-middle">
			<?php $author_id = get_the_author_meta('ID'); ?>
			<?php $image = get_field('author_headshot', 'user_' . $author_id);
			if (!empty($image)) : ?>
				<div class="cell shrink">
					<div class="author-headshot-container">
						<img class="author-headshot lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					</div>
				</div>
			<?php endif; ?>

			<div class="cell auto author-content">
				<h3><?php echo get_the_author(); ?>
					<?php $linkedin = get_field('author_linkedin', 'user_' . $author_id);
					if (!empty($linkedin)) : ?>
						<a href="<?php echo get_field('author_linkedin', 'user_' . $author_id); ?>" target="_blank" rel="nofollow">
							<img class="authorsocial lozad" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/syncro_social-linkedin.svg)">
						</a>
					<?php endif; ?>
					<?php $twitter = get_field('author_twitter', 'user_' . $author_id);
					if (!empty($twitter)) : ?>
						<a href="<?php echo get_field('author_twitter', 'user_' . $author_id); ?>" target="_blank" rel="nofollow">
							<img class="authorsocial lozad" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/syncro_social-twitter.svg)">
						</a>
					<?php endif; ?>
				</h3>
				<?php echo get_field('author_description', 'user_' . $author_id); ?>
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
</section>

<?php comments_template(); ?>