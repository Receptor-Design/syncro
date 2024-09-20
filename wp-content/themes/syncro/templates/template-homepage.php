<?php
/*
Template Name: Homepage
*/
get_header(); ?>

<main class="home-hero">
  <?php $herobgimage = get_field('background_image'); ?>
  <section class="home-hero-top" <?php if (get_field('background_image')) : ?> title="<?php echo esc_attr($herobgimage['alt']); ?>" style="background-image: url(<?php echo esc_url($herobgimage['url']); ?>);" <?php endif; ?>>
    <div class="grid-container closer-container">
      <div class="grid-x grid-padding-x">
        <div class="cell small-12 medium-6 large-6">
          <div class="home-hero-top-container">
            <h1>
              <?php if (get_field('hero_banner_headline')) : ?>
                <?php echo get_field('hero_banner_headline'); ?>
              <?php else : ?>
                <?php the_title(); ?>
              <?php endif; ?>
            </h1>

            <?php if (get_field('hero_banner_content')) : ?>
              <div class="home-hero-top-content">
                <?php echo get_field('hero_banner_content'); ?>
              </div>
            <?php endif; ?>

            <?php $link = get_field('hero_banner_link');
            if ($link) : $link_url = $link['url'];
              $link_title = $link['title'];
              $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
              <a class="syncro-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                <?php echo esc_html($link_title); ?>&nbsp;>
              </a>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="home-hero-transition <?php if (get_field('quote_callout')) : ?><?php else : ?>home-transition-extend<?php endif; ?>">
    <?php if (get_field('quote_callout')) : ?>
      <img class="home-hero-transition-transition" src="<?php echo get_template_directory_uri(); ?>/assets/images/transition-shapes/homehero-transition.svg)">
    <?php else : ?>
      <img class="home-hero-transition-transition" src="<?php echo get_template_directory_uri(); ?>/assets/images/transition-shapes/homehero-transition-white.svg)">
    <?php endif; ?>

    <?php if (have_rows('award_logos')) : ?>
      <div class="home-hero-logos">
        <div class="grid-x grid-padding-x align-center">
          <div class="cell small-12 medium-11">
            <?php while (have_rows('award_logos')) : the_row(); ?>

              <?php $image = get_sub_field('award_logo');
              if (!empty($image)) : ?>
                <img class="home-hero-award" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
              <?php endif; ?>

            <?php endwhile; ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </section>

  <?php if (get_field('quote_callout')) : ?>
    <section class="home-hero-bottom bg-dark">
      <div class="grid-container closer-container">
        <div class="grid-x grid-padding-x align-center text-center">
          <div class="cell small-12">
            <h4 class="quote">

              <?php $image = get_field('icon_before_quote');
              if (!empty($image)) : ?>
                <img class="quote-icon lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
              <?php endif; ?>
              <span style="display:inline">
                <?php if (get_field('quote')) : ?>
                  <strong>“<?php echo get_field('quote'); ?>”</strong>
                <?php endif; ?>

                <?php if (get_field('quote_attribution')) : ?>
                  <span class="quote-attr">-&nbsp;<?php echo get_field('quote_attribution'); ?></span>
                <?php endif; ?>
              </span>
            </h4>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>
</main>

<main class="homepage-content">
  <?php get_template_part('parts/custom/_flexible_content'); ?>
</main> <!-- end #content -->

<?php get_template_part('parts/custom/footer_cta'); ?>

<?php get_footer(); ?>