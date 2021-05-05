<?php
function destaqueshome()
{
    return
?>
    <section class="destaques">
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
                <?php _e('Destaques', 'iphan_inrc') ?>
            </h1>
        </div>
        <div class="grid-container-has-<?php if (count($results) < 5) {
                                            echo $i + 1;
                                        } else {
                                            echo '6';
                                        } ?> col-md-12 grid-container">
            <?php
            for ($i = 0; $i < count($results) && $i < 6; $i++) {
            ?>
                <a class="display-<?php echo $i + 1 ?>-has-<?php if (count($results) < 5) {
                                                                echo $i + 1;
                                                            } else {
                                                                echo '6';
                                                            } ?>" href="<?php echo get_post_permalink($results[$i]->ID) ?>" style="background-image: url(' <?php echo get_the_post_thumbnail_url($results[$i]->ID) ?>')">
                    <div class="destaques-content">
                        <?php
                        echo '<span class="destaques-cat">' . get_the_category($results[$i]->ID)[0]->cat_name . '</span>';
                        echo '<span class="destaques-title">' . get_the_title($results[$i]) . '</span>';
                        ?>
                    </div>
                </a>
            <?php } ?>
    </section>
<?php }
add_shortcode('destaques', 'destaqueshome');


add_shortcode('customShortCode', 'dest');
function dest()
{
    return  '<p>The current date is ' . date('d-m-Y') . '.</p>';
}
?>