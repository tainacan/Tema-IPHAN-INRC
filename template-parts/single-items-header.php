<?php
$adjacent_links = tainacan_get_adjacent_item_links();
$previous = $adjacent_links['previous'];
$next = $adjacent_links['next'];
?>

<div class="tainacan-single-post tainacan-single-item-heading tainacan-title">
    <div class="tainacan-title-page">
        
        <div class="is-style-title-iphan-underscore title-page">
            <h1><?php the_title(); ?></h1> 
        </div>

    </div>
</div>

<div class="mt-3 tainacan-single-post collection-single-item">
    <header class="mb-4 tainacan-content">
        <div class="header-meta text-muted mb-2 d-flex ">
            <?php 
                if ( !get_theme_mod('tainacan_single_item_hide_item_meta', false) ) {
                    echo '<span class="time">';
                        tainacan_meta_date_author(); 
                    echo '</span>';
                }
                if ( function_exists('tainacan_the_item_edit_link') ) {
                    echo '<span class="tainacan-edit-item-collection">';
                        tainacan_the_item_edit_link(null, ' - ');
                    echo '</span>';
                }
            ?>
        </div>
    </header>
</div>