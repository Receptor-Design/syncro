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

<section id="<?php echo get_sub_field('anchor_tag'); ?>" class="resource-trio <?php echo $bgcolor; ?> <?php echo $toppadding; ?> <?php echo $bottompadding; ?>" <?php if (get_sub_field('content_before_resources')) : ?>data-equalizer="headlineequalizer" data-equalize-on-stack="true" <?php endif; ?>>
	<?php if (get_sub_field('include_top_background_transition')) : ?>
		<div class="trio-transition">
			<?php if (get_sub_field('top_transition_background_color') == 'white') : ?>
				<?php if (get_sub_field('content_before_resources')) : ?>
					<div class="trio-transition-buffer-headline bg-white" data-equalizer-watch="headlineequalizer"></div>
				<?php endif; ?>
				<div class="trio-transition-buffer bg-white"></div>
				<img class="" src="<?php echo get_template_directory_uri(); ?>/assets/images/transition-shapes/curvetransition-whitetop.svg)">
			<?php elseif (get_sub_field('top_transition_background_color') == 'dark') : ?>
				<?php if (get_sub_field('content_before_resources')) : ?>
					<div class="trio-transition-buffer-headline bg-dark" data-equalizer-watch="headlineequalizer"></div>
				<?php endif; ?>
				<div class="trio-transition-buffer bg-dark"></div>
				<img class="" src="<?php echo get_template_directory_uri(); ?>/assets/images/transition-shapes/curvetransition-bluetop.svg)">
			<?php elseif (get_sub_field('top_transition_background_color') == 'light') : ?>
				<?php if (get_sub_field('content_before_resources')) : ?>
					<div class="trio-transition-buffer-headline bg-light" data-equalizer-watch="headlineequalizer"></div>
				<?php endif; ?>
				<div class="trio-transition-buffer bg-light"></div>
				<img class="" src="<?php echo get_template_directory_uri(); ?>/assets/images/transition-shapes/curvetransition-lighttop.svg)">
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<div class="grid-container reshub-container trio-resource-content">
		<?php if (get_sub_field('content_before_resources')) : ?>
			<div class="grid-x grid-padding-x fader2">
				<div class="cell content-before-resources <?php echo $topbgcolor; ?>" data-equalizer-watch="headlineequalizer">
					<?php echo get_sub_field('content_before_resources'); ?>
				</div>
			</div>
		<?php endif; ?>


		<div class="grid-x grid-margin-x align-center" data-equalizer>
			<?php if (have_rows('resources')) : ?>
				<?php while (have_rows('resources')) : the_row(); ?>
					<?php // DISPLAY CONTENT FOR SINGLE POST OBJECT
					$featured_post = get_sub_field('resource_selector');
					if ($featured_post) :
						// override $post
						$post = $featured_post;
						setup_postdata($post);  ?>
						<?php get_template_part('parts/loop-archive'); ?>
						<?php wp_reset_postdata(); ?>
					<?php endif; ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</section>