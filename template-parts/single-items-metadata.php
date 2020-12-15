<div class="mt-3 tainacan-single-post">

    <?php if ( get_theme_mod('tainacan_single_item_metadata_section_label', '') != '') : ?>
        <h2 class="title-content-items" id="single-item-metadata-label">
            <?php echo esc_html( get_theme_mod('tainacan_single_item_metadata_section_label', '') ); ?>
        </h2>
    <?php endif; ?>
    <section class="tainacan-content single-item-collection margin-two-column">
        <div class="single-item-collection--information justify-content-center">
            <div class="row">
                <div class="col s-item-collection--metadata">
                    <?php if (has_post_thumbnail() && get_theme_mod( 'tainacan_single_item_display_thumbnail', true )): ?>
                        <div class="tainacan-item-thumbnail-container border-0 mb-3">
                            <div class="border-0 pl-0 pt-0 pb-1">
                                <h3><?php _e( 'Thumbnail', 'tainacan-interface' ); ?></h3>
                                <?php the_post_thumbnail('tainacan-medium-full', array('class' => 'item-card--thumbnail mt-2')); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php do_action( 'tainacan-interface-single-item-metadata-begin' ); ?>
                    <?php
                        $args = array(
                            'before_title' => '<div><h3>',
                            'after_title' => '</h3>',
                            'before_value' => '<p>',
                            'after_value' => '</p></div>',
                            'exclude_title' => get_theme_mod('tainacan_single_item_hide_core_title_metadata', false)
                        );
                        //$field = null;
                        tainacan_the_metadata( $args );
                    ?>
                    <?php do_action( 'tainacan-interface-single-item-metadata-end' ); ?>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="my-5 border-bottom border-silver"></div>