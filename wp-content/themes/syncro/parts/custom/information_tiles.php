<?php
if (get_sub_field('background_color') == 'white') :
	$bgcolor = ('bg-white');
elseif (get_sub_field('background_color') == 'dark') :
	$bgcolor = ('bg-dark');
elseif (get_sub_field('background_color') == 'light') :
	$bgcolor = ('bg-light');
endif; ?>
<?php if (get_sub_field('tiles_per_row') == 'two') : ?>
	<?php $perrow = ('small-12 medium-6'); ?>
<?php elseif (get_sub_field('tiles_per_row') == 'three') : ?>
	<?php $perrow = ('small-12 medium-4 large-4'); ?>
<?php elseif (get_sub_field('tiles_per_row') == 'four') : ?>
	<?php $perrow = ('small-12 medium-6 large-3'); ?>
<?php endif; ?>
<?php if (get_sub_field('tile_alignment')) : ?>
	<?php $tilealign = ('align-center'); ?>
<?php else : ?>
	<?php $tilealign = ('align-left'); ?>
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
<?php if (get_sub_field('tile_text_alignment')) : ?>
	<?php $textalign = ('text-center'); ?>
<?php else : ?>
	<?php $textalign = ('text-left'); ?>
<?php endif; ?>

<section id="<?php echo get_sub_field('anchor_tag'); ?>" class="information-tiles <?php echo $bgcolor; ?> <?php echo $toppadding; ?> <?php echo $bottompadding; ?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x fader2">
			<div class="cell small-12 content-before-tiles">
				<?php if (get_sub_field('content_before_tiles')) : ?>
					<?php echo get_sub_field('content_before_tiles'); ?>
				<?php endif; ?>
			</div>
		</div>

		<div class="grid-x grid-margin-x <?php echo $tilealign; ?> <?php echo $textalign; ?>">
			<?php if (get_sub_field('tile_link_type')) : ?>
				<!--full box link-->
				<?php if (have_rows('information_tiles')) : ?>
					<?php while (have_rows('information_tiles')) : the_row(); ?>
						<?php
						if (get_sub_field('tile_image_background_color') == 'white') :
							$tileimgbg = ('tileimg-white');
						elseif (get_sub_field('tile_image_background_color') == 'dark') :
							$tileimgbg = ('tileimg-dark');
						elseif (get_sub_field('tile_image_background_color') == 'light') :
							$tileimgbg = ('tileimg-light');
						endif; ?>
						<?php $link = get_sub_field('tile_link');
						if ($link) : $link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
						?>
							<a class="cell <?php echo $perrow; ?> info-tile fader hoverlift" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
								<?php if (get_sub_field('tile_image')) : ?>
									<?php $image = get_sub_field('tile_image'); ?>
									<div class="tile-img <?php echo $tileimgbg; ?>" title="<?php echo esc_attr($image['alt']); ?>" style="background-image: url(<?php echo esc_url($image['url']); ?>);"></div>
								<?php else : ?>
									<div class="tile-img <?php echo $tileimgbg; ?>"></div>
								<?php endif; ?>
								<div class="info-tile-content">
									<?php if (get_sub_field('tile_title')) : ?>
										<h5><?php echo get_sub_field('tile_title'); ?></h5>
									<?php endif; ?>
									<?php if (get_sub_field('tile_content')) : ?>
										<?php echo get_sub_field('tile_content'); ?>
									<?php endif; ?>
								</div>
							</a>
						<?php else : ?>
							<!--no link-->
							<div class="cell <?php echo $perrow; ?> info-tile fader">
								<?php if (get_sub_field('tile_image')) : ?>
									<?php $image = get_sub_field('tile_image'); ?>
									<div class="tile-img <?php echo $tileimgbg; ?>" title="<?php echo esc_attr($image['alt']); ?>" style="background-image: url(<?php echo esc_url($image['url']); ?>);"></div>
								<?php else : ?>
									<div class="tile-img <?php echo $tileimgbg; ?>"></div>
								<?php endif; ?>
								<div class="info-tile-content">
									<?php if (get_sub_field('tile_title')) : ?>
										<h5><?php echo get_sub_field('tile_title'); ?></h5>
									<?php endif; ?>
									<?php if (get_sub_field('tile_content')) : ?>
										<?php echo get_sub_field('tile_content'); ?>
									<?php endif; ?>
								</div>
							</div>

						<?php endif; ?>

					<?php endwhile; ?>
				<?php endif; ?>
			<?php else : ?>
				<!--text based link-->
				<?php if (have_rows('information_tiles')) : ?>
					<?php while (have_rows('information_tiles')) : the_row(); ?>
						<?php
						if (get_sub_field('tile_image_background_color') == 'white') :
							$tileimgbg = ('tileimg-white');
						elseif (get_sub_field('tile_image_background_color') == 'dark') :
							$tileimgbg = ('tileimg-dark');
						elseif (get_sub_field('tile_image_background_color') == 'light') :
							$tileimgbg = ('tileimg-light');
						endif; ?>
						<div class="cell <?php echo $perrow; ?> info-tile fader">
							<?php if (get_sub_field('tile_image')) : ?>
								<?php $image = get_sub_field('tile_image'); ?>
								<div class="tile-img <?php echo $tileimgbg; ?>" title="<?php echo esc_attr($image['alt']); ?>" style="background-image: url(<?php echo esc_url($image['url']); ?>);"></div>
							<?php else : ?>
								<div class="tile-img <?php echo $tileimgbg; ?>"></div>
							<?php endif; ?>
							<div class="info-tile-content">
								<?php if (get_sub_field('tile_title')) : ?>
									<h5><?php echo get_sub_field('tile_title'); ?></h5>
								<?php endif; ?>
								<?php if (get_sub_field('tile_content')) : ?>
									<?php echo get_sub_field('tile_content'); ?>
								<?php endif; ?>
							</div>
							<?php $link = get_sub_field('tile_link');
							if ($link) : $link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
							?>
								<div class="link-buffer"></div>
								<a class="syncro-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
									<?php echo esc_html($link_title); ?>&nbsp;>
								</a>
							<?php endif; ?>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
</section>