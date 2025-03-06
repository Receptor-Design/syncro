<?php
function syncro_get_reading_time($resource, $context = '')
{
    $post_type = get_post_type($resource);
    $message = '';
    switch ($post_type) {
        case 'post':
            $read_length = get_field('read_length', $resource->ID);
            if ($read_length > 0) {
                $message = $read_length . ' min read';
            }
            break;
        case 'resource':
            $types = wp_get_post_terms($resource->ID, 'resource-category');
            if (is_array($types) && count($types)) {
                if ($types[0]->slug === 'webinars') {
                    /* $message = 'On Demand'; */
                    /*  if (get_field('event_date', $resource->ID)) {
                        $today = new DateTime();
                        $event_date = DateTime::createFromFormat('M j, Y', get_field('event_date', $resource));
                        if ($event_date > $today) {
                            $message = 'Register Now';
                        }
                    } */
                } else if ($types[0]->slug === 'guides') {
                    $read_length = get_field('read_length', $resource->ID);
                    if ($read_length > 0) {
                        $message = $read_length . 'min read';
                    }
                } else if ($types[0]->slug === 'podcast') {
                    $read_length = get_field('listen_time', $resource->ID);
                    if ($read_length > 0) {
                        $message = $read_length;
                    }
                }
            }
            break;
    }
    switch ($context) {
        case 'single':
            if ($message) {
                $message = $message . '<span style="margin-left: var(--wp--preset--spacing--30);">|</span>';
            }
            break;
        case 'cream-card':
        case 'featured-resources':
            if ($message) {
                $message = $message . '<span class="bullet" style="font-weight: 400; font-size: 14px; margin-left: var(--wp--preset--spacing--20);">•</span>';
            }
            break;
    }
    return $message;
}
