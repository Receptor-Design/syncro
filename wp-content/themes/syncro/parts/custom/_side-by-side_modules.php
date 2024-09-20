<?php
if (get_sub_field('background_color') == 'white') :
  $bgcolor = ('bg-white');
elseif (get_sub_field('background_color') == 'dark') :
  $bgcolor = ('bg-dark');
elseif (get_sub_field('background_color') == 'light') :
  $bgcolor = ('bg-light');
endif; ?>
<?php
$paddingoptions = get_sub_field('adjust_padding');
if ($paddingoptions && in_array('removetop', $paddingoptions)) {
  $toppadding = ('notoppadding');
} else {
  $toppadding = ('');
} ?>
<?php
$paddingoptions = get_sub_field('adjust_padding');
if ($paddingoptions && in_array('removebottom', $paddingoptions)) {
  $bottompadding = ('nobottompadding');
} else {
  $bottompadding = ('');
} ?>


<section id="<?php echo get_sub_field('anchor_tag'); ?>" class="sidebyside-section <?php echo $bgcolor; ?> <?php echo $toppadding; ?> <?php echo $bottompadding; ?>">
  <div class="grid-container">
    <div class="grid-x grid-padding-x align-center <?php if (get_sub_field('content_and_visual_alignment')) : ?>align-middle<?php endif; ?>">



      <?php if (have_rows('column_item')) : ?>
        <?php while (have_rows('column_item')) : the_row(); ?>

          <div class="cell fader2 sidebyside-cell
            <?php if (get_sub_field('column_width') == 'quarter') : ?>
              small-12 medium-4 large-3
            <?php elseif (get_sub_field('column_width') == 'third') : ?>
              small-12 medium-4 large-4
            <?php elseif (get_sub_field('column_width') == 'half') : ?>
              small-12 medium-6 large-6
            <?php elseif (get_sub_field('column_width') == 'twothird') : ?>
              small-12 medium-8 large-8
            <?php elseif (get_sub_field('column_width') == 'threequarter') : ?>
              small-12 medium-8 large-9
            <?php elseif (get_sub_field('column_width') == 'whole') : ?>
              small-12 medium-12
            <?php endif; ?>
            ">

            <?php if (get_sub_field('module_type') == 'accordion') : ?>
              <?php
              if (get_sub_field('accordion_start_position') == 'firstopen') {
                $startpos = ('is-active');
              } else {
                $startpos = ('');
              } ?>
              <?php if (have_rows('accordions')) : $counter = 0; ?>
                <ul class="accordion fader2 bg-text-white" data-accordion data-allow-all-closed="true">
                  <?php while (have_rows('accordions')) : the_row(); ?>
                    <?php if ($counter == 0) : ?>
                      <li class="accordion-item <?php echo $startpos; ?>" data-accordion-item>
                      <?php else : ?>
                      <li class="accordion-item" data-accordion-item>
                      <?php endif; ?>
                      <a href="#" class="accordion-title">
                        <h3><?php echo get_sub_field('accordion_title'); ?></h3>
                      </a>
                      <div class="accordion-content basiccontent" data-tab-content>
                        <?php echo get_sub_field('accordion_content'); ?>
                      </div>
                      </li>
                    <?php $counter++;
                  endwhile; ?>
                </ul>
              <?php endif; ?>


            <?php elseif (get_sub_field('module_type') == 'content') : ?>

              <?php if (have_rows('content')) : ?>
                <div class="content-section-sidebyside">
                  <?php while (have_rows('content')) : the_row(); ?>
                    <?php if (get_sub_field('outline_content')) : ?>
                      <div class="outline-content">
                      <?php endif; ?>
                      <?php if (get_sub_field('content_section')) : ?>
                        <?php echo get_sub_field('content_section'); ?>
                      <?php endif; ?>
                      <?php if (get_sub_field('include_button')) : ?>
                        <div class="<?php if (get_sub_field('button_alignment')) : ?>text-center<?php endif; ?>">
                          <?php $link = get_sub_field('button');
                          if ($link) : $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                          ?>
                            <a class="syncro-button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                              <?php echo esc_html($link_title); ?>
                            </a>
                          <?php endif; ?>
                        </div>
                      <?php endif; ?>
                      <?php if (get_sub_field('outline_content')) : ?>
                      </div>
                    <?php endif; ?>
                  <?php endwhile; ?>
                </div>
              <?php endif; ?>

            <?php elseif (get_sub_field('module_type') == 'form') : ?>

              <?php if (have_rows('form')) : ?>
                <?php while (have_rows('form')) : the_row(); ?>
                  <?php if (get_sub_field('contain_form_in_white_box')) {
                    $formbox = ('form-boxed');
                  } else {
                    $formbox = ('');
                  } ?>
                  <?php if (get_sub_field('form_embed')) : ?>
                    <div class="form-containment <?php echo $formbox; ?>">
                      <?php if (get_sub_field('form_headline')) : ?>
                        <h3 class="form-headline"><?php echo get_sub_field('form_headline'); ?></h3>
                      <?php endif; ?>
                      <div class="form-frame">
                        <?php echo get_sub_field('form_embed'); ?>
                      </div>
                    </div>
                    <?php get_template_part('parts/custom/z_partot_iframe_filler'); ?>
                  <?php endif; ?>
                <?php endwhile; ?>
              <?php endif; ?>


            <?php elseif (get_sub_field('module_type') == 'icons') : ?>

              <?php if (have_rows('icons_with_content')) : ?>
                <?php while (have_rows('icons_with_content')) : the_row(); ?>

                  <?php
                  if (get_sub_field('icons_per_row') == 'one') :
                    $iconrow = ('small-12');
                  elseif (get_sub_field('icons_per_row') == 'two') :
                    $iconrow = ('small-12 large-6');
                  elseif (get_sub_field('icons_per_row') == 'three') :
                    $iconrow = ('small-12 large-4');
                  endif; ?>
                  <?php if (get_sub_field('alignment_on_mobile')) {
                    $mobilecenter = ('mobilecenter');
                  } else {
                    $mobilecenter = ('');
                  } ?>
                  <?php if (get_sub_field('spacing_when_stacked')) {
                    $stackedspace = ('nospacewhenstacked');
                  } else {
                    $stackedspace = ('spacewhenstacked');
                  } ?>
                  <div class="grid-x grid-padding-x <?php if (get_sub_field('icon_item_alignment')) : ?>text-center align-center<?php else : ?>text-left align-left<?php endif; ?>">
                    <?php if (have_rows('icon_and_content')) : ?>
                      <?php while (have_rows('icon_and_content')) : the_row(); ?>
                        <div class="cell <?php echo $iconrow; ?> icons-with-content-item <?php echo $mobilecenter; ?> <?php echo $stackedspace; ?> <?php echo $bgcolor; ?>">

                          <?php $image = get_sub_field('icon_image');
                          if (!empty($image)) : ?>
                            <img class="icon lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                          <?php endif; ?>

                          <?php if (get_sub_field('icon_headline')) : ?>
                            <h6><?php echo get_sub_field('icon_headline'); ?></h6>
                          <?php endif; ?>
                          <?php if (get_sub_field('icon_description')) : ?>
                            <?php echo get_sub_field('icon_description'); ?>
                          <?php endif; ?>
                          <?php $link = get_sub_field('icon_link');
                          if ($link) : $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                          ?>
                            <div class="icon-section-link-buffer"></div>
                            <a class="syncro-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                              <?php echo esc_html($link_title); ?>&nbsp;>
                            </a>
                          <?php endif; ?>
                        </div>
                      <?php endwhile; ?>
                    <?php endif; ?>

                  </div>
                <?php endwhile; ?>
              <?php endif; ?>







            <?php elseif (get_sub_field('module_type') == 'image') : ?>

              <?php if (have_rows('image_container')) : ?>
                <div class="imgcont">
                  <?php while (have_rows('image_container')) : the_row(); ?>
                    <?php if (get_sub_field('rounded_visual_corners')) {
                      $corners = ('roundcorners');
                    } else {
                      $corners = ('');
                    } ?>
                    <?php if (get_sub_field('drop_shadow_on_visual')) {
                      $shadow = ('dropshadow');
                    } else {
                      $shadow = ('');
                    } ?>
                    <?php $image = get_sub_field('image');
                    if (!empty($image)) : ?>
                      <img class="split-content-img <?php echo $corners; ?> <?php echo $shadow; ?> lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                  <?php endwhile; ?>
                </div>
              <?php endif; ?>


            <?php elseif (get_sub_field('module_type') == 'logoslider') : ?>

              <?php if (have_rows('logo_slider_container')) : ?>
                <?php while (have_rows('logo_slider_container')) : the_row(); ?>
                  <?php if (have_rows('logo_slider')) : ?>
                    <div class="cell">
                      <div class="slick-logoslider-sidebyside">
                        <?php while (have_rows('logo_slider')) : the_row(); ?>

                          <?php $link = get_sub_field('logo_link');
                          if ($link) : $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                          ?>
                            <a class="logo-container" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                              <?php $image = get_sub_field('logo');
                              if (!empty($image)) : ?>
                                <img class="" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                              <?php endif; ?>
                            </a>
                          <?php else : ?>
                            <div class="logo-container">
                              <?php $image = get_sub_field('logo');
                              if (!empty($image)) : ?>
                                <img class="" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                              <?php endif; ?>
                            </div>
                          <?php endif; ?>

                        <?php endwhile; ?>
                      </div>
                    </div>
                  <?php endif; ?>




                  <script>
                    jQuery(document).ready(function() {
                      jQuery('.slick-logoslider-sidebyside').slick({
                        dots: false,
                        arrows: false,
                        autoplay: true,
                        autoplaySpeed: 4000,
                        infinite: true,
                        speed: 800,
                        <?php if (get_sub_field('logos_to_show') == 'one') : ?>
                          slidesToShow: 1,
                        <?php elseif (get_sub_field('logos_to_show') == 'two') : ?>
                          slidesToShow: 2,
                        <?php elseif (get_sub_field('logos_to_show') == 'three') : ?>
                          slidesToShow: 3,
                        <?php elseif (get_sub_field('logos_to_show') == 'four') : ?>
                          slidesToShow: 4,
                        <?php endif; ?>
                        slidesToScroll: 1,
                        draggable: true,
                        pauseOnHover: false,
                        swipeToSlide: true,

                        responsive: [{
                            breakpoint: 1023,
                            settings: {
                              <?php if (get_sub_field('logos_to_show') == 'one') : ?>
                                slidesToShow: 1,
                              <?php elseif (get_sub_field('logos_to_show') == 'two') : ?>
                                slidesToShow: 2,
                              <?php elseif (get_sub_field('logos_to_show') == 'three') : ?>
                                slidesToShow: 3,
                              <?php elseif (get_sub_field('logos_to_show') == 'four') : ?>
                                slidesToShow: 4,
                              <?php endif; ?>
                              slidesToScroll: 1,
                            }
                          },
                          {
                            breakpoint: 639,
                            settings: {
                              <?php if (get_sub_field('logos_to_show') == 'one') : ?>
                                slidesToShow: 1,
                              <?php elseif (get_sub_field('logos_to_show') == 'two') : ?>
                                slidesToShow: 2,
                              <?php elseif (get_sub_field('logos_to_show') == 'three') : ?>
                                slidesToShow: 2,
                              <?php elseif (get_sub_field('logos_to_show') == 'four') : ?>
                                slidesToShow: 3,
                              <?php endif; ?>
                              slidesToScroll: 1
                            }
                          },
                          {
                            breakpoint: 480,
                            settings: {
                              <?php if (get_sub_field('logos_to_show') == 'one') : ?>
                                slidesToShow: 1,
                              <?php elseif (get_sub_field('logos_to_show') == 'two') : ?>
                                slidesToShow: 1,
                              <?php elseif (get_sub_field('logos_to_show') == 'three') : ?>
                                slidesToShow: 2,
                              <?php elseif (get_sub_field('logos_to_show') == 'four') : ?>
                                slidesToShow: 2,
                              <?php endif; ?>
                              slidesToScroll: 1
                            }
                          }
                        ]
                      });
                    });
                  </script>
                <?php endwhile; ?>
              <?php endif; ?>

            <?php elseif (get_sub_field('module_type') == 'masonry') : ?>

              <?php if (have_rows('masonry_quotes_one')) : ?>
                <div class="masonry-quote-container">
                  <?php while (have_rows('masonry_quotes_one')) : the_row(); ?>
                    <div class="masonry-quote fader">
                      <div class="quote-container">
                        <?php echo get_sub_field('quote'); ?>
                      </div>
                      <?php echo get_sub_field('quote_attribution'); ?>
                    </div>
                  <?php endwhile; ?>
                </div>
              <?php endif; ?>

            <?php elseif (get_sub_field('module_type') == 'photocircles') : ?>

              <?php if (have_rows('photo_circles')) : ?>
                <?php while (have_rows('photo_circles')) : the_row(); ?>
                  <?php
                  if (get_sub_field('layout_style') == 'one') :
                    $layout = ('circle-layout-one');
                  elseif (get_sub_field('layout_style') == 'two') :
                    $layout = ('circle-layout-two');
                  elseif (get_sub_field('layout_style') == 'three') :
                    $layout = ('circle-layout-three');
                  endif; ?>
                  <div class="sidebyside-circle-image-container <?php echo $layout; ?>">
                    <?php $image = get_sub_field('image_one');
                    if (!empty($image)) : ?>
                      <div class="circle-image circle-image-1 rellax" data-rellax-xs-speed="0" data-rellax-mobile-speed="0" data-rellax-tablet-speed="1" data-rellax-desktop-speed="2">
                        <div class="circle-image-inner">
                          <img class="" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </div>
                      </div>
                    <?php endif; ?>
                    <?php $image = get_sub_field('image_two');
                    if (!empty($image)) : ?>
                      <div class="circle-image circle-image-2 rellax" data-rellax-xs-speed="0" data-rellax-mobile-speed="0" data-rellax-tablet-speed="0.25" data-rellax-desktop-speed="0.25">
                        <div class="circle-image-inner">
                          <img class="" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </div>
                      </div>
                    <?php endif; ?>
                    <?php $image = get_sub_field('image_three');
                    if (!empty($image)) : ?>
                      <div class="circle-image circle-image-3 rellax" data-rellax-xs-speed="0" data-rellax-mobile-speed="0" data-rellax-tablet-speed=".75" data-rellax-desktop-speed="1">
                        <div class="circle-image-inner">
                          <img class="" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </div>
                      </div>
                    <?php endif; ?>
                    <?php $image = get_sub_field('image_four');
                    if (!empty($image)) : ?>
                      <div class="circle-image circle-image-4 rellax" data-rellax-xs-speed="0" data-rellax-mobile-speed="0" data-rellax-tablet-speed="1" data-rellax-desktop-speed="2">
                        <div class="circle-image-inner">
                          <img class="" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </div>
                      </div>
                    <?php endif; ?>
                    <?php $image = get_sub_field('image_five');
                    if (!empty($image)) : ?>
                      <div class="circle-image circle-image-5 rellax" data-rellax-xs-speed="0" data-rellax-mobile-speed="0" data-rellax-tablet-speed=".25" data-rellax-desktop-speed=".5">
                        <div class="circle-image-inner">
                          <img class="" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </div>
                      </div>
                    <?php endif; ?>
                    <?php $image = get_sub_field('image_six');
                    if (!empty($image)) : ?>
                      <div class="circle-image circle-image-6 rellax" data-rellax-xs-speed="0" data-rellax-mobile-speed="0" data-rellax-tablet-speed=".75" data-rellax-desktop-speed="1.5">
                        <div class="circle-image-inner">
                          <img class="" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </div>
                      </div>
                    <?php endif; ?>
                    <?php $image = get_sub_field('image_seven');
                    if (!empty($image)) : ?>
                      <div class="circle-image circle-image-7 rellax" data-rellax-xs-speed="0" data-rellax-mobile-speed="0" data-rellax-tablet-speed=".5" data-rellax-desktop-speed="1">
                        <div class="circle-image-inner">
                          <img class="" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </div>
                      </div>
                    <?php endif; ?>
                    <?php $image = get_sub_field('image_eight');
                    if (!empty($image)) : ?>
                      <div class="circle-image circle-image-8 rellax" data-rellax-xs-speed="0" data-rellax-mobile-speed="0" data-rellax-tablet-speed=".25" data-rellax-desktop-speed=".5">
                        <div class="circle-image-inner">
                          <img class="" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </div>
                      </div>
                    <?php endif; ?>
                  </div>
                <?php endwhile; ?>
              <?php endif; ?>

            <?php elseif (get_sub_field('module_type') == 'video') : ?>

              <?php if (have_rows('videos')) : ?>
                <?php while (have_rows('videos')) : the_row(); ?>
                  <?php
                  if (get_sub_field('video_type') == 'standard') :
                    $vidlayout = ('standard-vid-container');
                  elseif (get_sub_field('video_type') == 'vertical') :
                    $vidlayout = ('vert-vid-container');
                  endif; ?>
                  <div class="sidebyside-video <?php echo $vidlayout; ?>">
                    <?php $iframe = get_sub_field('video_embed_link');
                    preg_match('/src="(.+?)"/', $iframe, $matches);
                    $src = $matches[1];
                    $params = array(
                      //'controls'  => 0,
                      'hd'        => 1,
                    );
                    $new_src = add_query_arg($params, $src);
                    $iframe = str_replace($src, $new_src, $iframe);
                    $attributes = 'frameborder="0"';
                    $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
                    echo $iframe;
                    ?>
                  </div>
                <?php endwhile; ?>
              <?php endif; ?>


            <?php endif; ?>


          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</section>