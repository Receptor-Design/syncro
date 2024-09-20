<?php get_header(); ?>

<main class="single-blog grid-container closer-container">
	<div class="grid-x grid-padding-x align-center">
		<article id="post-<?php the_ID(); ?>" class="post-item cell small-12" role="article" itemscope itemtype="http://schema.org/BlogPosting">
			<section class="post-header text-center fader2">
				<h6>
					<?php $link = get_field('breadcrumb_link', 'option');
					if ($link) : $link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
					?>
						<a class="" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
							<?php echo esc_html($link_title); ?>
						</a>
					<?php endif; ?>
				</h6>
				<h1 class="media-release-single-title" itemprop="headline"><strong><?php the_title(); ?></strong></h1>
				<?php /*
					<p class="byline">
					<?php echo get_the_author(); ?>&ensp;|&ensp;<?php echo get_the_time('M j, Y'); ?>
				</p>
				*/ ?>
			</section> <!-- end article header -->
			<?php if (has_post_thumbnail()) : ?>
				<section class="blog-thumbnail text-center fader">
					<?php the_post_thumbnail('full'); ?>
					<p class="post-thumb-caption"><?php the_post_thumbnail_caption(''); ?></p>
				</section>
			<?php endif; ?>
			<section class="entry-content fader2" itemprop="text">
				<?php the_content(); ?>
				<?php /*<div class="media-release-about"></div>*/ ?>
			</section> <!-- end article section -->
		</article> <!-- end article -->
	</div>
</main> <!-- end #main -->
<?php get_footer(); ?>