<?php
if (get_sub_field('background_color') == 'white') :
	$bgcolor = ('bg-white');
elseif (get_sub_field('background_color') == 'dark') :
	$bgcolor = ('bg-dark');
elseif (get_sub_field('background_color') == 'light') :
	$bgcolor = ('bg-light');
endif; ?>
<?php
if (get_sub_field('icons_per_row') == 'two') :
	$iconrow = ('small-up-1 medium-up-2 large-up-2');
elseif (get_sub_field('icons_per_row') == 'three') :
	$iconrow = ('small-up-1 medium-up-2 large-up-3');
elseif (get_sub_field('icons_per_row') == 'four') :
	$iconrow = ('small-up-2 medium-up-2 large-up-4');
elseif (get_sub_field('icons_per_row') == 'five') :
	$iconrow = ('small-up-2 medium-up-3 large-up-5');
elseif (get_sub_field('icons_per_row') == 'six') :
	$iconrow = ('small-up-2 medium-up-3 large-up-6');
endif; ?>
<?php if (get_sub_field('icon_sizing')) : ?>
	<?php $iconsizing = ('large-icon'); ?>
<?php else : ?>
	<?php $iconsizing = ('small-icon'); ?>
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

<section id="<?php echo get_sub_field('anchor_tag'); ?>" class="icon-grid <?php echo $bgcolor; ?> <?php echo $toppadding; ?> <?php echo $bottompadding; ?>">
	<div class="grid-container">
		<?php if (get_sub_field('content_before_icon_grid')) : ?>
			<div class="grid-x grid-padding-x align-center text-center">
				<div class="cell small-12 icon-grid-headline fader">
					<?php echo get_sub_field('content_before_icon_grid'); ?>
				</div>
			</div>
		<?php endif; ?>

		<div class="grid-x grid-padding-x <?php echo $iconrow; ?> align-middle <?php if (get_sub_field('icon_item_alignment')) : ?>align-center<?php else : ?>align-left<?php endif; ?>">
			<?php if (have_rows('icon_grid')) : ?>
				<?php while (have_rows('icon_grid')) : the_row(); ?>
					<div class="cell text-center icon-grid-item fader">

						<?php $link = get_sub_field('icon_link');
						if ($link) : $link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
						?>
							<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
								<?php $image = get_sub_field('icon_image');
								if (!empty($image)) : ?>
									<img class="icon <?php echo $iconsizing; ?> lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
								<?php endif; ?>
							</a>
						<?php else : ?>
							<?php $image = get_sub_field('icon_image');
							if (!empty($image)) : ?>
								<div class="icon-container">
									<img class="icon <?php echo $iconsizing; ?> lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
								</div>
							<?php endif; ?>
						<?php endif; ?>

					</div>
				<?php endwhile; ?>
			<?php endif; ?>

		</div>
	</div>
</section>