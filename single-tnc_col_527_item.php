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
            <?php echo tainacan_get_the_metadata(); ?>
        </div>
        <div class="post-inventario">
            <h1 class="is-style-title-iphan-underscore">
                <?php echo tainacan_get_the_collection_name(); ?>
            </h1>
            <div class="metadata-mobile">
                <?php echo tainacan_get_the_metadata(); ?>
            </div>
            <div class="entry-content meta-content">
                <div class="share-button-wrapper">
                    <?php $postUrl = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"; ?>
                    <a target="_blank" class="share-button share-twitter" href="https://twitter.com/intent/tweet?url=<?php echo $postUrl; ?>&text=<?php echo the_title(); ?>&via=<?php the_author_meta('twitter'); ?>" title="<?php _e('Twittar', 'iphan_inrc'); ?>"><i class="tainacan-icon tainacan-icon-1-25em tainacan-icon-twitter"></i></a>
                    <a target="_blank" class="share-button share-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $postUrl; ?>" title="<?php _e('Compartilhar no Facebook', 'iphan_inrc'); ?>"><i class="tainacan-icon tainacan-icon-1-25em tainacan-icon-facebook"></i></a>
                </div>
            </div>
            <div>
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