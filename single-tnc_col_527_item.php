<div class="inventario-header">
    <?php
    /* Cabeçalho da página */
    get_header();
    get_template_part('template-parts/site-banner');
    custom_breadcrumbs();
    /* Fim do cabeçalho */
    ?>
</div>

<div class="col-md-12 inventario">
    <div class="alinhamento-template-inventarios">
        <div class="barra-lateral">
            <?php echo tainacan_get_the_metadata();
            $attachments = tainacan_get_the_attachments();
            foreach ($attachments as $attachment) {
                $media_items_thumbs[] =
                    tainacan_get_the_media_component_slide(array(
                        'media_content' => wp_get_attachment_image($attachment->ID, 'tainacan-medium', false),
                        'media_content_full' => wp_attachment_is('image', $attachment->ID) ? wp_get_attachment_image($attachment->ID, 'full', false) : ('<div class="attachment-without-image tainacan-embed-container"><iframe id="tainacan-attachment-iframe" src="' . tainacan_get_attachment_html_url($attachment->ID) . '"></iframe></div>'),
                        'media_title' => $attachment->post_title,
                        'media_description' => $attachment->post_content,
                        'media_caption' => $attachment->post_excerpt,
                        'media_type' => $attachment->post_mime_type
                    ));
            }
            ?>
            <div class="attachments">
                <?php
                foreach ($media_items_thumbs as $media) {
                    echo $media;
                }
                ?>
            </div>
        </div>
        <div class="post-inventario">
            <h1 class="is-style-title-iphan-underscore">
                <?php echo tainacan_get_the_collection_name(); ?>
            </h1>
            <div class="metadata-mobile">
                <div class="header-collapse">
                    <span>informações técnicas</span>
                    <a type="button" class="plus-minus" data-toggle="collapse" data-target="#metadata-inventario" aria-controls="metadata-inventario" aria-expanded="false"></a>
                </div>
                <div id="metadata-inventario" class="collapse">
                    <?php echo tainacan_get_the_metadata(); ?>
                </div>
            </div>
            <div class="entry-content meta-content">
                <div class="share-button-wrapper">
                    <?php $postUrl = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"; ?>
                    <a target="_blank" class="share-button share-twitter" href="https://twitter.com/intent/tweet?url=<?php echo $postUrl; ?>&text=<?php echo the_title(); ?>&via=<?php the_author_meta('twitter'); ?>" title="<?php _e('Twittar', 'iphan_inrc'); ?>"><i class="tainacan-icon tainacan-icon-1-25em tainacan-icon-twitter"></i></a>
                    <a target="_blank" class="share-button share-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $postUrl; ?>" title="<?php _e('Compartilhar no Facebook', 'iphan_inrc'); ?>"><i class="tainacan-icon tainacan-icon-1-25em tainacan-icon-facebook"></i></a>
                </div>
            </div>
            <div class="content">
                <?php echo tainacan_get_item(); ?>
            </div>
        </div>
    </div>
    <?php comments_template(); ?>
</div>
<div class="inventario-footer">
    <?php
    get_template_part('template-parts/posts-relacionados');
    ?>
</div>
<?php get_footer(); ?>