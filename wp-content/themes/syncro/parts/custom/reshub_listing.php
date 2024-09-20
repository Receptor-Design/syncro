<main class="resource-hub" data-sort-by="<?php echo '' ?>">
  <?php get_template_part('parts/custom/reshub-searchbar'); ?>
  <section class="reshub-filters">
    <div class="grid-container">
      <div class="grid-x grid-margin-x">
        <div class="cell small-12 medium-7 topic-filter">
          <h6>FILTER BY TOPIC</h6>
          <fieldset data-filter-group="topics" data-logic="or">
            <?php
            $terms = get_field('topic_filter', 'option');
            if ($terms) : ?>
              <?php foreach ($terms as $term) : ?>
                <label class="resfilteritem" for="topic-<?php echo $term->slug ?>">
                  <input value=".<?php echo $term->slug ?>" type="checkbox" id="topic-<?php echo $term->slug ?>" name="topic" />
                  <span class="filter-button-teal filter-button" for="topic-<?php echo $term->slug ?>"><?php echo $term->name ?></span>
                </label>
              <?php endforeach; ?>
            <?php endif; ?>
          </fieldset>
        </div>
        <div class="cell small-12 medium-5 format-filter">
          <h6>FILTER BY FORMAT</h6>
          <fieldset data-filter-group="formats" data-logic="or">
            <?php
            $terms = get_field('format_filter', 'option');
            if ($terms) : ?>
              <?php foreach ($terms as $term) : ?>
                <label class="resfilteritem" for="format-<?php echo $term->slug ?>">
                  <input value=".<?php echo $term->slug ?>" type="checkbox" id="format-<?php echo $term->slug ?>" name="type" />
                  <span class="filter-button-purple filter-button" for="format-<?php echo $term->slug ?>"><?php echo $term->name ?></span>
                </label>
              <?php endforeach; ?>
            <?php endif; ?>
          </fieldset>
        </div>
      </div>
    </div>
  </section>

  <section class="resource-hub resource-hub-archive" role="main">
    <div class="grid-container reshub-container">
      <div class="grid-x grid-margin-x all-posts">

        <?php if (get_field('include_featured_resource', 'option')) : ?>
          <?php // DISPLAY CONTENT FOR SINGLE POST OBJECT
          $featured_post = get_field('featured_resource', 'option');
          if ($featured_post) :
            // override $post
            $post = $featured_post;
            setup_postdata($post);  ?>
            <?php if (get_field('featured_background_color', 'option') == 'white') :
              $ftbgcolor = ('bg-white');
            elseif (get_field('featured_background_color', 'option') == 'dark') :
              $ftbgcolor = ('bg-dark');
            elseif (get_field('featured_background_color', 'option') == 'light') :
              $ftbgcolor = ('bg-light');
            endif;
            $allcat = get_the_category();
            $thisCategory = '';
            $thisCategory = '';
            if (!empty($allcat)) {
              $thisCategory =  esc_html($allcat[0]->name);
              $thisCategorySlug =  esc_html($allcat[0]->slug);
            }
            ?>
            <div class="cell small-12 medium-6 large-8 mix">
              <a class="" href="<?php the_permalink() ?>">
                <div class="resfeatured <?php echo $ftbgcolor ?> hoverlift">
                  <div class="resfeatured-content">
                    <h6 class="feat-date"><?php printf(get_the_time(__('M j, Y', 'jointswp')),); ?> | <?php echo $thisCategory; ?></h6>
                    <?php if (get_field('page_headline')) : ?>
                      <h2 class="feat-title"><?php echo get_field('page_headline'); ?></h2>
                    <?php else : ?>
                      <h2 class="feat-title"><?php the_title(); ?></h2>
                    <?php endif; ?>
                    <h6 class="feat-date">
                      <?php $terms = get_the_terms($post->ID, 'resource-syncrotopic');
                      if ($terms && !is_wp_error($terms)) : ?>
                        <?php foreach ($terms as $term) : ?>
                          <span><?php echo $term->name; ?></span><span>,</span>
                        <?php endforeach  ?>
                      <?php endif ?>
                    </h6>
                    <div class="feat-p">
                      <?php if (get_field('post_excerpt')) : ?>
                        <?php
                        $excerpt = get_field('post_excerpt');
                        // Get the length of the excerpt and limit it to 260 characters without allowing a break in the middle of a word
                        if (strlen($excerpt) > 225) {
                          $str = explode("\n", wordwrap($excerpt, 225));
                          $str = $str[0] . '...';
                          $excerpt = $str;
                          echo $str;
                        } else {
                          echo $excerpt;
                        }
                        ?>
                      <?php else : ?>
                        <?php
                        $excerpt = wp_trim_words(get_the_content());
                        // Get the length of the excerpt and limit it to 260 characters without allowing a break in the middle of a word
                        if (strlen($excerpt) > 225) {
                          $str = explode("\n", wordwrap($excerpt, 225));
                          $str = $str[0] . '...';
                          $excerpt = $str;

                          echo $str;
                        } else {
                          echo $excerpt;
                        }
                        ?>
                      <?php endif; ?>
                    </div>
                    <?php if (get_field('archive_cta_override')) : ?>
                      <div class="syncro-link link-teal" href="<?php the_permalink() ?>">
                        <span><?php echo get_field('archive_cta_override'); ?>&nbsp;></span>
                      </div>
                    <?php else : ?>
                      <div class="syncro-link link-teal" href="<?php the_permalink() ?>">
                        <?php $allcat = get_the_category(); ?>
                        <?php foreach ($allcat as $cat) : ?>
                          <?php $ctalabel = get_field('cta_label', $cat); ?>
                          <span><?php echo $ctalabel; ?>&nbsp;></span>
                        <?php endforeach  ?>
                      </div>
                    <?php endif; ?>
                  </div>
                  <?php if (get_field('featured_background_color', 'option') == 'white') : ?>
                    <img class="featres-wave" src="<?php echo get_template_directory_uri(); ?>/assets/images/transition-shapes/resourcefeature-onwhite.svg)">
                  <?php elseif (get_field('featured_background_color', 'option') == 'dark') : ?>
                    <img class="featres-wave" src="<?php echo get_template_directory_uri(); ?>/assets/images/transition-shapes/resourcefeature-ondark.svg)">
                  <?php elseif (get_field('featured_background_color', 'option') == 'light') : ?>
                    <img class="featres-wave" src="<?php echo get_template_directory_uri(); ?>/assets/images/transition-shapes/resourcefeature-onlight.svg)">
                  <?php endif; ?>
                </div>
              </a>
            </div>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>
        <?php endif; ?>
        <?php $args = array(
          'post_type'       => 'resource',
          'orderby'         => 'date',
          'order'           => 'DESC',
          //'paged' => $paged,
          'tax_query' => array(
            array(
              'taxonomy' => 'resource-syncrotopic',
              'terms' => 'hidden',
              'field' => 'slug',
              'include_children' => true,
              'operator' => 'NOT IN'
            )
          ),
        );
        $q = new WP_Query($args);
        if ($q->have_posts()) : /* Open Loop */ ?>
          <?php while ($q->have_posts()) : $q->the_post(); /* Open Loop */ ?>
            <?php get_template_part('parts/loop', 'archive'); ?>
          <?php endwhile; ?>
          <div class="cell text-center">
            <span id="no-posts-text" style="display: none; text-align: center; margin: 100px auto;font-size: 24px;">Sorry, no resources meet this criteria. Please adjust your filter settings.</span>
          </div>
          <div class="cell text-center">
            <div class="load-more-wrapper">
              <button type="button" class="load-more load-more-button">Load more</button>
            </div>
          </div>
        <?php else : ?>
          <?php get_template_part('parts/content', 'missing'); ?>
        <?php endif; ?>
      </div>
    </div>
  </section>
</main> <!-- end #main -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/mixitup/3.3.1/mixitup.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/scripts/mixitup/mixitup-pagination.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/scripts/mixitup/mixitup-multifilter.min.js"></script>
<script>
  jQuery('.resource-hub').each(function() {
    if (!jQuery(this).hasClass('active')) {
      jQuery(this).addClass('active');
      var filterVal = 'all';
      var dataSort = '';
      var thisContainer = jQuery(this).find('.all-posts');

      var dataSort = jQuery(this).attr('data-sort-by');
      if (dataSort === '') {
        var filterVal = 'all';
      } else {
        var filterVal = '.' + dataSort
      }
      //if (dataSort === '') {
      //	mixer.setFilterGroupSelectors('formats', '');
      //} else {
      //	mixer.setFilterGroupSelectors('formats', filterVal);
      //}
      var loadMoreEl = document.querySelector('.load-more');
      var currentLimit = 14;
      var incrementAmount = 12;

      var mixer = mixitup(thisContainer, {
        callbacks: {
          onMixStart: handleMixStart,
          onMixEnd: handleMixEnd,
        },
        animation: {
          effects: 'fade stagger(50ms)' // Set a 'stagger' effect for the loading animation
        },

        load: {
          filter: filterVal
        },
        pagination: {
          limit: currentLimit
        },
        multifilter: {
          enable: true
        },
        controls: {
          toggleLogic: 'and',
        },
      });
    }

    jQuery(function() {
      var numItems = jQuery('.mix').length
      if (currentLimit >= numItems) {
        loadMoreEl.disabled = true;
        jQuery('.load-more-button').css('display', 'none');
      } else {
        loadMoreEl.disabled = false;
      }
    });

    function handleMixStart(state, futureState) {
      console.log(futureState)
      if (futureState.hasFailed) {
        jQuery('#no-posts-text').css('display', 'block');
      } else {
        jQuery('#no-posts-text').css('display', 'none');
      };
    }

    function handleMixEnd(state) {
      if (state.activePagination.limit >= state.totalMatching) {
        // Disable button
        loadMoreEl.disabled = true;
      } else if (loadMoreEl.disabled) {
        // Enable button
        loadMoreEl.disabled = false;
      }
    }

    function handleLoadMoreClick() {
      // On each click of the load more button, we increment
      // the current limit by a defined amount
      currentLimit += incrementAmount;
      mixer.paginate({
        limit: currentLimit
      });
    }

    loadMoreEl.addEventListener('click', handleLoadMoreClick);

    // preload based on URL ending with #inserttopic
    if (location.hash) {
      var hash = location.hash.replace('#', '.')
      mixer.filter(hash)
      jQuery("input[value='" + hash + "']").prop('checked', true)
    }
  });
</script>