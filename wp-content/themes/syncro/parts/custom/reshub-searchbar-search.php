<section class="reshub-search">
	<div class="grid-container ressearch-container">
		<div class="grid-x grid-padding-x">
			<div class="cell auto searchbarmobile">
				<form role="search" method="get" class="res-search search-form" action="<?php bloginfo('url'); ?>/">
					<span class="screen-reader-text">Search for:</span>
					<input type="search" class="search-field" placeholder="Search" value="<?php the_search_query(); ?>" name="s" title="">
					<input type="hidden" name="post_type" value="resource" />
					<input type="submit" value=" " alt="Search" style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/images/search-icon-dark.svg)" class="search-arrow-icon" />
				</form>
			</div>
			<div class="cell shrink searchbuttonmobile text-center">
				<a class="syncro-button" href="<?php echo get_post_type_archive_link('resource'); ?>">Clear Search</a>
			</div>
		</div>
	</div>
</section>