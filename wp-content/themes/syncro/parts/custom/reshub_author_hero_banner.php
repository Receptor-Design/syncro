<section class="hero-banner">
  <div class="grid-container closer-container">
    <div class="grid-x grid-padding-x text-center align-middle">
      <div class="cell">
        <h1>
          <?php if (get_field('author_hero_banner_headline', 'option')) : ?>
            <?php echo get_field('author_hero_banner_headline', 'option'); ?>
          <?php else : ?>
            <?php the_archive_title(); ?>
          <?php endif; ?>
        </h1>
        <?php if (get_field('author_hero_banner_content', 'option')) : ?>
          <div class="hero-content-container">
            <?php echo get_field('author_hero_banner_content', 'option'); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>