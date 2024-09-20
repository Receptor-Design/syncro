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

<section id="<?php echo get_sub_field('anchor_tag'); ?>" class="logo-slider <?php echo $bgcolor; ?> <?php echo $toppadding; ?> <?php echo $bottompadding; ?>">
	<div class="grid-container fader2">
		<div class="grid-x grid-padding-x">
			<?php if (get_sub_field('content_before_logo_slider')) : ?>
				<div class="cell content-before-logo-slider">
					<?php echo get_sub_field('content_before_logo_slider'); ?>
				</div>
			<?php endif; ?>

			<?php if (have_rows('logo_slider')) : ?>
				<div class="cell">
					<div class="slick-logoslider-b">
						<?php while (have_rows('logo_slider')) : the_row(); ?>

							<?php $link = get_sub_field('logo_link');
							if ($link) : $link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
							?>
								<a class="logo-container" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
									<?php $image = get_sub_field('logo');
									if (!empty($image)) : ?>
										<img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
									<?php endif; ?>
								</a>
							<?php else : ?>
								<div class="logo-container">
									<?php $image = get_sub_field('logo');
									if (!empty($image)) : ?>
										<img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
									<?php endif; ?>
								</div>
							<?php endif; ?>

						<?php endwhile; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<script>
	jQuery(document).ready(function() {
		jQuery('.slick-logoslider-b').slick({
			dots: false,
			arrows: false,
			autoplay: true,
			autoplaySpeed: 4000,
			infinite: true,
			speed: 800,
			slidesToShow: 7,
			slidesToScroll: 1,
			draggable: true,
			pauseOnHover: false,
			swipeToSlide: true,

			responsive: [{
					breakpoint: 1023,
					settings: {
						slidesToShow: 5,
						slidesToScroll: 1,
					}
				},
				{
					breakpoint: 639,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 1
					}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1
					}
				}
			]
		});
	});
</script>