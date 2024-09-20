<?php if (get_field('integrations_page_type') == 'custompage') : ?>
  <?php get_header(); ?>

  <?php if (!get_field('disable_hero_banner')) : ?>
    <?php get_template_part('parts/custom/hero_banner'); ?>
  <?php endif; ?>

  <main class="page-content">
    <?php get_template_part('parts/custom/_flexible_content'); ?>
  </main> <!-- end #content -->

  <?php get_template_part('parts/custom/footer_cta'); ?>

  <?php get_footer(); ?>

<?php else : ?>
  <!--REDIRECT TO ARCHIVE TEMPLATE-->
  <?php global $post; // < -- globalize, just in case
  $url = home_url('/integrations/');
  wp_redirect(esc_url($url), 301);
  ?>
<?php endif; ?>