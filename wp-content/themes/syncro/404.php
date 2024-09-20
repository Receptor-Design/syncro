<?php

/**
 * The template for displaying 404 (page not found) pages.
 *
 * For more info: https://codex.wordpress.org/Creating_an_Error_404_Page
 */

get_header(); ?>
<?php if (get_field('include_404_hero_banner', 'option')) : ?>
	<section class="hero-banner ">
		<div class="grid-container closer-container">
			<div class="grid-x grid-padding-x text-center align-middle">
				<div class="cell">
					<?php if (get_field('404_hero_headline', 'option')) : ?>
						<h1><?php echo get_field('404_hero_headline', 'option'); ?></h1>
					<?php else : ?>
						<h1>Octo uh-oh!</h1>
					<?php endif; ?>
					<?php if (get_field('404_hero_description', 'option')) : ?>
						<div class="hero-content-container">
							<?php echo get_field('404_hero_description', 'option'); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php if (get_field('404_content_position', 'option') == 'topleft') :
	$contentpos = ('align-left align-top');
elseif (get_field('404_content_position', 'option') == 'topcenter') :
	$contentpos = ('align-center align-top');
elseif (get_field('404_content_position', 'option') == 'topright') :
	$contentpos = ('align-right align-top');
elseif (get_field('404_content_position', 'option') == 'middleleft') :
	$contentpos = ('align-left align-middle');
elseif (get_field('404_content_position', 'option') == 'middlecenter') :
	$contentpos = ('align-center align-middle');
elseif (get_field('404_content_position', 'option') == 'middleright') :
	$contentpos = ('align-left align-middle');
elseif (get_field('404_content_position', 'option') == 'bottomleft') :
	$contentpos = ('align-right align-bottom');
elseif (get_field('404_content_position', 'option') == 'bottomcenter') :
	$contentpos = ('align-center align-bottom');
elseif (get_field('404_content_position', 'option') == 'bottomright') :
	$contentpos = ('align-right align-bottom');
endif; ?>
<?php if (get_field('404_background_image_position', 'option') == 'topleft') :
	$imgpos = ('background-position: top left');
elseif (get_field('404_background_image_position', 'option') == 'topcenter') :
	$imgpos = ('background-position: top center');
elseif (get_field('404_background_image_position', 'option') == 'topright') :
	$imgpos = ('background-position: top right');
elseif (get_field('404_background_image_position', 'option') == 'middleleft') :
	$imgpos = ('background-position: center left');
elseif (get_field('404_background_image_position', 'option') == 'middlecenter') :
	$imgpos = ('background-position: center center');
elseif (get_field('404_background_image_position', 'option') == 'middleright') :
	$imgpos = ('background-position: center right');
elseif (get_field('404_background_image_position', 'option') == 'bottomleft') :
	$imgpos = ('background-position: bottom left');
elseif (get_field('404_background_image_position', 'option') == 'bottomcenter') :
	$imgpos = ('background-position: bottom center');
elseif (get_field('404_background_image_position', 'option') == 'bottomright') :
	$imgpos = ('background-position: bottom right');
endif; ?>

<?php if (get_field('404_background_aspect_ratio', 'option')) :
	$aspectratio = get_field('404_background_aspect_ratio', 'option');
else :
	$aspectratio = ('2x1');
endif; ?>

<?php if (get_field('404_content_background_image', 'option')) : ?>
	<?php $image = get_field('404_content_background_image', 'option'); ?>
	<section class="aspect-ratio-<?php echo $aspectratio; ?> content-section full-width-bg content-404" title="<?php echo esc_attr($image['alt']); ?>" style="background-image: url(<?php echo esc_url($image['url']); ?>); <?php echo $imgpos; ?>">
	<?php else : ?>
		<section class="content-section full-width-bg">
		<?php endif; ?>
		<div class="grid-container">
			<div class="grid-x grid-padding-x <?php echo $contentpos; ?>">

				<div class="cell small-9 medium-6 fader2 <?php if (get_sub_field('button_alignment')) : ?>text-center<?php endif; ?>">
					<?php if (get_field('404_page_content', 'option')) : ?>
						<?php echo get_field('404_page_content', 'option'); ?>
					<?php endif; ?>

					<?php if (have_rows('404_link_blocks', 'option')) : ?>
						<div class="
					<?php if (get_field('404_button_alignment', 'option')) : ?>
						text-center
					<?php else : ?>
						text-left
					<?php endif; ?>">
							<?php while (have_rows('404_link_blocks', 'option')) : the_row(); ?>
								<?php $link = get_sub_field('404_exit_link', 'option');
								if ($link) : $link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';
								?>
									<a class="syncro-button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
										<?php echo esc_html($link_title); ?>
									</a>
								<?php endif; ?>

							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		</section>
		<!--
		<section class="contact-blocks bg-white">
			<div class="grid-container">
				<div class="grid-x grid-padding-x text-center align-center">
					<?php if (get_field('404_page_content', 'option')) : ?>
						<div class="cell small-12">
							<?php echo get_field('404_page_content', 'option'); ?>
						</div>
					<?php endif; ?>
					<?php if (have_rows('404_link_blocks', 'option')) : ?>
						<?php while (have_rows('404_link_blocks', 'option')) : the_row(); ?>
							<div class="cell small-12 medium-4">
								<div class="contactblock">
									<?php $link = get_sub_field('404_exit_link', 'option');
									if ($link) : $link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
									?>
										<a class="link404" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
											<?php echo esc_html($link_title); ?>&nbsp;>
										</a>
									<?php endif; ?>
								</div>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</section>
					-->
		<?php get_footer(); ?>