
<?php
if (defined('TAINACAN_VERSION') && (!isset($_GET['onlyposts']) || !$_GET['onlyposts']) && (!isset($_GET['onlypages']) || !$_GET['onlypages']) && is_search()) {
    $post_type = get_post_type();
    $post_type_object = get_post_type_object($post_type);
    $post_type_label = $post_type_object->labels->singular_name;
    $post_type_archive_link = get_post_type_archive_link($post_type);
}
?>
<li class="row excerpt border-excerpt mb-4">
    <?php if (has_post_thumbnail()) : ?>
        <div class="col-xs-12 col-md-4 blog-thumbnail thumb-resume mb-md-0">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('medium-large', array('class' => 'img-fluid')); ?>
            </a>
        </div>
    <?php endif; ?>
    <div class="col-xs-12 blog-content posicionamento-excerpt <?php if (has_post_thumbnail()) : ?>col-md-8 blog-flex<?php else : ?>col-md-12<?php endif; ?>">
        <div class="mb-3">
            <?php if (defined('TAINACAN_VERSION') && (!isset($_GET['onlyposts']) || !$_GET['onlyposts']) && (!isset($_GET['onlypages']) || !$_GET['onlypages']) && is_search()) : ?>
                <h4 class="post-type-tag"><a href="<?php echo $post_type_archive_link ?>"><?php echo $post_type_label ?></a></h4>
            <?php endif; ?>
            <span class="categoria-excerpt"><?php echo the_category() ?></span>
            <a href="<?php the_permalink(); ?>" class="font-weight-bold"><?php the_title(); ?></a>
        </div>
        <?php echo '<p class="text-black">' . wp_trim_words(get_the_excerpt(), 28, '...') . '</p>'; ?>
        <div class="info-footer-resume">
            <div class="date-excerpt-position">
                <span class="date-excerpt"><?php echo get_the_date("j") . " de " . get_the_date("F, Y") ?></span>
            </div>
            <div class="wp-block-button">
                <a href="<?php the_permalink(); ?>" class="wp-block-button__link"><?php _e('Ler Mais <i size="50px" class="tainacan-icon tainacan-icon-next"></i>', 'ler-mais'); ?></a>
            </div>
        </div>
    </div>
</li>
<hr id="hrResume">