<?php
$headline = get_sub_field('headline');
$columns = get_sub_field('columns');
?>
<section class="logo-grid-block content-block">
  <div class="grid-container">
    <?php if ($headline) { ?>
      <div class="grid-x grid-margin-x grid-padding-x">
        <div class="small-12 medium-12 large-12 cell text-center">
          <h2><?php echo $headline; ?></h2>
          <?php echo $content; ?>
        </div>
      </div>
    <?php } ?>
    <div class="logo-grid-items grid-x grid-margin-x grid-padding-x align-center large-up-<?php echo $columns; ?> medium-up-<?php echo $columns; ?> small-up-1">
      <?php if (have_rows('logos')) : ?>
        <?php while (have_rows('logos')) : the_row();
          $logo = get_sub_field('logo');
          $link = get_sub_field('link');
        ?>
          <div class="cell text-center">
            <?php if ($link) {
              $link_url = $link['url'];
              $link_title = $link['title'];
              $link_target = $link['target'] ? $link['target'] : '_self';
            } ?>
            <div class="logo-grid-item">
              <?php if ($link) { ?><a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><? } ?>
                <?php if (!empty($logo)) : ?>
                  <img class="lozad" data-src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
                <?php endif; ?>
            </div>
            <?php if ($link) { ?></a>
            <?php } ?>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 193.57 223.52">
              <polygon points="0 55.88 0 167.64 96.79 223.52 193.57 167.64 193.57 55.88 96.79 0 0 55.88" />
            </svg>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</section>