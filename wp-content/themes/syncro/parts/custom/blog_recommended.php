<?php
$allcat = get_the_category();
$current_post_id = get_the_ID();
// Extract the category IDs from $allcat
if (!empty($allcat) && !is_wp_error($allcat)) {
	foreach ($allcat as $cat) {
		$category_ids[] = $cat->term_id;
	}
}
$args = array(
	'cat' => 'blog',
	'post_type' => 'post',
	'post_status' => 'publish',
	'posts_per_page' => 3,
	'orderby'         => 'date',
	'order'           => 'DESC',
	'category__in' => $category_ids,
	'post__not_in' => array($current_post_id),
	'tax_query' => array(
		array(
			'taxonomy' => 'syncrotopic',
			'terms' => 'hidden',
			'field' => 'slug',
			'include_children' => true,
			'operator' => 'NOT IN'
		)
	)
);
$resblock_query = new WP_Query($args); ?>
<?php if ($resblock_query->have_posts()) : ?>


	<section class="blog-recommended-posts bg-dark">
		<div class="grid-container">
			<div class="grid-x grid-margin-x all-posts">
				<?php if (get_field('global_blog_recommended_resources_headline', 'option')) : ?>
					<div class="cell small-12 content-before">
						<h3><?php echo get_field('global_blog_recommended_resources_headline', 'option'); ?></h3>
					</div>
				<?php endif; ?>

				<?php while ($resblock_query->have_posts()) : $resblock_query->the_post(); ?>
					<?php get_template_part('parts/loop', 'archive'); ?>
				<?php endwhile; ?>

			</div>
		</div>
	</section>

<?php endif; ?>