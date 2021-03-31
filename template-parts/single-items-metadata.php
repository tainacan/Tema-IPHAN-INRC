<section class="tainacan-content tainacan-item-section__metadata">
    <?php if (get_theme_mod('tainacan_single_item_metadata_section_label', __('Informações', 'iphan_inrc')) != '') : ?>
        <h2 class="tainacan-single-item-section" id="single-item-metadata-label">
            <?php echo esc_html(get_theme_mod('tainacan_single_item_metadata_section_label', __('Informações', 'iphan_inrc'))); ?>
        </h2>
    <?php endif; ?>

    <div class="single-item-collection--information">
        <?php do_action('iphan-inrc-single-item-metadata-begin'); ?>
        <?php
        $args = array(
            'before_title' => '<div><h3>',
            'after_title' => '</h3>',
            'before_value' => '<p>',
            'after_value' => '</p></div>',
            'exclude_title' => true
        );
        //$field = null;
        tainacan_the_metadata($args);
        ?>
        <?php do_action('iphan-inrc-single-item-metadata-end'); ?>
    </div>
</section>