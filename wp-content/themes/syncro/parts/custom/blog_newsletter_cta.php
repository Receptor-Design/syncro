<?php if (get_sub_field('newsletter_cta_type') == 'none') : ?>
<?php elseif (get_sub_field('newsletter_cta_type') == 'custom') : ?>

	<?php if (have_rows('newsletter_cta')) : ?>
		<?php while (have_rows('newsletter_cta')) : the_row(); ?>
			<?php if (get_sub_field('newsletter_cta_form_embed')) : ?>
				<div class="blog-newsletter-end text-center">
					<?php if (get_sub_field('newsletter_cta_headline')) : ?>
						<h2><?php echo get_sub_field('newsletter_cta_headline'); ?></h2>
					<?php endif; ?>
					<?php if (get_sub_field('newsletter_cta_subheadline')) : ?>
						<p><?php echo get_sub_field('newsletter_cta_subheadline'); ?></p>
					<?php endif; ?>
					<span><?php echo get_sub_field('newsletter_cta_form_embed'); ?></span>
				</div>
			<?php endif; ?>
		<?php endwhile; ?>
	<?php endif; ?>

<?php else : /* global */ ?>

	<?php if (have_rows('global_blog_newsletter_cta', 'option')) : ?>
		<?php while (have_rows('global_blog_newsletter_cta', 'option')) : the_row(); ?>
			<?php if (get_sub_field('global_blog_newsletter_cta_headline', 'option')) : ?>
				<?php if (get_sub_field('global_blog_newsletter_cta_form_embed')) : ?>

					<div class="blog-newsletter-end text-center">
						<?php if (get_sub_field('global_blog_newsletter_cta_headline')) : ?>
							<h2><?php echo get_sub_field('global_blog_newsletter_cta_headline'); ?></h2>
						<?php endif; ?>
						<?php if (get_sub_field('global_blog_newsletter_cta_subheadline')) : ?>
							<h5><?php echo get_sub_field('global_blog_newsletter_cta_subheadline'); ?></h5>
						<?php endif; ?>
						<span><?php echo get_sub_field('global_blog_newsletter_cta_form_embed'); ?></span>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		<?php endwhile; ?>
	<?php endif; ?>

<?php endif; ?>