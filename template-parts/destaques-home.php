<section class="destaques">
    <?php
    $defaults = array(
        'numberposts'      => 6,
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
            <?php _e('Destaques', 'iphan_inrc') ?>
        </h1>
    </div>
    <div class="linha-1-destaques col-md-12">
        <a class="col-sm-12 col-md-8" href="<?php echo get_post_permalink($results[0]->ID) ?>" <?php echo 'style="background-image: url("' . get_the_post_thumbnail_url($results[0]->ID) . '");"' ?>>
            <div class="destaques-content">
                <?php
                echo '<span class="destaques-cat">' . get_the_category($results[0]->ID)[0]->cat_name . '</span>';
                echo '<span class="destaques-title">' . get_the_title($results[0]) . '</span>';
                ?>
            </div>
        </a>
        <a class="col-sm-12 col-md-4" href="<?php echo get_post_permalink($results[1]->ID) ?>">
            <div class="destaques-content">
                <?php
                echo '<span class="destaques-cat">' . get_the_category($results[1]->ID)[0]->cat_name . '</span>';
                echo '<span class="destaques-title">' . get_the_title($results[1]) . '</span>';
                ?>
            </div>
        </a>
    </div>
    <div class="linha-2-destaques destaque-bottom">
        <a class="col-sm-12 col-md-4" href="<?php echo get_post_permalink($results[2]->ID) ?>">
            <div class="destaques-content">
                <?php
                echo '<span class="destaques-cat">' . get_the_category($results[2]->ID)[0]->cat_name . '</span>';
                echo '<span class="destaques-title">' . get_the_title($results[2]) . '</span>';
                ?>
            </div>
        </a>
        <a class="col-sm-12 col-md-4" href="<?php echo get_post_permalink($results[3]->ID) ?>">
            <div class="destaques-content">
                <?php
                echo '<span class="destaques-cat">' . get_the_category($results[3]->ID)[0]->cat_name . '</span>';
                echo '<span class="destaques-title">' . get_the_title($results[3]) . '</span>';
                ?>
            </div>
        </a>
        <div class="is-mobile col-md-4">
            <a class="col-md-6 destaque-bottom-right" href="<?php echo get_post_permalink($results[4]->ID) ?>">
                <div class="destaques-content">
                    <?php
                    echo '<span class="destaques-cat">' . get_the_category($results[4]->ID)[0]->cat_name . '</span>';
                    echo '<span class="destaques-title">' . get_the_title($results[4]) . '</span>';
                    ?>
                </div>
            </a>
            <a class="is-mobile col-md-6 destaque-bottom-right" href="<?php echo get_post_permalink($results[5]->ID) ?>">
                <div class="destaques-content">
                    <?php
                    echo '<span class="destaques-cat">' . get_the_category($results[5]->ID)[0]->cat_name . '</span>';
                    echo '<span class="destaques-title">' . get_the_title($results[5]) . '</span>';
                    ?>
                </div>
            </a>
        </div>
    </div>
</section>