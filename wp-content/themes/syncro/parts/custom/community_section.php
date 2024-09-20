<?php if (get_sub_field('include_top_background_transition')) : ?>
	<?php if (get_sub_field('top_transition_background_color') == 'white') : ?>
		<div class="bg-white community-top-trans"></div>
	<?php elseif (get_sub_field('top_transition_background_color') == 'dark') : ?>
		<div class="bg-dark community-top-trans"></div>
	<?php elseif (get_sub_field('top_transition_background_color') == 'light') : ?>
		<div class="bg-light community-top-trans"></div>
	<?php endif; ?>
<?php endif; ?>

<section id="<?php echo get_sub_field('anchor_tag'); ?>" class="community-section">
	<?php if (get_sub_field('include_top_background_transition')) : ?>
		<?php if (get_sub_field('top_transition_background_color') == 'white') : ?>
			<img class="community-transition" src="<?php echo get_template_directory_uri(); ?>/assets/images/transition-shapes/revcurvetransition-whitetop.svg)">
		<?php elseif (get_sub_field('top_transition_background_color') == 'dark') : ?>
			<img class="community-transition" src="<?php echo get_template_directory_uri(); ?>/assets/images/transition-shapes/revcurvetransition-bluetop.svg)">
		<?php elseif (get_sub_field('top_transition_background_color') == 'light') : ?>
			<img class="community-transition" src="<?php echo get_template_directory_uri(); ?>/assets/images/transition-shapes/revcurvetransition-lighttop.svg)">
		<?php endif; ?>
	<?php endif; ?>

	<?php if (have_rows('community_images')) : $counter = 0; ?>
		<div class="community-image-container fader">
			<?php while (have_rows('community_images')) : the_row(); ?>
				<?php $image = get_sub_field('community_image');
				if (!empty($image)) : ?>

					<?php if ($counter == 0) : ?>
						<div class="community-image community-image-<?php echo get_row_index(); ?> rellax" data-rellax-speed="1">
						<?php elseif ($counter == 1) : ?>
							<div class="community-image community-image-<?php echo get_row_index(); ?> rellax" data-rellax-speed="3">
							<?php elseif ($counter == 2) : ?>
								<div class="community-image community-image-<?php echo get_row_index(); ?> rellax" data-rellax-speed="2">
								<?php elseif ($counter == 3) : ?>
									<div class="community-image community-image-<?php echo get_row_index(); ?> rellax" data-rellax-speed="1">
									<?php elseif ($counter == 4) : ?>
										<div class="community-image community-image-<?php echo get_row_index(); ?> rellax" data-rellax-speed="2">
										<?php endif; ?>
										<div class="comminity-image-inner">
											<img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
										</div>
										<?php if ($counter == 0) : ?>
										</div>
									<?php elseif ($counter == 1) : ?>
									</div>
								<?php elseif ($counter == 2) : ?>
								</div>
							<?php elseif ($counter == 3) : ?>
							</div>
						<?php elseif ($counter == 4) : ?>
						</div>
					<?php endif; ?>
				<?php endif; ?>
			<?php $counter++;
			endwhile; ?>
		</div>
	<?php endif; ?>

	<div class="grid-container closer-container split-container">
		<div class="grid-x grid-padding-x align-center fader">
			<div class="cell small-12 medium-6 large-6">
				<div class="left-headline-content">
					<?php if (get_sub_field('subhead')) : ?>
						<h6><?php echo get_sub_field('subhead'); ?></h6>
					<?php endif; ?>
					<?php if (get_sub_field('headline')) : ?>
						<h2 class="darktext"><?php echo get_sub_field('headline'); ?></h2>
					<?php endif; ?>
				</div>
			</div>

			<div class="cell small-12 medium-6 large-6">
				<div class="right-content-content">

					<?php if (get_sub_field('content_section')) : ?>
						<?php echo get_sub_field('content_section'); ?>
					<?php endif; ?>
					<?php $link = get_sub_field('link_after_content');
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