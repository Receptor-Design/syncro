<?php
if (get_sub_field('background_color') == 'white') :
	$bgcolor = ('bg-white');
elseif (get_sub_field('background_color') == 'dark') :
	$bgcolor = ('bg-dark');
elseif (get_sub_field('background_color') == 'light') :
	$bgcolor = ('bg-light');
endif; ?>

<?php if (get_sub_field('overlap_section_above')) : ?>
	<?php if (get_sub_field('pricing_toggle_location') == 'above') : ?>
		<?php $overlap = ('overlap-above-more'); ?>
	<?php else : ?>
		<?php $overlap = ('overlap-above'); ?>
	<?php endif; ?>
<?php else : ?>
	<?php $overlap = (''); ?>
<?php endif; ?>

<?php if (get_sub_field('pricing_toggle_location') == 'above') : ?>
	<?php $togglelocation = ('toggle-above'); ?>
<?php elseif (get_sub_field('pricing_toggle_location') == 'inblock') : ?>
	<?php $togglelocation = ('toggle-inblock'); ?>
<?php elseif (get_sub_field('pricing_toggle_location') == 'none') : ?>
	<?php $togglelocation = ('toggle-none'); ?>
<?php else : ?>
	<?php $togglelocation = ('toggle-inblock'); ?>
<?php endif; ?>

<?php if (get_sub_field('pricing_blocks_per_row') == 'one') : ?>
	<?php $perrow = ('small-12'); ?>
<?php elseif (get_sub_field('pricing_blocks_per_row') == 'two') : ?>
	<?php $perrow = ('small-12 medium-6'); ?>
<?php elseif (get_sub_field('pricing_blocks_per_row') == 'three') : ?>
	<?php $perrow = ('small-12 medium-6 large-4'); ?>
<?php endif; ?>




<?php if (get_sub_field('include_sale_price')) : ?>
	<?php $includesale = ('true'); ?>
<?php else : ?>
	<?php $includesale = ('false'); ?>
<?php endif; ?>

<?php if (get_sub_field('include_all_features_link')) : ?>
	<?php $showlink = ('showpop'); ?>
	<?php $link = get_sub_field('all_features_link');
	if ($link) :
		$show_link_url = $link['url'];
		$show_link_title = $link['title'];
		$show_link_target = $link['target'] ? $link['target'] : '_self';
	?>
	<?php endif; ?>
<?php else : ?>
	<?php $showlink = (''); ?>
<?php endif; ?>

<?php if (get_sub_field('include_all_features_pop-ups')) : ?>
	<?php $showpop = ('showpop'); ?>
	<?php $popuplabel = (get_sub_field('all_features_label')); ?>
<?php else : ?>
	<?php $showpop = ('nopop'); ?>
	<?php $popuplabel = (''); ?>
<?php endif; ?>

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







<section id="<?php echo get_sub_field('anchor_tag'); ?>" class="pricing-section <?php echo $bgcolor; ?> <?php if (get_sub_field('overlap_section_above')) : ?><?php echo $overlap; ?><?php else : ?><?php echo $toppadding; ?><?php endif; ?> <?php echo $bottompadding; ?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x text-center align-center fader">

			<?php if ($togglelocation == 'toggle-above') : ?>
				<div class="cell">
					<div class="toggleswitch-top">
						<input type="checkbox" id="switch-all" />
						<label style="display: inline-block;" for="switch-all">
							<p class="annual-label enabled">Annual</p>
							<p class="monthly-label">Monthly</p>
						</label>
					</div>
				</div>
				<script>
					jQuery('#switch-all').change(function() {
						if (jQuery(this).is(":checked")) {
							jQuery('.offtext-1').removeClass("visible");
							jQuery('.ontext-1').addClass("visible");
							jQuery('.offtext-2').removeClass("visible");
							jQuery('.ontext-2').addClass("visible");
							jQuery('.annual-label').removeClass("enabled");
							jQuery('.monthly-label').addClass("enabled");
						} else {
							jQuery('.offtext-1').addClass("visible");
							jQuery('.ontext-1').removeClass("visible");
							jQuery('.offtext-2').addClass("visible");
							jQuery('.ontext-2').removeClass("visible");
							jQuery('.annual-label').addClass("enabled");
							jQuery('.monthly-label').removeClass("enabled");
						}
					});
				</script>
			<?php endif; ?>

			<?php if (have_rows('pricing_blocks')) : ?>
				<?php while (have_rows('pricing_blocks')) : the_row(); ?>



					<?php if (get_sub_field('pricing_block_color')) : ?>
						<?php $pricecolor = ('pricing-magenta'); ?>
					<?php else : ?>
						<?php $pricecolor = ('pricing-teal'); ?>
					<?php endif; ?>

					<?php if (get_sub_field('pricing_block_color') == '0') : ?>
						<?php $pricecolor = ('pricing-teal'); ?>
					<?php elseif (get_sub_field('pricing_block_color') == '1') : ?>
						<?php $pricecolor = ('pricing-magenta'); ?>
					<?php elseif (get_sub_field('pricing_block_color') == '2') : ?>
						<?php $pricecolor = ('pricing-teal-outline'); ?>
					<?php else : ?>
						<?php $pricecolor = ('pricing-magenta'); ?>
					<?php endif; ?>



					<div class="cell cell-priceblock <?php echo $perrow; ?> ">

						<div class="priceblock <?php echo $pricecolor; ?>">
							<?php if (get_sub_field('pricing_upper_label')) : ?>
								<p class="pricing-upper-label"><?php echo get_sub_field('pricing_upper_label'); ?></p>
							<?php endif; ?>

							<?php if (get_sub_field('pricing_title')) : ?>
								<h2 class="pricing-title"><?php echo get_sub_field('pricing_title'); ?></h2>
							<?php endif; ?>
							<?php if (get_sub_field('pricing_description')) : ?>
								<p class="pricing-desc"><?php echo get_sub_field('pricing_description'); ?></p>
							<?php endif; ?>

							<?php if (get_sub_field('show_pricing')) : ?>
								<div class="price-toggle-container">
									<?php $rownumber = get_row_index(); ?>

									<?php if ($togglelocation != 'toggle-none') : ?>

										<?php if (have_rows('pricing_toggle_content')) : ?>
											<?php while (have_rows('pricing_toggle_content')) : the_row(); ?>

												<h3 class="price-onoff-num">

													<?php if ($includesale == 'true') : ?>
														<?php if (get_sub_field('off_sale_price')) : ?>
															<span class="saleprice onofftext offtext-<?php echo $rownumber; ?> visible">
																<?php if (get_sub_field('off_sale_promo_label')) : ?>
																	<span class="salepriceinner">
																		<span class="salelabel"><?php echo get_sub_field('off_sale_promo_label'); ?></span>
																		<sup>$</sup><?php echo get_sub_field('off_sale_price'); ?>
																	</span>
																<?php else : ?>
																	<sup>$</sup><?php echo get_sub_field('off_sale_price'); ?>
																<?php endif; ?>
															</span>
														<?php endif; ?>

														<?php if (get_sub_field('on_sale_price')) : ?>
															<span class="saleprice onofftext ontext-<?php echo $rownumber; ?>">
																<?php if (get_sub_field('on_sale_promo_label')) : ?>
																	<span class="salepriceinner">
																		<span class="salelabel"><?php echo get_sub_field('on_sale_promo_label'); ?></span>
																		<sup>$</sup><?php echo get_sub_field('on_sale_price'); ?>
																	</span>
																<?php else : ?>
																	<sup>$</sup><?php echo get_sub_field('on_sale_price'); ?>
																<?php endif; ?>
															</span>
														<?php endif; ?>
													<?php endif; ?>

													<span class="<?php if ($includesale == 'true') : ?><?php if (get_sub_field('off_sale_price')) : ?>onsalecross<?php endif; ?><?php endif; ?> onofftext offtext-<?php echo $rownumber; ?> visible"><sup>$</sup><?php echo get_sub_field('off_price'); ?></span>
													<span class="<?php if ($includesale == 'true') : ?><?php if (get_sub_field('on_sale_price')) : ?>onsalecross<?php endif; ?><?php endif; ?> onofftext ontext-<?php echo $rownumber; ?>"><sup>$</sup><?php echo get_sub_field('on_price'); ?></span>
												</h3>

												<p class="price-onoff-desc">
													<span class="onofftext offtext-<?php echo $rownumber; ?> visible"><?php echo get_sub_field('off_description'); ?></span>
													<span class="onofftext ontext-<?php echo $rownumber; ?>"><?php echo get_sub_field('on_description'); ?></span>
												</p>


												<?php if ($togglelocation != 'toggle-above') : ?>
													<div class="toggleswitch">
														<?php if (get_sub_field('off_toggle_label')) : ?>
															<p class="offtext-<?php echo $rownumber; ?> visible"><?php echo get_sub_field('off_toggle_label'); ?></p>
														<?php endif; ?>
														<?php if (get_sub_field('on_toggle_label')) : ?>
															<p class="ontext-<?php echo $rownumber; ?>"><?php echo get_sub_field('on_toggle_label'); ?></p>
														<?php endif; ?>
														<input type="checkbox" id="switch-<?php echo $rownumber; ?>" />
														<label style="display: inline-block;" for="switch-<?php echo $rownumber; ?>">Toggle</label>
													</div>
													<script>
														jQuery('#switch-<?php echo $rownumber; ?>').change(function() {
															if (jQuery(this).is(":checked")) {
																jQuery('.offtext-<?php echo $rownumber; ?>').removeClass("visible");
																jQuery('.ontext-<?php echo $rownumber; ?>').addClass("visible");
															} else {
																jQuery('.offtext-<?php echo $rownumber; ?>').addClass("visible");
																jQuery('.ontext-<?php echo $rownumber; ?>').removeClass("visible");
															}
														});
													</script>
												<?php endif; ?>
											<?php endwhile; ?>
										<?php endif; ?>
									<?php endif; ?>


									<?php if ($togglelocation == 'toggle-none') : ?>
										<?php if (have_rows('pricing_toggle_content_single')) : ?>
											<?php while (have_rows('pricing_toggle_content_single')) : the_row(); ?>

												<h3 class="price-onoff-num">
													<?php if ($includesale == 'true') : ?>
														<?php if (get_sub_field('sale_price')) : ?>
															<span class="saleprice onofftext offtext-<?php echo $rownumber; ?> visible">
																<?php if (get_sub_field('sale_promo_label')) : ?>
																	<span class="salepriceinner">
																		<span class="salelabel"><?php echo get_sub_field('sale_promo_label'); ?></span>
																		<sup>$</sup><?php echo get_sub_field('sale_price'); ?>
																	</span>
																<?php else : ?>
																	<sup>$</sup><?php echo get_sub_field('sale_price'); ?>
																<?php endif; ?>
															</span>
														<?php endif; ?>
													<?php endif; ?>
													<span class="<?php if ($includesale == 'true') : ?><?php if (get_sub_field('sale_price')) : ?>onsalecross<?php endif; ?><?php endif; ?> onofftext offtext-<?php echo $rownumber; ?> visible"><sup>$</sup><?php echo get_sub_field('price'); ?></span>
												</h3>

												<p class="price-onoff-desc">
													<span class="onofftext offtext-<?php echo $rownumber; ?> visible"><?php echo get_sub_field('description'); ?></span>
												</p>

											<?php endwhile; ?>
										<?php endif; ?>



									<?php endif; ?>


















								</div>
							<?php else : ?>
								<div class="price-toggle-buffer" style="margin-bottom: 2rem;"></div>
							<?php endif; ?>

							<?php $link = get_sub_field('pricing_button');
							if ($link) : $link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
							?>
								<a class="pricing-button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
									<?php echo esc_html($link_title); ?>
								</a>
							<?php endif; ?>
							<?php if (get_sub_field('include_features_list')) : ?>
								<div class="priceblock-content">
									<?php if (get_sub_field('pricing_features_headline')) : ?>
										<p class="price-feat-headline <?php if (get_sub_field('features_headline_color')) : ?>magenta-headline<?php else : ?>teal-headline<?php endif; ?>
											"><?php echo get_sub_field('pricing_features_headline'); ?></p>
									<?php endif; ?>
									<?php if (get_sub_field('pricing_features')) : ?>
										<div class="price-feat-content"><?php echo get_sub_field('pricing_features'); ?></div>
									<?php endif; ?>
									<?php if ($includesale == 'true') : ?>
										<?php if (get_sub_field('footnote_disclaimer')) : ?>
											<div class="price-feat-disclaimer">
												<p><?php echo get_sub_field('footnote_disclaimer'); ?></p>
											</div>
										<?php endif; ?>
									<?php endif; ?>
								</div>
							<?php elseif (get_sub_field('footnote_disclaimer')) : ?>
								<?php if ($includesale == 'true') : ?>
									<div class="priceblock-content">
										<div class="price-feat-disclaimer text-center">
											<p><?php echo get_sub_field('footnote_disclaimer'); ?></p>
										</div>
									</div>
								<?php endif; ?>
							<?php endif; ?>

							<?php if ($showlink != '') : ?>
								<div class="<?php echo $showlink; ?>">
									<a href="<?php echo $show_link_url; ?>" alt="<?php echo $show_link_title; ?>" target="<?php echo $show_link_target; ?>"><?php echo $show_link_title; ?></a>
								</div>
							<?php else : ?>
								<div class="<?php echo $showpop; ?>">
									<button data-open="pricingpop"><?php echo $popuplabel; ?></button>
								</div>
							<?php endif; ?>

						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</section>




<?php if (get_sub_field('include_all_features_pop-ups')) : ?>
	<?php if (get_sub_field('pop-up_type') == 'basic') : ?>

		<div class="reveal pricing-reveal" id="pricingpop" data-reveal>
			<?php echo get_sub_field('all_features_pop-up'); ?>
			<button class="close-button" data-close aria-label="Close modal" type="button">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>

	<?php elseif (get_sub_field('pop-up_type') == 'table') : ?>
		<div class="reveal pricing-reveal-table" id="pricingpop" data-reveal>
			<?php if (have_rows('pricing_table')) : ?>
				<?php while (have_rows('pricing_table')) : the_row(); ?>
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
				<?php endwhile; ?>
			<?php endif; ?>
			<button class="close-button" data-close aria-label="Close modal" type="button">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<?php endif; ?>
<?php endif; ?>