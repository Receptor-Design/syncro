<?php
if (get_sub_field('lower_background_color') == 'white') :
	$bgcolor = ('bg-white');
elseif (get_sub_field('lower_background_color') == 'dark') :
	$bgcolor = ('bg-dark');
elseif (get_sub_field('lower_background_color') == 'light') :
	$bgcolor = ('bg-light');
endif; ?>

<section id="<?php echo get_sub_field('anchor_tag'); ?>" class="photo-circles <?php echo $bgcolor; ?>">
	<?php if (get_sub_field('upper_background_color') == 'white') : ?>
		<div class="bg-white photo-circles-top-trans"></div>
		<img class="photo-transition" src="<?php echo get_template_directory_uri(); ?>/assets/images/transition-shapes/s-transition-whitetop.svg)">
	<?php elseif (get_sub_field('upper_background_color') == 'dark') : ?>
		<div class="bg-dark photo-circles-top-trans"></div>
		<img class="photo-transition" src="<?php echo get_template_directory_uri(); ?>/assets/images/transition-shapes/s-transition-bluetop.svg)">
	<?php elseif (get_sub_field('upper_background_color') == 'light') : ?>
		<div class="bg-light photo-circles-top-trans"></div>
		<img class="photo-transition" src="<?php echo get_template_directory_uri(); ?>/assets/images/transition-shapes/s-transition-lighttop.svg)">
	<?php endif; ?>

	<div class="fader circle-image-container <?php if (get_sub_field('number_of_images') == 'eight') : ?>circle-image-container-eight<?php endif; ?>">
		<?php if (get_sub_field('number_of_images') == 'five') : ?>

			<?php $image = get_sub_field('image_one');
			if (!empty($image)) : ?>
				<div class="circlefive-image circlefive-1 rellax" data-rellax-speed="1">
					<div class="circle-image-inner">
						<img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					</div>
				</div>
			<?php endif; ?>
			<?php $image = get_sub_field('image_two');
			if (!empty($image)) : ?>
				<div class="circlefive-image circlefive-2 rellax" data-rellax-speed="3">
					<div class="circle-image-inner">
						<img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					</div>
				</div>
			<?php endif; ?>
			<?php $image = get_sub_field('image_three');
			if (!empty($image)) : ?>
				<div class="circlefive-image circlefive-3 rellax" data-rellax-speed="2">
					<div class="circle-image-inner">
						<img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					</div>
				</div>
			<?php endif; ?>
			<?php $image = get_sub_field('image_four');
			if (!empty($image)) : ?>
				<div class="circlefive-image circlefive-4 rellax" data-rellax-speed="1">
					<div class="circle-image-inner">
						<img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					</div>
				</div>
			<?php endif; ?>
			<?php $image = get_sub_field('image_five');
			if (!empty($image)) : ?>
				<div class="circlefive-image circlefive-5 rellax" data-rellax-speed="2">
					<div class="circle-image-inner">
						<img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					</div>
				</div>
			<?php endif; ?>

		<?php elseif (get_sub_field('number_of_images') == 'eight') : ?>

			<?php $image = get_sub_field('image_one');
			if (!empty($image)) : ?>
				<div class="circleeight-image circleeight-1 rellax" data-rellax-xs-speed="0" data-rellax-mobile-speed="0" data-rellax-tablet-speed="2" data-rellax-desktop-speed="3">
					<div class="circle-image-inner">
						<img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					</div>
				</div>
			<?php endif; ?>
			<?php $image = get_sub_field('image_two');
			if (!empty($image)) : ?>
				<div class="circleeight-image circleeight-2 rellax" data-rellax-xs-speed="0" data-rellax-mobile-speed="0" data-rellax-tablet-speed="1" data-rellax-desktop-speed="2">
					<div class="circle-image-inner">
						<img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					</div>
				</div>
			<?php endif; ?>
			<?php $image = get_sub_field('image_three');
			if (!empty($image)) : ?>
				<div class="circleeight-image circleeight-3 rellax" data-rellax-xs-speed="0" data-rellax-mobile-speed="0" data-rellax-tablet-speed="2" data-rellax-desktop-speed="3">
					<div class="circle-image-inner">
						<img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					</div>
				</div>
			<?php endif; ?>
			<?php $image = get_sub_field('image_four');
			if (!empty($image)) : ?>
				<div class="circleeight-image circleeight-4 rellax" data-rellax-xs-speed="0" data-rellax-mobile-speed="0" data-rellax-tablet-speed="1" data-rellax-desktop-speed="1">
					<div class="circle-image-inner">
						<img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					</div>
				</div>
			<?php endif; ?>
			<?php $image = get_sub_field('image_five');
			if (!empty($image)) : ?>
				<div class="circleeight-image circleeight-5 rellax" data-rellax-xs-speed="0" data-rellax-mobile-speed="0" data-rellax-tablet-speed="1" data-rellax-desktop-speed="1">
					<div class="circle-image-inner">
						<img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					</div>
				</div>
			<?php endif; ?>
			<?php $image = get_sub_field('image_six');
			if (!empty($image)) : ?>
				<div class="circleeight-image circleeight-6 rellax" data-rellax-xs-speed="0" data-rellax-mobile-speed="0" data-rellax-tablet-speed="1.5" data-rellax-desktop-speed="2">
					<div class="circle-image-inner">
						<img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					</div>
				</div>
			<?php endif; ?>
			<?php $image = get_sub_field('image_seven');
			if (!empty($image)) : ?>
				<div class="circleeight-image circleeight-7 rellax" data-rellax-xs-speed="0" data-rellax-mobile-speed="0" data-rellax-tablet-speed="2" data-rellax-desktop-speed="1">
					<div class="circle-image-inner">
						<img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					</div>
				</div>
			<?php endif; ?>
			<?php $image = get_sub_field('image_eight');
			if (!empty($image)) : ?>
				<div class="circleeight-image circleeight-8 rellax" data-rellax-xs-speed="0" data-rellax-mobile-speed="0" data-rellax-tablet-speed="1" data-rellax-desktop-speed="1">
					<div class="circle-image-inner">
						<img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					</div>
				</div>
			<?php endif; ?>
		<?php endif; ?>
	</div>

</section>