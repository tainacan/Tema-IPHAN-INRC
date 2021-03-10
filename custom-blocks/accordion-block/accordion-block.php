<?php
function accordion_block_init()
{
    // automatically load dependencies and version
/*     $asset_file = include(plugin_dir_path(__FILE__) . 'block.asset.php'); */

    wp_register_script(
        'accordion_block-editor',
        plugins_url('block.js', __FILE__),
        $asset_file['dependencies'],
        $asset_file['version']
    );

    wp_register_style(
        'accordion_block-editor',
        plugins_url('editor.css', __FILE__),
        array(),
        filemtime(plugin_dir_path(__FILE__) . 'editor.css')
    );

    wp_register_style(
        'accordion_block',
        plugins_url('style.css', __FILE__),
        array(),
        filemtime(plugin_dir_path(__FILE__) . 'style.css')
    );

    register_block_type('core/accordion_block', array(
        'editor_script' => 'accordion_block-editor',
        'editor_style'  => 'accordion_block-editor',
        'style'         => 'accordion_block',
    ));
}

add_action('init', 'accordion_block_init');
