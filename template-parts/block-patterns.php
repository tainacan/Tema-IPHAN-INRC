<?php

/**
 * Block Pattern
 */
function iphan_block_pattern()
{
    register_block_pattern(
        'core/column-pattern',
        array(
            'title'       => __('IPHAN highlight column', 'IPHAN'),
            'description' => _x('Column with red border', 'Block pattern description', 'iphan'),
            'categories' => array('columns'),
            'content'     => '
            <!-- wp:columns -->
            <div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"top","className":"is-style-column-iphan-secundary"} -->
            <div class="wp-block-column is-vertically-aligned-top is-style-column-iphan-secundary"><!-- wp:heading {"level":1,"className":"is-style-title-iphan-underscore"} -->
            <h1 class="is-style-title-iphan-underscore">Título da postagem 1</h1>
            <!-- /wp:heading -->
            
            <!-- wp:paragraph -->
            <p>Ainda assim, existem dúvidas a respeito de como o fenômeno da Internet maximiza as possibilidades por conta do sistema de formação de quadros que corresponde às necessidades.</p>
            <!-- /wp:paragraph --></div>
            <!-- /wp:column -->
            
            <!-- wp:column {"className":"is-style-column-iphan-gray is-style-column-iphan"} -->
            <div class="wp-block-column is-style-column-iphan-gray is-style-column-iphan"><!-- wp:heading {"className":"is-style-title-iphan-underscore","backgroundColor":"branco","textColor":"preto"} -->
            <h2 class="is-style-title-iphan-underscore has-preto-color has-branco-background-color has-text-color has-background">Título da postagem 2</h2>
            <!-- /wp:heading -->
            
            <!-- wp:paragraph -->
            <p>Evidentemente, a contínua expansão de nossa atividade oferece uma interessante oportunidade para verificação das posturas dos órgãos dirigentes com relação às suas atribuições.</p>
            <!-- /wp:paragraph --></div>
            <!-- /wp:column --></div>
            <!-- /wp:columns -->'
                 )
        );

    register_block_pattern(
        'core/group',
        array(
            'title'       => __('IPHAN highlight group', 'IPHAN'),
            'description' => _x('group with red border', 'Block pattern description', 'iphan'),
            'categories' => array('columns'),
            'content'     => '
            <!-- wp:group {"className":"is-style-column-iphan"} -->
            <div class="wp-block-group is-style-column-iphan"><div class="wp-block-group__inner-container"><!-- wp:heading {"className":"is-style-title-iphan-underscore"} -->
            <h2 class="is-style-title-iphan-underscore">Título do BLoco</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph -->
            <p>Paragrafo do Grupo</p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph -->
            <p>Paragrafo 2</p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph -->
            <p>Paragrafo 3</p>
            <!-- /wp:paragraph --></div></div>
            <!-- /wp:group -->'
        )
    );
}
add_action('init', 'iphan_block_pattern');
