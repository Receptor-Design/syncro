<?php
$d_active = get_field('active', 'option') ?: false;
$active = $d_active && get_field('active_mobile', 'option') ?: false;
$dupe = $active && get_field('duplicate_desktop', 'options') ?: false;
if ($active):
    global $wp;
    $local = str_replace(['https://', 'http://'], '', home_url($wp->request));
    $notification = $dupe ? get_field('desktop', 'option') : get_field('mobile', 'options')['content'];
    $location = $dupe ? $notification['location'] : get_field('mobile', 'options')['location'];
    $location['include_pages'] = is_array($location['include_pages']) ? $location['include_pages'] : [];
    $include = explode(',', preg_replace(['/(\/,)/', '/(\/$)/', "/http:\/\//", "/https:\/\//"], [',', '', '', ''],  implode(',', $location['include_pages'])));
    $button = $dupe ? $notification['button'] : [
        'text' => $notification['heading_text'],
        'background_color' => $notification['background_color'],
        'text_color' => $notification['text_color'],
        'icon' => $notification['icon']
    ];
    $flag = $dupe ? $notification['flag'] : ['text' => $notification['body_text'], 'link' => $notification['link']];
    $permanent = explode(',', $location['permanent']);
    if (isset($active)): ?>
        <?php if ($location['display'] == 'all' || inURL($permanent) || ($location['display'] == 'home' && is_front_page()) || ($location['display'] == 'include' && in_array($local, $include))): ?>
            <div id="mobile-announcement-bar" style="background-color: <?= $button['background_color']; ?>">
                <?= $flag['link'] ? "<a href=\"{$flag['link']['url']}\" target=\"{$flag['link']['target']}\">" : "" ?>
                <div class="mobile-announcement-bar__content">
                    <div class="mobile-announcement-bar__icon">
                        <?php if ($button['icon']['type'] == 'dashicons'): ?>
                            <span class="icon dashicons <?= $button['icon']['value'] ?>"></span>
                        <?php elseif ($button['icon']['type'] == 'media_library') : ?>
                            <img class="icon" src="<?= $button['icon']['value']['url'] ?>">
                        <?php else: ?>
                            <?= var_dump($button['icon']) ?>
                        <?php endif; ?>
                        <?= $button['text'] ?>
                    </div>
                    <div>
                        <?= $flag['text'] ?>&nbsp;<?= $flag['link'] ? "<span class=\"a\">{$flag['link']['title']}</span>" : "" ?>
                    </div>
                </div>
                <?= $flag['link'] ? "</a>" : "" ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?>