<?php if (have_posts()) : while (have_posts()) : the_post();
    if (have_rows('flexible_content')) :
      while (have_rows('flexible_content')) : the_row();

        // side-by-side_modules
        if (get_row_layout() == 'side-by-side_modules')
          get_template_part('parts/custom/_side-by-side_modules');

        // accordion_section
        if (get_row_layout() == 'accordion_section')
          get_template_part('parts/custom/accordion_section');

        // careers_section
        if (get_row_layout() == 'careers_section')
          get_template_part('parts/custom/careers_section');

        // contact_blocks
        if (get_row_layout() == 'contact_blocks')
          get_template_part('parts/custom/contact_blocks');

        // community_section
        if (get_row_layout() == 'community_section')
          get_template_part('parts/custom/community_section');

        // content_section
        if (get_row_layout() == 'content_section')
          get_template_part('parts/custom/content_section');

        // cta_section
        if (get_row_layout() == 'cta_section')
          get_template_part('parts/custom/cta_section');

        // device_cta
        if (get_row_layout() == 'device_cta')
          get_template_part('parts/custom/device_cta');

        // form_section
        if (get_row_layout() == 'form_section')
          get_template_part('parts/custom/form_section');

        // full_background_image_section
        if (get_row_layout() == 'full_background_image_section')
          get_template_part('parts/custom/full_background_image_section');

        // icon_grid
        if (get_row_layout() == 'icon_grid')
          get_template_part('parts/custom/icon_grid');

        // icons_with_content_section
        if (get_row_layout() == 'icons_with_content_section')
          get_template_part('parts/custom/icons_with_content_section');

        // information_tiles
        if (get_row_layout() == 'information_tiles')
          get_template_part('parts/custom/information_tiles');

        // leadership_section
        if (get_row_layout() == 'leadership_section')
          get_template_part('parts/custom/leadership_section');

        // logo_and_content_blocks_section
        if (get_row_layout() == 'logo_and_content_blocks_section')
          get_template_part('parts/custom/logo_and_content_blocks_section');

        // logo_slider
        if (get_row_layout() == 'logo_slider')
          get_template_part('parts/custom/logo_slider');

        // instagram_feed
        if (get_row_layout() == 'instagram_feed')
          get_template_part('parts/custom/instagram_feed');

        // masonry_quotes
        if (get_row_layout() == 'masonry_quotes')
          get_template_part('parts/custom/masonry_quotes');

        // media_accordion
        if (get_row_layout() == 'media_accordion')
          get_template_part('parts/custom/media_accordion');

        // photo_circles
        if (get_row_layout() == 'photo_circles')
          get_template_part('parts/custom/photo_circles');

        // pricing_section
        if (get_row_layout() == 'pricing_section')
          get_template_part('parts/custom/pricing_section');

        // pricing_table
        if (get_row_layout() == 'pricing_table')
          get_template_part('parts/custom/pricing_table');

        // quote_bar
        if (get_row_layout() == 'quote_bar')
          get_template_part('parts/custom/quote_bar');

        // resource_hub_block
        if (get_row_layout() == 'resource_hub_block')
          get_template_part('parts/custom/resource_hub_block');

        // resource_trio
        if (get_row_layout() == 'resource_trio')
          get_template_part('parts/custom/resource_trio');

        // social_cta
        if (get_row_layout() == 'social_cta')
          get_template_part('parts/custom/social_cta');

        // split_content_and_image_section
        if (get_row_layout() == 'split_content_and_image_section')
          get_template_part('parts/custom/split_content_and_image_section');

        // split_content_and_image_to_edge_section
        if (get_row_layout() == 'split_content_and_image_to_edge_section')
          get_template_part('parts/custom/split_content_and_image_to_edge_section');

        // split_headline_and_content_section
        if (get_row_layout() == 'split_headline_and_content_section')
          get_template_part('parts/custom/split_headline_and_content_section');

        // transition
        if (get_row_layout() == 'transition')
          get_template_part('parts/custom/transition');

        // values_section
        if (get_row_layout() == 'values_section')
          get_template_part('parts/custom/values_section');

        // vertical_videos_section
        if (get_row_layout() == 'vertical_videos_section')
          get_template_part('parts/custom/vertical_videos_section');

        // video_section
        if (get_row_layout() == 'video_section')
          get_template_part('parts/custom/video_section');

      endwhile;
    endif;
  endwhile;
endif;
