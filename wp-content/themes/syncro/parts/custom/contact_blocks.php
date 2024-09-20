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

<?php if (get_sub_field('contact_blocks_per_row') == 'one') : ?>
	<?php $perrow = ('small-12'); ?>
<?php elseif (get_sub_field('contact_blocks_per_row') == 'two') : ?>
	<?php $perrow = ('small-12 medium-6'); ?>
<?php elseif (get_sub_field('contact_blocks_per_row') == 'three') : ?>
	<?php $perrow = ('small-12 medium-4 large-4'); ?>
<?php endif; ?>

<?php if (get_sub_field('overlap_section_above')) : ?>
	<?php $overlap = ('overlap-above'); ?>
<?php else : ?>
	<?php $overlap = (''); ?>
<?php endif; ?>

<section id="<?php echo get_sub_field('anchor_tag'); ?>" class="contact-blocks <?php echo $bgcolor; ?> <?php if (get_sub_field('overlap_section_above')) : ?><?php echo $overlap; ?><?php else : ?><?php echo $toppadding; ?><?php endif; ?> <?php echo $bottompadding; ?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x text-center align-center">

			<?php if (have_rows('contact_blocks')) : ?>
				<?php while (have_rows('contact_blocks')) : the_row(); ?>

					<div class="cell <?php echo $perrow; ?> ">
						<div class="contactblock fader">

							<?php if (get_sub_field('block_headline')) : ?>
								<h2 class="contact-title"><?php echo get_sub_field('block_headline'); ?></h2>
							<?php endif; ?>
							<?php if (get_sub_field('block_description')) : ?>
								<div class="contact-desc"><?php echo get_sub_field('block_description'); ?></div>
							<?php endif; ?>
							<?php $link = get_sub_field('block_link');
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
					</div>

				<?php endwhile; ?>
			<?php endif; ?>

		</div>
	</div>
</section>