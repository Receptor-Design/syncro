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
<?php
if (get_sub_field('accordion_start_position') == 'firstopen') :
	$startpos = ('is-active');
else :
	$startpos = ('');
endif; ?>


<section id="<?php echo get_sub_field('anchor_tag'); ?>" class="media-accordion <?php echo $bgcolor; ?> <?php echo $toppadding; ?> <?php echo $bottompadding; ?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<?php if (get_sub_field('content_before_accordion')) : ?>
				<div class="cell content-before-accordion fader2">
					<?php echo get_sub_field('content_before_accordion'); ?>
				</div>
			<?php endif; ?>
			<div class="cell">
				<?php if (have_rows('accordions')) : $counter = 0; ?>

					<ul class="accordion fader2 bg-text-white" data-accordion data-allow-all-closed="true">
						<?php while (have_rows('accordions')) : the_row(); ?>

							<?php if ($counter == 0) : ?>
								<li class="accordion-item <?php echo $startpos; ?>" data-accordion-item>
								<?php else : ?>
								<li class="accordion-item" data-accordion-item>
								<?php endif; ?>

								<a href="#" class="accordion-title">
									<h3><?php echo get_sub_field('accordion_title'); ?></h3>
								</a>
								<div class="accordion-content basiccontent" data-tab-content>
									<?php echo get_sub_field('accordion_content'); ?>
								</div>
								</li>

							<?php $counter++;
						endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>