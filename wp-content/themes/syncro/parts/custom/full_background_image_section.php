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
if (get_sub_field('content_position') == 'topleft') :
	$contentpos = ('align-left align-top');
elseif (get_sub_field('content_position') == 'topcenter') :
	$contentpos = ('align-center align-top');
elseif (get_sub_field('content_position') == 'topright') :
	$contentpos = ('align-right align-top');
elseif (get_sub_field('content_position') == 'middleleft') :
	$contentpos = ('align-left align-middle');
elseif (get_sub_field('content_position') == 'middlecenter') :
	$contentpos = ('align-center align-middle');
elseif (get_sub_field('content_position') == 'middleright') :
	$contentpos = ('align-left align-middle');
elseif (get_sub_field('content_position') == 'bottomleft') :
	$contentpos = ('align-right align-bottom');
elseif (get_sub_field('content_position') == 'bottomcenter') :
	$contentpos = ('align-center align-bottom');
elseif (get_sub_field('content_position') == 'bottomright') :
	$contentpos = ('align-right align-bottom');
endif; ?>
<?php
if (get_sub_field('background_position') == 'topleft') :
	$imgpos = ('background-position: top left');
elseif (get_sub_field('background_position') == 'topcenter') :
	$imgpos = ('background-position: top center');
elseif (get_sub_field('background_position') == 'topright') :
	$imgpos = ('background-position: top right');
elseif (get_sub_field('background_position') == 'middleleft') :
	$imgpos = ('background-position: center left');
elseif (get_sub_field('background_position') == 'middlecenter') :
	$imgpos = ('background-position: center center');
elseif (get_sub_field('background_position') == 'middleright') :
	$imgpos = ('background-position: center right');
elseif (get_sub_field('background_position') == 'bottomleft') :
	$imgpos = ('background-position: bottom left');
elseif (get_sub_field('background_position') == 'bottomcenter') :
	$imgpos = ('background-position: bottom center');
elseif (get_sub_field('background_position') == 'bottomright') :
	$imgpos = ('background-position: bottom right');
endif; ?>
<?php
if (get_sub_field('content_width') == 'half') :
	$contentwidth = ('small-9 medium-6');
elseif (get_sub_field('content_width') == 'threequarter') :
	$contentwidth = ('small-10 medium-9');
elseif (get_sub_field('content_width') == 'full') :
	$contentwidth = ('small-12');
else :
	$contentwidth = ('small-9 medium-6');
endif; ?>


<?php if (get_sub_field('background_aspect_ratio')) :
	$aspectratio = get_sub_field('background_aspect_ratio');
else :
	$aspectratio = ('2x1');
endif; ?>

<?php $image = get_sub_field('full_width_background_image'); ?>
<section id="<?php echo get_sub_field('anchor_tag'); ?>" class="aspect-ratio-<?php echo $aspectratio; ?> content-section full-width-bg  <?php echo $bgcolor; ?> <?php echo $toppadding; ?> <?php echo $bottompadding; ?>" title="<?php echo esc_attr($image['alt']); ?>" style="background-image: url(<?php echo esc_url($image['url']); ?>); <?php echo $imgpos; ?>">

	<div class="grid-container">
		<div class="grid-x grid-padding-x <?php echo $contentpos; ?>">

			<div class="cell <?php echo $contentwidth; ?> fader2 <?php if (get_sub_field('button_alignment')) : ?>text-center<?php endif; ?>">
				<?php if (get_sub_field('content_section')) : ?>
					<?php echo get_sub_field('content_section'); ?>
				<?php endif; ?>
				<?php if (get_sub_field('include_button')) : ?>

					<?php if (have_rows('buttons')) : ?>
						<?php while (have_rows('buttons')) : the_row(); ?>
							<?php $link = get_sub_field('button');
							if ($link) : $link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
							?>
								<a class="syncro-button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
									<?php echo esc_html($link_title); ?>
								</a>
							<?php endif; ?>

						<?php endwhile; ?>
					<?php endif; ?>

				<?php endif; ?>
			</div>

		</div>
	</div>
</section>