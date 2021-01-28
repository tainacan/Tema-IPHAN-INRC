<?php
if (defined('TAINACAN_VERSION') && (!isset($_GET['onlyposts']) || !$_GET['onlyposts']) && (!isset($_GET['onlypages']) || !$_GET['onlypages']) && is_search()) {
    $post_type = get_post_type();
    $post_type_object = get_post_type_object($post_type);
    $post_type_label = $post_type_object->labels->singular_name;
    $post_type_archive_link = get_post_type_archive_link($post_type);
}
?>
<div class="row excerpt border-excerpt mb-4">
    <?php if (has_post_thumbnail()) : ?>
        <div class="col-xs-12 col-md-4 blog-thumbnail thumb-resume mb-4 mb-md-0">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('tainacan-interface-list-post', array('class' => 'img-fluid')); ?>
            </a>
        </div>
    <?php endif; ?>
    <div class="col-xs-12 blog-content <?php if (has_post_thumbnail()) : ?>col-md-8 blog-flex<?php else : ?>col-md-12<?php endif; ?>">
        <?php if (defined('TAINACAN_VERSION') && (!isset($_GET['onlyposts']) || !$_GET['onlyposts']) && (!isset($_GET['onlypages']) || !$_GET['onlypages']) && is_search()) : ?>
            <div class="title-area">
                <h3 class="mb-3">
                    <a href="<?php the_permalink(); ?>" class="font-weight-bold"><?php the_title(); ?></a>
                </h3>

                <h4><a href="<?php echo $post_type_archive_link ?>"><?php echo $post_type_label ?></a></h4>
            </div>
        <?php else : ?>
            <h3 class="mb-3">
                <a href="<?php the_permalink(); ?>" class="font-weight-bold"><?php the_title(); ?></a>
            </h3>
        <?php endif; ?>
        <?php echo '<p class="text-black">' . wp_trim_words(get_the_excerpt(), 28, '...') . '</p>'; ?>
        <div class="date-excerpt-position">
            <span class="date-exerpt"><?php echo get_the_date("j") . " de " . get_the_date("F, Y") ?></span>
        </div>
        <a href="<?php the_permalink(); ?>" class="ler-mais"><?php _e('Ler Mais <i size="50px" class="tainacan-icon tainacan-icon-next"></i>', 'ler-mais'); ?></a>
    </div>
</div>
<hr id="hrResume">