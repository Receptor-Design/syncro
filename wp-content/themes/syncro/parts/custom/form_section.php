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
<?php if (get_sub_field('form_width')) {
	$formwidth = ('wideform');
	$formwidthcontainer = ('large-11 medium-12 small-12');
} else {
	$formwidth = ('thinform');
	$formwidthcontainer = ('small-12');
} ?>
<?php if (get_sub_field('contain_form_in_white_box')) {
	$formbox = ('form-boxed');
} else {
	$formbox = ('');
} ?>

<section id="<?php echo get_sub_field('anchor_tag'); ?>" class="form-section <?php echo $bgcolor; ?> <?php echo $toppadding; ?> <?php echo $bottompadding; ?>">
	<div class="grid-container closer-container">
		<div class="grid-x grid-margin-x grid-padding-x align-center">

			<?php if (get_sub_field('form_embed')) : ?>
				<div class="<?php echo $formwidthcontainer; ?> fader2">
					<div class="form-containment <?php echo $formwidth; ?> <?php echo $formbox; ?>" id="form-size">
						<?php if (get_sub_field('form_headline')) : ?>
							<h3 class="form-headline"><?php echo get_sub_field('form_headline'); ?></h3>
						<?php endif; ?>
						<div class="form-frame">
							<?php echo get_sub_field('form_embed'); ?>
						</div>
					</div>
				</div>
			<?php endif; ?>

		</div>
	</div>
</section>

<?php get_template_part('parts/custom/z_partot_iframe_filler'); ?>