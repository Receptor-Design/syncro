<?php

/**
 * The template for displaying the footer. 
 *
 * Comtains closing divs for header.php.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>
<?php if (get_field('header_and_footer_visibility') == 'none') : ?>
<?php else : ?>

	<?php if (get_field('hide_footer')) : ?>
	<?php else : ?>
		<footer class="footer" role="contentinfo">
			<div class="grid-container closer-container">

				<div class="grid-x grid-padding-x align-center">
					<div class="cell medium-shrink large-4 foot-logo-container">
						<a href="<?php echo home_url(); ?>">
							<?php $image = get_field('navigation_logo', 'option');
							if (!empty($image)) : ?>
								<img class="footer-image lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
							<?php endif; ?>
						</a>

						<?php if (get_field('footer_description', 'option')) : ?>
							<div class="footer-description"><?php echo get_field('footer_description', 'option'); ?></div>
						<?php endif; ?>

						<?php if (have_rows('social_accounts', 'option')) : ?>
							<div class="footer-social-container">
								<?php while (have_rows('social_accounts', 'option')) : the_row(); ?>
									<a class="footer-social" href="<?php echo get_sub_field('social_media_link', 'option'); ?>" target="_blank">
										<?php $image = get_sub_field('social_media_icon', 'option');
										if (!empty($image)) : ?>
											<img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
										<?php endif; ?>
									</a>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>

					</div>
					<div class="cell auto footer-menu-container">
						<?php
						$footer_menu_defaults = array(
							'theme_location'  => '',
							'menu'            => 'Footer Menu',
							'container'       => '',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => 'grid-x',
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'           => 0,
							'walker'         => '',
							'add_li_class'  => 'cell small-6 medium-auto'
						);
						wp_nav_menu($footer_menu_defaults); ?>
					</div>
				</div>

				<div class="footer-bottom grid-x grid-padding-x align-center align-bottom">

					<div class="cell small-12 medium-4 large-5 show-for-medium">
						<p>&copy; 2017-<?php echo date('Y'); ?> <?php echo get_field('copyright_info', 'option'); ?></p>
					</div>

					<div class="cell small-12 medium-8 large-7 text-right">
						<div class="compliance-container">
							<?php if (have_rows('compliance_logos', 'option')) : ?>
								<?php while (have_rows('compliance_logos', 'option')) : the_row(); ?>

									<?php $link = get_sub_field('link', 'option');
									if ($link) : $link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
									?>
										<a class="compliance-logo-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
											<?php $image = get_sub_field('logo', 'option');
											if (!empty($image)) : ?>
												<img class="compliance-logo lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
											<?php endif; ?>
										</a>
									<?php else : ?>
										<?php $image = get_sub_field('logo', 'option');
										if (!empty($image)) : ?>
											<img class="compliance-logo lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
										<?php endif; ?>
									<?php endif; ?>
								<?php endwhile; ?>
							<?php endif; ?>
						</div>

						<?php if (get_field('footer_description', 'option')) : ?>
							<div class="footer-bottom-links"><?php echo get_field('footer_bottom_links', 'option'); ?></div>
						<?php endif; ?>
						<div class="show-for-small-only text-left">
							<p>&copy; 2017-<?php echo date('Y'); ?> <?php echo get_field('copyright_info', 'option'); ?></p>
						</div>
						<div class="footer-operational">
							<div id="status"></div>
						</div>
					</div>
				</div>
			</div>
		</footer> <!-- end .footer -->
	<?php endif; ?>
<?php endif; ?>

</div> <!-- end .off-canvas-content -->
</div> <!-- end .off-canvas-wrapper -->
<?php wp_footer(); ?>


<?php if (get_field('custom_scripts')) : ?>
	<?php echo get_field('custom_scripts'); ?>
<?php endif; ?>



<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/slick/slick.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/scripts/rellax/rellax.min.js"></script>
<script>
	var rellax = new Rellax('.rellax', {
		center: true,
		breakpoints: [450, 639, 1023]
	});
	var rellax = new Rellax('.rellax-top', {
		breakpoints: [450, 639, 1023]
	});
</script>
<!--FADE-->
<script type="text/javascript">
	(function() {
		var elements;
		var windowHeight;

		function initFade() {
			elements = document.querySelectorAll('.fader');
			windowHeight = window.innerHeight;
		}

		function checkPositionFade() {
			for (var i = 0; i < elements.length; i++) {
				var element = elements[i];
				var positionFromTop = elements[i].getBoundingClientRect().top;
				if (positionFromTop - windowHeight <= 0) {
					element.classList.add('fadein');
					element.classList.remove('fader');
				}
			}
		}
		window.addEventListener('scroll', checkPositionFade);
		window.addEventListener('resize', initFade);
		initFade();
		checkPositionFade();
	})();
</script>
<script type="text/javascript">
	(function() {
		var elements;
		var windowHeight;

		function initFade() {
			elements = document.querySelectorAll('.fader2');
			windowHeight = window.innerHeight;
		}

		function checkPositionFade() {
			for (var i = 0; i < elements.length; i++) {
				var element = elements[i];
				var positionFromTop = elements[i].getBoundingClientRect().top;
				if (positionFromTop - windowHeight <= 0) {
					element.classList.add('fadein2');
					element.classList.remove('fader2');
				}
			}
		}
		window.addEventListener('scroll', checkPositionFade);
		window.addEventListener('resize', initFade);
		initFade();
		checkPositionFade();
	})();
</script>


<!-- SYNCRO STATUS  -->
<script src="https://libraries.hund.io/status-js/status-3.9.0.js"></script>
<script>
	var statusWidget = new Status.Widget({
		hostname: "https://www.syncrostatus.com/",
		selector: "#status",

		css: true, // Inject the default CSS styles
		debug: false, // Log debugging messages
		outOfOffice: false, // Toggles out of office status change (see section below)
		linkTarget: "_blank", // The link target for outbound links (see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/a#attr-target)
		display: {
			hideOnError: true, // Hide the widget if a connection cannot be established
			pane: true, // Display the pane dropdown
			paneStatistics: true, // Display pane statistics (i.e. uptime, incident-free streak)
			ledOnly: false, // Show only the LED indicator, hiding the status text
			panePosition: "top-left", // One of "top-left", "top-right", "bottom-left", "bottom-right"
			ledPosition: "left", // Either "left" or "right"
			statistic: {
				uptimeDecimals: 4, // Number of decimals for uptime pane statistic
				minIncidentFreeStreak: 86400 // Minimum number of incident free streak seconds required to display
			},
		},
		i18n: {
			heading: "Issues",
			toggle: "${state}", // Other variables: percentUptime and incidentFreeStreak
			loading: "Loading status...",
			error: "Connection error",
			statistic: {
				streak: "No events for ${duration}!",
				uptime: "${percent}% Uptime"
			},
			issue: {
				scheduled: "Scheduled",
				empty: {
					operational: "There are currently no reported issues.",
					degraded: "There are currently no reported issues, but we have detected that at least one component is degraded.",
					outage: "There are currently no reported issues, but we have detected outages on at least one component.",
					pending: "Operation status information is not available at this time."
				}
			},
			state: {
				operational: "All systems operational",
				degraded: "Service Disruption Detected",
				outage: "Outage Detected",
				pending: "Systems Pending"
			},
			linkBack: "View Status Page",
		}
	});
</script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
<script defer>
	const lozadobserver = lozad('.lozad', {
		rootMargin: '300px 0px', // syntax similar to that of CSS Margin
		threshold: 0.1 // ratio of element convergence
	});
	lozadobserver.observe();
</script>

<!-- Start Chili Piper Snippet -->
<script src="https://js.chilipiper.com/marketing.js" type="text/javascript" async></script>
<script src="https://syncromsp.com/wp-content/site-scripts/cpParentHandler.js" type="text/javascript"></script>
<!-- End Chili Piper Snippet -->

</body>

</html> <!-- end page -->