<?php
// Define the path to the /inc directory
$inc_dir = __DIR__ . '/inc/';

// Check if the directory exists
if (is_dir($inc_dir)) {

  // Open the directory and read each file
  foreach (glob($inc_dir . '*.php') as $file) {

    // Require each PHP file in the /inc directory
    require_once $file;
  }
}

function gtm_header()
{ ?>
  <!-- Custom Consent Mode Script -->
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag("consent", "default", {
      ad_storage: "granted",
      ad_user_data: "granted",
      ad_personalization: "granted",
      analytics_storage: "granted",
      functionality_storage: "granted",
      personalization_storage: "granted",
      security_storage: "granted",
      wait_for_update: 2000,
    });
    gtag("set", "ads_data_redaction", true);
    gtag("set", "url_passthrough", true);
  </script>

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-BCF540V25B"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'G-BCF540V25B');
  </script>

  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-N92RVJS');
  </script>
  <!-- END Google Tag Manager -->

<?php
}
add_action('wp_head', 'gtm_header', $priority = 0);

function storetraffic()
{ ?>
  <!-- System - Store Traffic Data -->
  <script>
    var referrerURL = document.referrer;
    var referrerCheck = referrerURL + "";
    //External referrer
    if (!referrerCheck.startsWith('https://syncromsp.com/') && !referrerCheck.startsWith('https://parmail.syncromsp.com/')) {
      var urlp;
      var urlc = window.location.href;

      //set params
      if (urlc.includes('utm_')) {
        //UTM'd Traffic
        urlp = urlc.split('?')[1];
      } else if (urlc.includes('gclid')) {
        urlp = 'utm_medium=paid%20search&utm_source=google';
      } else if (referrerURL) {
        //Known Referrer
        referrerCheck = referrerURL.replace('https://', '').replace('http://', '').replace('www.', '').split('/');
        if (referrerCheck[0].includes('google') || referrerCheck[0].includes('yahoo') || referrerCheck[0].includes('bing') || referrerCheck[0].includes('ask.com') || referrerCheck[0].includes('duckduckgo')) {
          //Organic Search
          urlp = 'utm_medium=organic%20search&utm_source=' + referrerCheck[0].replace('.com', '');
        } else if (referrerCheck[0].includes('syncromsp') && !referrerCheck[0].includes('discover.syncromsp.com')) {
          //Product Traffic
          urlp = 'utm_medium=internal%link&utm_source=product';
        } else if (referrerCheck[0].includes('facebook') || referrerCheck[0].includes('twitter') || referrerCheck[0].includes('linkedin') || referrerCheck[0].includes('reddit') || referrerCheck[0].includes('youtube')) {
          //Organic Social
          urlp = 'utm_medium=organic%20social&utm_source=' + referrerCheck[0].replace('.com', '');
        } else {
          //Referral Traffic
          urlp = 'utm_medium=referral%20traffic&utm_source=' + referrerCheck[0];
        }
      } else {
        //Direct Traffic
        var synp = localStorage.getItem('syn_p');
        if (synp) {
          urlp = synp;
        } else {
          urlp = 'utm_medium=direct&utm_source=none';
        }
      }

      //Store UTM Data LocalStorage
      localStorage.setItem('syn_p', urlp);
    }
  </script>
<?php }
add_action('wp_head', 'storetraffic', $priority = 1);

function bing_meta()
{ ?>
  <meta name="msvalidate.01" content="FAEE11C495AD649F6A8C0C91A2D49896" />
<?php }
add_action('wp_head', "bing_meta");

function gtm_body()
{
?>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N92RVJS" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- END Google Tag Manager (noscript) -->
  <!-- Trial Re-Direct Script -->
  <script type="text/javascript" src="https://syncromsp.gitlab.io/team-integrations/signup_gateway_external_scripts/production/google_tag_manager_script.min.js"></script>
  <!-- END Trial Re-Direct Script -->
  <!-- End Scripts In Body -->
<?php
}
add_action('wp_body_open', 'gtm_body', $priority = 0);

function chilipiper()
{ ?>
  <!-- Start Chili Piper Snippet -->
  <script src="https://js.chilipiper.com/marketing.js" type="text/javascript" async></script>
  <script src="https://syncromsp.com/wp-content/site-scripts/cpParentHandler.js" type="text/javascript"></script>
  <!-- End Chili Piper Snippet -->
<?php }
add_action('wp_footer', 'chilipiper');



function pardotiframefiller()
{ ?>
  <!-- System - Pardot Iframe Filler -->
  <script>
    //set iframe class
    var countSrc = document.getElementsByTagName("iframe").length;
    var i;
    for (i = 0; i < countSrc; i++) {
      var a = document.getElementsByTagName("iframe")[i];
      var b = a.src;
      if (b.includes("parmail.syncromsp.com") || b.includes("go.pardot.com")) {
        a.className += " pardot_form";
      }
    }

    //get conversion url
    var conversionURL = document.location.href;
    if (conversionURL.includes("?")) {
      conversionURL = conversionURL.split('?')[0];
    }

    //send data to iframes
    var setP = '?' + localStorage.getItem("syn_p") + "&conversion_url=" + conversionURL;
    var countSrc = document.getElementsByClassName("pardot_form").length;
    var i;
    for (i = 0; i < countSrc; i++) {
      var frameSrc = document.getElementsByClassName("pardot_form")[i].src + setP;
      document.getElementsByClassName("pardot_form")[i].src = frameSrc;
    }
  </script>
  <!-- System - Pardot Form Receive Conversion Events -->
  <script>
    //Listen for messages coming from Pardot iframes
    window.addEventListener("message", function(event) {
      if (event.data && event.origin.includes('parmail.syncromsp.com')) {
        if (!nab.trigger) {
          return;
        } else {
          //Nelio Trigger Conversion
          nab.trigger('Conversion');
        };
        //Contains Form Conversion Data  
        if (Array.isArray(event.data) && event.data[0] == 'form-conversion') {
          var conversionName = event.data[1];
          console.log(conversionName);
          window.dataLayer.push({
            'event': conversionName
          });
          event.data[2] && event.data[3] ? window.location.replace(event.data[3]) : console.log('No Redirect');
        }
        //Backup for Conversion Data Migration
        else if (event.data.includes('form-conversion:')) {
          var conversionName = event.data.split(':')[1];
          console.log(conversionName);
          window.dataLayer.push({
            'event': conversionName
          });
        }
      }
    }, true);
  </script>
<?php }
add_action('wp_footer', 'pardotiframefiller');




#Disalbe Yoast Auto Redirects
add_filter('Yoast\WP\SEO\post_redirect_slug_change', '__return_true');
add_filter('Yoast\WP\SEO\term_redirect_slug_change', '__return_true');


#1/7/25: Disable Automatic page autocomplete/redirect
remove_action('template_redirect', 'redirect_canonical');

function klf_acf_input_admin_footer()
{ ?>

  <script type="text/javascript">
    (function($) {

      acf.add_filter('color_picker_args', function(args, $field) {

        // add the hexadecimal codes here for the colors you want to appear as swatches
        args.palettes = ["#000", "#fff", "#FB6B31", "#99361A", "#DC4327", "#D55E2E", "#BC4A17", "#A43604", "#317077", "#133d3f", "#35322D"];
        // return colors
        return args;

      });

    })(jQuery);
  </script>

<?php }

add_action('acf/input/admin_footer', 'klf_acf_input_admin_footer');
/* Add brand colors to the color picker in the WYSIWYG editor  */

function my_mce4_options($init)
{
  $custom_colours_array = [

    "FB6B31" => "Primary",
    "99361A" => "Secondary",
    "DC4327" => "Tertiary",
    "D55E2E" => "Support 1",
    "BC4A17" => "Support 2",
    "A43604" => "Support 3",
    "317077" => "Teal 2",
    "133d3f" => "Teal 3",
    "c4c3c2" => "Accent Gray 1",
    "2e2b27" => "Accent Gray 2",
    "ffffff" => "White",
    "fffcf8" => "Cream",
    "eee9e3" => "Cream 2",
    "CDC9C5" => "Cream 3",
    "464648" => "Cream 4",
    "6B6B6D" => "Cream 4 80",
    "A2A2A3" => "Cream 4 50",
    "1d1d1c" => "Syncro Black",
    "000000" => "Black",
    "2E2B27" => "Foreground-100",
    "42403C" => "Foreground-90",
    "565350" => "Foreground-80",
    "6A6865" => "Foreground-70",
    "7E7C79" => "Foreground-60",
    "91908E" => "Foreground-50",
    "A5A4A3" => "Foreground-40",
    "B9B8B7" => "Foreground-30",
    "CDCDCC" => "Foreground-20",
    "E1E0E0" => "Foreground-10",
  ];
  $custom_colours = implode(',', array_map(
    fn($v, $k) => "\"{$k}\",\"$v\"",
    $custom_colours_array,
    array_keys($custom_colours_array)
  ));
  $init['textcolor_map'] = "[{$custom_colours}]";
  $rows = count($custom_colours_array) / 8;
  $init['textcolor_rows'] = $rows;
  return $init;
}
add_filter('tiny_mce_before_init', 'my_mce4_options');

//Sessions
function session_init()
{
  if (!session_id()) {

    session_start();
    $inactive = 1800;
    if (isset($_SESSION["timeout"])) {
      $sessionTTL = time() - $_SESSION['timeout'];
      if ($sessionTTL > $inactive) {
        session_destroy();
      }
    }
    $_SESSION['timeout'] = time();
  }
}
add_action('init', 'session_init');

function get_notification_status()
{
  if (isset($_SESSION['notification_closed'])) {
    return $_SESSION['notification_closed'];
  } else {
    return null;
  }
};
function set_notification_status()
{
  if ($_SESSION['notification_closed'] == false) {
    $_SESSION['notification_closed'] = true;
  } elseif ($_SESSION['notification_closed'] == true) {
    $_SESSION['notification_closed'] = false;
  }
  return $_SESSION['notification_closed'];
}
add_action('rest_api_init', function () {
  register_rest_route('session/v1', '/notification_status', [
    'methods' => 'GET',
    'callback' => 'get_notification_status'
  ]);
});

add_action('rest_api_init', function () {
  register_rest_route('session/v1', '/notification_toggle', [
    'methods' => 'GET',
    'callback' => 'set_notification_status'
  ]);
});

function inURL($folders)
{
  global $wp;
  foreach ($folders as $folder) {
    if ($folder == null || $folder == '' || $folder == 'none') {
      continue;
    }
    if (stristr(home_url($wp->request), $folder)) {
      return true;
    }
  }
}
