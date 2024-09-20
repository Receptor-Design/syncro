<?php /*
<ul class='meganav dropdown menu' data-responsive-menu="accordion large-dropdown">
        <?php
        if (have_rows('parent_item', 'option')) :
            while (have_rows('parent_item', 'option')) : the_row();
                $parent = get_sub_field('parent_link');
                $parent_link = "<a href=\"$parent[url]\" target=\"$parent[target]\">$parent[title]</a>" ?>
                <li>
                    <?= $parent_link ?>
                    <?php $columns = get_sub_field('child_columns');
                    $column_count = (($columns) ? count(get_sub_field('child_columns')) : null) ?>
                    <?php if (have_rows('child_columns')) : ?>
                        <ul class="menu <?= ($column_count > 1) ? "columns" : "column" ?>">
                            <?php while (have_rows('child_columns')) : the_row(); ?>
                                <?php $border = get_sub_field('left_border'); ?>
                                <div class='column<?= ($border) ? " column-border-left" : "" ?>'>
                                    <?php if (have_rows('child_items')) : ?>
                                        <?php while (have_rows('child_items')) : the_row();
                                            $heading = get_sub_field('item_link');
                                            $heading_link = "<a href=\"$heading[url]\" target=\"$heading[target]\">$heading[title]</a>"; ?>
                                            <li>
                                                <?= $heading_link ?>
                                                <?php if (have_rows('sub_links')) : ?>
                                                    <ul class="menu">
                                                        <?php while (have_rows('sub_links')) : the_row();
                                                            $sub_link = get_sub_field('link') ?? null; ?>
                                                            <li>
                                                                <a href="<?= $sub_link['url'] ?>" target="<?= $sub_link['target'] ?>"><?= $sub_link['title'] ?></a>
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
    */
