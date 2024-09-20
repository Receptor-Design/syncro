<section class="hero-banner">
  <div class="grid-container closer-container">
    <div class="grid-x grid-padding-x text-center align-middle">
      <div class="cell">
        <h1>
          <?php if (get_field('blog_hub_hero_banner_headline', 'option')) : ?>
            <?php echo get_field('blog_hub_hero_banner_headline', 'option'); ?>
          <?php else : ?>
            <?php the_archive_title(); ?>
          <?php endif; ?>
        </h1>
        <?php if (get_field('blog_hub_hero_banner_content', 'option')) : ?>
          <div class="hero-content-container">
            <?php echo get_field('blog_hub_hero_banner_content', 'option'); ?>
          </div>
        <?php endif; ?>
        <?php if (have_rows('blog_hub_hero_banner_links', 'option')) : ?>
          <div class="hero-content-repeater">
            <?php while (have_rows('blog_hub_hero_banner_links', 'option')) : the_row(); ?>
              <div class="hero-link">
                <?php $link = get_sub_field('blog_hub_hero_link', 'option');
                if ($link) : $link_url = $link['url'];
                  $link_title = $link['title'];
                  $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                  <a class="" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                    <?php echo esc_html($link_title); ?>
                  </a>
                <?php endif; ?>
              </div>
            <?php endwhile; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>