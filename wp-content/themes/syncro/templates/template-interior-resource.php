<?php
/*
Template Name: Interior Page
Template Post Type: resource
*/
get_header(); ?>

<?php if (!get_field('disable_hero_banner')) : ?>
  <?php get_template_part('parts/custom/hero_banner'); ?>
<?php endif; ?>

<main class="page-content">
  <?php get_template_part('parts/custom/_flexible_content'); ?>
</main> <!-- end #content -->

<?php get_template_part('parts/custom/footer_cta'); ?>

<?php get_footer(); ?>