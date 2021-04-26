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
    <div class="linha-1-destaques grid-container col-md-12">
        <?php
        for ($i = 0; $i < count($results); $i++) {
        ?>
            <a class="display-<?php echo $i + 1 ?>" href="<?php echo get_post_permalink($results[$i]->ID) ?>" style="background-image: url(' <?php echo get_the_post_thumbnail_url($results[$i]->ID) ?>')">
                <div class="destaques-content">
                    <?php
                    echo '<span class="destaques-cat">' . get_the_category($results[$i]->ID)[0]->cat_name . '</span>';
                    echo '<span class="destaques-title">' . get_the_title($results[$i]) . '</span>';
                    ?>
                </div>
            </a>
        <?php } ?>
</section>