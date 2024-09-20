<?php

/**
 * Template part for displaying posts
 * Used for single, index, archive, search.
 */
?>
<?php
$thisID = get_the_ID();
$post_type = get_post_type();
if ($post_type == 'post') {
	$hub_card_layout = 'bloglayout';
	$allcat = get_the_category();
	$topics = wp_get_post_terms($thisID, array('syncrotopic'));
} else {
	$hub_card_layout = 'reslayout';
	$allcat = wp_get_post_terms($thisID, array('resource-category'));
	$topics = wp_get_post_terms($thisID, array('resource-syncrotopic'));
}

$slugs = wp_list_pluck($allcat, 'slug');
$names = wp_list_pluck($allcat, 'name');
$class_names = join(' ', $slugs);
$catnames = join(' ', $names);
$thisCategory = '';
$thisCategorySlug = '';
if (!empty($allcat)) {
	$thisCategory =  esc_html($allcat[0]->name);
	$thisCategorySlug =  esc_html($allcat[0]->slug);
}

$filtered_topics = array_filter($topics, function ($term) {
	return !in_array($term->slug, ['hidden']);
});
$topicslugs = wp_list_pluck($filtered_topics, 'slug');
$tnames = wp_list_pluck($filtered_topics, 'name');
$topic_class_names = join(' ', $topicslugs);
$topicnames = join(', ', $tnames);

$resourceloop_bgimg = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>

<article id="post-<?php the_ID(); ?>" class="cell small-12 medium-6 large-4 mix
<?php if ($class_names) {
	echo ' ' . $class_names;
} ?> 
<?php if ($topic_class_names) {
	echo ' ' . $topic_class_names;
} ?> " role="article">

	<?php if ($thisCategorySlug == "advertisement") : ?>
		<div class="resitem hoverlift">
			<!--ADVERTISEMENT-->
			<?php if (get_field('ad_image')) : ?>
				<?php $link = get_field('ad_cta_link');
				if ($link) : $link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
				?>
					<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
						<?php $image = get_field('ad_image'); ?>
						<section title="<?php echo esc_attr($image['alt']); ?>" class="resitem-ad-image" style="background-image: url(<?php echo esc_url($image['url']); ?>);">
						</section>
					</a>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	<?php else : ?>
		<!--NOT AN ADVERTISEMENT-->


		<div class="resitem hoverlift bg-white">
			<a href="<?php the_permalink() ?>">
				<div class="resitem-img" <?php if (!empty($resourceloop_bgimg)) : ?>style="background-image:url('<?php echo $resourceloop_bgimg[0]; ?>')" <?php endif; ?>>
					<div class="resitem-img-overlay"></div>
				</div>
				<div class="resitem-content">
					<h6><?php printf(get_the_time(__('M j, Y', 'jointswp')),); ?> | <?php if ($hub_card_layout == 'bloglayout') : ?>By <?php echo get_the_author(); ?><?php else : ?><?php echo $thisCategory; ?><?php endif; ?></h6>
					<?php if (get_field('page_headline')) : ?>
						<h2><?php echo get_field('page_headline'); ?></h2>
					<?php else : ?>
						<h2><?php the_title(); ?></h2>
					<?php endif; ?>
					<?php if ($hub_card_layout == 'bloglayout') : ?>
						<h6 class="undertitle"><?php echo $topicnames; ?></h6>
					<?php else : ?>
					<?php endif; ?>
					<section class="resitem-content-content" itemprop="text">
						<?php if (get_field('post_excerpt')) : ?>
							<?php
							$excerpt = get_field('post_excerpt');
							// Get the length of the excerpt and limit it to 260 characters without allowing a break in the middle of a word
							if (strlen($excerpt) > 180) {
								$str = explode("\n", wordwrap($excerpt, 180));
								$str = $str[0] . '...';
								$excerpt = $str;
								echo $str;
							} else {
								echo $excerpt;
							}
							?>
						<?php else : ?>
							<?php
							$excerpt = wp_trim_words(get_the_content());
							// Get the length of the excerpt and limit it to 260 characters without allowing a break in the middle of a word
							if (strlen($excerpt) > 180) {
								$str = explode("\n", wordwrap($excerpt, 180));
								$str = $str[0] . '...';
								$excerpt = $str;
								echo $str;
							} else {
								echo $excerpt;
							}
							?>
						<?php endif; ?>
					</section> <!-- end article section -->
				</div>

				<div class="syncro-card-bottom">

					<?php if (get_field('archive_cta_override')) : ?>
						<h6>
							<?php if ($hub_card_layout == 'bloglayout') : ?>
								<?php if (get_field('read_length')) : ?>
									<?php echo get_field('read_length'); ?> Min Read
								<?php endif; ?>
							<?php else : ?>
								<?php echo $topicnames; ?>
							<?php endif; ?>
						</h6>
						<div class="syncro-link link-teal">
							<span><?php echo get_field('archive_cta_override'); ?>&nbsp;></span>
						</div>
					<?php else : ?>
						<h6>
							<?php if ($hub_card_layout == 'bloglayout') : ?>
								<?php if (get_field('read_length')) : ?>
									<?php echo get_field('read_length'); ?> Min Read
								<?php endif; ?>
							<?php else : ?>
								<?php echo $topicnames; ?>
							<?php endif; ?>
						</h6>
						<div class="syncro-link link-teal">
							<?php foreach ($allcat as $cat) : ?>
								<?php $ctalabel = get_field('cta_label', $cat); ?>
								<span><?php echo $ctalabel; ?>&nbsp;></span>
							<?php endforeach  ?>
						</div>
					<?php endif; ?>
				</div>
			</a>
		</div>

	<?php endif; ?>

</article> <!-- end article -->