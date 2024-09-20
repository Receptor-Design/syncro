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

<section id="<?php echo get_sub_field('anchor_tag'); ?>" class="social-cta <?php echo $bgcolor; ?> <?php echo $toppadding; ?> <?php echo $bottompadding; ?>">
	<div class="grid-container closer-container">
		<div class="grid-x grid-padding-x text-center align-center">
			<div class="cell fader">
				<h3>
					<?php if (get_sub_field('headline')) : ?>
						<span class="social-cta-headline"> <?php echo get_sub_field('headline'); ?></span>
					<?php endif; ?>
					<span class="social-cta-icons">
						<?php if (get_sub_field('use_global_social_media_links')) : ?>

							<?php if (have_rows('social_accounts', 'option')) : ?>
								<?php while (have_rows('social_accounts', 'option')) : the_row(); ?>
									<a class="social-link" href="<?php echo get_sub_field('social_media_link', 'option'); ?>" target="_blank">
										<?php $image = get_sub_field('social_media_icon', 'option');
										if (!empty($image)) : ?>
											<img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
										<?php endif; ?>
									</a>
								<?php endwhile; ?>
							<?php endif; ?>

						<?php else : ?>

							<?php if (have_rows('social_links')) : ?>
								<?php while (have_rows('social_links')) : the_row(); ?>
									<a class="social-link" href="<?php echo get_sub_field('social_link'); ?>" target="_blank">
										<?php $image = get_sub_field('social_icon');
										if (!empty($image)) : ?>
											<img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
										<?php endif; ?>
									</a>
								<?php endwhile; ?>
							<?php endif; ?>

						<?php endif; ?>
					</span>
				</h3>
			</div>
		</div>
	</div>
</section>