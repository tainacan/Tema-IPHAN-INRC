<?php
$attachments = tainacan_get_the_attachments();
if (function_exists('tainacan_the_item_gallery') && (!empty($attachments) || tainacan_has_document())) {
?>
    <section class="tainacan-content tainacan-item-section tainacan-item-section--gallery">

        <?php if ((get_theme_mod('iphan_inrc_display_section_labels', 'yes') == 'yes') && get_theme_mod('iphan_inrc_section_documents_label', __('Documentos', 'iphan-inrc')) != '') : ?>
            <h2 class="tainacan-single-item-section" id="tainacan-item-documents-label">
                <?php echo esc_html(get_theme_mod('iphan_inrc_section_documents_label', __('Documentos', 'iphan-inrc'))); ?>
            </h2>
        <?php endif; ?>

        <?php
            tainacan_the_item_gallery([
                'hideFileNameMain'        => false,
                'hideFileCaptionMain'     => true, 
                'hideFileDescriptionMain' => true, 
                'hideDownloadButton'      => false,
                'showArrowsAsSVG'         => false
            ]);
        ?>

    </section>
<?php } ?>