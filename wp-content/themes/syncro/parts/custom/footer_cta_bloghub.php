<?php if (get_field('anchor_tag')) : ?>
	<?php $anchor = (get_field('anchor_tag')); ?>
<?php else : ?>
	<?php $anchor = (''); ?>
<?php endif; ?>

<?php if (get_field('use_custom_footer_cta')) : ?>

	<?php if (get_field('show_footer_cta')) : ?>
		<section id="<?php echo $anchor; ?>" class="footer-cta footer-cta-custom">
			<div class="grid-container closer-container fader">
				<div class="grid-x grid-padding-x align-middle">
					<?php if (get_field('footer_cta_type') == 'onebutton') : ?>
						<div class="cell auto">

							<h2 class="darktext"><?php echo get_field('cta_headline'); ?></h2>
							<div class="cta-body darktext"><?php echo get_field('cta_body'); ?></div>

						</div>
						<div class="cell small-12 medium-shrink button-container">
							<?php $link = get_field('cta_button');
							if ($link) : $link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
							?>
								<a class="syncro-button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
									<?php echo esc_html($link_title); ?>
								</a>
							<?php endif; ?>
						</div>
					<?php elseif (get_field('footer_cta_type') == 'multibutton') : ?>
						<div class="cell text-center">

							<h2 class="darktext"><?php echo get_field('cta_headline'); ?></h2>
							<div class="cta-body darktext"><?php echo get_field('cta_body'); ?></div>

						</div>
						<div class="cell text-center button-container">
							<?php if (have_rows('cta_buttons')) : ?>
								<?php while (have_rows('cta_buttons')) : the_row(); ?>
									<?php $link = get_sub_field('button');
									if ($link) : $link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
									?>
										<a class="syncro-button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
											<?php echo esc_html($link_title); ?>
										</a>
									<?php endif; ?>
								<?php endwhile; ?>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

<?php else : ?>
	<?php if (get_field('use_custom_footer_cta_on_blog_hub', 'option')) : ?>
		<?php if (get_field('show_footer_cta_blog_hub', 'option')) : ?>
			<section class="footer-cta footer-cta-custom">
				<div class="grid-container closer-container">
					<div class="grid-x grid-padding-x align-middle">
						<?php if (get_field('footer_cta_type_blog_hub', 'option') == 'onebutton') : ?>
							<div class="cell auto">

								<h2 class="darktext"><?php echo get_field('cta_headline_blog_hub', 'option'); ?></h2>
								<div class="cta-body darktext"><?php echo get_field('cta_body_blog_hub', 'option'); ?></div>

							</div>
							<div class="cell small-12 medium-shrink button-container">
								<?php $link = get_field('cta_button_blog_hub', 'option');
								if ($link) : $link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';
								?>
									<a class="syncro-button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
										<?php echo esc_html($link_title); ?>
									</a>
								<?php endif; ?>
							</div>
						<?php elseif (get_field('footer_cta_type_blog_hub', 'option') == 'multibutton') : ?>
							<div class="cell text-center">

								<h2 class="darktext"><?php echo get_field('cta_headline_blog_hub', 'option'); ?></h2>
								<div class="cta-body darktext"><?php echo get_field('cta_body_blog_hub', 'option'); ?></div>

							</div>
							<div class="cell text-center button-container">
								<?php if (have_rows('cta_buttons_blog_hub', 'option')) : ?>
									<?php while (have_rows('cta_buttons_blog_hub', 'option')) : the_row(); ?>
										<?php $link = get_sub_field('button_blog_hub', 'option');
										if ($link) : $link_url = $link['url'];
											$link_title = $link['title'];
											$link_target = $link['target'] ? $link['target'] : '_self';
										?>
											<a class="syncro-button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
												<?php echo esc_html($link_title); ?>
											</a>
										<?php endif; ?>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</section>
		<?php endif; ?>
	<?php else : ?>
		<?php if (get_field('show_footer_cta_globally', 'option')) : ?>
			<section class="footer-cta footer-cta-global">
				<div class="grid-container closer-container fader">
					<div class="grid-x grid-padding-x align-middle">
						<?php if (get_field('global_footer_cta_type', 'option') == 'gonebutton') : ?>
							<div class="cell auto">

								<h2 class="darktext"><?php echo get_field('global_cta_headline', 'option'); ?></h2>
								<div class="cta-body darktext"><?php echo get_field('global_cta_body', 'option'); ?></div>

							</div>
							<div class="cell small-12 medium-shrink button-container">
								<?php $link = get_field('global_cta_button', 'option');
								if ($link) : $link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';
								?>
									<a class="syncro-button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
										<?php echo esc_html($link_title); ?>
									</a>
								<?php endif; ?>
							</div>
						<?php elseif (get_field('global_footer_cta_type', 'option') == 'gmultibutton') : ?>
							<div class="cell text-center">

								<h2 class="darktext"><?php echo get_field('global_cta_headline', 'option'); ?></h2>
								<div class="cta-body darktext"><?php echo get_field('global_cta_body', 'option'); ?></div>

							</div>
							<div class="cell text-center button-container">
								<?php if (have_rows('global_cta_buttons', 'option')) : ?>
									<?php while (have_rows('global_cta_buttons', 'option')) : the_row(); ?>
										<?php $link = get_sub_field('global_button', 'option');
										if ($link) : $link_url = $link['url'];
											$link_title = $link['title'];
											$link_target = $link['target'] ? $link['target'] : '_self';
										?>
											<a class="syncro-button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
												<?php echo esc_html($link_title); ?>
											</a>
										<?php endif; ?>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</section>
		<?php endif; ?>
	<?php endif; ?>
<?php endif; ?>