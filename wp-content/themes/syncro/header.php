<?php

/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section
 *
 */
?>

<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>

<head>

	<!-- Custom Consent Mode Script -->
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag("consent", "default", {
			ad_storage: "denied",
			ad_user_data: "denied",
			ad_personalization: "denied",
			analytics_storage: "denied",
			functionality_storage: "denied",
			personalization_storage: "denied",
			security_storage: "granted",
			wait_for_update: 2000,
		});
		gtag("set", "ads_data_redaction", true);
		gtag("set", "url_passthrough", true);
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
	<!-- END System - Store Traffic Data -->
	<meta charset="utf-8">
	<!-- Force IE to use the latest rendering engine available -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Mobile Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta class="foundation-mq">
	<!-- If Site Icon isn't set in customizer -->
	<?php if (!function_exists('has_site_icon') || !has_site_icon()) { ?>
		<!-- Icons & Favicons -->
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />
	<?php } ?>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/slick/slick.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/slick/slick-theme.css" />


	<?php
	$thisID = get_the_ID();
	$topics = wp_get_post_terms($thisID, array('syncrotopic'));
	$thisTopic = '';
	$thisTopicSlug = '';
	if (!empty($topics)) {
		$thisTopic =  esc_html($topics[0]->name);
		$thisTopicSlug =  esc_html($topics[0]->slug);
	}
	if ($thisTopicSlug == "hidden") : ?>
		<meta name="robots" content="noindex, nofollow">
	<?php endif; ?>


	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N92RVJS" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- END Google Tag Manager (noscript) -->
	<!-- Trial Re-Direct Script -->
	<script type="text/javascript" src="https://syncromsp.gitlab.io/team-integrations/signup_gateway_external_scripts/production/google_tag_manager_script.min.js"></script>
	<!-- END Trial Re-Direct Script -->
	<!-- End Scripts In Body -->


	<div class="off-canvas-wrapper">
		<!-- Load off-canvas container. Feel free to remove if not using. -->
		<?php get_template_part('parts/content', 'offcanvas'); ?>
		<div class="off-canvas-content" data-off-canvas-content>


			<?php if (get_field('header_and_footer_visibility') == 'none') : ?>
			<?php else : ?>
				<header class="header" role="banner">
					<!-- This navs will be applied to the topbar, above all content 
						  To see additional nav styles, visit the /parts directory -->
					<?php get_template_part('parts/nav', 'offcanvas-topbar'); ?>
				</header> <!-- end .header -->

			<?php endif; ?>