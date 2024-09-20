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
	$iconrow = ('small-12 medium-6 large-6');
	$iconrowcont = ('');
elseif (get_sub_field('icons_per_row') == 'three') :
	$iconrow = ('small-12 medium-4 large-4');
	$iconrowcont = ('');
elseif (get_sub_field('icons_per_row') == 'four') :
	$iconrow = ('small-12 medium-6 large-3');
	$iconrowcont = ('');
elseif (get_sub_field('icons_per_row') == 'five') :
	$iconrow = ('');
	$iconrowcont = ('small-up-1 medium-up-3 large-up-5');
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
<?php if (get_sub_field('alignment_on_mobile')) {
	$mobilecenter = ('mobilecenter');
} else {
	$mobilecenter = ('');
} ?>
<?php if (get_sub_field('spacing_when_stacked')) {
	$stackedspace = ('nospacewhenstacked');
} else {
	$stackedspace = ('spacewhenstacked');
} ?>

<section id="<?php echo get_sub_field('anchor_tag'); ?>" class="icons-with-content-section <?php echo $bgcolor; ?> <?php echo $toppadding; ?> <?php echo $bottompadding; ?>">
	<div class="grid-container closer-container">
		<?php if (get_sub_field('headline_before_section')) : ?>
			<div class="grid-x grid-padding-x align-center text-center fader2">
				<div class="cell small-12 icons-with-content-headline">
					<?php echo get_sub_field('headline_before_section'); ?>
				</div>
			</div>
		<?php endif; ?>

		<div class="grid-x grid-padding-x <?php echo $iconrowcont; ?> fader2 <?php if (get_sub_field('icon_item_alignment')) : ?>text-center align-center<?php else : ?>text-left align-left<?php endif; ?>">
			<?php if (have_rows('icon_and_content')) : ?>
				<?php while (have_rows('icon_and_content')) : the_row(); ?>
					<div class="cell <?php echo $iconrow; ?> icons-with-content-item <?php echo $mobilecenter; ?> <?php echo $stackedspace; ?>">

						<?php $image = get_sub_field('icon_image');
						if (!empty($image)) : ?>
							<img class="icon lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						<?php endif; ?>

						<?php if (get_sub_field('icon_headline')) : ?>
							<h6><?php echo get_sub_field('icon_headline'); ?></h6>
						<?php endif; ?>
						<?php if (get_sub_field('icon_description')) : ?>
							<?php echo get_sub_field('icon_description'); ?>
						<?php endif; ?>
						<?php $link = get_sub_field('icon_link');
						if ($link) : $link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
						?>
							<div class="icon-section-link-buffer"></div>
							<a class="syncro-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
								<?php echo esc_html($link_title); ?>&nbsp;>
							</a>
						<?php endif; ?>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</section>