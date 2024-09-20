<?php $modnum = get_row_index(); ?>
<?php
if (get_sub_field('background_color') == 'white') :
	$bgcolor = ('bg-white');
	$lilogo = ('syncro-social-dark-linkedin.svg');
elseif (get_sub_field('background_color') == 'dark') :
	$bgcolor = ('bg-dark');
	$lilogo = ('syncro_social-linkedin.svg');
elseif (get_sub_field('background_color') == 'light') :
	$bgcolor = ('bg-light');
	$lilogo = ('syncro-social-dark-linkedin.svg');
endif; ?>
<?php
if (get_sub_field('leaders_per_row') == 'three') :
	$leaderperrow = ('small-12 medium-6 large-4');
elseif (get_sub_field('leaders_per_row') == 'four') :
	$leaderperrow = ('small-12 medium-4 large-3');
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

<section id="<?php echo get_sub_field('anchor_tag'); ?>" class="leadership-section <?php echo $bgcolor; ?> <?php echo $toppadding; ?> <?php echo $bottompadding; ?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x 
		<?php if (get_sub_field('leadership_alignment')) : ?>align-center<?php else : ?>align-left<?php endif; ?>
		">
			<?php if (get_sub_field('content_before_leadership')) : ?>
				<div class="cell small-12 content-before-leadership fader2">
					<?php echo get_sub_field('content_before_leadership'); ?>
				</div>
			<?php endif; ?>

			<?php if (have_rows('leaders')) : ?>
				<?php while (have_rows('leaders')) : the_row(); ?>
					<?php $contentnum = get_row_index(); ?>

					<?php if (get_sub_field('bio')) : ?>
						<button class="cell <?php echo $leaderperrow; ?> leader-item leader-item-button text-center fader" data-open="leader-<?php echo $modnum; ?>-<?php echo $contentnum; ?>">
						<?php else : ?>
							<div class="cell <?php echo $leaderperrow; ?> leader-item text-center fader">
							<?php endif; ?>

							<?php $image = get_sub_field('headshot');
							if (!empty($image)) : ?>
								<img class="leader-headshot lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
							<?php endif; ?>
							<?php if (get_sub_field('name')) : ?>
								<h5 class="leader-name"><?php echo get_sub_field('name'); ?></h5>
							<?php endif; ?>
							<?php if (get_sub_field('position')) : ?>
								<p class="leader-pos"><?php echo get_sub_field('position'); ?></p>
							<?php endif; ?>
							<?php if (get_sub_field('linkedin')) : ?>
								<a class="leader-linkedin" href="<?php echo get_sub_field('linkedin'); ?>" target="_blank" rel="nofollow">
									<img class="leader-linkedin-logo lozad" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo $lilogo; ?>)" alt="LinkedIn Logo">
								</a>
							<?php endif; ?>

							<?php if (get_sub_field('bio')) : ?>
						</button>
					<?php else : ?>
		</div>
	<?php endif; ?>

<?php endwhile; ?>
<?php endif; ?>
	</div>
	</div>
</section>


<?php if (have_rows('leaders')) : ?>
	<?php while (have_rows('leaders')) : the_row(); ?>
		<?php $contentnum = get_row_index(); ?>
		<div class="reveal leader-reveal" id="leader-<?php echo $modnum; ?>-<?php echo $contentnum; ?>" data-reveal>



			<?php if (get_sub_field('name')) : ?>
				<h5 class="leader-name">
					<?php echo get_sub_field('name'); ?>
					<?php if (get_sub_field('linkedin')) : ?>
						<a class="leader-linkedin" href="<?php echo get_sub_field('linkedin'); ?>" target="_blank" rel="nofollow">
							<img class="leader-linkedin-logo lozad" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo $lilogo; ?>)" alt="LinkedIn Logo">
						</a>
					<?php endif; ?>
				</h5>
			<?php endif; ?>
			<?php if (get_sub_field('position')) : ?>
				<p class="leader-pos"><?php echo get_sub_field('position'); ?></p>
			<?php endif; ?>
			<?php if (get_sub_field('bio')) : ?>
				<div class="bio-container">
					<?php echo get_sub_field('bio'); ?>
				</div>
			<?php endif; ?>

			<button class="close-button" data-close aria-label="Close modal" type="button">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<?php endwhile; ?>
<?php endif; ?>