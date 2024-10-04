<?php
/**
 * Author Headshot Block template
 * 
 * @param array $block The block settings and attributes
 */

$author = get_the_author_meta( 'ID' );
$headshot = get_field( 'author_headshot', 'user_' . $author );

if( ! $headshot ){
    return;
}
?>
<figure class="wp-block-image wp-block-syncro-author-headshot">
    <?php echo wp_get_attachment_image( $headshot, 'author_headshot' ); ?>
</figure>