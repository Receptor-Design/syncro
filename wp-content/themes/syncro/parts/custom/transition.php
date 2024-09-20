<?php if (get_sub_field('lower_transition_color') == 'white') : ?>
	<?php $bgcolor = ('bg-white'); ?>
<?php elseif (get_sub_field('lower_transition_color') == 'dark') : ?>
	<?php $bgcolor = ('bg-dark'); ?>
<?php elseif (get_sub_field('lower_transition_color') == 'light') : ?>
	<?php $bgcolor = ('bg-light'); ?>
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

<section class="transition-section <?php echo $bgcolor; ?> <?php echo $toppadding; ?> <?php echo $bottompadding; ?>">
	<?php if (get_sub_field('transition_type') == 'scurve') : ?>

		<?php if (get_sub_field('upper_transition_color') == 'white') : ?>
			<div class="upper-buffer upper-buffer-white"></div>
			<img class="scurve-transition" src="<?php echo get_template_directory_uri(); ?>/assets/images/transition-shapes/s-transition-whitetop.svg)">
		<?php elseif (get_sub_field('upper_transition_color') == 'dark') : ?>
			<div class="upper-buffer upper-buffer-dark"></div>
			<img class="scurve-transition" src="<?php echo get_template_directory_uri(); ?>/assets/images/transition-shapes/s-transition-bluetop.svg)">
		<?php elseif (get_sub_field('upper_transition_color') == 'light') : ?>
			<div class="upper-buffer upper-buffer-light"></div>
			<img class="scurve-transition" src="<?php echo get_template_directory_uri(); ?>/assets/images/transition-shapes/s-transition-lighttop.svg)">
		<?php endif; ?>

	<?php elseif (get_sub_field('transition_type') == 'upcurve') : ?>

		<?php if (get_sub_field('upper_transition_color') == 'white') : ?>
			<div class="upper-buffer upper-buffer-white"></div>
			<img class="scurve-transition" src="<?php echo get_template_directory_uri(); ?>/assets/images/transition-shapes/curvetransition-whitetop.svg)">
		<?php elseif (get_sub_field('upper_transition_color') == 'dark') : ?>
			<div class="upper-buffer upper-buffer-dark"></div>
			<img class="scurve-transition" src="<?php echo get_template_directory_uri(); ?>/assets/images/transition-shapes/curvetransition-bluetop.svg)">
		<?php elseif (get_sub_field('upper_transition_color') == 'light') : ?>
			<div class="upper-buffer upper-buffer-light"></div>
			<img class="scurve-transition" src="<?php echo get_template_directory_uri(); ?>/assets/images/transition-shapes/curvetransition-lighttop.svg)">
		<?php endif; ?>

	<?php elseif (get_sub_field('transition_type') == 'downcurve') : ?>

		<?php if (get_sub_field('upper_transition_color') == 'white') : ?>
			<div class="upper-buffer upper-buffer-white"></div>
			<img class="scurve-transition" src="<?php echo get_template_directory_uri(); ?>/assets/images/transition-shapes/revcurvetransition-whitetop.svg)">
		<?php elseif (get_sub_field('upper_transition_color') == 'dark') : ?>
			<div class="upper-buffer upper-buffer-dark"></div>
			<img class="scurve-transition" src="<?php echo get_template_directory_uri(); ?>/assets/images/transition-shapes/revcurvetransition-bluetop.svg)">
		<?php elseif (get_sub_field('upper_transition_color') == 'light') : ?>
			<div class="upper-buffer upper-buffer-light"></div>
			<img class="scurve-transition" src="<?php echo get_template_directory_uri(); ?>/assets/images/transition-shapes/revcurvetransition-lighttop.svg)">
		<?php endif; ?>

	<?php elseif (get_sub_field('transition_type') == 'none') : ?>

		<?php if (get_sub_field('upper_transition_color') == 'white') : ?>
			<div class="upper-buffer upper-buffer-white"></div>
		<?php elseif (get_sub_field('upper_transition_color') == 'dark') : ?>
			<div class="upper-buffer upper-buffer-dark"></div>
		<?php elseif (get_sub_field('upper_transition_color') == 'light') : ?>
			<div class="upper-buffer upper-buffer-light"></div>
		<?php endif; ?>

	<?php endif; ?>
</section>