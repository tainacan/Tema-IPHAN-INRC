<?php
function card_block_init()
{
    wp_register_script(
        'card-block-IPHAN-js',
        get_template_directory_uri() . '/custom-blocks/card-block/card-block.js',
        array('wp-blocks')
    );

    wp_register_style(
        'card_block-IPHAN-editor',
        plugins_url('editor.css', __FILE__),
        array(),
        filemtime(plugin_dir_path(__FILE__) . 'editor-card.scss')
    );

    wp_register_style(
        'card_block_IPHAN',
        plugins_url('style.css', __FILE__),
        array(),
        filemtime(plugin_dir_path(__FILE__) . 'style-card.scss')
    );

    register_block_type('iphan/card-block-IPHAN', array(
        'editor_script' => 'card-block-IPHAN-js',
        'editor_style'  => 'editor',
        'style'         => 'style',
    ));
}

add_action('init', 'card_block_init');
