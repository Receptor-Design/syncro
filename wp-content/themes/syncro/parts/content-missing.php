<?php

/**
 * The template part for displaying a message that posts cannot be found
 */
?>

<div class="post-not-found cell">
	<?php if (is_search()) : ?>

		<h3><?php _e('Sorry, No Results.', 'jointswp'); ?></h3>

		<section class="entry-content">
			<p><?php _e('Please try your search again with another term.', 'jointswp'); ?></p>
		</section>


	<?php else : ?>

		<header class="article-header">
			<h1><?php _e('Octo uh-oh!', 'jointswp'); ?></h1>
		</header>

		<section class="entry-content">
			<p><?php _e('Something is missing. Try double checking things.', 'jointswp'); ?></p>
		</section>

	<?php endif; ?>

</div>