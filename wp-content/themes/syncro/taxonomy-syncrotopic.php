<?php

/**
 * Displays archive pages if a speicifc template is not set. 
 * For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
get_header(); ?>

<?php get_template_part('parts/custom/reshub_blog_hero_banner'); ?>
<?php get_template_part('parts/custom/reshub_blog_archive'); ?>
<?php get_template_part('parts/custom/footer_cta_bloghub'); ?>

<?php get_footer(); ?>