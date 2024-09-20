<?php
if (get_sub_field('background_color') == 'white') :
	$bgcolor = ('bg-white');
elseif (get_sub_field('background_color') == 'dark') :
	$bgcolor = ('bg-dark');
elseif (get_sub_field('background_color') == 'light') :
	$bgcolor = ('bg-light');
endif; ?>
<?php if (get_sub_field('include_top_background_transition')) : ?>
	<?php
	if (get_sub_field('top_transition_background_color') == 'white') :
		$topbgcolor = ('bg-text-white');
	elseif (get_sub_field('top_transition_background_color') == 'dark') :
		$topbgcolor = ('bg-text-dark');
	elseif (get_sub_field('top_transition_background_color') == 'light') :
		$topbgcolor = ('bg-text-light');
	endif; ?>
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

<section id="<?php echo get_sub_field('anchor_tag'); ?>" class="video-section <?php echo $bgcolor; ?> <?php echo $toppadding; ?> <?php echo $bottompadding; ?>" <?php if (get_sub_field('headline_before_video')) : ?>data-equalizer data-equalize-on-stack="true" <?php endif; ?>>
	<?php if (get_sub_field('include_top_background_transition')) : ?>
		<div class="video-transition">
			<?php if (get_sub_field('top_transition_background_color') == 'white') : ?>
				<?php if (get_sub_field('headline_before_video')) : ?>
					<div class="video-transition-buffer-headline bg-white" data-equalizer-watch></div>
				<?php endif; ?>
				<div class="video-transition-buffer bg-white"></div>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/transition-shapes/s-transition-whitetop.svg)">
			<?php elseif (get_sub_field('top_transition_background_color') == 'dark') : ?>
				<?php if (get_sub_field('headline_before_video')) : ?>
					<div class="video-transition-buffer-headline bg-dark" data-equalizer-watch></div>
				<?php endif; ?>
				<div class="video-transition-buffer bg-dark"></div>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/transition-shapes/s-transition-bluetop.svg)">
			<?php elseif (get_sub_field('top_transition_background_color') == 'light') : ?>
				<?php if (get_sub_field('headline_before_video')) : ?>
					<div class="video-transition-buffer-headline bg-light" data-equalizer-watch></div>
				<?php endif; ?>
				<div class="video-transition-buffer bg-light"></div>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/transition-shapes/s-transition-lighttop.svg)">
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<div class="grid-container closer-container fader">
		<div class="grid-x grid-padding-x align-center text-center">
			<?php if (get_sub_field('headline_before_video')) : ?>
				<div class="cell <?php if (get_sub_field('include_top_background_transition')) : ?><?php echo $topbgcolor; ?><?php endif; ?>" data-equalizer-watch>
					<h2><?php echo get_sub_field('headline_before_video'); ?></h2>
				</div>
			<?php endif; ?>
			<div class="cell">
				<?php
				// Load value.
				$iframe = get_sub_field('video_embed_link');
				// Use preg_match to find iframe src.
				preg_match('/src="(.+?)"/', $iframe, $matches);
				$src = $matches[1];
				// Add extra parameters to src and replace HTML.
				$params = array(
					//'controls'  => 0,
					'hd'        => 1,
				);
				$new_src = add_query_arg($params, $src);
				$iframe = str_replace($src, $new_src, $iframe);
				// Add extra attributes to iframe HTML.
				$attributes = 'frameborder="0"';
				$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
				// Display customized HTML.
				echo $iframe;
				?>
			</div>
		</div>
	</div>
</section>