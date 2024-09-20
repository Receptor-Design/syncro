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

<section id="<?php echo get_sub_field('anchor_tag'); ?>" class="careers-section <?php echo $bgcolor; ?> <?php echo $toppadding; ?> <?php echo $bottompadding; ?>">
	<div class="grid-container fader">
		<div class="grid-x grid-padding-x">
			<div class="cell small-12 medium-6">
				<div class="careers-content-content">
					<?php if (get_sub_field('subheadline')) : ?>
						<h5><?php echo get_sub_field('subheadline'); ?></h5>
					<?php endif; ?>
					<?php if (get_sub_field('careers_headline')) : ?>
						<h2 class="darktext"><?php echo get_sub_field('careers_headline'); ?>
							<?php $image = get_sub_field('icon_after_headline');
							if (!empty($image)) : ?>
								<img class="career-headline-icon lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
							<?php endif; ?>
						</h2>
					<?php endif; ?>
					<?php if (get_sub_field('careers_description')) : ?>
						<p><?php echo get_sub_field('careers_description', false, false); ?></p>
					<?php endif; ?>
				</div>
			</div>
			<div class="cell small-12 medium-6 careers-iframe">
				<?php echo get_sub_field('careers_embed_script'); ?>
			</div>
		</div>
	</div>
</section>