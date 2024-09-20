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

<section id="<?php echo get_sub_field('anchor_tag'); ?>" class="logo-and-content-blocks-section <?php echo $bgcolor; ?> <?php echo $toppadding; ?> <?php echo $bottompadding; ?>">
	<div class="grid-container">
		<?php if (get_sub_field('content_before_blocks')) : ?>
			<div class="grid-x grid-padding-x">
				<div class="cell lacbs-precontent fader">
					<?php echo get_sub_field('content_before_blocks'); ?>
				</div>
			</div>
		<?php endif; ?>

		<?php if (have_rows('logo_block_items')) : ?>
			<div class="grid-x grid-margin-x" data-equalizer="lacbs">
				<?php while (have_rows('logo_block_items')) : the_row(); ?>

					<?php $link = get_sub_field('block_link');
					if ($link) : $link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
					?>
						<article class="cell small-12 medium-6 large-4 intitem hoverlift fader" data-equalizer-watch="lacbs">
							<a class="" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
								<div class="intitem-content bg-text-white">
									<div class="intitem-logo-container">
										<?php $image = get_sub_field('logo');
										if (!empty($image)) : ?>
											<img class="intitem-logo lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
										<?php endif; ?>
									</div>
									<div class="intitem-desc-nobottom"><?php echo get_sub_field('description'); ?></div>
								</div>
							</a>
						</article>
					<?php else : ?>
						<article class="cell small-12 medium-6 large-4 intitem fader" data-equalizer-watch="lacbs">
							<div class="intitem-content bg-text-white">
								<div class="intitem-logo-container">
									<?php $image = get_sub_field('logo');
									if (!empty($image)) : ?>
										<img class="intitem-logo lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
									<?php endif; ?>
								</div>
								<div class="intitem-desc-nobottom"><?php echo get_sub_field('description'); ?></div>
							</div>
						</article> <!-- end article -->
					<?php endif; ?>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</section>