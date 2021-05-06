<?php
function destaqueshome()
{
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
    $msg = array();
    array_push($msg, '<section class="destaques">');
    array_push($msg, '<div class="titulo-destaques">');
    array_push($msg, '<h1 class="is-style-title-iphan-underscore">');
    array_push($msg, _e('Destaques', 'iphan_inrc'));
    array_push($msg, '</h1>');
    array_push($msg, '</div>');
    if (count($results) < 5) {
        array_push($msg, '<div class="grid-container-has-' . $i + 1 . ' col-md-12 grid-container">');
    } else {
        array_push($msg, '<div class="grid-container-has-6 col-md-12 grid-container">');
    }
    for ($i = 0; $i < count($results) && $i < 6; $i++) {
        if (count($results) < 5) {
            array_push($msg, '<a class="display-' . $i + 1 . '-has-' . count($results) + 1 . '" href="' . get_post_permalink($results[$i]->ID) . '" style="background-image: url(' . get_the_post_thumbnail_url($results[$i]->ID) . ')">');
        } else {
            array_push($msg, '<a class="display-' . $i + 1 . '-has-6' . '" href="' . get_post_permalink($results[$i]->ID) . '" style="background-image: url(' . get_the_post_thumbnail_url($results[$i]->ID) . ')">');
        }
        array_push($msg, ' <div class="destaques-content">');
        array_push($msg, '<span class="destaques-cat">' . get_the_category($results[$i]->ID)[0]->cat_name . '</span>');
        array_push($msg, '<span class="destaques-title">' . get_the_title($results[$i]) . '</span>');
        array_push($msg, '</div>');
        array_push($msg, '</a>');
    }
    array_push($msg, '</section>');
    return $msg;
}
add_shortcode('destaques', 'destaqueshome');
