<?php
$adjacent_links = tainacan_get_adjacent_item_links();
$previous = $adjacent_links['previous'];
$next = $adjacent_links['next'];
?>
<header class="site-container tainacan-single-item-heading">
    <div class="tainacan-title">
        <?php
        if (function_exists('tainacan_the_item_edit_link')) {
            echo '<span class="tainacan-edit-item-collection">';
            tainacan_the_item_edit_link(null, '');
            echo '</span>';
        }
        ?>
        <div class="is-style-title-iphan-underscore title-page">
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
    <div>
        <div class="icons-page-header">
            <?php
            if (get_theme_mod('setting_link_1', '') !== '') {
                echo '<a href="' . get_theme_mod('setting_link_1', '') . '?>">';
                echo '<i size="50px" class="tainacan-icon tainacan-icon-twitter"></i>';
                echo '</a>';
            }
            ?>
            <?php
            if (get_theme_mod('setting_link_2', '') !== '') {
                echo '<a href="' . get_theme_mod('setting_link_2', '') . '?>">';
                echo '<i size="50px" class="tainacan-icon tainacan-icon-facebook"></i>';
                echo '</a>';
            }
            ?>
            <?php
            if (get_theme_mod('setting_link_3', '') !== '') {
                echo '<a href="' . get_theme_mod('setting_link_3', '') . '?>">';
                echo '<i size="50px" class="tainacan-icon tainacan-icon-instagram"></i>';
                echo '</a>';
            } ?>
            <?php
            if (get_theme_mod('setting_link_4', '') !== '') {
                echo '<a href="' . get_theme_mod('setting_link_4', '') . '">';
                echo '<img class="imgPageHeader" alt="' . get_theme_mod('setting_alt_4', '') . '" src="' . get_theme_mod('iphan_logo_4', '') . '" />';
                echo '</a>';
            } ?>
            <?php
            if (get_theme_mod('setting_link_5', '') !== '') {
                echo '<a href="' . get_theme_mod('setting_link_5', '') . '">';
                echo '<img class="imgPageHeader" alt="' . get_theme_mod('setting_alt_5', '') . '" src="' . get_theme_mod('iphan_logo_5', '') . '" />';
                echo '</a>';
            } ?>
            <?php
            if (get_theme_mod('setting_link_6', '') !== '') {
                echo '<a href="' . get_theme_mod('setting_link_6', '') . '">';
                echo '<img class="imgPageHeader" alt="' . get_theme_mod('setting_alt_6', '') . '" src="' . get_theme_mod('iphan_logo_6') . '" />';
                echo '</a>';
            } ?>
        </div>
    </div>
</header>