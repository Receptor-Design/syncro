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

<section id="<?php echo get_sub_field('anchor_tag'); ?>" class="masonry-quotes <?php echo $bgcolor; ?> <?php echo $toppadding; ?> <?php echo $bottompadding; ?>" <?php if (get_sub_field('headline_before_video')) : ?>data-equalizer data-equalize-on-stack="true" <?php endif; ?>>

	<?php if (get_sub_field('include_top_background_transition')) : ?>
		<div class="masonry-transition">
			<?php if (get_sub_field('top_transition_background_color') == 'white') : ?>
				<div class="masonry-transition-buffer bg-white"></div>
				<img class="lozad" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/transition-shapes/s-transition-whitetop.svg)">
			<?php elseif (get_sub_field('top_transition_background_color') == 'dark') : ?>
				<div class="masonry-transition-buffer bg-dark"></div>
				<img class="lozad" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/transition-shapes/s-transition-bluetop.svg)">
			<?php elseif (get_sub_field('top_transition_background_color') == 'light') : ?>
				<div class="masonry-transition-buffer bg-light"></div>
				<img class="lozad" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/transition-shapes/s-transition-lighttop.svg)">
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<div class="grid-container">
		<div class="grid-x grid-padding-x align-center">
			<?php if (have_rows('masonry_quotes_one')) : ?>
				<div class="cell small-12 medium-6">
					<?php while (have_rows('masonry_quotes_one')) : the_row(); ?>
						<div class="masonry-quote fader">
							<div class="quote-container">
								<?php echo get_sub_field('quote'); ?>
							</div>
							<?php echo get_sub_field('quote_attribution'); ?>
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
			<?php if (have_rows('masonry_quotes_two')) : ?>
				<div class="cell small-12 medium-6">
					<?php while (have_rows('masonry_quotes_two')) : the_row(); ?>
						<div class="masonry-quote fader">
							<div class="quote-container">
								<?php echo get_sub_field('quote'); ?>
							</div>
							<?php echo get_sub_field('quote_attribution'); ?>
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>