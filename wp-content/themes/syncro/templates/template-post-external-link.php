<?php
global $post; // < -- globalize, just in case
if (get_field('external_link')) {
  wp_redirect(esc_url(get_field('external_link')), 301);
}
/*
Template Name: External Link
Template Post Type: resource
*/
get_header(); ?>


<?php get_footer(); ?>