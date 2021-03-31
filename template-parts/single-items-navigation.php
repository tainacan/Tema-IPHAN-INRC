<?php
$adjacent_links = [
    'next' => '',
    'previous' => ''
];
$adjacent_links = tainacan_get_adjacent_item_links();
$previous = $adjacent_links['previous'];
$next = $adjacent_links['next'];
?>
<?php if ($previous !== '' || $next !== '') : ?>
    <hr class="alignfull" style="height: 3px; background: #58020b;" />
    <div class="site-container tainacan-single-item-navigation">
        <?php if (get_theme_mod('tainacan_single_item_navigation_section_label', __('Continue explorando', 'iphan_inrc')) != '') : ?>
            <div class="is-style-title-iphan-underscore title-page">
                <h1 id="single-item-navigation-label">
                    <?php echo esc_html(get_theme_mod('tainacan_single_item_navigation_section_label', __('Continue explorando', 'iphan_inrc'))); ?>
                </h1>
            </div>
        <?php endif; ?>
        <div id="item-single-navigation" class="related-posts">
            <div class="related-post">
                <?php echo $previous; ?>
            </div>
            <div class="related-post">
                <a style="background-image: url(<?php echo 'alguma_url' ?>)" rel="next" href="<?php echo tainacan_get_source_item_list_url() ?>">
                    <div class="post-box"><img src="' . $next_thumb . '" alt=""' . $next_title . '">
                        <span class=" post-type"><?php echo __('Itens do Inventário', 'iphan_inrc') ?></span>
                        <span class="post-title"><?php echo __('Nome do Inventário de Origem', 'iphan_inrc') ?><span>
                    </div>
                </a>
            </div>
            <div class="related-post">
                <?php echo $next; ?>
            </div>
        </div>
    </div>
<?php endif; ?>