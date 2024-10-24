<?php
/**
 * Title: Latest Resources
 * Description: Displays a query on the resource hub landing page.
 * Slug: syncro-blocks/latest-resources
 * Categories: Resources
 * Viewport width: 1400
 */
?>

<!-- wp:group {"metadata":{"name":"Latest Resources"},"className":"latest-resources-section","layout":{"type":"constrained"}} -->
<div class="wp-block-group latest-resources-section"><!-- wp:heading {"level":6} -->
<h6 class="wp-block-heading" id="h-latest-resources">Latest Resources</h6>
<!-- /wp:heading -->

<!-- wp:query {"queryId":1,"query":{"perPage":8,"pages":0,"offset":0,"postType":"resource","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"namespace":"syncro-blocks/resource-query","ghubQueryId":"4"} -->
<div class="wp-block-query"><!-- wp:columns {"metadata":{"name":"Search \u0026 Filter"},"className":"search-and-filter-columns"} -->
<div class="wp-block-columns search-and-filter-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search","buttonText":"Search","buttonPosition":"button-inside","buttonUseIcon":true,"className":"ghub-query-search"} /--></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:details {"className":"is-style-taxonomy-accordion"} -->
<details class="wp-block-details is-style-taxonomy-accordion"><summary>Filter by Topics</summary><!-- wp:ghub/query-taxonomy {"showAll":false,"taxonomySlug":"resource-syncrotopic","layout":"checkbox","orientation":"column"} -->
<div class="wp-block-ghub-query-taxonomy gutenberghub-query-taxonomy has-ghub-layout justify-content-left flex-direction-column" style="--ghub-qbt-button-border-top:  ;--ghub-qbt-button-border-right:  ;--ghub-qbt-button-border-bottom:  ;--ghub-qbt-button-border-left:  ">%1$s</div>
<!-- /wp:ghub/query-taxonomy --></details>
<!-- /wp:details --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:details {"className":"is-style-taxonomy-accordion"} -->
<details class="wp-block-details is-style-taxonomy-accordion"><summary>Filter by Resource Type</summary><!-- wp:ghub/query-taxonomy {"showAll":false,"taxonomySlug":"resource-category","layout":"checkbox","orientation":"column"} -->
<div class="wp-block-ghub-query-taxonomy gutenberghub-query-taxonomy has-ghub-layout justify-content-left flex-direction-column" style="--ghub-qbt-button-border-top:  ;--ghub-qbt-button-border-right:  ;--ghub-qbt-button-border-bottom:  ;--ghub-qbt-button-border-left:  ">%1$s</div>
<!-- /wp:ghub/query-taxonomy --></details>
<!-- /wp:details --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"metadata":{"name":"Query Results"},"className":"is-style-default query-results"} -->
<div class="wp-block-columns is-style-default query-results"><!-- wp:column {"width":"400px","responsiveBlockControl":{"mobile":true,"tablet":true,"desktop":false,"wide":false}} -->
<div class="wp-block-column" style="flex-basis:400px"><!-- wp:block {"ref":28047} /--></div>
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
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30);font-size:14px"><!-- wp:syncro-blocks/syncro-meta-data {"name":"syncro-blocks/syncro-meta-data","data":{"output_style":"cream-card","_output_style":"field_6709728ea21f5"},"mode":"preview"} /--></div>
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
<!-- /wp:columns --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->