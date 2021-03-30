<?php

/**
 * Block Styles
 */
if (function_exists('register_block_style')) {
    /**
     * Register block styles.
     *
     * @since 1.0.0
     *
     * @return void
     */
    function iphan_block_styles()
    {
        register_block_style(
            'core/heading',
            array(
                'name'  => 'title-iphan-underscore', 'iphan-inrc',
                'label' =>  'Título IPHAN Sublinhado ',
                'isDefault' => true,
            )
        );

        register_block_style(
            'core/column',
            array(
                'name'  => 'column-iphan', 'iphan-inrc',
                'label' =>  'Coluna IPHAN ',
                'isDefault' => true,
            )
        );

        register_block_style(
            'core/column',
            array(
                'name'  => 'column-iphan-secondary', 'iphan-inrc',
                'label' =>  'Coluna IPHAN Secundária',
                'isDefault' => true,
            )
        );

        register_block_style(
            'core/group',
            array(
                'name'  => 'column-iphan', 'iphan-inrc',
                'label' =>  'Grupo IPHAN ',
                'isDefault' => true,
            )
        );

        register_block_style(
            'core/group',
            array(
                'name'  => 'column-iphan-secondary', 'iphan-inrc',
                'label' =>  'Grupo IPHAN secundario',
                'isDefault' => true,
            )
        );

        register_block_style(
            'core/group',
            array(
                'name'  => 'two-columns', 'iphan-inrc',
                'label' =>  'Grupo com duas colunas fluídas',
                'isDefault' => true,
            )
        );

        register_block_style(
            'core/group',
            array(
                'name'  => 'three-column', 'iphan-inrc',
                'label' =>  'Grupo com três colunas fluídas',
                'isDefault' => true,
            )
        );

        register_block_style(
            'core/file',
            array(
                'name'  => 'download', 'iphan-inrc',
                'label' =>  'Download de arquivo do Tainacan',
                'isDefault' => true,
            )
        );
    }
}
add_action('init', 'iphan_block_styles');
