<?php
function accordion_block_init()
{
    wp_register_script(
        'accordion-custom-js',
        get_template_directory_uri() . '/custom-blocks/accordion-block/accordion-block.js',
        array('wp-blocks')
    );

    wp_register_style(
        'accordion_block-editor',
        plugins_url('editor.css', __FILE__),
        array(),
        filemtime(plugin_dir_path(__FILE__) . 'editor.scss')
    );

    wp_register_style(
        'accordion_block',
        plugins_url('style.css', __FILE__),
        array(),
        filemtime(plugin_dir_path(__FILE__) . 'style.scss')
    );

    register_block_type('iphan/accordion-custom', array(
        'editor_script' => 'accordion-custom-js',
        'editor_style'  => 'editor',
        'style'         => 'style',
    ));
}

add_action('init', 'accordion_block_init');
?>