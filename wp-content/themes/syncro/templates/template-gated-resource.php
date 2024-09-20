<?php
/*
Template Name: Gated Resource
Template Post Type: resource
*/
get_header(); ?>
<?php if (get_field('form_width')) : ?>
  <?php $formwidth = ('wideform'); ?>
  <?php $formwidthcontainer = ('large-shrink'); ?>
<?php else : ?>
  <?php $formwidth = (''); ?>
  <?php $formwidthcontainer = ('large-4'); ?>
<?php endif; ?>

<main class="gated-resource" data-equalizer data-equalize-on="medium">
  <section class="gated-resource-topper" id="form-size" data-equalizer-watch>
    <section class="resource-gate-hero bg-light">
      <div class="grid-container">
        <div class="grid-x grid-padding-x align-left">
          <div class="cell small-12 medium-auto">
            <?php $allcat = get_the_category(); ?>
            <?php foreach ($allcat as $cat) : ?>
              <!-- <a href="/<?php echo $cat->slug; ?>" class="resource-format <?php echo $cat->slug; ?>"><?php echo $cat->name; ?></a> -->
              <p class="resource-format <?php echo $cat->slug; ?>"><?php echo $cat->name; ?></p>
            <?php endforeach; ?>


            <?php if (get_field('page_headline')) : ?>
              <h1><?php echo get_field('page_headline'); ?></h1>
            <?php else : ?>
              <h1><?php the_title(); ?></h1>
            <?php endif; ?>


            <?php if (get_field('subheadline')) : ?>
              <div class="subhead"><?php echo get_field('subheadline'); ?></div>
            <?php endif; ?>
          </div>
          <div class="cell small-12 medium-5 <?php echo $formwidthcontainer; ?> form-container-nosize">
            <div class="form-container text-center" data-equalizer-watch>
              <div class="form-containment <?php echo $formwidth; ?> text-center">
                <?php if (get_field('form_headline')) : ?>
                  <div id="form-headline">
                    <h3 class="form-headline"><?php echo get_field('form_headline'); ?></h3>
                  </div>
                <?php endif; ?>
                <?php echo get_field('form_embed'); ?>
              </div>

              <?php if (get_field('include_content_below_form')) : ?>
                <?php if (have_rows('content_below_form')) : ?>
                  <div id="form-under" class="align-left content-below-form 
                  <?php if (get_field('form_width')) : ?>
                  below-form-wide
                  <?php else : ?>
                  below-form-thin
                  <?php endif; ?>">
                    <?php while (have_rows('content_below_form')) : the_row(); ?>

                      <?php if (get_sub_field('rich_content')) : ?>
                        <?php echo get_sub_field('rich_content'); ?>
                      <?php endif; ?>

                      <?php if (have_rows('buttons')) : ?>
                        <div class="button-container">
                          <?php while (have_rows('buttons')) : the_row(); ?>
                            <?php $link = get_sub_field('button');
                            if ($link) : $link_url = $link['url'];
                              $link_title = $link['title'];
                              $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                              <a class="syncro-button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                <?php echo esc_html($link_title); ?>
                              </a>
                            <?php endif; ?>
                          <?php endwhile; ?>
                        </div>
                      <?php endif; ?>

                      <?php $image = get_sub_field('image_under_form');
                      if (!empty($image)) : ?>
                        <img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                      <?php endif; ?>

                    <?php endwhile; ?>
                  </div>
                <?php endif; ?>
              <?php endif; ?>


            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="resource-gate-headliner">
      <div class="grid-container">
        <div class="grid-x grid-padding-x">
          <div class="cell small-12 medium-auto">
            <div class="grid-x align-middle">
              <?php if (get_field('form_width')) : ?>
                <?php $image = get_field('introduction_image');
                if (!empty($image)) : ?>
                  <div class="cell small-12 wideformimg">
                    <img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                  </div>
                <?php endif; ?>
              <?php else : ?>
                <?php if (get_field('image_position')) : ?>
                  <?php $image = get_field('introduction_image');
                  if (!empty($image)) : ?>
                    <div class="cell small-12 wideformimg">
                      <img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    </div>
                  <?php endif; ?>
                <?php else : ?>
                  <?php $image = get_field('introduction_image');
                  if (!empty($image)) : ?>
                    <div class="cell shrink medium-12 large-shrink skinnyformimg">
                      <img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    </div>
                  <?php endif; ?>
                <?php endif; ?>
              <?php endif; ?>
              <?php if (get_field('introduction_content')) : ?>
                <div class="cell auto resource-content-content">
                  <?php echo get_field('introduction_content'); ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="cell medium-5 <?php echo $formwidthcontainer; ?> show-for-medium">
            <div class="form-buffer <?php echo $formwidth; ?>"></div>
          </div>
        </div>
      </div>
    </section>
  </section>

  <?php if (get_field('content_type') == 'basic') : ?>
    <section class="resource-content-sections">
      <div class="grid-container">
        <div class="grid-x grid-margin-x">
          <?php if (get_field('main_content')) : ?>
            <div class="cell small-12 medium-auto resource-content-content small-order-2 medium-order-1">
              <?php echo get_field('main_content'); ?>
            </div>
          <?php endif; ?>
          <?php $image = get_field('sidebar_image');
          if (!empty($image)) : ?>
            <div class="cell medium-5 large-4 small-order-1 medium-order-2">
              <div class="form-buffer">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </section>
  <?php elseif (get_field('content_type') == 'flexible') : ?>
    <section class="resource-page-content-sections">
      <?php get_template_part('parts/custom/_flexible_content'); ?>
    </section>
  <?php endif; ?>

</main>

<?php get_template_part('parts/custom/footer_cta_resourcehub'); ?>
<?php get_template_part('parts/custom/z_partot_iframe_filler_gate'); ?>
<?php get_footer(); ?>