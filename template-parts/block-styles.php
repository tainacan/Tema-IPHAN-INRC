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
                'name'  => 'title-iphan_underscore', 'iphan_inrc',
                'label' =>  'Título IPHAN Sublinhado ',
                'isDefault' => true,
            )
        );

        register_block_style(
            'core/column',
            array(
                'name'  => 'column-iphan', 'iphan_inrc',
                'label' =>  'Coluna IPHAN ',
                'isDefault' => true,
            )
        );

        register_block_style(
            'core/column',
            array(
                'name'  => 'column-iphan_secondary', 'iphan_inrc',
                'label' =>  'Coluna IPHAN Secundária',
                'isDefault' => true,
            )
        );

        register_block_style(
            'core/group',
            array(
                'name'  => 'column-iphan', 'iphan_inrc',
                'label' =>  'Grupo IPHAN ',
                'isDefault' => true,
            )
        );

        register_block_style(
            'core/group',
            array(
                'name'  => 'column-iphan_secondary', 'iphan_inrc',
                'label' =>  'Grupo IPHAN secundario',
                'isDefault' => true,
            )
        );

        register_block_style(
            'core/group',
            array(
                'name'  => 'two-columns', 'iphan_inrc',
                'label' =>  'Grupo com duas colunas fluídas',
                'isDefault' => true,
            )
        );

        register_block_style(
            'core/group',
            array(
                'name'  => 'three-column', 'iphan_inrc',
                'label' =>  'Grupo com três colunas fluídas',
                'isDefault' => true,
            )
        );

        register_block_style(
            'core/file',
            array(
                'name'  => 'download', 'iphan_inrc',
                'label' =>  'Download de arquivo do Tainacan',
                'isDefault' => true,
            )
        );

        register_block_style(
            'tainacan/item-submission-form',
            array(
                'name'  => 'two-columns', 'iphan_inrc',
                'label' =>  'Formulário com duas colunas fluídas',
                'isDefault' => true,
            )
        );
        register_block_style(
            'core/buttons',
            array(
                'name'  => 'button-left', 'iphan_inrc',
                'label' =>  'Button do cartão iphan alinhado a esquerda',
            )
        );
        register_block_style(
            'core/buttons',
            array(
                'name'  => 'button-center', 'iphan_inrc',
                'label' =>  'Button do cartão do iphan alinhado no centro',
            )
        );
        register_block_style(
            'core/buttons',
            array(
                'name'  => 'button-right', 'iphan_inrc',
                'label' =>  'Button do cartão do iphan alinhado a direita',
            )
        );
    }
}
add_action('init', 'iphan_block_styles');
