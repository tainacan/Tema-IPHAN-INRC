<section class="destaques-noticias">
    <?php
    $defaults = array(
        'numberposts'      => 5,
        'offset'           => 0,
        'category'         => 0,
        'orderby'          => 'post_date',
        'order'            => 'DESC',
        'include'          => '',
        'exclude'          => '',
        'meta_key'         => '',
        'meta_query' => array(
            array(
                'key'     => '_thumbnail_id',
                'value'   => '',
                'compare' => '!=',
            )
        ),
        'meta_value'       => '',
        'post_type'        => 'post',
        'post_status'      => 'draft, publish, future',
        'suppress_filters' => true,
    );
    $results = get_posts($defaults);
    ?>
    <div class="titulo-destaques">
        <h1 class="is-style-title-iphan-underscore">
            <?php _e('Notícias', 'iphan_inrc') ?>
        </h1>
    </div>
    <div class="div-destaques-noticias col-md-12 is-desktop">
        <?php
        for ($i = 0; $i < count($results); $i++) {
        ?>
            <a class="col-sm-12 col-md-12" href="<?php echo get_post_permalink($results[$i]->ID) ?>" style="background-image: url(' <?php echo get_the_post_thumbnail_url($results[$i]->ID) ?>')">
                <div class="destaques-content">
                    <?php
                    echo '<span class="destaques-cat">' . get_the_category($results[$i]->ID)[0]->cat_name . '</span>';
                    echo '<span class="destaques-title">' . get_the_title($results[$i]) . '</span>';
                    ?>
                </div>
            </a>
        <?php } ?>
    </div>
    <div class="is-mobile-noticias swiper-container col-sm-12">
        <div class="swiper-wrapper col-sm-12">
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
                <a class="swiper-slide" href="<?php echo get_post_permalink($results[3]->ID) ?>" style="background-image: url(' <?php echo get_the_post_thumbnail_url($results[3]->ID) ?>')">
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
                        echo '<span class="destaques-cat">' . get_the_category($results[4]->ID)[0]->cat_name . '</span>';
                        echo '<span class="destaques-title">' . get_the_title($results[4]) . '</span>';
                        ?>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>
    <div class="is-mobile-noticias navigation-destaques-swiper">
        <div class="swiper-button-prev"><i class="tainacan-icon tainacan-icon-previous"></i></div>
        <div class="swiper-button-next"><i class="tainacan-icon tainacan-icon-next"></i></div>
    </div>
</section>