<?php
if (get_sub_field('background_color') == 'white') :
	$bgcolor = ('bg-white');
elseif (get_sub_field('background_color') == 'dark') :
	$bgcolor = ('bg-dark');
elseif (get_sub_field('background_color') == 'light') :
	$bgcolor = ('bg-light');
endif; ?>
<?php
if (get_sub_field('videos_per_row') == 'three') :
	$vidperrow = ('small-6 medium-4 large-4');
elseif (get_sub_field('videos_per_row') == 'four') :
	$vidperrow = ('small-6 medium-3 large-3');
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

<section id="<?php echo get_sub_field('anchor_tag'); ?>" class="vertical-videos-section <?php echo $bgcolor; ?> <?php echo $toppadding; ?> <?php echo $bottompadding; ?>">
	<div class="grid-container fader2">
		<div class="grid-x grid-padding-x align-center">
			<?php if (get_sub_field('content_before_videos')) : ?>
				<div class="cell small-12 content-before-vertical-videos">
					<?php echo get_sub_field('content_before_videos'); ?>
				</div>
			<?php endif; ?>

			<?php if (have_rows('videos')) : ?>
				<?php while (have_rows('videos')) : the_row(); ?>
					<div class="cell <?php echo $vidperrow; ?> vert-vid-container">
						<?php $iframe = get_sub_field('video_embed');
						preg_match('/src="(.+?)"/', $iframe, $matches);
						$src = $matches[1];
						$params = array(
							'modestbranding' => 1,
							'rel' => 0,
						);
						$new_src = add_query_arg($params, $src);
						$iframe = str_replace($src, $new_src, $iframe);
						$attributes = 'frameborder="0"';
						$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
						echo $iframe;
						?>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</section>