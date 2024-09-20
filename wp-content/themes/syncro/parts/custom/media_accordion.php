<?php
if (get_sub_field('background_color') == 'white') :
	$bgcolor = ('bg-white');
elseif (get_sub_field('background_color') == 'dark') :
	$bgcolor = ('bg-dark');
elseif (get_sub_field('background_color') == 'light') :
	$bgcolor = ('bg-light');
endif; ?>
<?php
$paddingoptions = get_sub_field('adjust_padding');
if ($paddingoptions && in_array('removetop', $paddingoptions)) {
	$toppadding = ('notoppadding');
} else {
	$toppadding = ('');
} ?>
<?php
$paddingoptions = get_sub_field('adjust_padding');
if ($paddingoptions && in_array('removebottom', $paddingoptions)) {
	$bottompadding = ('nobottompadding');
} else {
	$bottompadding = ('');
} ?>

<section id="<?php echo get_sub_field('anchor_tag'); ?>" class="media-accordion <?php echo $bgcolor; ?> <?php echo $toppadding; ?> <?php echo $bottompadding; ?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<?php if (get_sub_field('content_before_accordion')) : ?>
				<div class="cell content-before-accordion fader2">
					<?php echo get_sub_field('content_before_accordion'); ?>
				</div>
			<?php endif; ?>
			<div class="cell">
				<?php if (have_rows('accordions')) : $counter = 0; ?>
					<ul class="accordion fader2 bg-text-white" data-accordion data-multi-expand="true" data-allow-all-closed="true">
						<?php while (have_rows('accordions')) : the_row(); ?>
							<li class="accordion-item <?php if ($counter == 0) { ?> is-active first<?php } ?>" data-accordion-item>
								<a href="#" class="accordion-title">
									<h3><?php echo get_sub_field('accordion_title'); ?></h3>
								</a>
								<div class="accordion-content" data-tab-content>
									<?php if (have_rows('media')) : ?>
										<?php while (have_rows('media')) : the_row(); ?>

											<?php if (get_sub_field('media_type') == 'media') : ?>

												<?php $mrelease = get_sub_field('media_release_selector');
												if ($mrelease) :
													// override $post
													$post = $mrelease;
													setup_postdata($post);  ?>

													<a class="" href="<?php the_permalink() ?>" target="_blank">
														<?php wp_reset_postdata(); ?>
													<?php endif; ?>

													<div class="accordion-media grid-x align-top">
														<!--
															<div class="media-icon cell shrink">
															<?php $image = get_field('text_media_icon', 'option');
															if (!empty($image)) : ?>
																<img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
															<?php endif; ?>
														</div>
															-->

														<div class="media-content cell auto">
															<?php $mrelease = get_sub_field('media_release_selector');
															if ($mrelease) :
																// override $post
																$post = $mrelease;
																setup_postdata($post); ?>
																<h6>Media Release&ensp;|&ensp;<?php echo get_the_time('M j, Y'); ?></h6>
																<div class="grid-x">
																	<?php $image = get_field('text_media_icon', 'option');
																	if (!empty($image)) : ?>
																		<img class="cell shrink media-icon-inline lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
																	<?php endif; ?>
																	<h3 class="cell auto">
																		<?php the_title(); ?>
																	</h3>
																</div>
																<?php wp_reset_postdata(); ?>
															<?php endif; ?>
														</div>


													</div>
													</a>
												<?php else : ?>

													<?php $link = get_sub_field('media_link');
													if ($link) : $link_url = $link['url'];
														$link_title = $link['title'];
														$link_target = $link['target'] ? $link['target'] : '_self';
													?>
														<a class="" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
															<div class="accordion-media grid-x align-top">

																<div class="media-content cell auto">
																	<?php if (get_sub_field('media_source') or get_sub_field('media_date')) : ?>
																		<h6><?php echo get_sub_field('media_source'); ?><?php if (get_sub_field('media_source') and get_sub_field('media_date')) : ?>&ensp;|&ensp;<?php endif; ?><?php echo get_sub_field('media_date'); ?></h6>
																	<?php endif; ?>

																	<div class="grid-x">

																		<?php $image = get_field('text_media_icon', 'option');
																		if (!empty($image)) : ?>
																			<?php if (get_sub_field('media_type') == 'video') : ?>
																				<?php $image = get_field('video_media_icon', 'option');
																				if (!empty($image)) : ?>
																					<img class="cell shrink media-icon-inline lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
																				<?php endif; ?>
																			<?php elseif (get_sub_field('media_type') == 'audio') : ?>
																				<?php $image = get_field('audio_media_icon', 'option');
																				if (!empty($image)) : ?>
																					<img class="cell shrink media-icon-inline lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
																				<?php endif; ?>
																			<?php elseif (get_sub_field('media_type') == 'text') : ?>
																				<?php $image = get_field('text_media_icon', 'option');
																				if (!empty($image)) : ?>
																					<img class="cell shrink media-icon-inline lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
																				<?php endif; ?>
																			<?php endif; ?>
																		<?php endif; ?>

																		<?php if (get_sub_field('media_name')) : ?>
																			<h3 class="cell auto"><?php echo get_sub_field('media_name'); ?></h3>
																		<?php endif; ?>
																	</div>
																</div>


															</div>
														</a>
													<?php endif; ?>
												<?php endif; ?>
											<?php endwhile; ?>
										<?php endif; ?>
								</div>
							</li>
						<?php $counter++;
						endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>