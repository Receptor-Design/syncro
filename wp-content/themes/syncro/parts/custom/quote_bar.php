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

<section id="<?php echo get_sub_field('anchor_tag'); ?>" class="quote-bar <?php echo $bgcolor; ?> <?php echo $toppadding; ?> <?php echo $bottompadding; ?>">
	<div class="grid-container closer-container fader">
		<div class="grid-x grid-padding-x align-center align-middle text-center">
			<?php if (get_sub_field('quote_adornment') == 'headshot') : ?>
				<div class="cell small-12 medium-shrink text-center">
					<?php $image = get_sub_field('headshot_before_quote');
					if (!empty($image)) : ?>
						<div class="quote-headshot-container">
							<img class="quote-headshot lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<div class="cell medium-auto">
				<h4 class="quote">
					<?php if (get_sub_field('quote_adornment') == 'icon') : ?>
						<?php $image = get_sub_field('icon_before_quote');
						if (!empty($image)) : ?>
							<img class="quote-icon lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						<?php endif; ?>
					<?php endif; ?>
					<?php if (get_sub_field('quote')) : ?>
						<strong>“<?php echo get_sub_field('quote'); ?>”</strong>
						<?php endif; ?>&ensp;
						<?php if (get_sub_field('quote_attribution')) : ?>
							<span class="quote-attr">-&nbsp;<?php echo get_sub_field('quote_attribution'); ?></span>
						<?php endif; ?>
				</h4>
			</div>
		</div>
	</div>
</section>