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
<div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"top","className":"is-style-column-iphan"} -->
<div class="wp-block-column is-vertically-aligned-top is-style-column-iphan"><!-- wp:heading {"level":1,"className":"is-style-title-iphan-underscore"} -->
<h1 class="is-style-title-iphan-underscore">H1</h1>
<!-- /wp:heading -->

<!-- wp:heading {"className":"is-style-title-iphan-underscore"} -->
<h2 class="is-style-title-iphan-underscore">H2</h2>
<!-- /wp:heading -->

<!-- wp:heading {"level":3,"className":"is-style-title-iphan-underscore"} -->
<h3 class="is-style-title-iphan-underscore">H3</h3>
<!-- /wp:heading -->

<!-- wp:heading {"level":4,"className":"is-style-title-iphan-underscore"} -->
<h4 class="is-style-title-iphan-underscore">H4</h4>
<!-- /wp:heading -->

<!-- wp:heading {"level":5,"className":"is-style-title-iphan-underscore"} -->
<h5 class="is-style-title-iphan-underscore">H5</h5>
<!-- /wp:heading -->

<!-- wp:heading {"level":6,"className":"is-style-title-iphan-underscore"} -->
<h6 class="is-style-title-iphan-underscore">H6</h6>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>dasouhdaisuhdaisouhdsauihdas</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"is-style-column-iphan-gray is-style-column-iphan"} -->
<div class="wp-block-column is-style-column-iphan-gray is-style-column-iphan"><!-- wp:heading {"className":"is-style-title-iphan-underscore","backgroundColor":"cinza6","textColor":"preto"} -->
<h2 class="is-style-title-iphan-underscore has-preto-color has-cinza-6-background-color has-text-color has-background">31231231231232131212qw</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>tfrtduftgypiuojémchrpoe hvporau hcporuha wpceuhr pwur apuwch </p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:paragraph -->
<p>Texto escrito para estar </p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"is-style-column-iphan"} -->
<div class="wp-block-group is-style-column-iphan"><div class="wp-block-group__inner-container"><!-- wp:heading {"className":"is-style-title-iphan is-style-title-iphan-underscore"} -->
<h2 class="is-style-title-iphan is-style-title-iphan-underscore">dasdasdasdasdasdas</h2>
<!-- /wp:heading --></div></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p>dasdasdasdasdasasdasdas</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>dasdasdasdsadsa</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"is-style-title-iphan is-style-title-iphan-underscore"} -->
<h2 class="is-style-title-iphan is-style-title-iphan-underscore">asdudhasihdasoiuhdasoiu</h2>
<!-- /wp:heading -->'
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

?>