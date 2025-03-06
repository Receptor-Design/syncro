<?php
$active = get_field('active', 'option') ?: false;
if ($active) :

    global $wp;
    $local = str_replace(['https://', 'http://'], '', home_url($wp->request));
    $notification = get_field('desktop', 'option');
    $location = $notification['location'];
    $location['include_pages'] = is_array($location['include_pages']) ? $location['include_pages'] : [];
    $include = explode(',', preg_replace(['/(\/,)/', '/(\/$)/', "/http:\/\//", "/https:\/\//"], [',', '', '', ''],  implode(',', $location['include_pages'])));
    $button = $notification['button'];
    $flag = $notification['flag'];
    $flag_bg = str_contains($flag['background_color'], '#') ? $flag['background_color'] : '#' . $flag['background_color'];
    if (!isset($_SESSION['notification_closed'])) {
        $_SESSION['notification_closed'] = false;
    };
    $notification_closed = $_SESSION['notification_closed'];
    $permanent = explode(',', $location['permanent']);
    if (isset($active)): ?>
        <?php if ($location['display'] == 'all' || inURL($permanent) || ($location['display'] == 'home' && is_front_page()) || ($location['display'] == 'include' && in_array($local, $include))): ?>
            <div id="announcement-bar" class="<?= $notification_closed ? 'closed' : '' ?>">
                <div class="announcement-bar__content">
                    <div id="btn" class="announcemnt-bar__button " style="background-color: <?= $button['background_color']; ?>">
                        <div class="announcement-bar__icon">
                            <?php if ($button['icon']['type'] == 'dashicons'): ?>
                                <span class="icon dashicons <?= $button['icon']['value'] ?>"></span>
                            <?php elseif ($button['icon']['type'] == 'media_library') : ?>
                                <img class="icon" src="<?= $button['icon']['value']['url'] ?>">
                            <?php else: ?>
                                <?= var_dump($button['icon']) ?>
                            <?php endif; ?>
                        </div>
                        <?= $button['text'] ?>
                    </div>
                    <div class="announcement-bar__flag" style="background-color: <?= $flag_bg; ?>">
                        <?= $flag['text'] ?>
                        &nbsp;<?= $flag['link'] ? "<a href=\"{$flag['link']['url']}\" target=\"{$flag['link']['target']}\">{$flag['link']['title']}</a>" : "" ?>
                        <span id="close-btn">&times;</span>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?>