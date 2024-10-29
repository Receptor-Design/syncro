<?php
/**
 * Title: Single Featured Resource Section
 * Description: Displays a single resource on a card.
 * Slug: syncro-blocks/single-featured-resource-section
 * Categories: Resources
 * Viewport width: 1400
 */
?>

<!-- wp:group {"tagName":"section","metadata":{"name":"Single Resource Section"},"align":"full","style":{"spacing":{"margin":{"top":"0"}}},"backgroundColor":"syncro-black","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull has-syncro-black-background-color has-background" style="margin-top:0"><!-- wp:query {"queryId":0,"query":{"perPage":"1","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"Taking Syncro to the Field","exclude":[],"sticky":"","inherit":false,"parents":[]},"metadata":{"name":"Single Resource Card","categories":["resources"],"patternName":"core/block/28434"},"ghubQueryId":"6","className":"single-resource-card"} -->
<div class="wp-block-query single-resource-card"><!-- wp:post-template -->
<!-- wp:cover {"url":"<?php echo site_url(); ?>/wp-content/uploads/2024/10/Feature-Syncro-Mobile-App_1280x524.jpg","id":31082,"isUserOverlayColor":true,"minHeight":524,"gradient":"single-resource-card","contentPosition":"top left","style":{"border":{"radius":"24px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-cover has-custom-content-position is-position-top-left has-base-color has-text-color has-link-color" style="border-radius:24px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--50);min-height:524px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient has-single-resource-card-gradient-background"></span><img class="wp-block-cover__image-background wp-image-31082" alt="" src="<?php echo site_url(); ?>/wp-content/uploads/2024/10/Feature-Syncro-Mobile-App_1280x524.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"760px"} -->
<div class="wp-block-column" style="flex-basis:760px"><!-- wp:post-title {"isLink":true} /-->

<!-- wp:post-excerpt {"moreText":"","style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base"} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20","margin":{"top":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30)"><!-- wp:post-terms {"term":"resource-syncrotopic","className":"is-style-topic-label-transparent-cream"} /-->

<!-- wp:paragraph -->
<p>•</p>
<!-- /wp:paragraph -->

<!-- wp:post-terms {"term":"resource-category"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":""} -->
<div class="wp-block-column"></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:cover -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></section>
<!-- /wp:group -->