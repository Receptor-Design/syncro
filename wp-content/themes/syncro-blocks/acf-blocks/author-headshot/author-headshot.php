<?php
/**
 * Author Headshot Block template
 * 
 * @param array $block The block settings and attributes
 */

$author = get_the_author_meta( 'ID' );
$headshot = get_field( 'author_headshot', 'user_' . $author );
$size = is_author() ? 'author_archive_headshot' : 'author_headshot';

if( ! $headshot && !$is_preview ){
    return;
}else if( ! $headshot && $is_preview ){
    echo 'Author Headshot';
    return;
}
?>
<figure class="wp-block-image wp-block-syncro-author-headshot">
    <?php echo wp_get_attachment_image( $headshot, $size ); ?>
</figure>