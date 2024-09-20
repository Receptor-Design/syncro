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

<section id="<?php echo get_sub_field('anchor_tag'); ?>" class="pricing-table <?php echo $bgcolor; ?> <?php echo $toppadding; ?> <?php echo $bottompadding; ?>">

	<div class="grid-container">
		<div class="grid-x grid-margin-x">
			<div class="cell small-12">
				<div class="pricing-table-container bg-text-white">

					<?php if (get_sub_field('content_before_table')) : ?>
						<div class="content-before-table"><?php echo get_sub_field('content_before_table'); ?></div>
					<?php endif; ?>

					<?php if (get_sub_field('number_of_tiers') == 'one') : ?>
						<section class="pricing-table-start pricing-table-one">
							<div class="tier-row">
								<div class="tierx"></div>
								<?php if (have_rows('tier_names')) : ?>
									<?php while (have_rows('tier_names')) : the_row(); ?>
										<div class="tierone">
											<?php if (get_sub_field('tier_one_name')) : ?>
												<h3><?php echo get_sub_field('tier_one_name'); ?></h3>
											<?php endif; ?>
										</div>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>

							<div class="tier-row button-row">
								<div class="tierx"></div>
								<?php if (have_rows('tier_buttons')) : ?>
									<?php while (have_rows('tier_buttons')) : the_row(); ?>
										<div class="tierone">
											<?php $link = get_sub_field('tier_one_button');
											if ($link) : $link_url = $link['url'];
												$link_title = $link['title'];
												$link_target = $link['target'] ? $link['target'] : '_self';
											?>
												<a class="syncro-button <?php if (get_sub_field('tier_one_button_style')) : ?>button-outlines<?php else : ?>button-solid<?php endif; ?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
													<?php echo esc_html($link_title); ?>
												</a>
											<?php endif; ?>
										</div>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>

							<?php if (have_rows('feature_groups')) : ?>
								<div class="table-container">
									<?php while (have_rows('feature_groups')) : the_row(); ?>
										<?php if (get_sub_field('feature_group_name')) : ?>
											<div class="feature-group">
												<h4><?php echo get_sub_field('feature_group_name'); ?></h4>
											</div>
										<?php endif; ?>

										<?php if (have_rows('feature_items')) : ?>
											<div class="feature-rows">
												<?php while (have_rows('feature_items')) : the_row(); ?>
													<div class="feature-row">
														<div class="tierx">
															<?php if (get_sub_field('feature_name')) : ?>
																<h4><?php echo get_sub_field('feature_name'); ?></h4>
															<?php endif; ?>
															<?php if (get_sub_field('feature_description')) : ?>
																<p><?php echo get_sub_field('feature_description', false, false); ?></p>
															<?php endif; ?>
														</div>
														<div class="tierone">
															<?php if (get_sub_field('tier_one_input') == 'checkmark') : ?>
																<img class="yesmark" src="<?php echo get_template_directory_uri(); ?>/assets/images/checkmark.svg">
															<?php elseif (get_sub_field('tier_one_input') == 'custom') : ?>
																<?php if (get_sub_field('tier_one_custom_input')) : ?>
																	<p><?php echo get_sub_field('tier_one_custom_input', false, false); ?></p>
																<?php endif; ?>
															<?php else : ?>
															<?php endif; ?>
														</div>
													</div>
												<?php endwhile; ?>
											</div>
										<?php endif; ?>
									<?php endwhile; ?>
								</div>
							<?php endif; ?>

						</section>
					<?php elseif (get_sub_field('number_of_tiers') == 'two') : ?>
						<section class="pricing-table-start pricing-table-two">
							<div class="tier-row">
								<div class="tierx"></div>
								<?php if (have_rows('tier_names')) : ?>
									<?php while (have_rows('tier_names')) : the_row(); ?>
										<div class="tierone">
											<?php if (get_sub_field('tier_one_name')) : ?>
												<h3><?php echo get_sub_field('tier_one_name'); ?></h3>
											<?php endif; ?>
										</div>
										<div class="tiertwo">
											<?php if (get_sub_field('tier_two_name')) : ?>
												<h3><?php echo get_sub_field('tier_two_name'); ?></h3>
											<?php endif; ?>
										</div>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>

							<div class="tier-row button-row">
								<div class="tierx"></div>
								<?php if (have_rows('tier_buttons')) : ?>
									<?php while (have_rows('tier_buttons')) : the_row(); ?>
										<div class="tierone">
											<?php $link = get_sub_field('tier_one_button');
											if ($link) : $link_url = $link['url'];
												$link_title = $link['title'];
												$link_target = $link['target'] ? $link['target'] : '_self';
											?>
												<a class="syncro-button <?php if (get_sub_field('tier_one_button_style')) : ?>button-outlines<?php else : ?>button-solid<?php endif; ?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
													<?php echo esc_html($link_title); ?>
												</a>
											<?php endif; ?>
										</div>
										<div class="tiertwo">
											<?php $link = get_sub_field('tier_two_button');
											if ($link) : $link_url = $link['url'];
												$link_title = $link['title'];
												$link_target = $link['target'] ? $link['target'] : '_self';
											?>
												<a class="syncro-button <?php if (get_sub_field('tier_two_button_style')) : ?>button-outlines<?php else : ?>button-solid<?php endif; ?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
													<?php echo esc_html($link_title); ?>
												</a>
											<?php endif; ?>
										</div>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>

							<?php if (have_rows('feature_groups')) : ?>
								<div class="table-container">
									<?php while (have_rows('feature_groups')) : the_row(); ?>
										<?php if (get_sub_field('feature_group_name')) : ?>
											<div class="feature-group">
												<h4><?php echo get_sub_field('feature_group_name'); ?></h4>
											</div>
										<?php endif; ?>

										<?php if (have_rows('feature_items')) : ?>
											<div class="feature-rows">
												<?php while (have_rows('feature_items')) : the_row(); ?>
													<div class="feature-row">
														<div class="tierx">
															<?php if (get_sub_field('feature_name')) : ?>
																<h4><?php echo get_sub_field('feature_name'); ?><?php if (get_sub_field('feature_description')) : ?><span class="tooltipicon"><img alt="information icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/info-icon.svg">
																		<span class="tooltiptext"><?php echo get_sub_field('feature_description', false, false); ?></span>
																	</span>

																<?php endif; ?>


																</h4>
															<?php endif; ?>
														</div>
														<div class="tierone">
															<?php if (get_sub_field('tier_one_input') == 'checkmark') : ?>
																<img class="yesmark" src="<?php echo get_template_directory_uri(); ?>/assets/images/checkmark.svg">
															<?php elseif (get_sub_field('tier_one_input') == 'custom') : ?>
																<?php if (get_sub_field('tier_one_custom_input')) : ?>
																	<p><?php echo get_sub_field('tier_one_custom_input', false, false); ?></p>
																<?php endif; ?>
															<?php else : ?>
															<?php endif; ?>
														</div>
														<div class="tiertwo">
															<?php if (get_sub_field('tier_two_input') == 'checkmark') : ?>
																<img class="yesmark" src="<?php echo get_template_directory_uri(); ?>/assets/images/checkmark.svg">
															<?php elseif (get_sub_field('tier_two_input') == 'custom') : ?>
																<?php if (get_sub_field('tier_two_custom_input')) : ?>
																	<p><?php echo get_sub_field('tier_two_custom_input', false, false); ?></p>
																<?php endif; ?>
															<?php else : ?>
															<?php endif; ?>
														</div>
													</div>
												<?php endwhile; ?>
											</div>
										<?php endif; ?>

									<?php endwhile; ?>
								</div>
							<?php endif; ?>

						</section>
					<?php elseif (get_sub_field('number_of_tiers') == 'three') : ?>
						<section class="pricing-table-start pricing-table-three">
							<div class="tier-row">
								<div class="tierx"></div>
								<?php if (have_rows('tier_names')) : ?>
									<?php while (have_rows('tier_names')) : the_row(); ?>
										<div class="tierone">
											<?php if (get_sub_field('tier_one_name')) : ?>
												<h3><?php echo get_sub_field('tier_one_name'); ?></h3>
											<?php endif; ?>
										</div>
										<div class="tiertwo">
											<?php if (get_sub_field('tier_two_name')) : ?>
												<h3><?php echo get_sub_field('tier_two_name'); ?></h3>
											<?php endif; ?>
										</div>
										<div class="tierthree">
											<?php if (get_sub_field('tier_three_name')) : ?>
												<h3><?php echo get_sub_field('tier_three_name'); ?></h3>
											<?php endif; ?>
										</div>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>

							<div class="tier-row button-row">
								<div class="tierx"></div>
								<?php if (have_rows('tier_buttons')) : ?>
									<?php while (have_rows('tier_buttons')) : the_row(); ?>
										<div class="tierone">
											<?php $link = get_sub_field('tier_one_button');
											if ($link) : $link_url = $link['url'];
												$link_title = $link['title'];
												$link_target = $link['target'] ? $link['target'] : '_self';
											?>
												<a class="syncro-button <?php if (get_sub_field('tier_one_button_style')) : ?>button-outlines<?php else : ?>button-solid<?php endif; ?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
													<?php echo esc_html($link_title); ?>
												</a>
											<?php endif; ?>
										</div>
										<div class="tiertwo">
											<?php $link = get_sub_field('tier_two_button');
											if ($link) : $link_url = $link['url'];
												$link_title = $link['title'];
												$link_target = $link['target'] ? $link['target'] : '_self';
											?>
												<a class="syncro-button <?php if (get_sub_field('tier_two_button_style')) : ?>button-outlines<?php else : ?>button-solid<?php endif; ?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
													<?php echo esc_html($link_title); ?>
												</a>
											<?php endif; ?>
										</div>
										<div class="tierthree">
											<?php $link = get_sub_field('tier_three_button');
											if ($link) : $link_url = $link['url'];
												$link_title = $link['title'];
												$link_target = $link['target'] ? $link['target'] : '_self';
											?>
												<a class="syncro-button <?php if (get_sub_field('tier_three_button_style')) : ?>button-outlines<?php else : ?>button-solid<?php endif; ?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
													<?php echo esc_html($link_title); ?>
												</a>
											<?php endif; ?>
										</div>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>

							<?php if (have_rows('feature_groups')) : ?>
								<div class="table-container">
									<?php while (have_rows('feature_groups')) : the_row(); ?>
										<?php if (get_sub_field('feature_group_name')) : ?>
											<div class="feature-group">
												<h4><?php echo get_sub_field('feature_group_name'); ?></h4>
											</div>
										<?php endif; ?>

										<?php if (have_rows('feature_items')) : ?>
											<div class="feature-rows">
												<?php while (have_rows('feature_items')) : the_row(); ?>
													<div class="feature-row">
														<div class="tierx">
															<?php if (get_sub_field('feature_name')) : ?>
																<h4><?php echo get_sub_field('feature_name'); ?></h4>
															<?php endif; ?>
															<?php if (get_sub_field('feature_description')) : ?>
																<p><?php echo get_sub_field('feature_description', false, false); ?></p>
															<?php endif; ?>
														</div>
														<div class="tierone">
															<?php if (get_sub_field('tier_one_input') == 'checkmark') : ?>
																<img class="yesmark" src="<?php echo get_template_directory_uri(); ?>/assets/images/checkmark.svg">
															<?php elseif (get_sub_field('tier_one_input') == 'custom') : ?>
																<?php if (get_sub_field('tier_one_custom_input')) : ?>
																	<p><?php echo get_sub_field('tier_one_custom_input', false, false); ?></p>
																<?php endif; ?>
															<?php else : ?>
															<?php endif; ?>
														</div>
														<div class="tiertwo">
															<?php if (get_sub_field('tier_two_input') == 'checkmark') : ?>
																<img class="yesmark" src="<?php echo get_template_directory_uri(); ?>/assets/images/checkmark.svg">
															<?php elseif (get_sub_field('tier_two_input') == 'custom') : ?>
																<?php if (get_sub_field('tier_two_custom_input')) : ?>
																	<p><?php echo get_sub_field('tier_two_custom_input', false, false); ?></p>
																<?php endif; ?>
															<?php else : ?>
															<?php endif; ?>
														</div>
														<div class="tierthree">
															<?php if (get_sub_field('tier_three_input') == 'checkmark') : ?>
																<img class="yesmark" src="<?php echo get_template_directory_uri(); ?>/assets/images/checkmark.svg">
															<?php elseif (get_sub_field('tier_three_input') == 'custom') : ?>
																<?php if (get_sub_field('tier_three_custom_input')) : ?>
																	<p><?php echo get_sub_field('tier_three_custom_input', false, false); ?></p>
																<?php endif; ?>
															<?php else : ?>
															<?php endif; ?>
														</div>

													</div>
												<?php endwhile; ?>
											</div>
										<?php endif; ?>

									<?php endwhile; ?>
								</div>
							<?php endif; ?>

						</section>
					<?php endif; ?>

					<?php if (get_sub_field('content_after_table')) : ?>
						<div class="content-after-table"><?php echo get_sub_field('content_after_table'); ?></div>
					<?php endif; ?>

				</div>
			</div>
		</div>
	</div>

</section>