<div class="entry-cta">
	<?php if (get_field('sidebar_cta_type') == 'none') : ?>
	<?php elseif (get_field('sidebar_cta_type') == 'custom') : ?>

		<?php if (have_rows('sidebar_cta')) : ?>
			<?php while (have_rows('sidebar_cta')) : the_row(); ?>
				<div class="entry-cta-item">
					<?php $image = get_sub_field('sidebar_cta_image');
					if (!empty($image)) : ?>
						<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					<?php endif; ?>
					<?php if (get_sub_field('sidebar_cta_headline')) : ?>
						<h4><?php echo get_sub_field('sidebar_cta_headline'); ?></h4>
					<?php endif; ?>
					<?php $link = get_sub_field('sidebar_cta_link');
					if ($link) : $link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
					?>
						<a class="syncro-button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
							<?php echo esc_html($link_title); ?>
						</a>
					<?php endif; ?>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>

	<?php else : /* global */ ?>

		<?php if (have_rows('global_sidebar_blog_cta', 'option')) : ?>
			<?php while (have_rows('global_sidebar_blog_cta', 'option')) : the_row(); ?>
				<div class="entry-cta-item">
					<?php $image = get_sub_field('global_sidebar_cta_image', 'option');
					if (!empty($image)) : ?>
						<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					<?php endif; ?>
					<?php if (get_sub_field('global_sidebar_cta_headline', 'option')) : ?>
						<h4><?php echo get_sub_field('global_sidebar_cta_headline', 'option'); ?></h4>
					<?php endif; ?>
					<?php $link = get_sub_field('global_sidebar_cta_link', 'option');
					if ($link) : $link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
					?>
						<a class="syncro-button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
							<?php echo esc_html($link_title); ?>
						</a>
					<?php endif; ?>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>

	<?php endif; ?>
</div>