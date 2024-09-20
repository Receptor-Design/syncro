<?php

/**
 * The template part for displaying offcanvas content
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>

<div class="off-canvas position-right" id="off-canvas" data-off-canvas>
	<div class="main-offcanvas-nav">
		<ul class="menu">
			<li><a href="<?php echo home_url(); ?>">HOME</a></li>
		</ul>
		<?php get_template_part('parts/custom/mega_navigation'); ?>

		<?php //joints_off_canvas_nav(); 
		?>
	</div>

	<div class="buttons-offcanvas-nav show-for-small-only">
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

	<?php if (have_rows('top_navigation_links', 'option')) : ?>
		<div class="topcontent-offcanvas show-for-small-only"><?php while (have_rows('top_navigation_links', 'option')) : the_row(); ?>
				<?php $link = get_sub_field('top_link', 'option');
																														if ($link) : $link_url = $link['url'];
																															$link_title = $link['title'];
																															$link_target = $link['target'] ? $link['target'] : '_self';
				?>
					<a class="
			<?php if (get_sub_field('top_link_style', 'option')) : ?>
				top-nav-link-teal
			<?php else : ?>
				top-nav-link-grey
			<?php endif; ?>
			" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
						<?php echo esc_html($link_title); ?>
					</a><?php endif; ?><?php endwhile; ?>
		</div>
	<?php endif; ?>



	<?php if (is_active_sidebar('offcanvas')) : ?>
		<?php dynamic_sidebar('offcanvas'); ?>
	<?php endif; ?>
</div>