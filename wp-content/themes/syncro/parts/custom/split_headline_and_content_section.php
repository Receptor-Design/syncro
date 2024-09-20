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

<section id="<?php echo get_sub_field('anchor_tag'); ?>" class="split-headline-and-content <?php echo $bgcolor; ?> <?php echo $toppadding; ?> <?php echo $bottompadding; ?>">
	<div class="grid-container closer-container split-container">
		<div class="grid-x grid-padding-x align-center">
			<div class="cell small-12 medium-6 large-6 fader">
				<div class="left-headline-content">
					<?php if (get_sub_field('subhead')) : ?>
						<h6><?php echo get_sub_field('subhead'); ?></h6>
					<?php endif; ?>
					<?php if (get_sub_field('headline')) : ?>
						<h2 class="darktext"><?php echo get_sub_field('headline'); ?></h2>
					<?php endif; ?>
				</div>
			</div>
			<div class="cell small-12 medium-6 large-6 fader">
				<div class="right-content-content-wider">
					<?php if (get_sub_field('content_section')) : ?>
						<?php echo get_sub_field('content_section'); ?>
					<?php endif; ?>
					<?php $link = get_sub_field('link_after_content');
					if ($link) : $link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
					?>
						<a class="syncro-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
							<?php echo esc_html($link_title); ?>&nbsp;>
						</a>
					<?php endif; ?>
					<?php if (get_sub_field('include_author_callout')) : ?>
						<div class="author-callout grid-x align-middle align-center">
							<div class="cell shrink">
								<?php $image = get_sub_field('author_headshot');
								if (!empty($image)) : ?>
									<img class="author-headshot lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
								<?php endif; ?>
							</div>
							<div class="cell shrink medium-auto">
								<?php if (get_sub_field('author_signature')) : ?>
									<p class="author-signature"><?php echo get_sub_field('author_signature'); ?></p>
								<?php endif; ?>
								<?php if (get_sub_field('author_name')) : ?>
									<p class="author-name"><?php echo get_sub_field('author_name'); ?></p>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
</section>