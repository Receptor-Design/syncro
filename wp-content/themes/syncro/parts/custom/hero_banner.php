<?php
if (get_field('extra_bottom_padding') == '1') :
	$bottompadding = ('bottompadding');
elseif (get_field('extra_bottom_padding') == '2') :
	$bottompadding = ('morebottompadding');
else :
	$bottompadding = ('');
endif; ?>

<?php if (get_field('hero_banner_type') == '1') :
	// Product Page Banner 
?>
	<section class="product-hero-banner <?php echo $bottompadding; ?>">
		<div class="grid-container">
			<div class="grid-x grid-padding-x align-middle">
				<div class="cell small-12 medium-6 small-order-2 medium-order-1">
					<div class="hero-banner-content">
						<h1><?php if (get_field('hero_banner_headline')) :
									echo get_field('hero_banner_headline');
								else :
									the_title();
								endif; ?></h1>
						<?php if (get_field('hero_banner_content')) : ?>
							<div class="hero-content-container">
								<?php echo get_field('hero_banner_content'); ?>
							</div>
						<?php endif; ?>

						<?php if (have_rows('hero_banner_buttons')) : ?>
							<div class="hero-content-repeater">
								<?php while (have_rows('hero_banner_buttons')) : the_row(); ?>
									<div class="hero-link">
										<?php if (get_sub_field('hero_button_style') == 'toutline') : ?>
											<?php $buttonstyle = ('button-outlines'); ?>
										<?php elseif (get_sub_field('hero_button_style') == 'msolid') : ?>
											<?php $buttonstyle = ('button-solid'); ?>
										<?php endif; ?>

										<?php $link = get_sub_field('hero_banner_button');
										if ($link) : $link_url = $link['url'];
											$link_title = $link['title'];
											$link_target = $link['target'] ? $link['target'] : '_self';
										?>
											<a class="syncro-button <?php echo $buttonstyle; ?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
												<?php echo esc_html($link_title); ?>
											</a>
										<?php endif; ?>
									</div>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="cell small-12 medium-6 small-order-1 medium-order-2 text-center">
					<?php $hbimage = get_field('hero_banner_image');
					if (!empty($hbimage)) : ?>
						<img class="split-content-img" src="<?php echo esc_url($hbimage['url']); ?>" alt="<?php echo esc_attr($hbimage['alt']); ?>" />
					<?php endif; ?>
				</div>
			</div>
	</section>
<?php elseif (get_field('hero_banner_type') == '0') :
	// Basic Banner 
?>
	<section class="hero-banner <?php echo $bottompadding; ?>">
		<div class="grid-container closer-container">
			<div class="grid-x grid-padding-x <?php if (get_field('hero_banner_link_style') != 'sidebutton') : ?> text-center align-middle <?php endif; ?> ">
				<div class="cell auto">
					<h1><?php if (get_field('hero_banner_headline')) :
								echo get_field('hero_banner_headline');
							else :
								the_title();
							endif; ?></h1>
					<?php if (get_field('hero_banner_content')) : ?>
						<div class="hero-content-container">
							<?php echo get_field('hero_banner_content'); ?>
						</div>
					<?php endif; ?>
					<?php if (get_field('hero_banner_link_style') != 'sidebutton') : ?>
						<?php if (have_rows('hero_banner_links')) : ?>
							<div class="hero-content-repeater" id="hero-banner-height">
								<?php while (have_rows('hero_banner_links')) : the_row(); ?>
									<div class="hero-link">
										<?php $link = get_sub_field('hero_link');
										if ($link) : $link_url = $link['url'];
											$link_title = $link['title'];
											$link_target = $link['target'] ? $link['target'] : '_self';
										?>
											<a class="" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
												<?php echo esc_html($link_title); ?>
											</a>
										<?php endif; ?>
									</div>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>
					<?php endif; ?>
				</div>

				<?php if (get_field('hero_banner_link_style') == 'sidebutton') : ?>
					<?php $link = get_field('hero_banner_side_button');
					if ($link) : $link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
					?>
						<div class="cell small-12 medium-shrink button-container">
							<a class="syncro-button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
								<?php echo esc_html($link_title); ?>
							</a>

						</div>
					<?php endif; ?>
				<?php endif; ?>

			</div>
		</div>
	</section>
	<?php if (have_rows('hero_banner_links')) : ?>
		<script>
			window.addEventListener('DOMContentLoaded', herofunction);
			window.addEventListener('resize', herofunction);

			function herofunction() {
				let lelinks = document.querySelector('#hero-banner-height');
				if (lelinks.offsetHeight > 56) {
					jQuery('.hero-link').addClass("threeline");
					jQuery('.hero-link').removeClass("oneline");
					jQuery('.hero-link').removeClass("twoline");
				} else if (lelinks.offsetHeight <= 56 && lelinks.offsetHeight > 28) {
					jQuery('.hero-link').addClass("twoline");
					jQuery('.hero-link').removeClass("oneline");
					jQuery('.hero-link').removeClass("threeline");
				} else if (lelinks.offsetHeight <= 28) {
					jQuery('.hero-link').addClass("oneline");
					jQuery('.hero-link').removeClass("twoline");
					jQuery('.hero-link').removeClass("threeline");
				}
			}
		</script>
	<?php endif; ?>

<?php elseif (get_field('hero_banner_type') == '2') :
	// Promo Banner 
?>

	<?php $image = get_field('promo_hero_banner_background_image'); ?>
	<section class="hero-banner promo-hero <?php echo $bottompadding; ?>" title="<?php echo esc_attr($image['alt']); ?>" style="background-image: url(<?php echo esc_url($image['url']); ?>);">
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<div class="cell small-12">

					<?php if (get_field('hero_banner_promo_tag')) : ?>

						<?php
						$promo_tag_color = get_field('hero_banner_promo_tag_color');
						switch ($promo_tag_color) {
							case 'black':
								$tagcolor = '';
								break;
							case 'magenta':
								$tagcolor = 'magentatag';
								break;
							default:
								$tagcolor = '';
						}
						?>
						<span class="heropromolabel <?php echo $tagcolor; ?> ">
							<?php echo get_field('hero_banner_promo_tag'); ?>
						</span>
					<?php endif; ?>

					<h1><?php if (get_field('hero_banner_headline')) :
								echo get_field('hero_banner_headline');
							else :
								the_title();
							endif; ?></h1>
					<?php if (get_field('hero_banner_content')) : ?>
						<?php echo get_field('hero_banner_content'); ?>
					<?php endif; ?>

					<?php if (have_rows('promo_hero_banner_buttons')) : ?>
						<div class="hero-content-buttons">
							<?php while (have_rows('promo_hero_banner_buttons')) : the_row(); ?>
								<?php
								$promo_button_style = get_sub_field('promo_button_style');

								switch ($promo_button_style) {
									case 'magentasolid':
										$buttonstyle = 'button-magentasolid';
										break;
									case 'magentaoutline':
										$buttonstyle = 'button-magentaoutline';
										break;
									case 'tealsolid':
										$buttonstyle = 'button-tealsolid';
										break;
									case 'tealoutline':
										$buttonstyle = 'button-tealoutline';
										break;
									case 'whitesolid':
										$buttonstyle = 'button-whitesolid';
										break;
									case 'whiteoutline':
										$buttonstyle = 'button-whiteoutline';
										break;
									default:
										$buttonstyle = 'button-magentasolid';
								}
								?>
								<?php $link = get_sub_field('promo_button');
								if ($link) : $link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';
								?>
									<a class="syncro-promo-button <?php echo $buttonstyle; ?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
										<?php echo esc_html($link_title); ?>
									</a>
								<?php endif; ?>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>

					<?php if (get_field('promo_hero_banner_disclaimer')) : ?>
						<p class="promo-disclaimer"><?php echo get_field('promo_hero_banner_disclaimer'); ?></p>
					<?php endif; ?>

				</div>
			</div>
		</div>
	</section>






<?php endif; ?>