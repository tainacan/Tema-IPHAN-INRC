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
    <div class="div-destaques-noticias col-md-12">
        <div class="col-md-5">
            <a class="col-sm-12 col-md-12 fundo-amarelo" href="<?php echo get_post_permalink($results[0]->ID) ?>" <?php echo 'style="background-image: url("' . get_the_post_thumbnail_url($results[0]->ID) . '");"' ?>>
                <div class="destaques-content">
                    <?php
                    echo '<span class="destaques-cat">' . get_the_category($results[0]->ID)[0]->cat_name . '</span>';
                    echo '<span class="destaques-title">' . get_the_title($results[0]) . '</span>';
                    ?>
                </div>
            </a>
            <a class="col-sm-12 col-md-12 fundo-vermelho" href="<?php echo get_post_permalink($results[1]->ID) ?>">
                <div class="destaques-content">
                    <?php
                    echo '<span class="destaques-cat">' . get_the_category($results[1]->ID)[0]->cat_name . '</span>';
                    echo '<span class="destaques-title">' . get_the_title($results[1]) . '</span>';
                    ?>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a class="col-sm-12 col-md-12 destaques-noticias-mid fundo-amarelo" href="<?php echo get_post_permalink($results[0]->ID) ?>" <?php echo 'style="background-image: url("' . get_the_post_thumbnail_url($results[0]->ID) . '");"' ?>>
                <div class="destaques-content">
                    <?php
                    echo '<span class="destaques-cat">' . get_the_category($results[0]->ID)[0]->cat_name . '</span>';
                    echo '<span class="destaques-title">' . get_the_title($results[0]) . '</span>';
                    ?>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a class="col-sm-12 col-md-12 fundo-amarelo" href="<?php echo get_post_permalink($results[0]->ID) ?>" <?php echo 'style="background-image: url("' . get_the_post_thumbnail_url($results[0]->ID) . '");"' ?>>
                <div class="destaques-content">
                    <?php
                    echo '<span class="destaques-cat">' . get_the_category($results[0]->ID)[0]->cat_name . '</span>';
                    echo '<span class="destaques-title">' . get_the_title($results[0]) . '</span>';
                    ?>
                </div>
            </a>
            <a class="col-sm-12 col-md-12 fundo-vermelho" href="<?php echo get_post_permalink($results[1]->ID) ?>">
                <div class="destaques-content">
                    <?php
                    echo '<span class="destaques-cat">' . get_the_category($results[1]->ID)[0]->cat_name . '</span>';
                    echo '<span class="destaques-title">' . get_the_title($results[1]) . '</span>';
                    ?>
                </div>
            </a>
        </div>
    </div>
</section>