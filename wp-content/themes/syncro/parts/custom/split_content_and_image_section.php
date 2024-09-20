<?php
if (get_sub_field('background_color') == 'white') :
	$bgcolor = ('bg-white');
elseif (get_sub_field('background_color') == 'dark') :
	$bgcolor = ('bg-dark');
elseif (get_sub_field('background_color') == 'light') :
	$bgcolor = ('bg-light');
endif; ?>
<?php if (get_sub_field('content_and_image_alignment')) :
	$vertalign = ('align-middle');
else :
	$vertalign = ('align-top');
endif; ?>
<?php if (get_sub_field('image_side')) :
	$imgside = ('small-order-1 medium-order-2 large-order-2 text-right');
	$txtside = ('small-order-2 medium-order-1 large-order-1');
	$txtfloat = ('float-left');
else :
	$imgside = ('small-order-1 medium-order-1 large-order-1 text-left');
	$txtside = ('small-order-2 medium-order-2 large-order-2');
	$txtfloat = ('float-right');
endif; ?>
<?php if (get_sub_field('rounded_image_corners')) :
	$corners = ('roundcorners');
else :
	$corners = ('');
endif; ?>
<?php if (get_sub_field('drop_shadow_on_image')) :
	$shadow = ('dropshadow');
else :
	$shadow = ('');
endif; ?>
<?php if (get_sub_field('wrap_headline_in_quotes')) :
	$headquote = ('headquote');
else :
	$headquote = ('');
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

<section id="<?php echo get_sub_field('anchor_tag'); ?>" class="split-content-and-image <?php echo $bgcolor; ?> <?php echo $toppadding; ?> <?php echo $bottompadding; ?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x <?php echo $vertalign; ?>">

			<div class="cell small-12 medium-7 large-6 <?php echo $txtside; ?> fader">
				<div class="<?php if (get_sub_field('text_block_width')) : ?>
					split-content-container-wide
					<?php else : ?>
						split-content-container
					<?php endif; ?>
 <?php echo $txtfloat; ?>">
					<?php if (get_sub_field('subheadline')) : ?>
						<h5><?php echo get_sub_field('subheadline'); ?></h5>
					<?php endif; ?>
					<?php if (get_sub_field('headline')) : ?>
						<?php if (get_sub_field('headline_size')) : ?>
							<h3 class="darktext <?php echo $headquote; ?>"><?php echo get_sub_field('headline'); ?></h3>
						<?php else : ?>
							<h2 class="darktext <?php echo $headquote; ?>"><?php echo get_sub_field('headline'); ?></h2>
						<?php endif; ?>
					<?php endif; ?>
					<?php if (get_sub_field('content_section')) : ?>
						<div class="split-content-content"><?php echo get_sub_field('content_section'); ?></div>
					<?php endif; ?>
					<?php if (get_sub_field('include_button')) : ?>
						<?php $link = get_sub_field('button_link');
						if ($link) : $link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
						?>
							<a style="margin-top: .75rem;" class="syncro-button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
								<?php echo esc_html($link_title); ?>
							</a>
						<?php endif; ?>

					<?php endif; ?>
				</div>
			</div>
			<div class="cell small-12 medium-5 large-6 <?php echo $imgside; ?> fader">
				<?php if (get_sub_field('visual_type')) : ?>
					<div class="split-content-video <?php echo $corners; ?> <?php echo $shadow; ?>">
						<?php $iframe = get_sub_field('video_embed');
						preg_match('/src="(.+?)"/', $iframe, $matches);
						$src = $matches[1];
						$params = array(
							'controls'  => 1,
							'hd'        => 1,
							'autohide'  => 1
						);
						$new_src = add_query_arg($params, $src);
						$iframe = str_replace($src, $new_src, $iframe);
						$attributes = 'frameborder="0"';
						$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
						echo $iframe;
						?>
					</div>
				<?php else : ?>
					<?php $image = get_sub_field('image');
					if (!empty($image)) : ?>
						<img class="split-content-img <?php echo $corners; ?> <?php echo $shadow; ?> lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>