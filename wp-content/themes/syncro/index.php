<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 */
get_header(); ?>

<?php get_template_part('parts/custom/reshub_blog_hero_banner'); ?>
<?php get_template_part('parts/custom/reshub_blog_archive'); ?>
<?php get_template_part('parts/custom/footer_cta_bloghub'); ?>

<?php get_footer(); ?>