    <section class="destaques-noticias">
        <?php
        $defaults = array(
            'numberposts'      => 0,
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
        <div class="div-destaques-noticias grid-container-noticias grid-container-noticias-has-<?php if (count($results) < 4) {
                                                                                                    echo $i + 1;
                                                                                                } else {
                                                                                                    echo '5';
                                                                                                } ?> col-md-12 is-desktop">
            <?php
            for ($i = 0; $i < count($results) && $i < 5; $i++) {
            ?>
                <a class="display-<?php echo $i + 1 ?>-noticias-has-<?php if (count($results) < 4) {
                                                                        echo $i + 1;
                                                                    } else {
                                                                        echo 5;
                                                                    } ?>" href="<?php echo get_post_permalink($results[$i]->ID) ?>" style="background-image: url(' <?php echo get_the_post_thumbnail_url($results[$i]->ID) ?>')">
                    <div class="destaques-content">
                        <?php
                        echo '<span class="destaques-cat">' . get_the_category($results[$i]->ID)[0]->cat_name . '</span>';
                        echo '<span class="destaques-title">' . get_the_title($results[$i]) . '</span>';
                        ?>
                    </div>
                </a>
            <?php } ?>
        </div>
        <div class="is-mobile-noticias swiper-container">
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
        <div class="is-mobile-noticias navigation-destaques-swiper">
            <div class="swiper-button-prev"><i class="tainacan-icon tainacan-icon-previous"></i></div>
            <div class="swiper-button-next"><i class="tainacan-icon tainacan-icon-next"></i></div>
        </div>
    </section>