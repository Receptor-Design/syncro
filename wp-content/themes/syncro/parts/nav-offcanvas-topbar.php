<?php

/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */

?>




<?php if (get_field('announcement_bar_visibility', 'option') == 'customhide') : ?>

	<?php if (get_field('hide_announcement_bar_062223')) : ?>
		<?php $hide_on_page = 'hide-on-page'; ?>
	<?php else : ?>
		<?php $hide_on_page = ''; ?>
	<?php endif; ?>
	<?php if (get_field('apply_settings_to_post_announcement_bars', 'option')) : ?>
		<?php $hide_on_post = 'hide-on-post'; ?>
	<?php else : ?>
		<?php $hide_on_post = ''; ?>
	<?php endif; ?>
	<?php if (get_field('hide_announcement_bar', 'option')) : ?>
		<?php $hide_resource = 'hide-on-resource'; ?>
	<?php else : ?>
		<?php $hide_resource = ''; ?>
	<?php endif; ?>
	<?php if (get_field('hide_announcement_bar_blog', 'option')) : ?>
		<?php $hide_blog = 'hide-on-blog'; ?>
	<?php else : ?>
		<?php $hide_blog = ''; ?>
	<?php endif; ?>

	<section class="announcement-bar bg-dark <?= "$hide_on_page $hide_on_post $hide_blog $hide_resource" ?>">
		<div class="grid-container">
			<div class="grid-x grid-margin-x align-center text-center">
				<p>
					<?php $image = get_field('announcement_bar_icon_', 'option');
					if (!empty($image)) : ?>
						<img class="announce-icon" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					<?php endif; ?>
					<?php if (get_field('announcement_bar_content', 'option')) : ?>
						<?php echo get_field('announcement_bar_content', 'option', false, false); ?>
					<?php endif; ?>
				</p>
			</div>
		</div>
	</section>


<?php elseif (get_field('announcement_bar_visibility', 'option') == 'customshow') : ?>

	<?php if (get_field('hide_announcement_bar_062223')) : ?>
		<?php $hide_on_page = ''; ?>
	<?php else : ?>
		<?php $hide_on_page = 'hide-on-page'; ?>
	<?php endif; ?>

	<?php if (get_field('apply_settings_to_post_announcement_bars', 'option')) : ?>
		<?php $hide_on_post = ''; ?>
	<?php else : ?>
		<?php $hide_on_post = 'hide-on-post'; ?>
	<?php endif; ?>

	<?php if (get_field('show_announcement_bar', 'option')) : ?>
		<?php $hide_resource = ''; ?>
	<?php else : ?>
		<?php $hide_resource = 'hide-on-resource'; ?>
	<?php endif; ?>
	<?php if (get_field('show_announcement_bar_blog', 'option')) : ?>
		<?php $hide_blog = ''; ?>
	<?php else : ?>
		<?php $hide_blog = 'hide-on-blog'; ?>
	<?php endif; ?>


	<section class="announcement-bar bg-dark <?= "$hide_on_page $hide_on_post $hide_blog $hide_resource" ?>">
		<div class="grid-container">
			<div class="grid-x grid-margin-x align-center text-center">
				<p>
					<?php $image = get_field('announcement_bar_icon_', 'option');
					if (!empty($image)) : ?>
						<img class="announce-icon" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					<?php endif; ?>
					<?php if (get_field('announcement_bar_content', 'option')) : ?>
						<?php echo get_field('announcement_bar_content', 'option', false, false); ?>
					<?php endif; ?>
				</p>
			</div>
		</div>
	</section>


<?php elseif (get_field('announcement_bar_visibility', 'option') == 'none') : ?>
<?php elseif (get_field('announcement_bar_visibility', 'option') == 'all') : ?>
	<section class="announcement-bar bg-dark">
		<div class="grid-container">
			<div class="grid-x grid-margin-x align-center text-center">
				<p>
					<?php $image = get_field('announcement_bar_icon_', 'option');
					if (!empty($image)) : ?>
						<img class="announce-icon" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					<?php endif; ?>

					<?php if (get_field('announcement_bar_content', 'option')) : ?>
						<?php echo get_field('announcement_bar_content', 'option', false, false); ?>
					<?php endif; ?>
				</p>
			</div>
		</div>
	</section>
<?php endif; ?>

<div class="upper-bar grid-container text-right show-for-medium">

	<?php if (have_rows('top_navigation_links', 'option')) : ?>
		<p><?php while (have_rows('top_navigation_links', 'option')) : the_row(); ?><span class="top-nav-link-item"><?php $link = get_sub_field('top_link', 'option');
																																																								if ($link) : $link_url = $link['url'];
																																																									$link_title = $link['title'];
																																																									$link_target = $link['target'] ? $link['target'] : '_self';
																																																								?><a class="
			<?php if (get_sub_field('top_link_style', 'option')) : ?>
				top-nav-link-teal
			<?php else : ?>
				top-nav-link-grey
			<?php endif; ?>
			" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
							<?php echo esc_html($link_title); ?>
						</a><?php endif; ?></span><?php endwhile; ?>
		</p>
	<?php endif; ?>
</div>
<div class="top-bar grid-container">

	<div class="top-bar-left float-left grid-x align-bottom">
		<a class="nav-logo-link" href="<?php echo home_url(); ?>">
			<?php $image = get_field('navigation_logo', 'option');
			if (!empty($image)) : ?>
				<img class="nav-logo" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
			<?php endif; ?>
		</a>
		<div class="navigation show-for-large">
			<?php get_template_part('parts/custom/mega_navigation'); ?>
			<!-- <?php //joints_top_nav(); 
						?> -->
		</div>
	</div>
	<div class="top-bar-right show-for-medium">
		<div class="mobilemenu float-left show-for-medium-only">
			<ul class="menu">
				<li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li>
			</ul>
		</div>

		<?php if (have_rows('navigation_buttons', 'option')) : ?>
			<?php while (have_rows('navigation_buttons', 'option')) : the_row(); ?>
				<?php if (get_sub_field('nav_button_style') == 'toutline') : ?>
					<?php $buttonstyle = ('button-outlines'); ?>
				<?php elseif (get_sub_field('nav_button_style') == 'msolid') : ?>
					<?php $buttonstyle = ('button-solid'); ?>
				<?php endif; ?>

				<?php $link = get_sub_field('nav_button', 'option');
				if ($link) : $link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
				?>
					<a class="<?php echo $buttonstyle; ?> nav-button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
						<?php echo esc_html($link_title); ?>
					</a>
				<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>

	<div class="top-bar-right float-right show-for-small-only mobilemenu auto">

		<?php if (have_rows('mobile_navigation_buttons', 'option')) : ?>
			<?php while (have_rows('mobile_navigation_buttons', 'option')) : the_row(); ?>
				<?php if (get_sub_field('nav_button_style') == 'toutline') : ?>
					<?php $buttonstyle = ('button-outlines'); ?>
				<?php elseif (get_sub_field('nav_button_style') == 'msolid') : ?>
					<?php $buttonstyle = ('button-solid'); ?>
				<?php endif; ?>

				<?php $link = get_sub_field('nav_button', 'option');
				if ($link) : $link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
				?>
					<a class="<?php echo $buttonstyle; ?> nav-button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
						<?php echo esc_html($link_title); ?>
					</a>
				<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>



		<ul class="menu">
			<li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li>
		</ul>
	</div>
</div>