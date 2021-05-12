<?php
function card_block_init()
{
    wp_register_script(
        'card-block-js',
        get_template_directory_uri() . '/custom-blocks/card-block/card-block.js',
        array('wp-blocks')
    );

    wp_register_style(
        'inner_accordion_block-editor',
        plugins_url('editor.css', __FILE__),
        array(),
        filemtime(plugin_dir_path(__FILE__) . 'editor.scss')
    );

    wp_register_style(
        'inner_accordion_block',
        plugins_url('style.css', __FILE__),
        array(),
        filemtime(plugin_dir_path(__FILE__) . 'style.scss')
    );

    register_block_type('iphan/inner-accordion-custom', array(
        'editor_script' => 'inner-accordion-custom-js',
        'editor_style'  => 'editor',
        'style'         => 'style',
    ));
}

add_action('init', 'inner_accordion_block_init');