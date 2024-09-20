<ul class='meganav dropdown menu' data-responsive-menu="accordion large-dropdown">
    <?php
    if (have_rows('parent_item', 'option')) :
        while (have_rows('parent_item', 'option')) : the_row();
    ?>
            <li>
                <?php $link = get_sub_field('parent_link', 'option');
                if ($link) : $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                        <?php echo esc_html($link_title); ?>
                    </a>
                <?php endif; ?>
                <?php $columns = get_sub_field('child_columns', 'option');
                $column_count = (($columns) ? count(get_sub_field('child_columns', 'option')) : null) ?>
                <?php if (have_rows('child_columns', 'option')) : ?>
                    <ul class="menu <?= ($column_count > 1) ? "columns" : "column" ?>">
                        <?php while (have_rows('child_columns', 'option')) : the_row(); ?>
                            <div class="column  <?php if (get_sub_field('left_border', 'option')) : ?>column-border-left<?php endif; ?>">
                                <?php if (have_rows('child_items', 'option')) : ?>
                                    <?php while (have_rows('child_items', 'option')) : the_row(); ?>
                                        <li>
                                            <?php $link = get_sub_field('item_link', 'option');
                                            if ($link) : $link_url = $link['url'];
                                                $link_title = $link['title'];
                                                $link_target = $link['target'] ? $link['target'] : '_self';
                                            ?>
                                                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                                    <?php echo esc_html($link_title); ?>
                                                </a>
                                            <?php endif; ?>
                                            <?php if (have_rows('sub_links', 'option')) : ?>
                                                <ul class="menu">
                                                    <?php while (have_rows('sub_links', 'option')) : the_row(); ?>
                                                        <li>
                                                            <?php $link = get_sub_field('link', 'option');
                                                            if ($link) : $link_url = $link['url'];
                                                                $link_title = $link['title'];
                                                                $link_target = $link['target'] ? $link['target'] : '_self';
                                                            ?>
                                                                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                                                    <?php echo esc_html($link_title); ?>
                                                                </a>
                                                            <?php endif; ?>
                                                        </li>
                                                    <?php endwhile; ?>
                                                </ul>
                                            <?php endif; ?>
                                        </li>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </li>
        <?php endwhile; ?>
    <?php endif; ?>
</ul>