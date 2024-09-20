<?php
// Create shortcodes for [table_header] and [/table_header]
function table_header_shortcode($atts = array(), $content = null)
{
  // Set up default parameters (currently empty since no attributes are used)
  $atts = shortcode_atts(array(
    // 'color' => 'blue' // Example of a default parameter
  ), $atts);

  // Return the wrapped content
  return '<div class="table-heading">' . do_shortcode($content) . '</div>';
}
add_shortcode('table_header', 'table_header_shortcode');



//Creates shortcodes for [highlight] and [/highlight]
function wysiwyg_highlight($atts = array(), $content = null)
{
  // set up default parameters
  extract(shortcode_atts(array(
    'color' => 'teal'
  ), $atts));
  return '<span class="highlighter highlightcolor' . $color . '">' . $content . '</span>';
}
add_shortcode('highlight', 'wysiwyg_highlight');

//Creates shortcodes for [youtubeshort] and [/youtubeshort]
function vertical_video_embed($atts, $content = null)
{
  $content = do_shortcode($content);
  return '<div class="verticalvideo">' . $content . '</div>';
}
add_shortcode('youtubeshort', 'vertical_video_embed');


//Creates shortcodes for [podcastbadges] 
function podcast_links($atts)
{

  $default = array(
    'apple' => 'https://podcasts.apple.com/us/podcast/workflow-for-msps/id1666077112',
    'spotify' => 'https://open.spotify.com/show/6wf7yXs5qSWJt6JM3naApn',
    'google' => 'https://podcasts.google.com/feed/aHR0cHM6Ly9mZWVkcy5idXp6c3Byb3V0LmNvbS8yMDQ5OTgyLnJzcw',
  );
  $a = shortcode_atts($default, $atts);

  return '<div class="podcast-links-container">
            <a href="' . $a['apple'] . '" target="_blank" rel="nofollow">
            <img class="podcastctaimg" src="https://syncromsp.com/wp-content/themes/syncro/assets/images/podcast/Apple_Podcasts_Badge.svg)">
            </a>
            <a href="' . $a['spotify'] . '" target="_blank" rel="nofollow">
            <img class="podcastctaimg" src="https://syncromsp.com/wp-content/themes/syncro/assets/images/podcast/Spotify_Podcasts_Badge.svg)">
            </a>
            <a href="' . $a['google'] . '" target="_blank" rel="nofollow">
            <img class="podcastctaimg" src="https://syncromsp.com/wp-content/themes/syncro/assets/images/podcast/Google_Podcasts_Badge.webp)">
            </a>

          </div>';
}
add_shortcode('podcastlinks', 'podcast_links');


//Creates shortcodes for [custombullet] and [/custombullet]
function custom_bullet($atts = array(), $content = null)
{
  // set up default parameters
  extract(shortcode_atts(array(
    'img'   => 'https://syncromsp.com/wp-content/themes/syncro/assets/images/checkmark.png',
    'id'    => '',
    'size'  => '24px'
  ), $atts));
  return '
  <style type="text/css">
    .custombullet-' . $id . ' ul li { calc(' . $size . ' + 6px));}
    .custombullet-' . $id . ' ul li::before {
      background-image: url(' . $img . ');
      width: ' . $size . ';
      height: ' . $size . ';
      margin-left: calc( ((' . $size . ' + 6px) * -1) - 10px );
    }
  </style>
  <div class="custombullet custombullet-' . $id . '">' . $content . '</div>';
}
add_shortcode('custombullet', 'custom_bullet');
