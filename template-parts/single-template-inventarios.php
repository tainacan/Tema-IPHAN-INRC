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
            get_template_part('template-parts/get-attachments-tainacan');
            ?>
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
                    <?php echo tainacan_get_the_metadata();
                    get_template_part('template-parts/get-attachments-tainacan');
                    ?>
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
                <?php
                    $item = tainacan_get_item(); 
                    $post_id = url_to_postid($item->get_document());

                    if ($post_id != 0) {
                        global $wp_embed;

                        $raw_content = get_the_content(null, false, $post_id);
                        $content = $wp_embed->autoembed( $raw_content );

                        echo $content;
                    }
                ?>
            </div>
            <?php comments_template(); ?>
        </div>
    </div>
    
</div>
<div class="inventario-footer">
    <?php
    get_template_part('template-parts/posts-relacionados');
    ?>
</div>
<?php get_footer(); ?>