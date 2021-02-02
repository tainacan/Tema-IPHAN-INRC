<?php
    if (function_exists('tainacan_get_the_attachments')) {
        $attachments = tainacan_get_the_attachments();
    } else {
        // compatibility with pre 0.11 tainacan plugin
        $attachments = array_values(
            get_children(
                array(
                    'post_parent' => $post->ID,
                    'post_type' => 'attachment',
                    'post_mime_type' => 'image',
                    'order' => 'ASC',
                    'numberposts'  => -1,
                )
            )
        );
    }

    // Galley mode is a shortname for when documents and attachments are displayed merged in the same list
    $is_gallery_mode = get_theme_mod('iphan_inrc_document_attachments_structure', 'gallery-type-1') == 'gallery-type-2';

    if (!function_exists('render_attachment_thumbnail_slide_item')) {
        function render_attachment_thumbnail_slide_item($attachment) {
            if ( function_exists('tainacan_get_attachment_html_url') ) {
                $href = tainacan_get_attachment_html_url($attachment->ID);
            } else {
                $href = wp_get_attachment_url($attachment->ID, 'full');
            }
            if (!wp_get_attachment_image( $attachment->ID, 'iphan-inrc-item-attachments')) :
            ?>
                <li class="tainacan-item-section__attachments-file swiper-slide">
                    <a 
                        class="attachment-without-image"
                        href="<?php echo $href; ?>">
                        <?php
                            echo wp_get_attachment_image( $attachment->ID, 'iphan-inrc-item-attachments', true );
                        ?>
                        <span class="swiper-slide-name <?php if (get_theme_mod('iphan_inrc_hide_files_name', 'no') == 'yes') echo 'sr-only' ?>"><?php echo get_the_title( $attachment->ID ); ?></span>
                    </a>
                </li>
            <?php 
                else: 
                $img_scr = wp_get_attachment_image_src( $attachment->ID, 'iphan-inrc-item-attachments', true );
                ?>
                <li class="tainacan-item-section__attachments-file swiper-slide">
                    <a 
                        href="<?php echo $img_scr[0] ?>">
                        <?php
                            echo wp_get_attachment_image( $attachment->ID, 'iphan-inrc-item-attachments', true );
                        ?>
                        <span class="swiper-slide-name <?php if (get_theme_mod('iphan_inrc_hide_files_name', 'no') == 'yes') echo 'sr-only' ?>"><?php echo get_the_title( $attachment->ID ); ?></span>
                    </a>
                </li>
            <?php endif;
        }
    }

?>


<?php if ( !empty( $attachments ) || ( $is_gallery_mode && tainacan_has_document() ) ) : ?>

    <section class="tainacan-single-post tainacan-item-section--<?php echo ((!$is_gallery_mode ? 'attachments' : 'gallery')) ?>">
        <div class="tainacan-content single-item-collection">
            <?php if ( (get_theme_mod('iphan_inrc_display_section_labels', 'yes') == 'yes') && (!$is_gallery_mode) && get_theme_mod('iphan_inrc_section_attachments_label', __( 'Attachments', 'iphan_inrc' )) != '' ) : ?>
                <h2 class="tainacan-single-item-section" id="tainacan-item-attachments-label">
                    <?php echo esc_html( get_theme_mod('iphan_inrc_section_attachments_label', __( 'Attachments', 'iphan_inrc' ) ) ); ?>
                </h2>
            <?php endif; ?>
            <?php if ( (get_theme_mod('iphan_inrc_display_section_labels', 'yes') == 'yes') && ($is_gallery_mode) && get_theme_mod('iphan_inrc_section_documents_label', __( 'Documents', 'iphan_inrc' )) != '') : ?>
                <h2 class="tainacan-single-item-section" id="tainacan-item-documents-label">
                    <?php echo esc_html( get_theme_mod('iphan_inrc_section_documents_label', __( 'Documents', 'iphan_inrc' )) ); ?>
                </h2>
            <?php endif; ?>

            <?php if ( $is_gallery_mode ): ?>
                <div class="tainacan-item-section__gallery">
                    <div class="swiper-container-main swiper-container">
                        <ul class="swiper-wrapper">
                            <?php if ( tainacan_has_document() ) : ?>
                                <li class="swiper-slide tainacan-item-section__document">
                                    <?php 
                                        tainacan_the_document(); 
                                        if ( get_theme_mod( $prefix . '_hide_download_button', 'no' ) == 'no' && function_exists('tainacan_the_item_document_download_link') && tainacan_the_item_document_download_link() != '' ) {
                                            echo '<span class="tainacan-item-file-download">' . tainacan_the_item_document_download_link() . '</span>';
                                        } 
                                    ?>
                                </li>
                            <?php endif; ?>
                            <?php foreach ( $attachments as $attachment ) { ?>
                                <li class="swiper-slide tainacan-item-section__document">
                                    <?php 
                                        if ( function_exists('tainacan_get_single_attachment_as_html') ) {
                                            tainacan_get_single_attachment_as_html($attachment->ID);
                                        }
                                        if ( get_theme_mod( $prefix . '_hide_download_button', 'no' ) == 'no' && function_exists('tainacan_the_item_attachment_download_link') && tainacan_the_item_attachment_download_link($attachment->ID) != '' ) {
                                            echo '<span class="tainacan-item-file-download">' . tainacan_the_item_attachment_download_link($attachment->ID) . '</span>';
                                        } 
                                    ?>
                                </li>	
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <?php if ( (tainacan_has_document() && $attachments && sizeof($attachments) > 0 ) || (!tainacan_has_document() && $attachments && sizeof($attachments) > 1 ) ) : ?>	
                    <div class="tainacan-item-section__gallery-items">
                        <div class="swiper-container-thumbs swiper-container">
                            <ul class="swiper-wrapper">
                                <?php if ( tainacan_has_document() ) : ?>
                                    <li class="tainacan-item-section__attachments-file swiper-slide">
                                        <?php
                                            the_post_thumbnail('tainacan-medium');
                                        ?>
                                        <span class="swiper-slide-name <?php if (get_theme_mod( $prefix . '_hide_files_name', 'no') == 'yes') echo 'sr-only' ?>"><?php echo __( 'Document', 'iphan_inrc' ); ?></span>
                                    </li>
                                <?php endif; ?>
                                <?php foreach ( $attachments as $attachment ) {
                                    render_attachment_thumbnail_slide_item($attachment);
                                } ?>
                            </ul>
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                <?php endif; ?>
            <?php else : ?>
                <div class="tainacan-item-section__attachments"> 
                    <div class="swiper-container-thumbs swiper-container">
                        <ul class="swiper-wrapper">
                            <?php foreach ( $attachments as $attachment ) {
                                render_attachment_thumbnail_slide_item($attachment);
                            } ?>
                        </ul>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            <?php endif; ?>
        </div>
    </section>
        
    <!-- add PhotoSwipe (.pswp) element to DOM - 
    Root element of PhotoSwipe. Must have class pswp. -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

        <!-- Background of PhotoSwipe. 
                It's a separate element, as animating opacity is faster than rgba(). -->
        <div class="pswp__bg"></div>

        <!-- Slides wrapper with overflow:hidden. -->
        <div class="pswp__scroll-wrap">

            <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
            <!-- don't modify these 3 pswp__item elements, data is added later on. -->
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">

                <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->
                    <div class="pswp__counter"></div>

                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                    <button class="pswp__button pswp__button--share" title="Share"></button>

                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                    <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                    <!-- element will get class pswp__preloader--active when preloader is running -->
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>

                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                </button>

                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                </button>

                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>

    </div>


<?php endif; ?>