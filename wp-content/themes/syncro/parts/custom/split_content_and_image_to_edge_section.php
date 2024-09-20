<?php
if (get_sub_field('background_color') == 'white') :
	$bgcolor = ('bg-white');
elseif (get_sub_field('background_color') == 'dark') :
	$bgcolor = ('bg-dark');
elseif (get_sub_field('background_color') == 'light') :
	$bgcolor = ('bg-light');
endif; ?>
<?php if (get_sub_field('image_side')) :
	$imgside = ('small-order-1 medium-order-2 large-order-2 text-right');
	$txtside = ('small-order-2 medium-order-1 large-order-1');
	$txtfloat = ('float-left');
	$imgfloat = ('imagefloatright');
	$imgcontfloat = ('imagecontfloatright');
else :
	$imgside = ('small-order-1 medium-order-1 large-order-1 text-left');
	$txtside = ('small-order-2 medium-order-2 large-order-2');
	$txtfloat = ('float-right');
	$imgfloat = ('imagefloatleft');
	$imgcontfloat = ('imagecontfloatleft');
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

<section id="<?php echo get_sub_field('anchor_tag'); ?>" class="split-content-and-image-to-edge <?php echo $bgcolor; ?> <?php echo $toppadding; ?> <?php echo $bottompadding; ?>">
	<div class="split-content-bleedimg <?php echo $imgcontfloat; ?> fader" id="sci-<?php echo get_row_index(); ?>">
		<?php $image = get_sub_field('image');
		if (!empty($image)) : ?>
			<img class="split-content-img <?php echo $imgfloat; ?> lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
		<?php endif; ?>
	</div>
	<div class="grid-container fader">
		<div class="grid-x grid-padding-x align-middle scic-<?php echo get_row_index(); ?>">
			<div class="cell small-12 medium-5 large-6 <?php echo $txtside; ?>">
				<div class="split-content-container <?php echo $txtfloat; ?>">
					<?php if (get_sub_field('subheadline')) : ?>
						<h5><?php echo get_sub_field('subheadline'); ?></h5>
					<?php endif; ?>
					<?php if (get_sub_field('headline')) : ?>
						<h2 class="darktext"><?php echo get_sub_field('headline'); ?></h2>
					<?php endif; ?>
					<?php if (get_sub_field('content_section')) : ?>
						<div class="split-content-content"><?php echo get_sub_field('content_section'); ?></div>
					<?php endif; ?>
				</div>
			</div>
			<div class="cell small-12 medium-7 large-6 <?php echo $imgside; ?>"></div>
		</div>
	</div>
</section>

<script>
	window.addEventListener('DOMContentLoaded', scifunction);
	window.addEventListener('resize', scifunction);

	function scifunction(x) {
		let lecont = document.querySelector('.scic-<?php echo get_row_index(); ?>');
		let leimg = document.querySelector('#sci-<?php echo get_row_index(); ?>');
		var contelem = document.querySelector('.scic-<?php echo get_row_index(); ?>');
		var imgelem = document.querySelector('#sci-<?php echo get_row_index(); ?>');

		function mobileSize(x) {
			if (x.matches) {
				//imgelem.style.minHeight = `auto`;
				contelem.style.minHeight = `auto`;
			} else {
				//imgelem.style.minHeight = `${lecont.offsetHeight}px`;
				contelem.style.minHeight = `${leimg.offsetHeight}px`;
			}
		}
		var x = window.matchMedia("(max-width: 639px)")
		mobileSize(x) // Call listener function at run time
		x.addListener(mobileSize) // Attach listener function on state changes
	}
</script>