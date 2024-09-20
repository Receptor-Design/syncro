<?php
if (get_sub_field('background_color') == 'white') :
	$bgcolor = ('bg-white');
elseif (get_sub_field('background_color') == 'dark') :
	$bgcolor = ('bg-dark');
elseif (get_sub_field('background_color') == 'light') :
	$bgcolor = ('bg-light');
endif; ?>
<?php
if (get_sub_field('values_per_row') == 'two') :
	$valueperrow = ('small-11 medium-6 large-6');
elseif (get_sub_field('values_per_row') == 'three') :
	$valueperrow = ('small-11 medium-6 large-4');
endif; ?>
<?php if (get_sub_field('wrap_values_in_box')) :
	$box = ('box-values bg-text-white');
else :
	$box = ('no-box-values');
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

<section id="<?php echo get_sub_field('anchor_tag'); ?>" class="values-section <?php echo $bgcolor; ?> <?php echo $toppadding; ?> <?php echo $bottompadding; ?>">
	<div class="grid-container">
		<div class="grid-x grid-margin-x align-center">
			<?php if (get_sub_field('content_before_values')) : ?>
				<div class="cell small-12 content-before-values fader2">
					<?php echo get_sub_field('content_before_values'); ?>
				</div>
			<?php endif; ?>
			<?php if (have_rows('values')) : ?>
				<?php while (have_rows('values')) : the_row(); ?>
					<div class="cell text-center value-item <?php echo $valueperrow; ?> <?php echo $box; ?> fader">
						<?php $image = get_sub_field('value_icon');
						if (!empty($image)) : ?>
							<img class="value-icon lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						<?php endif; ?>
						<h3><?php echo get_sub_field('value_headline'); ?></h3>
						<p><?php echo get_sub_field('value_content', false, false); ?></p>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</section>