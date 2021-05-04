<hr class="hr-posts-relacionados">
</hr>
<?php
$args = array(
    'post_type' => 'post',
    'tax_query' => array(
        'relation' => 'OR',
        array(
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => array('quotes'),
        ),
        array(
            'relation' => 'OR',
            array(
                'taxonomy' => 'post_format',
                'field'    => 'slug',
                'terms'    => array('post-format-quote'),
            ),
            array(
                'taxonomy' => 'category',
                'field'    => 'slug',
                'terms'    => array('wisdom'),
            ),
        ),
    ),
);
$query = new WP_Query($args);
$results = get_posts($query);
?>
<div class="posts-relacionados alignfull">
    <h1 class="is-style-title-iphan-underscore"><?php _e('Relacionados', 'iphan_inrc') ?></h1>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php
            for ($i = 0; $i < count($results); $i++) {
            ?>
                <a class="swiper-slide" href="<?php echo get_post_permalink($results[$i]->ID) ?>" style="background-image: url(' <?php echo get_the_post_thumbnail_url($results[$i]->ID) ?>')">
                    <div class="destaques-content">
                        <?php
                        echo '<span class="destaques-cat">' . get_the_category($results[$i]->ID)[0]->cat_name . '</span>';
                        echo '<span class="destaques-title">' . get_the_title($results[$i]) . '</span>';
                        ?>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>
    <div class="container-navigation-relacionados">
        <div class="col-md-12 navigation-posts-relacionados navigation-destaques-swiper">
            <div class="swiper-button-prev navigation-relacionados-prev"><i class="tainacan-icon tainacan-icon-previous"></i></div>
            <div class="swiper-button-next navigation-relacionados-next"><i class="tainacan-icon tainacan-icon-next"></i></div>
        </div>
    </div>
</div>