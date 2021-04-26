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
            'relation' => 'AND',
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
<div class="posts-relacionados">
    <h1 class="is-style-title-iphan-underscore">relacionados</h1>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php
            if ($results[0] !== null) {
            ?>
                <a class="swiper-slide" href="<?php echo get_post_permalink($results[0]->ID) ?>" style="background-image: url(' <?php echo get_the_post_thumbnail_url($results[0]->ID) ?>')">
                    <div class="destaques-content">
                        <?php
                        echo '<span class="destaques-cat">' . get_the_category($results[0]->ID)[0]->cat_name . '</span>';
                        echo '<span class="destaques-title">' . get_the_title($results[0]) . '</span>';
                        ?>
                    </div>
                </a>
            <?php } ?>
            <?php
            if ($results[1] !== null) {
            ?>
                <a class="swiper-slide" href="<?php echo get_post_permalink($results[1]->ID) ?>" style="background-image: url(' <?php echo get_the_post_thumbnail_url($results[1]->ID) ?>')">
                    <div class="destaques-content">
                        <?php
                        echo '<span class="destaques-cat">' . get_the_category($results[1]->ID)[0]->cat_name . '</span>';
                        echo '<span class="destaques-title">' . get_the_title($results[1]) . '</span>';
                        ?>
                    </div>
                </a>
            <?php } ?>
            <?php
            if ($results[2] !== null) {
            ?>
                <a class="swiper-slide" href="<?php echo get_post_permalink($results[2]->ID) ?>" style="background-image: url(' <?php echo get_the_post_thumbnail_url($results[2]->ID) ?>')">
                    <div class="destaques-content">
                        <?php
                        echo '<span class="destaques-cat">' . get_the_category($results[2]->ID)[0]->cat_name . '</span>';
                        echo '<span class="destaques-title">' . get_the_title($results[2]) . '</span>';
                        ?>
                    </div>
                </a>
            <?php } ?>
            <?php
            if ($results[3] !== null) {
            ?>
                <a class="swiper-slide" href="<?php echo get_post_permalink($results[0]->ID) ?>" style="background-image: url(' <?php echo get_the_post_thumbnail_url($results[3]->ID) ?>')">
                    <div class="destaques-content">
                        <?php
                        echo '<span class="destaques-cat">' . get_the_category($results[3]->ID)[0]->cat_name . '</span>';
                        echo '<span class="destaques-title">' . get_the_title($results[3]) . '</span>';
                        ?>
                    </div>
                </a>
            <?php } ?>
            <?php
            if ($results[4] !== null) {
            ?>
                <a class="swiper-slide" href="<?php echo get_post_permalink($results[4]->ID) ?>" style="background-image: url(' <?php echo get_the_post_thumbnail_url($results[4]->ID) ?>')">
                    <div class="destaques-content">
                        <?php
                        echo '<span class="destaques-cat">' . get_the_category($results[4]->ID)[4]->cat_name . '</span>';
                        echo '<span class="destaques-title">' . get_the_title($results[4]) . '</span>';
                        ?>
                    </div>
                </a>
            <?php } ?>
            <?php
            if ($results[5] !== null) {
            ?>
                <a class="swiper-slide" href="<?php echo get_post_permalink($results[5]->ID) ?>" style="background-image: url(' <?php echo get_the_post_thumbnail_url($results[5]->ID) ?>')">
                    <div class="destaques-content">
                        <?php
                        echo '<span class="destaques-cat">' . get_the_category($results[5]->ID)[0]->cat_name . '</span>';
                        echo '<span class="destaques-title">' . get_the_title($results[5]) . '</span>';
                        ?>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>
    <div class="container-navigation-relacionados">
        <div class="col-md-12 navigation-posts-relacionados navigation-destaques-swiper">
            <div class="swiper-button-prev"><i class="tainacan-icon tainacan-icon-previous"></i></div>
            <div class="swiper-button-next"><i class="tainacan-icon tainacan-icon-next"></i></div>
        </div>
    </div>
</div>