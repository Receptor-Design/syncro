<?php if (strpos($_SERVER['REQUEST_URI'], '/topic/') !== false) {
  $template = 'taxonomy';
} else {
  $template = 'archive';
} ?>

<main class="resource-hub" data-sort-by="<?php echo '' ?>">

  <?php if ($template == 'archive') : ?>
    <?php if (get_field('include_featured_blog', 'option')) : ?>
      <?php // DISPLAY CONTENT FOR SINGLE POST OBJECT
      $featured_post = get_field('featured_blog', 'option');
      if ($featured_post) :
        // override $post
        $post = $featured_post;
        setup_postdata($post);  ?>

        <?php
        $thisID = get_the_ID();
        $allcat = get_the_category();
        $slugs = wp_list_pluck($allcat, 'slug');
        $names = wp_list_pluck($allcat, 'name');
        $catnames = join(' ', $names);
        $thisCategory = '';
        $thisCategory = '';
        if (!empty($allcat)) {
          $thisCategory =  esc_html($allcat[0]->name);
          $thisCategorySlug =  esc_html($allcat[0]->slug);
        }
        $topics = wp_get_post_terms($thisID, array('syncrotopic'));
        $filtered_topics = array_filter($topics, function ($term) {
          return !in_array($term->slug, ['hidden']);
        });
        $topicslugs = wp_list_pluck($filtered_topics, 'slug');
        $tnames = wp_list_pluck($filtered_topics, 'name');
        $topicnames = join(', ', $tnames);
        $resourceloop_bgimg = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
        <section class="reshub-feat-resource">
          <div class="grid-container">
            <div class="grid-x grid-margin-x">
              <div class="cell small-12">
                <article id="post-<?php the_ID(); ?>" class="reshub-feat-resource-item grid-x">
                  <a href="<?php the_permalink() ?>" class="feat-resource-image cell small-12 medium-6" <?php if (!empty($resourceloop_bgimg)) : ?>style="background-image:url('<?php echo $resourceloop_bgimg[0]; ?>')" <?php endif; ?>></a>
                  <div class="feat-resource-content cell small-12 medium-6">
                    <h6><?php printf(get_the_time(__('M j, Y', 'jointswp')),); ?> | By <?php echo get_the_author(); ?></h6>
                    <?php if (get_field('page_headline')) : ?>
                      <a href="<?php the_permalink() ?>">
                        <h2><?php echo get_field('page_headline'); ?></h2>
                      </a>
                    <?php else : ?>
                      <a href="<?php the_permalink() ?>">
                        <h2><?php the_title(); ?></h2>
                      </a>
                    <?php endif; ?>
                    <h6 class="undertitle"><?php echo $topicnames; ?></h6>
                    <?php if (get_field('post_excerpt')) : ?>
                      <?php
                      $excerpt = get_field('post_excerpt');
                      // Get the length of the excerpt and limit it to 260 characters without allowing a break in the middle of a word
                      if (strlen($excerpt) > 222) {
                        $str = explode("\n", wordwrap($excerpt, 222));
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
                      if (strlen($excerpt) > 222) {
                        $str = explode("\n", wordwrap($excerpt, 222));
                        $str = $str[0] . '...';
                        $excerpt = $str;
                        echo $str;
                      } else {
                        echo $excerpt;
                      }
                      ?>
                    <?php endif; ?>
                    <span class="bottom-items-buffer"></span>
                    <div class="bottom-items">
                      <h6 class="readtime">
                        <?php if (get_field('read_length')) : ?>
                          <?php echo get_field('read_length'); ?> Min Read
                        <?php endif; ?>
                      </h6>
                      <?php if (get_field('archive_cta_override')) : ?>
                        <a class="syncro-link link-teal" href="<?php the_permalink() ?>">
                          <span><?php echo get_field('archive_cta_override'); ?>&nbsp;></span>
                        </a>
                      <?php else : ?>
                        <a class="syncro-link link-teal" href="<?php the_permalink() ?>">
                          <?php foreach ($allcat as $cat) : ?>
                            <?php $ctalabel = get_field('cta_label', $cat); ?>
                            <span><?php echo $ctalabel; ?>&nbsp;></span>
                          <?php endforeach  ?>
                        </a>
                      <?php endif; ?>
                    </div>
                  </div>
                </article>
              </div>
            </div>
          </div>
        </section>
      <?php endif; ?>
    <?php endif; ?>
  <?php endif; ?>

  <section class="reshub-filters">
    <?php if ($template == 'archive') : ?>
      <div class="grid-container">
        <div class="grid-x grid-margin-x">
          <div class="cell small-12 blog-topic-filter">
            <!-- Filtering by topic -->
            <fieldset class="reset-filter">
              <button aria-label="Reset filters" id="clear-button" type="reset">View All</button>
            </fieldset>
            <h6>Filter by</h6>
            <fieldset id="blog-topic-filters" data-filter-group="topics" data-logic="or">
              <?php
              $terms = get_field('blog_topic_filter', 'option');
              if ($terms) : ?>
                <?php foreach ($terms as $term) : ?>
                  <label class="blogfilteritem" for="topic-<?php echo $term->slug ?>">
                    <input value=".<?php echo $term->slug ?>" type="checkbox" id="topic-<?php echo $term->slug ?>" name="topic" />
                    <span class="filter-button" for="topic-<?php echo $term->slug ?>"><?php echo $term->name ?></span>
                  </label>
                <?php endforeach; ?>
              <?php endif; ?>
            </fieldset>
            <script>
              document.addEventListener('DOMContentLoaded', () => {
                const fieldset = document.getElementById('blog-topic-filters');
                const checkFlexLines = () => {
                  const labels = Array.from(fieldset.getElementsByTagName('label'));
                  const isMultiline = labels.some((label, index) => index > 0 && label.offsetTop !== labels[0].offsetTop);
                  fieldset.classList.toggle('multiline', isMultiline);
                };
                checkFlexLines();
                window.addEventListener('resize', checkFlexLines);
              });
            </script>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <?php if ($template == 'taxonomy') : ?>
      <div class="grid-container">
        <div class="grid-x grid-margin-x">
          <div class="cell">
            <p class="breadcrumb fader2">
              <span class="breadcrumb-item byline-topic">
                <a href="/blog/" class="blog">Blog</a>
              </span>
              <span class="breadcrumb-item">></span>
              <span class="breadcrumb-item byline-topic">
                <?php $term_name = single_term_title('', false); ?>
                <span class="<?php echo $term_name; ?>"><?php echo $term_name; ?></span>
              </span>
            </p>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </section>


  <section class="resource-hub resource-hub-archive" role="main">
    <div class="grid-container">
      <div class="grid-x grid-margin-x all-posts">
        <?php $formatcat = ('blog'); ?>
        <?php $args = array(
          'post_type' => 'post',
          'post_status' => 'publish',
          'posts_per_page' => -1,
          'orderby'         => 'date',
          'order'           => 'DESC',
          'tax_query' => array(
            array(
              'taxonomy' => 'syncrotopic',
              'terms' => 'hidden',
              'field' => 'slug',
              'include_children' => true,
              'operator' => 'NOT IN'
            )
          )
        );
        $resblock_query = new WP_Query($args); ?>
        <?php if ($resblock_query->have_posts()) : ?>
          <?php while ($resblock_query->have_posts()) : $resblock_query->the_post(); ?>
            <?php get_template_part('parts/loop', 'archive'); ?>
          <?php endwhile; ?>
          <div class="cell text-center">
            <span id="no-posts-text" style="display: none; text-align: center; margin: 100px auto;font-size: 24px;">Sorry, no resources meet this criteria. Please adjust your filter settings.</span>
          </div>
          <div class="cell text-center">
            <div class="load-more-wrapper">
              <?php if (get_sub_field('disable_load_more')) : ?>
              <?php else : ?>
                <button type="button" class="load-more load-more-button">Load more</button>
              <?php endif; ?>
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
      var thisContainer = jQuery(this).find('.all-posts');
      var dataSort = jQuery(this).attr('data-sort-by');
      var filterVal = (dataSort === '' || typeof dataSort === 'undefined') ? 'all' : '.' + dataSort;

      var mixerConfig = {
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
        multifilter: {
          enable: true
        },
        controls: {
          toggleLogic: 'and',
        },
      };

      if (!<?php echo json_encode(get_sub_field('disable_load_more')); ?>) {
        mixerConfig.pagination = {
          limit: 12
        };
      }

      var mixer = mixitup(thisContainer, mixerConfig);

      if (!<?php echo json_encode(get_sub_field('disable_load_more')); ?>) {
        var loadMoreEl = document.querySelector('.load-more');
        var currentLimit = 12;
        var incrementAmount = 12;

        loadMoreEl.addEventListener('click', function() {
          currentLimit += incrementAmount;
          mixer.paginate({
            limit: currentLimit
          });
        });

        checkLoadMoreState(loadMoreEl, currentLimit);

        if (location.hash) {
          var hash = location.hash.replace('#', '.');
          mixer.filter(hash);
          jQuery("input[value='" + hash + "']").prop('checked', true);
        }
      }

      document.getElementById('clear-button').addEventListener('click', function() {
        mixer.filter('all');
        jQuery('#blog-topic-filters input[type="checkbox"]').prop('checked', false);
      });
    }
  });

  function handleMixStart(state, futureState) {
    console.log(futureState);
    jQuery('#no-posts-text').css('display', futureState.hasFailed ? 'block' : 'none');
  }

  function handleMixEnd(state) {
    var loadMoreEl = document.querySelector('.load-more');
    if (state.activePagination) {
      loadMoreEl.disabled = (state.activePagination.limit >= state.totalMatching);
    }
  }

  function checkLoadMoreState(loadMoreEl, currentLimit) {
    var numItems = jQuery('.mix').length;
    if (currentLimit >= numItems) {
      loadMoreEl.disabled = true;
      jQuery('.load-more-button').css('display', 'none');
    } else {
      loadMoreEl.disabled = false;
    }
  }
</script>