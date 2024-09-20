<?php
$link = get_field('ad_cta_link');
if ($link) :
  $link_url = $link['url'];
?>
  <?php global $post; // < -- globalize, just in case
  if (get_field('ad_cta_link')) {
    wp_redirect(esc_url($link_url), 301);
  }
  ?>
<?php endif; ?>
  
<?php
/*
Template Name: Resource Ad
Template Post Type: resource
*/
get_header(); ?>

<?php get_footer(); ?>