<?php

if ( function_exists('tainacan_the_related_items_carousel') && tainacan_has_related_items() ) : ?>

<section class="tainacan-content single-item-collection margin-two-column">

    <?php if ( get_theme_mod('tainacan_single_item_related_items_section_label', __( 'Itens relacionados a este', 'iphan-inrc' )) != '') : ?>
        <h2 class="tainacan-single-item-section" id="single-item-related-items-label">
            <?php echo esc_html( get_theme_mod('tainacan_single_item_related_items_section_label', __( 'Itens relacionados a este', 'iphan-inrc' )) ); ?>
        </h2>
    <?php endif; ?>
    
    <div class="single-item-collection--information">
        <?php 
            tainacan_the_related_items_carousel([
                // 'class_name' => 'mt-2 tainacan-single-post',
                // 'collection_heading_class_name' => 'title-content-items',
                'collection_heading_tag' => 'h3',
                'carousel_args' => [
                    'max_items_per_screen' => get_theme_mod('tainacan_single_item_related_items_max_items_per_screen', 6)
                ]
            ]);
        ?>
    <div>
</section>

<?php endif; ?>