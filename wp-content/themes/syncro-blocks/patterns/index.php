<?php
/**
 * Title: index
 * Slug: syncro-blocks/index
 * Inserter: no
 */
?>
<!-- wp:template-part {"slug":"mobile-header","tagName":"header","className":"mobile-header-template-part"} /-->

<!-- wp:template-part {"slug":"header","tagName":"header","className":"desktop-header-template-part"} /-->

<!-- wp:group {"metadata":{"name":"Archive Hero"},"className":"archive-hero","layout":{"type":"constrained"}} -->
<div class="wp-block-group archive-hero"><!-- wp:heading {"level":6} -->
<h6 class="wp-block-heading" id="h-resources">Resources</h6>
<!-- /wp:heading -->

<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading" id="h-blog">Blog</h1>
<!-- /wp:heading -->

<!-- wp:image {"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"24px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/Midjourney-Build-Image-1-Orange.png" alt="" style="border-radius:24px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading" id="h-sharpen-your-knowledge-and-stay-ahead-of-the-curve-with-expert-insights-across-a-wide-array-of-it-and-business-topics-discover-hundreds-of-articles-on-technology-operations-pricing-and-profitability-and-much-more">Sharpen your knowledge and stay ahead of the curve with expert insights across a wide array of IT and business topics. Discover hundreds of articles on technology, operations, pricing and profitability, and much more.</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:query {"queryId":4,"query":{"perPage":12,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"taxQuery":null,"parents":[]},"tagName":"main","ghubQueryId":"2","layout":{"contentSize":null,"type":"constrained"}} -->
<main class="wp-block-query"><!-- wp:columns {"className":"is-style-default"} -->
<div class="wp-block-columns is-style-default"><!-- wp:column {"width":"400px"} -->
<div class="wp-block-column" style="flex-basis:400px"><!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search","buttonText":"Search","buttonPosition":"button-inside","buttonUseIcon":true,"className":"ghub-query-search"} /-->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--40)"><!-- wp:details {"className":"query-taxonomy-accordion"} -->
<details class="wp-block-details query-taxonomy-accordion"><summary>Filter by Topic</summary><!-- wp:ghub/query-taxonomy {"showAll":false,"taxonomySlug":"resource-syncrotopic","layout":"checkbox","orientation":"column","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
<div class="wp-block-ghub-query-taxonomy gutenberghub-query-taxonomy has-ghub-layout justify-content-left flex-direction-column" style="margin-top:var(--wp--preset--spacing--40);--ghub-qbt-button-border-top:  ;--ghub-qbt-button-border-right:  ;--ghub-qbt-button-border-bottom:  ;--ghub-qbt-button-border-left:  ">%1$s</div>
<!-- /wp:ghub/query-taxonomy --></details>
<!-- /wp:details --></div>
<!-- /wp:group -->

<!-- wp:block {"ref":28047} /--></div>
<!-- /wp:column -->

<!-- wp:column {"width":""} -->
<div class="wp-block-column"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:post-template {"className":"is-style-standard-card","layout":{"type":"default"}} -->
<!-- wp:group {"style":{"border":{"left":{"color":"var:preset|color|foreground-10","width":"1px"},"bottom":{"color":"var:preset|color|foreground-10","width":"1px"}},"spacing":{"margin":{"top":"0"}}}} -->
<div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--foreground-10);border-bottom-width:1px;border-left-color:var(--wp--preset--color--foreground-10);border-left-width:1px;margin-top:0"><!-- wp:columns {"verticalAlignment":"center","className":"is-style-default"} -->
<div class="wp-block-columns are-vertically-aligned-center is-style-default"><!-- wp:column {"verticalAlignment":"center","width":"160px"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:160px"><!-- wp:post-featured-image {"isLink":true,"sizeSlug":"square"} /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"66.66%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%"><!-- wp:syncro-blocks/resource-type-eyebrow {"name":"syncro-blocks/resource-type-eyebrow","mode":"preview"} /-->

<!-- wp:post-title {"level":4,"isLink":true,"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} /-->

<!-- wp:group {"style":{"typography":{"fontSize":"14px"},"spacing":{"margin":{"top":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30);font-size:14px"><!-- wp:syncro-blocks/resource-time {"name":"syncro-blocks/resource-time","data":{"output_style":"cream-card","_output_style":"field_6709728ea21f5"},"mode":"preview"} /-->

<!-- wp:post-date {"isLink":true} /-->

<!-- wp:paragraph -->
<p>•</p>
<!-- /wp:paragraph -->

<!-- wp:post-author {"showAvatar":false,"showBio":false,"byline":"\u003cbr\u003eBy"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"typography":{"fontSize":"14px"},"spacing":{"margin":{"top":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30);font-size:14px"><!-- wp:post-terms {"term":"resource-syncrotopic","className":"is-style-topic-label-cream"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:group -->

<!-- wp:ghub/query-load-more {"backgroundColor":"#eee9e3","loadingText":" Loading...","style":{"elements":{"link":{"color":{"text":"var:preset|color|syncro-black"}}},"border":{"radius":"200px"}},"fontSize":"x-small"} -->
<div class="ghub-query-load-more justify-content-undefined has-eee-9-e-3-background-color has-background has-link-color has-x-small-font-size"><a style="background-color:#eee9e3;border-radius:200px" class="ghub_query_load_more_link wp-element-button has-x-small-font-size undefined">Load More</a></div>
<!-- /wp:ghub/query-load-more -->

<!-- wp:block {"ref":28048} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></main>
<!-- /wp:query -->

<!-- wp:group {"metadata":{"name":"Explore Collections"},"align":"full","className":"explore-collections-section","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull explore-collections-section"><!-- wp:heading {"level":6} -->
<h6 class="wp-block-heading" id="h-explore-collections">Explore Collections</h6>
<!-- /wp:heading -->

<!-- wp:group {"className":"explore-collections-grid","layout":{"type":"grid","columnCount":null,"minimumColumnWidth":"19rem"}} -->
<div class="wp-block-group explore-collections-grid"><!-- wp:group {"className":"explore-collections-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group explore-collections-card"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/MSP-Bro.jpg" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading" id="h-resources-for-msps">Resources for MSPs</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"fontSize":"x-small","responsiveBlockControl":{"wide":false,"desktop":false,"mobile":false,"tablet":false}} -->
<p class="has-x-small-font-size" style="margin-top:var(--wp--preset--spacing--30)">A curated collection of essential resources for MSPs who want to drive growth and enhance efficiency.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="https://syncromsp.local/resources/for-msps/">Learn More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"explore-collections-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group explore-collections-card"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/IT-Bro.jpg" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading" id="h-resources-for-it-teams">Resources for IT Teams</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"fontSize":"x-small","responsiveBlockControl":{"wide":false,"desktop":false,"mobile":false,"tablet":false}} -->
<p class="has-x-small-font-size" style="margin-top:var(--wp--preset--spacing--30)">A curated collection of essential resources for internal IT teams and systems admins who want to be more efficient and more proactive in their work.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="https://syncromsp.local/resources/for-it-departments/">Learn More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"explore-collections-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group explore-collections-card"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/Newbie-Bro.jpg" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading" id="h-resources-for-new-entrepreneurs">Resources for New Entrepreneurs</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"fontSize":"x-small","responsiveBlockControl":{"wide":false,"desktop":false,"mobile":false,"tablet":false}} -->
<p class="has-x-small-font-size" style="margin-top:var(--wp--preset--spacing--30)">A curated collection of essential resources for IT professionals who are just getting started with MSP services and IT management software.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="https://syncromsp.local/resources/for-emerging-msps/">Learn More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:block {"ref":28050} /-->

<!-- wp:block {"ref":28052} /-->

<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->