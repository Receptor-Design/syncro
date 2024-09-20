<?php
if (get_sub_field('background_color') == 'white') :
	$bgcolor = ('bg-white');
elseif (get_sub_field('background_color') == 'dark') :
	$bgcolor = ('bg-dark');
elseif (get_sub_field('background_color') == 'light') :
	$bgcolor = ('bg-light');
endif; ?>

<?php if (get_sub_field('start_background_color') == 'white') : ?>
	<div class="bg-white device-top-trans"></div>
<?php elseif (get_sub_field('start_background_color') == 'dark') : ?>
	<div class="bg-dark device-top-trans"></div>
<?php elseif (get_sub_field('start_background_color') == 'light') : ?>
	<div class="bg-gray device-top-trans"></div>
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

<section id="<?php echo get_sub_field('anchor_tag'); ?>" class="device-cta <?php echo $bgcolor; ?> <?php echo $toppadding; ?> <?php echo $bottompadding; ?>">
	<?php if (get_sub_field('include_top_background_transition')) : ?>
		<?php if (get_sub_field('start_background_color') == 'white') : ?>
			<div class="bg-white device-top-trans"></div>
			<img class="device-cta-transition" src="<?php echo get_template_directory_uri(); ?>/assets/images/transition-shapes/curvetransition-whitetop.svg)">
		<?php elseif (get_sub_field('start_background_color') == 'dark') : ?>
			<div class="bg-dark device-top-trans"></div>
			<img class="device-cta-transition" src="<?php echo get_template_directory_uri(); ?>/assets/images/transition-shapes/curvetransition-bluetop.svg)">
		<?php elseif (get_sub_field('start_background_color') == 'light') : ?>
			<div class="bg-gray device-top-trans"></div>
			<img class="device-cta-transition" src="<?php echo get_template_directory_uri(); ?>/assets/images/transition-shapes/curvetransition-lighttop.svg)">
		<?php endif; ?>
	<?php endif; ?>

	<div class="grid-container fader2">
		<div class="grid-x grid-padding-x align-center align-bottom">
			<div class="cell small-12 medium-6 large-6 small-order-2 medium-order-1">
				<div class="device-cta-text">
					<h2 class="darktext"><?php echo get_sub_field('headline'); ?></h2>
					<?php $link = get_sub_field('cta_link');
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

			<div class="cell small-12 medium-6 large-6 small-order-1 medium-order-2 text-center">

				<?php $image = get_sub_field('device_image');
				if (!empty($image)) : ?>
					<img class="device-image lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
				<?php endif; ?>

			</div>
		</div>
	</div>
</section>